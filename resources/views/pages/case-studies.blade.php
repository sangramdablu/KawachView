<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
<body>

<!-- ── NAVBAR ── -->
@include('layouts.navbar')

<!-- ── HERO ── -->
<section class="case-hero-section">
  <div class="hero-bg-layer">

    {{-- Floating code lines --}}
    <div class="code-line cl-1"></div>
    <div class="code-line cl-2"></div>
    <div class="code-line cl-3"></div>
    <div class="code-line cl-4"></div>
    <div class="code-line cl-5"></div>
    <div class="code-line cl-6"></div>
    <div class="code-line cl-7"></div>
    <div class="code-line cl-8"></div>
    <div class="code-line cl-9"></div>
    <div class="code-line cl-10"></div>
    <div class="code-line cl-11"></div>
    <div class="code-line cl-12"></div>
    <div class="code-line cl-13"></div>
    <div class="code-line cl-14"></div>
    <div class="code-line cl-15"></div>

    {{-- Circuit board nodes --}}
    <div class="circuit-node cn-1"></div>
    <div class="circuit-node cn-2"></div>
    <div class="circuit-node cn-3"></div>
    <div class="circuit-node cn-4"></div>
    <div class="circuit-node cn-5"></div>
    <div class="circuit-node cn-6"></div>
    <div class="circuit-node cn-7"></div>
    <div class="circuit-node cn-8"></div>
    <div class="circuit-node cn-9"></div>
    <div class="circuit-node cn-10"></div>

    {{-- Data packets (horizontal travel) --}}
    <div class="data-packet dp-blue  dp-1"></div>
    <div class="data-packet dp-green dp-2"></div>
    <div class="data-packet dp-white dp-3"></div>
    <div class="data-packet dp-blue  dp-4"></div>
    <div class="data-packet dp-green dp-5"></div>
    <div class="data-packet dp-white dp-6"></div>
    <div class="data-packet dp-blue  dp-7"></div>
    <div class="data-packet dp-green dp-8"></div>

    {{-- Binary rain columns (sides only) --}}
    <div class="binary-col bc-1">1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-2">0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-3">1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-4">0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-5">1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0</div>
    <div class="binary-col bc-6">0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1</div>

    {{-- Scan line --}}
    <div class="hero-scan-line"></div>

  </div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-7">
        <div class="hero-eyebrow">Our Success Stories</div>
        <h1 class="hero-title">Case Studies</h1>
        <p class="hero-subtitle">
          Real results for real businesses. Explore how we've transformed ideas into powerful digital solutions across industries.
        </p>
        <div class="d-flex gap-3 flex-wrap">
          <a href="#cases" class="btn-hero-primary">Explore Projects</a>
          <a href="#" class="btn-hero-outline">Start Your Project</a>
        </div>
        <div class="casehero-stats">
          <div class="stat-item">
            <div class="stat-number">150<span>+</span></div>
            <div class="stat-label">Projects Delivered</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">98<span>%</span></div>
            <div class="stat-label">Client Satisfaction</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">40<span>+</span></div>
            <div class="stat-label">Industries Served</div>
          </div>
        </div>
      </div>

      <!-- hero chart illustration -->
      <div class="col-lg-6 col-md-5 d-none d-md-flex hero-illustration">
        <div class="hero-chart-wrap">
          <div class="mini-stat-card msc-1">
            <div class="msc-num"><span>↑</span> 150%</div>
            <div class="msc-label">Revenue Growth</div>
          </div>
          <div class="mini-stat-card msc-2">
            <div class="msc-num"><span>↓</span> 60%</div>
            <div class="msc-label">Cost Reduction</div>
          </div>
          <div class="chart-card">
            <div class="chart-card-title">
              <i class="fas fa-chart-bar"></i> Project Outcomes
            </div>
            <div class="chart-bars">
              <div class="chart-bar-group">
                <div class="chart-bar-val">+150%</div>
                <div class="chart-bar" style="height:90px;"></div>
                <div class="chart-bar-label">E-Com</div>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar-val">+80%</div>
                <div class="chart-bar" style="height:60px; opacity:0.75;"></div>
                <div class="chart-bar-label">CRM</div>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar-val">+65%</div>
                <div class="chart-bar" style="height:50px; opacity:0.65;"></div>
                <div class="chart-bar-label">Health</div>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar-val">+90%</div>
                <div class="chart-bar" style="height:72px; opacity:0.85;"></div>
                <div class="chart-bar-label">Fin</div>
              </div>
              <div class="chart-bar-group">
                <div class="chart-bar-val">+70%</div>
                <div class="chart-bar" style="height:55px; opacity:0.7;"></div>
                <div class="chart-bar-label">Edu</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FILTER TABS ── -->
<section class="filter-section">
  <div class="container">
    <div class="filter-tabs">
      <button class="filter-btn active">All Projects</button>
      <button class="filter-btn">E-Commerce</button>
      <button class="filter-btn">AI &amp; ML</button>
      <button class="filter-btn">Cloud &amp; DevOps</button>
      <button class="filter-btn">Healthcare</button>
      <button class="filter-btn">FinTech</button>
      <button class="filter-btn">Education</button>
    </div>
  </div>
