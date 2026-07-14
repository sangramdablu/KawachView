<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = Cache::remember('sitemap.xml', 3600, function () {
            $urls = collect();

            $urls->push([
                'loc' => url('/'),
                'lastmod' => $this->viewLastMod('pages.index'),
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ]);

            $static = [
                '/about-us' => ['monthly', '0.8', 'pages.about'],
                '/about/founder' => ['monthly', '0.5', 'pages.founder.neha'],
                '/services' => ['weekly', '0.9', 'pages.services'],
                '/case-studies' => ['weekly', '0.8', 'pages.case-studies'],
                '/blog' => ['daily', '0.8', 'pages.blog'],
                '/contact' => ['monthly', '0.7', 'pages.contact'],
                '/privacy-policy' => ['yearly', '0.3', 'pages.privacy-policy'],
                '/terms-conditions' => ['yearly', '0.3', 'pages.terms-conditions'],
                '/cookie-policy' => ['yearly', '0.3', 'pages.cookie-policy'],
                '/refund-policy' => ['yearly', '0.3', 'pages.refund-policy'],
            ];

            foreach ($static as $path => [$changefreq, $priority, $view]) {
                $urls->push([
                    'loc' => url($path),
                    'lastmod' => $this->viewLastMod($view),
                    'changefreq' => $changefreq,
                    'priority' => $priority,
                ]);
            }

            Page::published()->byType('service')->get()->each(function (Page $page) use ($urls) {
                $urls->push([
                    'loc' => url('/services/' . $page->slug),
                    'lastmod' => $page->updated_at?->toAtomString(),
                    'changefreq' => $page->sitemap_changefreq ?? 'monthly',
                    'priority' => $page->sitemap_priority ?? '0.8',
                ]);
            });

            Page::published()->byType('casestudy')->get()->each(function (Page $page) use ($urls) {
                $urls->push([
                    'loc' => url('/case-studies/' . $page->slug),
                    'lastmod' => $page->updated_at?->toAtomString(),
                    'changefreq' => $page->sitemap_changefreq ?? 'monthly',
                    'priority' => $page->sitemap_priority ?? '0.7',
                ]);
            });

            Blog::where('status', 'published')->get()->each(function (Blog $post) use ($urls) {
                $urls->push([
                    'loc' => url('/blog/' . $post->slug),
                    'lastmod' => $post->updated_at?->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.6',
                ]);
            });

            return $urls;
        });

        $xml = view('sitemap', compact('urls'))->render();

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }

    private function viewLastMod(string $view): ?string
    {
        if (! view()->exists($view)) {
            return null;
        }

        $path = view()->getFinder()->find($view);

        return date(DATE_ATOM, filemtime($path));
    }
}
