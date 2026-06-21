<!-- ══════════════════════════════════════════
     MODAL 2 — FREE CONSULTATION
     Triggered by: Hero "Get a Free Consultation"
════════════════════════════════════════════ -->
<style>
  #consultSuccess{
    display:none;
  }
</style>
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
          <form class="modal-form" id="consultForm" action="/consultation" method="POST">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Full Name <span style="color:#e53935">*</span></label>
                <input type="text" class="form-control" name="full_name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Address <span style="color:#e53935">*</span></label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="phone">
              </div>
              <div class="col-md-6">
                <label class="form-label">Your Role</label>
                <select class="form-select" name="role">
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
                  <span class="service-tag active" data-value="New Product / MVP" onclick="toggleTag(this)">New Product / MVP</span>
                  <span class="service-tag" data-value="Rebuild Existing App" onclick="toggleTag(this)">Rebuild Existing App</span>
                  <span class="service-tag" data-value="AI / Automation" onclick="toggleTag(this)">AI / Automation</span>
                  <span class="service-tag" data-value="Scale Optimize" onclick="toggleTag(this)">Scale &amp; Optimize</span>
                  <span class="service-tag" data-value="Not Sure Yet" onclick="toggleTag(this)">Not Sure Yet</span>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Tell Us A Little About Your Goals</label>
                <textarea class="form-control" name="goals" rows="3" placeholder="What problem are you solving? What does success look like?"></textarea>
              </div>
            </div>
            <div id="consultRequirementInputs"></div>
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
        <button type="button" class="btn-modal-submit" id="consultSubmitBtn">
          Book My Consultation <i class="fas fa-arrow-right"></i>
        </button>
      </div>

    </div>
  </div>
</div>

<script>
  function toggleTag(el) {
      el.classList.toggle('active');
      syncRequirements();
  }

  function syncRequirements() {
      let wrap = document.getElementById('consultRequirementInputs');
      wrap.innerHTML = '';
      document.querySelectorAll('#consultModal .service-tag.active')
          .forEach(tag => {
              let input = document.createElement('input');
              input.type = 'hidden';
              input.name = 'requirements[]';
              input.value = tag.dataset.value;
              wrap.appendChild(input);
          });
  }

  syncRequirements();

  document.getElementById('consultSubmitBtn').addEventListener('click', async function () {
      const form = document.getElementById('consultForm');
      const data = new FormData(form);
      const response = await fetch('/consultation', {
          method: 'POST',
          headers: {
              'X-CSRF-TOKEN':
                  document.querySelector('meta[name="csrf-token"]').content,
              'Accept': 'application/json'
          },
          body: data
      });

      const json = await response.json();
      if (json.success) {
          document.getElementById('consultFormWrap').style.display = 'none';
          document.getElementById('consultFooter').style.display = 'none';
          document.getElementById('consultSuccess').style.display = 'block';
          setTimeout(() => {
              const modal =
                  bootstrap.Modal.getInstance(
                      document.getElementById('consultModal')
                  );
              if (modal) {
                  modal.hide();
              }
          }, 3000);
      }
      else {
          alert(json.message ?? 'Something went wrong');
      }
  });
</script>