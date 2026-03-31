@extends('layouts.app')

@section('title', __('app.kalkulator_title'))

@section('content')

@php
$jenisConfig = [
    'plastik'    => ['label' => __('app.jenis_plastik'),    'icon' => 'shopping_bag',           'poin' => 50,  'color' => '#3b82f6'],
    'kertas'     => ['label' => __('app.jenis_kertas'),     'icon' => 'news',                   'poin' => 30,  'color' => '#f59e0b'],
    'logam'      => ['label' => __('app.jenis_logam'),      'icon' => 'kitchen',                'poin' => 80,  'color' => '#6b7280'],
    'kaca'       => ['label' => __('app.jenis_kaca'),       'icon' => 'wine_bar',               'poin' => 40,  'color' => '#06b6d4'],
    'organik'    => ['label' => __('app.jenis_organik'),    'icon' => 'compost',                'poin' => 20,  'color' => '#10b981'],
    'elektronik' => ['label' => __('app.jenis_elektronik'), 'icon' => 'battery_charging_full',  'poin' => 100, 'color' => '#8b5cf6'],
];
$hasilMap = [];
if (isset($hasil)) {
    foreach ($hasil['detail'] as $d) {
        $hasilMap[$d['jenis']] = $d;
    }
}

$initialDailyTotal = 0;
foreach (array_keys($jenisConfig) as $jenisKey) {
    $beratValue = $hasilMap[$jenisKey]['berat'] ?? old('items.' . $jenisKey);
    if ($beratValue !== null && is_numeric($beratValue) && (float) $beratValue > 0) {
        $initialDailyTotal += (float) $beratValue;
    }
}

$initialDays = min(365, max(1, (int) old('jumlah_hari', request('jumlah_hari', 30))));
$initialDailyAverage = $initialDailyTotal / $initialDays;
$initialThirtyDays = $initialDailyAverage * 30;
$initialBottleEq = $initialThirtyDays / 0.02;
$initialProgressPct = $initialThirtyDays > 0 ? min(100, ($initialThirtyDays / 300) * 100) : 0;
@endphp

