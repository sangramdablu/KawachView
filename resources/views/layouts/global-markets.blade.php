<!-- ── SOFTWARE DEVELOPMENT SERVICES FOR GLOBAL BUSINESSES ── -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css">
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
          <div class="gm-card-icon"><span class="fi fi-us fis"></span></div>
          <div class="gm-card-title">Software Development for US Businesses</div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="{{ route('country.uk') }}" class="gm-card">
          <div class="gm-card-icon"><span class="fi fi-gb fis"></span></div>
          <div class="gm-card-title">Software Development for UK Businesses</div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="{{ route('country.germany') }}" class="gm-card">
          <div class="gm-card-icon"><span class="fi fi-de fis"></span></div>
          <div class="gm-card-title">Software Development for German Businesses</div>
        </a>
      </div>
      <div class="col-6 col-md-3">
        <a href="{{ route('country.europe') }}" class="gm-card">
          <div class="gm-card-icon"><span class="fi fi-eu fis"></span></div>
          <div class="gm-card-title">Software Development Services for European Businesses</div>
        </a>
      </div>
    </div>
  </div>
</section>

<style>
  .gm-section{ background:var(--bg-light); padding:64px 0; }
  .gm-card{
    display:flex; flex-direction:column; align-items:center; text-align:center; gap:12px;
    background:var(--bg-light); border:1px solid var(--border-light); border-radius:12px;
    padding:26px 18px; height:100%; text-decoration:none; transition:transform .2s, box-shadow .2s;
  }
  .gm-card:hover{ transform:translateY(-3px); box-shadow:0 8px 24px rgba(26,115,232,0.1); }
  .gm-card-icon{
    width:48px; height:48px; border-radius:0;
    overflow:hidden;
    display:flex; align-items:center; justify-content:center;
    box-sizing:content-box;
  }
  .gm-card-icon .fi{
    width:100%; height:100%;
    border-radius:0;
    background-size:cover;
    background-position:center;
  }
  .gm-card-title{ font-family:'Nunito', sans-serif; font-weight:800; font-size:.92rem; color:var(--text-dark); }
</style>
