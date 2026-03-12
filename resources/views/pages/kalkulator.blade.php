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
<main class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8" style="padding-top:3rem;padding-bottom:5rem;margin-top:-2.5rem;position:relative;z-index:20;">
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

                    @if($errors->has('items'))
                    <div class="mb-6 p-4 rounded-xl flex items-center gap-3" style="background-color:#fef2f2;border:1px solid #fecaca;">
                        <span class="material-symbols-outlined" style="color:#b91c1c;font-size:20px;">warning</span>
                        <p class="text-sm font-medium" style="color:#b91c1c;">{{ $errors->first('items') }}</p>
                    </div>
                    @endif

                    <form action="{{ url('/kalkulator') }}" method="POST" class="space-y-6">
                        @csrf

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
                                    <input type="number"
                                           name="items[{{ $val }}]"
                                           id="input_{{ $val }}"
                                           step="0.1" min="0" max="10000"
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

                    @unless(isset($hasil))
                    <div class="mt-10 p-8 text-center" style="background-color:#f8fafc;border:2px dashed #e2e8f0;border-radius:16px;">
                        <p class="text-4xl mb-3">♻️</p>
                        <p class="font-medium" style="color:#64748b;">{{ __('app.hasil_empty') }}</p>
                        <p class="text-sm mt-1" style="color:#94a3b8;">{{ __('app.hasil_empty_sub') }}</p>
                    </div>
                    @endunless
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
    @if(isset($hasil))
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

</main>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
@if(isset($hasil))
(function () {
    const ctx = document.getElementById('wasteChart');
    if (!ctx) return;

    const labels = @json(array_column($hasil['detail'], 'nama'));
    const data   = @json(array_column($hasil['detail'], 'poin'));
    const colors = @json(array_map(fn($d) => $jenisConfig[$d['jenis']]['color'], $hasil['detail']));
    const perens = @json(array_column($hasil['detail'], 'persen'));

    new Chart(ctx, {
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
                            const pct  = perens[ctx.dataIndex];
                            return `  ${poin} poin  (${pct}%)`;
                        }
                    }
                }
            }
        }
    });
})();
@endif

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
}
</script>
@endpush