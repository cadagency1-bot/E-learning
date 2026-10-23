<!DOCTYPE html>
<html lang="fr" dir="ltr" data-lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mon espace étudiant - ÉtudeEnLigne</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@0.462.0/dist/umd/lucide.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,600&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{fontFamily:{sans:['Plus Jakarta Sans','IBM Plex Sans Arabic','sans-serif']},colors:{fo:{50:'#eef6f1',100:'#d7ebdf',200:'#b0d6c0',400:'#3fa876',500:'#1f8a5b',600:'#17734c',700:'#0f5a3c',800:'#0b4630',900:'#073323',950:'#052619'}}}}};
</script>
<style>
*,*::before,*::after{box-sizing:border-box}
html{scroll-behavior:smooth;scroll-padding-top:84px}
body{margin:0;font-family:'Plus Jakarta Sans','IBM Plex Sans Arabic',sans-serif;background:#fff;color:#14281f;-webkit-font-smoothing:antialiased;line-height:1.6}
html[dir=rtl] body{font-family:'IBM Plex Sans Arabic','Plus Jakarta Sans',sans-serif;line-height:1.8}
:focus-visible{outline:3px solid #1f8a5b;outline-offset:2px;border-radius:8px}
html[data-lang=fr] .t-ar{display:none!important}
html[data-lang=ar] .t-fr{display:none!important}
html[dir=rtl] .flip{transform:scaleX(-1)}
.nl{padding:6px 2px;font-size:13px;font-weight:600;color:#3d5a4d;white-space:nowrap;border-bottom:2px solid transparent}
.nl:hover,.nl.on{color:#0f5a3c;border-color:#1f8a5b}
.lb{padding:4px 10px;border-radius:8px;font-size:12px;font-weight:700;color:#3d5a4d}
.lb.on{background:#0f5a3c;color:#fff}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:10px 18px;border-radius:8px;font-size:13px;font-weight:700;transition:background .15s,color .15s;cursor:pointer}
.bp{background:#1f8a5b;color:#fff}.bp:hover{background:#17734c}
.bg{background:rgba(255,255,255,.08);color:#fff;border:1px solid rgba(255,255,255,.4)}.bg:hover{background:rgba(255,255,255,.18)}
.bd{background:#0b4630;color:#fff}.bd:hover{background:#1f8a5b}
.bs{background:#eef6f1;color:#0f5a3c;border:1px solid #b0d6c0}.bs:hover{background:#d7ebdf}
.bw{background:#fff;color:#0b4630}.bw:hover{background:#d7ebdf}
.bb{width:100%}
.card{background:#fff;border:1px solid #e3ece7;border-radius:14px;box-shadow:0 2px 12px rgba(11,70,48,.06)}
.hero{background:linear-gradient(90deg,rgba(5,38,25,.95) 0%,rgba(7,51,35,.78) 48%,rgba(7,51,35,.1) 100%),url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1800&q=80') center/cover}
html[dir=rtl] .hero{background:linear-gradient(270deg,rgba(5,38,25,.95) 0%,rgba(7,51,35,.78) 48%,rgba(7,51,35,.1) 100%),url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1800&q=80') center/cover}
.script{font-style:italic;font-weight:600;color:#4ade80}
.ib{display:flex;align-items:center;justify-content:center;width:38px;height:38px;flex-shrink:0;border-radius:10px;background:#eef6f1;color:#17734c}
.ibw{background:#fff;box-shadow:0 4px 12px rgba(0,0,0,.18)}
.pc{transition:box-shadow .2s,border-color .2s}
.pc:hover{box-shadow:0 14px 30px rgba(11,70,48,.15);border-color:#86c9a3}
.pc img{transition:transform .5s}.pc:hover img{transform:scale(1.05)}
.fb{padding:7px 16px;border-radius:8px;font-size:12.5px;font-weight:700;color:#3d5a4d;background:#fff;border:1px solid #dbe8e0}
.fb.on{background:#0f5a3c;color:#fff;border-color:#0f5a3c}
.tile{transition:background .15s,transform .15s}.tile:hover{background:#d7ebdf;transform:translateY(-2px)}
.eb{display:flex;align-items:center;gap:8px;font-size:11px;font-weight:700;color:#1f8a5b;margin-bottom:8px}
.eb::before{content:"";width:20px;height:2px;background:currentColor}.eb.l{color:#4ade80}
.glass{background:rgba(255,255,255,.12);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,.25);border-radius:16px}
.impact{background:linear-gradient(rgba(5,38,25,.9),rgba(5,38,25,.86)),url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1600&q=70') center/cover}
.cta{background:linear-gradient(90deg,rgba(7,51,35,.95),rgba(15,90,60,.8)),url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1600&q=70') center/cover}
.ring-i{display:flex;align-items:center;justify-content:center;width:46px;height:46px;border-radius:12px;border:1px solid rgba(255,255,255,.3);background:rgba(255,255,255,.08);color:#86efac}
.tip{transition:box-shadow .2s,transform .2s}.tip:hover{box-shadow:0 14px 30px rgba(11,70,48,.14);transform:translateY(-3px)}
.ns{scrollbar-width:none}.ns::-webkit-scrollbar{display:none}
@@media (prefers-reduced-motion:reduce){html{scroll-behavior:auto}.pc,.pc img,.tile,.tip{transition:none}}
</style>
</head>
<body>
@php
$student=auth()->user();
$certs = $student->certificates()
    ->whereIn('status', ['active', 'approved'])
    ->get()
    ->keyBy('formation_id');
$certOf = function ($id) use ($certs) {
    $certificate = $certs->get($id);

    if (!$certificate) {
        return 'none';
    }

    $status = $certificate->status ?? 'none';

    if (in_array($status, ['active', 'approved'], true)) {
        return 'active';
    }

    return $status;
};
$txt=fn($f)=>\Illuminate\Support\Str::ascii(strtolower(($f->category??'').' '.($f->name??'')));
$has=fn($t,$words)=>collect($words)->contains(fn($w)=>str_contains($t,$w));
$img=function($f)use($txt,$has){$t=$txt($f);
 if($has($t,['medical','sante','soin','patient','diabete','personne agee']))return 'photo-1576091160399-112ba8d25d1d';
 if($has($t,['hotel','restauration','cuisine','restaurant']))return 'photo-1555396273-367ea4eb4db5';
 if($has($t,['programmation','informatique','developpement','web','design','digital','reseau']))return 'photo-1498050108023-c5249f4df085';
 if($has($t,['secretariat','commerce','bureautique','gestion','entreprise','administrative']))return 'photo-1497366754035-f200968a6e72';
 if($has($t,['construction','batiment','mecanique','menuiserie','artisanat','platre','electricite']))return 'photo-1504307651254-35680f356dfd';
 if($has($t,['ingenierie','ingenieur','industriel']))return 'photo-1581091226825-a6a2a5aee158';
 return 'photo-1516321318423-f06f85e504b3';};
$icon=function($f)use($txt,$has){$t=$txt($f);
 if($has($t,['medical','sante']))return 'heart-pulse';
 if($has($t,['hotel','restauration']))return 'utensils';
 if($has($t,['programmation','informatique','web','digital']))return 'laptop';
 if($has($t,['commerce','secretariat']))return 'briefcase-business';
 return 'graduation-cap';};
$sfs=$student->formations()->get()->keyBy('id');
$total=isset($allFormations)?$allFormations->count():0;
$nActive=$sfs->filter(fn($f)=>($f->pivot->status??'')==='active')->count();
$nPending=$sfs->filter(fn($f)=>($f->pivot->status??'')==='pending')->count();
$nCerts = $certs->filter(function ($c) {
    return in_array($c->status ?? '', ['active', 'approved'])
        && !empty($c->file_path);
})->count();
$activeList=isset($allFormations)?$allFormations->filter(fn($f)=>(($sfs->get($f->id)->pivot->status??'')==='active')):collect();
@endphp





<header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-fo-100">
 <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="flex items-center justify-between gap-3 h-16">
   <a href="{{ route('home') }}" class="flex items-center gap-2.5 min-w-0">
    <span class="flex items-center justify-center w-9 h-9 rounded-lg bg-fo-700 text-white shrink-0"><i data-lucide="graduation-cap" class="w-5 h-5"></i></span>
    <span class="leading-tight"><span class="block text-[15px] font-extrabold text-fo-900">Étude<span class="text-fo-500">EnLigne</span></span><span class="hidden sm:block text-[10px] font-semibold text-slate-500"><span class="t-fr">Espace d'apprentissage</span><span class="t-ar">فضاؤك للتعلم</span></span></span>
   </a>
   <nav class="hidden md:flex items-center gap-6" aria-label="Navigation">
    <a href="#accueil" class="nl on"><span class="t-fr">Accueil</span><span class="t-ar">الرئيسية</span></a>
    <a href="#formations" class="nl"><span class="t-fr">Mes formations</span><span class="t-ar">تكويناتي</span></a>
    <a href="#parcours" class="nl"><span class="t-fr">Parcours</span><span class="t-ar">المسار</span></a>
    <a href="#certificats" class="nl"><span class="t-fr">Certificats</span><span class="t-ar">الشهادات</span></a>
    <a href="{{ route('profile.edit') }}" class="nl"><span class="t-fr">Mon profil</span><span class="t-ar">ملفي</span></a>
   </nav>
   <div class="flex items-center gap-2 sm:gap-3">
    <div class="flex rounded-lg bg-fo-50 p-1 border border-fo-100"><button type="button" id="lang-fr" class="lb">FR</button><button type="button" id="lang-ar" class="lb">عربي</button></div>
    <a href="{{ route('profile.edit') }}"
   class="hidden sm:flex items-center justify-center w-9 h-9 rounded-full overflow-hidden border-2 border-fo-200 bg-fo-100 shrink-0"
   title="Mon profil">

    @if($student->profile_photo_path)
        <img
            src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($student->profile_photo_path) }}"
            alt="Photo de profil"
            class="w-full h-full object-cover"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
        >

        <span
            class="w-full h-full items-center justify-center text-fo-800 font-extrabold text-sm"
            style="display:none;">
            {{ mb_strtoupper(mb_substr($student->name ?? 'E', 0, 1)) }}
        </span>
    @else
        <span class="flex items-center justify-center w-full h-full text-fo-800 font-extrabold text-sm">
            {{ mb_strtoupper(mb_substr($student->name ?? 'E', 0, 1)) }}
        </span>
    @endif

</a>
    <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="btn bp !px-3 sm:!px-4"><i data-lucide="log-out" class="w-4 h-4"></i><span class="hidden sm:inline"><span class="t-fr">Déconnexion</span><span class="t-ar">تسجيل الخروج</span></span></button></form>
   </div>
  </div>
  <nav class="md:hidden ns flex items-center gap-5 overflow-x-auto pb-2" aria-label="Navigation mobile">
   <a href="#accueil" class="nl on"><span class="t-fr">Accueil</span><span class="t-ar">الرئيسية</span></a>
   <a href="#formations" class="nl"><span class="t-fr">Formations</span><span class="t-ar">التكوينات</span></a>
   <a href="#certificats" class="nl"><span class="t-fr">Certificats</span><span class="t-ar">الشهادات</span></a>
   <a href="{{ route('profile.edit') }}" class="nl"><span class="t-fr">Profil</span><span class="t-ar">ملفي</span></a>
  </nav>
 </div>
</header>



@if (session('certificate_message'))
    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 text-xl">
                ✓
            </div>

            <div>
                <h3 class="font-bold">
                    Bonjour {{ auth()->user()->name }} !
                </h3>

                <p class="text-sm">
                    {{ session('certificate_message') }}
                </p>
            </div>
        </div>
    </div>
@endif


<main>
<!-- HERO -->
<section id="accueil" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
 <div class="hero relative rounded-3xl px-6 sm:px-12 pt-14 pb-32 text-white">
  <div class="max-w-xl">
   <p class="text-[11px] font-bold tracking-wide text-emerald-200 mb-3"><span class="t-fr">Apprendre · Progresser · Réussir</span><span class="t-ar">تعلّم · تقدّم · انجح</span></p>
   <h1 class="text-3xl sm:text-5xl font-extrabold leading-[1.1] mb-4">
    <span class="t-fr">Bonjour {{ $student->name }},<br>votre réussite commence <span class="script">ici.</span></span>
    <span class="t-ar">مرحباً {{ $student->name }}،<br>نجاحك يبدأ <span class="script">من هنا.</span></span>
   </h1>
   <p class="t-fr text-emerald-50/85 text-sm sm:text-base">Suivez vos cours en ligne, téléchargez vos supports, passez vos quiz et obtenez votre certificat.</p>
   <p class="t-ar text-emerald-50/85 text-sm sm:text-base">تابع دروسك، حمّل ملفاتك، اجتز الاختبارات واحصل على شهادتك.</p>
   <div class="flex flex-wrap gap-3 mt-6">
    <a href="#formations" class="btn bp"><span class="t-fr">Voir mes formations</span><span class="t-ar">عرض تكويناتي</span><i data-lucide="arrow-right" class="w-4 h-4 flip"></i></a>
    <a href="#certificats" class="btn bg"><i data-lucide="award" class="w-4 h-4"></i><span class="t-fr">Mes certificats</span><span class="t-ar">شهاداتي</span></a>
   </div>
  </div>
 <div class="glass hidden lg:flex absolute end-10 bottom-28 items-center gap-3 px-5 py-4 text-white">
  <span class="flex items-center justify-center w-11 h-11 rounded-xl bg-white/15"><i data-lucide="sparkles" class="w-5 h-5 text-emerald-200"></i></span>
  <div class="leading-tight"><p class="script text-xl"><span class="t-fr">Plus qu'un cours</span><span class="t-ar">أكثر من دورة</span></p><p class="text-xs text-emerald-100/80"><span class="t-fr">Une vraie montée en compétences</span><span class="t-ar">تطوير حقيقي للمهارات</span></p></div>
 </div>
 </div>
 <div class="card relative -mt-16 mx-3 sm:mx-10 grid grid-cols-2 lg:grid-cols-4 gap-y-1 lg:divide-x lg:divide-fo-100 rtl:lg:divide-x-reverse">
  @foreach([['library',$total,'Formations','التكوينات'],['check-circle-2',$nActive,'Actives','مفعّلة'],['clock',$nPending,'En attente','قيد الانتظار'],['award',$nCerts,'Certificats','الشهادات']] as $s)
  <div class="flex items-center gap-3 p-4 sm:p-5"><span class="ib"><i data-lucide="{{ $s[0] }}" class="w-5 h-5"></i></span><div class="leading-tight"><p class="text-xl font-extrabold text-fo-900">{{ $s[1] }}</p><p class="text-xs text-slate-500"><span class="t-fr">{{ $s[2] }}</span><span class="t-ar">{{ $s[3] }}</span></p></div></div>
  @endforeach
 </div>
</section>

<!-- RACCOURCIS -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">
 <div class="grid lg:grid-cols-2 gap-8 items-center">
  <div>
   <p class="eb"><span class="t-fr">VOTRE ESPACE</span><span class="t-ar">فضاؤك</span></p><h2 class="text-2xl sm:text-3xl font-extrabold text-fo-900 leading-tight"><span class="t-fr">Explorez vos formations</span><span class="t-ar">استكشف تكويناتك</span></h2>
   <p class="t-fr text-sm text-slate-500 mt-3 max-w-md">Cours vidéo, documents PDF et quiz : tout ce qu'il faut pour valider vos modules, au même endroit.</p>
   <p class="t-ar text-sm text-slate-500 mt-3 max-w-md">دروس بالفيديو، ملفات PDF واختبارات: كل ما تحتاجه لإتمام وحداتك في مكان واحد.</p>
   <a href="#formations" class="btn bd mt-5"><span class="t-fr">Voir les formations</span><span class="t-ar">عرض التكوينات</span><i data-lucide="arrow-right" class="w-4 h-4 flip"></i></a>
  </div>
  <div class="relative">
   <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1100&q=80" alt="" class="w-full h-60 sm:h-72 object-cover rounded-2xl" loading="lazy">
   <div class="card absolute bottom-4 start-4 flex items-center gap-3 px-4 py-3"><span class="ib"><i data-lucide="play-circle" class="w-5 h-5"></i></span><div class="leading-tight"><p class="text-sm font-bold text-fo-900"><span class="t-fr">Apprentissage pratique</span><span class="t-ar">تعلّم تطبيقي</span></p><p class="text-xs text-slate-500"><span class="t-fr">Compétences concrètes</span><span class="t-ar">مهارات عملية</span></p></div></div>
  </div>
 </div>
 <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mt-8">
  @foreach([['book-open','#formations','Formations','التكوينات','Vos programmes','برامجك'],['file-text','#formations','Cours','الدروس','Vidéos et PDF','فيديو وPDF'],['clipboard-check','#formations','Quiz','الاختبارات','Évaluez-vous','قيّم نفسك'],['award','#certificats','Certificats','الشهادات','Votre réussite','نجاحك'],['user-round',route('profile.edit'),'Profil','الملف','Vos informations','معلوماتك']] as $t)
  <a href="{{ $t[1] }}" class="tile rounded-xl bg-fo-50 p-4 text-center"><i data-lucide="{{ $t[0] }}" class="w-6 h-6 mx-auto text-fo-600"></i><p class="text-sm font-bold text-fo-900 mt-2"><span class="t-fr">{{ $t[2] }}</span><span class="t-ar">{{ $t[3] }}</span></p><p class="text-[11px] text-slate-500"><span class="t-fr">{{ $t[4] }}</span><span class="t-ar">{{ $t[5] }}</span></p></a>
  @endforeach
 </div>
</section>

<!-- PARCOURS -->
<section id="parcours" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">
 <div class="rounded-3xl bg-fo-800 text-white overflow-hidden grid lg:grid-cols-[1fr_1.1fr]">
  <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1000&q=80" alt="" class="w-full h-56 lg:h-full object-cover" loading="lazy">
  <div class="p-6 sm:p-10">
   <h2 class="text-2xl font-extrabold"><span class="t-fr">Un parcours en 3 étapes</span><span class="t-ar">مسار في 3 مراحل</span></h2>
   <div class="mt-5 space-y-4">
    @foreach([['key-round','Demandez l\'accès','اطلب الوصول','L\'administration active votre formation.','تقوم الإدارة بتفعيل تكوينك.'],['play-circle','Suivez cours et quiz','تابع الدروس والاختبارات','Terminez toutes les leçons à votre rythme.','أكمل جميع الدروس بوتيرتك.'],['award','Obtenez votre certificat','احصل على شهادتك','Demandez-le, l\'administration l\'active.','اطلبها وستفعّلها الإدارة.']] as $st)
    <div class="flex items-start gap-3"><span class="flex items-center justify-center w-10 h-10 rounded-xl bg-white/10 shrink-0"><i data-lucide="{{ $st[0] }}" class="w-5 h-5 text-emerald-200"></i></span><div><p class="font-bold text-sm"><span class="t-fr">{{ $st[1] }}</span><span class="t-ar">{{ $st[2] }}</span></p><p class="text-xs text-emerald-100/75"><span class="t-fr">{{ $st[3] }}</span><span class="t-ar">{{ $st[4] }}</span></p></div></div>
    @endforeach
   </div>
  </div>
 </div>
</section>

<!-- FORMATIONS -->
<section id="formations" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">
 @foreach(['formation_message'=>'check-circle-2','certificate_message'=>'award'] as $k=>$ic)
  @if(session($k))<div class="mb-4 rounded-xl border border-fo-200 bg-fo-50 p-4 text-sm font-medium text-fo-800 flex items-center gap-3"><i data-lucide="{{ $ic }}" class="w-5 h-5 text-fo-500 shrink-0"></i><span>{{ session($k) }}</span></div>@endif
 @endforeach
 @if(session('error'))<div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-800 flex items-center gap-3"><i data-lucide="alert-circle" class="w-5 h-5 text-rose-600 shrink-0"></i><span>{{ session('error') }}</span></div>@endif

 <div class="rounded-3xl bg-fo-800 px-6 sm:px-10 pt-8 pb-16 text-white">
  <p class="eb l"><span class="t-fr">NOS FORMATIONS</span><span class="t-ar">تكويناتنا</span></p><h2 class="text-2xl sm:text-3xl font-extrabold"><span class="t-fr">Trouvez la bonne formation</span><span class="t-ar">اعثر على التكوين المناسب</span></h2>
  <p class="t-fr text-sm text-emerald-100/80 mt-2">Retrouvez ici la liste de vos programmes d'études.</p>
  <p class="t-ar text-sm text-emerald-100/80 mt-2">تجد هنا قائمة البرامج الدراسية الخاصة بك.</p>
 </div>
 <div class="card -mt-10 mx-2 sm:mx-6 p-4 sm:p-6">
  <div class="flex flex-wrap gap-2 mb-5" role="group">
   <button type="button" class="fb on" data-filter="all"><span class="t-fr">Toutes</span><span class="t-ar">الكل</span></button>
   <button type="button" class="fb" data-filter="active"><span class="t-fr">Actives</span><span class="t-ar">مفعّلة</span></button>
   <button type="button" class="fb" data-filter="pending"><span class="t-fr">En attente</span><span class="t-ar">قيد الانتظار</span></button>
   <button type="button" class="fb" data-filter="locked"><span class="t-fr">Verrouillées</span><span class="t-ar">مقفلة</span></button>
  </div>
  @if(isset($allFormations)&&$allFormations->count()>0)
  <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
   @foreach($allFormations as $formation)
   @php
    $sf=$sfs->get($formation->id);$st=$sf?($sf->pivot->status??'locked'):'locked';
    $isA=$st==='active';$isP=$st==='pending';$isR=$st==='rejected';
    $fk=$isA?'active':($isP?'pending':'locked');
    $nc=$formation->cours->count();$nq=($formation->quizzes??collect())->count();
   @endphp
   <article class="pc card flex flex-col overflow-hidden" data-status="{{ $fk }}">
    <div class="relative h-36 overflow-hidden bg-fo-100">
     <img src="https://images.unsplash.com/{{ $img($formation) }}?auto=format&fit=crop&w=900&q=75" alt="{{ $formation->name }}" class="w-full h-full object-cover" loading="lazy">
     <span class="ib ibw absolute bottom-3 start-3"><i data-lucide="{{ $icon($formation) }}" class="w-[18px] h-[18px]"></i></span>
     <span class="absolute top-3 end-3 inline-flex items-center gap-1 rounded-md px-2.5 py-1 text-xs font-bold {{ $isA?'bg-fo-500 text-white':($isP?'bg-amber-300 text-amber-950':'bg-fo-900/80 text-white') }}">
      <i data-lucide="{{ $isA?'check':($isP?'clock':'lock') }}" class="w-3 h-3"></i>
      @if($isA)<span class="t-fr">Activée</span><span class="t-ar">مفعّل</span>@elseif($isP)<span class="t-fr">En attente</span><span class="t-ar">قيد الانتظار</span>@else<span class="t-fr">Verrouillée</span><span class="t-ar">مقفل</span>@endif
     </span>
    </div>
    <div class="p-4 flex flex-col flex-1">
     <p class="text-xs font-semibold text-fo-500">{{ $formation->category ?: 'Formation' }}</p>
     <h3 class="text-base font-bold text-fo-900 leading-snug mt-0.5">{{ $formation->name }}</h3>
     <p class="text-sm text-slate-500 mt-1.5 mb-3 line-clamp-2">{{ $formation->description ?: 'Accédez aux cours et documents pour progresser.' }}</p>
     <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs font-semibold text-fo-700 mb-4">
      <span class="inline-flex items-center gap-1.5"><i data-lucide="book-open" class="w-4 h-4 text-fo-500"></i>{{ $nc }} <span class="t-fr">cours</span><span class="t-ar">دروس</span></span>
      <span class="inline-flex items-center gap-1.5"><i data-lucide="clipboard-check" class="w-4 h-4 text-fo-500"></i>{{ $nq }} <span class="t-fr">quiz</span><span class="t-ar">اختبارات</span></span>
      @if(!empty($formation->duration))<span class="inline-flex items-center gap-1.5"><i data-lucide="calendar-clock" class="w-4 h-4 text-fo-500"></i>{{ $formation->duration }}</span>@endif
     </div>
     <div class="mt-auto">
     @if($isA)
      <a href="{{ route('formations.learn',$formation) }}" class="btn bd bb"><i data-lucide="play-circle" class="w-4 h-4"></i><span class="t-fr">Commencer la formation</span><span class="t-ar">ابدأ التكوين</span></a>
     @elseif($isP)
      <div class="rounded-xl border border-amber-200 bg-amber-50 p-3 flex gap-3"><i data-lucide="clock" class="w-5 h-5 text-amber-600 shrink-0"></i><div><p class="font-bold text-amber-900 text-sm"><span class="t-fr">Demande en attente</span><span class="t-ar">الطلب قيد الانتظار</span></p><p class="t-fr text-xs text-amber-800">L'administration étudie votre demande.</p><p class="t-ar text-xs text-amber-800">تدرس الإدارة طلبك.</p></div></div>
     @else
      @if($isR)<p class="text-xs font-bold text-rose-700 mb-2"><span class="t-fr">Demande refusée : vous pouvez la renvoyer.</span><span class="t-ar">تم رفض الطلب: يمكنك إعادة إرساله.</span></p>@endif
      <form action="{{ route('formations.request',$formation) }}" method="POST">@csrf<button type="submit" class="btn bs bb"><i data-lucide="{{ $isR?'send':'lock' }}" class="w-4 h-4"></i><span class="t-fr">{{ $isR?'Demander à nouveau':"Demander l'accès" }}</span><span class="t-ar">{{ $isR?'إعادة الطلب':'طلب الوصول' }}</span></button></form>
     @endif
     </div>
    </div>
   </article>
   @endforeach
  </div>
  <p id="filterEmpty" class="hidden text-center text-sm text-slate-500 py-6"><span class="t-fr">Aucune formation dans cette catégorie.</span><span class="t-ar">لا توجد تكوينات في هذه الفئة.</span></p>
  @else
  <div class="py-10 text-center"><i data-lucide="book-open" class="w-8 h-8 mx-auto text-fo-500"></i><h3 class="font-bold text-fo-900 mt-3"><span class="t-fr">Aucune formation disponible</span><span class="t-ar">لا توجد تكوينات متاحة</span></h3><p class="t-fr text-sm text-slate-500">Les formations apparaîtront ici.</p><p class="t-ar text-sm text-slate-500">ستظهر التكوينات هنا.</p></div>
  @endif
 </div>
</section>

<!-- IMPACT -->
@php $nCours=$activeList->sum(fn($f)=>$f->cours->count()); $nQuiz=$activeList->sum(fn($f)=>($f->quizzes??collect())->count()); @endphp
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">
 <div class="impact rounded-3xl text-white px-6 sm:px-10 py-10">
  <div class="text-center max-w-xl mx-auto"><h2 class="text-2xl sm:text-3xl font-extrabold"><span class="t-fr">Votre parcours en chiffres</span><span class="t-ar">مسارك بالأرقام</span></h2><p class="t-fr text-sm text-emerald-100/80 mt-2">Un aperçu de ce que vous pouvez suivre dès maintenant.</p><p class="t-ar text-sm text-emerald-100/80 mt-2">لمحة عمّا يمكنك متابعته الآن.</p></div>
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mt-8 text-center">
   @foreach([['book-open',$nActive,'Formations actives','تكوينات مفعّلة'],['file-text',$nCours,'Cours disponibles','دروس متاحة'],['clipboard-check',$nQuiz,'Quiz à passer','اختبارات'],['award',$nCerts,'Certificats obtenus','شهادات']] as $i)
   <div class="flex flex-col items-center"><span class="ring-i"><i data-lucide="{{ $i[0] }}" class="w-5 h-5"></i></span><p class="text-3xl sm:text-4xl font-extrabold mt-3 leading-none">{{ $i[1] }}</p><p class="text-xs text-emerald-100/80 mt-2"><span class="t-fr">{{ $i[2] }}</span><span class="t-ar">{{ $i[3] }}</span></p></div>
   @endforeach
  </div>
 </div>
</section>

<!-- CERTIFICATS -->
<section id="certificats" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">
 <div class="rounded-3xl bg-fo-900 text-white p-6 sm:p-10">
  <div class="max-w-2xl mb-6">
   <h2 class="text-2xl font-extrabold"><span class="t-fr">Mes certificats</span><span class="t-ar">شهاداتي</span></h2>
   <p class="t-fr text-sm text-emerald-100/80 mt-2">Terminez toutes les leçons d'une formation, puis demandez votre certificat depuis la page du cours. L'administration l'active ensuite.</p>
   <p class="t-ar text-sm text-emerald-100/80 mt-2">أكمل جميع دروس التكوين ثم اطلب شهادتك من صفحة الدورة، وستفعّلها الإدارة.</p>
  </div>
  @if($activeList->count()>0)
  <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-4">
   @foreach($activeList as $formation)
   @php $cs=$certOf($formation->id); $url=route('formations.learn',$formation).'#certificat'; @endphp
   <div class="rounded-2xl bg-white text-fo-900 p-5 flex flex-col">
    <div class="flex items-start gap-3 mb-4"><span class="ib"><i data-lucide="award" class="w-5 h-5"></i></span><div class="min-w-0"><h3 class="text-sm font-bold leading-snug">{{ $formation->name }}</h3><p class="text-xs text-slate-500">{{ $formation->category ?: 'Formation' }}</p></div></div>
    <div class="mt-auto">
@if($cs === 'active')
    <p class="inline-flex items-center gap-1.5 text-xs font-bold text-fo-600 mb-3">
        <i data-lucide="badge-check" class="w-4 h-4"></i>
        <span class="t-fr">Certificat activé</span>
        <span class="t-ar">الشهادة مفعّلة</span>
    </p>

    @php
        $certificate = $certs->get($formation->id);
    @endphp

    @if($certificate && !empty($certificate->file_path))
        <a href="{{ route('student.certificates.download', $certificate->id) }}"
           class="btn bp bb">
            <i data-lucide="download" class="w-4 h-4"></i>
            <span class="t-fr">Télécharger mon certificat PDF</span>
            <span class="t-ar">تحميل الشهادة PDF</span>
        </a>
    @else
        <p class="text-xs text-amber-700">
            <span class="t-fr">Le fichier PDF n'est pas encore disponible.</span>
            <span class="t-ar">ملف الشهادة PDF غير متوفر حالياً.</span>
        </p>
    @endif
     @elseif($cs==='pending')
      <div class="rounded-xl border border-amber-200 bg-amber-50 p-3 flex gap-2.5"><i data-lucide="clock" class="w-4 h-4 text-amber-600 shrink-0 mt-0.5"></i><div><p class="text-xs font-bold text-amber-900"><span class="t-fr">Demande en attente</span><span class="t-ar">الطلب قيد الانتظار</span></p><p class="t-fr text-xs text-amber-800">L'administration étudie votre demande.</p><p class="t-ar text-xs text-amber-800">تدرس الإدارة طلبك.</p></div></div>
     @elseif($cs==='rejected')
      <p class="text-xs font-bold text-rose-700 mb-3"><span class="t-fr">Demande refusée. Vous pouvez la renvoyer.</span><span class="t-ar">تم رفض الطلب. يمكنك إعادة إرساله.</span></p>
      <a href="{{ $url }}" class="btn bs bb"><i data-lucide="send" class="w-4 h-4 flip"></i><span class="t-fr">Demander à nouveau</span><span class="t-ar">إعادة الطلب</span></a>
     @else
      <a href="{{ $url }}" class="btn bd bb"><i data-lucide="award" class="w-4 h-4"></i><span class="t-fr">Demander le certificat</span><span class="t-ar">طلب الشهادة</span></a>
     @endif
    </div>
   </div>
   @endforeach
  </div>
  @else
  <div class="rounded-2xl bg-white/10 border border-white/15 p-8 text-center"><i data-lucide="award" class="w-8 h-8 mx-auto text-emerald-200"></i><h3 class="font-bold mt-3"><span class="t-fr">Aucun certificat disponible</span><span class="t-ar">لا توجد شهادات متاحة</span></h3><p class="t-fr text-sm text-emerald-100/80 mt-1">Activez une formation pour demander son certificat.</p><p class="t-ar text-sm text-emerald-100/80 mt-1">فعّل تكوينًا لطلب شهادته.</p></div>
  @endif
 </div>
</section>

<!-- CONSEILS -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">
 <div class="flex items-end justify-between gap-4 mb-5"><div><p class="eb"><span class="t-fr">CONSEILS</span><span class="t-ar">نصائح</span></p><h2 class="text-2xl font-extrabold text-fo-900"><span class="t-fr">Réussir ses études en ligne</span><span class="t-ar">كيف تنجح في دراستك عن بُعد</span></h2></div></div>
 <div class="grid md:grid-cols-3 gap-4">
  @foreach([['photo-1434030216411-0b793f4b4173','Organisation','تنظيم','Planifiez un créneau fixe','خصص وقتاً ثابتاً','Quelques minutes chaque jour valent mieux qu\'une longue session le week-end.','دقائق قليلة كل يوم أفضل من جلسة طويلة في نهاية الأسبوع.'],['photo-1456513080510-7bf3a84b82f8','Méthode','منهجية','Prenez des notes en regardant','دوّن ملاحظات أثناء المشاهدة','Reprenez les PDF des leçons pour fixer les points importants.','استعن بملفات PDF لتثبيت النقاط المهمة.'],['photo-1517048676732-d65bc937f952','Évaluation','تقييم','Révisez avant chaque quiz','راجع قبل كل اختبار','Les quiz valident vos acquis et préparent votre certificat.','الاختبارات تثبّت مكتسباتك وتهيئك للشهادة.']] as $c)
  <article class="tip card overflow-hidden"><img src="https://images.unsplash.com/{{ $c[0] }}?auto=format&fit=crop&w=800&q=70" alt="" class="w-full h-40 object-cover" loading="lazy"><div class="p-5"><p class="text-xs font-bold text-fo-500"><span class="t-fr">{{ $c[1] }}</span><span class="t-ar">{{ $c[2] }}</span></p><h3 class="font-bold text-fo-900 mt-1 leading-snug"><span class="t-fr">{{ $c[3] }}</span><span class="t-ar">{{ $c[4] }}</span></h3><p class="t-fr text-sm text-slate-500 mt-2">{{ $c[5] }}</p><p class="t-ar text-sm text-slate-500 mt-2">{{ $c[6] }}</p></div></article>
  @endforeach
 </div>
</section>

<!-- CTA -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">
 <div class="cta rounded-3xl text-white p-8 sm:p-12 flex flex-wrap items-center justify-between gap-5">
  <div class="max-w-lg"><h2 class="text-xl sm:text-2xl font-extrabold"><span class="t-fr">Besoin d'aide ?</span><span class="t-ar">هل تحتاج إلى مساعدة؟</span></h2><p class="t-fr text-sm text-emerald-50/85 mt-1">Si un cours, un quiz ou un certificat ne s'affiche pas, vérifiez le statut de votre formation ou contactez l'administration du centre.</p><p class="t-ar text-sm text-emerald-50/85 mt-1">إذا لم يظهر درس أو اختبار أو شهادة، تحقق من حالة تكوينك أو تواصل مع إدارة المركز.</p></div>
  <a href="#formations" class="btn bw"><span class="t-fr">Mes formations</span><span class="t-ar">تكويناتي</span><i data-lucide="arrow-right" class="w-4 h-4 flip"></i></a>
 </div>
</section>
</main>

<footer class="mt-14 bg-fo-950 text-emerald-100/75 text-xs">
 <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid gap-6 sm:grid-cols-3">
  <div><p class="text-base font-extrabold text-white">Étude<span class="text-fo-400">EnLigne</span></p><p class="mt-2"><span class="t-fr">Espace d'apprentissage en ligne</span><span class="t-ar">منصة التعلم عبر الإنترنت</span></p></div>
  <div class="space-y-1.5"><p class="font-bold text-white"><span class="t-fr">Liens rapides</span><span class="t-ar">روابط سريعة</span></p><a href="#formations" class="block hover:text-white"><span class="t-fr">Mes formations</span><span class="t-ar">تكويناتي</span></a><a href="#certificats" class="block hover:text-white"><span class="t-fr">Certificats</span><span class="t-ar">الشهادات</span></a><a href="{{ route('profile.edit') }}" class="block hover:text-white"><span class="t-fr">Mon profil</span><span class="t-ar">ملفي</span></a></div>
  <p class="sm:text-end">&copy; {{ date('Y') }} ÉtudeEnLigne. <span class="t-fr">Tous droits réservés.</span><span class="t-ar">جميع الحقوق محفوظة.</span></p>
 </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded',()=>{
 const h=document.documentElement,fr=document.getElementById('lang-fr'),ar=document.getElementById('lang-ar');
 function setL(l){const a=l==='ar';h.dataset.lang=a?'ar':'fr';h.dir=a?'rtl':'ltr';h.lang=a?'ar':'fr';ar.classList.toggle('on',a);fr.classList.toggle('on',!a);try{localStorage.setItem('etude_lang',a?'ar':'fr')}catch(e){}}
 let s='fr';try{s=localStorage.getItem('etude_lang')||'fr'}catch(e){}
 setL(s);fr.onclick=()=>setL('fr');ar.onclick=()=>setL('ar');
 const cards=document.querySelectorAll('[data-status]'),em=document.getElementById('filterEmpty');
 document.querySelectorAll('.fb').forEach(b=>b.addEventListener('click',()=>{
  document.querySelectorAll('.fb').forEach(x=>x.classList.remove('on'));b.classList.add('on');let v=0;
  cards.forEach(c=>{const ok=b.dataset.filter==='all'||c.dataset.status===b.dataset.filter;c.style.display=ok?'':'none';if(ok)v++});
  if(em)em.classList.toggle('hidden',v>0);
 }));
 if(window.lucide)lucide.createIcons();
});
</script>
</body>
</html>