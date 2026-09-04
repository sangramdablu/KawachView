{{-- ══════════════════════════════════════════════════════════════════════
     ORBIT BOARD DEMO — the real animated board mockup from Orbit's own
     marketing page (orbitzr.com), ported from Tailwind to plain CSS for
     this site. A 24s loop cycles Board → List → Timeline while the
     "Welcome to Orbit" card animates itself from Backlog into To Do,
     acting out its own "try dragging me" copy, with synced toasts.
     Shared partial — included on the homepage spotlight and the Orbit
     product page so both use the exact same real demo.
     ══════════════════════════════════════════════════════════════════════ --}}
<style>
.kwob-wrap{ position:relative; padding:24px 0; }

.kwob-blob{ position:absolute; border-radius:9999px; filter:blur(38px); pointer-events:none; }
.kwob-blob-1{ width:220px; height:220px; background:rgba(245,166,35,.25); top:-30px; right:-20px; }
.kwob-blob-2{ width:200px; height:200px; background:rgba(143,124,255,.25); bottom:-30px; left:-30px; }
.kwob-blob-3{ width:130px; height:130px; background:rgba(56,176,255,.2); top:33%; right:-40px; }

.kwob-tilt{ transform:perspective(1400px) rotateY(-6deg) rotateX(2deg); transition:transform .5s ease; }
.kwob-tilt:hover{ transform:perspective(1400px) rotateY(0deg) rotateX(0deg); }

