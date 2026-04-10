<!-- ══════════════════════════════════════════
     MODAL 2 — FREE CONSULTATION
     Triggered by: Hero "Get a Free Consultation"
════════════════════════════════════════════ -->
<div class="modal fade" id="consultModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header-branded">
        <button class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
        <div class="modal-brand-icon"><i class="fas fa-comments"></i></div>
        <div class="modal-title-main">Book a Free Consultation</div>
        <div class="modal-title-sub">A 30-minute call to explore how we can help your business.</div>
      </div>

      <!-- Body -->
      <div class="modal-body-branded">
        <div id="consultFormWrap">
          <form class="modal-form" id="consultForm" novalidate>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address *</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Your Role</label>
                <select class="form-select">
                  <option value="">Select your role</option>
                  <option>Founder / CEO</option>
                  <option>CTO / Tech Lead</option>
                  <option>Product Manager</option>
                  <option>Marketing / Growth</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label">What Are You Looking To Build?</label>
                <div class="service-tag-group">
                  <span class="service-tag active" onclick="toggleTag(this)">New Product / MVP</span>
                  <span class="service-tag" onclick="toggleTag(this)">Rebuild Existing App</span>
                  <span class="service-tag" onclick="toggleTag(this)">AI / Automation</span>
                  <span class="service-tag" onclick="toggleTag(this)">Scale &amp; Optimize</span>
                  <span class="service-tag" onclick="toggleTag(this)">Not Sure Yet</span>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Tell Us A Little About Your Goals</label>
                <textarea class="form-control" rows="3" placeholder="What problem are you solving? What does success look like?"></textarea>
              </div>
            </div>
          </form>
        </div>

        <!-- Success State -->
        <div class="modal-success" id="consultSuccess">
          <div class="success-icon"><i class="fas fa-check"></i></div>
          <h4>Consultation Booked!</h4>
          <p>We've received your request. A member of our team will email you with available time slots within a few hours.</p>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer-branded" id="consultFooter">
        <div class="footer-note">
          <i class="fas fa-shield-alt" style="color:#2196f3;"></i> Free, no-obligation consultation.
        </div>
        <button class="btn-modal-submit" onclick="submitModal('consultForm','consultSuccess','consultFooter')">
          Book My Consultation <i class="fas fa-arrow-right"></i>
        </button>
      </div>

    </div>
  </div>
</div>