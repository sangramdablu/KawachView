<!DOCTYPE html>
<html lang="en">

@php
    $hireDeveloperSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "CollectionPage",
                "name" => $seoTitle,
                "url" => $seoCanonical,
                "description" => $seoDescription,
            ],
            [
                "@type" => "ItemList",
                "itemListElement" => $developers->flatten(1)->values()->map(function ($dev, $i) {
                    return [
                        "@type" => "ListItem",
                        "position" => $i + 1,
                        "item" => [
                            "@type" => "Service",
                            "name" => $dev['title'],
                            "url" => url('/hire-developer/' . $dev['slug']),
                            "provider" => [
                                "@type" => "Organization",
                                "name" => "Kawach Technology",
                            ],
                        ],
                    ];
                })->all(),
            ],
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Hire Developer", "item" => $seoCanonical],
                ],
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($hireDeveloperSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<style>
  .hd-index-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #0d1b3e 0%, #1f3a6e 100%);
    padding: 80px 0 64px;
    text-align: center;
  }
  .hd-index-hero::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 420px; height: 420px;
    background: radial-gradient(circle, rgba(33,150,243,.16) 0%, transparent 65%);
    pointer-events: none;
  }
  .hd-index-hero h1 {
    font-family: 'Nunito', sans-serif;
    font-weight: 900;
    font-size: 2.4rem;
    color: #fff;
    position: relative;
    z-index: 1;
  }
  .hd-index-hero p {
    color: #aac4e0;
    font-size: 1.02rem;
    max-width: 620px;
    margin: 14px auto 0;
    position: relative;
    z-index: 1;
  }

  .hd-index-section { padding: 72px 0; background: #f0f4fb; }
  .hd-cat-title {
    font-family: 'Nunito', sans-serif;
    font-weight: 800;
    font-size: 1.15rem;
    color: #1a1a2e;
    margin: 40px 0 18px;
  }
  .hd-cat-title:first-of-type { margin-top: 0; }

  .hd-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 16px;
  }
  .hd-card {
    background: #fff;
    border: 1px solid #dce6f5;
    border-radius: 14px;
    padding: 22px;
    display: flex;
    gap: 14px;
    align-items: flex-start;
    text-decoration: none;
    transition: transform .22s, border-color .22s, box-shadow .22s;
  }
  .hd-card:hover {
    transform: translateY(-4px);
    border-color: #1a73e8;
    box-shadow: 0 10px 28px rgba(26,115,232,.12);
  }
  .hd-card-icon {
    width: 44px; height: 44px;
    border-radius: 10px;
    background: #edf4fe;
    color: #1a73e8;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    font-size: 1.1rem;
  }
  .hd-card-title {
    font-size: .96rem;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 4px;
  }
  .hd-card-desc {
    font-size: .8rem;
    color: #6c757d;
    line-height: 1.5;
  }
</style>

@include('layouts.navbar')

<section class="hd-index-hero">
  <div class="container">
    <h1>Hire Developers Who Ship</h1>
    <p>Pre-vetted engineers across full stack, frontend, backend, mobile, and AI — pick a role or a technology to get started.</p>
  </div>
</section>

<section class="hd-index-section">
  <div class="container">
    @foreach ($developers as $category => $items)
      <div class="hd-cat-title">{{ $category }}</div>
      <div class="hd-grid">
        @foreach ($items as $dev)
          <a href="{{ route('hire-developer.show', $dev['slug']) }}" class="hd-card">
            <div class="hd-card-icon"><i class="{{ $dev['icon'] }}"></i></div>
            <div>
              <div class="hd-card-title">{{ $dev['title'] }}</div>
              <div class="hd-card-desc">{{ Illuminate\Support\Str::limit($dev['summary'], 90) }}</div>
            </div>
          </a>
        @endforeach
      </div>
    @endforeach
  </div>
</section>

<!-- CTA -->
<section class="cta-section text-center">
  <div class="container">
    <h2 class="cta-title">Not sure which role fits your project?</h2>
    <p class="cta-subtitle">Tell us what you're building and we'll recommend the right team.</p>
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <button class="btn btn-cta-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">Schedule a Call</button>
      <a class="btn btn-cta-outline" data-bs-toggle="modal" data-bs-target="#quoteModal">Get a Quote</a>
    </div>
  </div>
</section>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
