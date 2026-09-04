<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">

@php
    $seoDescription = $seoDescription ?? $service->short_description;
    $seoCanonical   = url('/services/' . $service->slug);
    $seoImage       = $service->featured_image
        ? config('app.images_path') . $service->featured_image
        : asset('assets/images/kawach.png');
@endphp

@push('schema')
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
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
          "logo": "{{ asset('assets/images/kawach.png') }}",
          "sameAs": {!! json_encode(array_values(array_filter([config('app.linkedin'), config('app.insta')]))) !!}
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
@endpush

@include('layouts.head')

  <style>
    .svc-detail-hero{
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding: 80px 0 70px;
        background:  url('{{ asset("assets/images/kawach_main_bg.png") }}')  center center / cover no-repeat;
    }

    /* Extra blur overlay */
    .svc-detail-hero::after,
    .svc-detail-hero::after{
        content:"";
        position:absolute;
        inset:0;
        z-index:1;
    }

    /* Animation layer */
    .hero-bg-layer{
        position:absolute;
        inset:0;
        z-index:2;
        pointer-events:none;
    }

    /* Content */
    .svc-detail-hero .container,
    .svc-detail-hero .container{
        position:relative;
        z-index:3;
    }
  </style>
</head>
<body>
@include('layouts.navbar')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

{{-- ══════════════════════════════════════════ HERO ════════════════════════════════════════════ --}}

