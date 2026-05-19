<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $post->meta_title ?? $post->title }} — KawachTech Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>
    <meta name="description" content="{{ $post->meta_description }}">
    <meta property="og:title" content="{{ $post->og_title ?? $post->title }}">
    <meta property="og:description" content="{{ $post->og_description ?? $post->meta_description }}">
    <meta property="og:image" content="{{ config('app.images_path') . $post->featured_image }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
      .article-hero{
          position:relative;
          overflow:hidden;
          background:#0f172a;
          isolation:isolate;
      }
      .article-hero::before{
          content:"";
          position:absolute;
          inset:0;
          background:  linear-gradient( 135deg, rgba(15,23,42,.92) 0%, rgba(15,23,42,.82) 45%, rgba(13,71,161,.68) 100% ), url('{{ asset("assets/images/kawach_main_bg.png") }}') center center / cover no-repeat;
          z-index:0;
      }

      .article-hero::after{
          content:"";
          position:absolute;
          inset:0;
          background: radial-gradient( circle at top right, rgba(59,130,246,.16), transparent 45% );
          z-index:1;
      }

      .article-hero .hero-bg-layer{
          position:absolute;
          inset:0;
          z-index:2;
          pointer-events:none;
          opacity:.55;
      }

      /* soften animation */
      .article-hero .code-line,
      .article-hero .circuit-node,
      .article-hero .data-packet,
      .article-hero .binary-col{
          opacity:.42;
      }

      .article-hero .container{
          position:relative;
          z-index:3;
      }

      .article-hero-inner{
          position:relative;
          z-index:3;
      }

      .article-category-badge{
          display:inline-flex;
          align-items:center;
          gap:8px;
          padding:8px 18px;
          border-radius:999px;
          background:rgba(59,130,246,.14);
          border:1px solid rgba(59,130,246,.22);
          color:#dbeafe;
          font-size:.82rem;
          font-weight:700;
          margin-bottom:24px;
          backdrop-filter:blur(10px);
      }

      .article-hero-title{
          font-family:'Nunito',sans-serif;
          font-size:3.2rem;
          font-weight:900;
          line-height:1.15;
          color:#fff;
          max-width:950px;
          margin-bottom:28px;
      }

      .article-hero-meta{
          display:flex;
          align-items:center;
          gap:14px;
          flex-wrap:wrap;
          margin-bottom:42px;
      }

      .hero-meta-pill{
          display:inline-flex;
          align-items:center;
          gap:8px;
          padding:10px 16px;
          border-radius:999px;
          background:rgba(255,255,255,.08);
          border:1px solid rgba(255,255,255,.12);
          color:#dbeafe;
          font-size:.82rem;
          font-weight:600;
          backdrop-filter:blur(12px);
      }

      .hero-author{
          display:flex;
          align-items:center;
          gap:12px;
          margin-right:10px;
      }

      .hero-avatar{
          width:52px;
          height:52px;
          border-radius:50%;
          background: linear-gradient(135deg,#2563eb,#1d4ed8);
          display:flex;
          align-items:center;
          justify-content:center;
          color:#fff;
          font-weight:800;
          box-shadow: 0 8px 20px rgba(37,99,235,.28);
      }
      .author-name{
          color:#fff;
          font-weight:800;
      }

      .author-role{
          color:#93c5fd;
          font-size:.82rem;
      }

      .article-hero-thumb{
          position:relative;
          border-radius:30px;
          overflow:hidden;
          margin-top:18px;
          box-shadow: 0 30px 60px rgba(0,0,0,.32);
          border:1px solid rgba(255,255,255,.08);
          background:#0f172a;
      }

      .article-hero-image{
          width:100%;
          height:560px;
          object-fit:cover;
          object-position:center;
          display:block;
      }

      @media(max-width:1200px){
          .article-hero-title{
              font-size:2.8rem;
          }
      }

      @media(max-width:991px){
          .article-hero{
              padding:75px 0 60px;
          }
          .article-hero-title{
              font-size:2.3rem;
          }
          .article-hero-image{
              height:420px;
          }
          .article-hero-meta{
              gap:10px;
          }
      }

      @media(max-width:767px){
          .article-hero{
              padding:60px 0 50px;
          }
          .article-hero-title{
              font-size:1.75rem;
              line-height:1.3;
          }
          .article-hero-meta{
              flex-direction:column;
              align-items:flex-start;
          }
          .hero-author{
              margin-bottom:4px;
          }
          .hero-meta-pill{
              width:100%;
              justify-content:flex-start;
          }
          .article-hero-image{
              height:240px;
          }
          .article-hero-thumb{
              border-radius:20px;
          }
          .binary-col,
          .code-line:nth-child(n+8){
              display:none;
          }

      }
    </style>
    @verbatim
      <script type="application/ld+json">
          {
          "@context": "https://schema.org",
          "@type": "BlogPosting",
          "headline": "{{ $post->title }}",
          "description": "{{ $post->meta_description }}",
          "image": "{{ config('app.images_path') . $post->featured_image }}",
          "datePublished": "{{ $post->published_at }}",
          "author": {
              "@type": "Person",
              "name": "{{ $post->author_name ?? 'Kawach Team' }}"
          }
          }
      </script>
    @endverbatim
</head>
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
<body>

<!-- Reading Progress Bar -->
<div class="reading-progress" id="readingProgress"></div>
<!-- NAVBAR -->
@include('layouts.navbar')

<!-- BREADCRUMB -->
<div class="breadcrumb-bar">
  <div class="container">
    <a href="index.html"><i class="fas fa-home" style="font-size:0.72rem;"></i> Home</a>
    <span class="breadcrumb-sep"><i class="fas fa-chevron-right"></i></span>
    <a href="{{ route('blog') }}">Blog</a>
    {{-- <span class="breadcrumb-sep"><i class="fas fa-chevron-right"></i></span>
    <a href="#">AI &amp; Machine Learning</a> --}}
    <span class="breadcrumb-sep"><i class="fas fa-chevron-right"></i></span>
    <span class="breadcrumb-current">{{ $post->title }}</span>
  </div>
</div>

<!-- ARTICLE HERO -->
<section class="article-hero">

  <div class="hero-bg-layer">
    <div class="code-line cl-1"></div><div class="code-line cl-2"></div><div class="code-line cl-3"></div>
    <div class="code-line cl-4"></div><div class="code-line cl-5"></div><div class="code-line cl-6"></div>
    <div class="code-line cl-7"></div><div class="code-line cl-8"></div><div class="code-line cl-9"></div>
    <div class="code-line cl-10"></div><div class="code-line cl-11"></div><div class="code-line cl-12"></div>
    <div class="code-line cl-13"></div><div class="code-line cl-14"></div><div class="code-line cl-15"></div>
    <div class="circuit-node cn-1"></div><div class="circuit-node cn-2"></div><div class="circuit-node cn-3"></div>
    <div class="circuit-node cn-4"></div><div class="circuit-node cn-5"></div><div class="circuit-node cn-6"></div>
    <div class="circuit-node cn-7"></div><div class="circuit-node cn-8"></div><div class="circuit-node cn-9"></div><div class="circuit-node cn-10"></div>
    <div class="data-packet dp-blue  dp-1"></div><div class="data-packet dp-green dp-2"></div>
    <div class="data-packet dp-white dp-3"></div><div class="data-packet dp-blue  dp-4"></div>
    <div class="data-packet dp-green dp-5"></div><div class="data-packet dp-white dp-6"></div>
    <div class="data-packet dp-blue  dp-7"></div><div class="data-packet dp-green dp-8"></div>
    <div class="binary-col bc-1">1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-2">0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-3">1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-4">0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-5">1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0</div>
    <div class="binary-col bc-6">0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1</div>
    <div class="hero-scan-line"></div>
  </div>

  <div class="article-hero-inner">
    <div class="container">
      <div class="article-category-badge">
        <i class="fas fa-brain"></i> {{ $post->category->name ?? 'Technology' }}
      </div>
      <h1 class="article-hero-title">
        {{ $post->title }}
      </h1>
      <div class="article-hero-meta">
        <div class="hero-author">
          <div class="hero-avatar">AK</div>
          <div class="hero-author-info">
            <div class="author-name">Arjun Kumar</div>
            <div class="author-role">Lead AI Engineer</div>
          </div>
        </div>
        <span class="hero-meta-pill"><i class="fas fa-calendar-alt"></i> {{ $post->published_at->format('M d, Y') }}</span>
        <span class="hero-meta-pill"><i class="fas fa-clock"></i> {{ $post->reading_time ?? 5 }} min read</span>
        <span class="hero-meta-pill"><i class="fas fa-eye"></i> {{ number_format($post->views) }} views</span>
        <span class="hero-meta-pill"><i class="fas fa-comment-alt"></i> 14 comments</span>
      </div>
    </div>
    <!-- Hero thumb -->
    <div class="container" style="margin-top:0;">
        <div class="article-hero-thumb">
            <img src="{{ config('app.images_path') . $post->featured_image }}" alt="{{ $post->title }}" title="{{ $post->title }}" class="article-hero-image">
        </div>
    </div>
    </div>
  </div>
</section>

<!-- MAIN LAYOUT -->
<div class="article-layout">
  <div class="container">
    <div class="row g-4">

      <!-- ARTICLE MAIN -->
      <div class="col-lg-8">
        <div class="article-content-wrap">

          <!-- Share / actions bar -->
          <div class="article-actions">
            <div style="display:flex;align-items:center;gap:12px;">
              <span class="share-label">Share</span>
              <div class="share-btns">
                <a href="#" class="share-btn sb-linkedin"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="share-btn sb-twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="share-btn sb-facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="share-btn sb-link"><i class="fas fa-link"></i></a>
              </div>
            </div>
            <div class="read-time-badge">
              <i class="fas fa-clock"></i> 9 min read
            </div>
          </div>

          <!-- Article body -->
            <div class="article-body">
                {!! $post->content !!}
            </div>
          <!-- /article-body -->
        </div><!-- /article-content-wrap -->

        <!-- AUTHOR BIO -->
        <div class="author-bio">
          <div class="bio-avatar">AK</div>
          <div>
            <div class="bio-name">{{ $post->author_name ?? 'Kawach Team' }}</div>
            <div class="bio-role">Lead AI Engineer, KawachTech Solutions</div>
            <p class="bio-text">Arjun leads AI strategy and implementation across KawachTech's enterprise client portfolio. With over 10 years in software engineering and 4 years specialising in applied ML, he has guided organisations across finance, healthcare, and logistics through large-scale AI adoption programmes.</p>
            <div class="bio-socials">
              <a href="#" class="bio-social-btn" style="background:#0077b5;"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="bio-social-btn" style="background:#1da1f2;"><i class="fab fa-twitter"></i></a>
              <a href="#" class="bio-social-btn" style="background:#1a73e8;"><i class="fas fa-globe"></i></a>
            </div>
          </div>
        </div>

      </div><!-- /col main -->

      <!-- SIDEBAR -->
      <div class="col-lg-4">

        <!-- Table of Contents -->
        <div class="sidebar-card">
          <div class="sidebar-heading">Table of Contents</div>
          <ul class="toc-list">
            <li>
              <a href="#s1">
                <span class="toc-num">1</span> The State of GenAI in Software Teams
              </a>
            </li>
            <li>
              <a href="#s2">
                <span class="toc-num">2</span> Where AI Adds the Most Value
              </a>
            </li>
            <li>
              <a href="#s3">
                <span class="toc-num">3</span> Integrating AI into Your Workflow
              </a>
            </li>
            <li>
              <a href="#s4">
                <span class="toc-num">4</span> Common Pitfalls to Avoid
              </a>
            </li>
            <li>
              <a href="#s5">
                <span class="toc-num">5</span> Building an AI-Ready Culture
              </a>
            </li>
            <li>
              <a href="#s6">
                <span class="toc-num">6</span> What to Expect in Late 2024
              </a>
            </li>
          </ul>
        </div>

        <!-- Newsletter -->
        <div class="sidebar-newsletter">
          <div class="sidebar-newsletter-title">Stay in the Loop</div>
          <div class="sidebar-newsletter-sub">Get our best articles delivered weekly to your inbox.</div>
          <input type="email" class="sidebar-nl-input" placeholder="Your email address"/>
          <button class="btn-sidebar-subscribe">Subscribe <i class="fas fa-paper-plane ms-1" style="font-size:0.75rem;"></i></button>
        </div>

        <!-- Related Articles -->
        <div class="sidebar-card" style="margin-top:24px;">
          <div class="sidebar-heading">Related Articles</div>

          <a href="#" class="related-mini">
            <div class="related-thumb-mini thumb-ai">
              <i class="fas fa-robot"></i>
            </div>
            <div>
              <div class="related-mini-title">RAG vs Fine-Tuning: Which Approach Makes Your LLM Actually Useful?</div>
              <div class="related-mini-date"><i class="fas fa-clock" style="color:var(--primary-blue);font-size:0.65rem;"></i> 8 min read</div>
            </div>
          </a>

          <a href="#" class="related-mini">
            <div class="related-thumb-mini thumb-cloud">
              <i class="fas fa-server"></i>
            </div>
            <div>
              <div class="related-mini-title">Kubernetes vs Docker Swarm: Choosing the Right Orchestration for Scale</div>
              <div class="related-mini-date"><i class="fas fa-clock" style="color:var(--primary-blue);font-size:0.65rem;"></i> 6 min read</div>
            </div>
          </a>

          <a href="#" class="related-mini">
            <div class="related-thumb-mini thumb-saas">
              <i class="fas fa-cubes"></i>
            </div>
            <div>
              <div class="related-mini-title">Building Multi-Tenant SaaS: Architecture Patterns That Scale</div>
              <div class="related-mini-date"><i class="fas fa-clock" style="color:var(--primary-blue);font-size:0.65rem;"></i> 8 min read</div>
            </div>
          </a>

          <a href="#" class="related-mini">
            <div class="related-thumb-mini" style="background:linear-gradient(135deg,#0d1b3e,#1565c0);">
              <i class="fas fa-shield-alt"></i>
            </div>
            <div>
              <div class="related-mini-title">Zero Trust Architecture: A Step-by-Step Implementation Guide</div>
              <div class="related-mini-date"><i class="fas fa-clock" style="color:var(--primary-blue);font-size:0.65rem;"></i> 7 min read</div>
            </div>
          </a>
        </div>

        <!-- Share sticky -->
        <div class="sidebar-card">
          <div class="sidebar-heading">Share This Article</div>
          <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <a href="#" class="share-btn sb-linkedin" style="width:auto;padding:0 16px;border-radius:6px;font-size:0.8rem;gap:7px;display:flex;align-items:center;height:36px;">
              <i class="fab fa-linkedin-in"></i> LinkedIn
            </a>
            <a href="#" class="share-btn sb-twitter" style="width:auto;padding:0 16px;border-radius:6px;font-size:0.8rem;gap:7px;display:flex;align-items:center;height:36px;">
              <i class="fab fa-twitter"></i> Twitter
            </a>
            <a href="#" class="share-btn sb-link" style="width:auto;padding:0 16px;border-radius:6px;font-size:0.8rem;gap:7px;display:flex;align-items:center;height:36px;">
              <i class="fas fa-link"></i> Copy Link
            </a>
          </div>
        </div>

      </div><!-- /sidebar -->
    </div><!-- /row -->
  </div><!-- /container -->
</div><!-- /article-layout -->

<!-- RELATED FULL CARDS -->
<section class="related-section">
  <div class="container text-center">
    <div class="section-divider"></div>
    <h2 class="section-title">More Articles You'll Enjoy</h2>
    <p class="section-subtitle">Keep exploring insights from our engineering team</p>
    <div class="row g-4">
        @foreach($related as $item)
            <div class="col-md-4">
                <div class="blog-card">
                    <div class="blog-card-thumb">
                        <img src="{{ config('app.images_path') . $item->featured_image }}" class="card-thumb-img" alt="{{ $item->title }}">
                    </div>
                    <div class="blog-card-body">
                        <span class="blog-card-badge">
                            {{ $item->category->name ?? 'Blog' }}
                        </span>
                        <div class="blog-card-title">
                            {{ $item->title }}
                        </div>
                        <div class="blog-card-footer">
                            <span class="blog-card-meta">
                                <i class="fas fa-clock"></i>
                                {{ $item->reading_time ?? 5 }} min
                            </span>
                            <a href="{{ route('blog.show', $item->slug) }}" class="btn-read-sm"> Read <i class="fas fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container" style="position:relative;">
    <h2 class="cta-title">Ready to Transform Your Business?</h2>
    <p class="cta-subtitle">Let's discuss your project and find the best AI-powered solution</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="#" class="btn-cta-primary">Schedule a Call</a>
      <a href="#" class="btn-cta-outline">Get a Quote</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Quick Links</div>
        <ul class="footer-links">
          <li><a href="#">Services</a></li>
          <li><a href="#">Case Studies</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Our Expertise</div>
        <ul class="footer-links">
          <li><a href="#">Custom Software</a></li>
          <li><a href="#">AI &amp; Automation</a></li>
          <li><a href="#">Web &amp; Mobile</a></li>
          <li><a href="#">Cloud &amp; DevOps</a></li>
          <li><a href="#">Machine Learning</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Resources</div>
        <ul class="footer-links">
          <li><a href="#">Blog</a></li>
          <li><a href="#">Support</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Contact Us</div>
        <div class="footer-contact-item"><i class="fas fa-envelope"></i> hello@KawachTech.io</div>
        <div class="footer-contact-item"><i class="fas fa-phone"></i> +1 234 567 9900</div>
        <div class="footer-contact-item"><i class="fas fa-map-marker-alt"></i> 123 Tech Avenue, NY</div>
        <div class="footer-social">
          <a href="#" class="social-btn social-linkedin"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-btn social-twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="social-btn social-facebook"><i class="fab fa-facebook-f"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2024 KawachTech Solutions. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top" id="backToTop">
  <i class="fas fa-arrow-up"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  // Reading progress bar
  window.addEventListener('scroll', () => {
    const doc = document.documentElement;
    const scrollTop = doc.scrollTop || document.body.scrollTop;
    const scrollHeight = doc.scrollHeight - doc.clientHeight;
    const progress = (scrollTop / scrollHeight) * 100;
    document.getElementById('readingProgress').style.width = progress + '%';

    // Back to top visibility
    const btn = document.getElementById('backToTop');
    if (scrollTop > 400) btn.classList.add('visible');
    else btn.classList.remove('visible');
  });

  // Back to top smooth scroll
  document.getElementById('backToTop').addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // TOC smooth scroll
  document.querySelectorAll('.toc-list a').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // Copy link button
  document.querySelectorAll('.sb-link').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      navigator.clipboard.writeText(window.location.href).catch(() => {});
      const orig = btn.innerHTML;
      btn.innerHTML = '<i class="fas fa-check"></i>';
      setTimeout(() => btn.innerHTML = orig, 1500);
    });
  });
</script>
</body>
</html>
