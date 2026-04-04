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
</style>

<main class="font-body bg-[var(--eco-bg)] min-h-screen pb-20">
    {{-- Hero Section (Dashboard Style) --}}
    <section class="relative mt-8 min-h-[420px] sm:min-h-[500px] overflow-hidden flex items-center text-white max-w-7xl mx-auto rounded-3xl editorial-shadow group reveal-on-scroll shadow-[0_32px_64px_rgba(10,47,34,0.15)]">
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmV1w1rWACjn3LP-TUCicQH2JDhg99b-gNEkwVNgNxGcSlMXbJWLPkaB3JyuAbf7xI4uNHFeD-PIM0guy0Xtql5iq2WFyXNfK1J7fTtoEtIgkwubJcQsoELVlQu6__pBbMtkMS4y76gm7rXCO800Y7EfvLIIycXKw_4Q1uZg_AOE-sCO6Sav5sNdGywsbOOUKmpumC6nUWpss064FjEm-tmnMdCRCG_pZ98eVaDFTTP99lhQcWStf8qzSVqaVzf5sszaCm49wvUocd" class="w-full h-full object-cover" alt="Background">
        </div>

        <div class="absolute inset-y-0 left-0 w-full md:w-1/2 bg-gradient-to-r from-[#0a2f22]/90 via-[#0a2f22]/50 to-transparent z-10"></div>
        <div class="absolute inset-y-0 right-0 w-full md:w-1/3 bg-gradient-to-l from-[#0a2f22]/90 via-[#0a2f22]/60 to-transparent z-10"></div>
        <div class="absolute top-1/2 -translate-y-1/2 -right-20 w-[500px] h-[500px] bg-[#00ff88]/20 blur-[100px] rounded-full z-10 pointer-events-none"></div>

        <div class="relative z-20 px-8 md:px-12 max-w-2xl py-12">
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white text-xs font-bold font-headline uppercase tracking-[0.15em] mb-6 shadow-lg transition-colors hover:bg-white/20 hover:border-white/50 cursor-default">
                <span class="w-2.5 h-2.5 rounded-full bg-[#a2f31f] animate-pulse shadow-[0_0_10px_#a2f31f]"></span>
                {{ __('app.badge_environment_platform') }}
            </div>
            <h1 class="font-headline text-[2.6rem] sm:text-[3.5rem] md:text-[5rem] font-extrabold leading-[1.05] tracking-tight mb-6 drop-shadow-2xl text-white">
                {{ __('app.about_title') }}
            </h1>
            <p class="text-white/90 text-base sm:text-lg md:text-xl font-medium mb-8 leading-relaxed drop-shadow-md max-w-xl font-body">
                {{ __('app.about_subtitle') }}
            </p>
        </div>

    </section>

    {{-- Developer Profile --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
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

                <div class="flex flex-wrap gap-2 pt-4">
                    @foreach(['Laravel 11', 'Livewire', 'Filament', 'TailwindCSS', 'Vite', 'PHP 8'] as $tech)
                    <span class="px-4 py-2 rounded-xl text-[11px] font-black bg-white border border-slate-100 text-slate-700 shadow-sm uppercase tracking-wider">
                        {{ $tech }}
                    </span>
                    @endforeach
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-6 bg-[var(--eco-accent)]/20 rounded-[3rem] rotate-3 -z-10"></div>
                
                <div class="bg-white p-12 rounded-[2.5rem] editorial-shadow text-center border border-emerald-50 reveal-on-scroll">
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
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="bg-white py-24 px-4 sm:px-6 lg:px-8 border-y border-slate-100 reveal-on-scroll">
        <div class="max-w-7xl mx-auto">
            <div class="mb-16 text-center">
                <span class="text-[var(--eco-medium)] font-black text-[11px] uppercase tracking-[0.3em] mb-4 block">{{ __('app.about_team_label') }}</span>
                <h2 class="text-4xl font-headline font-black text-[var(--eco-dark)] tracking-tight">{{ __('app.about_team_title') }}</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['name' => 'Nabil Aqbar Kurnia Wijaya Putra', 'icon' => 'code', 'jobs' => [__('app.about_job_lead_dev'), __('app.about_job_systems_arch')]],
                    ['name' => 'Fiersia Vinderly', 'icon' => 'brush', 'jobs' => [__('app.about_job_uiux_designer'), __('app.about_job_design_system')]],
                    ['name' => 'Yosua', 'icon' => 'dns', 'jobs' => [__('app.about_job_backend_dev'), __('app.about_job_server_logic')]],
                    ['name' => 'Giovinco', 'icon' => 'eco', 'jobs' => [__('app.about_role_content'), __('app.about_job_content_strategy')]],
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
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto reveal-on-scroll">
        <div class="about-tech-section bg-[var(--eco-dark)] p-12 md:p-20 rounded-[3rem] shadow-2xl relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-80 h-80 bg-[var(--eco-accent)] opacity-10 rounded-full blur-[100px]"></div>

            <div class="relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-headline font-black text-white tracking-tight">{{ __('app.about_tech_title') }}</h2>
                    <div class="w-20 h-1.5 bg-[var(--eco-accent)] mx-auto mt-6 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        ['name' => 'Laravel 11',    'desc' => __('app.tech_laravel_desc'),  'icon' => 'data_object'],
                        ['name' => 'Blade',         'desc' => __('app.tech_blade_desc'),    'icon' => 'article'],
                        ['name' => 'TailwindCSS',   'desc' => __('app.tech_tailwind_desc'), 'icon' => 'css'],
                        ['name' => 'Vite',          'desc' => __('app.tech_vite_desc'),     'icon' => 'bolt'],
                        ['name' => 'Filament',      'desc' => __('app.tech_filament_desc'), 'icon' => 'dashboard_customize'],
                        ['name' => 'Livewire',      'desc' => __('app.tech_livewire_desc'), 'icon' => 'sync_alt'],
                        ['name' => 'PHP 8.2+',      'desc' => __('app.tech_php_desc'),      'icon' => 'code'],
                        ['name' => 'Pest PHP',      'desc' => __('app.tech_pest_desc'),     'icon' => 'bug_report'],
                        ['name' => 'MySQL',         'desc' => __('app.tech_mysql_desc'),    'icon' => 'storage'],
                    ] as $tech)
                    <div class="tech-card p-6 rounded-2xl reveal-on-scroll">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-[var(--eco-accent)] text-xl">{{ $tech['icon'] }}</span>
                            </div>
                            <div>
                                <h4 class="font-headline font-bold text-white mb-2">{{ $tech['name'] }}</h4>
                                <p class="text-sm text-emerald-100/50 leading-relaxed font-medium">{{ $tech['desc'] }}</p>
                            </div>
                        </div>
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