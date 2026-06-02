<footer class="footer-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Quick Links</div>
        <ul class="footer-links">
          <li><a href="{{ route('services') }}">Services</a></li>
          <li><a href="{{ route('casestudy') }}">Case Studies</a></li>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Our Expertise</div>
        <ul class="footer-links">
          <li><a href="#">Custom Software</a></li>
          <li><a href="#">AI &amp; Automation</a></li>
          <li><a href="#">Web &amp; Mobile</a></li>
          <li><a href="#">Cloud &amp; DevOps</a></li>
          <li><a href="#">Machine Learning</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Resources</div>
        <ul class="footer-links">
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li><a href="#">Support</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-heading">Contact Us</div>
        <div class="footer-contact-item">
          <i class="fas fa-envelope"></i>
          {{ config('app.support_email') }}
        </div>
        <div class="footer-contact-item">
          <i class="fas fa-phone"></i>
          {{ config('app.mobile') }}
        </div>
        <div class="footer-contact-item">
          <i class="fas fa-map-marker-alt"></i>
          
        </div>
        <div class="footer-social">
          <a href="{{ config('app.linkedin') }}" class="social-btn social-linkedin"><i class="fab fa-linkedin-in"></i></a>
          <a href="{{ config('app.insta') }}" class="social-btn social-instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-btn social-facebook"><i class="fab fa-facebook-f"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2018 KawachTech Solutions. All rights reserved.</p>
    </div>
  </div>
</footer>