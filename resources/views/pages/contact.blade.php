<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')
<style>
  /* Right Side Animation Styles */
  .hero-animation-wrapper {
    position: relative;
    min-height: 480px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }

  /* Central Icon with Pulse */
  .central-icon {
    position: relative;
    z-index: 10;
    cursor: pointer;
    animation: float-main 4s ease-in-out infinite;
  }

  .central-icon-inner {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 20px 35px -10px rgba(99, 102, 241, 0.4);
    transition: transform 0.3s ease;
  }

  .central-icon-inner i {
    font-size: 44px;
    color: white;
  }

  .central-icon:hover .central-icon-inner {
    transform: scale(1.05);
  }

  /* Pulse Ring Animation */
  .pulse-ring {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px;
    margin: -50px 0 0 -50px;
    border-radius: 50%;
    background: rgba(99, 102, 241, 0.2);
    animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
    z-index: -1;
  }

  @keyframes pulse-ring {
    0% {
      transform: scale(1);
      opacity: 0.6;
    }
    100% {
      transform: scale(1.8);
      opacity: 0;
    }
  }

  /* Floating Shapes Background */
  .floating-shapes {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    pointer-events: none;
  }

  .shape {
    position: absolute;
    background: linear-gradient(45deg, #6366f1, #a855f7);
    border-radius: 50%;
    opacity: 0.15;
    filter: blur(3px);
    animation: float-shape 12s infinite alternate ease-in-out;
  }

  .shape-1 {
    width: 80px;
    height: 80px;
    top: 10%;
    left: 5%;
    animation-duration: 14s;
    animation-delay: 0s;
  }

  .shape-2 {
    width: 50px;
    height: 50px;
    bottom: 15%;
    right: 10%;
    background: linear-gradient(45deg, #06b6d4, #3b82f6);
    opacity: 0.2;
    animation-duration: 11s;
    animation-delay: 1s;
  }

  .shape-3 {
    width: 120px;
    height: 120px;
    top: 60%;
    left: -20px;
    background: linear-gradient(45deg, #ec4899, #f43f5e);
    opacity: 0.1;
    animation-duration: 18s;
    animation-delay: 2s;
  }

  .shape-4 {
    width: 40px;
    height: 40px;
    top: 30%;
    right: 15%;
    background: linear-gradient(45deg, #f59e0b, #f97316);
    opacity: 0.2;
    animation-duration: 9s;
    animation-delay: 0.5s;
  }

  .shape-5 {
    width: 90px;
    height: 90px;
    bottom: 5%;
    left: 20%;
    background: linear-gradient(45deg, #10b981, #34d399);
    opacity: 0.12;
    animation-duration: 15s;
    animation-delay: 1.5s;
  }

  @keyframes float-shape {
    0% {
      transform: translateY(0px) translateX(0px) rotate(0deg);
    }
    100% {
      transform: translateY(-30px) translateX(20px) rotate(10deg);
    }
  }

  /* Message Bubbles with Slide/Fade Animation */
  .message-bubble {
    position: absolute;
    background: white;
    padding: 10px 20px;
    border-radius: 100px;
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    z-index: 12;
    backdrop-filter: blur(2px);
    border: 1px solid rgba(99, 102, 241, 0.2);
    opacity: 0;
    animation: slideInFade 0.6s ease-out forwards;
  }

  .message-bubble i {
    color: #6366f1;
    font-size: 14px;
  }

  .message-bubble-1 {
    top: 15%;
    right: 5%;
    animation-delay: 0.3s;
  }

  .message-bubble-2 {
    bottom: 20%;
    left: 0;
    animation-delay: 0.6s;
  }

  .message-bubble-3 {
    top: 45%;
    left: 8%;
    animation-delay: 0.9s;
  }

  @keyframes slideInFade {
    0% {
      opacity: 0;
      transform: translateY(20px) scale(0.9);
    }
    100% {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }

  /* Additional gentle floating for message bubbles */
  .message-bubble-1 {
    animation: float-bubble 5s ease-in-out infinite, slideInFade 0.6s ease-out forwards;
    animation-delay: 0.3s, 0s;
  }

  .message-bubble-2 {
    animation: float-bubble-reverse 4.5s ease-in-out infinite, slideInFade 0.6s ease-out forwards;
    animation-delay: 0.6s, 0s;
  }

  .message-bubble-3 {
    animation: float-bubble 6s ease-in-out infinite, slideInFade 0.6s ease-out forwards;
    animation-delay: 0.9s, 0s;
  }

  @keyframes float-bubble {
    0%, 100% {
      transform: translateY(0px);
    }
    50% {
      transform: translateY(-8px);
    }
  }

  @keyframes float-bubble-reverse {
    0%, 100% {
      transform: translateY(0px);
    }
    50% {
      transform: translateY(8px);
    }
  }

  /* Main central floating animation */
  @keyframes float-main {
    0%, 100% {
      transform: translateY(0px);
    }
    50% {
      transform: translateY(-15px);
    }
  }

  /* Orbit / connection lines animation */
  .connection-lines {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 5;
    pointer-events: none;
  }

  .connection-lines svg {
    width: 100%;
    max-width: 380px;
    height: auto;
  }

  .orbit-circle {
    stroke-dasharray: 8 10;
    animation: rotate-orbit 20s linear infinite;
    transform-origin: center;
  }

  .orbit-circle-2 {
    stroke-dasharray: 5 12;
    animation: rotate-orbit-reverse 16s linear infinite;
    transform-origin: center;
  }

  @keyframes rotate-orbit {
    from {
      transform: rotate(0deg);
    }
    to {
      transform: rotate(360deg);
    }
  }

  @keyframes rotate-orbit-reverse {
    from {
      transform: rotate(360deg);
    }
    to {
      transform: rotate(0deg);
    }
  }

  /* Responsive adjustments */
  @media (max-width: 992px) {
    .hero-animation-wrapper {
      min-height: 400px;
      margin-top: 3rem;
    }
    .message-bubble {
      font-size: 12px;
      padding: 6px 14px;
    }
    .central-icon-inner {
      width: 80px;
      height: 80px;
    }
    .central-icon-inner i {
      font-size: 34px;
    }
    .pulse-ring {
      width: 80px;
      height: 80px;
      margin: -40px 0 0 -40px;
    }
  }

  @media (max-width: 576px) {
    .message-bubble {
      white-space: nowrap;
      transform: scale(0.9);
    }
    .hero-animation-wrapper {
      min-height: 360px;
    }
  }
</style>
<body>

<!-- NAVBAR -->
@include('layouts.navbar')

<!-- HERO BANNER -->
<section class="hero-section">

  {{-- ── Animated background layer ── --}}
  <div class="hero-bg-layer">

    {{-- Floating code lines --}}
    <div class="code-line cl-1"></div>
    <div class="code-line cl-2"></div>
    <div class="code-line cl-3"></div>
    <div class="code-line cl-4"></div>
    <div class="code-line cl-5"></div>
    <div class="code-line cl-6"></div>
    <div class="code-line cl-7"></div>
    <div class="code-line cl-8"></div>
    <div class="code-line cl-9"></div>
    <div class="code-line cl-10"></div>
    <div class="code-line cl-11"></div>
    <div class="code-line cl-12"></div>
    <div class="code-line cl-13"></div>
    <div class="code-line cl-14"></div>
    <div class="code-line cl-15"></div>

    {{-- Circuit board nodes --}}
    <div class="circuit-node cn-1"></div>
    <div class="circuit-node cn-2"></div>
    <div class="circuit-node cn-3"></div>
    <div class="circuit-node cn-4"></div>
    <div class="circuit-node cn-5"></div>
    <div class="circuit-node cn-6"></div>
    <div class="circuit-node cn-7"></div>
    <div class="circuit-node cn-8"></div>
    <div class="circuit-node cn-9"></div>
    <div class="circuit-node cn-10"></div>

    {{-- Data packets (horizontal travel) --}}
    <div class="data-packet dp-blue  dp-1"></div>
    <div class="data-packet dp-green dp-2"></div>
    <div class="data-packet dp-white dp-3"></div>
    <div class="data-packet dp-blue  dp-4"></div>
    <div class="data-packet dp-green dp-5"></div>
    <div class="data-packet dp-white dp-6"></div>
    <div class="data-packet dp-blue  dp-7"></div>
    <div class="data-packet dp-green dp-8"></div>

    {{-- Binary rain columns (sides only) --}}
    <div class="binary-col bc-1">1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-2">0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-3">1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1</div>
    <div class="binary-col bc-4">0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0</div>
    <div class="binary-col bc-5">1&#10;0&#10;0&#10;1&#10;1&#10;0&#10;1&#10;0&#10;1&#10;1&#10;0&#10;0</div>
    <div class="binary-col bc-6">0&#10;1&#10;1&#10;0&#10;0&#10;1&#10;0&#10;1&#10;0&#10;0&#10;1&#10;1</div>

    {{-- Scan line --}}
    <div class="hero-scan-line"></div>

  </div>
  {{-- /hero-bg-layer --}}
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="hero-badge"><i class="fas fa-circle"></i> We're Online & Ready</div>
        <h1 class="contact-hero-title">
          Let's Build Something<br><span>Great Together</span>
        </h1>
        <p class="contact-hero-sub">
          Whether you have a project in mind, a question about our services, or just want to say hello — our team is here and ready to help.
        </p>
        <div class="hero-stats">
          <div class="hero-stat">
            <div class="hero-stat-icon"><i class="fas fa-clock"></i></div>
            <div>
              <div class="hero-stat-value">&lt; 24h</div>
              <div class="hero-stat-label">Response Time</div>
            </div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-icon"><i class="fas fa-star"></i></div>
            <div>
              <div class="hero-stat-value">4.9 / 5</div>
              <div class="hero-stat-label">Client Rating</div>
            </div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-icon"><i class="fas fa-handshake"></i></div>
            <div>
              <div class="hero-stat-value">200+</div>
              <div class="hero-stat-label">Happy Clients</div>
            </div>
          </div>
        </div>
      </div>
      
      {{-- Right Side with Animated Creative Element --}}
      <div class="col-lg-5">
        <div class="hero-animation-wrapper">
          <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
          </div>
          <div class="message-bubble message-bubble-1">
            <i class="fas fa-comment-dots"></i> Got a project?
          </div>
          <div class="message-bubble message-bubble-2">
            <i class="fas fa-rocket"></i> Let's launch!
          </div>
          <div class="message-bubble message-bubble-3">
            <i class="fas fa-headset"></i> 24/7 support
          </div>
          <div class="central-icon">
            <div class="pulse-ring"></div>
            <div class="central-icon-inner">
              <i class="fas fa-envelope-open-text"></i>
            </div>
          </div>
          <div class="connection-lines">
            <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
              <circle class="orbit-circle" cx="200" cy="200" r="140" fill="none" stroke="url(#gradient)" stroke-width="1.5" stroke-dasharray="6 8"/>
              <circle class="orbit-circle-2" cx="200" cy="200" r="100" fill="none" stroke="url(#gradient2)" stroke-width="1" stroke-dasharray="4 10"/>
              <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                  <stop offset="0%" stop-color="#6366f1" />
                  <stop offset="100%" stop-color="#8b5cf6" />
                </linearGradient>
                <linearGradient id="gradient2" x1="100%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" stop-color="#06b6d4" />
                  <stop offset="100%" stop-color="#3b82f6" />
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
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Contact Us</li>
      </ol>
    </nav>
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

            <!-- Form -->
            <div id="formWrap">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Full Name *</label>
                  <input type="text" class="form-control" placeholder="John Smith">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Company</label>
                  <input type="text" class="form-control" placeholder="Acme Corp">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Email Address *</label>
                  <input type="email" class="form-control" placeholder="john@acmecorp.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Phone</label>
                  <input type="tel" class="form-control" placeholder="+1 234 567 8900">
                </div>
                <div class="col-12">
                  <label class="form-label">Subject *</label>
                  <select class="form-select">
                    <option value="">What can we help you with?</option>
                    <option>New Project / MVP</option>
                    <option>Web &amp; Mobile Development</option>
                    <option>AI &amp; Machine Learning</option>
                    <option>Cloud &amp; DevOps</option>
                    <option>Custom Software</option>
                    <option>Pricing &amp; Packages</option>
                    <option>Partnership Opportunity</option>
                    <option>General Inquiry</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Services of Interest</label>
                  <div class="tag-group">
                    <span class="tag" onclick="this.classList.toggle('active')">Web &amp; Mobile</span>
                    <span class="tag active" onclick="this.classList.toggle('active')">AI / Automation</span>
                    <span class="tag" onclick="this.classList.toggle('active')">Cloud &amp; DevOps</span>
                    <span class="tag" onclick="this.classList.toggle('active')">Custom Software</span>
                    <span class="tag" onclick="this.classList.toggle('active')">SaaS Product</span>
                    <span class="tag" onclick="this.classList.toggle('active')">UI/UX Design</span>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Estimated Budget</label>
                  <div class="budget-group">
                    <div class="budget-pill"><input type="radio" name="budget" id="b1" value="<10k"><label for="b1">&lt; $10k</label></div>
                    <div class="budget-pill"><input type="radio" name="budget" id="b2" value="10-50k" checked><label for="b2">$10k – $50k</label></div>
                    <div class="budget-pill"><input type="radio" name="budget" id="b3" value="50-100k"><label for="b3">$50k – $100k</label></div>
                    <div class="budget-pill"><input type="radio" name="budget" id="b4" value=">100k"><label for="b4">&gt; $100k</label></div>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label">Message *</label>
                  <textarea class="form-control" rows="4" placeholder="Tell us about your project, goals, or any questions you have..."></textarea>
                </div>
                <div class="col-12" style="margin-top:6px;">
                  <button class="btn-submit" onclick="handleSubmit()">
                    Send Message <i class="fas fa-arrow-right"></i>
                  </button>
                  <p class="form-note"><i class="fas fa-lock"></i> Your information is secure and never shared with third parties.</p>
                </div>
              </div>
            </div>

            <!-- Success State -->
            <div class="form-success" id="formSuccess">
              <div class="success-ring"><i class="fas fa-check"></i></div>
              <h4>Message Sent Successfully!</h4>
              <p>Thanks for reaching out! A member of our team will review your message and respond to your email within 24 hours.</p>
              <button class="btn-back" onclick="resetForm()"><i class="fas fa-arrow-left"></i> Send Another Message</button>
            </div>

          </div>
        </div>
      </div>

      <!-- RIGHT: Contact Info + Map + Hours -->
      <div class="col-lg-5">

        <!-- Contact Info Card -->
        <div class="info-card animate delay-1">
          <div class="info-card-header">
            <div class="info-card-title"><i class="fas fa-address-book" style="margin-right:8px;color:var(--accent-blue);"></i> Contact Information</div>
          </div>
          <div class="info-card-body">

            <div class="contact-item">
              <div class="contact-item-icon"><i class="fas fa-envelope"></i></div>
              <div>
                <div class="contact-item-label">Email Us</div>
                <div class="contact-item-value"><a href="mailto:hello@innovatetech.io">hello@innovatetech.io</a></div>
                <div class="contact-item-sub">For general inquiries &amp; partnerships</div>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-item-icon"><i class="fas fa-headset"></i></div>
              <div>
                <div class="contact-item-label">Support</div>
                <div class="contact-item-value"><a href="mailto:support@innovatetech.io">support@innovatetech.io</a></div>
                <div class="contact-item-sub">Existing client support</div>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-item-icon"><i class="fas fa-phone-alt"></i></div>
              <div>
                <div class="contact-item-label">Call Us</div>
                <div class="contact-item-value"><a href="tel:+12345679900">+1 234 567 9900</a></div>
                <div class="contact-item-sub">Mon – Fri, 9 AM – 6 PM EST</div>
                <div class="status-badge"><div class="status-dot"></div> Lines Open Now</div>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-item-icon"><i class="fas fa-map-marker-alt"></i></div>
              <div>
                <div class="contact-item-label">Our Office</div>
                <div class="contact-item-value">123 Tech Avenue, Suite 400</div>
                <div class="contact-item-sub">New York, NY 10001, USA</div>
              </div>
            </div>

            <div class="contact-item" style="border-bottom:none;padding-bottom:0;">
              <div class="contact-item-icon"><i class="fas fa-share-alt"></i></div>
              <div>
                <div class="contact-item-label">Follow Us</div>
                <div class="social-row" style="margin-top:8px;">
                  <a href="#" class="social-btn s-linkedin"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" class="social-btn s-twitter"><i class="fab fa-twitter"></i></a>
                  <a href="#" class="social-btn s-facebook"><i class="fab fa-facebook-f"></i></a>
                  <a href="#" class="social-btn s-instagram"><i class="fab fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Map Card -->
        <div class="map-card animate delay-2">
          <div class="map-embed">
            <!-- Decorative road lines -->
            <div class="map-road-h" style="top:33%;"></div>
            <div class="map-road-h" style="top:60%;"></div>
            <div class="map-road-h" style="top:80%;"></div>
            <div class="map-road-v" style="left:25%;"></div>
            <div class="map-road-v" style="left:55%;"></div>
            <div class="map-road-v" style="left:75%;"></div>
            <!-- Pin -->
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
            <a href="https://maps.google.com" target="_blank" class="btn-directions">
              <i class="fas fa-directions"></i> Directions
            </a>
          </div>
        </div>

        <!-- Office Hours Card -->
        <div class="info-card animate delay-3">
          <div class="info-card-header">
            <div class="info-card-title"><i class="fas fa-clock" style="margin-right:8px;color:var(--accent-blue);"></i> Office Hours</div>
          </div>
          <div class="info-card-body" style="padding-top:14px;">
            <div class="hours-row">
              <span class="hours-day">Monday – Wednesday</span>
              <span class="hours-time">9:00 AM – 6:00 PM</span>
            </div>
            <div class="hours-row">
              <span class="hours-day">Thursday – Friday</span>
              <span class="hours-time">9:00 AM – 5:00 PM</span>
            </div>
            <div class="hours-row">
              <span class="hours-day">Saturday</span>
              <span class="hours-time">10:00 AM – 2:00 PM</span>
            </div>
            <div class="hours-row">
              <span class="hours-day">Sunday</span>
              <span class="hours-closed">Closed</span>
            </div>
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

        <div class="faq-item open" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span class="faq-q-text">How quickly will I get a response after submitting the form?</span>
            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
          </div>
          <div class="faq-answer">
            <p>We respond to all inquiries within 24 business hours. For urgent matters, you can call us directly during office hours and we'll connect you with the right team member immediately.</p>
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span class="faq-q-text">Do you work with startups or only established businesses?</span>
            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
          </div>
          <div class="faq-answer">
            <p>We work with businesses of all sizes — from early-stage startups building their first MVP to large enterprises modernizing legacy systems. Our flexible engagement models are designed to fit different stages and budgets.</p>
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span class="faq-q-text">What information should I prepare before contacting you?</span>
            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
          </div>
          <div class="faq-answer">
            <p>A brief description of your project goals, desired timeline, and rough budget range will help us give you the most relevant response. Don't worry if you don't have everything figured out — we can help you scope the project during our first call.</p>
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span class="faq-q-text">Do you offer free consultations?</span>
            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
          </div>
          <div class="faq-answer">
            <p>Yes! We offer a complimentary 30-minute consultation call for all new inquiries. It's a no-pressure conversation to understand your needs and explore how we can help — no strings attached.</p>
          </div>
        </div>

        <div class="faq-item" onclick="toggleFaq(this)">
          <div class="faq-question">
            <span class="faq-q-text">Can you work with clients in different time zones?</span>
            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
          </div>
          <div class="faq-answer">
            <p>Absolutely. We have successfully delivered projects for clients across North America, Europe, and Asia-Pacific. We schedule regular check-ins at times that work for both teams and maintain clear async communication throughout.</p>
          </div>
        </div>

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
      <a href="#" class="btn btn-cta-outline" data-bs-toggle="modal" data-bs-target="#quoteModal">Schedule a Call</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
  // Form submit
  function handleSubmit() {
    document.getElementById('formWrap').style.display = 'none';
    document.getElementById('formSuccess').style.display = 'block';
  }
  function resetForm() {
    document.getElementById('formWrap').style.display = '';
    document.getElementById('formSuccess').style.display = 'none';
  }

  // FAQ accordion
  function toggleFaq(el) {
    const isOpen = el.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('open'));
    if (!isOpen) el.classList.add('open');
  }

  // Scroll reveal
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
  }, { threshold: 0.1 });
  document.querySelectorAll('.animate').forEach(el => observer.observe(el));
</script>
</body>
</html>
