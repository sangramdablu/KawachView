<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Newsroom | Kawach Technology';
    $seoDescription = 'Company announcements, milestones, and media coverage from Kawach Technology.';
    $seoKeywords    = 'kawach technology news, company announcements, press releases, kawach technology newsroom';
    $seoCanonical   = url('/newsroom');
    $seoImage       = asset('assets/images/kawach.png');
@endphp

@php
    // Built as a PHP array + json_encode() rather than a raw JSON-LD
    // <script> block with a literal "@context" key — see head.blade.php /
    // news_details.blade.php for why.
    $collectionSchema = [
        "@context" => "https://schema.org",
        "@type" => "CollectionPage",
        "name" => "Kawach Technology Newsroom",
        "url" => url('/newsroom'),
        "description" => "Company announcements, milestones, and media coverage from Kawach Technology.",
        "mainEntity" => [
            "@type" => "ItemList",
            "itemListElement" => $posts->values()->map(function ($post, $index) {
                return [
                    "@type" => "ListItem",
                    "position" => $index + 1,
                    "url" => route('newsroom.show', $post->slug),
                    "name" => $post->title,
                ];
            })->all(),
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($collectionSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
/* ── NEWSROOM — distinct press/wire identity, not a Blog reskin ── */

.news-hero{
    position:relative;
    overflow:hidden;
    background:var(--dark-navy, #0d1b3e);
    padding:90px 0 0;
}

.news-hero::before{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(135deg, rgba(13,27,62,.95) 0%, rgba(13,27,62,.88) 55%, rgba(22,119,255,.35) 100%);
    z-index:0;
}

.news-hero .container{
    position:relative;
    z-index:1;
}

.news-hero-eyebrow{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-size:.78rem;
    font-weight:700;
    letter-spacing:1.5px;
    text-transform:uppercase;
    color:#8fc3ff;
    background:rgba(22,119,255,.15);
    border:1px solid rgba(22,119,255,.3);
    padding:6px 16px;
    border-radius:30px;
    margin-bottom:20px;
}

.news-hero-title{
    font-size:clamp(2.2rem,4.5vw,3.2rem);
    font-weight:800;
    color:#fff;
    margin-bottom:16px;
    line-height:1.15;
}

.news-hero-subtitle{
    color:rgba(255,255,255,.68);
    font-size:1.02rem;
    max-width:600px;
    line-height:1.7;
    margin-bottom:0;
}

/* Press-wire stat strip */
.news-wire-strip{
    position:relative;
    z-index:1;
    display:flex;
    flex-wrap:wrap;
    gap:0;
    margin-top:44px;
    border-top:1px solid rgba(255,255,255,.12);
}

.news-wire-item{
    flex:1;
    min-width:150px;
    padding:22px 28px;
    border-right:1px solid rgba(255,255,255,.12);
}

.news-wire-item:last-child{
    border-right:none;
}

.news-wire-val{
    font-size:1.5rem;
    font-weight:800;
    color:#fff;
    line-height:1.1;
}

.news-wire-label{
    font-size:.78rem;
    color:rgba(255,255,255,.55);
    font-weight:600;
    margin-top:3px;
}

/* ── FILTER RAIL ── */
.news-filter-rail{
    background:#fff;
    border-bottom:1px solid var(--border-light, #e2e8f0);
    padding:18px 0;
    position:sticky;
    top:0;
    z-index:30;
}

.news-filter-rail .container{
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
}

.news-filter-label{
    font-size:.78rem;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.5px;
    color:var(--text-muted, #6c757d);
    margin-right:4px;
}

.news-filter-pill{
    font-size:.84rem;
    font-weight:600;
    color:var(--text-dark, #1a1a2e);
    background:var(--bg-light, #f4f6fb);
    border:1px solid transparent;
    padding:7px 16px;
    border-radius:20px;
    text-decoration:none;
    transition:.2s;
}

.news-filter-pill:hover{
    background:#e8f1fd;
    color:var(--primary-blue, #1a73e8);
}

.news-filter-pill.active{
    background:var(--primary-blue, #1a73e8);
    color:#fff;
}

/* ── LEAD STORY (press-release banner, not a photo-card) ── */
.news-section{
    padding:60px 0 90px;
    background:var(--bg-light, #f4f6fb);
}

.news-lead{
    display:block;
    background:#fff;
    border:1px solid var(--border-light, #e2e8f0);
    border-left:5px solid var(--primary-blue, #1a73e8);
    border-radius:16px;
    padding:34px 38px;
    margin-bottom:36px;
    text-decoration:none;
    transition:.25s;
    box-shadow:0 4px 18px rgba(15,23,42,.04);
}

.news-lead:hover{
    box-shadow:0 16px 36px rgba(15,23,42,.1);
    transform:translateY(-3px);
}

.news-lead-top{
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
    margin-bottom:16px;
}

.news-tag-latest{
    display:inline-flex;
    align-items:center;
    gap:6px;
    font-size:.72rem;
    font-weight:800;
    text-transform:uppercase;
    letter-spacing:.5px;
    color:#fff;
    background:var(--primary-blue, #1a73e8);
    padding:5px 12px;
    border-radius:5px;
}

.news-tag-category{
    font-size:.75rem;
    font-weight:700;
    color:var(--light-navy, #1f3a6e);
    background:var(--bg-light, #f4f6fb);
    border:1px solid var(--border-light, #e2e8f0);
    padding:5px 12px;
    border-radius:5px;
}

.news-tag-source{
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

.news-lead-date{
    font-size:.8rem;
    color:var(--text-muted, #6c757d);
    font-weight:600;
    margin-left:auto;
}

.news-lead-title{
    font-size:1.6rem;
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    line-height:1.3;
    margin-bottom:12px;
}

.news-lead-excerpt{
    color:var(--text-muted, #6c757d);
    font-size:.98rem;
    line-height:1.7;
    margin-bottom:0;
    max-width:760px;
}

.news-lead-link{
    display:inline-flex;
    align-items:center;
    gap:8px;
    margin-top:18px;
    font-weight:700;
    font-size:.9rem;
    color:var(--primary-blue, #1a73e8);
}

/* ── SECTION HEADING ── */
.news-list-heading{
    display:flex;
    align-items:baseline;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:8px;
    margin-bottom:22px;
    padding-bottom:14px;
    border-bottom:2px solid var(--text-dark, #1a1a2e);
}

.news-list-heading h2{
    font-size:1.3rem;
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    margin:0;
}

.news-list-count{
    font-size:.85rem;
    color:var(--text-muted, #6c757d);
}

/* ── ANNOUNCEMENT ROW (list, not photo-grid) ── */
.news-item{
    display:flex;
    gap:22px;
    align-items:flex-start;
    background:#fff;
    border:1px solid var(--border-light, #e2e8f0);
    border-radius:14px;
    padding:22px 24px;
    margin-bottom:16px;
    text-decoration:none;
    transition:.2s;
}

.news-item:hover{
    border-color:var(--primary-blue, #1a73e8);
    box-shadow:0 10px 26px rgba(15,23,42,.06);
}

.news-item-date{
    flex-shrink:0;
    width:64px;
    text-align:center;
    padding-top:2px;
}

.news-item-date .day{
    font-size:1.4rem;
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    line-height:1;
}

.news-item-date .mon{
    font-size:.72rem;
    font-weight:700;
    text-transform:uppercase;
    color:var(--text-muted, #6c757d);
    letter-spacing:.5px;
}

.news-item-body{
    flex:1;
    min-width:0;
}

.news-item-tags{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
    margin-bottom:8px;
}

.news-item-title{
    font-size:1.08rem;
    font-weight:700;
    color:var(--text-dark, #1a1a2e);
    line-height:1.4;
    margin-bottom:6px;
}

.news-item-excerpt{
    color:var(--text-muted, #6c757d);
    font-size:.9rem;
    line-height:1.6;
    margin-bottom:0;

    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.news-item-arrow{
    flex-shrink:0;
    color:var(--primary-blue, #1a73e8);
    font-size:.9rem;
    align-self:center;
}

/* ── EMPTY STATE ── */
.news-empty{
    text-align:center;
    padding:70px 20px;
    background:#fff;
    border:1px dashed var(--border-light, #e2e8f0);
    border-radius:16px;
}

.news-empty i{
    font-size:2rem;
    color:var(--border-light, #e2e8f0);
    margin-bottom:14px;
    display:block;
}

.news-empty h3{
    font-size:1.1rem;
    font-weight:700;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:6px;
}

.news-empty p{
    color:var(--text-muted, #6c757d);
    font-size:.9rem;
    margin-bottom:18px;
}

/* ── PAGINATION ── */
.news-pagination{
    display:flex;
    justify-content:center;
    gap:8px;
    margin-top:32px;
}

.news-page-btn{
    width:38px;
    height:38px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:8px;
    background:#fff;
    border:1px solid var(--border-light, #e2e8f0);
    color:var(--text-dark, #1a1a2e);
    font-size:.85rem;
    font-weight:600;
    text-decoration:none;
}

.news-page-btn.active{
    background:var(--primary-blue, #1a73e8);
    border-color:var(--primary-blue, #1a73e8);
    color:#fff;
}

.news-page-btn.disabled{
    opacity:.4;
    pointer-events:none;
}

/* ── MEDIA CONTACT STRIP ── */
.news-media-strip{
    margin-top:56px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:24px;
    flex-wrap:wrap;
    background:var(--dark-navy, #0d1b3e);
    border-radius:20px;
    padding:36px 42px;
}

.news-media-icon{
    width:52px;
    height:52px;
    flex-shrink:0;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:rgba(22,119,255,.18);
    border:1px solid rgba(22,119,255,.35);
    color:#fff;
    font-size:18px;
}

.news-media-left{
    display:flex;
    align-items:center;
    gap:18px;
}

.news-media-text h3{
    color:#fff;
    font-size:1.2rem;
    font-weight:700;
    margin-bottom:4px;
}

.news-media-text p{
    color:rgba(255,255,255,.65);
    font-size:.92rem;
    margin:0;
}

.news-media-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:var(--primary-blue, #1a73e8);
    color:#fff;
    font-weight:700;
    font-size:.92rem;
    padding:13px 26px;
    border-radius:10px;
    text-decoration:none;
    white-space:nowrap;
    transition:.3s;
}

.news-media-btn:hover{
    background:var(--accent-blue, #2196f3);
    color:#fff;
}

@media(max-width:767px){
    .news-hero{ padding:70px 0 0; }
    .news-wire-strip{ margin-top:30px; }
    .news-wire-item{ padding:16px 18px; flex:0 0 50%; border-bottom:1px solid rgba(255,255,255,.12); }
    .news-lead{ padding:24px; }
    .news-lead-title{ font-size:1.25rem; }
    .news-item{ flex-direction:column; gap:10px; padding:18px; }
    .news-item-date{ width:auto; text-align:left; display:flex; align-items:baseline; gap:6px; }
    .news-media-strip{ padding:28px 24px; }
    .news-media-left{ flex-direction:column; text-align:center; }
}
</style>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7J267VF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

@include('layouts.navbar')

{{-- ═══ HERO ═══ --}}
<section class="news-hero">
  <div class="container">
    <span class="news-hero-eyebrow"><i class="fas fa-satellite-dish"></i> Company Newsroom</span>
    <h1 class="news-hero-title">Latest From Kawach Technology</h1>
    <p class="news-hero-subtitle">
        Official announcements, company milestones, and media coverage — straight from our team, no filter.
    </p>

    <div class="news-wire-strip">
      <div class="news-wire-item">
        <div class="news-wire-val">{{ $counts['all'] }}</div>
        <div class="news-wire-label">Total Announcements</div>
      </div>
      <div class="news-wire-item">
        <div class="news-wire-val">{{ $categories->count() }}</div>
        <div class="news-wire-label">Categories</div>
      </div>
      @if($featured)
      <div class="news-wire-item">
        <div class="news-wire-val">{{ \Carbon\Carbon::parse($featured->published_at)->format('M d') }}</div>
        <div class="news-wire-label">Last Updated</div>
      </div>
      @endif
    </div>
  </div>
</section>

{{-- ═══ FILTER RAIL ═══ --}}
<div class="news-filter-rail">
  <div class="container">
    <span class="news-filter-label">Filter</span>
    <a href="{{ url('/newsroom') }}" class="news-filter-pill {{ !request('category') ? 'active' : '' }}">All</a>
    @foreach($categories as $cat)
    <a href="{{ url('/newsroom') }}?category={{ $cat->slug }}" class="news-filter-pill {{ request('category') === $cat->slug ? 'active' : '' }}">
      {{ $cat->name }}
    </a>
    @endforeach
  </div>
</div>

{{-- ═══ FEED ═══ --}}
<section class="news-section">
  <div class="container">

    {{-- ── LEAD STORY ── --}}
    @if(!request('category') && $posts->currentPage() === 1 && $featured)
    <a href="{{ route('newsroom.show', $featured->slug) }}" class="news-lead">
      <div class="news-lead-top">
        <span class="news-tag-latest"><i class="fas fa-bolt"></i> Latest</span>
        @if($featured->category)
          <span class="news-tag-category">{{ $featured->category->name }}</span>
        @endif
        @if($featured->external_source_name)
          <span class="news-tag-source"><i class="fas fa-external-link-alt"></i> Featured in {{ $featured->external_source_name }}</span>
        @endif
        <span class="news-lead-date">{{ \Carbon\Carbon::parse($featured->published_at)->format('F d, Y') }}</span>
      </div>
      <h2 class="news-lead-title">{{ $featured->title }}</h2>
      <p class="news-lead-excerpt">{{ $featured->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($featured->content), 200) }}</p>
      <span class="news-lead-link">Read Full Announcement <i class="fas fa-arrow-right"></i></span>
    </a>
    @endif

    <div class="news-list-heading">
      <h2>
        @if(request('category') && $currentCategory)
          {{ $currentCategory->name }}
        @else
          All Announcements
        @endif
      </h2>
      <span class="news-list-count">
        @if($posts->total() > 0)
          {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }}
        @else
          0 results
        @endif
      </span>
    </div>

    @if($posts->count())
      @foreach($posts as $post)
        @if(!request('category') && $posts->currentPage() === 1 && isset($featured) && $post->id === $featured->id)
          @continue
        @endif

        <a href="{{ route('newsroom.show', $post->slug) }}" class="news-item">
          <div class="news-item-date">
            <div class="day">{{ \Carbon\Carbon::parse($post->published_at)->format('d') }}</div>
            <div class="mon">{{ \Carbon\Carbon::parse($post->published_at)->format('M Y') }}</div>
          </div>
          <div class="news-item-body">
            <div class="news-item-tags">
              @if($post->category)
                <span class="news-tag-category">{{ $post->category->name }}</span>
              @endif
              @if($post->external_source_name)
                <span class="news-tag-source"><i class="fas fa-external-link-alt"></i> Featured in {{ $post->external_source_name }}</span>
              @endif
            </div>
            <div class="news-item-title">{{ $post->title }}</div>
            <p class="news-item-excerpt">{{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->content), 140) }}</p>
          </div>
          <i class="fas fa-arrow-right news-item-arrow"></i>
        </a>
      @endforeach

      @if($posts->hasPages())
      <div class="news-pagination">
        @if($posts->onFirstPage())
          <span class="news-page-btn disabled"><i class="fas fa-chevron-left" style="font-size:.7rem;"></i></span>
        @else
          <a href="{{ $posts->previousPageUrl() }}" class="news-page-btn"><i class="fas fa-chevron-left" style="font-size:.7rem;"></i></a>
        @endif

        @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
          @if($page == $posts->currentPage())
            <span class="news-page-btn active">{{ $page }}</span>
          @elseif($page == 1 || $page == $posts->lastPage() || abs($page - $posts->currentPage()) <= 2)
            <a href="{{ $url }}" class="news-page-btn">{{ $page }}</a>
          @endif
        @endforeach

        @if($posts->hasMorePages())
          <a href="{{ $posts->nextPageUrl() }}" class="news-page-btn"><i class="fas fa-chevron-right" style="font-size:.7rem;"></i></a>
        @else
          <span class="news-page-btn disabled"><i class="fas fa-chevron-right" style="font-size:.7rem;"></i></span>
        @endif
      </div>
      @endif

    @else
      <div class="news-empty">
        <i class="fas fa-newspaper"></i>
        <h3>No announcements found</h3>
        <p>
          @if(request('category'))
            No articles in this category yet. Check back soon.
          @else
            No published announcements yet. Check back soon.
          @endif
        </p>
        <a href="{{ url('/newsroom') }}" class="news-media-btn" style="display:inline-flex;"><i class="fas fa-times"></i> Clear Filter</a>
      </div>
    @endif

    {{-- ── MEDIA CONTACT ── --}}
    <div class="news-media-strip">
      <div class="news-media-left">
        <div class="news-media-icon"><i class="fas fa-envelope-open-text"></i></div>
        <div class="news-media-text">
          <h3>Media &amp; Press Inquiries</h3>
          <p>For interviews, quotes, or press materials, reach out to our team directly.</p>
        </div>
      </div>
      <a href="{{ route('contact') }}" class="news-media-btn"><i class="fas fa-paper-plane"></i> Contact Press Team</a>
    </div>

  </div>
</section>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
