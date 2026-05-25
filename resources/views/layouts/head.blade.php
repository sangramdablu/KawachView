<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Primary SEO -->
    <title>
        Custom Software Development Company USA & Europe | Kawach
    </title>
    <meta name="description" content="Kawach is a global software development company providing affordable custom software, web, mobile app, AI, cloud, and enterprise solutions for businesses in the USA, UK, and Europe.">
    <meta name="keywords" content="software development company, custom software development, mobile app development company, web development services, AI software development, affordable software company USA, enterprise software solutions, SaaS development company, cloud application development, software outsourcing company">
    <meta name="author" content="Kawach Technology">
    <!-- INDEXING -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <!-- Canonical -->
    <link rel="canonical" href="https://www.kawachtech.com/">
    <!-- Language -->
    <meta http-equiv="content-language" content="en">
    <!-- GEO SEO -->
    <meta name="geo.region" content="US">
    <meta name="geo.position" content="40.7128;-74.0060">
    <meta name="ICBM" content="40.7128, -74.0060">
    <!-- Brand -->
    <meta name="application-name" content="Kawach Technology">
    <!-- Theme -->
    <meta name="theme-color" content="#0d6efd">
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Kawach Technology">
    <meta property="og:title" content="Custom Software Development Company | Kawach">
    <meta property="og:description" content="Affordable custom software development services for startups and enterprises in the USA, UK, and Europe. Build scalable web, mobile, and AI applications with Kawach.">
    <meta property="og:url" content="https://www.kawachtech.com/">
    <meta property="og:image" content="https://www.kawachtech.com/assets/images/og-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Affordable Software Development Company | Kawach">
    <meta name="twitter:description" content="Custom software, mobile app, and web development services for global businesses.">
    <meta name="twitter:image" content="https://www.kawachtech.com/assets/images/og-image.jpg">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet"/>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Schema.org JSON-LD -->
    @php
      $schema = [
          "@context" => "https://schema.org",
          "@type" => "Organization",
          "name" => "Kawach Technology",
          "url" => url('/'),
          "logo" => [
              "@type" => "ImageObject",
              "url" => asset('assets/images/kawach.png'),
          ],
          "description" => "Kawach Technology is a custom software development company providing web development, mobile app development, AI solutions, cloud applications, and enterprise software services for businesses worldwide.",
          "sameAs" => [
              "https://www.linkedin.com/",
              "https://www.facebook.com/",
              "https://twitter.com/",
          ],
          "contactPoint" => [
              "@type" => "ContactPoint",
              "telephone" => "+91-XXXXXXXXXX",
              "contactType" => "customer support",
              "areaServed" => [
                  "US",
                  "GB",
                  "DE",
                  "FR",
                  "NL",
                  "ES",
                  "IT",
                  "AU",
                  "IN"
              ],
              "availableLanguage" => [
                  "English"
              ],
          ],
          "address" => [
              "@type" => "PostalAddress",
              "addressCountry" => "IN"
          ],
      ];
  @endphp

  <script type="application/ld+json">
      {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>
</head>