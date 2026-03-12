<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Go Green School') — SMK Karya Bangsa Sintang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-display bg-background-light text-slate-900 antialiased">

    {{-- Navbar --}}
    <nav class="sticky top-0 z-50 w-full border-b border-emerald-900/10 bg-emerald-900/90 glass-effect">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                {{-- Logo / Brand --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-90 transition-opacity">
                    <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="Go Green Logo" style="height:75px;width:auto;">
                    <span class="text-white text-xl font-bold tracking-tight">Go Green School</span>
                </a>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ url('/') }}"
                       class="text-sm font-semibold transition-colors {{ request()->is('/') ? 'text-primary' : 'text-white/70 hover:text-primary' }}">
                        {{ __('app.nav_dashboard') }}
                    </a>
                    <a href="{{ url('/tanaman') }}"
                       class="text-sm font-medium transition-colors {{ request()->is('tanaman') ? 'text-primary' : 'text-white/70 hover:text-primary' }}">
                        {{ __('app.nav_tanaman') }}
                    </a>
                    <a href="{{ url('/kalkulator') }}"
                       class="text-sm font-medium transition-colors {{ request()->is('kalkulator') ? 'text-primary' : 'text-white/70 hover:text-primary' }}">
                        {{ __('app.nav_kalkulator') }}
                    </a>

                    <a href="{{ url('/contact') }}"
                       class="text-sm font-medium transition-colors {{ request()->is('contact') ? 'text-primary' : 'text-white/70 hover:text-primary' }}">
                        {{ __('app.nav_contact') }}
                    </a>

                    {{-- Info Dropdown --}}
                    <div class="relative" id="info-wrapper">
                        <button id="info-btn"
                            class="flex items-center gap-1 text-sm font-medium transition-colors focus:outline-none
                                   {{ request()->is('tentang','latar-belakang','profil-sekolah') ? 'text-primary' : 'text-white/70 hover:text-primary' }}">
                            {{ __('app.nav_info') }}
                            <span class="material-symbols-outlined" style="font-size:1.1rem;line-height:1" id="info-chevron-icon">expand_more</span>
                        </button>
                        <div id="info-menu"
                             class="hidden absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-xl border border-slate-100 overflow-hidden z-50">
                            <a href="{{ url('/tentang') }}"
                               class="flex items-center gap-3 px-4 py-3 text-sm text-slate-700 hover:bg-emerald-50 hover:text-primary transition-colors {{ request()->is('tentang') ? 'bg-emerald-50 text-primary font-semibold' : '' }}">
                                <span class="material-symbols-outlined" style="font-size:1.1rem">person</span>
                                {{ __('app.nav_about') }}
                            </a>
                            <div class="border-t border-slate-100"></div>
                            <a href="{{ url('/latar-belakang') }}"
                               class="flex items-center gap-3 px-4 py-3 text-sm text-slate-700 hover:bg-emerald-50 hover:text-primary transition-colors {{ request()->is('latar-belakang') ? 'bg-emerald-50 text-primary font-semibold' : '' }}">
                                <span class="material-symbols-outlined" style="font-size:1.1rem">description</span>
                                {{ __('app.nav_latar') }}
                            </a>
                            <div class="border-t border-slate-100"></div>
                            <a href="{{ url('/profil-sekolah') }}"
                               class="flex items-center gap-3 px-4 py-3 text-sm text-slate-700 hover:bg-emerald-50 hover:text-primary transition-colors {{ request()->is('profil-sekolah') ? 'bg-emerald-50 text-primary font-semibold' : '' }}">
                                <span class="material-symbols-outlined" style="font-size:1.1rem">school</span>
                                {{ __('app.nav_profil_sek') }}
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right side: Language + Mobile --}}
                <div class="flex items-center gap-4">
                    {{-- Language Switcher --}}
                    <div class="relative" id="lang-wrapper">
                        <button id="lang-btn"
                            class="hidden md:flex items-center gap-2 bg-white/10 hover:bg-white/20 transition-all px-3 py-1.5 rounded-lg border border-white/10 focus:outline-none">
                            @if(app()->getLocale() === 'en')
                                <span class="fi fi-gb fis rounded" style="font-size:1.1rem;box-shadow:0 1px 2px rgba(0,0,0,.3)"></span>
                                <span class="text-white text-xs font-bold uppercase">EN</span>
                            @else
                                <span class="fi fi-id fis rounded" style="font-size:1.1rem;box-shadow:0 1px 2px rgba(0,0,0,.3)"></span>
                                <span class="text-white text-xs font-bold uppercase">ID</span>
                            @endif
                            <svg class="w-3 h-3 text-white/60 transition-transform" id="lang-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="lang-menu"
                             class="hidden absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-xl border border-slate-100 overflow-hidden z-50">
                            <a href="{{ route('lang.switch', 'id') }}"
                               class="flex items-center justify-between px-4 py-3 text-sm text-slate-700 hover:bg-emerald-50 hover:text-primary transition-colors">
                                <div class="flex items-center gap-2">
                                    <span class="fi fi-id" style="border-radius:3px;font-size:1.3rem;box-shadow:0 1px 3px rgba(0,0,0,.25)"></span>
                                    <span class="font-medium">Indonesia</span>
                                </div>
                                @if(app()->getLocale() === 'id')
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                @endif
                            </a>
                            <div class="border-t border-slate-100"></div>
                            <a href="{{ route('lang.switch', 'en') }}"
                               class="flex items-center justify-between px-4 py-3 text-sm text-slate-700 hover:bg-emerald-50 hover:text-primary transition-colors">
                                <div class="flex items-center gap-2">
                                    <span class="fi fi-gb" style="border-radius:3px;font-size:1.3rem;box-shadow:0 1px 3px rgba(0,0,0,.25)"></span>
                                    <span class="font-medium">English</span>
                                </div>
                                @if(app()->getLocale() === 'en')
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                @endif
                            </a>
                        </div>
                    </div>

                    {{-- Mobile: language toggle + hamburger --}}
                    <div class="flex items-center gap-2 md:hidden">
                        <a href="{{ route('lang.switch', app()->getLocale() === 'id' ? 'en' : 'id') }}"
                           class="flex items-center gap-1.5 bg-white/10 hover:bg-white/20 border border-white/10 text-white text-xs font-bold uppercase px-2.5 py-1.5 rounded-lg transition-colors">
                            @if(app()->getLocale() === 'en')
                                <span class="fi fi-gb fis rounded" style="font-size:1rem"></span> EN
                            @else
                                <span class="fi fi-id fis rounded" style="font-size:1rem"></span> ID
                            @endif
                        </a>
                        <button id="menu-btn" class="text-white p-2 rounded-lg hover:bg-white/10 transition-colors">
                            <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-white/10">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ url('/') }}" class="block px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ request()->is('/') ? 'text-primary' : 'text-white/80 hover:text-primary' }}">
                    {{ __('app.nav_dashboard') }}
                </a>
                <a href="{{ url('/tanaman') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('tanaman') ? 'text-primary' : 'text-white/80 hover:text-primary' }}">
                    {{ __('app.nav_tanaman') }}
                </a>
                <a href="{{ url('/kalkulator') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('kalkulator') ? 'text-primary' : 'text-white/80 hover:text-primary' }}">
                    {{ __('app.nav_kalkulator') }}
                </a>
                <div class="border-t border-white/10 pt-2 mt-2">
                    <p class="text-xs text-white/40 px-4 mb-1 uppercase tracking-widest font-bold">{{ __('app.nav_info') }}</p>
                    <a href="{{ url('/tentang') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-white/80 hover:text-primary transition-colors">{{ __('app.nav_about') }}</a>
                    <a href="{{ url('/latar-belakang') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-white/80 hover:text-primary transition-colors">{{ __('app.nav_latar') }}</a>
                    <a href="{{ url('/profil-sekolah') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-white/80 hover:text-primary transition-colors">{{ __('app.nav_profil_sek') }}</a>
                    <a href="{{ url('/contact') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium text-white/80 hover:text-primary transition-colors">{{ __('app.nav_contact') }}</a>
                </div>
                <div class="border-t border-white/10 pt-2 mt-2">
                    <p class="text-xs text-white/40 px-4 mb-1 uppercase tracking-widest font-bold">{{ __('app.language') }}</p>
                    <a href="{{ route('lang.switch', 'id') }}" class="flex items-center justify-between px-4 py-2.5 rounded-lg text-sm font-medium text-white/80 hover:text-primary transition-colors">
                        <span class="flex items-center gap-2"><span class="fi fi-id" style="border-radius:3px;font-size:1.2rem"></span> Indonesia</span>
                        @if(app()->getLocale() === 'id') <span class="w-2 h-2 rounded-full bg-primary"></span> @endif
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" class="flex items-center justify-between px-4 py-2.5 rounded-lg text-sm font-medium text-white/80 hover:text-primary transition-colors">
                        <span class="flex items-center gap-2"><span class="fi fi-gb" style="border-radius:3px;font-size:1.2rem"></span> English</span>
                        @if(app()->getLocale() === 'en') <span class="w-2 h-2 rounded-full bg-primary"></span> @endif
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-slate-400 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="Go Green Logo" style="height:70px;width:auto;">
                <div class="text-left">
                    <p class="text-white font-bold text-lg leading-tight">Go Green School</p>
                    <p class="text-xs">© {{ date('Y') }} SMK Karya Bangsa Sintang. {{ __('app.footer_credit') }}</p>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-8 text-sm font-medium">
                <a class="hover:text-primary transition-colors" href="{{ url('/tentang') }}">{{ __('app.nav_about') }}</a>
                <a class="hover:text-primary transition-colors" href="{{ url('/latar-belakang') }}">{{ __('app.nav_latar') }}</a>
                <a class="hover:text-primary transition-colors" href="{{ url('/profil-sekolah') }}">{{ __('app.nav_profil_sek') }}</a>
                <a class="hover:text-primary transition-colors" href="{{ url('/tanaman') }}">{{ __('app.nav_tanaman') }}</a>
                <a class="hover:text-primary transition-colors" href="{{ url('/contact') }}">{{ __('app.nav_contact') }}</a>
            </div>
            <div class="flex gap-4">
                <button class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-emerald-950 transition-all">
                    <span class="material-symbols-outlined" style="font-size:1.2rem">public</span>
                </button>
                <button class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-emerald-950 transition-all">
                    <span class="material-symbols-outlined" style="font-size:1.2rem">mail</span>
                </button>
            </div>
        </div>
    </footer>

    <script>
        // Mobile nav
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });

        // Language dropdown
        const langBtn = document.getElementById('lang-btn');
        const langMenu = document.getElementById('lang-menu');
        const langChevron = document.getElementById('lang-chevron');
        if (langBtn) {
            langBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                langMenu.classList.toggle('hidden');
                langChevron.style.transform = langMenu.classList.contains('hidden') ? '' : 'rotate(180deg)';
            });
            document.addEventListener('click', () => {
                langMenu.classList.add('hidden');
                langChevron.style.transform = '';
            });
        }

        // Info dropdown
        const infoBtn = document.getElementById('info-btn');
        const infoMenu = document.getElementById('info-menu');
        const infoChevron = document.getElementById('info-chevron');
        if (infoBtn) {
            infoBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                infoMenu.classList.toggle('hidden');
                infoChevron.style.transform = infoMenu.classList.contains('hidden') ? '' : 'rotate(180deg)';
            });
            document.addEventListener('click', () => {
                infoMenu.classList.add('hidden');
                infoChevron.style.transform = '';
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
