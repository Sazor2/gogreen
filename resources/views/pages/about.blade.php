@extends('layouts.app')

@section('title', __('app.about_title'))

@section('content')

<style>
    .about-ghost-border-top {
        border-top: 2px solid rgba(0, 53, 39, 0.1);
    }

    .about-soft-card {
        background-color: #ffffff;
        border: 1px solid #e5e7eb;
        box-shadow: 0 16px 35px rgba(17, 24, 39, 0.06);
    }
</style>

<main>
    {{-- Hero Section --}}
<section class="relative overflow-hidden flex items-center justify-center text-center text-white" style="min-height:380px; background-image: linear-gradient(rgba(6,78,59,0.85), rgba(6,78,59,0.95)), url('https://lh3.googleusercontent.com/aida-public/AB6AXuCmV1w1rWACjn3LP-TUCicQH2JDhg99b-gNEkwVNgNxGcSlMXbJWLPkaB3JyuAbf7xI4uNHFeD-PIM0guy0Xtql5iq2WFyXNfK1J7fTtoEtIgkwubJcQsoELVlQu6__pBbMtkMS4y76gm7rXCO800Y7EfvLIIycXKw_4Q1uZg_AOE-sCO6Sav5sNdGywsbOOUKmpumC6nUWpss064FjEm-tmnMdCRCG_pZ98eVaDFTTP99lhQcWStf8qzSVqaVzf5sszaCm49wvUocd'); background-size:cover; background-position:center;">
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(2,44,34,0.55) 0%, rgba(6,37,28,0.38) 40%, rgba(1,20,15,0.18) 100%);"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent 50%, rgba(1,20,15,0.28) 80%, #f6f8f7 100%);"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 60% at 50% 60%, rgba(17,212,115,0.07) 0%, transparent 70%);"></div>
    <div class="relative z-10 max-w-3xl mx-auto px-6">
        <span class="inline-block py-1 px-4 text-xs font-bold uppercase tracking-widest mb-4" style="background:rgba(17,212,115,0.2);border:1px solid rgba(17,212,115,0.3);color:#13ec92;border-radius:9999px;">
            {{ __('app.program_active') }}
        </span>
            <h1 class="text-5xl md:text-7xl font-black leading-tight mb-6">
                {{ __('app.about_title') }}
            </h1>
            <p class="text-lg md:text-xl font-medium" style="color:rgba(255,255,255,0.9);">
                {{ __('app.about_subtitle') }}
            </p>
    </div>
