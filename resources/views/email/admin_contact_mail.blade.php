{{-- resources/views/emails/admin/contact-notification.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>New Contact Submission</title>
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
      padding: 36px 40px 32px;
      position: relative;
      overflow: hidden;
    }
    .email-header::before {
      content: '';
      position: absolute;
      top: -60px; right: -60px;
      width: 200px; height: 200px;
      background: rgba(33,150,243,0.12);
      border-radius: 50%;
    }
    .email-header::after {
      content: '';
      position: absolute;
      bottom: -40px; left: -40px;
      width: 140px; height: 140px;
      background: rgba(33,150,243,0.08);
      border-radius: 50%;
    }
    .header-badge {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: rgba(33,150,243,0.18);
      border: 1px solid rgba(33,150,243,0.35);
      border-radius: 20px;
      padding: 5px 14px;
      font-size: 11px;
      font-weight: 700;
      color: #7ec8f7;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 16px;
      position: relative;
      z-index: 1;
    }
    .header-dot {
      width: 7px; height: 7px;
      background: #4caf50;
      border-radius: 50%;
      display: inline-block;
      animation: blink 1.8s infinite;
    }
    @keyframes blink { 0%,100%{opacity:1;} 50%{opacity:.4;} }
    .header-title {
      font-size: 22px;
      font-weight: 900;
      color: #ffffff;
      line-height: 1.25;
      margin-bottom: 6px;
      position: relative;
      z-index: 1;
    }
    .header-sub {
      font-size: 13px;
      color: #aac4e0;
      position: relative;
      z-index: 1;
    }

    /* ── Alert bar ── */
    .alert-bar {
      background: #e8f4fd;
      border-left: 4px solid #1a73e8;
      padding: 14px 40px;
      font-size: 13px;
      color: #1a3a6e;
      font-weight: 600;
    }
    .alert-bar i { margin-right: 6px; }

    /* ── Body ── */
    .email-body { padding: 32px 40px; }

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

    /* ── Info grid ── */
    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-bottom: 24px;
    }
    .info-cell {
      background: #f8fafd;
      border: 1px solid #e2ecf8;
      border-radius: 10px;
      padding: 14px 16px;
    }
    .info-cell.full-width {
      grid-column: 1 / -1;
    }
    .info-cell-label {
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: #64748b;
      margin-bottom: 5px;
    }
    .info-cell-value {
      font-size: 14px;
      font-weight: 600;
      color: #1e293b;
      word-break: break-word;
    }
    .info-cell-value a { color: #1a73e8; }

    /* ── Services tags ── */
    .services-wrap { display: flex; flex-wrap: wrap; gap: 7px; margin-top: 4px; }
    .service-tag {
      display: inline-block;
      background: #1a73e8;
      color: #ffffff;
      font-size: 11px;
      font-weight: 700;
      padding: 4px 12px;
      border-radius: 20px;
    }
    .service-tag-empty {
      color: #94a3b8;
      font-size: 13px;
    }

    /* ── Message box ── */
    .message-box {
      background: #f8fafd;
      border: 1px solid #e2ecf8;
      border-radius: 10px;
      padding: 18px 20px;
      margin-bottom: 28px;
    }
    .message-text {
      font-size: 14px;
      color: #334155;
      line-height: 1.75;
      white-space: pre-wrap;
      word-break: break-word;
    }

    /* ── CTA button ── */
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
    .cta-btn-outline {
      display: inline-block;
      background: transparent;
      color: #1a73e8 !important;
      font-size: 13px;
      font-weight: 600;
      padding: 10px 24px;
      border-radius: 9px;
      border: 1.5px solid #1a73e8;
      text-decoration: none;
      margin-top: 10px;
    }

    /* ── Meta row ── */
    .meta-row {
      background: #f8fafd;
      border: 1px solid #e2ecf8;
      border-radius: 10px;
      padding: 14px 18px;
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 28px;
    }
    .meta-item { font-size: 12px; color: #64748b; }
    .meta-item strong { color: #1e293b; }

    /* ── Divider ── */
    .divider { border: none; border-top: 1px solid #e8edf5; margin: 24px 0; }

    /* ── Footer ── */
    .email-footer {
      background: #0d1b3e;
      padding: 28px 40px;
      text-align: center;
    }
    .footer-logo {
      font-size: 18px;
      font-weight: 900;
      color: #ffffff;
      margin-bottom: 8px;
    }
    .footer-logo span { color: #1a73e8; }
    .footer-links { margin-bottom: 14px; }
    .footer-links a {
      color: #aac4e0;
      font-size: 12px;
      text-decoration: none;
      margin: 0 8px;
    }
    .footer-links a:hover { color: #ffffff; }
    .footer-note {
      font-size: 11px;
      color: #64748b;
      line-height: 1.6;
    }

    /* ── Responsive ── */
    @media (max-width: 600px) {
      .email-header, .email-body, .email-footer { padding: 24px 20px; }
      .alert-bar { padding: 12px 20px; }
      .info-grid { grid-template-columns: 1fr; }
      .info-cell.full-width { grid-column: 1; }
      .header-title { font-size: 18px; }
      .cta-btn { padding: 12px 24px; font-size: 13px; }
      .meta-row { flex-direction: column; gap: 8px; }
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-container">

      <!-- HEADER -->
      <div class="email-header">
        <div class="header-badge">
          <span class="header-dot"></span> New Submission
        </div>
        <div class="header-title">New Contact Form Submission</div>
        <div class="header-sub">
          Received {{ $contact->created_at->format('D, d M Y \a\t H:i') }} UTC
        </div>
      </div>

      <!-- ALERT BAR -->
      <div class="alert-bar">
        &#x2709; A new message from <strong>{{ $contact->full_name }}</strong> is waiting for your review.
      </div>

      <!-- BODY -->
      <div class="email-body">

        <!-- Sender Details -->
        <div class="section-label">Sender Details</div>
        <div class="info-grid">
          <div class="info-cell">
            <div class="info-cell-label">Full Name</div>
            <div class="info-cell-value">{{ $contact->full_name }}</div>
          </div>
          <div class="info-cell">
            <div class="info-cell-label">Company</div>
            <div class="info-cell-value">{{ $contact->company ?: '—' }}</div>
          </div>
          <div class="info-cell">
            <div class="info-cell-label">Email Address</div>
            <div class="info-cell-value">
              <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            </div>
          </div>
          <div class="info-cell">
            <div class="info-cell-label">Phone</div>
            <div class="info-cell-value">{{ $contact->phone ?: '—' }}</div>
          </div>
        </div>

        <!-- Enquiry Details -->
        <div class="section-label">Enquiry Details</div>
        <div class="info-grid">
          <div class="info-cell">
            <div class="info-cell-label">Subject</div>
            <div class="info-cell-value">{{ $contact->subject }}</div>
          </div>
          <div class="info-cell">
            <div class="info-cell-label">Estimated Budget</div>
            <div class="info-cell-value">{{ $contact->budget ?: 'Not specified' }}</div>
          </div>
          <div class="info-cell full-width">
            <div class="info-cell-label">Services of Interest</div>
            <div class="info-cell-value">
              @if(!empty($contact->services))
                <div class="services-wrap">
                  @foreach($contact->services as $service)
                    <span class="service-tag">{{ $service }}</span>
                  @endforeach
                </div>
              @else
                <span class="service-tag-empty">None selected</span>
              @endif
            </div>
          </div>
        </div>

        <!-- Message -->
        <div class="section-label">Message</div>
        <div class="message-box">
          <div class="message-text">{{ $contact->message }}</div>
        </div>

        <!-- Submission meta -->
        <div class="meta-row">
          <div class="meta-item"><strong>Contact ID:</strong> #{{ $contact->id }}</div>
          <div class="meta-item"><strong>Status:</strong> {{ ucfirst($contact->status) }}</div>
          <div class="meta-item"><strong>Submitted:</strong> {{ $contact->created_at->diffForHumans() }}</div>
        </div>

        <!-- CTA -->
        <div class="cta-wrap">
          <a href="{{ config('app.url') }}/admin/contacts/{{ $contact->id }}"
             class="cta-btn">
            &#x1F4CB; View in Admin Panel
          </a>
          <br>
          <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject) }}"
             class="cta-btn-outline">
            &#x21A9; Reply Directly
          </a>
        </div>

        <hr class="divider">
        <p style="font-size:12px;color:#94a3b8;text-align:center;line-height:1.6;">
          This is an automated notification from {{ config('app.name') }}. Do not reply to this email.
        </p>

      </div>{{-- /email-body --}}

      <!-- FOOTER -->
      <div class="email-footer">
        <div class="footer-logo">
          {{ config('app.name') }}<span>.</span>
        </div>
        <div class="footer-links">
          <a href="{{ config('app.url') }}">Website</a>
          <a href="{{ config('app.url') }}/admin">Admin Panel</a>
          <a href="{{ config('app.url') }}/contact">Contact Page</a>
        </div>
        <div class="footer-note">
          &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
          This email was sent to {{ config('mail.admin_email') }} because you are an administrator.
        </div>
      </div>

    </div>{{-- /email-container --}}
  </div>{{-- /email-wrapper --}}
</body>
</html>