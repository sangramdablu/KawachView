<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use App\Models\VisitorPageview;
use App\Services\GeoLocationService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Self-hosted visitor logging — built after Google Analytics undercounted
 * traffic because it only starts recording once a visitor accepts the
 * cookie-consent banner (most never do). This tracks every real page view
 * unconditionally, first-party only (never sent to a third party), and is
 * disclosed in the Cookie Policy for transparency. Deliberately separate
 * from the Google consent-mode toggle in layouts/cookie-consent.blade.php.
 */
class TrackVisitor
{
    private const COOKIE_NAME = 'kw_visitor_id';
    private const COOKIE_MINUTES = 60 * 24 * 365 * 2; // 2 years
    private const SESSION_GAP_MINUTES = 30;

    private const EXCLUDED_PREFIXES = [
        'assets/', 'build/', 'storage/', 'vendor/',
        'visitor-track', 'sitemap.xml', 'robots.txt', 'favicon.ico', 'up',
    ];

    private const BOT_PATTERN = '/bot|crawl|slurp|spider|mediapartners|facebookexternalhit|whatsapp|telegrambot|pingdom|uptimerobot|ahrefsbot|semrushbot|petalbot|bytespider|googlebot|bingbot|yandex|baiduspider|duckduckbot|applebot|headlesschrome/i';

    public function handle(Request $request, Closure $next): Response
    {
        if ($this->shouldTrack($request)) {
            $pageviewId = $this->track($request);
            View::share('kwPageviewId', $pageviewId);
        }

        return $next($request);
    }

    private function shouldTrack(Request $request): bool
    {
        if (!$request->isMethod('GET') || $request->ajax() || $request->expectsJson()) {
            return false;
        }

        $path = ltrim($request->path(), '/');
        foreach (self::EXCLUDED_PREFIXES as $prefix) {
            if ($path === $prefix || str_starts_with($path, $prefix)) {
                return false;
            }
        }

        return true;
    }

    private function track(Request $request): ?int
    {
        $uuid = $request->cookie(self::COOKIE_NAME);
        $isNewVisitor = !$uuid;
        $uuid = $uuid ?: (string) Str::uuid();

        $userAgent = (string) $request->userAgent();
        $isBot = (bool) preg_match(self::BOT_PATTERN, $userAgent);

        $visitor = Visitor::firstOrNew(['visitor_uuid' => $uuid]);
        $now = now();

        if (!$visitor->exists) {
            [$device, $browser, $os] = $this->parseUserAgent($userAgent);

            $visitor->fill([
                'first_seen_at'   => $now,
                'entry_route'     => $request->path(),
                'referrer'        => $request->header('referer'),
                'utm_source'      => $request->query('utm_source'),
                'utm_medium'      => $request->query('utm_medium'),
                'utm_campaign'    => $request->query('utm_campaign'),
                'utm_term'        => $request->query('utm_term'),
                'utm_content'     => $request->query('utm_content'),
                'country'         => app(GeoLocationService::class)->detectCountry($request->ip()),
                'device_type'     => $device,
                'browser'         => $browser,
                'os'              => $os,
                'ip_address'      => $request->ip(),
                'is_bot'          => $isBot,
                'visit_count'     => 1,
                'total_pageviews' => 0,
            ]);
        } elseif ($visitor->last_seen_at && $visitor->last_seen_at->diffInMinutes($now) >= self::SESSION_GAP_MINUTES) {
            $visitor->visit_count += 1;
        }

        $visitor->last_seen_at = $now;
        $visitor->total_pageviews += 1;
        $visitor->save();

        $pageview = VisitorPageview::create([
            'visitor_id' => $visitor->id,
            'route_name' => optional($request->route())->getName(),
            'path'       => $request->path(),
            'referrer'   => $request->header('referer'),
        ]);

        if ($isNewVisitor) {
            Cookie::queue(self::COOKIE_NAME, $uuid, self::COOKIE_MINUTES);
        }

        return $pageview->id;
    }

    /**
     * Lightweight regex-based UA parsing — covers the common cases well
     * enough for traffic reporting without pulling in a parser dependency.
     */
    private function parseUserAgent(string $ua): array
    {
        $device = 'desktop';
        if (preg_match('/tablet|ipad/i', $ua)) {
            $device = 'tablet';
        } elseif (preg_match('/mobile|android|iphone/i', $ua)) {
            $device = 'mobile';
        }

        $browser = match (true) {
            (bool) preg_match('/edg\//i', $ua)      => 'Edge',
            (bool) preg_match('/opr\/|opera/i', $ua) => 'Opera',
            (bool) preg_match('/chrome\//i', $ua)    => 'Chrome',
            (bool) preg_match('/firefox\//i', $ua)   => 'Firefox',
            (bool) preg_match('/safari\//i', $ua)    => 'Safari',
            default => 'Other',
        };

        $os = match (true) {
            (bool) preg_match('/windows/i', $ua)          => 'Windows',
            (bool) preg_match('/mac os x|macintosh/i', $ua) => 'macOS',
            (bool) preg_match('/android/i', $ua)          => 'Android',
            (bool) preg_match('/iphone|ipad|ios/i', $ua)  => 'iOS',
            (bool) preg_match('/linux/i', $ua)            => 'Linux',
            default => 'Other',
        };

        return [$device, $browser, $os];
    }
}
