<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ember & Sky — Rooftop Live-Fire Kitchen, London</title>
<meta name="description" content="Ember & Sky is a rooftop live-fire restaurant in London serving BBQ, seafood and signature cocktails under open skies. Book a table, plan an event or explore the menu.">
<meta name="theme-color" content="#10100F">

<!-- Open Graph -->
<meta property="og:title" content="Ember & Sky — Rooftop Live-Fire Kitchen">
<meta property="og:description" content="Live-fire BBQ, rooftop views and warm hospitality in the heart of London.">
<meta property="og:type" content="website">
<meta property="og:image" content="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=1200&auto=format&fit=crop">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,340;0,9..144,440;0,9..144,560;1,9..144,440&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">


<style>
/* =========================
   GLOBAL STYLES
========================= */
:root{
  --bg: #10100F;
  --bg-soft: #191816;
  --bg-elevated: #1f1d1a;
  --line: rgba(244,235,221,0.12);
  --cream: #F4EBDD;
  --muted: #B9B0A3;
  --accent: #C96F3B;
  --accent-light: #E59A62;
  --gold: #C9A66B;
  --white: #FFFFFF;

  --font-ui: 'Manrope', system-ui, sans-serif;
  --font-display: 'Fraunces', Georgia, serif;

  --container: min(1320px, 92vw);
  --radius-sm: 3px;
  --ease: cubic-bezier(0.22, 1, 0.36, 1);
}

*, *::before, *::after{ box-sizing: border-box; }
html{ scroll-behavior: smooth; }
@media (prefers-reduced-motion: reduce){
  html{ scroll-behavior: auto; }
  *, *::before, *::after{
    animation-duration: 0.001ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.001ms !important;
    scroll-behavior: auto !important;
  }
}

body{
  margin:0;
  background: var(--bg);
  color: var(--cream);
  font-family: var(--font-ui);
  font-size: 16px;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
  width: 100%;
}

img{ max-width: 100%; display:block; }
a{ color: inherit; text-decoration: none; }
button{ font-family: inherit; cursor: pointer; }
input, textarea, select{ font-family: inherit; }
h1,h2,h3,h4,p{ margin:0; }

.container{ width: var(--container); margin-inline: auto; }

.eyebrow{
  font-family: var(--font-ui);
  font-size: 0.72rem;
  letter-spacing: 0.22em;
  color: var(--accent-light);
  font-weight: 600;
}

.section{ padding: clamp(4.5rem, 9vw, 8rem) 0; position: relative; }
.section-head{ max-width: 640px; margin-bottom: clamp(2.5rem, 5vw, 4rem); }

.display{
  font-family: var(--font-display);
  font-weight: 500;
  line-height: 1.02;
  letter-spacing: -0.01em;
  color: var(--cream);
}

.btn{
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  padding: 0.95rem 1.9rem;
  border-radius: var(--radius-sm);
  font-size: 0.92rem;
  font-weight: 600;
  letter-spacing: 0.03em;
  border: 1px solid transparent;
  transition: transform 0.4s var(--ease), background 0.4s var(--ease), border-color 0.4s var(--ease), color 0.4s var(--ease);
  min-height: 44px;
  white-space: nowrap;
}
.btn:focus-visible, a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible{
  outline: 2px solid var(--gold);
  outline-offset: 3px;
}
.btn-primary{ background: var(--accent); color: var(--white); }
.btn-primary:hover{ background: var(--accent-light); transform: translateY(-2px); }
.btn-ghost{ border-color: rgba(244,235,221,0.35); color: var(--cream); }
.btn-ghost:hover{ border-color: var(--cream); background: rgba(244,235,221,0.06); transform: translateY(-2px); }
.btn-line{ border-bottom: 1px solid var(--accent-light); color: var(--accent-light); padding: 0.2rem 0 0.3rem; border-radius:0; }
.btn-line:hover{ color: var(--cream); border-color: var(--cream); }

.skip-link{
  position:absolute; top:-60px; left:1rem; background:var(--accent); color:var(--white);
  padding:0.8rem 1.2rem; z-index: 999; border-radius: var(--radius-sm); transition: top 0.3s var(--ease);
}
.skip-link:focus{ top: 1rem; }

/* reveal on scroll */
.reveal{ opacity: 0; transform: translateY(24px); transition: opacity 0.9s var(--ease), transform 0.9s var(--ease); }
.reveal.is-visible{ opacity: 1; transform: none; }

/* =========================
   NAVBAR
========================= */
.navbar{
  position: fixed; top:0; left:0; right:0; z-index: 500;
  padding: 1.35rem 0;
  transition: background 0.5s var(--ease), padding 0.5s var(--ease), backdrop-filter 0.5s var(--ease), border-color .5s var(--ease);
  border-bottom: 1px solid transparent;
}
.navbar.scrolled{
  background: rgba(16,16,15,0.86);
  backdrop-filter: blur(14px);
  -webkit-backdrop-filter: blur(14px);
  padding: 0.9rem 0;
  border-color: var(--line);
}
.nav-inner{ display:flex; align-items:center; justify-content:space-between; gap:1rem; }
.logo{ font-family: var(--font-display); font-size: 1.5rem; font-weight:600; letter-spacing: 0.01em; color: var(--cream); flex-shrink:0; }
.logo span{ color: var(--accent-light); }

.nav-center{ display:none; }
.nav-links{ display:flex; align-items:center; gap: 1.6rem; list-style:none; margin:0; padding:0; }
.nav-links a{
  font-size: 0.86rem; font-weight:500; color: var(--muted); position:relative; padding: 0.3rem 0;
  transition: color 0.3s var(--ease);
}
.nav-links a::after{
  content:''; position:absolute; left:0; right:100%; bottom:-2px; height:1px; background: var(--accent-light);
  transition: right 0.35s var(--ease);
}
.nav-links a:hover, .nav-links a.active{ color: var(--cream); }
.nav-links a:hover::after, .nav-links a.active::after{ right:0; }

.nav-right{ display:flex; align-items:center; gap:1.1rem; flex-shrink:0; }
.nav-right .nav-secondary{ display:none; font-size:0.82rem; color: var(--muted); }
.nav-right .nav-secondary:hover{ color: var(--cream); }
.nav-book{ display:none; }

.hamburger{
  display:flex; flex-direction:column; justify-content:center; gap:5px;
  width: 44px; height: 44px; border:1px solid var(--line); border-radius: var(--radius-sm);
  background: transparent; align-items:center;
}
.hamburger span{ width: 20px; height: 1px; background: var(--cream); transition: transform 0.35s var(--ease), opacity 0.35s var(--ease); }
.hamburger.open span:nth-child(1){ transform: translateY(6px) rotate(45deg); }
.hamburger.open span:nth-child(2){ opacity:0; }
.hamburger.open span:nth-child(3){ transform: translateY(-6px) rotate(-45deg); }

.mobile-menu{
  position: fixed; inset:0; background: var(--bg);
  z-index: 480; padding: 6rem 1.6rem 2rem;
  transform: translateX(100%); transition: transform 0.5s var(--ease);
  overflow-y:auto;
}
.mobile-menu.open{ transform: translateX(0); }
.mobile-menu ul{ list-style:none; margin:0; padding:0; display:flex; flex-direction:column; }
.mobile-menu li{ border-bottom: 1px solid var(--line); }
.mobile-menu a{ display:block; padding: 1.15rem 0.2rem; font-family: var(--font-display); font-size: 1.5rem; color: var(--cream); }
.mobile-menu .btn{ margin-top: 2rem; width:100%; justify-content:center; }

@media(min-width: 1080px){
  .nav-center{ display:block; }
  .nav-right .nav-secondary{ display:inline-block; }
  .nav-book{ display:inline-flex; }
  .hamburger{ display:none; }
}