<style>
    @media (min-width: 1024px) {
        .lg-grid-kalkulator { grid-template-columns: 7fr 5fr !important; }
    }
    .waste-row { transition: background-color 0.2s ease, border-color 0.2s ease; cursor: pointer; }
    .waste-row:hover { background-color: #f0fdf4; }
    .waste-row.active { background-color: #ecfdf5 !important; }
    .weight-input { transition: border-color 0.15s ease, opacity 0.15s ease; }
    .weight-input:disabled { opacity: 0.35; cursor: not-allowed; }
    .weight-input:focus { border-color: #059669 !important; box-shadow: 0 0 0 3px rgba(252, 252, 252, 0.15); }
    .check-circle { transition: background-color 0.2s ease, border-color 0.2s ease; }
    .big-impact-glow { animation: bigImpactGlow 1.4s ease-in-out 1; }
    @keyframes bigImpactGlow {
        0% { box-shadow: 0 0 0 rgba(16,185,129,0); }
        30% { box-shadow: 0 0 0 8px rgba(16,185,129,0.20), 0 18px 40px rgba(6,78,59,0.15); }
        100% { box-shadow: 0 20px 40px rgba(16,33,25,0.07); }
    }
</style>

{{-- Hero Section --}}
<section class="relative overflow-hidden flex items-center justify-center text-center text-white" style="min-height:380px; background-image: linear-gradient(rgba(6,78,59,0.85), rgba(6,78,59,0.95)), url('https://lh3.googleusercontent.com/aida-public/AB6AXuCmV1w1rWACjn3LP-TUCicQH2JDhg99b-gNEkwVNgNxGcSlMXbJWLPkaB3JyuAbf7xI4uNHFeD-PIM0guy0Xtql5iq2WFyXNfK1J7fTtoEtIgkwubJcQsoELVlQu6__pBbMtkMS4y76gm7rXCO800Y7EfvLIIycXKw_4Q1uZg_AOE-sCO6Sav5sNdGywsbOOUKmpumC6nUWpss064FjEm-tmnMdCRCG_pZ98eVaDFTTP99lhQcWStf8qzSVqaVzf5sszaCm49wvUocd'); background-size:cover; background-position:center;">
    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(2,44,34,0.55) 0%, rgba(6,37,28,0.38) 40%, rgba(1,20,15,0.18) 100%);"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to bottom, transparent 50%, rgba(1,20,15,0.28) 80%, #f6f8f7 100%);"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 60% at 50% 60%, rgba(17,212,115,0.07) 0%, transparent 70%);"></div>
    <div class="relative z-10 max-w-3xl mx-auto px-6">
        <span class="inline-block py-1 px-4 text-xs font-bold uppercase tracking-widest mb-4" style="background:rgba(17,212,115,0.2);border:1px solid rgba(17,212,115,0.3);color:#13ec92;border-radius:9999px;">
            {{ __('app.program_active') }}
        </span>
        <h2 class="text-4xl md:text-5xl font-black mb-6 tracking-tight">{{ __('app.kalkulator_title') }}</h2>
        <p class="text-lg leading-relaxed" style="color:rgba(236,253,245,0.8)">
            {{ __('app.hero_kalkulator_desc') }}
        </p>
    </div>
</section>
{{-- Main Content Grid --}}
<main id="kalkulator-section" class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8" style="padding-top:3rem;padding-bottom:5rem;margin-top:-2.5rem;position:relative;z-index:20;">
    <div style="display:grid;grid-template-columns:1fr;gap:2rem;" class="lg-grid-kalkulator">

        {{-- Left Column: Calculator Form --}}
        <div class="flex flex-col gap-8" style="min-width:0;">
            <div class="bg-white rounded-2xl border border-emerald-50 overflow-hidden" style="box-shadow:0 20px 40px rgba(16,33,25,0.07);">
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1,'wght' 400;color:#11d473;background:rgba(17,212,115,0.1);padding:8px;border-radius:8px;">calculate</span>
                        <h3 class="text-xl font-bold text-slate-900">{{ __('app.form_title') }}</h3>
                    </div>
                    <p class="text-sm mb-6" style="color:#94a3b8;margin-left:4px;">{{ __('app.form_types_hint') }}</p>
                    

                    <div id="kalkulator-errors">
                        @if($errors->has('kelas'))
                        <div class="mb-6 p-4 rounded-xl flex items-center gap-3" style="background-color:#fef2f2;border:1px solid #fecaca;">
                            <span class="material-symbols-outlined" style="color:#b91c1c;font-size:20px;">warning</span>
                            <p class="text-sm font-medium" style="color:#b91c1c;">{{ $errors->first('kelas') }}</p>
                        </div>
                        @endif
                        @if($errors->has('items'))
                        <div class="mb-6 p-4 rounded-xl flex items-center gap-3" style="background-color:#fef2f2;border:1px solid #fecaca;">
                            <span class="material-symbols-outlined" style="color:#b91c1c;font-size:20px;">warning</span>
                            <p class="text-sm font-medium" style="color:#b91c1c;">{{ $errors->first('items') }}</p>
                        </div>
                        @endif
                    </div>

                    <form id="waste-calculator-form" action="{{ url('/kalkulator') }}#kalkulator-section" method="POST" class="space-y-6">
                        @csrf

                        {{-- Class Input --}}
                        <div>
                            <label for="kelas" class="text-sm font-semibold text-slate-800 mb-2 block">
                                <span class="inline-flex items-center gap-1.5">
                                    <span class="material-symbols-outlined" style="font-size:18px;color:#059669;">school</span>
                                    Kelas
                                </span>
                            </label>
                            <input type="text"
                                   name="kelas"
                                   id="kelas"
                                   placeholder="Contoh: XI RPL 1"
                                   value="{{ old('kelas', request('kelas')) }}"
                                required
                                   class="w-full rounded-xl focus:outline-none"
                                   style="background-color:#f6f8f7;border:2px solid #e2e8f0;padding:12px 14px;font-size:14px;color:#1e293b;">
                        </div>
                        
                        {{-- Days Input --}}
                        <div>
                            <label for="jumlah_hari" class="text-sm font-semibold text-slate-800 mb-2 block">
                                <span class="inline-flex items-center gap-1.5">
                                    <span class="material-symbols-outlined" style="font-size:18px;color:#059669;">calendar_month</span>
                                    Jumlah Hari
                                </span>
                            </label>
                            <input type="number"
                                   name="jumlah_hari"
                                   id="jumlah_hari"
                                   min="1"
                                   max="365"
                                   step="1"
                                inputmode="numeric"
                                value="{{ $initialDays }}"
                                   class="w-full rounded-xl focus:outline-none"
                                   style="background-color:#f6f8f7;border:2px solid #e2e8f0;padding:12px 14px;font-size:14px;color:#1e293b;">
                        </div>
                        <p class="text-xs mb-6 -mt-4" style="color:#6b7280;margin-left:4px;">Masukkan total sampah yang dikumpulkan dalam beberapa hari. Contoh: 2 kg dalam 2 hari.</p>
                        
                        {{-- Waste Type Rows --}}
                        <div class="space-y-2">
                            @foreach($jenisConfig as $val => $info)
                            @php
                                $oldBerat    = old('items.' . $val);
                                $hasilBerat  = $hasilMap[$val]['berat'] ?? null;
                                $currentBerat = $hasilBerat ?? $oldBerat;
                                $isActive    = $currentBerat !== null && (float)$currentBerat > 0;
                            @endphp
                            <div id="row_{{ $val }}"
                                 class="waste-row flex items-center gap-3 p-4 rounded-xl border-2 {{ $isActive ? 'active' : '' }}"
                                 style="border-color:{{ $isActive ? '#a7f3d0' : '#f1f5f9' }};"
                                 onclick="toggleRow('{{ $val }}')">

                                <div class="flex-shrink-0 flex items-center justify-center rounded-xl"
                                     style="width:44px;height:44px;background-color:{{ $info['color'] }}18;">
                                    <span class="material-symbols-outlined"
                                          style="color:{{ $info['color'] }};font-size:22px;font-variation-settings:'FILL' 1,'wght' 400;">{{ $info['icon'] }}</span>
                                </div>

                                <label class="flex-1 cursor-pointer select-none" for="input_{{ $val }}">
                                    <p class="text-sm font-semibold text-slate-800">{{ $info['label'] }}</p>
                                    <p class="text-xs" style="color:#94a3b8;">{{ $info['poin'] }} {{ __('app.satuan_poin') }}/kg</p>
                                </label>

                                <div class="flex items-center gap-1.5 flex-shrink-0" onclick="event.stopPropagation()">
                                     <input type="text"
                                           name="items[{{ $val }}]"
                                           id="input_{{ $val }}"
                                         step="0.1" min="0" max="10000"
                                         inputmode="decimal"
                                         pattern="[0-9]+([\\.,][0-9]+)?"
                                           placeholder="0"
                                           value="{{ $currentBerat ?? '' }}"
                                           class="weight-input w-24 text-right focus:outline-none rounded-xl"
                                           style="background-color:#f6f8f7;border:2px solid transparent;padding:10px 12px;font-size:14px;color:#1e293b;"
                                           {{ $isActive ? '' : 'disabled' }}>
                                    <span class="text-xs font-bold" style="color:#94a3b8;">kg</span>
                                </div>

                                <div class="check-circle flex-shrink-0 flex items-center justify-center rounded-full border-2"
                                     id="check_{{ $val }}"
                                     style="width:24px;height:24px;{{ $isActive ? 'background-color:#059669;border-color:#059669;' : 'background-color:transparent;border-color:#e2e8f0;' }}">
                                    <span class="material-symbols-outlined"
                                          id="checkicon_{{ $val }}"
                                          style="font-size:14px;font-variation-settings:'FILL' 1,'wght' 700;color:white;display:{{ $isActive ? 'block' : 'none' }};">check</span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-4" style="padding-top:8px;">
                            <button type="submit" class="flex-1 flex items-center justify-center gap-2 font-bold transition-all" style="background-color:#11d473;color:#064e3b;padding:16px 24px;border-radius:12px;border:none;font-size:15px;box-shadow:0 10px 25px rgba(17,212,115,0.25);cursor:pointer;">
                                <span class="material-symbols-outlined" style="font-size:20px;font-variation-settings:'FILL' 1,'wght' 700;">analytics</span>
                                {{ __('app.form_hitung') }}
                            </button>
                            <a href="{{ url('/kalkulator') }}" class="flex items-center justify-center gap-2 font-bold transition-colors" style="background-color:#f1f5f9;color:#64748b;padding:16px 32px;border-radius:12px;text-decoration:none;font-size:15px;">
                                <span class="material-symbols-outlined" style="font-size:20px;">restart_alt</span>
                                {{ __('app.form_reset') }}
                            </a>
                        </div>
                    </form>

                    <div id="kalkulator-empty">
                        @unless(isset($hasil))
                        <div class="mt-10 p-8 text-center" style="background-color:#f8fafc;border:2px dashed #e2e8f0;border-radius:16px;">
                            <span class="material-symbols-outlined" style="font-size:42px;color:#22c55e;font-variation-settings:'FILL' 1,'wght' 500;">eco</span>
                            <p class="font-medium" style="color:#64748b;">{{ __('app.hasil_empty') }}</p>
                            <p class="text-sm mt-1" style="color:#94a3b8;">{{ __('app.hasil_empty_sub') }}</p>
                        </div>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
        {{-- Right Column: Reference & Rewards --}}
        <div class="flex flex-col gap-8" style="min-width:0;">

            {{-- Point Reference Table --}}
            <div class="bg-white rounded-2xl border border-emerald-50 overflow-hidden" style="box-shadow:0 20px 40px rgba(16,33,25,0.07);">
                <div class="p-6 flex items-center justify-between" style="background-color:rgba(236,253,245,0.5);border-bottom:1px solid rgba(6,78,59,0.05);">
                    <h3 class="font-bold flex items-center gap-2 text-slate-900">
                        <span class="material-symbols-outlined" style="color:#059669;font-variation-settings:'FILL' 1,'wght' 400;">list_alt</span>
                        {{ __('app.tabel_title') }}
                    </h3>
                    <span class="font-bold uppercase tracking-widest" style="font-size:10px;color:#059669;">{{ __('app.tabel_per_kg') }}</span>
                </div>
                <div>
                    @foreach([
                        ['jenis' => __('app.jenis_plastik'),    'poin' => 50,  'icon' => 'shopping_bag',          'kategori' => __('app.kategori_anorganik'), 'contoh' => __('app.contoh_plastik')],
                        ['jenis' => __('app.jenis_kertas'),     'poin' => 30,  'icon' => 'news',                  'kategori' => __('app.kategori_anorganik'), 'contoh' => __('app.contoh_kertas')],
                        ['jenis' => __('app.jenis_logam'),      'poin' => 80,  'icon' => 'kitchen',               'kategori' => __('app.kategori_anorganik'), 'contoh' => __('app.contoh_logam')],
                        ['jenis' => __('app.jenis_kaca'),       'poin' => 40,  'icon' => 'wine_bar',              'kategori' => __('app.kategori_anorganik'), 'contoh' => __('app.contoh_kaca')],
                        ['jenis' => __('app.jenis_organik'),    'poin' => 20,  'icon' => 'compost',               'kategori' => __('app.kategori_organik'),   'contoh' => __('app.contoh_organik')],
                        ['jenis' => __('app.jenis_elektronik'), 'poin' => 100, 'icon' => 'battery_charging_full', 'kategori' => __('app.kategori_b3'),        'contoh' => __('app.contoh_elektronik')],
                    ] as $row)
                    <div class="flex items-center justify-between p-4 transition-colors hover:bg-emerald-50/30" style="border-bottom:1px solid rgba(6,78,59,0.05);">
                        <div class="flex items-center gap-3">
                            <div class="flex items-center justify-center" style="width:40px;height:40px;border-radius:8px;background-color:#ecfdf5;color:#059669;">
                                <span class="material-symbols-outlined" style="font-size:20px;font-variation-settings:'FILL' 1,'wght' 400;">{{ $row['icon'] }}</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-900">{{ $row['jenis'] }}</p>
                                <p class="uppercase" style="font-size:10px;color:#94a3b8;">{{ $row['kategori'] }}</p>
                            </div>
                        </div>
                        <span class="font-black" style="color:#059669;">{{ $row['poin'] }} {{ __('app.satuan_poin') }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Reward Levels Card --}}
            <div class="bg-white rounded-2xl border border-emerald-50 p-6" style="box-shadow:0 20px 40px rgba(16,33,25,0.07);">
                <h3 class="font-bold flex items-center gap-2 text-slate-900 mb-6">
                    <span class="material-symbols-outlined" style="color:#f59e0b;font-variation-settings:'FILL' 1,'wght' 400;">military_tech</span>
                    {{ __('app.reward_title') }}
                </h3>
                <div class="space-y-4">
                    <div class="relative pb-4" style="padding-left:32px;border-left:2px solid #d1fae5;">
                        <div class="absolute" style="left:-8px;top:0;width:14px;height:14px;border-radius:50%;background-color:#059669;border:2px solid white;"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="font-bold text-sm text-slate-900">{{ __('app.reward_champion') }}</h6>
                                <p class="text-xs" style="color:#94a3b8;">{{ __('app.reward_champion_desc') }}</p>
                            </div>
                            <span class="text-xs font-bold px-2 py-1" style="background-color:#f1f5f9;border-radius:6px;">{{ __('app.reward_champion_range') }}</span>
                        </div>
                    </div>
                    <div class="relative pb-4" style="padding-left:32px;border-left:2px solid #d1fae5;">
                        <div class="absolute" style="left:-8px;top:0;width:14px;height:14px;border-radius:50%;background-color:#11d473;border:2px solid white;"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="font-bold text-sm text-slate-900">{{ __('app.reward_warrior') }}</h6>
                                <p class="text-xs" style="color:#94a3b8;">{{ __('app.reward_warrior_desc') }}</p>
                            </div>
                            <span class="text-xs font-bold px-2 py-1" style="background-color:#f1f5f9;border-radius:6px;">{{ __('app.reward_warrior_range') }}</span>
                        </div>
                    </div>
                    <div class="relative pb-4" style="padding-left:32px;border-left:2px solid #d1fae5;">
                        <div class="absolute" style="left:-8px;top:0;width:14px;height:14px;border-radius:50%;background-color:#6ee7b7;border:2px solid white;"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="font-bold text-sm text-slate-900">{{ __('app.reward_starter') }}</h6>
                                <p class="text-xs" style="color:#94a3b8;">{{ __('app.reward_starter_desc') }}</p>
                            </div>
                            <span class="text-xs font-bold px-2 py-1" style="background-color:#f1f5f9;border-radius:6px;">{{ __('app.reward_starter_range') }}</span>
                        </div>
                    </div>
                    <div class="relative" style="padding-left:32px;">
                        <div class="absolute" style="left:-8px;top:0;width:14px;height:14px;border-radius:50%;background-color:#cbd5e1;border:2px solid white;"></div>
                        <div class="flex items-center justify-between">
                            <div>
                                <h6 class="font-bold text-sm text-slate-900">{{ __('app.reward_keep') }}</h6>
                                <p class="text-xs" style="color:#94a3b8;">{{ __('app.reward_keep_desc') }}</p>
                            </div>
                            <span class="text-xs font-bold px-2 py-1" style="background-color:#f1f5f9;border-radius:6px;">{{ __('app.reward_keep_range') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- ===== RESULTS SECTION (full width, shows after calculation) ===== --}}
    <div
        id="kalkulator-results"
        data-chart-labels='@json(isset($hasil) ? array_column($hasil["detail"], "nama") : [])'
        data-chart-points='@json(isset($hasil) ? array_column($hasil["detail"], "poin") : [])'
        data-chart-percents='@json(isset($hasil) ? array_column($hasil["detail"], "persen") : [])'
        data-chart-colors='@json(isset($hasil) ? array_map(function ($d) use ($jenisConfig) {
            return $jenisConfig[$d["jenis"]]["color"];
        }, $hasil["detail"]) : [])'
    >
    @if(isset($hasil))
    @php
        $resultDays = min(365, max(1, (int) old('jumlah_hari', request('jumlah_hari', 30))));
        $resultThirtyDays = $hasil['total_berat'] * (30 / $resultDays);
        $resultProgressPct = min(100, ($resultThirtyDays / 300) * 100);
    @endphp
    <div class="rounded-2xl border p-4 sm:p-5" style="border-color:#bbf7d0;background:linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 55%, #dcfce7 100%);box-shadow:0 12px 28px rgba(6,78,59,0.10);">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <p class="text-xs font-black uppercase tracking-wider" style="color:#059669;">Estimasi Otomatis</p>
                <p class="text-sm font-semibold text-slate-700 mt-1">Perkiraan sampah selama 30 hari: <span id="thirty-days-estimate" class="font-black" style="color:#065f46;">{{ number_format($initialThirtyDays, 1, ',', '.') }} kg</span></p>
            </div>
            <div class="inline-flex items-center gap-1.5 rounded-full px-3 py-1.5" style="background-color:#ffffffcc;border:1px solid #a7f3d0;">
                <span class="material-symbols-outlined" style="font-size:16px;color:#059669;">monitoring</span>
                <span class="text-xs font-bold" style="color:#047857;">Rata-rata harian: <span id="daily-total-estimate">{{ number_format($initialDailyAverage, 1, ',', '.') }}</span> kg</span>
            </div>
        </div>

        <div class="mt-4">
            <div class="flex items-center justify-between text-xs font-semibold" style="color:#065f46;">
                <span class="inline-flex items-center gap-1"><span class="material-symbols-outlined" style="font-size:15px;">recycling</span> Kontribusi pengurangan sampah</span>
                <span id="contribution-percent">{{ number_format($initialProgressPct, 1, ',', '.') }}%</span>
            </div>
            <div class="mt-2 h-2.5 rounded-full overflow-hidden" style="background-color:#bbf7d0;">
                <div id="contribution-bar" class="h-full rounded-full" style="width:{{ $initialProgressPct }}%;background:linear-gradient(90deg,#10b981,#34d399,#4ade80);"></div>
            </div>
            <p class="mt-2 text-xs" style="color:#047857;">Setara sekitar <span id="bottle-equivalent" class="font-bold">{{ number_format($initialBottleEq, 0, ',', '.') }}</span> botol plastik 500ml.</p>
        </div>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
            <div class="rounded-xl p-3" style="background-color:#ffffffc9;border:1px solid #c7f9dc;">
                <p class="text-xs font-black uppercase tracking-wider" style="color:#047857;">Preview Input</p>
                <p class="text-sm mt-1" style="color:#065f46;">Total inputmu <span id="input-preview-total" class="font-black">{{ number_format($initialDailyTotal, 1, ',', '.') }}</span> kg untuk <span id="input-preview-days" class="font-black">{{ $initialDays }}</span> hari (rata-rata <span id="input-preview-kg" class="font-black">{{ number_format($initialDailyAverage, 1, ',', '.') }}</span> kg/hari).</p>
            </div>
            <div class="rounded-xl p-3" style="background-color:#ffffffc9;border:1px solid #c7f9dc;">
                <p class="text-xs font-black uppercase tracking-wider inline-flex items-center gap-1" style="color:#047857;">
                    <span class="material-symbols-outlined" style="font-size:14px;">emoji_events</span>
                    Level Kamu
                </p>
                <p id="gamification-level" class="text-sm mt-1 font-black" style="color:#065f46;">{{ __('app.reward_keep') }}</p>
            </div>
        </div>

        <div class="mt-3 rounded-xl p-3" style="background-color:#ecfeff;border:1px solid #bae6fd;">
            <p class="text-xs font-black uppercase tracking-wider inline-flex items-center gap-1" style="color:#0f766e;">
                <span class="material-symbols-outlined" style="font-size:14px;">eco</span>
                Panel Dampak Lingkungan
            </p>
            <p id="impact-message" class="text-sm mt-1 font-semibold" style="color:#0f766e;">Kamu menyelamatkan 0 botol plastik dan dampakmu setara menanam 0 pohon.</p>
        </div>
    </div>
    <div id="hasil-highlight-card" class="mt-8 rounded-2xl border border-emerald-100 p-5 sm:p-6" style="background:linear-gradient(130deg,#ecfdf5 0%,#ffffff 48%,#f0fdf4 100%);box-shadow:0 18px 38px rgba(6,78,59,0.10);" data-total-input="{{ $hasil['total_berat'] }}">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="rounded-xl p-4" style="background-color:#ffffffd6;border:1px solid #d1fae5;">
                <p class="text-xs font-black uppercase tracking-wider inline-flex items-center gap-1" style="color:#059669;">
                    <span class="material-symbols-outlined" style="font-size:15px;">monitoring</span>
                    Estimasi 30 Hari
                </p>
                <p class="text-sm font-semibold text-slate-700 mt-2">Perkiraan sampah selama 30 hari</p>
                <p id="result-total-kg" class="text-2xl font-black mt-1" style="color:#065f46;">{{ number_format($resultThirtyDays, 1, ',', '.') }} kg</p>
            </div>
            <div class="rounded-xl p-4" style="background-color:#ffffffd6;border:1px solid #d1fae5;">
                <p class="text-xs font-black uppercase tracking-wider inline-flex items-center gap-1" style="color:#059669;">
                    <span class="material-symbols-outlined" style="font-size:15px;">recycling</span>
                    Kontribusi
                </p>
                <p class="text-sm font-semibold text-slate-700 mt-2">Kontribusi kamu terhadap pengurangan sampah</p>
                <div class="mt-2 h-2.5 rounded-full overflow-hidden" style="background-color:#bbf7d0;">
                    <div id="result-progress-bar" class="h-full rounded-full" style="width:{{ $resultProgressPct }}%;background:linear-gradient(90deg,#10b981,#34d399,#4ade80);"></div>
                </div>
                <p id="result-progress-text" class="text-xs mt-2 font-bold" style="color:#047857;">{{ number_format($resultProgressPct, 1, ',', '.') }}% dari target 300 kg</p>
            </div>
            <div class="rounded-xl p-4" style="background-color:#ffffffd6;border:1px solid #d1fae5;">
                <p class="text-xs font-black uppercase tracking-wider inline-flex items-center gap-1" style="color:#059669;">
                    <span class="material-symbols-outlined" style="font-size:15px;">eco</span>
                    Dampak Setara
                </p>
                <p class="text-sm font-semibold text-slate-700 mt-2">Setara dengan</p>
                <p id="result-bottle-value" class="text-2xl font-black mt-1" style="color:#065f46;">{{ number_format($resultThirtyDays / 0.02, 0, ',', '.') }}</p>
                <p class="text-xs mt-1" style="color:#047857;">botol plastik 500ml</p>
                @if(request()->filled('kelas'))
                    <span class="inline-flex items-center gap-1 mt-2 rounded-full px-2.5 py-1 text-xs font-bold" style="background-color:#dcfce7;color:#065f46;">
                        <span class="material-symbols-outlined" style="font-size:14px;">school</span>
                        {{ request('kelas') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- Left: Summary + Breakdown per Type --}}
        <div class="bg-white rounded-2xl border border-emerald-50 p-6" style="box-shadow:0 20px 40px rgba(16,33,25,0.07);">

            {{-- Total summary --}}
            <div class="flex items-center gap-5 p-5 rounded-2xl mb-6" style="background-color:#ecfdf5;border:2px dashed #a7f3d0;">
                <div class="flex-shrink-0 flex items-center justify-center rounded-full"
                     style="width:80px;height:80px;background-color:#11d473;box-shadow:0 8px 24px rgba(17,212,115,0.3);">
                    <div class="text-center">
                        <span class="block font-black" style="color:#064e3b;line-height:1.15;font-size:clamp(14px,3vw,20px);">{{ number_format($hasil['total_poin'], 0, ',', '.') }}</span>
                        <span class="block text-xs font-black uppercase" style="color:#065f46;letter-spacing:-0.02em;">{{ __('app.hasil_poin') }}</span>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <span class="inline-flex items-center gap-1 text-white font-bold uppercase mb-1"
                          style="font-size:10px;background-color:#059669;padding:2px 10px;border-radius:9999px;">
                        <span class="material-symbols-outlined" style="font-size:12px;font-variation-settings:'FILL' 1,'wght' 700;">workspace_premium</span>
                        {{ $hasil['kategori'] }}
                    </span>
                    <h4 class="text-lg font-extrabold" style="color:#064e3b;">{{ __('app.hasil_luar_biasa') }}</h4>
                    <p class="text-sm" style="color:#047857;">
                        {{ number_format($hasil['total_berat'], 1, ',', '.') }} kg
                        &middot; {{ count($hasil['detail']) }} {{ __('app.hasil_jenis_terpilih') }}
                        &middot; {{ number_format($hasil['total_poin'], 0, ',', '.') }} {{ __('app.satuan_poin') }}
                    </p>
                </div>
            </div>

            {{-- Breakdown table --}}
            <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined" style="color:#059669;font-size:18px;font-variation-settings:'FILL' 1,'wght' 400;">bar_chart</span>
                {{ __('app.hasil_breakdown') }}
            </h4>
            <div class="space-y-4">
                @foreach($hasil['detail'] as $item)
                @php $color = $jenisConfig[$item['jenis']]['color']; @endphp
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <div class="flex items-center gap-2">
                            <span class="inline-block w-2.5 h-2.5 rounded-full flex-shrink-0" style="background-color:{{ $color }};"></span>
                            <span class="text-sm font-semibold text-slate-700">{{ $item['nama'] }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-right">
                            <span class="text-xs text-slate-400">{{ number_format($item['berat'], 1, ',', '.') }} kg</span>
                            <span class="text-sm font-bold tabular-nums" style="color:{{ $color }};">{{ number_format($item['poin'], 0, ',', '.') }} {{ __('app.satuan_poin') }}</span>
                            <span class="text-sm font-black tabular-nums w-12 text-right" style="color:{{ $color }};">{{ $item['persen'] }}%</span>
                        </div>
                    </div>
                    <div class="h-2.5 rounded-full overflow-hidden" style="background-color:#f1f5f9;">
                        <div class="h-full rounded-full" style="width:{{ $item['persen'] }}%;background-color:{{ $color }};"></div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Total row --}}
            <div class="mt-5 pt-4 flex items-center justify-between" style="border-top:2px solid #e2e8f0;">
                <span class="text-sm font-black text-slate-600 uppercase tracking-wide">{{ __('app.hasil_total_poin') }}</span>
                <span class="text-xl font-black" style="color:#059669;">{{ number_format($hasil['total_poin'], 0, ',', '.') }} {{ __('app.satuan_poin') }}</span>
            </div>

            <div class="mt-4 p-3 rounded-xl text-center" style="background-color:#f8fafc;">
                <p class="text-xs" style="color:#6b7280;">{{ __('app.hasil_catatan') }}</p>
            </div>
        </div>

        {{-- Right: Doughnut Chart --}}
        <div class="bg-white rounded-2xl border border-emerald-50 p-6 flex flex-col" style="box-shadow:0 20px 40px rgba(16,33,25,0.07);">
            <h4 class="font-bold text-slate-900 mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined" style="color:#059669;font-size:18px;font-variation-settings:'FILL' 1,'wght' 400;">pie_chart</span>
                {{ __('app.hasil_diagram') }}
            </h4>

            <div class="flex-1 flex items-center justify-center">
                <div style="position:relative;width:100%;max-width:280px;">
                    <canvas id="wasteChart"></canvas>
                    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center;pointer-events:none;">
                        <p class="font-black" style="color:#059669;line-height:1.1;font-size:clamp(14px,3vw,22px);">{{ number_format($hasil['total_poin'], 0, ',', '.') }}</p>
                        <p class="text-xs font-bold uppercase" style="color:#94a3b8;letter-spacing:0.05em;">{{ __('app.satuan_poin') }}</p>
                    </div>
                </div>
            </div>

            {{-- Custom legend --}}
            <div class="mt-6 grid grid-cols-2 gap-2">
                @foreach($hasil['detail'] as $item)
                @php $color = $jenisConfig[$item['jenis']]['color']; @endphp
                <div class="flex items-center gap-2 p-2.5 rounded-xl" style="background-color:{{ $color }}12;">
                    <span class="inline-block w-3 h-3 rounded-sm flex-shrink-0" style="background-color:{{ $color }};"></span>
                    <div class="min-w-0">
                        <p class="text-xs font-semibold text-slate-700 truncate">{{ $item['nama'] }}</p>
                        <p class="text-xs font-black" style="color:{{ $color }};">{{ $item['persen'] }}%</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    @endif
    </div>

