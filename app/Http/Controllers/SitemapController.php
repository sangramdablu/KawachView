<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\News;
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
                '/markets' => ['monthly', '0.8', 'pages.markets'],
                '/markets/usa/software-development' => ['monthly', '0.9', 'pages.countrypages.usa'],
                '/markets/uk/software-development' => ['monthly', '0.9', 'pages.countrypages.uk'],
                '/markets/germany/software-development' => ['monthly', '0.9', 'pages.countrypages.germany'],
                '/markets/europe/software-development' => ['monthly', '0.9', 'pages.countrypages.europe'],
                '/products/orbit' => ['monthly', '0.7', 'pages.products.orbit'],
                '/hire-developer' => ['monthly', '0.8', 'pages.hire-developer'],
                '/careers' => ['weekly', '0.7', 'pages.careers'],
                '/blog' => ['daily', '0.8', 'pages.blog'],
                '/newsroom' => ['daily', '0.8', 'pages.newsroom'],
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

            foreach (array_keys(config('hire_developers')) as $slug) {
                $urls->push([
                    'loc' => url('/hire-developer/' . $slug),
                    'lastmod' => null,
                    'changefreq' => 'monthly',
                    'priority' => '0.6',
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

            News::where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->get()
                ->each(function (News $post) use ($urls) {
                    $urls->push([
                        'loc' => url('/newsroom/' . $post->slug),
                        'lastmod' => $post->updated_at?->toAtomString(),
                        'changefreq' => $post->seo?->sitemap_changefreq ?? 'monthly',
                        'priority' => $post->seo?->sitemap_priority ?? '0.6',
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