<section class="svc-detail-hero" itemscope itemtype="https://schema.org/Service">
  <meta itemprop="name" content="{{ $service->title }}"/>
  <meta itemprop="description" content="{{ $service->meta_description ?? $service->short_description }}"/>
  <meta itemprop="url" content="{{ url('/services/' . $service->slug) }}"/>

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
        <h1 class="svc-hero-title" itemprop="name">  {{ $service->title }}  </h1>
        <p class="svc-hero-desc" itemprop="description">  {{ $service->short_description }}  </p>
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
          <img src="{{ config('app.images_path') . $service->page->featured_image }}"
            alt="{{ $service->image_alt ?? $service->title . ' - Kawach Technology' }}"
            title="{{ $service->image_title ?? $service->title }}" width="520" height="280" loading="eager" itemprop="image" />
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
            {!! $service->content !!}
          </div>
        </article>

        {{-- Key Features --}}
        @php
          $features = [];
          if (!empty($service->features)) {
              $features = is_string($service->features) ? json_decode($service->features, true) : $service->features;
              if (!is_array($features)) {
                  $features = [];
              }
          }
        @endphp
          @if(count($features))
          <div class="content-card anim d1">
              <h2 class="content-card-title"><i class="fas fa-star"></i> Key Features </h2>
              <div class="features-grid">
                  @foreach($features as $feature)
                    @php
                      $title = strtolower($feature['title'] ?? '');
                      $icon = match (true) {
                          str_contains($title, 'api') => 'fas fa-plug',
                          str_contains($title, 'security') => 'fas fa-shield-alt',
                          str_contains($title, 'cloud') => 'fas fa-cloud',
                          str_contains($title, 'mobile') => 'fas fa-mobile-alt',
                          str_contains($title, 'web') => 'fas fa-globe',
                          str_contains($title, 'design') => 'fas fa-palette',
                          str_contains($title, 'database') => 'fas fa-database',
                          str_contains($title, 'support') => 'fas fa-headset',
                          str_contains($title, 'performance') => 'fas fa-gauge-high',
                          str_contains($title, 'integration') => 'fas fa-code-branch',
                          default => 'fas fa-check-circle'
                      };
                    @endphp
                    <div class="feature-item">
                        <div class="feature-item-icon"> <i class="{{ $icon }}"></i> </div>
                        <div>
                            <div class="feature-item-title">
                                {{ $feature['title'] ?? 'Feature Title' }}
                            </div>
                            <div class="feature-item-desc">
                                {{ \Illuminate\Support\Str::limit(strip_tags($feature['description'] ?? ''), 180) }}
                            </div>
                        </div>
                    </div>
                    @endforeach
              </div>
          </div>
          @else
          {{-- FALLBACK STATIC FEATURES --}}
          <div class="content-card anim d1">
              <h2 class="content-card-title"><i class="fas fa-star"></i> Key Features </h2>
              <div class="features-grid">
                  @foreach([
                      [
                          'icon' => 'fas fa-rocket',
                          'title' => 'Fast Delivery',
                          'desc' => 'Agile sprints and milestone-based releases.'
                      ],
                      [
                          'icon' => 'fas fa-shield-alt',
                          'title' => 'Enterprise Security',
                          'desc' => 'Secure architecture with best practices.'
                      ],
                      [
                          'icon' => 'fas fa-expand-arrows-alt',
                          'title' => 'Fully Scalable',
                          'desc' => 'Infrastructure designed for growth.'
                      ],
                      [
                          'icon' => 'fas fa-headset',
                          'title' => 'Dedicated Support',
                          'desc' => 'Post-launch support and monitoring.'
                      ]
                  ] as $f)
                  <div class="feature-item">
                      <div class="feature-item-icon">
                          <i class="{{ $f['icon'] }}"></i>
                      </div>
                      <div>
                          <div class="feature-item-title">
                              {{ $f['title'] }}
                          </div>
                          <div class="feature-item-desc">
                              {{ $f['desc'] }}
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
          @endif

        @include('sections.ourprocess')


        @include('sections.usingtechnology')
        

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
                  ['How long does a typical project take?', 'Timeline depends on scope. A simple web app takes 4–8 weeks; a full-scale SaaS platform can take 3–6 months. We provide a detailed roadmap at the start of every engagement.'],
                  ['What does your development process look like?', 'We use Agile methodology with 2-week sprints. You get a working demo every sprint, daily standup reports, and direct access to your project manager throughout.'],
                  ['Do you offer post-launch support?', 'Yes — all projects include 30 days of free post-launch support. After that, we offer flexible monthly retainer plans for ongoing maintenance, monitoring, and feature development.'],
                  ['How do you handle project communication?', 'We communicate via Slack, email, and weekly video calls. You\'ll have a dedicated project manager and access to our project tracking dashboard at all times.'],
                  ['What happens if the scope changes mid-project?', 'Scope changes are handled transparently. We assess the impact on timeline and budget, present options, and only proceed with your approval. No surprise invoices.'],
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
                  <img src="{{ config('app.images_path') . $related->featured_image }}" alt="{{ $related->image_alt ?? $related->title }}" loading="lazy" width="64" height="64"/>
                </div>
                <div class="related-card-body">
                  <div class="related-card-title">{{ $related->title }}</div>
                  <p class="related-card-desc">{{ Str::limit($related->short_description, 70) }}</p>
                  <div class="related-card-link">Learn More <i class="fas fa-arrow-right" style="font-size:.7rem;"></i></div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
        @endif

        {{-- Software Development Services by Market — only on the flagship
             custom software development page, not every service page. --}}
        @if($service->slug === 'custom-software-development')
        <div class="anim" style="margin-top:32px;">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
            <div class="section-label"><i class="fas fa-earth-americas"></i> Software Development Services by Market</div>
          </div>
          <p style="color:var(--text-muted, #6c757d); font-size:.95rem; margin-bottom:18px;">
            KawachTech works with businesses across the USA, United Kingdom, Germany and Europe to design,
            develop and scale custom software products — each market page covers the specific business
            challenges, communication approach and compliance considerations relevant there.
          </p>
          <div class="row g-3">
            <div class="col-sm-6 col-md-3">
              <a href="{{ route('country.usa') }}" class="related-card" style="align-items:center;text-align:center;">
                <div class="related-card-body">
                  <div class="related-card-title">Custom Software Development USA</div>
                  <div class="related-card-link">Explore &rarr;</div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-3">
              <a href="{{ route('country.uk') }}" class="related-card" style="align-items:center;text-align:center;">
                <div class="related-card-body">
                  <div class="related-card-title">Software Development Company UK</div>
                  <div class="related-card-link">Explore &rarr;</div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-3">
              <a href="{{ route('country.germany') }}" class="related-card" style="align-items:center;text-align:center;">
                <div class="related-card-body">
                  <div class="related-card-title">Software Development Company Germany</div>
                  <div class="related-card-link">Explore &rarr;</div>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-3">
              <a href="{{ route('country.europe') }}" class="related-card" style="align-items:center;text-align:center;">
                <div class="related-card-body">
                  <div class="related-card-title">Software Development for European Businesses</div>
                  <div class="related-card-link">Explore &rarr;</div>
                </div>
              </a>
            </div>
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
                  <i class="fab fa-instagram"></i> Instagram
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
                  <div><strong>Phone</strong><span><a href="tel:{{ config('app.mobile') }}" style="color:var(--primary-blue);text-decoration:none;">{{ config('app.mobile') }}</a></span></div>
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