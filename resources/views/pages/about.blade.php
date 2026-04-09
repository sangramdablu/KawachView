<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
</head>
<body>

<!-- ── NAVBAR ── -->
@include('layouts.navbar')

<!-- ── HERO ── -->
<section class="about-hero-section">
  <div class="hero-dots"></div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-7">
        <div class="hero-eyebrow">Who We Are</div>
        <h1 class="hero-title">About Us</h1>
        <p class="hero-subtitle">
          We are a passionate team of engineers, designers, and strategists dedicated to building cutting-edge software solutions that drive real business growth.
        </p>
        <div class="d-flex gap-3 flex-wrap">
          <a href="#team" class="btn-hero-primary">Meet the Team</a>
          <a href="#" class="btn-hero-outline">Work With Us</a>
        </div>
        <div class="hero-stats">
          <div class="stat-item">
            <div class="stat-number">10<span>+</span></div>
            <div class="stat-label">Years of Experience</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">150<span>+</span></div>
            <div class="stat-label">Projects Delivered</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">50<span>+</span></div>
            <div class="stat-label">Expert Team Members</div>
          </div>
        </div>
      </div>

      <!-- right visual -->
      <div class="col-lg-6 col-md-5 d-none d-md-flex hero-visual">
        <div class="about-visual-wrap">
          <div class="av-float-badge fb-1">
            <i class="fas fa-award"></i>
            <div>
              <div class="avb-text">Top Software Company</div>
              <div class="avb-sub">Clutch 2024</div>
            </div>
          </div>
          <div class="av-float-badge fb-2">
            <i class="fas fa-users"></i>
            <div>
              <div class="avb-text">50+ Team Members</div>
              <div class="avb-sub">Across 8 Countries</div>
            </div>
          </div>
          <div class="av-card-main">
            <div class="av-brand-line">
              <div class="av-brand-dot"><i class="fas fa-code"></i></div>
              <div>
                <div class="av-brand-name">KawachTech Solutions</div>
                <div class="av-brand-sub">Building the Future, One Line at a Time</div>
              </div>
            </div>
            <div class="av-stat-row">
              <div class="av-stat-box">
                <div class="av-stat-num">150<span>+</span></div>
                <div class="av-stat-lbl">Projects</div>
              </div>
              <div class="av-stat-box">
                <div class="av-stat-num">98<span>%</span></div>
                <div class="av-stat-lbl">Satisfaction</div>
              </div>
              <div class="av-stat-box">
                <div class="av-stat-num">10<span>yr</span></div>
                <div class="av-stat-lbl">Experience</div>
              </div>
            </div>
            <div class="av-progress-row">
              <div class="av-progress-label"><span>Client Retention</span><span>96%</span></div>
              <div class="av-progress-bar-bg"><div class="av-progress-fill" style="width:96%;"></div></div>
            </div>
            <div class="av-progress-row">
              <div class="av-progress-label"><span>On-Time Delivery</span><span>98%</span></div>
              <div class="av-progress-bar-bg"><div class="av-progress-fill" style="width:98%;"></div></div>
            </div>
            <div class="av-progress-row">
              <div class="av-progress-label"><span>Client Satisfaction</span><span>99%</span></div>
              <div class="av-progress-bar-bg"><div class="av-progress-fill" style="width:99%;"></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── WHO WE ARE ── -->
