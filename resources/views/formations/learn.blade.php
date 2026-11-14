<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('images/logo-centre.png') }}">

<title>{{ $formation->name }} | CAD ACADEMY</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@0.462.0/dist/umd/lucide.min.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{
  --r:#E11D2E;
  --rd:#B3121F;
  --r50:#FEF2F3;
  --r100:#FDE3E5;
  --r200:#FAC5C9;
  --ink:#334155;
  --head:#0B1220;
  --muted:#64748B;
  --line:#E2E8F0;
  --bg:#F8FAFC;
  --ok:#059669;
  --ok-bg:#ECFDF5;
  --dark:#0B1220;
}

*{box-sizing:border-box}
html{scroll-behavior:smooth;scroll-padding-top:88px}

body{
  margin:0;color:var(--ink);background:var(--bg);
  font-family:'Inter','IBM Plex Sans Arabic',sans-serif;
  -webkit-font-smoothing:antialiased;line-height:1.6;
}
html[dir=rtl] body{font-family:'IBM Plex Sans Arabic','Inter',sans-serif;line-height:1.85}
html[dir=rtl] .flip{transform:scaleX(-1)}

:focus-visible{outline:3px solid rgba(225,29,46,.4);outline-offset:2px;border-radius:8px}
@media(prefers-reduced-motion:reduce){*{transition:none!important;animation:none!important;scroll-behavior:auto!important}}

