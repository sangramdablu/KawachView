<!-- ============================================================
     GOVERNMENT REGISTRATIONS & RECOGNITIONS — client trust section
     Category badges only, deliberately no registration numbers shown
     (per explicit request) to avoid displaying partial/placeholder data.
     ============================================================ -->
<section class="gov-reg-section">
    <div class="container text-center">
        <span class="section-eyebrow"><i class="fas fa-landmark"></i> Government Verified</span>
        <h2 class="section-title mx-auto">Government Registrations &amp; Recognitions</h2>
        <p class="section-subtitle gov-reg-subtitle">
            Kawach Technology is officially registered and recognized by Indian government authorities —
            a compliant, verifiable business you can build with confidently.
        </p>

        <div class="gov-reg-grid">
            <div class="gov-reg-card">
                <div class="gov-reg-icon">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@v14.0.3/assets/svg/1f680.svg" alt="" class="gov-reg-icon-img" loading="lazy">
                    <span class="gov-reg-check" aria-hidden="true"><i class="fas fa-check"></i></span>
                </div>
                <div class="gov-reg-title">DPIIT Startup Recognition</div>
            </div>

            <div class="gov-reg-card">
                <div class="gov-reg-icon">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@v14.0.3/assets/svg/1f3e2.svg" alt="" class="gov-reg-icon-img" loading="lazy">
                    <span class="gov-reg-check" aria-hidden="true"><i class="fas fa-check"></i></span>
                </div>
                <div class="gov-reg-title">MSME / Udyam Registration</div>
            </div>

            <div class="gov-reg-card">
                <div class="gov-reg-icon">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@v14.0.3/assets/svg/1f9fe.svg" alt="" class="gov-reg-icon-img" loading="lazy">
                    <span class="gov-reg-check" aria-hidden="true"><i class="fas fa-check"></i></span>
                </div>
                <div class="gov-reg-title">GST Registration</div>
            </div>

            <div class="gov-reg-card">
                <div class="gov-reg-icon">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@v14.0.3/assets/svg/1f3db.svg" alt="" class="gov-reg-icon-img" loading="lazy">
                    <span class="gov-reg-check" aria-hidden="true"><i class="fas fa-check"></i></span>
                </div>
                <div class="gov-reg-title">MCA Registration</div>
            </div>

            <div class="gov-reg-card">
                <div class="gov-reg-icon">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@v14.0.3/assets/svg/1f4a1.svg" alt="" class="gov-reg-icon-img" loading="lazy">
                    <span class="gov-reg-check" aria-hidden="true"><i class="fas fa-check"></i></span>
                </div>
                <div class="gov-reg-title">DPDT / Intellectual Property Registration</div>
            </div>
        </div>
    </div>
</section>

<style>
.gov-reg-section{
    padding: 90px 0;
    background: var(--dark-navy);
}

.gov-reg-section .section-eyebrow{
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #8fb3f0;
    background: rgba(255,255,255,.08);
    padding: 6px 16px;
    border-radius: 30px;
    margin-bottom: 18px;
}

.gov-reg-section .section-title{
    color: #fff;
}

.gov-reg-subtitle{
    color: #c7d6f5;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.gov-reg-grid{
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 22px;
    margin-top: 52px;
}

.gov-reg-card{
    background: #fff;
    border: 1px solid var(--border-light, #e2e8f0);
    border-radius: 16px;
    padding: 30px 18px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 16px;
    transition: transform .25s ease, box-shadow .25s ease;
}
.gov-reg-card:hover{
    transform: translateY(-4px);
    box-shadow: 0 16px 36px rgba(13,27,62,.1);
}

.gov-reg-icon{
    position: relative;
    width: 56px;
    height: 56px;
}
.gov-reg-icon-img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.gov-reg-check{
    position: absolute;
    bottom: -4px;
    right: -4px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #22c55e;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .6rem;
    border: 2px solid #fff;
}

.gov-reg-title{
    font-family: 'Nunito', sans-serif;
    font-weight: 800;
    font-size: .92rem;
    color: var(--text-dark, #1a1a2e);
    line-height: 1.35;
}

@media(max-width: 991.98px){
    .gov-reg-grid{ grid-template-columns: repeat(3, 1fr); }
}
@media(max-width: 575.98px){
    .gov-reg-section{ padding: 60px 0; }
    .gov-reg-grid{ grid-template-columns: repeat(2, 1fr); gap: 16px; margin-top: 36px; }
}
</style>
