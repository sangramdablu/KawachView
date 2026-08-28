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
        'thumb' => 'proj-thumb-ecom',
    ],
    [
        'title' => 'AI-Powered CRM',
        'desc'  => 'A CRM with automated lead scoring and AI-assisted follow-ups to shorten sales cycles.',
        'tag'   => 'AI & CRM',
        'tech'  => ['Python', 'Node.js', 'PostgreSQL'],
        'thumb' => 'proj-thumb-crm',
    ],
    [
        'title' => 'Logistics Management System',
        'desc'  => 'A real-time fleet and inventory tracking platform built to streamline supply chain operations.',
        'tag'   => 'Logistics',
        'tech'  => ['Vue.js', 'Laravel', 'AWS'],
        'thumb' => 'proj-thumb-lms',
    ],
];

$slotsNeeded = max(0, 3 - $recentCaseStudies->count());
$fallbackToShow = array_slice($fallbackProjects, 0, $slotsNeeded);
@endphp
<style>
.projects-section{
    padding:100px 0;
    background:var(--white, #fff);
}

.projects-section .section-eyebrow{
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

.projects-section .section-title{
    font-size:clamp(2rem,4vw,2.75rem);
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    max-width:680px;
    margin:0 auto 18px;
    line-height:1.2;
}

.projects-section .section-intro{
    max-width:700px;
    margin:0 auto;
    color:var(--text-muted, #6c757d);
    font-size:1.02rem;
    line-height:1.75;
}

/* STATS STRIP */

.proj-stats{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:44px;
    margin-top:38px;
    padding-bottom:38px;
    border-bottom:1px solid var(--border-light, #e2e8f0);
}

.proj-stat-val{
    font-size:1.7rem;
    font-weight:800;
    color:var(--primary-blue, #1a73e8);
    line-height:1.1;
}

.proj-stat-label{
    font-size:.82rem;
    color:var(--text-muted, #6c757d);
    font-weight:600;
    margin-top:4px;
}

/* GRID */

.proj-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:28px;
    margin-top:48px;
}

.proj-card{
    display:flex;
    flex-direction:column;
    background:#fff;
    border:1px solid var(--border-light, #e2e8f0);
    border-radius:20px;
    overflow:hidden;
    text-decoration:none;
    transition:.35s ease;
}

.proj-card:hover{
    transform:translateY(-8px);
    border-color:transparent;
    box-shadow:0 24px 48px rgba(13,27,62,.14);
}

.proj-thumb{
    position:relative;
    height:220px;
    flex-shrink:0;
    overflow:hidden;
}

.proj-thumb img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    transition:.6s ease;
}

.proj-card:hover .proj-thumb img{
    transform:scale(1.08);
}

.proj-thumb-ecom{ background:linear-gradient(135deg,#2c3e50,#3498db); }
.proj-thumb-crm { background:linear-gradient(135deg,#1a3a6e,#2196f3); }
.proj-thumb-lms { background:linear-gradient(135deg,#0d2137,#1976d2); }
.proj-thumb-default{ background:linear-gradient(135deg,var(--dark-navy,#0d1b3e),var(--accent-blue,#2196f3)); }

.proj-thumb-mockup{
    position:absolute;
    inset:0;
    display:flex;
    align-items:center;
    justify-content:center;
}

.proj-mock-browser{
    width:78%;
    background:rgba(255,255,255,.1);
    border-radius:8px;
    padding:10px;
    backdrop-filter:blur(4px);
    border:1px solid rgba(255,255,255,.2);
}

.proj-mock-bar{
    display:flex;
    gap:5px;
    margin-bottom:10px;
}

.proj-mock-dot{
    width:7px;
    height:7px;
    border-radius:50%;
}

.proj-mock-dot.r{ background:#ff5f57; }
.proj-mock-dot.y{ background:#febc2e; }
.proj-mock-dot.g{ background:#28c840; }

.proj-mock-line{
    height:6px;
    border-radius:3px;
    background:rgba(255,255,255,.3);
    margin-bottom:7px;
}

.proj-mock-line.short{ width:50%; }
.proj-mock-line.med{ width:75%; }
.proj-mock-line.full{ width:100%; }

.proj-tag{
    position:absolute;
    top:16px;
    left:16px;
    z-index:2;
    font-size:.72rem;
    font-weight:700;
    letter-spacing:.3px;
    color:#fff;
    background:rgba(13,27,62,.55);
    backdrop-filter:blur(6px);
    border:1px solid rgba(255,255,255,.25);
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
    box-shadow:0 10px 24px rgba(13,27,62,.16);
    padding:10px 16px;
    text-align:center;
}

.proj-metric-val{
    font-size:.92rem;
    font-weight:800;
    color:var(--primary-blue, #1a73e8);
    line-height:1.25;
}

.proj-metric-label{
    font-size:.66rem;
    font-weight:600;
    color:var(--text-muted, #6c757d);
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
    font-size:1.12rem;
    font-weight:700;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:8px;
    line-height:1.35;
}

.proj-desc{
    color:var(--text-muted, #6c757d);
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
    color:var(--light-navy, #1f3a6e);
    background:var(--bg-light, #f4f6fb);
    border:1px solid var(--border-light, #e2e8f0);
    padding:4px 11px;
    border-radius:20px;
}

.proj-read-more{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-weight:700;
    font-size:.9rem;
    color:var(--primary-blue, #1a73e8);
    margin-top:auto;
    padding-top:16px;
    border-top:1px solid var(--border-light, #e2e8f0);
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
    background:linear-gradient(120deg,var(--dark-navy,#0d1b3e),var(--mid-navy,#162447));
    border-radius:20px;
    padding:38px 42px;
}

.proj-cta-strip-text h3{
    color:#fff;
    font-size:1.35rem;
    font-weight:700;
    margin-bottom:6px;
}

.proj-cta-strip-text p{
    color:rgba(255,255,255,.7);
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
    background:var(--primary-blue, #1a73e8);
    color:#fff;
}

.proj-cta-btn.primary:hover{
    background:var(--accent-blue, #2196f3);
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
    .proj-cta-strip{
        justify-content:center;
        text-align:center;
    }
}

/* MOBILE */
@media(max-width:576px){
    .projects-section{
        padding:70px 0;
    }
    .proj-stats{
        gap:28px;
    }
    .proj-grid{
        grid-template-columns:1fr;
        gap:20px;
        margin-top:40px;
    }
    .proj-cta-strip{
        padding:30px 24px;
    }
}
</style>
<section class="projects-section" id="projects" aria-labelledby="projects-heading">
    <div class="container text-center">
        <span class="section-eyebrow"><i class="fas fa-diagram-project"></i> Our Portfolio</span>
        <h2 class="section-title mx-auto" id="projects-heading">
            Projects That Deliver Real Business Impact
        </h2>
        <p class="section-intro">
            From startups to enterprises, we've partnered with clients across healthcare, real estate, logistics,
            and e-commerce to design, build, and scale software that solves real operational challenges.
        </p>

        <div class="proj-stats">
            <div>
                <div class="proj-stat-val">200+</div>
                <div class="proj-stat-label">Happy Clients</div>
            </div>
            <div>
                <div class="proj-stat-val">20+</div>
                <div class="proj-stat-label">Countries Served</div>
            </div>
            <div>
                <div class="proj-stat-val">50+</div>
                <div class="proj-stat-label">Team Experts</div>
            </div>
            <div>
                <div class="proj-stat-val">98%</div>
                <div class="proj-stat-label">Satisfaction Rate</div>
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
            @endphp
            <a href="{{ route('case-studies.show', $case->slug) }}" class="proj-card">
                <div class="proj-thumb {{ $case->featured_image ? '' : 'proj-thumb-default' }}">
                    <span class="proj-tag">{{ $cs->client_industry ?? 'Case Study' }}</span>
                    @if($case->featured_image)
                        <img src="{{ config('app.images_path') . $case->featured_image }}" alt="{{ $case->image_alt ?? $case->title }}" loading="lazy">
                    @else
                        <div class="proj-thumb-mockup">
                            <div class="proj-mock-browser">
                                <div class="proj-mock-bar">
                                    <div class="proj-mock-dot r"></div>
                                    <div class="proj-mock-dot y"></div>
                                    <div class="proj-mock-dot g"></div>
                                </div>
                                <div class="proj-mock-line full"></div>
                                <div class="proj-mock-line med"></div>
                                <div class="proj-mock-line short"></div>
                                <div class="proj-mock-line full"></div>
                            </div>
                        </div>
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
                <div class="proj-thumb {{ $proj['thumb'] }}">
                    <span class="proj-tag">{{ $proj['tag'] }}</span>
                    <div class="proj-thumb-mockup">
                        <div class="proj-mock-browser">
                            <div class="proj-mock-bar">
                                <div class="proj-mock-dot r"></div>
                                <div class="proj-mock-dot y"></div>
                                <div class="proj-mock-dot g"></div>
                            </div>
                            <div class="proj-mock-line full"></div>
                            <div class="proj-mock-line med"></div>
                            <div class="proj-mock-line short"></div>
                        </div>
                    </div>
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
            <div class="proj-cta-strip-text">
                <h3>Want results like these for your business?</h3>
                <p>Let's talk about your project and how we can help you build it.</p>
            </div>
            <div class="proj-cta-strip-actions">
                <a href="{{ route('casestudy') }}" class="proj-cta-btn outline">
                    <i class="fas fa-th-large"></i> View All Case Studies
                </a>
                <button class="proj-cta-btn primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                    <i class="fas fa-comments"></i> Start Your Project
                </button>
            </div>
        </div>
    </div>
</section>
