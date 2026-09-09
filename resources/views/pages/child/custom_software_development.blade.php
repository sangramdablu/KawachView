<!DOCTYPE html>
<html lang="en">

@php
    // SEO Phase 20 — genuine FAQ, answers grounded in the page's own content
    // (budget-phasing section, pricing article, markets section) rather than
    // generic filler. Shared here so the visible accordion and the FAQPage
    // schema below read from the same source.
    $csdFaqs = [
        [
            'q' => 'What is custom software development?',
            'a' => "Custom software development means designing and building an application around your business's actual workflows, instead of adapting your business to fit a generic, off-the-shelf product. It can be a business application, an internal tool, a customer portal, or a full SaaS platform — built specifically for how you operate.",
        ],
        [
            'q' => 'How much does custom software development cost?',
            'a' => 'It depends on scope, complexity, integrations and which engagement model you choose — anyone quoting a number before understanding your requirements is guessing. As a general reference, a focused MVP typically starts in the low five figures, a mid-sized application usually falls in the mid five figures, and a full enterprise or AI-powered platform can run into six figures. See our full breakdown in <a href="' . route('blog.show', 'how-much-does-custom-software-development-cost-in-2026') . '">How Much Does Custom Software Development Cost in 2026?</a>, or get a scoped estimate once we understand your project.',
        ],
        [
            'q' => 'Can you build software for a small business?',
            'a' => "Yes. A significant part of our work is with small and growing businesses, not just enterprises. We scope projects around what a small business actually needs first — usually a focused MVP or a specific internal tool — rather than a full enterprise platform you don't need yet.",
        ],
        [
            'q' => 'Do you offer affordable software development?',
            'a' => "We build cost-effective software through deliberate choices — MVP-first scoping, phased development, reusable components and efficient architecture — not by cutting corners on security or quality. \"Affordable\" means you're not paying for complexity you don't need yet, not that every project has a fixed low price regardless of scope.",
        ],
        [
            'q' => 'Can you build an MVP on a limited budget?',
            'a' => "Yes — MVP-first development is one of our core approaches. We help you identify the smallest version of your product that delivers real value and validates the idea, then phase in automation, integrations and advanced features as the product proves itself, rather than building everything on day one.",
        ],
        [
            'q' => 'How long does custom software development take?',
            'a' => "A focused MVP typically takes a few months depending on scope; a more complex platform with significant integrations can take considerably longer. We give a realistic timeline after a discovery phase, once we understand your actual requirements — not before.",
        ],
        [
            'q' => 'Can you modernize existing software?',
            'a' => 'Yes — legacy software modernization is a dedicated part of what we do, from replatforming outdated systems to migrating to modern, maintainable architecture without disrupting the business that depends on the existing system. See our <a href="' . route('pages.child.sevice_details', 'software-modernization') . '">software modernization page</a> for how we approach this.',
        ],
        [
            'q' => 'Can you build web and mobile applications?',
            'a' => "Yes, both — often as part of the same project. We build web applications, mobile applications, and API-driven systems that tie them together, scoped around whichever platforms your users actually need.",
        ],
        [
            'q' => 'Do you provide ongoing software maintenance?',
            'a' => "Yes. Launching is rarely the end of the work — bug fixes, performance tuning and incremental feature requests keep coming after go-live. We offer ongoing maintenance and support sized to what your product actually needs, from a light retainer to continued active development.",
        ],
        [
            'q' => 'Do you work with startups?',
            'a' => "Yes — startups are a core part of who we build for. For a startup, that usually means MVP-first scoping to validate the idea quickly, with the architecture ready to extend once the product finds traction, rather than over-building before you have real users.",
        ],
        [
            'q' => 'Do you work with companies in the USA, UK, Germany and Europe?',
            'a' => "Yes. We work with businesses across the USA, United Kingdom, Germany and wider Europe — each of our market pages covers the specific business context, communication approach and compliance considerations relevant to that market.",
        ],
        [
            'q' => 'Can you integrate third-party APIs and existing systems?',
            'a' => 'Yes — connecting to the tools and systems you already rely on is a common part of custom software projects, whether that\'s a payment gateway, a CRM, an internal legacy system, or a third-party public API. See our <a href="' . route('pages.child.sevice_details', 'custom-api-development-integration-solutions') . '">API development &amp; integration page</a> for more detail.',
        ],
    ];

    $csdSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "Service",
                "@id" => $seoCanonical . "#service",
                "name" => "Custom Software Development",
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
                "serviceType" => "Custom Software Development",
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Services", "item" => url('/services')],
                    ["@type" => "ListItem", "position" => 3, "name" => "Custom Software Development", "item" => $seoCanonical],
                ],
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
                ], $csdFaqs),
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($csdSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
.csd-page{ font-family:'Open Sans', sans-serif; color:#1a1a2e; }
.csd-page h1, .csd-page h2, .csd-page h3, .csd-page h4{ font-family:'Nunito', sans-serif; font-weight:900; line-height:1.2; margin:0; }
.csd-container{ max-width:1180px; margin:0 auto; padding:0 24px; }
.csd-section{ padding:76px 0; }
.csd-section.bg-light{ background:#f4f6fb; }
.csd-section-head{ max-width:760px; margin:0 auto 44px; text-align:center; }
.csd-eyebrow{
  display:inline-flex; align-items:center; gap:8px; font-size:.74rem; font-weight:800;
  letter-spacing:1.5px; text-transform:uppercase; color:#1a73e8;
  background:rgba(26,115,232,.08); padding:7px 16px; border-radius:30px; margin-bottom:16px;
}
.csd-section-title{ font-size:clamp(1.7rem,3.2vw,2.3rem); margin-bottom:14px; }
.csd-section-sub{ color:#6c757d; font-size:1.03rem; }
.csd-btn{
  display:inline-flex; align-items:center; gap:9px; padding:14px 28px; border-radius:10px;
  font-weight:700; font-size:.95rem; border:none; cursor:pointer; transition:.2s; text-decoration:none;
}
.csd-btn-primary{ background:#1a73e8; color:#fff; }
.csd-btn-primary:hover{ background:#1558b0; box-shadow:0 8px 24px rgba(26,115,232,.35); color:#fff; }
.csd-btn-outline-light{ background:transparent; color:#fff; border:1.5px solid rgba(255,255,255,.35); }
.csd-btn-outline-light:hover{ border-color:#fff; background:rgba(255,255,255,.08); color:#fff; }

/* ── HERO ── */
.csd-hero{
  position:relative; overflow:hidden; color:#fff;
  background:linear-gradient(150deg,#081029 0%, #0b1b3e 55%, #102757 100%);
  padding:78px 0 74px;
}
.csd-hero::before{
  content:""; position:absolute; inset:0;
  background-image:linear-gradient(rgba(255,255,255,.045) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.045) 1px, transparent 1px);
  background-size:44px 44px;
  -webkit-mask-image:radial-gradient(ellipse 80% 80% at 50% 0%, #000 40%, transparent 100%);
          mask-image:radial-gradient(ellipse 80% 80% at 50% 0%, #000 40%, transparent 100%);
}
.csd-hero-inner{ position:relative; z-index:2; }
.csd-breadcrumb{ font-size:.78rem; color:#a9c1ee; margin-bottom:22px; }
.csd-breadcrumb a{ color:#a9c1ee; text-decoration:none; }
.csd-breadcrumb a:hover{ color:#fff; }
.csd-hero h1{ font-size:clamp(2rem,4vw,2.8rem); max-width:820px; margin-bottom:20px; }
.csd-hero-lede{ color:#c7d6f5; font-size:1.12rem; max-width:700px; margin-bottom:32px; }
.csd-hero-cta{ display:flex; gap:14px; flex-wrap:wrap; }

/* ── SECTION 1: type pills ── */
.csd-type-pills{ display:flex; flex-wrap:wrap; gap:10px; justify-content:center; margin-top:30px; }
.csd-type-pill{
  font-size:.85rem; font-weight:700; color:#1a73e8; background:rgba(26,115,232,.08);
  border:1px solid rgba(26,115,232,.18); padding:8px 16px; border-radius:20px;
}
a.csd-type-pill-link{ text-decoration:none; transition:.2s; cursor:pointer; }
a.csd-type-pill-link:hover{ background:#1a73e8; color:#fff; border-color:#1a73e8; }
.csd-market-row{ display:flex; flex-wrap:wrap; gap:14px; justify-content:center; }
.csd-market-chip{
  display:inline-flex; align-items:center; gap:9px; background:#fff; border:1px solid #e2e8f0;
  border-radius:30px; padding:11px 22px; text-decoration:none; color:#2c3e5a; font-weight:700; font-size:.9rem;
  transition:.2s;
}
.csd-market-chip:hover{ border-color:#1a73e8; color:#1a73e8; }
.csd-faq-list{ max-width:820px; margin:0 auto; }
.csd-faq-item{ border-bottom:1px solid #e2e8f0; padding:20px 0; cursor:pointer; }
.csd-faq-question{
  display:flex; justify-content:space-between; align-items:center; gap:16px;
  font-weight:700; font-size:.98rem; font-family:'Nunito',sans-serif; color:#1a1a2e;
}
.csd-faq-question i{ color:#1a73e8; transition:transform .25s; flex-shrink:0; }
.csd-faq-item.open .csd-faq-question i{ transform:rotate(180deg); }
.csd-faq-answer{ max-height:0; overflow:hidden; transition:max-height .3s ease; }
.csd-faq-item.open .csd-faq-answer{ max-height:400px; }
.csd-faq-answer p{ color:#6c757d; font-size:.9rem; line-height:1.7; margin:14px 0 0; }
.csd-faq-answer p a{ color:#1a73e8; font-weight:700; text-decoration:none; }
.csd-faq-answer p a:hover{ text-decoration:underline; }
.csd-inline-cta{
  display:flex; align-items:center; justify-content:space-between; gap:20px; flex-wrap:wrap;
  margin-top:28px; padding:20px 26px; background:rgba(26,115,232,.06); border:1px solid rgba(26,115,232,.15);
  border-radius:14px;
}
.csd-inline-cta span{ font-weight:700; color:#1a1a2e; font-size:.96rem; }
.csd-inline-cta-btn{
  display:inline-flex; align-items:center; gap:8px; background:#1a73e8; color:#fff; border:none;
  padding:11px 22px; border-radius:9px; font-weight:700; font-size:.88rem; cursor:pointer; transition:.2s;
  white-space:nowrap;
}
.csd-inline-cta-btn:hover{ background:#1558b0; }
@media (max-width:640px){ .csd-inline-cta{ justify-content:center; text-align:center; } }

/* ── SECTION 2: approach cards ── */
.csd-approach-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:22px; margin-bottom:30px; }
.csd-approach-card{
  background:#fff; border:1px solid #e2e8f0; border-radius:16px;
  padding:26px 24px; box-shadow:0 10px 30px rgba(15,23,42,.06);
}
.csd-approach-icon{
  width:48px; height:48px; border-radius:13px; background:linear-gradient(135deg,#1a73e8,#2196f3);
  color:#fff; display:flex; align-items:center; justify-content:center; font-size:1.15rem; margin-bottom:14px;
}
.csd-approach-card h3{ font-size:1rem; margin-bottom:8px; }
.csd-approach-card p{ color:#6c757d; font-size:.9rem; margin:0; }
.csd-disclaimer{
  font-size:.9rem; color:#4b5875; background:#eef4ff; border-left:3px solid #1a73e8;
  border-radius:8px; padding:16px 20px; max-width:900px; margin:0 auto;
}

/* ── SECTION 3: startup flow ── */
.csd-flow{ display:flex; flex-wrap:wrap; gap:0; justify-content:center; margin-top:36px; }
.csd-flow-step{
  flex:1 1 150px; max-width:190px; text-align:center; padding:0 14px; position:relative;
}
.csd-flow-num{
  width:42px; height:42px; border-radius:50%; background:#1a73e8; color:#fff;
  display:flex; align-items:center; justify-content:center; font-weight:800; font-family:'Nunito',sans-serif;
  margin:0 auto 14px; font-size:1.05rem;
}
.csd-flow-step h4{ font-size:.95rem; margin-bottom:8px; }
.csd-flow-step p{ color:#6c757d; font-size:.82rem; margin:0; line-height:1.55; }
.csd-flow-arrow{ display:flex; align-items:center; color:#c7d2e6; font-size:1.2rem; padding-top:6px; }
@media (max-width:900px){ .csd-flow-arrow{ display:none; } .csd-flow{ gap:26px; } }

/* ── SECTION 4: before/after ── */
.csd-ba-grid{ display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-top:30px; }
.csd-ba-card{ border-radius:16px; padding:28px 26px; }
.csd-ba-card.before{ background:#fdf3f2; border:1px solid #f5d9d6; }
.csd-ba-card.after{ background:#eefaf5; border:1px solid #cdeee1; }
.csd-ba-card h3{ font-size:1.05rem; margin-bottom:16px; display:flex; align-items:center; gap:10px; }
.csd-ba-card.before h3{ color:#c0392b; }
.csd-ba-card.after h3{ color:#00a87c; }
.csd-ba-list{ list-style:none; padding:0; margin:0; }
.csd-ba-list li{ display:flex; align-items:flex-start; gap:10px; font-size:.92rem; color:#4b5875; padding:8px 0; border-bottom:1px solid rgba(0,0,0,.05); }
.csd-ba-list li:last-child{ border-bottom:none; }
.csd-ba-card.before li i{ color:#e0554a; margin-top:3px; }
.csd-ba-card.after li i{ color:#00a87c; margin-top:3px; }
@media (max-width:768px){ .csd-ba-grid{ grid-template-columns:1fr; } }

/* ── SECTION 5: solutions grid ── */
.csd-solutions-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin-top:30px; }
.csd-solution-card{
  background:#fff; border:1px solid #e2e8f0; border-radius:16px; padding:24px 22px;
  display:flex; flex-direction:column; height:100%;
}
a.csd-solution-card{ text-decoration:none; color:inherit; transition:.2s; }
a.csd-solution-card:hover{ transform:translateY(-4px); box-shadow:0 16px 34px rgba(15,23,42,.1); border-color:#1a73e8; }
.csd-solution-icon{
  width:46px; height:46px; border-radius:13px; background:rgba(26,115,232,.08); color:#1a73e8;
  display:flex; align-items:center; justify-content:center; font-size:1.1rem; margin-bottom:14px;
}
.csd-solution-card h3{ font-size:.98rem; margin-bottom:8px; }
.csd-solution-card p{ color:#6c757d; font-size:.86rem; margin:0; flex:1; }
.csd-solution-link{ color:#1a73e8; font-weight:700; font-size:.82rem; margin-top:12px; display:inline-block; }
.csd-industry-card{ transition:.2s; }
.csd-industry-card:hover{ transform:translateY(-4px); box-shadow:0 16px 34px rgba(15,23,42,.1); border-color:#1a73e8; }
.csd-industry-links{ display:flex; flex-direction:column; gap:6px; margin-top:12px; }
.csd-industry-links a{ color:#1a73e8; font-weight:700; font-size:.82rem; text-decoration:none; }
.csd-industry-links a:hover{ text-decoration:underline; }
@media (max-width:960px){ .csd-approach-grid, .csd-solutions-grid{ grid-template-columns:repeat(2,1fr); } }
@media (max-width:640px){ .csd-approach-grid, .csd-solutions-grid{ grid-template-columns:1fr; } }
@media (max-width:768px){ .csd-section{ padding:52px 0; } }

/* ── SECTION 6: cost factors ── */
.csd-cost-layout{ display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:start; margin-top:10px; }
.csd-cost-factors{ list-style:none; padding:0; margin:0; display:grid; grid-template-columns:1fr 1fr; gap:12px 20px; }
.csd-cost-factors li{ display:flex; align-items:flex-start; gap:10px; font-size:.92rem; color:#4b5875; }
.csd-cost-factors li i{ color:#1a73e8; margin-top:4px; flex-shrink:0; }
.csd-cost-note{
  background:#fff; border:1px solid #e2e8f0; border-radius:16px; padding:28px 26px;
  box-shadow:0 10px 30px rgba(15,23,42,.06);
}
.csd-cost-note p{ color:#4b5875; font-size:.94rem; margin-bottom:16px; }
.csd-cost-note p:last-child{ margin-bottom:0; }
.csd-cost-link{
  display:inline-flex; align-items:center; gap:8px; color:#1a73e8; font-weight:700;
  text-decoration:none; font-size:.92rem;
}
.csd-cost-link:hover{ color:#1558b0; }
@media (max-width:900px){ .csd-cost-layout{ grid-template-columns:1fr; } .csd-cost-factors{ grid-template-columns:1fr; } }
</style>

<body>
@include('layouts.navbar')

<div class="csd-page">

  {{-- ═══ HERO ═══ --}}
  <section class="csd-hero">
    <div class="csd-container csd-hero-inner">
      <div class="csd-breadcrumb">
        <a href="{{ url('/') }}">Home</a> <span>/</span> <a href="{{ route('services') }}">Services</a> <span>/</span> Custom Software Development
      </div>
      <h1>Custom Software Development Company for Businesses of All Sizes</h1>
      <p class="csd-hero-lede">
        Build software around your business — not the other way around. Kawach Technology develops secure,
        scalable and cost-effective custom software for startups, small businesses, growing companies and
        enterprises.
      </p>
      <div class="csd-hero-cta">
        <button class="csd-btn csd-btn-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
          <i class="fas fa-comments"></i> Get a Free Consultation
        </button>
        <button class="csd-btn csd-btn-outline-light" data-bs-toggle="modal" data-bs-target="#quoteModal">
          <i class="fas fa-file-invoice-dollar"></i> Get a Custom Software Estimate
        </button>
      </div>
    </div>
  </section>

  {{-- ═══ SECTION 1: CUSTOM SOFTWARE DEVELOPMENT SERVICES ═══ --}}
  <section class="csd-section">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-layer-group"></i> What We Build</span>
        <h2 class="csd-section-title">Custom Software Development Services</h2>
      </div>
      <p>
        Custom software development means designing and building an application around your business's actual
        workflows, rather than adapting your business to fit a generic, off-the-shelf product. That can take many
        forms — a business application that runs a core operation, an internal tool that replaces manual admin work,
        a customer portal or dashboard your clients log into every day, or a full SaaS platform you sell to your
        own customers.
      </p>
      <p>
        We build across the full range of custom software: CRM and ERP systems, workflow and business-process
        automation, marketplaces that connect two sides of a transaction, web and mobile applications, API-driven
        systems that tie your existing tools together, AI-powered applications built around your own data, and
        enterprise platforms that need to run reliably at scale.
      </p>
      <div class="csd-type-pills">
        @php
          // Second element links to the real service page where one exists —
          // Phase 17 internal-linking requirement. Types without a dedicated
          // page stay plain text rather than linking somewhere generic.
          $csdTypes = [
            ['Business Applications', null],
            ['Internal Business Software', null],
            ['SaaS Platforms', 'saas-development'],
            ['Customer Portals', null],
            ['Dashboards', null],
            ['Workflow Systems', null],
            ['CRM', 'crm-development'],
            ['ERP', 'erp-development'],
            ['Marketplaces', null],
            ['Automation Platforms', null],
            ['Web Applications', 'web-application-development'],
            ['Mobile Applications', 'mobile-app-development'],
            ['API-Driven Systems', 'custom-api-development-integration-solutions'],
            ['AI-Powered Applications', 'ai-machine-learning-development'],
            ['Enterprise Platforms', 'enterprise-software-development'],
            ['Legacy Software Modernization', 'software-modernization'],
          ];
        @endphp
        @foreach($csdTypes as $type)
          @if($type[1])
            <a href="{{ route('pages.child.sevice_details', $type[1]) }}" class="csd-type-pill csd-type-pill-link">{{ $type[0] }}</a>
          @else
            <span class="csd-type-pill">{{ $type[0] }}</span>
          @endif
        @endforeach
      </div>
    </div>
  </section>

  {{-- ═══ SECTION 2: AFFORDABLE WITHOUT CUTTING CORNERS ═══ --}}
  <section class="csd-section bg-light">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-scale-balanced"></i> Built To Be Cost-Effective</span>
        <h2 class="csd-section-title">Affordable Custom Software Development Without Cutting Corners</h2>
        <p class="csd-section-sub">Affordable doesn't mean cutting corners — it means being deliberate about scope, architecture and technology so you're never paying for complexity you don't need yet.</p>
      </div>
      <div class="csd-approach-grid">
        <div class="csd-approach-card">
          <div class="csd-approach-icon"><i class="fas fa-rocket"></i></div>
          <h3>MVP-First Development</h3>
          <p>We help you identify the smallest version of your product that delivers real value, so you can validate the idea before investing in every feature on the roadmap.</p>
        </div>
        <div class="csd-approach-card">
          <div class="csd-approach-icon"><i class="fas fa-layer-group"></i></div>
          <h3>Phased Development</h3>
          <p>Rather than building everything up front, we break larger projects into phases — core platform first, then automation and integrations, then advanced features.</p>
        </div>
        <div class="csd-approach-card">
          <div class="csd-approach-icon"><i class="fas fa-puzzle-piece"></i></div>
          <h3>Reusable Components</h3>
          <p>We rely on well-tested components and proven architecture patterns instead of reinventing solved problems, keeping development time — and cost — down.</p>
        </div>
        <div class="csd-approach-card">
          <div class="csd-approach-icon"><i class="fas fa-sitemap"></i></div>
          <h3>Efficient, Modern Architecture</h3>
          <p>Choosing the right architecture from day one avoids expensive rewrites later — we design for the scale you actually need now, with a clear path to grow.</p>
        </div>
        <div class="csd-approach-card">
          <div class="csd-approach-icon"><i class="fas fa-arrows-rotate"></i></div>
          <h3>Agile Development</h3>
          <p>Two-week sprints with working demos mean you can adjust priorities as you learn, instead of locking in a fixed scope before development even starts.</p>
        </div>
        <div class="csd-approach-card">
          <div class="csd-approach-icon"><i class="fas fa-handshake"></i></div>
          <h3>Flexible Engagement Models</h3>
          <p>Fixed price, dedicated team, or time &amp; materials — we scope the engagement to match your budget, timeline and how much day-to-day control you want.</p>
        </div>
      </div>
      <p class="csd-disclaimer">
        <i class="fas fa-circle-info"></i>&nbsp;
        What this costs in practice depends on your specific scope, integrations and requirements — every project
        is different, and we'll always be upfront about what drives cost up or down rather than promising a
        one-size-fits-all number.
      </p>
      <div class="csd-inline-cta">
        <span>Want to talk through what this would look like for your budget?</span>
        <button class="csd-inline-cta-btn" data-bs-toggle="modal" data-bs-target="#consultModal">
          Discuss Your Software Project <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </section>

  {{-- ═══ SECTION 3: FOR STARTUPS ═══ --}}
  <section class="csd-section">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-seedling"></i> For Founders &amp; Product Teams</span>
        <h2 class="csd-section-title">Custom Software Development for Startups</h2>
        <p class="csd-section-sub">
          Startup software development is a different discipline from building for an established enterprise —
          speed to market and validated learning matter more than covering every edge case on day one. As a
          startup software development company, we work with founders and early product teams to get from idea
          to a real, working product without over-building.
        </p>
      </div>
      <div class="csd-flow">
        @php
          $startupSteps = [
            ['Idea', 'You bring the problem you\'re solving and who it\'s for — we don\'t need a finished spec to start the conversation.'],
            ['Discovery', 'A focused discovery phase turns your idea into a clear scope: core features, user flows, and a technical approach that fits your budget.'],
            ['MVP', 'We build a minimum viable product — not a stripped-down demo, but a real, usable product focused on what matters to your first users.'],
            ['Launch', 'Your MVP goes live to real users, with the infrastructure and monitoring in place to handle actual usage.'],
            ['Validation', 'Real usage data and user feedback tell us what to build next — and just as importantly, what not to build yet.'],
            ['Scaling', 'As traction grows, we extend the architecture and add the features validation showed you actually need.'],
          ];
        @endphp
        @foreach($startupSteps as $i => $step)
          <div class="csd-flow-step">
            <div class="csd-flow-num">{{ $i + 1 }}</div>
            <h4>{{ $step[0] }}</h4>
            <p>{{ $step[1] }}</p>
          </div>
          @if(!$loop->last)
            <div class="csd-flow-arrow"><i class="fas fa-arrow-right"></i></div>
          @endif
        @endforeach
      </div>
      <p style="text-align:center;max-width:760px;margin:36px auto 0;color:#6c757d;">
        Whether you need a SaaS MVP to bring to your first investors or a working product to test with real
        customers, our startup MVP development process is built to get you there without wasted spend — and
        affordable software development for startups means spending it on the right things, at the right time.
      </p>
    </div>
  </section>

  {{-- ═══ SECTION 4: FOR SMALL BUSINESSES ═══ --}}
  <section class="csd-section bg-light">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-store"></i> For Growing Businesses</span>
        <h2 class="csd-section-title">Software Development for Small Businesses</h2>
        <p class="csd-section-sub">
          Software development for small businesses isn't about building the same complex systems enterprises
          need — it's about replacing the specific manual processes quietly costing your team hours every week
          with custom business software sized to how you actually operate.
        </p>
      </div>
      <div class="csd-ba-grid">
        <div class="csd-ba-card before">
          <h3><i class="fas fa-triangle-exclamation"></i> Still Relying On</h3>
          <ul class="csd-ba-list">
            <li><i class="fas fa-xmark"></i> Spreadsheets for core operations</li>
            <li><i class="fas fa-xmark"></i> Manual, repetitive data entry</li>
            <li><i class="fas fa-xmark"></i> Disconnected tools that don't talk to each other</li>
            <li><i class="fas fa-xmark"></i> Repetitive admin tasks eating staff time</li>
            <li><i class="fas fa-xmark"></i> Outdated systems nobody wants to touch</li>
          </ul>
        </div>
        <div class="csd-ba-card after">
          <h3><i class="fas fa-circle-check"></i> With Custom Software</h3>
          <ul class="csd-ba-list">
            <li><i class="fas fa-check"></i> One system as your single source of truth</li>
            <li><i class="fas fa-check"></i> Automated data entry and workflows</li>
            <li><i class="fas fa-check"></i> Integrated tools that share data automatically</li>
            <li><i class="fas fa-check"></i> Staff time freed up for higher-value work</li>
            <li><i class="fas fa-check"></i> A modern, reliably maintained system</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══ SECTION 5: SOLUTIONS WE BUILD ═══ --}}
  <section class="csd-section">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-shapes"></i> The Solutions Catalogue</span>
        <h2 class="csd-section-title">Custom Software Solutions We Build</h2>
        <p class="csd-section-sub">A look at the specific types of software we build most often for our clients — each one shaped around the business it's built for, not a fixed template.</p>
      </div>
      <div class="csd-solutions-grid">
        @php
          $solutions = [
            ['fa-address-book', 'CRM Software', 'Track leads, manage customer relationships, and give your sales team one place to work from, built around your actual sales process.'],
            ['fa-industry', 'ERP Software', 'Bring finance, inventory, operations and reporting into one connected system instead of juggling spreadsheets and disconnected tools.'],
            ['fa-cloud', 'SaaS Platforms', 'Multi-tenant platforms built to onboard customers, scale with usage, and support the subscription model your business runs on.'],
            ['fa-briefcase', 'Business Management Software', 'Purpose-built software that runs a specific part of your business — scheduling, resourcing, project tracking — exactly the way you need it to.'],
            ['fa-diagram-project', 'Workflow Automation', 'Automate the repetitive, multi-step processes your team currently does by hand, from approvals to notifications to data hand-offs.'],
            ['fa-users-gear', 'Customer Portals', 'Self-service portals where your customers can track orders, view account information, or manage their own data without calling support.'],
            ['fa-toolbox', 'Internal Business Applications', 'Internal tools built for how your team actually works day to day, replacing the spreadsheets and manual processes holding operations together.'],
            ['fa-store', 'Marketplace Platforms', 'Two-sided platforms that connect buyers and sellers, or service providers and customers, with the matching, payments and trust features each side needs.'],
            ['fa-cart-shopping', 'E-commerce Systems', 'Custom storefronts and back-office systems for businesses whose needs have outgrown what off-the-shelf e-commerce platforms can support.'],
            ['fa-heart-pulse', 'Healthcare Software', 'Patient management, scheduling and clinical workflow software built with the data-handling and compliance considerations healthcare requires.'],
            ['fa-building', 'Real Estate Software', 'Property management, listings and transaction-tracking platforms built around how your real estate business actually operates.'],
            ['fa-truck-fast', 'Logistics Software', 'Fleet tracking, route planning and shipment visibility systems built to handle real-time operational data.'],
            ['fa-sack-dollar', 'Financial Software', 'Lending, claims, or financial-services platforms built with the accuracy, auditability and security financial data demands.'],
            ['fa-gears', 'Manufacturing Software', 'Production tracking, quality control and industrial IoT integrations that connect your shop floor to the rest of the business.'],
          ];
        @endphp
        @foreach($solutions as $s)
          <div class="csd-solution-card">
            <div class="csd-solution-icon"><i class="fas {{ $s[0] }}"></i></div>
            <h3>{{ $s[1] }}</h3>
            <p>{{ $s[2] }}</p>
          </div>
        @endforeach

        {{-- Only card in this section linking out — the other 14 solution
             types don't have a dedicated page yet (see Phase 9), and Phase 5
             explicitly says only link to pages that actually exist. --}}
        <a href="{{ route('pages.child.sevice_details', 'ai-machine-learning-development') }}" class="csd-solution-card">
          <div class="csd-solution-icon"><i class="fas fa-brain"></i></div>
          <h3>AI-Powered Applications</h3>
          <p>Features and applications built around your own data — from automation and recommendations to document processing — not a generic model demo.</p>
          <span class="csd-solution-link">Learn more &rarr;</span>
        </a>
      </div>
    </div>
  </section>

  {{-- ═══ SECTION 6: COST / PRICING ═══ --}}
  <section class="csd-section bg-light">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-calculator"></i> Investment</span>
        <h2 class="csd-section-title">How Much Does Custom Software Development Cost?</h2>
        <p class="csd-section-sub">There's no single number that applies to every project — the honest answer is "it depends on what you're building." Here's what actually drives the cost up or down.</p>
      </div>
      <div class="csd-cost-layout">
        <ul class="csd-cost-factors">
          <li><i class="fas fa-check"></i> Number of features</li>
          <li><i class="fas fa-check"></i> Overall complexity</li>
          <li><i class="fas fa-check"></i> UI/UX requirements</li>
          <li><i class="fas fa-check"></i> Third-party integrations</li>
          <li><i class="fas fa-check"></i> Number of users</li>
          <li><i class="fas fa-check"></i> Security requirements</li>
          <li><i class="fas fa-check"></i> Cloud infrastructure needs</li>
          <li><i class="fas fa-check"></i> Mobile and/or web requirements</li>
          <li><i class="fas fa-check"></i> AI requirements</li>
          <li><i class="fas fa-check"></i> Third-party APIs</li>
          <li><i class="fas fa-check"></i> Ongoing maintenance requirements</li>
        </ul>
        <div class="csd-cost-note">
          <p>
            As a general reference point, a focused MVP typically starts in the low five figures, a mid-sized
            web or mobile application usually falls in the mid five figures, and a full enterprise or AI-powered
            platform can run into six figures — but those ranges only mean something once we know your actual
            scope.
          </p>
          <p>
            We break this down in detail — by project type, by engagement model, and by team structure — in our
            full pricing guide:
          </p>
          <a href="{{ route('blog.show', 'how-much-does-custom-software-development-cost-in-2026') }}" class="csd-cost-link">
            Read: How Much Does Custom Software Development Cost in 2026? <i class="fas fa-arrow-right"></i>
          </a>
          <p style="margin-top:16px;">
            <button class="csd-btn csd-btn-primary" style="padding:12px 22px;font-size:.88rem;" data-bs-toggle="modal" data-bs-target="#quoteModal">
              <i class="fas fa-file-invoice-dollar"></i> Get a Scoped Estimate
            </button>
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══ SECTION 7: BUILD ON A LIMITED BUDGET ═══ --}}
  <section class="csd-section">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-wallet"></i> Phased Investment</span>
        <h2 class="csd-section-title">Need Custom Software on a Limited Budget?</h2>
        <p class="csd-section-sub">You don't always need to build everything on day one. A phased approach lets you control your initial investment while keeping the architecture ready for what comes next.</p>
      </div>
      <div class="csd-flow">
        @php
          $budgetPhases = [
            ['Core MVP', 'Launch with the essential features that solve your core problem — nothing more. This is what proves the concept and gets real users on the product.'],
            ['Customer Feedback', 'Real usage tells you far more than assumptions do. This phase is about listening before spending more, so the next investment goes where it actually matters.'],
            ['Automation & Integrations', 'Once the core product is validated, we automate the manual steps and connect the third-party tools and systems your business already relies on.'],
            ['Advanced Features', 'With a stable, adopted product, we layer in the more complex, higher-effort features that weren\'t essential for day one but now add real value.'],
            ['Scale & Optimization', 'As usage grows, we optimize performance, harden security, and scale the infrastructure to match — built on an architecture designed for this from the start.'],
          ];
        @endphp
        @foreach($budgetPhases as $i => $phase)
          <div class="csd-flow-step">
            <div class="csd-flow-num">{{ $i + 1 }}</div>
            <h4>{{ $phase[0] }}</h4>
            <p>{{ $phase[1] }}</p>
          </div>
          @if(!$loop->last)
            <div class="csd-flow-arrow"><i class="fas fa-arrow-right"></i></div>
          @endif
        @endforeach
      </div>
      <p class="csd-disclaimer" style="margin-top:36px;">
        <i class="fas fa-circle-info"></i>&nbsp;
        Phased development helps control your initial investment while keeping the architecture ready for future
        growth — it doesn't mean every project can be delivered for a fixed low price. Each phase is scoped and
        estimated on its own terms, so you always know what you're paying for and why.
      </p>
    </div>
  </section>

  {{-- ═══ SECTION 8: INDUSTRY RELEVANCE ═══ --}}
  <section class="csd-section bg-light">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-industry"></i> Industry Expertise</span>
        <h2 class="csd-section-title">Custom Software Development for Different Industries</h2>
        <p class="csd-section-sub">Every industry brings its own constraints — compliance, real-time data, transaction complexity. Here's some of what we've built, by industry.</p>
      </div>
      <div class="csd-solutions-grid">
        @php
          // slug (5th element) links to the Phase 16 industry page when one exists —
          // Real Estate has no dedicated industry page yet, only its case study.
          $industries = [
            ['fa-heart-pulse', 'Healthcare', 'Healthcare providers need software that handles sensitive patient data correctly while staying usable for clinical staff under real time pressure — from telemedicine platforms to scheduling and records.', 'medcare-health-network-telemedicine-case-study', 'healthcare-software-development'],
            ['fa-sack-dollar', 'FinTech', 'Financial services software has to get accuracy, auditability and security right the first time — we\'ve built lending platforms and claims-automation systems where that isn\'t optional.', 'quickfund-financial-services-lending-platform-case-study', 'fintech-software-development'],
            ['fa-gears', 'Manufacturing', 'Manufacturers need visibility from the shop floor to the back office — production tracking, quality control and IoT integrations that connect equipment data to business decisions.', 'nordholt-manufacturing-industrial-iot-case-study', 'manufacturing-software-development'],
            ['fa-truck-fast', 'Logistics', 'Logistics operations run on real-time data — fleet tracking, route planning and shipment visibility systems built to handle it as it happens, not in a nightly batch.', 'swiftcargo-logistics-fleet-tracking-case-study', 'logistics-software-development'],
            ['fa-building', 'Real Estate', 'Property and real estate businesses need software that mirrors how listings, transactions and tenant relationships actually move — not a generic CRM stretched to fit.', 'sequoia-peak-realty-group-proptech-case-study', null],
            ['fa-cart-shopping', 'Retail', 'Retail and e-commerce businesses that have outgrown off-the-shelf platforms need storefronts and back-office systems — including AI-powered features — built for how they actually sell.', 'urban-threads-apparel-ecommerce-ai-case-study', 'retail-software-development'],
            ['fa-graduation-cap', 'Education', 'Schools and education groups managing multiple campuses or programs need administrative and ERP systems that actually reflect how the institution is structured.', 'bright-horizons-school-group-erp-case-study', 'education-software-development'],
          ];
        @endphp
        @foreach($industries as $ind)
          <div class="csd-solution-card csd-industry-card">
            <div class="csd-solution-icon"><i class="fas {{ $ind[0] }}"></i></div>
            <h3>{{ $ind[1] }}</h3>
            <p>{{ $ind[2] }}</p>
            <div class="csd-industry-links">
              @if($ind[4])
              <a href="{{ route('industries.show', $ind[4]) }}">Explore {{ $ind[1] }} Solutions &rarr;</a>
              @endif
              <a href="{{ route('case-studies.show', $ind[3]) }}">View Case Study &rarr;</a>
            </div>
          </div>
        @endforeach
      </div>
      <div class="csd-inline-cta">
        <span>Don't see your industry? We've likely built something close to it.</span>
        <button class="csd-inline-cta-btn" data-bs-toggle="modal" data-bs-target="#consultModal">
          Tell Us What You Want to Build <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </section>

  {{-- ═══ SECTION 9: FAQ ═══ --}}
  <section class="csd-section bg-light">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-circle-question"></i> Common Questions</span>
        <h2 class="csd-section-title">Frequently Asked Questions</h2>
      </div>
      <div class="csd-faq-list">
        @foreach($csdFaqs as $i => $faq)
        <div class="csd-faq-item {{ $i === 0 ? 'open' : '' }}" onclick="this.classList.toggle('open')">
          <div class="csd-faq-question">
            {{ $faq['q'] }} <i class="fas fa-chevron-down"></i>
          </div>
          <div class="csd-faq-answer">
            <p>{!! $faq['a'] !!}</p>
          </div>
        </div>
        @endforeach
      </div>
      <div class="csd-inline-cta">
        <span>Still have questions specific to your project?</span>
        <button class="csd-inline-cta-btn" data-bs-toggle="modal" data-bs-target="#consultModal">
          Get a Free Software Consultation <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </section>

  </div>
  {{-- SEO Phase 29 — Trust Signals: NDA/IP protection, source-code
       ownership and post-launch support are the biggest objections on the
       highest-conversion-intent page on the site, but weren't addressed
       anywhere on it. Reusing the homepage's real, already-honest trust
       component rather than writing a parallel, possibly-inconsistent one. --}}
  @include('layouts.trust')
  <div class="csd-page">

  {{-- ═══ SECTION 10: MARKETS WE SERVE ═══ --}}
  <section class="csd-section">
    <div class="csd-container">
      <div class="csd-section-head">
        <span class="csd-eyebrow"><i class="fas fa-earth-americas"></i> Where We Work</span>
        <h2 class="csd-section-title">Custom Software Development Across Markets</h2>
        <p class="csd-section-sub">We work with businesses across the USA, United Kingdom, Germany and Europe — each market page covers the specific business challenges, communication approach and compliance considerations relevant there.</p>
      </div>
      <div class="csd-market-row">
        <a href="{{ route('country.usa') }}" class="csd-market-chip"><i class="fas fa-flag-usa"></i> USA</a>
        <a href="{{ route('country.uk') }}" class="csd-market-chip"><i class="fas fa-flag"></i> UK</a>
        <a href="{{ route('country.germany') }}" class="csd-market-chip"><i class="fas fa-flag"></i> Germany</a>
        <a href="{{ route('country.europe') }}" class="csd-market-chip"><i class="fas fa-earth-europe"></i> Europe</a>
      </div>
    </div>
  </section>

  {{-- ═══ CLOSING CTA ═══ --}}
  <section class="cta-banner-section text-center">
    <div class="container">
      <h2 class="cta-banner-title">Ready to Build the Right Software for Your Business?</h2>
      <p class="cta-banner-sub">Let's talk about what you're trying to build — and the most cost-effective way to get there.</p>
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
