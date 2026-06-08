{{-- resources/views/email/quote_admin_mail.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Quote Request</title>
  <style>
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
    body,html{margin:0;padding:0;width:100%!important;-webkit-text-size-adjust:100%;}
    body{font-family:'Segoe UI',Arial,sans-serif;background:#f0f4f8;color:#1e293b;}
    a{text-decoration:none;}
    img{border:0;display:block;}

    .wrap{width:100%;background:#f0f4f8;padding:32px 16px;}
    .card{max-width:620px;margin:0 auto;background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.09);}

    /* Header */
    .hd{background:linear-gradient(135deg,#0d1b3e 0%,#1a3a6e 100%);padding:36px 40px 30px;position:relative;overflow:hidden;}
    .hd::before{content:'';position:absolute;top:-60px;right:-60px;width:200px;height:200px;background:rgba(26,115,232,.12);border-radius:50%;}
    .hd::after{content:'';position:absolute;bottom:-40px;left:-40px;width:140px;height:140px;background:rgba(26,115,232,.08);border-radius:50%;}
    .logo-row{display:flex;align-items:center;gap:9px;margin-bottom:20px;position:relative;z-index:1;}
    .logo-box{width:36px;height:36px;background:linear-gradient(135deg,#1a73e8,#0d5cbf);border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0;}
    .logo-name{font-size:14px;font-weight:800;color:#fff;letter-spacing:2px;text-transform:uppercase;}
    .logo-name span{color:#1a73e8;}
    .badge{display:inline-flex;align-items:center;gap:7px;background:rgba(26,115,232,.18);border:1px solid rgba(26,115,232,.35);border-radius:20px;padding:5px 14px;font-size:11px;font-weight:700;color:#7ec8f7;letter-spacing:1px;text-transform:uppercase;margin-bottom:14px;position:relative;z-index:1;}
    .badge-dot{width:7px;height:7px;background:#1a73e8;border-radius:50%;}
    .hd-title{font-size:22px;font-weight:900;color:#fff;margin-bottom:6px;position:relative;z-index:1;}
    .hd-sub{font-size:13px;color:#aac4e0;position:relative;z-index:1;}

    /* Alert bar */
    .alert-bar{background:#e8f4fd;border-left:4px solid #1a73e8;padding:13px 40px;font-size:13px;color:#1a3a6e;font-weight:600;}

    /* Body */
    .body{padding:32px 40px;}
    .sec-label{font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;color:#1a73e8;padding-bottom:9px;border-bottom:2px solid #e8f1fd;margin-bottom:16px;}

    /* Info grid */
    .grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:24px;}
    .cell{background:#f8fafd;border:1px solid #e2ecf8;border-radius:10px;padding:13px 15px;}
    .cell.full{grid-column:1/-1;}
    .cell-label{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:#64748b;margin-bottom:4px;}
    .cell-val{font-size:14px;font-weight:600;color:#1e293b;word-break:break-word;}
    .cell-val a{color:#1a73e8;}

    /* Service tags */
    .tags{display:flex;flex-wrap:wrap;gap:6px;margin-top:4px;}
    .tag{display:inline-block;background:#1a73e8;color:#fff;font-size:11px;font-weight:700;padding:3px 11px;border-radius:20px;}
    .no-tag{color:#94a3b8;font-size:13px;}

    /* Message box */
    .msg-box{background:#f8fafd;border:1px solid #e2ecf8;border-radius:10px;padding:16px 18px;margin-bottom:26px;}
    .msg-text{font-size:14px;color:#334155;line-height:1.75;white-space:pre-wrap;word-break:break-word;}

    /* Meta */
    .meta{background:#f8fafd;border:1px solid #e2ecf8;border-radius:10px;padding:13px 18px;display:flex;flex-wrap:wrap;gap:14px;margin-bottom:26px;}
    .meta-item{font-size:12px;color:#64748b;}
    .meta-item strong{color:#1e293b;}

    /* CTA */
    .cta{text-align:center;margin-bottom:26px;}
    .cta-btn{display:inline-block;background:linear-gradient(135deg,#1a73e8,#1558b0);color:#fff!important;font-size:14px;font-weight:700;padding:13px 34px;border-radius:9px;text-decoration:none;}
    .cta-out{display:inline-block;background:transparent;color:#1a73e8!important;font-size:13px;font-weight:600;padding:9px 22px;border-radius:9px;border:1.5px solid #1a73e8;text-decoration:none;margin-top:10px;}

    .divider{border:none;border-top:1px solid #e8edf5;margin:22px 0;}

    /* Footer */
    .ft{background:#0d1b3e;padding:26px 40px;text-align:center;}
    .ft-brand{font-size:15px;font-weight:900;color:#fff;margin-bottom:8px;}
    .ft-brand span{color:#1a73e8;}
    .ft-links a{color:#4a6080;font-size:11px;text-decoration:none;margin:0 7px;}
    .ft-note{font-size:11px;color:#4a6080;margin-top:12px;line-height:1.6;}

    @media(max-width:600px){
      .hd,.body,.ft{padding-left:20px;padding-right:20px;}
      .alert-bar{padding-left:20px;padding-right:20px;}
      .grid{grid-template-columns:1fr;}
      .cell.full{grid-column:1;}
      .hd-title{font-size:18px;}
      .meta{flex-direction:column;gap:8px;}
    }
  </style>
</head>
<body>
<div class="wrap">
<div class="card">

  {{-- Header --}}
  <div class="hd">
    <div class="logo-row">
      <div class="logo-box">&#x1F6E1;</div>
      <div>
        <div class="logo-name">Kawach<span>.</span>Tech</div>
      </div>
    </div>
    <div class="badge"><span class="badge-dot"></span> New Quote Request</div>
    <div class="hd-title">New Quote Request Received</div>
    <div class="hd-sub">Submitted {{ $quote->created_at->format('D, d M Y \a\t H:i') }} UTC</div>
  </div>

  {{-- Alert --}}
  <div class="alert-bar">
    &#x2709; <strong>{{ $quote->full_name }}</strong> has submitted a quote request and is waiting for your response.
  </div>

  {{-- Body --}}
  <div class="body">

    <div class="sec-label">Sender Details</div>
    <div class="grid">
      <div class="cell">
        <div class="cell-label">Full Name</div>
        <div class="cell-val">{{ $quote->full_name }}</div>
      </div>
      <div class="cell">
        <div class="cell-label">Company</div>
        <div class="cell-val">{{ $quote->company ?: '—' }}</div>
      </div>
      <div class="cell">
        <div class="cell-label">Email</div>
        <div class="cell-val"><a href="mailto:{{ $quote->email }}">{{ $quote->email }}</a></div>
      </div>
      <div class="cell">
        <div class="cell-label">Phone</div>
        <div class="cell-val">{{ $quote->phone ?: '—' }}</div>
      </div>
    </div>

    <div class="sec-label">Project Details</div>
    <div class="grid">
      <div class="cell">
        <div class="cell-label">Estimated Budget</div>
        <div class="cell-val">{{ $quote->budget ?: 'Not specified' }}</div>
      </div>
      <div class="cell full">
        <div class="cell-label">Services Requested</div>
        <div class="cell-val">
          @if($quote->services)
            <div class="tags">
              @foreach(explode(', ', $quote->services) as $svc)
                <span class="tag">{{ trim($svc) }}</span>
              @endforeach
            </div>
          @else
            <span class="no-tag">None selected</span>
          @endif
        </div>
      </div>
    </div>

    <div class="sec-label">Project Description</div>
    <div class="msg-box">
      <div class="msg-text">{{ $quote->description }}</div>
    </div>

    <div class="meta">
      <div class="meta-item"><strong>Quote ID:</strong> #{{ $quote->id }}</div>
      <div class="meta-item"><strong>Submitted:</strong> {{ $quote->created_at->diffForHumans() }}</div>
      <div class="meta-item"><strong>IP:</strong> {{ $quote->ip_address ?? '—' }}</div>
    </div>

    <div class="cta">
      <a href="{{ config('app.url') }}/admin/quotes/{{ $quote->id }}" class="cta-btn">
        &#x1F4CB; View in Admin Panel
      </a>
      <br>
      <a href="mailto:{{ $quote->email }}?subject=Re: Your Quote Request — {{ config('app.name') }}" class="cta-out">
        &#x21A9; Reply Directly
      </a>
    </div>

    <hr class="divider">
    <p style="font-size:12px;color:#94a3b8;text-align:center;">
      This is an automated notification. Do not reply to this email.
    </p>

  </div>

  {{-- Footer --}}
  <div class="ft">
    <div class="ft-brand">Kawach<span>.</span>Tech</div>
    <div class="ft-links">
      <a href="{{ config('app.url') }}">Website</a>
      <a href="{{ config('app.url') }}/admin">Admin</a>
      <a href="mailto:{{ config('mail.admin_email') }}">Contact</a>
    </div>
    <div class="ft-note">
      &copy; {{ date('Y') }} Kawach Technology Private Limited. All rights reserved.<br>
      This email was sent to {{ config('mail.admin_email') }} because you are an administrator.
    </div>
  </div>

</div>
</div>
</body>
</html>