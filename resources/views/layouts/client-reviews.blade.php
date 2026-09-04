{{-- ── CLIENT REVIEWS (real testimonials pulled from case studies) ──────
     Replaces the Clutch Reviews section (see layouts/testmonials.blade.php,
     disabled but left intact in pages/index.blade.php for restoration).

     Data source: PageCaseStudy.testimonial_quote/testimonial_name/
     testimonial_role — the exact same fields shown on each case study's own
     detail page. Nothing is duplicated or re-entered; editing a testimonial
     in the case study admin updates this section automatically.

     Curation: reuses the existing Page.is_featured flag (no new "featured
     on homepage" field was needed — it already yields a sensible 3-6 item
     set) and Page.sort_order for admin-controllable ordering, both already
     part of the page model.

     Single-testimonial spotlight: one card visible at a time on every
     breakpoint, arrows step through them. No star rating is shown — there
     is no real rating field on PageCaseStudy, and inventing one would
     violate the "never fake a rating" rule this section was built under. --}}
@php
use App\Models\PageCaseStudy;

$clientReviews = PageCaseStudy::with('page')
    ->whereNotNull('testimonial_quote')
    ->where('testimonial_quote', '!=', '')
    ->whereNotNull('testimonial_name')
    ->where('testimonial_name', '!=', '')
    ->whereHas('page', function ($q) {
        $q->where('status', 'published')->where('is_featured', true);
    })
    ->get()
    ->sortBy(fn ($cs) => [$cs->page->sort_order, $cs->page->id])
    ->take(6)
    ->values();

if (!function_exists('revInitials')) {
    function revInitials(string $name): string {
        $parts = preg_split('/\s+/', trim($name));
        $first = mb_substr($parts[0] ?? '', 0, 1);
        $last  = count($parts) > 1 ? mb_substr(end($parts), 0, 1) : '';
        return mb_strtoupper($first . $last);
    }
}
@endphp

@if($clientReviews->isNotEmpty())
<section class="rev-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-divider"></div>
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle">Real feedback from businesses we've helped build, modernize, and scale.</p>
        </div>

        <div class="rev-slider">
            @if($clientReviews->count() > 1)
            <button class="rev-arrow rev-prev" type="button" aria-label="Previous testimonial">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            @endif

            <div class="rev-track" id="revTrack">
                @foreach($clientReviews as $review)
                <article class="rev-card">
                    <i class="fa-solid fa-quote-left rev-quote-icon" aria-hidden="true"></i>
                    <blockquote class="rev-quote">
                        {{ $review->testimonial_quote }}
                    </blockquote>
                    <footer class="rev-author">
                        <div class="rev-avatar" aria-hidden="true">{{ revInitials($review->testimonial_name) }}</div>
                        <div class="rev-author-text">
                            <cite class="rev-author-name">{{ $review->testimonial_name }}</cite>
                            @if($review->testimonial_role)
                            <span class="rev-author-role">{{ $review->testimonial_role }}</span>
                            @endif
                        </div>
                    </footer>
                    <a href="{{ route('case-studies.show', $review->page->slug) }}"
                       class="rev-visit-btn"
                       aria-label="Visit case study: {{ $review->page->title }}">
                        Visit Case Study <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>
                @endforeach
            </div>

            @if($clientReviews->count() > 1)
            <button class="rev-arrow rev-next" type="button" aria-label="Next testimonial">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            @endif
        </div>
    </div>
</section>

<style>
.rev-section{ background:var(--bg-light); padding:100px 0; }

.rev-slider{ position:relative; margin:40px 0 0; }

.rev-track{
    display:flex;
    overflow-x:auto;
    overflow-y:hidden;
    scroll-snap-type:x mandatory;
    scroll-behavior:smooth;
    scrollbar-width:none;
    -ms-overflow-style:none;
}
.rev-track::-webkit-scrollbar{ display:none; }
.rev-track:focus-visible{ outline:2px solid var(--primary-blue, #1a73e8); outline-offset:4px; }

.rev-card{
    flex:0 0 100%;
    scroll-snap-align:start;
    display:flex;
    flex-direction:column;
    background:linear-gradient(135deg, #0d1b3e 0%, #17285c 55%, #0b1b3e 100%);
    border-radius:22px;
    padding:48px 56px;
    box-shadow:0 20px 50px rgba(11,27,62,.25);
}

.rev-quote-icon{ color:rgba(91,157,255,.5); font-size:2.2rem; margin-bottom:18px; }

.rev-quote{
    font-size:1.15rem;
    font-style:italic;
    line-height:1.75;
    color:#eef3ff;
    margin:0 0 28px;
}

.rev-author{ display:flex; align-items:center; gap:14px; margin-bottom:28px; }
.rev-avatar{
    flex-shrink:0; width:50px; height:50px; border-radius:50%;
    background:var(--primary-blue, #1a73e8); color:#fff;
    display:flex; align-items:center; justify-content:center;
    font-family:'Nunito', sans-serif; font-weight:800; font-size:.9rem;
}
.rev-author-text{ display:flex; flex-direction:column; }
.rev-author-name{ font-style:normal; font-weight:800; font-family:'Nunito', sans-serif; font-size:1rem; color:#fff; }
.rev-author-role{ font-size:.85rem; color:#8fb3f0; margin-top:2px; }

.rev-visit-btn{
    align-self:flex-start;
    display:inline-flex; align-items:center; gap:8px;
    background:rgba(255,255,255,.08); border:1.5px solid rgba(255,255,255,.25);
    color:#fff; font-size:.88rem; font-weight:700;
    padding:11px 22px; border-radius:8px; text-decoration:none;
    transition:background .2s, border-color .2s;
}
.rev-visit-btn:hover{ background:var(--primary-blue, #1a73e8); border-color:var(--primary-blue, #1a73e8); color:#fff; }
.rev-visit-btn:focus-visible{ outline:2px solid #fff; outline-offset:3px; }
.rev-visit-btn i{ font-size:.78rem; transition:transform .2s; }
.rev-visit-btn:hover i{ transform:translateX(3px); }

.rev-arrow{
    width:48px; height:48px; border:none; border-radius:50%;
    background:#fff; box-shadow:0 4px 16px rgba(15,23,42,.1);
    color:var(--text-dark, #1a1a2e); font-size:.9rem;
    display:flex; align-items:center; justify-content:center;
    position:absolute; top:50%; transform:translateY(-50%); z-index:2; cursor:pointer;
    transition:background .2s, color .2s;
}
.rev-arrow:hover{ background:var(--primary-blue, #1a73e8); color:#fff; }
.rev-arrow:focus-visible{ outline:2px solid var(--primary-blue, #1a73e8); outline-offset:3px; }
.rev-prev{ left:-24px; }
.rev-next{ right:-24px; }

@media(max-width:991px){
    .rev-prev{ left:-8px; }
    .rev-next{ right:-8px; }
}
@media(max-width:576px){
    .rev-section{ padding:70px 0; }
    .rev-card{ padding:36px 24px; border-radius:16px; }
    .rev-quote{ font-size:1.02rem; }
    .rev-arrow{ width:40px; height:40px; font-size:.78rem; }
    .rev-prev{ left:2px; }
    .rev-next{ right:2px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('#revTrack');
    if (!track) return;

    const next = document.querySelector('.rev-next');
    const prev = document.querySelector('.rev-prev');

    function getScrollAmount() {
        const card = track.querySelector('.rev-card');
        return card ? card.offsetWidth : track.clientWidth;
    }

    next?.addEventListener('click', () => {
        track.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
    });

    prev?.addEventListener('click', () => {
        track.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
    });
});
</script>
@endif
