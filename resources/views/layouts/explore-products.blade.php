<!-- ============================================================
     EXPLORE OUR PRODUCTS — spotlight for Orbit (orbitzr.com)
     ============================================================ -->

<style>
.products-spotlight{
  position:relative;
  overflow:hidden;
  padding:100px 0;
  background:radial-gradient(120% 140% at 15% 15%, #1a2a5c 0%, #0d1b3e 45%, #0a1530 100%);
  color:#fff;
}
.products-spotlight::before,
.products-spotlight::after{
  content:'';
  position:absolute;
  border:1px solid rgba(94,157,255,.14);
  border-radius:50%;
  pointer-events:none;
}
.products-spotlight::before{ width:640px; height:640px; top:-220px; right:-160px; }
.products-spotlight::after{ width:420px; height:420px; top:-90px; right:-30px; border-color:rgba(94,157,255,.22); }

.ps-eyebrow{
  display:inline-flex; align-items:center; gap:8px;
  font-size:.78rem; font-weight:800; letter-spacing:1.5px; text-transform:uppercase;
  color:#8fb3f0; margin-bottom:18px;
}
.ps-eyebrow::before{ content:''; width:24px; height:2px; background:#5b9dff; border-radius:2px; }
.ps-title{ font-family:'Nunito', sans-serif; font-weight:900; font-size:clamp(1.9rem,3.6vw,2.7rem); margin-bottom:18px; line-height:1.2; }
.ps-sub{ color:#c7d6f5; font-size:1.05rem; line-height:1.7; max-width:520px; margin-bottom:26px; }
.ps-points{ list-style:none; padding:0; margin:0 0 32px; display:grid; gap:12px; }
.ps-points li{ display:flex; align-items:flex-start; gap:12px; color:#dbe6fb; font-size:.96rem; }
.ps-points li i{ color:#5b9dff; margin-top:3px; flex-shrink:0; }
.ps-btn{
  display:inline-flex; align-items:center; gap:10px;
  background:#fff; color:#0d1b3e; font-weight:800; font-size:.98rem;
  padding:14px 28px; border-radius:10px; text-decoration:none;
  transition:transform .2s, box-shadow .2s;
  box-shadow:0 10px 26px rgba(0,0,0,.25);
}
.ps-btn:hover{ transform:translateY(-2px); box-shadow:0 14px 32px rgba(0,0,0,.32); color:#0d1b3e; }
.ps-btn i{ font-size:.85rem; transition:transform .2s; }
.ps-btn:hover i{ transform:translateX(3px); }

@media(max-width:991.98px){
  .products-spotlight{ padding:70px 0; }
  .ps-mock-holder{ margin-top:40px; }
}
</style>

<section class="products-spotlight">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div class="ps-eyebrow">Our Product</div>
        <h2 class="ps-title">Explore Our Products</h2>
        <p class="ps-sub">
          Beyond client work, we build our own software too. Meet <strong>Orbit</strong> —
          the real-time project board for teams who'd rather move a card than write a status update.
        </p>
        <ul class="ps-points">
          <li><i class="fa-solid fa-bolt"></i> Real-time sync — updates appear in under a second</li>
          <li><i class="fa-solid fa-diagram-project"></i> Boards, checklists, automation and more</li>
          <li><i class="fa-solid fa-circle-check"></i> Free to start, no credit card required</li>
        </ul>
        <a href="{{ route('products.orbit') }}" class="ps-btn">
          Explore Orbit <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
      <div class="col-lg-6">
        <div class="ps-mock-holder">
          @include('layouts.orbit-board-demo')
        </div>
      </div>
    </div>
  </div>
</section>
