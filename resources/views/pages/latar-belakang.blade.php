@extends('layouts.app')

@section('title', __('app.latar_title'))

@section('content')

{{-- Hero --}}
<div class="bg-gradient-to-br from-green-700 via-green-600 to-emerald-500 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-20">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-green-500/40 rounded-full px-4 py-1 text-sm mb-4">
                <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>
                Green School Tracker
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                📋 {{ __('app.latar_title') }}
            </h1>
            <p class="mt-3 text-green-100 text-lg max-w-2xl mx-auto">
                {{ __('app.latar_subtitle') }}
            </p>
        </div>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">

    {{-- Pendahuluan --}}
    <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden reveal-on-scroll">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-green-100">
            <h2 class="text-xl font-bold text-green-800">🌍 {{ __('app.latar_intro_title') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <p class="text-gray-600 leading-relaxed text-lg">
                {{ __('app.latar_intro') }}
            </p>
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="text-center p-4 rounded-xl bg-red-50 border border-red-100">
                    <div class="text-3xl mb-2">🌡️</div>
                    <div class="font-bold text-red-700 text-lg">+1.5°C</div>
                    <div class="text-xs text-red-600 mt-1">{{ __('app.latar_suhu') }}</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-orange-50 border border-orange-100">
                    <div class="text-3xl mb-2">🌲</div>
                    <div class="font-bold text-orange-700 text-lg">27%</div>
                    <div class="text-xs text-orange-600 mt-1">{{ __('app.latar_deforestasi') }}</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-yellow-50 border border-yellow-100">
                    <div class="text-3xl mb-2">🗑️</div>
                    <div class="font-bold text-yellow-700 text-lg">67,8 jt ton</div>
                    <div class="text-xs text-yellow-600 mt-1">{{ __('app.latar_sampah') }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Identifikasi Masalah --}}
    <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden reveal-on-scroll">
        <div class="bg-gradient-to-r from-red-50 to-orange-50 px-6 py-4 border-b border-red-100">
            <h2 class="text-xl font-bold text-red-800">⚠️ {{ __('app.latar_masalah_title') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach([
                    ['title' => __('app.latar_m1_title'), 'desc' => __('app.latar_m1_desc'), 'icon' => '🌳', 'color' => 'border-l-4 border-red-400 bg-red-50'],
                    ['title' => __('app.latar_m2_title'), 'desc' => __('app.latar_m2_desc'), 'icon' => '🗑️', 'color' => 'border-l-4 border-orange-400 bg-orange-50'],
                    ['title' => __('app.latar_m3_title'), 'desc' => __('app.latar_m3_desc'), 'icon' => '🙈', 'color' => 'border-l-4 border-yellow-400 bg-yellow-50'],
                    ['title' => __('app.latar_m4_title'), 'desc' => __('app.latar_m4_desc'), 'icon' => '📵', 'color' => 'border-l-4 border-rose-400 bg-rose-50'],
                ] as $i => $m)
                <div class="{{ $m['color'] }} rounded-r-xl p-5">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-2xl">{{ $m['icon'] }}</span>
                        <div>
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ __('app.latar_masalah_label') }} {{ $i + 1 }}</span>
                            <h3 class="font-bold text-gray-800 text-base">{{ $m['title'] }}</h3>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $m['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Solusi --}}
    <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden reveal-on-scroll">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-green-100">
            <h2 class="text-xl font-bold text-green-800">💡 {{ __('app.latar_solusi_title') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach([
                    ['text' => __('app.latar_s1'), 'icon' => '🌿'],
                    ['text' => __('app.latar_s2'), 'icon' => '♻️'],
                    ['text' => __('app.latar_s3'), 'icon' => '📊'],
                    ['text' => __('app.latar_s4'), 'icon' => '📚'],
                ] as $s)
                <div class="flex items-start gap-4 p-4 rounded-xl border border-green-100 bg-green-50 hover:border-green-300 transition-colors">
                    <span class="text-2xl flex-shrink-0">{{ $s['icon'] }}</span>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $s['text'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Tujuan Proyek --}}
    <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden reveal-on-scroll">
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-blue-100">
            <h2 class="text-xl font-bold text-blue-800">🎯 {{ __('app.latar_tujuan_title') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <ol class="space-y-4">
                @foreach([
                    __('app.latar_t1'),
                    __('app.latar_t2'),
                    __('app.latar_t3'),
                    __('app.latar_t4'),
                ] as $i => $t)
                <li class="flex items-start gap-4">
                    <span class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 text-white text-sm font-bold flex items-center justify-center">
                        {{ $i + 1 }}
                    </span>
                    <p class="text-gray-700 mt-1">{{ $t }}</p>
                </li>
                @endforeach
            </ol>
        </div>
    </div>

    {{-- Dasar Pemikiran --}}
    <div class="bg-gradient-to-br from-green-700 to-emerald-600 text-white rounded-2xl shadow-lg overflow-hidden reveal-on-scroll">
        <div class="px-6 py-4 border-b border-green-600">
            <h2 class="text-xl font-bold">📌 {{ __('app.latar_dasar_title') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <p class="text-green-100 leading-relaxed text-base">
                {{ __('app.latar_dasar_desc') }}
            </p>
            <div class="mt-6 flex flex-wrap gap-3">
                <span class="inline-flex items-center gap-2 bg-green-600/60 rounded-full px-4 py-1.5 text-sm font-medium">
                    🌿 Program Go Green 2026
                </span>
                <span class="inline-flex items-center gap-2 bg-green-600/60 rounded-full px-4 py-1.5 text-sm font-medium">
                    🏫 SMK Karya Bangsa Sintang
                </span>
                <span class="inline-flex items-center gap-2 bg-green-600/60 rounded-full px-4 py-1.5 text-sm font-medium">
                    📍 Kalimantan Barat
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