</section>

<!-- ── FEATURED CASE STUDY ── -->
<section class="featured-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Featured Case Study</h2>
      <p class="section-subtitle">Our most impactful project of the year</p>
    </div>

    <div class="featured-card">
      <div class="featured-card-visual">
        <div class="featured-tag">⭐ Featured</div>
        <div class="featured-visual-inner">
          <div class="fvi-screen">
            <div class="fvi-bar fvi-bar-full"></div>
            <div class="fvi-bar fvi-bar-med"></div>
            <div class="fvi-bar fvi-bar-short"></div>
            <div class="fvi-row">
              <div class="fvi-block fvi-block-blue"></div>
              <div class="fvi-block"></div>
              <div class="fvi-block fvi-block-blue"></div>
            </div>
          </div>
          <div class="fvi-screen" style="opacity:0.6;">
            <div class="fvi-bar fvi-bar-med"></div>
            <div class="fvi-bar fvi-bar-short"></div>
          </div>
        </div>
      </div>
      <div class="featured-card-body">
        <div class="case-category">E-Commerce &nbsp;·&nbsp; AI-Powered</div>
        <h3 class="case-title">ShopNova E-Commerce Platform — Boosting Sales by 150%</h3>
        <p class="case-desc">
          ShopNova approached us with a legacy storefront struggling under high traffic and low conversion rates. We rebuilt the entire platform with a modern microservices architecture, integrated AI-driven product recommendations, and a real-time inventory sync system — resulting in record-breaking growth within 6 months of launch.
        </p>
        <div class="case-metrics">
          <div class="metric-item">
            <div class="metric-value">150%</div>
            <div class="metric-label">Sales Increase</div>
          </div>
          <div class="metric-item">
            <div class="metric-value">3×</div>
            <div class="metric-label">Faster Load Time</div>
          </div>
          <div class="metric-item">
            <div class="metric-value">99.9%</div>
            <div class="metric-label">Uptime SLA</div>
          </div>
        </div>
        <a href="#" class="btn-read-more">Read Full Case Study <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ── CASE STUDY CARDS ── -->