</main>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
window.renderKalkulatorChart = function () {
    const resultsEl = document.getElementById('kalkulator-results');
    const ctx = document.getElementById('wasteChart');
    if (!resultsEl || !ctx || typeof Chart === 'undefined') return;

    let labels = [];
    let data = [];
    let colors = [];
    let percents = [];

    try {
        labels = JSON.parse(resultsEl.dataset.chartLabels || '[]');
        data = JSON.parse(resultsEl.dataset.chartPoints || '[]');
        colors = JSON.parse(resultsEl.dataset.chartColors || '[]');
        percents = JSON.parse(resultsEl.dataset.chartPercents || '[]');
    } catch (e) {
        return;
    }

    if (!labels.length || !data.length) return;

    if (window.kalkulatorChart) {
        window.kalkulatorChart.destroy();
    }

    window.kalkulatorChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data:            data,
                backgroundColor: colors,
                borderColor:     '#ffffff',
                borderWidth:     3,
                hoverOffset:     10,
            }]
        },
        options: {
            responsive: true,
            cutout: '65%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function (ctx) {
                            const poin = ctx.raw.toLocaleString('id-ID');
                            const pct  = percents[ctx.dataIndex];
                            return `  ${poin} poin  (${pct}%)`;
                        }
                    }
                }
            }
        }
    });
};

