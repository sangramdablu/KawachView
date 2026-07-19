<!-- NAVBAR -->
<style>
  .nav-hire-item { position: relative; }

  .nav-hire-trigger {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    background: none;
    border: none;
  }
  .nav-hire-arrow {
    font-size: .68rem;
    transition: transform .25s ease;
  }
  .nav-hire-trigger[aria-expanded="true"] .nav-hire-arrow,
  .nav-hire-trigger.open .nav-hire-arrow {
    transform: rotate(180deg);
  }

  /* ── Panel shell (desktop: floating card) ───────────────────── */
  .nav-hire-panel {
    position: absolute;
    top: calc(100% + 16px);
    left: 50%;
    width: 620px;
    max-width: calc(100vw - 32px);
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    box-shadow: 0 24px 60px rgba(13,27,62,.22);
    padding: 22px 26px 18px;
    z-index: 1050;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transform: translate(-50%, -8px);
    transition: opacity .25s cubic-bezier(.22,1,.36,1),
                transform .25s cubic-bezier(.22,1,.36,1),
                visibility 0s linear .25s;
  }
  .nav-hire-panel.open {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: translate(-50%, 0);
    transition: opacity .25s cubic-bezier(.22,1,.36,1),
                transform .25s cubic-bezier(.22,1,.36,1),
                visibility 0s linear 0s;
  }

  .nav-hire-panel-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px 28px;
  }
  .nav-hire-col-title {
    font-size: .72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .6px;
    color: #8fa3c8;
    margin-bottom: 6px;
    padding: 0 10px;
  }
  .nav-hire-col + .nav-hire-col { border-left: 1px solid #edf2fa; padding-left: 24px; }

  .nav-hire-link {
    display: block;
    padding: 8px 10px;
    border-radius: 8px;
    font-size: .85rem;
    font-weight: 600;
    color: #1a1a2e;
    text-decoration: none;
    transition: background .18s, color .18s;
  }
  .nav-hire-link:hover { background: #edf4fe; color: #1a73e8; }

  .nav-hire-footer {
    margin-top: 14px;
    padding-top: 14px;
    border-top: 1px solid #edf2fa;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    flex-wrap: wrap;
  }
  .nav-hire-footer span { font-size: .8rem; color: #6c757d; }
  .nav-hire-cta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .8rem;
    font-weight: 700;
    color: #1a73e8;
    text-decoration: none;
  }
  .nav-hire-cta:hover { color: #1558b0; }

  /* ── Mobile: inline accordion inside collapsed nav ──────────── */
  @media (max-width: 991.98px) {
    .nav-hire-item { width: 100%; }
    .nav-hire-panel,
    .nav-hire-panel.open {
      position: static;
      left: auto;
      transform: none;
      width: 100%;
      max-width: 100%;
      background: transparent;
      border: none;
      box-shadow: none;
      padding: 0;
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
      overflow: hidden;
      transition: max-height .32s ease;
    }
    .nav-hire-panel { max-height: 0; }
    .nav-hire-panel.open { max-height: 640px; }
    .nav-hire-panel-inner {
      grid-template-columns: 1fr;
      gap: 2px;
      padding: 6px 4px 4px;
    }
    .nav-hire-col + .nav-hire-col { border-left: none; padding-left: 0; margin-top: 8px; }
    .nav-hire-col-title { color: #7fa8e0; }
    .nav-hire-link { color: #ccd9ea; }
    .nav-hire-link:hover { background: rgba(255,255,255,.08); color: #fff; }
    .nav-hire-footer { border-top-color: rgba(255,255,255,.1); padding: 12px 10px 4px; }
    .nav-hire-footer span { color: #aac4e0; }
  }
</style>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="/">
      Kawach<span class="brand-highlight">TECH</span>
      <span class="brand-sub">AI • CLOUD • SOFTWARE</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon text-white"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navMenu">
      <ul class="navbar-nav align-items-center me-3">
        <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('casestudy') }}">Case Studies</a></li>
        <li class="nav-item nav-hire-item">
          <a href="{{ route('hire-developer.index') }}" class="nav-link nav-hire-trigger" id="hireDevTrigger" aria-haspopup="true" aria-expanded="false">
            Hire Developer <i class="fas fa-chevron-down nav-hire-arrow"></i>
          </a>
          <div class="nav-hire-panel" id="hireDevPanel">
            <div class="nav-hire-panel-inner">
              @foreach (['By Role', 'By Technology'] as $hireCategory)
                <div class="nav-hire-col">
                  <div class="nav-hire-col-title">{{ $hireCategory }}</div>
                  @foreach (config('hire_developers') as $hireSlug => $hireDev)
                    @continue($hireDev['category'] !== $hireCategory)
                    <a href="{{ route('hire-developer.show', $hireSlug) }}" class="nav-hire-link">{{ $hireDev['title'] }}</a>
                  @endforeach
                </div>
              @endforeach
            </div>
            <div class="nav-hire-footer">
              <span>Don't see your stack?</span>
              <a href="{{ route('hire-developer.index') }}" class="nav-hire-cta">View all roles <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
      </ul>
      <button class="btn btn-quote" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</button>
    </div>
  </div>
</nav>

<script>
(function () {
  var trigger = document.getElementById('hireDevTrigger');
  var panel   = document.getElementById('hireDevPanel');
  if (!trigger || !panel) return;

  function isOpen() { return panel.classList.contains('open'); }

  function openPanel() {
    panel.classList.add('open');
    trigger.classList.add('open');
    trigger.setAttribute('aria-expanded', 'true');
  }
  function closePanel() {
    panel.classList.remove('open');
    trigger.classList.remove('open');
    trigger.setAttribute('aria-expanded', 'false');
  }
  function togglePanel(e) {
    e.preventDefault();
    e.stopPropagation();
    isOpen() ? closePanel() : openPanel();
  }

  trigger.addEventListener('click', togglePanel);

  document.addEventListener('click', function (e) {
    if (isOpen() && !panel.contains(e.target) && e.target !== trigger) closePanel();
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && isOpen()) closePanel();
  });

  // Tech/role links and the footer CTA are real routed pages — let them
  // navigate normally, just close the panel first for a clean transition.
  panel.querySelectorAll('.nav-hire-link, .nav-hire-cta').forEach(function (link) {
    link.addEventListener('click', function () { closePanel(); });
  });
})();
</script>
