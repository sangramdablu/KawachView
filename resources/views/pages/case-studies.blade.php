<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Case Studies | Healthcare, SaaS & Web Development Projects | Kawach Technology';
    $seoDescription = 'Explore Kawach Technology case studies featuring scalable healthcare platforms, SaaS applications, enterprise web development, cloud infrastructure, and custom software solutions for global clients.';
    $seoKeywords    = 'web development company USA, software development company Canada, healthcare software development, SaaS development services, custom web application development, enterprise software development, telehealth platform development, HIPAA compliant software development, cloud application development, React development company, Node.js development services, AWS cloud solutions, healthcare app development company, custom software agency Europe';
    $seoCanonical   = url('/case-studies');
    $seoImage       = asset('assets/images/kawach.png');
@endphp

<!-- Schema.org JSON-LD -->
@push('schema')
@php
    $caseStudiesSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "CollectionPage",
                "name" => "Kawach Case Studies",
                "url" => $seoCanonical,
                "description" => $seoDescription,
                "publisher" => [
                    "@type" => "Organization",
                    "name" => "Kawach Technology",
                    "url" => url('/'),
                    "logo" => [
                        "@type" => "ImageObject",
                        "url" => asset('assets/images/kawach.png'),
                    ],
                ],
            ],
            [
                "@type" => "ItemList",
                "itemListElement" => $caseStudies->values()->map(function ($page, $i) {
                    return [
                        "@type" => "ListItem",
                        "position" => $i + 1,
                        "url" => url('/case-studies/' . $page->slug),
                        "name" => $page->title,
                    ];
                })->all(),
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Case Studies", "item" => url('/case-studies')],
                ],
            ],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($caseStudiesSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
  .case-hero-section{
      position: relative;
      overflow: hidden;
      display: flex;
      align-items: center;
      padding: 80px 0 70px;
      background:  url('{{ asset("assets/images/kawach_main_bg.png") }}')  center center / cover no-repeat;
  }
  /* Extra blur overlay */
  .case-hero-section::after{
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
  .case-hero-section .container,
  .case-hero-section .container{
      position:relative;
      z-index:3;
  }
  .featured-case-image,
  .case-card-image{
      width:100%;
      height:100%;

      object-fit:cover;
      object-position:center;

      display:block;
  }

  .case-card-visual,
  .featured-card-visual{
      overflow:hidden;
  }
</style>
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7J267VF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- ── NAVBAR ── -->
@include('layouts.navbar')

<!-- ── HERO ── -->
<section class="case-hero-section">
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

    {{-- Circuit board nodes --}}
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

    {{-- Data packets (horizontal travel) --}}
    <div class="data-packet dp-blue  dp-1"></div>
    <div class="data-packet dp-green dp-2"></div>
    <div class="data-packet dp-white dp-3"></div>
    <div class="data-packet dp-blue  dp-4"></div>
    <div class="data-packet dp-green dp-5"></div>
    <div class="data-packet dp-white dp-6"></div>
    <div class="data-packet dp-blue  dp-7"></div>
    <div class="data-packet dp-green dp-8"></div>

    {{-- Binary rain columns (sides only) --}}
    <div class="binary-col bc-1">1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-2">0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-3">1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-4">0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-5">1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0</div>
    <div class="binary-col bc-6">0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1</div>

    {{-- Scan line --}}
    <div class="hero-scan-line"></div>

  </div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-7">
        <div class="hero-eyebrow">Our Success Stories</div>
        <h1 class="hero-title">Case Studies</h1>
        <p class="hero-subtitle">
          Real results for real businesses. Explore how we've transformed ideas into powerful digital solutions across industries.
        </p>
        <div class="d-flex gap-3 flex-wrap">
          <a href="#cases" class="btn-hero-primary">Explore Projects</a>
          <a href="#" class="btn-hero-outline">Start Your Project</a>
        </div>
        <div class="casehero-stats">
          <div class="stat-item">
            <div class="stat-number">{{ $stats['projects'] }}+<span>+</span></div>
            <div class="stat-label">Projects Delivered</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">{{ $stats['satisfaction'] }}<span>%</span></div>
            <div class="stat-label">Client Satisfaction</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">{{ $stats['industries'] }}<span>+</span></div>
            <div class="stat-label">Industries Served</div>
          </div>
        </div>
      </div>

      <!-- hero chart illustration -->
      <div class="col-lg-6 col-md-5 d-none d-md-flex hero-illustration">
        <div class="hero-chart-wrap">
          <div class="mini-stat-card msc-1">
            <div class="msc-num"><span>↑</span> 150%</div>
            <div class="msc-label">Revenue Growth</div>
          </div>
          <div class="mini-stat-card msc-2">
            <div class="msc-num"><span>↓</span> 60%</div>
            <div class="msc-label">Cost Reduction</div>
          </div>
          <div class="chart-card">
            <div class="chart-card-title">
              <i class="fas fa-chart-bar"></i> Project Outcomes
            </div>
            <div class="chart-bars">
              <div class="chart-bar-group">
                <div class="chart-bar-val">+150%</div>
                <div class="chart-bar" style="height:90px;"></div>
                <div class="chart-bar-label">E-Com</div>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar-val">+80%</div>
                <div class="chart-bar" style="height:60px; opacity:0.75;"></div>
                <div class="chart-bar-label">CRM</div>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar-val">+65%</div>
                <div class="chart-bar" style="height:50px; opacity:0.65;"></div>
                <div class="chart-bar-label">Health</div>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar-val">+90%</div>
                <div class="chart-bar" style="height:72px; opacity:0.85;"></div>
                <div class="chart-bar-label">Fin</div>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar-val">+70%</div>
                <div class="chart-bar" style="height:55px; opacity:0.7;"></div>
                <div class="chart-bar-label">Edu</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FILTER TABS ── -->
<section class="filter-section">
  <div class="container">
    <div class="filter-tabs">
      {{-- <button class="filter-btn active">All Projects</button> --}}
      <div class="filter-tabs">
          <button class="filter-btn active">All Projects</button>
          @foreach($categories as $category)
              <button class="filter-btn">{{ $category }}</button>
          @endforeach
      </div>
      {{-- <button class="filter-btn">AI &amp; ML</button>
      <button class="filter-btn">Cloud &amp; DevOps</button>
      <button class="filter-btn">Healthcare</button>
      <button class="filter-btn">FinTech</button>
      <button class="filter-btn">Education</button> --}}
    </div>
  </div>
</section>

<!-- ── FEATURED CASE STUDY ── -->
<section class="featured-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Featured Case Study</h2>
      <p class="section-subtitle">Our most impactful project of the year</p>
    </div>

    @if($featuredCase)
      <div class="featured-card">
          <div class="featured-card-visual">
              @if($featuredCase->featured_image)
                  <img src="{{ config('app.images_path') . $featuredCase->featured_image }}" alt="{{ $featuredCase->title }}" title="{{ $featuredCase->title }}" class="featured-case-image">
              @endif
              <div class="featured-tag">⭐ Featured</div>
          </div>
          <div class="featured-card-body">
              <div class="case-category">{{ $featuredCase->caseStudy->client_industry ?? 'Technology'}}
              </div>
              <h3 class="case-title"> {{ $featuredCase->title }} </h3>
              <p class="case-desc">
                  {{ \Illuminate\Support\Str::limit(strip_tags($featuredCase->caseStudy->challenge ?? $featuredCase->caseStudy->solution ?? ''),220) }}
              </p>

              {{-- KPIs --}}
              <div class="case-metrics">
                  @php
                    $kpis = $featuredCase->caseStudy->kpis;
                    // Convert string JSON to array safely
                    if (is_string($kpis)) {
                        $decoded = json_decode($kpis, true);
                        $kpis = is_array($decoded) ? $decoded : [];
                    }
                  @endphp
                @if(!empty($kpis))
                    @foreach(array_slice($kpis, 0, 3) as $kpi)
                        <div class="metric-item">
                            <div class="metric-value">  {{ $kpi['value'] ?? '100%' }}  </div>
                            <div class="metric-label"> {{ $kpi['label'] ?? 'Growth' }} </div>
                        </div>
                    @endforeach
                @endif
              </div>
              <a href="{{ route('case-studies.show', $featuredCase->slug) }}" class="btn-read-more">
                  Read Full Case Study
                  <i class="fas fa-arrow-right"></i>
              </a>
          </div>
      </div>
    @endif

  </div>
</section>

<!-- ── CASE STUDY CARDS ── -->
<section class="cases-section" id="cases">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">All Case Studies</h2>
      <p class="section-subtitle">Explore our portfolio of successful digital transformations</p>
    </div>

    <div class="row g-4">
      @foreach($caseStudies as $case)
      <div class="col-md-4">
          <div class="case-card">
              <div class="case-card-visual ccv-ecom">
                  @if($case->featured_image)
                      <img src="{{ config('app.images_path') . $case->featured_image }}" alt="{{ $case->title }}" title="{{ $case->title }}" class="case-card-image">
                  @endif
                  <div class="ccv-badge">
                      {{ $case->caseStudy->client_industry ?? 'Technology'}}
                  </div>
              </div>
              <div class="case-card-body">
                  <div class="case-card-category">
                      {{ $case->category->name ?? 'Case Study' }}
                  </div>
                  <div class="case-card-title"> {{ $case->title }}</div>
                  <p class="case-card-desc">
                      {{ \Illuminate\Support\Str::words(strip_tags( $case->caseStudy->challenge ?? $case->caseStudy->solution ?? '' ), 18, '...') }}
                  </p>
                  <div class="case-card-footer">
                      <div>
                          <div class="case-card-metric">
                              {{ $case->caseStudy->project_duration . ' Months' ?? '6 Months' }}
                          </div>
                          <div class="case-card-metric-label">Duration</div>
                      </div>
                      <a href="{{ route('case-studies.show', $case->slug) }}" class="btn-case-link"> View Study <i class="fas fa-arrow-right"></i>
                      </a>
                  </div>
              </div>
          </div>
      </div>
      @endforeach

      </div>
  </div>
</section>

<!-- ── TESTIMONIALS ── -->
@include('layouts.testmonials')

<!-- ── INDUSTRIES ── -->
@include('layouts.industry')


<!-- ── CTA BANNER ── -->
<section class="cta-banner">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center text-md-start g-3">
      <div class="col-md-auto">
        <p class="cta-banner-text mb-0">
          Ready to be our next&nbsp;<span class="highlight">success story?</span>
        </p>
      </div>
      <div class="col-md-auto ms-md-4">
        <button class="btn btn-cta-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">Schedule a Call</button>
      </div>
    </div>
  </div>
</section>

<!-- ── FOOTER ── -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  // Filter tab interactivity
  const filterBtns = document.querySelectorAll('.filter-btn');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });
</script>
</body>
</html>
