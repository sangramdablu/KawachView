{{-- ============================================================
     OUR TEAM — homepage leadership spotlight (CEO / CTO / Project Manager)

     Data source: the same `users` table + `is_team_member` flag KawachAdmin's
     Team module already manages (KawachAdmin/app/Http/Controllers/TeamController.php,
     resources/views/roles/index.blade.php's Edit User modal). No separate
     "featured" field was added — the CEO/CTO/PM shown here are picked purely
     by matching the free-text `designation` an admin already fills in
     (see User::getLeadershipRankAttribute()), so managing who appears here
     is just editing that same user's designation in KawachAdmin.

     Full roster lives at /team (PagesController::teamIndex), which lists
     every is_team_member=true user. Hides entirely if nobody has been
     flagged yet, rather than showing an empty/broken-looking section.
     ============================================================ --}}
@php
use App\Models\User;
use Illuminate\Support\Str;

$leadershipTeam = User::where('is_team_member', true)
    ->get()
    ->filter(fn ($u) => $u->leadership_rank <= 3)
    ->sortBy('leadership_rank')
    ->values()
    ->take(3);
@endphp

@if($leadershipTeam->isNotEmpty())
<section class="our-team-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-divider"></div>
            <h2 class="section-title">Meet Our Team</h2>
            <p class="section-subtitle">The people leading Kawach Technology's projects, day to day.</p>
        </div>

        <div class="ot-grid">
            @foreach($leadershipTeam as $member)
            <div class="ot-card">
                <div class="ot-photo-wrap">
                    @if($member->avatar_url)
                        <img src="{{ $member->avatar_url }}" alt="{{ $member->name }}" class="ot-photo-img" loading="lazy">
                    @else
                        <div class="ot-photo-fallback" style="background:{{ $member->avatar_color }};">{{ $member->initials }}</div>
                    @endif
                    @if($member->years_experience)
                    <span class="ot-exp-badge">{{ $member->years_experience }}+ yrs</span>
                    @endif
                </div>

                <h3 class="ot-name">{{ $member->name }}</h3>
                <p class="ot-title">{{ $member->designation }}</p>
                @if($member->team_role)
                <span class="ot-role-pill">{{ $member->team_role }}</span>
                @endif

                @if($member->bio)
                <p class="ot-bio">{{ Str::limit($member->bio, 110) }}</p>
                @endif

                @if($member->linkedin_url)
                <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener" class="ot-linkedin" aria-label="{{ $member->name }} on LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                @endif
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('team') }}" class="ot-btn">
                Meet the Full Team <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<style>
.our-team-section{ background:var(--bg-light, #f4f6fb); padding:100px 0; }

.ot-grid{
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap:32px;
    max-width:960px;
    margin:0 auto;
}
.ot-card{
    background:#fff;
    border-radius:18px;
    padding:0 28px 32px;
    text-align:center;
    box-shadow:0 10px 30px rgba(13,27,62,.06);
    border:1px solid #eef1f7;
    transition:transform .25s ease, box-shadow .25s ease;
    overflow:hidden;
}
.ot-card:hover{ transform:translateY(-6px); box-shadow:0 20px 44px rgba(13,27,62,.12); }

/* Professional portrait treatment — a tall rounded rectangle rather than a
   circular crop, closer to how corporate headshots are actually framed. */
.ot-photo-wrap{
    position:relative;
    width:100%;
    aspect-ratio:4 / 3.4;
    margin:0 0 22px;
    border-radius:0 0 22px 22px;
    overflow:hidden;
    background:linear-gradient(135deg, var(--dark-navy, #0d1b3e), var(--light-navy, #1f3a6e));
}
.ot-photo-img{ width:100%; height:100%; object-fit:cover; object-position:top center; }
.ot-photo-fallback{
    width:100%; height:100%;
    display:flex; align-items:center; justify-content:center;
    color:#fff; font-family:'Nunito', sans-serif; font-weight:800; font-size:2.4rem;
}
.ot-exp-badge{
    position:absolute; right:12px; bottom:12px;
    background:rgba(13,27,62,.85); color:#fff; backdrop-filter:blur(4px);
    font-size:.72rem; font-weight:700; letter-spacing:.3px;
    padding:5px 11px; border-radius:20px;
}

.ot-name{ font-family:'Nunito', sans-serif; font-weight:800; font-size:1.15rem; color:var(--text-dark, #1a1a2e); margin-bottom:4px; }
.ot-title{ color:var(--primary-blue, #1a73e8); font-weight:700; font-size:.92rem; margin-bottom:10px; }
.ot-role-pill{
    display:inline-block; font-size:.74rem; font-weight:700; letter-spacing:.3px;
    color:#5c6a82; background:#eef2f9; padding:4px 12px; border-radius:20px;
    margin-bottom:14px;
}
.ot-bio{ color:#5c6a82; font-size:.86rem; line-height:1.65; margin:0 0 14px; }
.ot-linkedin{
    display:inline-flex; align-items:center; justify-content:center;
    width:36px; height:36px; border-radius:50%;
    background:#eef2f9; color:#0a66c2; font-size:1rem;
    transition:background .2s, color .2s;
}
.ot-linkedin:hover{ background:#0a66c2; color:#fff; }

.ot-btn{
    display:inline-flex; align-items:center; gap:10px;
    background:var(--primary-blue, #1a73e8); color:#fff; font-weight:700; font-size:.96rem;
    padding:13px 28px; border-radius:10px; text-decoration:none;
    transition:background .2s, transform .2s;
}
.ot-btn:hover{ background:#1558b0; color:#fff; transform:translateY(-2px); }
.ot-btn i{ font-size:.82rem; transition:transform .2s; }
.ot-btn:hover i{ transform:translateX(3px); }

@media(max-width:767.98px){
    .our-team-section{ padding:70px 0; }
    .ot-grid{ grid-template-columns:1fr; max-width:340px; gap:22px; }
}
</style>
@endif
