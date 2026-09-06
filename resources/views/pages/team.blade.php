<!DOCTYPE html>
<html lang="en">

@php
    use Illuminate\Support\Str;

    $seoTitle       = 'Meet the Kawach Technology Team | Leadership & Engineers';
    $seoDescription = 'Meet the leadership team and engineers at Kawach Technology, the custom software development company behind our clients\' projects — CEO, CTO, project managers, and developers.';
    $seoKeywords    = 'Kawach Technology team, Kawach Technology leadership, Kawach Technology CEO, Kawach Technology CTO, software development team, meet the team';
    $seoCanonical   = url('/team');

    // AEO/GEO: a plain-language answer to "who is on the Kawach Technology
    // team" that search/answer engines can lift directly, backed by Person
    // schema below for each member so the same facts are machine-readable.
    $leaders = $teamMembers->filter(fn ($u) => $u->leadership_rank <= 3)->sortBy('leadership_rank')->values();
    $introSummary = $leaders->isNotEmpty()
        ? 'Kawach Technology is led by ' . $leaders->map(fn ($u) => $u->name . ' (' . $u->designation . ')')->join(', ', ' and ') . ', supported by a team of ' . $teamMembers->count() . ' people who plan, build, and ship software for our clients.'
        : 'Kawach Technology\'s team plans, builds, and ships software for our clients, from leadership through engineering.';

    $teamSchema = [
        "@context" => "https://schema.org",
        "@graph" => [
            [
                "@type" => "BreadcrumbList",
                "itemListElement" => [
                    ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                    ["@type" => "ListItem", "position" => 2, "name" => "Team", "item" => $seoCanonical],
                ],
            ],
            [
                "@type" => "ItemList",
                "itemListElement" => $teamMembers->values()->map(function ($member, $i) use ($seoCanonical) {
                    $person = [
                        "@type" => "Person",
                        "name" => $member->name,
                        "url" => $seoCanonical,
                    ];
                    if ($member->designation) $person['jobTitle'] = $member->designation;
                    if ($member->avatar_url)  $person['image'] = $member->avatar_url;
                    if ($member->linkedin_url) $person['sameAs'] = [$member->linkedin_url];
                    if ($member->bio) $person['description'] = $member->bio;
                    $person['worksFor'] = ["@type" => "Organization", "name" => "Kawach Technology", "url" => url('/')];

                    return [
                        "@type" => "ListItem",
                        "position" => $i + 1,
                        "item" => $person,
                    ];
                })->values(),
            ],
        ],
    ];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($teamSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@include('layouts.head')
@include('modal.getquote')
@include('modal.navgetquote')
@include('modal.scedulecall')

<body>

@include('layouts.navbar')

<style>
:root{
  --tm-primary:#1a73e8; --tm-dark-navy:#0b1b3e; --tm-darker-navy:#081029;
  --tm-text-dark:#1a1a2e; --tm-text-muted:#5c6a82;
  --tm-bg-light:#f4f6fb; --tm-border:#e2e8f0;
}
.tm-page{ font-family:'Open Sans', sans-serif; color:var(--tm-text-dark); }
.tm-page h1, .tm-page h2{ font-family:'Nunito', sans-serif; font-weight:900; line-height:1.2; margin:0; }
.tm-container{ max-width:1180px; margin:0 auto; padding:0 24px; }

.tm-hero{
  position:relative; overflow:hidden; color:#fff;
  background:linear-gradient(150deg,var(--tm-darker-navy) 0%, var(--tm-dark-navy) 55%, #102757 100%);
  padding:64px 0 60px;
}
.tm-breadcrumb{ font-size:.78rem; color:#a9c1ee; margin-bottom:20px; }
.tm-breadcrumb a{ color:#a9c1ee; text-decoration:none; }
.tm-breadcrumb a:hover{ color:#fff; }
.tm-hero h1{ font-size:clamp(1.9rem,3.8vw,2.6rem); max-width:760px; margin-bottom:16px; }
.tm-hero p{ color:#c7d6f5; font-size:1.08rem; max-width:760px; margin:0; }

.tm-section{ padding:70px 0; }

.tm-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:32px; }
@media(max-width:991.98px){ .tm-grid{ grid-template-columns:repeat(2, 1fr); } }
@media(max-width:575.98px){ .tm-grid{ grid-template-columns:1fr; } }

.tm-card{
    background:#fff; border-radius:18px; padding:0 26px 30px; text-align:center;
    box-shadow:0 10px 30px rgba(13,27,62,.06); border:1px solid var(--tm-border);
    transition:transform .25s ease, box-shadow .25s ease;
    overflow:hidden;
}
.tm-card:hover{ transform:translateY(-5px); box-shadow:0 18px 40px rgba(13,27,62,.1); }

/* Professional portrait treatment — matches the homepage spotlight cards. */
.tm-photo-wrap{
    position:relative; width:100%; aspect-ratio:4 / 3.4; margin:0 0 20px;
    border-radius:0 0 20px 20px; overflow:hidden;
    background:linear-gradient(135deg, var(--tm-dark-navy), #1f3a6e);
}
.tm-photo-img{ width:100%; height:100%; object-fit:cover; object-position:top center; }
.tm-photo-fallback{
    width:100%; height:100%; display:flex; align-items:center; justify-content:center;
    color:#fff; font-family:'Nunito', sans-serif; font-weight:800; font-size:2.2rem;
}
.tm-exp-badge{
    position:absolute; right:12px; bottom:12px;
    background:rgba(13,27,62,.85); color:#fff; backdrop-filter:blur(4px);
    font-size:.72rem; font-weight:700; letter-spacing:.3px; padding:5px 11px; border-radius:20px;
}

.tm-name{ font-size:1.1rem; font-weight:800; margin-bottom:4px; }
.tm-title{ color:var(--tm-primary); font-weight:700; font-size:.9rem; margin-bottom:10px; }
.tm-role-pill{
    display:inline-block; font-size:.72rem; font-weight:700; letter-spacing:.3px;
    color:var(--tm-text-muted); background:var(--tm-bg-light); padding:4px 12px; border-radius:20px;
    margin-bottom:14px;
}
.tm-bio{ color:var(--tm-text-muted); font-size:.87rem; line-height:1.65; margin:0 0 12px; text-align:left; }
.tm-responsibilities{ color:var(--tm-text-muted); font-size:.82rem; line-height:1.6; margin:0 0 14px; text-align:left; }
.tm-responsibilities strong{ color:var(--tm-text-dark); display:block; font-size:.72rem; text-transform:uppercase; letter-spacing:.4px; margin-bottom:4px; }
.tm-linkedin{
    display:inline-flex; align-items:center; justify-content:center;
    width:36px; height:36px; border-radius:50%;
    background:var(--tm-bg-light); color:#0a66c2; font-size:1rem;
    transition:background .2s, color .2s;
}
.tm-linkedin:hover{ background:#0a66c2; color:#fff; }

.tm-empty{ text-align:center; max-width:520px; margin:0 auto; padding:40px 0; }
.tm-empty i{ font-size:2.4rem; color:var(--tm-primary); margin-bottom:18px; }
.tm-empty p{ color:var(--tm-text-muted); font-size:1rem; }
</style>

<div class="tm-page">

  <section class="tm-hero">
    <div class="tm-container">
      <div class="tm-breadcrumb"><a href="{{ url('/') }}">Home</a> / Team</div>
      <h1>Meet the team behind Kawach Technology</h1>
      <p>{{ $introSummary }}</p>
    </div>
  </section>

  <section class="tm-section">
    <div class="tm-container">
      @if($teamMembers->isNotEmpty())
      <div class="tm-grid">
        @foreach($teamMembers as $member)
        <div class="tm-card">
          <div class="tm-photo-wrap">
            @if($member->avatar_url)
              <img src="{{ $member->avatar_url }}" alt="{{ $member->name }}, {{ $member->designation ?? 'team member' }} at Kawach Technology" class="tm-photo-img" loading="lazy">
            @else
              <div class="tm-photo-fallback" style="background:{{ $member->avatar_color }};">{{ $member->initials }}</div>
            @endif
            @if($member->years_experience)
            <span class="tm-exp-badge">{{ $member->years_experience }}+ yrs exp.</span>
            @endif
          </div>

          <h2 class="tm-name">{{ $member->name }}</h2>
          @if($member->designation)
          <p class="tm-title">{{ $member->designation }}</p>
          @endif
          @if($member->team_role)
          <span class="tm-role-pill">{{ $member->team_role }}</span>
          @endif

          @if($member->bio)
          <p class="tm-bio">{{ $member->bio }}</p>
          @endif

          @if($member->responsibilities)
          <p class="tm-responsibilities"><strong>Focus areas</strong>{{ $member->responsibilities }}</p>
          @endif

          @if($member->linkedin_url)
          <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener" class="tm-linkedin" aria-label="{{ $member->name }} on LinkedIn">
              <i class="fa-brands fa-linkedin-in"></i>
          </a>
          @endif
        </div>
        @endforeach
      </div>
      @else
      <div class="tm-empty">
        <i class="fa-solid fa-people-group"></i>
        <p>Team profiles are being added. Check back soon to meet the people behind Kawach Technology.</p>
      </div>
      @endif
    </div>
  </section>

</div>

@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
