{{--
  ╔══════════════════════════════════════════════════════════════╗
  ║  SCHEDULE CALL MODAL  —  scheduleModal.blade.php            ║
  ║  Include anywhere:  @include('components.scheduleModal')    ║
  ║  Requires: Bootstrap 5, Font Awesome 6, CSRF meta tag       ║
  ╚══════════════════════════════════════════════════════════════╝
--}}

{{-- ── STYLES ──────────────────────────────────────────────────── --}}
<style>
/* ── Modal shell ──────────────────────────────────────────────── */
#scheduleModal .modal-content {
  border: none;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 30px 80px rgba(0,0,0,.38);
  position: relative;
}

/* ── Branded header ───────────────────────────────────────────── */
#scheduleModal .modal-header-branded {
  background: linear-gradient(135deg, #0d1b3e 0%, #1f3a6e 100%);
  padding: 24px 28px 20px;
  border-bottom: none;
  position: relative;
  overflow: hidden;
}
#scheduleModal .modal-header-branded::after {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 80% 50%, rgba(33,150,243,.15) 0%, transparent 70%);
  pointer-events: none;
}
#scheduleModal .modal-brand-icon {
  width: 48px; height: 48px;
  background: rgba(33,150,243,.2);
  border: 1px solid rgba(33,150,243,.4);
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 12px;
  position: relative; z-index: 1;
}
#scheduleModal .modal-brand-icon i { color: #2196f3; font-size: 1.3rem; }
#scheduleModal .modal-title-main {
  font-family: 'Nunito', sans-serif;
  font-weight: 900; font-size: 1.4rem; color: #fff;
  margin-bottom: 4px; position: relative; z-index: 1;
}
#scheduleModal .modal-title-sub {
  color: #aac4e0; font-size: 0.85rem;
  position: relative; z-index: 1;
}
#scheduleModal .modal-close-btn {
  position: absolute; top: 16px; right: 20px;
  background: rgba(255,255,255,.1);
  border: 1px solid rgba(255,255,255,.15);
  border-radius: 8px; width: 34px; height: 34px;
  display: flex; align-items: center; justify-content: center;
  color: #aac4e0; cursor: pointer;
  transition: background .2s, color .2s;
  z-index: 2; font-size: 1rem; line-height: 1; padding: 0;
}
#scheduleModal .modal-close-btn:hover { background: rgba(255,255,255,.22); color: #fff; }

/* ── Body ─────────────────────────────────────────────────────── */
#scheduleModal .modal-body-branded {
  background: #fff;
  padding: 28px 28px 10px;
  max-height: 70vh;
  overflow-y: auto;
}
/* Custom scrollbar */
#scheduleModal .modal-body-branded::-webkit-scrollbar { width: 5px; }
#scheduleModal .modal-body-branded::-webkit-scrollbar-track { background: #f4f6fb; }
#scheduleModal .modal-body-branded::-webkit-scrollbar-thumb { background: #b0c4e8; border-radius: 4px; }

/* ── Form labels & inputs ─────────────────────────────────────── */
#scheduleModal .form-label {
  font-weight: 700; font-size: 0.78rem;
  color: #1a1a2e; text-transform: uppercase;
  letter-spacing: .5px; margin-bottom: 5px;
}
#scheduleModal .form-control,
#scheduleModal .form-select {
  border: 1.5px solid #e2e8f0;
  border-radius: 8px; padding: 10px 14px;
  font-size: 0.9rem; color: #1a1a2e;
  background: #fafbfd;
  transition: border-color .2s, box-shadow .2s;
}
#scheduleModal .form-control:focus,
#scheduleModal .form-select:focus {
  border-color: #1a73e8;
  box-shadow: 0 0 0 3px rgba(26,115,232,.12);
  background: #fff; outline: none;
}
#scheduleModal .form-control.is-valid  { border-color: #4caf50; box-shadow: none; background: #fafbfd; }
#scheduleModal .form-control.is-invalid,
#scheduleModal .form-select.is-invalid { border-color: #e53935; box-shadow: none; background: #fafbfd; }
#scheduleModal .invalid-feedback {
  font-size: 0.75rem; color: #e53935;
  margin-top: 4px; display: none;
}
#scheduleModal .form-control.is-invalid  ~ .invalid-feedback,
#scheduleModal .form-control.is-invalid  + .invalid-feedback,
#scheduleModal .form-select.is-invalid   + .invalid-feedback  { display: block; }
#scheduleModal .server-field-error {
  font-size: 0.75rem; color: #e53935;
  margin-top: 4px; display: none;
}
#scheduleModal .server-field-error.visible { display: block; }

/* Date input — remove native calendar icon styling */
#scheduleModal input[type="date"] { cursor: pointer; }

