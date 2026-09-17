<!DOCTYPE html>
<html lang="en">

@php
    $solSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "Service",
                "@id" => $seoCanonical . "#service",
                "name" => $solution['title'],
                "description" => $seoDescription,
                "url" => $seoCanonical,
                "provider" => [
                    "@type" => "Organization",
                    "@id" => url('/') . "#organization",
                    "name" => "Kawach Technology",
                    "url" => url('/'),
                    "logo" => asset('assets/images/kawach.png'),
                ],
                "areaServed" => "Worldwide",
                "serviceType" => $solution['title'],
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Solutions", "item" => url('/services')],
                    ["@type" => "ListItem", "position" => 3, "name" => $solution['title'], "item" => $seoCanonical],
                ],
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($solSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
.sol-page{ font-family:'Open Sans', sans-serif; color:#1a1a2e; }
.sol-page h1, .sol-page h2, .sol-page h3, .sol-page h4{ font-family:'Nunito', sans-serif; font-weight:900; line-height:1.2; margin:0; }
.sol-container{ max-width:1180px; margin:0 auto; padding:0 24px; }
.sol-section{ padding:76px 0; }
.sol-section.bg-light{ background:#f4f6fb; }
.sol-section-head{ max-width:760px; margin:0 auto 44px; text-align:center; }
.sol-eyebrow{
  display:inline-flex; align-items:center; gap:8px; font-size:.74rem; font-weight:800;
  letter-spacing:1.5px; text-transform:uppercase; color:#1a73e8;
  background:rgba(26,115,232,.08); padding:7px 16px; border-radius:30px; margin-bottom:16px;
}
.sol-section-title{ font-size:clamp(1.7rem,3.2vw,2.3rem); margin-bottom:14px; }
.sol-section-sub{ color:#6c757d; font-size:1.03rem; }
.sol-btn{
  display:inline-flex; align-items:center; gap:9px; padding:14px 28px; border-radius:10px;
  font-weight:700; font-size:.95rem; border:none; cursor:pointer; transition:.2s; text-decoration:none;
}
.sol-btn-primary{ background:#1a73e8; color:#fff; }
.sol-btn-primary:hover{ background:#1558b0; box-shadow:0 8px 24px rgba(26,115,232,.35); color:#fff; }
.sol-btn-outline-light{ background:transparent; color:#fff; border:1.5px solid rgba(255,255,255,.35); }
.sol-btn-outline-light:hover{ border-color:#fff; background:rgba(255,255,255,.08); color:#fff; }

/* ── HERO ── */
.sol-hero{
  position:relative; overflow:hidden; color:#fff;
  background:linear-gradient(150deg,#081029 0%, #0b1b3e 55%, #102757 100%);
  padding:78px 0 74px;
}
.sol-hero::before{
  content:""; position:absolute; inset:0;
  background-image:linear-gradient(rgba(255,255,255,.045) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.045) 1px, transparent 1px);
  background-size:44px 44px;
  -webkit-mask-image:radial-gradient(ellipse 80% 80% at 50% 0%, #000 40%, transparent 100%);
  mask-image:radial-gradient(ellipse 80% 80% at 50% 0%, #000 40%, transparent 100%);
}
.sol-hero-inner{ position:relative; z-index:1; max-width:820px; }
.sol-breadcrumb{ font-size:.85rem; color:rgba(255,255,255,.6); margin-bottom:22px; }
.sol-breadcrumb a{ color:rgba(255,255,255,.75); text-decoration:none; }
.sol-breadcrumb a:hover{ color:#fff; }
.sol-hero-icon{
  width:64px; height:64px; border-radius:16px; background:rgba(26,115,232,.18);
  border:1.5px solid rgba(91,157,255,.35); display:flex; align-items:center; justify-content:center;
  font-size:1.7rem; color:#5b9dff; margin-bottom:22px;
}
.sol-hero h1{ font-size:clamp(2rem,4vw,2.7rem); margin-bottom:18px; }
.sol-hero-lede{ font-size:1.08rem; color:rgba(255,255,255,.82); line-height:1.7; margin-bottom:30px; max-width:680px; }
.sol-hero-cta{ display:flex; gap:14px; flex-wrap:wrap; }

/* ── SIGNS LIST ── */
.sol-signs-list{ max-width:800px; margin:0 auto; display:flex; flex-direction:column; gap:14px; }
.sol-sign-item{
  display:flex; gap:14px; align-items:flex-start; background:#fff; border:1px solid #e7ebf3;
  border-radius:14px; padding:18px 22px;
}
.sol-sign-item i{ color:#e0a72e; font-size:1.1rem; flex-shrink:0; margin-top:2px; }
.sol-sign-item span{ font-size:.95rem; color:#2c3e5a; line-height:1.6; }

/* ── SOLUTION FEATURES GRID ── */
.sol-grid-2{ display:grid; grid-template-columns:repeat(2,1fr); gap:24px; }
.sol-grid-3{ display:grid; grid-template-columns:repeat(3,1fr); gap:24px; }
.sol-card{
  background:#fff; border:1px solid #e7ebf3; border-radius:16px; padding:28px;
  box-shadow:0 4px 18px rgba(15,23,42,.04);
}
.sol-card-icon{
  width:46px; height:46px; border-radius:12px; background:rgba(26,115,232,.08);
  color:#1a73e8; display:flex; align-items:center; justify-content:center; font-size:1.15rem; margin-bottom:16px;
}
.sol-card h3{ font-size:1.08rem; margin-bottom:10px; }
.sol-card p{ color:#5a6b85; font-size:.94rem; line-height:1.65; margin:0; }

/* ── CASE STUDY SPOTLIGHT ── */
.sol-cs-spotlight{
  background:linear-gradient(135deg,#0d1b3e 0%, #17285c 55%, #0b1b3e 100%); border-radius:22px;
  padding:44px; color:#fff; display:grid; grid-template-columns:1fr auto; gap:24px; align-items:center;
}
.sol-cs-spotlight .sol-eyebrow{ background:rgba(91,157,255,.15); color:#8fb3f0; }
.sol-cs-spotlight h3{ font-size:1.4rem; margin:12px 0 10px; color:#fff; }
.sol-cs-spotlight p{ color:rgba(255,255,255,.75); font-size:.95rem; line-height:1.65; margin:0; max-width:600px; }
.sol-cs-btn{
  display:inline-flex; align-items:center; gap:8px; background:#fff; color:#0b1b3e; font-weight:700;
  padding:13px 24px; border-radius:10px; text-decoration:none; white-space:nowrap; font-size:.9rem;
}
.sol-cs-btn:hover{ background:#e8eefb; color:#0b1b3e; }

/* ── RELATED SERVICES ── */
.sol-service-card{
  display:flex; flex-direction:column; background:#fff; border:1px solid #e7ebf3; border-radius:16px;
  padding:26px; text-decoration:none; transition:.2s; height:100%;
}
.sol-service-card:hover{ border-color:#1a73e8; box-shadow:0 10px 30px rgba(26,115,232,.12); transform:translateY(-2px); }
.sol-service-card h3{ font-size:1.02rem; color:#1a1a2e; margin-bottom:8px; }
.sol-service-card p{ font-size:.88rem; color:#6c7a91; line-height:1.55; margin:0 0 14px; flex-grow:1; }
.sol-service-link{ font-size:.85rem; font-weight:700; color:#1a73e8; display:inline-flex; align-items:center; gap:6px; }

/* ── OTHER SOLUTIONS ── */
.sol-other-row{ display:flex; flex-wrap:wrap; gap:12px; justify-content:center; }
.sol-other-chip{
  display:inline-flex; align-items:center; gap:8px; background:#f4f6fb; border:1px solid #e7ebf3;
  border-radius:30px; padding:10px 18px; text-decoration:none; color:#2c3e5a; font-weight:600; font-size:.86rem;
  transition:.2s;
}
.sol-other-chip:hover{ background:#1a73e8; border-color:#1a73e8; color:#fff; }

@media (max-width:960px){
  .sol-grid-3{ grid-template-columns:repeat(2,1fr); }
}
@media (max-width:900px){
  .sol-grid-2{ grid-template-columns:1fr; }
  .sol-cs-spotlight{ grid-template-columns:1fr; text-align:left; }
}
@media (max-width:640px){
  .sol-grid-3{ grid-template-columns:1fr; }
}
</style>

<body>
@include('layouts.navbar')

<div class="sol-page">

  {{-- ═══ HERO ═══ --}}
  <section class="sol-hero">
    <div class="sol-container sol-hero-inner">
      <div class="sol-breadcrumb">
        <a href="{{ url('/') }}">Home</a> <span>/</span> Solutions <span>/</span> {{ $solution['title'] }}
      </div>
      <div class="sol-hero-icon"><i class="{{ $solution['icon'] }}"></i></div>
      <h1>{{ $solution['title'] }}</h1>
      <p class="sol-hero-lede">{{ $solution['problem_intro'] }}</p>
      <div class="sol-hero-cta">
        <button class="sol-btn sol-btn-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
          <i class="fas fa-comments"></i> Get a Free Consultation
        </button>
        <button class="sol-btn sol-btn-outline-light" data-bs-toggle="modal" data-bs-target="#quoteModal">
          <i class="fas fa-file-invoice-dollar"></i> Get a Custom Estimate
        </button>
      </div>
    </div>
  </section>

  {{-- ═══ SIGNS YOU HAVE THIS PROBLEM ═══ --}}
  <section class="sol-section">
    <div class="sol-container">
      <div class="sol-section-head">
        <span class="sol-eyebrow"><i class="fas fa-magnifying-glass"></i> Is This You?</span>
        <h2 class="sol-section-title">Signs This Is Actually Costing You</h2>
      </div>
      <div class="sol-signs-list">
        @foreach($solution['signs'] as $sign)
        <div class="sol-sign-item">
          <i class="fas fa-triangle-exclamation"></i>
          <span>{{ $sign }}</span>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══ WHAT THE SOLUTION LOOKS LIKE ═══ --}}
  <section class="sol-section bg-light">
    <div class="sol-container">
      <div class="sol-section-head">
        <span class="sol-eyebrow"><i class="fas fa-cubes"></i> What We Build</span>
        <h2 class="sol-section-title">What {{ $solution['title'] }} Actually Looks Like</h2>
      </div>
      <div class="sol-grid-2">
        @foreach($solution['solution_features'] as $feature)
        <div class="sol-card">
          <div class="sol-card-icon"><i class="fas fa-check"></i></div>
          <h3>{{ $feature['title'] }}</h3>
          <p>{{ $feature['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══ CASE STUDY SPOTLIGHT ═══ --}}
  @if($caseStudy)
  <section class="sol-section">
    <div class="sol-container">
      <div class="sol-cs-spotlight">
        <div>
          <span class="sol-eyebrow"><i class="fas fa-star"></i> Real Example</span>
          <h3>{{ $caseStudy->title }}</h3>
          <p>{{ $caseStudy->meta_description ?? Str::limit(strip_tags($caseStudy->caseStudy->challenge ?? ''), 220) }}</p>
        </div>
        <a href="{{ route('case-studies.show', $caseStudy->slug) }}" class="sol-cs-btn">
          Read Full Case Study <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>
  @endif

  {{-- ═══ RELATED SERVICES ═══ --}}
  @if($relatedServices->isNotEmpty())
  <section class="sol-section bg-light">
    <div class="sol-container">
      <div class="sol-section-head">
        <span class="sol-eyebrow"><i class="fas fa-diagram-project"></i> How We'd Build It</span>
        <h2 class="sol-section-title">Related Services</h2>
      </div>
      <div class="sol-grid-3">
        @foreach($relatedServices as $service)
        <a href="{{ $service->slug === 'custom-software-development' ? route('services.custom-software-development') : route('pages.child.sevice_details', $service->slug) }}" class="sol-service-card">
          <h3>{{ $service->title }}</h3>
          <p>{{ Str::limit($service->meta_description ?? strip_tags($service->service->short_description ?? ''), 100) }}</p>
          <span class="sol-service-link">Learn More <i class="fas fa-arrow-right"></i></span>
        </a>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  {{-- ═══ OTHER SOLUTIONS ═══ --}}
  <section class="sol-section">
    <div class="sol-container">
      <div class="sol-section-head">
        <span class="sol-eyebrow"><i class="fas fa-layer-group"></i> Explore More</span>
        <h2 class="sol-section-title">Other Problems We Solve</h2>
      </div>
      <div class="sol-other-row">
        @foreach($otherSolutions as $other)
        <a href="{{ route('solutions.show', $other['slug']) }}" class="sol-other-chip">
          <i class="{{ $other['icon'] }}"></i> {{ $other['title'] }}
        </a>
        @endforeach
        <a href="{{ route('services') }}" class="sol-other-chip">
          <i class="fas fa-layer-group"></i> All Services
        </a>
      </div>
    </div>
  </section>

  {{-- ═══ CLOSING CTA ═══ --}}
  <section class="cta-banner-section text-center">
    <div class="container">
      <h2 class="cta-banner-title">Ready to Fix This For Good?</h2>
      <p class="cta-banner-sub">Let's talk about what you're dealing with, and the most cost-effective way to solve it.</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap" style="position:relative;z-index:1;">
        <button class="btn-hero-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
          <i class="fas fa-comments"></i> Get a Free Consultation
        </button>
        <button class="btn-hero-outline" data-bs-toggle="modal" data-bs-target="#quoteModal" style="border:none;">
          <i class="fas fa-file-invoice-dollar"></i> Get a Custom Software Estimate
        </button>
      </div>
      <p style="position:relative;z-index:1;margin-top:18px;">
        <a href="{{ route('contact') }}" style="color:rgba(255,255,255,.75);font-size:.9rem;text-decoration:underline;">Or reach out through our contact page &rarr;</a>
      </p>
    </div>
  </section>

</div>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
