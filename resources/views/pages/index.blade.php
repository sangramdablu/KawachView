<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
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

<!-- ── TESTIMONIALS ── -->
@include('layouts.testmonials')

<!-- ── INDUSTRIES ── -->
@include('layouts.industry')

<!-- CTA -->
<section class="cta-section text-center">
  <div class="container">
    <h2 class="cta-title">Ready to Transform Your Business?</h2>
    <p class="cta-subtitle">Let's discuss your project and find the best solution</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="#" class="btn btn-cta-primary">Schedule a Call</a>
      <a href="#" class="btn btn-cta-outline">Get a Quote</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
