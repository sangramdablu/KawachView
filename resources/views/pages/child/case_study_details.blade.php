<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

</head>
<body>

@include('layouts.navbar')

{{-- ═══════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════ --}}
<section class="cs-hero" id="top">
  <div class="container">
    <div class="row align-items-center g-5">

      {{-- Left Content --}}
      <div class="col-lg-7">
        <a href="{{ url('/case-studies') }}" class="cs-back-link">
          <i class="fas fa-arrow-left"></i> Back to Case Studies
        </a>
        <div class="cs-eyebrow">Case Study — Healthcare</div>
        <h1 class="cs-hero-title">
          Scalable Telehealth Platform for a Multi-State Healthcare Provider
        </h1>
        <p class="cs-hero-subtitle">
          How Kawach Technology built a HIPAA-compliant telemedicine platform that reduced patient wait times by 40%, automated billing workflows, and scaled to thousands of concurrent users.
        </p>

        <div class="cs-info-pills">
          <span class="cs-pill"><i class="fas fa-industry"></i> Healthcare</span>
          <span class="cs-pill"><i class="fas fa-globe"></i> USA</span>
          <span class="cs-pill"><i class="fas fa-code"></i> Web + Mobile</span>
          <span class="cs-pill"><i class="fas fa-clock"></i> 6 Months</span>
          <span class="cs-pill"><i class="fas fa-users"></i> Enterprise</span>
          <span class="cs-pill"><i class="fas fa-shield-alt"></i> HIPAA Compliant</span>
        </div>

        <div class="cs-hero-ctas">
          <button class="btn-cs-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
            Book a Consultation
          </button>
          <a href="#cases-overview" class="btn-cs-outline">Explore Project</a>
        </div>
      </div>

      {{-- Right Stats Card --}}
      <div class="col-lg-5 d-none d-lg-block">
        <div class="cs-hero-stat-card">
          <div class="cs-hero-stat-grid">
            <div class="cs-stat-box">
              <div class="cs-stat-num">40<span>%</span></div>
              <div class="cs-stat-lbl">Faster Patient Scheduling</div>
            </div>
            <div class="cs-stat-box">
              <div class="cs-stat-num">25<span>%</span></div>
              <div class="cs-stat-lbl">Cost Savings</div>
            </div>
            <div class="cs-stat-divider"></div>
            <div class="cs-stat-box">
              <div class="cs-stat-num">99<span>.9%</span></div>
              <div class="cs-stat-lbl">Platform Uptime</div>
            </div>
            <div class="cs-stat-box">
              <div class="cs-stat-num">9<span>mo</span></div>
              <div class="cs-stat-lbl">Positive ROI</div>
            </div>
            <div style="grid-column:1/-1;padding-top:16px;border-top:1px solid rgba(255,255,255,.1);">
              <div style="display:flex;justify-content:space-between;align-items:center;">
                <div style="text-align:center;">
                  <div style="font-size:.68rem;color:#8bacc8;">Start</div>
                  <div style="font-size:.8rem;font-weight:700;color:#fff;">Jan 2024</div>
                </div>
                <div style="flex:1;height:1px;background:rgba(255,255,255,.15);margin:0 10px;position:relative;">
                  <div style="width:100%;height:3px;background:linear-gradient(90deg,#1a73e8,#00c896);border-radius:2px;margin-top:-1px;"></div>
                </div>
                <div style="text-align:center;">
                  <div style="font-size:.68rem;color:#8bacc8;">Launch</div>
                  <div style="font-size:.8rem;font-weight:700;color:#fff;">Jul 2024</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     STICKY NAVIGATION
═══════════════════════════════════════════ --}}
<nav class="cs-sticky-nav" id="cases-overview">
  <div class="container py-1">
    <div class="cs-nav-tabs">
      <a href="#sec-overview"   class="cs-nav-tab active">Overview</a>
      <a href="#sec-challenge"  class="cs-nav-tab">Challenge</a>
      <a href="#sec-solution"   class="cs-nav-tab">Solution</a>
      <a href="#sec-features"   class="cs-nav-tab">Features</a>
      <a href="#sec-tech"       class="cs-nav-tab">Tech Stack</a>
      <a href="#sec-process"    class="cs-nav-tab">Process</a>
      <a href="#sec-results"    class="cs-nav-tab">Results</a>
      <a href="#sec-faq"        class="cs-nav-tab">FAQ</a>
    </div>
    <button class="cs-nav-cta" data-bs-toggle="modal" data-bs-target="#getQuoteModal">
      Start Your Project
    </button>
  </div>
</nav>

