@extends('layouts.app')

@section('title', __('app.about_title'))

@section('html_class', 'about-page')

@section('content')

<style>
    :root {
        --eco-dark: #012d1d;
        --eco-medium: #059669;
        --eco-accent: #a2f31f;
        --eco-bg: #f8fafc;
    }

    html.dark {
        --eco-dark: #e6f4ee;
        --eco-medium: #7ff3be;
        --eco-accent: #a2f31f;
        --eco-bg: #0a0f12;
    }

    /* EcoVibes Typography */
    @import url('https://fonts.googleapis.com/css2?family=Epilogue:wght@700;800;900&family=Inter:wght@400;500;600&display=swap');

    .font-headline { font-family: 'DM Sans', 'Epilogue', sans-serif; }
    .font-body { font-family: 'Roboto', 'Inter', sans-serif; }

    /* Reveal on Scroll Animation */
    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.5, 0, 0, 1), transform 0.8s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .editorial-shadow {
        box-shadow: 0 25px 50px -12px rgba(1, 45, 29, 0.08);
    }

    html.dark.about-page .editorial-shadow {
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.45);
    }

    .glass-pill {
        background: rgba(162, 243, 31, 0.1);
        border: 1px solid rgba(162, 243, 31, 0.2);
        color: var(--eco-accent);
    }

    .tech-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
    }

    .tech-card:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--eco-accent);
        transform: translateY(-5px);
    }

    .team-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #f1f5f9;
    }

    html.dark .team-card {
        border-color: #24313a;
    }

    html.dark.about-page .team-card {
        background-color: #141b21;
    }

    html.dark.about-page .about-tech-section {
        background-color: #0f1418;
    }

    html.dark.about-page .about-tech-section h2 {
        color: #e6edf3;
    }

    html.dark.about-page .about-tech-section .tech-card {
        background: #11181e;
        border-color: #24313a;
    }

    html.dark.about-page .about-tech-section p {
        color: #a6b0ba;
    }

    .team-card:hover {
        border-color: var(--eco-accent);
        box-shadow: 0 20px 40px rgba(1, 45, 29, 0.05);
    }

    .about-member-icon-wrap {
        background: linear-gradient(145deg, rgba(0, 105, 72, 0.12), rgba(162, 243, 31, 0.2));
        box-shadow: 0 8px 20px rgba(0, 105, 72, 0.12);
    }

    .about-member-icon {
        color: var(--eco-medium);
    }

    html.dark.about-page .about-member-icon-wrap {
        background: linear-gradient(145deg, rgba(127, 243, 190, 0.16), rgba(162, 243, 31, 0.2));
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.35);
    }

    html.dark.about-page .about-member-icon {
        color: #a2f31f;
    }

    /* Click-based Flip Card Animation */
    .flip-card-wrapper {
        perspective: 1000px;
        cursor: pointer;
    }

    .flip-card-container {
        position: relative;
        width: 100%;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }

    .flip-card-container.flipped {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        width: 100%;
        backface-visibility: hidden;
        border-radius: 2.5rem;
    }

    .flip-card-front {
        z-index: 2;
    }

    .flip-card-back {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        transform: rotateY(180deg);
        background-image: url('{{ asset("images/team.jpg") }}');
        background-size: cover;
        background-position: center;
        background-color: rgba(0, 0, 0, 0.4);
        background-blend-mode: overlay;
    }

    .flip-card-back::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(5, 150, 105, 0.3));
        border-radius: 2.5rem;
    }

    .flip-card-back-text {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 2rem;
        color: white;
        text-align: center;
        font-size: 1.25rem;
        font-weight: 900;
        font-family: 'DM Sans', sans-serif;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    /* Mobile-only tuning: keep desktop untouched */
    @media (max-width: 768px) {
        html.about-page,
        html.about-page body {
            overflow-x: hidden;
        }

        .about-main {
            padding-bottom: 3.25rem;
            overflow-x: hidden;
        }

        .about-main > .about-hero-wrap,
        .about-main > .about-dev-section,
        .about-main > .about-team-section,
        .about-main > .about-tools-section {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .about-dev-section,
        .about-team-section,
        .about-tools-section {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .about-dev-visual {
            overflow: visible;
        }

        .about-dev-tilt-bg {
            inset: 0.05rem;
            transform: rotate(4deg);
            transform-origin: center;
        }

        .about-dev-visual .flip-card-wrapper {
            width: min(100%, 19.75rem);
            margin-left: auto;
            margin-right: auto;
        }

        .about-hero-overlay-left,
        .about-hero-overlay-right {
            display: none !important;
        }

        .about-hero-glow {
            display: none !important;
        }

        /* Keep animation behavior consistent with desktop */
        .reveal-on-scroll {
            transition: opacity 0.8s cubic-bezier(0.5, 0, 0, 1), transform 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .tech-card {
            transition: all 0.3s ease;
        }

        .team-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .about-dev-section,
        .about-team-section,
        .about-tools-section {
            padding-top: 3.4rem;
            padding-bottom: 3.4rem;
        }

        .about-dev-grid {
            gap: 2rem;
        }

        .about-dev-stack {
            gap: 0.35rem;
            padding-top: 0.25rem;
        }

        .about-dev-stack span {
            font-size: 10px;
            padding: 0.34rem 0.62rem;
            border-radius: 0.6rem;
        }

        .about-dev-copy span {
            font-size: 10px;
            letter-spacing: 0.16em;
            margin-bottom: 0.45rem;
        }

        .about-dev-copy h2 {
            font-size: 1.7rem;
        }

        .about-dev-copy p {
            font-size: 0.86rem;
            line-height: 1.55;
        }

        .about-flip-front {
            height: 340px;
            padding: 1.6rem;
            border-radius: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .about-flip-front .relative.w-32.h-32 {
            width: 5.5rem;
            height: 5.5rem;
            min-width: 5.5rem;
            min-height: 5.5rem;
            aspect-ratio: 1 / 1;
            margin-bottom: 0.9rem;
        }

        .about-flip-front .relative.w-32.h-32 > div,
        .about-flip-front .relative.w-32.h-32 > div > div {
            border-radius: 9999px;
        }

        .about-flip-front h3 {
            font-size: 1.45rem;
        }

        .about-flip-front p {
            font-size: 10px;
        }

        .about-flip-back {
            height: 340px !important;
            border-radius: 2rem;
        }

        .about-team-head,
        .about-tools-head {
            margin-bottom: 1.75rem;
        }

        .about-team-head span,
        .about-tools-head span {
            font-size: 10px;
            letter-spacing: 0.16em;
        }

        .about-team-head h2,
        .about-tools-head h2 {
            font-size: 1.75rem;
        }

        .about-team-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .about-team-grid .team-card {
            padding: 0.85rem;
            border-radius: 1rem;
        }

        .about-team-grid .about-member-icon-wrap {
            width: 2.4rem;
            height: 2.4rem;
            border-radius: 0.7rem;
            margin-bottom: 0.6rem;
        }

        .about-team-grid .about-member-icon {
            font-size: 1.05rem;
        }

        .about-team-grid h4 {
            font-size: 0.8rem;
            min-height: 2.1rem;
            margin-bottom: 0.45rem;
        }

        .about-team-grid .space-y-2 {
            row-gap: 0.2rem;
        }

        .about-team-grid .space-y-2 span {
            font-size: 8px;
            letter-spacing: 0.08em;
        }

        .about-tools-box {
            padding: 1rem;
            border-radius: 1.5rem;
        }

        .about-tools-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.5rem;
        }

        .about-tools-grid .tech-card {
            padding: 0.6rem;
            border-radius: 0.8rem;
        }

        .about-tool-head {
            gap: 0.45rem;
            margin-bottom: 0.42rem;
        }

        .about-tools-grid .tech-card .w-10 {
            width: 1.65rem;
            height: 1.65rem;
            border-radius: 0.5rem;
        }

        .about-tools-grid .tech-card .material-symbols-outlined {
            font-size: 0.95rem;
        }

        .about-tool-name {
            font-size: 0.66rem;
            line-height: 1.25;
            margin-bottom: 0;
            overflow-wrap: normal;
            word-break: keep-all;
            hyphens: none;
        }

        .about-tool-desc {
            font-size: 0.56rem;
            line-height: 1.3;
        }
    }

    @media (max-width: 640px) {
        html.about-page nav > div {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        html.about-page nav a > span > .sm\:hidden {
            white-space: nowrap;
            font-size: 0.95rem;
            line-height: 1.08;
        }

        html.about-page nav .flex.items-center.gap-4 {
            gap: 0.55rem;
        }

        .about-hero-wrap {
            margin-top: 1rem !important;
        }

        .about-hero-section {
            min-height: 380px;
            border-radius: 1.25rem;
        }

        .about-hero-content {
            padding: 2rem 1.25rem;
            max-width: none;
        }

        .about-hero-title {
            font-size: 2.4rem;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .about-hero-subtitle {
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.55;
        }
    }
</style>

<main class="about-main font-body bg-[var(--eco-bg)] min-h-screen pb-20">
    {{-- Hero Section (Dashboard Style) --}}
<div class="about-hero-wrap relative w-full max-w-none sm:max-w-7xl mx-auto px-2 sm:px-6 md:px-8 mt-6 sm:mt-8">
    <section class="about-hero-section relative min-h-[420px] sm:min-h-[500px] overflow-hidden flex items-center text-white rounded-3xl editorial-shadow group reveal-on-scroll shadow-[0_32px_64px_rgba(10,47,34,0.15)]">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img src="{{ asset('images/sekolahkb.png') }}" class="w-full h-full object-cover" alt="Background">
        </div>

        <div class="about-hero-overlay-left absolute inset-y-0 left-0 w-full md:w-1/2 bg-gradient-to-r from-[#0a2f22]/70 via-[#0a2f22]/30 to-transparent z-10"></div>
        <div class="about-hero-overlay-right absolute inset-y-0 right-0 w-full md:w-1/3 bg-gradient-to-l from-[#0a2f22]/70 via-[#0a2f22]/25 to-transparent z-10"></div>
        <div class="about-hero-glow absolute top-1/2 -translate-y-1/2 -right-20 w-[500px] h-[500px] bg-[#00ff88]/20 blur-[100px] rounded-full z-10 pointer-events-none"></div>

        <div class="about-hero-content relative z-20 px-4 sm:px-8 md:px-12 max-w-none sm:max-w-2xl py-10 sm:py-12">
            <div class="about-hero-badge inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white text-xs font-bold font-headline uppercase tracking-[0.15em] mb-4 sm:mb-6 shadow-lg transition-colors hover:bg-white/20 hover:border-white/50 cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-[#a2f31f] animate-pulse shadow-[0_0_10px_#a2f31f]"></span>
                {{ __('app.badge_environment_platform') }}
            </div>
            <h1 class="about-hero-title font-headline text-[2.6rem] sm:text-[3.5rem] md:text-[5rem] font-extrabold leading-[1.05] tracking-tight mb-4 sm:mb-6 drop-shadow-2xl text-white">
                {{ __('app.about_title') }}
            </h1>
            <p class="about-hero-subtitle text-white/90 text-base sm:text-lg md:text-xl font-medium mb-6 sm:mb-10 leading-relaxed drop-shadow-md max-w-xl font-body">
                {{ __('app.about_subtitle') }}
            </p>
        </div>

    </section>
</div>

    {{-- Developer Profile --}}
    <section class="about-dev-section py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll">
        <div class="about-dev-grid grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="about-dev-copy space-y-8">
                <div>
                    <span class="text-[var(--eco-medium)] font-black text-[11px] uppercase tracking-[0.3em] mb-4 block">
                        {{ __('app.about_developer') }}
                    </span>
                    <h2 class="text-4xl md:text-5xl font-headline font-black text-[var(--eco-dark)] leading-[1.1] tracking-tight">
                        {{ __('app.about_dev_heading') }}
                    </h2>
                </div>

                <p class="text-slate-500 leading-relaxed text-lg font-medium">
                    {{ __('app.about_desc') }}
                </p>

                <div class="about-dev-stack flex flex-wrap gap-2 pt-4">
                    @foreach(['Laravel 11', 'Livewire', 'Filament', 'TailwindCSS', 'Vite', 'PHP 8'] as $tech)
                    <span class="px-4 py-2 rounded-xl text-[11px] font-black bg-white border border-slate-100 text-slate-700 shadow-sm uppercase tracking-wider">
                        {{ $tech }}
                    </span>
                    @endforeach
                </div>
            </div>

            <div class="about-dev-visual relative">
                <div class="about-dev-tilt-bg absolute -inset-6 bg-[var(--eco-accent)]/20 rounded-[3rem] rotate-3 -z-10"></div>
                
                <div class="flip-card-wrapper editorial-shadow reveal-on-scroll" onclick="document.querySelector('.flip-card-container').classList.toggle('flipped')">
                    <div class="flip-card-container">
                        <!-- Front: Original Card Content -->
                        <div class="about-flip-front flip-card-front bg-white p-12 rounded-[2.5rem] text-center border border-emerald-50">
                            <div class="relative w-32 h-32 mx-auto mb-8">
                                <div class="absolute inset-0 bg-[var(--eco-accent)] rounded-full animate-ping opacity-20"></div>
                                <div class="relative w-full h-full bg-slate-50 rounded-full flex items-center justify-center border-4 border-white shadow-inner">
                                    <span class="material-symbols-outlined text-5xl text-[var(--eco-dark)]">person</span>
                                </div>
                            </div>

                            <h3 class="text-3xl font-headline font-black text-[var(--eco-dark)] mb-2">{{ __('app.about_name') }}</h3>
                            <p class="text-[var(--eco-medium)] font-black text-xs tracking-[0.2em] uppercase mb-6">{{ __('app.about_role') }}</p>
                            
                            <div class="inline-block px-6 py-3 rounded-2xl bg-slate-50 border border-slate-100">
                                <p class="text-slate-400 text-xs font-bold leading-relaxed">
                                    {{ __('app.about_school') }} <br> 
                                    <span class="text-[var(--eco-dark)] uppercase tracking-widest text-[10px]">{{ __('app.about_year') }}</span>
                                </p>
                            </div>
                        </div>

                        <!-- Back: Photo -->
                        <div class="about-flip-back flip-card-back w-full rounded-[2.5rem] border border-emerald-50 relative" style="height: 440px;">
                            <div class="flip-card-back-text">
                                "{{ __('app.about_name') }}"
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="about-team-section bg-white py-24 px-4 sm:px-6 lg:px-8 border-y border-slate-100 reveal-on-scroll">
        <div class="max-w-7xl mx-auto">
            <div class="about-team-head mb-16 text-center">
                <span class="text-[var(--eco-medium)] font-black text-[11px] uppercase tracking-[0.3em] mb-4 block">{{ __('app.about_team_label') }}</span>
                <h2 class="text-4xl font-headline font-black text-[var(--eco-dark)] tracking-tight">{{ __('app.about_team_title') }}</h2>
            </div>

            <div class="about-team-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['name' => 'Nabil Aqbar Kurnia Wijaya Putra', 'icon' => 'code', 'jobs' => [__('app.about_job_lead_dev'), __('app.about_job_systems_arch')]],
                    ['name' => 'Fiersia Vinderly', 'icon' => 'brush', 'jobs' => [__('app.about_job_uiux_designer'), __('app.about_job_design_system')]],
                    ['name' => 'Yosua', 'icon' => 'dns', 'jobs' => [__('app.about_job_content_strategy')]],
                    ['name' => 'Giovinco', 'icon' => 'eco', 'jobs' => [__('app.about_role_content')]],
                ] as $member)
                <div class="team-card p-8 rounded-[2rem] bg-slate-50 flex flex-col items-center text-center reveal-on-scroll">
                    <div class="about-member-icon-wrap w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                        <span class="about-member-icon material-symbols-outlined text-2xl">{{ $member['icon'] }}</span>
                    </div>
                    <h4 class="text-lg font-headline font-black text-[var(--eco-dark)] leading-tight mb-4 min-h-[50px] flex items-center">{{ $member['name'] }}</h4>
                    <div class="space-y-2">
                        @foreach($member['jobs'] as $job)
                        <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $job }}</span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Tools Section (Dark Mode Vibes) --}}
    <section class="about-tools-section py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll">
        <div class="about-tools-box about-tech-section bg-[var(--eco-dark)] p-12 md:p-20 rounded-[3rem] shadow-2xl relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-80 h-80 bg-[var(--eco-accent)] opacity-10 rounded-full blur-[100px]"></div>

            <div class="relative z-10">
                <div class="about-tools-head text-center mb-16">
                    <h2 class="text-4xl font-headline font-black text-white tracking-tight">{{ __('app.about_tech_title') }}</h2>
                    <div class="w-20 h-1.5 bg-[var(--eco-accent)] mx-auto mt-6 rounded-full"></div>
                </div>

                <div class="about-tools-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        ['name' => 'Laravel 11',    'desc' => __('app.tech_laravel_desc'),  'icon' => 'data_object'],
                        ['name' => 'Blade',         'desc' => __('app.tech_blade_desc'),    'icon' => 'article'],
                        ['name' => 'Tailwind CSS',  'desc' => __('app.tech_tailwind_desc'), 'icon' => 'css'],
                        ['name' => 'Vite',          'desc' => __('app.tech_vite_desc'),     'icon' => 'bolt'],
                        ['name' => 'Filament',      'desc' => __('app.tech_filament_desc'), 'icon' => 'dashboard_customize'],
                        ['name' => 'Livewire',      'desc' => __('app.tech_livewire_desc'), 'icon' => 'sync_alt'],
                        ['name' => 'PHP 8.2+',      'desc' => __('app.tech_php_desc'),      'icon' => 'code'],
                        ['name' => 'Pest PHP',      'desc' => __('app.tech_pest_desc'),     'icon' => 'bug_report'],
                        ['name' => 'MySQL',         'desc' => __('app.tech_mysql_desc'),    'icon' => 'storage'],
                    ] as $tech)
                    <div class="tech-card p-6 rounded-2xl reveal-on-scroll">
                        <div class="about-tool-head flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-[var(--eco-accent)] text-xl">{{ $tech['icon'] }}</span>
                            </div>
                            <h4 class="about-tool-name font-headline font-bold text-white mb-0">{{ $tech['name'] }}</h4>
                        </div>
                        <p class="about-tool-desc text-sm text-emerald-100/50 leading-relaxed font-medium">{{ $tech['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
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
        document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
    };
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', window.setupRevealOnScroll);
    } else {
        window.setupRevealOnScroll();
    }
</script>
@endpush

@endsection