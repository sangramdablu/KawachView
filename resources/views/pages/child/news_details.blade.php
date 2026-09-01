<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = ($post->seo?->og_title ?? $post->meta_title ?? $post->title) . ' — Kawach Technology Newsroom';
    $seoDescription = $post->seo?->og_description ?? $post->meta_description;

    // Merge EVERY dynamic keyword source the admin can set for this article —
    // manual SEO keywords, the focus keyword, tags, and category — into one
    // deduplicated list. A ??-fallback chain would silently drop whichever
    // sources aren't the first non-empty one; search engines and AI answer
    // engines both benefit from the fuller topical signal, not just one field.
    $seoKeywords = collect([
            $post->seo?->meta_keywords,
            $post->focus_keyword,
            $post->tags->pluck('name')->implode(','),
            $post->category?->name,
        ])
        ->filter()
        ->flatMap(fn ($k) => explode(',', $k))
        ->map(fn ($k) => trim($k))
        ->filter()
        ->unique()
        ->values()
        ->implode(', ');

    $seoRobots      = $post->seo?->robots ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    $seoCanonical   = $post->seo?->canonical_url ?? url()->current();
    $seoImage       = config('app.images_path') . ($post->seo?->og_image ?? $post->seo?->twitter_image ?? $post->featured_image);
    $seoType        = 'article';
    $twitterCard    = $post->seo?->twitter_card ?? 'summary_large_image';
@endphp

@push('schema')
@php
    // PHP array + json_encode() — NOT a raw JSON-LD <script> block with a
    // literal "@context" key. That literal string collides with Laravel's
    // real @context Blade directive (the Context facade) and silently
    // produces invalid JSON unless escaped as "@@context". Building the
    // array in PHP sidesteps the problem entirely since Blade never parses
    // the string as template text — same approach as layouts/head.blade.php.
    //
    // NewsArticle is deliberately used here (not BlogPosting) — it is the
    // correct schema.org type for a company newsroom/press-release page.
    $schema = [
        "@context" => "https://schema.org",
        "@type" => $post->seo?->schema_type ?? "NewsArticle",
        "headline" => $post->title,
        "description" => strip_tags($post->meta_description ?? $post->excerpt ?? ''),
        "image" => config('app.images_path') . $post->featured_image,
        "datePublished" => $post->published_at?->toIso8601String(),
        "dateModified" => $post->updated_at?->toIso8601String(),
        "keywords" => $seoKeywords,
        "articleSection" => $post->category?->name,
        "wordCount" => str_word_count(strip_tags($post->content)),

        // Explicit topical entity for the admin-set focus keyword — a
        // stronger, more structured AEO/GEO signal than keywords alone for
        // what this specific article is "about" when an AI answer engine
        // is deciding whether to cite it for a given topic.
        ...($post->focus_keyword ? [
            "about" => [
                "@type" => "Thing",
                "name" => $post->focus_keyword,
            ],
        ] : []),

        "author" => [
            "@type" => "Organization",
            "name" => "Kawach Technology",
            "url" => url('/'),
        ],

        "publisher" => [
            "@type" => "Organization",
            "name" => "Kawach Technology",
            "url" => url('/'),
            "sameAs" => array_values(array_filter([
                config('app.linkedin'),
                config('app.insta'),
            ])),
            "logo" => [
                "@type" => "ImageObject",
                "url" => asset('assets/images/kawach.png'),
            ],
        ],

        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => url()->current(),
        ],
    ];

    if ($post->external_source_name) {
        $schema['isBasedOn'] = array_filter([
            "@type" => "CreativeWork",
            "name" => $post->external_source_name,
            "url" => $post->external_source_url,
        ]);
    }

    $breadcrumbSchema = [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
            ["@type" => "ListItem", "position" => 2, "name" => "Newsroom", "item" => route('newsroom')],
            ["@type" => "ListItem", "position" => 3, "name" => $post->title, "item" => url()->current()],
        ],
    ];
@endphp

