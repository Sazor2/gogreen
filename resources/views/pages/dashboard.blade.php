@extends('layouts.app')

@section('title', __('app.dashboard_title'))

@section('content')

{{-- Hero Section --}}
<header class="relative w-full overflow-hidden flex items-center" style="min-height:640px">
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image: url('{{ asset('images/begeron.jpeg') }}');">
    </div>
    {{-- Multi-layer gradient overlay --}}
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(2,44,34,0.55) 0%, rgba(6,37,28,0.38) 40%, rgba(1,20,15,0.18) 100%);"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent 50%, rgba(1,20,15,0.28) 80%, #f6f8f7 100%);"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 60% at 10% 50%, rgba(17,212,115,0.07) 0%, transparent 70%);"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-20 pb-28">
        <div class="max-w-2xl">
            <span class="inline-block px-3 py-1 border text-xs font-bold tracking-widest uppercase rounded-full mb-6"
                  style="background:rgba(255, 255, 255, 0.96);border-color:rgb(255, 255, 255);color:#11d473">
                {{ __('app.program_active') }}
            </span>
            <h1 class="text-5xl md:text-7xl font-black text-white leading-[1.1] mb-6 tracking-tight">
                {{ __('app.hero_title') }}<br>
                <span class="text-primary">{{ __('app.hero_school') }}</span>
            </h1>
            <p class="text-white/80 text-lg md:text-xl mb-10 leading-relaxed font-medium">
                {{ __('app.hero_desc') }} — <strong class="text-white/95">{{ __('app.hero_province') }}</strong>
            </p>
            <div class="flex flex-wrap gap-5">
                <a href="{{ url('/tanaman') }}"
                   class="bg-primary hover:bg-emerald-400 text-emerald-950 font-bold px-8 py-4 rounded-xl shadow-lg transition-all inline-flex items-center gap-2 hover:scale-[1.02]"
                   style="box-shadow:0 10px 25px rgba(17,212,115,0.3)">
                    {{ __('app.btn_lihat_tanaman') }}
                    <span class="material-symbols-outlined" style="font-size:1.2rem;line-height:1">trending_up</span>
                </a>
                <a href="{{ url('/kalkulator') }}"
                   class="glass-effect bg-white/10 hover:bg-white/20 text-white font-bold px-8 py-4 rounded-xl border border-white/20 transition-all inline-flex items-center gap-2 hover:scale-[1.02]">
                    {{ __('app.btn_hitung_poin') }}
                </a>
            </div>
        </div>
    </div>
</header>

