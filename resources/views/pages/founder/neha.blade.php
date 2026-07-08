<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Sraddha Gupta | Founder of Kawach Technology';
    $seoDescription = 'Sraddha Gupta is the Founder of Kawach Technology, a software development company specializing in scalable web, mobile, SaaS, AI, and healthcare solutions for startups and businesses worldwide.';
    $seoKeywords    = 'Sraddha Gupta, Kawach Technology founder, software company founder, SaaS development expert, AI software development, healthcare software solutions, startup software development';
    $seoCanonical   = url('/about/founder');
    $seoImage       = asset('assets/images/neha-kawach-technology-ceo.jpg');
    $seoType        = 'profile';
@endphp

@push('schema')
@php
    $personSchema = [
        "@context" => "https://schema.org",
        "@type" => "Person",
        "name" => "Sraddha Gupta",
        "jobTitle" => "Founder & CEO",
        "url" => $seoCanonical,
        "image" => $seoImage,
        "worksFor" => [
            "@type" => "Organization",
            "name" => "Kawach Technology",
            "url" => url('/'),
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($personSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
<body>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --blue: #0d6efd;
    --blue-dark: #0b5ed7;
    --blue-glow: rgba(13,110,253,0.18);
    --navy: #060e1e;
    --navy-2: #0b1629;
    --navy-3: #0f1f3d;
    --card-bg: #0e1b30;
    --card-border: rgba(255,255,255,0.07);
    --text-primary: #f0f4ff;
    --text-secondary: #8fa3c8;
    --text-muted: #5a6e8a;
    --accent-teal: #00d8b4;
    --accent-amber: #f5a623;
  }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'DM Sans', sans-serif;
    background-color: var(--navy);
    color: var(--text-primary);
    line-height: 1.65;
    overflow-x: hidden;
  }
  /* ─── HERO ─── */
  .hero {
    position: relative;
    padding: 7rem 2rem 5rem;
    text-align: center;
    overflow: hidden;
  }
  .hero-grid-bg {
    position: absolute; inset: 0;
    background-image:
      linear-gradient(rgba(13,110,253,0.05) 1px, transparent 1px),
      linear-gradient(90deg, rgba(13,110,253,0.05) 1px, transparent 1px);
    background-size: 50px 50px;
    mask-image: radial-gradient(ellipse 80% 60% at 50% 50%, black 30%, transparent 100%);
  }
  .hero-glow {
    position: absolute; top: -120px; left: 50%; transform: translateX(-50%);
    width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(13,110,253,0.14) 0%, transparent 70%);
    pointer-events: none;
  }
  .breadcrumb {
    display: inline-flex; align-items: center; gap: 0.5rem;
    font-size: 0.8rem; color: var(--text-muted);
    border: 1px solid var(--card-border);
    padding: 0.35rem 1rem; border-radius: 99px;
    margin-bottom: 2rem;
    position: relative;
  }
  .breadcrumb span { color: var(--blue); }
  .hero h1 {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: clamp(2.4rem, 5vw, 4rem);
    line-height: 1.1;
    letter-spacing: -0.02em;
    position: relative;
  }
  .hero h1 em { font-style: normal; color: var(--blue); }
  .hero p {
    max-width: 580px; margin: 1.5rem auto 0;
    color: var(--text-secondary); font-size: 1.05rem;
    position: relative;
  }

  /* ─── SECTION WRAPPER ─── */
  .section { padding: 2rem; max-width: 1140px; margin: 0 auto; }
  .section-label {
    display: inline-block;
    font-size: 0.75rem; font-weight: 500; letter-spacing: 0.12em;
    text-transform: uppercase; color: var(--blue);
    background: rgba(13,110,253,0.12);
    border: 1px solid rgba(13,110,253,0.25);
    padding: 0.35rem 1rem; border-radius: 99px;
    margin-bottom: 1rem;
  }
  .section-title {
    font-family: 'Syne', sans-serif;
    font-size: clamp(1.8rem, 3.5vw, 2.5rem);
    font-weight: 700; line-height: 1.2; letter-spacing: -0.02em;
    margin-bottom: 0.6rem;
  }
  .section-title em { font-style: normal; color: var(--blue); }
  .section-sub { color: var(--text-secondary); max-width: 520px; margin-bottom: 3rem; }

  /* ─── FOUNDER PROFILE ─── */
  .founder-layout {
    display: grid; grid-template-columns: 380px 1fr; gap: 4rem; align-items: start;
  }
  .founder-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 16px; overflow: hidden;
    position: sticky; top: 90px;
  }
  .founder-image-wrap {
    position: relative; background: linear-gradient(135deg, #0b1d40 0%, #0d2a5e 100%);
    display: flex; justify-content: center;
  }
  .founder-avatar {
    width: 140px; height: 140px; border-radius: 50%;
    border: 3px solid rgba(13,110,253,0.5);
    background: linear-gradient(135deg, #1a3a7a 0%, #0d6efd 100%);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Syne', sans-serif; font-size: 3rem; font-weight: 700;
    color: #fff; flex-shrink: 0;
    box-shadow: 0 0 40px rgba(13,110,253,0.3);
  }
  .founder-badge {
    position: absolute; bottom: 10px; right: 20px;
    background: var(--blue); color: #fff;
    font-size: 0.7rem; font-weight: 600; letter-spacing: 0.08em;
    padding: 0.3rem 0.75rem; border-radius: 99px;
  }
  .founder-info { padding: 1.5rem; }
  .founder-info h3 {
    font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.4rem;
    margin-bottom: 0.2rem;
  }
  .founder-info .role { color: var(--blue); font-size: 0.88rem; font-weight: 500; margin-bottom: 1rem; }
  .stat-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1.25rem; }
  .stat-cell {
    background: rgba(255,255,255,0.04);
    border: 1px solid var(--card-border);
    border-radius: 10px; padding: 0.75rem 1rem;
  }
  .stat-cell .val {
    font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.4rem; color: var(--blue);
  }
  .stat-cell .key { font-size: 0.75rem; color: var(--text-muted); margin-top: 0.1rem; }
  .social-row { display: flex; gap: 0.6rem; }
  .social-btn {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 0.4rem;
    background: rgba(255,255,255,0.04);
    border: 1px solid var(--card-border);
    border-radius: 8px; padding: 0.6rem;
    color: var(--text-secondary); font-size: 0.8rem; font-weight: 500;
    text-decoration: none; transition: all 0.2s; cursor: pointer;
  }
  .social-btn:hover { border-color: var(--blue); color: var(--blue); background: var(--blue-glow); }
  .social-btn svg { width: 16px; height: 16px; flex-shrink: 0; }

  /* ─── FOUNDER CONTENT ─── */
  .founder-content {}
  .founder-content h2 {
    font-family: 'Syne', sans-serif; font-size: 1.9rem; font-weight: 700;
    letter-spacing: -0.02em; margin-bottom: 1rem;
  }
  .founder-content h2 em { font-style: normal; color: var(--blue); }
  .founder-content p { color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.97rem; }

  .quote-block {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-left: 3px solid var(--blue);
    border-radius: 0 12px 12px 0;
    padding: 1.25rem 1.5rem; margin: 1.5rem 0;
  }
  .quote-block p { color: var(--text-primary); font-size: 1rem; font-style: italic; margin: 0; }

  .expertise-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin: 1.5rem 0; }
  .expertise-chip {
    display: flex; align-items: center; gap: 0.6rem;
    background: var(--card-bg); border: 1px solid var(--card-border);
    border-radius: 10px; padding: 0.7rem 1rem; font-size: 0.88rem; color: var(--text-secondary);
  }
  .expertise-chip .dot {
    width: 7px; height: 7px; border-radius: 50%; background: var(--blue); flex-shrink: 0;
  }

  .timeline { position: relative; margin-top: 2rem; }
  .timeline::before {
    content: ''; position: absolute; left: 16px; top: 0; bottom: 0;
    width: 1px; background: var(--card-border);
  }
  .tl-item { display: flex; gap: 1.25rem; margin-bottom: 1.75rem; position: relative; }
  .tl-dot {
    width: 33px; height: 33px; border-radius: 50%; flex-shrink: 0;
    background: var(--card-bg); border: 2px solid var(--blue);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.72rem; font-weight: 700; color: var(--blue); z-index: 1;
    font-family: 'Syne', sans-serif;
  }
  .tl-text h4 { font-family: 'Syne', sans-serif; font-size: 0.95rem; font-weight: 600; margin-bottom: 0.2rem; }
  .tl-text p { font-size: 0.84rem; color: var(--text-muted); margin: 0; }

  /* ─── CO-FOUNDER ─── */
  .cofounder-section { background: var(--navy-2); border-top: 1px solid var(--card-border); border-bottom: 1px solid var(--card-border); }
  .cofounder-layout {
    display: grid; grid-template-columns: 1fr 340px; gap: 4rem; align-items: start;
  }
  .cofounder-content h2 { font-family: 'Syne', sans-serif; font-size: 1.9rem; font-weight: 700; letter-spacing: -0.02em; margin-bottom: 1rem; }
  .cofounder-content h2 em { font-style: normal; color: var(--accent-teal); }
  .cofounder-content p { color: var(--text-secondary); font-size: 0.97rem; margin-bottom: 1rem; }

  .cofounder-card {
    background: var(--card-bg); border: 1px solid var(--card-border);
    border-radius: 16px; overflow: hidden; position: sticky; top: 90px;
  }
  .cofounder-image-wrap {
    background: linear-gradient(135deg, #06201a 0%, #0d3d30 100%);
    padding: 2.5rem 2rem 0; display: flex; justify-content: center; position: relative;
  }
  .cofounder-avatar {
    width: 140px; height: 140px; border-radius: 50%;
    border: 3px solid rgba(0,216,180,0.4);
    background: linear-gradient(135deg, #0d3d30 0%, #00d8b4 100%);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Syne', sans-serif; font-size: 3rem; font-weight: 700;
    color: #fff; box-shadow: 0 0 40px rgba(0,216,180,0.2);
  }
  .cofounder-badge {
    position: absolute; bottom: 10px; right: 20px;
    background: var(--accent-teal); color: #06201a;
    font-size: 0.7rem; font-weight: 700; letter-spacing: 0.08em;
    padding: 0.3rem 0.75rem; border-radius: 99px;
  }
  .cofounder-info { padding: 1.5rem; }
  .cofounder-info h3 { font-family: 'Syne', sans-serif; font-weight: 700; font-size: 1.4rem; margin-bottom: 0.2rem; }
  .cofounder-info .role { color: var(--accent-teal); font-size: 0.88rem; font-weight: 500; margin-bottom: 1rem; }

  .tech-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; margin: 1rem 0; }
  .tech-tag {
    font-size: 0.78rem; padding: 0.3rem 0.75rem; border-radius: 6px;
    background: rgba(0,216,180,0.08); border: 1px solid rgba(0,216,180,0.2);
    color: var(--accent-teal); font-weight: 500;
  }

  /* ─── BLOG / AUTHOR ─── */
  .blog-section-page {
    background: var(--bg-light);
  }
  .articles-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.25rem; }
  .article-card {
    background: var(--card-bg); border: 1px solid var(--card-border);
    border-radius: 14px; overflow: hidden;
    transition: border-color 0.25s, transform 0.25s;
    cursor: pointer;
  }
  .article-card:hover { border-color: rgba(13,110,253,0.4); transform: translateY(-3px); }
  .article-thumb {
    height: 140px; display: flex; align-items: center; justify-content: center;
    font-size: 2.5rem;
    position: relative; overflow: hidden;
  }
  .article-thumb.blue { background: linear-gradient(135deg, #0b1d40, #1a3a7a); }
  .article-thumb.teal { background: linear-gradient(135deg, #06201a, #0d3d30); }
  .article-thumb.amber { background: linear-gradient(135deg, #221500, #3d2600); }
  .article-body { padding: 1.25rem; }
  .article-tag {
    font-size: 0.72rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase;
    color: var(--blue); margin-bottom: 0.6rem; display: block;
  }
  .article-tag.teal { color: var(--accent-teal); }
  .article-tag.amber { color: var(--accent-amber); }
  .article-body h4 { font-family: 'Syne', sans-serif; font-size: 1.05rem; font-weight: 600; margin-bottom: 0.5rem; line-height: 1.35; }
  .article-body p { font-size: 0.84rem; color: var(--text-muted); margin-bottom: 1rem; }
  .article-meta { display: flex; align-items: center; justify-content: space-between; }
  .article-meta .author { font-size: 0.78rem; color: var(--text-secondary); }
  .read-link {
    font-size: 0.78rem; font-weight: 500; color: var(--blue); text-decoration: none;
    display: flex; align-items: center; gap: 0.3rem;
  }
  .read-link:hover { text-decoration: underline; }

  /* ─── CTA STRIP ─── */
  .cta-strip {
    background: linear-gradient(135deg, var(--navy-3) 0%, #0d2060 100%);
    border: 1px solid rgba(13,110,253,0.2);
    border-radius: 20px; padding: 3.5rem 3rem;
    text-align: center; margin: 0 2rem 5rem; max-width: 1100px; margin: 0 auto 5rem;
    position: relative; overflow: hidden;
  }
  .cta-strip::before {
    content: ''; position: absolute; top: -80px; left: 50%; transform: translateX(-50%);
    width: 400px; height: 300px;
    background: radial-gradient(circle, rgba(13,110,253,0.15) 0%, transparent 70%);
  }
  .cta-strip h2 {
    font-family: 'Syne', sans-serif; font-size: 2rem; font-weight: 700;
    letter-spacing: -0.02em; margin-bottom: 0.75rem; position: relative;
  }
  .cta-strip p { color: var(--text-secondary); max-width: 480px; margin: 0 auto 2rem; position: relative; }
  .btn-row { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; position: relative; }
  .btn-primary {
    background: var(--blue); color: #fff; border: none;
    padding: 0.75rem 1.75rem; border-radius: 8px;
    font-family: 'DM Sans', sans-serif; font-size: 0.9rem; font-weight: 500;
    cursor: pointer; transition: background 0.2s;
  }
  .btn-primary:hover { background: var(--blue-dark); }
  .btn-ghost {
    background: transparent; color: var(--text-primary);
    border: 1px solid var(--card-border);
    padding: 0.75rem 1.75rem; border-radius: 8px;
    font-family: 'DM Sans', sans-serif; font-size: 0.9rem; font-weight: 500;
    cursor: pointer; transition: border-color 0.2s, background 0.2s;
  }
  .btn-ghost:hover { border-color: rgba(255,255,255,0.3); background: rgba(255,255,255,0.04); }

  /* ─── FOOTER ─── */
  footer {
    background: var(--navy-2);
    border-top: 1px solid var(--card-border);
    padding: 2rem;
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;
  }
  footer .logo { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 1rem; color: var(--text-primary); }
  footer .logo span { color: var(--blue); }
  footer p { font-size: 0.82rem; color: var(--text-muted); }
  footer a { color: var(--text-muted); text-decoration: none; font-size: 0.82rem; }
  footer a:hover { color: var(--text-secondary); }

  /* ─── ANIMATION ─── */
  @keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
  .fade-up { animation: fadeUp 0.65s ease both; }
  .delay-1 { animation-delay: 0.1s; }
  .delay-2 { animation-delay: 0.2s; }
  .delay-3 { animation-delay: 0.35s; }

  @media (max-width: 820px) {
    .founder-layout, .cofounder-layout { grid-template-columns: 1fr; }
    .cofounder-layout { direction: ltr; }
    .founder-card, .cofounder-card { position: static; }
    nav .nav-links, nav .nav-cta { display: none; }
  }
</style>

<body>

<!-- NAVBAR -->
@include('layouts.navbar')

<!-- HERO -->
<section class="hero">
  <div class="hero-grid-bg"></div>
  <div class="hero-glow"></div>
  <div class="breadcrumb fade-up">About Us &rsaquo; <span>Founders & Authors</span></div>
  <h1 class="fade-up delay-1">The Minds <em>Behind</em><br>Kawach Technology</h1>
  <p class="fade-up delay-2">Meet the visionaries who built KawachTech from a three-person startup into a global software powerhouse — and continue to shape the future of technology through thought leadership.</p>
</section>

<!-- ─── FOUNDER: ARJUN KAPOOR ─── -->
<div class="section">
  <div class="founder-layout">

    <!-- STICKY CARD -->
    <aside class="founder-card fade-up">
      <div class="founder-image-wrap">
        <img src="{{ config('app.images_path') . 'assets/images/neha-kawach-technology-ceo.jpg' }}" alt="CEO of Kawach Technology pvt ltd" title="Sraddha Gupta Ceo of Kawach Technology">
        <span class="founder-badge">CEO &amp; Co-Founder</span> 
      </div>
      <div class="founder-info">
        <h3>Sraddha Gupta</h3>
        <p class="role">Chief Executive Officer &amp; Co-Founder</p>
        <div class="stat-grid">
          <div class="stat-cell"><div class="val">10+</div><div class="key">Years at KawachTech</div></div>
          <div class="stat-cell"><div class="val">150+</div><div class="key">Projects Shipped</div></div>
          {{-- <div class="stat-cell"><div class="val">20+</div><div class="key">Countries Served</div></div>
          <div class="stat-cell"><div class="val">$50M+</div><div class="key">Client Revenue</div></div> --}}
        </div>
        <div class="social-row">
          <a class="social-btn" href="{{ config('app.neha_linkedin') }}" target="_blank">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            LinkedIn
          </a>
        </div>
      </div>
    </aside>

    <!-- CONTENT -->
    <article class="founder-content fade-up delay-1">
      <div class="section-label">Founder</div>
      <h2>Building the Future,<br><em>One Line at a Time</em></h2>

      <p>
        Sraddha Gupta is the Founder and CEO of Kawach Technology, a growing software development company focused on building scalable, affordable, and modern digital solutions for startups, enterprises, and healthcare businesses.

        With a strong passion for technology and business innovation, she leads Kawach Technology with a client-first approach, helping companies transform ideas into reliable web, mobile, SaaS, and AI-powered applications.
        </p>

        <div class="quote-block">
        <p>"Your Vision, Our Code."</p>
        </div>

        <p>
        Under her leadership, Kawach Technology has successfully delivered custom software solutions across multiple industries including healthcare, SaaS, logistics, education, and enterprise automation.

        She actively focuses on creating engineering-driven solutions that prioritize scalability, clean architecture, user experience, and long-term business growth.
        </p>

        <p>
        Beyond managing projects and business strategy, Sraddha also contributes to the company's content and technology vision by sharing insights on software architecture, startup product development, AI integrations, and digital transformation strategies.
        </p>
      <h3 style="font-family:'Syne',sans-serif; font-size:1.1rem; font-weight:600; margin:1.75rem 0 0.75rem;">Areas of Expertise</h3>
      <div class="expertise-grid">
        <div class="expertise-chip"><span class="dot"></span>Software Product Strategy</div>
        <div class="expertise-chip"><span class="dot"></span>SaaS & Startup Development</div>
        <div class="expertise-chip"><span class="dot"></span>Healthcare Software Solutions</div>
        <div class="expertise-chip"><span class="dot"></span>AI & Digital Transformation</div>
        <div class="expertise-chip"><span class="dot"></span>Client-Centric Development</div>
        <div class="expertise-chip"><span class="dot"></span>Agile Project Leadership</div>
      </div>

      <h3 style="font-family:'Syne',sans-serif; font-size:1.1rem; font-weight:600; margin:1.75rem 0 0.75rem;">Journey &amp; Milestones</h3>
      <div class="timeline">

        <div class="tl-item">
            <div class="tl-dot">21</div>
            <div class="tl-text">
            <h4>The Beginning of Kawach Technology</h4>
            <p>Started Kawach Technology with a vision to provide affordable and scalable software solutions for startups and growing businesses.</p>
            </div>
        </div>

        <div class="tl-item">
            <div class="tl-dot">22</div>
            <div class="tl-text">
            <h4>First International Projects</h4>
            <p>Successfully delivered custom web and mobile applications for international clients across multiple industries.</p>
            </div>
        </div>

        <div class="tl-item">
            <div class="tl-dot">23</div>
            <div class="tl-text">
            <h4>Expansion into SaaS & Healthcare Solutions</h4>
            <p>Focused on scalable SaaS platforms, healthcare systems, and enterprise application development.</p>
            </div>
        </div>

        <div class="tl-item">
            <div class="tl-dot">24</div>
            <div class="tl-text">
            <h4>Building Engineering-Focused Growth</h4>
            <p>Strengthened Kawach Technology's expertise in AI integrations, cloud solutions, and modern software architecture.</p>
            </div>
        </div>

        </div>
    </article>

  </div>
</div>


<!-- ─── FEATURED ARTICLES ─── -->
<section class="blog-section-page">
    <div class="section blog-section">
    <div class="section-label">Thought Leadership</div>
    <div class="section-title">Featured <em>Articles</em> &amp; Guides</div>
    <p class="section-sub">Insights, architecture deep-dives, and strategic frameworks published by Arjun and Sofia.</p>

    <div class="articles-grid">

        <div class="article-card">
        <div class="article-thumb blue">🏗️</div>
        <div class="article-body">
            <span class="article-tag">Architecture</span>
            <h4>Designing Multi-Tenant SaaS Platforms That Scale to a Million Users</h4>
            <p>A practical walkthrough of the data isolation models, caching strategies, and deployment patterns we've refined across 50+ SaaS projects.</p>
            <div class="article-meta">
            <span class="author">Arjun Kapoor · 12 min read</span>
            <a class="read-link" href="https://kawachtech.com/blog">Read →</a>
            </div>
        </div>
        </div>

        <div class="article-card">
        <div class="article-thumb teal">☁️</div>
        <div class="article-body">
            <span class="article-tag teal">Cloud & DevOps</span>
            <h4>Kubernetes Cost Optimisation: Cut Your Cloud Bill by 40% Without Sacrificing Reliability</h4>
            <p>Real techniques from Sofia's cloud infrastructure work — right-sizing, spot instances, autoscaling policies, and more.</p>
            <div class="article-meta">
            <span class="author">Sofia Russo · 9 min read</span>
            <a class="read-link" href="https://kawachtech.com/blog">Read →</a>
            </div>
        </div>
        </div>

        <div class="article-card">
        <div class="article-thumb amber">🤖</div>
        <div class="article-body">
            <span class="article-tag amber">AI & ML</span>
            <h4>Integrating LLMs Into Production Apps Without Losing Your Mind (or Your Budget)</h4>
            <p>A framework for evaluating, integrating, and monitoring large language models in customer-facing products — from prototype to production.</p>
            <div class="article-meta">
            <span class="author">Sofia Russo · 15 min read</span>
            <a class="read-link" href="https://kawachtech.com/blog">Read →</a>
            </div>
        </div>
        </div>

        <div class="article-card">
        <div class="article-thumb blue">🚀</div>
        <div class="article-body">
            <span class="article-tag">Strategy</span>
            <h4>From Idea to MVP in 8 Weeks: The KawachTech Sprint Framework</h4>
            <p>How we structure discovery, design, and delivery sprints to ship working software in weeks — not months — without cutting corners.</p>
            <div class="article-meta">
            <span class="author">Arjun Kapoor · 8 min read</span>
            <a class="read-link" href="https://kawachtech.com/blog">Read →</a>
            </div>
        </div>
        </div>

        <div class="article-card">
        <div class="article-thumb teal">🔐</div>
        <div class="article-body">
            <span class="article-tag teal">Security</span>
            <h4>Security-First Development: Why We Bake It In, Not Bolt It On</h4>
            <p>Our philosophy and checklist for embedding security into every phase of the SDLC — from design reviews to automated scanning in CI/CD.</p>
            <div class="article-meta">
            <span class="author">Sofia Russo · 11 min read</span>
            <a class="read-link" href="https://kawachtech.com/blog">Read →</a>
            </div>
        </div>
        </div>

        <div class="article-card">
        <div class="article-thumb amber">📈</div>
        <div class="article-body">
            <span class="article-tag amber">Growth</span>
            <h4>How to Scale a Remote Engineering Team Across 8 Time Zones</h4>
            <p>Lessons from a decade of distributed team-building — async culture, sprint rituals, code quality standards, and the tools that tie it all together.</p>
            <div class="article-meta">
            <span class="author">Arjun Kapoor · 10 min read</span>
            <a class="read-link" href="https://kawachtech.com/blog">Read →</a>
            </div>
        </div>
        </div>

    </div>
    </div>
</section>

<!-- ─── CTA ─── -->
<div style="padding: 3rem 2rem 3rem;">
  <div class="cta-strip">
    <h2>Ready to Build Something Extraordinary?</h2>
    <p>Speak directly with Arjun or Sofia about your project — we offer free 30-minute consultations with no obligation.</p>
    <div class="btn-row">
      <button class="btn-primary">Book a Free Consultation</button>
      <a href="{{ route('blog') }}"><button class="btn-ghost">Read the Blog</button></a>
    </div>
  </div>
</div>

<!-- FOOTER -->
@include('layouts.footer')


</body>
</html>