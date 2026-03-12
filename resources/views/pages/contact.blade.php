@extends('layouts.app')

@section('title', __('app.contact_title'))

@section('content')

<style>
    .form-input-container:focus-within label { color: #059669; }
    .contact-card { transition: transform 0.2s ease-in-out; }
    .contact-card:active { transform: scale(0.98); }
</style>

{{-- Hero Header --}}
<header class="relative bg-gradient-to-br from-emerald-600 to-teal-700 pt-12 pb-24 px-6 text-white rounded-b-[2.5rem] shadow-lg">
    <div class="max-w-lg mx-auto">
        <h1 class="text-3xl font-bold mb-3">{{ __('app.contact_title') }}</h1>
        <p class="text-emerald-50 opacity-90 leading-relaxed">{{ __('app.contac t_desc') }}</p>
    </div>
</header>

<main class="max-w-lg mx-auto px-6 -mt-12 mb-16 space-y-6">

    {{-- Success Alert --}}
    @if(session('contact_success'))
    <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl px-5 py-4 shadow-sm">
        <span class="material-symbols-outlined text-emerald-500 mt-0.5" style="font-size:1.4rem">check_circle</span>
        <p class="text-sm font-medium">{{ __('app.contact_success') }}</p>
    </div>
    @endif

    {{-- Contact Info --}}
    <section>
        <div class="bg-white rounded-3xl p-6 shadow-xl shadow-emerald-900/5 border border-slate-100 contact-card">
            <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-600">info</span>
                {{ __('app.contact_info_title') }}
            </h2>
            <div class="space-y-5">

                {{-- Address --}}
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                        <span class="material-symbols-outlined" style="font-size:1.25rem">location_on</span>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-0.5">{{ __('app.contact_address_title') }}</p>
                        <p class="text-sm text-slate-700 leading-snug">{{ __('app.contact_address_val') }}</p>
                    </div>
                </div>

                <div class="border-t border-slate-50"></div>

                {{-- Phone --}}
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                        <span class="material-symbols-outlined" style="font-size:1.25rem">call</span>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-0.5">{{ __('app.contact_phone_title') }}</p>
                        <a href="tel:056521234" class="text-sm text-slate-700 font-medium hover:text-emerald-600 transition-colors">{{ __('app.contact_phone_val') }}</a>
                    </div>
                </div>

                <div class="border-t border-slate-50"></div>

                {{-- Email --}}
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                        <span class="material-symbols-outlined" style="font-size:1.25rem">mail</span>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-0.5">{{ __('app.contact_email_title') }}</p>
                        <a href="mailto:smkkaryabangsasintang@gmail.com" class="text-sm text-slate-700 font-medium hover:text-emerald-600 transition-colors break-all">{{ __('app.contact_email_val') }}</a>
                    </div>
                </div>

                <div class="border-t border-slate-50"></div>

                {{-- Operating Hours --}}
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600">
                        <span class="material-symbols-outlined" style="font-size:1.25rem">schedule</span>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-0.5">{{ __('app.contact_hours_title') }}</p>
                        <p class="text-sm text-slate-700">{{ __('app.contact_hours_val') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Map --}}
    <section>
        <div class="bg-white rounded-3xl overflow-hidden shadow-xl shadow-emerald-900/5 border border-slate-100">
            <div class="px-5 py-4 border-b border-slate-100 flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-600" style="font-size:1.2rem">map</span>
                <h3 class="text-sm font-semibold text-slate-700">{{ __('app.contact_map_title') }}</h3>
            </div>
            <iframe
                src="https://maps.google.com/maps?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat&output=embed&z=17&hl=id"
                width="100%"
                height="240"
                style="border:0;display:block;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Lokasi SMK Karya Bangsa Sintang">
            </iframe>
        </div>
    </section>

    {{-- Contact Form --}}
    <section>
        <div class="bg-white rounded-3xl p-6 shadow-xl shadow-emerald-900/5 border border-slate-100">
            <h2 class="text-xl font-bold text-slate-800 mb-1 flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-600">chat_bubble</span>
                {{ __('app.contact_form_title') }}
            </h2>
            <p class="text-sm text-slate-500 mb-6 ml-8">{{ __('app.contact_form_desc') }}</p>

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Validation errors --}}
                @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-2xl px-4 py-3">
                    <ul class="text-sm text-red-600 space-y-1 list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Name --}}
                <div class="form-input-container">
                    <label class="block text-sm font-medium text-slate-600 mb-1.5 ml-1" for="contact_name">
                        {{ __('app.contact_name') }} <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" style="font-size:1.2rem">person</span>
                        <input
                            type="text"
                            id="contact_name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="{{ __('app.contact_name_ph') }}"
                            required
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-slate-800 @error('name') border-red-300 bg-red-50 @enderror"
                        >
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-input-container">
                    <label class="block text-sm font-medium text-slate-600 mb-1.5 ml-1" for="contact_email">
                        {{ __('app.contact_email') }} <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" style="font-size:1.2rem">alternate_email</span>
                        <input
                            type="email"
                            id="contact_email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="{{ __('app.contact_email_ph') }}"
                            required
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-slate-800 @error('email') border-red-300 bg-red-50 @enderror"
                        >
                    </div>
                </div>

                {{-- Subject --}}
                <div class="form-input-container">
                    <label class="block text-sm font-medium text-slate-600 mb-1.5 ml-1" for="contact_subject">
                        {{ __('app.contact_subject') }} <span class="text-red-400">*</span>
                    </label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" style="font-size:1.2rem">subject</span>
                        <input
                            type="text"
                            id="contact_subject"
                            name="subject"
                            value="{{ old('subject') }}"
                            placeholder="{{ __('app.contact_subject_ph') }}"
                            required
                            class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-slate-800 @error('subject') border-red-300 bg-red-50 @enderror"
                        >
                    </div>
                </div>

                {{-- Message --}}
                <div class="form-input-container">
                    <label class="block text-sm font-medium text-slate-600 mb-1.5 ml-1" for="contact_message">
                        {{ __('app.contact_message') }} <span class="text-red-400">*</span>
                    </label>
                    <textarea
                        id="contact_message"
                        name="message"
                        rows="5"
                        placeholder="{{ __('app.contact_message_ph') }}"
                        required
                        class="block w-full px-4 py-3 bg-slate-50 border border-transparent rounded-2xl focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-slate-800 resize-none @error('message') border-red-300 bg-red-50 @enderror"
                    >{{ old('message') }}</textarea>
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 px-6 rounded-2xl shadow-lg shadow-emerald-600/20 flex items-center justify-center gap-2 transition-all active:scale-[0.97]"
                >
                    <span>{{ __('app.contact_send') }}</span>
                    <span class="material-symbols-outlined" style="font-size:1.1rem">send</span>
                </button>
            </form>
        </div>
    </section>

</main>

@endsection
