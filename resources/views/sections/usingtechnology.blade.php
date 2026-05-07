{{-- Technologies --}}
        @if(isset($service->service->technologies) && $service->service->technologies->count())
        <div class="content-card anim d3">
          <h2 class="content-card-title"><i class="fas fa-layer-group"></i> Technologies We Use</h2>
          <div class="tech-pills">
            @foreach($service->service->technologies as $tech)
            <span class="tech-pill"><i class="{{ $tech->icon ?? 'fas fa-code' }}"></i> {{ $tech->name }}</span>
            @endforeach
          </div>
        </div>
        @else
        <div class="content-card anim d3">
          <h2 class="content-card-title"><i class="fas fa-layer-group"></i> Technologies We Use</h2>
          <div class="tech-pills">
            @foreach(['Laravel','React','Vue.js','Node.js','Python','AWS','Docker','MySQL','PostgreSQL','Redis','Tailwind CSS','Flutter','Swift','Kotlin','TypeScript','Git'] as $t)
            <span class="tech-pill"><i class="fas fa-code"></i> {{ $t }}</span>
            @endforeach
          </div>
        </div>
        @endif