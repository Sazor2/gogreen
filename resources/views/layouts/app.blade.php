<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Go Green School') — SMK Karya Bangsa Sintang</title>
    
    {{-- Flag Icons for Language Switcher --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css">
    
    {{-- Google Fonts (Professional Bold Style: DM Sans & Roboto) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@500;700;800&family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    {{-- Tailwind Config (Dari template ECO-VIBE) --}}
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#006948",
                        "on-tertiary": "#daffa7",
                        "surface-container-high": "#dde3e8",
                        "on-secondary": "#eff2ff",
                        "on-error": "#ffefee",
                        "tertiary-dim": "#375900",
                        "error-container": "#fb5151",
                        "on-tertiary-fixed-variant": "#3d6200",
                        "inverse-surface": "#0a0f12",
                        "surface-container-low": "#ecf1f6",
                        "surface-tint": "#006948",
                        "primary-fixed-dim": "#71e4b1",
                        "background": "#f3f7fb",
                        "on-surface": "#2a2f32",
                        "on-error-container": "#570008",
                        "tertiary-container": "#a2f31f",
                        "surface-container-highest": "#d7dee3",
                        "on-primary": "#c8ffe1",
                        "on-secondary-fixed": "#354053",
                        "surface-container": "#e3e9ee",
                        "primary-fixed": "#7ff3be",
                        "tertiary": "#406600",
                        "surface": "#f3f7fb",
                        "inverse-on-surface": "#999da1",
                        "outline": "#73777b",
                        "primary-container": "#7ff3be",
                        "secondary-dim": "#455064",
                        "inverse-primary": "#7ff3be",
                        "on-primary-fixed": "#00452e",
                        "error-dim": "#9f0519",
                        "surface-container-lowest": "#ffffff",
                        "secondary-container": "#d8e3fb",
                        "outline-variant": "#a9aeb1",
                        "error": "#b31b25",
                        "on-background": "#2a2f32",
                        "on-surface-variant": "#575c60",
                        "surface-variant": "#d7dee3",
                        "secondary": "#515c70",
                        "on-primary-fixed-variant": "#006545",
                        "tertiary-fixed": "#a2f31f",
                        "on-secondary-fixed-variant": "#515c70",
                        "secondary-fixed-dim": "#cad5ed",
                        "surface-dim": "#ced5db",
                        "surface-bright": "#f3f7fb",
                        "on-secondary-container": "#475266",
                        "secondary-fixed": "#d8e3fb",
                        "primary-dim": "#005b3e",
                        "tertiary-fixed-dim": "#95e400",
                        "on-tertiary-fixed": "#294300",
                        "on-tertiary-container": "#365700",
                        "on-primary-container": "#005a3d"
                    },
                    fontFamily: {
                        "headline": ["DM Sans", "sans-serif"],
                        "body": ["Roboto", "sans-serif"],
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        /* Scroll Reveal Original Maintained */
        .reveal-on-scroll { opacity: 0; transform: translateY(18px) scale(0.985); transition: opacity 0.45s ease, transform 0.45s ease; }
        .reveal-on-scroll.is-visible { opacity: 1; transform: translateY(0) scale(1); }
        @media (prefers-reduced-motion: reduce) { .reveal-on-scroll { transition: none; transform: none; opacity: 1; } }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background font-body text-on-surface antialiased overflow-x-hidden">

    {{-- Top Navigation Bar (ECO-VIBE Style) --}}
    <nav class="bg-[#f3f7fb]/70 backdrop-blur-xl sticky top-0 w-full z-50 shadow-[0_8px_32px_rgba(42,47,50,0.06)]">
        <div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
            
            {{-- Left Side: Logo & Main Menu --}}
            <div class="flex items-center gap-10">
                <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                    <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="Go Green Logo" class="h-10 w-auto drop-shadow-sm">
                    <span class="text-2xl font-black text-primary font-headline tracking-tight">Go Green School</span>
                </a>

                <div class="hidden md:flex items-center gap-6 font-headline font-bold tracking-tight">
                    @php $navClass = "transition-colors duration-300"; @endphp
                    @php $activeClass = "text-primary border-b-2 border-primary pb-1"; @endphp
                    @php $inactiveClass = "text-on-surface-variant hover:text-primary"; @endphp

                    <a href="{{ url('/') }}" class="{{ $navClass }} {{ request()->is('/') ? $activeClass : $inactiveClass }}">
                        {{ __('app.nav_dashboard') }}
                    </a>
                    <a href="{{ url('/tanaman') }}" class="{{ $navClass }} {{ request()->is('tanaman') ? $activeClass : $inactiveClass }}">
                        {{ __('app.nav_tanaman') }}
                    </a>
                    <a href="{{ url('/kalkulator') }}" class="{{ $navClass }} {{ request()->is('kalkulator') ? $activeClass : $inactiveClass }}">
                        {{ __('app.nav_kalkulator') }}
                    </a>
                    <a href="{{ url('/contact') }}" class="{{ $navClass }} {{ request()->is('contact') ? $activeClass : $inactiveClass }}">
                        {{ __('app.nav_contact') }}
                    </a>

                    {{-- Info Dropdown --}}
                    <div class="relative" id="info-wrapper">
                        <button id="info-btn"
                            class="flex items-center gap-1 transition-all duration-300 focus:outline-none 
                            {{ request()->is('tentang','latar-belakang','profil-sekolah') ? $activeClass : 'text-on-surface-variant hover:text-primary' }}">
                            {{ __('app.nav_info') }}
                            <span class="material-symbols-outlined text-lg transition-transform duration-300" id="info-chevron-icon">expand_more</span>
                        </button>
                        <div id="info-menu"
                             class="hidden absolute left-0 mt-4 w-52 bg-surface-container-lowest rounded-xl shadow-[0_8px_32px_rgba(42,47,50,0.08)] border border-outline-variant/30 overflow-hidden z-50 p-2 transform origin-top transition-all duration-200">
                            @php $dropClass = "flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg transition-colors font-medium"; @endphp
                            
                            <a href="{{ url('/tentang') }}" class="{{ $dropClass }} {{ request()->is('tentang') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-primary' }}">
                                <span class="material-symbols-outlined text-lg">person</span>
                                {{ __('app.nav_about') }}
                            </a>
                            <a href="{{ url('/latar-belakang') }}" class="{{ $dropClass }} mt-1 {{ request()->is('latar-belakang') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-primary' }}">
                                <span class="material-symbols-outlined text-lg">description</span>
                                {{ __('app.nav_latar') }}
                            </a>
                            <a href="{{ url('/profil-sekolah') }}" class="{{ $dropClass }} mt-1 {{ request()->is('profil-sekolah') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-primary' }}">
                                <span class="material-symbols-outlined text-lg">school</span>
                                {{ __('app.nav_profil_sek') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Side: Language & Mobile Menu --}}
            <div class="flex items-center gap-4">
                {{-- Desktop Language Switcher --}}
                <div class="relative hidden md:block" id="lang-wrapper">
                    <button id="lang-btn"
                        class="flex items-center gap-2 px-4 py-2 rounded-full bg-primary-container/30 text-primary hover:bg-primary-container transition-all duration-300 scale-100 active:scale-95 font-bold uppercase text-xs focus:outline-none font-headline tracking-wider">
                        @if(app()->getLocale() === 'en')
                            <span class="fi fi-gb fis rounded-sm text-sm"></span> EN
                        @else
                            <span class="fi fi-id fis rounded-sm text-sm"></span> ID
                        @endif
                        <span class="material-symbols-outlined text-sm transition-transform duration-300" id="lang-chevron">expand_more</span>
                    </button>
                    <div id="lang-menu"
                         class="hidden absolute right-0 mt-3 w-44 bg-surface-container-lowest rounded-xl shadow-[0_8px_32px_rgba(42,47,50,0.08)] border border-outline-variant/30 overflow-hidden z-50 p-2 transform origin-top-right transition-all duration-200">
                        <a href="{{ route('lang.switch', 'id') }}"
                           class="flex items-center justify-between px-3 py-2.5 text-sm text-on-surface-variant hover:bg-surface-container-low rounded-lg transition-colors font-medium {{ app()->getLocale() === 'id' ? 'text-primary' : '' }}">
                            <div class="flex items-center gap-2.5">
                                <span class="fi fi-id rounded-sm text-lg shadow-sm"></span> Indonesia
                            </div>
                            @if(app()->getLocale() === 'id') <span class="w-2 h-2 rounded-full bg-primary"></span> @endif
                        </a>
                        <a href="{{ route('lang.switch', 'en') }}"
                           class="flex items-center justify-between px-3 py-2.5 text-sm text-on-surface-variant hover:bg-surface-container-low rounded-lg transition-colors mt-1 font-medium {{ app()->getLocale() === 'en' ? 'text-primary' : '' }}">
                            <div class="flex items-center gap-2.5">
                                <span class="fi fi-gb rounded-sm text-lg shadow-sm"></span> English
                            </div>
                            @if(app()->getLocale() === 'en') <span class="w-2 h-2 rounded-full bg-primary"></span> @endif
                        </a>
                    </div>
                </div>

                {{-- Mobile: Language Toggle + Hamburger --}}
                <div class="flex items-center gap-2.5 md:hidden">
                    <a href="{{ route('lang.switch', app()->getLocale() === 'id' ? 'en' : 'id') }}"
                       class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-container/30 text-primary font-bold uppercase text-xs font-headline tracking-wider">
                        @if(app()->getLocale() === 'en')
                            <span class="fi fi-gb fis rounded-sm"></span> EN
                        @else
                            <span class="fi fi-id fis rounded-sm"></span> ID
                        @endif
                    </a>
                    <button id="menu-btn" class="p-2 rounded-full hover:bg-surface-container-high transition-all duration-300 text-primary">
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

        {{-- Mobile Menu Dropdown --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-outline-variant/20 bg-surface-container-lowest shadow-2xl absolute w-full left-0 z-40 transform origin-top transition-all duration-300">
            <div class="px-4 py-5 space-y-1.5 overflow-y-auto max-h-[80vh]">
                @php $mobNavClass = "block px-4 py-3.5 rounded-xl font-headline font-bold text-base transition-colors tracking-tight"; @endphp
                
                <a href="{{ url('/') }}" class="{{ $mobNavClass }} {{ request()->is('/') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                    {{ __('app.nav_dashboard') }}
                </a>
                <a href="{{ url('/tanaman') }}" class="{{ $mobNavClass }} {{ request()->is('tanaman') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                    {{ __('app.nav_tanaman') }}
                </a>
                <a href="{{ url('/kalkulator') }}" class="{{ $mobNavClass }} {{ request()->is('kalkulator') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                    {{ __('app.nav_kalkulator') }}
                </a>
                <a href="{{ url('/contact') }}" class="{{ $mobNavClass }} {{ request()->is('contact') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                    {{ __('app.nav_contact') }}
                </a>
                
                <div class="pt-5 mt-3 border-t border-outline-variant/20">
                    <p class="text-xs text-on-surface-variant/70 px-4 mb-2.5 uppercase tracking-widest font-bold">{{ __('app.nav_info') }}</p>
                    @php $mobDropClass = "flex items-center gap-3.5 px-4 py-3.5 rounded-xl text-sm transition-colors font-medium"; @endphp
                    
                    <a href="{{ url('/tentang') }}" class="{{ $mobDropClass }} {{ request()->is('tentang') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                        <span class="material-symbols-outlined text-lg">person</span> {{ __('app.nav_about') }}
                    </a>
                    <a href="{{ url('/latar-belakang') }}" class="{{ $mobDropClass }} mt-1 {{ request()->is('latar-belakang') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                        <span class="material-symbols-outlined text-lg">description</span> {{ __('app.nav_latar') }}
                    </a>
                    <a href="{{ url('/profil-sekolah') }}" class="{{ $mobDropClass }} mt-1 {{ request()->is('profil-sekolah') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low' }}">
                        <span class="material-symbols-outlined text-lg">school</span> {{ __('app.nav_profil_sek') }}
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer (ECO-VIBE Style) --}}
    <footer class="bg-[#f3f7fb] mt-20 full-width py-12 px-8 border-t border-[#006948]/10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
            
            {{-- Brand info --}}
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="Go Green Logo" class="h-8 w-auto">
                    <div class="text-lg font-black text-primary font-headline tracking-tight">Go Green School</div>
                </div>
                <p class="font-body text-sm text-on-surface-variant max-w-xs">{{ __('app.footer_credit') }}</p>
            </div>

            {{-- Links --}}
            <div class="flex gap-12 sm:gap-16">
                <div class="flex flex-col gap-2">
                    <h5 class="font-headline font-bold text-primary mb-2 uppercase text-xs tracking-widest">Navigation</h5>
                    <a class="font-body text-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/') }}">{{ __('app.nav_dashboard') }}</a>
                    <a class="font-body text-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/tanaman') }}">{{ __('app.nav_tanaman') }}</a>
                    <a class="font-body text-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/kalkulator') }}">{{ __('app.nav_kalkulator') }}</a>
                    <a class="font-body text-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/contact') }}">{{ __('app.nav_contact') }}</a>
                </div>
                <div class="flex flex-col gap-2">
                    <h5 class="font-headline font-bold text-primary mb-2 uppercase text-xs tracking-widest">Information</h5>
                    <a class="font-body text-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/tentang') }}">{{ __('app.nav_about') }}</a>
                    <a class="font-body text-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/latar-belakang') }}">{{ __('app.nav_latar') }}</a>
                    <a class="font-body text-sm text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/profil-sekolah') }}">{{ __('app.nav_profil_sek') }}</a>
                </div>
            </div>

            {{-- Copyright & Social --}}
            <div class="flex flex-col gap-4 items-start md:items-end">
                <p class="font-body text-sm text-on-surface-variant text-left md:text-right">© {{ date('Y') }} SMK Karya Bangsa Sintang. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70 transition-opacity">public</a>
                    <a href="{{ url('/contact') }}" class="material-symbols-outlined text-primary cursor-pointer hover:opacity-70 transition-opacity">mail</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Functional Scripts (DIPERTAHANKAN SEPENUHNYA) --}}
    <script>
        // Mobile nav
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        if(btn && menu){
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                iconOpen.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
            });
            // Close menu when clicking outside on mobile
            document.addEventListener('click', (e) => {
                if (!btn.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.add('hidden');
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                }
            });
        }

        // Dropdown helper function
        function setupDropdown(btnId, menuId, iconId) {
            const btn = document.getElementById(btnId);
            const menu = document.getElementById(menuId);
            const icon = document.getElementById(iconId);

            if (!btn || !menu) return;

            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = menu.classList.contains('hidden');
                
                // Close all other dropdowns first (if any)
                document.querySelectorAll('#lang-menu, #info-menu').forEach(m => {
                    if(m !== menu) m.classList.add('hidden');
                });
                document.querySelectorAll('#lang-chevron, #info-chevron-icon').forEach(i => {
                    if(i !== icon) i.style.transform = '';
                });

                menu.classList.toggle('hidden');
                if(icon) icon.style.transform = isHidden ? 'rotate(180deg)' : '';
            });

            document.addEventListener('click', () => {
                menu.classList.add('hidden');
                if(icon) icon.style.transform = '';
            });
        }

        // Setup dropdowns
        setupDropdown('lang-btn', 'lang-menu', 'lang-chevron');
        setupDropdown('info-btn', 'info-menu', 'info-chevron-icon');
    </script>
    <script>
        // Reveal on scroll logic
        (function () {
            let revealObserver = null;
            window.setupRevealOnScroll = function () {
                const revealItems = document.querySelectorAll('.reveal-on-scroll');
                if (!revealItems.length) return;
                if (revealObserver) revealObserver.disconnect();
                revealObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            revealObserver.unobserve(entry.target);
                        }
                    });
                }, { rootMargin: '0px 0px -10% 0px', threshold: 0.1 });
                revealItems.forEach(function (el) {
                    if (!el.classList.contains('is-visible')) revealObserver.observe(el);
                });
            };
            document.addEventListener('DOMContentLoaded', window.setupRevealOnScroll);
        })();
    </script>
    @stack('scripts')
</body>
</html>