</section>

    {{-- Developer Profile --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">
            <div class="space-y-6">
                <div class="inline-block px-4 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold tracking-widest uppercase">
                    {{ __('app.about_developer') }}
                </div>

                <h2 class="text-4xl font-bold text-emerald-950 leading-tight">
                    Building Eco Digital Solutions
                </h2>

                <p class="text-slate-600 leading-relaxed text-lg">
                    {{ __('app.about_desc') }}
                </p>

                <div class="pt-4 flex flex-wrap gap-2">
                    @foreach(['Laravel 11', 'Livewire', 'Filament', 'TailwindCSS', 'Vite', 'PHP 8'] as $tech)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-100">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            <div class="relative group">
                <div class="absolute -inset-4 bg-emerald-100 rounded-[2rem] transform group-hover:scale-105 transition-transform duration-500"></div>

                <div class="relative about-soft-card p-10 rounded-xl about-ghost-border-top text-center">
                    <div class="w-32 h-32 mx-auto mb-6 bg-emerald-50 rounded-full flex items-center justify-center border-4 border-white">
                        <span class="material-symbols-outlined text-5xl text-emerald-700/60">person</span>
                    </div>

                    <h3 class="text-2xl font-bold text-emerald-950 mb-1">{{ __('app.about_name') }}</h3>
                    <p class="text-emerald-700 font-semibold text-sm tracking-widest uppercase mb-2">{{ __('app.about_role') }}</p>
                    <p class="text-slate-500 text-sm">{{ __('app.about_school') }} | {{ __('app.about_year') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="bg-slate-50 py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12 text-center md:text-left">
                <h2 class="text-3xl font-bold text-emerald-950 mb-3">{{ __('app.about_team_title') }}</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['name' => 'Nabil Aqbar Kurnia Wijaya Putra', 'icon' => 'code', 'jobs' => ['Lead Developer', 'Systems Architect', 'Database & Testing']],
                    ['name' => 'Fiersia Vinderly', 'icon' => 'brush', 'jobs' => ['UI / UX Designer', 'Design System', 'Frontend Styling']],
                    ['name' => 'Yosua', 'icon' => 'dns', 'jobs' => ['Backend Developer', 'API Integration', 'Server Logic']],
                    ['name' => 'Giovinco', 'icon' => 'eco', 'jobs' => [__('app.about_role_content'), 'Environmental Analyst', 'Content Strategy']],
                ] as $member)
                <div class="about-soft-card p-6 rounded-xl about-ghost-border-top hover:-translate-y-1 transition-transform duration-300">
                    <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mb-5">
                        <span class="material-symbols-outlined text-emerald-700" style="font-size:24px;">{{ $member['icon'] }}</span>
                    </div>
                    <h4 class="text-lg font-bold text-emerald-950">{{ $member['name'] }}</h4>
                    <div class="mt-3 space-y-1.5">
                        @foreach($member['jobs'] as $job)
                        <p class="text-slate-600 text-sm font-semibold">{{ $job }}</p>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Tools Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="bg-emerald-950 p-10 md:p-12 rounded-[2rem] text-center text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-400/10 rounded-full -mr-32 -mt-32"></div>

            <div class="z-10 relative">
                <h2 class="text-3xl font-bold mb-10">{{ __('app.about_tech_title') }}</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 text-left">
                    @foreach([
                        ['name' => 'Laravel 11',    'desc' => __('app.tech_laravel_desc'),  'icon' => 'data_object', 'color' => 'border-red-100   bg-red-50   text-red-700'],
                        ['name' => 'Blade',         'desc' => __('app.tech_blade_desc'),    'icon' => 'article', 'color' => 'border-orange-100 bg-orange-50 text-orange-700'],
                        ['name' => 'TailwindCSS',   'desc' => __('app.tech_tailwind_desc'), 'icon' => 'css', 'color' => 'border-blue-100  bg-blue-50  text-blue-700'],
                        ['name' => 'Vite',          'desc' => __('app.tech_vite_desc'),     'icon' => 'bolt', 'color' => 'border-purple-100 bg-purple-50 text-purple-700'],
                        ['name' => 'Filament',      'desc' => __('app.tech_filament_desc'), 'icon' => 'dashboard_customize', 'color' => 'border-yellow-100 bg-yellow-50 text-yellow-700'],
                        ['name' => 'Livewire',      'desc' => __('app.tech_livewire_desc'), 'icon' => 'sync_alt', 'color' => 'border-cyan-100   bg-cyan-50   text-cyan-700'],
                        ['name' => 'PHP 8.2+',      'desc' => __('app.tech_php_desc'),      'icon' => 'code', 'color' => 'border-indigo-100 bg-indigo-50 text-indigo-700'],
                        ['name' => 'Pest PHP',      'desc' => __('app.tech_pest_desc'),     'icon' => 'bug_report', 'color' => 'border-green-100  bg-green-50  text-green-700'],
                        ['name' => 'MySQL',         'desc' => __('app.tech_mysql_desc'),    'icon' => 'storage', 'color' => 'border-teal-100   bg-teal-50   text-teal-700'],
                    ] as $tech)
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-emerald-200" style="font-size:22px;line-height:1;">{{ $tech['icon'] }}</span>
                            <div>
                                <h4 class="font-bold text-white">{{ $tech['name'] }}</h4>
                                <p class="text-sm text-emerald-100/80 mt-1">{{ $tech['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="mb-12 text-center">
            <h2 class="text-3xl font-bold text-emerald-950 mb-2">{{ __('app.about_contact_title') }}</h2>
            <div class="h-1 w-20 bg-emerald-500 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-50 p-8 rounded-xl flex flex-col items-center text-center group hover:bg-slate-100 transition-colors">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-emerald-700">alternate_email</span>
                </div>
                <h5 class="font-bold text-emerald-950 mb-2">Email</h5>
                <p class="text-slate-600 text-sm">{{ __('app.about_email') }}</p>
            </div>

            <div class="bg-slate-50 p-8 rounded-xl flex flex-col items-center text-center group hover:bg-slate-100 transition-colors">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-emerald-700">photo_camera</span>
                </div>
                <h5 class="font-bold text-emerald-950 mb-2">Instagram</h5>
                <p class="text-slate-600 text-sm">{{ __('app.about_instagram') }}</p>
            </div>

            <div class="bg-slate-50 p-8 rounded-xl flex flex-col items-center text-center group hover:bg-slate-100 transition-colors">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-emerald-700">language</span>
                </div>
                <h5 class="font-bold text-emerald-950 mb-2">Website</h5>
                <p class="text-slate-600 text-sm">{{ __('app.about_website') }}</p>
            </div>
        </div>
    </section>
</main>

@endsection
