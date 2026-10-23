<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $formation->name }} | ÉtudeEnLigne</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@0.462.0/dist/umd/lucide.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&family=Great+Vibes&display=swap" rel="stylesheet">
<style>
:root{
  --g:#10B981;
  --gd:#059669;
  --g0:#022c22;
  --g00:#011e17;
  --soft:#ECFDF5;
  --soft-hover:#D1FAE5;
  --line:#E2E8F0;
  --ink:#334155;
  --head:#0F172A;
  --muted:#64748B;
  --bg:#F4F7FB;
  --gold:#c69a43;
  --sbw:260px;
}
*{box-sizing:border-box}
html{scroll-behavior:smooth;scroll-padding-top:84px}
body{
  margin:0;
  color:var(--ink);
  font-family:'Plus Jakarta Sans','IBM Plex Sans Arabic',sans-serif;
  -webkit-font-smoothing:antialiased;
  line-height:1.6;
  background:var(--bg);
}
html[dir=rtl] body{font-family:'IBM Plex Sans Arabic','Plus Jakarta Sans',sans-serif;line-height:1.85}
html[dir=rtl] .flip{transform:scaleX(-1)}
:focus-visible{outline:2.5px solid var(--g);outline-offset:2px;border-radius:10px}

/* ===== Cartes & Typographie ===== */
.card{
  background:#fff;
  border:1px solid #E5EBF1;
  border-radius:20px;
  box-shadow:0 1px 3px rgba(15,23,42,.02),0 10px 25px -15px rgba(15,23,42,.06);
}
.sh{font-size:16px;font-weight:800;color:var(--head);letter-spacing:-.015em}
.muted{color:var(--muted)}
.th{color:var(--head)}
.ta{color:var(--gd)}

