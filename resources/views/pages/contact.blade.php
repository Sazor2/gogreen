@extends('layouts.app')

@section('title', __('app.contact_title'))

@section('content')

<style>
    :root {
        --contact-primary: #047857;
        --contact-primary-soft: #ecfdf5;
        --contact-border: #d1fae5;
        --contact-text: #0f172a;
        --contact-muted: #64748b;
    }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
    }

    .contact-hero {
        background: linear-gradient(135deg, #065f46 0%, #064e3b 52%, #134e4a 100%);
    }

    .contact-input {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .contact-input:focus {
        box-shadow: 0 0 0 1px var(--contact-primary), 0 6px 18px rgba(4, 120, 87, 0.12);
        border-color: var(--contact-primary);
    }

    .contact-card {
        border: 1px solid var(--contact-border);
        border-radius: 1rem;
        background: #ffffff;
    }

    .contact-label {
        font-size: 0.72rem;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        font-weight: 700;
        color: var(--contact-muted);
    }
</style>

<section class="contact-hero pt-16 md:pt-20 pb-24 px-6 md:px-10 text-white">
    <div class="max-w-7xl mx-auto">
        <p class="text-emerald-100/80 uppercase tracking-[0.18em] text-xs font-semibold mb-4">{{ __('app.contact_title') }}</p>
        <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight leading-tight mb-4">
            {{ __('app.contact_title') }}
        </h1>
        <p class="text-emerald-50/90 text-base md:text-lg max-w-3xl leading-relaxed">
            {{ __('app.contact_desc') }}
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 md:px-10 -mt-10 mb-20 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <aside class="lg:col-span-5 space-y-6">
            <div class="contact-card p-7 md:p-8">
                <h2 class="contact-label mb-7">{{ __('app.contact_info_title') }}</h2>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <div>
                            <p class="contact-label mb-1">{{ __('app.contact_address_title') }}</p>
                            <p class="text-sm text-slate-700 leading-relaxed">{{ __('app.contact_address_val') }}</p>
                        </div>
                    </div>

                    <div class="h-px bg-emerald-100"></div>

                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <div>
                            <p class="contact-label mb-1">{{ __('app.contact_phone_title') }}</p>
                            <a href="tel:056521234" class="text-sm text-slate-700 font-medium hover:text-emerald-700 transition-colors">{{ __('app.contact_phone_val') }}</a>
                        </div>
                    </div>

                    <div class="h-px bg-emerald-100"></div>

                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                        <div>
                            <p class="contact-label mb-1">{{ __('app.contact_email_title') }}</p>
                            <a href="mailto:smkkaryabangsasintang@gmail.com" class="text-sm text-slate-700 font-medium hover:text-emerald-700 transition-colors break-all">{{ __('app.contact_email_val') }}</a>
                        </div>
                    </div>

                    <div class="h-px bg-emerald-100"></div>

                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                            <span class="material-symbols-outlined">schedule</span>
                        </div>
                        <div>
                            <p class="contact-label mb-1">{{ __('app.contact_hours_title') }}</p>
                            <p class="text-sm text-slate-700">{{ __('app.contact_hours_val') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-card overflow-hidden">
                <div class="px-5 py-4 bg-white border-b border-emerald-100 flex items-center gap-2">
                    <span class="material-symbols-outlined text-emerald-700" style="font-size:1.2rem">map</span>
                    <h3 class="text-sm font-semibold text-slate-700">{{ __('app.contact_map_title') }}</h3>
                </div>
                <iframe
                    src="https://maps.google.com/maps?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat&output=embed&z=17&hl=id"
                    width="100%"
                    height="290"
                    style="border:0;display:block;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi SMK Karya Bangsa Sintang">
                </iframe>
            </div>
        </aside>

        <section class="lg:col-span-7 contact-card p-7 md:p-10 lg:p-12">
            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">{{ __('app.contact_form_title') }}</h2>
            <p class="text-slate-600 mt-3 mb-8 text-sm md:text-base leading-relaxed max-w-2xl">{{ __('app.contact_form_desc') }}</p>

            @if(session('contact_success'))
            <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl px-5 py-4 shadow-sm mb-6">
                <span class="material-symbols-outlined text-emerald-600 mt-0.5" style="font-size:1.35rem">check_circle</span>
                <p class="text-sm font-medium">{{ __('app.contact_success') }}</p>
            </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                @csrf

                @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-2xl px-4 py-3">
                    <ul class="text-sm text-red-600 space-y-1 list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="contact-label mb-2 block" for="contact_name">{{ __('app.contact_name') }} <span class="text-red-500">*</span></label>
                        <input
                            type="text"
                            id="contact_name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="{{ __('app.contact_name_ph') }}"
                            required
                            class="contact-input w-full rounded-xl bg-slate-50 border border-slate-200 px-4 py-3 text-slate-800 placeholder:text-slate-400 focus:outline-none @error('name') border-red-300 bg-red-50 @enderror"
                        >
                        @error('name')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="contact-label mb-2 block" for="contact_email">{{ __('app.contact_email') }} <span class="text-red-500">*</span></label>
                        <input
                            type="email"
                            id="contact_email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="{{ __('app.contact_email_ph') }}"
                            required
                            class="contact-input w-full rounded-xl bg-slate-50 border border-slate-200 px-4 py-3 text-slate-800 placeholder:text-slate-400 focus:outline-none @error('email') border-red-300 bg-red-50 @enderror"
                        >
                        @error('email')
                        <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="contact-label mb-2 block" for="contact_subject">{{ __('app.contact_subject') }} <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="contact_subject"
                        name="subject"
                        value="{{ old('subject') }}"
                        placeholder="{{ __('app.contact_subject_ph') }}"
                        required
                        class="contact-input w-full rounded-xl bg-slate-50 border border-slate-200 px-4 py-3 text-slate-800 placeholder:text-slate-400 focus:outline-none @error('subject') border-red-300 bg-red-50 @enderror"
                    >
                    @error('subject')
                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="contact-label mb-2 block" for="contact_message">{{ __('app.contact_message') }} <span class="text-red-500">*</span></label>
                    <textarea
                        id="contact_message"
                        name="message"
                        rows="6"
                        placeholder="{{ __('app.contact_message_ph') }}"
                        required
                        class="contact-input w-full rounded-xl bg-slate-50 border border-slate-200 px-4 py-3 text-slate-800 placeholder:text-slate-400 focus:outline-none resize-none @error('message') border-red-300 bg-red-50 @enderror"
                    >{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <p class="text-xs text-slate-500">* {{ __('app.contact_form_desc') }}</p>
                    <button
                        type="submit"
                        class="group w-full sm:w-auto bg-emerald-700 hover:bg-emerald-800 text-white font-semibold py-3.5 px-8 rounded-xl shadow-lg shadow-emerald-700/20 flex items-center justify-center gap-2 transition-all"
                    >
                        <span>{{ __('app.contact_send') }}</span>
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
                    </button>
                </div>
            </form>
        </section>
    </div>
</section>

@endsection
