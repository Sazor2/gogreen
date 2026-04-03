@extends('layouts.app')

@section('title', __('app.contact_title'))

@section('content')

<style>
    :root {
        --eco-dark: #012d1d;
        --eco-medium: #059669;
        --eco-accent: #a2f31f; /* Neon Lime khas EcoVibes */
        --eco-background: #f8fafc;
    }

    html.dark {
        --eco-dark: #e6f4ee;
        --eco-medium: #7ff3be;
        --eco-accent: #a2f31f;
        --eco-background: #0a0f12;
    }

    /* Fonts matching EcoScholar/EcoVibes style */
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
        box-shadow: 0 20px 50px rgba(1, 45, 29, 0.05);
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .contact-input {
        transition: all 0.3s ease;
        border: 2px solid #f1f5f9 !important;
        background-color: #f8fafc !important;
    }

    .contact-input:focus {
        border-color: var(--eco-medium) !important;
        background-color: #ffffff !important;
        box-shadow: 0 0 0 4px rgba(162, 243, 31, 0.15);
        outline: none;
    }

    html.dark .contact-input {
        background-color: #11181e !important;
        border-color: #24313a !important;
        color: #dbe3ea !important;
    }

    html.dark .contact-input::placeholder {
        color: #7f8b96;
    }

    html.dark .contact-input:focus {
        background-color: #11181e !important;
        border-color: #7ff3be !important;
        box-shadow: 0 0 0 4px rgba(127, 243, 190, 0.18);
    }

    .btn-eco-vibes {
        background: linear-gradient(135deg, #006948 0%, #059669 100%);
        color: #ffffff;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 20px rgba(0, 105, 72, 0.25);
    }

    .btn-eco-vibes:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(0, 105, 72, 0.35);
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
    }

    .contact-loading {
        position: fixed;
        inset: 0;
        z-index: 200;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(10, 15, 18, 0.72);
        backdrop-filter: blur(6px);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.2s ease, visibility 0.2s ease;
        pointer-events: none;
    }

    .contact-loading.is-visible {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
    }

    .contact-loading svg {
        width: 140px;
        height: 140px;
    }

    .segment {
        stroke: rgba(0, 0, 0, 0);
        stroke-width: 10;
        stroke-linecap: round;
    }

    .joint {
        fill: rgba(122, 164, 186, 1);
        stroke-width: 5px;
    }

    #mir {
        scale: -0.25;
    }

    .arm {
        filter: url("#metaball");
        scale: 0.25;
        transform-origin: 250px 250px;
        animation: rotate 31s ease-in-out infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(-90deg);
        }
        25% {
            transform: rotate(360deg);
        }
        50% {
            transform: rotate(90deg);
        }
        75% {
            transform: rotate(-360deg);
        }
        100% {
            transform: rotate(-90deg);
        }
    }

    .arm1 {
        transform-origin: 300px 200px;
        animation: rotate 23s ease-in-out infinite;
    }

    .arm2 {
        transform-origin: 400px 200px;
        animation: rotate 17s ease-in-out infinite;
    }

    .arm3 {
        transform-origin: 490px 200px;
        animation: rotate 11s ease-in-out infinite;
    }
</style>

