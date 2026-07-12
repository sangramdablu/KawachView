<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Terms & Conditions | Kawach Technology — Custom Software Development';
    $seoDescription = 'Read the terms and conditions governing the use of the Kawach Technology website and our custom software development services for clients in the USA, Europe, and worldwide.';
    $seoKeywords    = 'Kawach Technology terms and conditions, software development terms of service, website terms of use';
    $seoCanonical   = url('/terms-conditions');
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
        <h1>Terms &amp; Conditions</h1>
        <p>These terms govern your use of the Kawach Technology website and the software development services we provide to clients in the USA, Europe, and worldwide.</p>
        <span class="legal-updated">Last updated: July 13, 2026</span>
    </div>
</section>

<section class="legal-wrap">
    <div class="container">
        <div class="legal-grid">

            <aside class="legal-toc">
                <p>On this page</p>
                <ul>
                    <li><a href="#acceptance">1. Acceptance of Terms</a></li>
                    <li><a href="#services">2. Description of Services</a></li>
                    <li><a href="#website-use">3. Use of the Website</a></li>
                    <li><a href="#ip">4. Intellectual Property</a></li>
                    <li><a href="#engagements">5. Quotes &amp; Service Engagements</a></li>
                    <li><a href="#payment">6. Payment Terms</a></li>
                    <li><a href="#client-responsibilities">7. Client Responsibilities</a></li>
                    <li><a href="#confidentiality">8. Confidentiality</a></li>
                    <li><a href="#warranties">9. Warranties &amp; Disclaimers</a></li>
                    <li><a href="#liability">10. Limitation of Liability</a></li>
                    <li><a href="#indemnification">11. Indemnification</a></li>
                    <li><a href="#termination">12. Termination</a></li>
                    <li><a href="#governing-law">13. Governing Law &amp; Disputes</a></li>
                    <li><a href="#changes">14. Changes to These Terms</a></li>
                    <li><a href="#contact">15. Contact Us</a></li>
                </ul>
            </aside>

            <div class="legal-content">

                <h2 id="acceptance">1. Acceptance of Terms</h2>
                <p>These Terms &amp; Conditions ("Terms") govern your access to and use of the website located at {{ url('/') }} (the "Site") and the services provided by Kawach Technology ("Kawach Technology", "we", "us", "our"). By accessing the Site, submitting an inquiry, or engaging our services, you ("Client", "you") agree to be bound by these Terms. If you do not agree, please do not use the Site or our services.</p>

                <h2 id="services">2. Description of Services</h2>
                <p>Kawach Technology provides custom software development, web development, mobile application development, AI/automation, SaaS development, and related consulting services. Specific scope, deliverables, timelines, and pricing for any engagement are defined in a separate proposal, quote, statement of work, or service agreement ("SOW") signed by both parties, which forms part of the binding agreement alongside these Terms.</p>

                <h2 id="website-use">3. Use of the Website</h2>
                <p>You agree to use the Site only for lawful purposes and in a manner that does not infringe the rights of, or restrict or inhibit the use and enjoyment of the Site by, any third party. You agree not to:</p>
                <ul>
                    <li>Attempt to gain unauthorized access to any part of the Site or its underlying systems.</li>
                    <li>Introduce viruses, malware, or other harmful code.</li>
                    <li>Scrape, copy, or reproduce Site content without our written permission.</li>
                    <li>Submit false or misleading information through our forms.</li>
                </ul>

                <h2 id="ip">4. Intellectual Property</h2>
                <p>Unless otherwise agreed in writing, all content on the Site — including text, graphics, logos, and design — is owned by or licensed to Kawach Technology and is protected by applicable intellectual property laws. For client projects, ownership of custom deliverables (source code, designs, and related work product) transfers to the Client upon full payment, except for any pre-existing Kawach Technology tools, frameworks, or libraries, which remain our property and are licensed to the Client for use in the delivered project. Specific IP terms may be superseded by a signed SOW or agreement.</p>

                <h2 id="engagements">5. Quotes &amp; Service Engagements</h2>
                <p>Any quote, estimate, or proposal shared through the Site or via email is non-binding until confirmed in a signed SOW or service agreement. Project timelines, deliverables, and pricing are estimates based on the information available at the time and may be revised once full requirements are assessed.</p>

                <h2 id="payment">6. Payment Terms</h2>
                <ul>
                    <li>Payment schedules, milestones, and invoicing currency are defined in the applicable SOW or agreement.</li>
                    <li>Invoices are due within the period specified on the invoice unless otherwise agreed in writing.</li>
                    <li>Late payments may result in suspension of services until outstanding amounts are settled.</li>
                    <li>All fees are exclusive of applicable taxes, duties, or bank/transfer charges unless stated otherwise.</li>
                </ul>

                <h2 id="client-responsibilities">7. Client Responsibilities</h2>
                <p>You agree to provide timely feedback, access, credentials, content, and information reasonably required for us to perform the services. Delays in providing such materials may impact project timelines, and we are not liable for delays caused by incomplete or late Client input.</p>

                <h2 id="confidentiality">8. Confidentiality</h2>
                <p>Both parties agree to keep confidential any non-public business, technical, or financial information disclosed during the engagement, and to use it solely for the purpose of the project. This obligation survives the termination of any engagement.</p>

                <h2 id="warranties">9. Warranties &amp; Disclaimers</h2>
                <p>We strive to deliver services with reasonable skill and care in line with industry standards. Except as expressly stated in a signed SOW, the Site and our services are provided "as is" and "as available" without warranties of any kind, whether express or implied, including implied warranties of merchantability, fitness for a particular purpose, or non-infringement.</p>

                <h2 id="liability">10. Limitation of Liability</h2>
                <p>To the maximum extent permitted by applicable law, Kawach Technology shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits, revenue, data, or business opportunity, arising out of or related to your use of the Site or our services. Our total aggregate liability for any claim arising from a specific engagement shall not exceed the total fees paid by the Client for that engagement in the preceding three (3) months, unless otherwise agreed in the applicable SOW.</p>

                <h2 id="indemnification">11. Indemnification</h2>
                <p>You agree to indemnify and hold Kawach Technology harmless from any claims, damages, liabilities, and expenses (including reasonable legal fees) arising from your breach of these Terms, misuse of the Site, or violation of any applicable law or third-party right.</p>

                <h2 id="termination">12. Termination</h2>
                <p>Either party may terminate an active engagement in accordance with the termination clause specified in the applicable SOW or agreement. In the absence of a specific clause, either party may terminate with written notice, and the Client shall pay for all work completed up to the effective date of termination.</p>

                <h2 id="governing-law">13. Governing Law &amp; Disputes</h2>
                <p>These Terms are governed by the laws of India, without regard to conflict-of-law principles, unless a signed SOW or master service agreement with a specific client specifies otherwise. The parties agree to first attempt to resolve any dispute amicably through good-faith negotiation before pursuing formal proceedings. Nothing in this clause limits either party's ability to negotiate jurisdiction-specific terms (including US or EU governing law/arbitration clauses) in a signed client agreement.</p>

                <h2 id="changes">14. Changes to These Terms</h2>
                <p>We may update these Terms from time to time to reflect changes in our services or applicable law. The "Last updated" date at the top of this page reflects the most recent revision. Continued use of the Site after changes take effect constitutes acceptance of the revised Terms.</p>

                <h2 id="contact">15. Contact Us</h2>
                <p>If you have questions about these Terms, contact us at:</p>
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