{{-- ═══════════════════════════════════════════
     1. CLIENT OVERVIEW
═══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-overview">
  <div class="container">
    <div class="row g-5 align-items-start">

      <div class="col-lg-5">
        <div class="side-line"></div>
        <div class="section-eyebrow">Client Overview</div>
        <h2 class="section-heading">Who Is the Client?</h2>
        <p class="section-sub mb-4">
          A rapidly growing multi-state healthcare provider operating across 12 US states needed a modern telehealth platform to replace fragmented legacy systems and scale remote patient care operations.
        </p>
        <p class="section-sub">
          With over 3,000 doctors and 500,000 active patients, they required a HIPAA-compliant, cloud-native solution capable of handling high-concurrency video consultations, real-time EHR synchronisation, and automated billing workflows.
        </p>
      </div>

      <div class="col-lg-7">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="co-info-card h-100">
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-industry"></i></div>
                <div><div class="co-item-label">Industry</div><div class="co-item-val">Healthcare / Telemedicine</div></div>
              </div>
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-users"></i></div>
                <div><div class="co-item-label">Business Size</div><div class="co-item-val">Enterprise (3,000+ Doctors)</div></div>
              </div>
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-globe-americas"></i></div>
                <div><div class="co-item-label">Location</div><div class="co-item-val">United States (12 States)</div></div>
              </div>
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-layer-group"></i></div>
                <div><div class="co-item-label">Business Model</div><div class="co-item-val">B2C + B2B Healthcare SaaS</div></div>
              </div>
              <div class="co-item">
                <div class="co-item-icon"><i class="fas fa-clock"></i></div>
                <div><div class="co-item-label">Project Duration</div><div class="co-item-val">6 Months</div></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="co-info-card h-100">
              <div style="font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.5px;color:var(--red);margin-bottom:12px;">Existing Challenges</div>
              <ul class="co-challenge-list">
                <li><i class="fas fa-times-circle"></i> Fragmented systems across 12 states with no centralised data</li>
                <li><i class="fas fa-times-circle"></i> Poor patient experience — average 45-minute wait times</li>
                <li><i class="fas fa-times-circle"></i> No unified appointment management system</li>
                <li><i class="fas fa-times-circle"></i> Manual, error-prone billing workflows</li>
                <li><i class="fas fa-times-circle"></i> HIPAA compliance gaps and security risks</li>
                <li><i class="fas fa-times-circle"></i> No telemedicine capability at all</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     2. CHALLENGE
═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt" id="sec-challenge">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">The Challenge</div>
      <h2 class="section-heading">What We Were Up Against</h2>
      <p class="section-sub mx-auto" style="max-width:580px;">Solving healthcare's most complex technical and compliance challenges at enterprise scale.</p>
    </div>

    <div class="challenge-grid">
      <div class="challenge-card">
        <div class="challenge-card-icon cc-red"><i class="fas fa-database"></i></div>
        <h4>Fragmented Data Systems</h4>
        <p>Patient data was siloed across 12 incompatible legacy EHR systems with no unified API layer, making cross-state care coordination impossible. Data migration alone required processing 18M+ patient records without downtime.</p>
      </div>
      <div class="challenge-card">
        <div class="challenge-card-icon cc-yellow"><i class="fas fa-shield-alt"></i></div>
        <h4>HIPAA Compliance at Scale</h4>
        <p>Every element of the platform — storage, transit, video streams, audit logs — required HIPAA-compliant architecture. Zero shortcuts could be made while ensuring low-latency performance for thousands of concurrent video consultations.</p>
      </div>
      <div class="challenge-card">
        <div class="challenge-card-icon cc-blue"><i class="fas fa-video"></i></div>
        <h4>Real-Time Video at Scale</h4>
        <p>Supporting 5,000+ simultaneous video consultations with sub-100ms latency, automatic failover, and mobile compatibility across iOS, Android, and Web — without sacrificing video quality or call reliability.</p>
      </div>
      <div class="challenge-card">
        <div class="challenge-card-icon cc-purple"><i class="fas fa-file-invoice-dollar"></i></div>
        <h4>Complex Billing Automation</h4>
        <p>Healthcare billing involves insurance verification, ICD-10 coding, claim submission, co-pay calculation, and denial management — all requiring real-time integration with 14 different insurance providers and payment gateways.</p>
      </div>
      <div class="challenge-card">
        <div class="challenge-card-icon cc-green"><i class="fas fa-expand-arrows-alt"></i></div>
        <h4>Scalability Under Peak Load</h4>
        <p>Morning appointment rushes created unpredictable 10× traffic spikes. The system needed elastic auto-scaling that could provision capacity in under 30 seconds without cold-start latency issues.</p>
      </div>
      <div class="challenge-card">
        <div class="challenge-card-icon cc-red"><i class="fas fa-mobile-alt"></i></div>
        <h4>Cross-Platform UX</h4>
        <p>Patients ranged from 18 to 85 years old across varied devices and internet speeds. The UX had to be intuitive for first-time users on 3G connections while remaining feature-rich for power users on desktop.</p>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     GOALS
═══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-goals">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5">
        <div class="side-line"></div>
        <div class="section-eyebrow">Goals & Objectives</div>
        <h2 class="section-heading">What Success Looked Like</h2>
        <p class="section-sub">Clear, measurable objectives defined at the outset. Every technical decision was evaluated against these targets.</p>
      </div>
      <div class="col-lg-7">
        <div class="row g-3">
          @php
          $goals = [
            ['icon'=>'fas fa-user-clock','color'=>'cc-blue','title'=>'Reduce Patient Wait Time','desc'=>'Cut average appointment wait time from 45 minutes to under 15 minutes through smart scheduling.'],
            ['icon'=>'fas fa-chart-line','color'=>'cc-green','title'=>'Increase Doctor Productivity','desc'=>'Enable each doctor to see 40% more patients per day via streamlined digital workflows.'],
            ['icon'=>'fas fa-cloud','color'=>'cc-purple','title'=>'Cloud-Native Infrastructure','desc'=>'Build on AWS with auto-scaling, 99.9% uptime SLA, and full disaster recovery capability.'],
            ['icon'=>'fas fa-lock','color'=>'cc-yellow','title'=>'Full HIPAA Compliance','desc'=>'Pass all HIPAA security audits and achieve SOC 2 Type II certification within 6 months.'],
          ];
          @endphp
          @foreach($goals as $g)
          <div class="col-sm-6">
            <div class="challenge-card h-100">
              <div class="challenge-card-icon {{ $g['color'] }}"><i class="{{ $g['icon'] }}"></i></div>
              <h4>{{ $g['title'] }}</h4>
              <p>{{ $g['desc'] }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     3. SOLUTION
═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt" id="sec-solution">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5">
        <div class="side-line"></div>
        <div class="section-eyebrow">Our Solution</div>
        <h2 class="section-heading">How We Built It</h2>
        <div class="solution-body">
          <p>Kawach Technology designed a cloud-native, microservices-based telehealth platform built from the ground up for HIPAA compliance, elastic scalability, and exceptional patient experience.</p>
          <p>We began with a 3-week discovery sprint — embedded with the client's clinical and operations teams — to map every patient journey, identify integration touchpoints with existing EHR systems, and define the infrastructure architecture.</p>
          <h4>Architecture Strategy</h4>
          <p>The platform is built on a microservices architecture deployed on AWS ECS Fargate, ensuring each service (scheduling, video, billing, notifications) scales independently based on real-time demand. A GraphQL API gateway unifies 14 backend services into a single, efficient data layer.</p>
          <h4>UX Approach</h4>
          <p>We conducted 40+ user interviews across patient demographics (18–85 age range). The UI follows a progressive disclosure model — complex features revealed only when needed — resulting in a 94% task completion rate in usability testing.</p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="section-eyebrow mb-3">Key Modules Delivered</div>
        <div class="solution-modules">
          @php
          $modules = [
            ['icon'=>'fas fa-video','name'=>'Video Consultation Engine','desc'=>'WebRTC-based with automatic fallback, recording, and screen share'],
            ['icon'=>'fas fa-calendar-check','name'=>'Smart Scheduling','desc'=>'AI-powered slot suggestions based on doctor availability and patient history'],
            ['icon'=>'fas fa-user-shield','name'=>'Patient Portal','desc'=>'Complete patient profile, history, prescriptions, and test results'],
            ['icon'=>'fas fa-file-medical-alt','name'=>'EHR Integration','desc'=>'Real-time bidirectional sync with Epic, Cerner, and HL7 FHIR'],
            ['icon'=>'fas fa-file-invoice-dollar','name'=>'Automated Billing','desc'=>'Insurance verification, ICD-10 coding, and claim submission pipeline'],
            ['icon'=>'fas fa-chart-bar','name'=>'Analytics Dashboard','desc'=>'Real-time KPIs for hospital admins, doctors, and operations teams'],
            ['icon'=>'fas fa-bell','name'=>'Smart Notifications','desc'=>'Omnichannel alerts via SMS, email, push, and in-app messaging'],
            ['icon'=>'fas fa-user-cog','name'=>'Admin Control Panel','desc'=>'Multi-role access, audit logs, compliance reports, and system health'],
          ];
          @endphp
          @foreach($modules as $m)
          <div class="sol-module">
            <div class="sol-module-icon"><i class="{{ $m['icon'] }}"></i></div>
            <div>
              <div class="sol-module-name">{{ $m['name'] }}</div>
              <div class="sol-module-desc">{{ $m['desc'] }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     4. FEATURES
═══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-features">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Features Developed</div>
      <h2 class="section-heading">What We Built</h2>
      <p class="section-sub mx-auto" style="max-width:520px;">Every feature was designed around real clinical workflows and validated through user testing with doctors and patients.</p>
    </div>

    <div class="features-grid">
      @php
      $features = [
        ['icon'=>'fas fa-video','title'=>'HD Video Consultation','desc'=>'WebRTC-powered consultations with recording, screen share, virtual waiting room, and automatic quality adaptation based on bandwidth.'],
        ['icon'=>'fas fa-calendar-alt','title'=>'Appointment Scheduling','desc'=>'Multi-doctor calendar, real-time slot availability, patient self-booking, automated reminders, and no-show management.'],
        ['icon'=>'fas fa-heartbeat','title'=>'Patient Health Portal','desc'=>'Complete medical history, prescription management, lab results, vaccination records, and care plan tracking — all in one place.'],
        ['icon'=>'fas fa-file-medical','title'=>'EHR Integration','desc'=>'Bidirectional real-time sync with Epic, Cerner, Athena, and any HL7 FHIR-compatible system. Zero data duplication.'],
        ['icon'=>'fas fa-file-invoice','title'=>'Automated Billing System','desc'=>'Insurance eligibility verification, ICD-10/CPT code auto-suggestion, claim submission, ERA processing, and patient invoicing.'],
        ['icon'=>'fas fa-chart-pie','title'=>'Analytics Dashboard','desc'=>'Live KPIs for revenue, patient throughput, appointment volume, no-show rates, and doctor performance across all locations.'],
        ['icon'=>'fas fa-bell','title'=>'Notification System','desc'=>'HIPAA-compliant omnichannel notifications via SMS, email, push, and in-app. Appointment reminders cut no-shows by 35%.'],
        ['icon'=>'fas fa-user-lock','title'=>'Authentication & Security','desc'=>'Multi-factor authentication, role-based access control, session management, and complete HIPAA audit trail logging.'],
        ['icon'=>'fas fa-robot','title'=>'AI Clinical Notes','desc'=>'Ambient AI transcribes consultations and generates structured clinical notes — saving doctors 45 minutes of documentation daily.'],
        ['icon'=>'fas fa-mobile-alt','title'=>'Mobile Apps (iOS + Android)','desc'=>'Native apps with offline capability, biometric login, push notifications, and optimised for 3G connections.'],
      ];
      @endphp
      @foreach($features as $f)
      <div class="feature-card">
        <div class="feature-icon"><i class="{{ $f['icon'] }}"></i></div>
        <div class="feature-title">{{ $f['title'] }}</div>
        <p class="feature-desc">{{ $f['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     5. TECH STACK
═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt" id="sec-tech">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4">
        <div class="side-line"></div>
        <div class="section-eyebrow">Technology Stack</div>
        <h2 class="section-heading">Built With the Right Tools</h2>
        <p class="section-sub">We selected every technology based on HIPAA compliance requirements, scalability needs, and long-term maintainability. No trend-chasing — only battle-tested solutions.</p>
      </div>
      <div class="col-lg-8">
        <div class="tech-stack-grid">
          @php
          $stack = [
            'Frontend'   => ['React.js', 'Next.js', 'TypeScript', 'Tailwind CSS'],
            'Backend'    => ['Node.js', 'Express.js', 'Python (FastAPI)', 'GraphQL'],
            'Database'   => ['PostgreSQL', 'MongoDB', 'Redis', 'Elasticsearch'],
            'Cloud/DevOps'=>['AWS ECS Fargate', 'Docker', 'Kubernetes', 'GitHub Actions'],
            'Video'      => ['WebRTC', 'Twilio Video', 'Agora.io'],
            'APIs'       => ['HL7 FHIR', 'Epic API', 'Stripe', 'Google Calendar'],
            'Security'   => ['OAuth 2.0', 'JWT', 'AES-256', 'AWS KMS'],
            'Monitoring' => ['Datadog', 'Grafana', 'PagerDuty', 'Sentry'],
          ];
          @endphp
          @foreach($stack as $cat => $items)
          <div class="tech-category-card">
            <div class="tech-cat-label">{{ $cat }}</div>
            <div class="tech-pill-wrap">
              @foreach($items as $item)
              <span class="tech-pill"><i class="fas fa-check"></i> {{ $item }}</span>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     6. PROCESS / TIMELINE
═══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-process">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4">
        <div class="side-line"></div>
        <div class="section-eyebrow">Development Process</div>
        <h2 class="section-heading">How We Delivered It</h2>
        <p class="section-sub">6-month Agile delivery with 2-week sprints, weekly client demos, and continuous deployment. Full transparency at every stage.</p>
        <div style="margin-top:24px;background:#e8f1fd;border-radius:10px;padding:16px;">
          <div style="font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.5px;color:var(--primary-blue);margin-bottom:8px;">Total Timeline</div>
          <div style="font-size:1.6rem;font-family:'Nunito',sans-serif;font-weight:900;color:var(--text-dark);">26 Weeks</div>
          <div style="font-size:.78rem;color:var(--text-muted);margin-top:4px;">Discovery → Live Production</div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="process-timeline">
          @php
          $steps = [
            ['badge'=>'Weeks 1–3','title'=>'Discovery & Requirements','desc'=>'Embedded with client teams across 3 hospitals. Mapped 24 patient journeys, 14 EHR integration points, and defined the full HIPAA compliance checklist. Delivered a 180-page Technical Requirements Specification.'],
            ['badge'=>'Weeks 4–5','title'=>'Architecture & UI/UX Design','desc'=>'Designed microservices architecture, AWS infrastructure diagram, and GraphQL schema. Conducted 40 user interviews. Delivered 120+ Figma screens validated with real patients and doctors.'],
            ['badge'=>'Weeks 6–14','title'=>'Core Platform Development','desc'=>'Built patient portal, doctor dashboard, appointment engine, video consultation module, and notification system. 12 backend microservices deployed on AWS ECS with full CI/CD pipeline.'],
            ['badge'=>'Weeks 15–18','title'=>'EHR & Billing Integration','desc'=>'Integrated with Epic, Cerner, and Athena via HL7 FHIR. Built the full automated billing pipeline including insurance verification, ICD-10 auto-coding, and claim submission to 14 payers.'],
            ['badge'=>'Weeks 19–22','title'=>'Security Audit & HIPAA Compliance','desc'=>'Third-party penetration testing, HIPAA risk assessment, AES-256 encryption implementation, complete audit trail logging, BAA signing with all vendors. Passed all compliance checks.'],
            ['badge'=>'Weeks 23–26','title'=>'QA, UAT & Go-Live','desc'=>'12,000+ automated test cases, load testing to 8,000 concurrent users, 6-week UAT with 200 real doctors and patients. Phased rollout across 3 states before full national launch.'],
          ];
          @endphp
          @foreach($steps as $i => $s)
          <div class="process-step">
            <div class="process-step-dot">{{ $i + 1 }}</div>
            <div class="process-step-badge">{{ $s['badge'] }}</div>
            <div class="process-step-title">{{ $s['title'] }}</div>
            <p class="process-step-desc">{{ $s['desc'] }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     SECURITY & COMPLIANCE
═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Security & Compliance</div>
      <h2 class="section-heading">Built for Healthcare's Strictest Standards</h2>
    </div>
    <div class="compliance-grid">
      @php
      $compliance = [
        ['icon'=>'fas fa-shield-alt','title'=>'HIPAA Compliant','desc'=>'Full HIPAA Security Rule compliance including PHI encryption, access controls, and audit logs'],
        ['icon'=>'fas fa-certificate','title'=>'SOC 2 Type II','desc'=>'Achieved SOC 2 Type II certification covering security, availability, and confidentiality'],
        ['icon'=>'fas fa-lock','title'=>'AES-256 Encryption','desc'=>'All PHI encrypted at rest and in transit using AES-256 and TLS 1.3'],
        ['icon'=>'fas fa-user-check','title'=>'Multi-Factor Auth','desc'=>'MFA required for all clinical staff with biometric support on mobile devices'],
        ['icon'=>'fas fa-clipboard-list','title'=>'Audit Trail','desc'=>'Immutable audit logs for every data access and modification event'],
        ['icon'=>'fas fa-sync','title'=>'Automated Backups','desc'=>'Point-in-time recovery with 99.99% data durability across 3 AWS availability zones'],
        ['icon'=>'fas fa-bug','title'=>'Penetration Tested','desc'=>'Third-party pen testing by CREST-certified firm with zero critical findings'],
        ['icon'=>'fas fa-handshake','title'=>'BAA Agreements','desc'=>'Signed Business Associate Agreements with all 14 vendor integrations'],
      ];
      @endphp
      @foreach($compliance as $c)
      <div class="compliance-item">
        <div class="compliance-icon"><i class="{{ $c['icon'] }}"></i></div>
        <div>
          <div class="compliance-title">{{ $c['title'] }}</div>
          <div class="compliance-desc">{{ $c['desc'] }}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     7. RESULTS
═══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-results">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Results / KPIs</div>
      <h2 class="section-heading">Measurable Impact</h2>
      <p class="section-sub mx-auto" style="max-width:520px;">Numbers measured at 6 months post-launch, independently verified by the client's operations team.</p>
    </div>

    <div class="results-kpi-grid">
      @php
      $kpis = [
        ['icon'=>'fas fa-user-clock','bg'=>'#e8f1fd','color'=>'var(--primary-blue)','num'=>'40%','label'=>'Reduction in Patient Wait Time'],
        ['icon'=>'fas fa-dollar-sign','bg'=>'#d4f5ec','color'=>'#00a87c','num'=>'25%','label'=>'Operational Cost Savings'],
        ['icon'=>'fas fa-server','bg'=>'#ede9fe','color'=>'#6d28d9','num'=>'99.9%','label'=>'Platform Uptime Achieved'],
        ['icon'=>'fas fa-chart-line','bg'=>'#fff4d6','color'=>'#b8860b','num'=>'9mo','label'=>'Time to Positive ROI'],
        ['icon'=>'fas fa-user-md','bg'=>'#ffe2e8','color'=>'var(--red)','num'=>'40%','label'=>'More Patients Per Doctor/Day'],
        ['icon'=>'fas fa-calendar-times','bg'=>'#d4f5ec','color'=>'#00a87c','num'=>'35%','label'=>'Reduction in No-Shows'],
        ['icon'=>'fas fa-star','bg'=>'#fff4d6','color'=>'#b8860b','num'=>'4.8★','label'=>'Patient App Store Rating'],
        ['icon'=>'fas fa-clock','bg'=>'#e8f1fd','color'=>'var(--primary-blue)','num'=>'45min','label'=>'Daily Documentation Saved Per Doctor'],
      ];
      @endphp
      @foreach($kpis as $k)
      <div class="kpi-card">
        <div class="kpi-icon" style="background:{{ $k['bg'] }};"><i class="{{ $k['icon'] }}" style="color:{{ $k['color'] }};font-size:1.1rem;"></i></div>
        <div class="kpi-num" style="color:{{ $k['color'] }};">{{ $k['num'] }}</div>
        <div class="kpi-label">{{ $k['label'] }}</div>
      </div>
      @endforeach
    </div>

    {{-- Before / After --}}
    <div class="mt-5">
      <h3 class="section-heading mb-4" style="font-size:1.4rem;">Before vs. After</h3>
      <div class="table-responsive">
        <table class="ba-table">
          <thead>
            <tr>
              <th style="width:40%;"><i class="fas fa-times-circle ba-before-icon"></i> Before — Legacy Systems</th>
              <th style="width:60%;"><i class="fas fa-check-circle ba-after-icon"></i> After — Kawach Platform</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>12 isolated EHR systems across states</td><td>Unified cloud platform with real-time EHR sync</td></tr>
            <tr><td>45-minute average patient wait time</td><td>Under 15-minute wait time — 67% improvement</td></tr>
            <tr><td>Manual billing with 18% error rate</td><td>Automated billing with 0.3% error rate</td></tr>
            <tr><td>No telemedicine capability</td><td>5,000+ concurrent HD video consultations supported</td></tr>
            <tr><td>HIPAA compliance gaps — failed 3 audits</td><td>Full HIPAA compliance + SOC 2 Type II certified</td></tr>
            <tr><td>Doctors spent 3 hrs/day on documentation</td><td>AI notes cut documentation to 15 min/day</td></tr>
            <tr><td>No patient mobile app</td><td>4.8★ rated apps on iOS & Android</td></tr>
            <tr><td>Zero real-time analytics</td><td>Live dashboards across all 12 states</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     TESTIMONIAL
═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="cs-testimonial-block">
          <div class="cs-quote-mark">"</div>
          <div class="cs-testimonial-text">
            Kawach Technology didn't just deliver software — they transformed how we deliver healthcare. From the first discovery call to go-live, the team demonstrated a rare combination of deep technical expertise and genuine understanding of clinical workflows. Our doctors are seeing 40% more patients, our billing errors dropped from 18% to under 1%, and we finally have a platform we're proud to put in front of patients. The ROI was clear within the first 9 months.
          </div>
          <div class="cs-author">
            <div class="cs-author-avatar" style="background:linear-gradient(135deg,#1a73e8,#1565c0);">DR</div>
            <div>
              <div class="cs-author-name">Dr. Robert Hartman</div>
              <div class="cs-author-role">Chief Medical Officer, MedCore Health Network</div>
              <div class="cs-author-stars">★★★★★</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     GALLERY (Screenshots)
═══════════════════════════════════════════ --}}
<section class="cs-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Screenshots & Gallery</div>
      <h2 class="section-heading">See It in Action</h2>
    </div>
    <div class="cs-gallery-grid">
      <div class="cs-gallery-item"><div class="cs-gallery-mock gm-1"><i class="fas fa-desktop"></i></div></div>
      <div class="cs-gallery-item"><div class="cs-gallery-mock gm-2"><i class="fas fa-video"></i></div></div>
      <div class="cs-gallery-item"><div class="cs-gallery-mock gm-3"><i class="fas fa-chart-bar"></i></div></div>
      <div class="cs-gallery-item"><div class="cs-gallery-mock gm-4"><i class="fas fa-mobile-alt"></i></div></div>
      <div class="cs-gallery-item"><div class="cs-gallery-mock gm-5"><i class="fas fa-file-medical"></i></div></div>
      <div class="cs-gallery-item"><div class="cs-gallery-mock gm-6"><i class="fas fa-calendar-check"></i></div></div>
    </div>
    <p class="text-center mt-3" style="font-size:.8rem;color:var(--text-muted);">Screenshots replaced with design mockups. Actual product screenshots under NDA.</p>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     ACHIEVEMENTS
═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt">
  <div class="container">
    <div class="row g-5 align-items-start">
      <div class="col-lg-4">
        <div class="side-line"></div>
        <div class="section-eyebrow">Key Achievements</div>
        <h2 class="section-heading">Why This Project Matters</h2>
        <p class="section-sub">Beyond the numbers — this platform has improved healthcare access for patients in underserved communities across 12 US states who previously had no access to specialist care.</p>
      </div>
      <div class="col-lg-8">
        <div class="achievement-list">
          @php
          $achievements = [
            ['title'=>'HIPAA-Compliant from Day One','desc'=>'Not retrofitted — designed with HIPAA as a core architectural constraint from the first line of code.'],
            ['title'=>'Zero Downtime Migration','desc'=>'Migrated 18 million patient records from 12 legacy systems to the unified platform with zero service interruption.'],
            ['title'=>'Multi-State Rollout in 6 Weeks','desc'=>'After initial launch in 3 states, scaled to all 12 states with no additional infrastructure work required.'],
            ['title'=>'Cloud-Native Auto-Scaling','desc'=>'Handles 10× traffic spikes automatically — peak morning appointment rushes processed without latency.'],
            ['title'=>'Improved Rural Healthcare Access','desc'=>'Patients in rural counties now access specialist consultations within 24 hours vs. 6-week average travel-based wait.'],
            ['title'=>'AI-Powered Clinical Notes','desc'=>'Ambient AI documentation saves each doctor 45 minutes per day — equivalent to 3 extra patient appointments.'],
          ];
          @endphp
          @foreach($achievements as $a)
          <div class="achievement-item">
            <div class="ach-check"><i class="fas fa-check" style="font-size:.65rem;"></i></div>
            <div>
              <div class="ach-title">{{ $a['title'] }}</div>
              <div class="ach-desc">{{ $a['desc'] }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     FAQ
═══════════════════════════════════════════ --}}
<section class="cs-section" id="sec-faq">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="side-line"></div>
        <div class="section-eyebrow">FAQ</div>
        <h2 class="section-heading">Common Questions</h2>
        <p class="section-sub">Have more questions? <a href="#" data-bs-toggle="modal" data-bs-target="#scheduleModal" style="color:var(--primary-blue);font-weight:700;text-decoration:none;">Book a call</a> with our team.</p>
      </div>
      <div class="col-lg-8">
        <div class="cs-faq">
          @php
          $faqs = [
            ['q'=>'How much does telehealth platform development cost?','a'=>'Custom telehealth platforms typically range from $80,000 to $500,000+ depending on complexity, integrations, and compliance requirements. Our solutions start at $80K for a core MVP. We provide detailed fixed-price proposals after a discovery sprint. Contact us for a scoping call.'],
            ['q'=>'How do you ensure HIPAA compliance throughout development?','a'=>'HIPAA compliance is a first-class architectural concern — not an afterthought. We conduct a full HIPAA risk assessment at the start, sign BAAs with all vendors, implement AES-256 encryption for all PHI, enforce role-based access control, maintain immutable audit logs, and engage third-party pen testers before go-live.'],
            ['q'=>'What technologies are best for healthcare software?','a'=>'For healthcare platforms we recommend React/Next.js for frontend (proven performance and accessibility), Node.js or Python for backend (large talent pools, strong libraries), PostgreSQL for structured clinical data, AWS for cloud infrastructure (HIPAA-eligible services), and WebRTC or Twilio for video consultations.'],
            ['q'=>'Can the platform scale globally?','a'=>'Yes. The platform is built on AWS with multi-region deployment support. It is currently live across 12 US states and designed to support international expansion. Internationalisation (i18n), currency, and regional compliance (GDPR, PIPEDA) can be added as layers.'],
            ['q'=>'How long does healthcare app development take?','a'=>'A full-featured telehealth platform like MedCore\'s takes 5–7 months for enterprise scale. A focused MVP covering video consultation + scheduling + patient portal can be delivered in 10–14 weeks. We recommend a 2-week paid discovery sprint before committing to a full timeline.'],
            ['q'=>'Do you provide post-launch support and maintenance?','a'=>'Yes. We offer tiered support packages from basic bug-fix SLAs to full managed service with 24/7 monitoring, proactive performance optimisation, and ongoing feature development. MedCore is on our Managed Growth plan with a dedicated Kawach engineer embedded in their team.'],
          ];
          @endphp
          @foreach($faqs as $i => $f)
          <div class="cs-faq-item">
            <div class="cs-faq-q" onclick="toggleFaq(this)">
              {{ $f['q'] }}
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="cs-faq-a {{ $i === 0 ? 'show' : '' }}">{{ $f['a'] }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     RELATED CASE STUDIES
═══════════════════════════════════════════ --}}
<section class="cs-section cs-section-alt">
  <div class="container">
    <div class="text-center mb-5">
      <div class="side-line mx-auto"></div>
      <div class="section-eyebrow">Related Case Studies</div>
      <h2 class="section-heading">More Success Stories</h2>
    </div>
    <div class="row g-4">
      @php
      $related = [
        ['gradient'=>'linear-gradient(135deg,#1a237e,#283593)','icon'=>'fas fa-shopping-cart','badge'=>'E-Commerce','cat'=>'E-Commerce · Retail','title'=>'ShopNova: AI-Driven Platform Boosting Sales by 150%','metric'=>'150%','metric_lbl'=>'Revenue Growth'],
        ['gradient'=>'linear-gradient(135deg,#4a148c,#6a1b9a)','icon'=>'fas fa-chart-line','badge'=>'FinTech','cat'=>'FinTech · AI & ML','title'=>'PayShield: Real-Time Fraud Detection for 1M+ Daily Transactions','metric'=>'99.7%','metric_lbl'=>'Detection Accuracy'],
        ['gradient'=>'linear-gradient(135deg,#bf360c,#d84315)','icon'=>'fas fa-graduation-cap','badge'=>'EdTech','cat'=>'Education · Web & Mobile','title'=>'EduReach: Adaptive LMS with AI-Personalised Learning Paths','metric'=>'70%','metric_lbl'=>'Student Engagement'],
      ];
      @endphp
      @foreach($related as $r)
      <div class="col-md-4">
        <div class="related-card">
          <div class="related-visual" style="background:{{ $r['gradient'] }};">
            <i class="{{ $r['icon'] }}" style="font-size:2.2rem;color:rgba(255,255,255,.35);"></i>
            <span class="related-badge">{{ $r['badge'] }}</span>
          </div>
          <div class="related-body">
            <div class="related-category">{{ $r['cat'] }}</div>
            <div class="related-title">{{ $r['title'] }}</div>
            <div>
              <div class="related-metric">{{ $r['metric'] }}</div>
              <div class="related-metric-lbl">{{ $r['metric_lbl'] }}</div>
            </div>
            <a href="#" class="btn-related">View Case Study <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══════════════════════════════════════════
     CTA SECTION
═══════════════════════════════════════════ --}}
<section class="cs-cta-section">
  <div class="container">
    <div class="section-eyebrow" style="color:var(--accent-blue);margin-bottom:12px;">Ready to Get Started?</div>
    <h2 class="cs-cta-title">
      Looking for Custom <span class="highlight">Healthcare Software</span> Development?
    </h2>
    <p class="cs-cta-sub">
      Kawach Technology helps startups and enterprises build scalable, secure, and high-performance digital platforms. Let's turn your vision into the next success story.
    </p>
    <div class="cs-cta-btns">
      <button class="btn-cs-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
        <i class="fas fa-calendar-alt me-2"></i> Schedule a Call
      </button>
      <button class="btn-cs-outline" data-bs-toggle="modal" data-bs-target="#getQuoteModal">
        Get a Free Quote
      </button>
      <a href="{{ url('/case-studies') }}" class="btn-cs-outline">
        View All Case Studies
      </a>
    </div>
  </div>
</section>

{{-- FOOTER --}}
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  /* ── STICKY NAV ACTIVE STATE ── */
  const navTabs = document.querySelectorAll('.cs-nav-tab');
  const sections = document.querySelectorAll('section[id]');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navTabs.forEach(t => t.classList.remove('active'));
        const active = document.querySelector(`.cs-nav-tab[href="#${entry.target.id}"]`);
        if (active) active.classList.add('active');
      }
    });
  }, { threshold: 0.35 });

  sections.forEach(s => observer.observe(s));

  /* ── FAQ TOGGLE ── */
  function toggleFaq(el) {
    const answer = el.nextElementSibling;
    const isOpen = answer.classList.contains('show');
    document.querySelectorAll('.cs-faq-a.show').forEach(a => a.classList.remove('show'));
    document.querySelectorAll('.cs-faq-q.open').forEach(q => q.classList.remove('open'));
    if (!isOpen) {
      answer.classList.add('show');
      el.classList.add('open');
    }
  }

  /* ── SMOOTH SCROLL ── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
</script>
</body>
</html>