<div class="bg-[var(--eco-background)] min-h-screen pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 space-y-12 font-body">

        {{-- Hero Section (Balanced Deep Green) --}}
        <section class="relative h-[400px] rounded-[2.5rem] overflow-hidden shadow-2xl group bg-[var(--eco-dark)] reveal-on-scroll">
            <div class="absolute inset-0 z-10 bg-gradient-to-t from-[var(--eco-dark)] via-[var(--eco-dark)]/40 to-transparent"></div>
            <img
                src="{{ asset('images/background2.jpg') }}"
                alt="Contact Go Green School"
                class="absolute inset-0 w-full h-full object-cover opacity-60 grayscale-[0.2] transition-transform duration-1000 group-hover:scale-105"
            >

            <div class="relative z-20 h-full flex flex-col justify-end p-10 md:p-16">
                <div class="max-w-3xl">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 text-[var(--eco-accent)] font-headline font-bold text-[10px] uppercase tracking-[0.2em] mb-6 border border-white/10">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[var(--eco-accent)] opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-[var(--eco-accent)]"></span>
                        </span>
                        {{ __('app.contact_title') }}
                    </span>
                    <h1 class="text-4xl md:text-6xl font-headline font-black text-white leading-[1.1] tracking-tighter mb-6">
                        {{ __('app.contact_form_title') }}
                    </h1>
                    <p class="text-lg text-white/80 leading-relaxed max-w-xl">
                        {{ __('app.contact_desc') }}
                    </p>
                </div>
            </div>
        </section>

        {{-- Main Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 -mt-20 relative z-30">
            
            {{-- Info Card (Left) --}}
            <aside class="lg:col-span-5 space-y-6">
                <div class="bg-white p-10 rounded-[2rem] editorial-shadow border border-emerald-50 h-full reveal-on-scroll">
                    <h2 class="text-2xl font-headline font-black text-[var(--eco-dark)] mb-8 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-[var(--eco-accent)]/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-[var(--eco-dark)] text-sm">hub</span>
                        </span>
                        Connect with Us
                    </h2>

                    <div class="space-y-8">
                        <div class="flex gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-[var(--eco-medium)] flex-shrink-0">
                                <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">location_on</span>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ __('app.contact_address_title') }}</p>
                                <p class="text-sm font-semibold text-slate-700 leading-relaxed">{{ __('app.contact_address_val') }}</p>
                            </div>
                        </div>

                        <div class="flex gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-[var(--eco-medium)] flex-shrink-0">
                                <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">alternate_email</span>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ __('app.contact_email_title') }}</p>
                                <a href="mailto:{{ __('app.contact_email_val') }}" class="text-sm font-bold text-[var(--eco-dark)] hover:text-[var(--eco-medium)] transition-colors">{{ __('app.contact_email_val') }}</a>
                            </div>
                        </div>

                        <div class="flex gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-[var(--eco-medium)] flex-shrink-0">
                                <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1">phone_in_talk</span>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ __('app.contact_phone_title') }}</p>
                                <p class="text-sm font-bold text-slate-700">{{ __('app.contact_phone_val') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-slate-100 flex gap-4">
                        <div class="flex-1 bg-slate-50 p-4 rounded-2xl text-center">
                            <p class="text-[9px] font-black text-slate-400 uppercase mb-1">Response</p>
                            <p class="font-headline font-bold text-slate-800 text-sm">Fast</p>
                        </div>
                        <div class="flex-1 bg-slate-50 p-4 rounded-2xl text-center">
                            <p class="text-[9px] font-black text-slate-400 uppercase mb-1">Status</p>
                            <p class="font-headline font-bold text-emerald-600 text-sm">Active</p>
                        </div>
                    </div>
                </div>
            </aside>

            {{-- Form Card (Right) --}}
            <article class="lg:col-span-7 bg-white p-10 rounded-[2.5rem] editorial-shadow border border-emerald-50 reveal-on-scroll">
                <div class="mb-10">
                    <h2 class="text-3xl font-headline font-black text-[var(--eco-dark)] tracking-tight">Kirim Pesan</h2>
                    <p class="text-slate-500 mt-2">Punya pertanyaan atau saran? Kami siap mendengarkan.</p>
                </div>

                @if(session('contact_success'))
                <div class="contact-success mb-8 flex items-center gap-3 bg-emerald-50 border-2 border-emerald-100 text-emerald-800 rounded-2xl px-6 py-4">
                    <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                    <p class="text-sm font-bold">{{ __('app.contact_success') }}</p>
                </div>
                @endif

                <form id="contact-form" action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf
                    @if($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-xl mb-6">
                        <ul class="text-xs text-red-700 font-bold space-y-1">
                            @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">{{ __('app.contact_name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nama lengkap Anda"
                                   class="contact-input w-full px-5 py-4 rounded-2xl text-sm font-bold text-slate-700">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">{{ __('app.contact_email') }}</label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email aktif"
                                   class="contact-input w-full px-5 py-4 rounded-2xl text-sm font-bold text-slate-700">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">{{ __('app.contact_subject') }}</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" required placeholder="Subjek pesan"
                               class="contact-input w-full px-5 py-4 rounded-2xl text-sm font-bold text-slate-700">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">{{ __('app.contact_message') }}</label>
                        <textarea name="message" rows="5" required placeholder="Tuliskan pesan Anda di sini..."
                                  class="contact-input w-full px-5 py-4 rounded-2xl text-sm font-bold text-slate-700 resize-none">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn-eco-vibes w-full py-5 rounded-[1.5rem] font-headline font-black text-sm uppercase tracking-widest flex items-center justify-center gap-3">
                        {{ __('app.contact_send') }}
                        <span class="material-symbols-outlined text-lg">arrow_right_alt</span>
                    </button>
                </form>
            </article>
        </div>

        {{-- Map Section --}}
        <section class="bg-white rounded-[2.5rem] overflow-hidden editorial-shadow border border-emerald-50 reveal-on-scroll">
            <div class="flex flex-col md:flex-row h-full">
                <div class="w-full md:w-1/2 min-h-[350px]">
                    <iframe
                        src="https://maps.google.com/maps?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat&output=embed&z=17&hl=id"
                        width="100%" height="100%" style="border:0; filter: grayscale(0.2) contrast(1.1);"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="contact-map-panel w-full md:w-1/2 p-10 md:p-16 flex flex-col justify-center bg-[var(--eco-dark)] text-white">
                    <span class="text-[var(--eco-accent)] text-[10px] font-black uppercase tracking-[0.3em] mb-4">Location</span>
                    <h3 class="text-3xl font-headline font-black mb-6 leading-tight">Kunjungi Sekolah Kami</h3>
                    <p class="text-white/70 mb-8 leading-relaxed font-medium">
                        {{ __('app.contact_address_val') }}
                    </p>
                    <a href="https://maps.google.com/?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat" target="_blank" 
                       class="inline-flex items-center gap-3 text-[var(--eco-accent)] font-bold text-sm hover:underline">
                        Buka di Google Maps
                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>

<div id="contact-loading" class="contact-loading" aria-hidden="true">
    <svg viewBox="0 0 500 500" aria-hidden="true">
        <g class="arm">
            <line class="segment" x1="250" y1="250" x2="300" y2="250"></line>
            <circle class="joint" cx="250" cy="250" r="64"></circle>
            <g class="arm1">
                <line class="segment" x1="300" y1="250" x2="400" y2="250"></line>
                <circle class="joint" cx="300" cy="250" r="30"></circle>
                <g class="arm2">
                    <line class="segment" x1="400" y1="250" x2="490" y2="250"></line>
                    <circle class="joint" cx="400" cy="250" r="24"></circle>
                    <g class="arm3">
                        <line class="segment" x1="490" y1="250" x2="550" y2="250"></line>
                        <circle class="joint" cx="490" cy="250" r="16"></circle>
                    </g>
                </g>
                <g class="arm1">
                    <line class="segment" x1="300" y1="250" x2="400" y2="250"></line>
                    <circle class="joint" cx="300" cy="250" r="30"></circle>
                    <g class="arm2">
                        <line class="segment" x1="400" y1="250" x2="490" y2="250"></line>
                        <circle class="joint" cx="400" cy="250" r="8"></circle>
                        <g class="arm3">
                            <line class="segment" x1="490" y1="250" x2="550" y2="250"></line>
                            <circle class="joint" cx="490" cy="250" r="8"></circle>
                        </g>
                        <g class="arm2">
                            <line class="segment" x1="400" y1="250" x2="490" y2="250"></line>
                            <circle class="joint" cx="400" cy="250" r="8"></circle>
                            <g class="arm3">
                                <line class="segment" x1="490" y1="250" x2="550" y2="250"></line>
                                <circle class="joint" cx="490" cy="250" r="8"></circle>
                            </g>
                        </g>
                    </g>
                </g>
            </g>
        </g>
        <g id="mir" class="arm">
            <line class="segment" x1="250" y1="250" x2="300" y2="250"></line>
            <circle class="joint" cx="250" cy="250" r="64"></circle>
            <g class="arm1">
                <line class="segment" x1="300" y1="250" x2="400" y2="250"></line>
                <circle class="joint" cx="300" cy="250" r="30"></circle>
                <g class="arm2">
                    <line class="segment" x1="400" y1="250" x2="490" y2="250"></line>
                    <circle class="joint" cx="400" cy="250" r="24"></circle>
                    <g class="arm3">
                        <line class="segment" x1="490" y1="250" x2="550" y2="250"></line>
                        <circle class="joint" cx="490" cy="250" r="16"></circle>
                    </g>
                </g>
                <g class="arm1">
                    <line class="segment" x1="300" y1="250" x2="400" y2="250"></line>
                    <circle class="joint" cx="300" cy="250" r="30"></circle>
                    <g class="arm2">
                        <line class="segment" x1="400" y1="250" x2="490" y2="250"></line>
                        <circle class="joint" cx="400" cy="250" r="8"></circle>
                        <g class="arm3">
                            <line class="segment" x1="490" y1="250" x2="550" y2="250"></line>
                            <circle class="joint" cx="490" cy="250" r="8"></circle>
                        </g>
                        <g class="arm2">
                            <line class="segment" x1="400" y1="250" x2="490" y2="250"></line>
                            <circle class="joint" cx="400" cy="250" r="8"></circle>
                            <g class="arm3">
                                <line class="segment" x1="490" y1="250" x2="550" y2="250"></line>
                                <circle class="joint" cx="490" cy="250" r="8"></circle>
                            </g>
                        </g>
                    </g>
                </g>
            </g>
        </g>
        <filter id="metaball">
            <feGaussianBlur in="SourceGraphic" stdDeviation="17" result="blur"></feGaussianBlur>
            <feColorMatrix
                in="blur"
                mode="matrix"
                values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 100 -7"
                result="fluid"
            ></feColorMatrix>
            <feComposite in="SourceGraphic" in2="fluid" operator="atop"></feComposite>
        </filter>
    </svg>
</div>

<style>
    html.dark .contact-map-panel {
        background-color: #0f1418;
        color: #e6edf3;
    }

    html.dark .contact-map-panel p {
        color: #a6b0ba;
    }

    html.dark .contact-map-panel a {
        color: #7ff3be;
    }

    html.dark .contact-success {
        background-color: #0f1d20;
        border-color: #1f3a44;
        color: #7ff3be;
    }

    html.dark .contact-success .material-symbols-outlined {
        color: #7ff3be;
    }
</style>

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
    const setupContactLoading = function () {
        const form = document.getElementById('contact-form');
        const overlay = document.getElementById('contact-loading');
        if (!form || !overlay) return;

        form.addEventListener('submit', () => {
            overlay.classList.add('is-visible');
            document.body.style.overflow = 'hidden';
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.setAttribute('disabled', 'disabled');
            }
            form.setAttribute('aria-busy', 'true');
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            window.setupRevealOnScroll();
            setupContactLoading();
        });
    } else {
        window.setupRevealOnScroll();
        setupContactLoading();
    }
</script>
@endpush

@endsection