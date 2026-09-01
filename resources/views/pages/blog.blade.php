<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Blog & Insights | Kawach Technology';
    $seoDescription = 'Expert articles on AI, cloud computing, software development, and digital transformation from the Kawach Technology team.';
    $seoKeywords    = 'software development blog, AI insights, cloud computing, DevOps, tech articles, Kawach Technology';
    $seoCanonical   = url('/blog');
    $seoImage       = asset('assets/images/kawach.png');
@endphp

<style>
.page-hero, .blog-page-hero{
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding: 80px 0 70px;
    background:  url('{{ asset("assets/images/kawach_main_bg.png") }}')  center center / cover no-repeat;
}

/* Extra blur overlay */
.page-hero::after,
.blog-page-hero::after{
    content:"";
    position:absolute;
    inset:0;
    z-index:1;
}

/* Animation layer */
.hero-bg-layer{
    position:absolute;
    inset:0;
    z-index:2;
    pointer-events:none;
}

/* Content */
.page-hero .container,
.blog-page-hero .container{
    position:relative;
    z-index:3;
}

/* =========================================================
   TYPOGRAPHY
========================================================= */

.page-hero-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:rgba(33,150,243,.15);
    border:1px solid rgba(33,150,243,.35);
    border-radius:20px;
    padding:6px 15px;
    font-size:.78rem;
    font-weight:700;
    color:#90c8f8;
    margin-bottom:18px;
    backdrop-filter: blur(8px);
}

.page-hero-title{
    font-family:'Nunito',sans-serif;
    font-size:clamp(2.3rem,5vw,4rem);
    font-weight:900;
    line-height:1.1;
    color:#fff;
    margin-bottom:18px;
}

.page-hero-title span{
    color:var(--accent-blue);
}

.page-hero-subtitle{
    color:#c7d7ea;
    font-size:1.05rem;
    line-height:1.7;
    max-width:620px;
}

.hero-stat-chip{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.12);
    backdrop-filter: blur(10px);
    border-radius:18px;
    padding:18px 22px;
    min-width:120px;
    text-align:center;
}

.hero-stat-val{
    color:#fff;
    font-size:1.6rem;
    font-weight:800;
    line-height:1;
    margin-bottom:6px;
}

.hero-stat-label{
    color:#9fb3c8;
    font-size:.82rem;
    font-weight:600;
}

.code-line, .circuit-node, .data-packet, .binary-col{
    opacity:.75;
    filter:drop-shadow(0 0 10px rgba(59,130,246,.55));
}

@media(max-width:991px){
    .page-hero,
    .blog-page-hero{
        min-height:auto;
        padding:90px 0 70px;
    }
    .page-hero-title{
        font-size:2.5rem;
    }
    .page-hero-subtitle{
        font-size:.98rem;
    }
}
@media(max-width:767px){
    .page-hero, .blog-page-hero{
        padding:80px 0 60px;
    }
    .page-hero-title{
        font-size:2rem;
    }
    .page-hero-subtitle{
        font-size:.93rem;
    }
    .hero-stat-chip{
        min-width:100px;
        padding:14px 16px;
    }
    .hero-stat-val{
        font-size:1.3rem;
    }
}
</style>

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Blog",
  "name": "Kawach Technology Blog",
  "url": "{{ url('/blog') }}",
  "description": "Expert articles on AI, cloud computing, software development, and digital transformation.",
  "publisher": {
    "@type": "Organization",
    "name": "Kawach Technology",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('assets/images/kawach.png') }}"
  }
}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7J267VF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@include('layouts.navbar')