<script type="application/ld+json">
  {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
  {!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')

<style>
/* ── NEWS DETAIL — press-release identity, distinct from Blog's article page ── */

.nd-topbar{
    background:var(--dark-navy, #0d1b3e);
    padding:14px 0;
}

.nd-topbar .container{
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
}

.nd-topbar a{
    color:rgba(255,255,255,.6);
    font-size:.82rem;
    text-decoration:none;
    font-weight:600;
}

.nd-topbar a:hover{
    color:#fff;
}

.nd-topbar .sep{
    color:rgba(255,255,255,.3);
    font-size:.7rem;
}

.nd-topbar .current{
    color:#fff;
    font-size:.82rem;
    font-weight:600;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    max-width:420px;
}

/* ── RELEASE HEADER ── */
.nd-header{
    background:#fff;
    border-bottom:1px solid var(--border-light, #e2e8f0);
    padding:44px 0 38px;
}

.nd-release-label{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-size:.74rem;
    font-weight:800;
    letter-spacing:1px;
    text-transform:uppercase;
    color:var(--primary-blue, #1a73e8);
    background:rgba(26,115,232,.08);
    padding:6px 14px;
    border-radius:5px;
    margin-bottom:18px;
}

.nd-tag-row{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
    margin-bottom:18px;
}

.nd-tag-category{
    font-size:.75rem;
    font-weight:700;
    color:var(--light-navy, #1f3a6e);
    background:var(--bg-light, #f4f6fb);
    border:1px solid var(--border-light, #e2e8f0);
    padding:5px 12px;
    border-radius:5px;
}

.nd-tag-source{
    display:inline-flex;
    align-items:center;
    gap:6px;
    font-size:.75rem;
    font-weight:700;
    color:#9333ea;
    background:#f3e8ff;
    padding:5px 12px;
    border-radius:5px;
    text-decoration:none;
}

.nd-title{
    font-size:clamp(1.6rem,3.4vw,2.5rem);
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    line-height:1.3;
    max-width:900px;
    margin-bottom:14px;
}

/* Deck / standfirst — the excerpt, shown larger + lighter under the
   headline, standard broadsheet/press convention for a one-line summary. */
.nd-deck{
    font-size:1.15rem;
    color:var(--text-muted, #6c757d);
    line-height:1.6;
    max-width:760px;
    margin-bottom:22px;
}

.nd-dateline{
    display:flex;
    align-items:center;
    gap:18px;
    flex-wrap:wrap;
    padding-top:20px;
    border-top:1px solid var(--border-light, #e2e8f0);
}

.nd-byline{
    display:flex;
    align-items:center;
    gap:12px;
}

.nd-byline-mark{
    width:44px;
    height:44px;
    border-radius:10px;
    background:linear-gradient(135deg,var(--primary-blue,#1a73e8),var(--accent-blue,#2196f3));
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-weight:800;
    font-size:.9rem;
    flex-shrink:0;
}

.nd-byline-name{
    font-weight:700;
    font-size:.92rem;
    color:var(--text-dark, #1a1a2e);
}

.nd-byline-role{
    font-size:.78rem;
    color:var(--text-muted, #6c757d);
}

.nd-meta-pill{
    display:inline-flex;
    align-items:center;
    gap:6px;
    font-size:.82rem;
    color:var(--text-muted, #6c757d);
    font-weight:600;
}

.nd-meta-pill i{
    color:var(--primary-blue, #1a73e8);
    font-size:.78rem;
}

/* ── ARTICLE IMAGE — deliberately small, like a press-photo/figure, not a
   full-bleed hero. Professional news portals (AP, Reuters, PR Newswire)
   keep the lead image modest and captioned, not dominant. ── */
.nd-image-figure{
    max-width:420px;
    margin:0 auto 6px;
    padding:0 24px;
}

.nd-image{
    width:100%;
    max-height:260px;
    object-fit:cover;
    border-radius:10px;
    margin-top:28px;
    box-shadow:0 10px 24px rgba(15,23,42,.1);
    display:block;
}

.nd-image-caption{
    font-size:.78rem;
    color:var(--text-muted, #6c757d);
    text-align:center;
    margin-top:8px;
    padding:0 24px;
    font-style:italic;
}

/* ── BODY LAYOUT ── */
.nd-layout{
    background:var(--bg-light, #f4f6fb);
    padding:50px 0 90px;
}

.nd-body-card{
    background:#fff;
    border:1px solid var(--border-light, #e2e8f0);
    border-radius:16px;
    padding:44px 48px;
}

.nd-dateline-inline{
    font-weight:700;
    color:var(--text-dark, #1a1a2e);
    text-transform:uppercase;
    font-size:.88rem;
    letter-spacing:.3px;
    margin-bottom:22px;
}

.nd-body{
    color:var(--text-dark, #1a1a2e);
    font-size:1.02rem;
    line-height:1.85;
}

.nd-body p{
    margin-bottom:20px;
}

/* Lead paragraph — set slightly larger, standard press-release convention
   for the opening who/what/when/where/why paragraph. */
.nd-body > p:first-of-type{
    font-size:1.12rem;
    font-weight:500;
    color:var(--text-dark, #1a1a2e);
}

.nd-body h2, .nd-body h3{
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    margin:32px 0 14px;
}

.nd-source-note{
    display:flex;
    align-items:center;
    gap:12px;
    background:#f3e8ff;
    border:1px solid #e9d5ff;
    border-radius:12px;
    padding:16px 20px;
    margin-top:28px;
    font-size:.9rem;
    color:#6b21a8;
}

.nd-source-note a{
    color:#7c1fd1;
    font-weight:700;
}

.nd-tags-row{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
    margin-top:32px;
    padding-top:24px;
    border-top:1px solid var(--border-light, #e2e8f0);
}

.nd-tag-pill{
    font-size:.8rem;
    font-weight:600;
    color:var(--primary-blue, #1a73e8);
    background:rgba(26,115,232,.08);
    padding:6px 14px;
    border-radius:20px;
    text-decoration:none;
}

.nd-share-row{
    display:flex;
    align-items:center;
    gap:12px;
    margin-top:28px;
}

.nd-share-label{
    font-size:.82rem;
    font-weight:700;
    color:var(--text-muted, #6c757d);
}

.nd-share-btn{
    width:36px;
    height:36px;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:var(--bg-light, #f4f6fb);
    color:var(--text-dark, #1a1a2e);
    text-decoration:none;
    font-size:.85rem;
    transition:.2s;
}

.nd-share-btn:hover{
    background:var(--primary-blue, #1a73e8);
    color:#fff;
}

.nd-back-link{
    display:inline-flex;
    align-items:center;
    gap:8px;
    margin-top:28px;
    font-weight:700;
    font-size:.9rem;
    color:var(--primary-blue, #1a73e8);
    text-decoration:none;
}

/* ── SIDEBAR ── */
.nd-sidebar-card{
    background:#fff;
    border:1px solid var(--border-light, #e2e8f0);
    border-radius:16px;
    padding:24px;
    margin-bottom:20px;
}

.nd-sidebar-heading{
    font-size:.78rem;
    font-weight:800;
    text-transform:uppercase;
    letter-spacing:.6px;
    color:var(--text-muted, #6c757d);
    margin-bottom:16px;
    padding-bottom:12px;
    border-bottom:1px solid var(--border-light, #e2e8f0);
}

.nd-wire-item{
    display:flex;
    gap:14px;
    padding:12px 0;
    border-bottom:1px solid var(--border-light, #e2e8f0);
    text-decoration:none;
}

.nd-wire-item:last-child{
    border-bottom:none;
    padding-bottom:0;
}

.nd-wire-date{
    flex-shrink:0;
    width:42px;
    text-align:center;
}

.nd-wire-date .day{
    font-size:1.05rem;
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    line-height:1;
}

.nd-wire-date .mon{
    font-size:.65rem;
    font-weight:700;
    text-transform:uppercase;
    color:var(--text-muted, #6c757d);
}

.nd-wire-title{
    font-size:.86rem;
    font-weight:700;
    color:var(--text-dark, #1a1a2e);
    line-height:1.4;
}

.nd-press-card{
    background:var(--dark-navy, #0d1b3e);
    border-radius:16px;
    padding:26px 24px;
    text-align:center;
}

.nd-press-card i{
    font-size:1.4rem;
    color:#8fc3ff;
    margin-bottom:12px;
    display:block;
}

.nd-press-card h4{
    color:#fff;
    font-size:1rem;
    font-weight:700;
    margin-bottom:6px;
}

.nd-press-card p{
    color:rgba(255,255,255,.6);
    font-size:.84rem;
    margin-bottom:16px;
}

.nd-press-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:var(--primary-blue, #1a73e8);
    color:#fff;
    font-weight:700;
    font-size:.86rem;
    padding:10px 20px;
    border-radius:8px;
    text-decoration:none;
}

@media(max-width:767px){
    .nd-body-card{ padding:28px 22px; }
    .nd-dateline{ flex-direction:column; align-items:flex-start; gap:12px; }
    .nd-topbar .current{ display:none; }
}
</style>

<body>
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

@include('layouts.navbar')

{{-- ═══ BREADCRUMB ═══ --}}
<div class="nd-topbar">
  <div class="container">
    <a href="{{ url('/') }}">Home</a>
    <span class="sep"><i class="fas fa-chevron-right"></i></span>
    <a href="{{ route('newsroom') }}">Newsroom</a>
    <span class="sep"><i class="fas fa-chevron-right"></i></span>
    <span class="current">{{ $post->title }}</span>
  </div>
</div>

{{-- ═══ RELEASE HEADER ═══ --}}
<section class="nd-header">
  <div class="container">
    <span class="nd-release-label"><i class="fas fa-satellite-dish"></i>
      {{ $post->external_source_name ? 'Media Coverage' : 'Company Announcement' }}
    </span>

    <div class="nd-tag-row">
      @if($post->category)
        <span class="nd-tag-category">{{ $post->category->name }}</span>
      @endif
      @if($post->external_source_name)
        @if($post->external_source_url)
        <a href="{{ $post->external_source_url }}" target="_blank" rel="noopener" class="nd-tag-source">
          <i class="fas fa-external-link-alt"></i> Featured in {{ $post->external_source_name }}
        </a>
        @else
        <span class="nd-tag-source"><i class="fas fa-external-link-alt"></i> Featured in {{ $post->external_source_name }}</span>
        @endif
      @endif
    </div>

    <h1 class="nd-title">{{ $post->title }}</h1>

    @if($post->excerpt)
    <p class="nd-deck">{{ $post->excerpt }}</p>
    @endif

    <div class="nd-dateline">
      <div class="nd-byline">
        @if($post->author?->avatar)
          <img src="{{ $post->author->avatar_url }}" alt="{{ $post->author->name }}" class="nd-byline-mark" style="object-fit:cover;">
        @elseif($post->author)
          <div class="nd-byline-mark">{{ $post->author->initials }}</div>
        @else
          <div class="nd-byline-mark">KT</div>
        @endif
        <div>
          <div class="nd-byline-name">{{ $post->author?->name ?? 'Kawach Technology' }}</div>
          <div class="nd-byline-role">{{ $post->author?->designation ?? 'Corporate Communications' }}</div>
        </div>
      </div>
      <span class="nd-meta-pill"><i class="fas fa-calendar-alt"></i> {{ $post->published_at->format('F d, Y') }}</span>
      @if($post->reading_time)
      <span class="nd-meta-pill"><i class="fas fa-clock"></i> {{ $post->reading_time }} min read</span>
      @endif
      <span class="nd-meta-pill"><i class="fas fa-eye"></i> {{ number_format($post->views) }} views</span>
    </div>
  </div>

  @if($post->featured_image)
  <div class="nd-image-figure">
    <img src="{{ config('app.images_path') . $post->featured_image }}" loading="eager"
         alt="{{ $post->image_alt ?? $post->title }}" title="{{ $post->image_title ?? $post->title }}" class="nd-image">
  </div>
  @if($post->image_caption)
  <p class="nd-image-caption">{{ $post->image_caption }}</p>
  @endif
  @endif
</section>

{{-- ═══ BODY LAYOUT ═══ --}}
<div class="nd-layout">
  <div class="container">
    <div class="row g-4">

      <div class="col-lg-8">
        <div class="nd-body-card">

          @if(!$post->external_source_name)
          <div class="nd-dateline-inline">
            NEW DELHI, INDIA — {{ $post->published_at->format('F d, Y') }}
          </div>
          @endif

          <div class="nd-body">
            {!! $post->content !!}
          </div>

          @if($post->external_source_name && $post->external_source_url)
          <div class="nd-source-note">
            <i class="fas fa-external-link-alt"></i>
            <span>This coverage originally appeared in <a href="{{ $post->external_source_url }}" target="_blank" rel="noopener">{{ $post->external_source_name }}</a>.</span>
          </div>
          @endif

          @if($post->tags->count())
          <div class="nd-tags-row">
            @foreach($post->tags as $tag)
              <a href="{{ url('/newsroom') }}?tag={{ $tag->slug }}" class="nd-tag-pill">#{{ $tag->name }}</a>
            @endforeach
          </div>
          @endif

          <div class="nd-share-row">
            <span class="nd-share-label">Share this release</span>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="nd-share-btn"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" class="nd-share-btn"><i class="fab fa-twitter"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="nd-share-btn"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="nd-share-btn" id="ndCopyLink"><i class="fas fa-link"></i></a>
          </div>

          <a href="{{ route('newsroom') }}" class="nd-back-link"><i class="fas fa-arrow-left"></i> Back to Newsroom</a>
        </div>
      </div>

      <div class="col-lg-4">

        @if($related->count())
        <div class="nd-sidebar-card">
          <div class="nd-sidebar-heading">More From The Newsroom</div>
          @foreach($related as $item)
          <a href="{{ route('newsroom.show', $item->slug) }}" class="nd-wire-item">
            <div class="nd-wire-date">
              <div class="day">{{ \Carbon\Carbon::parse($item->published_at)->format('d') }}</div>
              <div class="mon">{{ \Carbon\Carbon::parse($item->published_at)->format('M') }}</div>
            </div>
            <div class="nd-wire-title">{{ $item->title }}</div>
          </a>
          @endforeach
        </div>
        @endif

        <div class="nd-press-card">
          <i class="fas fa-envelope-open-text"></i>
          <h4>Media Inquiries</h4>
          <p>Press &amp; media can reach our communications team directly.</p>
          <a href="{{ route('contact') }}" class="nd-press-btn"><i class="fas fa-paper-plane"></i> Contact Press Team</a>
        </div>

      </div>
    </div>
  </div>
</div>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('ndCopyLink')?.addEventListener('click', function (e) {
    e.preventDefault();
    navigator.clipboard.writeText(window.location.href).catch(() => {});
    const orig = this.innerHTML;
    this.innerHTML = '<i class="fas fa-check"></i>';
    setTimeout(() => { this.innerHTML = orig; }, 1500);
  });
</script>
</body>
</html>
