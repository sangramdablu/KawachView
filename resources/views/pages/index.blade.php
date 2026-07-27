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

<!-- PROJECTS -->
@include('layouts.project')

<!-- ── USAGE TECHNOLOGIES ── -->
@include('layouts.technologies.usagetech')

<!-- ── INDUSTRIES ── -->
@include('layouts.industry')

{{-- <!-- ── CLIENT VOICES ── -->
@include('layouts.client-voices') --}}

<!-- ── RESULTS ── -->
@include('layouts.results')
<!-- ── TESTIMONIALS ── -->
@include('layouts.testmonials')

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
