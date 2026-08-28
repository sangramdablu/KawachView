<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="google-site-verification" content="64vVBBuPHvwTVNFAg7ZkphMawtQoVbKcHUy4wWmclAI" />

    @php
        // Falls back to homepage defaults if a page doesn't set them.
        $seoTitle       = $seoTitle       ?? 'Software Development Company USA & Europe | Kawach Tech';
        $seoDescription = $seoDescription ?? 'Kawach Technology builds scalable web, mobile, AI, SaaS, and cloud software for startups and enterprises across the USA and Europe. Get a free consultation.';
        $seoKeywords    = $seoKeywords    ?? 'software development company, custom software development, mobile app development company, web development services, AI software development, affordable software company USA, enterprise software solutions, SaaS development company, cloud application development, software outsourcing company';
        $seoCanonical   = $seoCanonical   ?? url()->current();
        $usingFallbackImage = !isset($seoImage);
        $seoImage       = $seoImage       ?? asset('assets/images/kawach.png');
        $seoImageWidth  = $seoImageWidth  ?? ($usingFallbackImage ? 225 : null);
        $seoImageHeight = $seoImageHeight ?? ($usingFallbackImage ? 225 : null);
        $seoRobots      = $seoRobots      ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
        $seoType        = $seoType        ?? 'website';
        $twitterCard    = $twitterCard    ?? 'summary_large_image';
    @endphp
    <!-- Primary SEO -->
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}">
    <meta name="author" content="Kawach Technology">
    <!-- INDEXING -->
    <meta name="robots" content="{{ $seoRobots }}">
    <!-- Canonical -->
    <link rel="canonical" href="{{ $seoCanonical }}">
    <!-- Hreflang: single global English site serving US & Europe -->
    <link rel="alternate" href="{{ $seoCanonical }}" hreflang="en">
    <link rel="alternate" href="{{ $seoCanonical }}" hreflang="en-us">
    <link rel="alternate" href="{{ $seoCanonical }}" hreflang="en-gb">
    <link rel="alternate" href="{{ $seoCanonical }}" hreflang="x-default">
    <!-- Language -->
    <meta http-equiv="content-language" content="en">
    <!-- GEO SEO (accurate HQ; service area is global — see areaServed in schema) -->
    <meta name="geo.region" content="IN">
    <!-- Brand -->
    <meta name="application-name" content="Kawach Technology">
    <!-- Theme -->
    <meta name="theme-color" content="#0d6efd">
    <!-- Open Graph -->
    <meta property="og:type" content="{{ $seoType }}">
    <meta property="og:site_name" content="Kawach Technology">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:image" content="{{ $seoImage }}">
    @if($seoImageWidth && $seoImageHeight)
    <meta property="og:image:width" content="{{ $seoImageWidth }}">
    <meta property="og:image:height" content="{{ $seoImageHeight }}">
    @endif
    <!-- Twitter -->
    <meta name="twitter:card" content="{{ $twitterCard }}">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
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
    <!-- Google Consent Mode defaults (must run before GTM/gtag load) -->
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('consent', 'default', {
        'ad_storage': 'denied',
        'ad_user_data': 'denied',
        'ad_personalization': 'denied',
        'analytics_storage': 'denied',
        'functionality_storage': 'denied',
        'personalization_storage': 'denied',
        'security_storage': 'granted'
      });
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N7J267VF');</script>
    <!-- End Google Tag Manager -->
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
          "email" => config('app.main_email'),
          "sameAs" => array_values(array_filter([
              config('app.linkedin'),
              config('app.insta'),
          ])),
          "contactPoint" => [
              "@type" => "ContactPoint",
              "telephone" => config('app.mobile'),
              "email" => config('app.main_email'),
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

  @php
      $websiteSchema = [
          "@context" => "https://schema.org",
          "@type" => "WebSite",
          "name" => "Kawach Technology",
          "url" => url('/'),
          "potentialAction" => [
              "@type" => "SearchAction",
              "target" => [
                  "@type" => "EntryPoint",
                  "urlTemplate" => url('/blog') . "?search={search_term_string}",
              ],
              "query-input" => "required name=search_term_string",
          ],
      ];
  @endphp

  <script type="application/ld+json">
      {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>
    <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TMZVRRJZBP"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-TMZVRRJZBP');
  </script>
  <!-- Page-specific structured data (Service/Article/Person/FAQ/Breadcrumb schema) -->
  @stack('schema')
</head>