<section class="cases-section" id="cases">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">All Case Studies</h2>
      <p class="section-subtitle">Explore our portfolio of successful digital transformations</p>
    </div>

    <div class="row g-4">

      <!-- Card 1 – E-Commerce -->
      <div class="col-md-4">
        <div class="case-card">
          <div class="case-card-visual ccv-ecom">
            <div class="ccv-result"><i class="fas fa-arrow-up"></i> +150% Sales</div>
            <div class="ccv-icon"><i class="fas fa-shopping-cart"></i></div>
            <div class="ccv-badge">E-Commerce</div>
          </div>
          <div class="case-card-body">
            <div class="case-card-category">E-Commerce &nbsp;·&nbsp; Retail</div>
            <div class="case-card-title">E-Commerce Platform Redesign for ShopNova</div>
            <p class="case-card-desc">Rebuilt a legacy storefront with AI-driven recommendations and microservices, boosting sales by 150% in 6 months.</p>
            <div class="case-card-footer">
              <div>
                <div class="case-card-metric">150%</div>
                <div class="case-card-metric-label">Revenue Growth</div>
              </div>
              <a href="#" class="btn-case-link">View Study <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 – AI CRM -->
      <div class="col-md-4">
        <div class="case-card">
          <div class="case-card-visual ccv-crm">
            <div class="ccv-result"><i class="fas fa-arrow-up"></i> +80% Leads</div>
            <div class="ccv-icon"><i class="fas fa-robot"></i></div>
            <div class="ccv-badge">AI &amp; ML</div>
          </div>
          <div class="case-card-body">
            <div class="case-card-category">AI &amp; Machine Learning &nbsp;·&nbsp; SaaS</div>
            <div class="case-card-title">AI-Powered CRM for Automated Lead Management</div>
            <p class="case-card-desc">Deployed a smart CRM with predictive lead scoring and automated follow-ups, increasing conversion rates by 80%.</p>
            <div class="case-card-footer">
              <div>
                <div class="case-card-metric">80%</div>
                <div class="case-card-metric-label">Lead Conversion</div>
              </div>
              <a href="#" class="btn-case-link">View Study <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 – Logistics -->
      <div class="col-md-4">
        <div class="case-card">
          <div class="case-card-visual ccv-lms">
            <div class="ccv-result"><i class="fas fa-arrow-down"></i> -40% Cost</div>
            <div class="ccv-icon"><i class="fas fa-truck"></i></div>
            <div class="ccv-badge">Cloud &amp; DevOps</div>
          </div>
          <div class="case-card-body">
            <div class="case-card-category">Cloud &amp; DevOps &nbsp;·&nbsp; Logistics</div>
            <div class="case-card-title">Logistics Management System — Optimised Supply Chain</div>
            <p class="case-card-desc">Built a real-time logistics platform with route optimisation and live tracking, cutting operational costs by 40%.</p>
            <div class="case-card-footer">
              <div>
                <div class="case-card-metric">40%</div>
                <div class="case-card-metric-label">Cost Reduction</div>
              </div>
              <a href="#" class="btn-case-link">View Study <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 4 – Healthcare -->
      <div class="col-md-4">
        <div class="case-card">
          <div class="case-card-visual ccv-health">
            <div class="ccv-result"><i class="fas fa-arrow-up"></i> +65% Efficiency</div>
            <div class="ccv-icon"><i class="fas fa-heartbeat"></i></div>
            <div class="ccv-badge">Healthcare</div>
          </div>
          <div class="case-card-body">
            <div class="case-card-category">Healthcare &nbsp;·&nbsp; Custom Software</div>
            <div class="case-card-title">Patient Management Portal for MedCore Clinics</div>
            <p class="case-card-desc">Developed a HIPAA-compliant patient portal with appointment booking, EHR integration, and telemedicine support.</p>
            <div class="case-card-footer">
              <div>
                <div class="case-card-metric">65%</div>
                <div class="case-card-metric-label">Staff Efficiency</div>
              </div>
              <a href="#" class="btn-case-link">View Study <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 5 – FinTech -->
      <div class="col-md-4">
        <div class="case-card">
          <div class="case-card-visual ccv-fin">
            <div class="ccv-result"><i class="fas fa-arrow-up"></i> +90% Speed</div>
            <div class="ccv-icon"><i class="fas fa-chart-line"></i></div>
            <div class="ccv-badge">FinTech</div>
          </div>
          <div class="case-card-body">
            <div class="case-card-category">FinTech &nbsp;·&nbsp; AI &amp; ML</div>
            <div class="case-card-title">Real-Time Fraud Detection Engine for PayShield</div>
            <p class="case-card-desc">Engineered a real-time ML fraud detection system processing 1M+ transactions per day with sub-100ms response time.</p>
            <div class="case-card-footer">
              <div>
                <div class="case-card-metric">99.7%</div>
                <div class="case-card-metric-label">Detection Accuracy</div>
              </div>
              <a href="#" class="btn-case-link">View Study <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 6 – EdTech -->
      <div class="col-md-4">
        <div class="case-card">
          <div class="case-card-visual ccv-edu">
            <div class="ccv-result"><i class="fas fa-arrow-up"></i> +70% Engagement</div>
            <div class="ccv-icon"><i class="fas fa-graduation-cap"></i></div>
            <div class="ccv-badge">Education</div>
          </div>
          <div class="case-card-body">
            <div class="case-card-category">Education &nbsp;·&nbsp; Web &amp; Mobile</div>
            <div class="case-card-title">Smart LMS Platform for EduReach Online Academy</div>
            <p class="case-card-desc">Created an adaptive learning management system with AI-personalised course paths, live sessions, and gamification.</p>
            <div class="case-card-footer">
              <div>
                <div class="case-card-metric">70%</div>
                <div class="case-card-metric-label">Student Engagement</div>
              </div>
              <a href="#" class="btn-case-link">View Study <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── TESTIMONIALS ── -->
@include('layouts.testmonials')

<!-- ── INDUSTRIES ── -->
@include('layouts.industry')


<!-- ── CTA BANNER ── -->
<section class="cta-banner">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center text-md-start g-3">
      <div class="col-md-auto">
        <p class="cta-banner-text mb-0">
          Ready to be our next&nbsp;<span class="highlight">success story?</span>
        </p>
      </div>
      <div class="col-md-auto ms-md-4">
        <button class="btn btn-cta-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">Schedule a Call</button>
      </div>
    </div>
  </div>
</section>

<!-- ── FOOTER ── -->
<footer class="footer-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Quick Links</div>
        <ul class="footer-links">
          <li><a href="index.html">Home</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="#">Case Studies</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Our Expertise</div>
        <ul class="footer-links">
          <li><a href="#">Custom Software</a></li>
          <li><a href="#">AI &amp; Automation</a></li>
          <li><a href="#">SaaS Solutions</a></li>
          <li><a href="#">Cloud &amp; DevOps</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Resources</div>
        <ul class="footer-links">
          <li><a href="#">Blog</a></li>
          <li><a href="#">Support</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="#">FAQ</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Contact Us</div>
        <div class="footer-contact-item">
          <i class="fas fa-envelope"></i>
          info@KawachTech.com
        </div>
        <div class="footer-contact-item">
          <i class="fas fa-phone"></i>
          +1 234 567 9900
        </div>
        <div class="footer-social">
          <a href="#" class="social-btn social-linkedin"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-btn social-twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="social-btn social-facebook"><i class="fab fa-facebook-f"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2034 KawachTech Solutions. All rights reserved.</p>
    </div>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  // Filter tab interactivity
  const filterBtns = document.querySelectorAll('.filter-btn');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });
</script>
</body>
</html>