/* ── Time slot grid ───────────────────────────────────────────── */
.sch-time-group {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 8px;
}
.sch-time-slot input[type="radio"] { display: none; }
.sch-time-slot label {
  display: flex; align-items: center; justify-content: center;
  padding: 9px 8px;
  border: 1.5px solid #e2e8f0;
  border-radius: 8px; font-size: 0.82rem; font-weight: 600;
  color: #6c757d; cursor: pointer;
  transition: all .2s; background: #fafbfd; margin: 0;
  gap: 5px;
}
.sch-time-slot label i { font-size: 0.7rem; }
.sch-time-slot input[type="radio"]:checked + label {
  border-color: #1a73e8; color: #fff; background: #1a73e8;
}
.sch-time-slot label:hover { border-color: #1a73e8; color: #1a73e8; background: #edf4fe; }
.sch-time-slot input[type="radio"]:checked + label:hover { color: #fff; }

/* ── Video call toggle ────────────────────────────────────────── */
.video-toggle-wrap {
  background: #f4f6fb;
  border: 1.5px solid #e2e8f0;
  border-radius: 10px;
  padding: 14px 16px;
  transition: border-color .2s;
}
.video-toggle-wrap.active { border-color: #1a73e8; background: #edf4fe; }

.video-toggle-row {
  display: flex; align-items: center; justify-content: space-between;
}
.video-toggle-label {
  display: flex; align-items: center; gap: 10px;
}
.video-toggle-label .vtl-icon {
  width: 36px; height: 36px;
  background: linear-gradient(135deg, #1a73e8, #2196f3);
  border-radius: 9px;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.video-toggle-label .vtl-icon i { color: #fff; font-size: 0.95rem; }
.video-toggle-label .vtl-text strong {
  display: block; font-size: 0.88rem; font-weight: 700;
  color: #1a1a2e; margin-bottom: 1px;
}
.video-toggle-label .vtl-text span { font-size: 0.76rem; color: #6c757d; }

/* iOS-style toggle switch */
.toggle-switch { position: relative; display: inline-block; width: 46px; height: 26px; flex-shrink: 0; }
.toggle-switch input { opacity: 0; width: 0; height: 0; }
.toggle-slider {
  position: absolute; inset: 0;
  background: #d1d8e0; border-radius: 26px;
  cursor: pointer; transition: background .25s;
}
.toggle-slider::before {
  content: '';
  position: absolute; left: 3px; top: 3px;
  width: 20px; height: 20px;
  background: #fff; border-radius: 50%;
  transition: transform .25s;
  box-shadow: 0 1px 4px rgba(0,0,0,.2);
}
.toggle-switch input:checked + .toggle-slider { background: #1a73e8; }
.toggle-switch input:checked + .toggle-slider::before { transform: translateX(20px); }

/* ── Video platform cards ─────────────────────────────────────── */
.video-platforms-wrap {
  margin-top: 14px;
  display: none; /* shown by JS */
  animation: slideDown .25s ease;
}
.video-platforms-wrap.visible { display: block; }

@keyframes slideDown {
  from { opacity: 0; transform: translateY(-8px); }
  to   { opacity: 1; transform: translateY(0); }
}

.platform-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 8px;
}
.platform-card input[type="radio"] { display: none; }
.platform-card label {
  display: flex; align-items: center; gap: 10px;
  padding: 11px 14px;
  border: 1.5px solid #e2e8f0;
  border-radius: 10px;
  cursor: pointer;
  transition: all .2s;
  background: #fff; margin: 0;
}
.platform-card label:hover { border-color: #1a73e8; background: #edf4fe; }
.platform-card input[type="radio"]:checked + label {
  border-color: #1a73e8;
  background: #edf4fe;
  box-shadow: 0 0 0 3px rgba(26,115,232,.1);
}
.platform-icon {
  width: 34px; height: 34px;
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0; font-size: 1.1rem;
}
.platform-icon.zoom  { background: #e8f4fd; }
.platform-icon.teams { background: #ede7f6; }
.platform-icon.meet  { background: #e8f5e9; }
.platform-icon.webex { background: #fff3e0; }

/* Platform SVG icons via CSS background */
.pi-zoom  { background: #2D8CFF; }
.pi-teams { background: #5558AF; }
.pi-meet  { background: #1A73E8; }
.pi-webex { background: #00BEF2; }

.platform-icon svg { width: 20px; height: 20px; }

.platform-info strong {
  display: block; font-size: 0.83rem; font-weight: 700; color: #1a1a2e;
}
.platform-info span { font-size: 0.73rem; color: #6c757d; }

/* Platform error */
.platform-error {
  font-size: 0.75rem; color: #e53935;
  margin-top: 6px; display: none;
}
.platform-error.visible { display: block; }

/* ── Server error banner ──────────────────────────────────────── */
#scheduleServerError {
  display: none;
  background: #fdecea; border: 1.5px solid #f5c6c5;
  border-radius: 8px; padding: 10px 14px;
  font-size: 0.83rem; color: #b71c1c;
  margin-bottom: 16px;
  align-items: flex-start; gap: 8px;
}
#scheduleServerError.visible { display: flex; }
#scheduleServerError i { flex-shrink: 0; margin-top: 2px; }

/* ── Footer ───────────────────────────────────────────────────── */
#scheduleModal .modal-footer-branded {
  background: #fff;
  border-top: 1px solid #e2e8f0;
  padding: 16px 28px 24px;
  display: flex; align-items: center;
  justify-content: space-between; gap: 12px;
}
#scheduleModal .footer-note {
  font-size: 0.75rem; color: #6c757d;
  display: flex; align-items: center; gap: 5px;
}

/* Progress dots */
.sch-progress { display: flex; gap: 6px; align-items: center; margin-bottom: 6px; }
.sch-dot {
  width: 8px; height: 8px; border-radius: 50%;
  background: #e2e8f0;
  transition: background .3s, transform .3s;
}
.sch-dot.filled { background: #1a73e8; transform: scale(1.25); }

/* ── Submit button ────────────────────────────────────────────── */
.btn-sch-submit {
  background: #1a73e8; color: #fff;
  border: none; border-radius: 8px;
  padding: 11px 26px;
  font-weight: 700; font-size: 0.92rem;
  transition: background .2s, transform .15s, opacity .2s;
  display: flex; align-items: center; gap: 8px;
  white-space: nowrap; cursor: pointer;
  min-width: 190px; justify-content: center;
  position: relative;
}
.btn-sch-submit:hover:not(:disabled) { background: #1558b0; transform: translateY(-1px); }
.btn-sch-submit:disabled { background: #b0c4e8; cursor: not-allowed; transform: none; }

/* Disabled tooltip wrapper */
.sch-btn-wrap { position: relative; display: inline-block; }
.sch-btn-wrap .disabled-tip {
  display: none; position: absolute;
  bottom: calc(100% + 8px); right: 0;
  background: #1a1a2e; color: #fff;
  font-size: 0.72rem; font-weight: 600;
  padding: 6px 12px; border-radius: 6px;
  white-space: nowrap; pointer-events: none; z-index: 10;
}
.sch-btn-wrap .disabled-tip::after {
  content: ''; position: absolute;
  top: 100%; right: 16px;
  border: 5px solid transparent;
  border-top-color: #1a1a2e;
}
.sch-btn-wrap:hover .disabled-tip { display: block; }

/* ── Inline bar loader on button ──────────────────────────────── */
.sch-btn-loader {
  display: none; flex-direction: column;
  align-items: center; gap: 5px; width: 100%;
}
.sch-btn-loader-text { font-size: 0.82rem; font-weight: 600; color: #fff; }
.sch-btn-loader-bar {
  width: 100%; height: 3px;
  background: rgba(255,255,255,.25);
  border-radius: 3px; overflow: hidden; position: relative;
}
.sch-btn-loader-bar::after {
  content: ''; position: absolute;
  top: 0; left: -40%; width: 40%; height: 100%;
  background: #fff; border-radius: 3px;
  animation: schBarSlide .9s ease-in-out infinite;
}
@keyframes schBarSlide {
  0%   { left: -40%; }
  100% { left: 110%; }
}

/* ── Full modal overlay loader ────────────────────────────────── */
#scheduleOverlay {
  display: none; position: absolute; inset: 0;
  background: rgba(13,27,62,.74);
  backdrop-filter: blur(3px);
  z-index: 10;
  flex-direction: column;
  align-items: center; justify-content: center;
  gap: 20px; border-radius: 16px;
}
#scheduleOverlay.active { display: flex; }
.sch-overlay-dots { display: flex; gap: 10px; }
.sch-overlay-dot {
  width: 13px; height: 13px;
  background: #2196f3; border-radius: 50%;
  animation: schDotBounce .8s ease-in-out infinite;
}
.sch-overlay-dot:nth-child(2) { animation-delay: .16s; background: #64b5f6; }
.sch-overlay-dot:nth-child(3) { animation-delay: .32s; background: #90caf9; }
@keyframes schDotBounce {
  0%, 80%, 100% { transform: scale(0.7); opacity: .5; }
  40%            { transform: scale(1.25); opacity: 1; }
}
.sch-overlay-label {
  font-family: 'Nunito', sans-serif;
  font-weight: 800; font-size: 1rem; color: #fff; letter-spacing: .5px;
}
.sch-overlay-sub { font-size: 0.78rem; color: #aac4e0; margin-top: -12px; }

/* ── Success state ────────────────────────────────────────────── */
#scheduleModal .modal-success {
  display: none; text-align: center; padding: 44px 28px;
}
#scheduleModal .success-icon {
  width: 74px; height: 74px;
  background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 20px;
  box-shadow: 0 0 0 14px rgba(76,175,80,.08);
  animation: schSuccessPop .45s cubic-bezier(.34,1.56,.64,1) both;
}
@keyframes schSuccessPop {
  from { transform: scale(0); opacity: 0; }
  to   { transform: scale(1); opacity: 1; }
}
#scheduleModal .success-icon i { color: #4caf50; font-size: 2.1rem; }
#scheduleModal .modal-success h4 {
  font-family: 'Nunito', sans-serif; font-weight: 900;
  color: #1a1a2e; margin-bottom: 8px; font-size: 1.25rem;
}
#scheduleModal .modal-success p { color: #6c757d; font-size: 0.88rem; line-height: 1.6; }
.success-detail-cards {
  display: flex; gap: 10px; justify-content: center;
  flex-wrap: wrap; margin-top: 20px;
}
.success-detail-card {
  background: #f4f6fb; border: 1px solid #e2e8f0;
  border-radius: 10px; padding: 10px 16px;
  font-size: 0.78rem; color: #1a1a2e;
  display: flex; align-items: center; gap: 7px;
}
.success-detail-card i { color: #1a73e8; }
</style>


{{-- ── MODAL HTML ──────────────────────────────────────────────── --}}
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      {{-- Full overlay loader --}}
      <div id="scheduleOverlay">
        <div class="sch-overlay-dots">
          <div class="sch-overlay-dot"></div>
          <div class="sch-overlay-dot"></div>
          <div class="sch-overlay-dot"></div>
        </div>
        <div class="sch-overlay-label">Booking your call…</div>
        <div class="sch-overlay-sub">Please don't close this window</div>
      </div>

      {{-- Header --}}
      <div class="modal-header-branded">
        <button class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
        <div class="modal-brand-icon"><i class="fas fa-phone-alt"></i></div>
        <div class="modal-title-main">Schedule a Call</div>
        <div class="modal-title-sub">Pick a date and time that works best for you.</div>
      </div>

      {{-- Body --}}
      <div class="modal-body-branded">

        {{-- Server error banner --}}
        <div id="scheduleServerError">
          <i class="fas fa-exclamation-circle"></i>
          <span id="scheduleServerErrorText">Something went wrong. Please try again.</span>
        </div>

        {{-- Form --}}
        <div id="scheduleFormWrap">
          <form class="modal-form" id="scheduleForm" novalidate autocomplete="off">
            @csrf
            <div class="row g-3">

              {{-- Full Name --}}
              <div class="col-md-6">
                <label class="form-label" for="sc_name">Full Name <span style="color:#e53935">*</span></label>
                <input type="text" class="form-control" id="sc_name" name="full_name"
                       maxlength="100" autocomplete="name">
                <div class="invalid-feedback" id="sc_name_err">Please enter your full name.</div>
                <div class="server-field-error" id="sc_name_srv"></div>
              </div>

              {{-- Email --}}
              <div class="col-md-6">
                <label class="form-label" for="sc_email">Email Address <span style="color:#e53935">*</span></label>
                <input type="email" class="form-control" id="sc_email" name="email"
                       maxlength="254" autocomplete="email">
                <div class="invalid-feedback" id="sc_email_err">Please enter a valid email address.</div>
                <div class="server-field-error" id="sc_email_srv"></div>
              </div>

              {{-- Phone --}}
              <div class="col-md-6">
                <label class="form-label" for="sc_phone">Phone Number</label>
                <input type="tel" class="form-control" id="sc_phone" name="phone"
                       maxlength="20" autocomplete="tel">
                <div class="invalid-feedback" id="sc_phone_err">Please enter a valid phone number.</div>
                <div class="server-field-error" id="sc_phone_srv"></div>
              </div>

              {{-- Preferred Date --}}
              <div class="col-md-6">
                <label class="form-label" for="sc_date">Preferred Date <span style="color:#e53935">*</span></label>
                <input type="date" class="form-control" id="sc_date" name="preferred_date">
                <div class="invalid-feedback" id="sc_date_err">Please select a future date (weekdays only).</div>
                <div class="server-field-error" id="sc_date_srv"></div>
              </div>

              {{-- Timezone --}}
              <div class="col-md-6">
                <label class="form-label" for="sc_timezone">Timezone <span style="color:#e53935">*</span></label>
                <select class="form-select" id="sc_timezone" name="timezone">
                  <option value="">Select your timezone</option>
                  <optgroup label="Americas">
                    <option value="EST">EST — Eastern (UTC−5)</option>
                    <option value="CST">CST — Central (UTC−6)</option>
                    <option value="MST">MST — Mountain (UTC−7)</option>
                    <option value="PST">PST — Pacific (UTC−8)</option>
                  </optgroup>
                  <optgroup label="Europe">
                    <option value="GMT">GMT — London (UTC+0)</option>
                    <option value="CET">CET — Central Europe (UTC+1)</option>
                    <option value="EET">EET — Eastern Europe (UTC+2)</option>
                  </optgroup>
                  <optgroup label="Asia / Pacific">
                    <option value="IST">IST — India (UTC+5:30)</option>
                    <option value="SGT">SGT — Singapore (UTC+8)</option>
                    <option value="JST">JST — Japan (UTC+9)</option>
                    <option value="AEST">AEST — Sydney (UTC+10)</option>
                  </optgroup>
                </select>
                <div class="invalid-feedback" id="sc_timezone_err">Please select your timezone.</div>
                <div class="server-field-error" id="sc_timezone_srv"></div>
              </div>

              {{-- Time Slot --}}
              <div class="col-md-6">
                <label class="form-label">Preferred Time <span style="color:#e53935">*</span></label>
                <div class="sch-time-group" id="scTimeGroup">
                  <div class="sch-time-slot">
                    <input type="radio" name="time_slot" id="ts1" value="09:00">
                    <label for="ts1"><i class="fas fa-sun"></i> 9:00 AM</label>
                  </div>
                  <div class="sch-time-slot">
                    <input type="radio" name="time_slot" id="ts2" value="10:00">
                    <label for="ts2"><i class="fas fa-sun"></i> 10:00 AM</label>
                  </div>
                  <div class="sch-time-slot">
                    <input type="radio" name="time_slot" id="ts3" value="11:00">
                    <label for="ts3"><i class="fas fa-sun"></i> 11:00 AM</label>
                  </div>
                  <div class="sch-time-slot">
                    <input type="radio" name="time_slot" id="ts4" value="13:00">
                    <label for="ts4"><i class="fas fa-cloud-sun"></i> 1:00 PM</label>
                  </div>
                  <div class="sch-time-slot">
                    <input type="radio" name="time_slot" id="ts5" value="14:00">
                    <label for="ts5"><i class="fas fa-cloud-sun"></i> 2:00 PM</label>
                  </div>
                  <div class="sch-time-slot">
                    <input type="radio" name="time_slot" id="ts6" value="15:00">
                    <label for="ts6"><i class="fas fa-cloud-sun"></i> 3:00 PM</label>
                  </div>
                </div>
                <div class="invalid-feedback" id="sc_timeslot_err" style="display:none;">Please select a preferred time slot.</div>
                <div class="server-field-error" id="sc_timeslot_srv"></div>
              </div>

              {{-- Call Topic --}}
              <div class="col-12">
                <label class="form-label" for="sc_topic">Call Topic <span style="color:#e53935">*</span></label>
                <select class="form-select" id="sc_topic" name="call_topic">
                  <option value="">What would you like to discuss?</option>
                  <option value="New Project / MVP">New Project / MVP</option>
                  <option value="Existing Project Help">Existing Project Help</option>
                  <option value="Pricing & Packages">Pricing &amp; Packages</option>
                  <option value="Partnership Opportunity">Partnership Opportunity</option>
                  <option value="General Inquiry">General Inquiry</option>
                </select>
                <div class="invalid-feedback" id="sc_topic_err">Please select a call topic.</div>
                <div class="server-field-error" id="sc_topic_srv"></div>
              </div>

              {{-- ── VIDEO CALL TOGGLE ──────────────────────────── --}}
              <div class="col-12">
                <div class="video-toggle-wrap" id="videoToggleWrap">
                  <div class="video-toggle-row">
                    <div class="video-toggle-label">
                      <div class="vtl-icon"><i class="fas fa-video"></i></div>
                      <div class="vtl-text">
                        <strong>Would you prefer a video call?</strong>
                        <span>We can meet face-to-face via your preferred platform</span>
                      </div>
                    </div>
                    <label class="toggle-switch" title="Toggle video call">
                      <input type="checkbox" id="sc_video_toggle" name="wants_video" value="1">
                      <span class="toggle-slider"></span>
                    </label>
                  </div>

                  {{-- Platform picker — shown when toggle is ON --}}
                  <div class="video-platforms-wrap" id="videoPlatformsWrap">
                    <p style="font-size:0.78rem;color:#6c757d;margin:10px 0 10px;font-weight:600;">
                      Choose your preferred platform <span style="color:#e53935">*</span>
                    </p>
                    <div class="platform-grid">

                      {{-- Zoom --}}
                      <div class="platform-card">
                        <input type="radio" name="video_platform" id="vp_zoom" value="Zoom">
                        <label for="vp_zoom">
                          <div class="platform-icon">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect width="24" height="24" rx="6" fill="#2D8CFF"/>
                              <path d="M4 9.5C4 8.67 4.67 8 5.5 8H13C13.83 8 14.5 8.67 14.5 9.5V14.5C14.5 15.33 13.83 16 13 16H5.5C4.67 16 4 15.33 4 14.5V9.5Z" fill="white"/>
                              <path d="M15.5 10.75L20 8V16L15.5 13.25V10.75Z" fill="white"/>
                            </svg>
                          </div>
                          <div class="platform-info">
                            <strong>Zoom</strong>
                            <span>Link sent via email</span>
                          </div>
                        </label>
                      </div>

                      {{-- Microsoft Teams --}}
                      <div class="platform-card">
                        <input type="radio" name="video_platform" id="vp_teams" value="Microsoft Teams">
                        <label for="vp_teams">
                          <div class="platform-icon">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect width="24" height="24" rx="6" fill="#5558AF"/>
                              <path d="M14.5 9.5C14.5 10.33 13.83 11 13 11C12.17 11 11.5 10.33 11.5 9.5C11.5 8.67 12.17 8 13 8C13.83 8 14.5 8.67 14.5 9.5Z" fill="white"/>
                              <path d="M10.5 11H15.5C16.05 11 16.5 11.45 16.5 12V15C16.5 15.55 16.05 16 15.5 16H10.5C9.95 16 9.5 15.55 9.5 15V12C9.5 11.45 9.95 11 10.5 11Z" fill="white"/>
                              <circle cx="9" cy="9" r="1.5" fill="#B3B3FF"/>
                              <path d="M7.5 11H10V14.5H8.5C7.95 14.5 7.5 14.05 7.5 13.5V11Z" fill="#B3B3FF"/>
                            </svg>
                          </div>
                          <div class="platform-info">
                            <strong>Microsoft Teams</strong>
                            <span>Link sent via email</span>
                          </div>
                        </label>
                      </div>

                      {{-- Google Meet --}}
                      <div class="platform-card">
                        <input type="radio" name="video_platform" id="vp_meet" value="Google Meet">
                        <label for="vp_meet">
                          <div class="platform-icon">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect width="24" height="24" rx="6" fill="#1A73E8"/>
                              <path d="M4 9.5C4 8.67 4.67 8 5.5 8H12C12.83 8 13.5 8.67 13.5 9.5V14.5C13.5 15.33 12.83 16 12 16H5.5C4.67 16 4 15.33 4 14.5V9.5Z" fill="white"/>
                              <path d="M14.5 10.75L19 8V16L14.5 13.25V10.75Z" fill="#34A853"/>
                            </svg>
                          </div>
                          <div class="platform-info">
                            <strong>Google Meet</strong>
                            <span>Link sent via email</span>
                          </div>
                        </label>
                      </div>

                      {{-- Webex --}}
                      <div class="platform-card">
                        <input type="radio" name="video_platform" id="vp_webex" value="Webex">
                        <label for="vp_webex">
                          <div class="platform-icon">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect width="24" height="24" rx="6" fill="#00BEF2"/>
                              <circle cx="12" cy="12" r="4" fill="white"/>
                              <circle cx="12" cy="12" r="2" fill="#00BEF2"/>
                              <path d="M12 6V8M12 16V18M6 12H8M16 12H18" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                          </div>
                          <div class="platform-info">
                            <strong>Cisco Webex</strong>
                            <span>Link sent via email</span>
                          </div>
                        </label>
                      </div>

                    </div>{{-- /platform-grid --}}
                    <div class="platform-error" id="sc_platform_err">Please select a video platform.</div>
                    <div class="server-field-error" id="sc_platform_srv"></div>
                  </div>{{-- /video-platforms-wrap --}}
                </div>{{-- /video-toggle-wrap --}}
              </div>

              {{-- Notes --}}
              <div class="col-12">
                <label class="form-label" for="sc_notes">Anything Else We Should Know?</label>
                <textarea class="form-control" id="sc_notes" name="notes" rows="2"
                          maxlength="1000"
                          placeholder="Optional context to help us prepare for the call..."></textarea>
                <div style="font-size:0.72rem;color:#6c757d;text-align:right;margin-top:3px;" id="sc_notes_counter">0 / 1000</div>
              </div>

            </div>{{-- /row --}}
          </form>
        </div>{{-- /scheduleFormWrap --}}

        {{-- Success state --}}
        <div class="modal-success" id="scheduleSuccess">
          <div class="success-icon"><i class="fas fa-check"></i></div>
          <h4>Call Scheduled!</h4>
          <p>You're all set. We'll send a calendar invite and a confirmation email to your inbox shortly.</p>
          <div class="success-detail-cards" id="scheduleSuccessDetails">
            {{-- Populated by JS with confirmed date/time/platform --}}
          </div>
        </div>

      </div>{{-- /modal-body-branded --}}

      {{-- Footer --}}
      <div class="modal-footer-branded" id="scheduleFooter">
        <div>
          {{-- Progress dots: name, email, date, timezone, timeslot, topic = 6 required fields --}}
          <div class="sch-progress">
            <div class="sch-dot" id="sdp1" title="Full name"></div>
            <div class="sch-dot" id="sdp2" title="Email"></div>
            <div class="sch-dot" id="sdp3" title="Date"></div>
            <div class="sch-dot" id="sdp4" title="Timezone"></div>
            <div class="sch-dot" id="sdp5" title="Time slot"></div>
            <div class="sch-dot" id="sdp6" title="Topic"></div>
          </div>
          <div class="footer-note">
            <i class="fas fa-calendar-check" style="color:#2196f3;"></i>
            You'll receive a calendar invite via email.
          </div>
        </div>

        <div class="sch-btn-wrap">
          <div class="disabled-tip" id="schDisabledTip">Fill in required fields first</div>
          <button class="btn-sch-submit" id="schSendBtn" disabled>
            <span id="schBtnContent" style="display:flex;align-items:center;gap:8px;">
              Confirm My Call <i class="fas fa-arrow-right"></i>
            </span>
            <span class="sch-btn-loader" id="schLoader">
              <span class="sch-btn-loader-text">Booking…</span>
              <span class="sch-btn-loader-bar"></span>
            </span>
          </button>
        </div>
      </div>

    </div>{{-- /modal-content --}}
  </div>
</div>


{{-- ── JAVASCRIPT ───────────────────────────────────────────────── --}}
<script>
(function () {
  'use strict';

  const $  = id => document.getElementById(id);
  const val = el => el ? el.value.trim() : '';

  const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  const phoneRx = /^[\+\d\s\-\(\)]{7,20}$/;

  // ── DOM refs ─────────────────────────────────────────────────────
  const form          = $('scheduleForm');
  const sendBtn       = $('schSendBtn');
  const btnContent    = $('schBtnContent');
  const loader        = $('schLoader');
  const overlay       = $('scheduleOverlay');
  const formWrap      = $('scheduleFormWrap');
  const successBox    = $('scheduleSuccess');
  const footer        = $('scheduleFooter');
  const serverErr     = $('scheduleServerError');
  const serverErrTx   = $('scheduleServerErrorText');
  const disabledTip   = $('schDisabledTip');
  const modalEl       = $('scheduleModal');
  const videoToggle   = $('sc_video_toggle');
  const videoWrap     = $('videoPlatformsWrap');
  const videoBox      = $('videoToggleWrap');

  // Required field refs
  const nameInput     = $('sc_name');
  const emailInput    = $('sc_email');
  const phoneInput    = $('sc_phone');
  const dateInput     = $('sc_date');
  const timezoneInput = $('sc_timezone');
  const topicInput    = $('sc_topic');

  // Progress dots
  const dots = [$('sdp1'), $('sdp2'), $('sdp3'), $('sdp4'), $('sdp5'), $('sdp6')];

  // ── Set min date to today, block weekends ─────────────────────────
  (function initDatePicker() {
    const today = new Date();
    const pad   = n => String(n).padStart(2, '0');
    const toISO = d => `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}`;
    dateInput.min = toISO(today);

    dateInput.addEventListener('input', () => {
      const d = new Date(dateInput.value + 'T00:00:00');
      const dow = d.getDay();
      if (dow === 0 || dow === 6) {
        setInvalid(dateInput, 'sc_date_err', 'We don\'t schedule calls on weekends. Please pick a weekday.');
      } else {
        validateField(dateInput);
      }
      updateProgress();
    });
  })();

  // ── Character counter for notes ───────────────────────────────────
  $('sc_notes').addEventListener('input', function() {
    $('sc_notes_counter').textContent = this.value.length + ' / 1000';
  });

  // ── Video call toggle ─────────────────────────────────────────────
  videoToggle.addEventListener('change', function() {
    if (this.checked) {
      videoBox.classList.add('active');
      videoWrap.classList.add('visible');
    } else {
      videoBox.classList.remove('active');
      videoWrap.classList.remove('visible');
      // Clear platform selection & errors
      document.querySelectorAll('input[name="video_platform"]').forEach(r => r.checked = false);
      hidePlatformError();
    }
    updateProgress();
  });

  // ── Live validate on blur ─────────────────────────────────────────
  [nameInput, emailInput, phoneInput, dateInput].forEach(el => {
    el.addEventListener('blur', () => validateField(el));
    el.addEventListener('input', () => {
      if (el.classList.contains('is-invalid') || el.classList.contains('is-valid')) {
        validateField(el);
      }
      updateProgress();
    });
  });

  [timezoneInput, topicInput].forEach(el => {
    el.addEventListener('change', () => { validateField(el); updateProgress(); });
  });

  document.querySelectorAll('input[name="time_slot"]').forEach(r => {
    r.addEventListener('change', () => { hideTimeError(); updateProgress(); });
  });

  document.querySelectorAll('input[name="video_platform"]').forEach(r => {
    r.addEventListener('change', () => { hidePlatformError(); updateProgress(); });
  });

  // ── Validate single field ─────────────────────────────────────────
  function validateField(el) {
    clearServerError(el.id);

    if (el.id === 'sc_name') {
      const v = val(el);
      if (!v)         return setInvalid(el, 'sc_name_err', 'Full name is required.');
      if (v.length < 2) return setInvalid(el, 'sc_name_err', 'Name must be at least 2 characters.');
      if (!/^[\p{L}\s\-\.']+$/u.test(v))
        return setInvalid(el, 'sc_name_err', 'Name may only contain letters, spaces, hyphens and dots.');
      return setValid(el);
    }

    if (el.id === 'sc_email') {
      const v = val(el);
      if (!v)              return setInvalid(el, 'sc_email_err', 'Email address is required.');
      if (!emailRx.test(v)) return setInvalid(el, 'sc_email_err', 'Please enter a valid email address.');
      return setValid(el);
    }

    if (el.id === 'sc_phone') {
      const v = val(el);
      if (v && !phoneRx.test(v)) return setInvalid(el, 'sc_phone_err', 'Please enter a valid phone number (7–20 digits).');
      el.classList.remove('is-invalid');
      if (v) setValid(el); else el.classList.remove('is-valid');
      return true;
    }

    if (el.id === 'sc_date') {
      const v = val(el);
      if (!v) return setInvalid(el, 'sc_date_err', 'Please select a preferred date.');
      const chosen = new Date(v + 'T00:00:00');
      const today  = new Date(); today.setHours(0,0,0,0);
      if (chosen < today) return setInvalid(el, 'sc_date_err', 'Please select a future date.');
      if (chosen.getDay() === 0 || chosen.getDay() === 6)
        return setInvalid(el, 'sc_date_err', 'We don\'t schedule on weekends. Please pick a weekday.');
      return setValid(el);
    }

    if (el.id === 'sc_timezone') {
      if (!val(el)) return setSelectInvalid(el, 'sc_timezone_err', 'Please select your timezone.');
      return setSelectValid(el);
    }

    if (el.id === 'sc_topic') {
      if (!val(el)) return setSelectInvalid(el, 'sc_topic_err', 'Please select a call topic.');
      return setSelectValid(el);
    }

    return true;
  }

  function setInvalid(el, errId, msg) {
    el.classList.remove('is-valid'); el.classList.add('is-invalid');
    if ($(errId)) $(errId).textContent = msg;
    updateProgress(); return false;
  }
  function setValid(el) {
    el.classList.remove('is-invalid'); el.classList.add('is-valid');
    updateProgress(); return true;
  }
  function setSelectInvalid(el, errId, msg) {
    el.classList.remove('is-valid'); el.classList.add('is-invalid');
    if ($(errId)) { $(errId).textContent = msg; $(errId).style.display = 'block'; }
    updateProgress(); return false;
  }
  function setSelectValid(el) {
    el.classList.remove('is-invalid'); el.classList.add('is-valid');
    const errEl = document.getElementById(el.id + '_err');
    if (errEl) errEl.style.display = 'none';
    updateProgress(); return true;
  }

  function clearServerError(fieldId) {
    const el = $(fieldId + '_srv');
    if (el) { el.textContent = ''; el.classList.remove('visible'); }
  }

  function hideTimeError() {
    const e = $('sc_timeslot_err');
    if (e) e.style.display = 'none';
  }
  function showTimeError() {
    const e = $('sc_timeslot_err');
    if (e) e.style.display = 'block';
  }
  function hidePlatformError() {
    const e = $('sc_platform_err');
    if (e) e.classList.remove('visible');
  }
  function showPlatformError() {
    const e = $('sc_platform_err');
    if (e) e.classList.add('visible');
  }

  // ── Check all required fields for progress/button state ──────────
  function updateProgress() {
    const nameOk     = val(nameInput).length >= 2;
    const emailOk    = emailRx.test(val(emailInput));
    const dateOk     = (() => {
      const v = val(dateInput);
      if (!v) return false;
      const d = new Date(v + 'T00:00:00');
      const t = new Date(); t.setHours(0,0,0,0);
      return d >= t && d.getDay() !== 0 && d.getDay() !== 6;
    })();
    const tzOk       = val(timezoneInput) !== '';
    const slotOk     = !!document.querySelector('input[name="time_slot"]:checked');
    const topicOk    = val(topicInput) !== '';

    dots[0].classList.toggle('filled', nameOk);
    dots[1].classList.toggle('filled', emailOk);
    dots[2].classList.toggle('filled', dateOk);
    dots[3].classList.toggle('filled', tzOk);
    dots[4].classList.toggle('filled', slotOk);
    dots[5].classList.toggle('filled', topicOk);

    const allOk = nameOk && emailOk && dateOk && tzOk && slotOk && topicOk;
    sendBtn.disabled = !allOk;

    if (!allOk) {
      const miss = [];
      if (!nameOk)  miss.push('name');
      if (!emailOk) miss.push('email');
      if (!dateOk)  miss.push('date');
      if (!tzOk)    miss.push('timezone');
      if (!slotOk)  miss.push('time slot');
      if (!topicOk) miss.push('topic');
      disabledTip.textContent = 'Missing: ' + miss.join(', ');
    }
  }
  updateProgress();

  // ── Validate everything before submit ─────────────────────────────
  function validateAll() {
    const r1 = validateField(nameInput);
    const r2 = validateField(emailInput);
    const r3 = validateField(phoneInput);
    const r4 = validateField(dateInput);
    const r5 = validateField(timezoneInput);
    const r6 = validateField(topicInput);

    const slotOk = !!document.querySelector('input[name="time_slot"]:checked');
    if (!slotOk) showTimeError(); else hideTimeError();

    // Video platform validation (only if toggle is ON)
    let platformOk = true;
    if (videoToggle.checked) {
      platformOk = !!document.querySelector('input[name="video_platform"]:checked');
      if (!platformOk) showPlatformError(); else hidePlatformError();
    }

    return r1 && r2 && r3 && r4 && r5 && r6 && slotOk && platformOk;
  }

  // ── Loading state ─────────────────────────────────────────────────
  function showLoading() {
    sendBtn.disabled  = true;
    btnContent.style.display = 'none';
    loader.style.display     = 'flex';
    overlay.classList.add('active');
    hideServerBanner();
  }
  function hideLoading() {
    btnContent.style.display = 'flex';
    loader.style.display     = 'none';
    overlay.classList.remove('active');
    updateProgress();
  }

  function showServerBanner(msg) {
    serverErrTx.textContent = msg;
    serverErr.classList.add('visible');
    serverErr.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }
  function hideServerBanner() { serverErr.classList.remove('visible'); }

  function applyFieldErrors(errors) {
    const map = {
      full_name:      'sc_name',
      email:          'sc_email',
      phone:          'sc_phone',
      preferred_date: 'sc_date',
      timezone:       'sc_timezone',
      time_slot:      'sc_timeslot',
      call_topic:     'sc_topic',
      video_platform: 'sc_platform',
    };
    Object.entries(errors).forEach(([key, messages]) => {
      const fid = map[key];
      if (!fid) return;
      const msg = Array.isArray(messages) ? messages[0] : messages;
      const srvEl = $(fid + '_srv');
      if (srvEl) { srvEl.textContent = msg; srvEl.classList.add('visible'); }
      const inputEl = $(fid);
      if (inputEl) { inputEl.classList.add('is-invalid'); inputEl.classList.remove('is-valid'); }
    });
  }

  // ── Build success detail cards ────────────────────────────────────
  function buildSuccessCards() {
    const nameVal  = val(nameInput);
    const dateVal  = val(dateInput);
    const slot     = document.querySelector('input[name="time_slot"]:checked');
    const slotLabel= slot ? slot.nextElementSibling.textContent.trim() : '';
    const tzVal    = val(timezoneInput);
    const platform = document.querySelector('input[name="video_platform"]:checked');
    const platVal  = platform ? platform.value : null;

    const detailsEl = $('scheduleSuccessDetails');
    if (!detailsEl) return;

    let html = '';
    html += `<div class="success-detail-card"><i class="fas fa-calendar"></i> ${dateVal}</div>`;
    html += `<div class="success-detail-card"><i class="fas fa-clock"></i> ${slotLabel} ${tzVal}</div>`;
    if (platVal) {
      html += `<div class="success-detail-card"><i class="fas fa-video"></i> ${platVal}</div>`;
    }
    detailsEl.innerHTML = html;
  }

  // ── SUBMIT ────────────────────────────────────────────────────────
  sendBtn.addEventListener('click', async () => {
    hideServerBanner();
    // Clear all server errors
    ['sc_name','sc_email','sc_phone','sc_date','sc_timezone','sc_timeslot','sc_topic','sc_platform'].forEach(id => {
      const el = $(id + '_srv');
      if (el) { el.textContent = ''; el.classList.remove('visible'); }
    });

    if (!validateAll()) {
      const firstInvalid = form.querySelector('.is-invalid, [style*="display: block"].invalid-feedback');
      if (firstInvalid) firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }

    const data = new FormData(form);
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    if (csrfMeta) data.set('_token', csrfMeta.getAttribute('content'));

    // Append video toggle explicitly (checkbox not submitted when unchecked)
    data.set('wants_video', videoToggle.checked ? '1' : '0');
    if (!videoToggle.checked) data.delete('video_platform');

    showLoading();

    try {
      const response = await fetch('{{ route("schedule.store") }}', {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json',
          ...(csrfMeta ? { 'X-CSRF-TOKEN': csrfMeta.getAttribute('content') } : {}),
        },
        body: data,
      });

      const json = await response.json();

      if (response.ok && json.success) {
        hideLoading();
        buildSuccessCards();
        await new Promise(r => setTimeout(r, 280));
        formWrap.style.display  = 'none';
        footer.style.display    = 'none';
        successBox.style.display = 'block';

        // Auto-close after 4s
        setTimeout(() => {
          const bsModal = bootstrap.Modal.getInstance(modalEl);
          if (bsModal) bsModal.hide();
        }, 4000);

      } else if (response.status === 422 && json.errors) {
        hideLoading();
        applyFieldErrors(json.errors);
        const firstMsg = Object.values(json.errors)[0];
        showServerBanner(Array.isArray(firstMsg) ? firstMsg[0] : firstMsg);

      } else {
        hideLoading();
        showServerBanner(json.message || 'Something went wrong. Please try again.');
      }

    } catch (err) {
      hideLoading();
      showServerBanner('Network error — please check your connection and try again.');
      console.error('Schedule submission error:', err);
    }
  });

  // ── Reset on modal close ──────────────────────────────────────────
  modalEl.addEventListener('hidden.bs.modal', () => {
    if (successBox.style.display === 'block') {
      fullReset();
    } else {
      clearErrors();
    }
  });

  function fullReset() {
    form.reset();
    formWrap.style.display   = '';
    footer.style.display     = '';
    successBox.style.display = 'none';
    videoWrap.classList.remove('visible');
    videoBox.classList.remove('active');
    $('sc_notes_counter').textContent = '0 / 1000';
    hideServerBanner();
    clearErrors();
    updateProgress();
  }

  function clearErrors() {
    form.querySelectorAll('.is-valid, .is-invalid').forEach(el => {
      el.classList.remove('is-valid', 'is-invalid');
    });
    form.querySelectorAll('.server-field-error').forEach(el => {
      el.textContent = ''; el.classList.remove('visible');
    });
    hideTimeError(); hidePlatformError(); hideServerBanner();
  }

})();
</script>