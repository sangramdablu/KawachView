<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Custom Software Development Company UK | KawachTech';
    $seoDescription = 'Looking for a custom software development company for your UK business? KawachTech builds scalable web, SaaS, AI and enterprise software with UK GDPR-aware delivery.';
    $seoKeywords    = 'custom software development company UK, software development company UK, software development services for UK businesses, dedicated development team UK, outsource software development UK, software development outsourcing UK';
    $seoCanonical   = url('/markets/uk/software-development');

    $ukFaqs = [
        [
            'q' => 'Why should a UK company work with an offshore software development team?',
            'a' => "London and the wider UK tech market are competitive and expensive places to hire experienced engineers, and a competitive process for a single senior hire can easily run three months or more. Working with an established team like KawachTech means you get engineers who've already worked together and a project moving within weeks, not a hiring pipeline. The UK-India working relationship also has a genuine practical advantage over some other outsourcing corridors: the time zone gap is small enough for real daily overlap, not just handoff meetings.",
        ],
        [
            'q' => 'How does KawachTech communicate with clients in the UK given the time difference?',
            'a' => "This is one area where UK clients have it easier than most. India is UTC+5:30 and the UK is UTC+0 (GMT) or UTC+1 (BST) depending on the time of year — a gap of only 4.5 to 5.5 hours. A UK working day from 9am to 5:30pm overlaps with our team's afternoon and evening almost entirely. That means daily stand-ups, sprint planning, and ad hoc calls can genuinely happen in real time, not just asynchronously.",
        ],
        [
            'q' => 'Does engaging KawachTech raise IR35 concerns for our business?',
            'a' => "IR35 applies to the way individual contractors are engaged, not to a company-to-company services agreement with an external development partner — but we understand why UK businesses ask. We structure engagements as a services contract with KawachTech as the contracted party, not as individual placements, and we're happy to have your finance or legal team review the contract structure directly. We're not able to give IR35 tax advice ourselves — that's a question for your accountant or tax adviser — but we'll give them whatever detail they need about how the engagement is structured.",
        ],
        [
            'q' => 'Can I hire a dedicated software development team through KawachTech?',
            'a' => 'Yes. Our dedicated development team model gives you engineers who work exclusively on your product and report into your priorities, functioning as an extension of your team rather than a project vendor — the model most UK clients use for ongoing product work.',
        ],
        [
            'q' => 'Who owns the source code once the project is delivered?',
            'a' => "Source code, documentation and any custom IP built specifically for your project belong to you, as set out in our project agreement before work begins. If your legal team wants specific IP assignment language, we'll work with them on the contract.",
        ],
        [
            'q' => 'How much does custom software development cost?',
            'a' => "It depends on scope, complexity, integrations and which engagement model you choose. We'll walk through realistic cost ranges for a fixed-price build versus an ongoing dedicated team once we understand what you're trying to build, during a free consultation.",
        ],
        [
            'q' => 'How long does it take to develop custom software?',
            'a' => "A focused MVP typically takes 3-6 months; a more complex platform with significant integrations can run 9-12+ months. We give a realistic estimate after discovery, not before we understand the requirements.",
        ],
        [
            'q' => 'Can KawachTech work with our existing internal development team?',
            'a' => "Yes — a common setup is us filling a specific skills gap or owning a defined module while your team owns the rest. We adapt to your existing tools, code review process and sprint cadence.",
        ],
        [
            'q' => 'Does KawachTech provide post-launch support?',
            'a' => "Yes, sized to what your product actually needs — from a light monthly maintenance retainer to a full dedicated team continuing active development after launch.",
        ],
        [
            'q' => 'How is our data handled under UK GDPR?',
            'a' => "We build data collection, storage and consent flows with UK GDPR and the Data Protection Act 2018 in mind — access controls, encryption, and clear data-handling practices. We're not a law firm, so for a definitive compliance sign-off specific to your business and your ICO obligations, that's a conversation for your own data protection officer or legal counsel, but we'll work directly with them on the technical implementation.",
        ],
        [
            'q' => 'Can you build compliant software for a regulated UK industry like fintech or healthcare?',
            'a' => "We can build software with FCA-relevant financial regulations or NHS Digital-style healthcare data standards in mind — secure data handling, audit trails, and access controls appropriate to a regulated environment. As with any regulated sector, the specific certification and compliance sign-off for your product ultimately sits with your compliance team, and we work alongside them rather than claiming to replace that function.",
        ],
        [
            'q' => 'Can KawachTech sign an NDA before we share project details?',
            'a' => "Yes — this is standard practice before any substantive discussion of your product, data or business logic, not something you need to ask for specially.",
        ],
        [
            'q' => 'Can you modernize or rebuild our existing legacy software?',
            'a' => "Yes, this is a significant part of what we do — migrating an aging on-premise system to the cloud, replacing a monolith with something more maintainable, or rebuilding on a modern stack while preserving the business logic your team has refined over years. We audit what exists before proposing what changes.",
        ],
        [
            'q' => 'Can we scale the development team up or down during the project?',
            'a' => "Yes — add a specialist for a specific phase or scale back after a major release, with real notice rather than a multi-month hiring or restructuring process.",
        ],
        [
            'q' => 'How do we get started with KawachTech?',
            'a' => "Book a free consultation through this page or our contact form. We'll ask about your business goals and current systems, then follow up with an honest assessment of scope and realistic next steps.",
        ],
    ];

    $ukSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "Organization",
                "@id" => url('/') . '#organization',
                "name" => "Kawach Technology",
                "alternateName" => "KawachTech",
                "url" => url('/'),
                "logo" => asset('assets/images/kawach.png'),
                "sameAs" => array_values(array_filter([
                    config('app.linkedin'),
                    config('app.insta'),
                ])),
            ],
            [
                "@type" => "Service",
                "serviceType" => "Custom Software Development",
                "provider" => [
                    "@type" => "Organization",
                    "name" => "Kawach Technology",
                    "url" => url('/'),
                ],
                "areaServed" => [
                    "@type" => "Country",
                    "name" => "United Kingdom",
                ],
                "description" => "Custom software, SaaS, AI and enterprise application development for businesses in the United Kingdom.",
                "url" => $seoCanonical,
            ],
            [
                "@type" => "FAQPage",
                "mainEntity" => array_map(fn($faq) => [
                    "@type" => "Question",
                    "name" => $faq['q'],
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => $faq['a'],
                    ],
                ], $ukFaqs),
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Markets", "item" => url('/markets')],
                    ["@type" => "ListItem", "position" => 3, "name" => "UK", "item" => $seoCanonical],
                    ["@type" => "ListItem", "position" => 4, "name" => "Software Development", "item" => $seoCanonical],
                ],
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($ukSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
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
  --success:#00c896; --warning:#ffb830;
  --dark-navy:#0b1b3e; --darker-navy:#081029;
  --text-dark:#1a1a2e; --text-muted:#6c757d;
  --bg-light:#f4f6fb; --border-light:#e2e8f0; --white:#ffffff;
  --radius:16px; --shadow:0 10px 30px rgba(15,23,42,.06); --shadow-lg:0 20px 50px rgba(11,27,62,.12);
}
.usa-page{ font-family:'Open Sans', sans-serif; color:var(--text-dark); }
.usa-page h1, .usa-page h2, .usa-page h3, .usa-page h4{ font-family:'Nunito', sans-serif; font-weight:900; line-height:1.2; margin:0; }
.usa-container{ max-width:1180px; margin:0 auto; padding:0 24px; }
.usa-section{ padding:76px 0; }
.usa-section.bg-light{ background:var(--bg-light); }
.usa-section-head{ max-width:720px; margin:0 auto 46px; text-align:center; }
.usa-eyebrow{
  display:inline-flex; align-items:center; gap:8px; font-size:.74rem; font-weight:800;
  letter-spacing:1.5px; text-transform:uppercase; color:var(--primary);
  background:rgba(26,115,232,.08); padding:7px 16px; border-radius:30px; margin-bottom:16px;
}
.usa-section-title{ font-size:clamp(1.7rem,3.2vw,2.3rem); margin-bottom:14px; }
.usa-section-sub{ color:var(--text-muted); font-size:1.03rem; }
.usa-btn{
  display:inline-flex; align-items:center; gap:9px; padding:14px 28px; border-radius:10px;
  font-weight:700; font-size:.95rem; border:none; cursor:pointer; transition:.2s; text-decoration:none;
}
.usa-btn-primary{ background:var(--primary); color:#fff; }
.usa-btn-primary:hover{ background:var(--primary-dark); box-shadow:0 8px 24px rgba(26,115,232,.35); color:#fff; }
.usa-btn-outline-light{ background:transparent; color:#fff; border:1.5px solid rgba(255,255,255,.35); }
.usa-btn-outline-light:hover{ border-color:#fff; background:rgba(255,255,255,.08); color:#fff; }
.usa-btn-outline{ background:#fff; color:var(--text-dark); border:1.5px solid var(--border-light); }
.usa-btn-outline:hover{ border-color:var(--primary); color:var(--primary); }

.usa-hero{
  position:relative; overflow:hidden; color:#fff;
  background:linear-gradient(150deg,var(--darker-navy) 0%, var(--dark-navy) 55%, #102757 100%);
  padding:74px 0 70px;
}
.usa-hero::before{
  content:""; position:absolute; inset:0;
  background-image:linear-gradient(rgba(255,255,255,.045) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.045) 1px, transparent 1px);
  background-size:44px 44px;
  -webkit-mask-image:radial-gradient(ellipse 80% 80% at 50% 0%, #000 40%, transparent 100%);
          mask-image:radial-gradient(ellipse 80% 80% at 50% 0%, #000 40%, transparent 100%);
}
.usa-hero-inner{ position:relative; z-index:2; }
.usa-breadcrumb{ font-size:.78rem; color:#a9c1ee; margin-bottom:22px; }
.usa-breadcrumb a{ color:#a9c1ee; text-decoration:none; }
.usa-breadcrumb a:hover{ color:#fff; }
.usa-hero h1{ font-size:clamp(2rem,4vw,2.9rem); max-width:800px; margin-bottom:20px; }
.usa-hero-lede{ color:#c7d6f5; font-size:1.1rem; max-width:680px; margin-bottom:16px; }
.usa-hero-list{ list-style:none; padding:0; margin:0 0 30px; display:flex; flex-wrap:wrap; gap:10px 22px; }
.usa-hero-list li{ color:#d7e3fa; font-size:.92rem; display:flex; align-items:center; gap:8px; }
.usa-hero-list i{ color:var(--accent); }
.usa-hero-cta{ display:flex; gap:14px; flex-wrap:wrap; margin-bottom:26px; }
.usa-trust-line{
  display:flex; align-items:center; gap:10px; color:#a9c1ee; font-size:.88rem;
  border-top:1px solid rgba(255,255,255,.14); padding-top:20px; max-width:640px;
}
.usa-trust-line i{ color:var(--success); flex-shrink:0; margin-top:2px; }

.usa-challenge-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:22px; }
.usa-challenge-card{ background:#fff; border:1px solid var(--border-light); border-radius:var(--radius); padding:26px 24px; box-shadow:var(--shadow); }
.usa-challenge-card i{ color:var(--primary); font-size:1.3rem; margin-bottom:14px; display:block; }
.usa-challenge-card h3{ font-size:1.05rem; margin-bottom:8px; }
.usa-challenge-card p{ color:var(--text-muted); font-size:.92rem; margin:0; }

.usa-svc-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
.usa-svc-card{ background:#fff; border:1px solid var(--border-light); border-radius:var(--radius); padding:28px 24px; box-shadow:var(--shadow); transition:.25s; display:flex; flex-direction:column; height:100%; }
.usa-svc-card:hover{ transform:translateY(-4px); box-shadow:var(--shadow-lg); }
.usa-svc-icon{ width:52px; height:52px; border-radius:14px; background:linear-gradient(135deg,var(--primary),var(--accent)); color:#fff; display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin-bottom:16px; }
.usa-svc-card h3{ font-size:1.05rem; margin-bottom:8px; }
.usa-svc-card p{ color:var(--text-muted); font-size:.9rem; margin:0 0 16px; flex:1; }
.usa-svc-link{ color:var(--primary); font-weight:700; font-size:.85rem; text-decoration:none; }
.usa-svc-link:hover{ color:var(--primary-dark); }

.usa-trust-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:24px; }
.usa-trust-item{ display:flex; gap:16px; }
.usa-trust-icon{ flex-shrink:0; width:46px; height:46px; border-radius:12px; background:rgba(0,200,150,.12); color:var(--success); display:flex; align-items:center; justify-content:center; font-size:1.05rem; }
.usa-trust-item strong{ display:block; font-size:1rem; margin-bottom:5px; font-family:'Nunito',sans-serif; }
.usa-trust-item span{ color:var(--text-muted); font-size:.88rem; line-height:1.6; }

.usa-compliance-wrap{ max-width:820px; margin:0 auto; }
.usa-compliance-list{ list-style:none; padding:0; margin:26px 0 0; display:grid; gap:16px; }
.usa-compliance-list li{ display:flex; gap:14px; align-items:flex-start; }
.usa-compliance-list i{ color:var(--primary); margin-top:4px; flex-shrink:0; }
.usa-compliance-note{ background:#fff; border:1px solid var(--border-light); border-radius:var(--radius); padding:22px 24px; margin-top:28px; font-size:.9rem; color:var(--text-muted); box-shadow:var(--shadow); }

.usa-cs-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
.usa-cs-card{ background:#fff; border:1px solid var(--border-light); border-radius:var(--radius); padding:26px 24px; box-shadow:var(--shadow); transition:.25s; display:flex; flex-direction:column; }
.usa-cs-card:hover{ transform:translateY(-4px); box-shadow:var(--shadow-lg); }
.usa-cs-tag{ display:inline-block; align-self:flex-start; font-size:.68rem; font-weight:800; letter-spacing:.5px; text-transform:uppercase; color:var(--primary); background:rgba(26,115,232,.08); padding:5px 12px; border-radius:20px; margin-bottom:14px; }
.usa-cs-client{ font-size:1.05rem; font-weight:800; font-family:'Nunito',sans-serif; margin-bottom:2px; }
.usa-cs-loc{ font-size:.78rem; color:var(--text-muted); margin-bottom:14px; }
.usa-cs-row{ display:flex; gap:10px; margin-bottom:10px; }
.usa-cs-row-label{ font-size:.72rem; font-weight:800; text-transform:uppercase; color:var(--text-dark); letter-spacing:.3px; flex-shrink:0; width:78px; }
.usa-cs-row-val{ font-size:.85rem; color:var(--text-muted); }
.usa-cs-kpis{ display:flex; gap:10px; border-top:1px solid var(--border-light); padding-top:14px; margin-top:auto; margin-bottom:14px; }
.usa-cs-kpi{ flex:1; }
.usa-cs-kpi-val{ font-weight:800; color:var(--success); font-size:.95rem; font-family:'Nunito',sans-serif; }
.usa-cs-kpi-lbl{ font-size:.66rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:.3px; }
.usa-cs-link{ color:var(--primary); font-weight:700; font-size:.85rem; text-decoration:none; }

.usa-ind-grid{ display:grid; grid-template-columns:repeat(4,1fr); gap:18px; }
.usa-ind-card{ background:#fff; border:1px solid var(--border-light); border-radius:14px; padding:22px 18px; text-align:center; text-decoration:none; color:var(--text-dark); transition:.2s; display:block; }
.usa-ind-card:hover{ border-color:var(--primary); transform:translateY(-3px); box-shadow:var(--shadow); color:var(--text-dark); }
.usa-ind-card i{ font-size:1.4rem; color:var(--primary); margin-bottom:10px; display:block; }
.usa-ind-card span{ font-weight:700; font-size:.9rem; font-family:'Nunito',sans-serif; }

.usa-eng-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
.usa-eng-card{ background:#fff; border:1px solid var(--border-light); border-radius:var(--radius); padding:28px 24px; box-shadow:var(--shadow); }
.usa-eng-card h3{ font-size:1.1rem; margin-bottom:10px; }
.usa-eng-card .usa-eng-best{ font-size:.78rem; font-weight:800; color:var(--primary); text-transform:uppercase; letter-spacing:.4px; margin-bottom:12px; }
.usa-eng-card p{ color:var(--text-muted); font-size:.9rem; margin:0 0 10px; }
.usa-eng-card p strong{ color:var(--text-dark); }

.usa-process-row{ display:grid; grid-template-columns:repeat(7,1fr); gap:16px; }
.usa-process-step{ text-align:center; }
.usa-process-circle{ width:52px; height:52px; margin:0 auto 14px; border-radius:50%; background:linear-gradient(135deg,var(--primary),var(--accent)); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:900; font-family:'Nunito',sans-serif; font-size:1.05rem; box-shadow:0 8px 20px rgba(26,115,232,.3); }
.usa-process-step h4{ font-size:.88rem; margin-bottom:6px; }
.usa-process-step p{ font-size:.78rem; color:var(--text-muted); margin:0; }

.usa-tz-wrap{ display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:center; }
.usa-tz-card{ background:var(--dark-navy); color:#fff; border-radius:var(--radius); padding:30px 28px; }
.usa-tz-row{ display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid rgba(255,255,255,.12); }
.usa-tz-row:last-child{ border-bottom:none; }
.usa-tz-row .loc{ font-weight:700; font-size:.92rem; }
.usa-tz-row .loc small{ display:block; font-weight:400; color:#a9c1ee; font-size:.74rem; margin-top:2px; }
.usa-tz-row .time{ font-family:'Nunito',sans-serif; font-weight:800; color:#5b9dff; }
.usa-tz-list{ list-style:none; padding:0; margin:0; display:grid; gap:16px; }
.usa-tz-list li{ display:flex; gap:14px; align-items:flex-start; }
.usa-tz-list i{ color:var(--primary); margin-top:4px; flex-shrink:0; }
.usa-tz-list strong{ display:block; margin-bottom:3px; font-family:'Nunito',sans-serif; }
.usa-tz-list span{ color:var(--text-muted); font-size:.88rem; }

.usa-faq-list{ max-width:820px; margin:0 auto; }
.usa-faq-item{ border-bottom:1px solid var(--border-light); padding:20px 0; cursor:pointer; }
.usa-faq-question{ display:flex; justify-content:space-between; align-items:center; gap:16px; font-weight:700; font-size:.98rem; font-family:'Nunito',sans-serif; color:var(--text-dark); }
.usa-faq-question i{ color:var(--primary); transition:transform .25s; flex-shrink:0; }
.usa-faq-item.open .usa-faq-question i{ transform:rotate(180deg); }
.usa-faq-answer{ max-height:0; overflow:hidden; transition:max-height .3s ease; }
.usa-faq-item.open .usa-faq-answer{ max-height:400px; }
.usa-faq-answer p{ color:var(--text-muted); font-size:.9rem; line-height:1.7; margin:14px 0 0; }

@media (max-width:960px){
  .usa-svc-grid, .usa-trust-grid, .usa-cs-grid, .usa-eng-grid{ grid-template-columns:repeat(2,1fr); }
  .usa-ind-grid{ grid-template-columns:repeat(3,1fr); }
  .usa-process-row{ grid-template-columns:repeat(4,1fr); row-gap:28px; }
  .usa-tz-wrap{ grid-template-columns:1fr; }
}
@media (max-width:768px){ .usa-section{ padding:52px 0; } }
@media (max-width:640px){
  .usa-challenge-grid, .usa-svc-grid, .usa-trust-grid, .usa-cs-grid, .usa-eng-grid, .usa-process-row{ grid-template-columns:1fr; }
  .usa-ind-grid{ grid-template-columns:repeat(2,1fr); }
}
.usa-other-markets{ display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-top:8px; }
.usa-other-markets a{
  display:inline-flex; align-items:center; gap:8px; background:#fff; border:1px solid var(--border-light);
  border-radius:30px; padding:10px 20px; font-size:.86rem; font-weight:700; color:var(--text-dark); text-decoration:none;
}
.usa-other-markets a:hover{ border-color:var(--primary); color:var(--primary); }
</style>

<div class="usa-page">

  {{-- ═══ HERO ═══ --}}
  <section class="usa-hero">
    <div class="usa-container usa-hero-inner">
      <div class="usa-breadcrumb">
        <a href="{{ url('/') }}">Home</a> <span>/</span> <a href="{{ route('markets') }}">Markets</a> <span>/</span> UK / Software Development
      </div>
      <h1>Custom Software Development Company for Businesses in the UK</h1>
      <p class="usa-hero-lede">
        KawachTech helps UK founders, CTOs and product teams design, build and scale custom software —
        from early-stage MVPs to enterprise systems — backed by a working day that genuinely overlaps
        with yours, not just a nightly hand-off.
      </p>
      <ul class="usa-hero-list">
        <li><i class="fas fa-check-circle"></i> Custom software &amp; enterprise systems</li>
        <li><i class="fas fa-check-circle"></i> SaaS platforms</li>
        <li><i class="fas fa-check-circle"></i> Web &amp; mobile applications</li>
        <li><i class="fas fa-check-circle"></i> AI-powered software</li>
      </ul>
      <div class="usa-hero-cta">
        <button class="usa-btn usa-btn-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
          <i class="fas fa-calendar-check"></i> Book a Free Consultation
        </button>
        <button class="usa-btn usa-btn-outline-light" data-bs-toggle="modal" data-bs-target="#quoteModal">
          Discuss Your Software Project
        </button>
      </div>
      <div class="usa-trust-line">
        <i class="fas fa-shield-alt"></i>
        <span>Work with an experienced software development team with transparent communication, flexible engagement models, and complete focus on your business goals — not a rotating cast of subcontractors.</span>
      </div>
    </div>
  </section>

  {{-- ═══ MARKET-SPECIFIC BUSINESS CHALLENGES ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-triangle-exclamation"></i> The UK Market</span>
        <h2 class="usa-section-title">Software Development Challenges Businesses in the UK Face</h2>
        <p class="usa-section-sub">The specific pressures we hear most often from UK founders and technology leaders.</p>
      </div>
      <div class="usa-challenge-grid">
        <div class="usa-challenge-card">
          <i class="fas fa-sterling-sign"></i>
          <h3>High London &amp; South-East Engineering Costs</h3>
          <p>Senior engineering salaries in London and the South East rival most major global tech hubs, and competition for the same small pool of experienced candidates makes direct hiring slow and expensive.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-file-contract"></i>
          <h3>Contractor Classification &amp; IR35</h3>
          <p>IR35 has made engaging individual contractors more complicated and higher-risk, pushing many UK businesses toward company-to-company engagement models instead — but that shift itself takes care to get right.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-server"></i>
          <h3>Legacy Systems in Established Businesses</h3>
          <p>Many UK businesses outside the startup scene — financial services, insurance, professional services — are still running core operations on systems built well over a decade ago.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-user-shield"></i>
          <h3>UK GDPR and Data Protection Obligations</h3>
          <p>Post-Brexit, the UK runs its own UK GDPR alongside the Data Protection Act 2018, enforced by the ICO — distinct enough from EU GDPR that software built for one market can't just be assumed compliant for the other.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-chart-line"></i>
          <h3>Fintech Competition and FCA Scrutiny</h3>
          <p>London is one of the world's largest fintech hubs, which means intense competitive pressure to ship fast — while still building the audit trails and data controls FCA-regulated products require.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-cloud-arrow-up"></i>
          <h3>Cloud Modernization Left On the Backlog</h3>
          <p>Migrating from on-premise infrastructure to properly scalable cloud architecture is a project most internal teams agree is overdue, but rarely have the dedicated bandwidth to own end-to-end.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══ HOW KAWACHTECH HELPS ═══ --}}
  <section class="usa-section bg-light">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-layer-group"></i> What We Build</span>
        <h2 class="usa-section-title">How KawachTech Helps Businesses in the UK</h2>
        <p class="usa-section-sub">Practical solutions mapped to the challenges above — not a generic service menu.</p>
      </div>
      <div class="usa-svc-grid">
        <div class="usa-svc-card">
          <div class="usa-svc-icon"><i class="fas fa-laptop-code"></i></div>
          <h3>Custom Software Development</h3>
          <p>Software designed around how your business actually operates, not bent to fit an off-the-shelf tool's limitations.</p>
          <a href="{{ route('pages.child.sevice_details', 'custom-software-development') }}" class="usa-svc-link">Learn more &rarr;</a>
        </div>
        <div class="usa-svc-card">
          <div class="usa-svc-icon"><i class="fas fa-cloud"></i></div>
          <h3>SaaS Development</h3>
          <p>From a focused MVP to a multi-tenant platform, built on architecture that scales as your customer base grows.</p>
          <a href="{{ route('pages.child.sevice_details', 'cloud-devops-solutions') }}" class="usa-svc-link">Learn more &rarr;</a>
        </div>
        <div class="usa-svc-card">
          <div class="usa-svc-icon"><i class="fas fa-brain"></i></div>
          <h3>AI &amp; Automation</h3>
          <p>Automate repetitive workflows and build AI-powered features grounded in your actual data, not a generic model demo.</p>
          <a href="{{ route('pages.child.sevice_details', 'ai-machine-learning-development') }}" class="usa-svc-link">Learn more &rarr;</a>
        </div>
        <div class="usa-svc-card">
          <div class="usa-svc-icon"><i class="fas fa-globe"></i></div>
          <h3>Web Application Development</h3>
          <p>Secure, scalable web applications — customer-facing platforms, internal tools, and everything in between.</p>
          <a href="{{ route('pages.child.sevice_details', 'web-application-development') }}" class="usa-svc-link">Learn more &rarr;</a>
        </div>
        <div class="usa-svc-card">
          <div class="usa-svc-icon"><i class="fas fa-mobile-alt"></i></div>
          <h3>Mobile App Development</h3>
          <p>Native and cross-platform mobile apps for customers, field teams, or internal operations.</p>
          <a href="{{ route('pages.child.sevice_details', 'mobile-app-development') }}" class="usa-svc-link">Learn more &rarr;</a>
        </div>
        <div class="usa-svc-card">
          <div class="usa-svc-icon"><i class="fas fa-arrows-rotate"></i></div>
          <h3>Legacy Software Modernization</h3>
          <p>Migrate aging systems to modern, maintainable architecture without disrupting the operations that depend on them.</p>
          <a href="{{ route('pages.child.sevice_details', 'custom-api-development-integration-solutions') }}" class="usa-svc-link">Learn more &rarr;</a>
        </div>
        <div class="usa-svc-card">
          <div class="usa-svc-icon"><i class="fas fa-users-cog"></i></div>
          <h3>Dedicated Development Teams</h3>
          <p>Experienced engineers who work as a genuine extension of your team, not an outsourced vendor at arm's length.</p>
          <a href="{{ route('pages.child.sevice_details', 'dedicated-development-teams') }}" class="usa-svc-link">Learn more &rarr;</a>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══ WHY BUSINESSES WORK WITH US ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-handshake"></i> Why KawachTech</span>
        <h2 class="usa-section-title">Why Businesses in the UK Work With KawachTech</h2>
      </div>
      <div class="usa-trust-grid">
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-comments"></i></div>
          <div><strong>Transparent Communication</strong><span>Clear communication channels, regular written updates, and defined milestones — you always know exactly where your project stands.</span></div>
        </div>
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-clock"></i></div>
          <div><strong>Real Working-Day Overlap</strong><span>A 4.5-5.5 hour gap means most of your working day genuinely overlaps with ours — not just a scheduled call once a day.</span></div>
        </div>
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-user-tie"></i></div>
          <div><strong>Dedicated Project Management</strong><span>A single, clear point of contact throughout the engagement — not a rotating cast of account managers.</span></div>
        </div>
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-rotate"></i></div>
          <div><strong>Agile Development</strong><span>Iterative sprints, regular demos, and feedback cycles that let you adjust direction before a wrong assumption becomes months of wasted work.</span></div>
        </div>
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-file-contract"></i></div>
          <div><strong>Clear IP &amp; Source Code Ownership</strong><span>Source code and custom IP built for your project are yours, as set out in our project agreement before work begins.</span></div>
        </div>
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-diagram-project"></i></div>
          <div><strong>Scalable Development Teams</strong><span>Add specialist skills for a specific phase or scale down after a major release — team composition adjusts to your actual roadmap.</span></div>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══ COMPLIANCE, SECURITY & DATA ═══ --}}
  <section class="usa-section bg-light">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-shield-halved"></i> Security &amp; Compliance</span>
        <h2 class="usa-section-title">Building Secure and Compliant Software for UK Businesses</h2>
      </div>
      <div class="usa-compliance-wrap">
        <p style="color:var(--text-muted);">
          Since Brexit, the UK has run its own UK GDPR alongside the Data Protection Act 2018, enforced by
          the ICO — closely modelled on EU GDPR but a distinct regime in its own right, including its own
          rules on international data transfers. What that means practically is that software genuinely
          built for UK GDPR needs to treat it as its own requirement, not assume EU GDPR compliance covers it.
        </p>
        <ul class="usa-compliance-list">
          <li><i class="fas fa-user-shield"></i><span><strong>UK GDPR &amp; Data Protection Act 2018</strong> — data collection, storage and consent flows designed with ICO expectations and UK international transfer rules in mind.</span></li>
          <li><i class="fas fa-chart-line"></i><span><strong>FCA-relevant fintech requirements</strong> — audit trails, data controls and security practices appropriate for FCA-regulated financial products.</span></li>
          <li><i class="fas fa-notes-medical"></i><span><strong>NHS Digital-adjacent healthcare standards</strong> — access controls, encryption and audit logging in line with the data-handling expectations of UK health tech.</span></li>
          <li><i class="fas fa-server"></i><span><strong>Enterprise security architecture</strong> — encryption at rest and in transit, role-based access control, and infrastructure aligned with recognized security control principles.</span></li>
        </ul>
        <div class="usa-compliance-note">
          <strong>An honest note on compliance:</strong> we're not a law firm and this page isn't legal advice.
          We build software with security, privacy and compliance requirements in mind and work directly with
          your internal legal, compliance and data protection teams to meet the specific regulatory obligations
          that apply to your business — final compliance sign-off, including anything to do with ICO registration
          or FCA authorisation, is always a decision for your own counsel.
        </div>
      </div>
    </div>
  </section>

  {{-- ═══ CASE STUDIES ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-briefcase"></i> Real Projects</span>
        <h2 class="usa-section-title">Software Development Success Stories</h2>
        <p class="usa-section-sub">A UK-based client engagement — real challenge, real solution, measurable outcome.</p>
      </div>
      <div class="usa-cs-grid">
        <div class="usa-cs-card">
          <span class="usa-cs-tag">Hospitality &middot; London, UK</span>
          <div class="usa-cs-client">Harborview Hospitality Group</div>
          <div class="usa-cs-loc">22 boutique hotels across the UK and Ireland</div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Challenge</div><div class="usa-cs-row-val">Roughly 70% of bookings flowing through OTAs charging 15-20% commission, with no unified guest profile across properties.</div></div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Solution</div><div class="usa-cs-row-val">A direct-booking platform, channel manager integration, unified guest CRM, and a loyalty program built to shift booking mix toward direct.</div></div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Tech</div><div class="usa-cs-row-val">Laravel, React, PostgreSQL, Stripe</div></div>
          <div class="usa-cs-kpis">
            <div class="usa-cs-kpi"><div class="usa-cs-kpi-val">+31%</div><div class="usa-cs-kpi-lbl">Direct Bookings</div></div>
            <div class="usa-cs-kpi"><div class="usa-cs-kpi-val">-24%</div><div class="usa-cs-kpi-lbl">OTA Commission Cost</div></div>
          </div>
          <a href="{{ route('case-studies.show', 'harborview-hospitality-group-booking-platform-case-study') }}" class="usa-cs-link">Read the full case study &rarr;</a>
        </div>
      </div>
      <div style="text-align:center; margin-top:34px;">
        <a href="{{ route('casestudy') }}" class="usa-btn usa-btn-outline">View All Case Studies</a>
      </div>
    </div>
  </section>

  {{-- ═══ INDUSTRIES ═══ --}}
  <section class="usa-section bg-light">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-industry"></i> Industry Experience</span>
        <h2 class="usa-section-title">Software Development Expertise Across Industries</h2>
        <p class="usa-section-sub">Industries where we've delivered UK-based and company-wide projects.</p>
      </div>
      <div class="usa-ind-grid">
        <a href="{{ route('case-studies.show', 'harborview-hospitality-group-booking-platform-case-study') }}" class="usa-ind-card"><i class="fas fa-hotel"></i><span>Hospitality</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-money-bill-trend-up"></i><span>FinTech</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-scale-balanced"></i><span>Legal Services</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-house-chimney"></i><span>Real Estate</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-heartbeat"></i><span>Healthcare</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-cart-shopping"></i><span>E-commerce</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-graduation-cap"></i><span>Education</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-cloud"></i><span>SaaS</span></a>
      </div>
    </div>
  </section>

  {{-- ═══ ENGAGEMENT MODELS ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-file-signature"></i> How We Work Together</span>
        <h2 class="usa-section-title">Engagement Models</h2>
        <p class="usa-section-sub">Final cost always depends on scope, complexity, team composition and requirements — these models describe structure, not price.</p>
      </div>
      <div class="usa-eng-grid">
        <div class="usa-eng-card">
          <div class="usa-eng-best">Best for defined scope</div>
          <h3>Fixed Price Project</h3>
          <p>Suited to projects with <strong>clearly defined requirements</strong> — an MVP, a specific feature set, or a scoped integration.</p>
          <p><strong>Communication:</strong> milestone-based check-ins tied to agreed deliverables.</p>
          <p><strong>Flexibility:</strong> lower — scope changes require a formal change request.</p>
        </div>
        <div class="usa-eng-card">
          <div class="usa-eng-best">Best for ongoing product work</div>
          <h3>Dedicated Development Team</h3>
          <p>Suited to <strong>long-term product development</strong> where requirements will keep evolving after launch.</p>
          <p><strong>Communication:</strong> daily/weekly syncs, sprint planning, and a dedicated point of contact.</p>
          <p><strong>Flexibility:</strong> high — team composition and priorities adjust as your roadmap changes.</p>
        </div>
        <div class="usa-eng-card">
          <div class="usa-eng-best">Best for evolving scope</div>
          <h3>Time &amp; Material</h3>
          <p>Suited to work where requirements are <strong>still being discovered</strong>, or where scope is likely to shift as you learn.</p>
          <p><strong>Communication:</strong> regular reporting on hours and progress against a rolling plan.</p>
          <p><strong>Flexibility:</strong> high — priorities can be reordered sprint to sprint.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══ PROCESS ═══ --}}
  <section class="usa-section bg-light">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-route"></i> Our Process</span>
        <h2 class="usa-section-title">Software Development Process</h2>
        <p class="usa-section-sub">Regular communication and client involvement at every step, not just at kickoff and launch.</p>
      </div>
      <div class="usa-process-row">
        <div class="usa-process-step"><div class="usa-process-circle">1</div><h4>Discovery &amp; Requirements</h4><p>Understand business goals, users, and requirements.</p></div>
        <div class="usa-process-step"><div class="usa-process-circle">2</div><h4>Planning &amp; Architecture</h4><p>Define technical architecture, scope, and roadmap.</p></div>
        <div class="usa-process-step"><div class="usa-process-circle">3</div><h4>UI/UX Design</h4><p>Create intuitive, user-focused experiences.</p></div>
        <div class="usa-process-step"><div class="usa-process-circle">4</div><h4>Agile Development</h4><p>Build in iterative sprints with regular demos.</p></div>
        <div class="usa-process-step"><div class="usa-process-circle">5</div><h4>Quality Assurance</h4><p>Test functionality, performance and security.</p></div>
        <div class="usa-process-step"><div class="usa-process-circle">6</div><h4>Deployment</h4><p>Prepare and deploy to production.</p></div>
        <div class="usa-process-step"><div class="usa-process-circle">7</div><h4>Ongoing Support</h4><p>Maintenance, improvements and future development.</p></div>
      </div>
    </div>
  </section>

  {{-- ═══ TIME-ZONE & COMMUNICATION ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-earth-europe"></i> Working Together</span>
        <h2 class="usa-section-title">Working With a Software Development Team Across Time Zones</h2>
        <p class="usa-section-sub">Kawach Technology is headquartered in India — and the UK time gap is one of the smallest we work across.</p>
      </div>
      <div class="usa-tz-wrap">
        <div class="usa-tz-card">
          <div class="usa-tz-row"><div class="loc">India (Our Team) <small>IST, UTC+5:30</small></div><div class="time">Afternoon</div></div>
          <div class="usa-tz-row"><div class="loc">UK Time <small>GMT UTC+0 / BST UTC+1</small></div><div class="time">Morning</div></div>
          <div class="usa-tz-row"><div class="loc">Typical Gap</div><div class="time">~4.5–5.5 hrs</div></div>
          <div class="usa-tz-row"><div class="loc">Real-Time Overlap</div><div class="time">Most of the UK working day</div></div>
        </div>
        <ul class="usa-tz-list">
          <li><i class="fas fa-calendar-check"></i><span><strong>Daily real-time stand-ups</strong> are genuinely practical here — a 9am UK start is early-to-mid afternoon for our team, well within normal working hours on both sides.</span></li>
          <li><i class="fas fa-clipboard-list"></i><span><strong>A shared project board</strong> (Jira, Linear, Trello, or your existing tool) and written updates for anything that happens outside the overlap window.</span></li>
          <li><i class="fas fa-user"></i><span><strong>One dedicated point of contact</strong> on our side, reachable by message throughout your working day.</span></li>
          <li><i class="fas fa-video"></i><span><strong>Sprint planning and demos</strong> scheduled at times that work for both time zones without anyone needing to be online at 6am or midnight.</span></li>
        </ul>
      </div>
    </div>
  </section>

  {{-- ═══ OTHER MARKETS + CONTACT (crawlable links, not just modal CTAs) ═══ --}}
  <section class="usa-section" style="padding-top:0;">
    <div class="usa-container" style="text-align:center;">
      <p style="color:var(--text-muted); font-size:.92rem; margin-bottom:16px;">
        Also serving businesses in other markets, or prefer to talk directly?
      </p>
      <div class="usa-other-markets">
        <a href="{{ route('country.usa') }}"><i class="fas fa-flag-usa"></i> Custom Software Development Company USA</a>
        <a href="{{ route('country.germany') }}"><i class="fas fa-industry"></i> Software Development Company Germany</a>
        <a href="{{ route('country.europe') }}"><i class="fas fa-earth-europe"></i> Software Development for European Businesses</a>
        <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact Us</a>
      </div>
    </div>
  </section>

  {{-- ═══ FAQ ═══ --}}
  <section class="usa-section bg-light">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-circle-question"></i> Common Questions</span>
        <h2 class="usa-section-title">Frequently Asked Questions</h2>
        <p class="usa-section-sub">Straight answers for UK businesses evaluating an offshore development partner.</p>
      </div>
      <div class="usa-faq-list">
        @foreach($ukFaqs as $i => $faq)
        <div class="usa-faq-item {{ $i === 0 ? 'open' : '' }}" onclick="this.classList.toggle('open')">
          <div class="usa-faq-question">
            {{ $faq['q'] }} <i class="fas fa-chevron-down"></i>
          </div>
          <div class="usa-faq-answer">
            <p>{{ $faq['a'] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══ FINAL CTA ═══ --}}
  <section class="usa-section" style="background:linear-gradient(135deg,var(--dark-navy),#102757); color:#fff;">
    <div class="usa-container" style="text-align:center;">
      <h2 style="font-size:clamp(1.6rem,3.4vw,2.3rem); color:#fff; max-width:760px; margin:0 auto 16px;">
        Looking for a Reliable Software Development Partner for Your Business in the UK?
      </h2>
      <p style="color:#c7d6f5; max-width:620px; margin:0 auto 32px; font-size:1.02rem;">
        Tell us about your software idea, existing system, or business challenge. Our team can help you
        evaluate the requirements and build a scalable development roadmap.
      </p>
      <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
        <button class="usa-btn usa-btn-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
          <i class="fas fa-calendar-check"></i> Book a Free Consultation
        </button>
        <button class="usa-btn usa-btn-outline-light" data-bs-toggle="modal" data-bs-target="#quoteModal">
          Request a Project Estimate
        </button>
      </div>
    </div>
  </section>

</div>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
