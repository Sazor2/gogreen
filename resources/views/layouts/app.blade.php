<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth @yield('html_class')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Go Green School') — {{ __('app.hero_school') }}</title>
    
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

        .dropdown-anim {
            opacity: 0;
            transform: translateY(8px) scale(0.98);
            pointer-events: none;
            transition: opacity 0.18s ease, transform 0.18s ease;
        }

        .dropdown-anim.is-open {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .dropdown-item-anim {
            opacity: 0;
            transform: translateY(6px);
            transition: opacity 0.2s ease, transform 0.2s ease;
            transition-delay: var(--dropdown-delay, 0ms);
        }

        .dropdown-anim.is-open .dropdown-item-anim {
            opacity: 1;
            transform: translateY(0);
        }

        .decor-tree {
            position: fixed;
            right: 2rem;
            bottom: 3rem;
            z-index: 50;
            user-select: none;
            animation: mascotFloat 6.6s ease-in-out infinite;
        }

        .decor-tree .tree-wrap {
            width: 120px;
            height: 152px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            animation: mascotSway 4.8s ease-in-out infinite;
        }

        .decor-tree .pine-body {
            position: relative;
            width: 112px;
            height: 138px;
            animation: mascotBreath 3.8s ease-in-out infinite;
            filter: drop-shadow(0 4px 8px rgba(38, 87, 43, 0.16));
        }

        @keyframes mascotFloat {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-6px);
            }
        }

        @keyframes mascotSway {
            0%,
            100% {
                transform: rotate(-1.2deg);
            }
            50% {
                transform: rotate(1.2deg);
            }
        }

        @keyframes mascotBreath {
            0%,
            100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.018);
            }
        }

        .decor-tree .face-center {
            position: absolute;
            left: 50%;
            top: 52px;
            width: 48px;
            height: 34px;
            transform: translateX(-50%);
            z-index: 120;
            pointer-events: none;
            animation: faceBob 3.1s ease-in-out infinite;
        }

        @keyframes faceBob {
            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }
            50% {
                transform: translateX(-50%) translateY(-1.6px);
            }
        }

        .decor-tree .pine-layer {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            clip-path: polygon(50% 0%, 7% 100%, 93% 100%);
            border-radius: 0 0 16px 16px;
            background: linear-gradient(145deg, #9be66f 0%, #7fd25b 62%, #69b84e 100%);
            box-shadow: inset 0 -5px 0 rgba(53, 120, 40, 0.15);
        }

        .decor-tree .pine-layer::after {
            content: '';
            position: absolute;
            inset: 12% 10% 22%;
            background: repeating-linear-gradient(140deg, rgba(255, 255, 255, 0.1) 0 2px, rgba(255, 255, 255, 0) 2px 7px);
            opacity: 0.35;
            pointer-events: none;
        }

        .decor-tree .pine-layer.layer-4 {
            bottom: 28px;
            width: 104px;
            height: 58px;
            z-index: 10;
        }

        .decor-tree .pine-layer.layer-3 {
            bottom: 52px;
            width: 88px;
            height: 52px;
            z-index: 20;
        }

        .decor-tree .pine-layer.layer-2 {
            bottom: 74px;
            width: 72px;
            height: 46px;
            z-index: 30;
        }

        .decor-tree .pine-layer.layer-1 {
            bottom: 95px;
            width: 56px;
            height: 40px;
            z-index: 40;
        }

        .decor-tree .leaf-fall {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 80;
            overflow: visible;
        }

        .decor-tree .leaf-fall .leaf {
            position: absolute;
            width: 11px;
            height: 7px;
            background: linear-gradient(140deg, #b9ef79, #6cbf4a);
            border-radius: 80% 20% 80% 20%;
            box-shadow: inset -1px -1px 0 rgba(48, 115, 38, 0.45);
            opacity: 0;
            animation: leafDrift 6.8s linear infinite;
        }

        .decor-tree .leaf-fall .leaf::after {
            content: '';
            position: absolute;
            left: 48%;
            top: 1px;
            width: 1px;
            height: 5px;
            background: rgba(44, 100, 38, 0.4);
            transform: rotate(20deg);
        }

        .decor-tree .leaf-fall .leaf.leaf-1 { left: 8px; top: 26px; animation-delay: 0s; }
        .decor-tree .leaf-fall .leaf.leaf-2 { right: 2px; top: 16px; animation-delay: 1.7s; }
        .decor-tree .leaf-fall .leaf.leaf-3 { left: -4px; top: 48px; animation-delay: 3.2s; }
        .decor-tree .leaf-fall .leaf.leaf-4 { right: 8px; top: 40px; animation-delay: 4.7s; }

        @keyframes leafDrift {
            0% {
                opacity: 0;
                transform: translate3d(0, 0, 0) rotate(0deg) scale(0.9);
            }
            10% {
                opacity: 0.45;
            }
            55% {
                opacity: 0.5;
                transform: translate3d(-8px, 24px, 0) rotate(105deg) scale(0.98);
            }
            100% {
                opacity: 0;
                transform: translate3d(9px, 52px, 0) rotate(210deg) scale(0.9);
            }
        }

        @keyframes blinkOnce {
            0%, 100% {
                transform: scaleY(1);
            }
            45%, 55% {
                transform: scaleY(0.14);
            }
        }

        .decor-tree .trunk {
            position: absolute;
            left: 50%;
            bottom: 2px;
            width: 24px;
            height: 34px;
            transform: translateX(-50%);
            background: linear-gradient(90deg, #a85631, #ce6a2f);
            border-radius: 0 0 6px 6px;
            box-shadow: inset -3px -3px 0 rgba(78, 41, 23, 0.2);
            z-index: 2;
            transform-origin: top center;
            animation: trunkSway 4.8s ease-in-out infinite;
        }

        @keyframes trunkSway {
            0%,
            100% {
                transform: translateX(-50%) rotate(-0.65deg);
            }
            50% {
                transform: translateX(-50%) rotate(0.65deg);
            }
        }

        .decor-tree .shadow {
            position: absolute;
            bottom: -3px;
            left: 50%;
            width: 68px;
            height: 12px;
            background: rgba(0, 0, 0, 0.22);
            filter: blur(4px);
            border-radius: 100%;
            transform: translateX(-50%);
            z-index: 0;
            animation: shadowBreathe 3.8s ease-in-out infinite;
        }

        @keyframes shadowBreathe {
            0%,
            100% {
                transform: translateX(-50%) scaleX(1);
                opacity: 0.22;
            }
            50% {
                transform: translateX(-50%) scaleX(0.9);
                opacity: 0.16;
            }
        }

        .decor-tree .mascot-eyes {
            position: absolute;
            top: 2px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 130;
            pointer-events: none;
        }

        .decor-tree .mascot-eyes .eye {
            width: 8px;
            height: 8px;
            background: #364130;
            border: 1px solid #4a5f3f;
            border-radius: 50%;
            position: relative;
            transform-origin: center center;
            transition: all 220ms ease;
            overflow: hidden;
            animation: none;
        }

        .decor-tree .tree-wrap.is-blinking .mascot-eyes .eye {
            animation: blinkOnce 170ms ease;
        }

        .decor-tree .mascot-eyes .eye::after {
            content: '';
            position: absolute;
            width: 3px;
            height: 3px;
            background: #ffffff;
            border-radius: 50%;
            top: 1px;
            left: 1px;
        }

        .decor-tree .mascot-eyes .eye::before {
            content: '';
            position: absolute;
            width: 3px;
            height: 3px;
            background: #78b365;
            border-radius: 50%;
            right: 1px;
            bottom: 1px;
            opacity: 0.28;
        }

        .decor-tree .mascot-brows {
            position: absolute;
            top: -4px;
            left: 50%;
            width: 18px;
            transform: translateX(-50%);
            display: flex;
            justify-content: space-between;
            z-index: 43;
            pointer-events: none;
            opacity: 0;
            transition: opacity 220ms ease;
        }

        .decor-tree .mascot-brows span {
            width: 6px;
            height: 2px;
            border-radius: 999px;
            background: #4f5d45;
            transform-origin: center;
        }

        .decor-tree .face-sparkle {
            position: absolute;
            width: 12px;
            height: 12px;
            opacity: 0;
            transform: scale(0.75) rotate(0deg);
            pointer-events: none;
            z-index: 138;
            background: #f59e0b;
            clip-path: polygon(50% 0%, 64% 36%, 100% 50%, 64% 64%, 50% 100%, 36% 64%, 0 50%, 36% 36%);
        }

        .decor-tree .face-sparkle::before {
            content: '';
            position: absolute;
            inset: 2px;
            background: #fff233;
            clip-path: polygon(50% 0%, 64% 36%, 100% 50%, 64% 64%, 50% 100%, 36% 64%, 0 50%, 36% 36%);
        }

        .decor-tree .face-sparkle.sparkle-top-left {
            left: -7px;
            top: -11px;
            width: 8px;
            height: 8px;
        }

        .decor-tree .face-sparkle.sparkle-bottom-right {
            right: -11px;
            bottom: -9px;
            width: 12px;
            height: 12px;
        }

        .decor-tree .face-sparkle.sparkle-bottom-right-sm {
            right: -16px;
            bottom: 1px;
            width: 7px;
            height: 7px;
        }

        @keyframes sparkleTwinkle {
            0% {
                opacity: 0.22;
                transform: scale(0.75) rotate(0deg);
            }
            55% {
                opacity: 0.95;
                transform: scale(1.08) rotate(18deg);
            }
            100% {
                opacity: 0.38;
                transform: scale(0.85) rotate(36deg);
            }
        }

        .decor-tree .tree-wrap.mood-wink .face-sparkle,
        .decor-tree .tree-wrap.mood-excited .face-sparkle {
            animation: sparkleTwinkle 1.15s ease-in-out infinite;
            opacity: 1;
        }

        .decor-tree .tree-wrap.mood-wink .face-sparkle.sparkle-bottom-right,
        .decor-tree .tree-wrap.mood-excited .face-sparkle.sparkle-bottom-right {
            animation-delay: 0.32s;
        }

        .decor-tree .tree-wrap.mood-wink .face-sparkle.sparkle-bottom-right-sm,
        .decor-tree .tree-wrap.mood-excited .face-sparkle.sparkle-bottom-right-sm {
            animation-delay: 0.56s;
        }

        .decor-tree .mascot-mouth {
            position: absolute;
            top: 14px;
            left: 50%;
            width: 11px;
            height: 7px;
            border: 1px solid #2f3f2f;
            border-radius: 0 0 12px 12px;
            background: #2f3f2f;
            transform: translateX(-50%);
            z-index: 42;
            pointer-events: none;
            transition: all 220ms ease;
            overflow: hidden;
        }

        .decor-tree .mascot-mouth::before {
            content: '';
            position: absolute;
            left: 50%;
            top: -4px;
            width: 10px;
            height: 6px;
            transform: translateX(-50%);
            border-radius: 0 0 10px 10px;
            background: #92dc65;
        }

        .decor-tree .mascot-mouth::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 1px;
            width: 6px;
            height: 3px;
            transform: translateX(-50%);
            border-radius: 8px 8px 10px 10px;
            background: #f79ab3;
            opacity: 0;
            transition: opacity 220ms ease;
        }

        .decor-tree .mascot-cheek {
            position: absolute;
            top: 13px;
            width: 6px;
            height: 4px;
            background: rgba(248, 141, 167, 0.45);
            border-radius: 999px;
            z-index: 41;
            pointer-events: none;
            transition: all 220ms ease;
        }

        .decor-tree .mascot-cheek.left {
            left: 8px;
        }

        .decor-tree .mascot-cheek.right {
            right: 8px;
        }

        .decor-tree .tree-wrap[class*='mood-'] {
            transition: transform 260ms ease;
        }

        .decor-tree .tree-wrap.mood-smile .mascot-mouth {
            width: 11px;
            height: 7px;
            transform: translateX(-50%);
        }

        .decor-tree .tree-wrap.mood-happy .mascot-mouth {
            width: 13px;
            height: 8px;
            transform: translateX(-50%) translateY(0.5px);
        }

        .decor-tree .tree-wrap.mood-happy .mascot-mouth::after {
            opacity: 0.65;
        }

        .decor-tree .tree-wrap.mood-happy .mascot-cheek {
            transform: scale(1.06);
            background: rgba(247, 116, 145, 0.52);
        }

        .decor-tree .tree-wrap.mood-wink .mascot-eyes .eye:first-child {
            width: 8px;
            height: 8px;
            margin-top: 1px;
            border: 0;
            background: transparent;
            animation: none;
            overflow: visible;
            z-index: 64;
        }

        .decor-tree .tree-wrap.mood-wink .mascot-eyes {
            z-index: 64;
        }

        .decor-tree .tree-wrap.mood-wink .mascot-eyes .eye:last-child {
            animation: none;
            transform: scaleY(1);
        }

        .decor-tree .tree-wrap.mood-wink .mascot-mouth {
            width: 13px;
            height: 8px;
            transform: translateX(-50%) translateY(0.5px);
        }

        .decor-tree .tree-wrap.mood-wink .mascot-mouth::after {
            opacity: 0.65;
        }

        .decor-tree .tree-wrap.mood-wink .mascot-eyes .eye:first-child::before,
        .decor-tree .tree-wrap.mood-wink .mascot-eyes .eye:first-child::after {
            content: '';
            position: absolute;
            left: 0;
            width: 7px;
            height: 2px;
            border-radius: 999px;
            background: #4f5d45;
            transform-origin: right center;
            opacity: 1;
            display: block;
            z-index: 132;
        }

        .decor-tree .tree-wrap.mood-wink .mascot-eyes .eye:first-child::before {
            top: 1px;
            transform: rotate(30deg);
        }

        .decor-tree .tree-wrap.mood-wink .mascot-eyes .eye:first-child::after {
            bottom: 1px;
            transform: rotate(-30deg);
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye {
            width: 8px;
            height: 8px;
            margin-top: 1px;
            border: 0;
            border-radius: 0;
            background: transparent;
            animation: none;
            overflow: visible;
            z-index: 134;
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes {
            z-index: 134;
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye::before,
        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye::after {
            content: '';
            position: absolute;
            width: 7px;
            height: 2px;
            border-radius: 999px;
            background: #4f5d45;
            opacity: 1;
            display: block;
            z-index: 136;
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye:first-child::before,
        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye:first-child::after {
            left: 0;
            transform-origin: right center;
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye:first-child::before {
            top: 1px;
            transform: rotate(30deg);
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye:first-child::after {
            bottom: 1px;
            transform: rotate(-30deg);
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye:last-child::before,
        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye:last-child::after {
            right: 0;
            transform-origin: left center;
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye:last-child::before {
            top: 1px;
            transform: rotate(-30deg);
        }

        .decor-tree .tree-wrap.mood-excited .mascot-eyes .eye:last-child::after {
            bottom: 1px;
            transform: rotate(30deg);
        }

        .decor-tree .tree-wrap.mood-excited .mascot-mouth {
            width: 13px;
            height: 8px;
            border-radius: 0 0 12px 12px;
            border: 1px solid #2f3f2f;
            background: #2f3f2f;
            transform: translateX(-50%) translateY(0.5px);
        }

        .decor-tree .tree-wrap.mood-excited .mascot-mouth::before {
            display: block;
        }

        .decor-tree .tree-wrap.mood-excited .mascot-mouth::after {
            opacity: 0.65;
        }

        .decor-tree .tree-wrap.mood-excited .mascot-brows {
            opacity: 1;
        }

        .decor-tree .tree-wrap.mood-excited .mascot-brows span:first-child {
            transform: rotate(-10deg);
        }

        .decor-tree .tree-wrap.mood-excited .mascot-brows span:last-child {
            transform: rotate(10deg);
        }

        .decor-tree .tree-wrap.mood-excited.brow-pop .mascot-brows span {
            animation: browLiftOnce 420ms ease-out forwards;
        }

        .decor-tree .tree-wrap.mood-excited.brow-pop .mascot-brows span:first-child {
            --brow-rot: -10deg;
        }

        .decor-tree .tree-wrap.mood-excited.brow-pop .mascot-brows span:last-child {
            --brow-rot: 10deg;
        }

        @keyframes browLiftOnce {
            0% {
                transform: rotate(var(--brow-rot, 0deg)) translateY(0);
            }
            100% {
                transform: rotate(var(--brow-rot, 0deg)) translateY(-2px);
            }
        }

        .decor-tree .tree-wrap.mood-mock .mascot-brows {
            opacity: 1;
        }

        .decor-tree .tree-wrap.mood-mock .mascot-brows span:first-child {
            transform: rotate(-16deg) translateY(-2px);
        }

        .decor-tree .tree-wrap.mood-mock .mascot-brows span:last-child {
            transform: rotate(14deg) translateY(1px);
        }

        .decor-tree .tree-wrap.mood-mock .mascot-mouth {
            width: 12px;
            height: 6px;
            border-radius: 0 0 9px 9px;
            transform: translateX(-50%) translateX(1px) rotate(9deg);
        }

        .decor-tree .tree-wrap.mood-mock .mascot-mouth::after {
            width: 7px;
            height: 4px;
            opacity: 0.88;
            left: 64%;
            bottom: 0;
            border-radius: 8px 8px 12px 12px;
        }

        .decor-tree .tree-wrap.mood-mock .mascot-eyes {
            gap: 10px;
        }

        .decor-tree .tree-wrap.mood-mock .mascot-eyes .eye:first-child {
            transform: translateY(1px);
        }

        .decor-tree .tree-wrap.mood-mock .mascot-eyes .eye:last-child {
            transform: scaleY(0.72) translateY(1px);
        }

        .decor-tree .speech-bubble.is-visible,
        .decor-tree:hover .speech-bubble {
            opacity: 1;
            transform: translateY(0);
        }

        .speech-bubble {
            position: absolute;
            bottom: calc(100% + 26px);
            right: -16px;
            background: linear-gradient(145deg, #ffffff, #f2fff8);
            color: #05533a;
            padding: 12px 14px 13px;
            border-radius: 18px;
            border: 1px solid rgba(0, 105, 72, 0.22);
            box-shadow: 0 20px 34px rgba(0, 39, 27, 0.2), 0 6px 14px rgba(0, 0, 0, 0.08);
            font-size: 12.5px;
            width: 220px;
            opacity: 0;
            transform: translateY(8px);
            transition: all 300ms ease;
            pointer-events: none;
            line-height: 1.55;
            text-align: left;
            letter-spacing: 0.01em;
            backdrop-filter: blur(3px);
        }

        .speech-bubble-header {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 7px;
            padding: 3px 9px;
            border-radius: 999px;
            background: rgba(0, 105, 72, 0.1);
            color: #006948;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.09em;
            text-transform: uppercase;
        }

        .speech-bubble-title-dot {
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.16);
        }

        .speech-bubble-body {
            display: block;
            color: #0a4b35;
            font-size: 12.5px;
            font-weight: 600;
        }

        .speech-bubble.is-pop {
            animation: bubblePop 0.35s ease;
        }

        @keyframes bubblePop {
            0% {
                transform: translateY(8px) scale(0.96);
            }
            100% {
                transform: translateY(0) scale(1);
            }
        }

        .speech-bubble::after {
            content: '';
            position: absolute;
            top: 100%;
            right: 28px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid #f4fff9;
        }

        html.dark .speech-bubble {
            background: linear-gradient(155deg, #12202b, #162735);
            color: #7ff3be;
            border-color: rgba(127, 243, 190, 0.28);
            box-shadow: 0 20px 34px rgba(1, 8, 12, 0.5), 0 6px 14px rgba(0, 0, 0, 0.24);
        }

        html.dark .speech-bubble-header {
            background: rgba(127, 243, 190, 0.15);
            color: #8ff7c7;
        }

        html.dark .speech-bubble-title-dot {
            background: #7ff3be;
            box-shadow: 0 0 0 4px rgba(127, 243, 190, 0.18);
        }

        html.dark .speech-bubble-body {
            color: #d3ffe9;
        }

        html.dark .speech-bubble::after {
            border-top-color: #152634;
        }

        @media (max-width: 768px) {
            .decor-tree {
                right: 1rem;
                bottom: 2.6rem;
            }

            .decor-tree .tree-wrap {
                width: 72px;
                height: 72px;
            }

            .speech-bubble {
                right: -8px;
                bottom: calc(100% + 18px);
                width: 196px;
                font-size: 12px;
            }

            .speech-bubble-body {
                font-size: 12px;
            }
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

    @php
        $mascotMessageKeys = match (true) {
            request()->is('kalkulator') => [
                'mascot_kalkulator_1',
                'mascot_kalkulator_2',
                'mascot_kalkulator_3',
            ],
            request()->is('tanaman') => [
                'mascot_tanaman_1',
                'mascot_tanaman_2',
                'mascot_tanaman_3',
            ],
            request()->is('contact') => [
                'mascot_contact_1',
                'mascot_contact_2',
                'mascot_contact_3',
            ],
            request()->is('tentang') => [
                'mascot_about_1',
                'mascot_about_2',
                'mascot_about_3',
            ],
            request()->is('latar-belakang') => [
                'mascot_latar_1',
                'mascot_latar_2',
                'mascot_latar_3',
            ],
            request()->is('profil-sekolah') => [
                'mascot_profil_1',
                'mascot_profil_2',
                'mascot_profil_3',
            ],
            default => [
                'mascot_dashboard_1',
                'mascot_dashboard_2',
                'mascot_dashboard_3',
            ]
        };

        $mascotMessages = array_map(
            fn (string $messageKey): string => __('app.' . $messageKey),
            $mascotMessageKeys
        );
    @endphp

    <div class="decor-tree group cursor-pointer" aria-hidden="true">
        {{-- Speech Bubble --}}
        <div class="speech-bubble" id="mascot-bubble" data-messages='@json($mascotMessages)'>
            <span class="speech-bubble-header">
                <span class="speech-bubble-title-dot"></span>
                {{ __('app.mascot_title') }}
            </span>
            <span class="speech-bubble-body" id="mascot-bubble-body">{{ $mascotMessages[0] }} 🌿</span>
        </div>

        <div class="tree-wrap mood-smile" id="mascot-face">
            <div class="pine-body">
                <div class="pine-layer layer-4"></div>
                <div class="pine-layer layer-3"></div>
                <div class="pine-layer layer-2"></div>
                <div class="pine-layer layer-1"></div>
                <div class="face-center" aria-hidden="true">
                    <span class="face-sparkle sparkle-top-left"></span>
                    <span class="face-sparkle sparkle-bottom-right"></span>
                    <span class="face-sparkle sparkle-bottom-right-sm"></span>
                    {{-- Mascot Eyes --}}
                    <div class="mascot-eyes">
                        <div class="eye"></div>
                        <div class="eye"></div>
                    </div>
                    <div class="mascot-brows">
                        <span></span>
                        <span></span>
                    </div>
                    <div class="mascot-cheek left"></div>
                    <div class="mascot-cheek right"></div>
                    <div class="mascot-mouth"></div>
                </div>
                <div class="trunk"></div>
                <span class="shadow"></span>
            </div>
            <div class="leaf-fall" aria-hidden="true">
                <span class="leaf leaf-1"></span>
                <span class="leaf leaf-2"></span>
                <span class="leaf leaf-3"></span>
                <span class="leaf leaf-4"></span>
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
                                class="hidden dropdown-anim absolute left-0 mt-4 w-52 bg-surface-container-lowest rounded-xl shadow-[0_8px_32px_rgba(42,47,50,0.08)] border border-outline-variant/30 overflow-hidden z-50 p-2 transform origin-top transition-all duration-200">
                            @php $dropClass = "flex items-center gap-3 px-4 py-2.5 text-sm rounded-lg transition-colors font-medium"; @endphp
                            
                            <a href="{{ url('/tentang') }}" class="dropdown-item-anim {{ $dropClass }} {{ request()->is('tentang') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-primary' }}" style="--dropdown-delay: 0ms;">
                                <span class="material-symbols-outlined text-lg">person</span>
                                {{ __('app.nav_about') }}
                            </a>
                            <a href="{{ url('/latar-belakang') }}" class="dropdown-item-anim {{ $dropClass }} mt-1 {{ request()->is('latar-belakang') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-primary' }}" style="--dropdown-delay: 60ms;">
                                <span class="material-symbols-outlined text-lg">description</span>
                                {{ __('app.nav_latar') }}
                            </a>
                            <a href="{{ url('/profil-sekolah') }}" class="dropdown-item-anim {{ $dropClass }} mt-1 {{ request()->is('profil-sekolah') ? 'bg-surface-container-low text-primary' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-primary' }}" style="--dropdown-delay: 120ms;">
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
                @php
                    $languageOptions = [
                        'id' => ['label' => __('app.lang_id'), 'code' => 'ID', 'flag' => 'id'],
                        'en' => ['label' => __('app.lang_en'), 'code' => 'EN', 'flag' => 'gb'],
                        'ja' => ['label' => __('app.lang_ja'), 'code' => 'JA', 'flag' => 'jp'],
                        'vi' => ['label' => __('app.lang_vi'), 'code' => 'VI', 'flag' => 'vn'],
                        'fil' => ['label' => __('app.lang_fil'), 'code' => 'FIL', 'flag' => 'ph'],
                        'th' => ['label' => __('app.lang_th'), 'code' => 'TH', 'flag' => 'th'],
                    ];
                    $currentLocale = app()->getLocale();
                    $currentLang = $languageOptions[$currentLocale] ?? $languageOptions['id'];
                @endphp

                {{-- Desktop Language Switcher --}}
                <div class="relative hidden md:block" id="lang-wrapper">
                    <button id="lang-btn"
                        class="flex items-center gap-3 px-3.5 py-2 rounded-2xl bg-primary-container/30 text-primary hover:bg-primary-container transition-all duration-300 scale-100 active:scale-95 focus:outline-none font-headline dark:bg-[#1a232b] dark:text-[#7ff3be]">
                        <span class="fi fi-{{ $currentLang['flag'] }} fis rounded-sm text-base shadow-sm"></span>
                        <div class="flex flex-col items-start leading-tight">
                            <span class="text-[9px] uppercase tracking-[0.2em] font-black text-primary/70 dark:text-[#7ff3be]/70">{{ __('app.language') }}</span>
                            <span class="text-sm font-bold text-primary dark:text-[#7ff3be]">{{ $currentLang['label'] }}</span>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest text-primary/70 px-2 py-0.5 rounded-full bg-primary-container/40 dark:bg-[#23323c] dark:text-[#7ff3be]/80">{{ $currentLang['code'] }}</span>
                        <span class="material-symbols-outlined text-sm transition-transform duration-300" id="lang-chevron">expand_more</span>
                    </button>
                    <div id="lang-menu"
                         class="hidden absolute right-0 mt-3 w-72 bg-surface-container-lowest rounded-2xl shadow-[0_10px_40px_rgba(42,47,50,0.12)] border border-outline-variant/30 overflow-hidden z-50 p-3 transform origin-top-right transition-all duration-200 dark:bg-[#11181e] dark:border-[#24313a]">
                        <div class="flex items-center justify-between px-2 pb-2">
                            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-on-surface-variant/70 dark:text-[#a6b0ba]">{{ __('app.language') }}</span>
                            <span class="text-[10px] font-semibold text-on-surface-variant/60 dark:text-[#8da0ad]">{{ __('app.active') }}</span>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($languageOptions as $locale => $lang)
                                <a href="{{ route('lang.switch', $locale) }}"
                                   class="group flex items-center justify-between gap-2 px-3 py-2.5 rounded-xl border border-transparent hover:border-primary/20 hover:bg-surface-container-low transition-all dark:hover:bg-[#1a232b] {{ $currentLocale === $locale ? 'bg-surface-container-low text-primary border-primary/20 dark:bg-[#1a232b] dark:text-[#7ff3be] dark:border-[#2f5b48]' : 'text-on-surface-variant dark:text-[#cbd5e1]' }}">
                                    <div class="flex items-center gap-2.5">
                                        <span class="fi fi-{{ $lang['flag'] }} rounded-sm text-lg shadow-sm"></span>
                                        <div class="flex flex-col leading-tight">
                                            <span class="text-sm font-semibold">{{ $lang['label'] }}</span>
                                            <span class="text-[10px] uppercase tracking-widest text-on-surface-variant/60 dark:text-[#94a3b8]">{{ $lang['code'] }}</span>
                                        </div>
                                    </div>
                                    @if($currentLocale === $locale)
                                        <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Mobile: Language Indicator + Hamburger --}}
                <div class="flex items-center gap-2.5 md:hidden">
                    <span class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-container/30 text-primary font-bold uppercase text-xs font-headline tracking-wider">
                        <span class="fi fi-{{ $currentLang['flag'] }} fis rounded-sm"></span> {{ $currentLang['code'] }}
                    </span>
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

                <div class="pt-5 mt-4 border-t border-outline-variant/20">
                    <p class="text-xs text-on-surface-variant/70 dark:text-[#a6b0ba] px-4 mb-3 uppercase tracking-widest font-bold">{{ __('app.language') }}</p>
                    <div class="grid grid-cols-2 gap-2 px-2">
                        @foreach($languageOptions as $locale => $lang)
                            <a href="{{ route('lang.switch', $locale) }}"
                               class="flex items-center justify-between gap-2 px-3 py-2.5 rounded-xl border border-transparent hover:border-primary/20 hover:bg-surface-container-low transition-all dark:hover:bg-[#1a232b] {{ $currentLocale === $locale ? 'bg-surface-container-low text-primary border-primary/20 dark:bg-[#1a232b] dark:text-[#7ff3be] dark:border-[#2f5b48]' : 'text-on-surface-variant dark:text-[#cbd5e1]' }}">
                                <div class="flex items-center gap-2.5">
                                    <span class="fi fi-{{ $lang['flag'] }} rounded-sm text-base shadow-sm"></span>
                                    <div class="flex flex-col leading-tight">
                                        <span class="text-sm font-semibold">{{ $lang['label'] }}</span>
                                        <span class="text-[10px] uppercase tracking-widest text-on-surface-variant/60 dark:text-[#94a3b8]">{{ $lang['code'] }}</span>
                                    </div>
                                </div>
                                @if($currentLocale === $locale)
                                    <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                                @endif
                            </a>
                        @endforeach
                    </div>
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
                <p class="font-body text-sm text-on-surface-variant text-left md:text-right">© {{ date('Y') }} {{ __('app.hero_school') }}. All rights reserved.</p>
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

            const isAnimated = menu.classList.contains('dropdown-anim');
            const closeMenu = function () {
                if (isAnimated) {
                    menu.classList.remove('is-open');
                    window.setTimeout(function () {
                        if (!menu.classList.contains('is-open')) {
                            menu.classList.add('hidden');
                        }
                    }, 200);
                } else {
                    menu.classList.add('hidden');
                }
                if (icon) icon.style.transform = '';
            };

            const openMenu = function () {
                menu.classList.remove('hidden');
                if (isAnimated) {
                    window.requestAnimationFrame(function () {
                        menu.classList.add('is-open');
                    });
                }
                if (icon) icon.style.transform = 'rotate(180deg)';
            };

            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = menu.classList.contains('is-open') || !menu.classList.contains('hidden');
                
                // Close all other dropdowns first (if any)
                document.querySelectorAll('#lang-menu, #info-menu').forEach(m => {
                    if (m !== menu) {
                        if (m.classList.contains('dropdown-anim')) {
                            m.classList.remove('is-open');
                            window.setTimeout(() => m.classList.add('hidden'), 200);
                        } else {
                            m.classList.add('hidden');
                        }
                    }
                });
                document.querySelectorAll('#lang-chevron, #info-chevron-icon').forEach(i => {
                    if(i !== icon) i.style.transform = '';
                });

                if (isOpen) {
                    closeMenu();
                } else {
                    openMenu();
                }
            });

            document.addEventListener('click', () => {
                closeMenu();
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
    <script>
        (function () {
            const bubble = document.getElementById('mascot-bubble');
            const bubbleBody = document.getElementById('mascot-bubble-body');
            const mascotFace = document.querySelector('.decor-tree .tree-wrap');
            if (!bubble) return;
            if (!bubbleBody) return;
            if (!mascotFace) return;

            let messages = [];
            try {
                messages = JSON.parse(bubble.getAttribute('data-messages') || '[]');
            } catch (error) {
                messages = [];
            }

            if (!Array.isArray(messages) || !messages.length) return;

            let currentIndex = 0;
            const leafSuffix = ' 🌿';
            const visibleDurationMs = 8000;
            const minPauseMs = 22000;
            const maxPauseMs = 38000;
            const expressionNames = ['smile', 'happy', 'wink', 'mock', 'excited'];
            const expressionWeights = {
                smile: 34,
                happy: 26,
                wink: 18,
                excited: 16,
                mock: 6,
            };
            let currentExpression = 'smile';
            let blinkTimeoutId = null;
            let expressionTimeoutId = null;
            let isBlinkLoopRunning = false;
            const fastBlinkBatchSizes = [4, 8];
            let fastBatchIndex = 0;

            const randomPauseMs = () => {
                const spread = maxPauseMs - minPauseMs;
                return minPauseMs + Math.floor(Math.random() * (spread + 1));
            };

            const setBubbleMessage = (index, withPop) => {
                const text = (messages[index] || '').trim();
                if (!text) return;
                bubbleBody.textContent = text + leafSuffix;
                bubble.classList.add('is-visible');
                if (withPop) {
                    bubble.classList.remove('is-pop');
                    window.requestAnimationFrame(() => bubble.classList.add('is-pop'));
                    window.setTimeout(() => bubble.classList.remove('is-pop'), 360);
                }
            };

            const applyExpression = (name) => {
                expressionNames.forEach((exp) => {
                    mascotFace.classList.remove('mood-' + exp);
                });
                mascotFace.classList.add('mood-' + name);
                if (name === 'excited') {
                    mascotFace.classList.remove('brow-pop');
                    window.requestAnimationFrame(() => mascotFace.classList.add('brow-pop'));
                    window.setTimeout(() => mascotFace.classList.remove('brow-pop'), 460);
                } else {
                    mascotFace.classList.remove('brow-pop');
                }
                currentExpression = name;
            };

            const nextExpression = () => {
                const totalWeight = expressionNames.reduce((sum, name) => sum + (expressionWeights[name] || 1), 0);
                if (totalWeight <= 0) return 'smile';

                let candidate = currentExpression;
                let guard = 0;
                while (candidate === currentExpression && guard < 8) {
                    let roll = Math.random() * totalWeight;
                    for (const name of expressionNames) {
                        roll -= (expressionWeights[name] || 1);
                        if (roll <= 0) {
                            candidate = name;
                            break;
                        }
                    }
                    guard += 1;
                }

                return candidate;
            };

            const expressionDelayMs = (name) => {
                if (name === 'wink') return 3000 + Math.floor(Math.random() * 1001);
                if (name === 'excited') return 3200 + Math.floor(Math.random() * 1101);
                if (name === 'mock') return 3200 + Math.floor(Math.random() * 1201);
                return 9000 + Math.floor(Math.random() * 7000);
            };

            const runExpressionLoop = () => {
                const next = nextExpression();
                applyExpression(next);
                expressionTimeoutId = window.setTimeout(runExpressionLoop, expressionDelayMs(next));
            };

            const clearBlinkState = () => {
                mascotFace.classList.remove('is-blinking');
            };

            const sleep = (delay) => new Promise((resolve) => {
                blinkTimeoutId = window.setTimeout(resolve, delay);
            });

            const triggerBlink = async () => {
                clearBlinkState();
                await sleep(0);
                if (currentExpression === 'wink' || currentExpression === 'excited') {
                    clearBlinkState();
                    return;
                }
                mascotFace.classList.add('is-blinking');
                await sleep(185);
                clearBlinkState();
            };

            const runBlinkLoop = async () => {
                if (isBlinkLoopRunning) return;
                isBlinkLoopRunning = true;

                while (true) {
                    if (currentExpression === 'wink' || currentExpression === 'excited') {
                        clearBlinkState();
                        await sleep(280);
                        continue;
                    }

                    const fastBlinks = fastBlinkBatchSizes[fastBatchIndex % fastBlinkBatchSizes.length];
                    fastBatchIndex += 1;

                    for (let i = 0; i < fastBlinks; i += 1) {
                        await triggerBlink();
                        await sleep(1000 + Math.floor(Math.random() * 1001));
                    }

                    await sleep(5000 + Math.floor(Math.random() * 2001));
                    await triggerBlink();
                    await sleep(5000);
                }
            };

            const hideBubble = () => {
                bubble.classList.remove('is-visible');
                bubble.classList.remove('is-pop');
            };

            const nextIndex = () => {
                if (messages.length <= 1) return 0;
                return (currentIndex + 1) % messages.length;
            };

            const runCycle = () => {
                setBubbleMessage(currentIndex, true);

                window.setTimeout(() => {
                    hideBubble();
                    currentIndex = nextIndex();
                    window.setTimeout(runCycle, randomPauseMs());
                }, visibleDurationMs);
            };

            applyExpression('smile');
            runBlinkLoop();
            expressionTimeoutId = window.setTimeout(runExpressionLoop, 8500);
            hideBubble();
            window.setTimeout(runCycle, 650);
        })();
    </script>
    @stack('scripts')
</body>
</html>