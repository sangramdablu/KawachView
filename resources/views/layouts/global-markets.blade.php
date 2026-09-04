<!-- ── SOFTWARE DEVELOPMENT SERVICES FOR GLOBAL BUSINESSES ── -->
<section class="gm-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="section-divider"></div>
      <h2 class="section-title">Software Development Services for Global Businesses</h2>
      <p class="section-subtitle">
        Wherever your business operates, our <a href="{{ route('pages.child.sevice_details', 'custom-software-development') }}">custom software development services</a>
        adapt to your market's specific challenges, compliance expectations and working hours.
      </p>
    </div>
    <div class="row g-3">
      <div class="col-6 col-md-3">
        <a href="{{ route('country.usa') }}" class="gm-card">
          <div class="gm-card-icon"><i class="fas fa-flag-usa"></i></div>
          <div class="gm-card-title">Software Development for US Businesses</div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="{{ route('country.uk') }}" class="gm-card">
          <div class="gm-card-icon"><i class="fas fa-landmark"></i></div>
          <div class="gm-card-title">Software Development for UK Businesses</div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="{{ route('country.germany') }}" class="gm-card">
          <div class="gm-card-icon"><i class="fas fa-industry"></i></div>
          <div class="gm-card-title">Software Development for German Businesses</div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="{{ route('country.europe') }}" class="gm-card">
          <div class="gm-card-icon"><i class="fas fa-earth-europe"></i></div>
          <div class="gm-card-title">Software Development Services for European Businesses</div>
        </a>
      </div>
    </div>
  </div>
</section>

<style>
  .gm-section{ background:var(--white); padding:64px 0; }
  .gm-card{
    display:flex; flex-direction:column; align-items:center; text-align:center; gap:12px;
    background:var(--bg-light); border:1px solid var(--border-light); border-radius:12px;
    padding:26px 18px; height:100%; text-decoration:none; transition:transform .2s, box-shadow .2s;
  }
  .gm-card:hover{ transform:translateY(-3px); box-shadow:0 8px 24px rgba(26,115,232,0.1); }
  .gm-card-icon{
    width:48px; height:48px; border-radius:10px;
    background:linear-gradient(135deg, #e8f1fd, #d0e4fa);
    display:flex; align-items:center; justify-content:center;
    color:var(--primary-blue); font-size:1.2rem;
  }
  .gm-card-title{ font-family:'Nunito', sans-serif; font-weight:800; font-size:.92rem; color:var(--text-dark); }
</style>
