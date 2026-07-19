<!DOCTYPE html>
<html lang="en">

@php
    $hdFaqs = [
        [
            'q' => "How fast can I onboard a {$developer['title']}?",
            'a' => "Most engagements start within 3-5 business days of a signed agreement. We match you with pre-vetted engineers, run a short intro call, and you can begin the same week.",
        ],
        [
            'q' => 'What engagement models do you offer?',
            'a' => 'Full-time (dedicated, 40 hrs/week), part-time, hourly, or project-based fixed-scope engagements — whichever fits your budget and timeline.',
        ],
        [
            'q' => 'Can I interview the developer before starting?',
            'a' => "Yes. We share profiles and set up a technical interview with your shortlisted {$developer['title']} before any commitment.",
        ],
        [
            'q' => 'Who owns the code and IP?',
            'a' => 'You do. All work is delivered under an IP-assignment agreement, so the code, designs, and documentation belong entirely to you.',
        ],
    ];

    $hireDeveloperDetailSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "Service",
                "@id" => $seoCanonical . '#service',
                "name" => 'Hire ' . $developer['title'],
                "description" => $developer['meta_description'],
                "url" => $seoCanonical,
                "provider" => [
                    "@type" => "Organization",
                    "@id" => url('/') . '#organization',
                    "name" => "Kawach Technology",
                    "url" => url('/'),
                ],
                "areaServed" => "Worldwide",
                "serviceType" => $developer['title'],
                "offers" => [
                    "@type" => "Offer",
                    "availability" => "https://schema.org/InStock",
                    "priceCurrency" => "USD",
                    "seller" => [
                        "@type" => "Organization",
                        "name" => "Kawach Technology",
                    ],
                ],
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Hire Developer", "item" => url('/hire-developer')],
                    ["@type" => "ListItem", "position" => 3, "name" => $developer['title'], "item" => $seoCanonical],
                ],
            ],
            [
                "@type" => "FAQPage",
                "mainEntity" => collect($hdFaqs)->map(fn ($f) => [
                    "@type" => "Question",
                    "name" => $f['q'],
                    "acceptedAnswer" => ["@type" => "Answer", "text" => $f['a']],
                ])->all(),
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($hireDeveloperDetailSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
  .hdd-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #0d1b3e 0%, #1f3a6e 100%);
    padding: 64px 0 56px;
  }
  .hdd-hero::before {
    content: '';
    position: absolute;
    top: -100px; right: -80px;
    width: 380px; height: 380px;
    background: radial-gradient(circle, rgba(33,150,243,.16) 0%, transparent 65%);
    pointer-events: none;
  }
  .hdd-breadcrumb {
    font-size: .8rem;
    color: #aac4e0;
    margin-bottom: 14px;
    position: relative; z-index: 1;
  }
  .hdd-breadcrumb a { color: #aac4e0; text-decoration: none; }
  .hdd-breadcrumb a:hover { color: #fff; }
  .hdd-icon {
    width: 54px; height: 54px;
    border-radius: 14px;
    background: rgba(33,150,243,.18);
    border: 1px solid rgba(33,150,243,.35);
    color: #64b5f6;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.4rem;
    margin-bottom: 16px;
    position: relative; z-index: 1;
  }
  .hdd-hero h1 {
    font-family: 'Nunito', sans-serif;
    font-weight: 900;
    font-size: 2.1rem;
    color: #fff;
    position: relative; z-index: 1;
  }
  .hdd-hero p {
    color: #aac4e0;
    font-size: 1rem;
    max-width: 560px;
    margin-top: 12px;
    position: relative; z-index: 1;
  }

  .hdd-section { padding: 64px 0; background: #f0f4fb; }

  /* ── Form card ─────────────────────────────────────────────── */
  .hdd-form-card {
    background: #fff;
    border: 1px solid #dce6f5;
    border-radius: 16px;
    padding: 30px 30px 26px;
    box-shadow: 0 4px 24px rgba(26,115,232,.06);
  }
  .hdd-form-card h3 {
    font-family: 'Nunito', sans-serif;
    font-weight: 800;
    font-size: 1.25rem;
    color: #1a1a2e;
    margin-bottom: 4px;
  }
  .hdd-form-card .sub { font-size: .85rem; color: #6c757d; margin-bottom: 22px; }

  .hdd-form .form-label {
    font-weight: 700; font-size: .78rem;
    color: #1a1a2e; text-transform: uppercase;
    letter-spacing: .5px; margin-bottom: 5px;
  }
  .hdd-form .form-control, .hdd-form .form-select {
    border: 1.5px solid #e2e8f0;
    border-radius: 8px; padding: 10px 14px;
    font-size: .9rem; color: #1a1a2e;
    background: #fafbfd;
    transition: border-color .2s, box-shadow .2s;
  }
  .hdd-form .form-control:focus, .hdd-form .form-select:focus {
    border-color: #1a73e8;
    box-shadow: 0 0 0 3px rgba(26,115,232,.12);
    background: #fff; outline: none;
  }
  .hdd-form .form-control.is-invalid, .hdd-form .form-select.is-invalid { border-color: #e53935; }
  .hdd-form .invalid-feedback { font-size: .75rem; color: #e53935; margin-top: 4px; display: none; }
  .hdd-form .invalid-feedback.visible { display: block; }
  .hdd-form textarea.form-control { resize: none; }

  .hdd-budget-group { display: flex; flex-wrap: wrap; gap: 8px; }
  .hdd-budget-group input[type="radio"] { display: none; }
  .hdd-budget-group label {
    padding: 7px 16px; border: 1.5px solid #e2e8f0; border-radius: 20px;
    font-size: .78rem; font-weight: 600; color: #6c757d; cursor: pointer;
    transition: all .2s; background: #fafbfd; margin: 0;
  }
  .hdd-budget-group input[type="radio"]:checked + label { border-color: #1a73e8; color: #fff; background: #1a73e8; }

  .hdd-server-error {
    display: none; background: #fdecea; border: 1.5px solid #f5c6c5;
    border-radius: 8px; padding: 10px 14px; font-size: .83rem; color: #b71c1c;
    margin-bottom: 16px; align-items: flex-start; gap: 8px;
  }
  .hdd-server-error.visible { display: flex; }

  .hdd-btn-submit {
    background: #1a73e8; color: #fff; border: none; border-radius: 8px;
    padding: 12px 30px; font-weight: 700; font-size: .92rem;
    transition: background .2s, transform .15s; width: 100%;
    display: flex; align-items: center; justify-content: center; gap: 8px;
  }
  .hdd-btn-submit:hover:not(:disabled) { background: #1558b0; transform: translateY(-1px); }
  .hdd-btn-submit:disabled { background: #b0c4e8; cursor: not-allowed; }

  .hdd-success { display: none; text-align: center; padding: 30px 10px; }
  .hdd-success-icon {
    width: 64px; height: 64px; background: linear-gradient(135deg,#e8f5e9,#c8e6c9);
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; color: #4caf50; font-size: 1.8rem;
  }
  .hdd-success h4 { font-family: 'Nunito', sans-serif; font-weight: 900; color: #1a1a2e; margin-bottom: 8px; }
  .hdd-success p { color: #6c757d; font-size: .88rem; }

  /* Honeypot */
  .hdd-hp { position: absolute; left: -9999px; width: 1px; height: 1px; overflow: hidden; }

  /* ── Info side ─────────────────────────────────────────────── */
  .hdd-info-title {
    font-family: 'Nunito', sans-serif;
    font-weight: 800; font-size: 1.1rem; color: #1a1a2e; margin-bottom: 12px;
  }
  .hdd-faq-item { border-bottom: 1px solid #dce6f5; padding: 14px 0; }
  .hdd-faq-item:last-child { border-bottom: none; }
  .hdd-faq-q { font-size: .88rem; font-weight: 700; color: #1a1a2e; margin-bottom: 5px; }
  .hdd-faq-a { font-size: .82rem; color: #6c757d; line-height: 1.6; }

  .hdd-other-list { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 30px; }
  .hdd-other-link {
    display: inline-block; background: #fff; border: 1px solid #dce6f5;
    border-radius: 20px; padding: 6px 14px; font-size: .78rem; font-weight: 600;
    color: #1a1a2e; text-decoration: none; transition: all .18s;
  }
  .hdd-other-link:hover { border-color: #1a73e8; color: #1a73e8; background: #edf4fe; }
</style>

@include('layouts.navbar')

<section class="hdd-hero">
  <div class="container">
    <div class="hdd-breadcrumb">
      <a href="{{ url('/') }}">Home</a> /
      <a href="{{ route('hire-developer.index') }}">Hire Developer</a> /
      {{ $developer['title'] }}
    </div>
    <div class="hdd-icon"><i class="{{ $developer['icon'] }}"></i></div>
    <h1>Hire {{ $developer['title'] }}</h1>
    <p>{{ $developer['summary'] }}</p>
  </div>
</section>

<section class="hdd-section">
  <div class="container">
    <div class="row g-4">

      <!-- Form -->
      <div class="col-lg-7">
        <div class="hdd-form-card">
          <h3 id="hddFormTitle">Tell us what you need</h3>
          <p class="sub">Share a few details and we'll get back to you within 24 hours.</p>

          <div class="hdd-server-error" id="hddServerError">
            <i class="fas fa-exclamation-circle"></i>
            <span id="hddServerErrorText">Something went wrong. Please try again.</span>
          </div>

          <div id="hddFormWrap">
            <form class="hdd-form" id="hddForm" novalidate autocomplete="off">
              @csrf
              <input type="hidden" name="developer_slug" value="{{ $developer['slug'] }}">
              <div class="hdd-hp">
                <label for="hdd_website">Website</label>
                <input type="text" id="hdd_website" name="website" tabindex="-1" autocomplete="off">
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label" for="hdd_full_name">Full Name <span style="color:#e53935">*</span></label>
                  <input type="text" class="form-control" id="hdd_full_name" name="full_name" maxlength="100" autocomplete="name">
                  <div class="invalid-feedback" id="hdd_full_name_err">Please enter your full name.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="hdd_email">Email Address <span style="color:#e53935">*</span></label>
                  <input type="email" class="form-control" id="hdd_email" name="email" maxlength="254" autocomplete="email">
                  <div class="invalid-feedback" id="hdd_email_err">Please enter a valid email address.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="hdd_company">Company Name</label>
                  <input type="text" class="form-control" id="hdd_company" name="company" maxlength="150" autocomplete="organization">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="hdd_phone">Phone Number</label>
                  <input type="tel" class="form-control" id="hdd_phone" name="phone" maxlength="20" autocomplete="tel">
                  <div class="invalid-feedback" id="hdd_phone_err">Please enter a valid phone number.</div>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="hdd_engagement">Engagement Type</label>
                  <select class="form-select" id="hdd_engagement" name="engagement_type">
                    <option value="">Select engagement type</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Hourly">Hourly</option>
                    <option value="Project-based">Project-based</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="hdd_team_size">Team Size</label>
                  <select class="form-select" id="hdd_team_size" name="team_size">
                    <option value="">Select team size</option>
                    <option value="1 Developer">1 Developer</option>
                    <option value="2-5 Developers">2-5 Developers</option>
                    <option value="5+ Developers">5+ Developers</option>
                    <option value="Not sure yet">Not sure yet</option>
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label">Estimated Budget</label>
                  <div class="hdd-budget-group">
                    <div><input type="radio" name="budget" id="hdd_bq1" value="<10k"><label for="hdd_bq1">&lt; $10k</label></div>
                    <div><input type="radio" name="budget" id="hdd_bq2" value="10-50k"><label for="hdd_bq2">$10k – $50k</label></div>
                    <div><input type="radio" name="budget" id="hdd_bq3" value="50-100k"><label for="hdd_bq3">$50k – $100k</label></div>
                    <div><input type="radio" name="budget" id="hdd_bq4" value=">100k"><label for="hdd_bq4">&gt; $100k</label></div>
                  </div>
                </div>

                <div class="col-12">
                  <label class="form-label" for="hdd_description">
                    What do you need this {{ $developer['title'] }} for? <span style="color:#e53935">*</span>
                  </label>
                  <textarea class="form-control" id="hdd_description" name="description" rows="4" maxlength="3000"
                    placeholder="Briefly describe your project, timeline, and what you need this developer to work on (min. 20 characters)..."></textarea>
                  <div style="font-size:.72rem;color:#6c757d;text-align:right;margin-top:3px;" id="hdd_desc_counter">0 / 3000</div>
                  <div class="invalid-feedback" id="hdd_description_err">Please describe your requirement (at least 20 characters).</div>
                </div>

                <div class="col-12 mt-2">
                  <button type="button" class="hdd-btn-submit" id="hddSendBtn" disabled>
                    <span id="hddBtnContent">Send Request <i class="fas fa-arrow-right"></i></span>
                  </button>
                </div>
              </div>
            </form>
          </div>

          <div class="hdd-success" id="hddSuccess">
            <div class="hdd-success-icon"><i class="fas fa-check"></i></div>
            <h4>Request Sent!</h4>
            <p id="hddSuccessMsg">Thanks — we'll reach out within 24 hours.</p>
          </div>
        </div>
      </div>

      <!-- Info side -->
      <div class="col-lg-5">
        <div class="hdd-form-card">
          <div class="hdd-info-title">Frequently Asked Questions</div>
          @foreach ($hdFaqs as $faq)
            <div class="hdd-faq-item">
              <div class="hdd-faq-q">{{ $faq['q'] }}</div>
              <div class="hdd-faq-a">{{ $faq['a'] }}</div>
            </div>
          @endforeach
        </div>

        <div class="hdd-info-title" style="margin-top:30px;">Looking for a different role?</div>
        <div class="hdd-other-list">
          @foreach ($otherDevelopers->take(10) as $other)
            <a href="{{ route('hire-developer.show', $other['slug']) }}" class="hdd-other-link">{{ $other['title'] }}</a>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</section>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
(function () {
  'use strict';
  const $ = id => document.getElementById(id);
  const val = el => el.value.trim();
  const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  const phoneRx = /^[\+\d\s\-\(\)]{7,20}$/;

  const form       = $('hddForm');
  const sendBtn     = $('hddSendBtn');
  const btnContent  = $('hddBtnContent');
  const formWrap    = $('hddFormWrap');
  const successBox  = $('hddSuccess');
  const successMsg  = $('hddSuccessMsg');
  const serverErr   = $('hddServerError');
  const serverErrTx = $('hddServerErrorText');
  const descInput   = $('hdd_description');
  const descCounter = $('hdd_desc_counter');
  const nameInput   = $('hdd_full_name');
  const emailInput  = $('hdd_email');
  const phoneInput  = $('hdd_phone');

  descInput.addEventListener('input', () => {
    descCounter.textContent = descInput.value.length + ' / 3000';
    updateProgress();
  });

  [nameInput, emailInput, phoneInput, descInput].forEach(el => {
    el.addEventListener('blur', () => validateField(el));
    el.addEventListener('input', () => {
      if (el.classList.contains('is-invalid')) validateField(el);
      updateProgress();
    });
  });

  function validateField(el) {
    if (el.id === 'hdd_full_name') {
      const v = val(el);
      if (!v || v.length < 2) return setInvalid(el, 'hdd_full_name_err');
      return setValid(el);
    }
    if (el.id === 'hdd_email') {
      if (!emailRx.test(val(el))) return setInvalid(el, 'hdd_email_err');
      return setValid(el);
    }
    if (el.id === 'hdd_phone') {
      const v = val(el);
      if (v && !phoneRx.test(v)) return setInvalid(el, 'hdd_phone_err');
      el.classList.remove('is-invalid');
      return true;
    }
    if (el.id === 'hdd_description') {
      if (val(el).length < 20) return setInvalid(el, 'hdd_description_err');
      return setValid(el);
    }
    return true;
  }
  function setInvalid(el, errId) {
    el.classList.add('is-invalid');
    if ($(errId)) $(errId).classList.add('visible');
    return false;
  }
  function setValid(el) {
    el.classList.remove('is-invalid');
    const errEl = $(el.id + '_err');
    if (errEl) errEl.classList.remove('visible');
    return true;
  }

  function updateProgress() {
    const ok = val(nameInput).length >= 2 && emailRx.test(val(emailInput)) && val(descInput).length >= 20;
    sendBtn.disabled = !ok;
  }
  updateProgress();

  function validateAll() {
    const r1 = validateField(nameInput);
    const r2 = validateField(emailInput);
    const r3 = validateField(phoneInput);
    const r4 = validateField(descInput);
    return r1 && r2 && r3 && r4;
  }

  function showServerError(msg) {
    serverErrTx.textContent = msg;
    serverErr.classList.add('visible');
    serverErr.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }
  function hideServerError() { serverErr.classList.remove('visible'); }

  sendBtn.addEventListener('click', async () => {
    hideServerError();
    if (!validateAll()) {
      const firstInvalid = form.querySelector('.is-invalid');
      if (firstInvalid) firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    sendBtn.disabled = true;
    btnContent.innerHTML = 'Sending…';

    const data = new FormData(form);
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    if (csrfMeta) data.set('_token', csrfMeta.getAttribute('content'));

    try {
      const response = await fetch('{{ route("hire-developer.store", $developer["slug"]) }}', {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          ...(csrfMeta ? { 'X-CSRF-TOKEN': csrfMeta.getAttribute('content') } : {}),
        },
        body: data,
      });

      const json = await response.json();

      if (response.ok && json.success) {
        formWrap.style.display = 'none';
        successMsg.textContent = json.message;
        successBox.style.display = 'block';
        successBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
      } else if (response.status === 422 && json.errors) {
        const firstMsg = Object.values(json.errors)[0];
        showServerError(Array.isArray(firstMsg) ? firstMsg[0] : firstMsg);
        sendBtn.disabled = false;
        btnContent.innerHTML = 'Send Request <i class="fas fa-arrow-right"></i>';
      } else {
        showServerError(json.message || 'Something went wrong. Please try again.');
        sendBtn.disabled = false;
        btnContent.innerHTML = 'Send Request <i class="fas fa-arrow-right"></i>';
      }
    } catch (err) {
      showServerError('Network error — please check your connection and try again.');
      sendBtn.disabled = false;
      btnContent.innerHTML = 'Send Request <i class="fas fa-arrow-right"></i>';
      console.error('Hire developer submission error:', err);
    }
  });
})();
</script>
</body>
</html>
