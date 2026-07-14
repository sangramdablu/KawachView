<!-- ══════════════════════════════════════════
     COOKIE CONSENT — bottom banner + preferences modal
════════════════════════════════════════════ -->
<div id="kwCookieConsent" class="kw-cookie-consent" role="dialog" aria-live="polite" aria-label="Cookie consent" aria-hidden="true">
    <div class="kw-cookie-inner">
        <div class="kw-cookie-icon" aria-hidden="true">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 12.5c0 5.25-4.03 9.5-9 9.5s-9-4.25-9-9.5S6.03 3 11 3c.34 0 .67.02 1 .06-.5.86-.5 1.94.06 2.79.65.99 1.9 1.4 3 1.02.2.86.9 1.55 1.8 1.72 1.1.2 2.17-.42 2.55-1.47.4.9.6 1.9.6 2.88 0 .17 0 .34-.01.5Z" stroke="#2d7cff" stroke-width="1.6" stroke-linejoin="round"/>
                <circle cx="8.5" cy="11" r="1.15" fill="#2d7cff"/>
                <circle cx="12.5" cy="15.5" r="1.15" fill="#2d7cff"/>
                <circle cx="9" cy="16.5" r="1" fill="#2d7cff"/>
                <circle cx="14.5" cy="11.5" r="1" fill="#2d7cff"/>
            </svg>
        </div>
        <div class="kw-cookie-text">
            <p class="kw-cookie-title">We value your privacy</p>
            <p class="kw-cookie-desc">
                We use cookies to run this site, understand how it's used, and improve your experience. You can accept all cookies, reject non-essential ones, or manage your preferences. Read our
                <a href="{{ route('cookie-policy') }}">Cookie Policy</a> and <a href="{{ route('privacy-policy') }}">Privacy Policy</a> for details.
            </p>
        </div>
        <div class="kw-cookie-actions">
            <button type="button" class="kw-cookie-btn kw-cookie-btn--ghost" id="kwCookieManage">Manage Preferences</button>
            <button type="button" class="kw-cookie-btn kw-cookie-btn--outline" id="kwCookieReject">Reject Non-Essential</button>
            <button type="button" class="kw-cookie-btn kw-cookie-btn--primary" id="kwCookieAccept">Accept All</button>
        </div>
    </div>
</div>

<div id="kwCookiePrefs" class="kw-cookie-prefs-overlay" aria-hidden="true">
    <div class="kw-cookie-prefs-modal" role="dialog" aria-modal="true" aria-label="Cookie preferences">
        <div class="kw-cookie-prefs-header">
            <h3>Cookie Preferences</h3>
            <button type="button" class="kw-cookie-prefs-close" id="kwCookiePrefsClose" aria-label="Close">&times;</button>
        </div>
        <div class="kw-cookie-prefs-body">
            <p class="kw-cookie-prefs-intro">
                Choose which categories of cookies we're allowed to use. Strictly necessary cookies are always on because the Site can't function without them. See our
                <a href="{{ route('cookie-policy') }}">Cookie Policy</a> for full details on each category.
            </p>

            <div class="kw-cookie-cat">
                <div class="kw-cookie-cat-head">
                    <span>Strictly Necessary</span>
                    <label class="kw-switch kw-switch--disabled">
                        <input type="checkbox" checked disabled>
                        <span class="kw-switch-slider"></span>
                    </label>
                </div>
                <p>Required for core functionality such as security (CSRF protection) and session handling. These cannot be disabled.</p>
            </div>

            <div class="kw-cookie-cat">
                <div class="kw-cookie-cat-head">
                    <span>Analytics &amp; Performance</span>
                    <label class="kw-switch">
                        <input type="checkbox" id="kwCookieAnalytics">
                        <span class="kw-switch-slider"></span>
                    </label>
                </div>
                <p>Help us understand visitor behavior via Google Analytics and Google Tag Manager so we can improve the Site.</p>
            </div>

            <div class="kw-cookie-cat">
                <div class="kw-cookie-cat-head">
                    <span>Functional</span>
                    <label class="kw-switch">
                        <input type="checkbox" id="kwCookieFunctional">
                        <span class="kw-switch-slider"></span>
                    </label>
                </div>
                <p>Remember choices you make, such as preferences, for a more personalized experience.</p>
            </div>
        </div>
        <div class="kw-cookie-prefs-footer">
            <button type="button" class="kw-cookie-btn kw-cookie-btn--outline" id="kwCookieRejectAllPrefs">Reject All</button>
            <button type="button" class="kw-cookie-btn kw-cookie-btn--primary" id="kwCookieSavePrefs">Save Preferences</button>
        </div>
    </div>
</div>

