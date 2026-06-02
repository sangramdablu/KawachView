{{-- ── SERVICES CAROUSEL SECTION ──────────────────────────────── --}}
@php
use App\Models\Page;
$services = Page::with('service')->published()->byType('service')->orderBy('sort_order')->limit(10)->get();
$gradients = [ 'svc-blue', 'svc-purple', 'svc-teal', 'svc-green', 'svc-amber', 'svc-coral' ];
$icons = [ 'fas fa-laptop-code', 'fas fa-brain', 'fas fa-cloud-upload-alt', 'fas fa-shield-alt', 'fas fa-database', 'fas fa-paint-brush', 'fas fa-robot', 'fas fa-chart-line', 'fas fa-mobile-alt', 'fas fa-server' ];
@endphp
<style>
.svc-card-image{
    width:100%;
    height:100%;
    object-fit:cover;
    object-position:center;
    display:block;
}
/* image wrapper */
.svc-card-img{
    overflow:hidden;
}
</style>
<section class="services-section">
  <div class="container text-center">
    <div class="section-divider"></div>
    <h2 class="section-title">Our Services</h2>
    <p class="section-subtitle">Expert Solutions for Every Industry</p>

    <div class="svc-outer" id="svcOuter">
      <button class="svc-arrow svc-arrow-left" id="svcPrev" aria-label="Previous services">
        <i class="fa-solid fa-angle-left"></i>
      </button>
      <button class="svc-arrow svc-arrow-right" id="svcNext" aria-label="Next services">
        <i class="fa-solid fa-angle-right"></i>
      </button>

      <div class="svc-track-wrap">
        <div class="svc-track" id="svcTrack">
            @forelse($services as $service)
                @php
                    $gradient = $gradients[$loop->index % count($gradients)];
                    $icon = $icons[$loop->index % count($icons)];
                @endphp
                <div class="svc-card">
                    {{-- TOP AREA --}}
                    <div class="svc-card-img {{ $gradient }}">
                        @if($service->featured_image)
                            <img  src="{{ config('app.images_path') . $service->featured_image }}"  alt="{{ $service->image_alt ?? $service->title }}"  title="{{ $service->image_title ?? $service->title }}"  class="svc-card-image">
                        @else
                            <i class="{{ $icon }}"></i>
                        @endif
                    </div>
                    {{-- BODY --}}
                    <div class="svc-card-body text-start">
                        <div class="svc-card-title"> {{ $service->title }} </div>
                          <p class="svc-card-desc"> {{ \Illuminate\Support\Str::words( strip_tags( $service->service->short_description ?? $service->service->content ?? '' ), 6, '...' ) }}
                          <a href="{{ $service->canonical_url ?: url('/services/' . $service->slug) }}" class="svc-read-more text-decoration-none"> Read More </a>
                          </p>
                    </div>
                </div>
            @empty
                <div class="text-center w-100 py-5"><p>No services available.</p></div>
            @endforelse
        </div>
        </div>{{-- /svc-track --}}
      </div>{{-- /svc-track-wrap --}}
      <div class="svc-progress"><div class="svc-progress-bar" id="svcBar"></div></div>
    </div>{{-- /svc-outer --}}
    <div class="svc-dots" id="svcDots"></div>
  </div>
</section>