{{-- ═══════════════════════════════════════════════════════════
     PAGE HERO
════════════════════════════════════════════════════════════ --}}
<section class="blog-page-hero">

  <div class="hero-bg-layer">
    <div class="code-line cl-1"></div><div class="code-line cl-2"></div><div class="code-line cl-3"></div>
    <div class="code-line cl-4"></div><div class="code-line cl-5"></div><div class="code-line cl-6"></div>
    <div class="code-line cl-7"></div><div class="code-line cl-8"></div><div class="code-line cl-9"></div>
    <div class="code-line cl-10"></div><div class="code-line cl-11"></div><div class="code-line cl-12"></div>
    <div class="code-line cl-13"></div><div class="code-line cl-14"></div><div class="code-line cl-15"></div>
    <div class="circuit-node cn-1"></div><div class="circuit-node cn-2"></div><div class="circuit-node cn-3"></div>
    <div class="circuit-node cn-4"></div><div class="circuit-node cn-5"></div><div class="circuit-node cn-6"></div>
    <div class="circuit-node cn-7"></div><div class="circuit-node cn-8"></div><div class="circuit-node cn-9"></div><div class="circuit-node cn-10"></div>
    <div class="data-packet dp-blue  dp-1"></div><div class="data-packet dp-green dp-2"></div>
    <div class="data-packet dp-white dp-3"></div><div class="data-packet dp-blue  dp-4"></div>
    <div class="data-packet dp-green dp-5"></div><div class="data-packet dp-white dp-6"></div>
    <div class="data-packet dp-blue  dp-7"></div><div class="data-packet dp-green dp-8"></div>
    <div class="binary-col bc-1">1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-2">0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-3">1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-4">0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-5">1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0</div>
    <div class="binary-col bc-6">0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1</div>
    <div class="hero-scan-line"></div>
  </div>

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <div class="page-hero-badge"><i class="fas fa-rss"></i> Insights &amp; Updates</div>
        <h1 class="page-hero-title">Our <span>Blog</span> &amp; Insights</h1>
        <p class="page-hero-subtitle">
          Stay ahead of the curve with expert articles on AI, cloud computing, software development, and digital transformation.
        </p>
      </div>
      <div class="col-lg-4 d-none d-lg-flex justify-content-end align-items-center">
        <div style="display:flex;gap:14px;flex-wrap:wrap;justify-content:flex-end;">
          <div class="hero-stat-chip">
            <div class="hero-stat-val">{{ $counts['all'] }}+</div>
            <div class="hero-stat-label">Articles</div>
          </div>
          <div class="hero-stat-chip">
            <div class="hero-stat-val">{{ $categories->count() }}</div>
            <div class="hero-stat-label">Categories</div>
          </div>
          <div class="hero-stat-chip">
            <div class="hero-stat-val">{{ number_format($counts['views'] / 1000, 0) }}k</div>
            <div class="hero-stat-label">Readers</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     FILTER BAR
════════════════════════════════════════════════════════════ --}}
<div class="filter-bar">
  <div class="container">
    <form method="GET" action="{{ url('/blog') }}" id="filterForm" class="filter-form">
      <div class="filter-left">
        <span class="filter-label">Filter:</span>
        {{-- All --}}
        <a href="{{ url('/blog') }}"
          class="filter-pill {{ !request('category') && !request('search') ? 'active' : '' }}">
          All
        </a>
        {{-- Dynamic category pills --}}
        @foreach($categories as $cat)
        <a href="{{ url('/blog') }}?category={{ $cat->slug }}"
          class="filter-pill {{ request('category') === $cat->slug ? 'active' : '' }}">
          {{ $cat->name }}
        </a>
        @endforeach
      </div>
      {{-- Search --}}
      <div class="search-wrap">
        <i class="fas fa-search"></i>
        <input type="text" name="search" class="search-input" placeholder="Search articles…" value="{{ request('search') }}" id="searchInput"/>
        @if(request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}"/>
        @endif
      </div>
    </form>
  </div>
</div>

