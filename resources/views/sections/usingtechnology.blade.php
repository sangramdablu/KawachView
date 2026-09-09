{{-- Technologies — SEO Phase 14: this used to check $service->service->technologies
     (a relation that doesn't exist on PageService), so the condition was
     always false and every service page silently showed the same generic
     16-tech list regardless of what was actually entered for that service.
     Now reads the real technologies field via the tech_array accessor. --}}
        @if(!empty($service->tech_array))
        <div class="content-card anim d3">
          <h2 class="content-card-title"><i class="fas fa-layer-group"></i> Technologies We Use</h2>
          <div class="tech-pills">
            @foreach($service->tech_array as $tech)
            <span class="tech-pill"><i class="fas fa-code"></i> {{ $tech }}</span>
            @endforeach
          </div>
        </div>
        @endif