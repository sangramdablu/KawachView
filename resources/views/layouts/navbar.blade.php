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
    width: 780px;
    max-width: calc(100vw - 32px);
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    box-shadow: 0 24px 60px rgba(13,27,62,.22);
    padding: 0 0 20px;
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

  /* ── Header ───────────────────────────────────────────────────── */
  .nav-hire-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 20px 26px 16px;
    margin-bottom: 16px;
    border-bottom: 1px solid #edf2fa;
    background: linear-gradient(180deg, #f7faff, transparent);
    border-radius: 16px 16px 0 0;
  }
  .nav-hire-header-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: linear-gradient(135deg, #1a73e8, #2196f3);
    color: #fff;
    font-size: 18px;
  }
  .nav-hire-header-title {
    font-size: .98rem;
    font-weight: 800;
    color: #1a1a2e;
    line-height: 1.3;
  }
  .nav-hire-header-sub {
    font-size: .78rem;
    color: #6c757d;
    margin: 2px 0 0;
  }

  .nav-hire-panel-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px 32px;
    padding: 0 26px;
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
  .nav-hire-col + .nav-hire-col { border-left: 1px solid #edf2fa; padding-left: 28px; }

  .nav-hire-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 9px 10px;
    border-radius: 10px;
    font-size: .85rem;
    font-weight: 600;
    color: #1a1a2e;
    text-decoration: none;
    transition: background .18s, color .18s;
  }
  .nav-hire-link-icon {
    width: 32px;
    height: 32px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    background: #e8f1fd;
    color: #1a73e8;
    font-size: .82rem;
    transition: background .18s, color .18s;
  }
  .nav-hire-link:hover { background: #edf4fe; color: #1a73e8; }
  .nav-hire-link:hover .nav-hire-link-icon { background: #1a73e8; color: #fff; }

  .nav-hire-footer {
    margin-top: 14px;
    padding: 14px 26px 0;
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
    .nav-hire-item, .nav-markets-item { width: 100%; }
    .nav-hire-trigger { width: 100%; justify-content: center; padding: 6px 18px; }
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
    .nav-hire-panel.open { max-height: 720px; }
    .nav-hire-header {
      padding: 10px 10px 12px;
      margin-bottom: 6px;
      background: transparent;
      border-bottom-color: rgba(255,255,255,.1);
    }
    .nav-hire-header-title { color: #fff; }
    .nav-hire-header-sub { color: #aac4e0; }
    .nav-hire-panel-inner {
      grid-template-columns: 1fr;
      gap: 2px;
      padding: 6px 4px 4px;
    }
    .nav-hire-col + .nav-hire-col { border-left: none; padding-left: 0; margin-top: 8px; }
    .nav-hire-col-title { color: #7fa8e0; }
    .nav-hire-link { color: #ccd9ea; }
    .nav-hire-link-icon { background: rgba(255,255,255,.08); color: #7fa8e0; }
    .nav-hire-link:hover { background: rgba(255,255,255,.08); color: #fff; }
    .nav-hire-link:hover .nav-hire-link-icon { background: #1a73e8; color: #fff; }
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
        <li class="nav-item nav-markets-item">
          <a href="{{ route('markets') }}" class="nav-link nav-hire-trigger" id="marketsTrigger" aria-haspopup="true" aria-expanded="false">
            Markets <i class="fas fa-chevron-down nav-hire-arrow"></i>
          </a>
          <div class="nav-hire-panel" id="marketsPanel">
            <div class="nav-hire-header">
              <div class="nav-hire-header-icon"><i class="fas fa-earth-americas"></i></div>
              <div>
                <div class="nav-hire-header-title">Markets We Serve</div>
                <p class="nav-hire-header-sub">Software development tailored to your region</p>
              </div>
            </div>
            <div class="nav-hire-panel-inner" style="grid-template-columns:1fr;">
              <div class="nav-hire-col">
                <a href="{{ route('country.usa') }}" class="nav-hire-link">
                  <span class="nav-hire-link-icon"><i class="fas fa-flag-usa"></i></span>
                  USA
                </a>
                <a href="{{ route('country.uk') }}" class="nav-hire-link">
                  <span class="nav-hire-link-icon"><i class="fas fa-landmark"></i></span>
                  United Kingdom
                </a>
                <a href="{{ route('country.germany') }}" class="nav-hire-link">
                  <span class="nav-hire-link-icon"><i class="fas fa-industry"></i></span>
                  Germany
                </a>
                <a href="{{ route('country.europe') }}" class="nav-hire-link">
                  <span class="nav-hire-link-icon"><i class="fas fa-earth-europe"></i></span>
                  Europe
                </a>
              </div>
            </div>
            <div class="nav-hire-footer">
              <span>Not sure which fits?</span>
              <a href="{{ route('markets') }}" class="nav-hire-cta">View all markets <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-hire-item">
          <a href="{{ route('hire-developer.index') }}" class="nav-link nav-hire-trigger" id="hireDevTrigger" aria-haspopup="true" aria-expanded="false">
            Hire Developer <i class="fas fa-chevron-down nav-hire-arrow"></i>
          </a>
          <div class="nav-hire-panel" id="hireDevPanel">
            <div class="nav-hire-header">
              <div class="nav-hire-header-icon"><i class="fas fa-user-tie"></i></div>
              <div>
                <div class="nav-hire-header-title">Hire Developers</div>
                <p class="nav-hire-header-sub">Pick a role or technology stack to get started</p>
              </div>
            </div>
            <div class="nav-hire-panel-inner">
              @foreach (['By Role', 'By Technology'] as $hireCategory)
                <div class="nav-hire-col">
                  <div class="nav-hire-col-title">{{ $hireCategory }}</div>
                  @foreach (config('hire_developers') as $hireSlug => $hireDev)
                    @continue($hireDev['category'] !== $hireCategory)
                    <a href="{{ route('hire-developer.show', $hireSlug) }}" class="nav-hire-link">
                      <span class="nav-hire-link-icon"><i class="{{ $hireDev['icon'] }}"></i></span>
                      {{ $hireDev['title'] }}
                    </a>
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
        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('careers') }}">Careers</a></li> --}}
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
      </ul>
      <button class="btn btn-quote" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</button>
    </div>
  </div>
</nav>

<script>
(function () {
  var isDesktop = function () { return window.matchMedia('(min-width: 992px)').matches; };

  // Shared hover/click/escape dropdown behavior, applied once per nav
  // dropdown (Hire Developer, Markets) rather than duplicated per instance.
  function initNavDropdown(itemSelector, triggerId, panelId) {
    var item    = document.querySelector(itemSelector);
    var trigger = document.getElementById(triggerId);
    var panel   = document.getElementById(panelId);
    if (!item || !trigger || !panel) return;

    var closeTimer = null;

    function isOpen() { return panel.classList.contains('open'); }

    function openPanel() {
      clearTimeout(closeTimer);
      panel.classList.add('open');
      trigger.classList.add('open');
      trigger.setAttribute('aria-expanded', 'true');
    }
    function closePanel() {
      panel.classList.remove('open');
      trigger.classList.remove('open');
      trigger.setAttribute('aria-expanded', 'false');
    }
    function closePanelDelayed() {
      clearTimeout(closeTimer);
      closeTimer = setTimeout(closePanel, 180);
    }
    function togglePanel(e) {
      e.preventDefault();
      e.stopPropagation();
      isOpen() ? closePanel() : openPanel();
    }

    // Desktop: hover the trigger or the panel to open; leaving both closes it
    // (with a short delay so moving the cursor from the link into the panel
    // doesn't cause a flicker). Click still works too, for touch/keyboard.
    item.addEventListener('mouseenter', function () { if (isDesktop()) openPanel(); });
    item.addEventListener('mouseleave', function () { if (isDesktop()) closePanelDelayed(); });

    trigger.addEventListener('click', function (e) {
      if (isDesktop()) { e.preventDefault(); e.stopPropagation(); return; }
      togglePanel(e);
    });

    document.addEventListener('click', function (e) {
      if (isOpen() && !panel.contains(e.target) && e.target !== trigger) closePanel();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && isOpen()) closePanel();
    });

    // Real routed links — let them navigate normally, just close the panel
    // first for a clean transition.
    panel.querySelectorAll('.nav-hire-link, .nav-hire-cta').forEach(function (link) {
      link.addEventListener('click', function () { closePanel(); });
    });
  }

  initNavDropdown('.nav-hire-item', 'hireDevTrigger', 'hireDevPanel');
  initNavDropdown('.nav-markets-item', 'marketsTrigger', 'marketsPanel');
})();
</script>