{{-- ═══════════════════════════════════════════════════════════
     BLOG SECTION
════════════════════════════════════════════════════════════ --}}
<section class="blog-section">
  <div class="container">
    <div class="text-center">
      <div class="section-divider"></div>
      <h2 class="section-title">
        @if(request('search'))
          Search: "{{ request('search') }}"
        @elseif(request('category') && $currentCategory)
          {{ $currentCategory->name }}
        @else
          Latest Articles
        @endif
      </h2>
      <p class="section-subtitle">
        @if($posts->total() > 0)
          Showing {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }} articles
        @else
          No articles found
        @endif
      </p>
    </div>

    {{-- ── FEATURED POST (only on first page with no filters) ── --}}
    @if(!request('search') && !request('category') && $posts->currentPage() === 1 && $featuredPost)
    <div class="blog-featured">
      {{-- Thumbnail --}}
      <div class="blog-featured-thumb {{ $featuredPost->category ? 'thumb-' . Str::slug($featuredPost->category->name) : 'thumb-dev' }}">
        @if($featuredPost->featured_image)
          <img src="{{ config('app.images_path') . $featuredPost->featured_image }}" title="{{ $featuredPost->image_title }}"
               alt="{{ $featuredPost->title }}"
               class="featured-thumb-img"
               loading="eager"/>
        @else
          <div class="thumb-pattern"></div>
          <div class="thumb-inner">
            <i class="fas fa-newspaper thumb-icon thumb-icon-lg"></i>
          </div>
        @endif
        <div class="thumb-badge-icon">Featured</div>
      </div>

      {{-- Content --}}
      <div class="blog-featured-body">
        @if($featuredPost->category)
        <span class="blog-featured-badge">{{ $featuredPost->category->name }}</span>
        @endif

        <h2 class="blog-featured-title">{{ $featuredPost->title }}</h2>

        <p class="blog-featured-excerpt">
          {{ $featuredPost->excerpt ?? Str::limit(strip_tags($featuredPost->content), 220) }}
        </p>

        <div class="blog-meta">
          <div class="blog-author">
            <div class="author-avatar" style="background:#1a73e8;">
              {{ strtoupper(substr($featuredPost->author_name ?? 'K', 0, 2)) }}
            </div>
            <span class="author-name">{{ $featuredPost->author_name ?? 'Kawach Team' }}</span>
          </div>
          <span class="blog-date">
            <i class="fas fa-calendar-alt"></i>
            {{ \Carbon\Carbon::parse($featuredPost->published_at)->format('M d, Y') }}
          </span>
          @if($featuredPost->reading_time)
          <span class="blog-readtime">
            <i class="fas fa-clock"></i> {{ $featuredPost->reading_time }} min read
          </span>
          @endif
        </div>

        <a href="{{ route('blog.show', $featuredPost->slug) }}" class="btn-read">
          Read Article <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
    @endif

    {{-- ── BLOG GRID ─────────────────────────────────────────── --}}
    @if($posts->count())
    <div class="row g-4" id="blogGrid">
      @foreach($posts as $post)

      {{-- Skip featured on first page (already shown above) --}}
      @if(!request('search') && !request('category') && $posts->currentPage() === 1 && isset($featuredPost) && $post->id === $featuredPost->id)
        @continue
      @endif

      <div class="col-lg-4 col-md-6">
        <article class="blog-card" itemscope itemtype="https://schema.org/BlogPosting">
          <meta itemprop="headline"     content="{{ $post->title }}"/>
          <meta itemprop="description"  content="{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 160) }}"/>
          <meta itemprop="datePublished" content="{{ optional($post->published_at)->toISOString() }}"/>
          <meta itemprop="url"          content="{{ route('blog.show', $post->slug) }}"/>

          {{-- Thumbnail --}}
          <a href="{{ route('blog.show', $post->slug) }}" tabindex="-1" aria-hidden="true">
            <div class="blog-card-thumb {{ $post->category ? 'thumb-' . Str::slug($post->category->name) : 'thumb-dev' }}">
              @if($post->featured_image)
                <img src="{{ config('app.images_path') . $post->featured_image }}"
                     alt="{{ $post->title }}"
                     class="card-thumb-img"
                     loading="lazy"
                     itemprop="image"/>
              @else
                <div class="thumb-pattern"></div>
                <div class="thumb-inner">
                  <i class="{{ $categoryIcons[$post->category->slug ?? ''] ?? 'fas fa-newspaper' }} thumb-icon"></i>
                </div>
                @if($post->category)
                  <div class="thumb-badge-icon">{{ Str::limit($post->category->name, 8) }}</div>
                @endif
              @endif
            </div>
          </a>

          {{-- Body --}}
          <div class="blog-card-body">
            @if($post->category)
            <span class="blog-card-badge">{{ $post->category->name }}</span>
            @endif

            <h3 class="blog-card-title" itemprop="name">
              <a href="{{ route('blog.show', $post->slug) }}" class="card-title-link">
                {{ $post->title }}
              </a>
            </h3>

            <p class="blog-card-excerpt">
              {{ Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}
            </p>

            {{-- Tags --}}
            @if($post->tags && $post->tags->count())
            <div class="blog-tags">
              @foreach($post->tags->take(3) as $tag)
              <a href="{{ url('/blog') }}?tag={{ $tag->slug }}" class="blog-tag">#{{ $tag->name }}</a>
              @endforeach
            </div>
            @endif

            <div class="blog-card-footer">
              <div class="blog-meta">
                <div class="blog-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                  <div class="author-avatar"
                       style="background:{{ $avatarColors[($loop->index % count($avatarColors))] }};">
                    {{ strtoupper(substr($post->author_name ?? 'K', 0, 2)) }}
                  </div>
                  <span class="author-name" itemprop="name">
                    {{ $post->author_name ?? 'Kawach Team' }}
                  </span>
                </div>
                @if($post->reading_time)
                <span class="blog-readtime">
                  <i class="fas fa-clock"></i> {{ $post->reading_time }} min
                </span>
                @endif
              </div>
              <a href="{{ route('blog.show', $post->slug) }}" class="btn-read-sm" aria-label="Read {{ $post->title }}">
                Read <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>
      </div>

      @endforeach
    </div>{{-- /blogGrid --}}

    @else
    {{-- Empty state --}}
    <div class="empty-state">
      <div class="empty-icon"><i class="fas fa-search"></i></div>
      <h3 class="empty-title">No articles found</h3>
      <p class="empty-desc">
        @if(request('search'))
          No results for "<strong>{{ request('search') }}</strong>". Try a different keyword.
        @elseif(request('category'))
          No articles in this category yet. Check back soon.
        @else
          No published articles yet. Check back soon.
        @endif
      </p>
      <a href="{{ url('/blog') }}" class="btn-empty-reset">
        <i class="fas fa-times"></i> Clear Filter
      </a>
    </div>
    @endif

    {{-- ── PAGINATION ────────────────────────────────────────── --}}
    @if($posts->hasPages())
    <div class="pagination-wrap">
      {{-- Prev --}}
      @if($posts->onFirstPage())
        <span class="page-btn page-btn-disabled"><i class="fas fa-chevron-left" style="font-size:.7rem;"></i></span>
      @else
        <a href="{{ $posts->previousPageUrl() }}" class="page-btn" aria-label="Previous page">
          <i class="fas fa-chevron-left" style="font-size:.7rem;"></i>
        </a>
      @endif

      {{-- Page numbers --}}
      @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
        @if($page == $posts->currentPage())
          <span class="page-btn active" aria-current="page">{{ $page }}</span>
        @elseif($page == 1 || $page == $posts->lastPage() || abs($page - $posts->currentPage()) <= 2)
          <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
        @elseif(abs($page - $posts->currentPage()) == 3)
          <span class="page-btn page-ellipsis" style="cursor:default;border:none;background:none;color:var(--text-muted);">…</span>
        @endif
      @endforeach

      {{-- Next --}}
      @if($posts->hasMorePages())
        <a href="{{ $posts->nextPageUrl() }}" class="page-btn" aria-label="Next page">
          <i class="fas fa-chevron-right" style="font-size:.7rem;"></i>
        </a>
      @else
        <span class="page-btn page-btn-disabled"><i class="fas fa-chevron-right" style="font-size:.7rem;"></i></span>
      @endif
    </div>
    @endif

  </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     NEWSLETTER
════════════════════════════════════════════════════════════ --}}
<section class="newsletter-section">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <h2 class="newsletter-title">Never Miss an Insight</h2>
        <p class="newsletter-sub">
          Join {{ number_format($counts['views']) }}+ tech readers who get our best articles delivered weekly.
        </p>
      </div>
      <div class="col-lg-6">
        <form class="newsletter-form" id="newsletterForm" onsubmit="handleNewsletter(event)">
          @csrf
          <input type="email"
                 name="email"
                 class="newsletter-input"
                 placeholder="Enter your email address"
                 required
                 id="newsletterEmail"/>
          <button type="submit" class="btn-subscribe" id="newsletterBtn">
            Subscribe <i class="fas fa-paper-plane ms-1" style="font-size:.8rem;"></i>
          </button>
        </form>
        <p class="newsletter-note" id="newsletterMsg" style="display:none;"></p>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════════════════════
     CTA
