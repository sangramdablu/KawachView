@php
use App\Models\Page;
use Illuminate\Support\Str;

try {
    $recentCaseStudies = Page::with('caseStudy')
        ->where('page_type', 'casestudy')
        ->where('status', 'published')
        ->latest('published_at')
        ->take(3)
        ->get();
} catch (\Exception $e) {
    $recentCaseStudies = collect();
}

// Illustrative example projects used to fill out the grid when there
// aren't yet 3 published case studies to show.
$fallbackProjects = [
    [
        'title' => 'E-Commerce Platform',
        'desc'  => 'A scalable online storefront with custom checkout, inventory sync, and analytics dashboard.',
        'tag'   => 'E-Commerce',
        'tech'  => ['Laravel', 'React', 'Stripe'],
        'icon'  => 'fas fa-cart-shopping',
    ],
    [
        'title' => 'AI-Powered CRM',
        'desc'  => 'A CRM with automated lead scoring and AI-assisted follow-ups to shorten sales cycles.',
        'tag'   => 'AI & CRM',
        'tech'  => ['Python', 'Node.js', 'PostgreSQL'],
        'icon'  => 'fas fa-robot',
    ],
    [
        'title' => 'Logistics Management System',
        'desc'  => 'A real-time fleet and inventory tracking platform built to streamline supply chain operations.',
        'tag'   => 'Logistics',
        'tech'  => ['Vue.js', 'Laravel', 'AWS'],
        'icon'  => 'fas fa-truck-fast',
    ],
];

$slotsNeeded = max(0, 3 - $recentCaseStudies->count());
$fallbackToShow = array_slice($fallbackProjects, 0, $slotsNeeded);

if (!function_exists('projMockIcon')) {
    function projMockIcon(?string $industry): string {
        $i = strtolower($industry ?? '');
        return match(true) {
            str_contains($i, 'health') => 'fas fa-stethoscope',
            str_contains($i, 'real estate') => 'fas fa-building',
            str_contains($i, 'logistic') => 'fas fa-truck-fast',
            str_contains($i, 'commerce') || str_contains($i, 'retail') => 'fas fa-cart-shopping',
            str_contains($i, 'ai') || str_contains($i, 'crm') => 'fas fa-robot',
            str_contains($i, 'finance') || str_contains($i, 'bank') => 'fas fa-chart-line',
            default => 'fas fa-display',
        };
    }
}
@endphp
<style>
.projects-section{
    --pj-navy:#0b1b3a;
    --pj-blue:#1677ff;
    --pj-blue-soft:rgba(22,119,255,.08);
    --pj-muted:#5b6b8c;
    --pj-border:#e7ecf5;

    padding:110px 0;
    background:#fff;
}

.projects-section .section-eyebrow{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-size:.78rem;
    font-weight:700;
    letter-spacing:1.5px;
    text-transform:uppercase;
    color:var(--pj-blue);
    background:var(--pj-blue-soft);
    padding:7px 18px;
    border-radius:30px;
    margin-bottom:24px;
}

.projects-section .section-title{
    font-size:clamp(2.1rem,4vw,2.9rem);
    font-weight:800;
    color:var(--pj-navy);
    max-width:640px;
    margin:0 auto 20px;
    line-height:1.22;
}

.projects-section .section-title .title-accent{
    display:block;
    color:var(--pj-blue);
}

.projects-section .section-intro{
    max-width:640px;
    margin:0 auto;
    color:var(--pj-muted);
    font-size:1.02rem;
    line-height:1.75;
}

/* STATS STRIP */

.proj-stats{
    display:flex;
    justify-content:center;
    align-items:stretch;
    flex-wrap:wrap;
    margin-top:52px;
    padding-bottom:52px;
}

.proj-stat-item{
    display:flex;
    align-items:center;
    gap:14px;
    padding:0 40px;
    border-right:1px solid var(--pj-border);
}

.proj-stat-item:last-child{
    border-right:none;
}

.proj-stat-icon{
    width:46px;
    height:46px;
    flex-shrink:0;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px;
    background:var(--pj-blue-soft);
    color:var(--pj-blue);
    font-size:18px;
}

.proj-stat-val{
    font-size:1.6rem;
    font-weight:800;
    color:var(--pj-navy);
    line-height:1.1;
}

.proj-stat-label{
    font-size:.8rem;
    color:var(--pj-muted);
    font-weight:600;
    margin-top:2px;
    white-space:nowrap;
}

