<!-- ============================================================
     RESULTS — animated stat band
     ============================================================ -->

<style>
  .results-section {
    background: linear-gradient(135deg, var(--dark-navy) 0%, var(--light-navy) 100%);
    padding: 64px 0;
    position: relative;
    overflow: hidden;
  }
  .results-section::before {
    content: '';
    position: absolute;
    top: -120px; right: -120px;
    width: 420px; height: 420px;
    background: radial-gradient(circle, rgba(33,150,243,.14) 0%, transparent 65%);
    pointer-events: none;
  }
  .results-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 24px;
    position: relative;
  }
  .result-item {
    text-align: center;
    padding: 0 8px;
    border-right: 1px solid rgba(255,255,255,.1);
  }
  .result-item:last-child { border-right: none; }
  .result-icon {
    width: 46px; height: 46px;
    margin: 0 auto 14px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 12px;
    background: rgba(33,150,243,.15);
    border: 1px solid rgba(33,150,243,.3);
    color: #64b5f6;
    font-size: 1.1rem;
  }
  .result-number {
    font-family: 'Nunito', sans-serif;
    font-weight: 900;
    font-size: 2.4rem;
    color: #fff;
    line-height: 1;
  }
  .result-label {
    margin-top: 8px;
    font-size: .83rem;
    color: #aac4e0;
    font-weight: 600;
  }

  @media (max-width: 992px) {
    .results-grid { grid-template-columns: repeat(3, 1fr); row-gap: 36px; }
    .result-item:nth-child(3) { border-right: none; }
  }
  @media (max-width: 576px) {
    .results-grid { grid-template-columns: repeat(2, 1fr); }
    .result-item:nth-child(odd) { border-right: 1px solid rgba(255,255,255,.1); }
    .result-item:nth-child(even) { border-right: none; }
    .result-number { font-size: 2rem; }
  }
</style>

<section class="results-section">
  <div class="container">
    <div class="results-grid">

      <div class="result-item">
        <div class="result-icon"><i class="fas fa-diagram-project"></i></div>
        <div class="result-number" data-count-to="400" data-suffix="+">0</div>
        <div class="result-label">Projects Delivered</div>
      </div>

      <div class="result-item">
        <div class="result-icon"><i class="fas fa-calendar-check"></i></div>
        <div class="result-number" data-count-to="10" data-suffix="+">0</div>
        <div class="result-label">Years of Experience</div>
      </div>

      <div class="result-item">
        <div class="result-icon"><i class="fas fa-earth-americas"></i></div>
        <div class="result-number" data-count-to="20" data-suffix="+">0</div>
        <div class="result-label">Countries Served</div>
      </div>

      <div class="result-item">
        <div class="result-icon"><i class="fas fa-clock"></i></div>
        <div class="result-number" data-count-to="98" data-suffix="%">0</div>
        <div class="result-label">On-Time Delivery</div>
      </div>

      <div class="result-item">
        <div class="result-icon"><i class="fas fa-star"></i></div>
        <div class="result-number" data-count-to="4.9" data-decimals="1" data-suffix="★">0</div>
        <div class="result-label">Avg. Client Rating</div>
      </div>

    </div>
  </div>
</section>

<script>
(function () {
  var counters = document.querySelectorAll('.result-number[data-count-to]');
  if (!counters.length) return;

  function animate(el) {
    var target = parseFloat(el.dataset.countTo);
    var decimals = parseInt(el.dataset.decimals || '0', 10);
    var suffix = el.dataset.suffix || '';
    var duration = 1600;
    var start = null;

    function step(timestamp) {
      if (start === null) start = timestamp;
      var progress = Math.min((timestamp - start) / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      el.textContent = (target * eased).toFixed(decimals) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  if (!('IntersectionObserver' in window)) {
    counters.forEach(animate);
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        animate(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.4 });

  counters.forEach(function (el) { observer.observe(el); });
})();
</script>
