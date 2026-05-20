@php
use App\Models\Page;
try {
  $recentCaseStudies = Page::with('caseStudy')->where('page_type', 'casestudy')->where('status', 'published')->latest('published_at')->take(3)->get();
} catch (\Exception $e) {
  $recentCaseStudies = collect();
}
@endphp
<section class="projects-section">
  <div class="container text-center">
    <div class="section-divider"></div>
    <h2 class="section-title">Recent Projects</h2>
    <p class="section-subtitle">See Our Success Stories</p>
    <div class="row g-4">
      @if($recentCaseStudies->count() > 0)
          @foreach($recentCaseStudies as $case)
          <div class="col-md-4">
              <div class="project-card">
                  {{-- Thumbnail --}}
                  <div class="project-thumb">
                      @if($case->featured_image)
                          <img src="{{ config('app.images_path') . $case->featured_image }}" alt="{{ $case->title }}" class="img-fluid w-100 h-100 object-fit-cover" style="border-radius:18px 18px 0 0; min-height:240px; max-height:240px;">
                      @else
                          {{-- Fallback Mockup --}}
                          <div class="project-thumb-mockup">
                              <div class="mock-browser">
                                  <div class="mock-browser-bar">
                                      <div class="mock-dot mock-dot-r"></div>
                                      <div class="mock-dot mock-dot-y"></div>
                                      <div class="mock-dot mock-dot-g"></div>
                                  </div>
                                  <div class="mock-line mock-line-full"></div>
                                  <div class="mock-line mock-line-med"></div>
                                  <div class="mock-line mock-line-short"></div>
                                  <div class="mock-line mock-line-full"></div>
                              </div>
                          </div>
                      @endif
                  </div>
                  {{-- Content --}}
                  <div class="project-info text-start">
                      <div class="project-title">
                          {{ $case->title }}
                      </div>
                      <p class="project-desc">
                          {{ \Illuminate\Support\Str::limit( strip_tags( $case->caseStudy->challenge ?? $case->meta_description ), 60 ) }}
                      </p>
                      <a href="{{ route('case-studies.show', $case->slug) }}" class="project-read-more"> View Case Study <i class="fas fa-arrow-right"></i></a>
                  </div>
              </div>
          </div>
          @endforeach
      @else
          {{-- E-Commerce --}}
          <div class="col-md-4">
              <div class="project-card">
                  <div class="project-thumb project-thumb-ecom">
                      <div class="project-thumb-mockup">
                          <div class="mock-browser">
                              <div class="mock-browser-bar">
                                  <div class="mock-dot mock-dot-r"></div>
                                  <div class="mock-dot mock-dot-y"></div>
                                  <div class="mock-dot mock-dot-g"></div>
                              </div>
                              <div class="mock-line mock-line-full"></div>
                              <div class="mock-line mock-line-med"></div>
                              <div class="mock-line mock-line-short"></div>
                              <div class="mock-line mock-line-full"></div>
                          </div>
                      </div>
                  </div>
                  <div class="project-info text-start">
                      <div class="project-title">
                          E-Commerce Platform
                      </div>
                      <p class="project-desc">
                          Boosted sales by 150%
                      </p>
                  </div>
              </div>
          </div>

          {{-- CRM --}}
          <div class="col-md-4">
              <div class="project-card">
                  <div class="project-thumb project-thumb-crm">
                      <div class="project-thumb-mockup">
                          <div class="mock-browser">
                              <div class="mock-browser-bar">
                                  <div class="mock-dot mock-dot-r"></div>
                                  <div class="mock-dot mock-dot-y"></div>
                                  <div class="mock-dot mock-dot-g"></div>
                              </div>
                              <div class="mock-line mock-line-full"></div>
                              <div class="mock-line mock-line-short"></div>
                              <div class="mock-line mock-line-med"></div>
                          </div>
                      </div>
                  </div>

                  <div class="project-info text-start">
                      <div class="project-title">
                          AI-Powered CRM
                      </div>

                      <p class="project-desc">
                          Automated lead management
                      </p>
                  </div>
              </div>
          </div>

          {{-- LMS --}}
          <div class="col-md-4">
              <div class="project-card">
                  <div class="project-thumb project-thumb-lms">
                      <div class="project-thumb-mockup">
                          <div class="mock-browser">
                              <div class="mock-browser-bar">
                                  <div class="mock-dot mock-dot-r"></div>
                                  <div class="mock-dot mock-dot-y"></div>
                                  <div class="mock-dot mock-dot-g"></div>
                              </div>
                              <div class="mock-line mock-line-full"></div>
                              <div class="mock-line mock-line-med"></div>
                              <div class="mock-line mock-line-short"></div>
                          </div>
                      </div>
                  </div>

                  <div class="project-info text-start">
                      <div class="project-title">
                          Logistics Management System
                      </div>

                      <p class="project-desc">
                          Optimized supply chain
                      </p>
                  </div>
              </div>
          </div>
      @endif
  </div>
  </div>
</section>

<style>
  .project-read-more{
      display:inline-flex;
      align-items:center;
      gap:8px;
      margin-top:14px;
      font-size:.85rem;
      font-weight:700;
      color:var(--primary-blue);
      text-decoration:none;
      transition:.25s ease;
  }

  .project-read-more:hover{
      gap:12px;
      color:#0d47a1;
  }

  .project-thumb img{
      width:100%;
      height:240px;
      object-fit:cover;
      display:block;
  }
</style>