@extends('layouts.app')

@section('title', __('app.latar_title'))

@section('html_class', 'latar-page')

@section('content')

<style>
    :root {
        --eco-dark: #064e3b;
        --eco-green: #059669;
        --eco-light: #ecfdf5;
        --eco-accent: #c3f400;
    }

    html.dark {
        --eco-dark: #e6f4ee;
        --eco-green: #7ff3be;
        --eco-light: #13211a;
        --eco-accent: #a2f31f;
    }

    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@500;700;800&family=Roboto:wght@400;500;700&display=swap');

    .font-outfit { font-family: 'DM Sans', sans-serif; }
    .font-jakarta { font-family: 'Roboto', sans-serif; }

    .editorial-shadow {
        box-shadow: 0 20px 40px rgba(6, 78, 59, 0.08);
    }

    .bento-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(6, 78, 59, 0.05);
        background: white;
    }
    
    .bento-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 60px rgba(6, 78, 59, 0.12);
        border-color: var(--eco-green);
    }

    /* Reveal on Scroll */
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

    /* Modal Styling */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(6, 78, 59, 0.6);
        z-index: 100;
        backdrop-filter: blur(8px);
    }
    .modal-overlay.active { display: flex; align-items: center; justify-content: center; }
    
    .modal-content {
        background: white;
        border-radius: 2.5rem;
        width: 90%;
        max-width: 800px;
        max-height: 85vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 40px 100px rgba(0,0,0,0.2);
    }

    html.dark.latar-page main {
        background-color: #0a0f12 !important;
        color: #dbe3ea;
    }

    html.dark.latar-page .bento-card {
        background: #11181e;
        border-color: #24313a;
    }

    html.dark.latar-page .bento-card:hover {
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.45);
    }

    html.dark.latar-page .modal-overlay {
        background: rgba(10, 15, 18, 0.75);
    }

    html.dark.latar-page .modal-content {
        background: #11181e;
        box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
    }

    html.dark.latar-page .procedure-section {
        background-color: #0f1418;
        color: #e6edf3;
    }

    html.dark.latar-page .procedure-section p,
    html.dark.latar-page .procedure-section li {
        color: #a6b0ba;
    }

    html.dark.latar-page .procedure-section .bg-white\/5 {
        background-color: rgba(255, 255, 255, 0.06);
        border-color: #24313a;
    }
</style>