/* =========================
   HERO
========================= */
.hero{
  position: relative; min-height: 100svh; display:flex; flex-direction:column;
  overflow:hidden; padding-top: 6.5rem;
}
.hero-media{ position:absolute; inset:0; }
.hero-media img{ width:100%; height:100%; object-fit:cover; }
.hero-media::after{
  content:''; position:absolute; inset:0;
  background:
    linear-gradient(180deg, rgba(16,16,15,0.72) 0%, rgba(16,16,15,0.32) 42%, rgba(16,16,15,0.6) 78%, rgba(16,16,15,0.95) 100%),
    linear-gradient(90deg, rgba(16,16,15,0.65) 0%, rgba(16,16,15,0.15) 58%, transparent 100%);
}

.hero-body{
  position:relative; z-index:2; flex:1; display:flex; align-items:center;
  padding-block: 2rem;
}
.hero-grid{ position:relative; padding-left: clamp(1.25rem, 14vw, 220px); }
@media(max-width: 979.98px){
  .hero-grid{ padding-left: 1.25rem; padding-right: 1.25rem; }
}
@media(min-width: 980px){
  .hero-grid{
    padding-left: clamp(1.5rem, 6vw, 5rem);
    padding-right: clamp(1.5rem, 6vw, 5rem);
    display:flex;
    flex-wrap: wrap;
    align-items:flex-end;
    justify-content:space-between;
    gap: clamp(1.5rem, 4vw, 3.5rem);
  }
  .hero-copy{ flex:1 1 480px; min-width:0; }
}

.hero-eyebrow{ margin-bottom: 1.3rem; display:flex; align-items:center; gap:0.7rem; }
.hero-eyebrow::before{ content:''; width: 28px; height:1px; background: var(--accent-light); }
.hero h1{
  font-size: clamp(2.6rem, 7.4vw, 6.4rem);
  max-width: 16ch;
}
.hero-sub{ max-width: 46ch; color: var(--muted); font-size: 1.05rem; margin-top: 1.5rem; }
.hero-ctas{ display:flex; flex-wrap:wrap; gap: 1rem; margin-top: 2.2rem; }

/* quick reserve panel */
.hero-reserve{
  position:relative; z-index:2;
  background: rgba(25,24,22,0.55);
  border: 1px solid rgba(244,235,221,0.16);
  backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px);
  border-radius: var(--radius-sm);
  padding: 1.6rem;
  display:grid; gap: 1rem;
  margin-top: 2.6rem;
  max-width: 480px;
}
.hero-reserve-title{ font-size: 0.76rem; letter-spacing: 0.1em; color: var(--gold); font-weight:600; }
.hero-reserve-fields{ display:grid; grid-template-columns: 1fr 1fr; gap: 0.8rem; }
.hero-reserve-fields .field-sm{ display:flex; flex-direction:column; gap:0.4rem; grid-column: span 1; min-width: 0; }
.hero-reserve-fields .field-sm:last-child{ grid-column: 1 / -1; }
.hero-reserve-fields label{ font-size: 0.72rem; color: var(--muted); }
.hero-reserve-fields input, .hero-reserve-fields select{
  background: rgba(244,235,221,0.06); border: 1px solid var(--line); border-radius: var(--radius-sm);
  color: var(--cream); padding: 0.65rem 0.8rem; font-size: 0.88rem; min-height: 42px;
  width: 100%; min-width: 0;
}
@media(max-width: 380px){
  .hero-reserve-fields{ grid-template-columns: 1fr; }
  .hero-reserve-fields .field-sm{ grid-column: 1 / -1; }
}
.hero-reserve-fields input:focus, .hero-reserve-fields select:focus{ border-color: var(--accent-light); outline: none; }
.hero-reserve .btn{ width:100%; justify-content:center; }

/* info strip */
.hero-info{
  position:relative; z-index:2;
  border-top: 1px solid rgba(244,235,221,0.14);
}
.hero-info-grid{
  display:grid; grid-template-columns: repeat(2, 1fr);
}
.hero-info-item{
  padding: 1.1rem 1.2rem 1.1rem 0;
  display:flex; align-items:center; gap: 0.8rem;
  border-bottom: 1px solid rgba(244,235,221,0.14);
}
.hero-info-item:nth-child(odd){ padding-right: 1.2rem; }
.hero-info-item:nth-child(even){ padding-left: 1.2rem; padding-right:0; }
.hero-info-item svg{ color: var(--accent-light); flex-shrink:0; }
.hero-info-item .label{ display:block; font-size: 0.68rem; letter-spacing:0.08em; color: var(--muted); }
.hero-info-item .value{ display:block; font-size: 0.92rem; color: var(--cream); font-weight:600; margin-top:0.1rem; }

@media(min-width: 720px){
  .hero-info-grid{ grid-template-columns: repeat(4, 1fr); }
  .hero-info-item{ border-bottom:none; border-right: 1px solid rgba(244,235,221,0.14); padding: 1.1rem 1.5rem; }
  .hero-info-item:first-child{ padding-left:0; }
  .hero-info-item:last-child{ padding-right:0; border-right:none; }
}
@media(min-width: 980px){
  .hero-reserve{
    flex: 0 0 400px;
    max-width: 400px;
    margin-top:0;
  }
}

/* =========================
   STORY / INTRO
========================= */
.story{ display:grid; grid-template-columns: 1fr; gap: 2.4rem; }
.story-label{ align-self:start; }
.story h2{ font-size: clamp(2rem, 4.4vw, 3.4rem); }
.story p{ color: var(--muted); margin-top: 1.4rem; max-width: 56ch; font-size: 1.02rem; }
.story-link{ margin-top: 1.8rem; display:inline-block; }
@media(min-width: 860px){
  .story{ grid-template-columns: 0.8fr 1.6fr; }
}

/* =========================
   SIGNATURE FEATURES
========================= */
.features{ background: var(--bg-soft); border-top:1px solid var(--line); border-bottom:1px solid var(--line); }
.feature-grid{ display:grid; grid-template-columns: 1fr; gap: 0; }
.feature-item{ padding: 2.4rem 0; border-bottom: 1px solid var(--line); display:grid; grid-template-columns: auto 1fr; gap: 1.6rem; align-items:start; }
.feature-item:last-child{ border-bottom:none; }
.feature-index{ font-family: var(--font-display); font-size: 1.6rem; color: var(--accent-light); }
.feature-icon{ margin-bottom: 1rem; color: var(--gold); }
.feature-item h3{ font-family: var(--font-display); font-size: 1.5rem; font-weight:500; }
.feature-item p{ color: var(--muted); margin-top: 0.6rem; max-width: 44ch; }
@media(min-width: 860px){
  .feature-grid{ grid-template-columns: repeat(4, 1fr); }
  .feature-item{ border-bottom:none; border-right: 1px solid var(--line); padding: 0 2rem; }
  .feature-item:last-child{ border-right:none; }
}

/* =========================
   MENU
========================= */
.menu-head{ display:flex; flex-wrap:wrap; justify-content:space-between; align-items:flex-end; gap: 1.6rem; }
.menu-tabs{ display:flex; flex-wrap:wrap; gap: 0.5rem 1.6rem; list-style:none; padding:0; margin: 0.6rem 0 0; }
.menu-tabs button{
  background:none; border:none; color: var(--muted); font-size: 0.86rem; font-weight:600; letter-spacing:0.04em;
  padding: 0.4rem 0; border-bottom: 1px solid transparent;
}
.menu-tabs button.active, .menu-tabs button:hover{ color: var(--cream); border-color: var(--accent-light); }

