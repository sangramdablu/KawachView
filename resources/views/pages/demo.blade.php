<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>BLU – This changes how people shop.</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        display: ['Bricolage Grotesque','sans-serif'],
        body:    ['Plus Jakarta Sans','sans-serif'],
      },
      colors: {
        surface: '#0d1117',
        panel:   '#161b22',
        card:    '#1c2333',
        border:  '#30363d',
        blu: { 300:'#93c5fd', 400:'#60a5fa', 500:'#3b82f6', 600:'#1a5ccd', 700:'#0b3db5' },
        cyan: { 400:'#22d3ee', 500:'#06b6d4' },
      },
      animation: {
        'fade-up':   'fadeUp 0.7s ease both',
        'fade-up2':  'fadeUp 0.7s 0.14s ease both',
        'fade-up3':  'fadeUp 0.7s 0.26s ease both',
        'fade-up4':  'fadeUp 0.7s 0.38s ease both',
        'glow-pulse':'glowPulse 2.5s ease-in-out infinite',
        'float':     'float 4s ease-in-out infinite',
        'spin-slow': 'spin 0.9s linear infinite',
        'modal-in':  'modalIn 0.3s cubic-bezier(0.34,1.56,0.64,1) both',
        'splash-fade':'splashFade 0.5s ease forwards',
      },
      keyframes: {
        fadeUp:    { '0%':{opacity:'0',transform:'translateY(26px)'},'100%':{opacity:'1',transform:'translateY(0)'} },
        glowPulse: { '0%,100%':{opacity:'1'},'50%':{opacity:'0.35'} },
        float:     { '0%,100%':{transform:'translateY(0)'},'50%':{transform:'translateY(-10px)'} },
        modalIn:   { '0%':{opacity:'0',transform:'scale(0.87) translateY(18px)'},'100%':{opacity:'1',transform:'scale(1) translateY(0)'} },
        splashFade:{ '0%':{opacity:'1'},'100%':{opacity:'0'} },
      },
      boxShadow: {
        'glow-blu':  '0 0 28px rgba(26,92,205,0.38)',
        'glow-cyan': '0 0 18px rgba(34,211,238,0.22)',
      }
    }
  }
}
</script>
<style>
  *{box-sizing:border-box;}
  body{font-family:'Plus Jakarta Sans',sans-serif;background:#0d1117;color:#e6edf3;overflow-x:hidden;}
  .font-display{font-family:'Bricolage Grotesque',sans-serif;}
  .text-gradient{background:linear-gradient(135deg,#60a5fa 0%,#22d3ee 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
  .dot-grid{background-image:radial-gradient(circle,rgba(96,165,250,0.08) 1px,transparent 1px);background-size:30px 30px;}

  /* ── SPLASH SCREEN ── */
  #splash{
    position:fixed;inset:0;z-index:9999;
    background:#0d1117;
    display:flex;align-items:center;justify-content:center;
    transition:opacity 0.5s ease;
  }
  #splash.fade-out{opacity:0;pointer-events:none;}
  .splash-bg{
    position:absolute;inset:0;
    background-image:url('https://kawachtech.com/images/IMG_9975.jpeg');
    background-size:cover;background-position:center;
    opacity:0.55;
  }
  .splash-overlay{position:absolute;inset:0;background:linear-gradient(180deg,rgba(13,17,23,0.35) 0%,rgba(13,17,23,0.55) 100%);}
  .splash-content{position:relative;z-index:2;text-align:center;}
  .splash-logo{font-family:'Bricolage Grotesque',sans-serif;font-weight:900;font-size:5rem;letter-spacing:-2px;background:linear-gradient(135deg,#60a5fa 0%,#22d3ee 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1;}
  .splash-sub{font-family:'Plus Jakarta Sans',sans-serif;color:rgba(255,255,255,0.7);font-size:0.85rem;letter-spacing:0.25em;text-transform:uppercase;margin-top:10px;}

  /* ── HERO with image bg ── */
  .hero-section{
    position:relative;
    background-image:url('https://kawachtech.com/images/IMG_9975.jpeg');
    background-size:cover;
    background-position:center top;
  }
  .hero-overlay{
    position:absolute;inset:0;
    background:linear-gradient(180deg,rgba(13,17,23,0.52) 0%,rgba(13,17,23,0.72) 60%,rgba(13,17,23,0.97) 100%);
    pointer-events:none;
  }

  /* calendar */
  .cal-day{transition:all .14s;cursor:pointer;border-radius:9999px;width:30px;height:30px;display:flex;align-items:center;justify-content:center;font-size:0.75rem;font-weight:500;margin:auto;}
  .cal-day:not(.past):hover{background:rgba(96,165,250,0.2);color:#60a5fa;}
  .cal-day.selected{background:#1a5ccd;color:#fff;font-weight:700;box-shadow:0 0 10px rgba(26,92,205,0.6);}
  .cal-day.highlighted{background:rgba(255,77,77,0.18);color:#ff9999;font-weight:700;outline:1.5px solid rgba(255,100,100,0.5);border-radius:9999px;}
  .cal-day.selected.highlighted{background:#cc2222;color:#fff;outline:2px solid #ff4444;box-shadow:0 0 12px rgba(255,68,68,0.5);}
  .cal-day.today-ring{outline:1.5px solid #22d3ee;color:#22d3ee;font-weight:700;}
  .cal-day.past{opacity:0.25;cursor:not-allowed;pointer-events:none;}

  /* modal */
  .modal-backdrop{position:fixed;inset:0;background:rgba(0,0,0,0.78);backdrop-filter:blur(10px);z-index:100;display:flex;align-items:center;justify-content:center;padding:18px;}
  .modal-backdrop.hidden{display:none;}

  /* scrollbar */
  ::-webkit-scrollbar{width:4px;}
  ::-webkit-scrollbar-track{background:#161b22;}
  ::-webkit-scrollbar-thumb{background:#30363d;border-radius:2px;}

  /* toast */
  #toast{position:fixed;bottom:22px;left:50%;transform:translateX(-50%) translateY(70px);z-index:200;opacity:0;transition:all .32s cubic-bezier(0.34,1.56,0.64,1);white-space:nowrap;}
  #toast.show{transform:translateX(-50%) translateY(0);opacity:1;}

  /* checkout plugin row */
  .plugin-row{display:flex;align-items:center;padding:13px 16px;border-bottom:1px solid #e5e7eb;gap:12px;cursor:pointer;transition:background .15s;}
  .plugin-row:last-child{border-bottom:none;}
  .plugin-row:hover{background:#f9fafb;}
  .plugin-row.blu-row{background:#eff6ff;}
  .plugin-radio{width:18px;height:18px;border-radius:50%;border:1.5px solid #d1d5db;flex-shrink:0;display:flex;align-items:center;justify-content:center;}
  .plugin-radio.active{border-color:#1a5ccd;background:#1a5ccd;}
  .plugin-radio.active::after{content:'';display:block;width:7px;height:7px;background:#fff;border-radius:50%;}

  /* blu logo badge inline */
  .blu-badge{display:inline-flex;align-items:center;gap:4px;background:#1a5ccd;color:#fff;font-size:10px;font-weight:800;padding:2px 7px;border-radius:5px;font-family:'Bricolage Grotesque',sans-serif;letter-spacing:.3px;}

  /* early access text link */
  .text-link-cta{background:none;border:none;color:#93c5fd;font-size:0.8rem;font-weight:600;text-decoration:underline;text-underline-offset:3px;cursor:pointer;transition:color .15s;padding:4px 0;}
  .text-link-cta:hover{color:#60a5fa;}
</style>
</head>
<body class="bg-surface min-h-screen">

<!-- ═══════════ SPLASH SCREEN ═══════════ -->
<div id="splash">
  <div class="splash-bg"></div>
  <div class="splash-overlay"></div>
  <div class="splash-content">
    <div class="splash-logo">BLU</div>
    <div class="splash-sub">NYC EXPO 2026</div>
  </div>
</div>

<!-- ═══════════ NAVBAR ═══════════ -->
<header class="fixed top-0 left-0 right-0 z-50 bg-surface/90 backdrop-blur-xl border-b border-border">
  <div class="max-w-lg mx-auto px-5 h-14 flex items-center justify-between">
    <div class="flex items-center gap-2">
      <img src="https://www.kawachtech.com/images/sitelogo.png" alt="BLU" class="h-7 w-auto brightness-110"/>
      <span class="font-display font-extrabold text-xl text-blu-400 tracking-tight">BLU</span>
      <span class="w-2 h-2 rounded-full bg-cyan-400 animate-glow-pulse inline-block"></span>
    </div>
    <!-- 1. Updated: LIVE • NYC EXPO 2026 -->
    <span class="text-xs font-bold text-slate-400 tracking-widest uppercase flex items-center gap-1.5">
      <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-glow-pulse"></span>
      LIVE NYC EXPO 2026
    </span>
  </div>
</header>

<main class="pt-14">

<!-- ═══════════ HERO (with image + overlay) ═══════════ -->
<section class="hero-section relative min-h-[95svh] flex flex-col justify-center overflow-hidden">
  <div class="hero-overlay"></div>
  <!-- subtle dot grid on top of overlay -->
  <div class="absolute inset-0 dot-grid opacity-30 pointer-events-none"></div>

  <div class="absolute top-0 right-0 w-80 h-80 bg-blu-600/15 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute bottom-10 left-0 w-56 h-56 bg-cyan-500/8 rounded-full blur-3xl pointer-events-none"></div>

  <div class="relative max-w-lg mx-auto px-6 py-20 text-center">

    <div class="animate-fade-up inline-flex items-center gap-2.5 bg-panel/80 border border-border rounded-full px-4 py-2 mb-8 shadow-md backdrop-blur-sm">
      <span class="w-2 h-2 rounded-full bg-green-400 animate-glow-pulse"></span>
      <span class="text-xs font-bold text-slate-300 tracking-widest uppercase">LIVE NYC EXPO 2026</span>
    </div>

    <!-- 2. Headline -->
    <h1 class="animate-fade-up2 font-display font-extrabold text-4xl sm:text-5xl leading-[1.08] tracking-tight text-white mb-5">
      This changes how<br/>people shop.<br/>
      <span class="text-gradient">And how you sell.</span>
    </h1>

    <!-- 2. Updated supporting line -->
    <p class="animate-fade-up3 text-lg sm:text-xl text-slate-200 font-semibold leading-snug mb-3 max-w-sm mx-auto">
      Let customers buy now — and choose exactly when it arrives.
    </p>

    <!-- 10. "Turn future demand into sales today" -->
    <p class="animate-fade-up3 text-sm text-cyan-400 font-semibold mb-3 max-w-xs mx-auto">
      Turn future demand into sales today.
    </p>

    <!-- 2. 12 months emphasis -->
    <p class="animate-fade-up3 text-sm text-slate-400 leading-relaxed mb-4 max-w-xs mx-auto">
      BLU gives your customers the freedom to buy now and choose exactly when their order ships — <span class="text-slate-300 font-bold">up to 12 months in advance.</span>
    </p>

    <!-- 2. Updated supporting merchant line -->
    <p class="animate-fade-up3 text-sm text-cyan-400/80 italic leading-relaxed mb-10 max-w-xs mx-auto border-l-2 border-cyan-500/40 pl-3 text-left">
      Your shoppers can purchase for any holiday or occasion any time of the year. Skip the holiday rush.
    </p>

    <!-- 3. Simplified CTA: Primary button + text link -->
    <div class="animate-fade-up4 flex flex-col items-center gap-3">
      <button onclick="openDownloadModal()"
        class="w-full sm:w-auto bg-blu-600 hover:bg-blu-700 active:scale-95 text-white font-bold text-base rounded-2xl px-8 py-4 shadow-glow-blu transition-all duration-200 flex items-center justify-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Download BLU Now
      </button>
      <!-- 3. Text link instead of secondary button -->
      <button onclick="scrollToForm()" class="text-link-cta">or get early access</button>
    </div>

    <div class="mt-14 flex flex-col items-center gap-2 opacity-25">
      <span class="text-xs text-slate-400 tracking-wide">Scroll to see it in action</span>
      <svg class="w-4 h-4 text-slate-500 animate-bounce" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
    </div>
  </div>
</section>

<!-- ═══════════ HOW BLU WORKS FOR MERCHANTS ═══════════ -->
<section class="bg-panel py-16 px-6 border-y border-border">
  <div class="max-w-lg mx-auto">
    <p class="text-center text-xs font-bold text-slate-500 tracking-widest uppercase mb-2">For Merchants</p>
    <h2 class="font-display font-extrabold text-2xl text-white text-center mb-10 tracking-tight">
      How BLU Works <span class="text-gradient">for Merchants</span>
    </h2>
    <div class="relative grid grid-cols-3 gap-4">
      <div class="absolute top-6 left-[18%] right-[18%] h-px bg-gradient-to-r from-blu-600 via-cyan-500 to-blu-600 opacity-25"></div>

      <!-- 4. Merchant step 1 -->
      <div class="text-center relative z-10">
        <div class="w-12 h-12 rounded-full bg-card border border-blu-600/30 flex items-center justify-center mx-auto mb-3 shadow-glow-blu">
          <span class="text-xl">🔌</span>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-blu-600 text-white text-xs font-bold flex items-center justify-center" style="top:-6px">1</div>
        <p class="text-xs font-bold text-white mt-1">Install BLU</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">Add BLU to your checkout</p>
      </div>

      <!-- 4. Merchant step 2 -->
      <div class="text-center relative z-10">
        <div class="w-12 h-12 rounded-full bg-card border border-cyan-500/30 flex items-center justify-center mx-auto mb-3" style="box-shadow:0 0 14px rgba(34,211,238,0.2)">
          <span class="text-xl">📅</span>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-cyan-500 text-white text-xs font-bold flex items-center justify-center" style="top:-6px">2</div>
        <p class="text-xs font-bold text-white mt-1">Customers Pick</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">Future date (up to 12 months)</p>
      </div>

      <!-- 4. Merchant step 3 -->
      <div class="text-center relative z-10">
        <div class="w-12 h-12 rounded-full bg-card border border-border flex items-center justify-center mx-auto mb-3">
          <span class="text-xl">📦</span>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-blu-600 text-white text-xs font-bold flex items-center justify-center" style="top:-6px">3</div>
        <p class="text-xs font-bold text-white mt-1">You Ship</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">On their selected date</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════ HOW BLU WORKS FOR CUSTOMERS ═══════════ -->
<section class="bg-surface py-16 px-6 border-b border-border">
  <div class="max-w-lg mx-auto">
    <p class="text-center text-xs font-bold text-slate-500 tracking-widest uppercase mb-2">For Your Customers</p>
    <h2 class="font-display font-extrabold text-2xl text-white text-center mb-10 tracking-tight">
      How BLU Works <span class="text-gradient">for Your Customers</span>
    </h2>
    <div class="relative grid grid-cols-3 gap-4">
      <div class="absolute top-6 left-[18%] right-[18%] h-px bg-gradient-to-r from-blu-600 via-cyan-500 to-blu-600 opacity-25"></div>

      <div class="text-center relative z-10">
        <div class="w-12 h-12 rounded-full bg-card border border-blu-600/30 flex items-center justify-center mx-auto mb-3 shadow-glow-blu">
          <span class="text-xl">🛒</span>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-blu-600 text-white text-xs font-bold flex items-center justify-center" style="top:-6px">1</div>
        <p class="text-xs font-bold text-white mt-1">Buy Now</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">Shop as usual at checkout</p>
      </div>

      <div class="text-center relative z-10">
        <div class="w-12 h-12 rounded-full bg-card border border-cyan-500/30 flex items-center justify-center mx-auto mb-3" style="box-shadow:0 0 14px rgba(34,211,238,0.2)">
          <span class="text-xl">📅</span>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-cyan-500 text-white text-xs font-bold flex items-center justify-center" style="top:-6px">2</div>
        <p class="text-xs font-bold text-white mt-1">Choose Date</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">Pick their delivery date</p>
      </div>

      <!-- 4. Customer step 3 updated -->
      <div class="text-center relative z-10">
        <div class="w-12 h-12 rounded-full bg-card border border-border flex items-center justify-center mx-auto mb-3">
          <span class="text-xl">🎁</span>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2 w-5 h-5 rounded-full bg-blu-600 text-white text-xs font-bold flex items-center justify-center" style="top:-6px">3</div>
        <p class="text-xs font-bold text-white mt-1">Get It When They Need It</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">Right on their chosen date</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════ CHECKOUT PLUGIN PLACEMENT ═══════════ -->
<section class="py-16 px-6 bg-panel border-b border-border">
  <div class="max-w-sm mx-auto">
    <p class="text-center text-xs font-bold text-slate-500 tracking-widest uppercase mb-2">Where BLU lives</p>
    <h2 class="font-display font-extrabold text-xl text-white text-center mb-2 tracking-tight">
      BLU appears right in your <span class="text-gradient">existing checkout</span>
    </h2>
    <!-- 6. Updated line -->
    <p class="text-center text-xs text-slate-500 mb-8 leading-relaxed">Alongside Afterpay, Klarna, and more — BLU is a native checkout option merchants install in minutes.</p>

    <div class="animate-float bg-white rounded-3xl border border-slate-200 shadow-2xl overflow-hidden">

      <!-- browser bar -->
      <div class="bg-slate-50 border-b border-slate-200 px-4 py-2.5 flex items-center gap-2.5">
        <div class="flex gap-1.5">
          <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
          <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
          <span class="w-2.5 h-2.5 rounded-full bg-green-400"></span>
        </div>
        <div class="flex-1 bg-white border border-slate-200 rounded-md px-3 py-1 text-xs text-slate-400">🔒 cynosurehair.com</div>
      </div>

      <!-- card fields -->
      <div class="px-4 pt-4 pb-2 space-y-2.5">
        <div class="border border-slate-200 rounded-lg px-3 py-3 text-sm text-slate-400">Security code</div>
        <div class="border border-slate-200 rounded-lg px-3 py-3 text-sm text-slate-400">Name on card</div>
        <label class="flex items-center gap-2.5 py-1">
          <span class="w-4 h-4 rounded bg-orange-500 flex items-center justify-center flex-shrink-0">
            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
          </span>
          <span class="text-xs text-slate-600 font-medium">Use shipping address as billing address</span>
        </label>
      </div>

      <div class="mx-4 border-t border-slate-100 mb-1"></div>

      <div class="mx-4">
        <!-- Apple Pay -->
        <div class="plugin-row">
          <div class="plugin-radio"></div>
          <span class="text-sm text-slate-800 flex-1 font-medium">Apple Pay</span>
          <div class="border border-slate-300 rounded px-1.5 py-0.5 flex items-center gap-0.5">
            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98l-.09.06c-.22.14-2.15 1.26-2.13 3.75.03 2.98 2.61 3.97 2.64 3.98l-.06.89zm-3.8-17.25c.73-.88 1.94-1.55 2.94-1.75.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-2.86z"/></svg>
            <span class="text-xs font-semibold">Pay</span>
          </div>
        </div>
        <!-- PayPal -->
        <div class="plugin-row">
          <div class="plugin-radio"></div>
          <span class="text-sm text-slate-800 flex-1 font-medium">PayPal</span>
          <span class="text-sm font-extrabold" style="color:#003087">Pay<span style="color:#009cde">Pal</span></span>
        </div>
        <!-- Google Pay -->
        <div class="plugin-row">
          <div class="plugin-radio"></div>
          <span class="text-sm text-slate-800 flex-1 font-medium">Google Pay</span>
          <div class="border border-slate-300 rounded px-2 py-0.5 text-xs font-medium text-slate-600">G Pay</div>
        </div>
        <!-- Afterpay -->
        <div class="plugin-row">
          <div class="plugin-radio"></div>
          <span class="text-sm text-slate-800 flex-1 font-medium">Afterpay: Buy now, pay later</span>
          <div class="flex gap-1">
            <div class="w-7 h-5 bg-emerald-500 rounded flex items-center justify-center">
              <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <div class="w-7 h-5 bg-green-500 rounded flex items-center justify-center text-white font-bold text-xs">$</div>
          </div>
        </div>
        <!-- Affirm -->
        <div class="plugin-row">
          <div class="plugin-radio"></div>
          <span class="text-sm text-slate-800 flex-1 font-medium">Affirm: Buy now, pay later</span>
          <div class="border border-slate-300 rounded px-2 py-0.5 text-xs font-semibold text-slate-700 italic">affirm</div>
        </div>
        <!-- Klarna -->
        <div class="plugin-row">
          <div class="plugin-radio"></div>
          <span class="text-sm text-slate-800 flex-1 font-medium">Klarna: flexible payment options</span>
          <div class="rounded px-2 py-0.5 text-xs font-bold" style="background:#ffb3c7;color:#1a1a1a">Klarna</div>
        </div>

        <!-- 5. BLU ROW — updated with exact copy -->
        <div class="plugin-row blu-row border-t-2 border-blu-500" style="border-top:2px solid #1a5ccd;">
          <div class="plugin-radio active"></div>
          <div class="flex-1">
            <div class="flex items-center gap-2 mb-0.5">
              <span class="blu-badge">💙 BLU</span>
              <span class="text-sm text-slate-800 font-semibold">Buy Now, Ship Later</span>
            </div>
            <!-- 5. Updated exact copy -->
            <p class="text-xs text-slate-500">Choose your exact future delivery date (up to 12 months in advance)</p>
            <!-- 5. 10% service fee clearly shown -->
            <p class="text-xs font-bold text-blue-700 mt-0.5">10% service fee</p>
          </div>
        </div>
      </div>

      <!-- total row -->
      <div class="mx-4 mt-3 border-t border-slate-100 pt-3 pb-1 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-slate-200 overflow-hidden flex-shrink-0"></div>
        <div class="flex-1">
          <p class="text-sm font-bold text-slate-900">Total · 2 items</p>
          <p class="text-xs text-slate-400">Total savings $118.47</p>
        </div>
        <div class="text-right">
          <p class="text-sm font-extrabold text-slate-900">$278.22</p>
          <p class="text-xs text-slate-400">USD</p>
        </div>
      </div>

      <div class="mx-4 mt-3 mb-4">
        <button class="w-full py-3.5 rounded-xl text-white font-bold text-sm" style="background:#7c2929;">Pay now</button>
      </div>
    </div>

    <p class="text-center text-xs text-slate-600 mt-5 leading-relaxed">
      ↑ BLU lives right here — alongside Afterpay, Klarna, and the rest.<br/>
      <span class="text-slate-500">No friction. Just install and go.</span>
    </p>
  </div>
</section>

<!-- ═══════════ INTERACTIVE CHECKOUT DEMO ═══════════ -->
<section class="py-16 px-6 bg-surface">
  <div class="max-w-sm mx-auto">
    <p class="text-center text-xs font-bold text-slate-500 tracking-widest uppercase mb-2">Try it yourself</p>
    <h2 class="font-display font-extrabold text-2xl text-white text-center mb-2 tracking-tight">
      See BLU at <span class="text-gradient">checkout</span>
    </h2>
    <p class="text-center text-sm text-slate-500 mb-8">This is what your customers see at checkout.</p>

    <div class="bg-card rounded-3xl border border-border shadow-2xl overflow-hidden">

      <!-- browser bar -->
      <div class="bg-panel border-b border-border px-4 py-3 flex items-center gap-2.5">
        <div class="flex gap-1.5">
          <span class="w-3 h-3 rounded-full bg-red-500/80"></span>
          <span class="w-3 h-3 rounded-full bg-yellow-500/80"></span>
          <span class="w-3 h-3 rounded-full bg-green-500/80"></span>
        </div>
        <div class="flex-1 bg-surface border border-border rounded-lg px-3 py-1 text-xs text-slate-500">🔒 checkout.yourstore.com</div>
      </div>

      <div class="p-5 space-y-3">
        <!-- order — 5. Updated: Order placed May 7 -->
        <div>
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Order Summary</p>
          <div class="bg-surface rounded-xl p-3 border border-border flex items-center gap-3">
            <span class="text-lg">👟</span>
            <div class="flex-1">
              <p class="text-xs font-semibold text-white">Retro Runner – Size 10</p>
              <p class="text-xs text-slate-500">Order placed: <span class="text-cyan-400 font-bold">May 7</span></p>
            </div>
            <span class="text-sm font-bold text-white">$129</span>
          </div>
        </div>

        <!-- shipping options -->
        <div>
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Shipping Method</p>

          <div id="opt-standard" onclick="selectShipping('standard')"
            class="flex items-center gap-3 p-3 rounded-xl border border-border bg-surface mb-2 cursor-pointer transition-all duration-200">
            <div id="radio-standard" class="w-4 h-4 rounded-full border-2 border-slate-600 flex-shrink-0"></div>
            <div class="flex-1">
              <p class="text-xs font-semibold text-slate-300">Standard Shipping</p>
              <p class="text-xs text-slate-500">Ships in 3–5 days</p>
            </div>
            <span class="text-xs font-bold text-slate-400">Free</span>
          </div>

          <!-- 5. BLU option updated -->
          <div id="opt-blu" onclick="selectShipping('blu')"
            class="flex items-center gap-3 p-3 rounded-xl border-2 border-blu-600 bg-blu-600/10 mb-2 cursor-pointer transition-all duration-200" style="box-shadow:0 0 14px rgba(26,92,205,0.18)">
            <div id="radio-blu" class="w-4 h-4 rounded-full border-2 border-blu-400 bg-blu-600 flex-shrink-0 flex items-center justify-center">
              <span class="w-1.5 h-1.5 bg-white rounded-full block"></span>
            </div>
            <div class="flex-1">
              <p class="text-xs font-bold text-blu-300 flex items-center gap-1.5 flex-wrap">
                <span class="inline-flex items-center gap-1 bg-blu-600 text-white px-1.5 py-0.5 rounded text-xs font-extrabold">💙 BLU</span>
                <span>– Buy Now, Ship Later</span>
                <span class="bg-blu-600 text-white text-xs px-1.5 py-0.5 rounded-full font-bold">NEW</span>
              </p>
              <!-- 5. Exact updated copy -->
              <p class="text-xs text-slate-400 mt-0.5">Choose your exact future delivery date (up to 12 months in advance)</p>
            </div>
            <!-- 5. 10% service fee -->
            <span class="text-xs font-bold text-amber-400 whitespace-nowrap">10% fee</span>
          </div>
        </div>

        <!-- CALENDAR — 5. starts on December, Dec 23 pre-selected & highlighted -->
        <div id="calendar-section">
          <div class="bg-surface border border-blu-600/30 rounded-2xl p-4">
            <div class="flex items-center justify-between mb-3">
              <button onclick="prevMonth()" class="w-7 h-7 rounded-full bg-panel border border-border flex items-center justify-center text-slate-400 hover:text-white hover:border-blu-400 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
              </button>
              <p id="cal-month-label" class="text-xs font-bold text-white tracking-wide"></p>
              <button onclick="nextMonth()" class="w-7 h-7 rounded-full bg-panel border border-border flex items-center justify-center text-slate-400 hover:text-white hover:border-blu-400 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
              </button>
            </div>
            <div class="grid grid-cols-7 mb-1 text-center">
              <span class="text-xs text-slate-600 font-bold">Su</span><span class="text-xs text-slate-600 font-bold">Mo</span>
              <span class="text-xs text-slate-600 font-bold">Tu</span><span class="text-xs text-slate-600 font-bold">We</span>
              <span class="text-xs text-slate-600 font-bold">Th</span><span class="text-xs text-slate-600 font-bold">Fr</span>
              <span class="text-xs text-slate-600 font-bold">Sa</span>
            </div>
            <div id="cal-days" class="grid grid-cols-7 gap-y-1 text-center"></div>

            <!-- 5. Dec 23 highlighted legend -->
            <div class="mt-2 flex items-center gap-1.5">
              <span class="text-sm"></span>
              <span class="text-xs text-slate-500 italic">Dec 23 — Pre-Christmas delivery</span>
            </div>

            <div id="selected-date-display" class="mt-3 flex items-center gap-2 bg-panel rounded-xl px-3 py-2.5 border border-border">
              <svg class="w-3.5 h-3.5 text-cyan-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
              <span id="selected-date-text" class="text-xs font-semibold text-slate-300">Select a future delivery date</span>
              <svg id="selected-check" class="w-3.5 h-3.5 text-green-400 ml-auto hidden" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            </div>
          </div>
        </div>

        <button id="confirm-btn" onclick="openConfirmModal()"
          class="w-full bg-blu-600 hover:bg-blu-700 active:scale-95 text-white font-bold text-sm rounded-xl py-3.5 transition-all duration-200 flex items-center justify-center gap-2 shadow-glow-blu">
          <span id="confirm-btn-text">Confirm & Schedule →</span>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════ STATS ═══════════ -->
<section class="bg-panel border-y border-border py-10 px-6">
  <div class="max-w-sm mx-auto">
    <p class="text-center text-xs font-bold text-slate-500 tracking-widest uppercase mb-6">Why merchants install BLU</p>
    <div class="grid grid-cols-3 gap-4 text-center">
      <div>
        <p class="font-display font-extrabold text-xl text-blu-400">Up to +34%</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">Conversion lift</p>
      </div>
      <div class="border-x border-border">
        <p class="font-display font-extrabold text-2xl text-cyan-400">Free</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">To install</p>
      </div>
      <div>
        <p class="font-display font-extrabold text-2xl text-blu-400">5 min</p>
        <p class="text-xs text-slate-500 mt-1 leading-tight">Setup time</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════ MINDSET SHIFT — "The Shift BLU Creates" ═══════════ -->
<section class="py-14 px-6 bg-surface">
  <div class="max-w-sm mx-auto text-center">
    <!-- 7. Updated header -->
    <p class="text-xs font-bold text-slate-500 tracking-widest uppercase mb-6">The Shift BLU Creates</p>
    <div class="grid grid-cols-2 gap-3 mb-6">
      <div class="bg-panel border border-border rounded-2xl p-4 text-left opacity-60">
        <p class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-2">❌ Before BLU</p>
        <p class="text-sm font-semibold text-slate-400 leading-snug">"How fast can I get this?"</p>
      </div>
      <div class="bg-blu-600/10 border border-blu-600/40 rounded-2xl p-4 text-left" style="box-shadow:0 0 18px rgba(26,92,205,0.14)">
        <p class="text-xs font-bold text-blu-400 uppercase tracking-wide mb-2">✨ With BLU</p>
        <p class="text-sm font-bold text-white leading-snug">"When do I <em>want</em> this?"</p>
      </div>
    </div>
    <!-- 7. Updated closing line -->
    <p class="text-sm text-slate-500 leading-relaxed">This shift drives more sales, fewer returns, and happier customers — automatically.</p>
    <!-- 10. Optional "Turn future demand" line here too -->
    <p class="text-xs text-cyan-400/70 mt-3 font-semibold italic">Turn future demand into sales today.</p>
  </div>
</section>

<!-- ═══════════ LEAD CAPTURE FORM ═══════════ -->
<section id="form-section" class="bg-panel border-t border-border py-16 px-6">
  <div class="max-w-sm mx-auto">

    <div class="text-center mb-8">
      <span class="inline-flex items-center gap-2 bg-blu-600/20 border border-blu-600/40 text-blu-400 text-xs font-bold tracking-widest uppercase rounded-full px-4 py-2 mb-4">
        <span class="w-1.5 h-1.5 rounded-full bg-blu-400 animate-glow-pulse"></span>
        Early Merchant Access
      </span>
      <!-- 8. Updated CTA heading, removed urgency language -->
      <h2 class="font-display font-extrabold text-2xl sm:text-3xl text-white tracking-tight leading-tight mb-3">
        Download BLU &amp;<br/>
        <span class="text-gradient">Start Selling Smarter.</span>
      </h2>
      <p class="text-sm text-slate-500 leading-relaxed">
        Download BLU and start offering flexible delivery to your customers.
      </p>
    </div>

    <div id="form-card" class="bg-card rounded-3xl border border-border shadow-2xl p-6 space-y-4">
      <div>
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Your Name</label>
        <input id="f-name" type="text" placeholder="Jane Smith"
          class="w-full bg-surface border border-border rounded-xl px-4 py-3.5 text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-blu-500 focus:border-transparent transition"/>
      </div>
      <div>
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Address</label>
        <input id="f-email" type="email" placeholder="jane@yourstore.com"
          class="w-full bg-surface border border-border rounded-xl px-4 py-3.5 text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-blu-500 focus:border-transparent transition"/>
      </div>
      <div>
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Business / Store Name</label>
        <input id="f-business" type="text" placeholder="Your Store Co."
          class="w-full bg-surface border border-border rounded-xl px-4 py-3.5 text-sm font-medium text-white placeholder-slate-600 focus:outline-none focus:ring-2 focus:ring-blu-500 focus:border-transparent transition"/>
      </div>
      <!-- 8. Updated button text -->
      <button onclick="handleFormSubmit()"
        class="w-full bg-blu-600 hover:bg-blu-700 active:scale-95 text-white font-bold text-base rounded-2xl py-4 shadow-glow-blu transition-all duration-200 flex items-center justify-center gap-2">
        <span id="form-btn-text">Install BLU on Shopify →</span>
        <svg id="form-spinner" class="hidden w-5 h-5 animate-spin-slow" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/></svg>
      </button>
      <p class="text-center text-xs text-slate-600 pt-1">No spam. No credit card. Just access. 🔒</p>
    </div>

    <div id="form-success" class="hidden bg-card rounded-3xl border border-green-500/30 shadow-2xl p-8 text-center">
      <div class="w-16 h-16 bg-green-500/10 border border-green-500/30 rounded-full flex items-center justify-center mx-auto mb-5">
        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
      </div>
      <h3 class="font-display font-extrabold text-xl text-white mb-2">You're in! 🎉</h3>
      <!-- 8. Updated success message -->
      <p class="text-slate-400 text-sm leading-relaxed mb-5">We've got your info. You'll be redirected to install BLU on your Shopify store now.</p>
      <button onclick="window.open('https://apps.shopify.com/blu?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAdGRleARPrwdleHRuA2FlbQIxMQBzcnRjBmFwcF9pZA8xMjQwMjQ1NzQyODc0MTQAAacKNpXHxEPclxnXs3Ucxt6sFY00lmgXFkCKDxZXvcS2MNXIz5MX35QhZoG9dA_aem_sDdv0iTwcw-LiOQYL5Odcw','_blank')"
        class="w-full bg-blu-600 hover:bg-blu-700 text-white font-bold text-sm rounded-2xl py-3.5 transition-all flex items-center justify-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Install BLU on Shopify →
      </button>
      <p class="text-xs font-bold text-blu-400 mt-4">BLUinNYC.com</p>
    </div>

  </div>
</section>

<!-- ═══════════ FOOTER ═══════════ -->
<footer class="bg-surface border-t border-border py-8 px-6 text-center">
  <p class="font-display font-extrabold text-blu-400 text-lg mb-1">BLU.</p>
  <p class="text-xs text-slate-600 font-medium mb-1">Buy Now. Ship Later. Live Smarter.</p>
  <p class="text-xs text-slate-700">© 2026 BLU · BLUinNYC.com</p>
</footer>

</main>

<!-- ═══════════ MODAL: DOWNLOAD ═══════════ -->
<div id="download-modal" class="modal-backdrop hidden" onclick="closeModal('download-modal')">
  <div class="bg-card border border-border rounded-3xl p-7 max-w-sm w-full animate-modal-in shadow-2xl" onclick="event.stopPropagation()">
    <div class="flex items-start justify-between mb-5">
      <div>
        <div class="flex items-center gap-2 mb-1">
          <span class="font-display font-extrabold text-lg text-white">Download BLU</span>
          <span class="w-2 h-2 rounded-full bg-cyan-400 animate-glow-pulse"></span>
        </div>
        <p class="text-xs text-slate-500">Install in minutes. Free for merchants.</p>
      </div>
      <button onclick="closeModal('download-modal')" class="w-8 h-8 rounded-full bg-surface border border-border flex items-center justify-center text-slate-400 hover:text-white transition-colors flex-shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>

    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Choose your platform</p>
    <div class="space-y-2.5 mb-6">
      <button onclick="installPlatform('Shopify')"
        class="w-full flex items-center gap-3 bg-surface border border-border hover:border-blu-400 rounded-2xl px-4 py-3.5 transition-all group">
        <div class="w-9 h-9 rounded-xl bg-green-500/10 border border-green-500/20 flex items-center justify-center text-lg flex-shrink-0">🟢</div>
        <div class="flex-1 text-left">
          <p class="text-sm font-bold text-white group-hover:text-blu-400 transition-colors">Shopify</p>
          <p class="text-xs text-slate-500">Available now · Free install</p>
        </div>
        <svg class="w-4 h-4 text-slate-600 group-hover:text-blu-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </button>

      <button onclick="installPlatform('WooCommerce')"
        class="w-full flex items-center gap-3 bg-surface border border-border hover:border-blu-400 rounded-2xl px-4 py-3.5 transition-all group">
        <div class="w-9 h-9 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-lg flex-shrink-0">🟣</div>
        <div class="flex-1 text-left">
          <p class="text-sm font-bold text-white group-hover:text-blu-400 transition-colors">WooCommerce</p>
          <p class="text-xs text-slate-500">Coming soon · Join waitlist</p>
        </div>
        <svg class="w-4 h-4 text-slate-600 group-hover:text-blu-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </button>

      <button onclick="installPlatform('BigCommerce')"
        class="w-full flex items-center gap-3 bg-surface border border-border hover:border-blu-400 rounded-2xl px-4 py-3.5 transition-all group">
        <div class="w-9 h-9 rounded-xl bg-blu-600/10 border border-blu-600/20 flex items-center justify-center text-lg flex-shrink-0">🔵</div>
        <div class="flex-1 text-left">
          <p class="text-sm font-bold text-white group-hover:text-blu-400 transition-colors">BigCommerce</p>
          <p class="text-xs text-slate-500">Coming soon · Join waitlist</p>
        </div>
        <svg class="w-4 h-4 text-slate-600 group-hover:text-blu-400 transition-colors" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </button>
    </div>

    <div class="bg-surface border border-border rounded-2xl px-4 py-3 text-xs text-slate-500 flex items-start gap-2">
      <span class="text-green-400 mt-0.5">✓</span>
      Free for merchants · 10% service fee on BLU orders only · No monthly cost
    </div>
  </div>
</div>

<!-- ═══════════ MODAL: ORDER CONFIRMED ═══════════ -->
<div id="confirm-modal" class="modal-backdrop hidden" onclick="closeModal('confirm-modal')">
  <div class="bg-card border border-border rounded-3xl p-7 max-w-sm w-full animate-modal-in shadow-2xl" onclick="event.stopPropagation()">
    <div class="flex justify-end mb-2">
      <button onclick="closeModal('confirm-modal')" class="w-8 h-8 rounded-full bg-surface border border-border flex items-center justify-center text-slate-400 hover:text-white transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
    <div class="text-center">
      <div class="w-16 h-16 bg-green-500/10 border border-green-500/30 rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
      </div>
      <h3 class="font-display font-extrabold text-xl text-white mb-1">Delivery Scheduled! 🎉</h3>
      <p class="text-slate-400 text-sm mb-5 leading-relaxed">Your future delivery date has been confirmed. You'll receive a reminder before it ships.</p>

      <div class="bg-surface border border-border rounded-2xl p-4 text-left mb-5 space-y-2.5">
        <div class="flex justify-between text-xs">
          <span class="text-slate-500">Order placed</span>
          <!-- 5. Updated to May 7 -->
          <span class="font-bold text-white">May 7, 2026</span>
        </div>
        <div class="flex justify-between text-xs">
          <span class="text-slate-500">Future delivery date</span>
          <span id="modal-ship-date" class="font-bold text-cyan-400">—</span>
        </div>
        <div class="flex justify-between text-xs">
          <span class="text-slate-500">Method</span>
          <span class="font-bold text-blu-400">💙 BLU – Buy Now, Ship Later</span>
        </div>
        <div class="flex justify-between text-xs">
          <span class="text-slate-500">Service fee</span>
          <span class="font-bold text-amber-400">10%</span>
        </div>
        <div class="flex justify-between text-xs">
          <span class="text-slate-500">Status</span>
          <span class="bg-green-500/20 text-green-400 text-xs font-bold px-2 py-0.5 rounded-full">Scheduled</span>
        </div>
      </div>

      <p class="text-xs text-slate-600 mb-5 italic">This is the confirmation your customers see — powered by BLU in your checkout.</p>

      <button onclick="closeModal('confirm-modal');openDownloadModal()"
        class="w-full bg-blu-600 hover:bg-blu-700 text-white font-bold text-sm rounded-2xl py-3.5 transition-all flex items-center justify-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Download BLU for My Store
      </button>
    </div>
  </div>
</div>

<!-- ═══════════ MODAL: INSTALL SUCCESS ═══════════ -->
<div id="install-modal" class="modal-backdrop hidden" onclick="closeModal('install-modal')">
  <div class="bg-card border border-green-500/30 rounded-3xl p-7 max-w-sm w-full animate-modal-in shadow-2xl" onclick="event.stopPropagation()">
    <div class="text-center">
      <div class="w-16 h-16 bg-blu-600/10 border border-blu-600/30 rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 text-blu-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
      </div>
      <h3 class="font-display font-extrabold text-xl text-white mb-1">Redirecting to Shopify 🚀</h3>
      <p class="text-slate-400 text-sm mb-4 leading-relaxed">You're being taken to the Shopify App Store to install BLU. Setup takes about 5 minutes.</p>
      <div class="bg-surface border border-border rounded-2xl p-3 text-xs text-slate-500 mb-5">
        ✓ Free to install &nbsp;·&nbsp; ✓ No monthly fee &nbsp;·&nbsp; ✓ 10% only on BLU orders
      </div>
      <button onclick="closeModal('install-modal')"
        class="w-full bg-blu-600 hover:bg-blu-700 text-white font-bold text-sm rounded-2xl py-3.5 transition-all">
        Got it ✓
      </button>
    </div>
  </div>
</div>

<!-- ═══════════ TOAST ═══════════ -->
<div id="toast" class="bg-card border border-border rounded-2xl px-5 py-3 flex items-center gap-3 shadow-2xl">
  <span id="toast-icon" class="text-lg">✅</span>
  <span id="toast-msg" class="text-sm font-semibold text-white"></span>
</div>

<!-- ═══════════ JAVASCRIPT ═══════════ -->
<script>
// ── SPLASH ──────────────────────────────────────────────────
(function() {
  // Auto-fade splash after 1 second (0.8–1.2s feel)
  const splash = document.getElementById('splash');
  setTimeout(function() {
    splash.classList.add('fade-out');
    setTimeout(function() {
      splash.style.display = 'none';
    }, 520);
  }, 1000);
})();

// ── TOAST ──────────────────────────────────────────────────
function showToast(msg, icon='✅') {
  document.getElementById('toast-msg').textContent = msg;
  document.getElementById('toast-icon').textContent = icon;
  const t = document.getElementById('toast');
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3200);
}

// ── SCROLL TO FORM ──────────────────────────────────────────
function scrollToForm() {
  document.getElementById('form-section').scrollIntoView({behavior:'smooth'});
}

// ── MODALS ──────────────────────────────────────────────────
function openDownloadModal() {
  document.getElementById('download-modal').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}
function openConfirmModal() {
  const selText = document.getElementById('selected-date-text').textContent;
  const dateStr = selText.startsWith('Delivery:') ? selText.replace('Delivery: ','') : 'Not selected yet';
  document.getElementById('modal-ship-date').textContent = dateStr;
  document.getElementById('confirm-modal').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}
function closeModal(id) {
  document.getElementById(id).classList.add('hidden');
  document.body.style.overflow = '';
}
function installPlatform(name) {
  closeModal('download-modal');
  if (name === 'Shopify') {
    document.getElementById('install-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    showToast('Redirecting to Shopify…', '🚀');
    setTimeout(() => window.open('https://apps.shopify.com/blu?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAdGRleARPrwdleHRuA2FlbQIxMQBzcnRjBmFwcF9pZA8xMjQwMjQ1NzQyODc0MTQAAacKNpXHxEPclxnXs3Ucxt6sFY00lmgXFkCKDxZXvcS2MNXIz5MX35QhZoG9dA_aem_sDdv0iTwcw-LiOQYL5Odcw', '_blank'), 900);
  } else {
    showToast(`${name} coming soon! Added to waitlist.`, '📋');
  }
}

// ── SHIPPING SELECTION ──────────────────────────────────────
function selectShipping(type) {
  const optBlu   = document.getElementById('opt-blu');
  const optStd   = document.getElementById('opt-standard');
  const radioBlu = document.getElementById('radio-blu');
  const radioStd = document.getElementById('radio-standard');
  const calSec   = document.getElementById('calendar-section');
  const btnText  = document.getElementById('confirm-btn-text');

  if (type === 'blu') {
    optBlu.className = 'flex items-center gap-3 p-3 rounded-xl border-2 border-blu-600 bg-blu-600/10 mb-2 cursor-pointer transition-all duration-200';
    optBlu.style.boxShadow = '0 0 14px rgba(26,92,205,0.18)';
    optStd.className = 'flex items-center gap-3 p-3 rounded-xl border border-border bg-surface mb-2 cursor-pointer transition-all duration-200';
    optStd.style.boxShadow = '';
    radioBlu.innerHTML = '<span class="w-1.5 h-1.5 bg-white rounded-full block"></span>';
    radioBlu.className = 'w-4 h-4 rounded-full border-2 border-blu-400 bg-blu-600 flex-shrink-0 flex items-center justify-center';
    radioStd.innerHTML = '';
    radioStd.className = 'w-4 h-4 rounded-full border-2 border-slate-600 flex-shrink-0';
    calSec.style.display = 'block';
    btnText.textContent = 'Confirm & Schedule →';
  } else {
    optStd.className = 'flex items-center gap-3 p-3 rounded-xl border-2 border-blu-600 bg-blu-600/10 mb-2 cursor-pointer transition-all duration-200';
    optStd.style.boxShadow = '0 0 14px rgba(26,92,205,0.18)';
    optBlu.className = 'flex items-center gap-3 p-3 rounded-xl border border-border bg-surface mb-2 cursor-pointer transition-all duration-200';
    optBlu.style.boxShadow = '';
    radioStd.innerHTML = '<span class="w-1.5 h-1.5 bg-white rounded-full block"></span>';
    radioStd.className = 'w-4 h-4 rounded-full border-2 border-blu-400 bg-blu-600 flex-shrink-0 flex items-center justify-center';
    radioBlu.innerHTML = '';
    radioBlu.className = 'w-4 h-4 rounded-full border-2 border-slate-600 flex-shrink-0';
    calSec.style.display = 'none';
    btnText.textContent = 'Confirm Standard Shipping →';
  }
}

// ── CALENDAR ────────────────────────────────────────────────
// 5. Start on December so Dec 23 is visible
let calDate = new Date(new Date().getFullYear(), 11, 1);
let selectedDay = null;
// 5. The highlighted date (Dec 23 — pre-Christmas)
const HIGHLIGHT = { d: 23, m: 11 }; // month is 0-indexed

const MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];
const MONTHS_SHORT = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

function renderCalendar() {
  const label = document.getElementById('cal-month-label');
  const grid  = document.getElementById('cal-days');
  const now   = new Date();
  // For demo purposes, treat May 7 (order date) as "today" so Dec is in the future
  const today = new Date(now.getFullYear(), 4, 7); // May 7 of current year

  const year  = calDate.getFullYear();
  const month = calDate.getMonth();

  label.textContent = `${MONTHS[month]} ${year}`;

  const firstDay    = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();

  let html = '';
  for (let i = 0; i < firstDay; i++) html += '<div></div>';

  for (let d = 1; d <= daysInMonth; d++) {
    const thisDate = new Date(year, month, d);
    const isPast   = thisDate < today;
    const isToday  = thisDate.getTime() === today.getTime();
    const isSel    = selectedDay && selectedDay.d === d && selectedDay.m === month && selectedDay.y === year;
    // 5. Dec 23 highlighted with holiday icon
    const isHighlighted = (month === HIGHLIGHT.m && d === HIGHLIGHT.d);

    let cls = 'cal-day';
    if (isPast)          cls += ' past';
    else if (isSel && isHighlighted) cls += ' selected highlighted';
    else if (isSel)      cls += ' selected';
    else if (isHighlighted) cls += ' highlighted';
    else if (isToday)    cls += ' today-ring';

    const click = !isPast ? `onclick="pickDay(${d},${month},${year})"` : '';
    // Add tree emoji inside Dec 23 cell
    const label2 = isHighlighted ? `${d}` : d;
    html += `<div class="${cls}" ${click} title="${isHighlighted ? 'Pre-Christmas delivery' : ''}">${label2}</div>`;
  }

  grid.innerHTML = html;
}

function pickDay(d, m, y) {
  selectedDay = {d, m, y};
  const label = `${MONTHS_SHORT[m]} ${d}, ${y}`;
  document.getElementById('selected-date-text').textContent = `Delivery: ${label}`;
  document.getElementById('selected-check').classList.remove('hidden');
  const isHoliday = (m === HIGHLIGHT.m && d === HIGHLIGHT.d);
  document.getElementById('confirm-btn-text').textContent = `Confirm – Delivers ${MONTHS_SHORT[m]} ${d} ${isHoliday ? '🎄' : ''} →`;
  renderCalendar();
  showToast(`Delivery date set: ${label}${isHoliday ? ' 🎄' : ''}`, '📅');
}

function prevMonth() {
  const now = new Date();
  const minMonth = new Date(now.getFullYear(), now.getMonth(), 1);
  const prev = new Date(calDate.getFullYear(), calDate.getMonth() - 1, 1);
  if (prev < minMonth) return;
  calDate = prev;
  renderCalendar();
}

function nextMonth() {
  const now = new Date();
  const maxMonth = new Date(now.getFullYear(), now.getMonth() + 12, 1);
  const next = new Date(calDate.getFullYear(), calDate.getMonth() + 1, 1);
  if (next > maxMonth) { showToast('Maximum 12 months in advance', '⚠️'); return; }
  calDate = next;
  renderCalendar();
}

// ── FORM SUBMIT ─────────────────────────────────────────────
async function handleFormSubmit() {
  const name     = document.getElementById('f-name').value.trim();
  const email    = document.getElementById('f-email').value.trim();
  const business = document.getElementById('f-business').value.trim();

  if (!name || !email || !business) { showToast('Please fill in all fields.','⚠️'); return; }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { showToast('Please enter a valid email.','⚠️'); return; }

  document.getElementById('form-btn-text').classList.add('hidden');
  document.getElementById('form-spinner').classList.remove('hidden');

  try {
    await fetch('https://formspree.io/f/YOUR_FORM_ID', {
      method:'POST',
      headers:{'Content-Type':'application/json','Accept':'application/json'},
      body:JSON.stringify({name, email, business, _subject:`BLU NYC Expo Lead: ${name} – ${business}`}),
    });
  } catch(e) { /* show success anyway for demo */ }

  await new Promise(r => setTimeout(r, 1200));
  document.getElementById('form-card').classList.add('hidden');
  document.getElementById('form-success').classList.remove('hidden');
  showToast(`Welcome, ${name}! Redirecting to install… 🚀`, '🎉');
  // 8. Redirect to Shopify install page after submission
  setTimeout(() => window.open('https://apps.shopify.com/blu?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAdGRleARPrwdleHRuA2FlbQIxMQBzcnRjBmFwcF9pZA8xMjQwMjQ1NzQyODc0MTQAAacKNpXHxEPclxnXs3Ucxt6sFY00lmgXFkCKDxZXvcS2MNXIz5MX35QhZoG9dA_aem_sDdv0iTwcw-LiOQYL5Odcw', '_blank'), 2500);
}

// ── INIT ────────────────────────────────────────────────────
renderCalendar();
// 5. Pre-select Dec 23 as the demo date
setTimeout(() => pickDay(23, 11, new Date().getFullYear()), 400);

// Escape to close modals
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    ['download-modal','confirm-modal','install-modal'].forEach(id => closeModal(id));
  }
});
</script>
</body>
</html>