<script>
(function () {
  'use strict';

  const track   = document.getElementById('svcTrack');
  const prevBtn = document.getElementById('svcPrev');
  const nextBtn = document.getElementById('svcNext');
  const dotsWrap= document.getElementById('svcDots');
  const bar     = document.getElementById('svcBar');
  const outer   = document.getElementById('svcOuter');

  const AUTO_MS = 3200;   // auto-advance interval ms
  const GAP     = 20;     // must match CSS gap

  let current    = 0;
  let autoTimer  = null;
  let isDragging = false;
  let dragStartX = 0;
  let dragStartOffset = 0;

  // Read card width from the first card (respects CSS)
  function cardWidth() {
    return track.firstElementChild.getBoundingClientRect().width;
  }

  function visibleCount() {
    const w = track.parentElement.clientWidth;
    return Math.max(1, Math.floor((w + GAP) / (cardWidth() + GAP)));
  }

  function totalCards() {
    return track.children.length;
  }

  function maxIndex() {
      return Math.max(0, totalCards() - visibleCount());
  }

  // ── Core scroll ───────────────────────────────────────────────
  function goTo(idx, animate = true) {
    current = Math.max(0, Math.min(idx, maxIndex()));
    const offset = current * (cardWidth() + GAP);
    track.style.transition = animate
      ? 'transform .45s cubic-bezier(.25,.8,.25,1)'
      : 'none';
    track.style.transform = `translateX(-${offset}px)`;
    updateUI();
    restartAuto();
  }

  function updateUI() {
    prevBtn.disabled = current <= 0;
    nextBtn.disabled = current >= maxIndex();
    dotsWrap.querySelectorAll('.svc-dot').forEach((d, i) =>
      d.classList.toggle('active', i === current)
    );
  }

  function buildDots() {
    dotsWrap.innerHTML = '';
    const count = maxIndex() + 1;
    for (let i = 0; i < count; i++) {
      const d = document.createElement('button');
      d.className = 'svc-dot' + (i === 0 ? ' active' : '');
      d.setAttribute('aria-label', `Go to slide ${i + 1}`);
      d.addEventListener('click', () => goTo(i));
      dotsWrap.appendChild(d);
    }
  }

  // ── Auto-play + progress bar ──────────────────────────────────
  function startBar() {
    bar.style.transition = 'none';
    bar.style.width = '0%';
    requestAnimationFrame(() => {
      bar.style.transition = `width ${AUTO_MS}ms linear`;
      bar.style.width = '100%';
    });
  }

  function restartAuto() {
    clearInterval(autoTimer);
    startBar();
    autoTimer = setInterval(() => {
      goTo(current >= maxIndex() ? 0 : current + 1);
    }, AUTO_MS);
  }

  // ── Arrows ────────────────────────────────────────────────────
  prevBtn.addEventListener('click', () => goTo(current - 1));
  nextBtn.addEventListener('click', () => goTo(current + 1));

  // ── Mouse drag ────────────────────────────────────────────────
  track.addEventListener('mousedown', e => {
    isDragging = true;
    dragStartX = e.clientX;
    const matrix = window.getComputedStyle(track).transform;
    if (matrix !== 'none') {
        const values = matrix.match(/matrix.*\((.+)\)/)[1].split(', ');
        dragStartOffset = Math.abs(parseFloat(values[4]));
    } else {
        dragStartOffset = 0;
    }
    dragStartOffset = m ? parseFloat(m[1]) : 0;
    track.style.transition = 'none';
    clearInterval(autoTimer);
    bar.style.transition = 'none';
  });
  document.addEventListener('mousemove', e => {
    if (!isDragging) return;
    const dx = e.clientX - dragStartX;
    track.style.transform = `translateX(-${dragStartOffset - dx}px)`;
  });
  document.addEventListener('mouseup', e => {
    if (!isDragging) return;
    isDragging = false;
    const dx = e.clientX - dragStartX;
    if (dx < -60)      goTo(current + 1);
    else if (dx > 60)  goTo(current - 1);
    else               goTo(current);
  });

  // ── Touch swipe ───────────────────────────────────────────────
  track.addEventListener('touchstart', e => {
    dragStartX = e.touches[0].clientX;
    const m = track.style.transform.match(/-?([\d.]+)/);
    dragStartOffset = m ? parseFloat(m[1]) : 0;
    track.style.transition = 'none';
    clearInterval(autoTimer);
  }, { passive: true });
  track.addEventListener('touchmove', e => {
    const dx = e.touches[0].clientX - dragStartX;
    track.style.transform = `translateX(-${dragStartOffset - dx}px)`;
  }, { passive: true });
  track.addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - dragStartX;
    if (dx < -50)      goTo(current + 1);
    else if (dx > 50)  goTo(current - 1);
    else               goTo(current);
  });

  // ── Pause on hover ────────────────────────────────────────────
  outer.addEventListener('mouseenter', () => {
    clearInterval(autoTimer);
    bar.style.transition = 'none';
  });
  outer.addEventListener('mouseleave', () => restartAuto());

  // ── Resize ────────────────────────────────────────────────────
  window.addEventListener('resize', () => {
    buildDots();
    goTo(Math.min(current, maxIndex()), false);
  });

  // ── Init ──────────────────────────────────────────────────────
  buildDots();
  goTo(0, false);
  restartAuto();
})();
</script>