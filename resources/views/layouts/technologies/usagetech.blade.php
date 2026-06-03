<!-- ============================================================
     TECHNOLOGY STACK — Light #f0f4fb background + official icons
     ============================================================ -->

<style>
  /* ── Section shell ───────────────────────────────────────────── */
  .tech-stack-section {
    padding: 90px 0 80px;
    background: #f0f4fb;
    position: relative;
    overflow: hidden;
  }
  .tech-stack-section::before {
    content: '';
    position: absolute;
    top: -100px; left: 50%;
    transform: translateX(-50%);
    width: 800px; height: 400px;
    background: radial-gradient(ellipse, rgba(26,115,232,.06) 0%, transparent 70%);
    pointer-events: none;
  }
  .tech-stack-section::after {
    content: '';
    position: absolute;
    bottom: -80px; right: -60px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(26,115,232,.04) 0%, transparent 65%);
    pointer-events: none;
  }

  /* ── Tabs ────────────────────────────────────────────────────── */
  .tech-tabs {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 8px;
    margin-bottom: 36px;
  }
  .tech-tab {
    padding: 8px 20px;
    border-radius: 30px;
    border: 1.5px solid #d0dcef;
    background: #fff;
    color: #5a6e8a;
    font-size: .82rem;
    font-weight: 600;
    letter-spacing: .3px;
    cursor: pointer;
    transition: all .22s;
    box-shadow: 0 1px 4px rgba(26,115,232,.06);
  }
  .tech-tab:hover {
    border-color: #1a73e8;
    color: #1a73e8;
    background: #eaf1fd;
  }
  .tech-tab.active {
    background: #1a73e8;
    border-color: #1a73e8;
    color: #fff;
    box-shadow: 0 4px 16px rgba(26,115,232,.3);
  }

  /* ── Grid ────────────────────────────────────────────────────── */
  .tech-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
    gap: 16px;
  }
  .tech-panel { display: none; }
  .tech-panel.active { display: grid; }

  /* ── Card ────────────────────────────────────────────────────── */
  .tech-card {
    background: #fff;
    border: 1px solid #dce6f5;
    border-radius: 14px;
    padding: 20px 12px 16px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    cursor: default;
    box-shadow: 0 2px 10px rgba(26,115,232,.05);
    transition: transform .22s, border-color .22s, box-shadow .22s;
  }
  .tech-card:hover {
    transform: translateY(-5px);
    border-color: #1a73e8;
    box-shadow: 0 8px 28px rgba(26,115,232,.14);
  }

  /* ── Icon wrapper ────────────────────────────────────────────── */
  .tech-card-icon {
    width: 52px; height: 52px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    background: #f0f4fb;
  }
  .tech-card-icon img,
  .tech-card-icon svg {
    width: 34px; height: 34px;
    object-fit: contain;
  }

  /* ── Name ────────────────────────────────────────────────────── */
  .tech-card-name {
    font-size: .78rem;
    font-weight: 700;
    color: #1a2a3a;
    text-align: center;
    line-height: 1.3;
  }

  /* ── Skill bar ───────────────────────────────────────────────── */
  .tech-card-level {
    width: 100%;
    height: 3px;
    background: #e4ecf8;
    border-radius: 3px;
    overflow: hidden;
  }
  .tech-card-level-fill {
    height: 100%;
    border-radius: 3px;
    background: linear-gradient(90deg, #1a73e8, #42a5f5);
  }

  /* ── Ticker ──────────────────────────────────────────────────── */
  .tech-ticker-wrap {
    overflow: hidden;
    margin-top: 48px;
    padding: 16px 0;
    border-top: 1px solid #dce6f5;
    border-bottom: 1px solid #dce6f5;
    mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
  }
  .tech-ticker {
    display: flex;
    gap: 44px;
    width: max-content;
    animation: tickerScroll 32s linear infinite;
  }
  .tech-ticker:hover { animation-play-state: paused; }
  @keyframes tickerScroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
  }
  .ticker-item {
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    font-size: .82rem;
    font-weight: 600;
    color: #8fa3c8;
    transition: color .2s;
  }
  .ticker-item:hover { color: #1a73e8; }
  .ticker-item img {
    width: 20px; height: 20px;
    object-fit: contain;
    flex-shrink: 0;
  }

  /* ── Responsive ─────────────────────────────────────────────── */
  @media (max-width: 992px) {
    .tech-grid { grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 14px; }
  }
  @media (max-width: 768px) {
    .tech-stack-section { padding: 64px 0 56px; }
    .tech-grid { grid-template-columns: repeat(auto-fill, minmax(110px, 1fr)); gap: 12px; }
    .tech-tabs { gap: 7px; }
    .tech-tab  { padding: 7px 14px; font-size: .78rem; }
  }
  @media (max-width: 480px) {
    .tech-stack-section { padding: 52px 0 44px; }
    .tech-grid { grid-template-columns: repeat(3, 1fr); gap: 10px; }
    .tech-card { padding: 14px 8px 12px; gap: 8px; }
    .tech-card-icon { width: 44px; height: 44px; }
    .tech-card-icon img, .tech-card-icon svg { width: 28px; height: 28px; }
    .tech-card-name { font-size: .72rem; }
    .tech-tabs { gap: 6px; }
    .tech-tab  { padding: 6px 12px; font-size: .75rem; }
    .tech-ticker-wrap { margin-top: 32px; }
  }
  @media (max-width: 360px) {
    .tech-grid { grid-template-columns: repeat(2, 1fr); }
  }
</style>

<section class="tech-stack-section">
  <div class="container">

    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Our Technology Stack</h2>
      <p class="section-subtitle">Best-in-class tools &amp; frameworks powering every solution</p>
    </div>

    <!-- Tabs -->
    <div class="tech-tabs" id="techTabs">
      <button class="tech-tab active" data-panel="frontend">Frontend</button>
      <button class="tech-tab" data-panel="backend">Backend</button>
      <button class="tech-tab" data-panel="mobile">Mobile</button>
      <button class="tech-tab" data-panel="cloud">Cloud &amp; DevOps</button>
      <button class="tech-tab" data-panel="ai">AI &amp; ML</button>
      <button class="tech-tab" data-panel="database">Database</button>
    </div>

    <!-- ── FRONTEND ─────────────────────────────────────────── -->
    <div class="tech-grid tech-panel active" id="panel-frontend">

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- React official -->
          <svg viewBox="-11.5 -10.23174 23 20.46348" xmlns="http://www.w3.org/2000/svg"><circle cx="0" cy="0" r="2.05" fill="#61DAFB"/><g stroke="#61DAFB" stroke-width="1" fill="none"><ellipse rx="11" ry="4.2"/><ellipse rx="11" ry="4.2" transform="rotate(60)"/><ellipse rx="11" ry="4.2" transform="rotate(120)"/></g></svg>
        </div>
        <div class="tech-card-name">React.js</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:95%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Vue official -->
          <svg viewBox="0 0 261.76 226.69" xmlns="http://www.w3.org/2000/svg"><path d="M161.096.001l-30.225 52.351L100.647.001H-.005l130.877 226.688L261.749.001z" fill="#41B883"/><path d="M161.096.001l-30.225 52.351L100.647.001H52.346l78.526 136.01L209.398.001z" fill="#34495E"/></svg>
        </div>
        <div class="tech-card-name">Vue.js</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:85%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Angular official -->
          <svg viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg"><path d="M125 30L31.9 63.2l14.2 123.1L125 230l78.9-43.7 14.2-123.1z" fill="#DD0031"/><path d="M125 30v22.2-.1V230l78.9-43.7 14.2-123.1L125 30z" fill="#C3002F"/><path d="M125 52.1L66.8 182.6h21.7l11.7-29.2h49.4l11.7 29.2H183L125 52.1zm17 83.3h-34l17-40.9 17 40.9z" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Angular</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:80%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- TypeScript official -->
          <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg"><rect width="400" height="400" rx="50" fill="#3178C6"/><path d="M87.7 201.7v21.3h64v182H174v-182h64v-21.3H87.7z" fill="#fff"/><path d="M304.1 337.8c5.8 2.9 12.6 5.1 21.5 5.1 19 0 31.6-9.5 31.6-24.7 0-12.4-7.1-20.3-24.7-27.5-13.5-5.4-19.4-9.4-19.4-16.5 0-5.8 4.7-10.6 14.3-10.6 8.4 0 14.3 2.9 18.8 5.5l4.7-15.3c-5.5-3.3-13.5-5.8-23.3-5.8-22 0-33.9 12.6-33.9 26.9 0 12.2 8.5 20.5 27.1 27.9 12.6 5 17 9.6 17 17 0 7.3-5.8 11.9-16.3 11.9-8.8 0-17-3.3-22.8-6.6l-4.9 15.3c6.1 3.4 16.2 6.5 24.8 6.6z" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">TypeScript</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:92%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Next.js official -->
          <svg viewBox="0 0 180 180" xmlns="http://www.w3.org/2000/svg"><mask id="nx" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="180" height="180"><circle cx="90" cy="90" r="90" fill="#000"/></mask><g mask="url(#nx)"><circle cx="90" cy="90" r="90" fill="#000"/><path d="M149.508 157.52L69.142 54H54v71.97h11.687V70.5l72.321 94.06a90.375 90.375 0 0011.5-7.04z" fill="url(#p1)"/><rect x="115" y="54" width="12" height="72" fill="url(#p2)"/></g><defs><linearGradient id="p1" x1="109" y1="116.5" x2="144.5" y2="160.5" gradientUnits="userSpaceOnUse"><stop stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient><linearGradient id="p2" x1="121" y1="54" x2="120.799" y2="106.875" gradientUnits="userSpaceOnUse"><stop stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient></defs></svg>
        </div>
        <div class="tech-card-name">Next.js</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:88%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Tailwind official -->
          <svg viewBox="0 0 54 33" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M27 0C19.8 0 15.3 3.6 13.5 10.8c2.7-3.6 5.85-4.95 9.45-4.05 2.054.513 3.522 2.004 5.147 3.653C30.744 13.09 33.808 16.2 40.5 16.2c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C36.756 3.11 33.692 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.054.514 3.522 2.004 5.147 3.653C17.244 29.29 20.308 32.4 27 32.4c7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.054-.513-3.522-2.004-5.147-3.653C23.256 19.31 20.192 16.2 13.5 16.2z" fill="#38BDF8"/></svg>
        </div>
        <div class="tech-card-name">Tailwind CSS</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:90%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- GraphQL official -->
          <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg"><path fill="#E10098" d="M57.468 302.66l-14.376-8.3 160.15-277.38 14.376 8.3z"/><path fill="#E10098" d="M39.8 272.2h320.3v16.6H39.8z"/><path fill="#E10098" d="M206.348 374.026l-160.21-92.5 8.3-14.376 160.21 92.5zM345.522 132.947l-160.21-92.5 8.3-14.376 160.21 92.5z"/><path fill="#E10098" d="M54.482 132.883l-8.3-14.375 160.21-92.5 8.3 14.376z"/><path fill="#E10098" d="M342.568 302.663l-160.15-277.38 14.376-8.3 160.15 277.38zM52.5 107.5h16.6v185H52.5zM330.9 107.5h16.6v185h-16.6z"/><path fill="#E10098" d="M203.522 367l-7.25-12.558 139.34-80.45 7.25 12.557z"/><circle fill="#E10098" cx="200" cy="362.9" r="28.6"/><circle fill="#E10098" cx="369.4" cy="200" r="28.6"/><circle fill="#E10098" cx="30.6" cy="200" r="28.6"/><circle fill="#E10098" cx="200" cy="37.1" r="28.6"/><circle fill="#E10098" cx="330.6" cy="117.1" r="28.6"/><circle fill="#E10098" cx="69.4" cy="117.1" r="28.6"/><circle fill="#E10098" cx="330.6" cy="282.9" r="28.6"/><circle fill="#E10098" cx="69.4" cy="282.9" r="28.6"/></svg>
        </div>
        <div class="tech-card-name">GraphQL</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:78%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Webpack official -->
          <svg viewBox="0 0 1200 1200" xmlns="http://www.w3.org/2000/svg"><path d="M600 50L75 337.5v525L600 1150l525-287.5v-525z" fill="#8DD6F9"/><path d="M600 50L75 337.5v525L600 1150V50z" fill="#1C78C0"/><path d="M1050 862.5L600 1150V50l450 287.5v525z" fill="#75AFCC"/><path d="M600 225L200 450v300l400 225 400-225V450z" fill="#fff"/><path d="M400 600l-100-50v-150l100 75zM800 600l100-50v-150l-100 75zM600 725l-150-75v-100l150 75 150-75v100z" fill="#8DD6F9"/></svg>
        </div>
        <div class="tech-card-name">Webpack</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:75%"></div></div>
      </div>

    </div>

    <!-- ── BACKEND ──────────────────────────────────────────── -->
    <div class="tech-grid tech-panel" id="panel-backend">

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Node.js official -->
          <svg viewBox="0 0 256 282" xmlns="http://www.w3.org/2000/svg"><path d="M116.504 3.58c6.962-3.985 16.03-4.003 22.986 0l101.975 58.595c6.968 3.995 11.5 11.442 11.5 19.367v117.19c0 7.925-4.532 15.372-11.5 19.367l-101.975 58.595c-6.962 3.985-16.03 4.003-22.986 0L14.53 218.1C7.562 214.105 3 206.658 3 198.733V81.543c0-7.925 4.532-15.372 11.5-19.367L116.504 3.58z" fill="#539E43"/><path d="M128 32.5l-90 51.96v103.92L128 240l90-51.96V84.46L128 32.5z" fill="#fff"/><text x="128" y="170" font-size="90" font-weight="bold" text-anchor="middle" fill="#539E43" font-family="Arial">JS</text></svg>
        </div>
        <div class="tech-card-name">Node.js</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:95%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Python official -->
          <svg viewBox="0 0 256 255" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="py1" x1="12.959%" y1="12.039%" x2="79.639%" y2="78.201%"><stop offset="0%" stop-color="#387EB8"/><stop offset="100%" stop-color="#366994"/></linearGradient><linearGradient id="py2" x1="19.128%" y1="20.579%" x2="90.742%" y2="88.429%"><stop offset="0%" stop-color="#FFE052"/><stop offset="100%" stop-color="#FFC331"/></linearGradient></defs><path d="M126.916.072c-64.832 0-60.784 28.115-60.784 28.115l.072 29.128h61.868v8.745H41.631S.145 61.355.145 126.77c0 65.417 36.21 63.097 36.21 63.097h21.61v-30.356s-1.165-36.21 35.632-36.21h61.362s34.475.557 34.475-33.319V33.97S194.67.072 126.916.072z" fill="url(#py1)"/><path d="M128.757 254.126c64.832 0 60.784-28.115 60.784-28.115l-.072-29.127H127.6v-8.745h86.441s41.486 4.705 41.486-60.712c0-65.416-36.21-63.096-36.21-63.096h-21.61v30.355s1.165 36.21-35.632 36.21h-61.362s-34.475-.557-34.475 33.32v56.013s-5.235 33.897 62.518 33.897z" fill="url(#py2)"/><circle cx="96.879" cy="30.141" r="12.439" fill="#fff"/><circle cx="159.252" cy="224.948" r="12.439" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Python</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:92%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Laravel official -->
          <svg viewBox="0 0 50 52" xmlns="http://www.w3.org/2000/svg"><path d="M49.626 11.564a.809.809 0 01.028.209v10.972a.8.8 0 01-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01a.823.823 0 01-.044.025.808.808 0 01-.press.02l-.023.013a.79.79 0 01-.612 0l-.028-.015-.04-.022L.408 39.944A.801.801 0 010 39.25V6.334a.83.83 0 01.028-.209l.049-.148a.809.809 0 01.162-.23l.019-.021.025-.017L10.44.232a.803.803 0 01.8 0l10.16 5.868a.8.8 0 01.4.694v20.69l8.008-4.62V11.773a.8.8 0 01.4-.694l10.16-5.866a.803.803 0 01.8 0l10.16 5.866a.8.8 0 01.298.485z" fill="#FF2D20"/><path d="M49.198 21.987l-9.021 5.201-9.021-5.201 9.021-5.201 9.021 5.201zM20.02 46.129l-9.021 5.202V40.725l9.021-5.202v10.606zM.802 6.534l9.021 5.201v10.403L.802 17.338V6.534z" fill="#fff" opacity=".4"/><path d="M20.02 5.928l9.021 5.201-9.021 5.201-9.021-5.201 9.021-5.201z" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Laravel</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:88%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Java official -->
          <svg viewBox="0 0 256 346" xmlns="http://www.w3.org/2000/svg"><path d="M82.554 267.473s-13.198 7.675 9.393 10.272c27.369 3.122 41.356 2.675 71.517-3.034 0 0 7.93 4.972 19.003 9.279-67.611 28.977-153.019-1.679-99.913-16.517M74.292 229.659s-14.803 10.958 7.805 13.296c29.236 3.016 52.324 3.263 92.276-4.43 0 0 5.526 5.606 14.212 8.67-81.745 23.904-172.798 1.885-114.293-17.536" fill="#5382A1"/><path d="M143.942 165.515c16.66 19.18-4.377 36.427-4.377 36.427s42.301-21.837 22.874-49.183c-18.144-25.5-32.059-38.172 43.268-81.858 0 0-118.238 29.53-61.765 94.614" fill="#E76F00"/><path d="M233.364 295.442s9.767 8.047-10.757 14.273c-39.026 11.823-162.432 15.393-196.714.471-12.323-5.36 10.787-12.8 18.056-14.362 7.581-1.644 11.914-1.337 11.914-1.337-13.705-9.655-88.583 18.958-38.034 27.15 137.853 22.356 251.292-10.066 215.535-26.195M88.9 190.48s-62.771 14.91-22.228 20.323c17.15 2.292 51.359 1.774 83.2-.89 26.04-2.176 52.198-6.798 52.198-6.798s-9.192 3.969-15.858 8.548c-64.016 16.85-187.672 9.002-152.085-8.269 30.162-14.86 54.773-12.914 54.773-12.914M201.506 253.418c65.024-33.79 34.966-66.24 13.976-61.896-5.15 1.07-7.441 2.002-7.441 2.002s1.91-2.994 5.553-4.29c41.469-14.569 73.377 42.994-13.397 65.822 0 .001.979-.872 1.309-1.638M162.184.147s35.877 35.878-34.032 91.013c-56.077 44.282-12.786 69.53-.023 98.418-32.731-29.53-56.75-55.526-40.646-79.72C111.374 74.61 176.147 57.861 162.184.147" fill="#5382A1"/><path d="M95.098 330.705c62.398 3.995 158.259-2.219 160.582-31.773 0 0-4.361 11.2-51.613 20.073-53.111 10.012-118.516 8.844-157.354 2.425 0 0 7.95 6.58 48.385 9.275" fill="#E76F00"/></svg>
        </div>
        <div class="tech-card-name">Java / Spring</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:80%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Go official -->
          <svg viewBox="0 0 207.3 78" xmlns="http://www.w3.org/2000/svg"><path d="M16.2 24.1c-.4 0-.5-.2-.3-.5l2.1-2.7c.2-.3.7-.5 1.1-.5h35.7c.4 0 .5.3.3.6l-1.7 2.6c-.2.3-.7.6-1 .6zM1 32.3c-.4 0-.5-.2-.3-.5l2.1-2.7c.2-.3.7-.5 1.1-.5h45.6c.4 0 .6.3.5.6l-.8 2.4c-.1.4-.5.6-.9.6zM25.3 40.5c-.4 0-.5-.3-.3-.6l1.4-2.5c.2-.3.6-.6 1-.6h20c.4 0 .6.3.6.7l-.2 2.4c0 .4-.4.7-.7.7z" fill="#00ACD7"/><path d="M153.1 22.3c-6.3 1.6-10.6 2.8-16.8 4.4-1.5.4-1.6.5-2.9-1-1.5-1.7-2.6-2.8-4.7-3.8-6.3-3.1-12.4-2.2-18.1 1.5-6.8 4.4-10.3 10.9-10.2 19 .1 8 5.6 14.6 13.5 15.7 6.8.9 12.5-1.5 17-6.6.9-1.1 1.7-2.3 2.7-3.7H117c-2.1 0-2.6-1.3-1.9-3 1.3-3.1 3.7-8.3 5.1-10.9.3-.6 1-1.6 2.5-1.6h36.4c-.2 2.7-.2 5.4-.6 8.1-1.1 7.2-3.8 13.8-8.2 19.6-7.2 9.5-16.6 15.4-28.5 17-9.8 1.3-18.9-.6-26.9-6.6-7.4-5.6-11.6-13-12.7-22.2-1.3-10.9 1.9-20.7 8.5-29.3C97.7 17.7 107 12 118.4 10.2c9.4-1.5 18.4-.4 26.5 4.9 5.3 3.5 9.1 8.3 11.6 14.1.6.9.2 1.4-3.4 3.1z" fill="#00ACD7"/><path d="M186.2 72.3c-9.1-.2-17.4-2.8-24.4-8.8-5.9-5.1-9.6-11.6-10.8-19.3-1.8-11.3 1.3-21.3 8.1-30.2 7.3-9.6 16.1-14.6 28-16.7 10.2-1.8 19.8-.8 28.5 5.1 7.9 5.4 12.8 12.7 14.1 22.3 1.7 13.5-2.2 24.5-11.5 33.4-6.6 6.3-14.7 10.2-23.8 11.8-2.7.5-5.4.6-8.2.4zm23.2-37.9c-.1-1.3-.1-2.3-.3-3.3-1.8-9.9-10.9-15.5-20.4-13.3-9.3 2.1-15.3 8-17.5 17.4-1.8 7.8 2 15.7 9.2 18.9 5.5 2.4 11 2.1 16.3-.6 7.9-4.1 12.2-10.5 12.7-19.1z" fill="#00ACD7"/></svg>
        </div>
        <div class="tech-card-name">Go (Golang)</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:74%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Express / Node dark logo simplified -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="32" fill="#000"/><text x="128" y="148" font-size="72" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial,sans-serif">Ex</text></svg>
        </div>
        <div class="tech-card-name">Express.js</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:90%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- REST API generic icon -->
          <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="10" fill="#1a73e8"/><text x="32" y="26" font-size="11" font-weight="700" text-anchor="middle" fill="#fff" font-family="Arial">REST</text><text x="32" y="44" font-size="11" font-weight="700" text-anchor="middle" fill="#fff" font-family="Arial">API</text></svg>
        </div>
        <div class="tech-card-name">REST APIs</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:97%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Microservices icon -->
          <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><circle cx="32" cy="32" r="30" fill="none" stroke="#1a73e8" stroke-width="3"/><circle cx="32" cy="14" r="6" fill="#1a73e8"/><circle cx="14" cy="42" r="6" fill="#1a73e8"/><circle cx="50" cy="42" r="6" fill="#1a73e8"/><line x1="32" y1="20" x2="19" y2="38" stroke="#1a73e8" stroke-width="2"/><line x1="32" y1="20" x2="45" y2="38" stroke="#1a73e8" stroke-width="2"/><line x1="20" y1="42" x2="44" y2="42" stroke="#1a73e8" stroke-width="2"/></svg>
        </div>
        <div class="tech-card-name">Microservices</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:85%"></div></div>
      </div>

    </div>

    <!-- ── MOBILE ────────────────────────────────────────────── -->
    <div class="tech-grid tech-panel" id="panel-mobile">

      <div class="tech-card">
        <div class="tech-card-icon">
          <svg viewBox="-11.5 -10.23174 23 20.46348" xmlns="http://www.w3.org/2000/svg"><circle cx="0" cy="0" r="2.05" fill="#61DAFB"/><g stroke="#61DAFB" stroke-width="1" fill="none"><ellipse rx="11" ry="4.2"/><ellipse rx="11" ry="4.2" transform="rotate(60)"/><ellipse rx="11" ry="4.2" transform="rotate(120)"/></g></svg>
        </div>
        <div class="tech-card-name">React Native</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:92%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Flutter official -->
          <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path fill="#40C4FF" d="M26.72 6L6 26.72l6.89 6.89L40.5 6z"/><path fill="#40C4FF" d="M26.72 42l7.78-7.78-7.78-7.78-7.78 7.78z"/><path fill="#01579B" d="M18.94 26.44l7.78 7.78-7.78 7.78-7.78-7.78z"/><path fill="#084994" d="M18.94 26.44l7.78-7.78 3.89 3.89-3.89 3.89z"/></svg>
        </div>
        <div class="tech-card-name">Flutter</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:85%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Swift official -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="55" fill="#F05138"/><path d="M215.6 149.9c1.3-2.9 2.1-5.9 2.5-9 2.1-16-7.5-33.9-25.8-48-16.3-12.6-37.2-20-57.5-20-3.8 0-7.5.3-11.2.8 0 0-8.8-7.4-12.3-9.8-19.5-13.5-43.3-17.5-55.7-9.5-1.5 1-4.2 3.3-4.2 3.3 8.6 16.3 12.4 34 11.2 51.2v1c-.4 2.5-.7 5-.7 7.6 0 40.2 33.8 72.7 75.5 72.7 26.6 0 49.9-13.6 63.3-34.1 12.7 2.7 24.6 1.8 29.7-3.9l.7-.8c-3.3-1-11.8-2.5-15.5-1.5z" fill="#fff"/><path d="M150.2 72.7c15.4 11.6 26.8 27.1 30.8 43.1-10.5-16.3-28.9-28.7-49.5-34.1.6.5 1.2 1 1.8 1.5 14.3 13.1 19.3 31.2 12.5 44.5-9.3 18.4-35.6 24.5-58.7 13.6-8.8-4.1-15.9-10-21-17-2.1-2.8-3.9-5.8-5.3-8.9 5 7.4 12.6 14.1 22 19 19.3 9.8 41.4 8.3 52.9-5.2 7.9-9.1 8-22.3.5-35.4-.9-1.6-1.9-3.1-3-4.7-4-5.7-10.3-12.5-18.6-18.9-1.8-1.4-3.7-2.7-5.6-4C130.5 63.2 138.7 64.2 150.2 72.7z" fill="#F05138"/></svg>
        </div>
        <div class="tech-card-name">iOS / Swift</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:78%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Android/Kotlin official -->
          <svg viewBox="0 0 256 307" xmlns="http://www.w3.org/2000/svg"><path d="M153.9 144.3l54.4-94.2c3-5.2 1.1-11.8-4.1-14.8-5.2-3-11.8-1.1-14.8 4.1L134.4 134c-4.1-1-8.6-1.6-13.2-1.6-4.6 0-9.1.6-13.2 1.6L62.9 39.4C59.9 34.2 53.3 32.3 48 35.3c-5.2 3-7.1 9.6-4.1 14.8l54.4 94.2C74.8 157.5 62 178.5 62 202.3h197.2c0-23.8-12.8-44.8-30.2-58z" fill="#32DE84"/><circle cx="103.1" cy="167.7" r="12.6" fill="#fff"/><circle cx="178.1" cy="167.7" r="12.6" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Android / Kotlin</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:80%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Expo icon -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="40" fill="#000"/><path d="M128 50C85 50 50 85 50 128s35 78 78 78 78-35 78-78-35-78-78-78zm0 130c-28.7 0-52-23.3-52-52s23.3-52 52-52 52 23.3 52 52-23.3 52-52 52z" fill="#fff"/><circle cx="128" cy="128" r="20" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Expo</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:88%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Firebase for Push Notifications -->
          <svg viewBox="0 0 256 351" xmlns="http://www.w3.org/2000/svg"><path fill="#FFA000" d="M0 282.998l2.203-3.667L102.6 0l.528-.33 89.979 175.679-.538.532z"/><path fill="#F57F17" d="M115.484 293.179l.59-1.128L1.386 282.998 115.484 293.179z"/><path fill="#FFCA28" d="M256 259.872L192.597 175.38 115.484 293.179 256 259.872z"/><path fill="#FFA000" d="M115.484 293.179L192.597 175.38 102.6.33 115.484 293.179z"/><path fill="#F57F17" d="M256 259.872l-63.403-84.492 7.997 176.484z"/></svg>
        </div>
        <div class="tech-card-name">Push Notifications</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:95%"></div></div>
      </div>

    </div>

    <!-- ── CLOUD & DEVOPS ────────────────────────────────────── -->
    <div class="tech-grid tech-panel" id="panel-cloud">

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- AWS official -->
          <svg viewBox="0 0 304 182" xmlns="http://www.w3.org/2000/svg"><path d="M86.4 66.4c0 3.7.4 6.7 1.1 8.9.8 2.2 1.8 4.6 3.2 7.2.5.8.7 1.6.7 2.3 0 1-.6 2-1.9 3l-6.3 4.2c-.9.6-1.8.9-2.6.9-1 0-2-.5-3-1.4-1.4-1.5-2.6-3.1-3.6-4.7-1-1.7-2-3.6-3.1-5.9-7.8 9.2-17.6 13.8-29.4 13.8-8.4 0-15.1-2.4-20-7.2-4.9-4.8-7.4-11.2-7.4-19.2 0-8.5 3-15.4 9.1-20.6 6.1-5.2 14.2-7.8 24.5-7.8 3.4 0 6.9.3 10.6.8 3.7.5 7.5 1.3 11.5 2.2v-7.3c0-7.6-1.6-12.9-4.7-16-3.2-3.1-8.6-4.6-16.3-4.6-3.5 0-7.1.4-10.8 1.3-3.7.9-7.3 2-10.8 3.4-1.6.7-2.8 1.1-3.5 1.3-.7.2-1.2.3-1.6.3-1.4 0-2.1-1-2.1-3.1v-4.9c0-1.6.2-2.8.7-3.5.5-.7 1.4-1.4 2.8-2.1 3.5-1.8 7.7-3.3 12.6-4.5 4.9-1.3 10.1-1.9 15.6-1.9 11.9 0 20.6 2.7 26.2 8.1 5.5 5.4 8.3 13.6 8.3 24.6v32.4zM45.8 81.6c3.3 0 6.7-.6 10.3-1.8 3.6-1.2 6.8-3.4 9.5-6.4 1.6-1.9 2.8-4 3.4-6.4.6-2.4 1-5.3 1-8.7v-4.2c-2.9-.7-6-.1-9.2-1.5-3.2-.5-6.3-.7-9.3-.7-6.6 0-11.5 1.3-14.7 4-3.2 2.7-4.8 6.5-4.8 11.5 0 4.7 1.2 8.2 3.7 10.6 2.4 2.5 5.9 3.6 10.1 3.6zm79.3 10.7c-1.8 0-3-.3-3.8-1-.8-.6-1.5-2-2.1-3.9L92.1 10.6c-.6-2-.9-3.3-.9-4 0-1.6.8-2.5 2.4-2.5h9.8c1.9 0 3.2.3 3.9 1 .8.6 1.4 2 2 3.9l22.3 87.9 20.7-87.9c.5-2 1.1-3.3 1.9-3.9.8-.6 2.2-1 4-1h8c1.9 0 3.2.3 4 1 .8.6 1.5 2 1.9 3.9l20.9 89 22.9-89c.6-2 1.3-3.3 2-3.9.8-.6 2.1-1 3.9-1h9.3c1.6 0 2.5.8 2.5 2.5 0 .5-.1 1-.2 1.6-.1.6-.4 1.4-.8 2.5l-27.8 76.8c-.6 2-1.3 3.3-2.1 3.9-.8.6-2.1 1-3.8 1h-8.6c-1.9 0-3.2-.3-4-1-.8-.7-1.5-2-1.9-4L156.9 24 136.2 88.3c-.5 2-1.1 3.3-1.9 4-.8.7-2.2 1-4 1h-5.2zm148.5 3.1c-5.2 0-10.4-.6-15.4-1.8-5-1.2-8.9-2.5-11.5-4-1.6-.9-2.7-1.9-3.1-2.8-.4-.9-.6-1.9-.6-2.8v-5.1c0-2.1.8-3.1 2.3-3.1.6 0 1.2.1 1.8.3.6.2 1.5.6 2.5 1 3.4 1.5 7.1 2.7 11 3.5 4 .8 7.9 1.2 11.9 1.2 6.3 0 11.2-1.1 14.6-3.3 3.4-2.2 5.2-5.4 5.2-9.5 0-2.8-.9-5.1-2.7-7-1.8-1.9-5.2-3.6-10.1-5.2L247 52.4c-7.3-2.3-12.7-5.7-16-10.2-3.3-4.4-5-9.3-5-14.5 0-4.2.9-7.9 2.7-11.1 1.8-3.2 4.2-6 7.2-8.2 3-2.3 6.4-4 10.4-5.2 4-1.2 8.2-1.7 12.6-1.7 2.2 0 4.5.1 6.7.4 2.3.3 4.4.7 6.5 1.1 2 .5 3.9 1 5.7 1.6 1.8.6 3.2 1.2 4.2 1.8 1.4.8 2.4 1.6 3 2.5.6.8.9 1.9.9 3.3v4.7c0 2.1-.8 3.2-2.3 3.2-.8 0-2.1-.4-3.8-1.2-5.7-2.6-12.1-3.9-19.2-3.9-5.7 0-10.2.9-13.3 2.8-3.1 1.9-4.7 4.8-4.7 8.8 0 2.8 1 5.2 3 7.1 2 1.9 5.7 3.8 11 5.5l14.2 4.5c7.2 2.3 12.4 5.5 15.5 9.6 3.1 4.1 4.6 8.8 4.6 14 0 4.3-.9 8.2-2.6 11.6-1.8 3.4-4.2 6.4-7.3 8.8-3.1 2.5-6.8 4.3-11.1 5.6-4.5 1.4-9.2 2.1-14.3 2.1z" fill="#252F3E"/><path d="M273.5 143.7c-32.9 24.3-80.7 37.2-121.8 37.2-57.6 0-109.5-21.3-148.7-56.7-3.1-2.8-.3-6.6 3.4-4.4 42.4 24.6 94.7 39.5 148.8 39.5 36.5 0 76.6-7.6 113.5-23.2 5.5-2.5 10.2 3.6 4.8 7.6z" fill="#FF9900"/><path d="M287.2 128.1c-4.2-5.4-27.8-2.6-38.5-1.3-3.2.4-3.7-2.4-.8-4.5 18.8-13.2 49.7-9.4 53.3-5 3.6 4.5-1 35.4-18.6 50.2-2.7 2.3-5.3 1.1-4.1-1.9 4-9.9 12.9-32.2 8.7-37.5z" fill="#FF9900"/></svg>
        </div>
        <div class="tech-card-name">AWS</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:95%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Google Cloud official -->
          <svg viewBox="0 0 256 212" xmlns="http://www.w3.org/2000/svg"><path d="M170.3 55.7l27-27L199 22c-38.3-35.8-98.7-34.1-135 4.9-10.3 11-17.8 24.2-22.3 38.4l23 2.9 39.7-7.3 2.9-5.2z" fill="#EA4335"/><path d="M219.8 65.4c-5.5-20.4-17.5-38.6-34.1-52l-35 35c15.9 13 25.1 32.4 24.6 52.7v6.6c18.2 0 33 14.8 33 33s-14.8 33-33 33h-66.1l-6.5 6.7v39.6l6.5 6.4h66.1c47.2.3 85.7-37.8 86-85 .2-28.7-13.7-55.8-37-72.5l.5.5z" fill="#4285F4"/><path d="M43.2 212h66v-66.3h-66C38.7 145.7 32 139 32 131s6.7-14.7 11.2-14.7h.4l-22.4-23.4c-24.8 18-30.1 52.4-12.2 77.2C18 183.5 29.9 211.8 43.2 212z" fill="#34A853"/><path d="M109.2 80.2c-36.2 0-65.5 29.3-65.5 65.5 0 18.5 7.8 36.2 21.5 48.8l23.4-23.4c-13.7-12.4-14.7-33.5-2.3-47.3 12.4-13.7 33.5-14.7 47.3-2.3 6.6 5.8 10.4 14.2 10.4 23l23.5 23.5c26.3-24.4 27.9-65.3 3.5-91.5-12.8-13.7-30.6-21.4-49.4-21.3l-12.4 24.9v.1z" fill="#FBBC05"/></svg>
        </div>
        <div class="tech-card-name">Google Cloud</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:88%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Azure official -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M134.4 26.3L73 152.6l43.9 42.8L128 222H26l30.4-17.5 38.6-69.5L134.4 26.3z" fill="#0078D4"/><path d="M152.3 42.5L107 148.7l61.5 58.4L230 222H128l25.5-34.1-31.5-35.2 52.1-98.7-21.8-11.5z" fill="#0078D4"/></svg>
        </div>
        <div class="tech-card-name">Microsoft Azure</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:82%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Docker official -->
          <svg viewBox="0 0 256 185" xmlns="http://www.w3.org/2000/svg"><path d="M236.33 74.4a52.64 52.64 0 00-5.73-.48 56.39 56.39 0 00-4.37.17c-1.3-22.63-14.2-42.43-33.84-53.79l-6.83-3.95-4.2 6.7C175.09 32.6 171.2 43.7 171.7 55c.23 5.3 2.05 14.67 7.43 22.92a53.46 53.46 0 01-10.81 4.14 64.07 64.07 0 01-16 2.3H.67L0 87.7c-1.08 19.04 4.8 38.03 16.85 53.3 15.23 18.5 38.14 27.87 67.8 27.87 64.54 0 112.3-29.93 134.67-84.6 15.6.31 31.3-3.96 39.24-19.1l1.95-3.66-4.64-2.73a41.34 41.34 0 00-19.54-4.38z" fill="#399CFC"/><path d="M98.05 75.04H78.38V56.43h19.67v18.61zm0-24.92H78.38V31.55h19.67v18.57zm0-24.97H78.38V6.63h19.67v18.52zM123.18 75.04h-19.67V56.43h19.67v18.61zm0-24.92h-19.67V31.55h19.67v18.57zM148.34 75.04h-19.65V56.43h19.65v18.61zm0-24.92h-19.65V31.55h19.65v18.57zM72.95 75.04H53.27V56.43h19.68v18.61zm0-24.92H53.27V31.55h19.68v18.57zM47.8 75.04H28.12V56.43H47.8v18.61z" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Docker</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:92%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Kubernetes official -->
          <svg viewBox="0 0 256 249" xmlns="http://www.w3.org/2000/svg"><path d="M82.8 237.5l44.7 11.3 45-11.2 38.1-27.7 20-44.5V118l-20.4-46.2-38.6-27-44.2-10.7-44 10.7-39 27-20.5 46.7v47.9l20.6 44 37.3 26.1z" fill="#326CE5"/><path d="M128 50.5l-11.5 2.8 6.5 7.7v.1c.1.1.2.2.2.4 0 .4-.3.7-.7.7h-.2l-9.3-2-9.3-1.1-4.2 6.1 10.5 3.5c.3.1.5.4.5.7 0 .2-.1.3-.2.4l-.1.1-7.2 6.9c-.7 3.8-1.2 7.5-1.4 10.8l8.8-1.8c.3-.1.6.1.7.4l.1.3-1.4 12.6 11.6 5.4 9.5-8.4c.2-.2.5-.2.7 0l9.5 8.4 11.6-5.4-1.4-12.6c0-.3.2-.6.5-.7h.1l8.8 1.8c-.2-3.3-.7-7-1.4-10.8l-7.3-6.9c-.2-.2-.2-.5 0-.7l.1-.1 10.4-3.5-4.2-6.1-9.3 1-9.3 2h-.1c-.4 0-.7-.3-.7-.7 0-.2.1-.3.2-.4v-.1l6.5-7.7L128 50.5zm24.7 51.6l2.6 23.7-21.5 8 .7.8-10.8 11.1c-1.3-.1-2.5-.2-3.7-.3V129l-.7.7-.7-.7v15.6c-1.2.1-2.4.2-3.7.3l-10.8-11.1.7-.8-21.5-8 2.6-23.7-11.8 4.7 1 1.3-5.7 8.3c-.5 1.8-.9 3.5-1.1 5.1l3.6.7-2.7 9.7 9.8 5.6 8.1-5.5c.2-.1.4-.1.6 0l17.5 11.3v14.8l-13.8 4.3.3.5-2.7 10.5 10.3 7.7 9.1-7c.2-.1.4-.1.6 0l9.1 7 10.3-7.7-2.7-10.5.3-.5-13.8-4.3v-14.8l17.5-11.3c.2-.1.4-.1.6 0l8.1 5.5 9.8-5.6-2.7-9.7 3.6-.7c-.2-1.6-.6-3.3-1.1-5.1l-5.7-8.3 1-1.3-11.8-4.7z" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Kubernetes</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:85%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- GitHub Actions / CI CD -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="40" fill="#2088FF"/><text x="128" y="100" font-size="36" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial">CI</text><text x="128" y="150" font-size="36" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial">CD</text></svg>
        </div>
        <div class="tech-card-name">CI/CD Pipelines</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:90%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Terraform official -->
          <svg viewBox="0 0 256 290" xmlns="http://www.w3.org/2000/svg"><path d="M159.7 80.2l69.6 40.2v80.3l-69.6-40.2V80.2z" fill="#5C4EE5"/><path d="M85.8 41.9l69.6 40.2v80.3L85.8 122V41.9z" fill="#4040B2"/><path d="M.2 80.2l69.6 40.2v80.3L.2 160.5V80.2z" fill="#5C4EE5"/><path d="M85.8 207.3l69.6 40.2v-80.3l-69.6-40.2v80.3z" fill="#4040B2"/></svg>
        </div>
        <div class="tech-card-name">Terraform</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:78%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Nginx official green N -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="40" fill="#009639"/><text x="128" y="175" font-size="160" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial,sans-serif">N</text></svg>
        </div>
        <div class="tech-card-name">Nginx / Caddy</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:86%"></div></div>
      </div>

    </div>

    <!-- ── AI & ML ───────────────────────────────────────────── -->
    <div class="tech-grid tech-panel" id="panel-ai">

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- TensorFlow official -->
          <svg viewBox="0 0 256 287" xmlns="http://www.w3.org/2000/svg"><path d="M128 .5L0 74.3v143.4L128 291.5l128-73.8V74.3L128 .5zM57 204.5V82.8l71 41V205l-71-0.5zm142 0l-71 .5V123.8l71-41v121.7z" fill="#FF6F00"/></svg>
        </div>
        <div class="tech-card-name">TensorFlow</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:88%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- PyTorch official -->
          <svg viewBox="0 0 256 311" xmlns="http://www.w3.org/2000/svg"><path d="M218.3 55.9L128 0 37.7 55.9v111.8l25.4 14.7V70.6l64.9-37.5 64.9 37.5v111.8L128 219.9l-64.9-37.5-25.4 14.7L128 255.8l90.3-52.2V55.9z" fill="#EE4C2C"/><circle cx="128" cy="30" r="14" fill="#EE4C2C"/></svg>
        </div>
        <div class="tech-card-name">PyTorch</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:84%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- OpenAI official -->
          <svg viewBox="0 0 320 320" xmlns="http://www.w3.org/2000/svg"><path d="M297.06 130.97c7.26-21.79 4.76-45.66-6.85-65.48-17.46-30.4-52.56-46.04-86.84-38.68-15.25-17.18-37.16-26.95-60.13-26.81-35.04-.08-66.13 22.48-76.91 55.82-22.51 4.61-42.05 18.39-54.17 38.03-17.26 30.48-13.38 68.36 9.92 94.83-7.26 21.79-4.76 45.66 6.85 65.48 17.46 30.4 52.56 46.04 86.84 38.68 15.24 17.18 37.16 26.95 60.13 26.81 35.06.09 66.16-22.49 76.94-55.86 22.51-4.61 42.05-18.39 54.17-38.03 17.26-30.48 13.37-68.36-9.95-94.78zM196.67 152l-21.84 12.61-21.84-12.61V126.8l21.84-12.61 21.84 12.61V152zm-21.84 107.41c-13.82.01-27.29-4.55-38.17-12.97 .48-.26 1.32-.72 1.87-1.05l63.36-36.59c3.24-1.87 5.23-5.32 5.21-9.04V150.57l26.82 15.49c.29.14.48.42.52.74v74.02c-.03 37.07-30.07 67.09-67.61 67.11v.48zM52.14 176.91a67.36 67.36 0 01-9.04-33.74c.01-.49.27-1.33.49-1.88l63.37 36.59c3.23 1.89 7.22 1.89 10.46 0l77.36-44.68v30.99c.02.32-.14.63-.39.82l-64.05 36.97c-32.12 18.54-73.19 7.52-91.73-24.49l-.47-.58zM100.41 96.8C86.58 104.8 76.77 118.38 73.1 134.15c-.48-.27-1.33-.73-1.88-1.05l-.01-73.02c.02-37.12 30.12-67.14 67.24-67.13 13.82-.01 27.29 4.56 38.17 12.98l-1.87 1.05L111.4 43.57c-3.23 1.87-5.23 5.32-5.2 9.04L106.2 155c0 0-.01 0 0 0l-26.82-15.49c-.28-.14-.48-.42-.52-.74l.01-73.02c0-1.73.7-3.38 1.94-4.57l1.04-.6 19.56-11.38.08.08.08.08c-.02.32-.16.63-.4.82l-.07.06-.02.05.3.17V96.8zM197.55 99c14.04-1.57 27.72 2.85 38.3 12.06l-63.37 36.59c-3.23 1.89-7.22 1.89-10.46 0l-77.36-44.68V72c-.02-.32.14-.63.39-.82l64.05-36.97C181.22 15.67 222.29 26.7 240.83 58.7a67.38 67.38 0 019.04 33.74c0 .49-.27 1.33-.49 1.88l-33.35-19.24c-1.42-.82-3-1.25-4.61-1.25-.02 0-.04 0-.06 0 .12-.62.19-1.25.19-1.88v-.74c0-3.97-2.1-7.62-5.51-9.61L197.55 99zm67.4 60.87c-.27.48-.73 1.32-1.05 1.87l-63.36-36.58c-3.24-1.89-7.22-1.89-10.46 0l-77.36 44.68v-30.99c-.02-.32.14-.63.39-.82l64.05-36.97c32.16-18.57 73.27-7.51 91.79 24.65z" fill="#000"/></svg>
        </div>
        <div class="tech-card-name">OpenAI API</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:92%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Scikit-learn -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="30" fill="#F89939"/><text x="128" y="110" font-size="38" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial">sklearn</text><text x="128" y="162" font-size="28" font-weight="700" text-anchor="middle" fill="#fff" font-family="Arial">scikit</text></svg>
        </div>
        <div class="tech-card-name">Scikit-Learn</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:85%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Pandas official logo colors -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="30" fill="#150458"/><rect x="70" y="50" width="40" height="156" rx="8" fill="#E70488"/><rect x="146" y="50" width="40" height="156" rx="8" fill="#E70488"/><rect x="70" y="95" width="116" height="66" rx="6" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Pandas / NumPy</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:90%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- LangChain icon -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="30" fill="#1C3C3C"/><path d="M60 128c0-37.6 30.4-68 68-68s68 30.4 68 68-30.4 68-68 68-68-30.4-68-68z" fill="none" stroke="#00D4AA" stroke-width="12"/><path d="M88 128h80M128 88v80" stroke="#00D4AA" stroke-width="10" stroke-linecap="round"/></svg>
        </div>
        <div class="tech-card-name">LangChain</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:80%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Hugging Face official -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><circle cx="128" cy="128" r="120" fill="#FFD21E"/><circle cx="96" cy="108" r="12" fill="#333"/><circle cx="160" cy="108" r="12" fill="#333"/><path d="M88 158c10 18 70 18 80 0" stroke="#333" stroke-width="8" stroke-linecap="round" fill="none"/><ellipse cx="72" cy="88" rx="14" ry="20" fill="#FF9D00" transform="rotate(-20,72,88)"/><ellipse cx="184" cy="88" rx="14" ry="20" fill="#FF9D00" transform="rotate(20,184,88)"/></svg>
        </div>
        <div class="tech-card-name">Hugging Face</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:78%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- MLflow icon -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="30" fill="#0194E2"/><text x="128" y="155" font-size="58" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial,sans-serif">ML</text></svg>
        </div>
        <div class="tech-card-name">MLflow</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:72%"></div></div>
      </div>

    </div>

    <!-- ── DATABASE ──────────────────────────────────────────── -->
    <div class="tech-grid tech-panel" id="panel-database">

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- PostgreSQL official -->
          <svg viewBox="0 0 256 267" xmlns="http://www.w3.org/2000/svg"><path d="M255.8 158c-.6-3.3-2.3-6.4-5.7-9.7-6-5.9-13.9-8.1-22.1-9.7 2.2-3.8 4.2-7.8 5.8-12.1 6-15.9 5.8-34.4-.5-51.5-6.6-17.6-20.4-30.5-37-35.8-5.7-1.8-11.8-2.7-18.1-2.5-.1-3.1-1.5-6.2-4.6-9.1-5.8-5.4-14.6-7.9-27.3-7.7-6.9.1-14.7 1-22.3 3.4-.7.2-1.3.5-2 .7C115.4 19.2 106.5 14 96.3 11c-7.7-2.3-17-3.5-26.5-2.5C55.5 10 43.1 15.1 33.6 23.5c-10.3 9-15.7 21.4-15.1 34.5.3 6.2 2 12.6 5.3 18.4-5.1 5.8-8.6 12.4-10.2 19.2-4 17.2-.4 36.2 9.4 50.4 6.5 9.4 15.2 16.3 25.1 20.2 1.5 5.6 4.1 11.5 7.7 17.2 5.5 8.6 12.7 15.4 20.5 19.4 1 .5 2 1 3 1.4l-.4 3.4c-.7 6.6-.3 13.9 4.8 18.8 2.4 2.3 5.5 3.5 8.7 3.7 4.6.3 9.1-1.4 12.9-3.9 3.4-2.3 6.5-5.5 9.1-9.5 5.4.4 10.9.2 16.3-.7 2.1 3.5 4.7 6.5 7.5 8.8 5 4 11.2 6 17.5 5.5 6-.5 11.6-3.4 16.5-8.1 8.1-7.5 11.8-19.7 9.5-31.7 4.4-2.1 8.4-4.6 12-7.5 9.5-7.5 15.7-18.7 16.6-30.5 5.8.5 11.6 1.5 16.5 4 3.5 1.8 6.8 4.4 8.4 8 .7 1.5.9 2.8.7 4-.1.7-.3 1.3-.5 1.9-.4.9-.8 1.7-1.3 2.5-2.2 3.7-5.5 6.5-9.3 8.1 4.3-1.1 8.3-3.7 11.4-7.4 1.5-1.8 2.8-4 3.5-6.5.6-2.5.4-5.3-.4-8.2z" fill="#336791"/><path d="M213.2 139.7c-2.3-.3-4.7-.5-7.2-.6 1.3-3.8 2.2-7.7 2.6-11.8.5-5.8.1-11.6-1.2-17.2 6.4.7 12.1 3.2 16 7 3 2.9 4.4 6 4.2 9.1-.3 6.4-6.2 11.4-14.4 13.5z" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">PostgreSQL</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:95%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- MySQL official -->
          <svg viewBox="0 0 256 133" xmlns="http://www.w3.org/2000/svg"><path d="M236.9 104.6c-13.7-.3-24.3 1-33.1 4.7-2.5 1.1-6.6 1.1-7 4.3.7.7.8 1.8 1.4 2.7 1.1 1.8 2.9 4.2 4.7 5.4 1.8 1.3 3.7 2.7 5.7 3.8 3.5 2.1 7.4 3.3 10.8 5.4 2 1.2 4 2.7 6 4 1 .7 1.6 1.8 2.9 2.3v-.3c-.7-.9-.9-2.1-1.5-3.1-1-1-2-1.9-2.9-2.9-2.9-3.8-6.5-7.2-10.3-9.8-3.1-2.1-10-5.2-11.3-8.6l-.2-.2c2.2-.2 4.7-.9 6.8-1.5 3.4-.9 6.5-.7 10-.8 1.6 0 3.1-.4 4.7-.6v-.9c-1.7-1.8-3-4.1-4.9-5.8-5-4.4-10.4-8.7-15.9-12.5-3.1-2.1-6.9-3.4-10.1-5.1-.7-.3-1.6-.3-2-.9-2.3-2.9-3.5-6.6-5.4-9.8-3.8-6.4-7.4-13.5-11-20.4-2.4-4.7-3.9-9.4-6.8-13.7-14-21-29.1-33.7-52.4-46.2-5-2.7-11-3.8-17.3-5.2l-10.2-.6c-2.1-.9-4.3-3.6-6.2-4.8C76.4 5.5 55.4-.9 36 .1c-11.5.6-22.9 4.3-32.6 9.5C.5 11.7 0 14 0 17c2.5.7 5.1 1.7 7.7 2 3.6.5 7.1.5 10.7.9l7.8 1.9c1.7.4 3.3 1.1 5 1.8l4.7 1.9c3.3 1.4 6.5 3.3 9.3 5.4 2.9 2.2 5.7 4.7 7.9 7.6l7 8.8c2.3 3 4.2 6.3 5.7 9.7 4.5 10.2 6.7 21.8 11.3 32 2.3 5.1 4.9 10 7.7 14.7 1.5 2.5 3.2 4.8 4.9 7.1.7.9 1.5 3 2.8 3.6 2.5-3.4 6.2-6.3 8.3-10 5.3-8.9 8-20.1 7.5-32.1 0-1.5-.6-3-.7-4.5-.1-.8 0-1.7 0-2.5l.3-2.5c0-1 .3-2.2.7-3.1 1-1.8 3.3-2.5 5.4-3.1 1.7-.5 4.5-.7 6.5-.5 2.2.2 4.4.8 6 1.4 1.8.6 3.8 1.4 4.9 2.5 1.2 1.1 2.5 2.3 3.5 3.6 3.4 4.3 5.3 10.1 5.7 16.5.1 2.2-.1 4.5-.3 6.6-.4 3.5-1 7-2.2 10.1-2.5 6.4-5.6 10.6-7.7 16.9 1.6 3 3.5 6.1 5.3 9 1.7 2.7 4.4 5.9 6.5 8.4l3.7 4.3c3 3.3 6.3 6.2 9.6 9.1 1.8 1.6 3.9 3.3 6 4.7h.3l-.3-.5c-.6-.8-1.3-1.5-1.9-2.3-1.5-1.9-3.2-4.3-4.6-6.4-6.6-10-12.8-21.5-16-33.9-.7-2.6-1.2-5.2-1.5-7.7.7 0 1.5-.1 2.2-.2 2.2-.2 4.4-.3 6.5-.7 3.6-.7 7-1.7 10.3-3.1 6.2-2.5 11.9-6.2 16.6-10.9 2.4-2.4 4.5-5.1 6.2-7.8 1.7-2.7 3.2-5.6 4.4-8.5 2.5-5.9 4.4-12.3 5-19.2.1-1.6 0-3.2.1-4.8.3-10.2-1.8-21-5-29.9-1.8-4.8-4.3-9.2-7.5-12.9-3.1-3.7-7.1-6.4-11.3-8-4.2-1.6-9.5-2.2-14.5-1.9-5.5.3-10.6 1.9-15.5 4.1C120.5 14.6 117 19 113.5 22l-.8 1.1c-.2-.2-.5-.3-.7-.5-1.3-1.1-2.7-2.2-4.1-3.2C103 16 97.4 13 91.5 11.2c-6.4-2-13.6-3.1-21.1-3.2-7.6-.1-14.9 1.1-21.4 3.1C39.7 15.2 28.5 23.2 24.3 30c-.7 1.1-1.5 2.2-2 3.3-1 2.4-.8 5.1.5 7.5 1.6 3 5.5 5.3 8.9 6.2 3.7.9 7.5 1.1 11.4 1.1 4.1 0 8.1-.5 12.1-1.3 4-.8 7.7-2.1 11.5-3.6 2.3-.9 4.8-2.1 7.2-3.2.5 2.7 1.2 5.3 1.8 8 1.2 5.3 2.5 10.8 3.9 16.1 1.7 6.5 3.6 12.9 6 19.1 2.4 6.2 5.4 12.3 9.3 17.8 2 2.9 4.3 5.7 6.7 8.3l3.7 3.9c.6.5 1.2 1.1 1.9 1.6-2.3 2.5-4.6 5-6.9 7.5-3.7 4-7.5 8.2-11.1 12.5-5.4 6.5-10.3 13.6-13.2 21.7-1.5 4.1-2.2 8.5-1.3 12.7.8 3.8 3.1 7.6 6.3 9.6 3.2 2 7.4 2.5 11.4 1.2 4-.8 7.7-2.8 10.9-5.4 6.2-5.1 10.5-13.1 13.3-21.5 1.5-4.5 2.5-9.2 3.3-13.8 5-1.4 10-2.4 15.1-2.6 3-.1 6.1-.1 9.1.1l2.6.2c-.4 1.2-.8 2.4-1.1 3.7-1.7 6.2-2.7 13-1.5 19.7.6 3.1 1.8 6.4 4.1 8.7 2.3 2.4 5.8 3.5 9 2.8 3.3-.8 6.1-3.3 8.2-6 4-5.2 5.9-12.6 6.5-19.5.2-2.2.3-4.3.2-6.5 3.3.3 6.5.9 9.6 1.7 11.3 2.8 21.8 8.7 28.9 17.6 3.5 4.4 6 9.4 7 14.7.5 2.7.5 5.4 0 7.9-.9 4.9-4 9.1-8.8 11.5-2.2 1.1-4.8 1.8-7.3 1.9-.5 0-1 0-1.6.1v.3c1.2.2 2.4.1 3.5.3 4.1.6 8 2.3 10.8 5 1.4 1.3 2.5 2.9 3 4.5.6 1.7.6 3.4.1 5-.4 1.4-1.2 2.8-2.3 4.1-1.1 1.3-2.6 2.7-4.2 3.7-3.3 2.1-7.2 3.5-11.1 4.4-4 .9-8.2 1.3-12.3 1.1-4-.2-7.9-1-11.6-2.4-1.9-.7-3.8-1.6-5.5-2.6-1.7-1-3.2-2.2-4.5-3.5-.7-.7-1.3-1.4-1.8-2.1-.2-.3-.4-.7-.5-1l-.1-.3h-.3c-1.1 2.3-1.5 5.1-.9 7.5.7 2.4 2.5 4.6 4.6 6.2 2.1 1.6 4.7 2.7 7.4 3.4 2.7.7 5.5.9 8.3.9 2.8 0 5.6-.3 8.4-.8 5.5-1 11.1-3 15.9-6.3 2.4-1.6 4.7-3.6 6.7-5.7 2-2.2 3.7-4.7 4.9-7.4 2.3-5.3 2.3-11.4.2-16.7-2.1-5.2-6.5-9.6-12-12.3-2.7-1.3-5.7-2.2-8.8-2.7 2.1-1.2 4.1-2.7 5.8-4.4 4.2-4.3 6.5-10.2 6.3-16.4-.2-6.2-2.9-12.2-7.3-16.8-8.9-9.3-23.5-14.7-39.3-15.7z" fill="#00758F"/><path d="M195.4 99.4c-3.8-.1-7.4.2-10.8.9-1.7.4-3.6.5-4.6 2-3.4 5-6.2 10.2-8.3 15.9 2.2 6.4 4.7 12.3 7.9 17.6 3.3 5.3 7.2 10 11.7 14.1 4.4 4 9 7.6 14 10.6 3.9 2.3 8 4.4 12.2 6l4.5 1.5 2.2.5h8.3l3.5-.5c2.3-.3 4.6-.9 6.8-1.7 4.3-1.6 8.4-4 11.6-7.3 3.2-3.2 5.5-7.2 6.2-11.6.4-2.2.2-4.5-.5-6.6-.7-2.1-2-4-3.7-5.5-3.3-2.9-7.9-4.5-12.9-5-.5 0-1.1-.1-1.6-.1h-.5v.3l1.4.3c2.4.5 4.8 1.5 6.5 3 .9.7 1.6 1.6 2.1 2.5.5 1 .7 2 .5 3-.3 1.8-1.6 3.4-3.3 4.5-1.7 1.2-3.8 1.9-5.9 2.2-2.1.4-4.3.4-6.4.1-4.3-.6-8.4-2.3-12.2-4.5-7.5-4.4-14.2-10.8-19.6-18.6-5.2-7.6-9.5-16.4-12.4-25.7l-.4-1.3c1-.3 2-.6 3-.8z" fill="#F29111"/></svg>
        </div>
        <div class="tech-card-name">MySQL</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:90%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- MongoDB official -->
          <svg viewBox="0 0 256 549" xmlns="http://www.w3.org/2000/svg"><path d="M175.622 61.108C152.612 33.807 132.797 6.078 128.749.32a1.03 1.03 0 00-1.492 0C123.209 6.078 103.394 33.807 80.378 61.108 16.697 139.704-3.123 166.61.767 234.884c3.464 74.01 53.015 135.498 121.74 159.648l1.036.357 1.035-.357c68.725-24.15 118.276-85.638 121.74-159.648 3.89-68.274-15.93-95.18-70.696-173.776z" fill="#589636"/><path d="M130.849 378.309l-2.067.76v-7.737c0-17.397-20.248-18.875-20.248-18.875L108.5 348.4c-14.484-5.24-35.46-8.718-62.3-4.04-16.26 2.777-30.688 8.68-30.688 8.68l-1.499.536 10.14 61.956 54.682 15.636 2.61.744 51.26-47.77-1.856-5.833z" fill="#3F722B"/></svg>
        </div>
        <div class="tech-card-name">MongoDB</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:88%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Redis official -->
          <svg viewBox="0 0 256 220" xmlns="http://www.w3.org/2000/svg"><path d="M245.97 168.943c-13.662 7.121-84.434 36.22-99.501 44.075-15.067 7.854-23.437 7.775-35.34 2.09C99.23 209.423 18.2 179.393 4.58 172.296c-6.81-3.536-7.048-7.29-.122-10.756l87.95-39.734c9.768-4.536 13.742-4.907 22.77-.232l132.373 57.67c6.552 3.1 5.733 7.08-.58 9.699z" fill="#912626"/><path d="M245.97 139.027c-13.662 7.12-84.434 36.22-99.501 44.075-15.067 7.854-23.437 7.775-35.34 2.09C99.23 179.407 18.2 149.377 4.58 142.28c-6.81-3.536-7.048-7.29-.122-10.757l87.95-39.733c9.768-4.536 13.742-4.907 22.77-.232l132.373 57.67c6.552 3.1 5.733 7.08-.58 9.799z" fill="#C6302B"/><path d="M245.97 109.112c-13.662 7.12-84.434 36.22-99.501 44.074-15.067 7.855-23.437 7.776-35.34 2.09C99.23 149.491 18.2 119.46 4.58 112.364c-6.81-3.536-7.048-7.29-.122-10.757l87.95-39.733c9.768-4.536 13.742-4.907 22.77-.232l132.373 57.67c6.552 3.1 5.733 7.08-.58 9.8z" fill="#912626"/><path d="M245.97 79.197c-13.662 7.12-84.434 36.219-99.501 44.074-15.067 7.855-23.437 7.776-35.34 2.09C99.23 119.576 18.2 89.545 4.58 82.448c-6.81-3.536-7.048-7.29-.122-10.756l87.95-39.734c9.768-4.536 13.742-4.907 22.77-.232l132.373 57.67c6.552 3.1 5.733 7.08-.58 9.8z" fill="#C6302B"/><path d="M166.05 28.604l-22.694-9.982-31.933 9.233 22.455 9.876z" fill="#fff"/><path d="M145.31 3.309L99.597 18.422l44.993 19.78 45.686-15.201z" fill="#fff"/></svg>
        </div>
        <div class="tech-card-name">Redis</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:85%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Elasticsearch official -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="30" fill="#00BFB3"/><text x="128" y="105" font-size="38" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial">Elastic</text><text x="128" y="160" font-size="30" font-weight="700" text-anchor="middle" fill="#fff" font-family="Arial">search</text></svg>
        </div>
        <div class="tech-card-name">Elasticsearch</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:80%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Firebase official -->
          <svg viewBox="0 0 256 351" xmlns="http://www.w3.org/2000/svg"><path fill="#FFA000" d="M0 282.998l2.203-3.667L102.6 0l.528-.33 89.979 175.679-.538.532z"/><path fill="#F57F17" d="M115.484 293.179l.59-1.128L1.386 282.998 115.484 293.179z"/><path fill="#FFCA28" d="M256 259.872L192.597 175.38 115.484 293.179 256 259.872z"/><path fill="#FFA000" d="M115.484 293.179L192.597 175.38 102.6.33 115.484 293.179z"/><path fill="#F57F17" d="M256 259.872l-63.403-84.492 7.997 176.484z"/></svg>
        </div>
        <div class="tech-card-name">Firebase</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:82%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- Supabase official -->
          <svg viewBox="0 0 256 263" xmlns="http://www.w3.org/2000/svg"><path d="M149.602 258.579c-6.718 8.46-20.338 3.814-20.338-6.895V150.364h89.032c16.157 0 25.07 18.535 14.857 31.215L149.602 258.58z" fill="url(#sb1)"/><path d="M149.602 258.579c-6.718 8.46-20.338 3.814-20.338-6.895V150.364h89.032c16.157 0 25.07 18.535 14.857 31.215L149.602 258.58z" fill="url(#sb2)" opacity=".2"/><path d="M106.399 4.418c6.718-8.46 20.338-3.814 20.338 6.895V111.63H37.705c-16.157 0-25.07-18.534-14.857-31.215L106.398 4.418z" fill="#3ECF8E"/><defs><linearGradient id="sb1" x1="53.974" y1="54.974" x2="94.163" y2="105.368" gradientUnits="userSpaceOnUse"><stop stop-color="#249361"/><stop offset="1" stop-color="#3ECF8E"/></linearGradient><linearGradient id="sb2" x1="36.156" y1="30.578" x2="54.484" y2="65.081" gradientUnits="userSpaceOnUse"><stop/><stop offset="1" stop-opacity="0"/></linearGradient></defs></svg>
        </div>
        <div class="tech-card-name">Supabase</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:76%"></div></div>
      </div>

      <div class="tech-card">
        <div class="tech-card-icon">
          <!-- DynamoDB AWS orange -->
          <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect width="256" height="256" rx="30" fill="#C7511F"/><text x="128" y="108" font-size="34" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial">Dynamo</text><text x="128" y="158" font-size="34" font-weight="900" text-anchor="middle" fill="#fff" font-family="Arial">DB</text></svg>
        </div>
        <div class="tech-card-name">DynamoDB</div>
        <div class="tech-card-level"><div class="tech-card-level-fill" style="width:78%"></div></div>
      </div>

    </div>

    <!-- Scrolling ticker -->
    <div class="tech-ticker-wrap">
      <div class="tech-ticker">
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/react/61DAFB" alt="React"> React.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/nodedotjs/339933" alt="Node"> Node.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/python/3776AB" alt="Python"> Python</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/amazonaws/FF9900" alt="AWS"> AWS</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/docker/2496ED" alt="Docker"> Docker</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/kubernetes/326CE5" alt="K8s"> Kubernetes</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/tensorflow/FF6F00" alt="TF"> TensorFlow</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/postgresql/4169E1" alt="PG"> PostgreSQL</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/flutter/02569B" alt="Flutter"> Flutter</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/typescript/3178C6" alt="TS"> TypeScript</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/googlecloud/4285F4" alt="GCP"> Google Cloud</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/microsoftazure/0078D4" alt="Azure"> Azure</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/openai/000000" alt="OpenAI"> OpenAI</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/mongodb/47A248" alt="Mongo"> MongoDB</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/vuedotjs/4FC08D" alt="Vue"> Vue.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/redis/DC382D" alt="Redis"> Redis</div>
        <!-- duplicate for seamless loop -->
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/react/61DAFB" alt="React"> React.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/nodedotjs/339933" alt="Node"> Node.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/python/3776AB" alt="Python"> Python</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/amazonaws/FF9900" alt="AWS"> AWS</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/docker/2496ED" alt="Docker"> Docker</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/kubernetes/326CE5" alt="K8s"> Kubernetes</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/tensorflow/FF6F00" alt="TF"> TensorFlow</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/postgresql/4169E1" alt="PG"> PostgreSQL</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/flutter/02569B" alt="Flutter"> Flutter</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/typescript/3178C6" alt="TS"> TypeScript</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/googlecloud/4285F4" alt="GCP"> Google Cloud</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/microsoftazure/0078D4" alt="Azure"> Azure</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/openai/000000" alt="OpenAI"> OpenAI</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/mongodb/47A248" alt="Mongo"> MongoDB</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/vuedotjs/4FC08D" alt="Vue"> Vue.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/redis/DC382D" alt="Redis"> Redis</div>
      </div>
    </div>

  </div>
</section>

<script>
(function () {
  'use strict';
  const tabs   = document.querySelectorAll('.tech-tab');
  const panels = document.querySelectorAll('.tech-panel');
  tabs.forEach(function(tab) {
    tab.addEventListener('click', function () {
      tabs.forEach(function(t) { t.classList.remove('active'); });
      panels.forEach(function(p) { p.classList.remove('active'); });
      this.classList.add('active');
      var target = document.getElementById('panel-' + this.dataset.panel);
      if (target) target.classList.add('active');
    });
  });
})();
</script>