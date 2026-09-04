<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Software Development Markets We Serve | KawachTech';
    $seoDescription = 'KawachTech builds custom software, SaaS and AI solutions for businesses in the USA, UK, Germany and across Europe. Explore how we work in your market.';
    $seoKeywords    = 'software development company USA, software development company UK, software development company Germany, software development services Europe';
    $seoCanonical   = url('/markets');

    $marketsSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Markets", "item" => $seoCanonical],
                ],
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($marketsSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<body>

@include('layouts.navbar')

<style>
:root{
  --primary:#1a73e8; --primary-dark:#1558b0; --accent:#2196f3;
  --dark-navy:#0b1b3e; --darker-navy:#081029;
  --text-dark:#1a1a2e; --text-muted:#6c757d;
  --bg-light:#f4f6fb; --border-light:#e2e8f0;
  --radius:16px; --shadow:0 10px 30px rgba(15,23,42,.06); --shadow-lg:0 20px 50px rgba(11,27,62,.12);
}
.mkt-page{ font-family:'Open Sans', sans-serif; color:var(--text-dark); }
.mkt-page h1, .mkt-page h2{ font-family:'Nunito', sans-serif; font-weight:900; line-height:1.2; margin:0; }
.mkt-container{ max-width:1180px; margin:0 auto; padding:0 24px; }
.mkt-hero{
  position:relative; overflow:hidden; color:#fff;
  background:linear-gradient(150deg,var(--darker-navy) 0%, var(--dark-navy) 55%, #102757 100%);
  padding:64px 0 60px;
}
.mkt-breadcrumb{ font-size:.78rem; color:#a9c1ee; margin-bottom:20px; }
.mkt-breadcrumb a{ color:#a9c1ee; text-decoration:none; }
.mkt-breadcrumb a:hover{ color:#fff; }
.mkt-hero h1{ font-size:clamp(1.9rem,3.8vw,2.6rem); max-width:760px; margin-bottom:16px; }
.mkt-hero p{ color:#c7d6f5; font-size:1.08rem; max-width:680px; margin:0; }
.mkt-section{ padding:70px 0; }
.mkt-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:24px; }
.mkt-card{
  background:#fff; border:1px solid var(--border-light); border-radius:var(--radius);
  padding:30px 28px; box-shadow:var(--shadow); transition:.25s; text-decoration:none; color:var(--text-dark); display:block;
}
.mkt-card:hover{ transform:translateY(-4px); box-shadow:var(--shadow-lg); color:var(--text-dark); }
.mkt-card-flag{ font-size:.72rem; font-weight:800; letter-spacing:1px; text-transform:uppercase; color:var(--primary); background:rgba(26,115,232,.08); padding:5px 12px; border-radius:20px; display:inline-block; margin-bottom:14px; }
.mkt-card h2{ font-size:1.3rem; margin-bottom:10px; }
.mkt-card p{ color:var(--text-muted); font-size:.94rem; margin:0 0 16px; line-height:1.6; }
.mkt-card-link{ color:var(--primary); font-weight:700; font-size:.88rem; }
.mkt-footer-links{ text-align:center; margin-top:44px; color:var(--text-muted); }
.mkt-footer-links a{ color:var(--primary); font-weight:700; text-decoration:none; }
@media (max-width:768px){ .mkt-grid{ grid-template-columns:1fr; } .mkt-section{ padding:50px 0; } }
</style>

<div class="mkt-page">
  <section class="mkt-hero">
    <div class="mkt-container">
      <div class="mkt-breadcrumb"><a href="{{ url('/') }}">Home</a> <span>/</span> Markets</div>
      <h1>Software Development Markets We Serve</h1>
      <p>KawachTech builds custom software, SaaS and AI solutions for businesses around the world. Explore how we work specifically with companies in the USA, UK, Germany and across Europe.</p>
    </div>
  </section>

  <section class="mkt-section">
    <div class="mkt-container">
      <div class="mkt-grid">
        <a href="{{ route('country.usa') }}" class="mkt-card">
          <span class="mkt-card-flag">United States</span>
          <h2>Software Development for US Businesses</h2>
          <p>Custom software, SaaS and AI development for US founders, CTOs and product teams — with a realistic look at time-zone collaboration and US-specific compliance considerations.</p>
          <span class="mkt-card-link">Explore the USA page &rarr;</span>
        </a>
        <a href="{{ route('country.uk') }}" class="mkt-card">
          <span class="mkt-card-flag">United Kingdom</span>
          <h2>Software Development for UK Businesses</h2>
          <p>Custom software development for UK companies, with genuine working-day overlap, UK GDPR-aware delivery, and IR35-conscious engagement structures.</p>
          <span class="mkt-card-link">Explore the UK page &rarr;</span>
        </a>
        <a href="{{ route('country.germany') }}" class="mkt-card">
          <span class="mkt-card-flag">Germany</span>
          <h2>Software Development for German Businesses</h2>
          <p>Documentation-first custom software and industrial IoT development for German enterprises and Mittelstand manufacturers, with GDPR/BDSG-aware design.</p>
          <span class="mkt-card-link">Explore the Germany page &rarr;</span>
        </a>
        <a href="{{ route('country.europe') }}" class="mkt-card">
          <span class="mkt-card-flag">Europe</span>
          <h2>Software Development Services for European Businesses</h2>
          <p>Multi-market, GDPR-first software development for companies operating across several European countries at once.</p>
          <span class="mkt-card-link">Explore the Europe page &rarr;</span>
        </a>
      </div>
      <div class="mkt-footer-links">
        Looking for our core service? <a href="{{ route('pages.child.sevice_details', 'custom-software-development') }}">Custom Software Development Services</a>
        &middot; <a href="{{ route('casestudy') }}">View Case Studies</a>
      </div>
    </div>
  </section>
</div>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
