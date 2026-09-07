<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Best-effort visitor country detection via IP geolocation, used only to
 * pre-rank job postings on the Careers page (never to hide/gate content).
 * The site isn't behind Cloudflare, so there's no free CF-IPCountry header —
 * this calls a third-party lookup instead. Fails open (returns null) on any
 * error, timeout, or private/local IP so the page never depends on it.
 */
class GeoLocationService
{
    public function detectCountry(?string $ip): ?string
    {
        if (!$ip || !$this->isPublicIp($ip)) {
            return null;
        }

        return Cache::remember("geoip-country:{$ip}", now()->addHours(6), function () use ($ip) {
            try {
                $response = Http::timeout(1.5)->get("https://ipwho.is/{$ip}", [
                    'fields' => 'success,country_code',
                ]);

                if ($response->successful() && $response->json('success')) {
                    $code = strtolower((string) $response->json('country_code'));
                    return $code !== '' ? $code : null;
                }
            } catch (\Throwable $e) {
                Log::debug('GeoLocationService lookup failed: ' . $e->getMessage());
            }

            return null;
        });
    }

    private function isPublicIp(string $ip): bool
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
    }
}
