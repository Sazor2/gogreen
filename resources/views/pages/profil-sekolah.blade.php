@extends('layouts.app')

@section('title', __('app.profil_sek_title'))

@section('html_class', 'profil-page')

@section('content')

<style>
    /* Custom Modern Variables */
    :root {
        --primary-deep: #0a2f22;
        --primary-green: #006948;
        --accent-green: #a2f31f;
        --soft-bg: #f3f7fb;
        --card-shadow: 0 10px 25px -5px rgba(10, 47, 34, 0.08), 0 8px 10px -6px rgba(10, 47, 34, 0.06);
        --hover-shadow: 0 20px 25px -5px rgba(10, 47, 34, 0.16), 0 10px 10px -5px rgba(10, 47, 34, 0.1);
    }

    html.dark {
        --primary-deep: #0a0f12;
        --primary-green: #7ff3be;
        --accent-green: #a2f31f;
        --soft-bg: #0f1418;
        --card-shadow: 0 14px 28px rgba(0, 0, 0, 0.45);
        --hover-shadow: 0 22px 40px rgba(0, 0, 0, 0.6);
    }

    @media (min-width: 768px) {
        .md-grid-2col { grid-template-columns: 1fr 1fr !important; }
        .md-grid-3col { grid-template-columns: repeat(3, 1fr) !important; }
        .md-grid-4col { grid-template-columns: repeat(4, 1fr) !important; }
    }
    @media (min-width: 1024px) {
        .lg-grid-2col { grid-template-columns: 1fr 1fr !important; }
        .lg-grid-3col { grid-template-columns: repeat(3, 1fr) !important; }
        .lg-grid-bento-top { grid-template-columns: 2fr 1fr !important; }
        .lg-grid-bento-bot { grid-template-columns: 1fr 2fr !important; }
    }

    /* Refined Stat Card */
    .stat-card { 
        cursor: pointer; 
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        border: 1px solid rgba(6, 78, 59, 0.08);
    }
    .stat-card:hover { 
        background-color: var(--primary-deep) !important; 
        transform: translateY(-5px);
        box-shadow: var(--hover-shadow) !important;
    }
    .stat-card:hover .stat-icon,
    .stat-card:hover .stat-value { color: #f0fdf4 !important; }
    .stat-card:hover .stat-label { color: rgba(240, 253, 244, 0.7) !important; }

    /* Program Card Elevation */
    .program-card { 
        transition: all 0.4s ease; 
        border: 1px solid rgba(0,0,0,0.03);
    }
    .program-card:hover { 
        transform: translateY(-8px); 
        box-shadow: 0 20px 40px rgba(10, 47, 34, 0.16) !important;
        border-color: var(--primary-green);
    }

    /* Facility Card Softness */
    .facility-card { 
        transition: all 0.3s ease; 
        border: 1px solid #f1f5f9;
    }
    .facility-card:hover { 
        border-color: var(--primary-green) !important; 
        background-color: rgba(162, 243, 31, 0.12) !important;
        transform: scale(1.02);
    }

    /* Reveal Animation */
    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.5, 0, 0, 1), transform 0.8s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .reveal-delay-1 { transition-delay: 0.08s; }
    .reveal-delay-2 { transition-delay: 0.16s; }
    .reveal-delay-3 { transition-delay: 0.24s; }

    @keyframes floatSlow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 0 0 rgba(162, 243, 31, 0); }
        50% { box-shadow: 0 0 0 10px rgba(162, 243, 31, 0.15); }
    }

    @keyframes gradientFlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .floating-soft { animation: floatSlow 6s ease-in-out infinite; }
    .pulse-glow { animation: pulseGlow 2.4s ease-in-out infinite; }
    .gradient-animate {
        background-size: 200% 200%;
        animation: gradientFlow 8s ease infinite;
    }

    /* Bento Style Refinement */
    .bento-inner {
        border: 1px solid rgba(6, 78, 59, 0.05);
        box-shadow: var(--card-shadow);
    }

    html.dark.profil-page .stat-card {
        background-color: #11181e;
        border-color: #24313a;
    }

    html.dark.profil-page .program-card,
    html.dark.profil-page .facility-card,
    html.dark.profil-page .bento-inner {
        background-color: #11181e;
        border-color: #24313a;
    }

    html.dark.profil-page .facility-card:hover {
        background-color: rgba(127, 243, 190, 0.12) !important;
    }

    html.dark.profil-page [style*="background-color:#f8fafc"] { background-color: #0f1418 !important; }
    html.dark.profil-page [style*="background-color:#fcfdfc"] { background-color: #0f1418 !important; }
    html.dark.profil-page [style*="background-color:#f1f5f9"] { background-color: #141b21 !important; }
    html.dark.profil-page [style*="border:1px solid #f1f5f9"] { border-color: #24313a !important; }
    html.dark.profil-page [style*="border-top:1px solid #f1f5f9"] { border-top-color: #24313a !important; }
    html.dark.profil-page [style*="color:#0f172a"] { color: #e6edf3 !important; }
    html.dark.profil-page [style*="color:#64748b"] { color: #9aa7b2 !important; }
    html.dark.profil-page [style*="color:var(--primary-deep)"] { color: #e6edf3 !important; }
    html.dark.profil-page [style*="color:var(--primary-green)"] { color: #7ff3be !important; }
    html.dark.profil-page [style*="background-color:var(--primary-deep)"] { background-color: #1a232b !important; }
    html.dark.profil-page [style*="background-color:rgba(162,243,31,0.16)"] { background-color: rgba(127, 243, 190, 0.18) !important; }
    html.dark.profil-page [style*="background-color:rgba(162,243,31,0.12)"] { background-color: rgba(127, 243, 190, 0.12) !important; }
    html.dark.profil-page [style*="background-color:rgba(162,243,31,0.18)"] { background-color: rgba(127, 243, 190, 0.18) !important; }
    html.dark.profil-page [style*="background-color:rgba(162,243,31,0.2)"] { background-color: rgba(127, 243, 190, 0.2) !important; }

    @media (max-width: 768px) {
        .profil-identity-mobile {
            display: block !important;
        }

        .profil-hero-soft-center-line {
            display: block !important;
        }

        .profil-hero-overlay-left,
        .profil-hero-overlay-right {
            display: none !important;
        }

        .profil-hero-glow {
            display: none !important;
        }

        .profil-identity-desktop {
            display: none !important;
        }

        .profil-stat-grid {
            gap: 0.65rem !important;
        }

        .profil-stat-card {
            padding: 0.95rem 0.65rem !important;
            border-radius: 0.95rem !important;
        }

        .profil-stat-icon {
            font-size: 1.4rem !important;
            margin-bottom: 0.3rem !important;
        }

        .profil-stat-value {
            font-size: 1.2rem !important;
            line-height: 1.1;
        }

        .profil-stat-label {
            font-size: 0.6rem !important;
            letter-spacing: 0.07em !important;
        }

        .profil-ident-title {
            font-size: 1.6rem !important;
        }

        .profil-identity-top {
            grid-template-columns: 1.35fr 0.75fr !important;
            gap: 0.7rem !important;
            margin-bottom: 0.7rem !important;
        }

        .profil-identity-bottom {
            grid-template-columns: 1.2fr 0.8fr !important;
            gap: 0.7rem !important;
        }

        .profil-location-card,
        .profil-akred-card,
        .profil-npsn-card,
        .profil-status-card {
            padding: 1rem !important;
            border-radius: 1rem !important;
        }

        .profil-location-head {
            gap: 0.6rem !important;
            margin-bottom: 0.7rem !important;
        }

        .profil-location-head h3 {
            font-size: 0.95rem !important;
            line-height: 1.25;
        }

        .profil-location-head p {
            font-size: 0.68rem !important;
            line-height: 1.35;
        }

        .profil-map-wrap {
            height: 140px !important;
            border-radius: 0.75rem !important;
        }

        .profil-akred-label {
            font-size: 0.62rem !important;
            margin-bottom: 0.35rem !important;
        }

        .profil-akred-value {
            font-size: 2.15rem !important;
            line-height: 1 !important;
        }

        .profil-akred-note {
            font-size: 0.68rem !important;
            margin-top: 0.45rem !important;
        }

        .profil-npsn-stack {
            gap: 0.6rem !important;
        }

        .profil-npsn-stack p.text-\[10px\] {
            font-size: 0.58rem !important;
            letter-spacing: 0.08em !important;
        }

        .profil-npsn-stack p.font-black.text-lg {
            font-size: 0.96rem !important;
            line-height: 1.25;
            word-break: break-word;
        }

        .profil-status-card h3 {
            font-size: 0.95rem !important;
        }

        .profil-status-card p {
            font-size: 0.75rem !important;
            line-height: 1.3;
        }

        .profil-status-icon {
            padding: 0.5rem !important;
            border-radius: 0.7rem !important;
        }

        .profil-status-icon .material-symbols-outlined {
            font-size: 1.3rem !important;
        }

        .profil-vision-section,
        .profil-jurusan-section,
        .profil-green-section,
        .profil-facilities-section,
        .profil-org-section {
            padding-top: 3.75rem !important;
            padding-bottom: 3.75rem !important;
        }

        .profil-vision-grid {
            gap: 1.75rem !important;
        }

        .profil-vision-label {
            font-size: 0.68rem !important;
            letter-spacing: 0.16em !important;
            margin-bottom: 0.65rem !important;
        }

        .profil-vision-quote {
            font-size: 1.65rem !important;
            line-height: 1.2 !important;
        }

        .profil-misi-card {
            padding: 1.2rem !important;
            border-radius: 1.1rem !important;
        }

        .profil-misi-title {
            font-size: 1.05rem !important;
            margin-bottom: 1rem !important;
            gap: 0.5rem !important;
        }

        .profil-misi-list {
            gap: 0.8rem !important;
        }

        .profil-misi-item {
            gap: 0.6rem !important;
        }

        .profil-misi-item-index {
            width: 1.5rem !important;
            height: 1.5rem !important;
            border-radius: 0.5rem !important;
            font-size: 0.64rem !important;
        }

        .profil-misi-item-text {
            font-size: 0.8rem !important;
            line-height: 1.5 !important;
        }

        .profil-jurusan-head {
            margin-bottom: 2rem !important;
        }

        .profil-jurusan-sub {
            font-size: 0.58rem !important;
            letter-spacing: 0.16em !important;
            margin-bottom: 0.45rem !important;
        }

        .profil-jurusan-title {
            font-size: 1.7rem !important;
            line-height: 1.15 !important;
        }

        .profil-jurusan-grid {
            gap: 0.9rem !important;
        }

        .profil-jurusan-card {
            padding: 1rem !important;
            border-radius: 1rem !important;
        }

        .profil-jurusan-icon-wrap {
            width: 2.35rem !important;
            height: 2.35rem !important;
            border-radius: 0.7rem !important;
            margin-bottom: 0.7rem !important;
        }

        .profil-jurusan-icon {
            font-size: 1.2rem !important;
        }

        .profil-jurusan-name {
            font-size: 1rem !important;
            margin-bottom: 0.4rem !important;
        }

        .profil-jurusan-desc {
            font-size: 0.78rem !important;
            margin-bottom: 0.6rem !important;
            line-height: 1.45 !important;
        }

        .profil-jurusan-badge {
            padding: 0.3rem 0.6rem !important;
        }

        .profil-jurusan-badge-text {
            font-size: 0.64rem !important;
        }

        .profil-green-section {
            border-radius: 0 0 2rem 2rem !important;
        }

        .profil-green-grid-wrap {
            gap: 2rem !important;
        }

        .profil-green-sub {
            font-size: 0.62rem !important;
            letter-spacing: 0.16em !important;
            margin-bottom: 0.7rem !important;
        }

        .profil-green-title {
            font-size: 1.9rem !important;
            line-height: 1.15 !important;
            margin-bottom: 0.75rem !important;
        }

        .profil-green-desc {
            font-size: 0.86rem !important;
            margin-bottom: 1rem !important;
            line-height: 1.55 !important;
        }

        .profil-green-items {
            grid-template-columns: 1fr !important;
            gap: 0.75rem !important;
        }

        .profil-green-item {
            gap: 0.6rem !important;
        }

        .profil-green-item-icon-wrap {
            padding: 0.5rem !important;
            border-radius: 0.6rem !important;
        }

        .profil-green-item-icon {
            font-size: 1rem !important;
        }

        .profil-green-item-title {
            font-size: 0.76rem !important;
            margin-bottom: 0.1rem !important;
        }

        .profil-green-item-desc {
            font-size: 0.66rem !important;
            line-height: 1.3 !important;
        }

        .profil-green-image-wrap {
            border-radius: 1rem !important;
            transform: rotate(0.6deg) !important;
        }

        .profil-green-image {
            height: 280px !important;
        }
    }

    @media (max-width: 640px) {
        .profil-hero-wrap {
            margin-top: 1rem !important;
        }

        .profil-hero-section {
            min-height: 380px !important;
            border-radius: 1.25rem !important;
        }

        .profil-hero-content {
            padding: 2rem 1.25rem !important;
            max-width: none;
        }

        .profil-hero-title {
            font-size: 2.4rem !important;
            line-height: 1.1 !important;
            margin-bottom: 1rem !important;
        }

        .profil-hero-text {
            font-size: 0.95rem !important;
            margin-bottom: 1.5rem !important;
            line-height: 1.55;
        }
    }

    @media (min-width: 769px) {
        .profil-hero-soft-center-line {
            display: none !important;
        }

        .profil-identity-mobile {
            display: none !important;
        }

        .profil-identity-desktop {
            display: block !important;
        }
    }
</style>

{{-- Hero Section --}}
<div class="profil-hero-wrap relative w-full max-w-none sm:max-w-7xl mx-auto px-2 sm:px-6 md:px-8 mt-6 sm:mt-8">
    <section class="profil-hero-section relative mt-0 min-h-[420px] sm:min-h-[500px] overflow-hidden flex items-center text-white rounded-3xl reveal-on-scroll shadow-[0_32px_64px_rgba(10,47,34,0.15)] group">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img
                src="{{ asset('images/sekolahkb.png') }}"
                alt="Profil Sekolah Hero"
                class="w-full h-full object-cover"
            >
        </div>

        <div class="profil-hero-overlay-left absolute inset-y-0 left-0 w-full md:w-1/2 bg-gradient-to-r from-[#0a2f22]/90 via-[#0a2f22]/50 to-transparent z-10"></div>
        <div class="profil-hero-overlay-right absolute inset-y-0 right-0 w-full md:w-1/3 bg-gradient-to-l from-[#0a2f22]/90 via-[#0a2f22]/60 to-transparent z-10"></div>
        <div class="profil-hero-soft-center-line hidden absolute inset-y-0 left-1/2 -translate-x-1/2 w-[2px] bg-gradient-to-b from-white/0 via-white/28 to-white/0 blur-[1.2px] z-10 pointer-events-none"></div>
        <div class="profil-hero-glow absolute top-1/2 -translate-y-1/2 -right-20 w-[500px] h-[500px] bg-[#00ff88]/20 blur-[100px] rounded-full z-10 pointer-events-none"></div>

        <div class="profil-hero-content relative z-20 px-4 sm:px-8 md:px-12 max-w-none sm:max-w-2xl py-10 sm:py-12">
            <div class="profil-hero-badge inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white text-xs font-bold uppercase tracking-[0.15em] mb-4 sm:mb-6 shadow-lg transition-colors hover:bg-white/20 hover:border-white/50 cursor-default reveal-on-scroll reveal-delay-1">
                <span class="w-2.5 h-2.5 rounded-full bg-[#a2f31f] shadow-[0_0_10px_#a2f31f] pulse-glow"></span>
                {{ __('app.badge_environment_platform') }}
            </div>
            <h1 class="profil-hero-title text-[2.6rem] sm:text-[3.5rem] md:text-[5rem] font-extrabold leading-[1.05] tracking-tight mb-4 sm:mb-6 drop-shadow-2xl text-white reveal-on-scroll reveal-delay-2">
                {{ __('app.profil_sek_val_nama') }}
            </h1>
            <p class="profil-hero-text text-white/90 text-base sm:text-lg md:text-xl font-medium mb-6 sm:mb-10 leading-relaxed drop-shadow-md max-w-xl reveal-on-scroll reveal-delay-3">
                {{ __('app.profil_sek_hero_tagline') }}
            </p>
        </div>

    </section>
</div>

{{-- Floating Statistics --}}
<section class="px-4 sm:px-6 lg:px-8" style="position:relative;margin-top:2rem;z-index:20;">
    <div class="profil-stat-grid max-w-7xl mx-auto md-grid-4col" style="display:grid;grid-template-columns:repeat(2, 1fr);gap:1.25rem;">
        @foreach([
            ['icon' => 'groups',       'value' => '320+', 'label' => __('app.profil_sek_stat_siswa')],
            ['icon' => 'school',       'value' => '13',   'label' => __('app.profil_sek_stat_guru')],
            ['icon' => 'meeting_room', 'value' => '8',   'label' => __('app.profil_sek_stat_kelas')],
            ['icon' => 'history',      'value' => '2020', 'label' => __('app.profil_sek_stat_tahun')],
        ] as $stat)
        <div class="profil-stat-card stat-card bg-white flex flex-col items-center text-center reveal-on-scroll floating-soft" style="padding:32px 20px;border-radius:24px;box-shadow:var(--card-shadow);animation-delay: {{ $loop->index * 0.12 }}s;">
            <span class="profil-stat-icon stat-icon material-symbols-outlined" style="font-size:2.8rem;color:var(--primary-deep);margin-bottom:12px;opacity:0.8;">{{ $stat['icon'] }}</span>
            <h3 class="profil-stat-value stat-value text-4xl font-black tracking-tighter" style="color:#0f172a;">{{ $stat['value'] }}</h3>
            <p class="profil-stat-label stat-label text-[10px] font-black uppercase tracking-widest mt-1" style="color:#64748b;">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Identity Bento Grid --}}
<section class="profil-identity-desktop px-4 sm:px-6 lg:px-8" style="padding-top:6rem;padding-bottom:6rem;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center" style="margin-bottom:4rem;">
            <h2 class="profil-ident-title font-black text-4xl tracking-tight" style="color:var(--primary-deep);">{{ __('app.profil_sek_identitas') }}</h2>
            <div style="width:4rem;height:5px;background-color:var(--accent-green);border-radius:9999px;margin:12px auto 0;"></div>
        </div>

        {{-- Top row: Location + Accreditation --}}
        <div class="profil-identity-top lg-grid-bento-top" style="display:grid;grid-template-columns:1fr;gap:1.5rem;margin-bottom:1.5rem;">
            <div class="profil-location-card bg-white reveal-on-scroll reveal-delay-1 bento-inner" style="padding:2.5rem;border-radius:32px;">
                <div class="profil-location-head" style="display:flex;align-items:center;gap:1.5rem;margin-bottom:2rem;">
                    <div style="background-color:rgba(162,243,31,0.16);padding:16px;border-radius:20px;color:var(--primary-deep);">
                        <span class="material-symbols-outlined" style="font-size:2rem;font-variation-settings:'FILL' 1;">location_on</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-black" style="color:#0f172a;">{{ __('app.profil_sek_lokasi_title') }}</h3>
                        <p class="font-medium text-slate-500">{{ __('app.profil_sek_val_alamat') }}, {{ __('app.profil_sek_val_kota') }}</p>
                    </div>
                </div>
                <div class="profil-map-wrap" style="border-radius:24px;overflow:hidden;border:1px solid #f1f5f9;height:300px;filter:grayscale(0.2);">
                    <iframe src="https://maps.google.com/maps?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat&output=embed&z=17&hl=id" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="profil-akred-card text-white reveal-on-scroll reveal-delay-2 shadow-xl gradient-animate" style="background: linear-gradient(135deg, var(--primary-deep), var(--primary-green));padding:3rem;border-radius:32px;position:relative;overflow:hidden;display:flex;flex-direction:column;justify-content:center;">
                <span class="material-symbols-outlined" style="position:absolute;right:-20px;bottom:-20px;font-size:12rem;color:rgba(255,255,255,0.05);transform:rotate(-15deg);">verified_user</span>
                <div style="position:relative;z-index:10;">
                    <h3 class="profil-akred-label text-xs font-black uppercase tracking-[0.2em] mb-4 opacity-70">{{ __('app.profil_sek_akreditasi') }}</h3>
                    <div class="profil-akred-value font-black italic" style="font-size:6rem;line-height:1;">{{ __('app.profil_sek_val_akred') }}</div>
                    <p class="profil-akred-note font-bold text-emerald-200 mt-4">{{ __('app.profil_sek_akred_label') }}</p>
                </div>
            </div>
        </div>

        {{-- Bottom row: NPSN + Status --}}
        <div class="profil-identity-bottom lg-grid-bento-bot" style="display:grid;grid-template-columns:1fr;gap:1.5rem;">
            <div class="profil-npsn-card bg-white reveal-on-scroll reveal-delay-1 bento-inner" style="padding:2.5rem;border-radius:32px;">
                <div class="profil-npsn-stack" style="display:flex;flex-direction:column;gap:1.5rem;">
                    <div style="display:flex;align-items:center;gap:16px;">
                        <span class="material-symbols-outlined text-slate-400">tag</span>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">{{ __('app.profil_sek_npsn') }}</p>
                            <p class="font-black text-lg text-slate-800">{{ __('app.profil_sek_val_npsn') }}</p>
                        </div>
                    </div>
                    <div style="height:1px;background-color:#f1f5f9;"></div>
                    <div style="display:flex;align-items:center;gap:16px;">
                        <span class="material-symbols-outlined text-slate-400">school</span>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">{{ __('app.profil_sek_jenjang') }}</p>
                            <p class="font-black text-lg text-slate-800">{{ __('app.profil_sek_val_jenjang') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profil-status-card reveal-on-scroll reveal-delay-2" style="background-color:rgba(162,243,31,0.12);padding:2.5rem;border-radius:32px;border:1px solid rgba(0,105,72,0.18);display:flex;align-items:center;gap:2rem;flex-wrap:wrap;">
                <div class="profil-status-icon" style="background-color:var(--primary-deep);color:white;padding:20px;border-radius:24px;box-shadow:0 10px 20px rgba(6,78,59,0.2);">
                    <span class="material-symbols-outlined" style="font-size:2.5rem;">account_balance</span>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-slate-800">{{ __('app.profil_sek_status') }}</h3>
                    <p class="font-bold italic" style="color:var(--primary-green);">{{ __('app.profil_sek_status_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Identity Mobile Layout (Map sendiri, Akreditasi+NPSN bersebelahan, Status sendiri) --}}
<section class="profil-identity-mobile px-4 sm:px-6" style="padding-top:3.75rem;padding-bottom:3.75rem;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center" style="margin-bottom:1.6rem;">
            <h2 class="profil-ident-title font-black text-3xl tracking-tight" style="color:var(--primary-deep);">{{ __('app.profil_sek_identitas') }}</h2>
            <div style="width:3rem;height:4px;background-color:var(--accent-green);border-radius:9999px;margin:10px auto 0;"></div>
        </div>

        <div class="profil-location-card bg-white reveal-on-scroll bento-inner" style="padding:1rem;border-radius:1rem;margin-bottom:0.75rem;">
            <div class="profil-location-head" style="display:flex;align-items:center;gap:0.6rem;margin-bottom:0.7rem;">
                <div style="background-color:rgba(162,243,31,0.16);padding:9px;border-radius:12px;color:var(--primary-deep);">
                    <span class="material-symbols-outlined" style="font-size:1.2rem;font-variation-settings:'FILL' 1;">location_on</span>
                </div>
                <div>
                    <h3 class="text-base font-black" style="color:#0f172a;line-height:1.25;">{{ __('app.profil_sek_lokasi_title') }}</h3>
                    <p class="font-medium text-slate-500" style="font-size:0.72rem;line-height:1.35;">{{ __('app.profil_sek_val_alamat') }}, {{ __('app.profil_sek_val_kota') }}</p>
                </div>
            </div>
            <div class="profil-map-wrap" style="border-radius:12px;overflow:hidden;border:1px solid #f1f5f9;height:145px;filter:grayscale(0.2);">
                <iframe src="https://maps.google.com/maps?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat&output=embed&z=17&hl=id" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div style="display:grid;grid-template-columns:0.82fr 1.18fr;gap:0.7rem;margin-bottom:0.75rem;">
            <div class="profil-akred-card text-white reveal-on-scroll gradient-animate" style="background: linear-gradient(135deg, var(--primary-deep), var(--primary-green));padding:1rem;border-radius:1rem;position:relative;overflow:hidden;display:flex;flex-direction:column;justify-content:center;">
                <div style="position:relative;z-index:10;">
                    <h3 class="profil-akred-label text-[10px] font-black uppercase tracking-[0.14em] mb-1.5 opacity-80">{{ __('app.profil_sek_akreditasi') }}</h3>
                    <div class="profil-akred-value font-black italic" style="font-size:2.15rem;line-height:1;">{{ __('app.profil_sek_val_akred') }}</div>
                    <p class="profil-akred-note font-bold text-emerald-200 mt-1.5" style="font-size:0.66rem;">{{ __('app.profil_sek_akred_label') }}</p>
                </div>
            </div>

            <div class="profil-npsn-card bg-white reveal-on-scroll bento-inner" style="padding:1rem;border-radius:1rem;">
                <div class="profil-npsn-stack" style="display:flex;flex-direction:column;gap:0.55rem;">
                    <div style="display:flex;align-items:center;gap:8px;">
                        <span class="material-symbols-outlined text-slate-400" style="font-size:1rem;">tag</span>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">{{ __('app.profil_sek_npsn') }}</p>
                            <p class="font-black text-slate-800" style="font-size:0.9rem;line-height:1.25;">{{ __('app.profil_sek_val_npsn') }}</p>
                        </div>
                    </div>
                    <div style="height:1px;background-color:#f1f5f9;"></div>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <span class="material-symbols-outlined text-slate-400" style="font-size:1rem;">school</span>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-wider text-slate-400">{{ __('app.profil_sek_jenjang') }}</p>
                            <p class="font-black text-slate-800" style="font-size:0.9rem;line-height:1.25;">{{ __('app.profil_sek_val_jenjang') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="profil-status-card reveal-on-scroll" style="background-color:rgba(162,243,31,0.12);padding:1rem;border-radius:1rem;border:1px solid rgba(0,105,72,0.18);display:flex;align-items:center;gap:0.75rem;">
            <div class="profil-status-icon" style="background-color:var(--primary-deep);color:white;padding:10px;border-radius:12px;box-shadow:0 8px 16px rgba(6,78,59,0.2);">
                <span class="material-symbols-outlined" style="font-size:1.2rem;">account_balance</span>
            </div>
            <div>
                <h3 class="font-black text-slate-800" style="font-size:1rem;line-height:1.2;">{{ __('app.profil_sek_status') }}</h3>
                <p class="font-bold italic" style="color:var(--primary-green);font-size:0.76rem;line-height:1.3;">{{ __('app.profil_sek_status_desc') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Vision & Mission --}}
<section class="profil-vision-section px-4 sm:px-6 lg:px-8" style="padding-top:7rem;padding-bottom:7rem;background-color:#fcfdfc;border-top:1px solid #f1f5f9;">
    <div class="profil-vision-grid max-w-7xl mx-auto lg-grid-2col" style="display:grid;grid-template-columns:1fr;gap:4rem;align-items:center;">
        <div class="reveal-on-scroll reveal-delay-1">
            <h2 class="profil-vision-label font-black text-sm uppercase tracking-[0.3em] mb-6" style="color:var(--accent-green);">{{ __('app.profil_sek_visi_title') }}</h2>
            <blockquote class="profil-vision-quote text-4xl md:text-5xl font-black leading-[1.1] italic tracking-tight" style="color:var(--primary-deep);">
                "{{ __('app.profil_sek_visi') }}"
            </blockquote>
        </div>
        <div class="profil-misi-card bg-white reveal-on-scroll reveal-delay-2 shadow-2xl" style="padding:3.5rem;border-radius:40px;border:1px solid rgba(0,0,0,0.02);">
            <h2 class="profil-misi-title font-black text-3xl flex items-center gap-4 mb-10" style="color:var(--primary-deep);">
                <span class="material-symbols-outlined p-2 rounded-xl" style="background-color:rgba(162,243,31,0.2);">assignment</span>
                {{ __('app.profil_sek_misi_title') }}
            </h2>
            <ul class="profil-misi-list" style="display:flex;flex-direction:column;gap:2rem;">
                @foreach([__('app.profil_sek_m1'), __('app.profil_sek_m2'), __('app.profil_sek_m3'), __('app.profil_sek_m4'), __('app.profil_sek_m5')] as $i => $m)
                <li class="profil-misi-item" style="display:flex;gap:20px;">
                    <div class="profil-misi-item-index" style="flex-shrink:0;width:36px;height:36px;background-color:var(--primary-deep);color:white;border-radius:12px;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:14px;box-shadow:0 4px 10px rgba(6,78,59,0.2);">{{ $i + 1 }}</div>
                    <p class="profil-misi-item-text font-semibold text-slate-600 leading-relaxed">{{ $m }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- Program Keahlian --}}
<section class="profil-jurusan-section px-4 sm:px-6 lg:px-8" style="padding-top:7rem;padding-bottom:7rem;">
    <div class="max-w-7xl mx-auto">
        <div class="profil-jurusan-head text-center" style="margin-bottom:5rem;">
            <p class="profil-jurusan-sub font-black uppercase tracking-[0.4em] text-[10px] mb-4" style="color:var(--accent-green);">{{ __('app.profil_sek_jurusan_sub') }}</p>
            <h2 class="profil-jurusan-title font-black text-5xl tracking-tight" style="color:#0f172a;">{{ __('app.profil_sek_jurusan') }}</h2>
        </div>
        <div class="profil-jurusan-grid md-grid-3col" style="display:grid;grid-template-columns:1fr;gap:2rem;">
            @foreach([
                ['name' => __('app.jurusan_rpl'), 'icon' => 'code', 'desc' => __('app.jurusan_rpl_desc'), 'rombel' => 3],
                ['name' => __('app.jurusan_perhotelan'), 'icon' => 'domain', 'desc' => __('app.jurusan_perhotelan_desc'), 'rombel' => 2],
                ['name' => __('app.jurusan_tsm'), 'icon' => 'two_wheeler', 'desc' => __('app.jurusan_tsm_desc'), 'rombel' => 3],
            ] as $j)
            <div class="profil-jurusan-card program-card bg-white reveal-on-scroll" style="padding:2.5rem;border-radius:32px;box-shadow:var(--card-shadow);transition-delay: {{ $loop->index * 0.06 }}s;">
                <div class="profil-jurusan-icon-wrap" style="width:70px;height:70px;background-color:#f8fafc;border-radius:20px;display:flex;align-items:center;justify-content:center;margin-bottom:2rem;color:var(--primary-deep);">
                    <span class="profil-jurusan-icon material-symbols-outlined" style="font-size:2.2rem;">{{ $j['icon'] }}</span>
                </div>
                <h3 class="profil-jurusan-name text-2xl font-black mb-4" style="color:#0f172a;">{{ $j['name'] }}</h3>
                <p class="profil-jurusan-desc text-sm font-medium text-slate-500 mb-6 leading-relaxed">{{ $j['desc'] }}</p>
                <div class="profil-jurusan-badge flex items-center gap-2 px-4 py-2 rounded-full w-fit" style="background-color:rgba(162,243,31,0.18);">
                    <div class="w-1.5 h-1.5 rounded-full" style="background-color:var(--primary-green);"></div>
                    <span class="profil-jurusan-badge-text text-xs font-black" style="color:var(--primary-green);">{{ $j['rombel'] }} {{ __('app.jurusan_rombel_label') }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Go Green Program --}}
<section class="profil-green-section px-4 sm:px-6 lg:px-8" style="padding-top:7rem;padding-bottom:7rem;background-color:var(--primary-deep);position:relative;overflow:hidden;border-radius:0 0 4rem 4rem;">
    <div style="position:absolute;inset:0;opacity:0.03;pointer-events:none;">
        <span class="material-symbols-outlined" style="font-size:15rem;position:absolute;top:-5%;right:-2%;">eco</span>
    </div>
    <div class="profil-green-grid-wrap max-w-7xl mx-auto lg-grid-2col" style="position:relative;z-index:10;display:grid;grid-template-columns:1fr;gap:5rem;align-items:center;">
        <div class="reveal-on-scroll reveal-delay-1">
            <span class="profil-green-sub font-black uppercase tracking-[0.3em] text-xs text-emerald-300 mb-6 block">{{ __('app.profil_sek_green_sub') }}</span>
            <h2 class="profil-green-title text-white font-black text-6xl leading-tight mb-8">{{ __('app.profil_sek_green_title') }}</h2>
            <p class="profil-green-desc text-xl text-emerald-100 opacity-80 mb-12 leading-relaxed">{{ __('app.profil_sek_green_desc') }}</p>
            <div class="profil-green-items" style="display:grid;grid-template-columns:1fr 1fr;gap:2rem;">
                @foreach([
                    ['icon' => 'park',      'title' => __('app.profil_sek_gp1'), 'desc' => __('app.profil_sek_gp1_desc')],
                    ['icon' => 'recycling', 'title' => __('app.profil_sek_gp2'), 'desc' => __('app.profil_sek_gp2_desc')],
                    ['icon' => 'grass',     'title' => __('app.profil_sek_gp3'), 'desc' => __('app.profil_sek_gp3_desc')],
                    ['icon' => 'compost',   'title' => __('app.profil_sek_gp5'), 'desc' => __('app.profil_sek_gp5_desc')],
                ] as $gp)
                <div class="profil-green-item" style="display:flex;align-items:flex-start;gap:16px;">
                    <div class="profil-green-item-icon-wrap" style="background-color:rgba(255,255,255,0.1);padding:12px;border-radius:14px;color:var(--accent-green);">
                        <span class="profil-green-item-icon material-symbols-outlined" style="font-size:1.2rem;">{{ $gp['icon'] }}</span>
                    </div>
                    <div>
                        <h4 class="profil-green-item-title text-white font-black text-sm mb-1 tracking-tight">{{ $gp['title'] }}</h4>
                        <p class="profil-green-item-desc text-emerald-100/50 text-[11px] leading-snug">{{ $gp['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="reveal-on-scroll reveal-delay-2 floating-soft" style="position:relative;">
            <div class="profil-green-image-wrap" style="border-radius:40px;overflow:hidden;box-shadow:0 30px 60px rgba(0,0,0,0.3);transform:rotate(1.5deg);">
                <img class="profil-green-image" alt="School garden" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpUteCe7oq-_NWPXFTGa3wBSlRTtMqR9VK_SgQ9y9FuIiZ_K1B50ZwO_kX6Y0XOdaEsR-7d8tTF_tvnbldu473VuptNqIPxygU0cmwfrl2JQeC4X8lbdIDQWmSiDtajZZ-hugynYKdF9fHeLlQkTAqSSvE4aLRY1O0VSrKQWpFuqHPccz793ejScHWpeLWGoUTry_3GflHCGY1boyV_W-km8DbVLWKi9RVneH1PuTWCLxrDrfplFubNyUMD3pjQoI5An51F_tn9Ydb" style="width:100%;height:550px;object-fit:cover;">
            </div>
        </div>
    </div>
</section>

{{-- Facilities --}}
<section class="profil-facilities-section px-4 sm:px-6 lg:px-8" style="padding-top:7rem;padding-bottom:7rem;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center" style="margin-bottom:5rem;">
            <h2 class="font-black text-4xl mb-4" style="color:#0f172a;">{{ __('app.profil_sek_fasilitas_title') }}</h2>
            <p class="text-slate-500 font-medium max-w-2xl mx-auto">{{ __('app.profil_sek_fasilitas_sub') }}</p>
        </div>
        <div class="md-grid-4col" style="display:grid;grid-template-columns:repeat(2, 1fr);gap:1.5rem;">
            @foreach([
                ['name' => __('app.fasilitas_lab'),      'icon' => 'computer'],
                ['name' => __('app.fasilitas_perpus'),   'icon' => 'menu_book'],
                ['name' => __('app.fasilitas_lapangan'), 'icon' => 'sports_soccer'],
                ['name' => __('app.fasilitas_kelas'),    'icon' => 'meeting_room'],
                ['name' => __('app.fasilitas_taman'),    'icon' => 'park'],
                ['name' => __('app.fasilitas_kantin'),   'icon' => 'restaurant'],
                ['name' => __('app.fasilitas_parkir'),   'icon' => 'two_wheeler'],
            ] as $f)
            <div class="facility-card bg-white text-center reveal-on-scroll" style="padding:40px 20px;border-radius:24px;box-shadow:var(--card-shadow);transition-delay: {{ $loop->index * 0.05 }}s;">
                <span class="material-symbols-outlined" style="font-size:3rem;color:var(--primary-deep);margin-bottom:20px;display:block;">{{ $f['icon'] }}</span>
                <h4 class="font-black text-xs uppercase tracking-widest text-slate-700">{{ $f['name'] }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Organizational Structure --}}
<section class="profil-org-section px-4 sm:px-6 lg:px-8" style="padding-top:7rem;padding-bottom:7rem;background-color:#f8fafc;border-radius:4rem 4rem 0 0;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center" style="margin-bottom:5rem;">
            <h2 class="font-black text-4xl mb-4" style="color:#0f172a;">{{ __('app.profil_sek_struktur') }}</h2>
            <p class="text-slate-500 font-medium">{{ __('app.profil_sek_struktur_sub') }}</p>
        </div>

        {{-- Kepala Sekolah --}}
        <div class="text-center" style="margin-bottom:5rem;">
            <div class="bg-white reveal-on-scroll reveal-delay-1" style="display:inline-block;padding:3.5rem 4rem;border-radius:40px;box-shadow:var(--card-shadow);border-top:10px solid var(--primary-deep);">
                <div style="width:120px;height:120px;background-color:#f1f5f9;border-radius:50%;margin:0 auto 24px;display:flex;align-items:center;justify-content:center;color:#cbd5e1;">
                    <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="Go Green Logo" style="width:70%;height:70%;object-fit:contain;">
                </div>
                <h4 class="font-black text-2xl mb-1 text-slate-800">Bill Yosua, S.Pd.,M.Pd.,Gr</h4>
                <p class="font-black text-sm uppercase tracking-widest" style="color:var(--accent-green);">{{ __('app.profil_sek_kepsek') }}</p>
            </div>
        </div>

        {{-- Wakasek & Pembina --}}
        <div class="md-grid-2col" style="display:grid;grid-template-columns:1fr;gap:2rem;max-width:60rem;margin:0 auto;">
            @foreach([
                ['jabatan' => __('app.profil_sek_wakasek'), 'nama' => 'Yandora Elisda, S.Psi'],
                ['jabatan' => __('app.profil_sek_pembina'), 'nama' => 'Fiersia Vinderly'],
            ] as $org)
            <div class="bg-white text-center reveal-on-scroll" style="padding:3rem 2rem;border-radius:32px;box-shadow:var(--card-shadow);transition-delay: {{ $loop->index * 0.08 }}s;">
                <div style="width:86px;height:86px;background-color:#f1f5f9;border-radius:50%;margin:0 auto 20px;display:flex;align-items:center;justify-content:center;color:#cbd5e1;">
                    <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="Go Green Logo" style="width:70%;height:70%;object-fit:contain;">
                </div>
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-6">{{ $org['jabatan'] }}</p>
                <h4 class="font-black text-xl text-slate-800 italic tracking-tight">{{ $org['nama'] }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    // Reveal on Scroll Animation Setup
    window.setupRevealOnScroll = function () {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal-on-scroll').forEach((el) => observer.observe(el));
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', window.setupRevealOnScroll);
    } else {
        window.setupRevealOnScroll();
    }
</script>

@endsection