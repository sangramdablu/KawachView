{{-- ============================================================
     contact.blade.php  —  full fixed version
     Changes vs original:
       • <form method="POST" action="{{ route('contact.store') }}">
       • @csrf token added
       • All inputs have name="..." attributes
       • Service tags backed by hidden checkboxes
       • Submit button is type="submit" (no JS redirect)
       • Success flash message reads from session
       • @error() wired to each field
     ============================================================ --}}
<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
<style>
  /* ── hero animation styles (unchanged) ── */
  .hero-animation-wrapper {
    position: relative;
    min-height: 480px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  .hero-section {
    position: relative;
    overflow: hidden;
    background: #0f172a;
  }
  .hero-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('{{ asset("assets/images/Kawach_technology_contact_us_bg_image.png") }}') center center/cover no-repeat;
    z-index: 0;
  }
  .hero-section::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(15,23,42,0.42), rgba(30,41,59,0.32));
    z-index: 1;
  }
  .hero-bg-layer { position: absolute; inset: 0; z-index: 2; pointer-events: none; }
  .hero-section .container { position: relative; z-index: 3; }

  .central-icon { position: relative; z-index: 10; cursor: pointer; animation: float-main 4s ease-in-out infinite; }
  .central-icon-inner {
    width: 100px; height: 100px;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 20px 35px -10px rgba(99,102,241,0.4);
    transition: transform 0.3s ease;
  }
  .central-icon-inner i { font-size: 44px; color: white; }
  .central-icon:hover .central-icon-inner { transform: scale(1.05); }

  .pulse-ring {
    position: absolute; top: 50%; left: 50%;
    width: 100px; height: 100px; margin: -50px 0 0 -50px;
    border-radius: 50%;
    background: rgba(99,102,241,0.2);
    animation: pulse-ring 2s cubic-bezier(0.4,0,0.2,1) infinite;
    z-index: -1;
  }
  @keyframes pulse-ring { 0% { transform: scale(1); opacity: 0.6; } 100% { transform: scale(1.8); opacity: 0; } }

  .floating-shapes { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none; }
  .shape { position: absolute; background: linear-gradient(45deg,#6366f1,#a855f7); border-radius: 50%; opacity: 0.15; filter: blur(3px); animation: float-shape 12s infinite alternate ease-in-out; }
  .shape-1 { width: 80px; height: 80px; top: 10%; left: 5%; animation-duration: 14s; }
  .shape-2 { width: 50px; height: 50px; bottom: 15%; right: 10%; background: linear-gradient(45deg,#06b6d4,#3b82f6); opacity: 0.2; animation-duration: 11s; animation-delay: 1s; }
  .shape-3 { width: 120px; height: 120px; top: 60%; left: -20px; background: linear-gradient(45deg,#ec4899,#f43f5e); opacity: 0.1; animation-duration: 18s; animation-delay: 2s; }
  .shape-4 { width: 40px; height: 40px; top: 30%; right: 15%; background: linear-gradient(45deg,#f59e0b,#f97316); opacity: 0.2; animation-duration: 9s; animation-delay: 0.5s; }
  .shape-5 { width: 90px; height: 90px; bottom: 5%; left: 20%; background: linear-gradient(45deg,#10b981,#34d399); opacity: 0.12; animation-duration: 15s; animation-delay: 1.5s; }
  @keyframes float-shape { 0% { transform: translateY(0) translateX(0) rotate(0deg); } 100% { transform: translateY(-30px) translateX(20px) rotate(10deg); } }

  .message-bubble {
    position: absolute; background: white; padding: 10px 20px; border-radius: 100px;
    font-size: 14px; font-weight: 600; color: #1e293b;
    box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
    display: flex; align-items: center; gap: 8px; white-space: nowrap;
    z-index: 12; border: 1px solid rgba(99,102,241,0.2); opacity: 0;
  }
  .message-bubble i { color: #6366f1; font-size: 14px; }
  .message-bubble-1 { top: 15%; right: 5%; animation: float-bubble 5s ease-in-out infinite, slideInFade 0.6s 0.3s ease-out forwards; }
  .message-bubble-2 { bottom: 20%; left: 0; animation: float-bubble-reverse 4.5s ease-in-out infinite, slideInFade 0.6s 0.6s ease-out forwards; }
  .message-bubble-3 { top: 45%; left: 8%; animation: float-bubble 6s ease-in-out infinite, slideInFade 0.6s 0.9s ease-out forwards; }
  @keyframes slideInFade { 0% { opacity: 0; transform: translateY(20px) scale(0.9); } 100% { opacity: 1; transform: translateY(0) scale(1); } }
  @keyframes float-bubble { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
  @keyframes float-bubble-reverse { 0%,100% { transform: translateY(0); } 50% { transform: translateY(8px); } }
  @keyframes float-main { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }

  .connection-lines { position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; z-index: 5; pointer-events: none; }
  .connection-lines svg { width: 100%; max-width: 380px; height: auto; }
  .orbit-circle { stroke-dasharray: 8 10; animation: rotate-orbit 20s linear infinite; transform-origin: center; }
  .orbit-circle-2 { stroke-dasharray: 5 12; animation: rotate-orbit-reverse 16s linear infinite; transform-origin: center; }
  @keyframes rotate-orbit { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
  @keyframes rotate-orbit-reverse { from { transform: rotate(360deg); } to { transform: rotate(0deg); } }

  /* ── Service tag toggle (backed by hidden checkboxes) ── */
  .tag-checkbox { display: none; }
  .tag {
    display: inline-flex; align-items: center;
    padding: 6px 14px;
    border: 1.5px solid var(--border-light, #e2e8f0);
    border-radius: 20px;
    font-size: 0.77rem; font-weight: 600;
    color: var(--text-muted, #64748b);
    cursor: pointer;
    transition: all .2s;
    background: #fafbfd;
    user-select: none;
    margin: 0;
  }
  .tag:hover { border-color: var(--primary-blue, #1a73e8); color: var(--primary-blue, #1a73e8); background: #edf4fe; }
  .tag-checkbox:checked + .tag {
    border-color: var(--primary-blue, #1a73e8);
    color: #fff;
    background: var(--primary-blue, #1a73e8);
  }

  /* ── Validation error styles ── */
  .invalid-feedback { display: block; }
  .is-invalid { border-color: #dc3545 !important; }

  @media (max-width: 992px) {
    .hero-animation-wrapper { min-height: 400px; margin-top: 3rem; }
    .message-bubble { font-size: 12px; padding: 6px 14px; }
    .central-icon-inner { width: 80px; height: 80px; }
    .central-icon-inner i { font-size: 34px; }
    .pulse-ring { width: 80px; height: 80px; margin: -40px 0 0 -40px; }
  }
  @media (max-width: 576px) {
    .message-bubble { white-space: nowrap; transform: scale(0.9); }
    .hero-animation-wrapper { min-height: 360px; }
  }
</style>
<body>

@include('layouts.navbar')

<!-- HERO BANNER -->
<section class="hero-section">
  <div class="hero-bg-layer">
    <div class="code-line cl-1"></div><div class="code-line cl-2"></div><div class="code-line cl-3"></div>
    <div class="code-line cl-4"></div><div class="code-line cl-5"></div><div class="code-line cl-6"></div>
    <div class="code-line cl-7"></div><div class="code-line cl-8"></div><div class="code-line cl-9"></div>
    <div class="code-line cl-10"></div><div class="code-line cl-11"></div><div class="code-line cl-12"></div>
    <div class="code-line cl-13"></div><div class="code-line cl-14"></div><div class="code-line cl-15"></div>
    <div class="circuit-node cn-1"></div><div class="circuit-node cn-2"></div><div class="circuit-node cn-3"></div>
    <div class="circuit-node cn-4"></div><div class="circuit-node cn-5"></div><div class="circuit-node cn-6"></div>
    <div class="circuit-node cn-7"></div><div class="circuit-node cn-8"></div><div class="circuit-node cn-9"></div><div class="circuit-node cn-10"></div>
    <div class="data-packet dp-blue dp-1"></div><div class="data-packet dp-green dp-2"></div>
    <div class="data-packet dp-white dp-3"></div><div class="data-packet dp-blue dp-4"></div>
    <div class="data-packet dp-green dp-5"></div><div class="data-packet dp-white dp-6"></div>
    <div class="data-packet dp-blue dp-7"></div><div class="data-packet dp-green dp-8"></div>
    <div class="binary-col bc-1">1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-2">0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-3">1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-4">0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-5">1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0</div>
    <div class="binary-col bc-6">0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1</div>
    <div class="hero-scan-line"></div>
  </div>

  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="hero-badge"><i class="fas fa-circle"></i> We're Online & Ready</div>
        <h1 class="contact-hero-title">Let's Build Something<br><span>Great Together</span></h1>
        <p class="contact-hero-sub">Whether you have a project in mind, a question about our services, or just want to say hello — our team is here and ready to help.</p>
        <div class="hero-stats">
          <div class="hero-stat">
            <div class="hero-stat-icon"><i class="fas fa-clock"></i></div>
            <div><div class="hero-stat-value">&lt; 24h</div><div class="hero-stat-label">Response Time</div></div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-icon"><i class="fas fa-star"></i></div>
            <div><div class="hero-stat-value">4.9 / 5</div><div class="hero-stat-label">Client Rating</div></div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-icon"><i class="fas fa-handshake"></i></div>
            <div><div class="hero-stat-value">200+</div><div class="hero-stat-label">Happy Clients</div></div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="hero-animation-wrapper">
          <div class="floating-shapes">
            <div class="shape shape-1"></div><div class="shape shape-2"></div>
            <div class="shape shape-3"></div><div class="shape shape-4"></div><div class="shape shape-5"></div>
          </div>
          <div class="message-bubble message-bubble-1"><i class="fas fa-comment-dots"></i> Got a project?</div>
          <div class="message-bubble message-bubble-2"><i class="fas fa-rocket"></i> Let's launch!</div>
          <div class="message-bubble message-bubble-3"><i class="fas fa-headset"></i> 24/7 support</div>
          <div class="central-icon">
            <div class="pulse-ring"></div>
            <div class="central-icon-inner"><i class="fas fa-envelope-open-text"></i></div>
          </div>
          <div class="connection-lines">
            <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
              <circle class="orbit-circle" cx="200" cy="200" r="140" fill="none" stroke="url(#gradient)" stroke-width="1.5"/>
              <circle class="orbit-circle-2" cx="200" cy="200" r="100" fill="none" stroke="url(#gradient2)" stroke-width="1"/>
              <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                  <stop offset="0%" stop-color="#6366f1"/><stop offset="100%" stop-color="#8b5cf6"/>
                </linearGradient>
                <linearGradient id="gradient2" x1="100%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" stop-color="#06b6d4"/><stop offset="100%" stop-color="#3b82f6"/>
                </linearGradient>
              </defs>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BREADCRUMB -->
<div class="breadcrumb-wrap">
  <div class="container">
    <nav><ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active">Contact Us</li>
    </ol></nav>
  </div>
</div>

<!-- MAIN CONTENT -->
<section class="contact-main">
  <div class="container">
    <div class="row g-4">

      <!-- LEFT: Contact Form -->
      <div class="col-lg-7 animate">
        <div class="contact-card">
          <div class="contact-card-header">
            <div class="card-header-icon"><i class="fas fa-paper-plane"></i></div>
            <div class="card-header-title">Send Us a Message</div>
            <div class="card-header-sub">Fill in the form and we'll be in touch within 24 hours.</div>
          </div>
          <div class="contact-form-body">

            {{-- ── SUCCESS STATE (shown after redirect with session flash) ── --}}
            @if(session('success'))
              <div class="form-success" style="display:block;">
                <div class="success-ring"><i class="fas fa-check"></i></div>
                <h4>Message Sent Successfully!</h4>
                <p>{{ session('success') }}</p>
                <a href="{{ route('contact') }}" class="btn-back">
                  <i class="fas fa-arrow-left"></i> Send Another Message
                </a>
              </div>
            @else

            {{-- ── CONTACT FORM ── --}}
            <form id="contactForm"
                  method="POST"
                  action="{{ route('contact.store') }}"
                  novalidate>
              @csrf

              {{-- Honeypot — hidden from real users, filled by bots --}}
              <div style="display:none;" aria-hidden="true">
                <input type="text" name="website" tabindex="-1" autocomplete="off">
              </div>

              <div id="formWrap">
                <div class="row g-3">

                  {{-- Full Name --}}
                  <div class="col-md-6">
                    <label class="form-label" for="full_name">Full Name *</label>
                    <input type="text"
                           id="full_name"
                           name="full_name"
                           class="form-control @error('full_name') is-invalid @enderror"
                           placeholder="John Smith"
                           value="{{ old('full_name') }}"
                           maxlength="100">
                    @error('full_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Company --}}
                  <div class="col-md-6">
                    <label class="form-label" for="company">Company</label>
                    <input type="text"
                           id="company"
                           name="company"
                           class="form-control @error('company') is-invalid @enderror"
                           placeholder="Acme Corp"
                           value="{{ old('company') }}"
                           maxlength="100">
                    @error('company')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Email --}}
                  <div class="col-md-6">
                    <label class="form-label" for="email">Email Address *</label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="john@acmecorp.com"
                           value="{{ old('email') }}"
                           maxlength="254">
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Phone --}}
                  <div class="col-md-6">
                    <label class="form-label" for="phone">Phone</label>
                    <input type="tel"
                           id="phone"
                           name="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           placeholder="+1 234 567 8900"
                           value="{{ old('phone') }}"
                           maxlength="30">
                    @error('phone')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Subject --}}
                  <div class="col-12">
                    <label class="form-label" for="subject">Subject *</label>
                    <select id="subject"
                            name="subject"
                            class="form-select @error('subject') is-invalid @enderror">
                      <option value="">What can we help you with?</option>
                      @foreach([
                        'New Project / MVP',
                        'Web & Mobile Development',
                        'AI & Machine Learning',
                        'Cloud & DevOps',
                        'Custom Software',
                        'Pricing & Packages',
                        'Partnership Opportunity',
                        'General Inquiry',
                      ] as $subject)
                        <option value="{{ $subject }}" {{ old('subject') === $subject ? 'selected' : '' }}>
                          {{ $subject }}
                        </option>
                      @endforeach
                    </select>
                    @error('subject')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Services of Interest — each tag is a real checkbox --}}
                  <div class="col-12">
                    <label class="form-label">Services of Interest</label>
                    @error('services')
                      <div class="invalid-feedback d-block mb-1">{{ $message }}</div>
                    @enderror
                    <div class="tag-group">
                      @foreach([
                        'Web & Mobile',
                        'AI / Automation',
                        'Cloud & DevOps',
                        'Custom Software',
                        'SaaS Product',
                        'UI/UX Design',
                      ] as $service)
                        @php $sid = 'svc_' . Str::slug($service); @endphp
                        <input type="checkbox"
                               class="tag-checkbox"
                               id="{{ $sid }}"
                               name="services[]"
                               value="{{ $service }}"
                               {{ in_array($service, old('services', [])) ? 'checked' : '' }}>
                        <label class="tag" for="{{ $sid }}">{{ $service }}</label>
                      @endforeach
                    </div>
                  </div>

                  {{-- Budget --}}
                  <div class="col-12">
                    <label class="form-label">Estimated Budget</label>
                    <div class="budget-group">
                      @foreach(['<10k' => '&lt; $10k', '10-50k' => '$10k – $50k', '50-100k' => '$50k – $100k', '>100k' => '&gt; $100k'] as $val => $label)
                        <div class="budget-pill">
                          <input type="radio"
                                 name="budget"
                                 id="b_{{ $loop->index }}"
                                 value="{{ $val }}"
                                 {{ old('budget', '10-50k') === $val ? 'checked' : '' }}>
                          <label for="b_{{ $loop->index }}">{!! $label !!}</label>
                        </div>
                      @endforeach
                    </div>
                  </div>

                  {{-- Message --}}
                  <div class="col-12">
                    <label class="form-label" for="message">Message *</label>
                    <textarea id="message"
                              name="message"
                              class="form-control @error('message') is-invalid @enderror"
                              rows="4"
                              placeholder="Tell us about your project, goals, or any questions you have..."
                              maxlength="3000">{{ old('message') }}</textarea>
                    @error('message')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  {{-- Submit --}}
                  <div class="col-12" style="margin-top:6px;">
                    <button type="submit" class="btn-submit" id="submitBtn">
                      <span id="btnText">Send Message <i class="fas fa-arrow-right"></i></span>
                      <span id="btnLoading" style="display:none;">
                        <i class="fas fa-spinner fa-spin"></i> Sending…
                      </span>
                    </button>
                    <p class="form-note">
                      <i class="fas fa-lock"></i> Your information is secure and never shared with third parties.
                    </p>
                  </div>

                </div>{{-- /row --}}
              </div>{{-- /formWrap --}}
            </form>

            @endif {{-- /session success --}}

          </div>
        </div>
      </div>

      <!-- RIGHT: Contact Info + Map + Hours -->
      <div class="col-lg-5">
        @include('sections.contactinfocard')

        <!-- Map Card -->
        {{-- <div class="map-card animate delay-2">
          <div class="map-embed">
            <div class="map-road-h" style="top:33%;"></div>
            <div class="map-road-h" style="top:60%;"></div>
            <div class="map-road-h" style="top:80%;"></div>
            <div class="map-road-v" style="left:25%;"></div>
            <div class="map-road-v" style="left:55%;"></div>
            <div class="map-road-v" style="left:75%;"></div>
            <div class="map-pin">
              <div class="map-pin-dot"></div>
              <div class="map-pin-label"><i class="fas fa-building" style="margin-right:5px;"></i>InnovateTech HQ</div>
            </div>
          </div>
          <div class="map-card-footer">
            <div class="map-address">
              <strong>123 Tech Avenue, Suite 400</strong>
              New York, NY 10001
            </div>
            <a href="https://maps.google.com" target="_blank" rel="noopener" class="btn-directions">
              <i class="fas fa-directions"></i> Directions
            </a>
          </div>
        </div> --}}

        <!-- Office Hours Card -->
        <div class="info-card animate delay-3">
          <div class="info-card-header">
            <div class="info-card-title"><i class="fas fa-clock" style="margin-right:8px;color:var(--accent-blue);"></i> Office Hours</div>
          </div>
          <div class="info-card-body" style="padding-top:14px;">
            <div class="hours-row"><span class="hours-day">Monday – Wednesday</span><span class="hours-time">9:00 AM – 6:00 PM</span></div>
            <div class="hours-row"><span class="hours-day">Thursday – Friday</span><span class="hours-time">9:00 AM – 5:00 PM</span></div>
            <div class="hours-row"><span class="hours-day">Saturday</span><span class="hours-time">10:00 AM – 2:00 PM</span></div>
            <div class="hours-row"><span class="hours-day">Sunday</span><span class="hours-closed">Closed</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section class="faq-section">
  <div class="container">
    <div class="text-center">
      <div class="section-divider"></div>
      <h2 class="section-title">Frequently Asked Questions</h2>
      <p class="section-subtitle">Quick answers to common questions</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        @foreach([
          ['q' => 'How quickly will I get a response after submitting the form?',
           'a' => 'We respond to all inquiries within 24 business hours. For urgent matters, you can call us directly during office hours and we\'ll connect you with the right team member immediately.'],
          ['q' => 'Do you work with startups or only established businesses?',
           'a' => 'We work with businesses of all sizes — from early-stage startups building their first MVP to large enterprises modernizing legacy systems. Our flexible engagement models are designed to fit different stages and budgets.'],
          ['q' => 'What information should I prepare before contacting you?',
           'a' => 'A brief description of your project goals, desired timeline, and rough budget range will help us give you the most relevant response. Don\'t worry if you don\'t have everything figured out — we can help you scope the project during our first call.'],
          ['q' => 'Do you offer free consultations?',
           'a' => 'Yes! We offer a complimentary 30-minute consultation call for all new inquiries. It\'s a no-pressure conversation to understand your needs and explore how we can help — no strings attached.'],
          ['q' => 'Can you work with clients in different time zones?',
           'a' => 'Absolutely. We have successfully delivered projects for clients across North America, Europe, and Asia-Pacific. We schedule regular check-ins at times that work for both teams and maintain clear async communication throughout.'],
        ] as $i => $faq)
          <div class="faq-item {{ $i === 0 ? 'open' : '' }}" onclick="toggleFaq(this)">
            <div class="faq-question">
              <span class="faq-q-text">{{ $faq['q'] }}</span>
              <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="faq-answer"><p>{{ $faq['a'] }}</p></div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- CTA STRIP -->
<section class="cta-strip">
  <div class="container">
    <h2 class="cta-strip-title">Ready to Start Your Project?</h2>
    <p class="cta-strip-sub">Let's turn your idea into a product that drives real results.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <button class="btn btn-cta-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">Schedule a Call</button>
      <a href="#" class="btn btn-cta-outline" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</a>
    </div>
  </div>
</section>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  // ── Loading state on submit ──
  document.getElementById('contactForm')?.addEventListener('submit', function() {
    document.getElementById('btnText').style.display = 'none';
    document.getElementById('btnLoading').style.display = 'inline-flex';
    document.getElementById('submitBtn').disabled = true;
  });

  // ── FAQ accordion ──
  function toggleFaq(el) {
    const isOpen = el.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('open'));
    if (!isOpen) el.classList.add('open');
  }

  // ── Scroll reveal ──
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  document.querySelectorAll('.animate').forEach(el => observer.observe(el));
</script>
</body>
</html>