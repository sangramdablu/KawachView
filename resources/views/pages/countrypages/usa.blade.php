<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Custom Software Development Company in USA | KawachTech';
    $seoDescription = 'Looking for a reliable custom software development company for your US business? KawachTech builds scalable web, SaaS, AI and enterprise software with transparent communication.';
    $seoKeywords    = 'custom software development company USA, software development company USA, software development services USA, software development outsourcing USA, dedicated development team USA, hire software developers for US companies, offshore software development for US businesses';
    $seoCanonical   = url('/markets/usa/software-development');

    // Shared once here so the FAQPage schema below and the visible FAQ
    // accordion further down the page read from the same source.
    $usaFaqs = [
        [
            'q' => 'Why should a USA company work with an offshore software development team?',
            'a' => "The honest reason most US companies explore offshore development isn't just cost — it's access. Senior engineering talent is in short supply and expensive to hire directly in most US markets right now, and building an in-house team from scratch can take months before a single feature ships. Working with an established team like KawachTech gives you engineers who've already worked together, a project already in motion within weeks rather than a hiring pipeline, and a partner who's built similar systems before. It works best when you treat it as a genuine extension of your team, not a hand-off — which is exactly how we structure engagements.",
        ],
        [
            'q' => 'How does KawachTech communicate with clients in the USA given the time difference?',
            'a' => "Our engineering teams are based in India, which puts us roughly 9.5 to 13.5 hours ahead of the continental US depending on your time zone and time of year. We don't pretend that gap doesn't exist. What we do instead is schedule recurring meetings in the overlap window — typically early morning Eastern/Pacific time, which is evening for our team — for sprint planning, demos, and any decision that genuinely needs real-time back-and-forth. Between those syncs, you get written daily updates, a shared project board, and a dedicated point of contact who's reachable by message throughout your working day.",
        ],
        [
            'q' => 'Can I hire a dedicated software development team through KawachTech?',
            'a' => 'Yes. Our dedicated development team model gives you engineers who work exclusively on your product, report into your priorities, and function as an extension of your team rather than a project vendor. This is the model most US clients use for ongoing product development, as opposed to a one-off, fixed-scope build.',
        ],
        [
            'q' => 'Who owns the source code once the project is delivered?',
            'a' => "Source code, documentation, and any custom IP built specifically for your project belong to you, as set out in our project agreement — this is standard practice and something we're happy to confirm in writing before work begins. If your legal team wants specific IP assignment or work-for-hire language, we'll work with them on the contract.",
        ],
        [
            'q' => 'How much does custom software development cost?',
            'a' => "It genuinely depends on scope, complexity, integrations, and which engagement model you choose — anyone who quotes a number before understanding your requirements is guessing. What we can tell you is that a fixed-price MVP and an ongoing dedicated-team product build have very different cost structures, and we'll walk through both during a free consultation once we understand what you're trying to build.",
        ],
        [
            'q' => 'How long does it take to develop custom software?',
            'a' => "A focused MVP typically takes 3-6 months depending on scope; a more complex enterprise platform or a product with significant integrations can run 9-12+ months. We'll give you a realistic timeline estimate after the discovery phase, once we actually understand your requirements — not before.",
        ],
        [
            'q' => 'Can KawachTech work with our existing internal development team?',
            'a' => "Yes, this is a common setup — we often work alongside an in-house team, either filling a specific skills gap (like a particular framework or DevOps expertise) or taking on a defined module while your team owns the rest. We'll adapt to your existing tools, code review process, and sprint cadence rather than asking you to adapt to ours.",
        ],
        [
            'q' => 'Does KawachTech provide post-launch support?',
            'a' => "Yes. Launching is rarely the end of the work — bug fixes, performance tuning, and incremental feature requests keep coming in the months after go-live. We offer ongoing maintenance and support arrangements sized to what your product actually needs, from a light monthly retainer to a full dedicated team continuing active development.",
        ],
        [
            'q' => 'How do you manage different time zones on an active project?',
            'a' => 'A scheduled daily or weekly overlap meeting, a shared project management tool (Jira, Linear, Trello or whatever your team already uses), written async updates at the end of each work day, and a single named point of contact on our side who owns communication with you. The goal is that you always know what happened yesterday and what\'s planned for today, without needing to be online at the same time we are.',
        ],
        [
            'q' => 'How do you protect the confidentiality of our project and data?',
            'a' => "We sign NDAs before any detailed project discussion, restrict codebase and credential access to the engineers actually assigned to your project, and follow standard secure development practices (encrypted storage, access controls, secure credential handling) throughout the build. If your project has specific security or compliance requirements, we'll work with your internal security or legal team to meet them.",
        ],
        [
            'q' => 'Can KawachTech sign an NDA before we share project details?',
            'a' => "Yes — signing an NDA before any substantive discussion of your product, data, or business logic is standard practice for us, not an exception you need to request.",
        ],
        [
            'q' => 'Can you modernize or rebuild our existing legacy software?',
            'a' => "Yes, legacy modernization is a significant part of what we do — whether that's migrating an aging on-premise system to the cloud, replacing a monolith with a more maintainable architecture, or rebuilding a product on a modern stack while keeping the business logic your team has refined over years. We start by auditing what exists before proposing what changes, rather than assuming a full rewrite is always the right answer.",
        ],
        [
            'q' => 'Can we scale the development team up or down during the project?',
            'a' => "Yes — this is one of the practical advantages of a dedicated-team engagement over hiring directly. If you need to add a specialist for a specific phase (say, a DevOps engineer during a cloud migration) or scale back after a major release, we can adjust team composition with real notice rather than a multi-month hiring or layoff process.",
        ],
        [
            'q' => 'What industries does KawachTech have experience in within the USA market?',
            'a' => "We've built software for US clients in legal services, insurance, property management and real estate, nonprofit fundraising, and SaaS, alongside broader company experience in healthcare, fintech, logistics, and e-commerce. Our case studies section below covers the US-based projects specifically.",
        ],
        [
            'q' => 'How do we get started with KawachTech?',
            'a' => "Book a free consultation through this page or our contact form. We'll ask about your business goals, current systems, and what you're trying to build, then follow up with an honest assessment of scope, approach, and realistic next steps — no obligation, no generic sales deck.",
        ],
    ];

    // ── Schema: Organization + Service + FAQPage + BreadcrumbList ──
    // Built as a PHP array + json_encode() rather than raw JSON-LD text,
    // since a literal "@context" string in a raw <script> block collides
    // with Blade's own @context directive. An array key never hits that
    // problem because Blade isn't parsing it as template text.
    $usaSchema = [
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
                    "name" => "United States",
                ],
                "description" => "Custom software, SaaS, AI and enterprise application development for businesses in the United States.",
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
                ], $usaFaqs),
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Markets", "item" => url('/markets')],
                    ["@type" => "ListItem", "position" => 3, "name" => "USA", "item" => $seoCanonical],
                    ["@type" => "ListItem", "position" => 4, "name" => "Software Development", "item" => $seoCanonical],
                ],
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($usaSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
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

/* ── HERO ── */
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

@media (max-width:768px){
  .usa-section{ padding:52px 0; }
}
</style>

<div class="usa-page">

  {{-- ═══ HERO ═══ --}}
  <section class="usa-hero">
    <div class="usa-container usa-hero-inner">
      <div class="usa-breadcrumb">
        <a href="{{ url('/') }}">Home</a> <span>/</span> <a href="{{ route('markets') }}">Markets</a> <span>/</span> USA / Software Development
      </div>
      <h1>Custom Software Development Company for Businesses in the USA</h1>
      <p class="usa-hero-lede">
        KawachTech helps US founders, CTOs and product teams design, build and scale custom software —
        from early-stage MVPs to enterprise systems — without the overhead of building an internal
        engineering org from zero.
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

  <style>
    .usa-challenge-grid{ display:grid; grid-template-columns:repeat(2,1fr); gap:22px; }
    .usa-challenge-card{
      background:#fff; border:1px solid var(--border-light); border-radius:var(--radius);
      padding:26px 24px; box-shadow:var(--shadow);
    }
    .usa-challenge-card i{ color:var(--primary); font-size:1.3rem; margin-bottom:14px; display:block; }
    .usa-challenge-card h3{ font-size:1.05rem; margin-bottom:8px; }
    .usa-challenge-card p{ color:var(--text-muted); font-size:.92rem; margin:0; }
    @media (max-width:768px){ .usa-challenge-grid{ grid-template-columns:1fr; } }
  </style>

  {{-- ═══ MARKET-SPECIFIC BUSINESS CHALLENGES ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-triangle-exclamation"></i> The US Market</span>
        <h2 class="usa-section-title">Software Development Challenges Businesses in the USA Face</h2>
        <p class="usa-section-sub">The specific pressures we hear most often from US founders and technology leaders.</p>
      </div>
      <div class="usa-challenge-grid">
        <div class="usa-challenge-card">
          <i class="fas fa-user-slash"></i>
          <h3>A Tight, Expensive Senior Engineering Market</h3>
          <p>Experienced software engineers in most US tech hubs command high salaries and are genuinely hard to hire quickly — a single senior backend hire can take three to six months from job posting to start date, time most product roadmaps can't afford to lose.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-server"></i>
          <h3>Legacy Systems Slowing Down the Business</h3>
          <p>Many established US businesses are still running on systems built a decade or more ago — functional, but brittle, poorly documented, and increasingly risky to extend without breaking something else.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-clipboard-list"></i>
          <h3>Manual Processes That Haven't Been Digitized</h3>
          <p>Spreadsheets, email chains, and manual data entry are still holding together core operations at plenty of otherwise sophisticated companies, quietly costing hours every week that custom software could reclaim.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-hourglass-half"></i>
          <h3>Product Development Moving Too Slowly</h3>
          <p>Competitors — often venture-funded and digital-first — are shipping faster. A slow internal release cadence isn't just an engineering inconvenience, it's a real competitive risk in most US verticals right now.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-cloud-arrow-up"></i>
          <h3>Cloud Modernization and Scaling Infrastructure</h3>
          <p>Moving from on-premise or a single monolithic server to properly scalable cloud infrastructure is a project most internal teams put off — not because it isn't a priority, but because nobody has the bandwidth to own it end-to-end.</p>
        </div>
        <div class="usa-challenge-card">
          <i class="fas fa-brain"></i>
          <h3>Figuring Out Where AI Actually Fits</h3>
          <p>Most US businesses now feel pressure to "do something with AI," but the harder problem is identifying which specific workflow — support triage, document processing, recommendations — would genuinely benefit, and building it on real data rather than a demo.</p>
        </div>
      </div>
    </div>
  </section>

  <style>
    .usa-svc-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
    .usa-svc-card{
      background:#fff; border:1px solid var(--border-light); border-radius:var(--radius);
      padding:28px 24px; box-shadow:var(--shadow); transition:.25s; display:flex; flex-direction:column; height:100%;
    }
    .usa-svc-card:hover{ transform:translateY(-4px); box-shadow:var(--shadow-lg); }
    .usa-svc-icon{
      width:52px; height:52px; border-radius:14px; background:linear-gradient(135deg,var(--primary),var(--accent));
      color:#fff; display:flex; align-items:center; justify-content:center; font-size:1.25rem; margin-bottom:16px;
    }
    .usa-svc-card h3{ font-size:1.05rem; margin-bottom:8px; }
    .usa-svc-card p{ color:var(--text-muted); font-size:.9rem; margin:0 0 16px; flex:1; }
    .usa-svc-link{ color:var(--primary); font-weight:700; font-size:.85rem; text-decoration:none; }
    .usa-svc-link:hover{ color:var(--primary-dark); }
    @media (max-width:960px){ .usa-svc-grid{ grid-template-columns:repeat(2,1fr); } }
    @media (max-width:640px){ .usa-svc-grid{ grid-template-columns:1fr; } }
  </style>

  {{-- ═══ HOW KAWACHTECH HELPS ═══ --}}
  <section class="usa-section bg-light">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-layer-group"></i> What We Build</span>
        <h2 class="usa-section-title">How KawachTech Helps Businesses in the USA</h2>
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
          <p>From a focused MVP to a multi-tenant enterprise platform, built on architecture that scales as your customer base grows.</p>
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

  <style>
    .usa-trust-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:24px; }
    .usa-trust-item{ display:flex; gap:16px; }
    .usa-trust-icon{
      flex-shrink:0; width:46px; height:46px; border-radius:12px; background:rgba(0,200,150,.12);
      color:var(--success); display:flex; align-items:center; justify-content:center; font-size:1.05rem;
    }
    .usa-trust-item strong{ display:block; font-size:1rem; margin-bottom:5px; font-family:'Nunito',sans-serif; }
    .usa-trust-item span{ color:var(--text-muted); font-size:.88rem; line-height:1.6; }
    @media (max-width:960px){ .usa-trust-grid{ grid-template-columns:repeat(2,1fr); } }
    @media (max-width:640px){ .usa-trust-grid{ grid-template-columns:1fr; } }
  </style>

  {{-- ═══ WHY BUSINESSES WORK WITH US ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-handshake"></i> Why KawachTech</span>
        <h2 class="usa-section-title">Why Businesses in the USA Work With KawachTech</h2>
      </div>
      <div class="usa-trust-grid">
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-comments"></i></div>
          <div><strong>Transparent Communication</strong><span>Clear communication channels, regular written updates, and defined milestones — you always know exactly where your project stands.</span></div>
        </div>
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-clock"></i></div>
          <div><strong>Realistic Time-Zone Collaboration</strong><span>Scheduled overlap meetings, async daily updates, and a dedicated point of contact — built around the real time difference, not an exaggerated one.</span></div>
        </div>
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-user-tie"></i></div>
          <div><strong>Dedicated Project Management</strong><span>A single, clear point of contact throughout the engagement — not a rotating cast of account managers.</span></div>
        </div>
        <div class="usa-trust-item">
          <div class="usa-trust-icon"><i class="fas fa-rotate"></i></div>
          <div><strong>Agile Development</strong><span>Iterative sprints, regular demos, and feedback cycles that let you adjust direction before a wrong assumption becomes six months of wasted work.</span></div>
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

  <style>
    .usa-compliance-wrap{ max-width:820px; margin:0 auto; }
    .usa-compliance-list{ list-style:none; padding:0; margin:26px 0 0; display:grid; gap:16px; }
    .usa-compliance-list li{ display:flex; gap:14px; align-items:flex-start; }
    .usa-compliance-list i{ color:var(--primary); margin-top:4px; flex-shrink:0; }
    .usa-compliance-note{
      background:#fff; border:1px solid var(--border-light); border-radius:var(--radius);
      padding:22px 24px; margin-top:28px; font-size:.9rem; color:var(--text-muted); box-shadow:var(--shadow);
    }
  </style>

  {{-- ═══ COMPLIANCE, SECURITY & DATA ═══ --}}
  <section class="usa-section bg-light">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-shield-halved"></i> Security &amp; Compliance</span>
        <h2 class="usa-section-title">Building Secure and Compliant Software for USA Businesses</h2>
      </div>
      <div class="usa-compliance-wrap">
        <p style="color:var(--text-muted);">
          The US doesn't have one single federal privacy law the way the EU has GDPR — instead, requirements
          come from a mix of state-level privacy laws (like California's CCPA/CPRA), industry-specific
          regulations, and whatever contractual obligations your own customers or partners impose on you.
          What that means practically is that "compliance" looks different depending on what you're building
          and who your users are.
        </p>
        <ul class="usa-compliance-list">
          <li><i class="fas fa-notes-medical"></i><span><strong>Healthcare software</strong> — building with HIPAA-conscious data handling in mind: access controls, encryption, and audit trails around protected health information.</span></li>
          <li><i class="fas fa-credit-card"></i><span><strong>Financial &amp; payments software</strong> — PCI-DSS compliant payment processing and the kind of data-handling discipline financial regulators expect.</span></li>
          <li><i class="fas fa-map-location-dot"></i><span><strong>State-level privacy laws</strong> — designing data collection, storage and consent flows with California and other state privacy requirements in mind where your user base requires it.</span></li>
          <li><i class="fas fa-server"></i><span><strong>Enterprise security architecture</strong> — encryption at rest and in transit, role-based access control, and infrastructure aligned with SOC 2-style control principles.</span></li>
        </ul>
        <div class="usa-compliance-note">
          <strong>An honest note on compliance:</strong> we're not a law firm and this page isn't legal advice.
          We build software with security, privacy and compliance requirements in mind and work directly with
          your internal legal, compliance and security teams to meet the specific regulatory obligations that
          apply to your business — but final compliance sign-off for your industry and jurisdiction is always
          a decision for your own counsel.
        </div>
      </div>
    </div>
  </section>

  <style>
    .usa-cs-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
    .usa-cs-card{
      background:#fff; border:1px solid var(--border-light); border-radius:var(--radius);
      padding:26px 24px; box-shadow:var(--shadow); transition:.25s; display:flex; flex-direction:column;
    }
    .usa-cs-card:hover{ transform:translateY(-4px); box-shadow:var(--shadow-lg); }
    .usa-cs-tag{
      display:inline-block; align-self:flex-start; font-size:.68rem; font-weight:800; letter-spacing:.5px;
      text-transform:uppercase; color:var(--primary); background:rgba(26,115,232,.08);
      padding:5px 12px; border-radius:20px; margin-bottom:14px;
    }
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
    @media (max-width:960px){ .usa-cs-grid{ grid-template-columns:1fr; } }
  </style>

  {{-- ═══ RELEVANT CASE STUDIES ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-briefcase"></i> Real Projects</span>
        <h2 class="usa-section-title">Software Development Success Stories</h2>
        <p class="usa-section-sub">US-based client engagements — real challenges, real solutions, measurable outcomes.</p>
      </div>
      <div class="usa-cs-grid">

        <div class="usa-cs-card">
          <span class="usa-cs-tag">SaaS &middot; Austin, TX</span>
          <div class="usa-cs-client">Meridian Flow Technologies</div>
          <div class="usa-cs-loc">B2B SaaS project management platform</div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Challenge</div><div class="usa-cs-row-val">A monolithic platform straining under 12,000+ teams, with no tenant data isolation and no safe way to ship releases.</div></div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Solution</div><div class="usa-cs-row-val">Re-architected into isolated multi-tenant services with a zero-downtime migration path and progressive feature rollouts.</div></div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Tech</div><div class="usa-cs-row-val">Ruby on Rails, PostgreSQL, Kubernetes, Redis</div></div>
          <div class="usa-cs-kpis">
            <div class="usa-cs-kpi"><div class="usa-cs-kpi-val">-68%</div><div class="usa-cs-kpi-lbl">Page Load Time</div></div>
            <div class="usa-cs-kpi"><div class="usa-cs-kpi-val">4&times;</div><div class="usa-cs-kpi-lbl">Deploy Frequency</div></div>
          </div>
          <a href="{{ route('case-studies.show', 'meridian-flow-technologies-saas-platform-case-study') }}" class="usa-cs-link">Read the full case study &rarr;</a>
        </div>

        <div class="usa-cs-card">
          <span class="usa-cs-tag">Legal Tech &middot; New York, NY</span>
          <div class="usa-cs-client">Sterling &amp; Cross Legal Partners</div>
          <div class="usa-cs-loc">140-attorney corporate law firm, 5 offices</div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Challenge</div><div class="usa-cs-row-val">Case files scattered across drives and email, manual conflict-of-interest checks, and days-long billing cycles.</div></div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Solution</div><div class="usa-cs-row-val">A centralized case management system with document version control, a searchable conflict database, and automated time tracking.</div></div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Tech</div><div class="usa-cs-row-val">Laravel, Vue.js, PostgreSQL, Elasticsearch</div></div>
          <div class="usa-cs-kpis">
            <div class="usa-cs-kpi"><div class="usa-cs-kpi-val">-60%</div><div class="usa-cs-kpi-lbl">Billing Cycle</div></div>
            <div class="usa-cs-kpi"><div class="usa-cs-kpi-val">Days&rarr;Min</div><div class="usa-cs-kpi-lbl">Conflict Checks</div></div>
          </div>
          <a href="{{ route('case-studies.show', 'sterling-cross-legal-partners-case-management-case-study') }}" class="usa-cs-link">Read the full case study &rarr;</a>
        </div>

        <div class="usa-cs-card">
          <span class="usa-cs-tag">InsurTech &middot; Chicago, IL</span>
          <div class="usa-cs-client">Lakeshore Mutual Insurance</div>
          <div class="usa-cs-loc">Regional P&amp;C insurer, 300,000+ policyholders</div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Challenge</div><div class="usa-cs-row-val">Claims filed only by phone, fax or mail; manual triage; fraud caught only after payout, if at all.</div></div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Solution</div><div class="usa-cs-row-val">A digital claims portal with automated triage and an ML fraud-flagging model trained on the insurer's own historical claims.</div></div>
          <div class="usa-cs-row"><div class="usa-cs-row-label">Tech</div><div class="usa-cs-row-val">Java, Spring Boot, Python, PostgreSQL</div></div>
          <div class="usa-cs-kpis">
            <div class="usa-cs-kpi"><div class="usa-cs-kpi-val">4 hrs</div><div class="usa-cs-kpi-lbl">Response Time</div></div>
            <div class="usa-cs-kpi"><div class="usa-cs-kpi-val">3.2&times;</div><div class="usa-cs-kpi-lbl">Fraud Caught</div></div>
          </div>
          <a href="{{ route('case-studies.show', 'lakeshore-mutual-insurance-claims-automation-case-study') }}" class="usa-cs-link">Read the full case study &rarr;</a>
        </div>

      </div>
      <div style="text-align:center; margin-top:34px;">
        <a href="{{ route('casestudy') }}" class="usa-btn usa-btn-outline">View All Case Studies</a>
      </div>
    </div>
  </section>

  <style>
    .usa-ind-grid{ display:grid; grid-template-columns:repeat(4,1fr); gap:18px; }
    .usa-ind-card{
      background:#fff; border:1px solid var(--border-light); border-radius:14px; padding:22px 18px;
      text-align:center; text-decoration:none; color:var(--text-dark); transition:.2s; display:block;
    }
    .usa-ind-card:hover{ border-color:var(--primary); transform:translateY(-3px); box-shadow:var(--shadow); color:var(--text-dark); }
    .usa-ind-card i{ font-size:1.4rem; color:var(--primary); margin-bottom:10px; display:block; }
    .usa-ind-card span{ font-weight:700; font-size:.9rem; font-family:'Nunito',sans-serif; }
    @media (max-width:960px){ .usa-ind-grid{ grid-template-columns:repeat(3,1fr); } }
    @media (max-width:640px){ .usa-ind-grid{ grid-template-columns:repeat(2,1fr); } }
  </style>

  {{-- ═══ RELEVANT INDUSTRIES ═══ --}}
  <section class="usa-section bg-light">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-industry"></i> Industry Experience</span>
        <h2 class="usa-section-title">Software Development Expertise Across Industries</h2>
        <p class="usa-section-sub">Industries where we've delivered US-based and company-wide projects.</p>
      </div>
      <div class="usa-ind-grid">
        <a href="{{ route('case-studies.show', 'sterling-cross-legal-partners-case-management-case-study') }}" class="usa-ind-card"><i class="fas fa-scale-balanced"></i><span>Legal Services</span></a>
        <a href="{{ route('case-studies.show', 'lakeshore-mutual-insurance-claims-automation-case-study') }}" class="usa-ind-card"><i class="fas fa-file-shield"></i><span>Insurance</span></a>
        <a href="{{ route('case-studies.show', 'sequoia-peak-realty-group-proptech-case-study') }}" class="usa-ind-card"><i class="fas fa-house-chimney"></i><span>Real Estate &amp; PropTech</span></a>
        <a href="{{ route('case-studies.show', 'horizon-give-foundation-donor-platform-case-study') }}" class="usa-ind-card"><i class="fas fa-hand-holding-heart"></i><span>Nonprofit</span></a>
        <a href="{{ route('case-studies.show', 'meridian-flow-technologies-saas-platform-case-study') }}" class="usa-ind-card"><i class="fas fa-cloud"></i><span>SaaS</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-heartbeat"></i><span>Healthcare</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-money-bill-trend-up"></i><span>FinTech</span></a>
        <a href="{{ route('casestudy') }}" class="usa-ind-card"><i class="fas fa-cart-shopping"></i><span>E-commerce</span></a>
      </div>
    </div>
  </section>

  <style>
    .usa-eng-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
    .usa-eng-card{
      background:#fff; border:1px solid var(--border-light); border-radius:var(--radius);
      padding:28px 24px; box-shadow:var(--shadow);
    }
    .usa-eng-card h3{ font-size:1.1rem; margin-bottom:10px; }
    .usa-eng-card .usa-eng-best{ font-size:.78rem; font-weight:800; color:var(--primary); text-transform:uppercase; letter-spacing:.4px; margin-bottom:12px; }
    .usa-eng-card p{ color:var(--text-muted); font-size:.9rem; margin:0 0 10px; }
    .usa-eng-card p strong{ color:var(--text-dark); }
    @media (max-width:960px){ .usa-eng-grid{ grid-template-columns:1fr; } }
  </style>

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

  <style>
    .usa-process-row{ display:grid; grid-template-columns:repeat(7,1fr); gap:16px; }
    .usa-process-step{ text-align:center; }
    .usa-process-circle{
      width:52px; height:52px; margin:0 auto 14px; border-radius:50%;
      background:linear-gradient(135deg,var(--primary),var(--accent)); color:#fff;
      display:flex; align-items:center; justify-content:center; font-weight:900; font-family:'Nunito',sans-serif;
      font-size:1.05rem; box-shadow:0 8px 20px rgba(26,115,232,.3);
    }
    .usa-process-step h4{ font-size:.88rem; margin-bottom:6px; }
    .usa-process-step p{ font-size:.78rem; color:var(--text-muted); margin:0; }
    @media (max-width:960px){ .usa-process-row{ grid-template-columns:repeat(4,1fr); row-gap:28px; } }
    @media (max-width:640px){ .usa-process-row{ grid-template-columns:repeat(2,1fr); } }
  </style>

  {{-- ═══ SOFTWARE DEVELOPMENT PROCESS ═══ --}}
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

  <style>
    .usa-tz-wrap{ display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:center; }
    .usa-tz-card{
      background:var(--dark-navy); color:#fff; border-radius:var(--radius); padding:30px 28px;
    }
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
    @media (max-width:900px){ .usa-tz-wrap{ grid-template-columns:1fr; } }
  </style>

  {{-- ═══ TIME-ZONE & COMMUNICATION ═══ --}}
  <section class="usa-section">
    <div class="usa-container">
      <div class="usa-section-head">
        <span class="usa-eyebrow"><i class="fas fa-earth-americas"></i> Working Together</span>
        <h2 class="usa-section-title">Working With a Software Development Team Across Time Zones</h2>
        <p class="usa-section-sub">Kawach Technology is headquartered in India — here's honestly how that works with a team in the USA.</p>
      </div>
      <div class="usa-tz-wrap">
        <div class="usa-tz-card">
          <div class="usa-tz-row"><div class="loc">India (Our Team) <small>IST, UTC+5:30</small></div><div class="time">Evening</div></div>
          <div class="usa-tz-row"><div class="loc">US Eastern Time <small>UTC-5 / UTC-4 DST</small></div><div class="time">Early Morning</div></div>
          <div class="usa-tz-row"><div class="loc">US Pacific Time <small>UTC-8 / UTC-7 DST</small></div><div class="time">Late Night (prior day)</div></div>
          <div class="usa-tz-row"><div class="loc">Typical Gap</div><div class="time">~9.5–13.5 hrs</div></div>
        </div>
        <ul class="usa-tz-list">
          <li><i class="fas fa-calendar-check"></i><span><strong>Scheduled overlap meetings</strong> in early-morning Eastern/Pacific time (evening for our team) for sprint planning, demos, and decisions that need real-time discussion.</span></li>
          <li><i class="fas fa-moon"></i><span><strong>Work continues while you sleep.</strong> The gap that makes live overlap limited also means development often progresses overnight your time — you frequently wake up to completed work.</span></li>
          <li><i class="fas fa-clipboard-list"></i><span><strong>Written daily updates</strong> and a shared project board (Jira, Linear, Trello, or your existing tool) so status is never a mystery between syncs.</span></li>
          <li><i class="fas fa-user"></i><span><strong>One dedicated point of contact</strong> on our side, reachable by message throughout your working day even outside scheduled calls.</span></li>
          <li><i class="fas fa-video"></i><span><strong>Recorded sprint demos</strong> for anyone on your team who can't make the live overlap window.</span></li>
        </ul>
      </div>
    </div>
  </section>

  <style>
    .usa-faq-list{ max-width:820px; margin:0 auto; }
    .usa-faq-item{ border-bottom:1px solid var(--border-light); padding:20px 0; cursor:pointer; }
    .usa-faq-question{
      display:flex; justify-content:space-between; align-items:center; gap:16px;
      font-weight:700; font-size:.98rem; font-family:'Nunito',sans-serif; color:var(--text-dark);
    }
    .usa-faq-question i{ color:var(--primary); transition:transform .25s; flex-shrink:0; }
    .usa-faq-item.open .usa-faq-question i{ transform:rotate(180deg); }
    .usa-faq-answer{ max-height:0; overflow:hidden; transition:max-height .3s ease; }
    .usa-faq-item.open .usa-faq-answer{ max-height:400px; }
    .usa-faq-answer p{ color:var(--text-muted); font-size:.9rem; line-height:1.7; margin:14px 0 0; }
    .usa-other-markets{ display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-top:8px; }
    .usa-other-markets a{
      display:inline-flex; align-items:center; gap:8px; background:#fff; border:1px solid var(--border-light);
      border-radius:30px; padding:10px 20px; font-size:.86rem; font-weight:700; color:var(--text-dark); text-decoration:none;
    }
    .usa-other-markets a:hover{ border-color:var(--primary); color:var(--primary); }
  </style>

  {{-- ═══ OTHER MARKETS + CONTACT (crawlable links, not just modal CTAs) ═══ --}}
  <section class="usa-section" style="padding-top:0;">
    <div class="usa-container" style="text-align:center;">
      <p style="color:var(--text-muted); font-size:.92rem; margin-bottom:16px;">
        Also serving businesses in other markets, or prefer to talk directly?
      </p>
      <div class="usa-other-markets">
        <a href="{{ route('country.uk') }}"><i class="fas fa-landmark"></i> Software Development Company UK</a>
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
        <p class="usa-section-sub">Straight answers for US businesses evaluating an offshore development partner.</p>
      </div>
      <div class="usa-faq-list">
        @foreach($usaFaqs as $i => $faq)
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
        Looking for a Reliable Software Development Partner for Your Business in the USA?
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
