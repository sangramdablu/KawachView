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
<section class="services-hero-section">
  <div class="container">
    <div class="row align-items-center">
      <!-- left copy -->
      <div class="col-lg-6 col-md-7">
        <div class="hero-eyebrow">What We Offer</div>
        <h1 class="hero-title">Our Services</h1>
        <p class="hero-subtitle">
          We Deliver Innovative Software Solutions Tailored to Your Business Needs
        </p>
        <div class="d-flex gap-3 flex-wrap">
          <button class="btn btn-consultation" data-bs-toggle="modal" data-bs-target="#consultModal">Get a Free Consultation</button>
          <a href="#approach" class="btn-hero-outline">Our Approach</a>
        </div>
      </div>

      <!-- right illustration -->
      <div class="col-lg-6 col-md-5 d-none d-md-flex hero-devices">
        <div class="device-stack">
          <!-- floating widgets -->
          <div class="float-widget fw-1">
            <i class="fas fa-shield-alt"></i> Secure &amp; Scalable
          </div>
          <div class="float-widget fw-2">
            <i class="fas fa-bolt"></i> Fast Delivery
          </div>
          <!-- laptop -->
          <div class="device-laptop">
            <div class="device-laptop-screen">
              <!-- simulated UI bars -->
              <div class="screen-ui-row">
                <div class="screen-ui-bar"></div>
                <div class="screen-ui-bar screen-ui-bar-sm"></div>
              </div>
              <div class="screen-ui-row">
                <div class="screen-ui-bar screen-ui-bar-sm"></div>
                <div class="screen-ui-bar"></div>
                <div class="screen-ui-bar screen-ui-bar-sm"></div>
              </div>
              <div class="screen-ui-row mt-2">
                <div class="screen-ui-block"></div>
                <div class="screen-ui-block screen-ui-block-alt"></div>
                <div class="screen-ui-block"></div>
              </div>
              <div class="screen-ui-row mt-2">
                <div class="screen-ui-bar"></div>
                <div class="screen-ui-bar screen-ui-bar-sm"></div>
              </div>
            </div>
            <div class="device-laptop-base"></div>
          </div>
          <div class="device-laptop-stand"></div>
          <div class="device-laptop-foot"></div>
          <!-- floating tablet -->
          <div class="float-tablet">
            <div class="float-tablet-screen"></div>
          </div>
          <!-- floating phone -->
          <div class="float-phone">
            <div class="float-phone-screen"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── EXPERT SOLUTIONS ── -->
