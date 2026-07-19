<!-- ============================================================
     CLIENT VOICES — auto-scrolling "wall of love"
     ============================================================ -->

<style>
  .voices-section {
    padding: 84px 0 70px;
    background: var(--white);
    overflow: hidden;
  }

  .voices-row {
    overflow: hidden;
    -webkit-mask-image: linear-gradient(90deg, transparent 0, #000 6%, #000 94%, transparent 100%);
    mask-image: linear-gradient(90deg, transparent 0, #000 6%, #000 94%, transparent 100%);
  }
  .voices-row + .voices-row { margin-top: 20px; }

  .voices-track {
    display: flex;
    width: max-content;
    gap: 18px;
    animation: voices-scroll-left 46s linear infinite;
  }
  .voices-row-reverse .voices-track {
    animation-name: voices-scroll-right;
    animation-duration: 52s;
  }
  .voices-row:hover .voices-track { animation-play-state: paused; }

  @keyframes voices-scroll-left {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
  }
  @keyframes voices-scroll-right {
    from { transform: translateX(-50%); }
    to   { transform: translateX(0); }
  }
  @media (prefers-reduced-motion: reduce) {
    .voices-track { animation: none; }
  }

  .voice-card {
    flex: 0 0 320px;
    background: #f8faff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .voice-stars { display: flex; gap: 3px; }
  .voice-stars i { color: #ff9800; font-size: .78rem; }
  .voice-quote {
    font-size: .85rem;
    color: #4a5a75;
    line-height: 1.65;
  }
  .voice-person {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: auto;
    padding-top: 8px;
  }
  .voice-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .7rem; font-weight: 700;
    flex-shrink: 0;
  }
  .va-blue   { background: #deeeff; color: #1565c0; }
  .va-green  { background: #dff3e1; color: #2e7d32; }
  .va-orange { background: #ffecd8; color: #e65100; }
  .va-purple { background: #ede7f6; color: #6a1b9a; }
  .va-teal   { background: #e0f7fa; color: #00696f; }
  .va-pink   { background: #fce4ec; color: #ad1457; }
  .voice-name {
    font-size: .8rem;
    font-weight: 700;
    color: #1a1a2e;
    line-height: 1.2;
  }
  .voice-role {
    font-size: .71rem;
    color: #8fa3c8;
  }
</style>

<section class="voices-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">What Clients Say About Kawach</h2>
      <p class="section-subtitle">Real feedback from founders and teams we've partnered with</p>
    </div>
  </div>

  @php
    $voicesRow1 = [
      ['stars'=>5,'quote'=>'Kawach shipped our MVP in half the time we quoted internally. Communication was clear at every step.', 'name'=>'Priya Nair', 'role'=>'Founder, StackReel', 'initials'=>'PN', 'tone'=>'blue'],
      ['stars'=>5,'quote'=>'They caught a scaling issue in our architecture before it ever hit production. That kind of foresight is rare.', 'name'=>'Marcus Lee', 'role'=>'CTO, FinEdge', 'initials'=>'ML', 'tone'=>'green'],
      ['stars'=>5,'quote'=>'Genuinely felt like an extension of our own team, not an outsourced vendor. Highly recommend.', 'name'=>'Sofia Rossi', 'role'=>'Product Lead, EduSpark', 'initials'=>'SR', 'tone'=>'orange'],
      ['stars'=>5,'quote'=>'Our checkout conversion went up 22% after the redesign. The team backed every decision with data.', 'name'=>'Daniel Kim', 'role'=>'CEO, RetailPulse', 'initials'=>'DK', 'tone'=>'purple'],
      ['stars'=>5,'quote'=>'Responsive, transparent pricing, and the code quality made our next hire\'s onboarding painless.', 'name'=>'Grace Okafor', 'role'=>'Ops Director, LogiChain', 'initials'=>'GO', 'tone'=>'teal'],
    ];
    $voicesRow2 = [
      ['stars'=>5,'quote'=>'We came in with a vague idea and left with a working product roadmap and a shipped beta in weeks.', 'name'=>'Ethan Brooks', 'role'=>'Founder, CloudNest', 'initials'=>'EB', 'tone'=>'pink'],
      ['stars'=>5,'quote'=>'Security was never an afterthought with Kawach — it was built in from day one, which mattered a lot to us.', 'name'=>'Aisha Rahman', 'role'=>'VP Engineering, SecurVault', 'initials'=>'AR', 'tone'=>'blue'],
      ['stars'=>5,'quote'=>'Every sprint demo actually matched what we asked for. No surprises, no scope creep.', 'name'=>'Lucas Fischer', 'role'=>'CTO, BuildTrack', 'initials'=>'LF', 'tone'=>'green'],
      ['stars'=>5,'quote'=>'They rebuilt our data pipeline and cut report generation time from hours to minutes.', 'name'=>'Hana Suzuki', 'role'=>'Head of Data, MetricFlow', 'initials'=>'HS', 'tone'=>'orange'],
      ['stars'=>5,'quote'=>'Best vendor relationship we\'ve had — proactive, honest about tradeoffs, and easy to reach.', 'name'=>'Omar Haddad', 'role'=>'Founder, NestQuarters', 'initials'=>'OH', 'tone'=>'purple'],
    ];
  @endphp

  <div class="voices-row">
    <div class="voices-track">
      @foreach (array_merge($voicesRow1, $voicesRow1) as $v)
        <div class="voice-card">
          <div class="voice-stars">
            @for ($i = 0; $i < $v['stars']; $i++)<i class="fas fa-star"></i>@endfor
          </div>
          <div class="voice-quote">&ldquo;{{ $v['quote'] }}&rdquo;</div>
          <div class="voice-person">
            <div class="voice-avatar va-{{ $v['tone'] }}">{{ $v['initials'] }}</div>
            <div>
              <div class="voice-name">{{ $v['name'] }}</div>
              <div class="voice-role">{{ $v['role'] }}</div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <div class="voices-row voices-row-reverse">
    <div class="voices-track">
      @foreach (array_merge($voicesRow2, $voicesRow2) as $v)
        <div class="voice-card">
          <div class="voice-stars">
            @for ($i = 0; $i < $v['stars']; $i++)<i class="fas fa-star"></i>@endfor
          </div>
          <div class="voice-quote">&ldquo;{{ $v['quote'] }}&rdquo;</div>
          <div class="voice-person">
            <div class="voice-avatar va-{{ $v['tone'] }}">{{ $v['initials'] }}</div>
            <div>
              <div class="voice-name">{{ $v['name'] }}</div>
              <div class="voice-role">{{ $v['role'] }}</div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</section>
