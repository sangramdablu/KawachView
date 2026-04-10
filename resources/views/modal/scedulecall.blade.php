<!-- ══════════════════════════════════════════
     MODAL 3 — SCHEDULE A CALL
     Triggered by: CTA "Schedule a Call"
════════════════════════════════════════════ -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header-branded">
        <button class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
        <div class="modal-brand-icon"><i class="fas fa-phone-alt"></i></div>
        <div class="modal-title-main">Schedule a Call</div>
        <div class="modal-title-sub">Pick a date and time that works best for you.</div>
      </div>

      <!-- Body -->
      <div class="modal-body-branded">
        <div id="scheduleFormWrap">
          <form class="modal-form" id="scheduleForm" novalidate>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" placeholder="Alex Johnson" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address *</label>
                <input type="email" class="form-control" placeholder="alex@company.com" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Preferred Date *</label>
                <input type="date" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Timezone</label>
                <select class="form-select">
                  <option value="">Select timezone</option>
                  <option>EST (UTC-5)</option>
                  <option>CST (UTC-6)</option>
                  <option>MST (UTC-7)</option>
                  <option>PST (UTC-8)</option>
                  <option>GMT (UTC+0)</option>
                  <option>IST (UTC+5:30)</option>
                  <option>CET (UTC+1)</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Preferred Time Slot</label>
                <div class="time-slot-group">
                  <div class="time-slot"><input type="radio" name="timeSlot" id="ts1" value="9am"><label for="ts1">9:00 AM</label></div>
                  <div class="time-slot"><input type="radio" name="timeSlot" id="ts2" value="10am" checked><label for="ts2">10:00 AM</label></div>
                  <div class="time-slot"><input type="radio" name="timeSlot" id="ts3" value="11am"><label for="ts3">11:00 AM</label></div>
                  <div class="time-slot"><input type="radio" name="timeSlot" id="ts4" value="1pm"><label for="ts4">1:00 PM</label></div>
                  <div class="time-slot"><input type="radio" name="timeSlot" id="ts5" value="2pm"><label for="ts5">2:00 PM</label></div>
                  <div class="time-slot"><input type="radio" name="timeSlot" id="ts6" value="3pm"><label for="ts6">3:00 PM</label></div>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Call Topic</label>
                <select class="form-select">
                  <option value="">What would you like to discuss?</option>
                  <option>New Project / MVP</option>
                  <option>Existing Project Help</option>
                  <option>Pricing &amp; Packages</option>
                  <option>Partnership Opportunity</option>
                  <option>General Inquiry</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">Anything Else We Should Know?</label>
                <textarea class="form-control" rows="2" placeholder="Optional context to help us prepare for the call..."></textarea>
              </div>
            </div>
          </form>
        </div>

        <!-- Success State -->
        <div class="modal-success" id="scheduleSuccess">
          <div class="success-icon"><i class="fas fa-check"></i></div>
          <h4>Call Scheduled!</h4>
          <p>You're all set. We'll send a calendar invite and a confirmation email to your inbox shortly.</p>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer-branded" id="scheduleFooter">
        <div class="footer-note">
          <i class="fas fa-calendar-check" style="color:#2196f3;"></i> You'll receive a calendar invite via email.
        </div>
        <button class="btn-modal-submit" onclick="submitModal('scheduleForm','scheduleSuccess','scheduleFooter')">
          Confirm My Call <i class="fas fa-arrow-right"></i>
        </button>
      </div>

    </div>
  </div>
</div>