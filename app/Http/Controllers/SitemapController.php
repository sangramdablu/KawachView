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
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ]);

            $static = [
                '/about-us' => ['monthly', '0.8'],
                '/about/founder' => ['monthly', '0.5'],
                '/services' => ['weekly', '0.9'],
                '/case-studies' => ['weekly', '0.8'],
                '/blog' => ['daily', '0.8'],
                '/contact' => ['monthly', '0.7'],
                '/privacy-policy' => ['yearly', '0.3'],
                '/terms-conditions' => ['yearly', '0.3'],
                '/cookie-policy' => ['yearly', '0.3'],
            ];

            foreach ($static as $path => [$changefreq, $priority]) {
                $urls->push([
                    'loc' => url($path),
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
}
