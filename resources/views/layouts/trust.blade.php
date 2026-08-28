<!-- ============================================================
     TRUST & ASSURANCE — hardcoded, no DB dependency
     ============================================================ -->
<style>
.trust-section{
    padding:100px 0;
    background:var(--white, #fff);
}

.trust-section .section-eyebrow{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-size:.78rem;
    font-weight:700;
    letter-spacing:1.5px;
    text-transform:uppercase;
    color:var(--primary-blue, #1a73e8);
    background:rgba(26,115,232,.08);
    padding:6px 16px;
    border-radius:30px;
    margin-bottom:18px;
}

.trust-section .section-title{
    font-size:clamp(2rem,4vw,2.75rem);
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    max-width:680px;
    margin:0 auto 18px;
    line-height:1.2;
}

.trust-section .section-intro{
    max-width:700px;
    margin:0 auto;
    color:var(--text-muted, #6c757d);
    font-size:1.02rem;
    line-height:1.75;
}

/* BADGE GRID */

.trust-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:24px;
    margin-top:52px;
}

.trust-card{
    display:flex;
    gap:16px;
    align-items:flex-start;
    background:var(--bg-light, #f4f6fb);
    border:1px solid var(--border-light, #e2e8f0);
    border-radius:16px;
    padding:24px;
    transition:.3s ease;
}

.trust-card:hover{
    background:#fff;
    border-color:transparent;
    box-shadow:0 16px 36px rgba(13,27,62,.1);
    transform:translateY(-4px);
}

.trust-icon{
    width:48px;
    height:48px;
    flex-shrink:0;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px;
    background:linear-gradient(135deg,var(--primary-blue,#1a73e8),var(--accent-blue,#2196f3));
    color:#fff;
    font-size:19px;
}

.trust-card-title{
    font-size:1rem;
    font-weight:700;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:5px;
}

.trust-card-desc{
    color:var(--text-muted, #6c757d);
    font-size:.87rem;
    line-height:1.55;
    margin:0;
}

/* SECURITY / COMPLIANCE STRIP */

.trust-seal-strip{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-wrap:wrap;
    gap:36px;
    margin-top:52px;
    padding-top:44px;
    border-top:1px solid var(--border-light, #e2e8f0);
}

.trust-seal{
    display:flex;
    align-items:center;
    gap:10px;
    color:var(--text-muted, #6c757d);
    font-size:.85rem;
    font-weight:600;
}

.trust-seal i{
    color:var(--primary-blue, #1a73e8);
    font-size:1.1rem;
}

/* TABLET */
@media(max-width:991px){
    .trust-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

/* MOBILE */
@media(max-width:576px){
    .trust-section{
        padding:70px 0;
    }
    .trust-grid{
        grid-template-columns:1fr;
        gap:16px;
        margin-top:36px;
    }
    .trust-seal-strip{
        gap:20px;
        margin-top:36px;
        padding-top:32px;
    }
}
</style>
<section class="trust-section" id="trust" aria-labelledby="trust-heading">
    <div class="container text-center">
        <span class="section-eyebrow"><i class="fas fa-shield-halved"></i> Why Businesses Trust Us</span>
        <h2 class="section-title mx-auto" id="trust-heading">
            Built On Transparency, Backed By Process
        </h2>
        <p class="section-intro">
            We know handing your project to an outside team is a leap of faith. Here's exactly how we protect your
            IP, your timeline, and your data at every stage of the engagement.
        </p>

        <div class="trust-grid text-start">
            <div class="trust-card">
                <div class="trust-icon"><i class="fas fa-file-signature"></i></div>
                <div>
                    <div class="trust-card-title">NDA &amp; IP Protection</div>
                    <p class="trust-card-desc">A signed confidentiality agreement before kickoff, and 100% ownership of the source code and IP transfers to you.</p>
                </div>
            </div>

            <div class="trust-card">
                <div class="trust-icon"><i class="fas fa-users"></i></div>
                <div>
                    <div class="trust-card-title">Dedicated Team</div>
                    <p class="trust-card-desc">A PM, developers, and QA assigned specifically to your project — not shared across ten other clients.</p>
                </div>
            </div>

            <div class="trust-card">
                <div class="trust-icon"><i class="fas fa-arrows-rotate"></i></div>
                <div>
                    <div class="trust-card-title">Transparent Agile Process</div>
                    <p class="trust-card-desc">Two-week sprints with a working demo at every milestone, so you always know exactly where your project stands.</p>
                </div>
            </div>

            <div class="trust-card">
                <div class="trust-icon"><i class="fas fa-headset"></i></div>
                <div>
                    <div class="trust-card-title">Post-Launch Support</div>
                    <p class="trust-card-desc">30 days of free support after launch, then flexible monthly retainer plans for ongoing maintenance.</p>
                </div>
            </div>

            <div class="trust-card">
                <div class="trust-icon"><i class="fas fa-earth-americas"></i></div>
                <div>
                    <div class="trust-card-title">Global Delivery, Real Time Zones</div>
                    <p class="trust-card-desc">Clients across the US, UK, EU, Australia, and APAC — with overlapping working hours and clear communication.</p>
                </div>
            </div>

            <div class="trust-card">
                <div class="trust-icon"><i class="fas fa-lock"></i></div>
                <div>
                    <div class="trust-card-title">Data Privacy By Design</div>
                    <p class="trust-card-desc">Development practices aligned with GDPR and CCPA principles, with encrypted data handling throughout.</p>
                </div>
            </div>
        </div>

        <div class="trust-seal-strip">
            <div class="trust-seal"><i class="fas fa-lock"></i> SSL Secured Website</div>
            <div class="trust-seal"><i class="fas fa-file-contract"></i> Signed Contracts &amp; SOWs</div>
            <div class="trust-seal"><i class="fas fa-user-shield"></i> Confidential By Default</div>
            <div class="trust-seal"><i class="fas fa-code"></i> Full Source Code Ownership</div>
        </div>
    </div>
</section>
