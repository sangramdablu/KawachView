<!-- ============================================================
     CLUTCH REVIEWS — Light Background (#f0f4fb)
     ============================================================ -->

<style>
  /* ── Section shell ───────────────────────────────────────────── */
  .clutch-section {
    padding: 90px 0 80px;
    background: #f0f4fb;
    position: relative;
    overflow: hidden;
  }
  .clutch-section::before {
    content: '';
    position: absolute;
    bottom: -100px; right: -100px;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(26,115,232,.06) 0%, transparent 65%);
    pointer-events: none;
  }
  .clutch-section::after {
    content: '';
    position: absolute;
    top: -80px; left: -80px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(233,51,36,.04) 0%, transparent 65%);
    pointer-events: none;
  }

  /* ── Score card ──────────────────────────────────────────────── */
  .clutch-score-card {
    background: linear-gradient(145deg, #0d1b3e 0%, #1a3060 100%);
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 20px;
    padding: 32px 24px;
    text-align: center;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(13,27,62,.25);
  }
  .clutch-score-card::before {
    content: '';
    position: absolute;
    top: -60px; left: 50%;
    transform: translateX(-50%);
    width: 280px; height: 180px;
    background: radial-gradient(ellipse, rgba(233,51,36,.18) 0%, transparent 70%);
  }
  .clutch-score-number {
    font-size: 3.5rem;
    font-weight: 900;
    color: #fff;
    line-height: 1;
    font-family: 'Nunito', sans-serif;
    position: relative;
  }
  .clutch-score-number sup {
    font-size: 1.4rem;
    vertical-align: super;
    color: #ff9800;
  }
  .clutch-score-stars {
    display: flex; justify-content: center; gap: 5px;
    margin: 10px 0 5px;
  }
  .clutch-score-stars i { color: #ff9800; font-size: 1.15rem; }
  .clutch-score-label {
    color: #aac4e0;
    font-size: .83rem;
  }
  .clutch-score-count {
    display: inline-block;
    background: rgba(33,150,243,.15);
    border: 1px solid rgba(33,150,243,.3);
    border-radius: 30px;
    padding: 5px 16px;
    font-size: .76rem;
    font-weight: 600;
    color: #64b5f6;
    margin-top: 12px;
  }
  /* Rating bars */
  .score-bar-row {
    display: flex; align-items: center; gap: 8px;
    margin-bottom: 10px;
  }
  .score-bar-label {
    font-size: .73rem;
    color: #aac4e0;
    width: 24px;
    flex-shrink: 0;
  }
  .score-bar-track {
    flex: 1;
    height: 5px;
    background: rgba(255,255,255,.1);
    border-radius: 3px;
    overflow: hidden;
  }
  .score-bar-fill {
    height: 100%;
    border-radius: 3px;
    background: linear-gradient(90deg, #ff9800, #ffb74d);
  }
  .score-bar-pct {
    font-size: .7rem;
    color: #6e88a8;
    width: 28px;
    text-align: right;
    flex-shrink: 0;
  }

  /* ── Review cards ────────────────────────────────────────────── */
  .clutch-reviews-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 18px;
  }

  .clutch-review-card {
    background: #fff;
    border: 1px solid #dce6f5;
    border-radius: 16px;
    padding: 22px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    box-shadow: 0 2px 12px rgba(26,115,232,.05);
    transition: transform .25s, border-color .25s, box-shadow .25s;
  }
  .clutch-review-card:hover {
    transform: translateY(-4px);
    border-color: rgba(233,51,36,.2);
    box-shadow: 0 10px 32px rgba(26,115,232,.12);
  }

  /* Header row */
  .review-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 10px;
  }
  .review-card-stars { display: flex; gap: 3px; }
  .review-card-stars i { color: #ff9800; font-size: .82rem; }

  .clutch-pill {
    display: flex; align-items: center; gap: 4px;
    background: #fff2f0;
    border: 1px solid rgba(233,51,36,.2);
    border-radius: 30px;
    padding: 3px 10px;
    font-size: .68rem;
    font-weight: 700;
    color: #e93324;
    white-space: nowrap;
    flex-shrink: 0;
  }
  .clutch-pill i { font-size: .65rem; }

  /* Review title */
  .review-title {
    font-size: .92rem;
    font-weight: 700;
    color: #1a1a2e;
    line-height: 1.4;
  }

  /* Review body */
  .review-body {
    font-size: .83rem;
    color: #5a6e8a;
    line-height: 1.68;
    flex: 1;
    position: relative;
    padding-left: 2px;
  }
  .review-body::before {
    content: '"';
    position: absolute;
    top: -10px; left: -6px;
    font-size: 3.2rem;
    color: rgba(233,51,36,.08);
    font-family: Georgia, serif;
    line-height: 1;
    pointer-events: none;
  }

  /* Service tag */
  .review-service-tag {
    display: inline-block;
    background: #eaf1fd;
    border: 1px solid #c5d9f8;
    border-radius: 6px;
    padding: 3px 10px;
    font-size: .71rem;
    font-weight: 600;
    color: #1a73e8;
  }

  /* Reviewer row */
  .reviewer-row {
    display: flex;
    align-items: center;
    gap: 10px;
    padding-top: 12px;
    border-top: 1px solid #edf2fa;
  }
  .reviewer-avatar {
    width: 36px; height: 36px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .72rem; font-weight: 700;
    flex-shrink: 0;
  }
  /* Light-mode avatar tints */
  .av-c-blue   { background: #deeeff; color: #1565c0; }
  .av-c-green  { background: #dff3e1; color: #2e7d32; }
  .av-c-orange { background: #ffecd8; color: #e65100; }
  .av-c-purple { background: #ede7f6; color: #6a1b9a; }
  .av-c-teal   { background: #e0f7fa; color: #00696f; }
  .av-c-pink   { background: #fce4ec; color: #ad1457; }

  .reviewer-name {
    font-size: .83rem;
    font-weight: 700;
    color: #1a1a2e;
    line-height: 1.2;
  }
  .reviewer-meta {
    font-size: .73rem;
    color: #8fa3c8;
  }

  /* ── Clutch CTA strip ────────────────────────────────────────── */
  .clutch-cta {
    margin-top: 36px;
    background: #fff;
    border: 1.5px solid #dce6f5;
    border-radius: 16px;
    padding: 26px 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    box-shadow: 0 4px 20px rgba(26,115,232,.07);
  }
  .clutch-cta-text strong {
    display: block;
    font-size: 1rem;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 4px;
  }
  .clutch-cta-text span {
    font-size: .83rem;
    color: #6b7fa0;
  }
  .btn-clutch {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #e93324;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 11px 24px;
    font-size: .88rem;
    font-weight: 700;
    text-decoration: none;
    transition: background .2s, transform .15s, box-shadow .2s;
    white-space: nowrap;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(233,51,36,.25);
  }
  .btn-clutch:hover {
    background: #c62b1d;
    transform: translateY(-1px);
    color: #fff;
    box-shadow: 0 6px 22px rgba(233,51,36,.35);
  }

  /* ── Responsive ─────────────────────────────────────────────── */
  @media (max-width: 768px) {
    .clutch-reviews-grid { grid-template-columns: 1fr; }
    .clutch-cta { flex-direction: column; align-items: flex-start; }
    .clutch-badge-row { gap: 12px; }
  }
  @media (max-width: 480px) {
    .clutch-score-number { font-size: 2.8rem; }
    .clutch-badge { padding: 12px 14px; }
    .clutch-section { padding: 60px 0 56px; }
  }
</style>

<section class="clutch-section">
  <div class="container">

    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Clutch Reviews</h2>
      <p class="section-subtitle">What verified clients say on Clutch.co</p>
    </div>

    <div class="row g-4">
      <!-- Score card -->
      <div class="col-md-3 col-sm-6">
        <div class="clutch-score-card h-100">
          <div class="clutch-score-number">4.9<sup>★</sup></div>
          <div class="clutch-score-stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
          </div>
          <div class="clutch-score-label">Overall Clutch Rating</div>
          <div class="clutch-score-count">8 Verified Reviews</div>
          <div style="margin-top:22px; text-align:left;">
            <div class="score-bar-row">
              <div class="score-bar-label">5★</div>
              <div class="score-bar-track"><div class="score-bar-fill" style="width:88%"></div></div>
              <div class="score-bar-pct">88%</div>
            </div>
            <div class="score-bar-row">
              <div class="score-bar-label">4★</div>
              <div class="score-bar-track"><div class="score-bar-fill" style="width:10%; opacity:.65;"></div></div>
              <div class="score-bar-pct">10%</div>
            </div>
            <div class="score-bar-row" style="margin-bottom:0;">
              <div class="score-bar-label">3★</div>
              <div class="score-bar-track"><div class="score-bar-fill" style="width:2%; opacity:.35;"></div></div>
              <div class="score-bar-pct">2%</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Review cards -->
      <div class="col-md-9">
        <div class="clutch-reviews-grid">

          <div class="clutch-review-card">
            <div class="review-card-header">
              <div class="review-card-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <div class="clutch-pill"><i class="fas fa-check-circle"></i> Verified</div>
            </div>
            <div class="review-title">"Exceptional technical depth — they understood our domain better than we expected"</div>
            <div class="review-body">KawachTech delivered a fully-featured fintech platform in 14 weeks. Their team asked the right questions from day one. Code quality was outstanding and the post-launch support has been seamless.</div>
            <div class="review-service-tag">FinTech · Custom Software</div>
            <div class="reviewer-row">
              <div class="reviewer-avatar av-c-blue">DM</div>
              <div>
                <div class="reviewer-name">David Mitchell</div>
                <div class="reviewer-meta">CTO, NexPay Ltd · United Kingdom</div>
              </div>
            </div>
          </div>

          <div class="clutch-review-card">
            <div class="review-card-header">
              <div class="review-card-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <div class="clutch-pill"><i class="fas fa-check-circle"></i> Verified</div>
            </div>
            <div class="review-title">"Transformed our patient management system — zero downtime migration"</div>
            <div class="review-body">We had a legacy system running on outdated tech. KawachTech rebuilt it in the cloud with real-time dashboards and HIPAA-compliant data handling. Absolutely professional team.</div>
            <div class="review-service-tag">Healthcare · Cloud &amp; DevOps</div>
            <div class="reviewer-row">
              <div class="reviewer-avatar av-c-green">AS</div>
              <div>
                <div class="reviewer-name">Anika Sharma</div>
                <div class="reviewer-meta">VP Operations, MedCore Systems · USA</div>
              </div>
            </div>
          </div>

          <div class="clutch-review-card">
            <div class="review-card-header">
              <div class="review-card-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <div class="clutch-pill"><i class="fas fa-check-circle"></i> Verified</div>
            </div>
            <div class="review-title">"Best engineering partner we've worked with in 6 years"</div>
            <div class="review-body">From MVP to a platform serving 200,000+ users — KawachTech scaled with us every step. Their AI recommendation engine drove a measurable 40% increase in conversions. Truly impressive.</div>
            <div class="review-service-tag">E-Commerce · AI &amp; ML</div>
            <div class="reviewer-row">
              <div class="reviewer-avatar av-c-orange">TW</div>
              <div>
                <div class="reviewer-name">Thomas Wagner</div>
                <div class="reviewer-meta">Founder &amp; CEO, ShopNova Group · Germany</div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- CTA -->
    <div class="clutch-cta">
      <div class="clutch-cta-text">
        <strong>See all verified reviews on Clutch.co</strong>
        <span>We maintain a 4.9 ★ rating across all project categories — verified by real clients.</span>
      </div>
      <a href="https://clutch.co/profile/kawach-technology" target="_blank" rel="noopener noreferrer" class="btn-clutch">
        <i class="fas fa-external-link-alt"></i> View on Clutch
      </a>
    </div>

  </div>
</section>