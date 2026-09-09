<!-- ============================================================
     TECHNOLOGY OVERVIEW — SEO Phase 14
     Previously a 6-tab, ~46-card "technology encyclopedia" with
     unverifiable per-tool "skill level" percentages (same issue as the
     Phase 11 stats audit — precise-looking numbers with no real backing).
     Replaced with a single concise strip; the detailed stack now lives on
     each service page (see sevice_details.blade.php's "Technologies We
     Use" section) and on each case study's own Tech Stack section, per
     the brief's "keep the homepage broad, move detail elsewhere" rule.
     ============================================================ -->

<style>
  .tech-stack-section {
    padding: 70px 0 64px;
    background: #f0f4fb;
    position: relative;
    overflow: hidden;
  }
  .tech-stack-section::before {
    content: '';
    position: absolute;
    top: -100px; left: 50%;
    transform: translateX(-50%);
    width: 800px; height: 400px;
    background: radial-gradient(ellipse, rgba(26,115,232,.06) 0%, transparent 70%);
    pointer-events: none;
  }

  .tech-ticker-wrap {
    overflow: hidden;
    margin-top: 10px;
    padding: 16px 0;
    border-top: 1px solid #dce6f5;
    border-bottom: 1px solid #dce6f5;
    mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 6%, black 94%, transparent 100%);
  }
  .tech-ticker {
    display: flex;
    gap: 44px;
    width: max-content;
    animation: tickerScroll 32s linear infinite;
  }
  .tech-ticker:hover { animation-play-state: paused; }
  @keyframes tickerScroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
  }
  .ticker-item {
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    font-size: .85rem;
    font-weight: 600;
    color: #5a6e8a;
    transition: color .2s;
  }
  .ticker-item:hover { color: #1a73e8; }
  .ticker-item img {
    width: 22px; height: 22px;
    object-fit: contain;
    flex-shrink: 0;
  }

  .tech-see-more {
    text-align: center;
    margin-top: 28px;
    font-size: .92rem;
    color: #5a6e8a;
  }
  .tech-see-more a {
    color: #1a73e8;
    font-weight: 700;
    text-decoration: none;
  }
  .tech-see-more a:hover { text-decoration: underline; }

  @media (max-width: 768px) {
    .tech-stack-section { padding: 52px 0 48px; }
  }
</style>

<section class="tech-stack-section">
  <div class="container">

    <div class="text-center mb-4">
      <div class="section-divider"></div>
      <h2 class="section-title">Our Technology Stack</h2>
      <p class="section-subtitle">A snapshot of the tools we build with — see the specific stack behind each project on its service or case study page.</p>
    </div>

    <!-- Scrolling ticker -->
    <div class="tech-ticker-wrap">
      <div class="tech-ticker">
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/react/61DAFB" alt="React" loading="lazy"> React.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/nodedotjs/339933" alt="Node" loading="lazy"> Node.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/python/3776AB" alt="Python" loading="lazy"> Python</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/amazonaws/FF9900" alt="AWS" loading="lazy"> AWS</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/docker/2496ED" alt="Docker" loading="lazy"> Docker</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/kubernetes/326CE5" alt="K8s" loading="lazy"> Kubernetes</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/tensorflow/FF6F00" alt="TF" loading="lazy"> TensorFlow</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/postgresql/4169E1" alt="PG" loading="lazy"> PostgreSQL</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/flutter/02569B" alt="Flutter" loading="lazy"> Flutter</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/typescript/3178C6" alt="TS" loading="lazy"> TypeScript</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/googlecloud/4285F4" alt="GCP" loading="lazy"> Google Cloud</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/microsoftazure/0078D4" alt="Azure" loading="lazy"> Azure</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/openai/000000" alt="OpenAI" loading="lazy"> OpenAI</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/mongodb/47A248" alt="Mongo" loading="lazy"> MongoDB</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/vuedotjs/4FC08D" alt="Vue" loading="lazy"> Vue.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/redis/DC382D" alt="Redis" loading="lazy"> Redis</div>
        <!-- duplicate for seamless loop -->
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/react/61DAFB" alt="React" loading="lazy"> React.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/nodedotjs/339933" alt="Node" loading="lazy"> Node.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/python/3776AB" alt="Python" loading="lazy"> Python</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/amazonaws/FF9900" alt="AWS" loading="lazy"> AWS</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/docker/2496ED" alt="Docker" loading="lazy"> Docker</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/kubernetes/326CE5" alt="K8s" loading="lazy"> Kubernetes</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/tensorflow/FF6F00" alt="TF" loading="lazy"> TensorFlow</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/postgresql/4169E1" alt="PG" loading="lazy"> PostgreSQL</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/flutter/02569B" alt="Flutter" loading="lazy"> Flutter</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/typescript/3178C6" alt="TS" loading="lazy"> TypeScript</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/googlecloud/4285F4" alt="GCP" loading="lazy"> Google Cloud</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/microsoftazure/0078D4" alt="Azure" loading="lazy"> Azure</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/openai/000000" alt="OpenAI" loading="lazy"> OpenAI</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/mongodb/47A248" alt="Mongo" loading="lazy"> MongoDB</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/vuedotjs/4FC08D" alt="Vue" loading="lazy"> Vue.js</div>
        <div class="ticker-item"><img src="https://cdn.simpleicons.org/redis/DC382D" alt="Redis" loading="lazy"> Redis</div>
      </div>
    </div>

    <p class="tech-see-more">
      See the exact stack behind a real project in our <a href="{{ route('casestudy') }}">case studies</a>,
      or the tools used for a specific service on its <a href="{{ route('services') }}">services page</a>.
    </p>

  </div>
</section>
