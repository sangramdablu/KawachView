<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Cookie Policy | Kawach Technology — Custom Software Development';
    $seoDescription = 'Learn how Kawach Technology uses cookies and similar tracking technologies on our website, and how you can manage or disable them under GDPR and CCPA.';
    $seoKeywords    = 'Kawach Technology cookie policy, website cookies, GDPR cookie consent, manage cookies';
    $seoCanonical   = url('/cookie-policy');
    $seoRobots      = 'index, follow';
@endphp

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
  .legal-hero{
      position: relative;
      overflow: hidden;
      padding: 90px 0 60px;
      background: linear-gradient(145deg, #071b4d 0%, #0d1b3e 55%, #06153c 100%);
      color: #fff;
      text-align: center;
  }
  .legal-hero h1{ font-weight: 800; font-size: clamp(28px, 4vw, 44px); margin-bottom: 14px; }
  .legal-hero p{ color: rgba(255,255,255,.65); font-size: 15px; max-width: 640px; margin: 0 auto; }
  .legal-hero .legal-updated{
      display: inline-flex; align-items: center; gap: 8px;
      margin-top: 20px; padding: 6px 16px; border-radius: 100px;
      background: rgba(45,124,255,.1); border: 1px solid rgba(45,124,255,.28);
      font-size: 12.5px; color: #8fb6ff;
  }

  .legal-wrap{ padding: 64px 0 90px; background: #f4f6fb; }
  .legal-grid{ display: grid; grid-template-columns: 260px 1fr; gap: 48px; align-items: start; }

  .legal-toc{
      position: sticky; top: 100px;
      background: #fff; border: 1px solid #e2e8f0; border-radius: 14px;
      padding: 22px 20px;
  }
  .legal-toc p{ font-size: 11px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: #1a73e8; margin-bottom: 14px; }
  .legal-toc ul{ list-style: none; padding: 0; margin: 0; }
  .legal-toc li{ margin-bottom: 10px; }
  .legal-toc a{ font-size: 13.5px; color: #4b5875; text-decoration: none; line-height: 1.4; display: block; }
  .legal-toc a:hover{ color: #1a73e8; }

  .legal-content{ background: #fff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 46px 50px; }
  .legal-content h2{
      font-size: 21px; font-weight: 800; color: #0d1b3e;
      margin: 40px 0 14px; scroll-margin-top: 100px;
  }
  .legal-content h2:first-child{ margin-top: 0; }
  .legal-content h3{ font-size: 16.5px; font-weight: 700; color: #162447; margin: 22px 0 10px; }
  .legal-content p, .legal-content li{ font-size: 14.5px; line-height: 1.85; color: #4b5875; }
  .legal-content ul, .legal-content ol{ margin: 8px 0 16px 22px; }
  .legal-content li{ margin-bottom: 8px; }
  .legal-content a{ color: #1a73e8; text-decoration: underline; }
  .legal-content strong{ color: #1a1a2e; }
  .legal-note{
      background: #eef4ff; border-left: 3px solid #1a73e8; border-radius: 8px;
      padding: 16px 20px; margin: 18px 0; font-size: 14px; color: #2b3a55;
  }

  .legal-table{ width: 100%; border-collapse: collapse; margin: 14px 0 24px; font-size: 14px; }
  .legal-table th, .legal-table td{ text-align: left; padding: 12px 14px; border: 1px solid #e2e8f0; vertical-align: top; }
  .legal-table th{ background: #eef4ff; color: #0d1b3e; font-size: 12.5px; text-transform: uppercase; letter-spacing: .6px; }
  .legal-table td{ color: #4b5875; }

  @media (max-width: 900px){
      .legal-grid{ grid-template-columns: 1fr; }
      .legal-toc{ position: static; }
      .legal-content{ padding: 32px 22px; }
      .legal-table{ font-size: 13px; }
  }
</style>
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7J267VF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@include('layouts.navbar')

<section class="legal-hero">
    <div class="container">
        <h1>Cookie Policy</h1>
        <p>This policy explains what cookies are, how Kawach Technology uses them on this website, and how you can manage your preferences.</p>
        <span class="legal-updated">Last updated: July 13, 2026</span>
    </div>
</section>

<section class="legal-wrap">
    <div class="container">
        <div class="legal-grid">

            <aside class="legal-toc">
                <p>On this page</p>
                <ul>
                    <li><a href="#what-are-cookies">1. What Are Cookies</a></li>
                    <li><a href="#how-we-use">2. How We Use Cookies</a></li>
                    <li><a href="#types">3. Types of Cookies We Use</a></li>
                    <li><a href="#third-party">4. Third-Party Cookies</a></li>
                    <li><a href="#managing">5. Managing &amp; Disabling Cookies</a></li>
                    <li><a href="#your-rights">6. Your Choices Under GDPR &amp; CCPA</a></li>
                    <li><a href="#changes">7. Changes to This Policy</a></li>
                    <li><a href="#contact">8. Contact Us</a></li>
                </ul>
            </aside>

            <div class="legal-content">

                <h2 id="what-are-cookies">1. What Are Cookies</h2>
                <p>Cookies are small text files placed on your device when you visit a website. They are widely used to make websites function properly, improve user experience, and provide information to site owners about how visitors use their site. Similar technologies include pixels, tags, and local storage, which we refer to collectively as "cookies" in this policy.</p>

                <h2 id="how-we-use">2. How We Use Cookies</h2>
                <p>Kawach Technology uses cookies on this Site to:</p>
                <ul>
                    <li>Ensure core website functionality (e.g., navigation, forms, security).</li>
                    <li>Understand how visitors interact with our Site through analytics.</li>
                    <li>Remember your preferences between visits.</li>
                    <li>Measure the effectiveness of our content and marketing.</li>
                </ul>

                <h2 id="types">3. Types of Cookies We Use</h2>
                <table class="legal-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Purpose</th>
                            <th>Examples</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Strictly Necessary</strong></td>
                            <td>Required for the Site to function, such as security (CSRF protection) and session handling. Cannot be disabled.</td>
                            <td>Laravel session cookie, CSRF token</td>
                        </tr>
                        <tr>
                            <td><strong>Analytics &amp; Performance</strong></td>
                            <td>Help us understand visitor behavior so we can improve the Site.</td>
                            <td>Google Analytics, Google Tag Manager</td>
                        </tr>
                        <tr>
                            <td><strong>Functional</strong></td>
                            <td>Remember choices you make to provide a more personalized experience.</td>
                            <td>Language/region preference</td>
                        </tr>
                    </tbody>
                </table>

                <h2 id="third-party">4. Third-Party Cookies</h2>
                <p>Some cookies are placed by third-party services that appear on our pages, such as Google Analytics and Google Tag Manager. These providers may use cookies to collect information about your use of the Site and other websites over time. We do not control these third-party cookies — please review the respective third party's privacy and cookie policies for more information.</p>

                <h2 id="managing">5. Managing &amp; Disabling Cookies</h2>
                <p>You can control or disable cookies at any time through your browser settings. Most browsers allow you to:</p>
                <ul>
                    <li>View what cookies are stored and delete them individually.</li>
                    <li>Block third-party cookies.</li>
                    <li>Block cookies from particular sites.</li>
                    <li>Block all cookies from being set.</li>
                    <li>Delete all cookies when you close your browser.</li>
                </ul>
                <p>Please note that disabling certain cookies may affect the functionality of this Site. You can also opt out of Google Analytics tracking specifically by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics Opt-out Browser Add-on</a>.</p>

                <h2 id="your-rights">6. Your Choices Under GDPR &amp; CCPA</h2>
                <p>If you are located in the EEA or UK, non-essential cookies (such as analytics) are only set with your consent, which you can withdraw at any time through your browser settings. If you are a California resident, you have the right to opt out of the "sale" or "sharing" of personal information collected via cookies; we do not sell personal information, and we do not knowingly share it for cross-context behavioral advertising in a manner that requires an opt-out beyond disabling analytics cookies as described above.</p>

                <h2 id="changes">7. Changes to This Policy</h2>
                <p>We may update this Cookie Policy from time to time to reflect changes in the cookies we use or for legal, operational, or regulatory reasons. The "Last updated" date at the top of this page indicates when it was last revised.</p>

                <h2 id="contact">8. Contact Us</h2>
                <p>If you have questions about our use of cookies, contact us at:</p>
                <ul>
                    <li>Email: <a href="mailto:{{ config('app.main_email') }}">{{ config('app.main_email') }}</a></li>
                    <li>Phone: {{ config('app.mobile') }}</li>
                    <li>Or via our <a href="{{ route('contact') }}">Contact page</a>.</li>
                </ul>
                <p>For more information on how we handle personal data more broadly, see our <a href="{{ route('privacy-policy') }}">Privacy Policy</a>.</p>

            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

</body>
</html>
