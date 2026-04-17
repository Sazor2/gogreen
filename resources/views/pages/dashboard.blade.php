@extends('layouts.app')

@section('title', __('app.dashboard_title'))

@section('html_class', 'dashboard-page')

@section('content')

<style>
    /* Glass Effect dari ECO-VIBE */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
    }

    /* Animasi Reveal on Scroll (Solusi #2) */
    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.5, 0, 0, 1), transform 0.8s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Floating Neon Leaves Animation - dengan 3D Rotation */
    @keyframes float-leaf {
        0%, 100% { 
            transform: translateY(0px) rotateZ(0deg) rotateY(0deg); 
            opacity: 0.8; 
        }
        25% { 
            transform: translateY(-30px) rotateZ(90deg) rotateY(25deg); 
            opacity: 1; 
        }
        50% { 
            transform: translateY(-60px) rotateZ(180deg) rotateY(-10deg); 
            opacity: 0.9; 
        }
        75% { 
            transform: translateY(-30px) rotateZ(270deg) rotateY(20deg); 
            opacity: 1; 
        }
    }
    
    .floating-leaf {
        animation: float-leaf 8s ease-in-out infinite;
        filter: drop-shadow(0 0 12px rgba(0, 255, 136, 0.6));
        perspective: 1000px;
        transform-style: preserve-3d;
    }
    
    .leaf-1 { animation-delay: 0s; }
    .leaf-2 { animation-delay: 2s; }
    .leaf-3 { animation-delay: 4s; }
    .leaf-4 { animation-delay: 6s; }

    html.dark.dashboard-page .dashboard-key-title {
        color: #dfffea !important;
        text-shadow: 0 2px 12px rgba(127, 243, 190, 0.15);
    }

    html.dark.dashboard-page .dashboard-nav-icon--bright {
        color: #98f5cd !important;
        text-shadow: 0 0 12px rgba(127, 243, 190, 0.4);
    }

    html.dark.dashboard-page .dashboard-nav-card .dashboard-nav-label {
        color: #b6c3cf;
    }

    .dashboard-desc-badge {
        transition: all 0.3s ease;
    }

    html.dark.dashboard-page .dashboard-desc-badge {
        background: rgba(14, 42, 32, 0.92);
        border-color: rgba(127, 243, 190, 0.7);
        color: #ddfff0;
        box-shadow: 0 0 16px rgba(127, 243, 190, 0.48), inset 0 0 12px rgba(127, 243, 190, 0.16);
    }

    html.dark.dashboard-page .dashboard-desc-badge .material-symbols-outlined {
        color: #7ff3be;
        text-shadow: 0 0 14px rgba(127, 243, 190, 0.8);
    }

    .dashboard-intro-badge {
        transition: all 0.3s ease;
    }

    html.dark.dashboard-page .dashboard-intro-badge {
        background: rgba(14, 42, 32, 0.92);
        border-color: rgba(127, 243, 190, 0.7);
        color: #ddfff0;
        box-shadow: 0 0 16px rgba(127, 243, 190, 0.48), inset 0 0 12px rgba(127, 243, 190, 0.16);
    }

    html.dark.dashboard-page .dashboard-intro-badge .material-symbols-outlined {
        color: #7ff3be;
        text-shadow: 0 0 14px rgba(127, 243, 190, 0.8);
    }

    /* Dark Forest Framing Pillar */
    .forest-pillar-left {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 25%;
        background: linear-gradient(90deg, rgba(10, 47, 34, 0.45) 0%, transparent 100%);
        z-index: 8;
        pointer-events: none;
    }
    
    .forest-pillar-right {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 25%;
        background: linear-gradient(270deg, rgba(10, 47, 34, 0.45) 0%, transparent 100%);
        z-index: 8;
        pointer-events: none;
    }

    /* Slightly reduce root sizing on small screens for a less zoomed look */
    @media (max-width: 640px) {
        html.dashboard-page {
            font-size: 15px;
        }

        .dashboard-feature-content {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        .dashboard-feature-readmore {
            margin-top: auto;
            align-self: flex-start;
        }

        .dashboard-hero {
            min-height: 380px;
            margin-top: 1rem;
            border-radius: 1.25rem;
        }

        .dashboard-hero .dashboard-hero-content {
            padding: 2rem 1.25rem;
        }

        .dashboard-hero-title {
            font-size: 2.4rem;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .dashboard-hero-text {
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .dashboard-hero-actions a {
            padding: 0.75rem 1.25rem;
            font-size: 0.9rem;
        }

        .dashboard-nav {
            margin-top: 2.5rem;
        }

        .dashboard-features {
            margin-top: 3rem;
        }

        .dashboard-articles {
            margin-top: 3.5rem;
        }

        .dashboard-cta {
            margin-top: 3.5rem;
            padding-top: 3.5rem;
            padding-bottom: 3.5rem;
            border-radius: 2rem;
        }

        .dashboard-section-title {
            font-size: 1.6rem;
            line-height: 1.2;
            margin-bottom: 1.25rem;
        }

        .dashboard-section-lead {
            font-size: 0.95rem;
        }

        .dashboard-cta-title {
            font-size: 2rem;
        }

        .dashboard-cta-text {
            font-size: 1rem;
        }

        .dashboard-cta-action {
            padding: 0.9rem 2rem;
            font-size: 1rem;
        }

        .dashboard-features .grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .dashboard-nav .dashboard-nav-grid,
        .dashboard-articles .dashboard-articles-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .dashboard-nav .dashboard-nav-card {
            padding: 0.9rem;
            border-radius: 1.25rem;
            height: 100%;
        }

        .dashboard-nav .dashboard-nav-card h3 {
            font-size: 1rem;
        }

        .dashboard-nav .dashboard-nav-card p {
            font-size: 0.8rem;
        }

        .dashboard-nav .dashboard-nav-grid {
            grid-auto-rows: 1fr;
        }

        .dashboard-feature-card {
            height: auto;
            min-height: 260px;
        }

        .dashboard-features h3 {
            font-size: 1.25rem;
        }

        .dashboard-features p {
            font-size: 0.85rem;
        }

        html.dark.dashboard-page .dashboard-feature-badge {
            background: rgba(127, 243, 190, 0.2);
            border-color: rgba(127, 243, 190, 0.55);
            box-shadow: 0 0 16px rgba(127, 243, 190, 0.28), inset 0 0 14px rgba(127, 243, 190, 0.12);
        }

        html.dark.dashboard-page .dashboard-feature-badge .material-symbols-outlined {
            color: #bff7de;
            text-shadow: 0 0 12px rgba(127, 243, 190, 0.65);
        }

        html.dark.dashboard-page .dashboard-feature-badge-label {
            color: #ddfff0;
            text-shadow: 0 0 14px rgba(127, 243, 190, 0.75), 0 0 24px rgba(127, 243, 190, 0.45);
        }

        html.dark.dashboard-page .dashboard-feature-intro-title,
        html.dark.dashboard-page .dashboard-feature-desc-title {
            text-shadow: 0 0 10px rgba(127, 243, 190, 0.4);
        }

        .dashboard-features a {
            font-size: 0.8rem;
        }

        .dashboard-articles .dashboard-article-media {
            height: 8.5rem;
        }

        .dashboard-articles .dashboard-article-card h4 {
            font-size: 1rem;
        }

        .dashboard-articles .dashboard-article-card p {
            font-size: 0.8rem;
        }
    }
</style>

<div class="relative w-full max-w-none sm:max-w-7xl mx-auto px-2 sm:px-6 md:px-8 pb-16 sm:pb-20 overflow-hidden">

    {{-- Floating Neon Leaves Background --}}
    <div class="fixed inset-0 -z-10 pointer-events-none">
        <!-- Floating Leaf 1 - Realistic Curved Leaf with Prominent Veins -->
        <div class="floating-leaf leaf-1 absolute top-[15%] left-[10%]">
            <svg width="60" height="60" viewBox="0 0 100 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Smooth curved leaf body -->
                <path d="M 50 5 C 50 5 75 15 82 40 C 88 65 75 90 50 110 C 25 90 12 65 18 40 C 25 15 50 5 50 5 Z" fill="#00ff88" opacity="0.93"/>
                
                <!-- Central vein - thick and prominent -->
                <path d="M 50 5 Q 50 30 50 110" stroke="#ffffff" stroke-width="2.2" opacity="0.8" stroke-linecap="round"/>
                
                <!-- Secondary veins left - curved organic -->
                <path d="M 50 20 Q 38 28 30 40" stroke="#ffffff" stroke-width="1.4" opacity="0.65"/>
                <path d="M 50 40 Q 32 50 22 65" stroke="#ffffff" stroke-width="1.3" opacity="0.58"/>
                <path d="M 50 65 Q 35 80 25 95" stroke="#ffffff" stroke-width="1.2" opacity="0.55"/>
                
                <!-- Secondary veins right - curved organic -->
                <path d="M 50 20 Q 62 28 70 40" stroke="#ffffff" stroke-width="1.4" opacity="0.65"/>
                <path d="M 50 40 Q 68 50 78 65" stroke="#ffffff" stroke-width="1.3" opacity="0.58"/>
                <path d="M 50 65 Q 65 80 75 95" stroke="#ffffff" stroke-width="1.2" opacity="0.55"/>
                
                <!-- Tertiary vein details -->
                <path d="M 32 28 L 40 35 M 35 55 L 42 65 M 38 85 L 45 95" stroke="#ffffff" stroke-width="0.8" opacity="0.4"/>
                <path d="M 68 28 L 60 35 M 65 55 L 58 65 M 62 85 L 55 95" stroke="#ffffff" stroke-width="0.8" opacity="0.4"/>
            </svg>
        </div>
        
        <!-- Floating Leaf 2 - Wide Oval Leaf -->
        <div class="floating-leaf leaf-2 absolute top-[20%] right-[12%]">
            <svg width="45" height="45" viewBox="0 0 90 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Soft oval leaf -->
                <path d="M 45 8 C 65 15 75 30 75 50 C 75 70 65 85 45 92 C 25 85 15 70 15 50 C 15 30 25 15 45 8 Z" fill="#00ff88" opacity="0.91"/>
                
                <!-- Central vein -->
                <path d="M 45 8 L 45 92" stroke="#ffffff" stroke-width="2" opacity="0.78" stroke-linecap="round"/>
                
                <!-- Left side veins -->
                <path d="M 45 22 Q 32 30 25 42" stroke="#ffffff" stroke-width="1.3" opacity="0.62"/>
                <path d="M 45 45 Q 28 52 18 65" stroke="#ffffff" stroke-width="1.2" opacity="0.58"/>
                <path d="M 45 70 Q 30 78 20 85" stroke="#ffffff" stroke-width="1.2" opacity="0.55"/>
                
                <!-- Right side veins -->
                <path d="M 45 22 Q 58 30 65 42" stroke="#ffffff" stroke-width="1.3" opacity="0.62"/>
                <path d="M 45 45 Q 62 52 72 65" stroke="#ffffff" stroke-width="1.2" opacity="0.58"/>
                <path d="M 45 70 Q 60 78 70 85" stroke="#ffffff" stroke-width="1.2" opacity="0.55"/>
            </svg>
        </div>
        
        <!-- Floating Leaf 3 - Balanced Teardrop Leaf -->
        <div class="floating-leaf leaf-3 absolute top-[50%] right-[8%]">
            <svg width="52" height="52" viewBox="0 0 100 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Teardrop/rounded leaf shape - more balanced -->
                <path d="M 50 8 C 70 15 82 35 80 60 C 78 85 65 100 50 105 C 35 100 22 85 20 60 C 18 35 30 15 50 8 Z" fill="#00ff88" opacity="0.90"/>
                
                <!-- Central vein -->
                <path d="M 50 8 L 50 105" stroke="#ffffff" stroke-width="1.9" opacity="0.76" stroke-linecap="round"/>
                
                <!-- Left side veins -->
                <path d="M 50 22 Q 35 30 28 45" stroke="#ffffff" stroke-width="1.2" opacity="0.60"/>
                <path d="M 50 50 Q 30 60 22 75" stroke="#ffffff" stroke-width="1.1" opacity="0.55"/>
                <path d="M 50 80 Q 35 90 28 100" stroke="#ffffff" stroke-width="1.1" opacity="0.53"/>
                
                <!-- Right side veins -->
                <path d="M 50 22 Q 65 30 72 45" stroke="#ffffff" stroke-width="1.2" opacity="0.60"/>
                <path d="M 50 50 Q 70 60 78 75" stroke="#ffffff" stroke-width="1.1" opacity="0.55"/>
                <path d="M 50 80 Q 65 90 72 100" stroke="#ffffff" stroke-width="1.1" opacity="0.53"/>
                
                <!-- Subtle tertiary details -->
                <path d="M 32 35 L 40 42 M 35 65 L 42 75" stroke="#ffffff" stroke-width="0.8" opacity="0.4"/>
                <path d="M 68 35 L 60 42 M 65 65 L 58 75" stroke="#ffffff" stroke-width="0.8" opacity="0.4"/>
            </svg>
        </div>
        
        <!-- Floating Leaf 4 - Pointed Leaf -->
        <div class="floating-leaf leaf-4 absolute bottom-[18%] left-[15%]">
            <svg width="50" height="50" viewBox="0 0 100 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Sharp pointed leaf -->
                <path d="M 50 5 C 68 12 80 30 82 55 C 83 80 72 105 50 125 C 28 105 17 80 18 55 C 20 30 32 12 50 5 Z" fill="#00ff88" opacity="0.92"/>
                
                <!-- Central vein - prominent -->
                <path d="M 50 5 Q 50 35 50 125" stroke="#ffffff" stroke-width="2.1" opacity="0.78" stroke-linecap="round"/>
                
                <!-- Left veins -->
                <path d="M 50 20 Q 38 32 28 48" stroke="#ffffff" stroke-width="1.3" opacity="0.64"/>
                <path d="M 50 50 Q 34 70 24 90" stroke="#ffffff" stroke-width="1.2" opacity="0.58"/>
                <path d="M 50 95 Q 38 110 28 120" stroke="#ffffff" stroke-width="1.2" opacity="0.56"/>
                
                <!-- Right veins -->
                <path d="M 50 20 Q 62 32 72 48" stroke="#ffffff" stroke-width="1.3" opacity="0.64"/>
                <path d="M 50 50 Q 66 70 76 90" stroke="#ffffff" stroke-width="1.2" opacity="0.58"/>
                <path d="M 50 95 Q 62 110 72 120" stroke="#ffffff" stroke-width="1.2" opacity="0.56"/>
                
                <!-- Subtle vein details -->
                <path d="M 35 35 L 42 45 M 34 75 L 40 85" stroke="#ffffff" stroke-width="0.8" opacity="0.4"/>
                <path d="M 65 35 L 58 45 M 66 75 L 60 85" stroke="#ffffff" stroke-width="0.8" opacity="0.4"/>
            </svg>
        </div>
    </div>

    {{-- Hero Section (Solusi #4: Kontras dan Bentuk) --}}
{{-- Tambahan Animasi Kustom untuk Efek Daun Melayang --}}
<style>
    @keyframes float-slow {
        0%, 100% { transform: translateY(0) rotate(var(--tw-rotate)); }
        50% { transform: translateY(-15px) rotate(calc(var(--tw-rotate) + 10deg)); }
    }
    @keyframes float-med {
        0%, 100% { transform: translateY(0) rotate(var(--tw-rotate)); }
        50% { transform: translateY(-20px) rotate(calc(var(--tw-rotate) - 10deg)); }
    }
    .animate-float-slow { animation: float-slow 6s ease-in-out infinite; }
    .animate-float-med { animation: float-med 5s ease-in-out infinite; animation-delay: 1s; }
    .animate-float-fast { animation: float-slow 4s ease-in-out infinite; animation-delay: 2s; }
</style>

<section class="dashboard-hero relative mt-6 sm:mt-8 min-h-[420px] sm:min-h-[500px] flex items-center rounded-3xl overflow-hidden reveal-on-scroll shadow-[0_32px_64px_rgba(10,47,34,0.15)] group">
    
    {{-- 1. Gambar Background Asli (Jernih di Tengah) --}}
    <div class="absolute inset-0 z-0 overflow-hidden">
        {{-- Tambahan efek zoom in sangat lambat saat di-hover (group-hover) --}}
        <img class="w-full h-full object-cover" src="{{ asset('images/begeron.jpeg') }}" alt="Hero Background"/>
    </div>

    {{-- 2. BACKGROUND GRADIENT FRAME (Diperbaiki agar seimbang & kontras) --}}
    {{-- Gradien Kiri (Dipergelap sedikit agar teks putih 100% aman terbaca) --}}
    <div class="absolute inset-y-0 left-0 w-full md:w-1/2 bg-gradient-to-r from-[#0a2f22]/90 via-[#0a2f22]/50 to-transparent z-10"></div>
    
    {{-- Gradien Kanan (Pilar Gelap Penyeimbang) --}}
    <div class="absolute inset-y-0 right-0 w-full md:w-1/3 bg-gradient-to-l from-[#0a2f22]/90 via-[#0a2f22]/60 to-transparent z-10"></div>

    {{-- 3. PILAR CAHAYA GLOWING NEON --}}
    <div class="absolute top-1/2 -translate-y-1/2 -right-20 w-[500px] h-[500px] bg-[#00ff88]/20 blur-[100px] rounded-full z-10 pointer-events-none"></div>

    {{-- 4. KONTEN UTAMA --}}
    <div class="dashboard-hero-content relative z-20 px-4 sm:px-8 md:px-12 max-w-none sm:max-w-2xl py-10 sm:py-12">
        
        {{-- Badge Premium (Efek Glassmorphism Ditingkatkan) --}}
        <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white text-xs font-bold font-headline uppercase tracking-[0.15em] mb-4 sm:mb-6 shadow-lg transition-colors hover:bg-white/20 hover:border-white/50 cursor-default">
            <span class="w-2.5 h-2.5 rounded-full bg-[#00ff88] animate-pulse shadow-[0_0_10px_#00ff88]"></span>
            {{ __('app.badge_environment_platform') }}
        </div>

        {{-- Judul --}}
        <h1 class="dashboard-hero-title font-headline text-[2.6rem] sm:text-[3.5rem] md:text-[5rem] font-extrabold leading-[1.05] tracking-tight mb-4 sm:mb-6 drop-shadow-2xl text-white">
            Go Green <br/> School Today.
        </h1>
        
        <p class="dashboard-hero-text text-white/90 text-base sm:text-lg md:text-xl font-medium mb-6 sm:mb-10 leading-relaxed drop-shadow-md max-w-xl">
            {{ __('app.dashboard_hero_desc') }}
        </p>
        
        {{-- Tombol --}}
        <div class="dashboard-hero-actions flex flex-wrap gap-3 sm:gap-4">
            {{-- Tombol Mulai Hitung --}}
            <a href="{{ url('/kalkulator') }}" class="bg-[#a3e635] hover:bg-[#b4f825] text-[#0a2f22] px-6 py-3 sm:px-8 sm:py-4 rounded-full font-headline font-extrabold text-sm sm:text-base scale-100 hover:-translate-y-1 hover:scale-105 active:scale-95 transition-all shadow-[0_8px_20px_rgba(163,230,53,0.3)] hover:shadow-[0_12px_25px_rgba(163,230,53,0.5)] text-center flex items-center gap-2">
                <span class="material-symbols-outlined text-xl">recycling</span> {{ __('app.dashboard_btn_start') }}
            </a>
            
            {{-- Tombol Jelajahi --}}
            <a href="{{ url('/tanaman') }}" class="bg-white/5 backdrop-blur-md text-white px-6 py-3 sm:px-8 sm:py-4 rounded-full font-headline font-bold text-sm sm:text-base border border-white/30 hover:bg-white/20 hover:-translate-y-1 transition-all text-center flex items-center gap-2 shadow-lg hover:shadow-xl">
                <span class="material-symbols-outlined text-xl">eco</span> {{ __('app.dashboard_btn_explore') }}
            </a>
        </div>
    </div>

    {{-- 6. WAVE DIVIDER BAWAH --}}
</section>

    {{-- Quick Navigation Bento Grid --}}
    <section class="dashboard-nav mt-10 sm:mt-16 reveal-on-scroll">
        <div class="dashboard-nav-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            
            @php
            $navItems = [
                ['title'=>__('app.dashboard_nav_calc_title'),'icon'=>'recycling','link'=>'/kalkulator','desc'=>__('app.dashboard_nav_calc_desc'), 'color'=>'primary'],
                ['title'=>__('app.dashboard_nav_plants_title'),'icon'=>'eco','link'=>'/tanaman','desc'=>__('app.dashboard_nav_plants_desc'), 'color'=>'tertiary'],
                ['title'=>__('app.dashboard_nav_about_title'),'icon'=>'school','link'=>'/profil-sekolah','desc'=>__('app.dashboard_nav_about_desc'), 'color'=>'primary'],
                ['title'=>__('app.dashboard_nav_contact_title'),'icon'=>'call','link'=>'/contact','desc'=>__('app.dashboard_nav_contact_desc'), 'color'=>'tertiary']
            ];
            @endphp

            @foreach($navItems as $item)
            {{-- Rounded diperbesar jadi 3xl agar lebih organik --}}
<a href="{{ url($item['link']) }}" class="dashboard-nav-card relative group bg-surface-container-lowest p-5 sm:p-8 rounded-3xl flex flex-col gap-4 hover:-translate-y-2 transition-all duration-300 shadow-[0_8px_32px_rgba(42,47,50,0.04)] hover:shadow-[0_16px_48px_rgba(0,105,72,0.1)]">
        
        {{-- Elemen Glow Baru --}}
        <div class="bento-glow absolute inset-0 z-0 rounded-3xl"></div>
        
        <div class="relative z-10 bg-{{ $item['color'] }}-container/20 w-12 h-12 sm:w-14 sm:h-14 rounded-2xl flex items-center justify-center group-hover:bg-{{ $item['color'] }}-container/40 transition-colors">
            <span class="material-symbols-outlined text-{{ $item['color'] }} text-2xl sm:text-3xl group-hover:scale-110 transition-transform {{ in_array($item['link'], ['/tanaman', '/contact']) ? 'dashboard-nav-icon--bright' : '' }}">{{ $item['icon'] }}</span>
        </div>
        <div class="relative z-10">
            <h3 class="font-headline font-extrabold text-lg sm:text-xl mb-1 text-primary">{{ $item['title'] }}</h3>
            <p class="dashboard-nav-label text-on-surface-variant text-sm">{{ $item['desc'] }}</p>
        </div>
    </a>
            @endforeach

        </div>
    </section>

    {{-- Introduce & Description --}}
    <section class="dashboard-features mt-14 sm:mt-24 reveal-on-scroll">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-10">
            
              <div class="dashboard-feature-card relative h-auto min-h-[260px] sm:h-[340px] md:h-[400px] rounded-[2rem] overflow-hidden group shadow-lg cursor-pointer"
                  role="button"
                  tabindex="0"
                  onclick="openDashboardInfoModal('intro')"
                  onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); openDashboardInfoModal('intro'); }">
                <div class="absolute inset-0 bg-primary transition-colors duration-500 group-hover:bg-[#005b3e]"></div>
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white to-transparent"></div>
                <div class="dashboard-feature-content relative p-5 sm:p-8 md:p-10 z-10 w-full sm:absolute sm:bottom-0">
                    <div class="dashboard-feature-badge bg-white/20 backdrop-blur-sm w-12 h-12 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mb-4 sm:mb-6 border border-white/30 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-white text-2xl sm:text-3xl">recycling</span>
                    </div>
                    <h3 class="dashboard-feature-badge-label dashboard-feature-intro-title font-headline text-2xl sm:text-3xl font-extrabold text-white mb-2 sm:mb-3">{{ __('app.dashboard_intro_title') }}</h3>
                    <p class="text-white/80 mb-4 sm:mb-6 max-w-sm text-sm md:text-base line-clamp-4">{{ __('app.dashboard_intro_snippet') }}</p>
                    <button type="button" class="dashboard-feature-readmore inline-block bg-white text-primary px-5 py-2.5 sm:px-6 sm:py-3 rounded-full font-headline font-bold text-sm hover:shadow-lg transition-shadow" onclick="event.stopPropagation(); openDashboardInfoModal('intro')">{{ __('app.dashboard_article_read_more') }}</button>
                </div>
            </div>

            <div class="dashboard-feature-card relative h-auto min-h-[260px] sm:h-[340px] md:h-[400px] rounded-[2rem] overflow-hidden group shadow-lg cursor-pointer"
                 role="button"
                 tabindex="0"
                 onclick="openDashboardInfoModal('desc')"
                 onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); openDashboardInfoModal('desc'); }">
                <div class="absolute inset-0 bg-tertiary transition-colors duration-500 group-hover:bg-[#375900]"></div>
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white to-transparent"></div>
                <div class="dashboard-feature-content relative p-5 sm:p-8 md:p-10 z-10 w-full sm:absolute sm:bottom-0">
                    <div class="dashboard-feature-badge bg-white/20 backdrop-blur-sm w-12 h-12 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mb-4 sm:mb-6 border border-white/30 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-white text-2xl sm:text-3xl">park</span>
                    </div>
                    <h3 class="dashboard-feature-badge-label dashboard-feature-desc-title font-headline text-2xl sm:text-3xl font-extrabold text-white mb-2 sm:mb-3">{{ __('app.dashboard_desc_title') }}</h3>
                    <p class="text-white/80 mb-4 sm:mb-6 max-w-sm text-sm md:text-base line-clamp-4">{{ __('app.dashboard_desc_snippet') }}</p>
                    <button type="button" class="dashboard-feature-readmore inline-block bg-tertiary-container text-on-tertiary-container px-5 py-2.5 sm:px-6 sm:py-3 rounded-full font-headline font-bold text-sm hover:shadow-lg transition-shadow" onclick="event.stopPropagation(); openDashboardInfoModal('desc')">{{ __('app.dashboard_article_read_more') }}</button>
                </div>
            </div>

        </div>
    </section>

<div id="dashboard-info-modal-intro" class="fixed inset-0 z-[120] hidden items-center justify-center p-4" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-900/60" onclick="closeDashboardInfoModal('intro')"></div>
        
        <div class="relative z-10 w-full max-w-4xl max-h-[88vh] overflow-y-auto rounded-2xl bg-slate-50 shadow-2xl flex flex-col">
            
            <div class="bg-white px-6 sm:px-10 pt-8 pb-6 border-b border-gray-200">
                <div class="flex items-start justify-between gap-6">
                    <div class="flex items-start gap-5">
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg animate-glow" style="background: #d9f1e7; border: 1px solid #c3e5d8; box-shadow: 0 0 14px rgba(0, 105, 72, 0.14)">
                            <span class="material-symbols-outlined text-white animate-pulse" style="font-size: 32px; color: #006948; font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 32;">eco</span>
                        </div>
                        <div class="pt-1">
                            <span class="dashboard-intro-badge inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 border border-gray-200 text-gray-700 rounded-full text-xs font-bold uppercase tracking-widest mb-3 shadow-sm">
                                <span class="material-symbols-outlined" style="font-size: 14px;">public</span> {{ __('app.dashboard_intro_badge') }}
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 leading-tight mb-2">{{ __('app.dashboard_intro_title') }}</h3>
                            <p class="text-gray-600 text-sm sm:text-base font-medium">{{ __('app.dashboard_intro_modal_subtitle') }}</p>
                        </div>
                    </div>
                    <button type="button" class="p-2 text-gray-400 hover:text-gray-800 hover:bg-gray-100 rounded-full transition-colors flex-shrink-0" onclick="closeDashboardInfoModal('intro')" aria-label="Tutup popup Gerakan Hijau">
                        <span class="material-symbols-outlined" style="font-size: 24px;">close</span>
                    </button>
                </div>
            </div>
            
            <div class="flex-1 px-6 sm:px-10 py-8 space-y-5">
                <div class="bg-white border border-gray-200 px-6 py-5 rounded-xl shadow-sm flex items-start gap-4 hover:border-gray-300 transition-all hover:shadow-md group">
                    <div class="flex-shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-white shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 animate-shimmer" style="background: #d9f1e7; border: 1px solid #c3e5d8;">
                        <span class="material-symbols-outlined group-hover:animate-spin-slow" style="font-size: 24px; color: #006948;">lightbulb</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-900 text-lg font-bold mb-2">{{ __('app.dashboard_intro_section_1_title') }}</p>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base">{{ __('app.latar_information_intro') }}</p>
                    </div>
                </div>
                
                <div class="bg-white border border-gray-200 px-6 py-5 rounded-xl shadow-sm flex items-start gap-4 hover:border-gray-300 transition-all hover:shadow-md group">
                    <div class="flex-shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-white shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 animate-shimmer" style="background: #deefbe; border: 1px solid #cfe5a3;">
                        <span class="material-symbols-outlined group-hover:animate-bounce-gentle" style="font-size: 24px; color: #406600;">nature</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-900 text-lg font-bold mb-2">{{ __('app.dashboard_intro_section_2_title') }}</p>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base">{{ __('app.latar_information_body') }}</p>
                    </div>
                </div>
                
                <div class="bg-white border border-gray-200 px-6 py-5 rounded-xl shadow-sm flex items-start gap-4 hover:border-gray-300 transition-all hover:shadow-md group">
                    <div class="flex-shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-white shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 animate-shimmer" style="background: #d9f1e7; border: 1px solid #c3e5d8;">
                        <span class="material-symbols-outlined group-hover:animate-spin-reverse" style="font-size: 24px; color: #006948;">auto_awesome</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-900 text-lg font-bold mb-2">{{ __('app.dashboard_intro_section_3_title') }}</p>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base">{{ __('app.latar_information_conclusion') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dashboard-info-modal-desc" class="fixed inset-0 z-[120] hidden items-center justify-center p-4" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-900/60" onclick="closeDashboardInfoModal('desc')"></div>
        
        <div class="relative z-10 w-full max-w-4xl max-h-[88vh] overflow-y-auto rounded-2xl bg-slate-50 shadow-2xl flex flex-col">
            
            <div class="bg-white px-6 sm:px-10 pt-8 pb-6 border-b border-gray-200">
                <div class="flex items-start justify-between gap-6">
                    <div class="flex items-start gap-5">
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg animate-glow" style="background: #d9f1e7; border: 1px solid #c3e5d8; box-shadow: 0 0 14px rgba(0, 105, 72, 0.14)">
                            <span class="material-symbols-outlined text-white animate-pulse" style="font-size: 32px; color: #006948; font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 32;">school</span>
                        </div>
                        <div class="pt-1">
                            <span class="dashboard-desc-badge inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 border border-gray-200 text-gray-700 rounded-full text-xs font-bold uppercase tracking-widest mb-3 shadow-sm">
                                <span class="material-symbols-outlined" style="font-size: 14px;">public</span> {{ __('app.dashboard_desc_badge') }}
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 leading-tight mb-2">{{ __('app.dashboard_desc_title') }}</h3>
                            <p class="text-gray-600 text-sm sm:text-base font-medium">{{ __('app.dashboard_desc_modal_subtitle') }}</p>
                        </div>
                    </div>
                    <button type="button" class="p-2 text-gray-400 hover:text-gray-800 hover:bg-gray-100 rounded-full transition-colors flex-shrink-0" onclick="closeDashboardInfoModal('desc')" aria-label="Tutup popup Go Green School">
                        <span class="material-symbols-outlined" style="font-size: 24px;">close</span>
                    </button>
                </div>
            </div>
            
            <div class="flex-1 px-6 sm:px-10 py-8 space-y-5">
                <div class="bg-white border border-gray-200 px-6 py-5 rounded-xl shadow-sm flex items-start gap-4 hover:border-gray-300 transition-all hover:shadow-md group">
                    <div class="flex-shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-white shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 animate-shimmer" style="background: #d9f1e7; border: 1px solid #c3e5d8;">
                        <span class="material-symbols-outlined group-hover:animate-ping-slow" style="font-size: 24px; color: #006948;">devices</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-900 text-lg font-bold mb-2">{{ __('app.dashboard_desc_section_1_title') }}</p>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base">{{ __('app.dashboard_desc_section_1_text') }}</p>
                    </div>
                </div>
                
                <div class="bg-white border border-gray-200 px-6 py-5 rounded-xl shadow-sm flex items-start gap-4 hover:border-gray-300 transition-all hover:shadow-md group">
                    <div class="flex-shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-white shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 animate-shimmer" style="background: #deefbe; border: 1px solid #cfe5a3;">
                        <span class="material-symbols-outlined group-hover:animate-spin-slow" style="font-size: 24px; color: #406600;">settings</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-900 text-lg font-bold mb-2">{{ __('app.dashboard_desc_section_2_title') }}</p>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base">{{ __('app.dashboard_desc_section_2_text') }}</p>
                    </div>
                </div>
                
                <div class="bg-white border border-gray-200 px-6 py-5 rounded-xl shadow-sm flex items-start gap-4 hover:border-gray-300 transition-all hover:shadow-md group">
                    <div class="flex-shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-white shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 animate-shimmer" style="background: #d9f1e7; border: 1px solid #c3e5d8;">
                        <span class="material-symbols-outlined group-hover:animate-bounce-gentle" style="font-size: 24px; color: #006948;">recycling</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-gray-900 text-lg font-bold mb-2">{{ __('app.dashboard_desc_section_3_title') }}</p>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base">{{ __('app.dashboard_desc_section_3_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 20px rgba(16, 185, 129, 0.4), inset 0 0 20px rgba(255, 255, 255, 0.1); }
            50% { box-shadow: 0 0 30px rgba(16, 185, 129, 0.6), inset 0 0 20px rgba(255, 255, 255, 0.2); }
        }
        @keyframes shimmer {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.85; }
        }
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @keyframes spinReverse {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }
        @keyframes bounceGentle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }
        @keyframes pingSlow {
            75%, 100% { transform: scale(1.5); opacity: 0; }
        }
        .animate-glow { animation: glow 2.5s infinite; }
        .animate-shimmer { animation: shimmer 2s infinite; }
        .animate-spin-slow { animation: spinSlow 2s infinite linear; }
        .animate-spin-reverse { animation: spinReverse 2.5s infinite linear; }
        .animate-bounce-gentle { animation: bounceGentle 2s infinite; }
        .animate-ping-slow { animation: pingSlow 2.5s cubic-bezier(0, 0, 0.2, 1) infinite; }

        html.dark.dashboard-page #dashboard-info-modal-intro .text-gray-900,
        html.dark.dashboard-page #dashboard-info-modal-desc .text-gray-900 {
            color: #e6f5ed !important;
            text-shadow: 0 0 10px rgba(127, 243, 190, 0.18);
        }

        html.dark.dashboard-page #dashboard-info-modal-intro .text-gray-600,
        html.dark.dashboard-page #dashboard-info-modal-desc .text-gray-600 {
            color: #b6c7d3 !important;
        }

        html.dark.dashboard-page #dashboard-info-modal-intro p strong,
        html.dark.dashboard-page #dashboard-info-modal-desc p strong {
            color: #bff7de !important;
            font-weight: 800;
            text-shadow: 0 0 10px rgba(127, 243, 190, 0.35);
        }

        html.dark.dashboard-page #dashboard-info-modal-intro .animate-glow,
        html.dark.dashboard-page #dashboard-info-modal-desc .animate-glow,
        html.dark.dashboard-page #dashboard-info-modal-intro .animate-shimmer,
        html.dark.dashboard-page #dashboard-info-modal-desc .animate-shimmer {
            background: linear-gradient(145deg, #133127, #1a3b2f) !important;
            border-color: #3d7a62 !important;
            box-shadow: 0 0 18px rgba(127, 243, 190, 0.35), inset 0 0 10px rgba(127, 243, 190, 0.18) !important;
        }

        html.dark.dashboard-page #dashboard-info-modal-intro .animate-glow .material-symbols-outlined,
        html.dark.dashboard-page #dashboard-info-modal-desc .animate-glow .material-symbols-outlined,
        html.dark.dashboard-page #dashboard-info-modal-intro .animate-shimmer .material-symbols-outlined,
        html.dark.dashboard-page #dashboard-info-modal-desc .animate-shimmer .material-symbols-outlined {
            color: #98f5cd !important;
            text-shadow: 0 0 12px rgba(127, 243, 190, 0.7);
        }
    </style>

    {{-- Articles & Education Grid (Solusi #1: Kerangka Real Image) --}}
    <section class="dashboard-articles mt-16 sm:mt-28 reveal-on-scroll">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 sm:mb-10 gap-4 text-center sm:text-left">
            <div>
                <span class="text-tertiary font-bold tracking-[0.25em] text-xs uppercase mb-3 block">{{ __('app.dashboard_articles_label') }}</span>
                <h2 class="dashboard-key-title dashboard-section-title font-headline text-2xl sm:text-3xl font-extrabold text-primary tracking-tight">{{ __('app.dashboard_articles_title') }}</h2>
                <p class="dashboard-section-lead text-on-surface-variant font-medium mt-2">{{ __('app.dashboard_articles_subtitle') }}</p>
            </div>
            <a href="{{ url('/artikel') }}" class="bg-primary/10 text-primary px-4 py-2.5 sm:px-6 sm:py-3 rounded-full font-headline font-bold text-sm sm:text-base flex items-center gap-2 group hover:bg-primary hover:text-white transition-colors">
                {{ __('app.dashboard_articles_view_all') }} <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        
        <div class="dashboard-articles-grid grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-8">
            @php
            $articles = [
                [
                    'title' => __('app.dashboard_article_1_title'),
                    'link'  => 'https://www.detik.com/edu/detikpedia/d-6918652/ini-bahaya-plastik-sekali-pakai-yang-mengancam-lingkungan-kesehatan-manusia',
                    'image' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?q=80&w=600&auto=format&fit=crop', // Ganti dengan {{ asset('path/foto.jpg') }} nantinya
                    'tag'   => __('app.dashboard_article_1_tag'),
                    'date'  => __('app.dashboard_article_1_date'),
                    'desc'  => __('app.dashboard_article_1_desc')
                ],
                [
                    'title' => __('app.dashboard_article_2_title'),
                    'link'  => 'https://plasticsmartcities.wwf.id/feature/article/bank-sampah-konsep-dan-peran-dalam-pengelolaan-lingkungan',
                    'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?q=80&w=600&auto=format&fit=crop', // Ganti dengan {{ asset('path/foto.jpg') }} nantinya
                    'tag'   => __('app.dashboard_article_2_tag'),
                    'date'  => __('app.dashboard_article_2_date'),
                    'desc'  => __('app.dashboard_article_2_desc')
                ],
                [
                    'title' => __('app.dashboard_article_3_title'),
                    'link'  => 'https://www.halodoc.com/artikel/ini-5-manfaat-menanam-pohon-di-sekitar-rumah',
                    'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=600&auto=format&fit=crop', // Ganti dengan {{ asset('path/foto.jpg') }} nantinya
                    'tag'   => __('app.dashboard_article_3_tag'),
                    'date'  => __('app.dashboard_article_3_date'),
                    'desc'  => __('app.dashboard_article_3_desc')
                ]
            ];
            @endphp

            @foreach($articles as $artikel)
            <a href="{{ url($artikel['link']) }}" class="dashboard-article-card bg-surface-container-lowest rounded-[2rem] overflow-hidden shadow-[0_4px_20px_rgba(42,47,50,0.04)] hover:shadow-[0_16px_40px_rgba(0,105,72,0.12)] border border-outline-variant/10 flex flex-col group transition-all duration-500 hover:-translate-y-3">
                
                {{-- Area Foto Artikel Asli --}}
                <div class="dashboard-article-media h-40 sm:h-52 relative overflow-hidden bg-surface-container-high">
                    <img src="{{ $artikel['image'] }}" alt="{{ $artikel['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out" loading="lazy">
                    
                    {{-- Overlay Gradient Tipis biar gambar gak mati --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-60"></div>
                    
                    <div class="absolute top-4 left-4 z-10">
                        <span class="bg-white/90 backdrop-blur text-primary px-3 py-1.5 rounded-full text-xs font-bold font-headline uppercase tracking-wider shadow-sm">
                            {{ $artikel['tag'] }}
                        </span>
                    </div>
                </div>

                {{-- Konten Teks --}}
                <div class="p-4 sm:p-6 md:p-8 flex flex-col flex-grow relative">
                    <div class="flex items-center gap-1.5 text-xs text-on-surface-variant font-medium mb-3">
                        <span class="material-symbols-outlined text-[1rem]">calendar_today</span>
                        <span>{{ $artikel['date'] }}</span>
                    </div>

                    <h4 class="font-headline text-lg sm:text-xl font-extrabold text-primary leading-snug mb-3 group-hover:text-tertiary transition-colors line-clamp-2">
                        {{ $artikel['title'] }}
                    </h4>

                    <p class="text-on-surface-variant text-sm leading-relaxed line-clamp-3 mb-4 sm:mb-6 flex-grow">
                        {{ $artikel['desc'] }}
                    </p>

                    <div class="mt-auto pt-3 sm:pt-4 border-t border-outline-variant/20 flex items-center gap-2 text-primary font-bold text-sm font-headline group-hover:translate-x-2 transition-transform">
                        {{ __('app.dashboard_article_read_more') }} <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>

    {{-- Bold CTA Section --}}
    <section class="dashboard-cta mt-20 sm:mt-32 relative rounded-[2rem] sm:rounded-[3rem] overflow-hidden bg-primary py-16 sm:py-24 text-center reveal-on-scroll shadow-2xl">
        <div class="absolute inset-0 z-0 opacity-20 mix-blend-luminosity">
            <img class="w-full h-full object-cover" src="{{ asset('images/begeron.jpeg') }}" alt="Background CTA"/>
        </div>
        {{-- Gradient tambahan supaya teks aman --}}
        <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/90 to-primary/60"></div>

        <div class="relative z-10 max-w-none sm:max-w-2xl mx-auto px-4 sm:px-8">
            <h2 class="dashboard-cta-title font-headline text-[2rem] sm:text-[2.5rem] md:text-[3.5rem] font-extrabold text-white leading-tight mb-4 sm:mb-6 tracking-tight drop-shadow-md">
                {!! __('app.dashboard_cta_title') !!}
            </h2>
            <p class="dashboard-cta-text text-white/90 text-base sm:text-lg md:text-xl mb-6 sm:mb-10 font-medium drop-shadow-sm">
                {{ __('app.dashboard_cta_desc') }}
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/kalkulator') }}" class="dashboard-cta-action bg-tertiary-container text-on-tertiary-container px-8 py-4 sm:px-12 sm:py-5 rounded-full font-headline font-black text-base sm:text-lg shadow-[0_8px_30px_rgba(0,0,0,0.3)] hover:scale-105 active:scale-95 transition-transform inline-block">
                    {{ __('app.dashboard_cta_button') }}
                </a>
            </div>
        </div>
    </section>

</div>

{{-- Script untuk memicu animasi reveal-on-scroll (Solusi #2) --}}
<script>
    function openDashboardInfoModal(type) {
        const modal = document.getElementById(`dashboard-info-modal-${type}`);
        if (!modal) return;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('overflow-hidden');
    }

    function closeDashboardInfoModal(type) {
        const modal = document.getElementById(`dashboard-info-modal-${type}`);
        if (!modal) return;
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
    }

    document.addEventListener('keydown', function(event) {
        if (event.key !== 'Escape') return;
        closeDashboardInfoModal('intro');
        closeDashboardInfoModal('desc');
    });

    document.addEventListener("DOMContentLoaded", function() {
        const revealElements = document.querySelectorAll(".reveal-on-scroll");

        const revealOptions = {
            threshold: 0.15, // Memicu animasi ketika 15% elemen terlihat
            rootMargin: "0px 0px -50px 0px" // Sedikit margin ke bawah
        };

        const revealOnScroll = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                } else {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target); // Supaya animasi jalan 1x saja
                }
            });
        }, revealOptions);

        revealElements.forEach(el => {
            revealOnScroll.observe(el);
        });
    });
</script>

@endsection