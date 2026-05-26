{{-- resources/views/emails/client/thank-you.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>We received your message</title>
  <style>
    /* ── Reset ── */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body, html { margin: 0; padding: 0; width: 100% !important; }
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background-color: #f0f4f8;
      color: #1e293b;
      -webkit-text-size-adjust: 100%;
    }
    img { border: 0; outline: none; text-decoration: none; display: block; }
    a { color: #1a73e8; text-decoration: none; }

    /* ── Wrapper ── */
    .email-wrapper {
      width: 100%;
      background-color: #f0f4f8;
      padding: 32px 16px;
    }
    .email-container {
      max-width: 620px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(0,0,0,0.09);
    }

    /* ── Header ── */
    .email-header {
      background: linear-gradient(135deg, #0d1b3e 0%, #1a3a6e 100%);
      padding: 40px 40px 36px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .email-header::before {
      content: '';
      position: absolute; top: -80px; right: -80px;
      width: 220px; height: 220px;
      background: rgba(33,150,243,0.1);
      border-radius: 50%;
    }
    .email-header::after {
      content: '';
      position: absolute; bottom: -60px; left: -60px;
      width: 180px; height: 180px;
      background: rgba(33,150,243,0.07);
      border-radius: 50%;
    }

    /* Check icon */
    .success-icon-wrap {
      width: 72px; height: 72px;
      background: rgba(76,175,80,0.15);
      border: 2px solid rgba(76,175,80,0.4);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 20px;
      position: relative; z-index: 1;
    }
    .success-icon-wrap span {
      font-size: 30px;
      line-height: 1;
    }
    .header-title {
      font-size: 24px;
      font-weight: 900;
      color: #ffffff;
      line-height: 1.25;
      margin-bottom: 10px;
      position: relative; z-index: 1;
    }
    .header-sub {
      font-size: 14px;
      color: #aac4e0;
      line-height: 1.6;
      max-width: 400px;
      margin: 0 auto;
      position: relative; z-index: 1;
    }
    .header-sub strong { color: #7ec8f7; }

    /* ── What happens next strip ── */
    .next-strip {
      background: #e8f4fd;
      border-bottom: 1px solid #c9e2f9;
      padding: 20px 40px;
    }
    .next-strip-title {
      font-size: 11px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 1.2px;
      color: #1558b0;
      margin-bottom: 14px;
    }
    .steps-row {
      display: flex;
      gap: 0;
    }
    .step {
      flex: 1;
      text-align: center;
      position: relative;
      padding: 0 8px;
    }
    .step::after {
      content: '›';
      position: absolute;
      right: -4px; top: 50%;
      transform: translateY(-50%);
      color: #1a73e8;
      font-size: 18px;
      font-weight: 700;
    }
    .step:last-child::after { display: none; }
    .step-num {
      width: 28px; height: 28px;
      background: #1a73e8;
      color: #fff;
      border-radius: 50%;
      font-size: 12px;
      font-weight: 800;
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 6px;
    }
    .step-text {
      font-size: 11px;
      color: #1a3a6e;
      font-weight: 600;
      line-height: 1.4;
    }

    /* ── Body ── */
    .email-body { padding: 32px 40px; }

    /* ── Greeting ── */
    .greeting {
      font-size: 16px;
      color: #1e293b;
      line-height: 1.7;
      margin-bottom: 24px;
    }
    .greeting strong { color: #0d1b3e; }

    /* ── Section label ── */
    .section-label {
      font-size: 10px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: #1a73e8;
      margin-bottom: 12px;
      padding-bottom: 8px;
      border-bottom: 2px solid #e8f1fd;
    }

    /* ── Summary card ── */
    .summary-card {
      background: #f8fafd;
      border: 1px solid #e2ecf8;
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 28px;
    }
    .summary-card-header {
      background: linear-gradient(135deg, #0d1b3e, #1a3a6e);
      padding: 14px 20px;
    }
    .summary-card-header-text {
      font-size: 13px;
      font-weight: 700;
      color: #ffffff;
    }
    .summary-row {
      display: flex;
      align-items: flex-start;
      padding: 12px 20px;
      border-bottom: 1px solid #e8f0fb;
      gap: 14px;
    }
    .summary-row:last-child { border-bottom: none; }
    .summary-icon {
      width: 32px; height: 32px;
      background: #e8f1fd;
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      font-size: 14px;
    }
    .summary-key {
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #64748b;
      margin-bottom: 3px;
    }
    .summary-val {
      font-size: 14px;
      font-weight: 600;
      color: #1e293b;
      word-break: break-word;
    }

    /* ── Services tags ── */
    .services-wrap { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 4px; }
    .service-tag {
      display: inline-block;
      background: #1a73e8;
      color: #ffffff;
      font-size: 11px;
      font-weight: 700;
      padding: 3px 10px;
      border-radius: 20px;
    }

    /* ── Promise block ── */
    .promise-block {
      background: linear-gradient(135deg, #0d1b3e, #1a3a6e);
      border-radius: 12px;
      padding: 24px 28px;
      margin-bottom: 28px;
      text-align: center;
    }
    .promise-title {
      font-size: 17px;
      font-weight: 900;
      color: #ffffff;
      margin-bottom: 8px;
    }
    .promise-title span { color: #1a73e8; }
    .promise-sub {
      font-size: 13px;
      color: #aac4e0;
      line-height: 1.6;
    }
    .promise-time-badge {
      display: inline-block;
      background: rgba(33,150,243,0.2);
      border: 1px solid rgba(33,150,243,0.4);
      border-radius: 20px;
      padding: 5px 18px;
      font-size: 12px;
      font-weight: 700;
      color: #7ec8f7;
      margin-top: 14px;
    }

    /* ── Useful links ── */
    .links-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-bottom: 28px;
    }
    .link-card {
      background: #f8fafd;
      border: 1.5px solid #e2ecf8;
      border-radius: 10px;
      padding: 16px 18px;
      text-align: center;
      text-decoration: none;
      transition: border-color .2s;
      display: block;
    }
    .link-card:hover { border-color: #1a73e8; }
    .link-card-icon { font-size: 22px; margin-bottom: 6px; }
    .link-card-label {
      font-size: 12px;
      font-weight: 700;
      color: #1e293b;
      display: block;
      margin-bottom: 3px;
    }
    .link-card-sub { font-size: 11px; color: #64748b; }

    /* ── CTA ── */
    .cta-wrap { text-align: center; margin-bottom: 28px; }
    .cta-btn {
      display: inline-block;
      background: linear-gradient(135deg, #1a73e8, #1558b0);
      color: #ffffff !important;
      font-size: 14px;
      font-weight: 700;
      padding: 14px 36px;
      border-radius: 9px;
      text-decoration: none;
      letter-spacing: 0.3px;
    }

    /* ── Closing ── */
    .closing-text {
      font-size: 14px;
      color: #475569;
      line-height: 1.7;
      margin-bottom: 20px;
    }
    .sign-off {
      font-size: 14px;
      color: #1e293b;
      font-weight: 600;
    }
    .sign-off-company {
      font-size: 13px;
      color: #64748b;
      margin-top: 2px;
    }

    /* ── Divider ── */
    .divider { border: none; border-top: 1px solid #e8edf5; margin: 24px 0; }

    /* ── Footer ── */
    .email-footer {
      background: #0d1b3e;
      padding: 28px 40px;
      text-align: center;
    }
    .footer-logo {
      font-size: 18px; font-weight: 900;
      color: #ffffff; margin-bottom: 10px;
    }
    .footer-logo span { color: #1a73e8; }
    .footer-links { margin-bottom: 14px; }
    .footer-links a {
      color: #aac4e0; font-size: 12px;
      text-decoration: none; margin: 0 8px;
    }
    .footer-social { display: flex; justify-content: center; gap: 10px; margin-bottom: 16px; }
    .social-circle {
      width: 34px; height: 34px;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 14px;
      text-decoration: none;
    }
    .s-linkedin  { background: #0077b5; color: #fff !important; }
    .s-twitter   { background: #1da1f2; color: #fff !important; }
    .s-facebook  { background: #1877f2; color: #fff !important; }
    .footer-note {
      font-size: 11px; color: #4a6080; line-height: 1.6;
    }

    /* ── Responsive ── */
    @media (max-width: 600px) {
      .email-header { padding: 28px 20px 24px; }
      .next-strip { padding: 16px 20px; }
      .email-body, .email-footer { padding: 24px 20px; }
      .header-title { font-size: 20px; }
      .steps-row { flex-direction: column; gap: 10px; }
      .step::after { display: none; }
      .links-grid { grid-template-columns: 1fr; }
      .promise-block { padding: 20px 18px; }
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-container">

      <!-- HEADER -->
      <div class="email-header">
        <div class="success-icon-wrap">
          <span>&#x2714;</span>
        </div>
        <div class="header-title">
          Thanks for reaching out,<br>{{ $contact->full_name }}!
        </div>
        <div class="header-sub">
          We've received your message and our team will get back to you at
          <strong>{{ $contact->email }}</strong> shortly.
        </div>
      </div>

      <!-- WHAT HAPPENS NEXT -->
      <div class="next-strip">
        <div class="next-strip-title">What happens next</div>
        <div class="steps-row">
          <div class="step">
            <div class="step-num">1</div>
            <div class="step-text">Your message is reviewed by our team</div>
          </div>
          <div class="step">
            <div class="step-num">2</div>
            <div class="step-text">We prepare a tailored response</div>
          </div>
          <div class="step">
            <div class="step-num">3</div>
            <div class="step-text">You hear back within 24 hours</div>
          </div>
          <div class="step">
            <div class="step-num">4</div>
            <div class="step-text">We schedule a free consultation</div>
          </div>
        </div>
      </div>

      <!-- BODY -->
      <div class="email-body">

        <p class="greeting">
          Hi <strong>{{ $contact->full_name }}</strong>,<br><br>
          Thank you for taking the time to contact us. We're excited to learn more about
          your project and explore how we can help you build something great.
          A member of our team will review your enquiry and respond personally — no bots, no templates.
        </p>

        <!-- Summary -->
        <div class="section-label">Your Submission Summary</div>
        <div class="summary-card">
          <div class="summary-card-header">
            <div class="summary-card-header-text">&#x1F4CB; Reference #{{ $contact->id }} &mdash; {{ $contact->created_at->format('d M Y') }}</div>
          </div>

          <div class="summary-row">
            <div class="summary-icon">&#x1F4CB;</div>
            <div>
              <div class="summary-key">Subject</div>
              <div class="summary-val">{{ $contact->subject }}</div>
            </div>
          </div>

          @if($contact->budget)
          <div class="summary-row">
            <div class="summary-icon">&#x1F4B0;</div>
            <div>
              <div class="summary-key">Estimated Budget</div>
              <div class="summary-val">{{ $contact->budget }}</div>
            </div>
          </div>
          @endif

          @if(!empty($contact->services))
          <div class="summary-row">
            <div class="summary-icon">&#x2699;</div>
            <div>
              <div class="summary-key">Services of Interest</div>
              <div class="summary-val">
                <div class="services-wrap">
                  @foreach($contact->services as $service)
                    <span class="service-tag">{{ $service }}</span>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif

          <div class="summary-row">
            <div class="summary-icon">&#x1F4AC;</div>
            <div>
              <div class="summary-key">Your Message</div>
              <div class="summary-val" style="white-space:pre-wrap;">{{ Str::limit($contact->message, 200) }}</div>
            </div>
          </div>
        </div>

        <!-- Promise -->
        <div class="promise-block">
          <div class="promise-title">Our Promise to You <span>&#x1F91D;</span></div>
          <div class="promise-sub">
            Every enquiry is personally reviewed by our team.<br>
            No automated responses. No runaround. Just honest, helpful answers.
          </div>
          <div class="promise-time-badge">&#x23F1; Response within 24 business hours</div>
        </div>

        <!-- Useful Links -->
        <div class="section-label">While You Wait</div>
        <div class="links-grid">
          <a href="{{ config('app.url') }}/portfolio" class="link-card">
            <div class="link-card-icon">&#x1F5C2;</div>
            <span class="link-card-label">Our Portfolio</span>
            <span class="link-card-sub">See what we've built</span>
          </a>
          <a href="{{ config('app.url') }}/services" class="link-card">
            <div class="link-card-icon">&#x2699;</div>
            <span class="link-card-label">Our Services</span>
            <span class="link-card-sub">Explore what we offer</span>
          </a>
          <a href="{{ config('app.url') }}/blog" class="link-card">
            <div class="link-card-icon">&#x1F4DD;</div>
            <span class="link-card-label">Blog & Insights</span>
            <span class="link-card-sub">Stay ahead of the curve</span>
          </a>
          <a href="{{ config('app.url') }}/about" class="link-card">
            <div class="link-card-icon">&#x1F465;</div>
            <span class="link-card-label">Meet the Team</span>
            <span class="link-card-sub">The people behind the work</span>
          </a>
        </div>

        <!-- CTA -->
        <div class="cta-wrap">
          <a href="{{ config('app.url') }}" class="cta-btn">&#x1F310; Visit Our Website</a>
        </div>

        <hr class="divider">

        <p class="closing-text">
          If you have any urgent questions in the meantime, don't hesitate to reach out
          directly at <a href="mailto:{{ config('mail.admin_email') }}">{{ config('mail.admin_email') }}</a>.
          We're always happy to help.
        </p>
        <div class="sign-off">Warm regards,</div>
        <div class="sign-off">The {{ config('app.name') }} Team</div>
        <div class="sign-off-company">{{ config('app.url') }}</div>

      </div>{{-- /email-body --}}

      <!-- FOOTER -->
      <div class="email-footer">
        <div class="footer-logo">
          {{ config('app.name') }}<span>.</span>
        </div>
        <div class="footer-social">
          <a href="#" class="social-circle s-linkedin" title="LinkedIn">in</a>
          <a href="#" class="social-circle s-twitter" title="Twitter">&#x1D54F;</a>
          <a href="#" class="social-circle s-facebook" title="Facebook">f</a>
        </div>
        <div class="footer-links">
          <a href="{{ config('app.url') }}">Home</a>
          <a href="{{ config('app.url') }}/services">Services</a>
          <a href="{{ config('app.url') }}/portfolio">Portfolio</a>
          <a href="{{ config('app.url') }}/contact">Contact</a>
        </div>
        <div class="footer-note">
          &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
          You received this email because you submitted the contact form on our website.<br>
          123 Tech Avenue, Suite 400, New York, NY 10001
        </div>
      </div>

    </div>{{-- /email-container --}}
  </div>{{-- /email-wrapper --}}
</body>
</html>