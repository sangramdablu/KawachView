<footer class="kw-footer">

    {{-- Grid + glow decorations --}}
    <div class="kw-grid-bg" aria-hidden="true"></div>
    <div class="kw-glow kw-glow--top" aria-hidden="true"></div>
    <div class="kw-glow kw-glow--left" aria-hidden="true"></div>
    <div class="kw-glow kw-glow--right" aria-hidden="true"></div>

    <div class="kw-container">

        {{-- ── TOP BAR ── --}}
        <div class="kw-topbar">

            <div class="kw-brand">
                <div class="kw-logo-mark" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.35C17.25 22.15 21 17.25 21 12V7L12 2Z" stroke="#2d7cff" stroke-width="1.8" stroke-linejoin="round"/>
                        <path d="M9 12l2 2 4-4" stroke="#2d7cff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kw-brand-text">
                    <span class="kw-brand-name">Kawach<em>TECH</em></span>
                    <span class="kw-brand-tagline">Custom Software &middot; AI Solutions &middot; SaaS</span>
                </div>
            </div>

            <div class="kw-topbar-right">
                <div class="kw-status-pill">
                    <span class="kw-status-dot" aria-hidden="true"></span>
                    <span class="kw-status-label">Available</span>
                    <span class="kw-status-hours">24 x 7</span>
                </div>
                <div class="kw-chip-row">
                    <span class="kw-chip">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="#2d7cff" stroke-width="1.8"/><path d="M2.05 12h19.9M12 2.05c-2.5 3-4 6.2-4 10s1.5 6.95 4 9.95M12 2.05c2.5 3 4 6.2 4 10s-1.5 6.95-4 9.95" stroke="#2d7cff" stroke-width="1.8"/></svg>
                        Remote-First
                    </span>
                    <span class="kw-chip">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="#2d7cff" stroke-width="1.8" stroke-linecap="round"/><circle cx="9" cy="7" r="4" stroke="#2d7cff" stroke-width="1.8"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="#2d7cff" stroke-width="1.8" stroke-linecap="round"/></svg>
                        Global Clients
                    </span>
                </div>
            </div>

        </div>

        {{-- ── MAIN COLUMNS ── --}}
        <div class="kw-cols">

            {{-- About --}}
            <div class="kw-col kw-col--about">
                <p class="kw-col-label">About Us</p>
                <p class="kw-about-text">
                    We build secure, scalable and innovative digital solutions
                    that help businesses grow and succeed in the modern world.
                </p>
                <div class="kw-badges">
                    <span class="kw-badge">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.35C17.25 22.15 21 17.25 21 12V7L12 2Z" stroke="#2d7cff" stroke-width="2"/></svg>
                        Secure & Reliable
                    </span>
                    <span class="kw-badge">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8Z" stroke="#2d7cff" stroke-width="2" stroke-linejoin="round"/></svg>
                        Agile Delivery
                    </span>
                    <span class="kw-badge">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke="#2d7cff" stroke-width="1.8" stroke-linejoin="round"/></svg>
                        Quality First
                    </span>
                </div>
                <div class="kw-socials">
                    <a href="{{ config('app.linkedin') }}" class="kw-social" aria-label="LinkedIn" target="_blank" rel="noopener">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="4" cy="4" r="2" stroke="currentColor" stroke-width="2"/></svg>
                    </a>
                    <a href="{{ config('app.insta') }}" class="kw-social" aria-label="Instagram" target="_blank" rel="noopener">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                    </a>
                </div>
            </div>

            {{-- Company --}}
            <div class="kw-col">
                <p class="kw-col-label">Company</p>
                <ul class="kw-links">
                    <li><a href="{{ route('founder') }}">About Us</a></li>
                    <li><a href="{{ route('casestudy') }}">Case Studies</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>

            {{-- Services --}}
            <div class="kw-col">
                <p class="kw-col-label">Services</p>
                <ul class="kw-links">
                    <li><a href="https://www.kawachtech.com/services/custom-software-development-services-for-businesses">Custom Software Dev</a></li>
                    {{-- <li><a href="#">AI & Automation</a></li> --}}
                    {{-- <li><a href="#">SaaS Development</a></li> --}}
                    <li><a href="https://www.kawachtech.com/services/custom-mobile-web-application-development-services">Web Development</a></li>
                    <li><a href="https://www.kawachtech.com/services/custom-mobile-web-application-development-services">Mobile App Dev</a></li>
                </ul>
            </div>

            {{-- Legal --}}
            <div class="kw-col">
                <p class="kw-col-label">Legal</p>
                <ul class="kw-links">
                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                    <li><a href="{{ route('refund-policy') }}">Refund Policy</a></li>
                    <li><a href="{{ route('cookie-policy') }}">Cookie Policy</a></li>
                    <li><a href="#" onclick="return window.kwOpenCookieSettings && window.kwOpenCookieSettings(event);">Cookie Settings</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="kw-col">
                <p class="kw-col-label">Contact</p>

                <div class="kw-contact-item">
                    <div class="kw-contact-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="#2d7cff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><polyline points="22,6 12,13 2,6" stroke="#2d7cff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div>
                        <span class="kw-contact-label">Email</span>
                        <span class="kw-contact-value">{{ config('app.main_email') }}</span>
                    </div>
                </div>

                <div class="kw-contact-item">
                    <div class="kw-contact-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 11a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 0h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 7.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="#2d7cff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div>
                        <span class="kw-contact-label">Phone</span>
                        <span class="kw-contact-value">{{ config('app.mobile') }}</span>
                    </div>
                </div>

                <div class="kw-contact-item">
                    <div class="kw-contact-icon" aria-hidden="true">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z" stroke="#2d7cff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="10" r="3" stroke="#2d7cff" stroke-width="1.8"/></svg>
                    </div>
                    <div>
                        <span class="kw-contact-label">Location</span>
                        <span class="kw-contact-value">Remote-First Company</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- ── DIVIDER ── --}}
        <div class="kw-divider" aria-hidden="true">
            <span class="kw-divider-dot"></span>
        </div>

        {{-- ── BOTTOM BAR ── --}}
        <div class="kw-bottom">
            <p class="kw-copy">&copy; {{ date('Y') }} <strong>Kawach Technology Pvt. Ltd.</strong> All rights reserved.</p>
            <div class="kw-trust">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2L3 7v5c0 5.25 3.75 10.15 9 11.35C17.25 22.15 21 17.25 21 12V7L12 2Z" stroke="#2d7cff" stroke-width="2"/></svg>
                Trusted technology partner for businesses worldwide
            </div>
            <div class="kw-techstack">
                <span>Laravel</span>
                <span>React</span>
                <span>AI / ML</span>
                <span>Cloud</span>
            </div>
        </div>

    </div>

    {{-- Bottom scan-line accent --}}
    <div class="kw-scanline" aria-hidden="true"></div>