.kwob-frame{ position:relative; border-radius:16px; background:#fff; color:#15141F; box-shadow:0 12px 32px -8px rgba(21,20,31,.25); border:1px solid rgba(21,20,31,.06); overflow:visible; }

.kwob-chrome{ display:flex; align-items:center; gap:8px; background:#15141F; padding:14px 24px; border-radius:16px 16px 0 0; }
.kwob-dot{ width:10px; height:10px; border-radius:50%; }
.kwob-dot-red{ background:rgba(243,89,107,.7); }
.kwob-dot-yellow{ background:rgba(245,166,35,.7); }
.kwob-dot-green{ background:rgba(34,197,94,.7); }
.kwob-url{ margin-left:12px; font-family:'JetBrains Mono', monospace; font-size:11px; color:rgba(255,255,255,.4); }
.kwob-chrome-spacer{ flex:1; }
.kwob-pilot-chip{ display:flex; align-items:center; gap:6px; font-family:'JetBrains Mono', monospace; font-size:11px; font-weight:600; color:#8F7CFF; }
.kwob-pilot-dot{ width:6px; height:8px; border-radius:1px; background:#22C55E; animation:kwobPilotPulse 24s ease-in-out infinite; }

.kwob-toolbar{ display:flex; align-items:center; justify-content:space-between; gap:12px; padding:16px 24px 8px; background:#fff; flex-wrap:wrap; }
.kwob-toolbar-left{ display:flex; align-items:center; gap:12px; min-width:0; }
.kwob-board-name{ font-family:'Plus Jakarta Sans', sans-serif; font-weight:700; font-size:15px; display:flex; align-items:center; gap:6px; margin:0; }
.kwob-board-name svg{ color:#6B6C7E; }
.kwob-tabs{ display:flex; align-items:center; gap:4px; background:#F3F3FB; border-radius:8px; padding:2px; border:1px solid rgba(21,20,31,.05); font-size:11px; font-weight:600; }
.kwob-tab{ padding:4px 10px; border-radius:6px; }
.kwob-tab-board{ background:#15141F; color:#fff; animation:kwobTabBoard 24s ease-in-out infinite; }
.kwob-tab-list{ color:#6B6C7E; animation:kwobTabList 24s ease-in-out infinite; }
.kwob-tab-timeline{ color:#6B6C7E; animation:kwobTabTimeline 24s ease-in-out infinite; }
.kwob-toolbar-right{ display:flex; align-items:center; gap:8px; }
.kwob-avatars{ display:flex; }
.kwob-avatar{ width:24px; height:24px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:9px; font-weight:700; color:#fff; border:2px solid #fff; margin-left:-8px; }
.kwob-avatar:first-child{ margin-left:0; }
.kwob-avatar-ok{ background:#22C55E; }
.kwob-avatar-warn{ background:#F5A623; }
.kwob-avatar-sky{ background:#38B0FF; }
.kwob-invite{ font-size:11px; font-weight:600; background:#6D5DFC; color:#fff; border-radius:6px; padding:4px 10px; }

.kwob-filters{ display:flex; align-items:center; gap:8px; padding:0 24px 12px; }
.kwob-filter-label{ font-size:10px; font-weight:600; color:#6B6C7E; margin-right:2px; }
.kwob-filter{ font-size:10px; font-weight:600; }
.kwob-filter-sky{ color:#38B0FF; }
.kwob-filter-bad{ color:#F3596B; }
.kwob-filter-ok{ color:#22C55E; }

.kwob-stage{ position:relative; min-height:340px; background:#F3F3FB; border-top:1px solid rgba(21,20,31,.05); border-radius:0 0 16px 16px; overflow:hidden; }
.kwob-view{ padding:24px; }
.kwob-view-list, .kwob-view-timeline{ position:absolute; inset:0; opacity:0; }
.kwob-view-board{ display:grid; grid-template-columns:repeat(5,1fr); gap:12px; position:relative; }

.kwob-col{ border-radius:12px; background:rgba(255,255,255,.6); border:1px solid rgba(21,20,31,.05); padding:12px; min-height:280px; }
.kwob-col-head{ display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; }
.kwob-col-tag{ font-size:11px; font-weight:700; padding:3px 8px; border-radius:6px; white-space:nowrap; }
.kwob-tag-sky{ background:rgba(56,176,255,.15); color:#38B0FF; }
.kwob-tag-ok{ background:rgba(34,197,94,.15); color:#22C55E; }
.kwob-tag-warn{ background:rgba(245,166,35,.15); color:#F5A623; }
.kwob-tag-bad{ background:rgba(243,89,107,.15); color:#F3596B; }
.kwob-tag-plum{ background:rgba(139,92,246,.15); color:#8B5CF6; }
.kwob-col-count{ font-family:'JetBrains Mono', monospace; font-size:10px; color:#6B6C7E; background:rgba(21,20,31,.05); border-radius:6px; width:20px; height:20px; display:flex; align-items:center; justify-content:center; }
.kwob-add-card{ font-size:10px; color:rgba(107,108,126,.7); font-weight:500; }

.kwob-cards{ display:flex; flex-direction:column; gap:10px; }
.kwob-card{ background:#fff; border-radius:8px; box-shadow:0 1px 2px rgba(21,20,31,.06), 0 1px 0 rgba(21,20,31,.03); overflow:hidden; }
.kwob-card-bar{ height:6px; }
.kwob-bar-ink{ background:rgba(21,20,31,.25); }
.kwob-bar-ok{ background:#22C55E; }
.kwob-bar-brand{ background:#6D5DFC; }
.kwob-bar-warn{ background:#F5A623; }
.kwob-card-body{ padding:10px; }
.kwob-card-body p{ font-size:11px; font-weight:600; line-height:1.4; margin:0; }
.kwob-card-meta{ display:flex; align-items:center; justify-content:space-between; margin-top:8px; font-size:9px; color:#6B6C7E; }
.kwob-avatar-sm{ width:16px; height:16px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:7px; font-weight:700; color:#fff; }

.kwob-source-card{ animation:kwobSourceFade 24s ease-in-out infinite; }
.kwob-travel-card{ position:absolute; top:52px; left:2%; width:19%; opacity:0; background:#fff; border-radius:8px; box-shadow:0 12px 32px -8px rgba(21,20,31,.18); border:2px solid rgba(109,93,252,.4); overflow:hidden; animation:kwobCardTravel 24s ease-in-out infinite; }

.kwob-list-panel{ background:#fff; border-radius:12px; box-shadow:0 1px 2px rgba(21,20,31,.06); height:100%; overflow:hidden; }
.kwob-list-row{ display:flex; align-items:center; gap:12px; padding:12px 16px; border-bottom:1px solid rgba(21,20,31,.05); }
.kwob-list-row p{ flex:1; min-width:0; font-size:12px; font-weight:600; margin:0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.kwob-list-dot{ width:8px; height:8px; border-radius:2px; flex-shrink:0; }
.kwob-list-tag{ font-size:10px; font-weight:600; padding:2px 8px; border-radius:6px; flex-shrink:0; }

.kwob-timeline-panel{ background:#fff; border-radius:12px; box-shadow:0 1px 2px rgba(21,20,31,.06); height:100%; padding:20px; display:flex; flex-direction:column; }
.kwob-timeline-dates{ display:flex; justify-content:space-between; font-family:'JetBrains Mono', monospace; font-size:9px; color:#6B6C7E; margin-bottom:12px; padding:0 4px; }
.kwob-timeline-rows{ flex:1; display:flex; flex-direction:column; justify-content:center; gap:12px; }
.kwob-timeline-row{ display:flex; align-items:center; gap:8px; }
.kwob-timeline-row p{ width:112px; flex-shrink:0; font-size:11px; font-weight:600; margin:0; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.kwob-timeline-track{ flex:1; height:14px; background:#F3F3FB; border-radius:6px; position:relative; overflow:hidden; }
.kwob-timeline-bar{ position:absolute; top:0; bottom:0; border-radius:6px; }

.kwob-toast{ display:flex; align-items:center; gap:8px; position:absolute; background:#fff; border-radius:12px; box-shadow:0 12px 32px -8px rgba(21,20,31,.18); border:1px solid rgba(21,20,31,.05); padding:10px 14px; width:max-content; opacity:0; z-index:3; }
.kwob-toast-moved{ right:-24px; top:64px; animation:kwobToastMoved 24s ease-in-out infinite; }
.kwob-toast-pilot{ right:-36px; top:160px; animation:kwobToastPilot 24s ease-in-out infinite; }
.kwob-toast-icon{ width:24px; height:24px; border-radius:6px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.kwob-toast-icon-ok{ background:rgba(34,197,94,.15); color:#22C55E; }
.kwob-toast-icon-brand{ background:rgba(109,93,252,.15); color:#6D5DFC; }
.kwob-toast span:last-child{ font-size:12px; font-weight:600; color:#15141F; white-space:nowrap; }

.kwob-float{ display:flex; align-items:center; gap:10px; position:absolute; left:-24px; bottom:-16px; background:#fff; border-radius:12px; box-shadow:0 12px 32px -8px rgba(21,20,31,.18); border:1px solid rgba(21,20,31,.05); padding:10px 14px; width:max-content; z-index:3; }
.kwob-float-delay{ animation:kwobFloaty 5s ease-in-out infinite; animation-delay:-2.5s; }
.kwob-float-name{ font-size:12px; font-weight:600; margin:0; color:#15141F; }
.kwob-float-text{ font-size:10px; color:#6B6C7E; margin:0; }

@keyframes kwobFloaty{ 0%,100%{ transform:translateY(0); } 50%{ transform:translateY(-10px); } }

@media (prefers-reduced-motion: reduce){
  .kwob-source-card, .kwob-travel-card, .kwob-toast-moved, .kwob-toast-pilot, .kwob-pilot-dot,
  .kwob-tab-board, .kwob-tab-list, .kwob-tab-timeline, .kwob-float-delay{ animation:none !important; }
  .kwob-travel-card, .kwob-toast-moved, .kwob-toast-pilot{ opacity:0; }
}

@keyframes kwobSourceFade{
  0%, 4.7%{ opacity:1; }
  6.7%, 26%{ opacity:0; }
  28.7%, 33.3%{ opacity:1; }
}
@keyframes kwobCardTravel{
  0%, 4%{ opacity:0; transform:translateY(0) scale(1); left:2%; }
  5.3%{ opacity:1; transform:translateY(0) scale(1.03); left:2%; }
  8.7%{ opacity:1; transform:translateY(-16px) scale(1.06); left:12%; }
  12%{ opacity:1; transform:translateY(0) scale(1.03); left:22%; }
  13.3%, 26%{ opacity:1; transform:translateY(0) scale(1); left:22%; }
  28%, 33.3%{ opacity:0; transform:translateY(0) scale(1); left:2%; }
}
@keyframes kwobToastMoved{
  0%, 10.7%{ opacity:0; transform:translateY(8px); }
  13.3%, 22%{ opacity:1; transform:translateY(0); }
  24.7%, 33.3%{ opacity:0; transform:translateY(8px); }
}
@keyframes kwobToastPilot{
  0%, 13.3%{ opacity:0; transform:translateY(8px); }
  16%, 24.7%{ opacity:1; transform:translateY(0); }
  27.3%, 33.3%{ opacity:0; transform:translateY(8px); }
}
@keyframes kwobPilotPulse{
  0%, 12%{ box-shadow:0 0 0 0 rgba(34,197,94,.55); }
  13.7%{ box-shadow:0 0 0 5px rgba(34,197,94,0); }
  15.3%, 33.3%{ box-shadow:0 0 0 0 rgba(34,197,94,0); }
}
@keyframes kwobViewBoard{ 0%, 31%{ opacity:1; } 36%, 97%{ opacity:0; } 100%{ opacity:1; } }
@keyframes kwobViewList{ 0%, 31%{ opacity:0; } 36%, 64%{ opacity:1; } 69%, 100%{ opacity:0; } }
@keyframes kwobViewTimeline{ 0%, 64%{ opacity:0; } 69%, 97%{ opacity:1; } 100%{ opacity:0; } }
@keyframes kwobTabBoard{ 0%, 32%{ background-color:#15141F; color:#fff; } 36%, 100%{ background-color:transparent; color:#6B6C7E; } }
@keyframes kwobTabList{ 0%, 32%{ background-color:transparent; color:#6B6C7E; } 36%, 65%{ background-color:#15141F; color:#fff; } 69%, 100%{ background-color:transparent; color:#6B6C7E; } }
@keyframes kwobTabTimeline{ 0%, 65%{ background-color:transparent; color:#6B6C7E; } 69%, 96%{ background-color:#15141F; color:#fff; } 100%{ background-color:transparent; color:#6B6C7E; } }

@media (prefers-reduced-motion: no-preference){
  .kwob-view-board{ animation:kwobViewBoard 24s ease-in-out infinite; }
  .kwob-view-list{ animation:kwobViewList 24s ease-in-out infinite; }
  .kwob-view-timeline{ animation:kwobViewTimeline 24s ease-in-out infinite; }
}

@media(max-width:640px){
  .kwob-toast, .kwob-float, .kwob-filters, .kwob-tabs, .kwob-invite{ display:none; }
  .kwob-view-board{ grid-template-columns:repeat(5,1fr); gap:6px; }
  .kwob-col{ min-height:150px; padding:6px; }
  .kwob-col-tag{ font-size:8px; padding:2px 4px; }
  .kwob-card-body{ padding:6px; }
  .kwob-card-body p{ font-size:8px; }
  .kwob-card-meta, .kwob-add-card{ display:none; }
  .kwob-stage{ min-height:180px; }
  .kwob-travel-card .kwob-card-meta{ display:none; }
}
</style>

<div class="kwob-wrap">
  <div class="kwob-blob kwob-blob-1" aria-hidden="true"></div>
  <div class="kwob-blob kwob-blob-2" aria-hidden="true"></div>
  <div class="kwob-blob kwob-blob-3" aria-hidden="true"></div>

  <div class="kwob-tilt kwob-frame" role="img" aria-label="Animated preview of the Orbit project board, cycling through Board, List, and Timeline views">
    <div class="kwob-chrome">
      <span class="kwob-dot kwob-dot-red"></span>
      <span class="kwob-dot kwob-dot-yellow"></span>
      <span class="kwob-dot kwob-dot-green"></span>
      <span class="kwob-url">orbit.app/b/brevo</span>
      <span class="kwob-chrome-spacer"></span>
      <span class="kwob-pilot-chip">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M13 2 3 14h7l-1 8 10-12h-7l1-8Z"/></svg>
        Pilot <span class="kwob-pilot-dot"></span>
      </span>
    </div>

    <div class="kwob-toolbar">
      <div class="kwob-toolbar-left">
        <p class="kwob-board-name">brevo
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-6.7-4.35-9.3-8.1C1 10.4 1.6 7 4.3 5.6 6.6 4.4 9 5 12 8c3-3 5.4-3.6 7.7-2.4C22.4 7 23 10.4 21.3 12.9 18.7 16.65 12 21 12 21Z"/></svg>
        </p>
        <div class="kwob-tabs">
          <span class="kwob-tab kwob-tab-board">Board</span>
          <span class="kwob-tab kwob-tab-list">List</span>
          <span class="kwob-tab kwob-tab-timeline">Timeline</span>
        </div>
      </div>
      <div class="kwob-toolbar-right">
        <div class="kwob-avatars">
          <span class="kwob-avatar kwob-avatar-ok">S</span>
          <span class="kwob-avatar kwob-avatar-warn">J</span>
        </div>
        <span class="kwob-invite">Invite</span>
      </div>
    </div>

    <div class="kwob-filters">
      <span class="kwob-filter-label">Filter:</span>
      <span class="kwob-filter kwob-filter-sky">Normal</span>
      <span class="kwob-filter kwob-filter-bad">Urgent</span>
      <span class="kwob-filter kwob-filter-ok">Low</span>
    </div>

    <div class="kwob-stage">
      <div class="kwob-view kwob-view-board">
        <div class="kwob-col">
          <div class="kwob-col-head"><span class="kwob-col-tag kwob-tag-sky">Backlog</span><span class="kwob-col-count">2</span></div>
          <div class="kwob-cards">
            <div class="kwob-card kwob-source-card">
              <div class="kwob-card-bar kwob-bar-ink"></div>
              <div class="kwob-card-body">
                <p>Welcome to Orbit — try dragging me to another list</p>
                <div class="kwob-card-meta"><span>No due date</span><span>0</span></div>
              </div>
            </div>
            <div class="kwob-card">
              <div class="kwob-card-bar kwob-bar-ok"></div>
              <div class="kwob-card-body">
                <p>Copy of Blog Page</p>
                <div class="kwob-card-meta"><span>No due date</span><span class="kwob-avatar-sm kwob-avatar-warn">J</span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="kwob-col">
          <div class="kwob-col-head"><span class="kwob-col-tag kwob-tag-ok">To Do</span><span class="kwob-col-count">2</span></div>
          <div class="kwob-cards">
            <div class="kwob-card">
              <div class="kwob-card-bar kwob-bar-brand"></div>
              <div class="kwob-card-body">
                <p>Taks Need to Do</p>
                <div class="kwob-card-meta"><span>No due date</span><span class="kwob-avatar-sm kwob-avatar-ok">S</span></div>
              </div>
            </div>
            <div class="kwob-card">
              <div class="kwob-card-bar kwob-bar-warn"></div>
              <div class="kwob-card-body">
                <p>Marketing Updates</p>
                <div class="kwob-card-meta"><span>No due date</span><span>0</span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="kwob-col">
          <div class="kwob-col-head"><span class="kwob-col-tag kwob-tag-warn">In Progress</span><span class="kwob-col-count">0</span></div>
          <p class="kwob-add-card">+ Add a card</p>
        </div>
        <div class="kwob-col">
          <div class="kwob-col-head"><span class="kwob-col-tag kwob-tag-bad">In Review</span><span class="kwob-col-count">0</span></div>
          <p class="kwob-add-card">+ Add a card</p>
        </div>
        <div class="kwob-col">
          <div class="kwob-col-head"><span class="kwob-col-tag kwob-tag-plum">Done</span><span class="kwob-col-count">0</span></div>
          <p class="kwob-add-card">+ Add a card</p>
        </div>

        <div class="kwob-travel-card">
          <div class="kwob-card-bar kwob-bar-ink"></div>
          <div class="kwob-card-body">
            <p>Welcome to Orbit — try dragging me to another list</p>
            <div class="kwob-card-meta"><span>No due date</span><span>0</span></div>
          </div>
        </div>
      </div>

      <div class="kwob-view kwob-view-list">
        <div class="kwob-list-panel">
          <div class="kwob-list-row"><span class="kwob-list-dot kwob-bar-ink"></span><p>Welcome to Orbit — try dragging me to another list</p><span class="kwob-list-tag kwob-tag-sky">Backlog</span></div>
          <div class="kwob-list-row"><span class="kwob-list-dot kwob-bar-ok"></span><p>Copy of Blog Page</p><span class="kwob-list-tag kwob-tag-sky">Backlog</span><span class="kwob-avatar-sm kwob-avatar-warn">J</span></div>
          <div class="kwob-list-row"><span class="kwob-list-dot kwob-bar-brand"></span><p>Taks Need to Do</p><span class="kwob-list-tag kwob-tag-ok">To Do</span><span class="kwob-avatar-sm kwob-avatar-ok">S</span></div>
          <div class="kwob-list-row"><span class="kwob-list-dot kwob-bar-warn"></span><p>Marketing Updates</p><span class="kwob-list-tag kwob-tag-ok">To Do</span></div>
        </div>
      </div>

      <div class="kwob-view kwob-view-timeline">
        <div class="kwob-timeline-panel">
          <div class="kwob-timeline-dates"><span>Aug 1</span><span>Aug 8</span><span>Aug 15</span><span>Aug 22</span><span>Aug 29</span></div>
          <div class="kwob-timeline-rows">
            <div class="kwob-timeline-row"><p>Welcome to Orbit</p><div class="kwob-timeline-track"><div class="kwob-timeline-bar kwob-bar-ink" style="left:2%;width:18%"></div></div></div>
            <div class="kwob-timeline-row"><p>Copy of Blog Page</p><div class="kwob-timeline-track"><div class="kwob-timeline-bar kwob-bar-ok" style="left:10%;width:30%"></div></div></div>
            <div class="kwob-timeline-row"><p>Taks Need to Do</p><div class="kwob-timeline-track"><div class="kwob-timeline-bar kwob-bar-brand" style="left:35%;width:25%"></div></div></div>
            <div class="kwob-timeline-row"><p>Marketing Updates</p><div class="kwob-timeline-track"><div class="kwob-timeline-bar kwob-bar-warn" style="left:55%;width:35%"></div></div></div>
          </div>
        </div>
      </div>
    </div>

    <div class="kwob-toast kwob-toast-moved">
      <span class="kwob-toast-icon kwob-toast-icon-ok"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg></span>
      <span>Card moved to To Do</span>
    </div>
    <div class="kwob-toast kwob-toast-pilot">
      <span class="kwob-toast-icon kwob-toast-icon-brand"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M13 2 3 14h7l-1 8 10-12h-7l1-8Z"/></svg></span>
      <span>Pilot notified the board</span>
    </div>
    <div class="kwob-float kwob-float-delay">
      <div class="kwob-avatar kwob-avatar-sky" style="margin-left:0;">MK</div>
      <div>
        <p class="kwob-float-name">Maya commented</p>
        <p class="kwob-float-text">"Looks great — shipping it"</p>
      </div>
    </div>
  </div>
</div>