function toggleRow(jenis) {
    const input     = document.getElementById('input_' + jenis);
    const row       = document.getElementById('row_' + jenis);
    const check     = document.getElementById('check_' + jenis);
    const checkIcon = document.getElementById('checkicon_' + jenis);
    const willActivate = input.disabled;

    if (willActivate) {
        input.disabled               = false;
        row.style.borderColor        = '#a7f3d0';
        row.style.backgroundColor    = '#ecfdf5';
        check.style.backgroundColor  = '#059669';
        check.style.borderColor      = '#059669';
        checkIcon.style.display      = 'block';
        input.focus();
    } else {
        input.disabled               = true;
        input.value                  = '';
        row.style.borderColor        = '#f1f5f9';
        row.style.backgroundColor    = '';
        check.style.backgroundColor  = 'transparent';
        check.style.borderColor      = '#e2e8f0';
        checkIcon.style.display      = 'none';
    }

    if (typeof window.updateWasteEstimate === 'function') {
        window.updateWasteEstimate();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('waste-calculator-form');
    const section = document.getElementById('kalkulator-section');
    let resultsContainer = document.getElementById('kalkulator-results');
    let errorsContainer = document.getElementById('kalkulator-errors');
    let emptyContainer = document.getElementById('kalkulator-empty');
    const daysInput = document.getElementById('jumlah_hari');
    const thirtyDaysEl = document.getElementById('thirty-days-estimate');
    const dailyEl = document.getElementById('daily-total-estimate');
    const progressEl = document.getElementById('contribution-percent');
    const progressBarEl = document.getElementById('contribution-bar');
    const bottleEqEl = document.getElementById('bottle-equivalent');
    const daysLabelEl = document.getElementById('selected-days-label');
    const previewTotalEl = document.getElementById('input-preview-total');
    const previewDaysEl = document.getElementById('input-preview-days');
    const previewKgEl = document.getElementById('input-preview-kg');
    const levelEl = document.getElementById('gamification-level');
    const impactMessageEl = document.getElementById('impact-message');
    let resultCard = null;
    let resultTotalKgEl = null;
    let resultBottleValueEl = null;
    let resultProgressBarEl = null;
    let resultProgressTextEl = null;
    const rewardLabelChampion = @json(__('app.reward_champion'));
    const rewardLabelWarrior = @json(__('app.reward_warrior'));
    const rewardLabelStarter = @json(__('app.reward_starter'));
    const rewardLabelKeep = @json(__('app.reward_keep'));

    const refreshResultElements = function () {
        resultCard = document.getElementById('hasil-highlight-card');
        resultTotalKgEl = document.getElementById('result-total-kg');
        resultBottleValueEl = document.getElementById('result-bottle-value');
        resultProgressBarEl = document.getElementById('result-progress-bar');
        resultProgressTextEl = document.getElementById('result-progress-text');
    };

    refreshResultElements();

    const formatNumber = function (value, digit) {
        return Number(value).toLocaleString('id-ID', {
            minimumFractionDigits: digit,
            maximumFractionDigits: digit,
        });
    };

    const animateNumber = function (el, target, digit, suffix) {
        if (!el) return;

        const safeTarget = Number.isFinite(target) ? target : 0;
        const start = Number(el.getAttribute('data-current-number') || 0);
        const duration = 450;
        const startTime = performance.now();

        const frame = function (now) {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const value = start + (safeTarget - start) * eased;
            el.textContent = formatNumber(value, digit) + (suffix || '');

            if (progress < 1) {
                requestAnimationFrame(frame);
            } else {
                el.setAttribute('data-current-number', String(safeTarget));
            }
        };

        requestAnimationFrame(frame);
    };

    const getSelectedDays = function () {
        const daysRaw = daysInput ? parseInt(daysInput.value || '30', 10) : 30;
        if (Number.isNaN(daysRaw) || daysRaw < 1) return 30;
        return Math.min(daysRaw, 365);
    };

    const normalizeDaysInput = function () {
        if (!daysInput) return 30;

        const parsed = parseInt(daysInput.value || '30', 10);
        const clamped = Number.isNaN(parsed) ? 30 : Math.min(365, Math.max(1, parsed));
        daysInput.value = String(clamped);
        return clamped;
    };

    const sanitizeWeightInputValue = function (rawValue) {
        let clean = String(rawValue || '').replace(',', '.').replace(/[^0-9.]/g, '');
        const firstDot = clean.indexOf('.');

        if (firstDot !== -1) {
            clean = clean.slice(0, firstDot + 1) + clean.slice(firstDot + 1).replace(/\./g, '');
        }

        if (clean.startsWith('.')) {
            clean = '0' + clean;
        }

        const parsed = parseFloat(clean);
        if (!Number.isNaN(parsed) && parsed > 10000) {
            return '10000';
        }

        return clean;
    };

    const updateImpactPanels = function (projected30Kg, bottleEq) {
        const treeEq = Math.max(0, Math.floor(projected30Kg / 60));

        if (impactMessageEl) {
            impactMessageEl.textContent = 'Kamu menyelamatkan ' + formatNumber(bottleEq, 0) + ' botol plastik dan dampakmu setara menanam ' + formatNumber(treeEq, 0) + ' pohon.';
        }

        if (levelEl) {
            if (projected30Kg >= 150) {
                levelEl.textContent = rewardLabelChampion;
            } else if (projected30Kg >= 60) {
                levelEl.textContent = rewardLabelWarrior;
            } else if (projected30Kg >= 20) {
                levelEl.textContent = rewardLabelStarter;
            } else {
                levelEl.textContent = rewardLabelKeep;
            }
        }
    };

    const applyBigResultEffect = function (totalKg) {
        if (!resultCard) return;
        if (totalKg >= 120) {
            resultCard.classList.remove('big-impact-glow');
            void resultCard.offsetWidth;
            resultCard.classList.add('big-impact-glow');
        }
    };

    window.updateWasteEstimate = function () {
        const weightInputs = document.querySelectorAll('.weight-input');
        const days = getSelectedDays();
        let totalInput = 0;

        weightInputs.forEach(function (input) {
            if (!input.disabled) {
                const value = parseFloat(input.value || '0');
                if (!Number.isNaN(value) && value > 0) {
                    totalInput += value;
                }
            }
        });

        const dailyAverage = totalInput / days;
        const total30Days = dailyAverage * 30;
        const progressPct = total30Days > 0 ? Math.min(100, (total30Days / 300) * 100) : 0;
        const bottleEq = total30Days / 0.02;

        if (daysLabelEl) daysLabelEl.textContent = String(days);
        if (previewDaysEl) previewDaysEl.textContent = String(days);
        if (previewTotalEl) animateNumber(previewTotalEl, totalInput, 1, '');
        if (dailyEl) animateNumber(dailyEl, dailyAverage, 1, '');
        if (previewKgEl) animateNumber(previewKgEl, dailyAverage, 1, '');
        if (thirtyDaysEl) animateNumber(thirtyDaysEl, total30Days, 1, ' kg');
        if (progressEl) animateNumber(progressEl, progressPct, 1, '%');
        if (progressBarEl) progressBarEl.style.width = progressPct + '%';
        if (bottleEqEl) animateNumber(bottleEqEl, bottleEq, 0, '');

        updateImpactPanels(total30Days, bottleEq);

        if (resultCard) {
            if (resultTotalKgEl) animateNumber(resultTotalKgEl, total30Days, 1, ' kg');
            if (resultBottleValueEl) animateNumber(resultBottleValueEl, bottleEq, 0, '');
            if (resultProgressBarEl) resultProgressBarEl.style.width = progressPct + '%';
            if (resultProgressTextEl) {
                resultProgressTextEl.textContent = formatNumber(progressPct, 1) + '% dari target 300 kg';
            }
            applyBigResultEffect(total30Days);
        }
    };

    if (daysInput) {
        daysInput.addEventListener('input', function () {
            normalizeDaysInput();
            window.updateWasteEstimate();
        });
        daysInput.addEventListener('change', function () {
            normalizeDaysInput();
            window.updateWasteEstimate();
        });
        daysInput.addEventListener('blur', function () {
            normalizeDaysInput();
            window.updateWasteEstimate();
        });
    }

    document.querySelectorAll('.weight-input').forEach(function (input) {
        input.addEventListener('keydown', function (e) {
            if (e.key === 'e' || e.key === 'E' || e.key === '+' || e.key === '-') {
                e.preventDefault();
            }
        });

        input.addEventListener('input', function () {
            this.value = sanitizeWeightInputValue(this.value);
            window.updateWasteEstimate();
        });

        input.addEventListener('blur', function () {
            this.value = sanitizeWeightInputValue(this.value);
        });
    });

    window.updateWasteEstimate();
    window.renderKalkulatorChart();

    if (window.location.hash === '#kalkulator-section' && section) {
        requestAnimationFrame(function () {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    }

    const replaceSection = function (currentEl, nextEl) {
        if (!nextEl) return currentEl;
        if (currentEl) {
            currentEl.replaceWith(nextEl);
        }
        return nextEl;
    };

    if (form) {
        form.addEventListener('submit', async function (event) {
            normalizeDaysInput();
            document.querySelectorAll('.weight-input').forEach(function (input) {
                input.value = sanitizeWeightInputValue(input.value);
            });

            if (section && !window.location.hash) {
                history.replaceState(null, '', window.location.pathname + window.location.search + '#kalkulator-section');
            }

            if (!window.fetch || !window.DOMParser) {
                return;
            }

            event.preventDefault();

            try {
                const requestUrl = form.action.split('#')[0];
                const formData = new FormData(form);
                const response = await fetch(requestUrl, {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'text/html',
                    },
                });

                const html = await response.text();
                const doc = new DOMParser().parseFromString(html, 'text/html');
                const nextResults = doc.getElementById('kalkulator-results');
                const nextErrors = doc.getElementById('kalkulator-errors');
                const nextEmpty = doc.getElementById('kalkulator-empty');

                if (nextResults) {
                    resultsContainer = replaceSection(resultsContainer, nextResults);
                }
                if (nextErrors) {
                    errorsContainer = replaceSection(errorsContainer, nextErrors);
                }
                if (nextEmpty) {
                    emptyContainer = replaceSection(emptyContainer, nextEmpty);
                }

                refreshResultElements();
                window.updateWasteEstimate();
                window.renderKalkulatorChart();
            } catch (error) {
                form.submit();
            }
        });
    }
});
</script>
@endpush