</footer>

<style>
/* ─────────────────────────────────────────────
   KawachTECH Footer  –  Futuristic Edition
   Paste this entire block into your blade file
   (or move the <style> to your main CSS file)
───────────────────────────────────────────── */

/* Reset helpers scoped to footer */
.kw-footer *, .kw-footer *::before, .kw-footer *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* ── Root ── */
.kw-footer {
    position: relative;
    overflow: hidden;
    background: linear-gradient(145deg, #071b4d 0%, #050f2e 55%, #06153c 100%);
    color: #fff;
    font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
    padding-bottom: 0;
}

/* ── Decorative layers ── */
.kw-grid-bg {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(45,124,255,.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(45,124,255,.04) 1px, transparent 1px);
    background-size: 56px 56px;
    pointer-events: none;
}
.kw-glow {
    position: absolute;
    pointer-events: none;
    border-radius: 50%;
}
.kw-glow--top {
    top: -140px; left: 50%; transform: translateX(-50%);
    width: 700px; height: 320px;
    background: radial-gradient(ellipse, rgba(45,124,255,.13) 0%, transparent 70%);
}
.kw-glow--left {
    bottom: 0; left: -80px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(45,124,255,.07) 0%, transparent 70%);
}
.kw-glow--right {
    top: 60px; right: -60px;
    width: 240px; height: 240px;
    background: radial-gradient(circle, rgba(45,124,255,.08) 0%, transparent 70%);
}

