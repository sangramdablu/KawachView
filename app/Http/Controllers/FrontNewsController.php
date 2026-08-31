<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Tag;

/*
|----------------------------------------------------------------------
| Public Newsroom controller — direct sibling of FrontBlogController,
| following the same naming convention (Front + module name) used by that
| controller. Lives in the FRONTEND app; both apps share the same MySQL
| database so this reads the `news` / `news_seos` tables that
| KawachAdmin's NewsController writes to.
|----------------------------------------------------------------------
*/
class FrontNewsController extends Controller
{
    private const PER_PAGE = 9;

    /**
     * GET /newsroom
     * GET /newsroom?category={slug}
     */
    public function index(Request $request)
    {
        $request->validate([
            'category' => 'nullable|string|max:100',
        ]);

        $query = News::with(['category', 'tags'])
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        $currentCategory = null;
        if ($request->filled('category')) {
            $currentCategory = Category::where('slug', $request->category)->first();
            if ($currentCategory) {
                $query->where('category_id', $currentCategory->id);
            }
        }

        $featured = null;
        if (!$request->filled('category')) {
            $featured = (clone $query)->orderByDesc('published_at')->first();
        }

        $posts = (clone $query)
            ->orderByDesc('published_at')
            ->paginate(self::PER_PAGE)
            ->withQueryString();

        $categories = Category::withCount([
                'news' => fn($q) => $q->where('status', 'published'),
            ])
            ->having('news_count', '>', 0)
            ->orderBy('name')
            ->get();

        $counts = [
            'all' => News::where('status', 'published')->count(),
        ];

        return view('pages.newsroom', [
            'posts'           => $posts,
            'featured'        => $featured,
            'categories'      => $categories,
            'currentCategory' => $currentCategory,
            'counts'          => $counts,
        ]);
    }

    /**
     * GET /newsroom/{slug}
     */
    public function show(string $slug)
    {
        $post = News::with(['category', 'tags', 'seo', 'author'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        News::where('id', $post->id)->increment('views');

        $related = News::with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn($q) => $q->where('category_id', $post->category_id))
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('pages.child.news_details', compact('post', 'related'));
    }
}