.card{background:#fff;border:1px solid var(--line);border-radius:14px}
.sh{font-size:16px;font-weight:700;color:var(--head)}
.muted{color:var(--muted)}
.th{color:var(--head)}
.t-red{color:var(--r)}
.t-err{color:var(--rd)}

/* ===== Logo : CAD noir + ACADEMY rouge, gras ===== */
.brand-name{font-weight:800;font-size:20px;letter-spacing:.04em;line-height:1;white-space:nowrap;text-transform:uppercase;display:inline-flex;gap:6px}
.b-cad{color:var(--head)}
.b-acad{color:var(--r)}

/* ===== Header ===== */
.topbar{background:#fff;border-bottom:1px solid var(--line);position:sticky;top:0;z-index:40}
.tb-in{max-width:1440px;margin:0 auto;height:66px;padding-inline:clamp(14px,2.5vw,32px);display:flex;align-items:center;justify-content:space-between;gap:14px}
.brand{display:flex;align-items:center;gap:11px;min-width:0}
.brand img{width:34px;height:34px;object-fit:contain;flex-shrink:0}
.tb-r{display:flex;align-items:center;gap:14px;flex-shrink:0}

.lt{display:flex;padding:3px;border-radius:10px;background:#F1F5F9;border:1px solid var(--line)}
.lb{padding:5px 12px;border-radius:7px;font-size:12px;font-weight:700;color:var(--muted);cursor:pointer;transition:.15s}
.lb.on{background:#fff;color:var(--head);box-shadow:0 1px 3px rgba(15,23,42,.12)}

.avatar{width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;background:var(--head);overflow:hidden;text-decoration:none}

/* Anneau de progression */
.ring{position:relative;width:44px;height:44px;flex-shrink:0}
.ring svg{width:44px;height:44px;transform:rotate(-90deg)}
.rg-bg{fill:none;stroke:#E8EDF3;stroke-width:4}
.rg{fill:none;stroke:var(--r);stroke-width:4;stroke-linecap:round;stroke-dasharray:100.53;stroke-dashoffset:100.53;transition:stroke-dashoffset .6s ease}
.ring b{position:absolute;inset:0;display:grid;place-items:center;font-size:10.5px;font-weight:800;color:var(--head)}
.ring-wrap{display:flex;align-items:center;gap:10px}
.ring-wrap small{display:block;font-size:11px;color:var(--muted);line-height:1.2}
.ring-wrap strong{display:block;font-size:12.5px;color:var(--head);line-height:1.3}

.pbar{height:6px;border-radius:99px;background:#E8EDF3;overflow:hidden}
.pbar>div{height:100%;background:var(--r);border-radius:inherit;transition:width .5s ease}

/* ===== Disposition ===== */
.page{max-width:1440px;margin:0 auto;padding:22px clamp(14px,2.5vw,32px) 60px}
.crumbs{display:flex;align-items:center;flex-wrap:wrap;gap:8px;font-size:12.5px;color:var(--muted);margin-bottom:16px}
.crumbs a{color:var(--muted);text-decoration:none;font-weight:500}
.crumbs a:hover{color:var(--r)}
.crumbs .cur{color:var(--head);font-weight:600;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:40vw}

.lgrid{display:grid;gap:24px;grid-template-columns:minmax(0,1fr)}
@media(min-width:1100px){.lgrid{grid-template-columns:minmax(0,1fr) 380px;align-items:start}}
.gc{min-width:0;display:grid;gap:20px}

/* ===== Playlist (timeline) ===== */
.playlist{display:flex;flex-direction:column;overflow:hidden}
@media(min-width:1100px){.playlist{position:sticky;top:88px;max-height:calc(100vh - 108px)}}

.ph{padding:18px 20px 16px;border-bottom:1px solid var(--line)}
.ph .sh{display:flex;align-items:center;gap:8px}
.ph .count{font-size:12px;font-weight:700;color:var(--muted)}
.ph .count b{color:var(--r)}

.psearch{position:relative;display:block;margin-top:14px}
.psearch input{width:100%;padding:10px 14px 10px 38px;border-radius:10px;border:1px solid var(--line);background:#F8FAFC;font-size:13px;outline:none;color:var(--head);transition:.15s}
.psearch input:focus{border-color:var(--r);background:#fff;box-shadow:0 0 0 3px rgba(225,29,46,.1)}
html[dir=rtl] .psearch input{padding:10px 38px 10px 14px}
.psearch i{position:absolute;inset-inline-start:12px;top:50%;transform:translateY(-50%);color:var(--muted);pointer-events:none}

.pl{overflow-y:auto;max-height:60vh;padding:14px 12px;flex:1}
@media(min-width:1100px){.pl{max-height:none}}
.pl::-webkit-scrollbar{width:6px}
.pl::-webkit-scrollbar-thumb{background:#CBD5E1;border-radius:99px}

.li{position:relative;width:100%;text-align:start;display:flex;gap:14px;align-items:flex-start;padding:10px 10px 14px;border-radius:12px;border:1px solid transparent;background:transparent;cursor:pointer;transition:background .15s}
.li:hover{background:#F8FAFC}
.li.active{background:var(--r50)}
/* ligne de la timeline */
.li:not(:last-child)::before{content:"";position:absolute;inset-inline-start:29px;top:44px;bottom:-6px;width:2px;background:var(--line)}
.li.done:not(:last-child)::before{background:var(--ok)}

.lc{position:relative;z-index:1;width:38px;height:38px;border-radius:50%;background:#fff;border:2px solid var(--line);color:var(--muted);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:13px;font-weight:700;transition:.15s}
.lc .chk{display:none}
.li.active .lc{border-color:var(--r);color:var(--r);background:#fff;box-shadow:0 0 0 4px rgba(225,29,46,.12)}
.li.done .lc{background:var(--ok);border-color:var(--ok);color:#fff}
.li.done .lc .num{display:none}
.li.done .lc .chk{display:block}

.li-t{display:block;font-size:13.5px;font-weight:600;line-height:1.4;color:var(--head);padding-top:2px}
.li.active .li-t{color:var(--r)}
.tchip{display:inline-flex;align-items:center;gap:4px;font-size:11.5px;font-weight:500;color:var(--muted)}

.qlink{display:flex;align-items:center;justify-content:space-between;gap:8px;padding:15px 20px;border-top:1px solid var(--line);font-size:13px;font-weight:700;color:var(--head);transition:.15s}
.qlink:hover{background:var(--r50);color:var(--r)}

/* ===== Lecteur ===== */
.panel{display:none}
.panel.show{display:grid;gap:20px}

.stage{background:var(--dark);border-radius:14px;overflow:hidden;box-shadow:0 20px 40px -24px rgba(11,18,32,.6)}
.sbar{display:flex;flex-wrap:wrap;gap:6px;padding:10px 14px;background:#111A2C;border-bottom:1px solid #1E293B}
.seg-btn{display:inline-flex;align-items:center;gap:8px;padding:7px 15px;border-radius:8px;font-size:12px;font-weight:600;color:#CBD5E1;background:transparent;cursor:pointer;transition:.15s}
.seg-btn:hover{background:rgba(255,255,255,.08);color:#fff}
.seg-btn.on{background:var(--r);color:#fff}

.player video{display:block;width:100%;aspect-ratio:16/9;max-height:76vh;background:#000;object-fit:contain}
.player iframe{display:block;width:100%;aspect-ratio:16/9;max-height:76vh;border:0;background:#000}

.speedbar{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:10px;padding:10px 16px;background:#111A2C;font-size:12px;font-weight:500;color:#94A3B8}
.sp{padding:3px 11px;border-radius:7px;color:#CBD5E1;cursor:pointer;transition:.15s}
.sp:hover{color:#fff}
.sp.on{background:var(--r);color:#fff}

.srcbar{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:12px;padding:12px 16px;background:#111A2C;border-top:1px solid #1E293B}
.src-l{display:flex;align-items:center;gap:10px;min-width:0;flex:1}
.src-badge{display:inline-flex;align-items:center;gap:6px;flex-shrink:0;padding:4px 11px;border-radius:7px;background:rgba(225,29,46,.18);color:#FCA5AE;font-size:11.5px;font-weight:700}
.src-url{min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:12px;color:#94A3B8;direction:ltr;unicode-bidi:embed}
.src-link{display:inline-flex;align-items:center;gap:8px;flex-shrink:0;padding:8px 15px;border-radius:9px;background:var(--r);color:#fff;font-size:12.5px;font-weight:600;text-decoration:none;transition:.15s}
.src-link:hover{background:var(--rd)}

.tstage{background:#fff;border:1.5px dashed var(--line);color:var(--muted);padding:56px 20px;text-align:center;border-radius:14px}
.tstage i{color:var(--r)}

/* ===== Boutons ===== */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:11px 20px;border-radius:10px;font-size:13.5px;font-weight:600;cursor:pointer;border:1.5px solid transparent;font-family:inherit;text-decoration:none;transition:background .15s,color .15s,border-color .15s,box-shadow .15s}
.btn:disabled{cursor:not-allowed;opacity:.45}

.b-next,.b-glow,.b-req{background:var(--r);color:#fff;border-color:var(--r)}
.b-next:not(:disabled):hover,.b-glow:not(:disabled):hover,.b-req:not(:disabled):hover{background:var(--rd);border-color:var(--rd)}

.b-prev,.b-out{background:#fff;color:var(--head);border-color:var(--line)}
.b-prev:hover,.b-out:hover{border-color:var(--head)}

.mark{background:#fff;color:var(--head);border-color:var(--line)}
.mark:not(:disabled):hover{border-color:var(--ok);color:var(--ok);background:var(--ok-bg)}
.mark.is-done{background:var(--ok);color:#fff;border-color:var(--ok)}

.hint{font-size:12.5px;color:var(--rd);background:var(--r50);border:1px solid var(--r100);border-radius:10px;padding:9px 13px;font-weight:500}

/* ===== Carte de leçon ===== */
.lesson-head{display:flex;flex-wrap:wrap;align-items:flex-start;justify-content:space-between;gap:16px}
.lesson-pill{display:inline-flex;align-items:center;gap:6px;background:var(--r50);color:var(--r);font-size:11.5px;font-weight:700;padding:4px 12px;border-radius:7px}
.dur-pill{display:inline-flex;align-items:center;gap:6px;background:#F1F5F9;color:var(--muted);font-size:11.5px;font-weight:600;padding:4px 12px;border-radius:7px}

.tabs{display:flex;flex-wrap:wrap;gap:22px;border-bottom:1px solid var(--line);width:100%}
.tab{display:inline-flex;align-items:center;gap:8px;padding:10px 2px;margin-bottom:-1px;font-size:13.5px;font-weight:600;color:var(--muted);border-bottom:2px solid transparent;background:transparent;cursor:pointer;transition:.15s}
.tab:hover{color:var(--head)}
.tab.on{color:var(--r);border-bottom-color:var(--r)}

/* ===== PDF ===== */
.doc{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:14px;padding:16px 18px;border-radius:12px;border:1px solid var(--line);background:#F8FAFC}
.doc-ico{width:46px;height:46px;border-radius:12px;background:var(--r50);color:var(--r);display:flex;align-items:center;justify-content:center;flex-shrink:0}

/* ===== Cours écrit ===== */
.reader{border:1px solid var(--line);border-radius:12px;background:#fff;overflow:hidden;transition:border-color .2s}
.reader.open{border-color:var(--r200)}
.reader-toggle{width:100%;display:flex;align-items:center;gap:14px;padding:14px 16px;background:#F8FAFC;cursor:pointer;text-align:start;font-family:inherit;transition:background .15s}
.reader-toggle:hover{background:var(--r50)}
.reader.open .reader-toggle{background:var(--r50)}
.rt-ico{width:42px;height:42px;border-radius:11px;background:var(--r);color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.rt-txt{flex:1;min-width:0;display:flex;flex-direction:column}
.rt-txt b{font-size:14.5px;font-weight:700;color:var(--head);line-height:1.3}
.rt-txt small{font-size:12px;color:var(--muted);font-weight:500}
.rt-chev{width:32px;height:32px;border-radius:50%;background:#fff;color:var(--r);border:1px solid var(--line);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:transform .25s}
.reader.open .rt-chev{transform:rotate(180deg)}
.reader-body{padding:26px clamp(18px,4vw,44px) 34px;border-top:1px solid var(--line)}

.btn-sm{padding:7px 14px;font-size:12.5px;border-radius:9px}

.prose-lite{font-size:15.5px;line-height:1.9;color:var(--ink);overflow-wrap:anywhere}
.prose-lite h1,.prose-lite h2,.prose-lite h3{color:var(--head);font-weight:700;line-height:1.3;margin:1.7em 0 .6em;padding-inline-start:14px;border-inline-start:4px solid var(--r)}
.prose-lite h1{font-size:1.5em}
.prose-lite h2{font-size:1.28em}
.prose-lite h3{font-size:1.1em;border-inline-start-color:#F87181}
.prose-lite>:first-child{margin-top:0}
.prose-lite p{margin:.85em 0}
.prose-lite strong,.prose-lite b{color:var(--head);font-weight:700}
.prose-lite ul,.prose-lite ol{margin:.9em 0;padding-inline-start:1.6em}
.prose-lite ul{list-style:disc}
.prose-lite ol{list-style:decimal}
.prose-lite li{margin:.35em 0}
.prose-lite li::marker{color:var(--r);font-weight:700}
.prose-lite blockquote{margin:1.2em 0;padding:.9em 1.2em;border-inline-start:4px solid var(--r);background:var(--r50);border-radius:10px;color:var(--rd);font-weight:500}
.prose-lite code{background:#F1F5F9;color:var(--rd);padding:2px 7px;border-radius:6px;font-size:.9em;direction:ltr;unicode-bidi:embed}
.prose-lite pre{background:var(--dark);color:#E2E8F0;padding:16px 18px;border-radius:12px;overflow-x:auto;direction:ltr;text-align:left;border-top:3px solid var(--r)}
.prose-lite pre code{background:transparent;padding:0;color:inherit}
.prose-lite a{color:var(--r);text-decoration:underline;font-weight:600}
.prose-lite img{max-width:100%;height:auto;border-radius:12px}
.prose-lite table{width:100%;border-collapse:collapse;margin:1em 0;font-size:.95em}
.prose-lite th{background:var(--head);color:#fff;padding:9px 12px;text-align:start}
.prose-lite td{padding:9px 12px;border-bottom:1px solid var(--line)}

/* ===== Quiz ===== */
.quiz-box{border:1px solid var(--line);border-radius:12px;padding:16px 18px;background:#fff;display:flex;flex-wrap:wrap;align-items:center;gap:14px;transition:.2s}
.quiz-box:hover{border-color:var(--r200)}
.quiz-icon{width:44px;height:44px;border-radius:11px;background:var(--r50);color:var(--r);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.qs{display:inline-flex;align-items:center;gap:6px;padding:3px 10px;border-radius:7px;font-size:11.5px;font-weight:600}
.qs-ok{background:var(--ok-bg);color:var(--ok)}
.qs-ko{background:var(--r50);color:var(--r)}
.qs-no{background:#F1F5F9;color:var(--muted)}
.qcount{font-size:12px;font-weight:600;color:var(--muted);background:#F1F5F9;padding:3px 11px;border-radius:7px}

/* ===== Certificat ===== */
.ico-r{background:var(--r50);color:var(--r)}
.inp{width:100%;max-width:440px;padding:11px 15px;margin-bottom:12px;border-radius:10px;border:1px solid var(--line);background:#fff;font-family:inherit;font-size:14px;transition:.15s}
.inp:focus{outline:none;border-color:var(--r);box-shadow:0 0 0 3px rgba(225,29,46,.12)}

/* ===== Toast ===== */
.toast{position:fixed;left:50%;bottom:24px;z-index:95;max-width:min(90vw,440px);padding:12px 22px;border-radius:12px;background:var(--head);color:#fff;font-size:13px;font-weight:500;opacity:0;pointer-events:none;transform:translateX(-50%) translateY(14px);transition:.25s ease;border-inline-start:4px solid var(--r)}
.toast.show{opacity:1;transform:translateX(-50%) translateY(0)}

@media(max-width:640px){
  .brand-name{font-size:16px}
  .src-url{display:none}
  .ring-wrap small,.ring-wrap strong{display:none}
}
</style>
</head>

<body>

{{-- ===== Header ===== --}}
<header class="topbar">
 <div class="tb-in">

  <a href="{{ route('dashboard') }}" class="brand" style="text-decoration:none" aria-label="CAD ACADEMY">
   <img src="{{ asset('images/logo-centre.png') }}" alt="" onerror="this.style.display='none'">
   <span class="brand-name"><span class="b-cad">CAD</span><span class="b-acad">ACADEMY</span></span>
  </a>

  <div class="tb-r">
   <div class="ring-wrap">
    <div class="ring">
     <svg viewBox="0 0 40 40" aria-hidden="true"><circle class="rg-bg" cx="20" cy="20" r="16"/><circle id="ring" class="rg" cx="20" cy="20" r="16"/></svg>
     <b><span id="top-pct">0</span>%</b>
    </div>
    <div class="hidden md:block"><small data-i18n="progress">Progression</small><strong><span id="top-done">0</span> / {{ $lessonCount }} <span data-i18n="stat_lessons">leçons</span></strong></div>
   </div>

   <div class="lt">
    <button type="button" id="lang-fr" class="lb on" aria-label="Français">FR</button>
    <button type="button" id="lang-ar" class="lb" aria-label="العربية">عربي</button>
   </div>

   <a href="{{ $navProfile }}" class="avatar" aria-label="Mon profil">
    @if($profilePhotoUrl)
     <img src="{{ $profilePhotoUrl }}" alt="" style="width:100%;height:100%;object-fit:cover" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
     <span style="display:none;width:100%;height:100%;align-items:center;justify-content:center">{{ $initial }}</span>
    @else
     {{ $initial }}
    @endif
   </a>
  </div>

 </div>
</header>

<main class="page">

 <nav class="crumbs" aria-label="Fil d'Ariane">
  <a href="{{ route('dashboard') }}" data-i18n="crumb_home">Mes formations</a>
  <i data-lucide="chevron-right" class="w-3.5 h-3.5 flip"></i>
  <span class="cur">{{ $formation->name }}</span>
 </nav>

@if($lessonCount===0)

 <div class="max-w-3xl mx-auto py-16"><div class="card p-10 text-center">
  <div class="w-14 h-14 mx-auto rounded-2xl flex items-center justify-center mb-4 ico-r"><i data-lucide="video-off" class="w-7 h-7"></i></div>
  <h2 class="text-lg font-bold th" data-i18n="no_lesson">Aucune leçon disponible</h2>
  <p class="text-sm muted mt-2" data-i18n="no_lesson_sub">Les vidéos seront affichées ici dès qu'elles seront ajoutées.</p>
 </div></div>

@else

 <div class="lgrid">

  {{-- ===== Colonne principale ===== --}}
  <div class="gc">

   @foreach($lessons as $l)
   @php
    $first = $l['has_v1'] ? 'c' : 'p';
    $hasVideo = $l['has_v1'] || $l['has_v2'];
    $tabs = [];
    if($l['description']!=='') $tabs[]='desc';
    if($l['content_html']) $tabs[]='content';
    if($l['has_pdf']) $tabs[]='files';
   @endphp

   <section class="panel {{ $l['index']===0?'show':'' }}" data-panel="{{ $l['index'] }}" id="lecon-{{ $l['id'] }}">

    @if($hasVideo)
    <div class="stage">
     @if($l['has_v1'] && $l['has_v2'])
     <div class="sbar">
      <button type="button" class="seg-btn on" data-v="c"><i data-lucide="graduation-cap" class="w-4 h-4"></i><span data-i18n="video_course">Cours</span></button>
      <button type="button" class="seg-btn" data-v="p"><i data-lucide="wrench" class="w-4 h-4"></i><span data-i18n="video_practice">Pratique</span></button>
     </div>
     @endif

     @foreach([['c',$l['has_v1'],$l['v1_url']],['p',$l['has_v2'],$l['v2_url']]] as $vp)
      @if($vp[1])
      @php
       // YouTube / Vimeo => iframe ; sinon <video> (fichier uploadé ou lien direct .mp4)
       $src = (string) $vp[2];
       $embed = null;
       $provider = null;
       $openUrl = null;
       if (preg_match('~(?:youtube\.com/watch\?(?:[^"\s]*&)?v=|youtu\.be/|youtube\.com/embed/|youtube\.com/shorts/|youtube-nocookie\.com/embed/)([\w-]{11})~i', $src, $m)) {
           $embed = 'https://www.youtube.com/embed/'.$m[1].'?rel=0&modestbranding=1';
           $provider = 'youtube';
           $openUrl = 'https://www.youtube.com/watch?v='.$m[1];
       } elseif (preg_match('~vimeo\.com/(?:video/|channels/[^/]+/|groups/[^/]+/videos/)?(\d+)~i', $src, $m)) {
           $embed = 'https://player.vimeo.com/video/'.$m[1];
           $provider = 'vimeo';
           $openUrl = 'https://vimeo.com/'.$m[1];
       }
      @endphp
      <div class="vpane {{ $first===$vp[0]?'':'hidden' }}" data-v="{{ $vp[0] }}">
       <div class="player">
        @if($embed)
         <iframe src="{{ $embed }}" title="{{ $l['title'] }}" loading="lazy" allowfullscreen
                 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; fullscreen"
                 referrerpolicy="strict-origin-when-cross-origin"></iframe>
         <div class="srcbar">
          <div class="src-l">
           <span class="src-badge"><i data-lucide="{{ $provider==='youtube' ? 'youtube' : 'play-circle' }}" class="w-3.5 h-3.5"></i><span data-i18n="{{ $provider==='youtube' ? 'src_youtube' : 'src_vimeo' }}">{{ $provider==='youtube' ? 'YouTube' : 'Vimeo' }}</span></span>
           <span class="src-url" title="{{ $openUrl }}">{{ $openUrl }}</span>
          </div>
          <a href="{{ $openUrl }}" target="_blank" rel="noopener noreferrer" class="src-link"><i data-lucide="external-link" class="w-4 h-4"></i><span data-i18n="open_src">Ouvrir le lien</span></a>
         </div>
        @else
         <video controls playsinline preload="metadata" controlsList="nodownload" src="{{ $src }}"></video>
         <div class="speedbar">
          <span class="inline-flex items-center gap-2"><i data-lucide="gauge" class="w-4 h-4"></i><span data-i18n="speed">Vitesse</span></span>
          <div class="flex gap-1">
           @foreach([0.75,1,1.25,1.5,2] as $s)
            <button type="button" class="sp {{ $s==1?'on':'' }}" data-speed="{{ $s }}">{{ $s }}x</button>
           @endforeach
          </div>
         </div>
        @endif
       </div>
      </div>
      @endif
     @endforeach
    </div>
    @else
    <div class="tstage">
     <i data-lucide="video-off" class="w-9 h-9 mx-auto"></i>
     <p class="font-semibold mt-3" data-i18n="no_video">Pas de vidéo pour cette leçon.</p>
    </div>
    @endif

    <div class="card p-5 sm:p-7">

     <div class="lesson-head">
      <div class="min-w-0" style="flex:1 1 320px">
       <div class="flex flex-wrap items-center gap-2">
        <span class="lesson-pill"><i data-lucide="play-circle" class="w-3.5 h-3.5"></i><span><span data-i18n="lesson">Leçon</span> {{ $l['index']+1 }} / {{ $lessonCount }}</span></span>
        @if(!empty($l['duration']))
         <span class="dur-pill"><i data-lucide="clock" class="w-3.5 h-3.5"></i>{{ $l['duration'] }}</span>
        @endif
       </div>
       <h2 class="text-xl sm:text-2xl font-bold th mt-3 leading-tight" dir="auto">{{ $l['title'] }}</h2>
      </div>

      <button type="button" class="btn mark" data-index="{{ $l['index'] }}"><i data-lucide="check-circle-2" class="w-4 h-4"></i><span class="done-label" data-i18n="mark">Marquer comme terminée</span></button>
     </div>

     <p class="hint mark-hint hidden mt-4" data-i18n="watch_hint">Regardez la vidéo jusqu'à la fin pour pouvoir terminer cette leçon.</p>

     @if(count($tabs))
     <div class="mt-6">
      <div class="tabs" role="tablist">
       @if(in_array('desc',$tabs))<button type="button" role="tab" class="tab {{ $tabs[0]==='desc'?'on':'' }}" data-tab="desc"><i data-lucide="info" class="w-4 h-4"></i><span data-i18n="tab_desc">Description</span></button>@endif
       @if(in_array('content',$tabs))<button type="button" role="tab" class="tab {{ $tabs[0]==='content'?'on':'' }}" data-tab="content"><i data-lucide="book-open" class="w-4 h-4"></i><span data-i18n="tab_content">Cours écrit</span></button>@endif
       @if(in_array('files',$tabs))<button type="button" role="tab" class="tab {{ $tabs[0]==='files'?'on':'' }}" data-tab="files"><i data-lucide="paperclip" class="w-4 h-4"></i><span data-i18n="tab_files">Documents</span></button>@endif
      </div>

      <div class="pt-5">

       @if(in_array('desc',$tabs))
        <div data-tabpane="desc" class="{{ $tabs[0]==='desc'?'':'hidden' }}"><p class="prose-lite whitespace-pre-line">{{ $l['description'] }}</p></div>
       @endif

       @if(in_array('content',$tabs))
        <div data-tabpane="content" class="{{ $tabs[0]==='content'?'':'hidden' }}">
         <div class="reader">
          <button type="button" class="reader-toggle" data-read aria-expanded="false">
           <span class="rt-ico"><i data-lucide="book-open" class="w-5 h-5"></i></span>
           <span class="rt-txt">
            <b class="read-label" data-i18n="show_course">Afficher le cours</b>
            <small data-i18n="course_sub">Lisez le cours écrit de cette leçon</small>
           </span>
           <span class="rt-chev"><i data-lucide="chevron-down" class="w-5 h-5"></i></span>
          </button>
          <div class="reader-body hidden"><div class="prose-lite">{!! $l['content_html'] !!}</div></div>
         </div>
        </div>
       @endif

       @if(in_array('files',$tabs))
        <div data-tabpane="files" class="{{ $tabs[0]==='files'?'':'hidden' }}">
         <div class="doc">
          <div class="flex items-center gap-3 min-w-0">
           <div class="doc-ico"><i data-lucide="file-text" class="w-6 h-6"></i></div>
           <div class="min-w-0"><p class="font-semibold text-sm th truncate" dir="auto">{{ $l['pdf_name'] }}</p><p class="text-xs muted">PDF</p></div>
          </div>
          <div class="flex flex-wrap gap-2">
           <a href="{{ $l['pdf_view'] }}" target="_blank" rel="noopener noreferrer" class="btn b-out"><i data-lucide="eye" class="w-4 h-4"></i><span data-i18n="consult">Consulter</span></a>
           <a href="{{ $l['pdf_dl'] }}" class="btn b-glow"><i data-lucide="download" class="w-4 h-4"></i><span data-i18n="download">Télécharger</span></a>
          </div>
         </div>
        </div>
       @endif

      </div>
     </div>
     @endif

     <div class="mt-7 pt-5 border-t flex flex-wrap items-center justify-between gap-3" style="border-color:var(--line)">
      <button type="button" class="btn b-prev nav-prev"><i data-lucide="arrow-left" class="w-4 h-4 flip"></i><span data-i18n="prev">Précédente</span></button>
      <button type="button" class="btn b-next nav-next"><span data-i18n="next">Suivante</span><i data-lucide="arrow-right" class="w-4 h-4 flip"></i></button>
     </div>

    </div>
   </section>
   @endforeach

   {{-- ===== Quiz ===== --}}
   <section id="liste-quiz" class="card p-5 sm:p-7 scroll-mt-24">
    <h2 class="sh inline-flex items-center gap-2"><i data-lucide="clipboard-check" class="w-5 h-5 t-red"></i><span data-i18n="test">Quiz</span></h2>
    <p class="text-xs muted mt-1 mb-5" data-i18n="pass_rule">Il faut obtenir au moins 80 % pour réussir un quiz.</p>

    @forelse($quizzes as $q)
    <article class="quiz-box {{ !$loop->first ? 'mt-3' : '' }}">
     <div class="quiz-icon"><i data-lucide="help-circle" class="w-6 h-6"></i></div>
     <div class="min-w-0 flex-1">
      <div class="flex flex-wrap items-center gap-2">
       <h3 class="font-semibold text-sm sm:text-base th" dir="auto">{{ $q['title'] }}</h3>
       <span class="qcount">{{ $q['questions'] }} <span data-i18n="questions_label">questions</span></span>

       @if($q['questions']===0)
        <span class="qs qs-no" data-i18n="quiz_empty">Aucune question</span>
       @elseif($q['passed'])
        <span class="qs qs-ok"><i data-lucide="check" class="w-3.5 h-3.5"></i><span data-i18n="quiz_passed">Réussi</span></span>
       @elseif($q['attempts']>0)
        <span class="qs qs-ko"><i data-lucide="x" class="w-3.5 h-3.5"></i><span data-i18n="quiz_failed">À refaire</span></span>
       @else
        <span class="qs qs-no" data-i18n="quiz_none">Pas encore tenté</span>
       @endif
      </div>

      @if($q['attempts']>0)
       <p class="text-xs muted mt-1"><span data-i18n="best_score">Meilleur score :</span> <b class="th">{{ $q['best'] }}%</b> · {{ $q['attempts'] }} <span data-i18n="attempts">essai(s)</span></p>
      @endif
     </div>

     @if($q['questions']>0)
      <a href="{{ $q['url'] }}" class="btn b-glow w-full sm:w-auto"><i data-lucide="{{ $q['attempts']>0?'rotate-ccw':'play' }}" class="w-4 h-4"></i><span data-i18n="{{ $q['attempts']>0?'retry_quiz':'start_quiz' }}">{{ $q['attempts']>0?'Refaire le quiz':'Commencer le quiz' }}</span></a>
     @endif
    </article>
    @empty
     <p class="text-sm muted" data-i18n="no_quiz">Aucun quiz disponible pour le moment.</p>
    @endforelse
   </section>

   {{-- ===== Demande de certificat ===== --}}
   <section id="certificat" class="card p-5 sm:p-7 scroll-mt-24">
    <div class="flex items-start gap-4">
     <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 ico-r">
      <i data-lucide="award" class="w-6 h-6"></i>
     </div>
     <div class="min-w-0 flex-1">
      @if($certStatus === 'active')
       <h2 class="sh" data-i18n="cert_active_title">Votre certificat est activé</h2>
       <p class="text-sm muted mt-1" data-i18n="cert_active_text">L'administration a activé votre certificat.</p>
      @elseif($certStatus === 'pending')
       <h2 class="sh" data-i18n="cert_pending_title">Demande en attente</h2>
       <p class="text-sm muted mt-1" data-i18n="cert_pending_text">Votre demande a été envoyée à l'administration.</p>
      @else
       <h2 class="sh" id="cert-heading">Demander mon certificat</h2>
       <p class="text-sm muted mt-1" id="cert-text">Terminez toutes les leçons et réussissez les quiz pour envoyer votre demande.</p>

       <div class="mt-4">
        <div class="pbar"><div id="cert-fill" style="width:0%"></div></div>
        <p class="text-xs muted mt-1"><span id="cert-left">0</span> <span data-i18n="cert_left">étape(s) restante(s)</span></p>
       </div>

       @if(session('certificate_message'))
        <p class="mt-3 text-sm font-semibold t-red">{{ session('certificate_message') }}</p>
       @endif
       @if(session('error'))
        <p class="mt-3 text-sm font-semibold t-err">{{ session('error') }}</p>
       @endif
       @if($errors->any())
        <p class="mt-3 text-sm font-semibold t-err">{{ $errors->first() }}</p>
       @endif

       @if($certRoute)
        <form id="cert-request-form" action="{{ $certRoute }}" method="POST" class="mt-4">
         @csrf
         <label for="request-cert-name" class="block text-xs font-semibold mb-2 th" data-i18n="cert_fullname">Nom complet</label>
         <input type="text" id="request-cert-name" name="name_on_certificate"
                value="{{ old('name_on_certificate', $studentName) }}"
                minlength="2" maxlength="150" required class="inp">
         <div>
          <button type="submit" id="cert-request" disabled class="btn b-req !px-6 !py-3">
           <i data-lucide="send" class="w-4 h-4"></i>
           <span data-i18n="{{ $certStatus==='rejected'?'cert_retry':'cert_request' }}">{{ $certStatus==='rejected'?'Demander à nouveau':'Demander mon certificat' }}</span>
          </button>
         </div>
         <p id="cert-request-message" class="mt-2 text-sm muted" role="status"></p>
        </form>
       @else
        <p class="mt-3 text-sm t-err">La route de demande de certificat n'est pas configurée.</p>
       @endif
      @endif
     </div>
    </div>
   </section>

  </div>

  {{-- ===== Playlist (timeline) ===== --}}
  <aside class="card playlist" id="liste-lecons" aria-label="Playlist">

   <div class="ph">
    <div class="flex items-center justify-between gap-3">
     <h2 class="sh"><i data-lucide="list-video" class="w-5 h-5 t-red"></i><span data-i18n="playlist">Contenu du cours</span></h2>
     <span class="count"><b id="done-count">0</b> / {{ $lessonCount }}</span>
    </div>

    <div class="pbar mt-3"><div id="progress-fill" style="width:0%"></div></div>

    @if($lessonCount>8)
    <label class="psearch">
     <i data-lucide="search" class="w-4 h-4"></i>
     <input type="search" id="lesson-search" data-i18n-ph="search_ph" placeholder="Rechercher une leçon..." aria-label="Rechercher une leçon">
    </label>
    @endif
   </div>

   <div class="pl">
    @foreach($lessons as $l)
    <button type="button" class="li {{ $l['index']===0?'active':'' }}" data-go="{{ $l['index'] }}" data-title="{{ $l['title'] }}">
     <span class="lc"><span class="num">{{ $l['index']+1 }}</span><i data-lucide="check" class="chk w-4 h-4"></i></span>
     <span class="min-w-0 flex-1">
      <span class="li-t" dir="auto">{{ $l['title'] }}</span>
      <span class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1">
       @if($l['has_v1']||$l['has_v2'])<span class="tchip"><i data-lucide="play-circle" class="w-3.5 h-3.5"></i>{{ ($l['has_v1']&&$l['has_v2']) ? '2 ' : '' }}<span data-i18n="chip_video">Vidéo</span></span>@endif
       @if($l['has_text'])<span class="tchip"><i data-lucide="align-left" class="w-3.5 h-3.5"></i><span data-i18n="chip_text">Cours écrit</span></span>@endif
       @if($l['has_pdf'])<span class="tchip"><i data-lucide="file-text" class="w-3.5 h-3.5"></i>PDF</span>@endif
       @if(!empty($l['duration']))<span class="tchip"><i data-lucide="clock" class="w-3.5 h-3.5"></i>{{ $l['duration'] }}</span>@endif
      </span>
     </span>
    </button>
    @endforeach
   </div>

   <a href="#liste-quiz" class="qlink">
    <span class="inline-flex items-center gap-2"><i data-lucide="clipboard-check" class="w-4 h-4 t-red"></i><span data-i18n="test">Quiz</span> ({{ $quizzes->count() }})</span>
    <i data-lucide="chevron-down" class="w-4 h-4"></i>
   </a>

  </aside>

 </div>

@endif

</main>

<div id="toast" class="toast" role="status" aria-live="polite"></div>

<script>
const TOTAL={{ $lessonCount }},STORE='formation-{{ $formation->id }}';
const CERT_STATUS=@json($certStatus);
const COURSE_IDS=@json($lessons->pluck('id')->values());
const SERVER_DONE=@json($completedIds);
const QUIZ_IDS=@json($quizIds),PASSED_QUIZ_IDS=@json($passedIds);
const PROGRESS_URL=@json($progressUrl);
const CSRF_TOKEN=@json(csrf_token());
const RING_C=100.53;

const I18N={
fr:{
 progress:'Progression',crumb_home:'Mes formations',stat_lessons:'leçons',no_lesson:'Aucune leçon disponible',no_lesson_sub:"Les vidéos seront affichées ici dès qu'elles seront ajoutées.",
 playlist:'Contenu du cours',search_ph:'Rechercher une leçon...',chip_text:'Cours écrit',chip_video:'Vidéo',cert_side:'Certificat',
 video_course:'Cours',video_practice:'Pratique',speed:'Vitesse',no_video:'Pas de vidéo pour cette leçon.',
 src_youtube:'YouTube',src_vimeo:'Vimeo',open_src:'Ouvrir le lien',
 lesson:'Leçon',tab_desc:'Description',tab_content:'Cours écrit',tab_files:'Documents',consult:'Consulter',download:'Télécharger',
 written_course:'Cours écrit',show_course:'Afficher le cours',hide_course:'Masquer le cours',course_sub:'Lisez le cours écrit de cette leçon',
 watch_hint:"Regardez la vidéo jusqu'à la fin pour pouvoir terminer cette leçon.",prev:'Précédente',next:'Suivante',mark:'Marquer comme terminée',marked:'Terminée ✓',
 test:'Quiz',pass_rule:'Il faut obtenir au moins 80 % pour réussir un quiz.',questions_label:'questions',quiz_passed:'Réussi',quiz_failed:'À refaire',quiz_none:'Pas encore tenté',quiz_empty:'Aucune question',best_score:'Meilleur score :',attempts:'essai(s)',start_quiz:'Commencer le quiz',retry_quiz:'Refaire le quiz',no_quiz:'Aucun quiz disponible pour le moment.',
 cert_active_title:'Votre certificat est activé',cert_active_text:"L'administration a validé votre certificat. Vérifiez votre nom puis imprimez-le ou enregistrez-le en PDF.",cert_pending_title:'Demande en attente',cert_pending_text:"Votre demande a été envoyée. L'administration va l'étudier puis activer votre certificat.",
 locked_title:'Certificat verrouillé',locked_text:"Terminez toutes les leçons et réussissez les quiz pour pouvoir demander votre certificat.",ready_title:'Formation terminée !',ready_text:"Envoyez votre demande : l'administration l'étudiera puis activera votre certificat.",rejected_title:'Demande refusée',rejected_text:'Votre dernière demande a été refusée. Vous pouvez en envoyer une nouvelle.',
 cert_left:'étape(s) restante(s)',cert_name_label:'Nom à afficher sur le certificat',cert_fullname:'Nom complet sur le certificat',cert_request:'Demander mon certificat',cert_retry:'Demander à nouveau',cert_view:'Voir mon certificat',cert_print:'Imprimer / Enregistrer en PDF',close:'Fermer',
 c_overline:'CERTIFICAT OFFICIEL',c_title:'Certificat de réussite',c_sub:'Ce certificat est fièrement décerné à',c_sub2:'pour avoir complété avec succès la formation',c_date_l:'Date de délivrance',c_sign_l:'Direction pédagogique',locale:'fr-FR',
 missing_lessons:'Il reste {n} leçon(s) à terminer.',missing_quizzes:'Il reste {n} quiz à réussir.',form_incomplete:'Terminez toutes les leçons et les quiz, puis saisissez votre nom complet.',name_required:'Saisissez votre nom complet (2 caractères minimum).',sending:'Envoi de votre demande...',progress_error:"Impossible d'enregistrer la progression. Réessayez.",progress_noroute:'La route « lesson-progress.update » est introuvable : progression non enregistrée.'
},
ar:{
 progress:'التقدم',crumb_home:'تكويناتي',stat_lessons:'دروس',no_lesson:'لا توجد دروس متاحة',no_lesson_sub:'ستظهر الفيديوهات هنا بمجرد إضافتها.',
 playlist:'محتوى الدورة',search_ph:'ابحث عن درس...',chip_text:'درس مكتوب',chip_video:'فيديو',cert_side:'الشهادة',
 video_course:'الدرس',video_practice:'تطبيق',speed:'السرعة',no_video:'لا يوجد فيديو لهذا الدرس.',
 src_youtube:'YouTube',src_vimeo:'Vimeo',open_src:'فتح الرابط',
 lesson:'الدرس',tab_desc:'الوصف',tab_content:'الدرس المكتوب',tab_files:'المستندات',consult:'اطّلاع',download:'تحميل',
 written_course:'الدرس المكتوب',show_course:'إظهار الدرس',hide_course:'إخفاء الدرس',course_sub:'اقرأ الدرس المكتوب لهذه الحصة',
 watch_hint:'شاهد الفيديو حتى النهاية لتتمكن من إنهاء هذا الدرس.',prev:'السابق',next:'التالي',mark:'تحديد الدرس كمكتمل',marked:'مكتمل ✓',
 test:'اختبارات',pass_rule:'يجب الحصول على 80% على الأقل للنجاح في الاختبار.',questions_label:'أسئلة',quiz_passed:'ناجح',quiz_failed:'يجب إعادته',quiz_none:'لم يُجرَ بعد',quiz_empty:'لا توجد أسئلة',best_score:'أفضل نتيجة:',attempts:'محاولة',start_quiz:'ابدأ الاختبار',retry_quiz:'أعد الاختبار',no_quiz:'لا توجد اختبارات حاليًا.',
 cert_active_title:'شهادتك مفعّلة',cert_active_text:'صادقت الإدارة على شهادتك. تحقق من اسمك ثم اطبعها أو احفظها بصيغة PDF.',cert_pending_title:'الطلب قيد الانتظار',cert_pending_text:'تم إرسال طلبك. ستدرسه الإدارة ثم تفعّل شهادتك.',
 locked_title:'الشهادة مقفلة',locked_text:'أكمل جميع الدروس وانجح في الاختبارات لتتمكن من طلب شهادتك.',ready_title:'أنهيت التكوين!',ready_text:'أرسل طلبك: ستدرسه الإدارة ثم تفعّل شهادتك.',rejected_title:'تم رفض الطلب',rejected_text:'تم رفض طلبك الأخير. يمكنك إرسال طلب جديد.',
 cert_left:'خطوة متبقية',cert_name_label:'الاسم الذي سيظهر على الشهادة',cert_fullname:'الاسم الكامل على الشهادة',cert_request:'طلب شهادتي',cert_retry:'إعادة الطلب',cert_view:'عرض شهادتي',cert_print:'طباعة / حفظ PDF',close:'إغلاق',
 c_overline:'شهادة نجاح رسمية',c_title:'شهادة نجاح',c_sub:'تُمنح هذه الشهادة بكل فخر إلى',c_sub2:'لإتمام التكوين بنجاح',c_date_l:'تاريخ الإصدار',c_sign_l:'الإدارة البيداغوجية',locale:'ar-MA',
 missing_lessons:'بقي {n} درس(دروس) لإكماله.',missing_quizzes:'بقي {n} اختبار(ات) للنجاح فيه.',form_incomplete:'أكمل جميع الدروس والاختبارات ثم أدخل اسمك الكامل.',name_required:'أدخل اسمك الكامل (حرفان على الأقل).',sending:'جارٍ إرسال طلبك...',progress_error:'تعذر حفظ التقدم. حاول مرة أخرى.',progress_noroute:'المسار « lesson-progress.update » غير موجود: لم يتم حفظ التقدم.'
}};

let lang='fr',current=0,done=[],saving=false,toastTimer=null,sending=false;
const $=id=>document.getElementById(id);
const save=(k,v)=>{try{localStorage.setItem(STORE+k,JSON.stringify(v))}catch(e){}};
const load=(k,d)=>{try{const v=localStorage.getItem(STORE+k);return v?JSON.parse(v):d}catch(e){return d}};
const fmt=(s,n)=>String(s).replace('{n}',n);

const remainingLessons=()=>Math.max(0,TOTAL-done.length);
const remainingQuizzes=()=>QUIZ_IDS.filter(id=>!PASSED_QUIZ_IDS.includes(id)).length;
const eligible=()=>TOTAL>0&&remainingLessons()===0&&remainingQuizzes()===0;

function missingText(){
 const t=I18N[lang],p=[],l=remainingLessons(),q=remainingQuizzes();
 if(l>0)p.push(fmt(t.missing_lessons,l));
 if(q>0)p.push(fmt(t.missing_quizzes,q));
 return p.join(' ');
}
function showNote(msg){
 const el=$('toast');if(!el||!msg)return;
 el.textContent=msg;el.classList.add('show');
 clearTimeout(toastTimer);toastTimer=setTimeout(()=>el.classList.remove('show'),4200);
}
function syncDoneFromIds(ids){
 const set=new Set((ids||[]).map(Number));
 done=[];COURSE_IDS.forEach((id,i)=>{if(set.has(Number(id)))done.push(i);});
}
function validateCertForm(){
 const form=$('cert-request-form');if(!form)return false;
 const btn=$('cert-request'),inp=$('request-cert-name'),msg=$('cert-request-message'),t=I18N[lang];
 const nameOk=!!inp&&inp.value.trim().length>=2,ok=eligible()&&nameOk;
 if(btn)btn.disabled=sending||!ok;
 if(msg){
  if(sending)msg.textContent=t.sending;
  else if(!eligible())msg.textContent=missingText();
  else if(!nameOk)msg.textContent=t.name_required;
  else msg.textContent='';
 }
 return ok;
}
// Une leçon avec une vidéo fichier ne peut être terminée qu'après l'avoir regardée.
// Les vidéos YouTube / Vimeo (iframe) ne sont pas contrôlées : le bouton reste actif.
function lessonReady(i){
 if(done.includes(i))return true;
 const p=document.querySelector('.panel[data-panel="'+i+'"]');if(!p)return true;
 const vids=p.querySelectorAll('video');
 return !vids.length||[...vids].every(v=>v.dataset.watched==='1');
}
function refreshMark(){
 document.querySelectorAll('.mark').forEach(b=>{
  const ok=lessonReady(Number(b.dataset.index));
  b.disabled=saving||!ok;
  const h=b.closest('.panel').querySelector('.mark-hint');if(h)h.classList.toggle('hidden',ok);
 });
}
function refreshDone(){
 const t=I18N[lang],n=done.length,pct=TOTAL?Math.round(n/TOTAL*100):0;
 if($('done-count'))$('done-count').textContent=n;
 if($('top-done'))$('top-done').textContent=n;
 if($('progress-fill'))$('progress-fill').style.width=pct+'%';
 if($('top-pct'))$('top-pct').textContent=pct;
 if($('ring'))$('ring').style.strokeDashoffset=String(RING_C*(1-pct/100));
 document.querySelectorAll('.mark').forEach(b=>{
  const d=done.includes(Number(b.dataset.index)),lab=b.querySelector('.done-label');
  b.classList.toggle('is-done',d);b.setAttribute('aria-pressed',d?'true':'false');
  if(lab){lab.dataset.i18n=d?'marked':'mark';lab.textContent=t[d?'marked':'mark'];}
 });
 document.querySelectorAll('.li[data-go]').forEach(b=>b.classList.toggle('done',done.includes(Number(b.dataset.go))));
 const h=$('cert-heading');
 if(h){
  let ti,tx;
  if(!eligible()){ti=t.locked_title;tx=t.locked_text+' '+missingText();}
  else if(CERT_STATUS==='rejected'){ti=t.rejected_title;tx=t.rejected_text;}
  else{ti=t.ready_title;tx=t.ready_text;}
  h.textContent=ti;if($('cert-text'))$('cert-text').textContent=tx;
  const total=TOTAL+QUIZ_IDS.length,left=remainingLessons()+remainingQuizzes();
  if($('cert-fill'))$('cert-fill').style.width=(total?Math.round((total-left)/total*100):0)+'%';
  if($('cert-left'))$('cert-left').textContent=left;
 }
 validateCertForm();refreshMark();
}
async function markLesson(i){
 if(saving||done.includes(i)||!lessonReady(i))return;
 const t=I18N[lang];
 if(!PROGRESS_URL){showNote(t.progress_noroute);return;}
 saving=true;refreshMark();
 try{
  const res=await fetch(PROGRESS_URL.replace('__COURS_ID__',encodeURIComponent(COURSE_IDS[i])),{
   method:'POST',
   headers:{'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':CSRF_TOKEN,'X-Requested-With':'XMLHttpRequest'},
   credentials:'same-origin',body:JSON.stringify({completed:true})
  });
  let data={};try{data=await res.json();}catch(e){}
  if(!res.ok||(data&&data.success===false))throw new Error((data&&data.message)||'');
  const ids=data.completed_ids||data.completedIds;
  if(Array.isArray(ids))syncDoneFromIds(ids);else if(!done.includes(i))done.push(i);
 }catch(e){showNote((e&&e.message)||I18N[lang].progress_error);}
 finally{saving=false;refreshDone();}
}
function setupCertificateRequest(){
 const form=$('cert-request-form');if(!form)return;
 const btn=$('cert-request'),inp=$('request-cert-name'),msg=$('cert-request-message');
 if(!btn||!inp)return;
 inp.addEventListener('input',validateCertForm);
 form.addEventListener('submit',e=>{
  if(!validateCertForm()){e.preventDefault();if(msg)msg.textContent=I18N[lang].form_incomplete;return;}
  sending=true;btn.disabled=true;
  const sp=btn.querySelector('span');if(sp){sp.removeAttribute('data-i18n');sp.textContent=I18N[lang].sending;}
  if(msg)msg.textContent=I18N[lang].sending;
 });
 validateCertForm();
}
function setLang(l){
 lang=l;save('-lang',l);
 document.documentElement.lang=l;document.documentElement.dir=l==='ar'?'rtl':'ltr';
 document.querySelectorAll('[data-i18n]').forEach(e=>{const v=I18N[l][e.dataset.i18n];if(v)e.textContent=v;});
 document.querySelectorAll('[data-i18n-ph]').forEach(e=>{const v=I18N[l][e.dataset.i18nPh];if(v)e.placeholder=v;});
 if(sending){const sp=document.querySelector('#cert-request span');if(sp)sp.textContent=I18N[l].sending;}
 $('lang-fr').classList.toggle('on',l==='fr');$('lang-ar').classList.toggle('on',l==='ar');
 refreshDone();
}

// Arrête la lecture des vidéos YouTube / Vimeo (iframe) en rechargeant leur source
function stopEmbeds(scope){
 (scope||document).querySelectorAll('iframe').forEach(f=>{
  const s=f.getAttribute('src');if(s){f.setAttribute('src',s);}
 });
}

function go(i,scroll){
 if(i<0||i>=TOTAL)return;
 closeReaders();
 document.querySelectorAll('video').forEach(v=>v.pause());
 if(i!==current)stopEmbeds(document.querySelector('.panel[data-panel="'+current+'"]'));
 current=i;save('-current',i);
 document.querySelectorAll('.panel').forEach(p=>p.classList.toggle('show',Number(p.dataset.panel)===i));
 const items=document.querySelectorAll('.li[data-go]');
 items.forEach(b=>b.classList.toggle('active',Number(b.dataset.go)===i));
 const act=document.querySelector('.li[data-go="'+i+'"]');
 if(act&&act.scrollIntoView)act.scrollIntoView({block:'nearest'});
 if(scroll)window.scrollTo({top:0,behavior:'smooth'});
}

/* ---------- Lecteur du cours écrit ---------- */
function setReaderLabel(r,open){
 const lab=r.querySelector('.read-label');if(!lab)return;
 lab.dataset.i18n=open?'hide_course':'show_course';
 lab.textContent=I18N[lang][open?'hide_course':'show_course'];
}
function closeReaders(){
 document.querySelectorAll('.reader.open').forEach(r=>{
  r.classList.remove('open');
  r.querySelector('.reader-body').classList.add('hidden');
  r.querySelector('[data-read]').setAttribute('aria-expanded','false');
  setReaderLabel(r,false);
 });
}

document.addEventListener('DOMContentLoaded',()=>{
 if(window.lucide)lucide.createIcons();
 $('lang-fr').onclick=()=>setLang('fr');
 $('lang-ar').onclick=()=>setLang('ar');
 syncDoneFromIds(SERVER_DONE);

 document.querySelectorAll('[data-go]').forEach(b=>b.addEventListener('click',()=>go(Number(b.dataset.go),true)));
 document.querySelectorAll('.nav-prev').forEach(b=>b.addEventListener('click',()=>go(current-1,true)));
 document.querySelectorAll('.nav-next').forEach(b=>b.addEventListener('click',()=>go(current+1,true)));
 document.querySelectorAll('.mark').forEach(b=>b.addEventListener('click',()=>markLesson(Number(b.dataset.index))));

 document.querySelectorAll('[data-read]').forEach(b=>b.addEventListener('click',()=>{
  const r=b.closest('.reader'),open=!r.classList.contains('open');
  r.classList.toggle('open',open);
  r.querySelector('.reader-body').classList.toggle('hidden',!open);
  b.setAttribute('aria-expanded',open?'true':'false');
  setReaderLabel(r,open);
 }));

 document.querySelectorAll('.panel').forEach(p=>{
  const tabs=p.querySelectorAll('.tab');
  tabs.forEach(t=>t.addEventListener('click',()=>{
   tabs.forEach(x=>x.classList.remove('on'));t.classList.add('on');
   p.querySelectorAll('[data-tabpane]').forEach(x=>x.classList.toggle('hidden',x.dataset.tabpane!==t.dataset.tab));
  }));

  const segs=p.querySelectorAll('.seg-btn');
  segs.forEach(s=>s.addEventListener('click',()=>{
   p.querySelectorAll('video').forEach(v=>v.pause());
   stopEmbeds(p);
   segs.forEach(x=>x.classList.remove('on'));s.classList.add('on');
   p.querySelectorAll('.vpane').forEach(x=>x.classList.toggle('hidden',x.dataset.v!==s.dataset.v));
  }));

  p.querySelectorAll('.player').forEach(pl=>{
   const v=pl.querySelector('video');
   pl.querySelectorAll('.sp').forEach(b=>b.addEventListener('click',()=>{
    if(v)v.playbackRate=Number(b.dataset.speed);
    pl.querySelectorAll('.sp').forEach(x=>x.classList.remove('on'));b.classList.add('on');
   }));
   if(v){
    const watched=()=>{if(v.dataset.watched!=='1'){v.dataset.watched='1';refreshMark();}};
    v.addEventListener('ended',watched);
    v.addEventListener('timeupdate',()=>{if(v.duration>0&&v.currentTime/v.duration>=0.9)watched();});
   }
  });
 });

 const q=$('lesson-search');
 if(q)q.addEventListener('input',()=>{
  const v=q.value.trim().toLowerCase();
  document.querySelectorAll('.li[data-go]').forEach(b=>{b.style.display=!v||b.textContent.toLowerCase().includes(v)?'':'none'});
 });

 setupCertificateRequest();
 const sl=Number(load('-current',0));
 current=sl>=0&&sl<TOTAL?sl:0;
 setLang(load('-lang','fr'));
 if(TOTAL>0)go(current,false);
 refreshDone();
});
</script>

</body>
</html>