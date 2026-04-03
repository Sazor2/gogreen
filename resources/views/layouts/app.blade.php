<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth @yield('html_class')">
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

        .reduceMotionToggle {
            width: 4em;
            height: 4em;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #bbb;
        }

        .st-reduceMotionToggleBtn {
            position: relative;
            cursor: pointer;
        }

        .st-reduceMotionToggleBtn .reduceMotionToggleInput {
            opacity: 0;
            width: inherit;
            aspect-ratio: 1;
        }

        .st-reduceMotionToggleBtn svg {
            position: absolute;
            left: 0;
            width: inherit;
            height: inherit;
        }
        .st-reduceMotionToggleBtn svg .line {
            transform: scaleX(0);
        }

        .st-reduceMotionToggleBtn
          .reduceMotionToggleInput:not(:checked)
          + svg
          .ballTrace {
            animation: ballTrace_toggleMotionOff9371A 0.3s ease 0s 1 forwards,
                ballTrace_toggleMotionOff9371B 0.1s steps(2, end)
                calc(0.32s + var(--_appearOffset)) 1 forwards;
        }
        .st-reduceMotionToggleBtn .reduceMotionToggleInput:not(:checked) + svg .ball {
            animation: ball_toggleMotionOn9371A 0.3s ease 0s 1 forwards,
                ball_toggleMotionOn9371B 0.4s cubic-bezier(0.165, 0.84, 0.45, 1.11) 0.3s 1
                forwards;
        }

        .st-reduceMotionToggleBtn .reduceMotionToggleInput:checked + svg circle {
            animation: ball_toggleMotionOff9371 0.9s linear 0s 1 forwards;
        }

        .st-reduceMotionToggleBtn .reduceMotionToggleInput:checked + svg .line {
            animation: line_toggleMotionOff9371 0.32s cubic-bezier(0.075, 0.82, 0.165, 1)
                0.47s 1 forwards;
        }

        @keyframes ball_toggleMotionOff9371 {
            0% {
                transform: translateX(0px);
            }
            6.66% {
                transform: translateX(calc(var(--_toCenterXOffset) * 0.45));
            }
            13.33% {
                transform: translateX(calc(var(--_toCenterXOffset) * 0.77));
            }
            20% {
                transform: translateX(calc(var(--_toCenterXOffset) * 0.9));
            }
            26.66% {
                transform: translateX(calc(var(--_toCenterXOffset) * 0.94));
            }
            33.33% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.965 + 1px), 2px);
            }
            35% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.988), 1px);
            }
            37% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.991 + 1px), -1px);
            }
            39% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.995 - 1px), -2px);
            }
            41% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.999 + 1px), -1px);
            }
            43% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.75), 1px);
            }
            45% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.5), 0px);
            }
            100% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.5), 0px);
            }
        }

        @keyframes line_toggleMotionOff9371 {
            0% {
                transform: scaleY(0);
            }
            100% {
                transform: scaleY(1);
            }
        }

        @keyframes ball_toggleMotionOn9371A {
            0% {
                transform: translate(calc(var(--_toCenterXOffset) * 0.5), 0px);
            }
            100% {
                transform: translate(calc(var(--_toCenterXOffset) - 5.67px), 0px);
            }
        }

        @keyframes ball_toggleMotionOn9371B {
            0% {
                transform: translate(calc(var(--_toCenterXOffset) - 5.67px), 0px);
            }
            100% {
                transform: translate(0px, 0px);
            }
        }

        @keyframes ballTrace_toggleMotionOff9371A {
            0% {
                opacity: 1;
                transform: translate(calc(var(--_toCenterXOffset) * 0.5), 0px);
            }
            99.9% {
                opacity: 1;
                transform: translate(calc(var(--_toCenterXOffset) - 5.67px), 0px);
            }
            100% {
                opacity: 0;
                transform: translate(calc(var(--_toCenterXOffset) - 5.67px), 0px);
            }
        }
        @keyframes ballTrace_toggleMotionOff9371B {
            0% {
                opacity: 0;
                transform: translate(0px, 0px);
            }
            100% {
                opacity: 1;
                transform: translate(0px, 0px);
            }
        }

        html {
            color-scheme: light;
        }

        html.dark {
            color-scheme: dark;
        }

        html.dark {
            --eco-light: #13211a;
            --eco-dark: #e6f4ee;
            --eco-medium: #7ff3be;
            --eco-accent: #a2f31f;
            --eco-background: #0a0f12;
            --eco-bg: #0a0f12;
            --md-sys-color-background: #0a0f12;
        }

        html.dark body {
            background-color: #0a0f12;
            color: #dbe3ea;
        }

        html.dark nav {
            background-color: rgba(13, 18, 22, 0.82);
            box-shadow: 0 8px 32px rgba(7, 10, 13, 0.35);
        }

        html.dark footer {
            background-color: #0f1418;
            border-top-color: rgba(127, 243, 190, 0.12);
        }

        html.dark .bg-background {
            background-color: #0a0f12;
        }

        html.dark .bg-surface {
            background-color: #10161b;
        }

        html.dark .bg-surface-container-lowest {
            background-color: #0f1418;
        }

        html.dark .bg-surface-container-low {
            background-color: #141b21;
        }

        html.dark .bg-surface-container {
            background-color: #1a2128;
        }

        html.dark .bg-surface-container-high {
            background-color: #202830;
        }

        html.dark .bg-surface-container-highest {
            background-color: #262f38;
        }

        html.dark .text-on-surface {
            color: #dbe3ea;
        }

        html.dark .text-on-surface-variant {
            color: #a6b0ba;
        }

        html.dark .border-outline-variant {
            border-color: #2f3a44;
        }

        html.dark .border-outline {
            border-color: #45515c;
        }

        html.dark .bg-primary-container {
            background-color: rgba(16, 59, 45, 0.6);
        }

        html.dark .text-primary {
            color: #7ff3be;
        }

        html.dark .reduceMotionToggle {
            color: #e6edf3;
        }

        html.dark .bg-white {
            background-color: #11181e;
        }

        html.dark .bg-slate-50 {
            background-color: #141b21;
        }

        html.dark .bg-slate-100 {
            background-color: #1a232b;
        }

        html.dark .border-slate-100 {
            border-color: #24313a;
        }

        html.dark .border-emerald-50 {
            border-color: #1f2a33;
        }

        html.dark .text-slate-900 {
            color: #f0f5f9;
        }

        html.dark .text-slate-800 {
            color: #dbe3ea;
        }

        html.dark .text-slate-700 {
            color: #c6d2dc;
        }

        html.dark .text-slate-600 {
            color: #aebbc6;
        }

        html.dark .text-slate-500 {
            color: #9aa7b2;
        }

        html.dark .text-slate-400 {
            color: #7f8b96;
        }

        html.dark .text-emerald-600 {
            color: #6ee7b7;
        }

        html.dark .text-emerald-800 {
            color: #a7f3d0;
        }

        html.dark .bg-\[\#f3f7fb\] {
            background-color: #0a0f12;
        }

        html.dark .bg-\[\#f9fafb\] {
            background-color: #141b21;
        }

        html.dark .text-\[\#2a2f32\] {
            color: #dbe3ea;
        }

        html.dark .text-\[\#575c60\] {
            color: #a6b0ba;
        }

        html.dark .text-\[\#999da1\] {
            color: #7f8b96;
        }

        html.dark .text-\[\#006948\] {
            color: #7ff3be;
        }

        html.dark .border-\[\#d7dee3\] {
            border-color: #2a3640;
        }

        html.dark .border-\[\#e5e7eb\] {
            border-color: #2a3640;
        }

        html.dark .bg-\[\#006948\]\/10 {
            background-color: rgba(127, 243, 190, 0.16);
        }

        html.dark .border-\[\#006948\]\/10 {
            border-color: rgba(127, 243, 190, 0.24);
        }

        .decor-tree {
            position: fixed;
            right: 1.25rem;
            bottom: 2rem;
            z-index: 30;
            pointer-events: none;
            user-select: none;
        }

        .decor-tree .tree-wrap {
            width: 70px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .decor-tree .tree {
            position: relative;
            width: 50px;
            height: 50px;
            transform-style: preserve-3d;
            transform: rotateX(-20deg) rotateY(30deg);
            animation: treeAnimate 5s linear infinite;
        }

        @keyframes treeAnimate {
            0% {
                transform: rotateX(-20deg) rotateY(360deg);
            }

            100% {
                transform: rotateX(-20deg) rotateY(0deg);
            }
        }

        .decor-tree .tree div {
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transform: translateY(calc(25px * var(--x))) translateZ(0px);
        }

        .decor-tree .tree div.branch span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #69c069, #77dd77);
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            border-bottom: 5px solid #00000019;
            transform-origin: bottom;
            transform: rotateY(calc(90deg * var(--i))) rotateX(30deg) translateZ(28.5px);
        }

        .decor-tree .tree div.stem span {
            position: absolute;
            top: 110px;
            left: calc(50% - 7.5px);
            width: 15px;
            height: 50%;
            background: linear-gradient(90deg, #bb4622, #df7214);
            border-bottom: 5px solid #00000019;
            transform-origin: bottom;
            transform: rotateY(calc(90deg * var(--i))) translateZ(7.5px);
        }

        .decor-tree .shadow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            filter: blur(20px);
            transform-style: preserve-3d;
            transform: rotateX(90deg) translateZ(-65px);
        }
    </style>
    <script>
        (function () {
            var storedTheme = localStorage.getItem('theme');
            var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            var theme = storedTheme || (prefersDark ? 'dark' : 'light');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background font-body text-on-surface antialiased overflow-x-hidden">

    <div class="decor-tree" aria-hidden="true">
        <div class="tree-wrap">
            <div class="tree">
                <div class="branch" style="--x:0">
                    <span style="--i:0;"></span>
                    <span style="--i:1;"></span>
                    <span style="--i:2;"></span>
                    <span style="--i:3;"></span>
                </div>
                <div class="branch" style="--x:1">
                    <span style="--i:0;"></span>
                    <span style="--i:1;"></span>
                    <span style="--i:2;"></span>
                    <span style="--i:3;"></span>
                </div>
                <div class="branch" style="--x:2">
                    <span style="--i:0;"></span>
                    <span style="--i:1;"></span>
                    <span style="--i:2;"></span>
                    <span style="--i:3;"></span>
                </div>
                <div class="branch" style="--x:3">
                    <span style="--i:0;"></span>
                    <span style="--i:1;"></span>
                    <span style="--i:2;"></span>
                    <span style="--i:3;"></span>
                </div>
                <div class="stem">
                    <span style="--i:0;"></span>
                    <span style="--i:1;"></span>
                    <span style="--i:2;"></span>
                    <span style="--i:3;"></span>
                </div>
                <span class="shadow"></span>
            </div>
        </div>
    </div>

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
                <label
                    class="reduceMotionToggle st-reduceMotionToggleBtn"
                    for="themeToggle"
                >
                    <input
                        class="reduceMotionToggleInput"
                        id="themeToggle"
                        type="checkbox"
                        aria-label="Toggle dark mode"
                    />
                    <svg
                        stroke-width="0"
                        stroke="currentColor"
                        fill="currentColor"
                        viewBox="0 0 18 18"
                        height="18"
                        width="18"
                    >
                        <mask id="lineMask">
                            <rect fill="white" height="18" width="18"></rect>
                            <rect
                                fill="black"
                                style="rotate: 30deg;"
                                height="16"
                                width="4.1"
                                y="-5"
                                x="9.807"
                                class="line"
                            ></rect>
                        </mask>
                        <rect
                            style="rotate: 30deg;"
                            height="13"
                            width="1.3"
                            y="-3.3"
                            x="11.3"
                            class="line"
                        ></rect>
                        <g mask="url(#lineMask)">
                            <circle
                                style="--_toCenterXOffset: 5.76px;--_appearOffset: -.1s;"
                                fill="none"
                                stroke-width=".1"
                                r="2.95"
                                cy="9"
                                cx="3.24"
                                class="ballTrace"
                            ></circle>
                            <circle
                                style="--_toCenterXOffset: 3px;--_appearOffset: .02s;"
                                fill="none"
                                stroke-width=".2"
                                r="2.9"
                                cy="9"
                                cx="6"
                                class="ballTrace"
                            ></circle>
                            <circle
                                style="--_toCenterXOffset: 0px;--_appearOffset: .07s;"
                                fill="none"
                                stroke-width=".3"
                                r="2.8"
                                cy="9"
                                cx="9"
                                class="ballTrace"
                            ></circle>
                            <circle
                                style="--_toCenterXOffset: -2.75px;--_appearOffset: .13s;"
                                fill="none"
                                stroke-width=".4"
                                r="2.75"
                                cy="9"
                                cx="11.75"
                                class="ballTrace"
                            ></circle>
                            <circle
                                style="--_toCenterXOffset: -5.7px;"
                                r="3"
                                cy="9"
                                cx="14.7"
                                class="ball"
                            ></circle>
                        </g>
                    </svg>
                </label>
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
    <script>
        (function () {
            const toggle = document.getElementById('themeToggle');
            if (!toggle) return;

            const storedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = storedTheme || (prefersDark ? 'dark' : 'light');

            toggle.checked = theme === 'dark';

            toggle.addEventListener('change', (event) => {
                const nextTheme = event.target.checked ? 'dark' : 'light';
                localStorage.setItem('theme', nextTheme);
                document.documentElement.classList.toggle('dark', nextTheme === 'dark');
            });
        })();
    </script>
    @stack('scripts')
</body>
</html>