/* ── Container ── */
.kw-container {
    position: relative;
    z-index: 1;
    max-width: 1240px;
    margin: 0 auto;
    padding: 64px 32px 0;
}

/* ── Top bar ── */
.kw-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 24px;
    padding-bottom: 40px;
    border-bottom: 1px solid rgba(255,255,255,.07);
    margin-bottom: 52px;
}

/* Brand */
.kw-brand {
    display: flex;
    align-items: center;
    gap: 14px;
}
.kw-logo-mark {
    width: 48px; height: 48px;
    border-radius: 12px;
    border: 1px solid rgba(45,124,255,.45);
    background: rgba(45,124,255,.09);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.kw-brand-text {
    display: flex;
    flex-direction: column;
    gap: 3px;
}
.kw-brand-name {
    font-size: 22px;
    font-weight: 800;
    letter-spacing: -.4px;
    line-height: 1;
}
.kw-brand-name em {
    font-style: normal;
    color: #2d7cff;
}
.kw-brand-tagline {
    font-size: 11px;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    color: rgba(184,197,226,.55);
}

/* Topbar right group */
.kw-topbar-right {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-wrap: wrap;
}

/* Status pill */
.kw-status-pill {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 8px 18px;
    border-radius: 100px;
    border: 1px solid rgba(34,197,94,.28);
    background: rgba(34,197,94,.06);
    white-space: nowrap;
}
.kw-status-dot {
    width: 8px; height: 8px;
    background: #22c55e;
    border-radius: 50%;
    flex-shrink: 0;
    box-shadow: 0 0 0 3px rgba(34,197,94,.2);
    animation: kw-pulse 2.2s ease-in-out infinite;
}
@keyframes kw-pulse {
    0%,100% { box-shadow: 0 0 0 3px rgba(34,197,94,.2); }
    50%      { box-shadow: 0 0 0 7px rgba(34,197,94,.05); }
}
.kw-status-label {
    font-size: 13px;
    font-weight: 600;
    color: #22c55e;
}
.kw-status-hours {
    font-size: 11.5px;
    color: rgba(184,197,226,.55);
}

/* Chip row */
.kw-chip-row {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.kw-chip {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    padding: 5px 12px;
    border-radius: 100px;
    border: 1px solid rgba(45,124,255,.22);
    background: rgba(45,124,255,.07);
    color: rgba(184,197,226,.8);
}

/* ── Main column grid ── */
.kw-cols {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr 1.3fr;
    gap: 40px;
    margin-bottom: 52px;
}

/* Column label */
.kw-col-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2.2px;
    text-transform: uppercase;
    color: #2d7cff;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.kw-col-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(45,124,255,.25);
}

/* About column */
.kw-about-text {
    font-size: 14px;
    line-height: 1.8;
    color: rgba(184,197,226,.65);
    margin-bottom: 22px;
}

/* Badges */
.kw-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 24px;
}
.kw-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    padding: 5px 12px;
    border-radius: 100px;
    border: 1px solid rgba(45,124,255,.22);
    background: rgba(45,124,255,.07);
    color: rgba(184,197,226,.75);
}

/* Socials */
.kw-socials {
    display: flex;
    gap: 9px;
}
.kw-social {
    width: 38px; height: 38px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,.1);
    background: rgba(255,255,255,.03);
    display: flex; align-items: center; justify-content: center;
    color: rgba(184,197,226,.65);
    text-decoration: none;
    transition: background .2s, border-color .2s, color .2s, transform .2s;
}
.kw-social:hover {
    background: #2d7cff;
    border-color: #2d7cff;
    color: #fff;
    transform: translateY(-2px);
}