{{-- Floating Stats Section --}}
<section class="max-w-7xl mx-auto px-4 relative z-10" style="margin-top:-3rem">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-emerald-50 group hover:-translate-y-1 transition-all" style="box-shadow:0 20px 40px rgba(16,33,25,0.07); background: linear-gradient(145deg, #ffffff 70%, #f7fdf9 100%)">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-50 rounded-xl text-primary">
                    <span class="material-symbols-outlined" style="font-size:1.875rem;line-height:1">co2</span>
                </div>
                <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded-full">+12.4%</span>
            </div>
            <h3 class="text-slate-500 text-sm font-semibold uppercase tracking-wider">{{ __('app.stat_co2') }}</h3>
            <p class="text-3xl font-black mt-1">1.28 <span class="text-lg font-normal">Tons</span></p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-emerald-50 group hover:-translate-y-1 transition-all" style="box-shadow:0 20px 40px rgba(16,33,25,0.07); background: linear-gradient(145deg, #ffffff 70%, #f7fdf9 100%)">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-50 rounded-xl text-primary">
                    <span class="material-symbols-outlined" style="font-size:1.875rem;line-height:1">forest</span>
                </div>
                <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded-full">+45 today</span>
            </div>
            <h3 class="text-slate-500 text-sm font-semibold uppercase tracking-wider">{{ __('app.stat_total_pohon') }}</h3>
            <p class="text-3xl font-black mt-1">1,450 <span class="text-lg font-normal">Trees</span></p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-emerald-50 group hover:-translate-y-1 transition-all" style="box-shadow:0 20px 40px rgba(16,33,25,0.07); background: linear-gradient(145deg, #ffffff 70%, #f7fdf9 100%)">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-50 rounded-xl text-primary">
                    <span class="material-symbols-outlined" style="font-size:1.875rem;line-height:1">recycling</span>
                </div>
                <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded-full">Target: 95%</span>
            </div>
            <h3 class="text-slate-500 text-sm font-semibold uppercase tracking-wider">{{ __('app.stat_poin') }}</h3>
            <p class="text-3xl font-black mt-1">88.5 <span class="text-lg font-normal">%</span></p>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-emerald-50 group hover:-translate-y-1 transition-all" style="box-shadow:0 20px 40px rgba(16,33,25,0.07); background: linear-gradient(145deg, #ffffff 70%, #f7fdf9 100%)">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-emerald-50 rounded-xl text-primary">
                    <span class="material-symbols-outlined" style="font-size:1.875rem;line-height:1">verified</span>
                </div>
                <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded-full">Platinum</span>
            </div>
            <h3 class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Eco Score</h3>
            <p class="text-3xl font-black mt-1">98/100</p>
        </div>

    </div>
</section>

{{-- Main Content Grid --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20" style="position:relative">
    {{-- Decorative gradient blobs --}}
    <div style="position:absolute; top:-80px; right:-120px; width:500px; height:500px; border-radius:50%; background: radial-gradient(circle, rgba(17,212,115,0.04) 0%, transparent 70%); pointer-events:none; z-index:0;"></div>
    <div style="position:absolute; bottom:0; left:-100px; width:400px; height:400px; border-radius:50%; background: radial-gradient(circle, rgba(6,148,162,0.03) 0%, transparent 70%); pointer-events:none; z-index:0;"></div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8" style="position:relative; z-index:1;">

        {{-- Left Column: Agenda (2/3) --}}
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-2xl border border-emerald-50 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-emerald-50 flex justify-between items-center">
                    <h2 class="text-xl font-bold flex items-center gap-2 text-slate-800">
                        <span class="material-symbols-outlined text-primary" style="font-size:1.3rem">calendar_today</span>
                        {{ __('app.agenda_title') }}
                    </h2>
                    <button class="text-primary text-sm font-bold hover:underline">{{ __('app.agenda_lihat_semua') }}</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead style="background: linear-gradient(90deg, rgba(240,253,248,0.8) 0%, rgba(236,253,245,0.6) 100%)">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('app.agenda_tanggal') }}</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('app.agenda_kegiatan') }}</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('app.agenda_koordinator') }}</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">{{ __('app.agenda_status') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-emerald-50">
                            @foreach([
                                ['tanggal' => '10 Mar 2026', 'kegiatan' => __('app.agenda_1'), 'koord' => __('app.agenda_koord_tim'),   'status' => __('app.status_mendatang'), 'badge' => 'bg-blue-100 text-blue-700',        'glow' => 'box-shadow:0 0 8px rgba(59,130,246,0.2)'],
                                ['tanggal' => '15 Mar 2026', 'kegiatan' => __('app.agenda_2'), 'koord' => __('app.agenda_koord_kelas_xi'), 'status' => __('app.status_mendatang'), 'badge' => 'bg-blue-100 text-blue-700',        'glow' => 'box-shadow:0 0 8px rgba(59,130,246,0.2)'],
                                ['tanggal' => '20 Feb 2026', 'kegiatan' => __('app.agenda_3'), 'koord' => __('app.agenda_koord_osis'),  'status' => __('app.status_selesai'),   'badge' => 'bg-emerald-100 text-emerald-700',  'glow' => 'box-shadow:0 0 8px rgba(17,212,115,0.2)'],
                                ['tanggal' => '05 Feb 2026', 'kegiatan' => __('app.agenda_4'), 'koord' => __('app.agenda_koord_semua'), 'status' => __('app.status_selesai'),   'badge' => 'bg-emerald-100 text-emerald-700',  'glow' => 'box-shadow:0 0 8px rgba(17,212,115,0.2)'],
                                ['tanggal' => '20 Jan 2026', 'kegiatan' => __('app.agenda_5'), 'koord' => __('app.agenda_koord_guru'),  'status' => __('app.status_selesai'),   'badge' => 'bg-emerald-100 text-emerald-700',  'glow' => 'box-shadow:0 0 8px rgba(17,212,115,0.2)'],
                            ] as $item)
                            <tr class="hover:bg-emerald-50/30 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-slate-500 whitespace-nowrap">{{ $item['tanggal'] }}</td>
                                <td class="px-6 py-4 text-sm font-bold text-slate-800">{{ $item['kegiatan'] }}</td>
                                <td class="px-6 py-4 text-sm text-slate-600">{{ $item['koord'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold {{ $item['badge'] }}"
                                          style="{{ $item['glow'] }}">
                                        {{ strtoupper($item['status']) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Right Column: Profil & Motto (1/3) --}}
        <div class="space-y-8">

            {{-- Profil Sekolah --}}
            <div class="rounded-2xl border border-emerald-50 shadow-sm p-6" style="background: linear-gradient(145deg, #ffffff 0%, #f7fdf9 100%);">
                <h2 class="text-xl font-bold flex items-center gap-2 mb-6">
                    <span class="material-symbols-outlined text-primary" style="font-size:1.3rem">school</span>
                    {{ __('app.profil_title') }}
                </h2>
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">location_on</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase tracking-widest">{{ __('app.profil_lokasi') }}</p>
                            <p class="text-sm font-semibold">{{ __('app.profil_lokasi_sub') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">stars</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase tracking-widest">{{ __('app.profil_program') }}</p>
                            <p class="text-sm font-semibold">{{ __('app.profil_program_sub') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary">group</span>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase tracking-widest">{{ __('app.profil_nama') }}</p>
                            <p class="text-sm font-semibold">{{ __('app.profil_jenis') }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/profil-sekolah') }}"
                   class="w-full mt-8 block text-center bg-slate-50 border border-emerald-50 text-slate-600 py-3 rounded-xl font-bold hover:bg-emerald-50 transition-colors text-sm">
                    {{ __('app.profil_visi') }}
                </a>
            </div>

            {{-- Motto Card --}}
            <div class="relative rounded-2xl overflow-hidden p-8 shadow-2xl shadow-emerald-500/20">
                <div class="absolute inset-0" style="background: linear-gradient(135deg, #11d473 0%, #059669 35%, #065f46 70%, #022c22 100%);"></div>
                <div class="absolute inset-0 opacity-20"
                     style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuA9qKl8YQhWqC8lp3JYJg4YUsYzTef_OdJKiu4ZfwgrHCf5AGKJAquFeZt6MSEMSITTN35tabgMHutEQaM-ZEkvpRtMq8P6BxKAQ-MEii5UThM9k40bbg9qj6npM-Hr4zRiPMHmeynuuhJEEZd9vnLdhGz-h3zj1CHCQZtjx0ntYn7HmA2dTLyd_5jwRgNfd13qlwRHVbh1ZjrrDhptWVEk3DnBDxNzTeDZAwWEq6zD_64LwesGbCtnNpdJcJgYn8kcGKna7-Dhzro');"></div>
                <div class="relative z-10 text-white">
                    <span class="material-symbols-outlined mb-4 block opacity-50" style="font-size:2.5rem;font-variation-settings:'FILL' 1">format_quote</span>
                    <p class="text-2xl font-serif italic font-medium leading-relaxed mb-6">
                        "{{ __('app.motto_line1') }} {{ __('app.motto_line2') }}"
                    </p>
                    <div class="flex items-center gap-2">
                        <div class="h-0.5 w-8 bg-white/50"></div>
                        <span class="text-xs font-bold uppercase tracking-[0.2em] opacity-80">{{ __('app.motto_label') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection
