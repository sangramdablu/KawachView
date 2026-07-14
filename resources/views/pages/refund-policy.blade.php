<!DOCTYPE html>
<html lang="en">

@php
    $seoTitle       = 'Refund Policy | Kawach Technology — Custom Software Development';
    $seoDescription = 'Read the Kawach Technology refund policy to understand our terms for cancellations, refunds, and payment disputes for custom software, web, mobile, AI, and cloud development services.';
    $seoKeywords    = 'Kawach Technology refund policy, cancellation policy, software development refunds, payment dispute policy';
    $seoCanonical   = url('/refund-policy');
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
        <h1>Refund Policy</h1>
        <p>This policy explains how Kawach Technology handles cancellations, refunds, and payment disputes for our custom software, web, mobile, AI, and cloud development services.</p>
        <span class="legal-updated">Last updated: July 15, 2026</span>
    </div>
</section>

<section class="legal-wrap">
    <div class="container">
        <div class="legal-grid">

            <aside class="legal-toc">
                <p>On this page</p>
                <ul>
                    <li><a href="#introduction">1. Introduction</a></li>
                    <li><a href="#deposits">2. Deposits &amp; Advance Payments</a></li>
                    <li><a href="#milestones">3. Milestone &amp; Project-Based Work</a></li>
                    <li><a href="#retainers">4. Retainer &amp; Subscription Services</a></li>
                    <li><a href="#non-refundable">5. Non-Refundable Items</a></li>
                    <li><a href="#cancellations">6. Cancellations</a></li>
                    <li><a href="#how-to-request">7. How to Request a Refund</a></li>
                    <li><a href="#processing">8. Processing Time &amp; Method</a></li>
                    <li><a href="#disputes">9. Disputes</a></li>
                    <li><a href="#changes">10. Changes to This Policy</a></li>
                    <li><a href="#contact">11. Contact Us</a></li>
                </ul>
            </aside>

            <div class="legal-content">

                <h2 id="introduction">1. Introduction</h2>
                <p>Kawach Technology ("Kawach Technology", "we", "us", or "our") provides custom software, web, mobile, AI, and cloud development services under individual project agreements or statements of work ("SOW") agreed with each client. This Refund Policy describes how refunds, cancellations, and payment disputes are handled. It supplements our <a href="{{ route('terms') }}">Terms &amp; Conditions</a> and forms part of the agreement between Kawach Technology and its clients. Where a signed SOW or contract contains specific refund terms, those terms take precedence over this policy.</p>

                <h2 id="deposits">2. Deposits &amp; Advance Payments</h2>
                <p>Most projects require an upfront deposit before work begins, used to reserve development capacity and cover initial planning, discovery, and setup costs. Deposits are <strong>non-refundable</strong> once work has commenced, except where Kawach Technology fails to begin the agreed work within the timeframe specified in the SOW.</p>

                <h2 id="milestones">3. Milestone &amp; Project-Based Work</h2>
                <p>For projects billed against milestones:</p>
                <ul>
                    <li>Payments due for milestones that have already been delivered and approved are non-refundable.</li>
                    <li>If a client cancels a project before a milestone is completed, fees for work already performed on that milestone (calculated on a pro-rata or time-and-materials basis) will be deducted from any refund, and only the remaining unearned balance will be refunded.</li>
                    <li>No refund is due for milestones that have been delivered, reviewed, and formally accepted by the client.</li>
                </ul>

                <h2 id="retainers">4. Retainer &amp; Subscription Services</h2>
                <p>For ongoing retainer, maintenance, or subscription-based engagements, fees are billed in advance for each billing cycle (e.g., monthly). Fees already billed for the current cycle are non-refundable, but clients may cancel future billing cycles at any time by providing written notice as specified in the SOW, with no further charges applied after the notice period ends.</p>

                <h2 id="non-refundable">5. Non-Refundable Items</h2>
                <p>The following are not eligible for a refund under any circumstances:</p>
                <ul>
                    <li>Third-party costs already incurred on the client's behalf (e.g., domain registration, hosting, software licenses, API or subscription fees).</li>
                    <li>Work that has been delivered, reviewed, and formally accepted by the client.</li>
                    <li>Consultation, discovery, or scoping fees for sessions already conducted.</li>
                    <li>Custom development work that cannot be repurposed for another client due to its bespoke nature.</li>
                </ul>

                <h2 id="cancellations">6. Cancellations</h2>
                <p>Either party may terminate a project in accordance with the termination clause of the applicable SOW or contract. Upon cancellation:</p>
                <ul>
                    <li>The client will be invoiced for all work completed up to the effective date of cancellation.</li>
                    <li>Any unearned advance payment beyond work completed will be refunded, subject to the deductions described above.</li>
                    <li>Kawach Technology will deliver all work product completed and paid for up to the cancellation date.</li>
                </ul>

                <h2 id="how-to-request">7. How to Request a Refund</h2>
                <p>To request a refund, contact us with your project or invoice reference, the reason for your request, and any supporting details. We review each request individually against the applicable SOW and this policy, and will respond within a reasonable timeframe, typically within 10 business days.</p>

                <h2 id="processing">8. Processing Time &amp; Method</h2>
                <p>Approved refunds are issued to the original payment method used for the transaction, where possible. Processing times vary depending on your bank or payment provider, but refunds are typically initiated within 10–15 business days of approval. Kawach Technology is not responsible for delays caused by banks, card networks, or payment processors.</p>

                <h2 id="disputes">9. Disputes</h2>
                <p>If you disagree with a refund decision, you may escalate the matter in writing to <a href="mailto:{{ config('app.main_email') }}">{{ config('app.main_email') }}</a> for further review. We encourage clients to raise concerns directly with us before initiating a chargeback or payment dispute with their bank or card provider, so that we can work toward a fair resolution.</p>
                <div class="legal-note">Initiating a chargeback without first contacting us may result in suspension of ongoing work pending resolution, as outlined in our <a href="{{ route('terms') }}">Terms &amp; Conditions</a>.</div>

                <h2 id="changes">10. Changes to This Policy</h2>
                <p>We may update this Refund Policy from time to time to reflect changes in our business practices or legal requirements. The "Last updated" date at the top of this page indicates when it was last revised. Changes do not apply retroactively to agreements already in place unless required by law.</p>

                <h2 id="contact">11. Contact Us</h2>
                <p>If you have questions about this Refund Policy or wish to request a refund, contact us at:</p>
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
