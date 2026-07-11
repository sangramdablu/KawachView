
{{-- ── SERVICES CAROUSEL SECTION ──────────────────────────────── --}}
@php
use App\Models\Page;
$services = Page::with('service')->published()->byType('service')->orderBy('sort_order')->limit(10)->get();
$gradients = [ 'svc-blue', 'svc-purple', 'svc-teal', 'svc-green', 'svc-amber', 'svc-coral' ];
$icons = [ 'fas fa-laptop-code', 'fas fa-brain', 'fas fa-cloud-upload-alt', 'fas fa-shield-alt', 'fas fa-database', 'fas fa-paint-brush', 'fas fa-robot', 'fas fa-chart-line', 'fas fa-mobile-alt', 'fas fa-server' ];
@endphp
<style>
.services-section{
    padding:90px 0;
    overflow:hidden;
    position:relative;
    background: #f0f4fb;
}

.section-title{
    font-size:clamp(2rem,4vw,3rem);
    font-weight:700;
}

.section-subtitle{
    color:#6b7280;
}

.svc-slider{
    position:relative;
}

.svc-track{
    display:flex;
    gap:24px;

    overflow-x:auto;
    overflow-y:hidden;

    scroll-snap-type:x mandatory;
    scroll-behavior:smooth;

    scrollbar-width:none;
    -ms-overflow-style:none;
}

.svc-track::-webkit-scrollbar{
    display:none;
}

/* CARD */

.svc-card{
    flex:0 0 calc(25% - 18px);
    display:flex;
    flex-direction:column;

    background:#fff;

    border-radius:20px;

    overflow:hidden;

    border:1px solid rgba(15,23,42,.06);

    box-shadow:
    0 6px 18px rgba(15,23,42,.06);

    transition:.35s ease;

    scroll-snap-align:start;
}

.svc-card:hover{
    transform:translateY(-6px);
    border-color:rgba(33,150,243,.25);

    box-shadow:
    0 18px 40px rgba(15,23,42,.14);
}

.svc-card-img{
    height:150px;
    flex-shrink:0;
    overflow:hidden;
    position:relative;
}

.svc-card-img::after{
    content:'';
    position:absolute;
    inset:0;

    background:
    linear-gradient(
    to top,
    rgba(0,0,0,.35),
    transparent 60%
    );
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

/* Fallback gradient backgrounds when a service has no featured image */
.svc-blue  { background:linear-gradient(135deg,#2196f3,#1565c0); }
.svc-purple{ background:linear-gradient(135deg,#8e5bf2,#5e35b1); }
.svc-teal  { background:linear-gradient(135deg,#26c6da,#00838f); }
.svc-green { background:linear-gradient(135deg,#43c882,#1b8a53); }
.svc-amber { background:linear-gradient(135deg,#ffb74d,#e8760a); }
.svc-coral { background:linear-gradient(135deg,#ff7a7a,#d63f3f); }

.svc-icon-wrap{
    display:flex;
    align-items:center;
    justify-content:center;

    height:100%;
}

.svc-icon-wrap i{
    font-size:26px;
    color:#fff;

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

.svc-card-body{
    padding:20px 22px 22px;
    display:flex;
    flex-direction:column;
    flex:1;
}

.svc-card-title{
    font-size:1.08rem;
    font-weight:700;
    margin-bottom:8px;
    line-height:1.35;
}

.svc-card-desc{
    color:#6b7280;
    line-height:1.6;
    font-size:.92rem;
    margin-bottom:16px;
    flex:1;

    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.svc-read-more{
    display:inline-flex;
    align-items:center;
    gap:8px;
    align-self:flex-start;

    text-decoration:none;
    font-weight:600;
    font-size:.88rem;
    color:#0d6efd;

    padding:8px 16px;
    border-radius:30px;
    background:rgba(13,110,253,.08);
    transition:.3s;
}

.svc-read-more i{
    font-size:.78rem;
    transition:.3s;
}

.svc-read-more:hover{
    background:#0d6efd;
    color:#fff;
}

.svc-read-more:hover i{
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

    box-shadow:
    0 10px 25px rgba(0,0,0,.12);

    transition:.3s;
}

.svc-arrow:hover{
    transform:translateY(-50%) scale(1.08);
}

.svc-prev{
    left:-25px;
}

.svc-next{
    right:-25px;
}

/* LAPTOP */

@media(max-width:1200px){

    .svc-card{
        flex:0 0 calc(33.333% - 16px);
    }

}

/* TABLET */

@media(max-width:991px){

    .svc-card{
        flex:0 0 calc(50% - 12px);
    }

    .svc-arrow{
        display:none;
    }

}

/* MOBILE */

@media(max-width:576px){

    .services-section .container{
        max-width:100%;
        padding-left:0;
        padding-right:0;
    }

    .section-title,
    .section-subtitle{
        padding-left:20px;
        padding-right:20px;
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
        height:140px;
    }

    .svc-card-body{
        padding:18px 20px 20px;
    }

}
</style>
<section class="services-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-divider"></div>
            <h2 class="section-title">Our Services</h2>
            <p class="section-subtitle">
                Expert Solutions for Every Industry
            </p>
        </div>

        <div class="svc-slider">
            <button class="svc-arrow svc-prev">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="svc-track" id="svcTrack">
                @forelse($services as $service)
                @php
                $gradient = $gradients[$loop->index % count($gradients)];
                $icon = $icons[$loop->index % count($icons)];
                @endphp
                <div class="svc-card">
                    <div class="svc-card-img {{ $gradient }}">
                        @if($service->featured_image)

                        <img
                            src="{{ config('app.images_path').$service->featured_image }}"
                            alt="{{ $service->image_alt ?? $service->title }}"
                            title="{{ $service->image_title ?? $service->title }}"
                            class="svc-card-image"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
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
                        <h3 class="svc-card-title">
                            {{ $service->title }}
                        </h3>
                        <p class="svc-card-desc">
                            {{ \Illuminate\Support\Str::words( strip_tags( $service->service->short_description ?? $service->service->content ?? '' ), 12, '...' ) }}
                        </p>
                        <a href="{{ route('pages.child.sevice_details', $service->slug) }}" class="svc-read-more">
                            Read More <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="w-100 text-center py-5">
                    No Services Available
                </div>
                @endforelse
            </div>
            <button class="svc-arrow svc-next">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('#svcTrack');
    const next  = document.querySelector('.svc-next');
    const prev  = document.querySelector('.svc-prev');
    let autoSlide;
    function getScrollAmount(){
        const card = track.querySelector('.svc-card');
        if(!card) return 300;
        const gap = 24;
        return card.offsetWidth + gap;
    }
    next?.addEventListener('click', () => {
        track.scrollBy({
            left:getScrollAmount(),
            behavior:'smooth'
        });
    });

    prev?.addEventListener('click', () => {
        track.scrollBy({
            left:-getScrollAmount(),
            behavior:'smooth'
        });
    });

    function startAuto(){
        autoSlide = setInterval(() => {
            const maxScroll =
            track.scrollWidth - track.clientWidth;
            if(track.scrollLeft >= maxScroll - 10){
                track.scrollTo({
                    left:0,
                    behavior:'smooth'
                });
            }else{
                track.scrollBy({
                    left:getScrollAmount(),
                    behavior:'smooth'
                });
            }
        },4000);
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