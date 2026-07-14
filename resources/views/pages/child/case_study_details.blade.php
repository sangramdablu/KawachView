<!DOCTYPE html>
<html lang="en">

@php
    $seoCanonical = url('/case-studies/' . $caseStudy->slug);
    $seoImage     = $caseStudy->featured_image
        ? config('app.images_path') . $caseStudy->featured_image
        : asset('assets/images/kawach.png');
    $seoType      = 'article';
@endphp

@push('schema')
@php
    $caseStudySchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "Article",
                "@id" => $seoCanonical . "#article",
                "headline" => $caseStudy->title,
                "description" => $seoDescription,
                "image" => $seoImage,
                "url" => $seoCanonical,
                "datePublished" => optional($caseStudy->published_at)->toIso8601String(),
                "dateModified" => optional($caseStudy->updated_at)->toIso8601String(),
                "author" => [
                    "@type" => "Organization",
                    "name" => "Kawach Technology",
                ],
                "publisher" => [
                    "@type" => "Organization",
                    "name" => "Kawach Technology",
                    "logo" => [
                        "@type" => "ImageObject",
                        "url" => asset('assets/images/kawach.png'),
                    ],
                ],
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Case Studies", "item" => url('/case-studies')],
                    ["@type" => "ListItem", "position" => 3, "name" => $caseStudy->title, "item" => $seoCanonical],
                ],
            ],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($caseStudySchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
<style>
  .cs-hero{
      position:relative;
      overflow:hidden;
      padding:90px 0 80px;
      background:#0f172a;
      isolation:isolate;
  }

  .cs-hero::before{
      content:""; 
      position:absolute;
      inset:0;
      background: linear-gradient(135deg, rgba(15,23,42,.92) 0%, rgba(15,23,42,.84) 45%, rgba(13,71,161,.70) 100%);
      z-index:1;
  }

  .cs-hero::after{
      content:"";
      position:absolute;
      inset:0;
      background: radial-gradient( circle at top right, rgba(94, 150, 241, 0.18), transparent 40% );
      z-index:1;
  }

  .cs-hero-image-wrap{
      position:absolute;
      inset:0;
      width:100%;
      height:100%;
      z-index:0;
      overflow:hidden;
      display:flex;
      align-items:center;
      justify-content:center;
  }

  .cs-hero-bg-blur{
      position:absolute;
      inset:0;
      width:100%;
      height:100%;
      object-fit:cover;
      filter:blur(18px);
      transform:scale(1.15);
      opacity:.45;
  }

  .cs-hero-bg-image{
      position:relative;
      width:100%;
      height:100%;
      object-fit:contain;
      object-position:center;
      z-index:1;
      opacity:.88;
  }

  .cs-hero{
      position:relative;
      min-height:760px;
      display:flex;
      align-items:center;
      overflow:hidden;
      isolation:isolate;
  }

  .cs-hero .hero-bg-layer{
      position:absolute;
      inset:0;
      z-index:2;
      pointer-events:none;
      opacity:.55;
  }

  .cs-hero .code-line, .cs-hero .circuit-node, .cs-hero .data-packet, .cs-hero .binary-col{
      opacity:.42;
  }

  .cs-hero .container{
      position:relative;
      z-index:3;
  }

  .cs-back-link{
      display:inline-flex;
      align-items:center;
      gap:10px;
      margin-bottom:22px;
      color:#93c5fd;
      font-size:.92rem;
      font-weight:700;
      text-decoration:none;
      transition:all .25s ease;
  }

  .cs-back-link:hover{
      color:#fff;
      transform:translateX(-4px);
  }

  .cs-eyebrow{
      display:inline-flex;
      align-items:center;
      padding:8px 18px;
      border-radius:999px;
      background:rgba(59,130,246,.12);
      border:1px solid rgba(59,130,246,.18);
      color:#dbeafe;
      font-size:.8rem;
      font-weight:800;
      letter-spacing:.5px;
      margin-bottom:22px;
      backdrop-filter:blur(10px);
  }

  .cs-hero-title{
      font-family:'Nunito',sans-serif;
      font-size:3.2rem;
      font-weight:900;
      line-height:1.15;
      color:#fff;
      margin-bottom:24px;
  }

  .cs-hero-subtitle{
      color:#c7d8ea;
      font-size:1.08rem;
      line-height:1.9;
      max-width:720px;
      margin-bottom:34px;
  }

  .cs-info-pills{
      display:flex;
      flex-wrap:wrap;
      gap:12px;
      margin-bottom:34px;
  }

  .cs-pill{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:11px 16px;
      border-radius:999px;
      background:rgba(255,255,255,.07);
      border:1px solid rgba(255,255,255,.10);
      color:#dbeafe;
      font-size:.82rem;
      font-weight:700;
      backdrop-filter:blur(12px);
  }

  .cs-hero-ctas{
      display:flex;
      gap:16px;
      flex-wrap:wrap;
  }

  .cs-hero-stat-card{
      position:relative;
      padding:34px;
      border-radius:28px;
      background: linear-gradient(180deg,rgba(255,255,255,.10),rgba(255,255,255,.04));
      border:1px solid rgba(255,255,255,.10);
      backdrop-filter:blur(18px);
      box-shadow: 0 30px 60px rgba(0,0,0,.28);
      overflow:hidden;
  }
  .cs-hero-stat-card::before{
      content:"";
      position:absolute;
      width:240px;
      height:240px;
      top:-120px;
      right:-120px;
      background: radial-gradient( circle, rgba(59,130,246,.25), transparent 70% );
  }
  @media(max-width:1200px){
      .cs-hero-title{
          font-size:2.7rem;
      }
  }
  @media(max-width:991px){
      .cs-hero{
          padding:75px 0 65px;
      }
      .cs-hero-title{
          font-size:2.2rem;
      }
  }

  @media(max-width:767px){
      .cs-hero{
          padding:60px 0 55px;
      }
      .cs-hero-title{
          font-size:1.8rem;
          line-height:1.3;
      }
      .cs-hero-subtitle{
          font-size:.98rem;
      }
      .cs-pill{
          width:100%;
          justify-content:flex-start;
      }
      .cs-hero-ctas{
          flex-direction:column;
      }
      .btn-cs-primary, .btn-cs-outline{
          width:100%;
          text-align:center;
      }
      .binary-col, .code-line:nth-child(n+8){
          display:none;
      }
  }

  @media(max-width:991px){
      .cs-hero{
          min-height:auto;
          padding:90px 0 70px;
      }
  }

  @media(max-width:767px){
      .cs-hero{
          padding:70px 0 55px;
      }
      .cs-hero-bg-image{
          transform:scale(1.12);
      }
  }

  .challenge-content-wrapper{
      max-width: 950px;
      margin: 0 auto;
  }

  /* Headings */
  .challenge-content-wrapper h1,
  .challenge-content-wrapper h2,
  .challenge-content-wrapper h3,
  .challenge-content-wrapper h4,
  .challenge-content-wrapper h5,
  .challenge-content-wrapper h6{
      font-family:'Nunito',sans-serif;
      font-weight:800;
      color:var(--text-dark);
      margin-top:40px;
      margin-bottom:18px;
      line-height:1.3;
  }

  /* Paragraph */
  .challenge-content-wrapper p{
      color:var(--text-muted);
      line-height:1.9;
      font-size:1rem;
      margin-bottom:18px;
  }

  /* Lists */
  .challenge-content-wrapper ul,
  .challenge-content-wrapper ol{
      padding-left:22px;
      margin-bottom:24px;
  }

  .challenge-content-wrapper li{
      color:var(--text-muted);
      line-height:1.9;
      margin-bottom:10px;
  }

  /* Strong */
  .challenge-content-wrapper strong{
      color:var(--text-dark);
      font-weight:700;
  }

  /* Remove ugly inline styles from editor */
  .challenge-content-wrapper span{
      background:none !important;
      color:inherit !important;
  }

  /* Remove pre/code styling */
  .challenge-content-wrapper pre{
      background:transparent;
      padding:0;
      border:none;
      white-space:normal;
      overflow:visible;
      font-family:inherit;
  }

</style>
</head>
<body>

@include('layouts.navbar')

{{-- ═══════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════ --}}
<section class="cs-hero" id="top">
    {{-- Background Image --}}
    <div class="cs-hero-image-wrap">
        <img src="{{ config('app.images_path') . $caseStudy->featured_image }}" alt="{{ $caseStudy->title }}" class="cs-hero-bg-blur">
        <img src="{{ config('app.images_path') . $caseStudy->featured_image }}" alt="{{ $caseStudy->title }}" title="{{ $caseStudy->title }}" class="cs-hero-bg-image">
    </div>

    <div class="hero-bg-layer">
        {{-- Floating code lines --}}
        <div class="code-line cl-1"></div>
        <div class="code-line cl-2"></div>
        <div class="code-line cl-3"></div>
        <div class="code-line cl-4"></div>
        <div class="code-line cl-5"></div>
        <div class="code-line cl-6"></div>
        <div class="code-line cl-7"></div>
        <div class="code-line cl-8"></div>
        <div class="code-line cl-9"></div>
        <div class="code-line cl-10"></div>
        <div class="code-line cl-11"></div>
        <div class="code-line cl-12"></div>
        <div class="code-line cl-13"></div>
        <div class="code-line cl-14"></div>
        <div class="code-line cl-15"></div>
        {{-- Circuit nodes --}}
        <div class="circuit-node cn-1"></div>
        <div class="circuit-node cn-2"></div>
        <div class="circuit-node cn-3"></div>
        <div class="circuit-node cn-4"></div>
        <div class="circuit-node cn-5"></div>
        <div class="circuit-node cn-6"></div>
        <div class="circuit-node cn-7"></div>
        <div class="circuit-node cn-8"></div>
        <div class="circuit-node cn-9"></div>
        <div class="circuit-node cn-10"></div>
        {{-- Data packets --}}
        <div class="data-packet dp-blue dp-1"></div>
        <div class="data-packet dp-green dp-2"></div>
        <div class="data-packet dp-white dp-3"></div>
        <div class="data-packet dp-blue dp-4"></div>
        <div class="data-packet dp-green dp-5"></div>
        <div class="data-packet dp-white dp-6"></div>
        <div class="data-packet dp-blue dp-7"></div>
        <div class="data-packet dp-green dp-8"></div>
        {{-- Binary rain --}}
        <div class="binary-col bc-1">1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0</div>
        <div class="binary-col bc-2">0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1</div>
        <div class="binary-col bc-3">1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0</div>
        <div class="binary-col bc-4">0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1</div>
        {{-- Scan line --}}
        <div class="hero-scan-line"></div>
    </div>

  <div class="container">
    <div class="row align-items-center g-5">

      {{-- Left Content --}}
      <div class="col-lg-7">
        <a href="{{ url('/case-studies') }}" class="cs-back-link">
          <i class="fas fa-arrow-left"></i> Back to Case Studies
        </a>
        <div class="cs-eyebrow"> Case Study — {{ $caseStudy->caseStudy->client_industry ?? 'Technology' }}</div>
        <h1 class="cs-hero-title">
            {{ $caseStudy->title }}
        </h1>
        <p class="cs-hero-subtitle">
            {{ strip_tags($caseStudy->meta_description) }}
        </p>

        <div class="cs-info-pills">
            @if($caseStudy->caseStudy->client_industry)
                <span class="cs-pill"><i class="fas fa-industry"></i>{{ $caseStudy->caseStudy->client_industry }}</span>
            @endif
            @if($caseStudy->caseStudy->project_duration)
                <span class="cs-pill"><i class="fas fa-clock"></i>{{ $caseStudy->caseStudy->project_duration }}</span>
            @endif
            @if($caseStudy->published_at)
                <span class="cs-pill"><i class="fas fa-calendar"></i>{{ $caseStudy->published_at->format('M Y') }}</span>
            @endif
            @if($caseStudy->caseStudy->project_url)
                <span class="cs-pill"><i class="fas fa-globe"></i>Live Project</span>
            @endif
        </div>

        <div class="cs-hero-ctas">
          <button class="btn-cs-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
            Book a Consultation
          </button>
          <a href="#cases-overview" class="btn-cs-outline">Explore Project</a>
        </div>
      </div>

      {{-- Right Stats Card --}}
      <div class="col-lg-5 d-none d-lg-block">
        <div class="cs-hero-stat-card">
          <div class="cs-hero-stat-grid">
            @forelse(array_slice($caseStudy->caseStudy->kpis ?? [], 0, 4) as $kpi)
              <div class="cs-stat-box">
                <div class="cs-stat-num">{{ $kpi['value'] ?? '' }}</div>
                <div class="cs-stat-lbl">{{ $kpi['label'] ?? '' }}</div>
              </div>
            @empty
              <div class="cs-stat-box"><div class="cs-stat-num">—</div><div class="cs-stat-lbl">No KPIs yet</div></div>
            @endforelse

            @if($caseStudy->caseStudy->completion_date)
            <div style="grid-column:1/-1;padding-top:16px;border-top:1px solid rgba(255,255,255,.1);">
              <div style="display:flex;justify-content:space-between;align-items:center;">
                <div style="text-align:center;">
                  <div style="font-size:.68rem;color:#8bacc8;">Duration</div>
                  <div style="font-size:.8rem;font-weight:700;color:#fff;">{{ $caseStudy->caseStudy->project_duration ?? '—' }}</div>
                </div>
                <div style="flex:1;height:1px;background:rgba(255,255,255,.15);margin:0 10px;position:relative;">
                  <div style="width:100%;height:3px;background:linear-gradient(90deg,#1a73e8,#00c896);border-radius:2px;margin-top:-1px;"></div>
                </div>
                <div style="text-align:center;">
                  <div style="font-size:.68rem;color:#8bacc8;">Completed</div>
                  <div style="font-size:.8rem;font-weight:700;color:#fff;">{{ \Carbon\Carbon::parse($caseStudy->caseStudy->completion_date)->format('M Y') }}</div>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     STICKY NAVIGATION
═══════════════════════════════════════════ --}}
<nav class="cs-sticky-nav" id="cases-overview">
  <div class="container py-1">
    <div class="cs-nav-tabs">
      <a href="#sec-overview"   class="cs-nav-tab active">Overview</a>
      <a href="#sec-challenge"  class="cs-nav-tab">Challenge</a>
      <a href="#sec-solution"   class="cs-nav-tab">Solution</a>
      <a href="#sec-features"   class="cs-nav-tab">Features</a>
      <a href="#sec-tech"       class="cs-nav-tab">Tech Stack</a>
      <a href="#sec-process"    class="cs-nav-tab">Process</a>
      <a href="#sec-results"    class="cs-nav-tab">Results</a>
      <a href="#sec-faq"        class="cs-nav-tab">FAQ</a>
    </div>
    <button class="cs-nav-cta" data-bs-toggle="modal" data-bs-target="#getQuoteModal">
      Start Your Project
    </button>
  </div>
