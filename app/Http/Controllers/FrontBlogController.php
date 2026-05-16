<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

class FrontBlogController extends Controller
{
    /*
    |----------------------------------------------------------------------
    | IMPORTANT: This controller lives in your FRONTEND Laravel app.
    |
    | Since both apps share the same database, you can either:
    |   (A) Copy the Blog / Category / Tag models into this app  ✅ Simplest
    |   (B) Point your frontend DB connection to the same DB credentials
    |
    | Your frontend .env DB_ credentials must match the admin app's DB.
    |----------------------------------------------------------------------
    */

    /** Avatar colour palette for cards (cycles with modulo) */
    private const AVATAR_COLORS = [
        '#1a73e8','#1976d2','#0d47a1','#1565c0','#2196f3',
        '#29b6f6','#1558b0','#1e4a8f',
    ];

    /** Default icon per category slug (fallback if no featured image) */
    private const CATEGORY_ICONS = [
        'ai-ml'            => 'fas fa-brain',
        'cloud-devops'     => 'fas fa-cloud',
        'development'      => 'fas fa-laptop-code',
        'saas'             => 'fas fa-cubes',
        'security'         => 'fas fa-shield-alt',
        'data-analytics'   => 'fas fa-chart-bar',
        'mobile'           => 'fas fa-mobile-alt',
    ];

    // ── How many cards per page ──
    private const PER_PAGE = 9;

    /**
     * GET /blog
     * GET /blog?category={slug}
     * GET /blog?search={query}
     * GET /blog?tag={slug}
     * GET /blog?page={n}
     */
    public function index(Request $request)
    {
        // ── Validate query params ────────────────────────────────
        $request->validate([
            'search'   => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'tag'      => 'nullable|string|max:100',
        ]);

        // ── Base query ───────────────────────────────────────────
        $query = Blog::with(['category', 'tags'])
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        // ── Filter: category ─────────────────────────────────────
        $currentCategory = null;
        if ($request->filled('category')) {
            $currentCategory = Category::where('slug', $request->category)->first();
            if ($currentCategory) {
                $query->where('category_id', $currentCategory->id);
            }
        }

        // ── Filter: tag ──────────────────────────────────────────
        $currentTag = null;
        if ($request->filled('tag')) {
            $currentTag = Tag::where('slug', $request->tag)->first();
            if ($currentTag) {
                $query->whereHas('tags', fn($q) => $q->where('tags.id', $currentTag->id));
            }
        }

        // ── Filter: search ───────────────────────────────────────
        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('title',   'LIKE', "%{$term}%")
                  ->orWhere('excerpt', 'LIKE', "%{$term}%")
                  ->orWhere('content', 'LIKE', "%{$term}%");
            });
        }

        // ── Featured post (latest published — only on unfiltered page 1) ──
        $featuredPost = null;
        if (!$request->filled('search') && !$request->filled('category') && !$request->filled('tag')) {
            $featuredPost = (clone $query)
                ->orderByDesc('published_at')
                ->first();
        }

        // ── Paginate (exclude featured from grid on page 1) ──────
        $posts = (clone $query)
            ->orderByDesc('published_at')
            ->paginate(self::PER_PAGE)
            ->withQueryString();   // preserves ?search=&category= in pagination links

        // ── Sidebar / filter data ────────────────────────────────
        $categories = Category::withCount([
                'blogs' => fn($q) => $q->where('status', 'published')
            ])
            ->having('blogs_count', '>', 0)
            ->orderBy('name')
            ->get();

        // ── Counts for hero chips ────────────────────────────────
        $counts = [
            'all'       => Blog::where('status', 'published')->count(),
            'views'     => Blog::where('status', 'published')->sum('views'),
            'published' => Blog::where('status', 'published')->count(),
        ];

        return view('pages.blog', [
            'posts'           => $posts,
            'featuredPost'    => $featuredPost,
            'categories'      => $categories,
            'currentCategory' => $currentCategory,
            'currentTag'      => $currentTag,
            'counts'          => $counts,
            'avatarColors'    => self::AVATAR_COLORS,
            'categoryIcons'   => self::CATEGORY_ICONS,
        ]);
    }

    /**
     * GET /blog/{slug}
     * Single blog post detail page.
     */
    public function show(string $slug)
    {
        $post = Blog::with(['category', 'tags', 'seo'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        Blog::where('id', $post->id)->increment('views');

        $related = Blog::with('category')
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn($q) =>
                $q->where('category_id', $post->category_id)
            )
            ->latest('published_at')
            ->limit(3)
            ->get();

        $prev = Blog::where('status', 'published')
            ->where('published_at', '<', $post->published_at)
            ->latest('published_at')
            ->first(['id','title','slug']);

        $next = Blog::where('status', 'published')
            ->where('published_at', '>', $post->published_at)
            ->oldest('published_at')
            ->first(['id','title','slug']);

        return view('pages.child.blog_details', compact('post', 'related', 'prev', 'next'));
    }

    /**
     * POST /newsletter/subscribe
     */
    public function newsletterSubscribe(Request $request)
    {
        $request->validate(['email' => 'required|email|max:254']);

        // ── Integrate your newsletter provider here ──────────────
        // e.g. Mailchimp, ConvertKit, a subscribers table, etc.
        // Example — save to a `newsletter_subscribers` table:
        // \DB::table('newsletter_subscribers')->updateOrInsert(    
        //     ['email' => $request->email],
        //     ['subscribed_at' => now(), 'status' => 'active']
        // );

        return response()->json([
            'success' => true,
            'message' => 'You\'re subscribed! Welcome to Kawach Insights.',
        ]);
    }
}