{{-- ── SERVICES CAROUSEL SECTION ──────────────────────────────── --}}
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

          <div class="svc-card">
            <div class="svc-card-img svc-blue"><i class="fas fa-laptop-code"></i></div>
            <div class="svc-card-body text-start">
              <div class="svc-card-title">Web &amp; Mobile Apps</div>
              <p class="svc-card-desc">Modern, responsive applications built for performance and scale across every device.</p>
              <span class="svc-tag">Development</span>
            </div>
          </div>

          <div class="svc-card">
            <div class="svc-card-img svc-purple"><i class="fas fa-brain"></i></div>
            <div class="svc-card-body text-start">
              <div class="svc-card-title">AI &amp; Machine Learning</div>
              <p class="svc-card-desc">Smart AI solutions that automate decisions and unlock insights from your data.</p>
              <span class="svc-tag">Artificial Intelligence</span>
            </div>
          </div>

          <div class="svc-card">
            <div class="svc-card-img svc-teal"><i class="fas fa-cloud-upload-alt"></i></div>
            <div class="svc-card-body text-start">
              <div class="svc-card-title">Cloud &amp; DevOps</div>
              <p class="svc-card-desc">Secure, scalable cloud infrastructure with CI/CD pipelines and zero-downtime deployments.</p>
              <span class="svc-tag">Infrastructure</span>
            </div>
          </div>

          <div class="svc-card">
            <div class="svc-card-img svc-green"><i class="fas fa-shield-alt"></i></div>
            <div class="svc-card-body text-start">
              <div class="svc-card-title">Cybersecurity</div>
              <p class="svc-card-desc">End-to-end security audits, penetration testing, and compliance frameworks for your systems.</p>
              <span class="svc-tag">Security</span>
            </div>
          </div>

          <div class="svc-card">
            <div class="svc-card-img svc-amber"><i class="fas fa-database"></i></div>
            <div class="svc-card-body text-start">
              <div class="svc-card-title">Data Engineering</div>
              <p class="svc-card-desc">Robust data pipelines, warehouses and analytics dashboards that power business decisions.</p>
              <span class="svc-tag">Analytics</span>
            </div>
          </div>

          <div class="svc-card">
            <div class="svc-card-img svc-coral"><i class="fas fa-paint-brush"></i></div>
            <div class="svc-card-body text-start">
              <div class="svc-card-title">UI/UX Design</div>
              <p class="svc-card-desc">User-first design systems, wireframes and prototypes that convert visitors into customers.</p>
              <span class="svc-tag">Design</span>
            </div>
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

  const total = track.children.length;
  function maxIndex() { return Math.max(0, total - visibleCount()); }

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
    const m = track.style.transform.match(/-?([\d.]+)/);
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