/* ===== Barre latérale (Sidebar) ===== */
.side{
  position:fixed;
  inset-block:0;
  inset-inline-start:0;
  z-index:50;
  width:var(--sbw);
  display:flex;
  flex-direction:column;
  background:#022820;
  color:#D1FAE5;
  transform:translateX(-100%);
  transition:transform .28s cubic-bezier(0.4,0,0.2,1);
  overflow-y:auto;
}
html[dir=rtl] .side{transform:translateX(100%)}
.side.open,html[dir=rtl] .side.open{transform:none}
.side-brand{
  display:flex;
  align-items:center;
  gap:12px;
  padding:24px 20px 20px;
  color:#fff;
  text-decoration:none;
}
.side-brand .lg{
  width:42px;
  height:42px;
  border-radius:12px;
  background:var(--g);
  display:flex;
  align-items:center;
  justify-content:center;
  color:#fff;
  box-shadow:0 4px 12px rgba(16,185,129,.35);
  flex-shrink:0;
}
.side nav{display:flex;flex-direction:column;gap:5px;padding:8px 14px}
.sl{
  display:flex;
  align-items:center;
  gap:12px;
  padding:11px 16px;
  border-radius:14px;
  font-size:13.5px;
  font-weight:600;
  color:rgba(209,250,229,.78);
  transition:all .18s ease;
  text-decoration:none;
}
.sl:hover{background:rgba(255,255,255,.07);color:#fff}
.sl.on{
  background:var(--g);
  color:#fff;
  font-weight:700;
  box-shadow:0 4px 14px rgba(16,185,129,.3);
}
.side-quote{
  margin:auto 14px 18px;
  padding:18px 16px;
  border-radius:18px;
  background:rgba(255,255,255,.05);
  border:1px solid rgba(255,255,255,.08);
  text-align:center;
  color:#fff;
}
.side-quote p{font-size:12.5px;font-weight:600;line-height:1.55;margin:10px 0 12px;color:rgba(236,253,245,.9)}
.side-quote .tr{height:6px;border-radius:99px;background:rgba(255,255,255,.14);overflow:hidden;margin-bottom:6px}
.side-quote .tr>div{height:100%;background:var(--g);border-radius:inherit;transition:width .5s}
.side-quote small{display:block;font-size:11px;color:rgba(209,250,229,.7);margin-bottom:12px}
.side-ov{position:fixed;inset:0;z-index:45;background:rgba(15,23,42,.5);backdrop-filter:blur(2px);display:none}
.side-ov.show{display:block}
@media(min-width:1024px){.side{transform:none!important}body{padding-inline-start:var(--sbw)}.burger{display:none!important}}

/* ===== Barre du haut (Topbar) ===== */
.topbar{
  background:rgba(255,255,255,.92);
  backdrop-filter:blur(10px);
  -webkit-backdrop-filter:blur(10px);
  border-bottom:1px solid var(--line);
  position:sticky;
  top:0;
  z-index:40;
}
.tb-in{height:70px;padding-inline:clamp(14px,2.5vw,36px);display:flex;align-items:center;justify-content:space-between;gap:16px}
.burger{
  display:inline-flex;width:40px;height:40px;align-items:center;justify-content:center;
  border-radius:12px;border:1px solid var(--line);background:#fff;color:var(--head);flex-shrink:0;cursor:pointer
}
.srch{position:relative;flex:1;max-width:480px}
.srch input{
  width:100%;padding:10px 18px 10px 42px;border-radius:999px;border:1px solid #E2E8F0;
  background:#F8FAFC;font-size:13.5px;outline:none;transition:.2s;color:var(--head)
}
html[dir=rtl] .srch input{padding:10px 42px 10px 18px}
.srch input:focus{border-color:var(--g);background:#fff;box-shadow:0 0 0 4px rgba(16,185,129,.12)}
.srch i{position:absolute;inset-inline-start:15px;top:50%;transform:translateY(-50%);color:#94A3B8;pointer-events:none}
.lt{display:flex;padding:3px;border-radius:999px;background:#F1F5F9;border:1px solid #E2E8F0}
.lb{padding:5px 12px;border-radius:999px;font-size:12px;font-weight:700;color:#64748B;transition:.18s;cursor:pointer}
.lb.on{background:#fff;color:var(--gd);box-shadow:0 1px 3px rgba(0,0,0,.08)}
.avatar{
  width:38px;height:38px;border-radius:50%;display:flex;align-items:center;
  justify-content:center;font-weight:800;color:#fff;background:linear-gradient(135deg,var(--g),var(--gd));
  box-shadow:0 2px 8px rgba(16,185,129,.35)
}

/* ===== Page & Grille 3 Colonnes ===== */
.page{max-width:1620px;margin:0 auto;padding:18px clamp(14px,2.2vw,32px) 36px}
.bc{display:flex;flex-wrap:wrap;align-items:center;gap:8px;font-size:13px;color:#94A3B8;margin-bottom:14px;font-weight:500}
.bc a{color:#64748B;text-decoration:none;transition:color .18s}
.bc a:hover{color:var(--gd)}
.bc .cur{color:var(--head);font-weight:600}

/* En-tête de la formation */
.fh{display:flex;flex-wrap:wrap;align-items:center;gap:20px;padding:22px 24px}
.fh-ic{
  width:78px;height:78px;border-radius:18px;background:#033A2B;color:#34D399;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:inset 0 0 0 1px rgba(255,255,255,.08)
}
.fh h1{margin:0;font-size:clamp(20px,2.3vw,26px);font-weight:800;color:var(--head);letter-spacing:-.025em;line-height:1.25}
.fh-meta{display:flex;flex-wrap:wrap;gap:8px 22px;margin-top:10px;font-size:13px;color:#64748B;font-weight:500}
.fh-meta span{display:inline-flex;align-items:center;gap:7px}

/* Grille principale inspirée de la référence */
.lgrid{display:grid;gap:22px;margin-top:22px;grid-template-columns:minmax(0,1fr);grid-template-areas:"center" "prog" "right"}
.gp{grid-area:prog}
.gc{grid-area:center;min-width:0}
.gr{grid-area:right;display:grid;gap:20px;grid-template-columns:repeat(auto-fit,minmax(270px,1fr));align-content:start}

@media(min-width:1200px){
  .lgrid{grid-template-columns:310px minmax(0,1fr);grid-template-areas:"prog center" "right right"}
}
@media(min-width:1440px){
  .lgrid{grid-template-columns:320px minmax(0,1fr) 310px;grid-template-areas:"prog center right"}
  .gr{grid-template-columns:minmax(0,1fr)}
}

/* ===== Colonne de gauche (Contenu) ===== */
.program{overflow:hidden;display:flex;flex-direction:column}
@media(min-width:1200px){.program{position:sticky;top:88px;max-height:calc(100vh - 106px)}}
.ph{padding:18px 20px 14px}
.pbar{height:6px;border-radius:99px;background:#EEF3F0;overflow:hidden;flex:1}
#progress-fill{height:100%;border-radius:inherit;background:var(--g);transition:width .4s ease}
.pl{overflow-y:auto;max-height:58vh;padding:4px 12px 14px;flex:1}
@media(min-width:1200px){.pl{max-height:none}}
.li{
  width:100%;text-align:start;display:flex;gap:12px;align-items:center;padding:11px 12px;
  margin-bottom:6px;border-radius:14px;border:1px solid transparent;background:#fff;
  transition:all .18s ease;cursor:pointer
}
.li:hover{background:#F8FAFB;border-color:#E2E8F0}
.li.active{
  background:#ECFDF5;
  border-color:#A7F3D0;
  box-shadow:0 1px 4px rgba(16,185,129,.08);
}
.lc{
  width:28px;height:28px;border-radius:50%;background:#F1F5F9;color:#64748B;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:.2s
}
.li.active .lc{background:var(--g);color:#fff}
.li.done .lc{background:var(--g);color:#fff}
.ci,.pi{width:14px;height:14px}
.ci{stroke-width:3}
.ls{display:inline-flex;align-items:center;padding:3px 9px;border-radius:999px;font-size:11px;font-weight:700;white-space:nowrap}
.s-done{background:#ECFDF5;color:var(--gd)}
.s-current{background:var(--g);color:#fff}
.s-next,.s-todo{background:#F1F5F9;color:#64748B}
.pf{display:grid;grid-template-columns:1fr 1fr;gap:10px;padding:12px 14px;border-top:1px solid var(--line)}
.pf a{display:flex;align-items:center;justify-content:center;gap:8px;padding:9px;border-radius:12px;font-size:12.5px;font-weight:700;text-decoration:none}
.pf .pq{background:var(--soft);color:var(--gd)}
.pf .pc{background:#F8FAFC;color:#64748B;border:1px solid #E2E8F0}

/* ===== Lecteur Vidéo & Centre ===== */
.panel{display:none}
.panel.show{display:grid;gap:20px;animation:rise .25s ease}
@keyframes rise{from{opacity:0;transform:translateY(4px)}to{opacity:1;transform:none}}
.stage{background:#000;border-radius:20px;overflow:hidden;box-shadow:0 8px 30px -10px rgba(0,0,0,.25)}
.sbar{display:flex;flex-wrap:wrap;gap:8px;padding:10px 14px;background:#03251D}
.seg-btn,.chip1{
  display:inline-flex;align-items:center;gap:8px;padding:6px 14px;border-radius:999px;
  font-size:12px;font-weight:700;color:#A7F3D0;background:rgba(255,255,255,.08);transition:.2s;cursor:pointer
}
.seg-btn:hover{background:rgba(255,255,255,.16);color:#fff}
.seg-btn.on{background:var(--g);color:#fff}
.chip1{background:rgba(255,255,255,.12);color:#fff}
.player video{display:block;width:100%;aspect-ratio:16/9;max-height:76vh;background:#000;object-fit:contain}
.speedbar{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:10px;padding:9px 16px;background:#031F18;font-size:12px;font-weight:600;color:#94A3B8}
.sp{padding:2px 9px;border-radius:999px;color:#A7F3D0;transition:.2s;cursor:pointer}
.sp:hover{color:#fff}.sp.on{background:var(--g);color:#fff}
.tstage{background:#064E3B;color:#fff;padding:64px 20px;text-align:center;border-radius:20px}

/* Boutons & Badges */
.btn{
  display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:10px 20px;
  border-radius:12px;font-size:13.5px;font-weight:700;cursor:pointer;border:1.5px solid transparent;
  transition:all .18s ease;font-family:inherit;text-decoration:none
}
.btn:disabled{cursor:not-allowed;opacity:.5}
.b-prev{background:#fff;color:var(--gd);border-color:#A7F3D0}
.b-prev:hover{background:var(--soft)}
.b-next,.b-glow,.b-req{background:var(--g);color:#fff;box-shadow:0 3px 12px rgba(16,185,129,.28)}
.b-next:hover,.b-glow:hover,.b-req:not(:disabled):hover{background:var(--gd)}
.mark{background:#fff;color:#475569;border-color:#CBD5E1}
.mark:hover{background:#F8FAFC}
.mark.is-done{background:var(--soft);color:var(--gd);border-color:#A7F3D0}
.btn-gold{background:linear-gradient(135deg,#f0d78c,#bd9131);color:#231b05;border-radius:12px}
.btn-line{background:#fff;color:var(--gd);border-color:#A7F3D0}
.btn-line:hover{background:var(--soft)}
.lbadge{display:inline-flex;padding:4px 12px;border-radius:999px;background:var(--soft);color:var(--gd);font-size:12px;font-weight:700}
.rchip{display:inline-flex;align-items:center;gap:6px;padding:5px 12px;border-radius:10px;background:#F1F5F9;font-size:12px;font-weight:600;color:#475569}

/* Onglets sous le lecteur */
.tabs{display:flex;gap:6px;border-bottom:1px solid var(--line);padding-bottom:1px}
.tab{
  display:inline-flex;align-items:center;gap:8px;padding:10px 16px;font-size:13.5px;
  font-weight:700;color:#64748B;border-bottom:2px solid transparent;background:transparent;
  transition:.2s;cursor:pointer;margin-bottom:-1px
}
.tab:hover{color:var(--head)}
.tab.on{color:var(--gd);border-bottom-color:var(--g)}
.tab .cnt{font-size:10px;border-radius:999px;padding:1px 6px;background:var(--soft);color:var(--gd)}

/* Quiz Card (Style référence) */
.quiz-box{
  border:1px solid #E2E8F0;border-radius:18px;padding:18px 20px;
  background:#fff;display:flex;flex-wrap:wrap;align-items:center;gap:16px;
  transition:all .18s ease
}
.quiz-box:hover{border-color:#CBD5E1;box-shadow:0 4px 16px rgba(0,0,0,.03)}
.quiz-icon{
  width:46px;height:46px;border-radius:14px;background:#6366F1;color:#fff;
  display:flex;align-items:center;justify-content:center;flex-shrink:0
}

/* ===== Colonne de droite (Widgets) ===== */
.rc{padding:20px}
.ringw{position:relative;width:96px;height:96px;flex-shrink:0}
.ringw svg{width:100%;height:100%}
.ringw b{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:19px;font-weight:800;color:var(--head)}
#ring-fg{transition:stroke-dashoffset .6s ease}
.res-i{
  display:flex;align-items:center;gap:12px;padding:11px 13px;border:1px solid #E2E8F0;
  border-radius:14px;transition:all .18s ease;text-decoration:none
}
.res-i:hover{border-color:#A7F3D0;background:var(--soft)}
.res-ic{width:38px;height:38px;border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.res-ic-pdf{background:#FEE2E2;color:#EF4444}
.res-ic-code{background:#E0F2FE;color:#0284C7}
.res-ic-task{background:#DCFCE7;color:#16A34A}
.nx{
  width:100%;display:flex;align-items:center;gap:12px;text-align:start;padding:12px;
  border-radius:14px;border:1px solid #E2E8F0;background:#fff;transition:all .18s ease;cursor:pointer
}
.nx:hover{border-color:#A7F3D0;background:var(--soft)}
.nx-ic{width:46px;height:46px;border-radius:12px;background:#033A2B;color:#34D399;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.help-ic{width:42px;height:42px;border-radius:12px;background:var(--soft);color:var(--gd);display:flex;align-items:center;justify-content:center}

/* Certificat */
.cc{border-radius:18px;border:1px solid #F2DFB8;background:#FFFBF2;padding:22px}
.cc.gold{border-color:#E3C988;background:linear-gradient(135deg,#FFFDF7,#FFF8E7)}
.medal{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;background:#FEF3C7;color:#D97706}
.bar{height:7px;border-radius:99px;background:#EEDBB3;overflow:hidden}
.bar>div{height:100%;background:var(--g);border-radius:inherit;transition:width .5s}

/* Notifications & Certificat Modal */
.toast{
  position:fixed;left:50%;bottom:24px;z-index:80;max-width:min(90vw,440px);
  padding:12px 22px;border-radius:999px;background:#022C22;color:#fff;font-size:13px;
  font-weight:600;box-shadow:0 18px 40px -10px rgba(0,0,0,.4);opacity:0;pointer-events:none;
  transform:translateX(-50%) translateY(14px);transition:.25s ease
}
.toast.show{opacity:1;transform:translateX(-50%) translateY(0)}

#cert-modal{position:fixed;inset:0;z-index:60;display:none;align-items:flex-start;justify-content:center;padding:24px 12px;overflow:auto;background:rgba(15,23,42,.85);backdrop-filter:blur(8px)}
#cert-modal.open{display:flex}
.cw{width:100%;max-width:1100px;margin:auto}
#cert-sheet{position:relative;aspect-ratio:1.414/1;width:100%;container-type:inline-size;background:#fffdf8;color:#064e3b;padding:2.2cqw;box-shadow:0 30px 70px -20px rgba(0,0,0,.6);font-family:'Plus Jakarta Sans','IBM Plex Sans Arabic',sans-serif}
.co{height:100%;border:3px solid var(--gold);padding:.8cqw}
.ci2{position:relative;height:100%;border:1px solid #0b6b4d;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:2cqw 8cqw 12cqw;background:radial-gradient(circle at 50% 45%,rgba(201,162,74,.1),transparent 62%),#fffdf8}
.cn{position:absolute;width:3.4cqw;height:3.4cqw;border:2px solid var(--gold)}
.cn.tl{top:.8cqw;left:.8cqw;border-right:0;border-bottom:0}.cn.tr{top:.8cqw;right:.8cqw;border-left:0;border-bottom:0}
.cn.bl{bottom:.8cqw;left:.8cqw;border-right:0;border-top:0}.cn.br{bottom:.8cqw;right:.8cqw;border-left:0;border-top:0}
.cbrand{display:flex;align-items:center;gap:1.2cqw;font-size:1.2cqw;font-weight:800;letter-spacing:.3em;color:#047857;text-transform:uppercase}
.cbrand::before,.cbrand::after{content:"";width:6cqw;height:1px;background:var(--gold)}
.clogo{width:5cqw;height:5cqw;object-fit:contain;margin-bottom:.4cqw}
.cover{font-size:1.1cqw;letter-spacing:.25em;color:#98752b;font-weight:800;margin-top:.5cqw}
.ctitle{font-family:'Playfair Display',serif;font-weight:800;color:#10201a;font-size:5cqw;line-height:1.1;margin-top:.6cqw}
html[dir=rtl] .ctitle,html[dir=rtl] .cform{font-family:'IBM Plex Sans Arabic',serif;letter-spacing:0}
.cdiv{display:flex;align-items:center;gap:1cqw;margin:1.2cqw 0 .6cqw}
.cdiv::before,.cdiv::after{content:"";width:10cqw;height:1px;background:var(--gold)}
.cdiv span{width:.9cqw;height:.9cqw;background:var(--gold);transform:rotate(45deg)}
.csub{font-size:1.4cqw;color:#4b5f56;margin-top:.6cqw}
.cname{font-family:'Great Vibes',cursive;font-size:6.5cqw;color:#064e3b;line-height:1.15;margin:.6cqw 0;border-bottom:1px solid var(--gold);padding:0 5cqw;min-width:45%;overflow-wrap:anywhere}
.cform{font-family:'Playfair Display',serif;font-weight:700;font-size:2.5cqw;color:#047857;margin-top:.8cqw;max-width:90%}
.cfoot{position:absolute;left:6cqw;right:6cqw;bottom:2.6cqw;display:flex;align-items:flex-end;justify-content:space-between;gap:10px}
.cfoot .col{font-size:1cqw;color:#4b5f56;font-weight:600;text-align:center;min-width:22cqw}
.cfoot .col b{display:block;color:#10201a;font-size:1.3cqw;margin-bottom:.3cqw;border-bottom:1px solid #b9c7bf;padding-bottom:.4cqw}
.csign{font-family:'Great Vibes',cursive;font-size:2.8cqw;color:#064e3b;border-bottom:1px solid #b9c7bf;padding:0 1cqw;margin-bottom:.4cqw}
.cseal{width:7cqw;height:7cqw;border-radius:50%;background:radial-gradient(circle at 35% 30%,#f6dd8e,#b98f2e 70%);display:flex;align-items:center;justify-content:center;color:#fff;box-shadow:0 0 0 .4cqw #fffdf8,0 0 0 .6cqw var(--gold);flex-shrink:0}
.ccode{font-size:.9cqw;margin-top:.4cqw;color:#4b5f56}

@media print{
  @page{size:A4 landscape;margin:0}
  html,body{width:297mm!important;height:210mm!important;margin:0!important;padding:0!important;background:#fff!important;overflow:hidden!important}
  body *{visibility:hidden!important}
  #cert-modal{display:block!important;position:fixed!important;inset:0!important;padding:0!important;background:#fff!important;overflow:hidden!important;backdrop-filter:none!important}
  #cert-modal>*,#cert-sheet,#cert-sheet *{visibility:visible!important}
  .cw{width:297mm!important;max-width:none!important;margin:0!important;overflow:visible!important}
  #cert-sheet{position:fixed!important;left:0!important;top:0!important;width:297mm!important;height:210mm!important;max-width:none!important;aspect-ratio:auto!important;padding:6mm!important;box-shadow:none!important;-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important}
  .co{border-width:2px!important;padding:2mm!important}
  #cert-close,#cert-print{display:none!important}
  .side,.side-ov{display:none!important}
}
</style>
</head>
<body>
@php
$lessons = $formation->cours()->orderBy('order')->get()->values();
$quizzes = $formation->quizzes()->withCount('questions')->get();

$videoCount = $lessons->sum(fn($c) => (int) !empty($c->video_path) + (int) !empty($c->video2_path));
$pdfCount = $lessons->filter(fn($c) => !empty($c->file_path))->count();
$lessonCount = $lessons->count();
$quizCount = $quizzes->count();

$user = auth()->user();

$studentName = optional($user)->name ?? '';

$initial = $studentName !== ''
    ? mb_strtoupper(mb_substr($studentName, 0, 1))
    : 'É';

// Photo de profil de l'étudiant connecté
$profilePhoto = null;

if ($user) {
    $userAttributes = $user->getAttributes();

    foreach ([
        'profile_photo_path',
        'profile_photo',
        'profile_image',
        'avatar',
        'photo',
        'image',
    ] as $photoField) {
        if (!empty($userAttributes[$photoField])) {
            $profilePhoto = $userAttributes[$photoField];
            break;
        }
    }
}

$profilePhotoUrl = null;

if ($profilePhoto) {
    $profilePhotoUrl = preg_match('/^https?:\/\//i', $profilePhoto)
        ? $profilePhoto
        : asset(
            str_starts_with($profilePhoto, 'storage/')
                ? $profilePhoto
                : 'storage/' . ltrim($profilePhoto, '/')
        );
}

$cert = ($user && method_exists($user, 'certificates'))
    ? $user->certificates()->where('formation_id', $formation->id)->first()
    : null;

$certStatus = $cert
    ? (in_array($cert->status, ['active', 'approved']) ? 'active' : ($cert->status ?? 'none'))
    : 'none';

$certDate = ($certStatus === 'active' && $cert)
    ? optional($cert->activated_at ?? $cert->updated_at)->toIso8601String()
    : null;

$certCode = $cert->certificate_number ?? null;
$certName = $cert->name_on_certificate ?? $studentName;
$certRoute = \Illuminate\Support\Facades\Route::has('certificates.issue')
    ? route('certificates.issue', $formation)
    : null;

$lessonIds = $lessons->pluck('id');

$completedIds = $user
    ? \App\Models\LessonProgress::query()
        ->where('user_id', $user->id)
        ->where('formation_id', $formation->id)
        ->whereIn('cours_id', $lessonIds)
        ->whereNotNull('completed_at')
        ->distinct()
        ->pluck('cours_id')
        ->map(fn($id) => (int) $id)
        ->values()
        ->all()
    : [];

$quizCheck = true;
$quizzesWithQuestions = $quizzes
    ->where('questions_count', '>', 0)
    ->pluck('id');
$quizIds = $quizzesWithQuestions->map(fn($id) => (int) $id)->values()->all();

$passedIds = $user && $quizzesWithQuestions->isNotEmpty()
    ? \App\Models\QuizAttempt::query()
        ->where('user_id', $user->id)
        ->whereIn('quiz_id', $quizzesWithQuestions)
        ->where('passed', true)
        ->where('percentage', '>=', 80)
        ->distinct()
        ->pluck('quiz_id')
        ->map(fn($id) => (int) $id)
        ->values()
        ->all()
    : [];

$progressUrl = \Illuminate\Support\Facades\Route::has('lesson-progress.update')
    ? route('lesson-progress.update', [
        'formation' => $formation->id,
        'cours' => '__COURS_ID__',
    ])
    : null;

$eligibleServer = $lessonCount > 0
    && count($completedIds) >= $lessonCount
    && count(array_diff($quizIds, $passedIds)) === 0;

$fAttrs = $formation->getAttributes();
$fDescription = array_key_exists('description', $fAttrs) ? $formation->description : null;
$fDuration = array_key_exists('duration', $fAttrs) ? $formation->duration : null;
$fLevel = array_key_exists('level', $fAttrs) ? $formation->level : null;

$R = \Illuminate\Support\Facades\Route::class;
$navFormations = $R::has('formations.index') ? route('formations.index') : route('dashboard');
$navProfile = $R::has('profile.edit') ? route('profile.edit') : route('dashboard');
$navSettings = $R::has('settings') ? route('settings') : $navProfile;
$supportMail = config('mail.from.address');
@endphp

{{-- ===== Zone A : Barre latérale (Sidebar) ===== --}}
<div class="side-ov" id="side-ov"></div>
<aside class="side" id="side" aria-label="Navigation principale">
 <a href="{{ route('dashboard') }}" class="side-brand">
  <span class="lg"><i data-lucide="graduation-cap" class="w-6 h-6"></i></span>
  <div>
   <div class="font-extrabold text-[17px] tracking-tight leading-tight">ÉtudeEnLigne</div>
   <div class="text-[11px] text-emerald-300/80 font-normal mt-0.5">Apprendre aujourd'hui, réussir demain</div>
  </div>
 </a>
 <nav>
  <a href="{{ route('dashboard') }}" class="sl"><i data-lucide="layout-dashboard" class="w-5 h-5"></i><span data-i18n="nav_dash">Tableau de bord</span></a>
  <a href="{{ $navFormations }}" class="sl on"><i data-lucide="library-big" class="w-5 h-5"></i><span data-i18n="nav_formations">Mes formations</span></a>
  <a href="#liste-lecons" class="sl"><i data-lucide="play-square" class="w-5 h-5"></i><span data-i18n="nav_courses">Mes cours</span></a>
  <a href="#liste-quiz" class="sl"><i data-lucide="clipboard-check" class="w-5 h-5"></i><span data-i18n="nav_quiz">Mes quiz</span></a>
  <a href="#certificat" class="sl"><i data-lucide="award" class="w-5 h-5"></i><span data-i18n="nav_certs">Mes certificats</span></a>
  <a href="{{ $navProfile }}" class="sl"><i data-lucide="user" class="w-5 h-5"></i><span data-i18n="nav_profile">Mon profil</span></a>
  <a href="{{ $navSettings }}" class="sl"><i data-lucide="settings" class="w-5 h-5"></i><span data-i18n="nav_settings">Paramètres</span></a>
 </nav>
 <div class="side-quote">
  <div class="w-10 h-10 mx-auto rounded-xl flex items-center justify-center mb-2" style="background:rgba(16,185,129,.15)">
   <i data-lucide="graduation-cap" class="w-6 h-6 text-emerald-400"></i>
  </div>
  <p data-i18n="side_quote">Chaque petit pas vous rapproche de vos grands objectifs !</p>
  <div class="tr"><div id="side-fill" style="width:0%"></div></div>
  <small><span id="side-pct">0</span>% <span data-i18n="lessons_done">leçons terminées</span></small>
  <a href="#lecteur" class="btn b-next w-full !py-2.5 !text-xs !rounded-xl" data-i18n="side_cta">Continuez !</a>
 </div>
</aside>

{{-- ===== Barre du haut (Topbar) ===== --}}
<header class="topbar">
 <div class="tb-in">
  <div class="flex items-center gap-3 min-w-0 flex-1">
   <button type="button" class="burger" id="side-toggle" aria-label="Menu"><i data-lucide="menu" class="w-5 h-5"></i></button>
   <a href="{{ route('dashboard') }}" class="flex items-center gap-2 shrink-0 lg:hidden text-emerald-700"><i data-lucide="graduation-cap" class="w-7 h-7"></i></a>
   <label class="srch">
    <i data-lucide="search" class="w-4 h-4"></i>
    <input type="search" id="lesson-search" placeholder="Rechercher une formation, un cours..." aria-label="Rechercher une leçon">
   </label>
  </div>
  <div class="flex items-center gap-3 sm:gap-4 shrink-0">
   <div class="lt">
    <button type="button" id="lang-fr" class="lb on" aria-label="Français">FR</button>
    <button type="button" id="lang-ar" class="lb" aria-label="العربية">عربي</button>
   </div>
   <div class="hidden sm:flex items-center gap-3 pl-2">
    <a href="{{ $navProfile }}"
   class="avatar"
   aria-label="Mon profil"
   style="overflow:hidden; flex-shrink:0; text-decoration:none;">

    @if($profilePhotoUrl)
        <img
            src="{{ $profilePhotoUrl }}"
            alt="Photo de profil de {{ $studentName }}"
            style="width:100%;height:100%;object-fit:cover;border-radius:50%;"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
        >

        <span
            style="display:none;width:100%;height:100%;align-items:center;justify-content:center;"
        >{{ $initial }}</span>
    @else
        {{ $initial }}
    @endif

</a>
    @if($studentName!=='')
    <div class="hidden lg:block leading-tight text-start">
     <div class="text-sm font-bold th max-w-[130px] truncate">{{ $studentName }}</div>
     <div class="text-[11px] muted font-medium">Étudiant</div>
    </div>
    @endif
   </div>
  </div>
 </div>
</header>

<main id="top" class="page">
 {{-- Fil d'Ariane --}}
 <nav class="bc" aria-label="Fil d'Ariane">
  <a href="{{ $navFormations }}" data-i18n="nav_formations">Mes formations</a>
  <i data-lucide="chevron-right" class="w-3.5 h-3.5 flip"></i>
  <a href="#top" class="font-medium">{{ $formation->name }}</a>
  @if($lessonCount>0)
   <i data-lucide="chevron-right" class="w-3.5 h-3.5 flip"></i>
   <span class="cur" id="bc-lesson"></span>
  @endif
 </nav>

 {{-- En-tête de la formation (Carte identique à l'image) --}}
 <section class="card fh mb-6">
  <div class="fh-ic"><i data-lucide="code-xml" class="w-9 h-9"></i></div>
  <div class="min-w-0 flex-1">
   <h1>{{ $formation->name }}</h1>
   @if(!empty($fDescription))
    <p class="text-sm muted mt-1.5 clamp3 break-words">{{ $fDescription }}</p>
   @else
    <p class="text-sm muted mt-1.5" data-i18n="hero_sub">Maîtrisez les technologies du web moderne</p>
   @endif
   <div class="fh-meta">
    <span><i data-lucide="book-open" class="w-4 h-4 text-emerald-600"></i>{{ $lessonCount }} <span data-i18n="courses_l">cours</span></span>
    <span><i data-lucide="clock" class="w-4 h-4 text-emerald-600"></i>{{ !empty($fDuration) ? $fDuration : '4h 30min' }}</span>
    <span><i data-lucide="signal" class="w-4 h-4 text-emerald-600"></i><span data-i18n="level_l">Niveau :</span> {{ !empty($fLevel) ? $fLevel : 'Débutant' }}</span>
   </div>
  </div>
 </section>

@if($lessonCount===0)
<div class="max-w-3xl mx-auto py-16"><div class="card p-10 text-center"><div class="w-14 h-14 mx-auto rounded-2xl flex items-center justify-center mb-4" style="background:var(--soft)"><i data-lucide="book-open" class="w-7 h-7 ta"></i></div><h2 class="text-lg font-extrabold th" data-i18n="no_lesson">Aucune leçon disponible</h2><p class="text-sm muted mt-2" data-i18n="no_lesson_sub">Les cours seront affichés ici dès qu'ils seront ajoutés.</p></div></div>
@else
 <div class="lgrid" id="lecteur">

  {{-- ===== Zone B (Gauche) : Contenu de la formation ===== --}}
  <aside class="gp program card" id="liste-lecons">
   <div class="ph">
    <div class="flex items-center justify-between gap-3 mb-2">
     <h2 class="sh" data-i18n="content_title">Contenu de la formation</h2>
     <span class="text-xs font-extrabold text-emerald-600"><span id="done-pct">0</span>%</span>
    </div>
    <div class="pbar mt-2"><div id="progress-fill" style="width:0%"></div></div>
    <p class="text-[11.5px] muted mt-2 flex items-center justify-between">
     <span><span id="done-count">0</span> / {{ $lessonCount }} <span data-i18n="lessons_done">leçons terminées</span></span>
    </p>
   </div>
   <div class="pl">
    @foreach($lessons as $index=>$cours)
    @php $liTitle=$cours->title??$cours->name??'Leçon '.($index+1); @endphp
    <button type="button" class="li {{ $index===0?'active':'' }}" data-go="{{ $index }}" data-title="{{ $liTitle }}">
     <span class="lc"><i data-lucide="play" class="pi"></i><i data-lucide="check" class="ci hidden"></i></span>
     <span class="min-w-0 flex-1">
      <span class="block text-[13px] font-bold leading-snug th">{{ $index+1 }}. {{ $liTitle }}</span>
      <span class="flex items-center gap-2 mt-1 text-[11px] muted font-medium">
       @if($cours->video_path)<span>10:24</span>@else<span>Lecture</span>@endif
      </span>
     </span>
     <span class="ls s-todo"></span>
    </button>
    @endforeach
   </div>
   <div class="pf">
    <a href="#liste-quiz" class="pq"><i data-lucide="clipboard-check" class="w-4 h-4"></i><span><span data-i18n="quiz">Quiz</span> ({{ $quizCount }})</span></a>
    <a href="#certificat" class="pc"><i data-lucide="award" class="w-4 h-4"></i><span data-i18n="cert_side">Certificat</span><i data-lucide="lock" class="w-3.5 h-3.5"></i></a>
   </div>
  </aside>

  {{-- ===== Zone B (Centre) : Lecteur, Description, Quiz, Certificat ===== --}}
  <div class="gc">
   @foreach($lessons as $index=>$cours)
   @php 
    $title=$cours->title??$cours->name??'Leçon '.($index+1);
    $v1=!empty($cours->video_path);
    $v2=!empty($cours->video2_path);
    $first=$v1?'c':'p';
   @endphp
   <section class="panel {{ $index===0?'show':'' }}" data-panel="{{ $index }}" id="lecon-{{ $cours->id }}">
    @if($v1||$v2)
    <div class="stage">
     <div class="sbar">
      @if($v1&&$v2)
       <button type="button" class="seg-btn on" data-v="c"><i data-lucide="graduation-cap" class="w-4 h-4"></i><span data-i18n="video_course">Vidéo Cours</span></button>
       <button type="button" class="seg-btn" data-v="p"><i data-lucide="wrench" class="w-4 h-4"></i><span data-i18n="video_practice">Pratique</span></button>
      @elseif($v1)
       <span class="chip1"><i data-lucide="graduation-cap" class="w-4 h-4"></i><span data-i18n="video_course">Vidéo Cours</span></span>
      @else
       <span class="chip1"><i data-lucide="wrench" class="w-4 h-4"></i><span data-i18n="video_practice">Pratique</span></span>
      @endif
     </div>
     @foreach([['c',$v1,$cours->video_path],['p',$v2,$cours->video2_path]] as $vp)
      @if($vp[1])
      <div class="vpane {{ $first===$vp[0]?'':'hidden' }}" data-v="{{ $vp[0] }}">
       <div class="player">
        <video controls playsinline preload="metadata" controlsList="nodownload"><source src="{{ asset('storage/'.$vp[2]) }}"></video>
        <div class="speedbar">
         <span class="inline-flex items-center gap-2"><i data-lucide="gauge" class="w-4 h-4"></i><span data-i18n="speed">Vitesse</span></span>
         <div class="flex gap-1">
          @foreach([0.75,1,1.25,1.5,2] as $s)
           <button type="button" class="sp {{ $s==1?'on':'' }}" data-speed="{{ $s }}">{{ $s }}x</button>
          @endforeach
         </div>
        </div>
       </div>
      </div>
      @endif
     @endforeach
    </div>
    @else
    <div class="tstage"><i data-lucide="book-open" class="w-10 h-10 mx-auto"></i><p class="font-bold mt-3" data-i18n="text_lesson">Leçon de lecture : consultez le contenu ci-dessous.</p></div>
    @endif

    {{-- Carte description de la leçon --}}
    <div class="card p-5 sm:p-6">
     <div class="flex flex-wrap items-start justify-between gap-3">
      <div class="min-w-0">
       <span class="lbadge"><span data-i18n="lesson">Leçon</span>&nbsp;{{ $index+1 }} / {{ $lessonCount }}</span>
       <h2 class="text-xl sm:text-2xl font-extrabold th mt-2 leading-tight">{{ $title }}</h2>
      </div>
      <a href="#liste-lecons" class="inline-flex 2xl:hidden items-center gap-2 rounded-xl px-3.5 py-2 text-xs font-bold th border border-slate-200">
       <i data-lucide="list-checks" class="w-4 h-4"></i><span data-i18n="plan">Plan du cours</span>
      </a>
     </div>

     {{-- Onglets --}}
     <div class="mt-5">
      <div class="tabs" role="tablist">
       <button type="button" role="tab" aria-selected="true" class="tab on" data-tab="desc"><i data-lucide="file-text" class="w-4 h-4"></i><span data-i18n="desc_title">Description de la leçon</span></button>
       <button type="button" role="tab" aria-selected="false" class="tab" data-tab="content"><i data-lucide="align-left" class="w-4 h-4"></i><span data-i18n="tab_content">Contenu du cours</span></button>
       <button type="button" role="tab" aria-selected="false" class="tab" data-tab="files"><i data-lucide="paperclip" class="w-4 h-4"></i><span data-i18n="tab_files">Documents</span>@if($cours->file_path)<span class="cnt">1</span>@endif</button>
      </div>
      <div class="pt-4">
       <div data-tabpane="desc">
        @if(!empty($cours->description))
         <p class="muted leading-7 text-[14.5px] break-words">{{ $cours->description }}</p>
        @else
         <p class="muted text-sm" data-i18n="no_desc">Dans cette leçon, vous allez découvrir les concepts essentiels pour progresser sereinement.</p>
        @endif
       </div>
       <div data-tabpane="content" class="hidden">
        @if($cours->content)
         <div class="leading-7 text-[14.5px] whitespace-pre-line break-words text-slate-700">{{ $cours->content }}</div>
        @else
         <p class="muted text-sm" data-i18n="no_content">Aucun contenu écrit pour cette leçon.</p>
        @endif
       </div>
       <div data-tabpane="files" class="hidden">
        @if($cours->file_path)
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-2xl border border-slate-200 bg-slate-50/70">
         <div class="flex items-center gap-3">
          <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0 bg-rose-100 text-rose-500"><i data-lucide="file-text" class="w-6 h-6"></i></div>
          <div><p class="font-bold text-sm th" data-i18n="support">Support de cours (PDF)</p><p class="text-xs muted mt-0.5" data-i18n="support_sub">À consulter ou à télécharger</p></div>
         </div>
         <a href="{{ asset('storage/'.$cours->file_path) }}" target="_blank" rel="noopener noreferrer" class="btn b-glow !py-2.5 !px-5"><i data-lucide="download" class="w-4 h-4"></i><span data-i18n="open_pdf">Ouvrir le PDF</span></a>
        </div>
        @else
         <p class="muted text-sm" data-i18n="no_file">Aucun document pour cette leçon.</p>
        @endif
       </div>
      </div>
     </div>

     {{-- Actions Précédent / Terminé / Suivant --}}
     <div class="mt-6 pt-5 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
      <button type="button" class="btn b-prev nav-prev"><i data-lucide="arrow-left" class="w-4 h-4 flip"></i><span data-i18n="prev">Leçon précédente</span></button>
      <button type="button" class="btn mark order-last sm:order-none w-full sm:w-auto" data-index="{{ $index }}"><i data-lucide="check-circle-2" class="w-4 h-4"></i><span class="done-label" data-i18n="mark">Marquer comme terminée</span></button>
      <button type="button" class="btn b-next nav-next"><span data-i18n="next">Leçon suivante</span><i data-lucide="arrow-right" class="w-4 h-4 flip"></i></button>
     </div>
    </div>
   </section>
   @endforeach

   {{-- Quiz de la formation (Carte avec design purple/emerald de référence) --}}
   <section id="liste-quiz" class="card p-5 sm:p-6 scroll-mt-24 mt-5">
    <div class="flex items-center justify-between gap-3 mb-4">
     <h2 class="sh inline-flex items-center gap-2"><i data-lucide="clipboard-check" class="w-5 h-5 text-emerald-600"></i><span data-i18n="test">Quiz de la formation</span></h2>
    </div>
    @forelse($quizzes as $quiz)
    <article class="quiz-box {{ !$loop->first ? 'mt-3' : '' }}">
     <div class="quiz-icon"><i data-lucide="help-circle" class="w-6 h-6"></i></div>
     <div class="min-w-0 flex-1">
      <div class="flex flex-wrap items-center justify-between gap-2">
       <h3 class="font-bold text-sm sm:text-base leading-snug th">{{ $quiz->title??$quiz->name??'Quiz de la leçon' }}</h3>
       <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1 rounded-full">{{ (int) $quiz->questions_count }} <span data-i18n="questions_label">questions</span></span>
      </div>
      <p class="text-xs muted mt-1">{{ !empty($quiz->description) ? $quiz->description : 'Testez vos connaissances sur cette leçon' }}</p>
     </div>
     <a href="{{ url('/quiz/'.$quiz->id) }}" class="btn b-glow w-full !py-3 !rounded-xl"><i data-lucide="play" class="w-4 h-4"></i><span data-i18n="start_quiz">Commencer le quiz</span></a>
    </article>
    @empty
    <div class="p-6 flex items-center gap-4 rounded-2xl border border-dashed border-slate-200 bg-slate-50/50">
     <div class="w-10 h-10 rounded-xl bg-slate-200 text-slate-500 flex items-center justify-center"><i data-lucide="clipboard-list" class="w-5 h-5"></i></div>
     <p class="font-bold text-sm th" data-i18n="no_quiz">Aucun quiz disponible pour le moment.</p>
    </div>
    @endforelse
   </section>

   {{-- Certificat --}}
   <section id="certificat" class="scroll-mt-24 mt-5">
    @if(session('certificate_message'))
     <div class="mb-4 rounded-xl border p-4 text-sm font-medium flex items-center gap-3 bg-emerald-50 border-emerald-200 text-emerald-800">
      <i data-lucide="check-circle-2" class="w-5 h-5 shrink-0 text-emerald-600"></i><span>{{ session('certificate_message') }}</span>
     </div>
    @endif
    @if(session('error'))<div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-800">{{ session('error') }}</div>@endif
    @if($errors->any())<div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-800">{{ $errors->first() }}</div>@endif

    <div id="cert-card" class="cc {{ $certStatus==='active'?'gold':'' }}">
     <div class="flex items-start gap-4">
      <div class="flex-1 min-w-0">
       <div class="flex items-center gap-3">
        <div class="medal"><i data-lucide="{{ $certStatus==='pending'?'clock':(($certStatus==='active'||$eligibleServer)?'award':'lock') }}" class="w-5 h-5"></i></div>
        @if($certStatus==='active')
         <h3 class="sh th" data-i18n="cert_active_title">Votre certificat est activé</h3>
        @elseif($certStatus==='pending')
         <h3 class="sh th" data-i18n="cert_pending_title">Demande en attente</h3>
        @else
         <h3 class="sh th" id="cert-heading">{{ $certStatus==='rejected'?'Demande refusée':'Certificat verrouillé' }}</h3>
        @endif
       </div>
       @if($certStatus==='active')
        <p class="text-[13px] mt-2.5 leading-6 muted" data-i18n="cert_active_text">L'administration a validé votre certificat. Vérifiez votre nom puis imprimez-le ou enregistrez-le en PDF.</p>
        <div class="mt-4 max-w-md">
         <label for="cert-name-input" class="block text-xs font-bold mb-1.5 muted" data-i18n="cert_name_label">Nom à afficher sur le certificat</label>
         <input id="cert-name-input" type="text" maxlength="60" value="{{ $certName }}" class="w-full rounded-xl px-4 py-2.5 text-sm font-semibold outline-none border border-amber-300 focus:ring-2 focus:ring-amber-400 bg-white">
        </div>
        <button type="button" id="cert-open" class="btn btn-gold mt-4 !px-6 !py-3"><i data-lucide="eye" class="w-4 h-4"></i><span data-i18n="cert_view">Voir mon certificat</span></button>
       @elseif($certStatus==='pending')
        <p class="text-[13px] mt-2.5 leading-6 muted" data-i18n="cert_pending_text">Votre demande a été envoyée. L'administration va l'étudier puis activer votre certificat.</p>
       @else
        <p class="text-[13px] mt-2.5 leading-6 muted" id="cert-text"></p>
        <div class="mt-3.5"><div class="bar"><div id="cert-fill" style="width:0%"></div></div><p class="text-xs font-bold mt-2 muted"><span id="cert-left">0</span> <span data-i18n="cert_left">étape(s) restante(s)</span></p></div>
        @if(!$certRoute)
         <p class="text-xs font-bold text-rose-700 mt-3">Route « certificates.issue » non définie.</p>
        @else
         <form id="cert-request-form" action="{{ $certRoute }}" method="POST" class="w-full mt-4">
          @csrf
          <label for="request-cert-name" class="block text-xs font-bold mb-2 th" data-i18n="cert_fullname">Nom complet sur le certificat</label>
          <input type="text" id="request-cert-name" name="name_on_certificate" value="{{ old('name_on_certificate', $studentName) }}" minlength="2" maxlength="150" required class="w-full px-4 py-2.5 mb-3 rounded-xl border border-amber-300 bg-white" placeholder="Votre nom complet">
          <button type="submit" id="cert-request" disabled class="btn b-req w-full sm:w-auto !px-6 !py-3">
           <i data-lucide="send" class="w-4 h-4"></i>
           <span data-i18n="{{ $certStatus==='rejected'?'cert_retry':'cert_request' }}">{{ $certStatus==='rejected'?'Demander à nouveau':'Demander mon certificat' }}</span>
          </button>
          <p id="cert-request-message" class="mt-3 text-sm muted" role="status"></p>
         </form>
        @endif
       @endif
      </div>
     </div>
    </div>
   </section>
  </div>

  {{-- ===== Zone C : Colonne de droite (Widgets) ===== --}}
  <aside class="gr">
   {{-- Widget Progression circulaire --}}
   <section class="card rc">
    <div class="flex items-center gap-4">
     <div class="ringw">
      <svg viewBox="0 0 100 100" aria-hidden="true">
       <circle cx="50" cy="50" r="42" fill="none" stroke="#E2E8F0" stroke-width="8"/>
       <circle id="ring-fg" cx="50" cy="50" r="42" fill="none" stroke="#10B981" stroke-width="8" stroke-linecap="round" stroke-dasharray="263.89" stroke-dashoffset="263.89" transform="rotate(-90 50 50)"/>
      </svg>
      <b id="ring-pct">0%</b>
     </div>
     <div class="min-w-0 flex-1">
      <h2 class="sh text-[15px]" data-i18n="progress_title">Progression de la formation</h2>
      <p class="text-xs muted mt-1"><span id="ring-count">0 / {{ $lessonCount }}</span> cours complétés</p>
      <div class="w-full h-1.5 bg-slate-100 rounded-full mt-2 overflow-hidden">
       <div id="side-fill-2" class="h-full bg-emerald-500 rounded-full" style="width:0%"></div>
      </div>
     </div>
    </div>
    <a href="#certificat" class="mt-4 flex items-center justify-between gap-2 rounded-xl px-3.5 py-2.5 text-xs font-bold ta bg-emerald-50 hover:bg-emerald-100/70 transition">
     <span class="inline-flex items-center gap-2"><i data-lucide="award" class="w-4 h-4 shrink-0"></i><span id="hero-cert-hint"></span></span>
     <i data-lucide="chevron-right" class="w-4 h-4 shrink-0 flip"></i>
    </a>
   </section>

   {{-- Widget Ressources --}}
   <section class="card rc" id="ressources">
    <h2 class="sh mb-3.5" data-i18n="res_title">Ressources</h2>
    <div class="grid gap-2.5">
     @php $hasDocs = false; @endphp
     @foreach($lessons->filter(fn($c)=>!empty($c->file_path)) as $doc)
      @php $hasDocs = true; @endphp
      <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank" rel="noopener noreferrer" class="res-i">
       <span class="res-ic res-ic-pdf"><i data-lucide="file-text" class="w-5 h-5"></i></span>
       <span class="min-w-0 flex-1">
        <span class="block text-[13px] font-bold th truncate">{{ $doc->title??$doc->name??'Fichier PDF' }}</span>
        <span class="block text-[11px] muted">Télécharger le support</span>
       </span>
       <i data-lucide="download" class="w-4 h-4 text-emerald-600"></i>
      </a>
     @endforeach
     @if(!$hasDocs)
      <div class="p-3.5 rounded-xl border border-dashed border-slate-200 text-center text-xs muted">
       <span data-i18n="no_file">Aucune ressource pour le moment.</span>
      </div>
     @endif
    </div>
   </section>

   {{-- Widget Prochain cours --}}
   <section class="card rc" id="next-card" style="display:none">
    <h2 class="sh mb-3" data-i18n="next_title">Prochain cours</h2>
    <button type="button" class="nx" id="next-btn">
     <span class="nx-ic"><i data-lucide="play" class="w-5 h-5"></i></span>
     <span class="min-w-0 flex-1">
      <span class="block text-[13px] font-bold th leading-snug" id="next-title"></span>
      <span class="block text-[11px] muted mt-0.5" id="next-meta"></span>
     </span>
     <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400 shrink-0 flip"></i>
    </button>
   </section>

   {{-- Widget Assistance --}}
   <section class="card rc text-center sm:text-start">
    <div class="flex items-center gap-3">
     <span class="help-ic"><i data-lucide="headset" class="w-5 h-5"></i></span>
     <div>
      <h2 class="sh text-sm" data-i18n="help_title">Besoin d'aide ?</h2>
      <p class="text-xs muted" data-i18n="help_sub">Notre équipe est là pour vous aider.</p>
     </div>
    </div>
    <a href="mailto:{{ $supportMail }}" class="btn btn-line w-full mt-4 !py-2.5 !text-xs !rounded-xl">
     <span data-i18n="help_btn">Contacter le support</span>
    </a>
   </section>
  </aside>
 </div>
@endif
</main>

<footer class="px-6 py-5 text-xs text-slate-500 bg-white border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-3">
 <p>© {{ date('Y') }} ÉtudeEnLigne. Tous droits réservés.</p>
 <a href="{{ route('dashboard') }}" class="font-bold text-emerald-600 hover:text-emerald-700" data-i18n="back_full">Retour à mon espace</a>
</footer>

<div id="toast" class="toast" role="status" aria-live="polite"></div>

{{-- Modale Certificat --}}
@if($certStatus==='active')
<div id="cert-modal" role="dialog" aria-modal="true" aria-labelledby="c-title">
 <div class="cw">
  <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
   <button type="button" id="cert-close" class="inline-flex items-center gap-2 rounded-full bg-white/15 hover:bg-white/25 text-white px-4 py-2 text-sm font-bold"><i data-lucide="x" class="w-4 h-4"></i><span data-i18n="close">Fermer</span></button>
   <button type="button" id="cert-print" class="btn btn-gold !rounded-full"><i data-lucide="printer" class="w-4 h-4"></i><span data-i18n="cert_print">Imprimer / Enregistrer en PDF</span></button>
  </div>
  <div id="cert-sheet" dir="ltr"><div class="co"><div class="ci2">
   <span class="cn tl"></span><span class="cn tr"></span><span class="cn bl"></span><span class="cn br"></span>
   <img src="{{ asset('images/logo-centre.png') }}" alt="" class="clogo" onerror="this.style.display='none'">
   <p class="cbrand">ÉtudeEnLigne</p>
   <p class="cover" id="c-overline"></p>
   <h2 class="ctitle" id="c-title"></h2>
   <div class="cdiv"><span></span></div>
   <p class="csub" id="c-sub"></p>
   <p class="cname" id="c-name">—</p>
   <p class="csub" id="c-sub2"></p>
   <p class="cform">{{ $formation->name }}</p>
   <div class="cfoot">
    <div class="col"><b id="c-date">—</b><span id="c-date-l"></span></div>
    <div class="cseal"><i data-lucide="award" style="width:55%;height:55%"></i></div>
    <div class="col"><div class="csign">ÉtudeEnLigne</div><span id="c-sign-l"></span><div class="ccode">N° <span id="c-code">—</span></div></div>
   </div>
  </div></div></div>
 </div>
</div>
@endif

<script>
const TOTAL={{ $lessonCount }},STORE='formation-{{ $formation->id }}',FORMATION_ID={{ $formation->id }},USER_ID={{ (int) optional($user)->id }};
const CERT_STATUS=@json($certStatus),CERT_DATE=@json($certDate),CERT_CODE=@json($certCode);
const COURSE_IDS=@json($lessons->pluck('id')->values());
const SERVER_DONE=@json($completedIds);
const QUIZ_CHECK=@json($quizCheck),QUIZ_IDS=@json($quizIds),PASSED_QUIZ_IDS=@json($passedIds);
const PROGRESS_URL=@json($progressUrl);
const CSRF_TOKEN=@json(csrf_token());

const I18N={
fr:{
 hero_tag:'Formation en ligne',hero_sub:'Maîtrisez les technologies du web moderne',hero_start:'Commencer à apprendre',hero_q1:"Apprendre aujourd'hui",hero_q2:'Construire demain',see_all:'Voir tous',questions_label:'questions',back:'Mon espace',nav_home:'Accueil',nav_courses:'Mes cours',nav_player:'Lecteur vidéo',program:'Programme du module',st_done:'Complété',st_current:'En cours',st_next:'À suivre',st_todo:'À faire',lessons_label:'Leçons',lessons_done:'leçons complétées',progress:'Votre progression',videos:'Vidéos',docs:'Documents',quiz:'Quiz',lesson:'Leçon',speed:'Vitesse',prev:'Leçon précédente',next:'Leçon suivante',mark:'Marquer comme terminée',marked:'Complétée ✓',tab_desc:'Description de la leçon',tab_content:'Contenu du cours',tab_files:'Documents',no_desc:'Aucune description pour cette leçon.',no_content:'Aucun contenu écrit pour cette leçon.',no_file:'Aucun document pour cette leçon.',support:'Support de cours (PDF)',support_sub:'À consulter ou à télécharger',open_pdf:'Ouvrir le PDF',text_lesson:'Leçon de lecture : consultez le contenu ci-dessous.',test:'Quiz de la formation',start_quiz:'Commencer le quiz',no_quiz:'Aucun quiz disponible pour le moment.',plan:'Plan du cours',video_course:'Vidéo Cours',video_practice:'Pratique',reading:'Lecture',motto:'Apprends, progresse et atteins tes objectifs',advice:'Consacre un moment chaque jour, regarde les leçons avec attention et révise avant les quiz.',back_full:'Retour à mon espace',no_lesson:'Aucune leçon disponible',no_lesson_sub:"Les cours seront affichés ici dès qu'ils seront ajoutés.",cert_title:'Votre certificat de réussite',cert_side:'Certificat',hint_locked:'Terminez les leçons et les quiz pour demander votre certificat',hint_ready:'Formation terminée : demandez votre certificat',hint_pending:'Certificat : demande en attente',hint_active:'Voir mon certificat',locked_title:'Certificat verrouillé',locked_text:"Terminez toutes les leçons et réussissez les quiz pour pouvoir demander votre certificat à l'administration.",ready_title:'Formation terminée !',ready_text:"Envoyez votre demande : l'administration l'étudiera puis activera votre certificat.",rejected_title:'Demande refusée',rejected_text:'Votre dernière demande a été refusée. Vous pouvez en envoyer une nouvelle.',cert_pending_title:'Demande en attente',cert_pending_text:"Votre demande a été envoyée. L'administration va l'étudier puis activer votre certificat.",cert_active_title:'Votre certificat est activé',cert_active_text:"L'administration a validé votre certificat. Vérifiez votre nom puis imprimez-le ou enregistrez-le en PDF.",cert_left:'étape(s) restante(s)',cert_name_label:'Nom à afficher sur le certificat',cert_fullname:'Nom complet sur le certificat',cert_request:'Demander mon certificat',cert_retry:'Demander à nouveau',cert_view:'Voir mon certificat',cert_print:'Imprimer / Enregistrer en PDF',close:'Fermer',c_overline:'CERTIFICAT OFFICIEL',c_title:'Certificat de réussite',c_sub:'Ce certificat est fièrement décerné à',c_sub2:'pour avoir complété avec succès la formation',c_date_l:'Date de délivrance',c_sign_l:'Direction pédagogique',locale:'fr-FR',
 missing_lessons:'Il reste {n} leçon(s) à terminer.',missing_quizzes:'Il reste {n} quiz à réussir.',form_incomplete:'Terminez toutes les leçons et les quiz, puis saisissez votre nom complet.',name_required:'Saisissez votre nom complet (2 caractères minimum).',sending:'Envoi de votre demande...',progress_error:"Impossible d'enregistrer la progression. Réessayez.",progress_noroute:'La route « lesson-progress.update » est introuvable : progression non enregistrée.',nav_dash:'Tableau de bord',nav_formations:'Mes formations',nav_quiz:'Mes quiz',nav_certs:'Mes certificats',nav_profile:'Mon profil',nav_settings:'Paramètres',side_quote:'Chaque petit pas vous rapproche de vos grands objectifs !',side_cta:'Continuez !',courses_l:'cours',level_l:'Niveau :',content_title:'Contenu de la formation',desc_title:'Description de la leçon',progress_title:'Progression de la formation',res_title:'Ressources',next_title:'Prochain cours',help_title:"Besoin d'aide ?",help_sub:'Notre équipe est là pour vous aider.',help_btn:'Contacter le support'
},
ar:{
 hero_tag:'تكوين عن بعد',hero_sub:'تحكّم في تقنيات الويب الحديثة',hero_start:'ابدأ التعلم',hero_q1:'تعلّم اليوم',hero_q2:'ابنِ غدك',see_all:'عرض الكل',questions_label:'أسئلة',back:'فضائي',nav_home:'الرئيسية',nav_courses:'دوراتي',nav_player:'مشغل الفيديو',program:'برنامج الدورة',st_done:'مكتمل',st_current:'قيد التقدم',st_next:'التالي',st_todo:'لم يبدأ',lessons_label:'دروس',lessons_done:'دروس مكتملة',progress:'تقدمك في التكوين',videos:'فيديوهات',docs:'مستندات',quiz:'اختبارات',lesson:'الدرس',speed:'السرعة',prev:'الدرس السابق',next:'الدرس التالي',mark:'تحديد الدرس كمكتمل',marked:'تم إكمال الدرس ✓',tab_desc:'وصف الدرس',tab_content:'محتوى الدرس',tab_files:'المستندات',no_desc:'لا يوجد وصف لهذا الدرس.',no_content:'لا يوجد محتوى مكتوب لهذا الدرس.',no_file:'لا يوجد مستند لهذا الدرس.',support:'مرجع الدرس (PDF)',support_sub:'للاطلاع أو التحميل',open_pdf:'فتح الملف',text_lesson:'درس للقراءة: اطّلع على المحتوى أدناه.',test:'اختبارات الدورة',start_quiz:'ابدأ الاختبار',no_quiz:'لا توجد اختبارات حالياً.',plan:'خطة الدورة',video_course:'فيديو الدرس',video_practice:'التطبيق العملي',reading:'قراءة',motto:'تعلّم، تطوّر وحقّق أهدافك',advice:'خصص وقتاً يومياً للتعلم، شاهد الدروس بتركيز، وراجع المعلومات قبل اجتياز الاختبارات.',back_full:'العودة إلى فضائي',no_lesson:'لا توجد دروس متاحة',no_lesson_sub:'ستظهر الدروس هنا بمجرد إضافتها.',cert_title:'شهادة النجاح الخاصة بك',cert_side:'الشهادة',hint_locked:'أكمل الدروس والاختبارات لطلب شهادتك',hint_ready:'أنهيت التكوين: اطلب شهادتك',hint_pending:'الشهادة: الطلب قيد الانتظار',hint_active:'عرض شهادتي',locked_title:'الشهادة مقفلة',locked_text:'أكمل جميع الدروس وانجح في الاختبارات لتتمكن من طلب شهادتك من الإدارة.',ready_title:'أنهيت التكوين!',ready_text:'أرسل طلبك: ستدرسه الإدارة ثم تفعّل شهادتك.',rejected_title:'تم رفض الطلب',rejected_text:'تم رفض طلبك الأخير. يمكنك إرسال طلب جديد.',cert_pending_title:'الطلب قيد الانتظار',cert_pending_text:'تم إرسال طلبك. ستدرسه الإدارة ثم تفعّل شهادتك.',cert_active_title:'شهادتك مفعّلة',cert_active_text:'صادقت الإدارة على شهادتك. تحقق من اسمك ثم اطبعها أو احفظها بصيغة PDF.',cert_left:'خطوة متبقية',cert_name_label:'الاسم الذي سيظهر على الشهادة',cert_fullname:'الاسم الكامل على الشهادة',cert_request:'طلب شهادتي',cert_retry:'إعادة الطلب',cert_view:'عرض شهادتي',cert_print:'طباعة / حفظ PDF',close:'إغلاق',c_overline:'شهادة نجاح رسمية',c_title:'شهادة نجاح',c_sub:'تُمنح هذه الشهادة بكل فخر إلى',c_sub2:'لإتمام التكوين بنجاح',c_date_l:'تاريخ الإصدار',c_sign_l:'الإدارة البيداغوجية',locale:'ar-MA',
 missing_lessons:'بقي {n} درس(دروس) لإكماله.',missing_quizzes:'بقي {n} اختبار(ات) للنجاح فيه.',form_incomplete:'أكمل جميع الدروس والاختبارات ثم أدخل اسمك الكامل.',name_required:'أدخل اسمك الكامل (حرفان على الأقل).',sending:'جارٍ إرسال طلبك...',progress_error:'تعذر حفظ التقدم. حاول مرة أخرى.',progress_noroute:'المسار « lesson-progress.update » غير موجود: لم يتم حفظ التقدم.',nav_dash:'لوحة التحكم',nav_formations:'تكويناتي',nav_quiz:'اختباراتي',nav_certs:'شهاداتي',nav_profile:'ملفي الشخصي',nav_settings:'الإعدادات',side_quote:'كل خطوة صغيرة تقرّبك من أهدافك الكبيرة!',side_cta:'تابع!',courses_l:'دروس',level_l:'المستوى:',content_title:'محتوى التكوين',desc_title:'وصف الدرس',progress_title:'تقدم التكوين',res_title:'الموارد',next_title:'الدرس التالي',help_title:'هل تحتاج إلى مساعدة؟',help_sub:'فريقنا هنا لمساعدتك.',help_btn:'اتصل بالدعم'
}};

let lang='fr',current=0,done=[],saving=false,toastTimer=null,sending=false;
const $=id=>document.getElementById(id);
const save=(k,v)=>{try{localStorage.setItem(STORE+k,JSON.stringify(v))}catch(e){}};
const load=(k,d)=>{try{const v=localStorage.getItem(STORE+k);return v?JSON.parse(v):d}catch(e){return d}};
const fmt=(s,n)=>String(s).replace('{n}',n);

const remainingLessons=()=>Math.max(0,TOTAL-done.length);
const remainingQuizzes=()=>QUIZ_CHECK?QUIZ_IDS.filter(id=>!PASSED_QUIZ_IDS.includes(id)).length:0;
const complete=()=>TOTAL>0&&remainingLessons()===0;
const eligible=()=>complete()&&remainingQuizzes()===0;

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
 done=[];
 COURSE_IDS.forEach((id,i)=>{if(set.has(Number(id)))done.push(i);});
}

function refreshStatus(){
 document.querySelectorAll('.li').forEach(b=>{
  const i=Number(b.dataset.go),l=b.querySelector('.ls');
  if(!l)return;
  let k='st_todo';
  if(done.includes(i))k='st_done';else if(i===current)k='st_current';else if(i===current+1)k='st_next';
  l.textContent=I18N[lang][k];
  l.className='ls '+k.replace('st_','s-');
 });
}

function ui(){
 const t=I18N[lang],n=done.length,pct=TOTAL?Math.round(n/TOTAL*100):0;
 const fg=$('ring-fg');if(fg)fg.style.strokeDashoffset=263.89*(1-pct/100);
 if($('ring-pct'))$('ring-pct').textContent=pct+'%';
 if($('ring-count'))$('ring-count').textContent=n+' / '+TOTAL;
 if($('side-pct'))$('side-pct').textContent=pct;
 if($('side-fill'))$('side-fill').style.width=pct+'%';
 if($('side-fill-2'))$('side-fill-2').style.width=pct+'%';
 const cur=document.querySelector('.li[data-go="'+current+'"]');
 if($('bc-lesson')&&cur)$('bc-lesson').textContent=t.lesson+' '+(current+1)+' : '+cur.dataset.title;
 const nx=document.querySelector('.li[data-go="'+(current+1)+'"]'),nc=$('next-card');
 if(nc){
  nc.style.display=nx?'':'none';
  if(nx){$('next-title').textContent=nx.dataset.title;$('next-meta').textContent=t.lesson+' '+(current+2)+' / '+TOTAL;}
 }
}

function validateCertForm(){
 const form=$('cert-request-form');
 if(!form)return false;
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

function refreshDone(){
 const t=I18N[lang],n=done.length,pct=TOTAL?Math.round(n/TOTAL*100):0;
 if($('done-pct'))$('done-pct').textContent=pct;
 if($('done-count'))$('done-count').textContent=n;
 if($('progress-fill'))$('progress-fill').style.width=pct+'%';

 document.querySelectorAll('.mark').forEach(b=>{
  const d=done.includes(Number(b.dataset.index)),lab=b.querySelector('.done-label');
  b.classList.toggle('is-done',d);
  b.setAttribute('aria-pressed',d?'true':'false');
  if(lab){lab.dataset.i18n=d?'marked':'mark';lab.textContent=t[d?'marked':'mark'];}
 });
 document.querySelectorAll('.li').forEach(b=>{
  const d=done.includes(Number(b.dataset.go)),ic=b.querySelector('.ci'),pi=b.querySelector('.pi');
  b.classList.toggle('done',d);
  if(ic)ic.classList.toggle('hidden',!d);
  if(pi)pi.classList.toggle('hidden',d);
 });
 refreshStatus();

 const hint=$('hero-cert-hint');
 if(hint){
  let k='hint_locked';
  if(CERT_STATUS==='active')k='hint_active';
  else if(CERT_STATUS==='pending')k='hint_pending';
  else if(eligible())k='hint_ready';
  hint.textContent=t[k];
 }

 const h=$('cert-heading');
 if(h){
  let ti,tx;
  if(!eligible()){ti=t.locked_title;tx=t.locked_text+' '+missingText();}
  else if(CERT_STATUS==='rejected'){ti=t.rejected_title;tx=t.rejected_text;}
  else{ti=t.ready_title;tx=t.ready_text;}
  h.textContent=ti;
  if($('cert-text'))$('cert-text').textContent=tx;
  const total=TOTAL+(QUIZ_CHECK?QUIZ_IDS.length:0),left=remainingLessons()+remainingQuizzes();
  if($('cert-fill'))$('cert-fill').style.width=(total?Math.round((total-left)/total*100):0)+'%';
  if($('cert-left'))$('cert-left').textContent=left;
 }
 validateCertForm();
 ui();
}

async function markLesson(i){
 if(saving||done.includes(i))return;
 const t=I18N[lang];
 if(!PROGRESS_URL){showNote(t.progress_noroute);return;}
 saving=true;
 document.querySelectorAll('.mark').forEach(b=>b.disabled=true);
 try{
  const res=await fetch(PROGRESS_URL.replace('__COURS_ID__',encodeURIComponent(COURSE_IDS[i])),{
   method:'POST',
   headers:{'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':CSRF_TOKEN,'X-Requested-With':'XMLHttpRequest'},
   credentials:'same-origin',
   body:JSON.stringify({completed:true})
  });
  let data={};
  try{data=await res.json();}catch(e){}
  if(!res.ok||(data&&data.success===false))throw new Error((data&&data.message)||'');
  const ids=data.completed_ids||data.completedIds;
  if(Array.isArray(ids))syncDoneFromIds(ids);
  else if(!done.includes(i))done.push(i);
 }catch(e){
  showNote((e&&e.message)||I18N[lang].progress_error);
 }finally{
  saving=false;
  document.querySelectorAll('.mark').forEach(b=>b.disabled=false);
  refreshDone();
 }
}

function fillCertificate(){
 if(CERT_STATUS!=='active'||!$('cert-sheet'))return;
 const t=I18N[lang],inp=$('cert-name-input'),name=(inp&&inp.value.trim())||'—';
 const d=CERT_DATE?new Date(CERT_DATE):new Date();
 const code=CERT_CODE||('EEL-'+FORMATION_ID+'-'+USER_ID+'-'+d.getFullYear()+String(d.getMonth()+1).padStart(2,'0'));
 [['c-overline','c_overline'],['c-title','c_title'],['c-sub','c_sub'],['c-sub2','c_sub2'],['c-date-l','c_date_l'],['c-sign-l','c_sign_l']].forEach(a=>{$(a[0]).textContent=t[a[1]];});
 $('c-name').textContent=name;$('c-code').textContent=code;
 $('c-date').textContent=d.toLocaleDateString(t.locale,{day:'numeric',month:'long',year:'numeric'});
}

function setupCertificateRequest(){
 const form=$('cert-request-form');
 if(!form)return;
 const btn=$('cert-request'),inp=$('request-cert-name'),msg=$('cert-request-message');
 if(!btn||!inp)return;
 inp.addEventListener('input',validateCertForm);
 form.addEventListener('submit',e=>{
  if(!validateCertForm()){
   e.preventDefault();
   if(msg)msg.textContent=I18N[lang].form_incomplete;
   return;
  }
  sending=true;
  btn.disabled=true;
  const sp=btn.querySelector('span');
  if(sp){sp.removeAttribute('data-i18n');sp.textContent=I18N[lang].sending;}
  if(msg)msg.textContent=I18N[lang].sending;
 });
 validateCertForm();
}

function setLang(l){
 lang=l;save('-lang',l);
 document.documentElement.lang=l;document.documentElement.dir=l==='ar'?'rtl':'ltr';
 document.querySelectorAll('[data-i18n]').forEach(e=>{const v=I18N[l][e.dataset.i18n];if(v)e.textContent=v;});
 if(sending){const sp=document.querySelector('#cert-request span');if(sp)sp.textContent=I18N[l].sending;}
 $('lang-fr').classList.toggle('on',l==='fr');$('lang-ar').classList.toggle('on',l==='ar');
 refreshDone();fillCertificate();
}

function go(i,scroll){
 if(i<0||i>=TOTAL)return;
 document.querySelectorAll('video').forEach(v=>v.pause());
 current=i;save('-current',i);
 document.querySelectorAll('.panel').forEach(p=>p.classList.toggle('show',Number(p.dataset.panel)===i));
 document.querySelectorAll('.li').forEach(b=>b.classList.toggle('active',Number(b.dataset.go)===i));
 refreshStatus();ui();
 if(scroll)window.scrollTo({top:0,behavior:'smooth'});
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
 if($('next-btn'))$('next-btn').addEventListener('click',()=>go(current+1,true));

 document.querySelectorAll('.panel').forEach(p=>{
  const tabs=p.querySelectorAll('.tab');
  tabs.forEach(t=>t.addEventListener('click',()=>{
   tabs.forEach(x=>{x.classList.remove('on');x.setAttribute('aria-selected','false');});
   t.classList.add('on');t.setAttribute('aria-selected','true');
   p.querySelectorAll('[data-tabpane]').forEach(x=>x.classList.toggle('hidden',x.dataset.tabpane!==t.dataset.tab));
  }));
  const segs=p.querySelectorAll('.seg-btn');
  segs.forEach(s=>s.addEventListener('click',()=>{
   p.querySelectorAll('video').forEach(v=>v.pause());
   segs.forEach(x=>x.classList.remove('on'));s.classList.add('on');
   p.querySelectorAll('.vpane').forEach(x=>x.classList.toggle('hidden',x.dataset.v!==s.dataset.v));
  }));
  p.querySelectorAll('.player').forEach(pl=>{
   const v=pl.querySelector('video');
   pl.querySelectorAll('.sp').forEach(b=>b.addEventListener('click',()=>{
    if(v)v.playbackRate=Number(b.dataset.speed);
    pl.querySelectorAll('.sp').forEach(x=>x.classList.remove('on'));b.classList.add('on');
   }));
  });
 });

 if(CERT_STATUS==='active'){
  const inp=$('cert-name-input'),m=$('cert-modal'),sn=load('-cert-name',null);
  if(inp){
   if(sn)inp.value=sn;
   inp.addEventListener('input',()=>{save('-cert-name',inp.value);fillCertificate();});
  }
  if($('cert-open'))$('cert-open').onclick=()=>{fillCertificate();m.classList.add('open');if(window.lucide)lucide.createIcons();};
  if($('cert-close'))$('cert-close').onclick=()=>m.classList.remove('open');
  m.addEventListener('click',e=>{if(e.target===m)m.classList.remove('open');});
  document.addEventListener('keydown',e=>{if(e.key==='Escape')m.classList.remove('open');});
  if($('cert-print'))$('cert-print').onclick=()=>{fillCertificate();window.print();};
 }

 setupCertificateRequest();
 const sl=Number(load('-current',0));
 current=sl>=0&&sl<TOTAL?sl:0;
 setLang(load('-lang','fr'));
 if(TOTAL>0)go(current,false);
 refreshDone();
});

(function(){
 var side=document.getElementById('side'),ov=document.getElementById('side-ov'),tg=document.getElementById('side-toggle');
 function t(o){side.classList.toggle('open',o);ov.classList.toggle('show',o)}
 if(tg)tg.addEventListener('click',function(){t(!side.classList.contains('open'))});
 if(ov)ov.addEventListener('click',function(){t(false)});
 side.querySelectorAll('a').forEach(function(a){a.addEventListener('click',function(){t(false)})});
 var q=document.getElementById('lesson-search');
 if(q)q.addEventListener('input',function(){
  var v=q.value.trim().toLowerCase();
  document.querySelectorAll('.li[data-go]').forEach(function(b){
   b.style.display=!v||b.textContent.toLowerCase().indexOf(v)>-1?'':'none'
  });
  if(v){
   var l=document.getElementById('liste-lecons');
   if(l&&window.innerWidth<1200)l.scrollIntoView({behavior:'smooth'})
  }
 });
})();
</script>
</body>
</html>