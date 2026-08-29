<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Our Services | Custom Software Development Company | Kawach Technology';
    $seoDescription = "Explore Kawach Technology's full range of software development services — web, mobile, AI, cloud, and SaaS solutions for businesses in the USA and Europe.";
    $seoKeywords    = 'software development services, web development services, mobile app development, AI development services, cloud application development, SaaS development';
    $seoCanonical   = url('/services');
@endphp

@push('schema')
@php
    $servicesSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "CollectionPage",
                "name" => $seoTitle,
                "url" => $seoCanonical,
                "description" => $seoDescription,
            ],
            [
                "@type" => "ItemList",
                "itemListElement" => $services->values()->map(function ($page, $i) {
                    return [
                        "@type" => "ListItem",
                        "position" => $i + 1,
                        "item" => [
                            "@type" => "Service",
                            "name" => $page->title,
                            "url" => url('/services/' . $page->slug),
                            "provider" => [
                                "@type" => "Organization",
                                "name" => "Kawach Technology",
                            ],
                        ],
                    ];
                })->all(),
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Services", "item" => url('/services')],
                ],
            ],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($servicesSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
<style>
    .services-hero-section {
      position: relative;
      overflow: hidden;
      background: #0f172a;
    }

    /* Background Image */
    .services-hero-section::before {
      content: "";
      position: absolute;
      inset: 0;
      background: url('{{ asset("assets/images/kawach_main_bg.png") }}') center center/cover no-repeat;
      /* opacity: 0.12; */
      z-index: 0;
    }

    .hero-bg-layer {
      position: absolute;
      inset: 0;
      z-index: 2;
      pointer-events: none;
    }

    .services-hero-section .container {
      position: relative;
      z-index: 3;
    }

    /* ── Decorative background for the "Expert Solutions" grid
         (cubes, blurred blobs, dot pattern, arc) — same treatment as
         the homepage services carousel. ── */
    .solutions-section{
        position:relative;
        overflow:hidden;
    }

    .solutions-section .container{
        position:relative;
        z-index:1;
    }

    .svc-bg-deco{
        position:absolute;
        inset:0;
        z-index:0;
        overflow:hidden;
        pointer-events:none;
    }

    .svc-blob{
        position:absolute;
        border-radius:50%;
        filter:blur(50px);
    }

    .svc-blob-1{
        width:340px;
        height:340px;
        left:-120px;
        bottom:-100px;
        background:radial-gradient(circle,rgba(59,130,246,.30),transparent 70%);
    }

    .svc-blob-2{
        width:220px;
        height:220px;
        right:-60px;
        top:-40px;
        background:radial-gradient(circle,rgba(99,102,241,.22),transparent 70%);
    }

    .svc-blob-3{
        width:200px;
        height:200px;
        right:6%;
        bottom:6%;
        background:radial-gradient(circle,rgba(59,130,246,.18),transparent 70%);
    }

    .svc-dots{
        position:absolute;
        top:-20px;
        right:0;
        width:360px;
        height:360px;
        background-image:radial-gradient(rgba(26,115,232,.35) 1.5px, transparent 1.5px);
        background-size:18px 18px;
        -webkit-mask-image:radial-gradient(circle at 70% 30%, #000 0%, transparent 70%);
        mask-image:radial-gradient(circle at 70% 30%, #000 0%, transparent 70%);
        opacity:.6;
    }

    .svc-arc{
        position:absolute;
        top:50%;
        left:-260px;
        width:480px;
        height:480px;
        border:1px solid rgba(26,115,232,.16);
        border-radius:50%;
        transform:translateY(-50%);
    }

    /* Isometric CSS cubes */
    .svc-cube{
        position:absolute;
    }

    .svc-cube .cube-face{
        position:absolute;
        width:100%;
        height:100%;
    }

    .svc-cube .cube-top{
        background:linear-gradient(135deg,#dce9ff,#aecbfa);
        clip-path:polygon(50% 0%, 100% 25%, 50% 50%, 0% 25%);
    }

    .svc-cube .cube-left{
        background:linear-gradient(135deg,#9fc0f0,#7fa8e6);
        clip-path:polygon(0% 25%, 50% 50%, 50% 100%, 0% 75%);
    }

    .svc-cube .cube-right{
        background:linear-gradient(135deg,#bcd6fa,#8fb6ee);
        clip-path:polygon(50% 50%, 100% 25%, 100% 75%, 50% 100%);
    }

    .svc-cube-1{
        top:8%;
        left:3%;
        width:92px;
        height:106px;
        opacity:.85;
        transform:rotate(-4deg);
    }

    .svc-cube-2{
        top:38%;
        right:9%;
        width:52px;
        height:60px;
        opacity:.4;
        transform:rotate(8deg);
    }

    @media(max-width:576px){
        .svc-cube-1{ width:60px; height:70px; }
        .svc-cube-2{ display:none; }
        .svc-dots{ width:220px; height:220px; }
    }
</style>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7J267VF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- ── NAVBAR ── -->
@include('layouts.navbar')

<!-- ── HERO ── -->
<section class="services-hero-section">
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
      <!-- left copy -->
      <div class="col-lg-6 col-md-7">
        <div class="hero-eyebrow">What We Offer</div>
        <h1 class="hero-title">Our Services</h1>
        <p class="hero-subtitle">
          We Deliver Innovative Software Solutions Tailored to Your Business Needs
        </p>
        <div class="d-flex gap-3 flex-wrap">
          <button class="btn btn-consultation" data-bs-toggle="modal" data-bs-target="#consultModal">Get a Free Consultation</button>
          <a href="#approach" class="btn-hero-outline">Our Approach</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── EXPERT SOLUTIONS ── -->
<section class="solutions-section">
  <div class="svc-bg-deco" aria-hidden="true">
      <div class="svc-arc"></div>
      <div class="svc-dots"></div>
      <div class="svc-blob svc-blob-1"></div>
      <div class="svc-blob svc-blob-2"></div>
      <div class="svc-blob svc-blob-3"></div>
      <div class="svc-cube svc-cube-1">
          <div class="cube-face cube-top"></div>
          <div class="cube-face cube-left"></div>
          <div class="cube-face cube-right"></div>
      </div>
      <div class="svc-cube svc-cube-2">
          <div class="cube-face cube-top"></div>
          <div class="cube-face cube-left"></div>
          <div class="cube-face cube-right"></div>
      </div>
  </div>
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="solutions-heading">Expert Solutions for Every Industry</h2>
    </div>
    <!-- Row 2 -->
    <div class="row g-4 mb-4">
     @foreach($services as $service)
      <div class="col-md-4">
        <div class="service-card">  
          <div class="service-card-img">
            <div class="svc-icon-wrap">
              <div class="svc-icon-circle ic-custom">
                <img src="{{ config('app.images_path') . $service->featured_image }}" alt="{{ $service->image_alt }}" title="{{ $service->image_title }}">
              </div>
            </div>
          </div>
          <div class="service-card-body">
            <div class="service-card-title">{{ $service->title }}</div>
            <p class="service-card-desc">{{ $service->service->short_description }}</p>
            <a href="{{ route('pages.child.sevice_details', $service->slug) }}" class="btn-learn">Learn More</a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</section>

<!-- ── APPROACH ── -->
<section class="approach-section" id="approach">
  <div class="container text-center">
    <h2 class="approach-heading">Our Approach to Software Development</h2>
    <div class="approach-steps">

      <div class="approach-step">
        <div class="step-icon-wrap">
          <i class="fas fa-search"></i>
        </div>
        <div class="step-title">Discovery</div>
        <p class="step-desc">Understanding your needs and goals</p>
      </div>

      <div class="approach-step">
        <div class="step-icon-wrap">
          <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="step-title">Planning</div>
        <p class="step-desc">Crafting a tailored project roadmap</p>
      </div>

      <div class="approach-step">
        <div class="step-icon-wrap">
          <i class="fas fa-cogs"></i>
        </div>
        <div class="step-title">Development</div>
        <p class="step-desc">Building and testing the solution</p>
      </div>

      <div class="approach-step">
        <div class="step-icon-wrap">
          <i class="fas fa-rocket"></i>
        </div>
        <div class="step-title">Delivery</div>
        <p class="step-desc">Launching the product and providing support</p>
      </div>

    </div>
  </div>
</section>

<!-- ── CTA BANNER ── -->
<section class="cta-banner">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center text-md-start g-3">
      <div class="col-md-auto">
        <p class="cta-banner-text mb-0">
          Got a project in mind?&nbsp;
          <span class="highlight">Let's make it a reality.</span>
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
</body>
</html>
