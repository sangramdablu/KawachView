<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
.careers-hero-section{
    position:relative;
    overflow:hidden;
    background:#0f172a;
    padding:100px 0 70px;
}

.careers-hero-section::before{
    content:"";
    position:absolute;
    inset:0;
    background:url('{{ asset("assets/images/kawach_main_bg.png") }}') center center/cover no-repeat;
    z-index:0;
}

.careers-hero-section .container{
    position:relative;
    z-index:2;
}

.careers-hero-section .hero-eyebrow{
    color:#93c5fd;
    font-weight:700;
    font-size:.85rem;
    text-transform:uppercase;
    letter-spacing:1.5px;
    margin-bottom:14px;
}

.careers-hero-section .hero-title{
    color:#fff;
    font-weight:800;
    font-size:clamp(2.2rem,4vw,3rem);
    margin-bottom:16px;
}

.careers-hero-section .hero-subtitle{
    color:#cbd5e1;
    font-size:1.05rem;
    max-width:640px;
    margin-bottom:0;
}

/* ── OPENINGS ── */

.careers-section{
    padding:90px 0;
    background:var(--bg-light, #f4f6fb);
}

.careers-section .section-eyebrow{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-size:.78rem;
    font-weight:700;
    letter-spacing:1.5px;
    text-transform:uppercase;
    color:var(--primary-blue, #1a73e8);
    background:rgba(26,115,232,.08);
    padding:6px 16px;
    border-radius:30px;
    margin-bottom:18px;
}

.careers-section .section-title{
    font-size:clamp(1.8rem,3.4vw,2.4rem);
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:14px;
}

.job-card{
    background:#fff;
    border:1px solid var(--border-light, #e2e8f0);
    border-radius:20px;
    padding:36px;
    margin-top:40px;
    box-shadow:0 6px 24px rgba(15,23,42,.05);
}

.job-card-header{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    flex-wrap:wrap;
    gap:18px;
    padding-bottom:24px;
    margin-bottom:24px;
    border-bottom:1px solid var(--border-light, #e2e8f0);
}

.job-title{
    font-size:1.5rem;
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:10px;
}

.job-meta{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
}

.job-meta span{
    display:inline-flex;
    align-items:center;
    gap:6px;
    font-size:.82rem;
    font-weight:600;
    color:var(--light-navy, #1f3a6e);
    background:var(--bg-light, #f4f6fb);
    border:1px solid var(--border-light, #e2e8f0);
    padding:6px 14px;
    border-radius:20px;
}

.job-apply-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:var(--primary-blue, #1a73e8);
    color:#fff;
    font-weight:700;
    font-size:.92rem;
    padding:13px 26px;
    border-radius:10px;
    border:none;
    text-decoration:none;
    white-space:nowrap;
    transition:.3s;
}

.job-apply-btn:hover{
    background:var(--accent-blue, #2196f3);
    color:#fff;
}

.job-summary{
    color:var(--text-muted, #6c757d);
    line-height:1.75;
    margin-bottom:28px;
}

.job-block-title{
    font-size:1rem;
    font-weight:700;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:14px;
}

.job-list{
    list-style:none;
    padding:0;
    margin:0 0 28px;
}

.job-list li{
    display:flex;
    align-items:flex-start;
    gap:10px;
    color:var(--text-muted, #6c757d);
    font-size:.94rem;
    line-height:1.6;
    margin-bottom:12px;
}

.job-list li i{
    color:var(--primary-blue, #1a73e8);
    font-size:.8rem;
    margin-top:5px;
    flex-shrink:0;
}

.job-list:last-child{
    margin-bottom:0;
}

/* ── APPLICATION FORM ── */

.apply-card{
    background:#fff;
    border:1px solid var(--border-light, #e2e8f0);
    border-radius:20px;
    padding:36px;
    margin-top:24px;
    box-shadow:0 6px 24px rgba(15,23,42,.05);
    scroll-margin-top:100px;
}

.apply-card-title{
    font-size:1.2rem;
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:6px;
}

.apply-card-sub{
    color:var(--text-muted, #6c757d);
    font-size:.9rem;
    margin-bottom:26px;
}

.apply-form .form-label{
    font-weight:600;
    font-size:.86rem;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:6px;
}

.apply-form .form-control{
    border:1px solid var(--border-light, #e2e8f0);
    border-radius:10px;
    padding:11px 14px;
    font-size:.92rem;
}

.apply-form .form-control:focus{
    border-color:var(--primary-blue, #1a73e8);
    box-shadow:0 0 0 3px rgba(26,115,232,.1);
}

.apply-form textarea.form-control{
    resize:vertical;
    min-height:100px;
}

.apply-form .invalid-feedback{
    font-size:.78rem;
    color:#e53935;
    margin-top:4px;
    display:none;
}

.apply-form .invalid-feedback.visible{
    display:block;
}

.apply-form .is-invalid{
    border-color:#e53935 !important;
}

.apply-hp{
    position:absolute;
    width:1px;
    height:1px;
    overflow:hidden;
    clip:rect(0,0,0,0);
    white-space:nowrap;
}

.apply-submit-btn{
    width:100%;
    background:var(--primary-blue, #1a73e8);
    color:#fff;
    font-weight:700;
    font-size:.95rem;
    padding:14px;
    border-radius:10px;
    border:none;
    transition:.3s;
}

.apply-submit-btn:hover:not(:disabled){
    background:var(--accent-blue, #2196f3);
}

.apply-submit-btn:disabled{
    opacity:.6;
    cursor:not-allowed;
}

.apply-server-alert{
    display:none;
    background:#fdecea;
    border:1px solid #f5c6cb;
    color:#a94442;
    border-radius:10px;
    padding:12px 16px;
    font-size:.85rem;
    margin-bottom:20px;
}

.apply-success{
    display:none;
    text-align:center;
    padding:50px 20px;
}

.apply-success-icon{
    width:64px;
    height:64px;
    margin:0 auto 20px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:rgba(76,175,80,.12);
    color:#4caf50;
    font-size:26px;
}

.apply-success-title{
    font-size:1.2rem;
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:8px;
}

.apply-success-text{
    color:var(--text-muted, #6c757d);
    font-size:.92rem;
    max-width:420px;
    margin:0 auto;
}

.resume-drop{
    border:1.5px dashed var(--border-light, #e2e8f0);
    border-radius:12px;
    padding:20px;
    text-align:center;
    cursor:pointer;
    transition:.2s;
}

.resume-drop:hover{
    border-color:var(--primary-blue, #1a73e8);
    background:rgba(26,115,232,.03);
}

.resume-drop i{
    font-size:1.4rem;
    color:var(--primary-blue, #1a73e8);
    margin-bottom:8px;
    display:block;
}

.resume-drop .resume-hint{
    font-size:.82rem;
    color:var(--text-muted, #6c757d);
}

.resume-filename{
    font-size:.86rem;
    font-weight:600;
    color:var(--text-dark, #1a1a2e);
    margin-top:8px;
    display:none;
}

@media(max-width:576px){
    .job-card, .apply-card{
        padding:24px;
    }
}
</style>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7J267VF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- NAVBAR -->
@include('layouts.navbar')

<!-- HERO -->
<section class="careers-hero-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="hero-eyebrow">Join Our Team</div>
        <h1 class="hero-title">Careers at Kawach Technology</h1>
        <p class="hero-subtitle">
            We're a remote-friendly software development team building web, mobile, cloud, and AI products for
            clients across the USA, Europe, and beyond. Explore our current opening below.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- OPEN POSITIONS -->
<section class="careers-section" id="openings">
  <div class="container">
    <span class="section-eyebrow"><i class="fas fa-briefcase"></i> Open Positions</span>
    <h2 class="section-title">Current Opening</h2>

    @forelse($openings as $job)
    <div class="job-card" id="job-{{ $job['slug'] }}">
      <div class="job-card-header">
        <div>
          <div class="job-title">{{ $job['title'] }}</div>
          <div class="job-meta">
            <span><i class="fas fa-building"></i> {{ $job['department'] }}</span>
            <span><i class="fas fa-location-dot"></i> {{ $job['location'] }}</span>
            <span><i class="fas fa-clock"></i> {{ $job['type'] }}</span>
            <span><i class="fas fa-layer-group"></i> {{ $job['experience_level'] }}</span>
          </div>
        </div>
        <a href="#apply-{{ $job['slug'] }}" class="job-apply-btn">
            <i class="fas fa-paper-plane"></i> Apply Now
        </a>
      </div>

      <p class="job-summary">{{ $job['summary'] }}</p>

      <div class="job-block-title">Responsibilities</div>
      <ul class="job-list">
        @foreach($job['responsibilities'] as $item)
        <li><i class="fas fa-check"></i> {{ $item }}</li>
        @endforeach
      </ul>

      <div class="job-block-title">Requirements</div>
      <ul class="job-list">
        @foreach($job['requirements'] as $item)
        <li><i class="fas fa-check"></i> {{ $item }}</li>
        @endforeach
      </ul>

      @if(!empty($job['nice_to_have']))
      <div class="job-block-title">Nice to Have</div>
      <ul class="job-list">
        @foreach($job['nice_to_have'] as $item)
        <li><i class="fas fa-star"></i> {{ $item }}</li>
        @endforeach
      </ul>
      @endif
    </div>

    <!-- APPLICATION FORM -->
    <div class="apply-card" id="apply-{{ $job['slug'] }}">
      <div class="apply-card-title">Apply for {{ $job['title'] }}</div>
      <p class="apply-card-sub">Fill in your details below — we typically respond within a few business days.</p>

      <div class="apply-server-alert" id="applyServerError"></div>

      <form class="apply-form" id="applyForm" novalidate autocomplete="off">
        @csrf
        <input type="hidden" name="job_slug" value="{{ $job['slug'] }}">

        {{-- Honeypot --}}
        <div class="apply-hp" aria-hidden="true">
          <label for="website">Website</label>
          <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Full Name *</label>
            <input type="text" name="full_name" class="form-control" required minlength="2" maxlength="100">
            <div class="invalid-feedback">Please enter your full name.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Email *</label>
            <input type="email" name="email" class="form-control" required maxlength="254">
            <div class="invalid-feedback">Please enter a valid email address.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="tel" name="phone" class="form-control" maxlength="20">
            <div class="invalid-feedback">Please enter a valid phone number.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Years of Experience</label>
            <input type="text" name="experience" class="form-control" placeholder="e.g. 3 years" maxlength="50">
          </div>
          <div class="col-md-6">
            <label class="form-label">LinkedIn Profile</label>
            <input type="url" name="linkedin_url" class="form-control" placeholder="https://linkedin.com/in/...">
            <div class="invalid-feedback">Please enter a valid URL.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Portfolio / GitHub</label>
            <input type="url" name="portfolio_url" class="form-control" placeholder="https://github.com/...">
            <div class="invalid-feedback">Please enter a valid URL.</div>
          </div>
          <div class="col-12">
            <label class="form-label">Resume / CV * <span style="font-weight:400;color:var(--text-muted);">(PDF or Word, max 5MB)</span></label>
            <div class="resume-drop" id="resumeDrop">
              <i class="fas fa-cloud-arrow-up"></i>
              <div class="resume-hint">Click to upload your resume</div>
              <div class="resume-filename" id="resumeFilename"></div>
            </div>
            <input type="file" name="resume" id="resumeInput" accept=".pdf,.doc,.docx" style="display:none;" required>
            <div class="invalid-feedback" id="resumeFeedback">Please attach your resume (PDF or Word, under 5MB).</div>
          </div>
          <div class="col-12">
            <label class="form-label">Cover Letter</label>
            <textarea name="cover_letter" class="form-control" maxlength="3000" placeholder="Tell us why you'd be a great fit for this role (optional)."></textarea>
          </div>
          <div class="col-12">
            <button type="submit" class="apply-submit-btn" id="applySubmitBtn" disabled>
                Submit Application
            </button>
          </div>
        </div>
      </form>

      <div class="apply-success" id="applySuccess">
        <div class="apply-success-icon"><i class="fas fa-check"></i></div>
        <div class="apply-success-title">Application Submitted!</div>
        <p class="apply-success-text" id="applySuccessText"></p>
      </div>
    </div>
    @empty
    <div class="job-card text-center">
        <p class="job-summary mb-0">We don't have any open positions right now — check back soon, or send your resume to
            <a href="mailto:{{ config('app.main_email') }}">{{ config('app.main_email') }}</a>.
        </p>
    </div>
    @endforelse
  </div>
</section>

<!-- CTA -->
<section class="cta-section text-center">
  <div class="container">
    <h2 class="cta-title">Don't See a Role That Fits?</h2>
    <p class="cta-subtitle">We're always open to hearing from great engineers. Reach out and introduce yourself.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="{{ route('contact') }}" class="btn btn-cta-outline">Get in Touch</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('applyForm');
    if (!form) return;

    const submitBtn = document.getElementById('applySubmitBtn');
    const serverError = document.getElementById('applyServerError');
    const successBox = document.getElementById('applySuccess');
    const successText = document.getElementById('applySuccessText');

    const resumeDrop = document.getElementById('resumeDrop');
    const resumeInput = document.getElementById('resumeInput');
    const resumeFilename = document.getElementById('resumeFilename');
    const resumeFeedback = document.getElementById('resumeFeedback');

    resumeDrop.addEventListener('click', () => resumeInput.click());
    resumeInput.addEventListener('change', () => {
        if (resumeInput.files.length) {
            resumeFilename.textContent = resumeInput.files[0].name;
            resumeFilename.style.display = 'block';
            resumeDrop.classList.remove('is-invalid');
            resumeFeedback.classList.remove('visible');
        }
        validateForm();
    });

    function validateForm() {
        let valid = form.checkValidity();
        submitBtn.disabled = !valid;
        return valid;
    }

    form.querySelectorAll('input, textarea').forEach((el) => {
        el.addEventListener('input', validateForm);
    });

    validateForm();

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        serverError.style.display = 'none';

        // Clear previous invalid states
        form.querySelectorAll('.is-invalid').forEach((el) => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach((el) => el.classList.remove('visible'));

        if (!form.checkValidity()) {
            form.querySelectorAll(':invalid').forEach((el) => {
                el.classList.add('is-invalid');
                const feedback = el.closest('.col-md-6, .col-12')?.querySelector('.invalid-feedback');
                feedback?.classList.add('visible');
            });
            return;
        }

        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';

        const formData = new FormData(form);
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        fetch('{{ route('careers.apply') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(async (res) => {
            const data = await res.json();
            if (res.ok && data.success) {
                form.style.display = 'none';
                successText.textContent = data.message;
                successBox.style.display = 'block';
            } else if (res.status === 422 && data.errors) {
                Object.keys(data.errors).forEach((field) => {
                    const el = form.querySelector(`[name="${field}"]`);
                    if (el) {
                        el.classList.add('is-invalid');
                        const feedback = el.closest('.col-md-6, .col-12')?.querySelector('.invalid-feedback');
                        if (feedback) {
                            feedback.textContent = data.errors[field][0];
                            feedback.classList.add('visible');
                        }
                    }
                });
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Application';
            } else {
                serverError.textContent = data.message || 'Something went wrong. Please try again.';
                serverError.style.display = 'block';
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Application';
            }
        })
        .catch(() => {
            serverError.textContent = 'Network error. Please check your connection and try again.';
            serverError.style.display = 'block';
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit Application';
        });
    });
});
</script>
</body>
</html>
