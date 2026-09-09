<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7J267VF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- NAVBAR -->
@include('layouts.navbar')

<!-- HERO -->
@include('layouts.hero')

<!-- FEATURES STRIP -->
@include('layouts.features')

<!-- SERVICES -->
@include('layouts.service')

<!-- LIGHT MID-PAGE CTA (Phase 27 — a CTA touchpoint after services, lighter
     than the full banner at the bottom of the page so it doesn't feel like
     a second hard sell right after the first) -->
<section class="home-inline-cta-section">
  <div class="container">
    <div class="home-inline-cta">
      <span>Not sure which service fits what you're building?</span>
      <button class="home-inline-cta-btn" data-bs-toggle="modal" data-bs-target="#consultModal">
        Get a Free Software Consultation <i class="fas fa-arrow-right"></i>
      </button>
    </div>
  </div>
</section>
<style>
.home-inline-cta-section{ padding:0 0 20px; }
.home-inline-cta{
  display:flex; align-items:center; justify-content:space-between; gap:20px; flex-wrap:wrap;
  padding:20px 26px; background:rgba(26,115,232,.06); border:1px solid rgba(26,115,232,.15);
  border-radius:14px;
}
.home-inline-cta span{ font-weight:700; color:var(--text-dark, #1a1a2e); font-size:.96rem; }
.home-inline-cta-btn{
  display:inline-flex; align-items:center; gap:8px; background:#1a73e8; color:#fff; border:none;
  padding:11px 22px; border-radius:9px; font-weight:700; font-size:.88rem; cursor:pointer; transition:.2s;
  white-space:nowrap;
}
.home-inline-cta-btn:hover{ background:#1558b0; }
@media (max-width:640px){ .home-inline-cta{ justify-content:center; text-align:center; } }
</style>

<!-- PROJECTS -->
@include('layouts.project')

<!-- ── EXPLORE OUR PRODUCTS ── -->
@include('layouts.explore-products')

<!-- ── USAGE TECHNOLOGIES ── -->
@include('layouts.technologies.usagetech')

<!-- ── INDUSTRIES ── -->
@include('layouts.industry')

@include('layouts.global-markets')

<!-- ── RESULTS ── -->
@include('layouts.results')

<!-- ── TRUST & ASSURANCE ── -->
@include('layouts.trust')

<!-- ── GOVERNMENT REGISTRATIONS & RECOGNITIONS ── -->
@include('layouts.gov-registrations')

<!-- ── OUR TEAM ── -->
@include('layouts.our-team')

{{-- SEO Phase 11: the old Clutch-reviews partial (layouts.testmonials) has
     been deleted — it contained fabricated named reviewers with no real
     case study backing. Real, DB-backed testimonials only, below. --}}

<!-- ── CLIENT REVIEWS (from case studies) ── -->
@include('layouts.client-reviews')

<!-- CTA -->
<section class="cta-section text-center">
  <div class="container">
    <h2 class="cta-title">Ready to Transform Your Business?</h2>
    <p class="cta-subtitle">Let's discuss your project and find the best solution</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <button class="btn btn-cta-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">Schedule a Call</button>
      <a class="btn btn-cta-outline" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
{{-- <script id="disable-right-click">
  document.addEventListener('contextmenu', function (e) {
      e.preventDefault();
  });
</script> --}}
{{-- <script id="block-shortcuts">
document.addEventListener('keydown', function (e) {

    // Ctrl + U
    if (e.ctrlKey && e.key === 'u') {
        e.preventDefault();
    }

    // Ctrl + Shift + I (DevTools)
    if (e.ctrlKey && e.shiftKey && e.key === 'I') {
        e.preventDefault();
    }

    // Ctrl + Shift + J
    if (e.ctrlKey && e.shiftKey && e.key === 'J') {
        e.preventDefault();
    }

    // F12
    if (e.key === 'F12') {
        e.preventDefault();
    }

});
</script>
<script>
document.addEventListener('contextmenu', e => e.preventDefault());

document.addEventListener('keydown', function (e) {
    if (e.ctrlKey && ['u','U'].includes(e.key)) e.preventDefault();
    if (e.ctrlKey && e.shiftKey && ['I','J'].includes(e.key)) e.preventDefault();
    if (e.key === 'F12') e.preventDefault();
});
</script> --}}
</body>
</html>
