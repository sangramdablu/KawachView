<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Privacy Policy | Kawach Technology — Custom Software Development';
    $seoDescription = 'Read the Kawach Technology privacy policy to learn how we collect, use, and protect your personal data, including your rights under GDPR (EU/UK) and CCPA (California, USA).';
    $seoKeywords    = 'Kawach Technology privacy policy, GDPR compliance, CCPA compliance, data protection policy, software company privacy policy';
    $seoCanonical   = url('/privacy-policy');
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

  @media (max-width: 900px){
      .legal-grid{ grid-template-columns: 1fr; }
      .legal-toc{ position: static; }
      .legal-content{ padding: 32px 22px; }
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
        <h1>Privacy Policy</h1>
        <p>This policy explains how Kawach Technology collects, uses, and safeguards your personal data when you use our website and services, including your rights under GDPR and CCPA.</p>
        <span class="legal-updated">Last updated: July 13, 2026</span>
    </div>
</section>

<section class="legal-wrap">
    <div class="container">
        <div class="legal-grid">

            <aside class="legal-toc">
                <p>On this page</p>
                <ul>
                    <li><a href="#introduction">1. Introduction</a></li>
                    <li><a href="#info-we-collect">2. Information We Collect</a></li>
                    <li><a href="#how-we-use">3. How We Use Your Information</a></li>
                    <li><a href="#legal-basis">4. Legal Basis for Processing (GDPR)</a></li>
                    <li><a href="#cookies">5. Cookies &amp; Tracking</a></li>
                    <li><a href="#sharing">6. Sharing Your Information</a></li>
                    <li><a href="#transfers">7. International Data Transfers</a></li>
                    <li><a href="#retention">8. Data Retention</a></li>
                    <li><a href="#your-rights">9. Your Privacy Rights</a></li>
                    <li><a href="#security">10. Data Security</a></li>
                    <li><a href="#children">11. Children's Privacy</a></li>
                    <li><a href="#third-party-links">12. Third-Party Links</a></li>
                    <li><a href="#changes">13. Changes to This Policy</a></li>
                    <li><a href="#contact">14. Contact Us</a></li>
                </ul>
            </aside>

            <div class="legal-content">

                <h2 id="introduction">1. Introduction</h2>
                <p>Kawach Technology ("Kawach Technology", "we", "us", or "our") provides custom software, web, mobile, AI, and cloud development services to clients across the United States, Europe, and worldwide. This Privacy Policy describes how we collect, use, disclose, and protect information when you visit {{ url('/') }} (the "Site") or engage with our services.</p>
                <p>We designed this policy to comply with the EU/UK General Data Protection Regulation ("GDPR") and the California Consumer Privacy Act as amended by the California Privacy Rights Act ("CCPA/CPRA"), in addition to other applicable data protection laws. By using our Site, you agree to the practices described here.</p>

                <h2 id="info-we-collect">2. Information We Collect</h2>
                <h3>a. Information you provide directly</h3>
                <ul>
                    <li>Contact details submitted through our contact, quote, or consultation forms (name, email address, phone number, company name, project details).</li>
                    <li>Any information you include when you email us or schedule a call.</li>
                    <li>Newsletter subscription email addresses.</li>
                </ul>
                <h3>b. Information collected automatically</h3>
                <ul>
                    <li>Device and usage data such as IP address, browser type, operating system, referring URL, pages viewed, and time spent on the Site, collected via Google Analytics and Google Tag Manager.</li>
                    <li>Cookies and similar tracking technologies — see our <a href="{{ route('cookie-policy') }}">Cookie Policy</a> for details.</li>
                </ul>
                <p>We do not knowingly collect sensitive categories of personal data (e.g., health, biometric, or financial account data) through the Site.</p>

                <h2 id="how-we-use">3. How We Use Your Information</h2>
                <ul>
                    <li>To respond to inquiries, quote requests, and consultation bookings.</li>
                    <li>To deliver, maintain, and improve our services and Site.</li>
                    <li>To send project updates, proposals, invoices, and service-related communications.</li>
                    <li>To send newsletters or marketing communications where you have opted in (you may unsubscribe at any time).</li>
                    <li>To analyze Site usage and improve user experience.</li>
                    <li>To comply with legal obligations and enforce our <a href="{{ route('terms') }}">Terms &amp; Conditions</a>.</li>
                </ul>

                <h2 id="legal-basis">4. Legal Basis for Processing (GDPR)</h2>
                <p>If you are located in the European Economic Area or United Kingdom, we process your personal data under the following legal bases:</p>
                <ul>
                    <li><strong>Consent</strong> — for newsletters, marketing communications, and non-essential cookies.</li>
                    <li><strong>Contractual necessity</strong> — to respond to your inquiries and provide services you request.</li>
                    <li><strong>Legitimate interest</strong> — to operate, secure, and improve our Site and business.</li>
                    <li><strong>Legal obligation</strong> — where required by applicable law.</li>
                </ul>

                <h2 id="cookies">5. Cookies &amp; Tracking Technologies</h2>
                <p>We use cookies and similar technologies (including Google Analytics and Google Tag Manager) to operate the Site and understand how visitors use it. You can control cookies through your browser settings or the cookie banner where available. Full details are available in our <a href="{{ route('cookie-policy') }}">Cookie Policy</a>.</p>

                <h2 id="sharing">6. Sharing Your Information</h2>
                <p>We do not sell your personal data. We may share information with:</p>
                <ul>
                    <li><strong>Service providers</strong> who help us operate the Site and deliver services (e.g., hosting providers, email delivery services, analytics providers such as Google).</li>
                    <li><strong>Professional advisors</strong> such as legal or accounting firms, where necessary.</li>
                    <li><strong>Authorities</strong>, where required to comply with a legal obligation, court order, or to protect our rights.</li>
                    <li><strong>A successor entity</strong>, in the event of a merger, acquisition, or sale of assets.</li>
                </ul>

                <h2 id="transfers">7. International Data Transfers</h2>
                <p>Kawach Technology is headquartered in India and serves clients globally. If you are located in the EEA, UK, or elsewhere outside India, your information may be transferred to and processed in India or other countries. Where required, we rely on appropriate safeguards such as Standard Contractual Clauses to protect data transferred internationally.</p>

                <h2 id="retention">8. Data Retention</h2>
                <p>We retain personal data only for as long as necessary to fulfill the purposes described in this policy, comply with legal obligations, resolve disputes, and enforce our agreements. Contact form submissions and project-related data are generally retained for the duration of the business relationship and a reasonable period afterward, unless a longer retention period is required by law.</p>

                <h2 id="your-rights">9. Your Privacy Rights</h2>
                <h3>For EU/EEA and UK residents (GDPR)</h3>
                <p>You have the right to:</p>
                <ul>
                    <li>Access the personal data we hold about you.</li>
                    <li>Request correction of inaccurate or incomplete data.</li>
                    <li>Request erasure of your personal data ("right to be forgotten").</li>
                    <li>Restrict or object to our processing of your data.</li>
                    <li>Request data portability.</li>
                    <li>Withdraw consent at any time, where processing is based on consent.</li>
                    <li>Lodge a complaint with your local data protection supervisory authority.</li>
                </ul>
                <h3>For California residents (CCPA/CPRA)</h3>
                <p>You have the right to:</p>
                <ul>
                    <li>Know what personal information we collect, use, and disclose.</li>
                    <li>Request deletion of your personal information.</li>
                    <li>Correct inaccurate personal information.</li>
                    <li>Opt out of the sale or sharing of personal information — <strong>we do not sell or share personal information</strong> as defined under the CCPA/CPRA.</li>
                    <li>Not be discriminated against for exercising your privacy rights.</li>
                </ul>
                <div class="legal-note">To exercise any of these rights, contact us at <a href="mailto:{{ config('app.main_email') }}">{{ config('app.main_email') }}</a>. We may need to verify your identity before fulfilling your request.</div>

                <h2 id="security">10. Data Security</h2>
                <p>We implement reasonable technical and organizational measures designed to protect personal data against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission or storage is 100% secure, and we cannot guarantee absolute security.</p>

                <h2 id="children">11. Children's Privacy</h2>
                <p>Our Site and services are intended for businesses and professionals. We do not knowingly collect personal data from individuals under the age of 16. If you believe a child has provided us with personal data, please contact us so we can delete it.</p>

                <h2 id="third-party-links">12. Third-Party Links</h2>
                <p>Our Site may contain links to third-party websites. We are not responsible for the privacy practices or content of those websites. We encourage you to review their privacy policies.</p>

                <h2 id="changes">13. Changes to This Policy</h2>
                <p>We may update this Privacy Policy periodically to reflect changes in our practices or legal requirements. The "Last updated" date at the top of this page indicates when it was last revised. Continued use of the Site after changes take effect constitutes acceptance of the revised policy.</p>

                <h2 id="contact">14. Contact Us</h2>
                <p>If you have questions about this Privacy Policy or wish to exercise your privacy rights, contact us at:</p>
                <ul>
                    <li>Email: <a href="mailto:{{ config('app.main_email') }}">{{ config('app.main_email') }}</a></li>
                    <li>Phone: {{ config('app.mobile') }}</li>
                    <li>Or via our <a href="{{ route('contact') }}">Contact page</a>.</li>
                </ul>

            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

</body>
</html>