</nav>

{{-- ═══════════════════════════════════════════ 1. CLIENT OVERVIEW ══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-overview">
  <div class="container">
    <div class="row g-5 align-items-start">

      <div class="col-lg-5">
        <div class="side-line"></div>
        <div class="section-eyebrow">Client Overview</div>
        <h2 class="section-heading">{{ $caseStudy->caseStudy->client_name }}</h2>
        <p class="section-sub mb-4">
            {!! \Illuminate\Support\Str::limit(strip_tags($caseStudy->caseStudy->challenge ?? ''), 400) !!}
        </p>
      </div>

      <div class="col-lg-7">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="co-info-card h-100">
              @if($caseStudy->caseStudy->client_industry)
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-industry"></i></div>
                <div><div class="co-item-label">Industry</div><div class="co-item-val">{{ $caseStudy->caseStudy->client_industry }}</div></div>
              </div>
              @endif
              @if($caseStudy->caseStudy->business_size)
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-users"></i></div>
                <div><div class="co-item-label">Business Size</div><div class="co-item-val">{{ $caseStudy->caseStudy->business_size }}</div></div>
              </div>
              @endif
              @if($caseStudy->caseStudy->location)
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-globe-americas"></i></div>
                <div><div class="co-item-label">Location</div><div class="co-item-val">{{ $caseStudy->caseStudy->location }}</div></div>
              </div>
              @endif
              @if($caseStudy->caseStudy->business_model)
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-layer-group"></i></div>
                <div><div class="co-item-label">Business Model</div><div class="co-item-val">{{ $caseStudy->caseStudy->business_model }}</div></div>
              </div>
              @endif
              @if($caseStudy->caseStudy->project_duration)
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-clock"></i></div>
                <div><div class="co-item-label">Project Duration</div><div class="co-item-val">{{ $caseStudy->caseStudy->project_duration }}</div></div>
              </div>
              @endif
            </div>
          </div>
          <div class="col-md-6">
            @if(!empty($caseStudy->caseStudy->existing_challenges))
            <div class="co-info-card h-100">
              <div style="font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.5px;color:var(--red);margin-bottom:12px;">Existing Challenges</div>
              <ul class="co-challenge-list">
                @foreach($caseStudy->caseStudy->existing_challenges as $challenge)
                  <li><i class="fas fa-times-circle"></i> {{ $challenge['text'] ?? '' }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════ 2. CHALLENGE ═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt" id="sec-challenge">
    <div class="container">
        <div class="text-center mb-5">
            <div class="side-line mx-auto"></div>
            <div class="section-eyebrow">
                The Challenge
            </div>
            <h2 class="section-heading">
                What We Were Up Against
            </h2>
        </div>
        @php
            $challengeContent = $caseStudy->caseStudy->challenge ?? '';
            $challengeContent = html_entity_decode($challengeContent);
            $challengeContent = preg_replace('/<pre.*?>/si', '', $challengeContent);
            $challengeContent = str_replace('</pre>', '', $challengeContent);
        @endphp
        <div class="challenge-content-wrapper">
            {!! $challengeContent !!}
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════ 3. SOLUTION ═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt" id="sec-solution">
  <div class="container">
    <div class="row g-5">

      <div class="col-lg-5">
        <div class="side-line"></div>
        <div class="section-eyebrow">Our Solution</div>
        <h2 class="section-heading">How We Built It</h2>
        <div class="solution-body challenge-content-wrapper">
          {!! $caseStudy->caseStudy->solution ?? '' !!}
        </div>
      </div>

      <div class="col-lg-7">
        @if(!empty($caseStudy->caseStudy->solution_modules))
        <div class="section-eyebrow mb-3">Key Modules Delivered</div>
        <div class="solution-modules">
          @foreach($caseStudy->caseStudy->solution_modules as $m)
          <div class="sol-module">
            <div class="sol-module-icon"><i class="{{ $m['icon'] ?? 'fas fa-cube' }}"></i></div>
            <div>
              <div class="sol-module-name">{{ $m['name'] ?? '' }}</div>
              <div class="sol-module-desc">{{ $m['desc'] ?? '' }}</div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════ GOALS ═══════════════════════════════════════════ --}}
@if(!empty($caseStudy->caseStudy->goals))
<section class="cs-section" id="sec-goals">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5">
        <div class="side-line"></div>
        <div class="section-eyebrow">Goals & Objectives</div>
        <h2 class="section-heading">What Success Looked Like</h2>
      </div>
      <div class="col-lg-7">
        <div class="row g-3">
          @foreach($caseStudy->caseStudy->goals as $g)
            <div class="col-sm-6">
              <div class="challenge-card h-100">
                <div class="challenge-card-icon {{ $g['color'] ?? 'cc-blue' }}"><i class="{{ $g['icon'] ?? 'fas fa-bullseye' }}"></i></div>
                <h4>{{ $g['title'] ?? '' }}</h4>
                <p>{{ $g['desc'] ?? '' }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endif


{{-- ═══════════════════════════════════════════ 4. FEATURES ═══════════════════════════════════════════ --}}
@if(!empty($caseStudy->caseStudy->cs_features))
<section class="cs-section" id="sec-features">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Features Developed</div>
      <h2 class="section-heading">What We Built</h2>
    </div>

    <div class="features-grid">
      @foreach($caseStudy->caseStudy->cs_features as $f)
      <div class="feature-card">
        <div class="feature-icon"><i class="{{ $f['icon'] ?? 'fas fa-star' }}"></i></div>
        <div class="feature-title">{{ $f['title'] ?? '' }}</div>
        <p class="feature-desc">{{ $f['desc'] ?? '' }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ═══════════════════════════════════════════ 5. TECH STACK ═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt" id="sec-tech">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4">
        <div class="side-line"></div>
        <div class="section-eyebrow">Technology Stack</div>
        <h2 class="section-heading">Built With the Right Tools</h2>
        <p class="section-sub">We selected every technology based on HIPAA compliance requirements, scalability needs, and long-term maintainability. No trend-chasing — only battle-tested solutions.</p>
      </div>
      <div class="col-lg-8">
        @if(!empty($caseStudy->caseStudy->tech_stack))
          <div class="tech-stack-grid">
            @foreach($caseStudy->caseStudy->tech_stack as $group)
            <div class="tech-category-card">
              <div class="tech-cat-label">{{ $group['category'] ?? '' }}</div>
              <div class="tech-pill-wrap">
                @foreach(array_filter(array_map('trim', explode(',', $group['items'] ?? ''))) as $item)
                  <span class="tech-pill"><i class="fas fa-check"></i> {{ $item }}</span>
                @endforeach
              </div>
            </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>


{{-- ═══════════════════════════════════════════ 6. PROCESS / TIMELINE ═══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-process">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4">
        <div class="side-line"></div>
        <div class="section-eyebrow">Development Process</div>
        <h2 class="section-heading">How We Delivered It</h2>
        <p class="section-sub">6-month Agile delivery with 2-week sprints, weekly client demos, and continuous deployment. Full transparency at every stage.</p>
        <div style="margin-top:24px;background:#e8f1fd;border-radius:10px;padding:16px;">
          <div style="font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.5px;color:var(--primary-blue);margin-bottom:8px;">Total Timeline</div>
          <div style="font-size:1.6rem;font-family:'Nunito',sans-serif;font-weight:900;color:var(--text-dark);">26 Weeks</div>
          <div style="font-size:.78rem;color:var(--text-muted);margin-top:4px;">Discovery → Live Production</div>
        </div>
      </div>
      <div class="col-lg-8">
        @if(!empty($caseStudy->caseStudy->cs_process_steps))
          <div class="process-timeline">
            @foreach($caseStudy->caseStudy->cs_process_steps as $i => $s)
            <div class="process-step">
              <div class="process-step-dot">{{ $i + 1 }}</div>
              <div class="process-step-badge">{{ $s['badge'] ?? '' }}</div>
              <div class="process-step-title">{{ $s['title'] ?? '' }}</div>
              <p class="process-step-desc">{{ $s['desc'] ?? '' }}</p>
            </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════ SECURITY & COMPLIANCE ══════════════════════════════════════════ --}}
@if(!empty($caseStudy->caseStudy->compliance_items))
<section class="cs-section cs-section-alt">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Security & Compliance</div>
      <h2 class="section-heading">Built for the Strictest Standards</h2>
    </div>
    <div class="compliance-grid">
      @foreach($caseStudy->caseStudy->compliance_items as $c)
      <div class="compliance-item">
        <div class="compliance-icon"><i class="{{ $c['icon'] ?? 'fas fa-shield-alt' }}"></i></div>
        <div>
          <div class="compliance-title">{{ $c['title'] ?? '' }}</div>
          <div class="compliance-desc">{{ $c['desc'] ?? '' }}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ═══════════════════════════════════════════ 7. RESULTS ═══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-results">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Results / KPIs</div>
      <h2 class="section-heading">Measurable Impact</h2>
      <p class="section-sub mx-auto" style="max-width:520px;">Numbers measured at 6 months post-launch, independently verified by the client's operations team.</p>
    </div>

    @if(is_array($caseStudy->caseStudy->kpis))
        <div class="results-kpi-grid">
            @foreach($caseStudy->caseStudy->kpis as $kpi)
            <div class="kpi-card">
                <div class="kpi-num">
                    {{ $kpi['value'] ?? '100%' }}
                </div>
                <div class="kpi-label">
                    {{ $kpi['label'] ?? 'Growth' }}
                </div>
            </div>
            @endforeach
        </div>
    @endif

    {{-- Before / After --}}
    @if(!empty($caseStudy->caseStudy->before_after))
      <div class="mt-5">
        <h3 class="section-heading mb-4" style="font-size:1.4rem;">Before vs. After</h3>
        <div class="table-responsive">
          <table class="ba-table">
            <thead>
              <tr>
                <th style="width:40%;"><i class="fas fa-times-circle ba-before-icon"></i> Before</th>
                <th style="width:60%;"><i class="fas fa-check-circle ba-after-icon"></i> After</th>
              </tr>
            </thead>
            <tbody>
              @foreach($caseStudy->caseStudy->before_after as $row)
              <tr><td>{{ $row['before'] ?? '' }}</td><td>{{ $row['after'] ?? '' }}</td></tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endif

  </div>
</section>

{{-- ═══════════════════════════════════════════ TESTIMONIAL ══════════════════════════════════════════ --}}
@if($caseStudy->caseStudy->has_testimonial)
<section class="cs-section cs-section-alt">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="cs-testimonial-block">
          <div class="cs-quote-mark">"</div>
          <div class="cs-testimonial-text">{{ $caseStudy->caseStudy->testimonial_quote }}</div>
          <div class="cs-author">
            <div class="cs-author-avatar" style="background:linear-gradient(135deg,#1a73e8,#1565c0);">
              {{ strtoupper(substr($caseStudy->caseStudy->testimonial_name, 0, 2)) }}
            </div>
            <div>
              <div class="cs-author-name">{{ $caseStudy->caseStudy->testimonial_name }}</div>
              <div class="cs-author-role">{{ $caseStudy->caseStudy->testimonial_role }}</div>
              <div class="cs-author-stars">★★★★★</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

{{-- ═══════════════════════════════════════════ GALLERY (Screenshots) ══════════════════════════════════════════ --}}
@if(!empty($caseStudy->caseStudy->gallery))
<section class="cs-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Screenshots & Gallery</div>
      <h2 class="section-heading">See It in Action</h2>
    </div>
    <div class="cs-gallery-grid">
      @foreach($caseStudy->caseStudy->gallery as $img)
      <div class="cs-gallery-item">
        <img src="{{ config('app.images_path') . $img }}" alt="{{ $caseStudy->title }} screenshot" class="img-fluid" style="border-radius:12px;">
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ═══════════════════════════════════════════ ACHIEVEMENTS ══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4">
        <div class="side-line"></div>
        <div class="section-eyebrow">Key Achievements</div>
        <h2 class="section-heading">Why This Project Matters</h2>
        <p class="section-sub">Beyond the numbers — this platform has improved healthcare access for patients in underserved communities across 12 US states who previously had no access to specialist care.</p>
      </div>
      <div class="col-lg-8">
        @if(!empty($caseStudy->caseStudy->achievements))
          <div class="achievement-list">
            @foreach($caseStudy->caseStudy->achievements as $a)
            <div class="achievement-item">
              <div class="ach-check"><i class="fas fa-check" style="font-size:.65rem;"></i></div>
              <div>
                <div class="ach-title">{{ $a['title'] ?? '' }}</div>
                <div class="ach-desc">{{ $a['desc'] ?? '' }}</div>
              </div>
            </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════ FAQ ═══════════════════════════════════════════ --}}
@if(!empty($caseStudy->caseStudy->cs_faqs))
<section class="cs-section" id="sec-faq">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="side-line"></div>
        <div class="section-eyebrow">FAQ</div>
        <h2 class="section-heading">Common Questions</h2>
        <p class="section-sub">Have more questions? <a href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal" style="color:var(--primary-blue);font-weight:700;text-decoration:none;">Book a call</a> with our team.</p>
      </div>
      <div class="col-lg-8">
        <div class="cs-faq">
          @foreach($caseStudy->caseStudy->cs_faqs as $i => $f)
          <div class="cs-faq-item">
            <div class="cs-faq-q" onclick="toggleFaq(this)">
              {{ $f['question'] ?? '' }}
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="cs-faq-a {{ $i === 0 ? 'show' : '' }}">{{ $f['answer'] ?? '' }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endif

{{-- ═══════════════════════════════════════════ RELATED CASE STUDIES ══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Related Case Studies</div>
      <h2 class="section-heading">More Success Stories</h2>
    </div>
    <div class="row g-4">
      @forelse($relatedCaseStudies as $r)
      <div class="col-md-4">
        <div class="related-card">
          <div class="related-visual" style="background:linear-gradient(135deg,#1a237e,#283593);">
            @if($r->featured_image)
              <img src="{{ config('app.images_path') . $r->featured_image }}" alt="{{ $r->title }}" style="width:100%;height:100%;object-fit:cover;">
            @endif
            <span class="related-badge">{{ $r->caseStudy->client_industry ?? '' }}</span>
          </div>
          <div class="related-body">
            <div class="related-category">{{ $r->caseStudy->client_industry ?? '' }}</div>
            <div class="related-title">{{ $r->title }}</div>
            <a href="#" class="btn-related">View Case Study <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      @empty
        <p class="text-center">No related case studies yet.</p>
      @endforelse
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════ CTA SECTION ══════════════════════════════════════════ --}}
<section class="cs-cta-section">
  <div class="container">
    <div class="section-eyebrow" style="color:var(--accent-blue);margin-bottom:12px;">Ready to Get Started?</div>
    <h2 class="cs-cta-title">
      Looking for Custom <span class="highlight">Healthcare Software</span> Development?
    </h2>
    <p class="cs-cta-sub">
      Kawach Technology helps startups and enterprises build scalable, secure, and high-performance digital platforms. Let's turn your vision into the next success story.
    </p>
    <div class="cs-cta-btns">
      <button class="btn-cs-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
        <i class="fas fa-calendar-alt me-2"></i> Schedule a Call
      </button>
      <button class="btn-cs-outline" data-bs-toggle="modal" data-bs-target="#getQuoteModal">
        Get a Free Quote
      </button>
      <a href="{{ url('/case-studies') }}" class="btn-cs-outline">
        View All Case Studies
      </a>
    </div>
  </div>
</section>

{{-- FOOTER --}}
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  /* ── STICKY NAV ACTIVE STATE ── */
  const navTabs = document.querySelectorAll('.cs-nav-tab');
  const sections = document.querySelectorAll('section[id]');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navTabs.forEach(t => t.classList.remove('active'));
        const active = document.querySelector(`.cs-nav-tab[href="#${entry.target.id}"]`);
        if (active) active.classList.add('active');
      }
    });
  }, { threshold: 0.35 });

  sections.forEach(s => observer.observe(s));

  /* ── FAQ TOGGLE ── */
  function toggleFaq(el) {
    const answer = el.nextElementSibling;
    const isOpen = answer.classList.contains('show');
    document.querySelectorAll('.cs-faq-a.show').forEach(a => a.classList.remove('show'));
    document.querySelectorAll('.cs-faq-q.open').forEach(q => q.classList.remove('open'));
    if (!isOpen) {
      answer.classList.add('show');
      el.classList.add('open');
    }
  }

  /* ── SMOOTH SCROLL ── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
</script>
</body>
</html>