<main class="font-jakarta bg-[#f8faf9] pb-20">
    {{-- Hero Section --}}
    <div class="relative max-w-7xl mx-auto px-6 md:px-8 mt-8">
        <section class="relative overflow-hidden flex items-center rounded-3xl reveal-on-scroll shadow-[0_32px_64px_rgba(10,47,34,0.15)] group" style="min-height:500px;">
            <div class="absolute inset-0 z-0 overflow-hidden">
                <img src="{{ asset('images/begeron.jpeg') }}" class="w-full h-full object-cover scale-105 transition-transform duration-[10s] group-hover:scale-110" alt="Hero">
                <div class="absolute inset-0 bg-gradient-to-r from-[#0a2f22]/95 via-[#0a2f22]/60 to-transparent"></div>
            </div>

            <div class="relative z-10 px-8 md:px-12 max-w-2xl py-12">
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white text-xs font-bold font-outfit uppercase tracking-[0.15em] mb-6 shadow-lg transition-colors hover:bg-white/20 hover:border-white/50 cursor-default">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#a2f31f] animate-pulse shadow-[0_0_10px_#a2f31f]"></span>
                    {{ __('app.program_active') }}
                </div>
                <h1 class="font-outfit text-[3.5rem] md:text-[5rem] font-extrabold leading-[1.05] tracking-tight mb-6 drop-shadow-2xl text-white">
                    {{ __('app.latar_title') }}
                </h1>
                <p class="text-white/90 text-lg md:text-xl font-medium mb-8 leading-relaxed drop-shadow-md max-w-xl font-jakarta">
                    {{ __('app.latar_subtitle') }}
                </p>
            </div>
        </section>
    </div>

    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            {{-- Info Card --}}
            <div class="bento-card p-10 rounded-[2.5rem] flex flex-col justify-between reveal-on-scroll reveal-delay-1">
                <div>
                    <div class="w-14 h-14 bg-[var(--eco-light)] text-[var(--eco-green)] rounded-2xl flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-3xl">info</span>
                    </div>
                    <h3 class="text-2xl font-outfit font-black text-[var(--eco-dark)] mb-4">{{ __('app.latar_information_title') }}</h3>
                    <p class="text-slate-500 leading-relaxed mb-8 line-clamp-3">
                        {{ __('app.latar_information_intro') }}
                    </p>
                </div>
                <button onclick="openModal('infoModal')" class="flex items-center justify-between w-full p-4 rounded-2xl bg-slate-50 hover:bg-[var(--eco-accent)] transition-colors group">
                    <span class="font-bold text-[var(--eco-dark)]">{{ __('app.latar_information_title') }}</span>
                    <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                </button>
            </div>

            {{-- Description Card --}}
            <div class="bento-card p-10 rounded-[2.5rem] flex flex-col justify-between reveal-on-scroll reveal-delay-2">
                <div>
                    <div class="w-14 h-14 bg-[var(--eco-light)] text-[var(--eco-green)] rounded-2xl flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-3xl">eco</span>
                    </div>
                    <h3 class="text-2xl font-outfit font-black text-[var(--eco-dark)] mb-4">{{ __('app.latar_description_title') }}</h3>
                    <p class="text-slate-500 leading-relaxed mb-8 line-clamp-3">
                        {{ __('app.latar_description_text') }}
                    </p>
                </div>
                <button onclick="openModal('descModal')" class="flex items-center justify-between w-full p-4 rounded-2xl bg-slate-50 hover:bg-[var(--eco-accent)] transition-colors group">
                    <span class="font-bold text-[var(--eco-dark)]">{{ __('app.latar_description_title') }}</span>
                    <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                </button>
            </div>
        </div>

        {{-- Procedure Section (Green Bento) --}}
        @php
            $procedureItems = collect(explode("\n", __('app.latar_procedure_items')))
                ->map(fn ($item) => trim($item))
                ->filter(fn ($item) => $item !== '');

            $alatBahanItems = $procedureItems->filter(fn ($item) => !preg_match('/^\d+\./', $item))->values();
            $langkahItems = $procedureItems->filter(fn ($item) => preg_match('/^\d+\./', $item))->values();
        @endphp

        <div class="procedure-section bg-[var(--eco-dark)] rounded-[3rem] p-10 md:p-16 text-white mb-16 reveal-on-scroll">
            <div class="max-w-3xl mb-12">
                <span class="text-[var(--eco-accent)] font-bold uppercase tracking-widest text-xs mb-4 block">{{ __('app.latar_procedure_title') }}</span>
                <h2 class="text-3xl md:text-5xl font-outfit font-black mb-6">{{ __('app.latar_procedure_intro') }}</h2>
                <p class="text-emerald-100/70 text-lg italic">"{{ __('app.latar_procedure_objective') }}"</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="bg-white/5 backdrop-blur-md rounded-[2rem] p-8 border border-white/10 reveal-on-scroll reveal-delay-1">
                    <h4 class="font-outfit font-black text-xl mb-6 flex items-center gap-3">
                        <span class="material-symbols-outlined text-[var(--eco-accent)]">inventory_2</span>
                        {{ __('app.latar_materials_title') }}
                    </h4>
                    <ul class="space-y-4">
                        @foreach($alatBahanItems as $item)
                        <li class="flex items-center gap-3 text-emerald-50/80">
                            <span class="w-1.5 h-1.5 bg-[var(--eco-accent)] rounded-full"></span>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-white/5 backdrop-blur-md rounded-[2rem] p-8 border border-white/10 reveal-on-scroll reveal-delay-2">
                    <h4 class="font-outfit font-black text-xl mb-6 flex items-center gap-3">
                        <span class="material-symbols-outlined text-[var(--eco-accent)]">format_list_numbered</span>
                        {{ __('app.latar_steps_title') }}
                    </h4>
                    <div class="space-y-6">
                        @foreach($langkahItems as $index => $item)
                        <div class="flex gap-4">
                            <span class="font-outfit font-black text-[var(--eco-accent)] opacity-50">{{ $index + 1 }}</span>
                            <p class="text-emerald-50/80 text-sm leading-relaxed">{{ preg_replace('/^\d+\.\s*/', '', $item) }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Explanation Section --}}
        <div class="bento-card rounded-[3rem] overflow-hidden flex flex-col lg:flex-row reveal-on-scroll reveal-delay-1">
            <div class="lg:w-1/3 bg-[var(--eco-light)] p-12 flex flex-col justify-center border-r border-emerald-50">
                <span class="material-symbols-outlined text-7xl text-[var(--eco-green)] mb-6">analytics</span>
                <h3 class="text-3xl font-outfit font-black text-[var(--eco-dark)]">{{ __('app.latar_explanation_title') }}</h3>
            </div>
            <div class="lg:w-2/3 p-10 md:p-16 space-y-10">
                <div class="flex gap-6">
                    <div class="text-4xl font-outfit font-black text-[var(--eco-accent)] stroke-black">01</div>
                    <div>
                        <h4 class="font-bold text-[var(--eco-dark)] mb-2">{{ __('app.latar_explanation_general') }}</h4>
                        <p class="text-slate-500 text-sm">{{ __('app.latar_explanation_intro') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="text-4xl font-outfit font-black text-[var(--eco-accent)]">02</div>
                    <div>
                        <h4 class="font-bold text-[var(--eco-dark)] mb-2">{{ __('app.latar_explanation_sequence') }}</h4>
                        <p class="text-slate-500 text-sm">{{ __('app.latar_explanation_body') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="text-4xl font-outfit font-black text-[var(--eco-accent)]">03</div>
                    <div>
                        <h4 class="font-bold text-[var(--eco-dark)] mb-2">{{ __('app.latar_explanation_conclusion_label') }}</h4>
                        <p class="text-slate-500 text-sm">{{ __('app.latar_explanation_conclusion') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- Info Modal --}}
<div id="infoModal" class="modal-overlay" onclick="if(event.target === this) closeModal('infoModal')">
    <div class="modal-content p-10">
        <button onclick="closeModal('infoModal')" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-red-50 hover:text-red-500 transition-all">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div class="mb-8">
            <h2 class="text-3xl font-outfit font-black text-[var(--eco-dark)] mb-2">{{ __('app.latar_information_title') }}</h2>
            <div class="h-1.5 w-20 bg-[var(--eco-accent)] rounded-full"></div>
        </div>
        <div class="space-y-6 text-slate-600 leading-relaxed">
            <div class="p-6 bg-[var(--eco-light)] rounded-2xl">{{ __('app.latar_information_intro') }}</div>
            <p>{{ __('app.latar_information_body') }}</p>
            <div class="border-t pt-6 font-bold italic text-[var(--eco-green)]">
                {{ __('app.latar_information_conclusion') }}
            </div>
        </div>
    </div>
</div>

{{-- Desc Modal --}}
<div id="descModal" class="modal-overlay" onclick="if(event.target === this) closeModal('descModal')">
    <div class="modal-content p-10">
        <button onclick="closeModal('descModal')" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center">
            <span class="material-symbols-outlined">close</span>
        </button>
        <h2 class="text-3xl font-outfit font-black text-[var(--eco-dark)] mb-8">{{ __('app.latar_description_title') }}</h2>
        
        <div class="grid gap-6">
            <div class="flex gap-5 p-6 border border-emerald-50 rounded-3xl hover:bg-[var(--eco-light)] transition-colors">
                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-[var(--eco-green)] flex-shrink-0">
                    <span class="material-symbols-outlined">description</span>
                </div>
                <div>
                    <p class="text-sm text-slate-600 leading-relaxed">{{ __('app.latar_description_text') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openModal(id) {
        document.getElementById(id).classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeModal(id) {
        document.getElementById(id).classList.remove('active');
        document.body.style.overflow = 'auto';
    }

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