<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">
<head>
  {{-- ══════════════════  PRIMARY META TAGS  ════════════════ --}}
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  {{-- Title --}}
  <title>{{ $seoTitle ?? $seoTitle }} | Kawach Technology</title>
  {{-- Core SEO --}}
  <meta name="description" content="{{ $service->meta_description ?? $service->short_description }}"/>
  <meta name="keywords"    content="{{ $service->meta_keywords ?? $service->title . ', Kawach Technology, software development' }}"/>
  <meta name="author"      content="Kawach Technology"/>
  <meta name="robots"      content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
  <link rel="canonical"    href="{{ url('/services/' . $service->slug) }}"/>
  {{-- ── Open Graph (Facebook / LinkedIn) ──────────────────── --}}
  <meta property="og:type"        content="website"/>
  <meta property="og:site_name"   content="Kawach Technology"/>
  <meta property="og:locale"      content="en_US"/>
  <meta property="og:url"         content="{{ url('/services/' . $service->slug) }}"/>
  <meta property="og:title"       content="{{ $service->meta_title ?? $service->title }} | Kawach Technology"/>
  <meta property="og:description" content="{{ $service->meta_description ?? $service->short_description }}"/>
  <meta property="og:image"       content="{{ asset('images/og-default.jpg') }}"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:image:alt"    content="{{ $service->title }} - Kawach Technology"/>
  {{-- ── Twitter Card ─────────────────────────────────────── --}}
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@kawachtech"/>
  <meta name="twitter:creator"     content="@kawachtech"/>
  <meta name="twitter:title"       content="{{ $service->meta_title ?? $service->title }} | Kawach Technology"/>
  <meta name="twitter:description" content="{{ $service->meta_description ?? $service->short_description }}"/>
  <meta name="twitter:image"       content="{{ asset('images/og-default.jpg') }}"/>
  <meta name="twitter:image:alt"   content="{{ $service->title }} - Kawach Technology"/>
  @verbatim
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Service",
        "@id": "{{ url('/services/' . $service->slug) }}#service",
        "name": "{{ $service->title }}",
        "description": "{{ $service->meta_description ?? $service->short_description }}",
        "url": "{{ url('/services/' . $service->slug) }}",
        "image": "{{ config('app.images_path') . $service->featured_image }}",
        "provider": {
          "@type": "Organization",
          "@id": "{{ url('/') }}#organization",
          "name": "Kawach Technology",
          "url": "{{ url('/') }}",
          "logo": "{{ asset('images/logo.png') }}",
          "sameAs": [
            "https://linkedin.com/company/kawachtech",
            "https://twitter.com/kawachtech"
          ]
        },
        "areaServed": "Worldwide",
        "serviceType": "{{ $service->title }}",
        "offers": {
          "@type": "Offer",
          "availability": "https://schema.org/InStock",
          "priceCurrency": "USD",
          "seller": {
            "@type": "Organization",
            "name": "Kawach Technology"
          }
        }
      },
      {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Services",
            "item": "{{ url('/services') }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $service->title }}",
            "item": "{{ url('/services/' . $service->slug) }}"
          }
        ]
      },
      {
        "@type": "FAQPage",
        "mainEntity": [
          @if(isset($service->service->faqs) && $service->service->faqs->count())
            @foreach($service->service->faqs as $i => $faq)
            {
              "@type": "Question",
              "name": "{{ $faq->question }}",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $faq->answer }}"
              }
            }{{ !$loop->last ? ',' : '' }}
            @endforeach
          @else
            {
              "@type": "Question",
              "name": "Why choose Kawach Technology for {{ $service->title }}?",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "Kawach Technology delivers expert {{ $service->title }} services backed by years of experience, a skilled team, and a commitment to quality and on-time delivery."
              }
            }
          @endif
        ]
      }
    ]
  }
  </script>
  @endverbatim
  @include('layouts.head')
  <style>
        :root {
        --primary-blue: #1a73e8;
        --dark-navy:    #0d1b3e;
        --mid-navy:     #162447;
        --light-navy:   #1f3a6e;
        --accent-blue:  #2196f3;
        --text-dark:    #1a1a2e;
        --text-muted:   #6c757d;
        --bg-light:     #f4f6fb;
        --white:        #ffffff;
        --border-light: #e2e8f0;
        --success:      #4caf50;
        }
        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Open Sans',sans-serif; color:var(--text-dark); background:var(--bg-light); overflow-x:hidden; }
        
        /* ── HERO ──────────────────────────────────────────────────── */
        .svc-detail-hero {
        background: linear-gradient(135deg, var(--dark-navy) 0%, var(--light-navy) 60%, #1e4a8f 100%);
        padding: 72px 0 60px;
        position: relative;
        overflow: hidden;
        }
        /* Grid overlay */
        .svc-detail-hero::before {
        content: ''; position: absolute; inset: 0;
        background-image:
            linear-gradient(rgba(33,150,243,.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(33,150,243,.06) 1px, transparent 1px);
        background-size: 52px 52px;
        pointer-events: none;
        animation: gridDrift 20s linear infinite;
        }
        @keyframes gridDrift { 0%{background-position:0 0} 100%{background-position:52px 52px} }
        /* Radial glow */
        .svc-detail-hero::after {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at 70% 50%, rgba(33,150,243,.15) 0%, transparent 60%);
        pointer-events: none;
        }
        .hero-content {
            position: relative; 
            z-index: 2; 
        }

        /* Eyebrow breadcrumb style */
        .hero-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(33,150,243,.15); border: 1px solid rgba(33,150,243,.3);
        border-radius: 20px; padding: 5px 16px;
        font-size: 0.75rem; font-weight: 700; color: #7ec8f7;
        letter-spacing: 1px; text-transform: uppercase;
        margin-bottom: 18px; text-decoration: none;
        }
        .hero-eyebrow:hover { background: rgba(33,150,243,.25); color: #7ec8f7; }
        .hero-eyebrow i { font-size: 0.6rem; }

        .svc-hero-title {
        font-family: 'Nunito', sans-serif; font-weight: 900;
        font-size: clamp(2rem, 4vw, 3rem);
        color: #fff; line-height: 1.15; margin-bottom: 16px;
        }
        .svc-hero-title span { color: var(--accent-blue); }

        .svc-hero-desc {
        color: #b8d4f0; font-size: 1.02rem; line-height: 1.75;
        max-width: 540px; margin-bottom: 32px;
        }

        /* CTA group */
        .hero-cta-group { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-hero-primary {
        background: var(--primary-blue); color: #fff; border: none;
        border-radius: 8px; padding: 13px 28px; font-weight: 700;
        font-size: 0.95rem; cursor: pointer; transition: background .2s, transform .15s;
        display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-hero-primary:hover { background: #1558b0; transform: translateY(-1px); }
        .btn-hero-outline {
        background: transparent; color: #fff;
        border: 2px solid rgba(255,255,255,.35);
        border-radius: 8px; padding: 12px 28px; font-weight: 700;
        font-size: 0.95rem; cursor: pointer; text-decoration: none;
        display: inline-flex; align-items: center; gap: 8px;
        transition: all .2s;
        }
        .btn-hero-outline:hover { background: #fff; color: var(--dark-navy); border-color: #fff; }

        /* Hero stat chips */
        .hero-stat-chips { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 32px; }
        .hero-chip {
        background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.13);
        border-radius: 10px; padding: 10px 16px;
        display: flex; align-items: center; gap: 10px;
        }
        .hero-chip-icon { 
            width: 34px; 
            height: 34px; 
            background: rgba(33,150,243,.2); 
            border-radius: 8px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            flex-shrink: 0; 
        }
        .hero-chip-icon i { 
            color: var(--accent-blue); 
            font-size: 0.88rem; 
        }
        .hero-chip-val   { 
            font-family: 'Nunito', sans-serif; 
            font-weight: 900; 
            font-size: 1rem; 
            color: #fff; 
            line-height: 1; 
        }
        .hero-chip-label { 
            font-size: 0.68rem; 
            color: #8bacc8; 
            margin-top: 2px; 
        }

        /* Hero right — service image card */
        .hero-img-card {
            background: rgba(255,255,255,.06); 
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 16px; 
            overflow: hidden; 
            backdrop-filter: blur(8px);
            position: relative;
        }
        .hero-img-card img { 
            width: 100%; 
            height: 280px; 
            object-fit: cover; 
            display: block; 
        }
        .hero-img-overlay {
            position: absolute; 
            bottom: 0; 
            left: 0; 
            right: 0;
            background: linear-gradient(transparent, rgba(13,27,62,.85));
            padding: 20px 20px 16px;
        }
        .hero-img-tag {
        display: inline-flex; align-items: center; gap: 6px;
        background: var(--primary-blue); color: #fff;
        border-radius: 6px; padding: 4px 12px;
        font-size: 0.72rem; font-weight: 700;
        }
        /* Floating cards on hero image */
        .hero-float-1 {
        position: absolute; top: 16px; right: 16px;
        background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.2);
        backdrop-filter: blur(8px); border-radius: 10px;
        padding: 8px 14px; display: flex; align-items: center; gap: 8px;
        color: #fff; font-size: 0.75rem; font-weight: 600;
        }
        .hero-float-dot { width: 7px; height: 7px; background: var(--success); border-radius: 50%; animation: hdpulse 2s infinite; }
        @keyframes hdpulse { 0%,100%{opacity:1} 50%{opacity:.3} }

        /* ── BREADCRUMB ────────────────────────────────────────────── */
        .breadcrumb-wrap { background: #fff; border-bottom: 1px solid var(--border-light); padding: 10px 0; }
        .breadcrumb { margin: 0; }
        .breadcrumb-item a { color: var(--primary-blue); text-decoration: none; font-size: 0.82rem; font-weight: 600; }
        .breadcrumb-item.active { font-size: 0.82rem; color: var(--text-muted); }
        .breadcrumb-item+.breadcrumb-item::before { color: var(--text-muted); }

        /* ── MAIN CONTENT ──────────────────────────────────────────── */
        .svc-main { padding: 60px 0 80px; }

        /* Sticky sidebar */
        .svc-sidebar { position: sticky; top: 24px; }

        /* ── SECTION LABEL ─────────────────────────────────────────── */
        .section-label {
        display: inline-flex; align-items: center; gap: 8px;
        background: #e8f1fd; border-radius: 20px;
        padding: 4px 14px; font-size: 0.73rem; font-weight: 700;
        color: var(--primary-blue); text-transform: uppercase;
        letter-spacing: .8px; margin-bottom: 14px;
        }

        /* ── OVERVIEW CARD ─────────────────────────────────────────── */
        .content-card {
        background: #fff; border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,.07);
        padding: 36px 38px; margin-bottom: 24px;
        transition: box-shadow .2s;
        }
        .content-card:hover { box-shadow: 0 8px 36px rgba(0,0,0,.1); }
        .content-card-title {
        font-family: 'Nunito', sans-serif; font-weight: 900; font-size: 1.5rem;
        color: var(--text-dark); margin-bottom: 16px;
        padding-bottom: 14px; border-bottom: 2px solid var(--border-light);
        display: flex; align-items: center; gap: 12px;
        }
        .content-card-title i { color: var(--primary-blue); font-size: 1.2rem; }
        .content-body { font-size: 0.92rem; color: #444; line-height: 1.85; }
        .content-body p { margin-bottom: 14px; }
        .content-body p:last-child { margin-bottom: 0; }
        .content-body h3 { font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 1.1rem; color: var(--text-dark); margin: 20px 0 8px; }
        .content-body ul { padding-left: 20px; }
        .content-body ul li { margin-bottom: 8px; }
        .content-body strong { color: var(--text-dark); }

        /* ── FEATURES GRID ─────────────────────────────────────────── */
        .features-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
        @media(max-width: 576px) { .features-grid { grid-template-columns: 1fr; } }
        .feature-item {
        background: var(--bg-light); border-radius: 12px;
        padding: 18px 20px; display: flex; align-items: flex-start; gap: 14px;
        border: 1px solid var(--border-light);
        transition: border-color .2s, transform .2s;
        }
        .feature-item:hover { border-color: var(--primary-blue); transform: translateY(-2px); }
        .feature-item-icon {
        width: 40px; height: 40px; border-radius: 10px;
        background: linear-gradient(135deg, #e8f1fd, #dbeafe);
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .feature-item-icon i { color: var(--primary-blue); font-size: 1rem; }
        .feature-item-title { font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 0.9rem; color: var(--text-dark); margin-bottom: 3px; }
        .feature-item-desc  { font-size: 0.78rem; color: var(--text-muted); line-height: 1.5; }

        /* ── PROCESS STEPS ─────────────────────────────────────────── */
        .process-steps { display: flex; flex-direction: column; gap: 0; }
        .process-step {
        display: flex; gap: 20px; align-items: flex-start;
        padding: 20px 0; position: relative;
        }
        .process-step::after {
        content: ''; position: absolute;
        left: 19px; top: 54px; bottom: -20px; width: 2px;
        background: linear-gradient(var(--border-light), transparent);
        }
        .process-step:last-child::after { display: none; }
        .process-step-num {
        width: 40px; height: 40px; border-radius: 50%; flex-shrink: 0;
        background: linear-gradient(135deg, var(--dark-navy), var(--light-navy));
        border: 2px solid rgba(33,150,243,.3);
        display: flex; align-items: center; justify-content: center;
        font-family: 'Nunito', sans-serif; font-weight: 900;
        font-size: 0.9rem; color: var(--accent-blue);
        }
        .process-step-title { font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 0.95rem; color: var(--text-dark); margin-bottom: 4px; }
        .process-step-desc  { font-size: 0.82rem; color: var(--text-muted); line-height: 1.6; }

        /* ── TECH STACK PILLS ──────────────────────────────────────── */
        .tech-pills { display: flex; flex-wrap: wrap; gap: 8px; }
        .tech-pill {
        padding: 6px 16px; border: 1.5px solid var(--border-light);
        border-radius: 20px; font-size: 0.78rem; font-weight: 700;
        color: var(--text-muted); background: var(--bg-light);
        transition: all .2s; cursor: default;
        display: flex; align-items: center; gap: 6px;
        }
        .tech-pill:hover { border-color: var(--primary-blue); color: var(--primary-blue); background: #edf4fe; }
        .tech-pill i { font-size: 0.8rem; }

        /* ── FAQ ACCORDION ─────────────────────────────────────────── */
        .faq-item {
        border: 1.5px solid var(--border-light); border-radius: 12px;
        margin-bottom: 10px; overflow: hidden;
        transition: border-color .2s, box-shadow .2s;
        }
        .faq-item.open { border-color: var(--primary-blue); box-shadow: 0 4px 20px rgba(26,115,232,.1); }
        .faq-question {
        padding: 17px 22px; display: flex; align-items: center;
        justify-content: space-between; cursor: pointer; gap: 12px;
        background: #fff;
        }
        .faq-q-text { font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 0.92rem; color: var(--text-dark); }
        .faq-item.open .faq-q-text { color: var(--primary-blue); }
        .faq-toggle { width: 30px; height: 30px; flex-shrink: 0; background: var(--bg-light); border-radius: 8px; display: flex; align-items: center; justify-content: center; transition: background .2s; }
        .faq-toggle i { color: var(--text-muted); font-size: 0.75rem; transition: transform .3s; }
        .faq-item.open .faq-toggle { background: var(--primary-blue); }
        .faq-item.open .faq-toggle i { color: #fff; transform: rotate(180deg); }
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height .35s ease, padding .3s ease; padding: 0 22px; background: #fafbfd; }
        .faq-item.open .faq-answer { max-height: 300px; padding: 0 22px 18px; }
        .faq-answer p { font-size: 0.86rem; color: var(--text-muted); line-height: 1.7; margin: 0; }

        /* ── RELATED SERVICES ──────────────────────────────────────── */
        .related-card {
        background: #fff; border-radius: 14px;
        box-shadow: 0 4px 16px rgba(0,0,0,.07);
        overflow: hidden; transition: transform .2s, box-shadow .2s;
        text-decoration: none; display: block; height: 100%;
        }
        .related-card:hover { transform: translateY(-5px); box-shadow: 0 12px 32px rgba(0,0,0,.12); }
        .related-card-img {
        height: 140px; background: linear-gradient(135deg, #e8f1fd, #d0e4fa);
        display: flex; align-items: center; justify-content: center;
        }
        .related-card-img img { width: 64px; height: 64px; object-fit: contain; }
        .related-card-body { padding: 18px 20px; }
        .related-card-title { font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 0.95rem; color: var(--text-dark); margin-bottom: 6px; }
        .related-card-desc  { font-size: 0.79rem; color: var(--text-muted); line-height: 1.5; margin: 0; }
        .related-card-link  { font-size: 0.78rem; color: var(--primary-blue); font-weight: 700; margin-top: 10px; display: flex; align-items: center; gap: 5px; }

        /* ── SIDEBAR CARDS ─────────────────────────────────────────── */
        .sidebar-card {
        background: #fff; border-radius: 14px;
        box-shadow: 0 4px 20px rgba(0,0,0,.07);
        overflow: hidden; margin-bottom: 20px;
        }
        .sidebar-card-header {
        background: linear-gradient(135deg, var(--dark-navy), var(--light-navy));
        padding: 18px 22px; position: relative; overflow: hidden;
        }
        .sidebar-card-header::after {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at 80% 50%, rgba(33,150,243,.18) 0%, transparent 65%);
        }
        .sidebar-card-header-icon { width: 38px; height: 38px; background: rgba(33,150,243,.2); border: 1px solid rgba(33,150,243,.35); border-radius: 9px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; position: relative; z-index: 1; }
        .sidebar-card-header-icon i { color: var(--accent-blue); font-size: 1rem; }
        .sidebar-card-title { font-family: 'Nunito', sans-serif; font-weight: 900; font-size: 1rem; color: #fff; position: relative; z-index: 1; margin-bottom: 2px; }
        .sidebar-card-sub   { color: #aac4e0; font-size: 0.78rem; position: relative; z-index: 1; }
        .sidebar-card-body  { padding: 20px 22px; }

        /* CTA sidebar */
        .sidebar-cta-btn {
        width: 100%; padding: 12px; background: var(--primary-blue); color: #fff;
        border: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        gap: 8px; transition: background .2s, transform .15s; margin-bottom: 10px;
        }
        .sidebar-cta-btn:hover { background: #1558b0; transform: translateY(-1px); }
        .sidebar-cta-btn.outline { background: transparent; border: 1.5px solid var(--primary-blue); color: var(--primary-blue); }
        .sidebar-cta-btn.outline:hover { background: var(--primary-blue); color: #fff; }

        /* Key facts list */
        .key-facts { list-style: none; padding: 0; margin: 0; }
        .key-facts li {
        display: flex; align-items: flex-start; gap: 10px;
        padding: 10px 0; border-bottom: 1px solid var(--border-light);
        font-size: 0.84rem;
        }
        .key-facts li:last-child { border-bottom: none; }
        .key-facts li i { color: var(--primary-blue); margin-top: 2px; flex-shrink: 0; }
        .key-facts li strong { color: var(--text-dark); display: block; font-size: 0.8rem; }
        .key-facts li span   { color: var(--text-muted); font-size: 0.78rem; }

        /* Share buttons */
        .share-btns { display: flex; gap: 8px; flex-wrap: wrap; }
        .share-btn {
        flex: 1; min-width: 80px; padding: 9px 8px;
        border-radius: 8px; border: 1.5px solid var(--border-light);
        background: var(--bg-light); color: var(--text-muted);
        font-size: 0.75rem; font-weight: 700; cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 6px;
        transition: all .2s;
        }
        .share-btn:hover { border-color: var(--primary-blue); color: var(--primary-blue); background: #edf4fe; }
        .share-btn.linkedin:hover { border-color: #0077b5; color: #0077b5; background: #e8f4fc; }
        .share-btn.twitter:hover  { border-color: #1da1f2; color: #1da1f2; background: #e8f5ff; }

        /* ── CTA BANNER ────────────────────────────────────────────── */
        .cta-banner-section {
        background: linear-gradient(135deg, var(--dark-navy) 0%, var(--light-navy) 100%);
        padding: 70px 0; position: relative; overflow: hidden;
        }
        .cta-banner-section::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at center, rgba(33,150,243,.12) 0%, transparent 70%);
        pointer-events: none;
        }
        .cta-banner-title { font-family: 'Nunito', sans-serif; font-weight: 900; font-size: 2rem; color: #fff; margin-bottom: 10px; position: relative; z-index: 1; }
        .cta-banner-sub   { color: #aac4e0; font-size: 0.95rem; margin-bottom: 30px; position: relative; z-index: 1; }

        /* ── ANIMATE ON SCROLL ─────────────────────────────────────── */
        @keyframes fadeUpIn { from{opacity:0;transform:translateY(22px)} to{opacity:1;transform:translateY(0)} }
        .anim { opacity: 0; }
        .anim.visible { animation: fadeUpIn .5s ease forwards; }
        .d1 { animation-delay: .08s; } .d2 { animation-delay: .16s; } .d3 { animation-delay: .24s; }

        @media(max-width: 576px) {
        .content-card { padding: 22px 18px; }
        .svc-hero-title { font-size: 1.9rem; }
        }
  </style>
</head>
<body>
@include('layouts.navbar')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
{{-- ══════════════════════════════════════════
     HERO
════════════════════════════════════════════ --}}
<section class="svc-detail-hero" itemscope itemtype="https://schema.org/Service">
  <meta itemprop="name"        content="{{ $service->title }}"/>
  <meta itemprop="description" content="{{ $service->meta_description ?? $service->short_description }}"/>
  <meta itemprop="url"         content="{{ url('/services/' . $service->slug) }}"/>

  <div class="hero-bg-layer">
    {{-- CSS background animations (same as services page) --}}
    <div class="code-line cl-1"></div><div class="code-line cl-2"></div><div class="code-line cl-3"></div>
    <div class="code-line cl-4"></div><div class="code-line cl-5"></div><div class="code-line cl-6"></div>
    <div class="code-line cl-7"></div><div class="code-line cl-8"></div><div class="code-line cl-9"></div>
    <div class="code-line cl-10"></div><div class="code-line cl-11"></div><div class="code-line cl-12"></div>
    <div class="circuit-node cn-1"></div><div class="circuit-node cn-2"></div><div class="circuit-node cn-3"></div>
    <div class="circuit-node cn-4"></div><div class="circuit-node cn-5"></div><div class="circuit-node cn-6"></div>
    <div class="data-packet dp-blue dp-1"></div><div class="data-packet dp-green dp-2"></div>
    <div class="data-packet dp-white dp-3"></div><div class="data-packet dp-blue dp-4"></div>
    <div class="binary-col bc-1">1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-4">0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0</div>
    <div class="hero-scan-line"></div>
  </div>

  <div class="container hero-content">
    <div class="row align-items-center g-4">

      {{-- Left --}}
      <div class="col-lg-7">
        <a href="{{ route('services') }}" class="hero-eyebrow" aria-label="Back to all services">
          <i class="fas fa-arrow-left"></i> All Services
        </a>

        <h1 class="svc-hero-title" itemprop="name">
          {{ $service->title }}
        </h1>

        <p class="svc-hero-desc" itemprop="description">
          {{ $service->short_description }}
        </p>

        <div class="hero-cta-group">
          <button class="btn-hero-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
            <i class="fas fa-comments"></i> Get Free Consultation
          </button>
          <a href="{{ url('/contact') }}" class="btn-hero-outline">
            <i class="fas fa-envelope"></i> Contact Us
          </a>
        </div>

        {{-- Stats --}}
        <div class="hero-stat-chips">
          <div class="hero-chip">
            <div class="hero-chip-icon"><i class="fas fa-users"></i></div>
            <div>
              <div class="hero-chip-val">200+</div>
              <div class="hero-chip-label">Happy Clients</div>
            </div>
          </div>
          <div class="hero-chip">
            <div class="hero-chip-icon"><i class="fas fa-check-circle"></i></div>
            <div>
              <div class="hero-chip-val">98%</div>
              <div class="hero-chip-label">Satisfaction Rate</div>
            </div>
          </div>
          <div class="hero-chip">
            <div class="hero-chip-icon"><i class="fas fa-clock"></i></div>
            <div>
              <div class="hero-chip-val">On Time</div>
              <div class="hero-chip-label">Delivery Rate</div>
            </div>
          </div>
        </div>
      </div>

      {{-- Right — Service Image --}}
      <div class="col-lg-5 d-none d-lg-block">
        <div class="hero-img-card">
          <div class="hero-float-1">
            <div class="hero-float-dot"></div> Service Active
          </div>
          <img
            src="{{ config('app.images_path') . $service->page->featured_image }}"
            alt="{{ $service->image_alt ?? $service->title . ' - Kawach Technology' }}"
            title="{{ $service->image_title ?? $service->title }}"
            width="520" height="280"
            loading="eager"
            itemprop="image"
          />
          <div class="hero-img-overlay">
            <span class="hero-img-tag"><i class="fas fa-certificate"></i> &nbsp; Expert Service</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ── BREADCRUMB ───────────────────────────────────────────────── --}}
<div class="breadcrumb-wrap">
  <div class="container">
    <nav aria-label="Breadcrumb">
      <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ url('/') }}" itemprop="item"><span itemprop="name">Home</span></a>
          <meta itemprop="position" content="1"/>
        </li>
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ url('/services') }}" itemprop="item"><span itemprop="name">Services</span></a>
          <meta itemprop="position" content="2"/>
        </li>
        <li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name">{{ $service->title }}</span>
          <meta itemprop="position" content="3"/>
        </li>
      </ol>
    </nav>
  </div>
</div>

{{-- ══════════════════════════════════════════
     MAIN CONTENT
════════════════════════════════════════════ --}}
<main class="svc-main" id="main-content">
  <div class="container">
    <div class="row g-4">

      {{-- ── CONTENT (LEFT) ─────────────────────────────────── --}}
      <div class="col-lg-8">

        {{-- Overview --}}
        <article class="content-card anim" itemscope itemtype="https://schema.org/Article">
          <h2 class="content-card-title"><i class="fas fa-info-circle"></i> Overview</h2>
          <div class="content-body" itemprop="articleBody">
            {!! $service->description !!}
          </div>
        </article>

        {{-- Key Features --}}
        @if(isset($service->service->features) && $service->service->features->count())
        <div class="content-card anim d1">
          <h2 class="content-card-title"><i class="fas fa-star"></i> Key Features</h2>
          <div class="features-grid">
            @foreach($service->service->features as $feature)
            <div class="feature-item">
              <div class="feature-item-icon"><i class="{{ $feature->icon ?? 'fas fa-check' }}"></i></div>
              <div>
                <div class="feature-item-title">{{ $feature->title }}</div>
                <div class="feature-item-desc">{{ $feature->description }}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @else
        {{-- Fallback static features --}}
        <div class="content-card anim d1">
          <h2 class="content-card-title"><i class="fas fa-star"></i> Key Features</h2>
          <div class="features-grid">
            @foreach([
              ['icon'=>'fas fa-rocket',      'title'=>'Fast Delivery',       'desc'=>'Agile sprints and milestone-based releases so you see results quickly.'],
              ['icon'=>'fas fa-shield-alt',  'title'=>'Enterprise Security',  'desc'=>'Built-in best practices — encrypted data, secure auth, and OWASP compliance.'],
              ['icon'=>'fas fa-expand-arrows-alt','title'=>'Fully Scalable','desc'=>'Architecture designed to grow with your user base without costly rewrites.'],
              ['icon'=>'fas fa-headset',     'title'=>'Dedicated Support',    'desc'=>'Post-launch support, monitoring, and a dedicated point of contact.'],
              ['icon'=>'fas fa-code-branch', 'title'=>'Clean Codebase',       'desc'=>'Readable, documented code following industry-standard patterns.'],
              ['icon'=>'fas fa-chart-line',  'title'=>'Data-Driven',          'desc'=>'Analytics and performance tracking built in from day one.'],
            ] as $f)
            <div class="feature-item">
              <div class="feature-item-icon"><i class="{{ $f['icon'] }}"></i></div>
              <div>
                <div class="feature-item-title">{{ $f['title'] }}</div>
                <div class="feature-item-desc">{{ $f['desc'] }}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif

        {{-- Our Process --}}
        <div class="content-card anim d2">
          <h2 class="content-card-title"><i class="fas fa-project-diagram"></i> Our Process</h2>
          <div class="process-steps">
            @if(isset($service->service->processes) && $service->service->processes->count())
              @foreach($service->service->processes as $i => $step)
              <div class="process-step">
                <div class="process-step-num">{{ $i + 1 }}</div>
                <div>
                  <div class="process-step-title">{{ $step->title }}</div>
                  <div class="process-step-desc">{{ $step->description }}</div>
                </div>
              </div>
              @endforeach
            @else
              @foreach([
                ['Discovery & Requirements','We conduct in-depth workshops to understand your goals, audience, and technical constraints. No assumptions — just clarity.'],
                ['Architecture & Planning','Our architects design a scalable system blueprint. Tech stack, infrastructure, timelines, and milestones are defined before a line of code is written.'],
                ['Agile Development','Two-week sprints with daily standups. You get a working demo at the end of every sprint so feedback loops stay tight.'],
                ['Quality Assurance','Manual and automated testing across devices, browsers, and edge cases. We don\'t ship until it\'s solid.'],
                ['Deployment & Go-Live','Zero-downtime deployment to your environment. CI/CD pipelines ensure smooth updates from day one.'],
                ['Support & Iteration','30-day post-launch support included. We monitor, fix, and iterate based on real user data.'],
              ] as $i => $s)
              <div class="process-step">
                <div class="process-step-num">{{ $i + 1 }}</div>
                <div>
                  <div class="process-step-title">{{ $s[0] }}</div>
                  <div class="process-step-desc">{{ $s[1] }}</div>
                </div>
              </div>
              @endforeach
            @endif
          </div>
        </div>

        {{-- Technologies --}}
        @if(isset($service->service->technologies) && $service->service->technologies->count())
        <div class="content-card anim d3">
          <h2 class="content-card-title"><i class="fas fa-layer-group"></i> Technologies We Use</h2>
          <div class="tech-pills">
            @foreach($service->service->technologies as $tech)
            <span class="tech-pill"><i class="{{ $tech->icon ?? 'fas fa-code' }}"></i> {{ $tech->name }}</span>
            @endforeach
          </div>
        </div>
        @else
        <div class="content-card anim d3">
          <h2 class="content-card-title"><i class="fas fa-layer-group"></i> Technologies We Use</h2>
          <div class="tech-pills">
            @foreach(['Laravel','React','Vue.js','Node.js','Python','AWS','Docker','MySQL','PostgreSQL','Redis','Tailwind CSS','Flutter','Swift','Kotlin','TypeScript','Git'] as $t)
            <span class="tech-pill"><i class="fas fa-code"></i> {{ $t }}</span>
            @endforeach
          </div>
        </div>
        @endif

        {{-- FAQ --}}
        <div class="content-card anim">
          <h2 class="content-card-title"><i class="fas fa-question-circle"></i> Frequently Asked Questions</h2>
          <div id="faqAccordion">
            @if(isset($service->service->faqs) && $service->service->faqs->count())
              @foreach($service->service->faqs as $i => $faq)
              <div class="faq-item {{ $i === 0 ? 'open' : '' }}" onclick="toggleFaq(this)">
                <div class="faq-question">
                  <span class="faq-q-text">{{ $faq->question }}</span>
                  <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                </div>
                <div class="faq-answer"><p>{{ $faq->answer }}</p></div>
              </div>
              @endforeach
            @else
              @foreach([
                ['How long does a typical project take?','Timeline depends on scope. A simple web app takes 4–8 weeks; a full-scale SaaS platform can take 3–6 months. We provide a detailed roadmap at the start of every engagement.'],
                ['What does your development process look like?','We use Agile methodology with 2-week sprints. You get a working demo every sprint, daily standup reports, and direct access to your project manager throughout.'],
                ['Do you offer post-launch support?','Yes — all projects include 30 days of free post-launch support. After that, we offer flexible monthly retainer plans for ongoing maintenance, monitoring, and feature development.'],
                ['How do you handle project communication?','We communicate via Slack, email, and weekly video calls. You\'ll have a dedicated project manager and access to our project tracking dashboard at all times.'],
                ['What happens if the scope changes mid-project?','Scope changes are handled transparently. We assess the impact on timeline and budget, present options, and only proceed with your approval. No surprise invoices.'],
              ] as $i => $qa)
              <div class="faq-item {{ $i === 0 ? 'open' : '' }}" onclick="toggleFaq(this)">
                <div class="faq-question">
                  <span class="faq-q-text">{{ $qa[0] }}</span>
                  <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                </div>
                <div class="faq-answer"><p>{{ $qa[1] }}</p></div>
              </div>
              @endforeach
            @endif
          </div>
        </div>

        {{-- Related Services --}}
        @if(isset($relatedServices) && $relatedServices->count())
        <div class="anim">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
            <div class="section-label"><i class="fas fa-th"></i> Related Services</div>
          </div>
          <div class="row g-3">
            @foreach($relatedServices as $related)
            <div class="col-sm-6 col-md-4">
              <a href="{{ url('/services/' . $related->slug) }}" class="related-card">
                <div class="related-card-img">
                  <img src="{{ config('app.images_path') . $related->featured_image }}"
                       alt="{{ $related->image_alt ?? $related->title }}"
                       loading="lazy" width="64" height="64"/>
                </div>
                <div class="related-card-body">
                  <div class="related-card-title">{{ $related->title }}</div>
                  <p class="related-card-desc">{{ Str::limit($related->service->short_description, 70) }}</p>
                  <div class="related-card-link">Learn More <i class="fas fa-arrow-right" style="font-size:.7rem;"></i></div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
        @endif

      </div>{{-- /col-lg-8 --}}

      {{-- ── SIDEBAR (RIGHT) ────────────────────────────────── --}}
      <div class="col-lg-4">
        <div class="svc-sidebar">

          {{-- CTA Card --}}
          <div class="sidebar-card anim">
            <div class="sidebar-card-header">
              <div class="sidebar-card-header-icon"><i class="fas fa-paper-plane"></i></div>
              <div class="sidebar-card-title">Start Your Project</div>
              <div class="sidebar-card-sub">Free consultation — no commitment</div>
            </div>
            <div class="sidebar-card-body">
              <button class="sidebar-cta-btn"
                      data-bs-toggle="modal" data-bs-target="#consultModal"
                      aria-label="Get free consultation">
                <i class="fas fa-comments"></i> Get Free Consultation
              </button>
              <button class="sidebar-cta-btn outline"
                      data-bs-toggle="modal" data-bs-target="#scheduleModal"
                      aria-label="Schedule a call">
                <i class="fas fa-phone-alt"></i> Schedule a Call
              </button>
              <button class="sidebar-cta-btn outline"
                      data-bs-toggle="modal" data-bs-target="#quoteModal"
                      aria-label="Get a quote">
                <i class="fas fa-file-invoice-dollar"></i> Get a Quote
              </button>
            </div>
          </div>

          {{-- Key Facts --}}
          <div class="sidebar-card anim d1">
            <div class="sidebar-card-header">
              <div class="sidebar-card-header-icon"><i class="fas fa-info"></i></div>
              <div class="sidebar-card-title">Service Highlights</div>
            </div>
            <div class="sidebar-card-body">
              <ul class="key-facts">
                <li>
                  <i class="fas fa-clock"></i>
                  <div><strong>Avg. Delivery Time</strong><span>4 – 12 weeks depending on scope</span></div>
                </li>
                <li>
                  <i class="fas fa-users"></i>
                  <div><strong>Dedicated Team</strong><span>PM + Dev + QA assigned to your project</span></div>
                </li>
                <li>
                  <i class="fas fa-shield-alt"></i>
                  <div><strong>NDA Protected</strong><span>Confidentiality agreement signed before kick-off</span></div>
                </li>
                <li>
                  <i class="fas fa-sync-alt"></i>
                  <div><strong>Agile Process</strong><span>2-week sprints with demo at every milestone</span></div>
                </li>
                <li>
                  <i class="fas fa-headset"></i>
                  <div><strong>Post-Launch Support</strong><span>30 days free, then flexible retainer options</span></div>
                </li>
                <li>
                  <i class="fas fa-globe"></i>
                  <div><strong>Global Clients</strong><span>We work across US, UK, EU, AU, and APAC</span></div>
                </li>
              </ul>
            </div>
          </div>

          {{-- Share --}}
          <div class="sidebar-card anim d2">
            <div class="sidebar-card-header">
              <div class="sidebar-card-header-icon"><i class="fas fa-share-alt"></i></div>
              <div class="sidebar-card-title">Share This Service</div>
            </div>
            <div class="sidebar-card-body">
              <div class="share-btns">
                <button class="share-btn linkedin"
                        onclick="shareLinkedIn()"
                        aria-label="Share on LinkedIn">
                  <i class="fab fa-linkedin-in"></i> LinkedIn
                </button>
                <button class="share-btn twitter"
                        onclick="shareTwitter()"
                        aria-label="Share on Twitter">
                  <i class="fab fa-twitter"></i> Twitter
                </button>
                <button class="share-btn"
                        onclick="copyPageLink(this)"
                        aria-label="Copy page link">
                  <i class="fas fa-link"></i> Copy Link
                </button>
              </div>
            </div>
          </div>

          {{-- Contact info --}}
          <div class="sidebar-card anim d3">
            <div class="sidebar-card-header">
              <div class="sidebar-card-header-icon"><i class="fas fa-envelope"></i></div>
              <div class="sidebar-card-title">Get In Touch</div>
            </div>
            <div class="sidebar-card-body">
              <ul class="key-facts">
                <li>
                  <i class="fas fa-envelope"></i>
                  <div><strong>Email</strong><span><a href="mailto:{{ config('app.main_email') }}" style="color:var(--primary-blue);text-decoration:none;">{{ config('app.main_email') }}</a></span></div>
                </li>
                <li>
                  <i class="fas fa-phone-alt"></i>
                  <div><strong>Phone</strong><span><a href="tel:+12345679900" style="color:var(--primary-blue);text-decoration:none;">+1 234 567 9900</a></span></div>
                </li>
                <li>
                  <i class="fas fa-clock"></i>
                  <div><strong>Response Time</strong><span>Within 24 business hours</span></div>
                </li>
              </ul>
            </div>
          </div>

        </div>{{-- /svc-sidebar --}}
      </div>{{-- /col-lg-4 --}}

    </div>{{-- /row --}}
  </div>{{-- /container --}}
</main>

{{-- ══════════════════════════════════════════
     CTA BANNER
════════════════════════════════════════════ --}}
<section class="cta-banner-section text-center">
  <div class="container">
    <h2 class="cta-banner-title">Ready to Get Started with {{ $service->title }}?</h2>
    <p class="cta-banner-sub">Let's discuss your project and build something extraordinary together.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap" style="position:relative;z-index:1;">
      <button class="btn-hero-primary" data-bs-toggle="modal" data-bs-target="#consultModal">
        <i class="fas fa-comments"></i> Free Consultation
      </button>
      <a href="{{ url('/contact') }}" class="btn-hero-outline" style="display:inline-flex;">
        <i class="fas fa-envelope"></i> Contact Us
      </a>
    </div>
  </div>
</section>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  // ── FAQ accordion ────────────────────────────────────────────
  function toggleFaq(el) {
    const isOpen = el.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('open'));
    if (!isOpen) el.classList.add('open');
  }

  // ── Share ────────────────────────────────────────────────────
  function shareLinkedIn() {
    window.open('https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(window.location.href), '_blank', 'width=600,height=500');
  }
  function shareTwitter() {
    window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(window.location.href) + '&text={{ urlencode($service->title . " – Kawach Technology") }}', '_blank', 'width=600,height=400');
  }
  function copyPageLink(btn) {
    navigator.clipboard.writeText(window.location.href).then(() => {
      const orig = btn.innerHTML;
      btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
      btn.style.borderColor = 'var(--success)';
      btn.style.color = 'var(--success)';
      setTimeout(() => { btn.innerHTML = orig; btn.style.borderColor=''; btn.style.color=''; }, 2000);
    });
  }

  // ── Scroll reveal ────────────────────────────────────────────
  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); } });
  }, { threshold: 0.08 });
  document.querySelectorAll('.anim').forEach(el => observer.observe(el));
</script>
</body>
</html>