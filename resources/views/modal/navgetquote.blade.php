<!-- ══════════════════════════════════════════
     MODAL 1 — GET A QUOTE
     Triggered by: Navbar "Get a Quote" & CTA "Get a Quote"
════════════════════════════════════════════ -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Header -->
      <div class="modal-header-branded">
        <button class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
        <div class="modal-brand-icon"><i class="fas fa-file-invoice-dollar"></i></div>
        <div class="modal-title-main">Get a Free Quote</div>
        <div class="modal-title-sub">Tell us about your project — we'll respond within 24 hours.</div>
      </div>

      <!-- Body -->
      <div class="modal-body-branded">
        <div id="quoteFormWrap">
          <form class="modal-form" id="quoteForm" novalidate>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Company Name</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address *</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control">
              </div>
              <div class="col-12">
                <label class="form-label">Services You Need</label>
                <div class="service-tag-group">
                  <span class="service-tag active" onclick="toggleTag(this)">Web &amp; Mobile Apps</span>
                  <span class="service-tag" onclick="toggleTag(this)">AI &amp; Machine Learning</span>
                  <span class="service-tag" onclick="toggleTag(this)">Cloud &amp; DevOps</span>
                  <span class="service-tag" onclick="toggleTag(this)">Custom Software</span>
                  <span class="service-tag" onclick="toggleTag(this)">SaaS Product</span>
                  <span class="service-tag" onclick="toggleTag(this)">UI/UX Design</span>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Estimated Budget</label>
                <div class="budget-group">
                  <div class="budget-pill"><input type="radio" name="budgetQ" id="bq1" value="<10k"><label for="bq1">&lt; $10k</label></div>
                  <div class="budget-pill"><input type="radio" name="budgetQ" id="bq2" value="10-50k" checked><label for="bq2">$10k – $50k</label></div>
                  <div class="budget-pill"><input type="radio" name="budgetQ" id="bq3" value="50-100k"><label for="bq3">$50k – $100k</label></div>
                  <div class="budget-pill"><input type="radio" name="budgetQ" id="bq4" value=">100k"><label for="bq4">&gt; $100k</label></div>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Project Description *</label>
                <textarea class="form-control" rows="3" placeholder="Briefly describe your project goals, features needed, and timeline..." required></textarea>
              </div>
            </div>
          </form>
        </div>

        <!-- Success State -->
        <div class="modal-success" id="quoteSuccess">
          <div class="success-icon"><i class="fas fa-check"></i></div>
          <h4>Quote Request Sent!</h4>
          <p>Thanks for reaching out. Our team will prepare a detailed quote and get back to you within 24 hours.</p>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer-branded" id="quoteFooter">
        <div class="footer-note">
          <i class="fas fa-lock"></i> Your info is 100% secure & never shared.
        </div>
        <button class="btn-modal-submit" onclick="submitModal('quoteForm','quoteSuccess','quoteFooter')">
          Send Quote Request <i class="fas fa-arrow-right"></i>
        </button>
      </div>

    </div>
  </div>
</div>