<style>
/* ── Bottom consent banner ── */
.kw-cookie-consent{
    position: fixed;
    left: 0; right: 0; bottom: 0;
    z-index: 10600;
    background: linear-gradient(145deg, #071b4d 0%, #0d1b3e 55%, #06153c 100%);
    border-top: 1px solid rgba(45,124,255,.28);
    box-shadow: 0 -10px 34px rgba(6,15,40,.35);
    transform: translateY(110%);
    transition: transform .45s cubic-bezier(.22,.9,.32,1);
    padding: 22px 0;
}
.kw-cookie-consent--visible{ transform: translateY(0); }

.kw-cookie-inner{
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 32px;
    display: flex;
    align-items: center;
    gap: 22px;
}
.kw-cookie-icon{
    flex-shrink: 0;
    width: 46px; height: 46px;
    border-radius: 12px;
    border: 1px solid rgba(45,124,255,.3);
    background: rgba(45,124,255,.09);
    display: flex; align-items: center; justify-content: center;
}
.kw-cookie-text{ flex: 1; min-width: 240px; }
.kw-cookie-title{ font-size: 15.5px; font-weight: 800; color: #fff; margin-bottom: 4px; font-family: 'Inter','Segoe UI',system-ui,sans-serif; }
.kw-cookie-desc{ font-size: 13px; line-height: 1.65; color: rgba(184,197,226,.75); font-family: 'Inter','Segoe UI',system-ui,sans-serif; }
.kw-cookie-desc a{ color: #8fb6ff; text-decoration: underline; }

.kw-cookie-actions{ display: flex; align-items: center; gap: 10px; flex-wrap: wrap; flex-shrink: 0; }
.kw-cookie-btn{
    font-family: 'Inter','Segoe UI',system-ui,sans-serif;
    font-size: 13px; font-weight: 700;
    padding: 10px 18px;
    border-radius: 9px;
    border: 1px solid transparent;
    cursor: pointer;
    white-space: nowrap;
    transition: background .2s, border-color .2s, color .2s, transform .15s;
}
.kw-cookie-btn--primary{ background: #2d7cff; color: #fff; }
.kw-cookie-btn--primary:hover{ background: #1a6bef; transform: translateY(-1px); }
.kw-cookie-btn--outline{ background: transparent; border-color: rgba(255,255,255,.22); color: rgba(255,255,255,.85); }
.kw-cookie-btn--outline:hover{ border-color: rgba(255,255,255,.4); color: #fff; }
.kw-cookie-btn--ghost{ background: transparent; color: rgba(184,197,226,.75); text-decoration: underline; padding: 10px 8px; }
.kw-cookie-btn--ghost:hover{ color: #fff; }

@media (max-width: 900px){
    .kw-cookie-inner{ flex-wrap: wrap; padding: 0 20px; }
    .kw-cookie-actions{ width: 100%; justify-content: flex-start; }
}

/* ── Preferences modal ── */
.kw-cookie-prefs-overlay{
    position: fixed; inset: 0;
    z-index: 10700;
    background: rgba(6,15,40,.55);
    display: flex; align-items: center; justify-content: center;
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transition: opacity .25s ease, visibility 0s linear .25s;
}
.kw-cookie-prefs-overlay--visible{
    opacity: 1;
    visibility: visible;
    transition: opacity .25s ease;
}
.kw-cookie-prefs-modal{
    width: 100%; max-width: 560px;
    max-height: 86vh;
    overflow-y: auto;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 30px 70px rgba(6,15,40,.35);
    transform: translateY(16px) scale(.98);
    transition: transform .3s cubic-bezier(.22,.9,.32,1);
    font-family: 'Inter','Segoe UI',system-ui,sans-serif;
}
.kw-cookie-prefs-overlay--visible .kw-cookie-prefs-modal{ transform: translateY(0) scale(1); }

.kw-cookie-prefs-header{
    display: flex; align-items: center; justify-content: space-between;
    padding: 22px 26px;
    border-bottom: 1px solid #e2e8f0;
}
.kw-cookie-prefs-header h3{ font-size: 18px; font-weight: 800; color: #0d1b3e; }
.kw-cookie-prefs-close{
    width: 32px; height: 32px;
    border-radius: 8px;
    border: none;
    background: #f1f4f9;
    color: #4b5875;
    font-size: 18px;
    line-height: 1;
    cursor: pointer;
}
.kw-cookie-prefs-close:hover{ background: #e2e8f0; }

.kw-cookie-prefs-body{ padding: 22px 26px; }
.kw-cookie-prefs-intro{ font-size: 13.5px; line-height: 1.7; color: #4b5875; margin-bottom: 18px; }
.kw-cookie-prefs-intro a{ color: #1a73e8; text-decoration: underline; }

.kw-cookie-cat{ padding: 16px 0; border-bottom: 1px solid #eef1f6; }
.kw-cookie-cat:last-child{ border-bottom: none; padding-bottom: 0; }
.kw-cookie-cat-head{ display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px; }
.kw-cookie-cat-head span{ font-size: 14.5px; font-weight: 700; color: #162447; }
.kw-cookie-cat p{ font-size: 13px; line-height: 1.6; color: #4b5875; }

.kw-switch{ position: relative; display: inline-block; width: 42px; height: 24px; flex-shrink: 0; }
.kw-switch input{ opacity: 0; width: 0; height: 0; }
.kw-switch-slider{
    position: absolute; cursor: pointer; inset: 0;
    background: #cbd5e1; border-radius: 100px;
    transition: background .2s;
}
.kw-switch-slider::before{
    content: ''; position: absolute;
    width: 18px; height: 18px; left: 3px; top: 3px;
    background: #fff; border-radius: 50%;
    transition: transform .2s;
    box-shadow: 0 1px 3px rgba(0,0,0,.25);
}
.kw-switch input:checked + .kw-switch-slider{ background: #2d7cff; }
.kw-switch input:checked + .kw-switch-slider::before{ transform: translateX(18px); }
.kw-switch--disabled{ cursor: not-allowed; opacity: .65; }
.kw-switch--disabled .kw-switch-slider{ cursor: not-allowed; }

.kw-cookie-prefs-footer{
    display: flex; align-items: center; justify-content: flex-end; gap: 10px;
    padding: 18px 26px 24px;
    border-top: 1px solid #e2e8f0;
}
</style>

<script>
(function () {
    var CONSENT_KEY = 'kw_cookie_consent';

    var banner = document.getElementById('kwCookieConsent');
    var prefsOverlay = document.getElementById('kwCookiePrefs');
    var analyticsToggle = document.getElementById('kwCookieAnalytics');
    var functionalToggle = document.getElementById('kwCookieFunctional');

    function readConsent() {
        try {
            var raw = localStorage.getItem(CONSENT_KEY);
            return raw ? JSON.parse(raw) : null;
        } catch (e) {
            return null;
        }
    }

    function applyConsent(consent) {
        if (typeof gtag === 'function') {
            gtag('consent', 'update', {
                analytics_storage: consent.analytics ? 'granted' : 'denied',
                ad_storage: 'denied',
                ad_user_data: 'denied',
                ad_personalization: 'denied',
                functionality_storage: consent.functional ? 'granted' : 'denied',
                personalization_storage: consent.functional ? 'granted' : 'denied'
            });
        }
    }

    function writeConsent(consent) {
        consent.timestamp = new Date().toISOString();
        try {
            localStorage.setItem(CONSENT_KEY, JSON.stringify(consent));
        } catch (e) {}
        applyConsent(consent);
    }

    function showBanner() {
        banner.classList.add('kw-cookie-consent--visible');
        banner.setAttribute('aria-hidden', 'false');
    }

    function hideBanner() {
        banner.classList.remove('kw-cookie-consent--visible');
        banner.setAttribute('aria-hidden', 'true');
    }

    function openPrefs() {
        var existing = readConsent();
        analyticsToggle.checked = existing ? !!existing.analytics : false;
        functionalToggle.checked = existing ? !!existing.functional : false;
        prefsOverlay.classList.add('kw-cookie-prefs-overlay--visible');
        prefsOverlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closePrefs() {
        prefsOverlay.classList.remove('kw-cookie-prefs-overlay--visible');
        prefsOverlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    document.getElementById('kwCookieAccept').addEventListener('click', function () {
        writeConsent({ necessary: true, analytics: true, functional: true });
        hideBanner();
        closePrefs();
    });

    document.getElementById('kwCookieReject').addEventListener('click', function () {
        writeConsent({ necessary: true, analytics: false, functional: false });
        hideBanner();
        closePrefs();
    });

    document.getElementById('kwCookieRejectAllPrefs').addEventListener('click', function () {
        writeConsent({ necessary: true, analytics: false, functional: false });
        hideBanner();
        closePrefs();
    });

    document.getElementById('kwCookieSavePrefs').addEventListener('click', function () {
        writeConsent({
            necessary: true,
            analytics: !!analyticsToggle.checked,
            functional: !!functionalToggle.checked
        });
        hideBanner();
        closePrefs();
    });

    document.getElementById('kwCookieManage').addEventListener('click', openPrefs);
    document.getElementById('kwCookiePrefsClose').addEventListener('click', closePrefs);
    prefsOverlay.addEventListener('click', function (e) {
        if (e.target === prefsOverlay) closePrefs();
    });

    window.kwOpenCookieSettings = function (e) {
        if (e) e.preventDefault();
        openPrefs();
    };

    var existingConsent = readConsent();
    if (existingConsent) {
        applyConsent(existingConsent);
    } else {
        window.addEventListener('load', function () {
            setTimeout(showBanner, 600);
        });
    }
})();
</script>
