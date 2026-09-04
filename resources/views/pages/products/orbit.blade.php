<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Orbit — Real-Time Project Boards by Kawach Technology';
    $seoDescription = 'Orbit is the project board where tasks, comments, and updates sync in real time. Built by Kawach Technology. Boards, automation, and a free-forever plan.';
    $seoKeywords    = 'Orbit project management, real-time project board, Kawach Technology product, Orbit app, orbitzr.com, kanban board tool';
    $seoCanonical   = url('/products/orbit');

    $orbitSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Products", "item" => $seoCanonical],
                    ["@type" => "ListItem", "position" => 3, "name" => "Orbit", "item" => $seoCanonical],
                ],
            ],
            [
                "@type" => "SoftwareApplication",
                "name" => "Orbit",
                "applicationCategory" => "BusinessApplication",
                "operatingSystem" => "Web, iOS, Android",
                "url" => "https://orbitzr.com",
                "description" => "Orbit is a real-time project board where tasks, comments, and updates sync instantly across a team.",
                "offers" => [
                    ["@type" => "Offer", "name" => "Free", "price" => "0", "priceCurrency" => "USD"],
                    ["@type" => "Offer", "name" => "Standard", "price" => "4.50", "priceCurrency" => "USD", "priceSpecification" => ["@type" => "UnitPriceSpecification", "price" => "4.50", "priceCurrency" => "USD", "unitText" => "per user/month, billed annually"]],
                    ["@type" => "Offer", "name" => "Premium", "price" => "10.50", "priceCurrency" => "USD", "priceSpecification" => ["@type" => "UnitPriceSpecification", "price" => "10.50", "priceCurrency" => "USD", "unitText" => "per user/month, billed annually"]],
                ],
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($orbitSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
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
  --op-navy:#0d1b3e; --op-navy-2:#1f3a6e; --op-darker:#081029;
  --op-blue:#1a73e8; --op-teal:#22d3c7;
  --op-text:#1a1a2e; --op-muted:#5c6a82;
  --op-bg:#f6f8fc; --op-border:#e4e9f2;
  --op-wide:1440px;
}
.op-page{ font-family:'Open Sans', sans-serif; color:var(--op-text); background:#fff; overflow-x:hidden; }
.op-page h1, .op-page h2, .op-page h3{ font-family:'Nunito', sans-serif; font-weight:900; line-height:1.2; margin:0; }
.op-wrap{ max-width:var(--op-wide); margin:0 auto; padding:0 40px; }
@media(max-width:768px){ .op-wrap{ padding:0 20px; } }

/* ---------- Breadcrumb ---------- */
.op-crumb{ background:var(--op-bg); border-bottom:1px solid var(--op-border); padding:14px 0; }
.op-crumb .op-wrap{ font-size:.82rem; color:var(--op-muted); }
.op-crumb a{ color:var(--op-muted); text-decoration:none; }
.op-crumb a:hover{ color:var(--op-blue); }
.op-crumb span.sep{ margin:0 8px; color:#c3cadd; }
.op-crumb span.current{ color:var(--op-text); font-weight:700; }

/* ---------- Hero ---------- */
.op-hero{
  position:relative; overflow:hidden; color:#fff;
  background:radial-gradient(120% 140% at 85% 10%, #17285c 0%, var(--op-navy) 45%, var(--op-darker) 100%);
  padding:90px 0 100px;
}
.op-hero::before{ content:''; position:absolute; width:520px; height:520px; border:1px solid rgba(34,211,199,.16); border-radius:50%; top:-200px; left:-120px; }
.op-hero::after{ content:''; position:absolute; width:340px; height:340px; border:1px solid rgba(91,157,255,.2); border-radius:50%; top:-90px; left:-30px; }
.op-hero-inner{ position:relative; z-index:2; display:grid; grid-template-columns:1.1fr .9fr; gap:56px; align-items:center; }
.op-hero-inner > *{ min-width:0; }
@media(max-width:991.98px){ .op-hero-inner{ grid-template-columns:1fr; } }
.op-hero-eyebrow{ display:inline-flex; align-items:center; gap:8px; font-size:.78rem; font-weight:800; letter-spacing:1.5px; text-transform:uppercase; color:#7fe3da; margin-bottom:20px; }
.op-hero-eyebrow::before{ content:''; width:24px; height:2px; background:var(--op-teal); border-radius:2px; }
.op-hero h1{ font-size:clamp(2.1rem,4.2vw,3.4rem); max-width:640px; margin-bottom:20px; }
.op-hero-sub{ color:#c7d6f5; font-size:1.12rem; line-height:1.7; max-width:560px; margin-bottom:30px; }
.op-hero-ctas{ display:flex; flex-wrap:wrap; gap:14px; margin-bottom:18px; }
.op-btn{ display:inline-flex; align-items:center; gap:10px; font-weight:800; font-size:.96rem; padding:14px 26px; border-radius:10px; text-decoration:none; transition:.2s; }
.op-btn-primary{ background:var(--op-teal); color:#062421; box-shadow:0 10px 26px rgba(34,211,199,.3); }
.op-btn-primary:hover{ background:#3fe0d4; color:#062421; transform:translateY(-2px); }
.op-btn-ghost{ border:1.5px solid rgba(255,255,255,.3); color:#fff; }
.op-btn-ghost:hover{ border-color:#fff; background:rgba(255,255,255,.08); color:#fff; }
.op-hero-note{ color:#93a9d1; font-size:.85rem; }

/* ---------- Stat strip ---------- */
.op-stats{ background:var(--op-navy); border-top:1px solid rgba(255,255,255,.08); }
.op-stats-grid{ display:grid; grid-template-columns:repeat(3,1fr); }
.op-stat{ text-align:center; padding:34px 20px; border-right:1px solid rgba(255,255,255,.08); }
.op-stat:last-child{ border-right:none; }
.op-stat-num{ font-family:'Nunito',sans-serif; font-weight:900; font-size:2rem; color:#fff; }
.op-stat-label{ color:#9fb8e6; font-size:.85rem; margin-top:6px; }
@media(max-width:640px){ .op-stats-grid{ grid-template-columns:1fr; } .op-stat{ border-right:none; border-bottom:1px solid rgba(255,255,255,.08); } .op-stat:last-child{ border-bottom:none; } }

/* ---------- generic section ---------- */
.op-section{ padding:90px 0; }
.op-section-alt{ background:var(--op-bg); }
.op-section-head{ max-width:680px; margin:0 auto 56px; text-align:center; }
.op-eyebrow{ display:inline-flex; align-items:center; gap:8px; font-size:.76rem; font-weight:800; letter-spacing:1.4px; text-transform:uppercase; color:var(--op-blue); margin-bottom:14px; }
.op-section-head h2{ font-size:clamp(1.7rem,3vw,2.4rem); margin-bottom:14px; }
.op-section-head p{ color:var(--op-muted); font-size:1.02rem; line-height:1.7; }

/* ---------- feature grid ---------- */
.op-feature-grid{ display:grid; grid-template-columns:repeat(4,1fr); gap:22px; }
@media(max-width:991.98px){ .op-feature-grid{ grid-template-columns:repeat(2,1fr); } }
@media(max-width:575.98px){ .op-feature-grid{ grid-template-columns:1fr; } }
.op-feature-card{ background:#fff; border:1px solid var(--op-border); border-radius:16px; padding:26px 22px; transition:.25s; }
.op-feature-card:hover{ transform:translateY(-4px); box-shadow:0 16px 34px rgba(15,23,42,.08); }
.op-feature-icon{ width:46px; height:46px; border-radius:12px; background:rgba(26,115,232,.08); color:var(--op-blue); display:flex; align-items:center; justify-content:center; font-size:1.1rem; margin-bottom:16px; }
.op-feature-card h3{ font-size:1.02rem; margin-bottom:8px; }
.op-feature-card p{ color:var(--op-muted); font-size:.88rem; line-height:1.6; margin:0; }

/* ---------- Pilot spotlight ---------- */
.op-pilot{ background:linear-gradient(135deg,var(--op-navy) 0%, var(--op-navy-2) 100%); color:#fff; }
.op-pilot-grid{ display:grid; grid-template-columns:1fr 1fr; gap:56px; align-items:center; }
@media(max-width:900px){ .op-pilot-grid{ grid-template-columns:1fr; } }
.op-pilot h2{ font-size:clamp(1.7rem,3vw,2.3rem); margin-bottom:18px; color:#fff; }
.op-pilot p{ color:#c7d6f5; font-size:1.02rem; line-height:1.75; margin-bottom:0; }
.op-pilot-examples{ display:grid; gap:14px; }
.op-pilot-rule{ background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.14); border-radius:12px; padding:16px 18px; font-size:.9rem; color:#e7edfb; display:flex; gap:12px; align-items:flex-start; }
.op-pilot-rule i{ color:var(--op-teal); margin-top:3px; }
.op-pilot-examples-label{ font-size:.74rem; font-weight:700; letter-spacing:.8px; text-transform:uppercase; color:#8fb3f0; margin-bottom:12px; }

/* ---------- audience ---------- */
.op-audience-grid{ display:grid; grid-template-columns:repeat(4,1fr); gap:22px; }
@media(max-width:991.98px){ .op-audience-grid{ grid-template-columns:repeat(2,1fr); } }
@media(max-width:575.98px){ .op-audience-grid{ grid-template-columns:1fr; } }
.op-audience-card{ border:1px solid var(--op-border); border-radius:16px; padding:28px 24px; text-align:center; background:#fff; }
.op-audience-icon{ width:52px; height:52px; margin:0 auto 16px; border-radius:50%; background:rgba(34,211,199,.1); color:#0e9c8f; display:flex; align-items:center; justify-content:center; font-size:1.2rem; }
.op-audience-card h3{ font-size:1rem; margin-bottom:8px; }
.op-audience-card p{ color:var(--op-muted); font-size:.86rem; line-height:1.6; margin:0; }

/* ---------- testimonial ---------- */
.op-testimonial{ background:var(--op-bg); }
.op-testimonial-card{ max-width:760px; margin:0 auto; text-align:center; }
.op-testimonial-quote{ font-family:'Nunito',sans-serif; font-size:clamp(1.2rem,2.4vw,1.6rem); font-weight:700; color:var(--op-text); line-height:1.6; }
.op-testimonial-quote::before{ content:'\201C'; }
.op-testimonial-quote::after{ content:'\201D'; }
.op-testimonial-name{ margin-top:24px; font-weight:800; color:var(--op-text); }
.op-testimonial-role{ color:var(--op-muted); font-size:.9rem; }

/* ---------- pricing ---------- */
.op-pricing-grid{ display:grid; grid-template-columns:repeat(4,1fr); gap:20px; }
@media(max-width:991.98px){ .op-pricing-grid{ grid-template-columns:repeat(2,1fr); } }
@media(max-width:575.98px){ .op-pricing-grid{ grid-template-columns:1fr; } }
.op-price-card{ border:1px solid var(--op-border); border-radius:18px; padding:30px 26px; background:#fff; display:flex; flex-direction:column; }
.op-price-card.featured{ border-color:var(--op-blue); box-shadow:0 20px 40px rgba(26,115,232,.14); position:relative; }
.op-price-badge{ position:absolute; top:-13px; left:50%; transform:translateX(-50%); background:var(--op-blue); color:#fff; font-size:.7rem; font-weight:800; letter-spacing:.5px; text-transform:uppercase; padding:5px 14px; border-radius:20px; }
.op-price-tier{ font-size:.78rem; font-weight:800; letter-spacing:.8px; text-transform:uppercase; color:var(--op-muted); margin-bottom:10px; }
.op-price-amount{ font-family:'Nunito',sans-serif; font-weight:900; font-size:2rem; color:var(--op-text); margin-bottom:4px; }
.op-price-amount span{ font-size:.85rem; font-weight:700; color:var(--op-muted); }
.op-price-note{ color:var(--op-muted); font-size:.82rem; margin-bottom:20px; }
.op-price-list{ list-style:none; padding:0; margin:0 0 24px; display:grid; gap:10px; flex:1; }
.op-price-list li{ font-size:.86rem; color:var(--op-text); display:flex; gap:8px; align-items:flex-start; }
.op-price-list li i{ color:#0e9c8f; margin-top:3px; }
.op-price-cta{ text-align:center; padding:11px; border-radius:9px; font-weight:800; font-size:.88rem; text-decoration:none; border:1.5px solid var(--op-blue); color:var(--op-blue); transition:.2s; }
.op-price-cta:hover{ background:var(--op-blue); color:#fff; }
.op-price-card.featured .op-price-cta{ background:var(--op-blue); color:#fff; }
.op-price-card.featured .op-price-cta:hover{ background:#1558b0; }

/* ---------- FAQ ---------- */
.op-faq{ max-width:820px; margin:0 auto; }
.op-faq-item{ border-bottom:1px solid var(--op-border); padding:22px 0; }
.op-faq-q{ font-weight:800; font-size:1rem; color:var(--op-text); margin-bottom:8px; }
.op-faq-a{ color:var(--op-muted); font-size:.93rem; line-height:1.7; margin:0; }

/* ---------- final CTA ---------- */
.op-final-cta{ background:linear-gradient(135deg,var(--op-navy) 0%, var(--op-darker) 100%); color:#fff; text-align:center; padding:90px 0; }
.op-final-cta h2{ font-size:clamp(1.8rem,3.4vw,2.6rem); margin-bottom:16px; }
.op-final-cta p{ color:#c7d6f5; margin-bottom:30px; }
</style>

<div class="op-page">

  <nav class="op-crumb" aria-label="Breadcrumb">
    <div class="op-wrap">
      <a href="{{ url('/') }}">Home</a><span class="sep">/</span><span class="current">Orbit</span>
    </div>
  </nav>

  <!-- ================= HERO ================= -->
  <section class="op-hero">
    <div class="op-wrap op-hero-inner">
      <div>
        <div class="op-hero-eyebrow">Kawach Products &middot; Orbit</div>
        <h1>Capture, organize, and move work forward — together.</h1>
        <p class="op-hero-sub">Orbit is the board where tasks, comments, and updates sync in real time — so nothing gets lost in a chat thread or forgotten in someone's inbox.</p>
        <div class="op-hero-ctas">
          <a href="https://orbitzr.com" target="_blank" rel="noopener" class="op-btn op-btn-primary">
            Get Orbit free <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="#op-features" class="op-btn op-btn-ghost">See how it works</a>
        </div>
        <div class="op-hero-note">No credit card required &middot; Free forever plan</div>
      </div>
      <div class="op-mock-holder">
        @include('layouts.orbit-board-demo')
      </div>
    </div>
  </section>

  <!-- ================= STAT STRIP ================= -->
  <section class="op-stats">
    <div class="op-wrap op-stats-grid">
      <div class="op-stat">
        <div class="op-stat-num">&lt; 1 sec</div>
        <div class="op-stat-label">for a card move or comment to sync across your team</div>
      </div>
      <div class="op-stat">
        <div class="op-stat-num">10 boards</div>
        <div class="op-stat-label">included free, forever, on the Free plan</div>
      </div>
      <div class="op-stat">
        <div class="op-stat-num">$0</div>
        <div class="op-stat-label">to get started — no credit card required</div>
      </div>
    </div>
  </section>

  <!-- ================= WHAT'S INSIDE ================= -->
  <section class="op-section" id="op-features">
    <div class="op-wrap">
      <div class="op-section-head">
        <div class="op-eyebrow">What's Inside</div>
        <h2>Everything a team needs on one board</h2>
        <p>Orbit combines the essentials of task management with the details that keep a team out of extra tools.</p>
      </div>
      <div class="op-feature-grid">
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-table-columns"></i></div>
          <h3>Boards &amp; Cards</h3>
          <p>Drag-and-drop boards with lists and cards for any workflow.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-bolt"></i></div>
          <h3>Real-Time Sync</h3>
          <p>Card moves, comments, and edits appear on every screen in under a second.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-inbox"></i></div>
          <h3>Inbox</h3>
          <p>Capture new tasks instantly, then sort them onto a board when you're ready.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-calendar-days"></i></div>
          <h3>Calendar View</h3>
          <p>See every due date across all your boards in one place.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-list-check"></i></div>
          <h3>Checklists</h3>
          <p>Break cards into steps, with a visual progress bar for each one.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-comments"></i></div>
          <h3>Comments &amp; Reactions</h3>
          <p>Discuss work in context, with emoji reactions built right in.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-paperclip"></i></div>
          <h3>Attachments &amp; Covers</h3>
          <p>Attach files and set cover images directly on any card.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-gears"></i></div>
          <h3>Pilot Automation</h3>
          <p>Trigger-condition-action rules that take the busywork off your plate.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-table"></i></div>
          <h3>Google Sheets Power-Up</h3>
          <p>Connect boards straight to the spreadsheets your team already uses.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-share-nodes"></i></div>
          <h3>Public Sharing</h3>
          <p>Share a read-only board link that doesn't require a login to view.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-mobile-screen"></i></div>
          <h3>Mobile App &amp; Pulse Feed</h3>
          <p>Stay on top of your boards from anywhere, with a feed of recent activity.</p>
        </div>
        <div class="op-feature-card">
          <div class="op-feature-icon"><i class="fa-solid fa-filter"></i></div>
          <h3>Filters &amp; Activity Log</h3>
          <p>Filter by member, status, or label, backed by a full timestamped history.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= MEET PILOT ================= -->
  <section class="op-section op-pilot">
    <div class="op-wrap op-pilot-grid">
      <div>
        <div class="op-eyebrow" style="color:#7fe3da;">Automation</div>
        <h2>Meet Pilot</h2>
        <p>Pilot is Orbit's built-in automation engine. Set up trigger&ndash;condition&ndash;action rules once, and let Orbit handle the repetitive parts of your workflow automatically &mdash; no separate tool required.</p>
      </div>
      <div>
        <div class="op-pilot-examples-label">Example rules teams build with Pilot</div>
        <div class="op-pilot-examples">
          <div class="op-pilot-rule"><i class="fa-solid fa-circle-play"></i> When a card is moved to "Done," mark every checklist item complete.</div>
          <div class="op-pilot-rule"><i class="fa-solid fa-circle-play"></i> When a due date passes, add an "Overdue" label automatically.</div>
          <div class="op-pilot-rule"><i class="fa-solid fa-circle-play"></i> When a new card is added to "To Do," assign it to the next teammate in rotation.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= BUILT FOR EVERY TEAM ================= -->
  <section class="op-section op-section-alt">
    <div class="op-wrap">
      <div class="op-section-head">
        <div class="op-eyebrow">Built For Every Team</div>
        <h2>One board, every kind of work</h2>
      </div>
      <div class="op-audience-grid">
        <div class="op-audience-card">
          <div class="op-audience-icon"><i class="fa-solid fa-code"></i></div>
          <h3>Product &amp; Engineering</h3>
          <p>Ship features without losing track of bugs or context.</p>
        </div>
        <div class="op-audience-card">
          <div class="op-audience-icon"><i class="fa-solid fa-bullhorn"></i></div>
          <h3>Marketing &amp; Operations</h3>
          <p>Plan campaigns and manage requests from one board.</p>
        </div>
        <div class="op-audience-card">
          <div class="op-audience-icon"><i class="fa-solid fa-briefcase"></i></div>
          <h3>Agencies &amp; Client Work</h3>
          <p>Keep every client's work organized — and shareable when needed.</p>
        </div>
        <div class="op-audience-card">
          <div class="op-audience-icon"><i class="fa-solid fa-user"></i></div>
          <h3>Freelancers</h3>
          <p>Stay on top of every project, solo, on the free plan.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= TESTIMONIAL ================= -->
  <section class="op-section op-testimonial">
    <div class="op-wrap">
      <div class="op-testimonial-card">
        <p class="op-testimonial-quote">We closed four other tabs the week we switched. Everything that used to live in a spreadsheet now just lives on a board people actually open.</p>
        <div class="op-testimonial-name">Maya Kessler</div>
        <div class="op-testimonial-role">Head of Ops, Northwind Labs</div>
      </div>
    </div>
  </section>

  <!-- ================= PRICING ================= -->
  <section class="op-section">
    <div class="op-wrap">
      <div class="op-section-head">
        <div class="op-eyebrow">Pricing</div>
        <h2>Simple plans that grow with your team</h2>
        <p>Start free. Upgrade only when you need more from your boards.</p>
      </div>
      <div class="op-pricing-grid">
        <div class="op-price-card">
          <div class="op-price-tier">Free</div>
          <div class="op-price-amount">$0</div>
          <div class="op-price-note">forever, no credit card</div>
          <ul class="op-price-list">
            <li><i class="fa-solid fa-check"></i> Unlimited cards</li>
            <li><i class="fa-solid fa-check"></i> Up to 10 boards</li>
            <li><i class="fa-solid fa-check"></i> Inbox access</li>
            <li><i class="fa-solid fa-check"></i> Up to 10 teammates</li>
          </ul>
          <a href="https://orbitzr.com" target="_blank" rel="noopener" class="op-price-cta">Get started</a>
        </div>
        <div class="op-price-card">
          <div class="op-price-tier">Standard</div>
          <div class="op-price-amount">$4.50<span>/user/mo</span></div>
          <div class="op-price-note">billed annually</div>
          <ul class="op-price-list">
            <li><i class="fa-solid fa-check"></i> Everything in Free</li>
            <li><i class="fa-solid fa-check"></i> Unlimited boards</li>
            <li><i class="fa-solid fa-check"></i> Calendar view</li>
            <li><i class="fa-solid fa-check"></i> Custom fields &amp; filters</li>
          </ul>
          <a href="https://orbitzr.com" target="_blank" rel="noopener" class="op-price-cta">Get started</a>
        </div>
        <div class="op-price-card featured">
          <span class="op-price-badge">Most Popular</span>
          <div class="op-price-tier">Premium</div>
          <div class="op-price-amount">$10.50<span>/user/mo</span></div>
          <div class="op-price-note">billed annually</div>
          <ul class="op-price-list">
            <li><i class="fa-solid fa-check"></i> Everything in Standard</li>
            <li><i class="fa-solid fa-check"></i> Pilot automation</li>
            <li><i class="fa-solid fa-check"></i> Admin &amp; Participant roles</li>
            <li><i class="fa-solid fa-check"></i> Priority support</li>
          </ul>
          <a href="https://orbitzr.com" target="_blank" rel="noopener" class="op-price-cta">Get started</a>
        </div>
        <div class="op-price-card">
          <div class="op-price-tier">Enterprise</div>
          <div class="op-price-amount">Custom</div>
          <div class="op-price-note">for larger organizations</div>
          <ul class="op-price-list">
            <li><i class="fa-solid fa-check"></i> Everything in Premium</li>
            <li><i class="fa-solid fa-check"></i> Advanced admin controls</li>
            <li><i class="fa-solid fa-check"></i> Dedicated support</li>
          </ul>
          <a href="https://orbitzr.com" target="_blank" rel="noopener" class="op-price-cta">Contact sales</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= FAQ ================= -->
  <section class="op-section op-section-alt">
    <div class="op-wrap">
      <div class="op-section-head">
        <div class="op-eyebrow">Questions</div>
        <h2>Frequently asked questions</h2>
      </div>
      <div class="op-faq">
        <div class="op-faq-item">
          <div class="op-faq-q">Is Orbit free to use?</div>
          <p class="op-faq-a">Yes. The Free plan is $0 forever, with unlimited cards, up to 10 boards, and no credit card required to start.</p>
        </div>
        <div class="op-faq-item">
          <div class="op-faq-q">How fast does Orbit sync across a team?</div>
          <p class="op-faq-a">Card moves, comments, and edits typically appear on teammates' screens in under a second.</p>
        </div>
        <div class="op-faq-item">
          <div class="op-faq-q">What is Pilot?</div>
          <p class="op-faq-a">Pilot is Orbit's built-in automation engine. It lets you set up trigger-condition-action rules to automate repetitive steps in your workflow, without a separate tool.</p>
        </div>
        <div class="op-faq-item">
          <div class="op-faq-q">Can I share a board publicly?</div>
          <p class="op-faq-a">Yes. Boards can be shared as a read-only public link that doesn't require a login to view.</p>
        </div>
        <div class="op-faq-item">
          <div class="op-faq-q">What's the difference between Admin and Participant roles?</div>
          <p class="op-faq-a">Admins manage billing and invites and can see every board in the workspace. Participants only see the boards they've been added to.</p>
        </div>
        <div class="op-faq-item">
          <div class="op-faq-q">Does Orbit have a mobile app?</div>
          <p class="op-faq-a">Yes, including a Pulse Feed that surfaces recent activity across your boards.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= FINAL CTA ================= -->
  <section class="op-final-cta">
    <div class="op-wrap">
      <h2>Get started with Orbit today</h2>
      <p>Built by Kawach Technology. Free to start, no credit card required.</p>
      <a href="https://orbitzr.com" target="_blank" rel="noopener" class="op-btn op-btn-primary">
        Get Orbit free <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </section>

</div>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