════════════════════════════════════════════════════════════ --}}
<section class="cta-section text-center">
  <div class="container" style="position:relative;">
    <h2 class="cta-title">Ready to Transform Your Business?</h2>
    <p class="cta-subtitle">Let's discuss your project and find the best solution</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <button type="button" class="btn-cta-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
        <i class="fas fa-comments"></i> Get a Free Consultation
      </button>
      <button type="button" class="btn-cta-outline" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</button>
    </div>
  </div>
</section>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  // ── Search with debounce ────────────────────────────────────────
  let searchTimer;
  document.getElementById('searchInput').addEventListener('input', function () {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => {
      document.getElementById('filterForm').submit();
    }, 500);
  });

  // ── Newsletter ──────────────────────────────────────────────────
  function handleNewsletter(e) {
    e.preventDefault();
    const btn = document.getElementById('newsletterBtn');
    const msg = document.getElementById('newsletterMsg');
    const email = document.getElementById('newsletterEmail').value;

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subscribing…';

    fetch('{{ url("/newsletter/subscribe") }}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ email })
    })
    .then(r => r.json())
    .then(data => {
      msg.style.display = 'block';
      if (data.success) {
        msg.innerHTML = '<i class="fas fa-check" style="color:#4caf50;"></i> ' + (data.message || 'You\'re subscribed!');
        msg.style.color = '#4caf50';
        document.getElementById('newsletterEmail').value = '';
      } else {
        msg.innerHTML = '<i class="fas fa-times" style="color:#e53935;"></i> ' + (data.message || 'Something went wrong.');
        msg.style.color = '#e53935';
      }
      btn.disabled = false;
      btn.innerHTML = 'Subscribe <i class="fas fa-paper-plane ms-1" style="font-size:.8rem;"></i>';
    })
    .catch(() => {
      msg.style.display = 'block';
      msg.innerHTML = '<i class="fas fa-times" style="color:#e53935;"></i> Network error. Please try again.';
      msg.style.color = '#e53935';
      btn.disabled = false;
      btn.innerHTML = 'Subscribe <i class="fas fa-paper-plane ms-1" style="font-size:.8rem;"></i>';
    });
  }
</script>
</body>
</html>