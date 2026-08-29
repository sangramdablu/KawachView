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
                <div class="contact-item-value"><a href="mailto:{{ config('app.main_email') }}">{{ config('app.main_email') }}</a></div>
                <div class="contact-item-sub">For general inquiries &amp; partnerships</div>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-item-icon"><i class="fas fa-headset"></i></div>
              <div>
                <div class="contact-item-label">Support</div>
                <div class="contact-item-value"><a href="mailto:{{ config('app.support_email') }}">{{ config('app.support_email') }}</a></div>
                <div class="contact-item-sub">Existing client support</div>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-item-icon"><i class="fas fa-phone-alt"></i></div>
              <div>
                <div class="contact-item-label">Call Us</div>
                <div class="contact-item-value"><a href="tel:{{ config('app.mobile') }}">{{ config('app.mobile') }}</a></div>
                <div class="contact-item-sub">Mon – Fri, 9 AM – 6 PM EST</div>
                <div class="status-badge"><div class="status-dot"></div> Lines Open Now</div>
              </div>
            </div>

            {{-- <div class="contact-item">
              <div class="contact-item-icon"><i class="fas fa-map-marker-alt"></i></div>
              <div>
                <div class="contact-item-label">Our Office</div>
                <div class="contact-item-value">123 Tech Avenue, Suite 400</div>
                <div class="contact-item-sub">New York, NY 10001, USA</div>
              </div>
            </div> --}}

            <div class="contact-item" style="border-bottom:none;padding-bottom:0;">
              <div class="contact-item-icon"><i class="fas fa-share-alt"></i></div>
              <div>
                <div class="contact-item-label">Follow Us</div>
                <div class="social-row" style="margin-top:8px;">
                  <a href="{{ config('app.linkedin') }}" class="social-btn s-linkedin"><i class="fab fa-linkedin-in"></i></a>
                  {{-- <a href="#" class="social-btn s-twitter"><i class="fab fa-twitter"></i></a> --}}
                  {{-- <a href="#" class="social-btn s-facebook"><i class="fab fa-facebook-f"></i></a> --}}
                  <a href="{{ config('app.insta') }}" class="social-btn s-instagram"><i class="fab fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>