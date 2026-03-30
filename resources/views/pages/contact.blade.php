@extends('layouts.app')

@section('title', __('app.contact_title'))

@section('content')

<style>
    :root {
        --contact-primary: #006948;
        --contact-primary-dim: #005b3e;
        --contact-primary-container: #7ff3be;
        --contact-secondary-fixed: #69f6b8;
        --contact-on-surface: #00362a;
        --contact-on-surface-variant: #2f6556;
        --contact-outline-variant: #81b8a6;
    }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    .contact-hero {
        background: linear-gradient(135deg, var(--contact-primary) 0%, var(--contact-primary-dim) 100%);
    }

    .bg-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2v-4h4v-2h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2v-4h4v-2H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .glass-panel {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }

    .contact-input {
        transition: all 0.25s ease;
    }

    .contact-input:focus {
        box-shadow: 0 0 0 2px rgba(0, 105, 72, 0.18), 0 0 15px rgba(0, 105, 72, 0.1);
        border-color: transparent;
    }
</style>

<section class="relative overflow-hidden contact-hero py-24 md:py-32 text-white">
    <div class="absolute inset-0 bg-pattern opacity-30"></div>
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-96 h-96 bg-[var(--contact-primary-container)]/20 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-64 h-64 bg-[var(--contact-secondary-fixed)]/20 rounded-full blur-[80px]"></div>
    <div class="relative max-w-7xl mx-auto px-6 text-center">
        <p class="text-white/75 uppercase tracking-[0.2em] text-xs font-semibold mb-4">{{ __('app.contact_title') }}</p>
        <h1 class="font-headline font-extrabold text-5xl md:text-7xl text-white leading-tight tracking-tighter mb-6">
            {{ __('app.contact_title') }}
        </h1>
        <p class="text-white/80 max-w-2xl mx-auto text-lg md:text-xl font-medium leading-relaxed">
            {{ __('app.contact_desc') }}
        </p>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-14 relative z-10 pb-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-7 xl:gap-10 items-start">

        <aside class="lg:col-span-5 space-y-6 xl:space-y-8">
            <div class="glass-panel p-7 md:p-8 rounded-2xl shadow-xl border border-white/20 space-y-8">
                <h2 class="font-headline text-2xl font-bold text-[var(--contact-on-surface)]">{{ __('app.contact_info_title') }}</h2>

                <div class="space-y-6">
                    <div class="flex items-start gap-5 group">
                        <div class="flex-shrink-0 w-14 h-14 rounded-lg bg-[var(--contact-primary-container)] flex items-center justify-center text-[var(--contact-primary)] shadow-[0_0_20px_rgba(127,243,190,0.4)] group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">location_on</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-[var(--contact-primary)] uppercase tracking-widest mb-1">{{ __('app.contact_address_title') }}</p>
                            <p class="text-[var(--contact-on-surface-variant)] font-medium leading-relaxed">{{ __('app.contact_address_val') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 group">
                        <div class="flex-shrink-0 w-14 h-14 rounded-lg bg-[var(--contact-secondary-fixed)] flex items-center justify-center text-[var(--contact-primary)] shadow-[0_0_20px_rgba(105,246,184,0.4)] group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">call</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-[var(--contact-primary)] uppercase tracking-widest mb-1">{{ __('app.contact_phone_title') }}</p>
                            <a href="tel:056521234" class="text-[var(--contact-on-surface-variant)] font-medium hover:text-[var(--contact-primary)] transition-colors">{{ __('app.contact_phone_val') }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 group">
                        <div class="flex-shrink-0 w-14 h-14 rounded-lg bg-[var(--contact-secondary-fixed)]/50 flex items-center justify-center text-[var(--contact-primary-dim)] shadow-[0_0_20px_rgba(167,241,217,0.4)] group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">mail</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-[var(--contact-primary)] uppercase tracking-widest mb-1">{{ __('app.contact_email_title') }}</p>
                            <a href="mailto:smkkaryabangsasintang@gmail.com" class="text-[var(--contact-on-surface-variant)] font-medium hover:text-[var(--contact-primary)] transition-colors break-all">{{ __('app.contact_email_val') }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 group">
                        <div class="flex-shrink-0 w-14 h-14 rounded-lg bg-emerald-100 flex items-center justify-center text-[var(--contact-primary-dim)] shadow-[0_0_20px_rgba(156,236,211,0.4)] group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-3xl">schedule</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-[var(--contact-primary-dim)] uppercase tracking-widest mb-1">{{ __('app.contact_hours_title') }}</p>
                            <p class="text-[var(--contact-on-surface-variant)] font-medium">{{ __('app.contact_hours_val') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-2xl ring-8 ring-white/30 hover:ring-white/50 transition-all duration-500 group relative">
                <iframe
                    src="https://maps.google.com/maps?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat&output=embed&z=17&hl=id"
                    width="100%"
                    height="290"
                    style="border:0;display:block;"
                    class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-700"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi SMK Karya Bangsa Sintang">
                </iframe>
                <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/40 to-transparent pointer-events-none"></div>
            </div>
        </aside>

        <section class="lg:col-span-7 lg:pl-1">
            <div class="bg-white p-7 md:p-10 lg:p-11 rounded-2xl shadow-2xl relative">
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-[var(--contact-primary-container)] rounded-full blur-2xl opacity-40"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[var(--contact-secondary-fixed)] rounded-full blur-3xl opacity-20"></div>
                <div class="relative">
                    <div class="mb-10">
                        <h2 class="font-headline text-3xl font-extrabold text-[var(--contact-on-surface)] tracking-tight mb-2">{{ __('app.contact_form_title') }}</h2>
                        <p class="text-[var(--contact-on-surface-variant)] font-medium">{{ __('app.contact_form_desc') }}</p>
                    </div>

                    @if(session('contact_success'))
                    <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg px-5 py-4 shadow-sm mb-6">
                        <span class="material-symbols-outlined text-emerald-600 mt-0.5" style="font-size:1.35rem">check_circle</span>
                        <p class="text-sm font-medium">{{ __('app.contact_success') }}</p>
                    </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf

                        @if($errors->any())
                        <div class="bg-red-50 border border-red-200 rounded-lg px-4 py-3">
                            <ul class="text-sm text-red-600 space-y-1 list-disc list-inside">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="font-headline text-sm font-bold text-[var(--contact-on-surface-variant)] ml-1" for="contact_name">{{ __('app.contact_name') }} <span class="text-red-500">*</span></label>
                                <input
                                    type="text"
                                    id="contact_name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="{{ __('app.contact_name_ph') }}"
                                    required
                                    class="contact-input w-full px-5 py-4 rounded-lg bg-emerald-50/40 border-none ring-1 ring-[var(--contact-outline-variant)]/30 focus:ring-2 focus:ring-[var(--contact-primary)] focus:bg-white transition-all outline-none @error('name') ring-red-300 bg-red-50 @enderror"
                                >
                                @error('name')
                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="font-headline text-sm font-bold text-[var(--contact-on-surface-variant)] ml-1" for="contact_email">{{ __('app.contact_email') }} <span class="text-red-500">*</span></label>
                                <input
                                    type="email"
                                    id="contact_email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="{{ __('app.contact_email_ph') }}"
                                    required
                                    class="contact-input w-full px-5 py-4 rounded-lg bg-emerald-50/40 border-none ring-1 ring-[var(--contact-outline-variant)]/30 focus:ring-2 focus:ring-[var(--contact-primary)] focus:bg-white transition-all outline-none @error('email') ring-red-300 bg-red-50 @enderror"
                                >
                                @error('email')
                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="font-headline text-sm font-bold text-[var(--contact-on-surface-variant)] ml-1" for="contact_subject">{{ __('app.contact_subject') }} <span class="text-red-500">*</span></label>
                            <input
                                type="text"
                                id="contact_subject"
                                name="subject"
                                value="{{ old('subject') }}"
                                placeholder="{{ __('app.contact_subject_ph') }}"
                                required
                                class="contact-input w-full px-5 py-4 rounded-lg bg-emerald-50/40 border-none ring-1 ring-[var(--contact-outline-variant)]/30 focus:ring-2 focus:ring-[var(--contact-primary)] focus:bg-white transition-all outline-none @error('subject') ring-red-300 bg-red-50 @enderror"
                            >
                            @error('subject')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="font-headline text-sm font-bold text-[var(--contact-on-surface-variant)] ml-1" for="contact_message">{{ __('app.contact_message') }} <span class="text-red-500">*</span></label>
                            <textarea
                                id="contact_message"
                                name="message"
                                rows="6"
                                placeholder="{{ __('app.contact_message_ph') }}"
                                required
                                class="contact-input w-full px-5 py-4 rounded-lg bg-emerald-50/40 border-none ring-1 ring-[var(--contact-outline-variant)]/30 focus:ring-2 focus:ring-[var(--contact-primary)] focus:bg-white transition-all outline-none resize-none @error('message') ring-red-300 bg-red-50 @enderror"
                            >{{ old('message') }}</textarea>
                            @error('message')
                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full bg-gradient-to-r from-[var(--contact-primary)] to-[var(--contact-primary-dim)] text-white py-5 rounded-lg font-headline font-bold text-lg shadow-lg shadow-emerald-700/20 hover:shadow-emerald-700/40 hover:-translate-y-0.5 transition-all active:scale-[0.98] flex items-center justify-center gap-3"
                            >
                                <span>{{ __('app.contact_send') }}</span>
                                <span class="material-symbols-outlined">send</span>
                            </button>
                        </div>

                        <div class="mt-2 flex items-center justify-center gap-6">
                            <span class="text-xs font-bold text-[var(--contact-on-surface-variant)]/50 uppercase tracking-[0.2em]">{{ __('app.contact_map_title') }}</span>
                            <div class="flex gap-4">
                                <a class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-[var(--contact-primary)] hover:bg-[var(--contact-primary)] hover:text-white transition-all shadow-sm" href="mailto:smkkaryabangsasintang@gmail.com">
                                    <span class="material-symbols-outlined text-xl">mail</span>
                                </a>
                                <a class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-[var(--contact-primary)] hover:bg-[var(--contact-primary)] hover:text-white transition-all shadow-sm" href="tel:056521234">
                                    <span class="material-symbols-outlined text-xl">call</span>
                                </a>
                                <a class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-[var(--contact-primary)] hover:bg-[var(--contact-primary)] hover:text-white transition-all shadow-sm" href="https://maps.google.com/?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat" target="_blank" rel="noopener noreferrer">
                                    <span class="material-symbols-outlined text-xl">public</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>

@endsection
