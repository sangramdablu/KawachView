
{{-- ── SERVICES CAROUSEL SECTION ──────────────────────────────── --}}
@php
use App\Models\Page;
$services = Page::with('service')->published()->byType('service')->orderBy('sort_order')->orderBy('id')->get();
$gradients = ['svc-blue', 'svc-purple', 'svc-teal', 'svc-green', 'svc-amber', 'svc-coral'];

if (!function_exists('svcIcon')) {
    function svcIcon(string $title): string {
        $t = strtolower($title);
        return match(true) {
            str_contains($t, 'custom software') => 'fas fa-laptop-code',
            str_contains($t, 'web') => 'fas fa-globe',
            str_contains($t, 'mobile') || str_contains($t, 'app develop') => 'fas fa-mobile-alt',
            str_contains($t, 'ui') || str_contains($t, 'ux') || str_contains($t, 'design') => 'fas fa-palette',
            str_contains($t, 'cloud') || str_contains($t, 'devops') => 'fas fa-cloud',
            str_contains($t, 'ai') || str_contains($t, 'machine learning') || str_contains($t, 'ml') => 'fas fa-brain',
            str_contains($t, 'dedicated') || str_contains($t, 'team') || str_contains($t, 'hire') => 'fas fa-users-gear',
            str_contains($t, 'quality') || str_contains($t, 'testing') || str_contains($t, 'qa') => 'fas fa-vial',
            str_contains($t, 'api') || str_contains($t, 'integration') => 'fas fa-plug',
            str_contains($t, 'security') => 'fas fa-shield-alt',
            str_contains($t, 'database') => 'fas fa-database',
            default => 'fas fa-layer-group',
        };
    }
}
@endphp
<style>
.services-section{
    padding:100px 0;
    overflow:hidden;
    position:relative;
    background:var(--bg-light, #f4f6fb);
}

/* ── Decorative background (cubes, blobs, dots, arc) ───────────── */

.services-section .container{
    position:relative;
    z-index:1;
}

.svc-bg-deco{
    position:absolute;
    inset:0;
    z-index:0;
    overflow:hidden;
    pointer-events:none;
}

.svc-blob{
    position:absolute;
    border-radius:50%;
    filter:blur(50px);
}

.svc-blob-1{
    width:340px;
    height:340px;
    left:-120px;
    bottom:-100px;
    background:radial-gradient(circle,rgba(59,130,246,.30),transparent 70%);
}

.svc-blob-2{
    width:220px;
    height:220px;
    right:-60px;
    top:-40px;
    background:radial-gradient(circle,rgba(99,102,241,.22),transparent 70%);
}

.svc-blob-3{
    width:200px;
    height:200px;
    right:6%;
    bottom:6%;
    background:radial-gradient(circle,rgba(59,130,246,.18),transparent 70%);
}

.svc-dots{
    position:absolute;
    top:-20px;
    right:0;
    width:360px;
    height:360px;
    background-image:radial-gradient(rgba(26,115,232,.35) 1.5px, transparent 1.5px);
    background-size:18px 18px;
    -webkit-mask-image:radial-gradient(circle at 70% 30%, #000 0%, transparent 70%);
    mask-image:radial-gradient(circle at 70% 30%, #000 0%, transparent 70%);
    opacity:.6;
}

.svc-arc{
    position:absolute;
    top:50%;
    left:-260px;
    width:480px;
    height:480px;
    border:1px solid rgba(26,115,232,.16);
    border-radius:50%;
    transform:translateY(-50%);
}

/* Isometric CSS cubes */
.svc-cube{
    position:absolute;
}

.svc-cube .cube-face{
    position:absolute;
    width:100%;
    height:100%;
}

.svc-cube .cube-top{
    background:linear-gradient(135deg,#dce9ff,#aecbfa);
    clip-path:polygon(50% 0%, 100% 25%, 50% 50%, 0% 25%);
}

.svc-cube .cube-left{
    background:linear-gradient(135deg,#9fc0f0,#7fa8e6);
    clip-path:polygon(0% 25%, 50% 50%, 50% 100%, 0% 75%);
}

.svc-cube .cube-right{
    background:linear-gradient(135deg,#bcd6fa,#8fb6ee);
    clip-path:polygon(50% 50%, 100% 25%, 100% 75%, 50% 100%);
}

.svc-cube-1{
    top:8%;
    left:3%;
    width:92px;
    height:106px;
    opacity:.85;
    transform:rotate(-4deg);
}

.svc-cube-2{
    top:38%;
    right:9%;
    width:52px;
    height:60px;
    opacity:.4;
    transform:rotate(8deg);
}

.services-section .section-eyebrow{
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

.services-section .section-title{
    font-size:clamp(2rem,4vw,2.75rem);
    font-weight:800;
    color:var(--text-dark, #1a1a2e);
    max-width:680px;
    margin:0 auto 18px;
    line-height:1.2;
}

.services-section .section-intro{
    max-width:700px;
    margin:0 auto;
    color:var(--text-muted, #6c757d);
    font-size:1.02rem;
    line-height:1.75;
}

/* SLIDER */

.svc-slider{
    position:relative;
    margin-top:56px;
}

.svc-track{
    display:flex;
    gap:26px;

    overflow-x:auto;
    overflow-y:hidden;

    scroll-snap-type:x mandatory;
    scroll-behavior:smooth;

    scrollbar-width:none;
    -ms-overflow-style:none;
    padding:6px 6px 10px;
}

.svc-track::-webkit-scrollbar{
    display:none;
}

/* CARD */

.svc-card{
    flex:0 0 calc(33.333% - 18px);
    display:flex;
    flex-direction:column;

    background:#fff;
    border-radius:20px;
    overflow:hidden;

    border:1px solid var(--border-light, #e2e8f0);
    box-shadow:0 6px 18px rgba(15,23,42,.06);

    text-decoration:none;
    transition:.35s ease;
    scroll-snap-align:start;
}

.svc-card:hover{
    transform:translateY(-8px);
    border-color:transparent;
    box-shadow:0 24px 48px rgba(13,27,62,.16);
}

.svc-card-img{
    height:170px;
    flex-shrink:0;
    overflow:hidden;
    position:relative;
}

.svc-card-img::after{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(to top, rgba(0,0,0,.4), transparent 65%);
}

.svc-card-image{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.7s ease;
}

.svc-card:hover .svc-card-image{
    transform:scale(1.08);
}

/* Category gradient banners — shown when a service has no featured image */
.svc-blue  { background:linear-gradient(135deg,#2196f3,#1565c0); }
.svc-purple{ background:linear-gradient(135deg,#8e5bf2,#5e35b1); }
.svc-teal  { background:linear-gradient(135deg,#26c6da,#00838f); }
.svc-green { background:linear-gradient(135deg,#43c882,#1b8a53); }
.svc-amber { background:linear-gradient(135deg,#ffb74d,#e8760a); }
.svc-coral { background:linear-gradient(135deg,#ff7a7a,#d63f3f); }

.svc-card-img.has-photo .svc-icon-badge{
    position:absolute;
    left:20px;
    bottom:-24px;
    z-index:2;
}

.svc-icon-wrap{
    display:flex;
    align-items:center;
    justify-content:center;
    height:100%;
}

.svc-icon-wrap i,
.svc-icon-badge i{
    font-size:24px;
    color:#fff;
}

.svc-icon-wrap i{
    width:56px;
    height:56px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:rgba(255,255,255,.18);
    border:1px solid rgba(255,255,255,.35);
    border-radius:16px;
    backdrop-filter:blur(4px);
}

.svc-icon-badge{
    width:52px;
    height:52px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:14px;
    background:linear-gradient(135deg,var(--primary-blue,#1a73e8),var(--accent-blue,#2196f3));
    box-shadow:0 8px 20px rgba(26,115,232,.35);
    border:3px solid #fff;
}

.svc-card-body{
    padding:24px 24px 22px;
    display:flex;
    flex-direction:column;
    flex:1;
}

.svc-card-img.has-photo + .svc-card-body{
    padding-top:36px;
}

.svc-card-title{
    font-size:1.1rem;
    font-weight:700;
    color:var(--text-dark, #1a1a2e);
    margin-bottom:8px;
    line-height:1.35;
}

.svc-card-desc{
    color:var(--text-muted, #6c757d);
    line-height:1.6;
    font-size:.92rem;
    margin-bottom:16px;

    display:-webkit-box;
    -webkit-line-clamp:3;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.svc-tags{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    margin-bottom:18px;
}

.svc-tag{
    font-size:.72rem;
    font-weight:600;
    color:var(--light-navy, #1f3a6e);
    background:var(--bg-light, #f4f6fb);
    border:1px solid var(--border-light, #e2e8f0);
    padding:4px 11px;
    border-radius:20px;
}

.svc-read-more{
    display:inline-flex;
    align-items:center;
    gap:8px;
    align-self:flex-start;
    margin-top:auto;

    font-weight:700;
    font-size:.88rem;
    color:var(--primary-blue, #1a73e8);

    padding:8px 16px;
    border-radius:30px;
    background:rgba(26,115,232,.08);
    transition:.3s;
}

.svc-read-more i{
    font-size:.78rem;
    transition:.3s;
}

.svc-card:hover .svc-read-more{
    background:var(--primary-blue, #1a73e8);
    color:#fff;
}

.svc-card:hover .svc-read-more i{
    transform:translateX(3px);
}

/* ARROWS */

.svc-arrow{
    width:54px;
    height:54px;
    border:none;
    border-radius:50%;
    background:#fff;
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    z-index:20;
    color:var(--text-dark, #1a1a2e);
    box-shadow:0 10px 25px rgba(0,0,0,.12);
    transition:.3s;
}

.svc-arrow:hover{
    background:var(--primary-blue, #1a73e8);
    color:#fff;
    transform:translateY(-50%) scale(1.08);
}

.svc-prev{ left:-25px; }
.svc-next{ right:-25px; }

.svc-empty{
    width:100%;
    text-align:center;
    padding:60px 0;
    color:var(--text-muted, #6c757d);
}

/* CTA STRIP */

.svc-cta-strip{
    margin-top:50px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:24px;
    flex-wrap:wrap;
    background:linear-gradient(120deg,var(--dark-navy,#0d1b3e),var(--mid-navy,#162447));
    border-radius:20px;
    padding:38px 42px;
}

.svc-cta-strip-text h3{
    color:#fff;
    font-size:1.35rem;
    font-weight:700;
    margin-bottom:6px;
}

.svc-cta-strip-text p{
    color:rgba(255,255,255,.7);
    font-size:.95rem;
    margin:0;
}

.svc-cta-strip-actions{
    display:flex;
    gap:14px;
    flex-wrap:wrap;
}

.svc-cta-btn{
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

.svc-cta-btn.primary{
    background:var(--primary-blue, #1a73e8);
    color:#fff;
}

.svc-cta-btn.primary:hover{
    background:var(--accent-blue, #2196f3);
    color:#fff;
}

.svc-cta-btn.outline{
    border-color:rgba(255,255,255,.3);
    color:#fff;
    background:transparent;
}

.svc-cta-btn.outline:hover{
    background:rgba(255,255,255,.1);
    border-color:rgba(255,255,255,.5);
}

/* LAPTOP */
@media(max-width:1200px){
    .svc-card{
        flex:0 0 calc(50% - 13px);
    }
}

/* TABLET */
@media(max-width:991px){
    .svc-arrow{
        display:none;
    }
    .svc-cta-strip{
        justify-content:center;
        text-align:center;
    }
}

/* MOBILE */
@media(max-width:576px){
    .services-section{
        padding:70px 0;
    }

    .services-section .container{
        max-width:100%;
        padding-left:0;
        padding-right:0;
    }

    .section-eyebrow,
    .services-section .section-title,
    .services-section .section-intro{
        padding-left:20px;
        padding-right:20px;
    }

    .svc-slider{
        margin-top:36px;
    }

    .svc-track{
        padding-left:20px;
        padding-right:20px;
        gap:18px;
    }

    .svc-card{
        flex:0 0 88%;
    }

    .svc-card-img{
        height:150px;
    }

    .svc-cta-strip{
        margin:36px 20px 0;
        padding:30px 24px;
    }

    .svc-cube-1{ width:60px; height:70px; }
    .svc-cube-2{ display:none; }
    .svc-dots{ width:220px; height:220px; }
}
</style>
<section class="services-section" id="services" aria-labelledby="services-heading">

    {{-- Decorative background layer — cubes, blurred blobs, dot pattern, arc --}}
    <div class="svc-bg-deco" aria-hidden="true">
        <div class="svc-arc"></div>
        <div class="svc-dots"></div>
        <div class="svc-blob svc-blob-1"></div>
        <div class="svc-blob svc-blob-2"></div>
        <div class="svc-blob svc-blob-3"></div>
        <div class="svc-cube svc-cube-1">
            <div class="cube-face cube-top"></div>
            <div class="cube-face cube-left"></div>
            <div class="cube-face cube-right"></div>
        </div>
        <div class="svc-cube svc-cube-2">
            <div class="cube-face cube-top"></div>
            <div class="cube-face cube-left"></div>
            <div class="cube-face cube-right"></div>
        </div>
    </div>

    <div class="container">
        <div class="text-center mb-2">
            <span class="section-eyebrow"><i class="fas fa-layer-group"></i> Our Expertise</span>
            <h2 class="section-title mx-auto" id="services-heading">
                Software Development Services Built Around Your Business
            </h2>
            <p class="section-intro">
                Kawach Technology delivers end-to-end software development services — from custom software and
                web &amp; mobile applications to cloud, AI, and dedicated engineering teams — helping startups and
                enterprises across the USA, Europe, and beyond ship reliable products faster.
            </p>
        </div>

        <div class="svc-slider">
            <button class="svc-arrow svc-prev" aria-label="Previous services">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="svc-track" id="svcTrack" itemscope itemtype="https://schema.org/ItemList">
                @forelse($services as $service)
                @php
                    $gradient = $gradients[$loop->index % count($gradients)];
                    $icon = svcIcon($service->title);
                    $features = $service->service->features ?? [];
                    if (is_string($features)) { $features = json_decode($features, true) ?? []; }
                    $tagList = collect($features)->pluck('title')->filter()->take(3);
                    $hasImage = !empty($service->featured_image);
                @endphp
                <a href="{{ route('pages.child.sevice_details', $service->slug) }}"
                   class="svc-card"
                   itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="{{ $loop->iteration }}">
                    <meta itemprop="url" content="{{ route('pages.child.sevice_details', $service->slug) }}">

                    <div class="svc-card-img {{ $gradient }} {{ $hasImage ? 'has-photo' : '' }}">
                        @if($hasImage)
                        <img
                            src="{{ config('app.images_path').$service->featured_image }}"
                            alt="{{ $service->image_alt ?? $service->title }}"
                            title="{{ $service->image_title ?? $service->title }}"
                            class="svc-card-image"
                            itemprop="image"
                            loading="lazy"
                            onerror="this.style.display='none'; this.parentElement.classList.remove('has-photo'); this.parentElement.querySelector('.svc-icon-badge').style.display='none'; this.parentElement.querySelector('.svc-icon-wrap').style.display='flex';">
                        <div class="svc-icon-badge"><i class="{{ $icon }}"></i></div>
                        <div class="svc-icon-wrap" style="display:none;">
                            <i class="{{ $icon }}"></i>
                        </div>
                        @else
                        <div class="svc-icon-wrap">
                            <i class="{{ $icon }}"></i>
                        </div>
                        @endif
                    </div>

                    <div class="svc-card-body">
                        <h3 class="svc-card-title" itemprop="name">
                            {{ $service->title }}
                        </h3>
                        <p class="svc-card-desc" itemprop="description">
                            {{ \Illuminate\Support\Str::words(strip_tags($service->service->short_description ?? $service->service->content ?? ''), 24, '...') }}
                        </p>

                        @if($tagList->isNotEmpty())
                        <div class="svc-tags">
                            @foreach($tagList as $tag)
                            <span class="svc-tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                        @endif

                        <span class="svc-read-more">
                            Read More <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
                @empty
                <div class="svc-empty">No Services Available</div>
                @endforelse
            </div>
            <button class="svc-arrow svc-next" aria-label="Next services">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div class="svc-cta-strip">
            <div class="svc-cta-strip-text">
                <h3>Don't see exactly what you need?</h3>
                <p>Talk to our team about a tailored solution for your project.</p>
            </div>
            <div class="svc-cta-strip-actions">
                <a href="{{ route('services') }}" class="svc-cta-btn outline">
                    <i class="fas fa-th-large"></i> View All Services
                </a>
                <button class="svc-cta-btn primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                    <i class="fas fa-comments"></i> Get Free Consultation
                </button>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('#svcTrack');
    if (!track) return;

    const next = document.querySelector('.svc-next');
    const prev = document.querySelector('.svc-prev');
    let autoSlide;

    function getScrollAmount(){
        const card = track.querySelector('.svc-card');
        if(!card) return 300;
        const gap = 26;
        return card.offsetWidth + gap;
    }

    next?.addEventListener('click', () => {
        track.scrollBy({ left:getScrollAmount(), behavior:'smooth' });
    });

    prev?.addEventListener('click', () => {
        track.scrollBy({ left:-getScrollAmount(), behavior:'smooth' });
    });

    function startAuto(){
        autoSlide = setInterval(() => {
            const maxScroll = track.scrollWidth - track.clientWidth;
            if(track.scrollLeft >= maxScroll - 10){
                track.scrollTo({ left:0, behavior:'smooth' });
            }else{
                track.scrollBy({ left:getScrollAmount(), behavior:'smooth' });
            }
        }, 4000);
    }

    function stopAuto(){
        clearInterval(autoSlide);
    }

    track.addEventListener('mouseenter', stopAuto);
    track.addEventListener('mouseleave', startAuto);
    track.addEventListener('touchstart', stopAuto);
    track.addEventListener('touchend', startAuto);

    startAuto();
});
</script>
