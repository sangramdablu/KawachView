<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="/">
      Kawach<span class="brand-highlight">TECH</span>
      <span class="brand-sub">S O L U T I O N S</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navMenu">
      <ul class="navbar-nav align-items-center me-3">
        <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('casestudy') }}">Case Studies</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('contact') }}">Contact</a></li>
      </ul>
      <button class="btn btn-quote" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</button>
    </div>
  </div>
</nav>