.menu-grid{ display:grid; grid-template-columns: 1fr; gap: 1px; background: var(--line); margin-top: 2.6rem; border:1px solid var(--line); }
.menu-item{ background: var(--bg); display:grid; grid-template-columns: 110px 1fr; gap: 1.2rem; padding: 1.4rem; align-items:center; }
.menu-item .thumb{ width:110px; height:110px; border-radius: var(--radius-sm); overflow:hidden; }
.menu-item .thumb img{ width:100%; height:100%; object-fit:cover; }
.menu-item .info{ display:flex; flex-direction:column; gap:0.35rem; min-width: 0; }
.menu-item .row{ display:flex; justify-content:space-between; gap:1rem; align-items:baseline; }
.menu-item h4{ font-family: var(--font-display); font-size: 1.25rem; font-weight:500; min-width: 0; }
.menu-item .price{ font-family: var(--font-display); font-size: 1.15rem; color: var(--accent-light); white-space:nowrap; flex-shrink:0; }
@media(max-width: 380px){
  .menu-item{ grid-template-columns: 84px 1fr; gap: 0.9rem; padding: 1.1rem; }
  .menu-item .thumb{ width:84px; height:84px; }
}
.menu-item p{ color: var(--muted); font-size: 0.9rem; }
.menu-item .add{
  align-self:flex-start; margin-top:0.4rem; border:1px solid var(--line); border-radius: var(--radius-sm);
  padding: 0.35rem 0.85rem; font-size: 0.76rem; color: var(--muted); transition: all 0.3s var(--ease); background:none;
}
.menu-item .add:hover{ border-color: var(--accent-light); color: var(--accent-light); }
.menu-foot{ margin-top: 2.4rem; text-align:center; }
@media(min-width: 720px){ .menu-grid{ grid-template-columns: 1fr 1fr; } }

/* =========================
   IMAGE BREAK
========================= */
.image-break{ position:relative; height: 62vh; display:flex; align-items:center; justify-content:center; overflow:hidden; }
.image-break img{ width:100%; height:100%; object-fit:cover; position:absolute; inset:0; will-change: transform; }
.image-break::after{ content:''; position:absolute; inset:0; background: linear-gradient(180deg, rgba(16,16,15,0.35), rgba(16,16,15,0.55)); }
.image-break .display{ position:relative; z-index:2; text-align:center; font-size: clamp(2rem, 5.6vw, 4.6rem); text-transform:uppercase; color: var(--white); padding: 0 1rem; }

/* =========================
   BANQUET
========================= */
.banquet-grid{ display:grid; grid-template-columns: 1fr; gap: 2.4rem; align-items:center; }
.banquet-media{ aspect-ratio: 4/3; border-radius: var(--radius-sm); overflow:hidden; }
.banquet-media img{ width:100%; height:100%; object-fit:cover; }
.banquet-copy h2{ font-size: clamp(2rem, 4.2vw, 3.2rem); }
.banquet-copy p{ color: var(--muted); margin-top: 1.2rem; max-width: 50ch; }
.tag-row{ display:flex; flex-wrap:wrap; gap: 0.6rem; margin-top: 1.6rem; }
.tag{ font-size: 0.78rem; border: 1px solid var(--line); padding: 0.4rem 0.9rem; border-radius: 999px; color: var(--muted); }
.banquet-copy .btn{ margin-top: 2rem; }
@media(min-width: 900px){ .banquet-grid{ grid-template-columns: 1.1fr 0.9fr; } .banquet-grid.reverse{ grid-template-columns: 0.9fr 1.1fr; } .banquet-grid.reverse .banquet-media{ order:2; } }

/* =========================
   GALLERY
========================= */
.gallery-grid{ display:grid; grid-template-columns: repeat(2, 1fr); gap: 0.6rem; }
.gallery-item{ position:relative; overflow:hidden; border-radius: var(--radius-sm); cursor:pointer; background: var(--bg-soft); }
.gallery-item img{ width:100%; height:100%; object-fit:cover; transition: transform 0.7s var(--ease); }
.gallery-item:hover img{ transform: scale(1.06); }
.gallery-item .overlay{
  position:absolute; inset:0; background: rgba(16,16,15,0.35); opacity:0; transition: opacity 0.4s var(--ease);
  display:flex; align-items:center; justify-content:center;
}
.gallery-item:hover .overlay, .gallery-item:focus-visible .overlay{ opacity:1; }
.gallery-item .overlay span{ color: var(--white); font-size: 0.78rem; letter-spacing:0.15em; border: 1px solid rgba(255,255,255,0.6); padding: 0.5rem 1rem; border-radius: 999px; }
.gallery-item:nth-child(3n+1){ grid-row: span 2; }
@media(min-width: 700px){ .gallery-grid{ grid-template-columns: repeat(4, 1fr); } }

.lightbox{
  position: fixed; inset:0; background: rgba(10,10,9,0.96); z-index: 700;
  display:none; align-items:center; justify-content:center; padding: 1.5rem;
}
.lightbox.open{ display:flex; }
.lightbox img{ max-width: min(90vw, 1100px); max-height: 80vh; object-fit:contain; border-radius: var(--radius-sm); }
.lightbox-close, .lightbox-prev, .lightbox-next{
  position:absolute; background: rgba(244,235,221,0.08); border:1px solid var(--line); color: var(--cream);
  width: 46px; height:46px; border-radius:50%; display:flex; align-items:center; justify-content:center;
}
.lightbox-close{ top: 1.5rem; right: 1.5rem; }
.lightbox-prev{ left: 1.5rem; top:50%; transform: translateY(-50%); }
.lightbox-next{ right: 1.5rem; top:50%; transform: translateY(-50%); }
.lightbox-close:hover, .lightbox-prev:hover, .lightbox-next:hover{ border-color: var(--accent-light); color: var(--accent-light); }

/* =========================
   CATERING
========================= */
.catering{ background: var(--bg-soft); border-top:1px solid var(--line); border-bottom:1px solid var(--line); }
.catering-grid{ display:grid; grid-template-columns: 1fr; gap: 2.4rem; }
.catering-media{ position:relative; border-radius: var(--radius-sm); overflow:hidden; aspect-ratio: 5/4; }
.catering-media img{ width:100%; height:100%; object-fit:cover; }
.catering-copy h2{ font-size: clamp(2rem, 4.2vw, 3.2rem); }
.catering-copy p{ color: var(--muted); margin-top: 1.2rem; max-width: 50ch; }
.catering-list{ list-style:none; padding:0; margin: 1.6rem 0 0; display:grid; gap: 0.6rem; color: var(--muted); font-size: 0.94rem; }
.catering-list li{ display:flex; gap:0.7rem; align-items:baseline; }
.catering-list li::before{ content:''; width:5px; height:5px; border-radius:50%; background: var(--accent-light); flex-shrink:0; margin-top:0.5em; }
.catering-copy .btn{ margin-top:2rem; }
@media(min-width: 900px){ .catering-grid{ grid-template-columns: 0.9fr 1.1fr; align-items:center; } }

/* =========================
   TESTIMONIALS
========================= */
.testimonial-wrap{ max-width: 720px; margin: 0 auto; text-align:center; }
.testimonial-slide{ display:none; }
.testimonial-slide.active{ display:block; animation: fadeUp 0.6s var(--ease); }
@keyframes fadeUp{ from{ opacity:0; transform: translateY(10px);} to{ opacity:1; transform:none; } }
.testimonial-quote{ font-family: var(--font-display); font-style: italic; font-size: clamp(1.4rem, 3vw, 2rem); line-height:1.4; color: var(--cream); }
.testimonial-name{ margin-top: 1.6rem; font-weight:600; }
.testimonial-verified{ color: var(--muted); font-size:0.82rem; margin-top:0.2rem; }
.testimonial-dots{ display:flex; justify-content:center; gap: 0.6rem; margin-top: 2.2rem; }
.testimonial-dots button{ width: 8px; height:8px; border-radius:50%; background: var(--line); border:none; padding:0; }
.testimonial-dots button.active{ background: var(--accent-light); }

/* =========================
   HOURS
========================= */
.hours{ background: var(--bg-elevated); }
.hours-grid{ display:grid; grid-template-columns: 1fr; gap: 3rem; }
.hours-list{ list-style:none; margin:0; padding:0; }
.hours-list li{ display:flex; justify-content:space-between; padding: 0.9rem 0; border-bottom: 1px solid var(--line); color: var(--muted); font-size:0.98rem; }
.hours-list li.today{ color: var(--cream); font-weight:600; }
.hours-list li.today span:last-child{ color: var(--accent-light); }
.hours-note{ margin-top: 1.6rem; color: var(--gold); font-size: 0.86rem; letter-spacing:0.05em; }
.hours-copy h2{ font-size: clamp(2rem, 4.2vw, 3.2rem); }
.hours-copy p{ color: var(--muted); margin-top: 1rem; max-width: 42ch; }
@media(min-width: 860px){ .hours-grid{ grid-template-columns: 1fr 1fr; } }