/* GRID */

.proj-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:28px;
    margin-top:8px;
}

.proj-card{
    display:flex;
    flex-direction:column;
    height:100%;
    background:#fff;
    border:1px solid var(--pj-border);
    border-radius:18px;
    overflow:hidden;
    text-decoration:none;
    box-shadow:0 2px 10px rgba(11,27,58,.04);
    transition:.3s ease;
}

.proj-card:hover{
    transform:translateY(-6px);
    border-color:transparent;
    box-shadow:0 20px 44px rgba(11,27,58,.12);
}

.proj-thumb{
    position:relative;
    height:230px;
    flex-shrink:0;
    overflow:hidden;
    background:linear-gradient(180deg,#f6f8fc 0%,#eef2f9 100%);
}

.proj-thumb img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    transition:.6s ease;
}

.proj-card:hover .proj-thumb img{
    transform:scale(1.06);
}

/* Product-mockup illustration — used when there's no real photo */
.proj-mock{
    position:absolute;
    inset:0;
    display:flex;
    align-items:center;
    justify-content:center;
}

.proj-mock-device{
    width:74%;
    background:#fff;
    border-radius:10px;
    padding:14px;
    box-shadow:0 18px 34px rgba(11,27,58,.12);
    border:1px solid var(--pj-border);
}

.proj-mock-bar{
    display:flex;
    gap:5px;
    margin-bottom:12px;
}

.proj-mock-dot{
    width:6px;
    height:6px;
    border-radius:50%;
    background:var(--pj-border);
}

.proj-mock-cards{
    display:flex;
    gap:8px;
    margin-bottom:10px;
}

.proj-mock-cards span{
    flex:1;
    height:26px;
    border-radius:6px;
    background:var(--pj-blue-soft);
}

.proj-mock-chart{
    display:flex;
    align-items:flex-end;
    gap:5px;
    height:44px;
}

.proj-mock-chart span{
    flex:1;
    border-radius:3px 3px 0 0;
    background:linear-gradient(180deg,var(--pj-blue),#5aa2ff);
    opacity:.85;
}

.proj-mock-accessory{
    position:absolute;
    right:22px;
    bottom:20px;
    width:44px;
    height:44px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:#fff;
    box-shadow:0 10px 22px rgba(11,27,58,.14);
    color:var(--pj-blue);
    font-size:16px;
}

.proj-tag{
    position:absolute;
    top:16px;
    left:16px;
    z-index:2;
    font-size:.72rem;
    font-weight:700;
    letter-spacing:.2px;
    color:var(--pj-navy);
    background:#fff;
    box-shadow:0 4px 12px rgba(11,27,58,.1);
    padding:6px 14px;
    border-radius:20px;
}

.proj-metric{
    position:absolute;
    bottom:-22px;
    right:20px;
    z-index:2;
    max-width:180px;
    background:#fff;
    border-radius:14px;
    box-shadow:0 10px 24px rgba(11,27,58,.16);
    padding:10px 16px;
    text-align:center;
}

.proj-metric-val{
    font-size:.92rem;
    font-weight:800;
    color:var(--pj-blue);
    line-height:1.25;
}

.proj-metric-label{
    font-size:.66rem;
    font-weight:600;
    color:var(--pj-muted);
    text-transform:uppercase;
    letter-spacing:.3px;
}

.proj-body{
    padding:26px 24px 24px;
    display:flex;
    flex-direction:column;
    flex:1;
}

.proj-body.has-metric{
    padding-top:34px;
}

.proj-title{
    font-size:1.1rem;
    font-weight:700;
    color:var(--pj-navy);
    margin-bottom:8px;
    line-height:1.35;
}

.proj-desc{
    color:var(--pj-muted);
    line-height:1.6;
    font-size:.92rem;
    margin-bottom:18px;
}

.proj-tech{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    margin-bottom:20px;
    flex:1;
    align-content:flex-start;
}

.proj-tech span{
    font-size:.72rem;
    font-weight:600;
    color:var(--pj-blue);
    background:var(--pj-blue-soft);
    padding:5px 12px;
    border-radius:20px;
}

.proj-read-more{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-weight:700;
    font-size:.9rem;
    color:var(--pj-blue);
    margin-top:auto;
}

.proj-read-more i{
    font-size:.78rem;
    transition:.3s;
}

.proj-card:hover .proj-read-more i{
    transform:translateX(4px);
}

/* CTA STRIP */

.proj-cta-strip{
    margin-top:56px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:24px;
    flex-wrap:wrap;
    background:var(--pj-navy);
    border-radius:20px;
    padding:38px 42px;
}

.proj-cta-strip-left{
    display:flex;
    align-items:center;
    gap:18px;
}

.proj-cta-strip-icon{
    width:52px;
    height:52px;
    flex-shrink:0;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:rgba(22,119,255,.18);
    border:1px solid rgba(22,119,255,.35);
    color:#fff;
    font-size:18px;
}

.proj-cta-strip-text h3{
    color:#fff;
    font-size:1.3rem;
    font-weight:700;
    margin-bottom:6px;
}

.proj-cta-strip-text p{
    color:rgba(255,255,255,.65);
    font-size:.95rem;
    margin:0;
}

.proj-cta-strip-actions{
    display:flex;
    gap:14px;
    flex-wrap:wrap;
}

.proj-cta-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:13px 26px;
    border-radius:10px;
    font-weight:700;
    font-size:.92rem;
    text-decoration:none;
    white-space:nowrap;
    transition:.3s;
    border:1px solid transparent;
}