<section class="solutions-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="solutions-heading">Expert Solutions for Every Industry</h2>
    </div>

    <!-- Row 1 -->
    <div class="row g-4 mb-4">

      <!-- Card 1 – Custom Software -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="service-card-img">
            <div class="mini-device md-1"></div>
            <div class="mini-device md-2"></div>
            <div class="mini-device md-3"></div>
            <div class="svc-icon-wrap">
              <div class="svc-icon-circle ic-custom">
                <i class="fas fa-laptop-code"></i>
              </div>
            </div>
          </div>
          <div class="service-card-body">
            <div class="service-card-title">Custom Software<br>Development</div>
            <p class="service-card-desc">Tailor-made software solutions designed to meet your unique business requirements.</p>
            <a href="#" class="btn-learn">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Card 2 – Web & Mobile -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="service-card-img">
            <div class="mini-device md-1"></div>
            <div class="mini-device md-2"></div>
            <div class="mini-device md-3"></div>
            <div class="svc-icon-wrap">
              <div class="svc-icon-circle ic-web">
                <i class="fas fa-mobile-alt"></i>
              </div>
            </div>
          </div>
          <div class="service-card-body">
            <div class="service-card-title">Web &amp; Mobile App<br>Development</div>
            <p class="service-card-desc">Modern, responsive, and user-friendly applications for web and mobile platforms.</p>
            <a href="#" class="btn-learn">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Card 3 – AI & ML -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="service-card-img">
            <div class="mini-device md-1"></div>
            <div class="mini-device md-2"></div>
            <div class="mini-device md-3"></div>
            <div class="svc-icon-wrap">
              <div class="svc-icon-circle ic-ai">
                <i class="fas fa-brain"></i>
              </div>
            </div>
          </div>
          <div class="service-card-body">
            <div class="service-card-title">AI &amp; Machine Learning</div>
            <p class="service-card-desc">Harness the power of AI to automate processes and gain insights from your data.</p>
            <a href="#" class="btn-learn">Learn More</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Row 2 -->
    <div class="row g-4">

      <!-- Card 4 – SaaS -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="service-card-img">
            <div class="mini-device md-1"></div>
            <div class="mini-device md-2"></div>
            <div class="mini-device md-3"></div>
            <div class="svc-icon-wrap">
              <div class="svc-icon-circle ic-saas">
                <i class="fas fa-cloud"></i>
              </div>
            </div>
          </div>
          <div class="service-card-body">
            <div class="service-card-title">SaaS Development</div>
            <p class="service-card-desc">Full-cycle development of scalable and secure SaaS products.</p>
            <a href="#" class="btn-learn">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Card 5 – Cloud & DevOps -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="service-card-img">
            <div class="mini-device md-1"></div>
            <div class="mini-device md-2"></div>
            <div class="mini-device md-3"></div>
            <div class="svc-icon-wrap">
              <div class="svc-icon-circle ic-devops">
                <i class="fas fa-server"></i>
              </div>
            </div>
          </div>
          <div class="service-card-body">
            <div class="service-card-title">Cloud &amp; DevOps</div>
            <p class="service-card-desc">Efficient and secure cloud infrastructure with CI/CD pipelines and DevOps practices.</p>
            <a href="#" class="btn-learn">Learn More</a>
          </div>
        </div>
      </div>

      <!-- Card 6 – UI/UX -->
      <div class="col-md-4">
        <div class="service-card">
          <div class="service-card-img">
            <div class="mini-device md-1"></div>
            <div class="mini-device md-2"></div>
            <div class="mini-device md-3"></div>
            <div class="svc-icon-wrap">
              <div class="svc-icon-circle ic-uiux">
                <i class="fas fa-pencil-ruler"></i>
              </div>
            </div>
          </div>
          <div class="service-card-body">
            <div class="service-card-title">UI/UX Design</div>
            <p class="service-card-desc">User-centered design for a seamless and engaging digital experience.</p>
            <a href="#" class="btn-learn">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── APPROACH ── -->
<section class="approach-section" id="approach">
  <div class="container text-center">
    <h2 class="approach-heading">Our Approach to Software Development</h2>
    <div class="approach-steps">

      <div class="approach-step">
        <div class="step-icon-wrap">
          <i class="fas fa-search"></i>
        </div>
        <div class="step-title">Discovery</div>
        <p class="step-desc">Understanding your needs and goals</p>
      </div>

      <div class="approach-step">
        <div class="step-icon-wrap">
          <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="step-title">Planning</div>
        <p class="step-desc">Crafting a tailored project roadmap</p>
      </div>

      <div class="approach-step">
        <div class="step-icon-wrap">
          <i class="fas fa-cogs"></i>
        </div>
        <div class="step-title">Development</div>
        <p class="step-desc">Building and testing the solution</p>
      </div>

      <div class="approach-step">
        <div class="step-icon-wrap">
          <i class="fas fa-rocket"></i>
        </div>
        <div class="step-title">Delivery</div>
        <p class="step-desc">Launching the product and providing support</p>
      </div>

    </div>
  </div>
</section>

<!-- ── CTA BANNER ── -->
<section class="cta-banner">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center text-md-start g-3">
      <div class="col-md-auto">
        <p class="cta-banner-text mb-0">
          Got a project in mind?&nbsp;
          <span class="highlight">Let's make it a reality.</span>
        </p>
      </div>
      <div class="col-md-auto ms-md-4">
        <button class="btn btn-cta-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">Schedule a Call</button>
      </div>
    </div>
  </div>
</section>

<!-- ── FOOTER ── -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
