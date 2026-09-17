<section class="hero-section">

  {{-- ── Animated background layer ── --}}
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
  {{-- /hero-bg-layer --}}

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-7">
        <h1 class="hero-title">
          We Build Custom Software That Helps Businesses Scale
        </h1>
        <p class="hero-subtitle">From SaaS platforms and AI automation to complex web and mobile applications, Kawach Technology delivers custom software development for startups, small businesses and enterprises, turning business problems into scalable software.</p>
        <button class="btn btn-consultation" data-bs-toggle="modal" data-bs-target="#consultModal">Get a Free Consultation</button>
      </div>
      <div class="col-lg-6 col-md-5 d-none d-md-flex hero-illustration">
        <!-- Un-boxed, full-size model image — no card/frame/bezel around it;
             anchored so its bottom edge sits flush with the hero section's
             own bottom edge (see .hero-section .hero-illustration override). -->
        <div class="hero-model-wrap">
          <img class="hero-model-img" src="{{ asset('assets/images/kawach_modelgirl.png') }}"
               alt="Kawach Technology: custom software development, cloud, security and support solutions">
        </div>
      </div>
    </div>
  </div>

</section>

<style>
  .hero-section {
  position: relative;
  overflow: hidden;
  background: #0f172a;
}

/* Background Image */
.hero-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: url('{{ asset("assets/images/kawach_main_bg.png") }}') center center/cover no-repeat;
  /* opacity: 0.12; */
  z-index: 0;
}

/* Dark overlay */
/* .hero-section::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
    135deg,
    rgba(15, 23, 42, 0.32),
    rgba(30, 41, 59, 0.22)
  );
  z-index: 1;
} */

/* IMPORTANT */
.hero-bg-layer {
  position: absolute;
  inset: 0;
  z-index: 2;
  pointer-events: none;
}

.hero-section .container {
  position: relative;
  z-index: 3;
}
</style>