.proj-cta-btn.primary{
    background:var(--pj-blue);
    color:#fff;
}

.proj-cta-btn.primary:hover{
    background:#3d8bff;
    color:#fff;
}

.proj-cta-btn.outline{
    border-color:rgba(255,255,255,.3);
    color:#fff;
    background:transparent;
}

.proj-cta-btn.outline:hover{
    background:rgba(255,255,255,.1);
    border-color:rgba(255,255,255,.5);
}

/* TABLET */
@media(max-width:991px){
    .proj-grid{
        grid-template-columns:repeat(2,1fr);
    }
    .proj-stat-item{
        padding:0 22px;
    }
    .proj-cta-strip{
        justify-content:center;
        text-align:center;
    }
    .proj-cta-strip-left{
        flex-direction:column;
        text-align:center;
    }
}

/* MOBILE */
@media(max-width:576px){
    .projects-section{
        padding:70px 0;
    }
    .proj-stats{
        gap:18px 0;
    }
    .proj-stat-item{
        border-right:none;
        padding:0 14px;
        flex:0 0 50%;
        justify-content:center;
    }
    .proj-grid{
        grid-template-columns:1fr;
        gap:20px;
        margin-top:36px;
    }
    .proj-cta-strip{
        padding:30px 24px;
    }
}
</style>
<section class="projects-section" id="projects" aria-labelledby="projects-heading">
    <div class="container text-center">
        <span class="section-eyebrow"><i class="fas fa-briefcase"></i> Our Portfolio</span>
        <h2 class="section-title mx-auto" id="projects-heading">
            Projects That Deliver Real<span class="title-accent">Business Impact</span>
        </h2>
        <p class="section-intro">
            From startups to enterprises, we've partnered with clients across healthcare, real estate, logistics,
            and e-commerce to design, build, and scale software that solves real operational challenges.
        </p>

        <div class="proj-stats">
            <div class="proj-stat-item">
                <div class="proj-stat-icon"><i class="fas fa-users"></i></div>
                <div>
                    <div class="proj-stat-val">200+</div>
                    <div class="proj-stat-label">Happy Clients</div>
                </div>
            </div>
            <div class="proj-stat-item">
                <div class="proj-stat-icon"><i class="fas fa-earth-americas"></i></div>
                <div>
                    <div class="proj-stat-val">20+</div>
                    <div class="proj-stat-label">Countries Served</div>
                </div>
            </div>
            <div class="proj-stat-item">
                <div class="proj-stat-icon"><i class="fas fa-award"></i></div>
                <div>
                    <div class="proj-stat-val">50+</div>
                    <div class="proj-stat-label">Team Experts</div>
                </div>
            </div>
            <div class="proj-stat-item">
                <div class="proj-stat-icon"><i class="fas fa-thumbs-up"></i></div>
                <div>
                    <div class="proj-stat-val">98%</div>
                    <div class="proj-stat-label">Satisfaction Rate</div>
                </div>
            </div>
        </div>

        <div class="proj-grid text-start">

            {{-- ── Real case studies ─────────────────────────────── --}}
            @foreach($recentCaseStudies as $case)
            @php
                $cs = $case->caseStudy;
                $kpis = $cs->kpis ?? [];
                if (is_string($kpis)) { $kpis = json_decode($kpis, true) ?? []; }
                $firstKpi = $kpis[0] ?? null;
                $techList = collect($cs->tech_array ?? [])->take(3);
                $excerpt = Str::limit(strip_tags($cs->challenge ?? ''), 110) ?: Str::limit(strip_tags($case->meta_description ?? ''), 110);
                $mockIcon = projMockIcon($cs->client_industry ?? null);
            @endphp
            <a href="{{ route('case-studies.show', $case->slug) }}" class="proj-card">
                <div class="proj-thumb">
                    <span class="proj-tag">{{ $cs->client_industry ?? 'Case Study' }}</span>
                    @if($case->featured_image)
                        <img src="{{ config('app.images_path') . $case->featured_image }}" alt="{{ $case->image_alt ?? $case->title }}" loading="lazy">
                    @else
                        <div class="proj-mock">
                            <div class="proj-mock-device">
                                <div class="proj-mock-bar">
                                    <div class="proj-mock-dot"></div>
                                    <div class="proj-mock-dot"></div>
                                    <div class="proj-mock-dot"></div>
                                </div>
                                <div class="proj-mock-cards">
                                    <span></span><span></span>
                                </div>
                                <div class="proj-mock-chart">
                                    <span style="height:40%;"></span>
                                    <span style="height:70%;"></span>
                                    <span style="height:55%;"></span>
                                    <span style="height:90%;"></span>
                                    <span style="height:65%;"></span>
                                    <span style="height:80%;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="proj-mock-accessory"><i class="{{ $mockIcon }}"></i></div>
                    @endif
                    @if($firstKpi)
                    <div class="proj-metric">
                        <div class="proj-metric-val">{{ Str::limit($firstKpi['value'] ?? $firstKpi['label'] ?? '', 24) }}</div>
                        <div class="proj-metric-label">Key Result</div>
                    </div>
                    @endif
                </div>
                <div class="proj-body {{ $firstKpi ? 'has-metric' : '' }}">
                    <h3 class="proj-title">{{ $case->title }}</h3>
                    <p class="proj-desc">{{ $excerpt }}</p>
                    @if($techList->isNotEmpty())
                    <div class="proj-tech">
                        @foreach($techList as $tech)
                        <span>{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif
                    <span class="proj-read-more">View Case Study <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>
            @endforeach

            {{-- ── Illustrative examples (fill remaining slots) ──── --}}
            @foreach($fallbackToShow as $proj)
            <div class="proj-card" style="cursor:default;">
                <div class="proj-thumb">
                    <span class="proj-tag">{{ $proj['tag'] }}</span>
                    <div class="proj-mock">
                        <div class="proj-mock-device">
                            <div class="proj-mock-bar">
                                <div class="proj-mock-dot"></div>
                                <div class="proj-mock-dot"></div>
                                <div class="proj-mock-dot"></div>
                            </div>
                            <div class="proj-mock-cards">
                                <span></span><span></span>
                            </div>
                            <div class="proj-mock-chart">
                                <span style="height:35%;"></span>
                                <span style="height:60%;"></span>
                                <span style="height:45%;"></span>
                                <span style="height:85%;"></span>
                                <span style="height:70%;"></span>
                                <span style="height:95%;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="proj-mock-accessory"><i class="{{ $proj['icon'] }}"></i></div>
                </div>
                <div class="proj-body">
                    <h3 class="proj-title">{{ $proj['title'] }}</h3>
                    <p class="proj-desc">{{ $proj['desc'] }}</p>
                    <div class="proj-tech">
                        @foreach($proj['tech'] as $tech)
                        <span>{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="proj-cta-strip">
            <div class="proj-cta-strip-left">
                <div class="proj-cta-strip-icon"><i class="fas fa-bullseye"></i></div>
                <div class="proj-cta-strip-text">
                    <h3>Want results like these for your business?</h3>
                    <p>Let's talk about your project and how we can help you build it.</p>
                </div>
            </div>
            <div class="proj-cta-strip-actions">
                <a href="{{ route('casestudy') }}" class="proj-cta-btn outline">
                    <i class="fas fa-th-large"></i> View All Case Studies
                </a>
                <button class="proj-cta-btn primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                    <i class="fas fa-paper-plane"></i> Start Your Project
                </button>
            </div>
        </div>
    </div>
</section>