/* =========================
   BOOKING
========================= */
.booking{ position:relative; overflow:hidden; }
.booking-bg{ position:absolute; inset:0; }
.booking-bg img{ width:100%; height:100%; object-fit:cover; opacity:0.22; }
.booking-bg::after{ content:''; position:absolute; inset:0; background: linear-gradient(180deg, var(--bg) 0%, rgba(16,16,15,0.85) 100%); }
.booking-inner{ position:relative; z-index:2; }
.booking-head{ text-align:center; max-width: 620px; margin: 0 auto 3rem; }
.booking-head h2{ font-size: clamp(2.2rem, 5vw, 3.8rem); text-transform:uppercase; }
.booking-head p{ color: var(--muted); margin-top: 1rem; }
.booking-form{ max-width: 760px; margin: 0 auto; display:grid; grid-template-columns: 1fr; gap: 1.2rem; }
.form-row{ display:grid; grid-template-columns: 1fr; gap: 1.2rem; }
.field{ display:flex; flex-direction:column; gap: 0.5rem; }
.field label{ font-size: 0.8rem; color: var(--muted); letter-spacing: 0.03em; }
.field input, .field select, .field textarea{
  background: rgba(244,235,221,0.05); border: 1px solid var(--line); border-radius: var(--radius-sm);
  color: var(--cream); padding: 0.9rem 1rem; font-size: 0.96rem; min-height:44px; transition: border-color 0.3s var(--ease);
}
.field input:focus, .field select:focus, .field textarea:focus{ border-color: var(--accent-light); }
.field.error input, .field.error textarea, .field.error select{ border-color: #d16a5d; }
.field .error-msg{ color: #e08877; font-size: 0.78rem; min-height: 1em; }
.booking-submit{ margin-top: 0.6rem; width: 100%; justify-content:center; }
.form-success{
  display:none; text-align:center; padding: 2rem; border: 1px solid var(--gold); border-radius: var(--radius-sm);
  background: rgba(201,166,107,0.08); color: var(--cream);
}
.form-success.show{ display:block; }
@media(min-width: 640px){ .form-row-2{ grid-template-columns: 1fr 1fr; } .form-row-3{ grid-template-columns: 1fr 1fr 1fr; } }

/* =========================
   MENU KIT
========================= */
.menukit{ background: var(--bg-soft); border-top: 1px solid var(--line); }
.menukit-inner{ display:flex; flex-direction:column; align-items:center; text-align:center; gap: 1.2rem; }
.menukit h2{ font-size: clamp(1.9rem, 3.8vw, 2.8rem); }
.menukit p{ color: var(--muted); max-width: 46ch; }
.menukit-actions{ display:flex; flex-wrap:wrap; gap: 1rem; justify-content:center; margin-top: 0.8rem; }

/* =========================
   CONTACT
========================= */
.contact-grid{ display:grid; grid-template-columns: 1fr; gap: 2.4rem; }
.contact-info h2{ font-size: clamp(2rem, 4.2vw, 3.2rem); }
.contact-details{ list-style:none; margin: 1.6rem 0 0; padding:0; display:grid; gap: 1rem; }
.contact-details li{ color: var(--muted); }
.contact-details strong{ color: var(--cream); display:block; font-size: 0.78rem; letter-spacing:0.08em; margin-bottom: 0.3rem; }
.contact-ctas{ display:flex; flex-wrap:wrap; gap: 0.9rem; margin-top: 2rem; }
.map-area{ border-radius: var(--radius-sm); overflow:hidden; border: 1px solid var(--line); aspect-ratio: 4/3; position:relative; }
.map-area iframe{ width:100%; height:100%; border:0; filter: grayscale(0.4) invert(0.92) contrast(0.9); }
@media(min-width: 900px){ .contact-grid{ grid-template-columns: 1fr 1fr; align-items:center; } }

/* =========================
   FOOTER
========================= */
.site-footer{ background: var(--bg-elevated); border-top: 1px solid var(--line); padding: clamp(3.5rem, 7vw, 5rem) 0 2rem; }
.footer-top{ display:grid; grid-template-columns: 1fr; gap: 2.6rem; padding-bottom: 2.6rem; border-bottom: 1px solid var(--line); }
.footer-brand p{ color: var(--muted); margin-top: 1rem; max-width: 36ch; font-size: 0.92rem; }
.footer-col h4{ font-size: 0.78rem; letter-spacing: 0.12em; color: var(--gold); margin-bottom: 1.1rem; }
.footer-col ul{ list-style:none; margin:0; padding:0; display:grid; gap: 0.7rem; }
.footer-col a{ color: var(--muted); font-size: 0.92rem; transition: color 0.3s var(--ease); }
.footer-col a:hover{ color: var(--cream); }
.footer-social{ display:flex; gap: 1rem; margin-top: 1.4rem; }
.footer-social a{ width: 38px; height:38px; border: 1px solid var(--line); border-radius:50%; display:flex; align-items:center; justify-content:center; }
.footer-social a:hover{ border-color: var(--accent-light); }
.footer-bottom{ display:flex; flex-wrap:wrap; justify-content:space-between; gap: 1rem; padding-top: 1.8rem; color: var(--muted); font-size: 0.82rem; }
@media(min-width: 780px){ .footer-top{ grid-template-columns: 1.3fr 0.8fr 0.8fr 0.8fr; } }

/* =========================
   BACK TO TOP
========================= */
.back-to-top{
  position: fixed; bottom: 1.6rem; right: 1.6rem; width: 46px; height:46px; border-radius:50%;
  background: var(--bg-elevated); border: 1px solid var(--line); color: var(--cream);
  display:flex; align-items:center; justify-content:center; z-index: 400;
  opacity:0; pointer-events:none; transform: translateY(10px);
  transition: opacity 0.4s var(--ease), transform 0.4s var(--ease), border-color 0.3s var(--ease);
}
.back-to-top.show{ opacity:1; pointer-events:auto; transform:none; }
.back-to-top:hover{ border-color: var(--accent-light); }

.visually-hidden{ position:absolute; width:1px; height:1px; overflow:hidden; clip:rect(0 0 0 0); white-space:nowrap; }
</style>
</head>
<body>
<a href="#main" class="skip-link">Skip to content</a>

<!-- =========================
     NAVBAR
========================= -->
<header class="navbar" id="navbar">
  <div class="container nav-inner">
    <a href="#home" class="logo">Ember<span>&</span>Sky</a>

    <nav class="nav-center" aria-label="Primary">
      <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#story">About Us</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#banquet">Banquet Facility</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#catering">Catering</a></li>
      </ul>
    </nav>

    <div class="nav-right">
      <a href="#contact" class="nav-secondary">Contact Us</a>
      <a href="#hours" class="nav-secondary">Visiting Hours</a>
      <a href="#menukit" class="nav-secondary">Menu Kit</a>
      <a href="#booking" class="btn btn-primary nav-book">Online Booking</a>
      <button class="hamburger" id="hamburgerBtn" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<nav class="mobile-menu" id="mobileMenu" aria-label="Mobile" aria-hidden="true">
  <ul>
    <li><a href="#home">Home</a></li>
    <li><a href="#story">About Us</a></li>
    <li><a href="#menu">Menu</a></li>
    <li><a href="#banquet">Banquet Facility</a></li>
    <li><a href="#gallery">Gallery</a></li>
    <li><a href="#catering">Catering</a></li>
    <li><a href="#contact">Contact Us</a></li>
    <li><a href="#hours">Visiting Hours</a></li>
    <li><a href="#menukit">Menu Kit</a></li>
  </ul>
  <a href="#booking" class="btn btn-primary">Online Booking</a>
</nav>

<main id="main">

<!-- =========================
     HERO
========================= -->
<section class="hero" id="home">
  <div class="hero-media">
    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=1800&auto=format&fit=crop" alt="Rooftop dining area at dusk with warm string lights and a live-fire grill in the background" loading="eager">
  </div>

  <div class="hero-body">
    <div class="container hero-grid">
      <div class="hero-copy">
        <p class="eyebrow hero-eyebrow">ROOFTOP DINING · LIVE FIRE · GOOD TIMES</p>
        <h1 class="display">Flavour above the ordinary</h1>
        <p class="hero-sub">Live-fire BBQ, fresh seafood and handcrafted drinks, served under open London skies. Come for the view, stay for the smoke.</p>
        <div class="hero-ctas">
          <a href="#booking" class="btn btn-primary">Book a Table</a>
          <a href="#menu" class="btn btn-ghost">Explore Menu</a>
        </div>
      </div>

      <form class="hero-reserve" id="quickReserveForm">
        <span class="hero-reserve-title">QUICK RESERVATION</span>
        <div class="hero-reserve-fields">
          <div class="field-sm">
            <label for="qr-date">Date</label>
            <input type="date" id="qr-date" name="date">
          </div>
          <div class="field-sm">
            <label for="qr-time">Time</label>
            <input type="time" id="qr-time" name="time">
          </div>
          <div class="field-sm">
            <label for="qr-guests">Guests</label>
            <select id="qr-guests" name="guests">
              <option>2 Guests</option>
              <option>4 Guests</option>
              <option>6 Guests</option>
              <option>8+ Guests</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Check Availability</button>
      </form>
    </div>
  </div>

  <div class="hero-info">
    <div class="container hero-info-grid">
      <div class="hero-info-item">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a6 6 0 1 1-12 0c0-1 .25-1.94.5-2.5"/></svg>
        <span><span class="label">CUISINE</span><span class="value">Live-Fire BBQ &amp; Seafood</span></span>
      </div>
      <div class="hero-info-item">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 2v6M12 22v-6M4.93 4.93l4.24 4.24M14.83 14.83l4.24 4.24M2 12h6M16 12h6M4.93 19.07l4.24-4.24M14.83 9.17l4.24-4.24"/></svg>
        <span><span class="label">TODAY'S HOURS</span><span class="value" id="heroTodayHours">1:00 PM – 9:00 PM</span></span>
      </div>
      <div class="hero-info-item">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 1 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        <span><span class="label">LOCATION</span><span class="value">Shoreditch, London</span></span>
      </div>
      <div class="hero-info-item">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 21h18M5 21V9l7-6 7 6v12M9 21v-6h6v6"/></svg>
        <span><span class="label">SETTING</span><span class="value">Open-Air Rooftop</span></span>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     STORY
========================= -->
<section class="section" id="story">
  <div class="container story reveal">
    <div class="story-label">
      <p class="eyebrow">OUR STORY</p>
    </div>
    <div>
      <h2 class="display">Where fire meets flavour, and every evening becomes a memory.</h2>
      <p>Ember &amp; Sky started with a simple idea: cook everything the way it's been done for generations, over real fire, and serve it somewhere the city can't reach. Our rooftop kitchen pulls from the smoke of live-fire BBQ and the freshness of the coast, plated for long evenings with people you like.</p>
      <p>Every dish leaves the grill before it reaches your table — nothing is rushed, and nothing is reheated.</p>
      <a href="#banquet" class="btn-line story-link">Discover Our Story →</a>
    </div>
  </div>
</section>

<!-- =========================
     SIGNATURE EXPERIENCE
========================= -->
<section class="features" id="experience">
  <div class="container">
    <div class="feature-grid">
      <div class="feature-item reveal">
        <div>
          <div class="feature-icon" aria-hidden="true">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a6 6 0 1 1-12 0c0-1 .25-1.94.5-2.5"/></svg>
          </div>
          <span class="feature-index">01</span>
          <h3>Live Fire BBQ</h3>
          <p>Charcoal, smoke and patience — our grill sits front and centre, cooking everything to order.</p>
        </div>
      </div>
      <div class="feature-item reveal">
        <div>
          <div class="feature-icon" aria-hidden="true">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 21h18M5 21V9l7-6 7 6v12M9 21v-6h6v6"/></svg>
          </div>
          <span class="feature-index">02</span>
          <h3>Rooftop Ambience</h3>
          <p>Open skies, warm lighting and views over the city, built for long conversations.</p>
        </div>
      </div>
      <div class="feature-item reveal">
        <div>
          <div class="feature-icon" aria-hidden="true">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 2v6M12 22v-6M4.93 4.93l4.24 4.24M14.83 14.83l4.24 4.24M2 12h6M16 12h6M4.93 19.07l4.24-4.24M14.83 9.17l4.24-4.24"/></svg>
          </div>
          <span class="feature-index">03</span>
          <h3>Crafted With Passion</h3>
          <p>Recipes built on regional ingredients, sourced daily and treated with care.</p>
        </div>
      </div>
      <div class="feature-item reveal">
        <div>
          <div class="feature-icon" aria-hidden="true">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.5-6 8-6s8 2 8 6"/></svg>
          </div>
          <span class="feature-index">04</span>
          <h3>Gather &amp; Celebrate</h3>
          <p>From birthdays to reunions, our rooftop is set up to hold your whole table.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     MENU
========================= -->
<section class="section" id="menu">
  <div class="container">
    <div class="menu-head reveal">
      <div>
        <p class="eyebrow">FROM THE GRILL</p>
        <h2 class="display" style="font-size:clamp(2.2rem,4.6vw,3.6rem); margin-top:0.6rem;">The Signatures</h2>
      </div>
      <ul class="menu-tabs" role="tablist" aria-label="Menu categories">
        <li><button class="active" data-cat="all" role="tab" aria-selected="true">All</button></li>
        <li><button data-cat="bbq" role="tab" aria-selected="false">Live BBQ</button></li>
        <li><button data-cat="seafood" role="tab" aria-selected="false">Seafood</button></li>
        <li><button data-cat="starters" role="tab" aria-selected="false">Starters</button></li>
        <li><button data-cat="drinks" role="tab" aria-selected="false">Drinks</button></li>
      </ul>
    </div>

    <div class="menu-grid reveal" id="menuGrid">
      <div class="menu-item" data-cat="bbq">
        <div class="thumb"><img src="https://images.unsplash.com/photo-1529193591184-b1d58069ecdd?q=80&w=400&auto=format&fit=crop" alt="Chicken live BBQ skewers over charcoal" loading="lazy"></div>
        <div class="info">
          <div class="row"><h4>Chicken Live BBQ</h4><span class="price">₹420</span></div>
          <p>Marinated overnight, finished over open charcoal with a smoked chilli glaze.</p>
          <button class="add">Add to order</button>
        </div>
      </div>
      <div class="menu-item" data-cat="bbq">
        <div class="thumb"><img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=400&auto=format&fit=crop" alt="Pork live BBQ ribs" loading="lazy"></div>
        <div class="info">
          <div class="row"><h4>Pork Live BBQ</h4><span class="price">₹460</span></div>
          <p>Slow-smoked ribs, glazed and finished with a five-spice char.</p>
          <button class="add">Add to order</button>
        </div>
      </div>
      <div class="menu-item" data-cat="seafood">
        <div class="thumb"><img src="https://images.unsplash.com/photo-1580959375944-abd7e991f971?q=80&w=400&auto=format&fit=crop" alt="Seafood live BBQ platter" loading="lazy"></div>
        <div class="info">
          <div class="row"><h4>Seafood Live BBQ</h4><span class="price">₹560</span></div>
          <p>A mixed grill of prawns, squid and river fish, grilled tableside on request.</p>
          <button class="add">Add to order</button>
        </div>
      </div>
      <div class="menu-item" data-cat="starters">
        <div class="thumb"><img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=400&auto=format&fit=crop" alt="Prawn tempura with dipping sauce" loading="lazy"></div>
        <div class="info">
          <div class="row"><h4>Prawn Tempura</h4><span class="price">₹380</span></div>
          <p>Light, crisp batter with a citrus-chilli dip.</p>
          <button class="add">Add to order</button>
        </div>
      </div>
      <div class="menu-item" data-cat="starters">
        <div class="thumb"><img src="https://images.unsplash.com/photo-1625944230945-1b7dd3b949ab?q=80&w=400&auto=format&fit=crop" alt="Salt and pepper squid" loading="lazy"></div>
        <div class="info">
          <div class="row"><h4>Salt &amp; Pepper Squid</h4><span class="price">₹360</span></div>
          <p>Wok-tossed with fresh chilli, garlic and spring onion.</p>
          <button class="add">Add to order</button>
        </div>
      </div>
      <div class="menu-item" data-cat="seafood">
        <div class="thumb"><img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?q=80&w=400&auto=format&fit=crop" alt="Grilled basa fish fillet" loading="lazy"></div>
        <div class="info">
          <div class="row"><h4>Grilled Basa</h4><span class="price">₹440</span></div>
          <p>Flaky river fish, herb-butter basted over the coals.</p>
          <button class="add">Add to order</button>
        </div>
      </div>
      <div class="menu-item" data-cat="drinks">
        <div class="thumb"><img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?q=80&w=400&auto=format&fit=crop" alt="Signature mocktail in a rooftop setting" loading="lazy"></div>
        <div class="info">
          <div class="row"><h4>Signature Mocktail</h4><span class="price">₹260</span></div>
          <p>Passionfruit, smoked rosemary and soda, served over hand-cut ice.</p>
          <button class="add">Add to order</button>
        </div>
      </div>
    </div>

    <div class="menu-foot">
      <a href="#menukit" class="btn-line">View Full Menu →</a>
    </div>
  </div>
</section>

<!-- =========================
     IMAGE BREAK
========================= -->
<div class="image-break">
  <img id="parallaxImg" src="https://images.unsplash.com/photo-1544148103-0773bf10d330?q=80&w=1800&auto=format&fit=crop" alt="Rooftop restaurant at night overlooking the city skyline" loading="lazy">
  <h2 class="display">Good Food.<br>Open Skies.<br>Great Company.</h2>
</div>

<!-- =========================
     BANQUET
========================= -->
<section class="section" id="banquet">
  <div class="container banquet-grid reveal">
    <div class="banquet-media">
      <img src="https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?q=80&w=900&auto=format&fit=crop" alt="Long banquet table set up for a private rooftop event" loading="lazy">
    </div>
    <div class="banquet-copy">
      <p class="eyebrow">BANQUET FACILITY</p>
      <h2 class="display" style="margin-top:0.6rem;">Host your next gathering above the city.</h2>
      <p>Our rooftop hall seats up to 120 guests and comes with a dedicated events team, a customisable live-fire menu, and a view no banquet hall in town can match.</p>
      <div class="tag-row">
        <span class="tag">Private Gatherings</span>
        <span class="tag">Corporate Events</span>
        <span class="tag">Birthdays</span>
        <span class="tag">Celebrations</span>
        <span class="tag">Family Functions</span>
      </div>
      <a href="#booking" class="btn btn-primary">Plan Your Event</a>
    </div>
  </div>
</section>

<!-- =========================
     GALLERY
========================= -->
<section class="section" id="gallery">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">GALLERY</p>
      <h2 class="display" style="font-size:clamp(2rem,4.2vw,3.2rem); margin-top:0.6rem;">A look inside Ember &amp; Sky.</h2>
    </div>
    <div class="gallery-grid reveal" id="galleryGrid">
      <button class="gallery-item" data-index="0"><img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=700&auto=format&fit=crop" alt="Rooftop seating with warm lighting"><span class="overlay"><span>View</span></span></button>
      <button class="gallery-item" data-index="1"><img src="https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=700&auto=format&fit=crop" alt="Grilled meat over open flame"><span class="overlay"><span>View</span></span></button>
      <button class="gallery-item" data-index="2"><img src="https://images.unsplash.com/photo-1529193591184-b1d58069ecdd?q=80&w=700&auto=format&fit=crop" alt="Skewers cooking over charcoal"><span class="overlay"><span>View</span></span></button>
      <button class="gallery-item" data-index="3"><img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?q=80&w=700&auto=format&fit=crop" alt="Signature cocktail on a rooftop table"><span class="overlay"><span>View</span></span></button>
      <button class="gallery-item" data-index="4"><img src="https://images.unsplash.com/photo-1544148103-0773bf10d330?q=80&w=700&auto=format&fit=crop" alt="City skyline view from the rooftop at dusk"><span class="overlay"><span>View</span></span></button>
      <button class="gallery-item" data-index="5"><img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?q=80&w=700&auto=format&fit=crop" alt="Grilled fish fillet plated"><span class="overlay"><span>View</span></span></button>
      <button class="gallery-item" data-index="6"><img src="https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?q=80&w=700&auto=format&fit=crop" alt="Long table set for a private event"><span class="overlay"><span>View</span></span></button>
      <button class="gallery-item" data-index="7"><img src="https://images.unsplash.com/photo-1625944230945-1b7dd3b949ab?q=80&w=700&auto=format&fit=crop" alt="Salt and pepper squid dish"><span class="overlay"><span>View</span></span></button>
    </div>
  </div>
</section>

<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Image viewer">
  <button class="lightbox-close" id="lightboxClose" aria-label="Close image viewer">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 6l12 12M18 6L6 18"/></svg>
  </button>
  <button class="lightbox-prev" id="lightboxPrev" aria-label="Previous image">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
  </button>
  <img id="lightboxImg" src="" alt="">
  <button class="lightbox-next" id="lightboxNext" aria-label="Next image">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
  </button>
</div>

<!-- =========================
     CATERING
========================= -->
<section class="catering" id="catering">
  <div class="section">
    <div class="container catering-grid">
      <div class="catering-media reveal">
        <img src="https://images.unsplash.com/photo-1555244162-803834f70033?q=80&w=900&auto=format&fit=crop" alt="Catering spread laid out for an outdoor event" loading="lazy">
      </div>
      <div class="catering-copy reveal">
        <p class="eyebrow">CATERING</p>
        <h2 class="display" style="margin-top:0.6rem;">Catering, curated for your occasion.</h2>
        <p>Take the live-fire experience off the rooftop and into your own event, with a menu built around your guest list and the occasion.</p>
        <ul class="catering-list">
          <li>Weddings &amp; receptions</li>
          <li>Corporate off-sites</li>
          <li>Private house parties</li>
          <li>Festival &amp; community events</li>
        </ul>
        <a href="#booking" class="btn btn-ghost">Enquire About Catering</a>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     TESTIMONIALS
========================= -->
<section class="section" id="testimonials">
  <div class="container testimonial-wrap reveal">
    <p class="eyebrow" style="margin-bottom:2rem;">WHAT GUESTS SAY</p>
    <div class="testimonial-slide active" data-slide="0">
      <p class="testimonial-quote">"The grill smoke hits you before the food even arrives. Best rooftop evening we've had in London in years."</p>
      <p class="testimonial-name">Rina Thoudam</p>
      <p class="testimonial-verified">Verified Guest</p>
    </div>
    <div class="testimonial-slide" data-slide="1">
      <p class="testimonial-quote">"We hosted our anniversary dinner here — the team went out of their way to set up something special for us."</p>
      <p class="testimonial-name">Arjun Singh</p>
      <p class="testimonial-verified">Verified Guest</p>
    </div>
    <div class="testimonial-slide" data-slide="2">
      <p class="testimonial-quote">"Booked the banquet hall for a work event and every guest asked where we found this place."</p>
      <p class="testimonial-name">Meena Konsam</p>
      <p class="testimonial-verified">Verified Guest</p>
    </div>
    <div class="testimonial-dots" id="testimonialDots">
      <button class="active" aria-label="Testimonial 1"></button>
      <button aria-label="Testimonial 2"></button>
      <button aria-label="Testimonial 3"></button>
    </div>
  </div>
</section>

<!-- =========================
     HOURS
========================= -->
<section class="section hours" id="hours">
  <div class="container hours-grid">
    <div class="hours-copy reveal">
      <p class="eyebrow">VISITING HOURS</p>
      <h2 class="display" style="margin-top:0.6rem;">We're open most of the week.</h2>
      <p>Walk in, or reserve ahead if you'd like a table with a view. We recommend booking for groups of six or more.</p>
      <p class="hours-note">Walk-ins Welcome · Reservations Recommended</p>
    </div>
    <ul class="hours-list reveal" id="hoursList">
      <li data-day="1"><span>Monday</span><span>1:00 PM – 9:00 PM</span></li>
      <li data-day="2"><span>Tuesday</span><span>1:00 PM – 9:00 PM</span></li>
      <li data-day="3"><span>Wednesday</span><span>1:00 PM – 9:00 PM</span></li>
      <li data-day="4"><span>Thursday</span><span>1:00 PM – 9:00 PM</span></li>
      <li data-day="5"><span>Friday</span><span>1:00 PM – 9:00 PM</span></li>
      <li data-day="6"><span>Saturday</span><span>1:00 PM – 9:00 PM</span></li>
      <li data-day="0"><span>Sunday</span><span>12:30 PM – 9:00 PM</span></li>
    </ul>
  </div>
</section>

<!-- =========================
     BOOKING
========================= -->
<section class="section booking" id="booking">
  <div class="booking-bg">
    <img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?q=80&w=1800&auto=format&fit=crop" alt="" role="presentation" loading="lazy">
  </div>
  <div class="container booking-inner">
    <div class="booking-head">
      <h2 class="display">Your Table Is Waiting</h2>
      <p>Tell us when you're coming and how many, and we'll have it ready.</p>
    </div>

    <form class="booking-form" id="bookingForm" novalidate>
      <div class="form-row form-row-2">
        <div class="field">
          <label for="bk-name">Name</label>
          <input type="text" id="bk-name" name="name" autocomplete="name" required>
          <span class="error-msg" id="err-name"></span>
        </div>
        <div class="field">
          <label for="bk-phone">Phone</label>
          <input type="tel" id="bk-phone" name="phone" autocomplete="tel" required>
          <span class="error-msg" id="err-phone"></span>
        </div>
      </div>
      <div class="field">
        <label for="bk-email">Email</label>
        <input type="email" id="bk-email" name="email" autocomplete="email" required>
        <span class="error-msg" id="err-email"></span>
      </div>
      <div class="form-row form-row-3">
        <div class="field">
          <label for="bk-date">Date</label>
          <input type="date" id="bk-date" name="date" required>
          <span class="error-msg" id="err-date"></span>
        </div>
        <div class="field">
          <label for="bk-time">Time</label>
          <input type="time" id="bk-time" name="time" required>
          <span class="error-msg" id="err-time"></span>
        </div>
        <div class="field">
          <label for="bk-guests">Number of Guests</label>
          <input type="number" id="bk-guests" name="guests" min="1" max="60" value="2" required>
          <span class="error-msg" id="err-guests"></span>
        </div>
      </div>
      <div class="field">
        <label for="bk-request">Special Request</label>
        <textarea id="bk-request" name="request" rows="3" placeholder="Window seat, allergies, celebration details..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary booking-submit">Reserve My Table</button>
      <div class="form-success" id="formSuccess" role="status">
        Thank you — your table request has been received. We'll confirm by phone or email shortly.
      </div>
    </form>
  </div>
</section>

<!-- =========================
     MENU KIT
========================= -->
<section class="section menukit" id="menukit">
  <div class="container menukit-inner reveal">
    <p class="eyebrow">MENU KIT</p>
    <h2 class="display">Menu Kit</h2>
    <p>Explore our complete menu, signature dishes and dining experience.</p>
    <div class="menukit-actions">
      <a href="menu-kit.pdf" class="btn btn-primary" download>
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3v12m0 0l-4-4m4 4l4-4M4 21h16"/></svg>
        Download Menu PDF
      </a>
      <a href="#menu" class="btn btn-ghost">View Menu Online</a>
    </div>
  </div>
</section>

<!-- =========================
     CONTACT
========================= -->
<section class="section" id="contact">
  <div class="container contact-grid">
    <div class="contact-info reveal">
      <p class="eyebrow">CONTACT</p>
      <h2 class="display" style="margin-top:0.6rem;">Find us on the rooftop.</h2>
      <ul class="contact-details">
        <li><strong>PHONE</strong><a href="tel:+442071234567">+44 20 7123 4567</a></li>
        <li><strong>EMAIL</strong><a href="mailto:hello@emberandsky.example">hello@emberandsky.example</a></li>
        <li><strong>ADDRESS</strong>48 Shoreditch High Street, Rooftop Level, London, E1 6JJ</li>
      </ul>
      <div class="contact-ctas">
        <a href="https://maps.google.com/?q=48+Shoreditch+High+Street+London" class="btn btn-primary" target="_blank" rel="noopener">Get Directions</a>
        <a href="tel:+442071234567" class="btn btn-ghost">Call Now</a>
        <a href="mailto:hello@emberandsky.example" class="btn btn-ghost">Email</a>
      </div>
    </div>
    <div class="map-area reveal">
      <iframe title="Map location of Ember & Sky, London" src="https://maps.google.com/maps?q=Shoreditch%2C%20London&t=&z=13&ie=UTF8&iwloc=&output=embed" loading="lazy"></iframe>
    </div>
  </div>
</section>

</main>

<!-- =========================
     FOOTER
========================= -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="#home" class="logo">Ember<span>&</span>Sky</a>
        <p>A rooftop live-fire kitchen in London, serving BBQ, seafood and warm hospitality under open skies.</p>
        <div class="footer-social">
          <a href="#" aria-label="Instagram"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></a>
          <a href="#" aria-label="Facebook"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M14 9h3V6h-3a4 4 0 0 0-4 4v2H8v3h2v6h3v-6h3l1-3h-4v-2a1 1 0 0 1 1-1z"/></svg></a>
          <a href="#" aria-label="WhatsApp"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M21 11.5a8.5 8.5 0 0 1-12.4 7.55L3 20l1.05-5.4A8.5 8.5 0 1 1 21 11.5z"/></svg></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>EXPLORE</h4>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#story">About Us</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#banquet">Banquet Facility</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#catering">Catering</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>VISIT</h4>
        <ul>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="#hours">Visiting Hours</a></li>
          <li><a href="#booking">Online Booking</a></li>
          <li><a href="#menukit">Menu Kit</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>CONTACT</h4>
        <ul>
          <li><a href="tel:+442071234567">+44 20 7123 4567</a></li>
          <li><a href="mailto:hello@emberandsky.example">hello@emberandsky.example</a></li>
          <li style="color:var(--muted); font-size:0.92rem;">Mon–Sat 1–9 PM · Sun 12:30–9 PM</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 Ember & Sky. All rights reserved.</span>
      <span>Designed with passion.</span>
    </div>
  </div>
</footer>

<button class="back-to-top" id="backToTop" aria-label="Back to top">
  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<script>
(function(){
  "use strict";

  /* NAVBAR SCROLL STATE */
  var navbar = document.getElementById('navbar');
  var backToTop = document.getElementById('backToTop');
  function onScroll(){
    var y = window.scrollY || document.documentElement.scrollTop;
    navbar.classList.toggle('scrolled', y > 60);
    backToTop.classList.toggle('show', y > 700);
  }
  document.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
  backToTop.addEventListener('click', function(){
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  /* MOBILE MENU */
  var hamburger = document.getElementById('hamburgerBtn');
  var mobileMenu = document.getElementById('mobileMenu');
  function closeMobileMenu(){
    hamburger.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');
    mobileMenu.classList.remove('open');
    mobileMenu.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }
  function toggleMobileMenu(){
    var isOpen = mobileMenu.classList.toggle('open');
    hamburger.classList.toggle('open', isOpen);
    hamburger.setAttribute('aria-expanded', String(isOpen));
    mobileMenu.setAttribute('aria-hidden', String(!isOpen));
    document.body.style.overflow = isOpen ? 'hidden' : '';
  }
  hamburger.addEventListener('click', toggleMobileMenu);
  mobileMenu.querySelectorAll('a').forEach(function(a){
    a.addEventListener('click', closeMobileMenu);
  });

  /* ACTIVE NAV LINK ON SCROLL */
  var sections = document.querySelectorAll('main section[id]');
  var navAnchors = document.querySelectorAll('.nav-links a');
  var sectionObserver = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(entry.isIntersecting){
        navAnchors.forEach(function(a){
          a.classList.toggle('active', a.getAttribute('href') === '#' + entry.target.id);
        });
      }
    });
  }, { rootMargin: '-45% 0px -45% 0px' });
  sections.forEach(function(s){ sectionObserver.observe(s); });

  /* SCROLL REVEAL */
  var revealObserver = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(entry.isIntersecting){
        entry.target.classList.add('is-visible');
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });
  document.querySelectorAll('.reveal').forEach(function(el){ revealObserver.observe(el); });

  /* MENU FILTER TABS */
  var tabs = document.querySelectorAll('.menu-tabs button');
  var menuItems = document.querySelectorAll('.menu-item');
  tabs.forEach(function(tab){
    tab.addEventListener('click', function(){
      tabs.forEach(function(t){ t.classList.remove('active'); t.setAttribute('aria-selected','false'); });
      tab.classList.add('active');
      tab.setAttribute('aria-selected','true');
      var cat = tab.getAttribute('data-cat');
      menuItems.forEach(function(item){
        var show = cat === 'all' || item.getAttribute('data-cat') === cat;
        item.style.display = show ? '' : 'none';
      });
    });
  });

  /* GALLERY LIGHTBOX */
  var galleryItems = Array.prototype.slice.call(document.querySelectorAll('.gallery-item'));
  var lightbox = document.getElementById('lightbox');
  var lightboxImg = document.getElementById('lightboxImg');
  var currentIndex = 0;

  function openLightbox(index){
    currentIndex = index;
    updateLightboxImage();
    lightbox.classList.add('open');
    document.body.style.overflow = 'hidden';
    document.getElementById('lightboxClose').focus();
  }
  function updateLightboxImage(){
    var img = galleryItems[currentIndex].querySelector('img');
    lightboxImg.src = img.src.replace('w=700','w=1400');
    lightboxImg.alt = img.alt;
  }
  function closeLightbox(){
    lightbox.classList.remove('open');
    document.body.style.overflow = '';
  }
  function nextImage(){ currentIndex = (currentIndex + 1) % galleryItems.length; updateLightboxImage(); }
  function prevImage(){ currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length; updateLightboxImage(); }

  galleryItems.forEach(function(item, i){
    item.addEventListener('click', function(){ openLightbox(i); });
  });
  document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
  document.getElementById('lightboxNext').addEventListener('click', nextImage);
  document.getElementById('lightboxPrev').addEventListener('click', prevImage);
  lightbox.addEventListener('click', function(e){ if(e.target === lightbox) closeLightbox(); });
  document.addEventListener('keydown', function(e){
    if(!lightbox.classList.contains('open')) return;
    if(e.key === 'Escape') closeLightbox();
    if(e.key === 'ArrowRight') nextImage();
    if(e.key === 'ArrowLeft') prevImage();
  });

  /* swipe support */
  var touchStartX = 0;
  lightbox.addEventListener('touchstart', function(e){ touchStartX = e.changedTouches[0].screenX; }, { passive: true });
  lightbox.addEventListener('touchend', function(e){
    var dx = e.changedTouches[0].screenX - touchStartX;
    if(Math.abs(dx) > 50){ dx > 0 ? prevImage() : nextImage(); }
  }, { passive: true });

  /* TESTIMONIAL SLIDER */
  var slides = document.querySelectorAll('.testimonial-slide');
  var dots = document.querySelectorAll('.testimonial-dots button');
  var slideIndex = 0;
  function showSlide(i){
    slides.forEach(function(s, idx){ s.classList.toggle('active', idx === i); });
    dots.forEach(function(d, idx){ d.classList.toggle('active', idx === i); });
    slideIndex = i;
  }
  dots.forEach(function(dot, i){ dot.addEventListener('click', function(){ showSlide(i); }); });
  setInterval(function(){ showSlide((slideIndex + 1) % slides.length); }, 6000);

  /* TODAY'S HOURS HIGHLIGHT */
  var todayIndex = new Date().getDay();
  var hourItem = document.querySelector('.hours-list li[data-day="' + todayIndex + '"]');
  if(hourItem) hourItem.classList.add('today');
  var heroHours = document.getElementById('heroTodayHours');
  if(heroHours && hourItem){
    heroHours.textContent = hourItem.querySelectorAll('span')[1].textContent;
  }

  /* HERO QUICK RESERVE -> MAIN BOOKING FORM */
  var quickReserveForm = document.getElementById('quickReserveForm');
  quickReserveForm.addEventListener('submit', function(e){
    e.preventDefault();
    var qDate = document.getElementById('qr-date').value;
    var qTime = document.getElementById('qr-time').value;
    var qGuestsText = document.getElementById('qr-guests').value;
    var qGuests = parseInt(qGuestsText, 10) || 2;

    if(qDate) document.getElementById('bk-date').value = qDate;
    if(qTime) document.getElementById('bk-time').value = qTime;
    document.getElementById('bk-guests').value = qGuests;

    document.getElementById('booking').scrollIntoView({ behavior: 'smooth' });
    window.setTimeout(function(){ document.getElementById('bk-name').focus(); }, 500);
  });

  /* BOOKING FORM VALIDATION */
  var form = document.getElementById('bookingForm');
  var successMsg = document.getElementById('formSuccess');

  function setError(id, msg){
    var field = document.getElementById(id).closest('.field');
    var errEl = document.getElementById('err-' + id.replace('bk-',''));
    if(msg){ field.classList.add('error'); errEl.textContent = msg; }
    else{ field.classList.remove('error'); errEl.textContent = ''; }
  }

  form.addEventListener('submit', function(e){
    e.preventDefault();
    var valid = true;

    var name = document.getElementById('bk-name').value.trim();
    if(!name){ setError('bk-name', 'Please enter your name.'); valid = false; } else setError('bk-name','');

    var phone = document.getElementById('bk-phone').value.trim();
    if(!/^[0-9+\\-\\s]{7,15}$/.test(phone)){ setError('bk-phone', 'Please enter a valid phone number.'); valid = false; } else setError('bk-phone','');

    var email = document.getElementById('bk-email').value.trim();
    if(!/^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/.test(email)){ setError('bk-email', 'Please enter a valid email.'); valid = false; } else setError('bk-email','');

    var date = document.getElementById('bk-date').value;
    if(!date){ setError('bk-date', 'Please choose a date.'); valid = false; } else setError('bk-date','');

    var time = document.getElementById('bk-time').value;
    if(!time){ setError('bk-time', 'Please choose a time.'); valid = false; } else setError('bk-time','');

    var guests = document.getElementById('bk-guests').value;
    if(!guests || guests < 1){ setError('bk-guests', 'Please enter number of guests.'); valid = false; } else setError('bk-guests','');

    if(valid){
      form.reset();
      document.getElementById('bk-guests').value = 2;
      successMsg.classList.add('show');
      successMsg.setAttribute('tabindex','-1');
      successMsg.focus();
    }
  });

  /* SUBTLE PARALLAX ON IMAGE BREAK (desktop only, respects reduced motion) */
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var parallaxImg = document.getElementById('parallaxImg');
  if(!prefersReduced && window.innerWidth > 900){
    document.addEventListener('scroll', function(){
      var rect = parallaxImg.parentElement.getBoundingClientRect();
      if(rect.top < window.innerHeight && rect.bottom > 0){
        var offset = (rect.top) * 0.12;
        parallaxImg.style.transform = 'translateY(' + offset + 'px) scale(1.08)';
      }
    }, { passive: true });
  }
})();
</script>
</body>
</html>
