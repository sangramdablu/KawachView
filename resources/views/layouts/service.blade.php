
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

    background:#fff;

    border-radius:24px;

    overflow:hidden;

    border:1px solid rgba(0,0,0,.05);

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

    transition:.35s ease;

    scroll-snap-align:start;
}

.svc-card:hover{
    transform:translateY(-8px);

    box-shadow:
    0 20px 50px rgba(0,0,0,.12);
}

.svc-card-img{
    height:240px;
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
    rgba(0,0,0,.25),
    transparent
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

.svc-icon-wrap{
    display:flex;
    align-items:center;
    justify-content:center;

    height:100%;
}

.svc-icon-wrap i{
    font-size:60px;
    color:#fff;
}

.svc-card-body{
    padding:25px;
}

.svc-card-title{
    font-size:1.25rem;
    font-weight:700;
    margin-bottom:12px;
}

.svc-card-desc{
    color:#6b7280;
    line-height:1.7;
}

.svc-read-more{
    text-decoration:none;
    font-weight:600;
    color:inherit;
}

.svc-read-more::after{
    content:' →';
    transition:.3s;
}

.svc-read-more:hover::after{
    margin-left:6px;
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
        height:220px;
    }

    .svc-card-body{
        padding:20px;
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
                        >

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

                            {{
                                \Illuminate\Support\Str::words(
                                strip_tags(
                                $service->service->short_description ??
                                $service->service->content ??
                                ''
                                ),
                                12,
                                '...'
                                )
                            }}

                        </p>

                        <a
                            href="{{ $service->canonical_url ?: url('/services/'.$service->slug) }}"
                            class="svc-read-more"
                        >
                            Read More
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