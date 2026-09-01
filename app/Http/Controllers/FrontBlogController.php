<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\BlogComment;
use App\Models\BlogLike;
use App\Models\NewsletterSubscriber;
use App\Models\BlogViewLog;
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
    public function show(Request $request, string $slug)
    {
        $post = Blog::with(['category', 'tags', 'seo', 'author'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        Blog::where('id', $post->id)->increment('views');

        // Timestamped view event — powers the real "Views — Last 30 Days"
        // chart in the admin Stats modal. The `views` column above is just
        // a running total; this is what makes a daily trend possible at all.
        // `viewed_at` is set explicitly from PHP's now() rather than left to
        // the column's DB-level default — the DB server's clock was found to
        // differ from PHP's app timezone by several hours in this
        // environment, which would otherwise bucket views into the wrong day.
        BlogViewLog::create(['blog_id' => $post->id, 'viewed_at' => now()]);

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

        // ── Likes & Comments — always a live COUNT(), never a cached number ──
        $likeCount = $post->likes()->count();
        $liked = $post->likes()->where('ip_address', $request->ip())->exists();
        $comments = $post->comments()->approved()->oldest()->get();
        $commentCount = $comments->count();

        return view('pages.child.blog_details', compact('post', 'related', 'prev', 'next', 'likeCount', 'liked', 'comments', 'commentCount'));
    }

    /**
     * POST /blog/{slug}/like
     *
     * Anonymous, one-per-visitor (tracked by IP), toggleable like.
     * The unique(blog_id, ip_address) DB constraint is the real source of
     * truth — this just adds/removes the row and reports the fresh count.
     */
    public function toggleLike(Request $request, string $slug)
    {
        $post = Blog::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $ip = $request->ip();

        $existing = BlogLike::where('blog_id', $post->id)
            ->where('ip_address', $ip)
            ->first();

        if ($existing) {
            $existing->delete();
            $liked = false;
        } else {
            BlogLike::create([
                'blog_id' => $post->id,
                'ip_address' => $ip,
            ]);
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'count' => $post->likes()->count(),
        ]);
    }

    /**
     * POST /blog/{slug}/comment
     *
     * Comments are moderated: every submission is stored as 'pending' and
     * only shown publicly once an admin approves it from KawachAdmin.
     */
    public function storeComment(Request $request, string $slug)
    {
        $post = Blog::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Honeypot — a hidden-but-focusable field real visitors never fill in.
        // Bots that auto-fill every input trip it; we pretend success so we
        // don't tip them off that they were caught.
        if ($request->filled('website')) {
            return back()->with('success', 'Thanks! Your comment is awaiting approval and will appear once reviewed.');
        }

        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'comment' => 'required|string|min:3|max:2000',
        ]);

        BlogComment::create([
            'blog_id'    => $post->id,
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'comment'    => $validated['comment'],
            'status'     => 'pending',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Thanks! Your comment is awaiting approval and will appear once reviewed.');
    }

    /**
     * POST /newsletter/subscribe
     */
    public function newsletterSubscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc|max:254',
            'source' => 'nullable|string|max:50',
        ]);

        $subscriber = NewsletterSubscriber::where('email', $validated['email'])->first();

        if ($subscriber && $subscriber->status === 'active') {
            return response()->json([
                'success' => true,
                'message' => "You're already subscribed to Kawach Insights!",
            ]);
        }

        NewsletterSubscriber::updateOrCreate(
            ['email' => $validated['email']],
            [
                'status' => 'active',
                'source' => $validated['source'] ?? 'blog',
                'ip_address' => $request->ip(),
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => "You're subscribed! Welcome to Kawach Insights.",
        ]);
    }
}