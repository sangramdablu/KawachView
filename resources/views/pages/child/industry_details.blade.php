<!DOCTYPE html>
<html lang="en">

@php
    $indSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "Service",
                "@id" => $seoCanonical . "#service",
                "name" => $industry['title'],
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
                "serviceType" => $industry['title'],
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Industries", "item" => url('/#industries')],
                    ["@type" => "ListItem", "position" => 3, "name" => $industry['title'], "item" => $seoCanonical],
                ],
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($indSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
.ind-page{ font-family:'Open Sans', sans-serif; color:#1a1a2e; }
.ind-page h1, .ind-page h2, .ind-page h3, .ind-page h4{ font-family:'Nunito', sans-serif; font-weight:900; line-height:1.2; margin:0; }
.ind-container{ max-width:1180px; margin:0 auto; padding:0 24px; }
.ind-section{ padding:76px 0; }
.ind-section.bg-light{ background:#f4f6fb; }
.ind-section-head{ max-width:760px; margin:0 auto 44px; text-align:center; }
.ind-eyebrow{
  display:inline-flex; align-items:center; gap:8px; font-size:.74rem; font-weight:800;
  letter-spacing:1.5px; text-transform:uppercase; color:#1a73e8;
  background:rgba(26,115,232,.08); padding:7px 16px; border-radius:30px; margin-bottom:16px;
}
.ind-section-title{ font-size:clamp(1.7rem,3.2vw,2.3rem); margin-bottom:14px; }
.ind-section-sub{ color:#6c757d; font-size:1.03rem; }
.ind-btn{
  display:inline-flex; align-items:center; gap:9px; padding:14px 28px; border-radius:10px;
  font-weight:700; font-size:.95rem; border:none; cursor:pointer; transition:.2s; text-decoration:none;
}
.ind-btn-primary{ background:#1a73e8; color:#fff; }
.ind-btn-primary:hover{ background:#1558b0; box-shadow:0 8px 24px rgba(26,115,232,.35); color:#fff; }
.ind-btn-outline-light{ background:transparent; color:#fff; border:1.5px solid rgba(255,255,255,.35); }
.ind-btn-outline-light:hover{ border-color:#fff; background:rgba(255,255,255,.08); color:#fff; }

/* ── HERO ── */
.ind-hero{
  position:relative; overflow:hidden; color:#fff;
  background:linear-gradient(150deg,#081029 0%, #0b1b3e 55%, #102757 100%);
  padding:78px 0 74px;
}
.ind-hero::before{
  content:""; position:absolute; inset:0;
  background-image:linear-gradient(rgba(255,255,255,.045) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.045) 1px, transparent 1px);
  background-size:44px 44px;
  -webkit-mask-image:radial-gradient(ellipse 80% 80% at 50% 0%, #000 40%, transparent 100%);
  mask-image:radial-gradient(ellipse 80% 80% at 50% 0%, #000 40%, transparent 100%);
}
.ind-hero-inner{ position:relative; z-index:1; max-width:820px; }
.ind-breadcrumb{ font-size:.85rem; color:rgba(255,255,255,.6); margin-bottom:22px; }
.ind-breadcrumb a{ color:rgba(255,255,255,.75); text-decoration:none; }
.ind-breadcrumb a:hover{ color:#fff; }
.ind-hero-icon{
  width:64px; height:64px; border-radius:16px; background:rgba(26,115,232,.18);
  border:1.5px solid rgba(91,157,255,.35); display:flex; align-items:center; justify-content:center;
  font-size:1.7rem; color:#5b9dff; margin-bottom:22px;
}
.ind-hero h1{ font-size:clamp(2rem,4vw,2.7rem); margin-bottom:18px; }
.ind-hero-lede{ font-size:1.08rem; color:rgba(255,255,255,.82); line-height:1.7; margin-bottom:30px; max-width:680px; }
.ind-hero-cta{ display:flex; gap:14px; flex-wrap:wrap; }

/* ── CHALLENGES / SOLUTIONS GRID ── */
.ind-grid-2{ display:grid; grid-template-columns:repeat(2,1fr); gap:24px; }
.ind-card{
  background:#fff; border:1px solid #e7ebf3; border-radius:16px; padding:28px;
  box-shadow:0 4px 18px rgba(15,23,42,.04);
}
.ind-card-icon{
  width:46px; height:46px; border-radius:12px; background:rgba(26,115,232,.08);
  color:#1a73e8; display:flex; align-items:center; justify-content:center; font-size:1.15rem; margin-bottom:16px;
}
.ind-card h3{ font-size:1.08rem; margin-bottom:10px; }
.ind-card p{ color:#5a6b85; font-size:.94rem; line-height:1.65; margin:0; }

.ind-grid-4{ display:grid; grid-template-columns:repeat(4,1fr); gap:22px; }
.ind-grid-4 .ind-card{ padding:24px; }

/* ── FEATURES / INTEGRATIONS PILLS ── */
.ind-pill-block{ background:#fff; border:1px solid #e7ebf3; border-radius:16px; padding:32px; }
.ind-pill-block h3{ font-size:1.15rem; margin-bottom:18px; display:flex; align-items:center; gap:10px; }
.ind-pill-block h3 i{ color:#1a73e8; }
.ind-pills{ display:flex; flex-wrap:wrap; gap:10px; }
.ind-pill{
  display:inline-flex; align-items:center; gap:7px; background:#f4f6fb; border:1px solid #e7ebf3;
  border-radius:30px; padding:8px 16px; font-size:.86rem; font-weight:600; color:#2c3e5a;
}
.ind-pill i{ color:#1a73e8; font-size:.75rem; }

/* ── COMPLIANCE ── */
.ind-compliance-list{ display:grid; grid-template-columns:repeat(2,1fr); gap:16px; margin-top:24px; }
.ind-compliance-item{
  display:flex; gap:14px; background:#fff; border:1px solid #e7ebf3; border-radius:14px; padding:20px;
}
.ind-compliance-item i{ color:#1a9e63; font-size:1.1rem; flex-shrink:0; margin-top:2px; }
.ind-compliance-item span{ font-size:.93rem; color:#2c3e5a; line-height:1.5; }
.ind-compliance-note{
  margin-top:22px; font-size:.86rem; color:#8a95a8; background:#fff; border:1px dashed #d7deea;
  border-radius:12px; padding:16px 20px;
}

/* ── CASE STUDY SPOTLIGHT ── */
.ind-cs-spotlight{
  background:linear-gradient(135deg,#0d1b3e 0%, #17285c 55%, #0b1b3e 100%); border-radius:22px;
  padding:44px; color:#fff; display:grid; grid-template-columns:1fr auto; gap:24px; align-items:center;
}
.ind-cs-spotlight .ind-eyebrow{ background:rgba(91,157,255,.15); color:#8fb3f0; }
.ind-cs-spotlight h3{ font-size:1.4rem; margin:12px 0 10px; color:#fff; }
.ind-cs-spotlight p{ color:rgba(255,255,255,.75); font-size:.95rem; line-height:1.65; margin:0; max-width:600px; }
.ind-cs-btn{
  display:inline-flex; align-items:center; gap:8px; background:#fff; color:#0b1b3e; font-weight:700;
  padding:13px 24px; border-radius:10px; text-decoration:none; white-space:nowrap; font-size:.9rem;
}
.ind-cs-btn:hover{ background:#e8eefb; color:#0b1b3e; }

/* ── RELATED SERVICES ── */
.ind-service-card{
  display:flex; flex-direction:column; background:#fff; border:1px solid #e7ebf3; border-radius:16px;
  padding:26px; text-decoration:none; transition:.2s; height:100%;
}
.ind-service-card:hover{ border-color:#1a73e8; box-shadow:0 10px 30px rgba(26,115,232,.12); transform:translateY(-2px); }
.ind-service-card h3{ font-size:1.02rem; color:#1a1a2e; margin-bottom:8px; }
.ind-service-card p{ font-size:.88rem; color:#6c7a91; line-height:1.55; margin:0 0 14px; flex-grow:1; }
.ind-service-link{ font-size:.85rem; font-weight:700; color:#1a73e8; display:inline-flex; align-items:center; gap:6px; }

/* ── RELATED MARKETS ── */
.ind-market-row{ display:flex; flex-wrap:wrap; gap:14px; justify-content:center; }
.ind-market-chip{
  display:inline-flex; align-items:center; gap:9px; background:#fff; border:1px solid #e7ebf3;
  border-radius:30px; padding:11px 22px; text-decoration:none; color:#2c3e5a; font-weight:700; font-size:.9rem;
  transition:.2s;
}
.ind-market-chip:hover{ border-color:#1a73e8; color:#1a73e8; }

/* ── OTHER INDUSTRIES ── */
.ind-other-row{ display:flex; flex-wrap:wrap; gap:12px; justify-content:center; }
.ind-other-chip{
  display:inline-flex; align-items:center; gap:8px; background:#f4f6fb; border:1px solid #e7ebf3;
  border-radius:30px; padding:10px 18px; text-decoration:none; color:#2c3e5a; font-weight:600; font-size:.86rem;
  transition:.2s;
}
.ind-other-chip:hover{ background:#1a73e8; border-color:#1a73e8; color:#fff; }

@media (max-width:900px){
  .ind-grid-2, .ind-grid-4, .ind-compliance-list{ grid-template-columns:1fr; }
  .ind-cs-spotlight{ grid-template-columns:1fr; text-align:left; }
}
</style>

<body>
@include('layouts.navbar')

<div class="ind-page">

  {{-- ═══ HERO ═══ --}}
  <section class="ind-hero">
    <div class="ind-container ind-hero-inner">
      <div class="ind-breadcrumb">
        <a href="{{ url('/') }}">Home</a> <span>/</span> Industries <span>/</span> {{ $industry['title'] }}
      </div>
      <div class="ind-hero-icon"><i class="{{ $industry['icon'] }}"></i></div>
      <h1>{{ $industry['title'] }}</h1>
      <p class="ind-hero-lede">{{ $industry['intro'] }}</p>
      <div class="ind-hero-cta">
        <button class="ind-btn ind-btn-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
          <i class="fas fa-comments"></i> Get a Free Consultation
        </button>
        <button class="ind-btn ind-btn-outline-light" data-bs-toggle="modal" data-bs-target="#quoteModal">
          <i class="fas fa-file-invoice-dollar"></i> Get a Custom Estimate
        </button>
      </div>
    </div>
  </section>

  {{-- ═══ CHALLENGES ═══ --}}
  <section class="ind-section">
    <div class="ind-container">
      <div class="ind-section-head">
        <span class="ind-eyebrow"><i class="fas fa-triangle-exclamation"></i> Industry Challenges</span>
        <h2 class="ind-section-title">Where {{ $industry['title'] }} Projects Usually Get Stuck</h2>
        <p class="ind-section-sub">The recurring problems we see before a business brings in custom software.</p>
      </div>
      <div class="ind-grid-2">
        @foreach($industry['challenges'] as $challenge)
        <div class="ind-card">
          <div class="ind-card-icon"><i class="{{ $challenge['icon'] }}"></i></div>
          <h3>{{ $challenge['title'] }}</h3>
          <p>{{ $challenge['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══ SOLUTIONS ═══ --}}
  <section class="ind-section bg-light">
    <div class="ind-container">
      <div class="ind-section-head">
        <span class="ind-eyebrow"><i class="fas fa-cubes"></i> What We Build</span>
        <h2 class="ind-section-title">Software Solutions for {{ $industry['title'] }}</h2>
      </div>
      <div class="ind-grid-2">
        @foreach($industry['solutions'] as $solution)
        <div class="ind-card">
          <div class="ind-card-icon"><i class="{{ $solution['icon'] }}"></i></div>
          <h3>{{ $solution['title'] }}</h3>
          <p>{{ $solution['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══ FEATURES + INTEGRATIONS ═══ --}}
  <section class="ind-section">
    <div class="ind-container">
      <div class="ind-grid-2" style="align-items:start;">
        <div class="ind-pill-block">
          <h3><i class="fas fa-list-check"></i> Common Features</h3>
          <div class="ind-pills">
            @foreach($industry['features'] as $feature)
            <span class="ind-pill"><i class="fas fa-circle-check"></i> {{ $feature }}</span>
            @endforeach
          </div>
        </div>
        <div class="ind-pill-block">
          <h3><i class="fas fa-plug"></i> Typical Integrations</h3>
          <div class="ind-pills">
            @foreach($industry['integrations'] as $integration)
            <span class="ind-pill"><i class="fas fa-link"></i> {{ $integration }}</span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══ COMPLIANCE ═══ --}}
  <section class="ind-section bg-light">
    <div class="ind-container">
      <div class="ind-section-head">
        <span class="ind-eyebrow"><i class="fas fa-shield-halved"></i> Security &amp; Compliance</span>
        <h2 class="ind-section-title">Built With Data Handling in Mind</h2>
      </div>
      <div class="ind-compliance-list">
        @foreach($industry['compliance'] as $item)
        <div class="ind-compliance-item">
          <i class="fas fa-check-circle"></i>
          <span>{{ $item }}</span>
        </div>
        @endforeach
      </div>
      <p class="ind-compliance-note">
        Specific compliance requirements vary by region, provider network, and the exact data your system handles.
        We work with your legal or compliance team to confirm what applies to your project rather than assuming a
        one-size-fits-all checklist.
      </p>
    </div>
  </section>

  {{-- ═══ CASE STUDY SPOTLIGHT ═══ --}}
  @if($caseStudy)
  <section class="ind-section">
    <div class="ind-container">
      <div class="ind-cs-spotlight">
        <div>
          <span class="ind-eyebrow"><i class="fas fa-star"></i> Case Study</span>
          <h3>{{ $caseStudy->title }}</h3>
          <p>{{ $caseStudy->meta_description ?? Str::limit(strip_tags($caseStudy->caseStudy->challenge ?? ''), 220) }}</p>
        </div>
        <a href="{{ route('case-studies.show', $caseStudy->slug) }}" class="ind-cs-btn">
          Read Full Case Study <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>
  @endif

  {{-- ═══ RELATED SERVICES ═══ --}}
  @if($relatedServices->isNotEmpty())
  <section class="ind-section bg-light">
    <div class="ind-container">
      <div class="ind-section-head">
        <span class="ind-eyebrow"><i class="fas fa-diagram-project"></i> Relevant Services</span>
        <h2 class="ind-section-title">Services We Apply to {{ $industry['title'] }}</h2>
      </div>
      <div class="ind-grid-4">
        @foreach($relatedServices as $service)
        <a href="{{ $service->slug === 'custom-software-development' ? route('services.custom-software-development') : route('pages.child.sevice_details', $service->slug) }}" class="ind-service-card">
          <h3>{{ $service->title }}</h3>
          <p>{{ Str::limit($service->meta_description ?? strip_tags($service->service->short_description ?? ''), 100) }}</p>
          <span class="ind-service-link">Learn More <i class="fas fa-arrow-right"></i></span>
        </a>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  {{-- ═══ RELATED MARKETS ═══ --}}
  <section class="ind-section">
    <div class="ind-container">
      <div class="ind-section-head">
        <span class="ind-eyebrow"><i class="fas fa-earth-americas"></i> Where We Work</span>
        <h2 class="ind-section-title">We Build {{ $industry['title'] }} Solutions Across These Markets</h2>
      </div>
      <div class="ind-market-row">
        <a href="{{ route('country.usa') }}" class="ind-market-chip"><i class="fas fa-flag-usa"></i> USA</a>
        <a href="{{ route('country.uk') }}" class="ind-market-chip"><i class="fas fa-flag"></i> UK</a>
        <a href="{{ route('country.germany') }}" class="ind-market-chip"><i class="fas fa-flag"></i> Germany</a>
        <a href="{{ route('country.europe') }}" class="ind-market-chip"><i class="fas fa-earth-europe"></i> Europe</a>
      </div>
    </div>
  </section>

  {{-- ═══ OTHER INDUSTRIES ═══ --}}
  <section class="ind-section bg-light">
    <div class="ind-container">
      <div class="ind-section-head">
        <span class="ind-eyebrow"><i class="fas fa-layer-group"></i> Explore More</span>
        <h2 class="ind-section-title">Other Industries We Serve</h2>
      </div>
      <div class="ind-other-row">
        @foreach($otherIndustries as $other)
        <a href="{{ route('industries.show', $other['slug']) }}" class="ind-other-chip">
          <i class="{{ $other['icon'] }}"></i> {{ $other['title'] }}
        </a>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══ CLOSING CTA ═══ --}}
  <section class="cta-banner-section text-center">
    <div class="container">
      <h2 class="cta-banner-title">Ready to Build {{ $industry['title'] }} Software?</h2>
      <p class="cta-banner-sub">Let's talk about your business and the most cost-effective way to get there.</p>
      <div class="d-flex justify-content-center gap-3 flex-wrap" style="position:relative;z-index:1;">
        <button class="btn-hero-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
          <i class="fas fa-comments"></i> Get a Free Consultation
        </button>
        <button class="btn-hero-outline" data-bs-toggle="modal" data-bs-target="#quoteModal" style="border:none;">
          <i class="fas fa-file-invoice-dollar"></i> Get a Custom Estimate
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
