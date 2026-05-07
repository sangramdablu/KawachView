{{-- Our Process --}}
        <div class="content-card anim d2">
          <h2 class="content-card-title"><i class="fas fa-project-diagram"></i> Our Process</h2>
          <div class="process-steps">
            @if(isset($service->service->processes) && $service->service->processes->count())
              @foreach($service->service->processes as $i => $step)
              <div class="process-step">
                <div class="process-step-num">{{ $i + 1 }}</div>
                <div>
                  <div class="process-step-title">{{ $step->title }}</div>
                  <div class="process-step-desc">{{ $step->description }}</div>
                </div>
              </div>
              @endforeach
            @else
              @foreach([
                ['Discovery & Requirements','We conduct in-depth workshops to understand your goals, audience, and technical constraints. No assumptions — just clarity.'],
                ['Architecture & Planning','Our architects design a scalable system blueprint. Tech stack, infrastructure, timelines, and milestones are defined before a line of code is written.'],
                ['Agile Development','Two-week sprints with daily standups. You get a working demo at the end of every sprint so feedback loops stay tight.'],
                ['Quality Assurance','Manual and automated testing across devices, browsers, and edge cases. We don\'t ship until it\'s solid.'],
                ['Deployment & Go-Live','Zero-downtime deployment to your environment. CI/CD pipelines ensure smooth updates from day one.'],
                ['Support & Iteration','30-day post-launch support included. We monitor, fix, and iterate based on real user data.'],
              ] as $i => $s)
              <div class="process-step">
                <div class="process-step-num">{{ $i + 1 }}</div>
                <div>
                  <div class="process-step-title">{{ $s[0] }}</div>
                  <div class="process-step-desc">{{ $s[1] }}</div>
                </div>
              </div>
              @endforeach
            @endif
          </div>
        </div>