<section class="whoweare-section">
  <div class="container">
    <div class="row align-items-center g-5">
      <!-- visual left -->
      <div class="col-lg-5">
        <div class="who-visual">
          <div class="who-img-card">
            <div class="who-img-inner">
              <div class="who-img-logo">INNOVATE<span>TECH</span></div>
              <p class="who-img-tagline">
                Founded in 2014, we've grown from a 3-person startup<br>into a global software powerhouse.
              </p>
              <div class="who-year-badge">Est. 2014 · 10 Years Strong</div>
            </div>
            <div class="who-overlay-stat">
              <div class="wos-item">
                <div class="wos-num">40<span>+</span></div>
                <div class="wos-lbl">Industries</div>
              </div>
              <div class="wos-item">
                <div class="wos-num">20<span>+</span></div>
                <div class="wos-lbl">Countries</div>
              </div>
              <div class="wos-item">
                <div class="wos-num">$50M<span>+</span></div>
                <div class="wos-lbl">Client Revenue</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- text right -->
      <div class="col-lg-7">
        <div class="who-label">Our Story</div>
        <h2 class="who-title">We Build Software That<br>Drives Real Results</h2>
        <p class="who-desc">
          KawachTech Solutions was founded in 2014 with a clear mission — to make enterprise-grade software development accessible to businesses of all sizes. What started as a small team of three developers has grown into a 50+ member powerhouse serving clients across 20+ countries.
        </p>
        <p class="who-desc">
          We believe technology is only as powerful as the human needs it serves. That's why we pair deep technical expertise with genuine business understanding — listening first, building second, and measuring success by our clients' outcomes.
        </p>
        <div class="who-highlights">
          <div class="who-highlight-item">
            <div class="whi-icon"><i class="fas fa-check"></i></div>
            <div class="whi-text">
              <strong>Agile & Transparent Process</strong>
              <span>Weekly sprint reviews, real-time dashboards, and no surprises.</span>
            </div>
          </div>
          <div class="who-highlight-item">
            <div class="whi-icon"><i class="fas fa-shield-alt"></i></div>
            <div class="whi-text">
              <strong>Security-First Development</strong>
              <span>Every product ships with enterprise-grade security baked in.</span>
            </div>
          </div>
          <div class="who-highlight-item">
            <div class="whi-icon"><i class="fas fa-headset"></i></div>
            <div class="whi-text">
              <strong>Dedicated Post-Launch Support</strong>
              <span>We don't disappear after delivery. Your success is ongoing.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── MISSION / VISION / VALUES ── -->
<section class="mvv-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Mission, Vision &amp; Values</h2>
      <p class="section-subtitle">The principles that guide everything we build</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="mvv-card">
          <div class="mvv-icon"><i class="fas fa-bullseye"></i></div>
          <div class="mvv-title">Our Mission</div>
          <p class="mvv-desc">To empower businesses worldwide with innovative, reliable, and scalable software solutions that create measurable impact and drive sustainable growth.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mvv-card">
          <div class="mvv-icon"><i class="fas fa-eye"></i></div>
          <div class="mvv-title">Our Vision</div>
          <p class="mvv-desc">To be the world's most trusted technology partner — known for turning complex challenges into elegant digital solutions that stand the test of time.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mvv-card">
          <div class="mvv-icon"><i class="fas fa-heart"></i></div>
          <div class="mvv-title">Our Values</div>
          <p class="mvv-desc">Integrity, innovation, collaboration, and client obsession. We hold ourselves to the highest standards in everything — from code quality to communication.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TEAM ── -->