/* Nav links */
.kw-links {
    list-style: none;
}
.kw-links li {
    margin-bottom: 10px;
}
.kw-links a {
    font-size: 14px;
    color: rgba(184,197,226,.6);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0;
    transition: color .2s, gap .2s;
    position: relative;
}
.kw-links a::before {
    content: '';
    display: inline-block;
    width: 0;
    height: 1px;
    background: #2d7cff;
    margin-right: 0;
    transition: width .2s, margin-right .2s;
    flex-shrink: 0;
}
.kw-links a:hover {
    color: #fff;
    gap: 6px;
}
.kw-links a:hover::before {
    width: 10px;
    margin-right: 6px;
}

/* Contact items */
.kw-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    margin-bottom: 16px;
}
.kw-contact-icon {
    width: 32px; height: 32px;
    flex-shrink: 0;
    border-radius: 8px;
    border: 1px solid rgba(45,124,255,.22);
    background: rgba(45,124,255,.09);
    display: flex; align-items: center; justify-content: center;
    margin-top: 1px;
}
.kw-contact-label {
    display: block;
    font-size: 10px;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: rgba(184,197,226,.4);
    margin-bottom: 2px;
}
.kw-contact-value {
    display: block;
    font-size: 13px;
    color: rgba(184,197,226,.8);
    word-break: break-all;
}

/* ── Divider ── */
.kw-divider {
    position: relative;
    margin-bottom: 26px;
    height: 1px;
    background: rgba(255,255,255,.07);
    display: flex;
    align-items: center;
    justify-content: center;
}
.kw-divider-dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: #2d7cff;
    box-shadow: 0 0 0 3px rgba(45,124,255,.15);
    flex-shrink: 0;
}

/* ── Bottom bar ── */
.kw-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    padding-bottom: 30px;
}
.kw-copy {
    font-size: 13px;
    color: rgba(184,197,226,.38);
}
.kw-copy strong {
    color: rgba(184,197,226,.6);
    font-weight: 500;
}
.kw-trust {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    color: rgba(184,197,226,.38);
}
.kw-techstack {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
}
.kw-techstack span {
    font-size: 10px;
    padding: 3px 10px;
    border-radius: 100px;
    background: rgba(45,124,255,.07);
    border: 1px solid rgba(45,124,255,.14);
    color: rgba(184,197,226,.45);
    letter-spacing: .4px;
}

/* ── Scan-line accent ── */
.kw-scanline {
    height: 2px;
    background: linear-gradient(90deg, transparent 0%, #2d7cff 30%, rgba(45,124,255,.35) 65%, transparent 100%);
    animation: kw-scan 4s ease-in-out infinite;
}
@keyframes kw-scan {
    0%,100% { opacity: .35; }
    50%      { opacity: 1; }
}

/* ─────────────────────────────
   RESPONSIVE BREAKPOINTS
───────────────────────────── */

/* 5-col → 3-col at 1024px */
@media (max-width: 1024px) {
    .kw-cols {
        grid-template-columns: 1.6fr 1fr 1fr;
    }
    .kw-col--about {
        grid-column: 1 / -1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 32px;
    }
    .kw-col--about .kw-col-label {
        grid-column: 1 / -1;
    }
    .kw-col--about .kw-about-text {
        grid-column: 1 / -1;
        margin-bottom: 0;
    }
}

/* Tablet: 2-col layout at 768px */
@media (max-width: 768px) {
    .kw-container {
        padding: 48px 20px 0;
    }
    .kw-topbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 18px;
        padding-bottom: 28px;
        margin-bottom: 36px;
    }
    .kw-topbar-right {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    .kw-status-hours {
        display: none;
    }
    .kw-cols {
        grid-template-columns: 1fr 1fr;
        gap: 28px;
    }
    .kw-col--about {
        grid-column: 1 / -1;
        display: block;
    }
    .kw-bottom {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        padding-bottom: 24px;
    }
}

/* Mobile: single-column at 480px */
@media (max-width: 480px) {
    .kw-cols {
        grid-template-columns: 1fr;
    }
    .kw-brand-name {
        font-size: 18px;
    }
    .kw-status-pill {
        padding: 6px 14px;
    }
    .kw-chip-row {
        gap: 6px;
    }
    .kw-glow--top {
        width: 320px;
        height: 200px;
    }
}
</style>

@include('modal.cookie-consent')