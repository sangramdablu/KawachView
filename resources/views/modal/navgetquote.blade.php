{{--
  ╔══════════════════════════════════════════════════════════╗
  ║  QUOTE MODAL  —  quoteModal.blade.php                   ║
  ║  Drop this component anywhere in your layout.            ║
  ║  Requires: Bootstrap 5, Font Awesome 6, CSRF meta tag   ║
  ╚══════════════════════════════════════════════════════════╝
--}}

{{-- ── STYLES (add to your <head> or main CSS) ──────────────── --}}
<style>
  /* ── Modal shell ───────────────────────────────────────────── */
  #quoteModal .modal-content {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 30px 80px rgba(0, 0, 0, .35);
  }

  /* ── Branded header ─────────────────────────────────────────── */
  .modal-header-branded {
    background: linear-gradient(135deg, #0d1b3e 0%, #1f3a6e 100%);
    padding: 24px 28px 20px;
    border-bottom: none;
    position: relative;
  }
  .modal-header-branded::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 80% 50%, rgba(33,150,243,.15) 0%, transparent 70%);
    pointer-events: none;
  }
  .modal-brand-icon {
    width: 48px; height: 48px;
    background: rgba(33,150,243,.2);
    border: 1px solid rgba(33,150,243,.4);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 12px;
    position: relative; z-index: 1;
  }
  .modal-brand-icon i { color: #2196f3; font-size: 1.3rem; }
  .modal-title-main {
    font-family: 'Nunito', sans-serif;
    font-weight: 900; font-size: 1.4rem;
    color: #fff; margin-bottom: 4px;
    position: relative; z-index: 1;
  }
  .modal-title-sub {
    color: #aac4e0; font-size: 0.85rem;
    position: relative; z-index: 1;
  }
  .modal-close-btn {
    position: absolute; top: 16px; right: 20px;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 8px;
    width: 34px; height: 34px;
    display: flex; align-items: center; justify-content: center;
    color: #aac4e0; cursor: pointer;
    transition: background .2s, color .2s;
    z-index: 2; font-size: 1rem; line-height: 1; padding: 0;
  }
  .modal-close-btn:hover { background: rgba(255,255,255,.2); color: #fff; }

  /* ── Modal body ─────────────────────────────────────────────── */
  .modal-body-branded {
    background: #fff;
    padding: 28px 28px 10px;
  }

  /* ── Form elements ──────────────────────────────────────────── */
  .modal-form .form-label {
    font-weight: 700; font-size: 0.78rem;
    color: #1a1a2e; text-transform: uppercase;
    letter-spacing: .5px; margin-bottom: 5px;
  }
  .modal-form .form-control,
  .modal-form .form-select {
    border: 1.5px solid #e2e8f0;
    border-radius: 8px; padding: 10px 14px;
    font-size: 0.9rem; color: #1a1a2e;
    transition: border-color .2s, box-shadow .2s;
    background: #fafbfd;
  }
  .modal-form .form-control:focus,
  .modal-form .form-select:focus {
    border-color: #1a73e8;
    box-shadow: 0 0 0 3px rgba(26,115,232,.12);
    background: #fff; outline: none;
  }
  /* Valid state */
  .modal-form .form-control.is-valid {
    border-color: #4caf50;
    background: #fafbfd;
    box-shadow: none;
  }
  /* Invalid state */
  .modal-form .form-control.is-invalid {
    border-color: #e53935;
    background: #fafbfd;
    box-shadow: none;
  }
  .modal-form .invalid-feedback {
    font-size: 0.75rem; color: #e53935;
    margin-top: 4px; display: none;
  }
  .modal-form .form-control.is-invalid ~ .invalid-feedback,
  .modal-form .form-control.is-invalid + .invalid-feedback {
    display: block;
  }
  .modal-form textarea.form-control { resize: none; }
  .char-counter {
    font-size: 0.72rem; color: #6c757d;
    text-align: right; margin-top: 3px;
  }
  .char-counter.warn { color: #e53935; }

  /* ── Service tags ───────────────────────────────────────────── */
  .service-tag-group { display: flex; flex-wrap: wrap; gap: 8px; }
  .service-tag {
    padding: 6px 14px;
    border: 1.5px solid #e2e8f0;
    border-radius: 20px;
    font-size: 0.78rem; font-weight: 600;
    color: #6c757d; cursor: pointer;
    transition: all .2s; background: #fafbfd;
    user-select: none;
  }
  .service-tag:hover  { border-color: #1a73e8; color: #1a73e8; background: #edf4fe; }
  .service-tag.active { border-color: #1a73e8; color: #fff; background: #1a73e8; }

  /* ── Budget pills ───────────────────────────────────────────── */
  .budget-group { display: flex; flex-wrap: wrap; gap: 8px; }
  .budget-pill input[type="radio"] { display: none; }
  .budget-pill label {
    padding: 6px 16px;
    border: 1.5px solid #e2e8f0;
    border-radius: 20px; font-size: 0.78rem; font-weight: 600;
    color: #6c757d; cursor: pointer;
    transition: all .2s; background: #fafbfd; margin: 0;
  }
  .budget-pill input[type="radio"]:checked + label {
    border-color: #1a73e8; color: #fff; background: #1a73e8;
  }

  /* ── Modal footer ───────────────────────────────────────────── */
  .modal-footer-branded {
    background: #fff;
    border-top: 1px solid #e2e8f0;
    padding: 16px 28px 24px;
    display: flex; align-items: center;
    justify-content: space-between; gap: 12px;
  }
  .modal-footer-branded .footer-note {
    font-size: 0.75rem; color: #6c757d;
    display: flex; align-items: center; gap: 5px;
  }
  .modal-footer-branded .footer-note i { color: #4caf50; }

  /* ── Submit button states ───────────────────────────────────── */
  .btn-modal-submit {
    background: #1a73e8; color: #fff;
    border: none; border-radius: 8px;
    padding: 11px 28px;
    font-weight: 700; font-size: 0.92rem;
    transition: background .2s, transform .15s, opacity .2s;
    display: flex; align-items: center; gap: 8px;
    white-space: nowrap; cursor: pointer;
    min-width: 180px; justify-content: center;
    position: relative;
  }
  .btn-modal-submit:hover:not(:disabled) {
    background: #1558b0; color: #fff; transform: translateY(-1px);
  }
  .btn-modal-submit:disabled {
    background: #b0c4e8; cursor: not-allowed;
    transform: none; opacity: 1;
  }
  /* Tooltip on disabled button */
  .btn-submit-wrap { position: relative; display: inline-block; }
  .btn-submit-wrap .disabled-tip {
    display: none;
    position: absolute;
    bottom: calc(100% + 8px);
    right: 0;
    background: #1a1a2e;
    color: #fff;
    font-size: 0.72rem;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 6px;
    white-space: nowrap;
    pointer-events: none;
    z-index: 10;
  }
  .btn-submit-wrap .disabled-tip::after {
    content: '';
    position: absolute;
    top: 100%; right: 18px;
    border: 5px solid transparent;
    border-top-color: #1a1a2e;
  }
  .btn-submit-wrap:hover .disabled-tip { display: block; }

  /* ── Loader (bar-style, not spinner) ────────────────────────── */
  .submit-loader {
    display: none;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    width: 100%;
  }
  .submit-loader-text {
    font-size: 0.82rem; font-weight: 600; color: #fff;
  }
  .submit-loader-bar {
    width: 100%; height: 3px;
    background: rgba(255,255,255,.25);
    border-radius: 3px;
    overflow: hidden;
    position: relative;
  }
  .submit-loader-bar::after {
    content: '';
    position: absolute;
    top: 0; left: -40%;
    width: 40%; height: 100%;
    background: #fff;
    border-radius: 3px;
    animation: barSlide .9s ease-in-out infinite;
  }
  @keyframes barSlide {
    0%   { left: -40%; }
    100% { left: 110%; }
  }

  /* Overlay loader on modal (full overlay while submitting) */
  .modal-submit-overlay {
    display: none;
    position: absolute;
    inset: 0;
    background: rgba(13,27,62,.72);
    backdrop-filter: blur(3px);
    z-index: 10;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
    border-radius: 16px;
  }
  .modal-submit-overlay.active { display: flex; }
  .overlay-dots {
    display: flex; gap: 10px;
  }
  .overlay-dot {
    width: 12px; height: 12px;
    background: #2196f3;
    border-radius: 50%;
    animation: dotBounce .8s ease-in-out infinite;
  }
  .overlay-dot:nth-child(2) { animation-delay: .15s; background: #64b5f6; }
  .overlay-dot:nth-child(3) { animation-delay: .30s; background: #90caf9; }
  @keyframes dotBounce {
    0%, 80%, 100% { transform: scale(0.7); opacity: .5; }
    40%            { transform: scale(1.2); opacity: 1; }
  }
  .overlay-label {
    font-family: 'Nunito', sans-serif;
    font-weight: 800; font-size: 1rem;
    color: #fff; letter-spacing: .5px;
  }
  .overlay-sublabel {
    font-size: 0.78rem; color: #aac4e0; margin-top: -12px;
  }

  /* ── Server error banner ────────────────────────────────────── */
  .server-error-banner {
    display: none;
    background: #fdecea;
    border: 1.5px solid #f5c6c5;
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 0.83rem;
    color: #b71c1c;
    margin-bottom: 16px;
    display: none;
    align-items: flex-start;
    gap: 8px;
  }
  .server-error-banner.visible { display: flex; }
  .server-error-banner i { flex-shrink: 0; margin-top: 2px; }

  /* Field-level server errors */
  .server-field-error {
    font-size: 0.75rem; color: #e53935;
    margin-top: 4px; display: none;
  }
  .server-field-error.visible { display: block; }

  /* ── Success state ──────────────────────────────────────────── */
  .modal-success {
    display: none;
    text-align: center;
    padding: 40px 28px;
  }
  .modal-success .success-icon {
    width: 72px; height: 72px;
    background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 18px;
    box-shadow: 0 0 0 12px rgba(76,175,80,.08);
    animation: successPop .4s cubic-bezier(.34,1.56,.64,1) both;
  }
  @keyframes successPop {
    from { transform: scale(0); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
  }
  .modal-success .success-icon i { color: #4caf50; font-size: 2rem; }
  .modal-success h4 {
    font-family: 'Nunito', sans-serif; font-weight: 900;
    color: #1a1a2e; margin-bottom: 8px;
  }
  .modal-success p { color: #6c757d; font-size: 0.88rem; }

  /* ── Progress steps in footer ───────────────────────────────── */
  .form-progress {
    display: flex; gap: 6px; align-items: center;
  }
  .progress-step {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: #e2e8f0;
    transition: background .3s, transform .3s;
  }
  .progress-step.filled { background: #1a73e8; transform: scale(1.2); }
</style>


{{-- ── MODAL HTML ──────────────────────────────────────────────── --}}
<div class="modal fade" id="quoteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="position:relative;">

      {{-- Full-overlay loader (shown while submitting) --}}
      <div class="modal-submit-overlay" id="quoteOverlay">
        <div class="overlay-dots">
          <div class="overlay-dot"></div>
          <div class="overlay-dot"></div>
          <div class="overlay-dot"></div>
        </div>
        <div class="overlay-label">Sending your request…</div>
        <div class="overlay-sublabel">Please don't close this window</div>
      </div>

      {{-- Header --}}
      <div class="modal-header-branded">
        <button class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
        <div class="modal-brand-icon"><i class="fas fa-file-invoice-dollar"></i></div>
        <div class="modal-title-main">Get a Free Quote</div>
        <div class="modal-title-sub">Tell us about your project — we'll respond within 24 hours.</div>
      </div>

      {{-- Body --}}
      <div class="modal-body-branded">

        {{-- Server error banner --}}
        <div class="server-error-banner" id="quoteServerError">
          <i class="fas fa-exclamation-circle"></i>
          <span id="quoteServerErrorText">Something went wrong. Please try again.</span>
        </div>

        {{-- Form --}}
        <div id="quoteFormWrap">
          <form class="modal-form" id="quoteForm" novalidate autocomplete="off">
            <div class="row g-3">

              {{-- Full Name --}}
              <div class="col-md-6">
                <label class="form-label" for="q_full_name">Full Name <span style="color:#e53935">*</span></label>
                <input type="text" class="form-control" id="q_full_name" name="full_name"
                       maxlength="100" autocomplete="name">
                <div class="invalid-feedback" id="q_full_name_err">Please enter your full name (at least 2 characters).</div>
                <div class="server-field-error" id="q_full_name_srv"></div>
              </div>

              {{-- Company --}}
              <div class="col-md-6">
                <label class="form-label" for="q_company">Company Name</label>
                <input type="text" class="form-control" id="q_company" name="company"
                       maxlength="150" autocomplete="organization">
                <div class="server-field-error" id="q_company_srv"></div>
              </div>

              {{-- Email --}}
              <div class="col-md-6">
                <label class="form-label" for="q_email">Email Address <span style="color:#e53935">*</span></label>
                <input type="email" class="form-control" id="q_email" name="email"
                       maxlength="254" autocomplete="email">
                <div class="invalid-feedback" id="q_email_err">Please enter a valid email address.</div>
                <div class="server-field-error" id="q_email_srv"></div>
              </div>

              {{-- Phone --}}
              <div class="col-md-6">
                <label class="form-label" for="q_phone">Phone Number</label>
                <input type="tel" class="form-control" id="q_phone" name="phone"
                       maxlength="20" autocomplete="tel">
                <div class="invalid-feedback" id="q_phone_err">Please enter a valid phone number.</div>
                <div class="server-field-error" id="q_phone_srv"></div>
              </div>

              {{-- Services --}}
              <div class="col-12">
                <label class="form-label">Services You Need</label>
                <div class="service-tag-group" id="quoteServiceTags">
                  <span class="service-tag active" data-value="Web & Mobile Apps">Web &amp; Mobile Apps</span>
                  <span class="service-tag" data-value="AI & Machine Learning">AI &amp; Machine Learning</span>
                  <span class="service-tag" data-value="Cloud & DevOps">Cloud &amp; DevOps</span>
                  <span class="service-tag" data-value="Custom Software">Custom Software</span>
                  <span class="service-tag" data-value="SaaS Product">SaaS Product</span>
                  <span class="service-tag" data-value="UI/UX Design">UI/UX Design</span>
                </div>
                {{-- Hidden inputs populated by JS --}}
                <div id="quoteServiceInputs"></div>
              </div>

              {{-- Budget --}}
              <div class="col-12">
                <label class="form-label">Estimated Budget</label>
                <div class="budget-group">
                  <div class="budget-pill">
                    <input type="radio" name="budget" id="bq1" value="<10k">
                    <label for="bq1">&lt; $10k</label>
                  </div>
                  <div class="budget-pill">
                    <input type="radio" name="budget" id="bq2" value="10-50k" checked>
                    <label for="bq2">$10k – $50k</label>
                  </div>
                  <div class="budget-pill">
                    <input type="radio" name="budget" id="bq3" value="50-100k">
                    <label for="bq3">$50k – $100k</label>
                  </div>
                  <div class="budget-pill">
                    <input type="radio" name="budget" id="bq4" value=">100k">
                    <label for="bq4">&gt; $100k</label>
                  </div>
                </div>
              </div>

              {{-- Description --}}
              <div class="col-12">
                <label class="form-label" for="q_description">
                  Project Description <span style="color:#e53935">*</span>
                </label>
                <textarea class="form-control" id="q_description" name="description"
                  rows="4" maxlength="3000"
                  placeholder="Briefly describe your project goals, features needed, and timeline (min. 20 characters)..."></textarea>
                <div class="char-counter" id="q_desc_counter">0 / 3000</div>
                <div class="invalid-feedback" id="q_description_err">Please describe your project (at least 20 characters).</div>
                <div class="server-field-error" id="q_description_srv"></div>
              </div>

            </div>{{-- /row --}}
          </form>
        </div>{{-- /quoteFormWrap --}}

        {{-- Success state --}}
        <div class="modal-success" id="quoteSuccess">
          <div class="success-icon"><i class="fas fa-check"></i></div>
          <h4>Quote Request Sent!</h4>
          <p>Thanks for reaching out. Our team will prepare a detailed quote and get back to you within 24 hours.</p>
        </div>

      </div>{{-- /modal-body-branded --}}

      {{-- Footer --}}
      <div class="modal-footer-branded" id="quoteFooter">
        <div style="display:flex;flex-direction:column;gap:6px;">
          {{-- Required-field progress indicator --}}
          <div class="form-progress" id="quoteProgress" title="Required fields completed">
            <div class="progress-step" id="qp1" title="Full name"></div>
            <div class="progress-step" id="qp2" title="Email"></div>
            <div class="progress-step" id="qp3" title="Description"></div>
          </div>
          <div class="footer-note">
            <i class="fas fa-lock"></i> Your info is 100% secure &amp; never shared.
          </div>
        </div>

        <div class="btn-submit-wrap" id="quoteBtnWrap">
          <div class="disabled-tip" id="quoteDisabledTip">Fill in required fields first</div>
          <button class="btn-modal-submit" id="quoteSendBtn" disabled>
            <span id="quoteBtnContent" style="display:flex;align-items:center;gap:8px;">
              Send Quote Request <i class="fas fa-arrow-right"></i>
            </span>
            <span class="submit-loader" id="quoteLoader">
              <span class="submit-loader-text">Sending…</span>
              <span class="submit-loader-bar"></span>
            </span>
          </button>
        </div>
      </div>{{-- /modal-footer-branded --}}

    </div>{{-- /modal-content --}}
  </div>
</div>


{{-- ── JAVASCRIPT ───────────────────────────────────────────────── --}}
<script>
(function () {
  'use strict';

  // ── Helpers ─────────────────────────────────────────────────────
  const $ = id => document.getElementById(id);
  const qf = id => document.querySelector(id);

  // Trim & get value
  const val = el => el.value.trim();

  // Email regex (RFC-ish)
  const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  // Phone regex — digits, spaces, +, -, (, ), min 7 chars
  const phoneRx = /^[\+\d\s\-\(\)]{7,20}$/;

  // ── DOM refs ────────────────────────────────────────────────────
  const form        = $('quoteForm');
  const sendBtn     = $('quoteSendBtn');
  const btnContent  = $('quoteBtnContent');
  const loader      = $('quoteLoader');
  const overlay     = $('quoteOverlay');
  const formWrap    = $('quoteFormWrap');
  const successBox  = $('quoteSuccess');
  const footer      = $('quoteFooter');
  const serverErr   = $('quoteServerError');
  const serverErrTx = $('quoteServerErrorText');
  const descCounter = $('q_desc_counter');
  const disabledTip = $('quoteDisabledTip');
  const modalEl     = $('quoteModal');

  // Required fields for progress tracking
  const nameInput = $('q_full_name');
  const emailInput= $('q_email');
  const descInput = $('q_description');
  const phoneInput= $('q_phone');

  // Progress dots
  const dots = [$('qp1'), $('qp2'), $('qp3')];

  // ── Character counter ────────────────────────────────────────────
  descInput.addEventListener('input', () => {
    const len = descInput.value.length;
    descCounter.textContent = len + ' / 3000';
    descCounter.classList.toggle('warn', len > 2800);
    updateProgress();
  });

  // ── Live validation on blur ──────────────────────────────────────
  nameInput.addEventListener('blur',  () => validateField(nameInput));
  emailInput.addEventListener('blur', () => validateField(emailInput));
  phoneInput.addEventListener('blur', () => validateField(phoneInput));
  descInput.addEventListener('blur',  () => validateField(descInput));

  // Re-validate on input (once field has been touched)
  [nameInput, emailInput, phoneInput, descInput].forEach(el => {
    el.addEventListener('input', () => {
      if (el.classList.contains('is-invalid') || el.classList.contains('is-valid')) {
        validateField(el);
      }
      updateProgress();
    });
  });

  // ── Service tags ─────────────────────────────────────────────────
  document.querySelectorAll('#quoteServiceTags .service-tag').forEach(tag => {
    tag.addEventListener('click', () => {
      tag.classList.toggle('active');
      syncServiceInputs();
    });
  });

  function syncServiceInputs() {
    const wrap = $('quoteServiceInputs');
    wrap.innerHTML = '';
    document.querySelectorAll('#quoteServiceTags .service-tag.active').forEach(tag => {
      const inp = document.createElement('input');
      inp.type = 'hidden';
      inp.name = 'services[]';
      inp.value = tag.dataset.value;
      wrap.appendChild(inp);
    });
  }
  syncServiceInputs(); // init

  // ── Validate a single field ──────────────────────────────────────
  function validateField(el) {
    clearServerError(el.id);

    if (el.id === 'q_full_name') {
      const v = val(el);
      if (!v) return setInvalid(el, 'q_full_name_err', 'Full name is required.');
      if (v.length < 2) return setInvalid(el, 'q_full_name_err', 'Name must be at least 2 characters.');
      if (!/^[\p{L}\s\-\.']+$/u.test(v)) return setInvalid(el, 'q_full_name_err', 'Name may only contain letters, spaces, hyphens and dots.');
      return setValid(el);
    }

    if (el.id === 'q_email') {
      const v = val(el);
      if (!v) return setInvalid(el, 'q_email_err', 'Email address is required.');
      if (!emailRx.test(v)) return setInvalid(el, 'q_email_err', 'Please enter a valid email address.');
      return setValid(el);
    }

    if (el.id === 'q_phone') {
      const v = val(el);
      if (v && !phoneRx.test(v)) return setInvalid(el, 'q_phone_err', 'Please enter a valid phone number.');
      if (v) return setValid(el);
      // Empty phone is optional — remove state
      el.classList.remove('is-valid', 'is-invalid');
      return true;
    }

    if (el.id === 'q_description') {
      const v = val(el);
      if (!v) return setInvalid(el, 'q_description_err', 'Project description is required.');
      if (v.length < 20) return setInvalid(el, 'q_description_err', `Need ${20 - v.length} more character${20 - v.length !== 1 ? 's' : ''} (min. 20).`);
      return setValid(el);
    }

    return true;
  }

  function setInvalid(el, errId, msg) {
    el.classList.remove('is-valid');
    el.classList.add('is-invalid');
    if (errId && $(errId)) $(errId).textContent = msg;
    updateProgress();
    return false;
  }

  function setValid(el) {
    el.classList.remove('is-invalid');
    el.classList.add('is-valid');
    updateProgress();
    return true;
  }

  // ── Clear server-side error for a field ──────────────────────────
  function clearServerError(fieldId) {
    const srvEl = $(fieldId + '_srv');
    if (srvEl) { srvEl.textContent = ''; srvEl.classList.remove('visible'); }
  }

  // ── Validate all required fields ─────────────────────────────────
  function validateAll() {
    const r1 = validateField(nameInput);
    const r2 = validateField(emailInput);
    const r3 = validateField(phoneInput);
    const r4 = validateField(descInput);
    return r1 && r2 && r3 && r4;
  }

  // ── Progress dots + button enable/disable ────────────────────────
  function updateProgress() {
    const nameOk  = val(nameInput).length >= 2;
    const emailOk = emailRx.test(val(emailInput));
    const descOk  = val(descInput).length >= 20;

    dots[0].classList.toggle('filled', nameOk);
    dots[1].classList.toggle('filled', emailOk);
    dots[2].classList.toggle('filled', descOk);

    const allOk = nameOk && emailOk && descOk;
    sendBtn.disabled = !allOk;

    // Update tooltip text
    if (!allOk) {
      const missing = [];
      if (!nameOk)  missing.push('name');
      if (!emailOk) missing.push('email');
      if (!descOk)  missing.push('description');
      disabledTip.textContent = 'Missing: ' + missing.join(', ');
    }
  }
  updateProgress(); // run once on load

  // ── Show/hide loading states ─────────────────────────────────────
  function showLoading() {
    sendBtn.disabled = true;
    btnContent.style.display = 'none';
    loader.style.display = 'flex';
    overlay.classList.add('active');
    hideServerError();
  }

  function hideLoading() {
    btnContent.style.display = 'flex';
    loader.style.display = 'none';
    overlay.classList.remove('active');
    updateProgress(); // re-evaluate disabled state
  }

  // ── Server error banner ──────────────────────────────────────────
  function showServerError(msg) {
    serverErrTx.textContent = msg;
    serverErr.classList.add('visible');
    // Scroll banner into view
    serverErr.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }

  function hideServerError() {
    serverErr.classList.remove('visible');
  }

  // ── Map Laravel validation errors to fields ──────────────────────
  function applyFieldErrors(errors) {
    const fieldMap = {
      full_name:   'q_full_name',
      company:     'q_company',
      email:       'q_email',
      phone:       'q_phone',
      description: 'q_description',
    };

    Object.entries(errors).forEach(([key, messages]) => {
      const baseKey = key.replace('services.', 'services');
      const fieldId = fieldMap[baseKey];
      if (fieldId) {
        const srvEl = $(fieldId + '_srv');
        const inputEl = $(fieldId);
        if (srvEl) {
          srvEl.textContent = Array.isArray(messages) ? messages[0] : messages;
          srvEl.classList.add('visible');
        }
        if (inputEl) {
          inputEl.classList.add('is-invalid');
          inputEl.classList.remove('is-valid');
        }
      }
    });
  }

  // ── SUBMIT ───────────────────────────────────────────────────────
  sendBtn.addEventListener('click', async () => {
    // 1. Clear previous errors
    hideServerError();
    ['q_full_name', 'q_company', 'q_email', 'q_phone', 'q_description'].forEach(id => {
      clearServerError(id);
    });

    // 2. Front-end validate
    if (!validateAll()) {
      // Scroll first invalid field into view
      const firstInvalid = form.querySelector('.is-invalid');
      if (firstInvalid) firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    // 3. Build FormData
    const data = new FormData(form);
    // CSRF from meta tag (standard Laravel setup)
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    if (csrfMeta) data.set('_token', csrfMeta.getAttribute('content'));

    // 4. Show loader
    showLoading();

    try {
      const response = await fetch('{{ route("quote.store") }}', {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json',
          // Don't set Content-Type — browser sets multipart boundary for FormData
          ...(csrfMeta ? { 'X-CSRF-TOKEN': csrfMeta.getAttribute('content') } : {}),
        },
        body: data,
      });

      const json = await response.json();

      if (response.ok && json.success) {
        // ── SUCCESS ──────────────────────────────────────────────
        hideLoading();
        // Small delay so overlay fade is visible before showing success
        await delay(300);

        formWrap.style.display = 'none';
        footer.style.display   = 'none';
        successBox.style.display = 'block';

        // Auto-close modal after 3 seconds
        setTimeout(() => {
          const bsModal = bootstrap.Modal.getInstance(modalEl);
          if (bsModal) bsModal.hide();
        }, 3000);

      } else if (response.status === 422 && json.errors) {
        // ── LARAVEL VALIDATION ERRORS ─────────────────────────
        hideLoading();
        applyFieldErrors(json.errors);
        const firstMsg = Object.values(json.errors)[0];
        showServerError(Array.isArray(firstMsg) ? firstMsg[0] : firstMsg);

      } else {
        // ── SERVER ERROR ──────────────────────────────────────
        hideLoading();
        showServerError(json.message || 'Something went wrong. Please try again.');
      }

    } catch (networkErr) {
      // ── NETWORK / FETCH ERROR ─────────────────────────────────
      hideLoading();
      showServerError('Network error — please check your connection and try again.');
      console.error('Quote submission error:', networkErr);
    }
  });

  // ── Reset modal when closed ──────────────────────────────────────
  modalEl.addEventListener('hidden.bs.modal', () => {
    // Only reset if not in success state (success auto-closes)
    if (successBox.style.display === 'block') {
      // Full reset after success close
      resetForm();
    } else {
      // Partial reset — keep filled values but clear errors
      clearAllErrors();
    }
  });

  function resetForm() {
    form.reset();
    formWrap.style.display = '';
    footer.style.display   = '';
    successBox.style.display = 'none';
    hideServerError();
    clearAllErrors();
    syncServiceInputs();
    descCounter.textContent = '0 / 3000';
    updateProgress();
  }

  function clearAllErrors() {
    form.querySelectorAll('.is-valid, .is-invalid').forEach(el => {
      el.classList.remove('is-valid', 'is-invalid');
    });
    form.querySelectorAll('.server-field-error').forEach(el => {
      el.textContent = ''; el.classList.remove('visible');
    });
    hideServerError();
  }

  // ── Utility ──────────────────────────────────────────────────────
  function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

})();
</script>