<section class="team-section" id="team">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Meet Our Team</h2>
      <p class="section-subtitle">The talented people behind every great product we ship</p>
    </div>
    <div class="row g-4">

      <div class="col-md-4 col-lg-2-custom col-6">
        <div class="team-card">
          <div class="team-avatar-wrap ta-bg-1">
            <div class="team-avatar-circle">AK</div>
            <div class="team-role-badge">Leadership</div>
          </div>
          <div class="team-body">
            <div class="team-name">Arjun Kapoor</div>
            <div class="team-role">CEO &amp; Co-Founder</div>
            <p class="team-bio">10+ years leading product strategy and scaling tech teams globally.</p>
            <div class="team-socials">
              <a href="#" class="team-social-link"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="team-social-link"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-6">
        <div class="team-card">
          <div class="team-avatar-wrap ta-bg-2">
            <div class="team-avatar-circle">SR</div>
            <div class="team-role-badge">Leadership</div>
          </div>
          <div class="team-body">
            <div class="team-name">Sofia Russo</div>
            <div class="team-role">CTO &amp; Co-Founder</div>
            <p class="team-bio">Full-stack architect with deep expertise in cloud infrastructure and AI.</p>
            <div class="team-socials">
              <a href="#" class="team-social-link"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="team-social-link"><i class="fab fa-github"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-6">
        <div class="team-card">
          <div class="team-avatar-wrap ta-bg-3">
            <div class="team-avatar-circle">MP</div>
            <div class="team-role-badge">Design</div>
          </div>
          <div class="team-body">
            <div class="team-name">Marcus Park</div>
            <div class="team-role">Head of Design</div>
            <p class="team-bio">Award-winning UI/UX designer crafting seamless digital experiences.</p>
            <div class="team-socials">
              <a href="#" class="team-social-link"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="team-social-link"><i class="fab fa-dribbble"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-6">
        <div class="team-card">
          <div class="team-avatar-wrap ta-bg-4">
            <div class="team-avatar-circle">PN</div>
            <div class="team-role-badge">Engineering</div>
          </div>
          <div class="team-body">
            <div class="team-name">Priya Nair</div>
            <div class="team-role">Lead AI Engineer</div>
            <p class="team-bio">ML specialist with published research in NLP and predictive analytics.</p>
            <div class="team-socials">
              <a href="#" class="team-social-link"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="team-social-link"><i class="fab fa-github"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-6">
        <div class="team-card">
          <div class="team-avatar-wrap ta-bg-5">
            <div class="team-avatar-circle">DW</div>
            <div class="team-role-badge">Engineering</div>
          </div>
          <div class="team-body">
            <div class="team-name">Daniel Wu</div>
            <div class="team-role">Cloud Architect</div>
            <p class="team-bio">AWS &amp; GCP certified expert building resilient, cost-optimised infrastructure.</p>
            <div class="team-socials">
              <a href="#" class="team-social-link"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="team-social-link"><i class="fab fa-github"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-6">
        <div class="team-card">
          <div class="team-avatar-wrap ta-bg-6">
            <div class="team-avatar-circle">LA</div>
            <div class="team-role-badge">Growth</div>
          </div>
          <div class="team-body">
            <div class="team-name">Lena Adler</div>
            <div class="team-role">VP of Client Success</div>
            <p class="team-bio">Ensures every client relationship delivers lasting value and measurable ROI.</p>
            <div class="team-socials">
              <a href="#" class="team-social-link"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="team-social-link"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── TIMELINE ── -->
<section class="timeline-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Our Journey</h2>
      <p class="section-subtitle">A decade of growth, milestones, and impact</p>
    </div>
    <ul class="timeline">

      <li class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-card">
          <div class="timeline-year">2014 — Founded</div>
          <div class="timeline-event">Company Established</div>
          <p class="timeline-detail">KawachTech Solutions launched from a co-working space in New York with a team of three and a vision to democratise enterprise software.</p>
        </div>
      </li>

      <li class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-card">
          <div class="timeline-year">2016 — First Milestone</div>
          <div class="timeline-event">Reached 25 Clients</div>
          <p class="timeline-detail">After two years of bootstrapped growth, we crossed our first 25-client milestone and expanded the team to 12 engineers.</p>
        </div>
      </li>

      <li class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-card">
          <div class="timeline-year">2018 — AI Division</div>
          <div class="timeline-event">Launched AI &amp; ML Practice</div>
          <p class="timeline-detail">Established a dedicated AI &amp; Machine Learning division, delivering our first predictive analytics product for a Fortune 500 client.</p>
        </div>
      </li>

      <li class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-card">
          <div class="timeline-year">2020 — Global Expansion</div>
          <div class="timeline-event">Offices in 3 Continents</div>
          <p class="timeline-detail">Opened offices in London and Singapore, enabling us to serve clients across EMEA and APAC with localised expertise.</p>
        </div>
      </li>

      <li class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-card">
          <div class="timeline-year">2022 — Recognition</div>
          <div class="timeline-event">Named Top Software Company</div>
          <p class="timeline-detail">Recognised by Clutch and G2 as one of the top software development companies globally, with a 4.9-star client rating.</p>
        </div>
      </li>

      <li class="timeline-item">
        <div class="timeline-dot"></div>
        <div class="timeline-card">
          <div class="timeline-year">2024 — Today</div>
          <div class="timeline-event">150+ Projects &amp; Counting</div>
          <p class="timeline-detail">With 50+ team members, 150+ completed projects, and clients in 20+ countries, we're just getting started on our next decade of impact.</p>
        </div>
      </li>

    </ul>
  </div>
</section>

<!-- ── TECH STACK ── -->
<section class="tech-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Our Technology Stack</h2>
      <p class="section-subtitle">Best-in-class tools and frameworks powering every solution</p>
    </div>
    <div class="tech-grid">
      <div class="tech-pill"><i class="fab fa-react"></i> React</div>
      <div class="tech-pill"><i class="fab fa-node-js"></i> Node.js</div>
      <div class="tech-pill"><i class="fab fa-python"></i> Python</div>
      <div class="tech-pill"><i class="fab fa-aws"></i> AWS</div>
      <div class="tech-pill"><i class="fab fa-docker"></i> Docker</div>
      <div class="tech-pill"><i class="fas fa-database"></i> PostgreSQL</div>
      <div class="tech-pill"><i class="fab fa-js-square"></i> TypeScript</div>
      <div class="tech-pill"><i class="fas fa-cloud"></i> Google Cloud</div>
      <div class="tech-pill"><i class="fab fa-microsoft"></i> Azure</div>
      <div class="tech-pill"><i class="fas fa-cube"></i> Kubernetes</div>
      <div class="tech-pill"><i class="fas fa-fire"></i> TensorFlow</div>
      <div class="tech-pill"><i class="fab fa-vuejs"></i> Vue.js</div>
      <div class="tech-pill"><i class="fab fa-angular"></i> Angular</div>
      <div class="tech-pill"><i class="fas fa-mobile-alt"></i> React Native</div>
      <div class="tech-pill"><i class="fas fa-infinity"></i> CI/CD</div>
    </div>
  </div>
</section>

<!-- ── AWARDS ── -->
<section class="awards-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Awards &amp; Recognition</h2>
      <p class="section-subtitle">Proud to be recognised by the world's top industry bodies</p>
    </div>
    <div class="row g-4">
      <div class="col-6 col-md-3">
        <div class="award-card">
          <div class="award-icon"><i class="fas fa-trophy"></i></div>
          <div class="award-title">Top Software Development Company</div>
          <div class="award-org">Clutch Global</div>
          <div class="award-year">2022, 2023, 2024</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="award-card">
          <div class="award-icon"><i class="fas fa-medal"></i></div>
          <div class="award-title">Best AI Solutions Provider</div>
          <div class="award-org">G2 Awards</div>
          <div class="award-year">2023 &amp; 2024</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="award-card">
          <div class="award-icon"><i class="fas fa-star"></i></div>
          <div class="award-title">Tech Innovator of the Year</div>
          <div class="award-org">Forbes Tech Council</div>
          <div class="award-year">2023</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="award-card">
          <div class="award-icon"><i class="fas fa-award"></i></div>
          <div class="award-title">Best Workplace in Tech</div>
          <div class="award-org">Built In</div>
          <div class="award-year">2024</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-banner">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center text-md-start g-3">
      <div class="col-md-auto">
        <p class="cta-banner-text mb-0">
          Ready to build something&nbsp;<span class="highlight">extraordinary together?</span>
        </p>
      </div>
      <div class="col-md-auto ms-md-4">
        <a href="#" class="btn-schedule">Schedule a Call</a>
      </div>
    </div>
  </div>
</section>

<!-- ── FOOTER ── -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
