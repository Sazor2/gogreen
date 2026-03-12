@extends('layouts.app')

@section('title', __('app.tanaman_title'))

@section('content')

{{-- Header --}}
<div class="bg-gradient-to-r from-green-700 to-teal-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center gap-4">
            <span class="text-5xl">🌳</span>
            <div>
                <h1 class="text-3xl font-extrabold">{{ __('app.tanaman_title') }}</h1>
                <p class="text-green-100 mt-1">{{ __('app.tanaman_desc') }}</p>
                <p class="text-green-300 text-xs mt-1">📌 {{ __('app.tanaman_catatan') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
        @foreach([
            ['label' => __('app.card_total_spesies'),   'value' => '5', 'icon' => '🌿', 'color' => 'border-l-4 border-green-400 bg-green-50 text-green-700'],
            ['label' => __('app.card_sangat_baik'),     'value' => '2', 'icon' => '✅', 'color' => 'border-l-4 border-emerald-400 bg-emerald-50 text-emerald-700'],
            ['label' => __('app.card_baik'),            'value' => '2', 'icon' => '🔵', 'color' => 'border-l-4 border-blue-400 bg-blue-50 text-blue-700'],
            ['label' => __('app.card_perlu_perhatian'), 'value' => '1', 'icon' => '⚠️', 'color' => 'border-l-4 border-orange-400 bg-orange-50 text-orange-700'],
        ] as $card)
        <div class="rounded-xl {{ $card['color'] }} p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium opacity-70">{{ $card['label'] }}</p>
                    <p class="text-2xl font-bold mt-1">{{ $card['value'] }}</p>
                </div>
                <span class="text-3xl">{{ $card['icon'] }}</span>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Kartu Pohon --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach([
            [
                'id'           => 1,
                'nama'         => 'Tengkawang',
                'nama_latin'   => 'Shorea stenoptera',
                'jenis'        => 'Dipterocarpaceae',
                'lokasi'       => __('app.pohon_1_lokasi'),
                'manfaat'      => __('app.pohon_1_manfaat'),
                'tinggi'       => '± 30 meter',
                'status'       => __('app.status_sangat_baik'),
                'status_color' => 'bg-green-100 text-green-800 border-green-300',
                'icon'         => '🌳',
                'card_border'  => 'border-green-200 hover:border-green-400',
                'bg_image'     => asset('images/tanaman/tengkawang.jpg'),
            ],
            [
                'id'           => 2,
                'nama'         => 'Jelutung',
                'nama_latin'   => 'Dyera costulata',
                'jenis'        => 'Apocynaceae',
                'lokasi'       => __('app.pohon_2_lokasi'),
                'manfaat'      => __('app.pohon_2_manfaat'),
                'tinggi'       => '± 40 meter',
                'status'       => __('app.status_baik'),
                'status_color' => 'bg-blue-100 text-blue-800 border-blue-300',
                'icon'         => '🌲',
                'card_border'  => 'border-blue-200 hover:border-blue-400',
                'bg_image'     => asset('images/tanaman/jelutung.jpg'),
            ],
            [
                'id'           => 3,
                'nama'         => 'Meranti Merah',
                'nama_latin'   => 'Shorea lepidota',
                'jenis'        => 'Dipterocarpaceae',
                'lokasi'       => __('app.pohon_3_lokasi'),
                'manfaat'      => __('app.pohon_3_manfaat'),
                'tinggi'       => '± 35 meter',
                'status'       => __('app.status_baik'),
                'status_color' => 'bg-blue-100 text-blue-800 border-blue-300',
                'icon'         => '🌲',
                'card_border'  => 'border-blue-200 hover:border-blue-400',
                'bg_image'     => asset('images/tanaman/meranti.jpg'),
            ],
            [
                'id'           => 4,
                'nama'         => 'Rambutan Hutan',
                'nama_latin'   => 'Nephelium lappaceum',
                'jenis'        => 'Sapindaceae',
                'lokasi'       => __('app.pohon_4_lokasi'),
                'manfaat'      => __('app.pohon_4_manfaat'),
                'tinggi'       => '± 15 meter',
                'status'       => __('app.status_sangat_baik'),
                'status_color' => 'bg-green-100 text-green-800 border-green-300',
                'icon'         => '🍃',
                'card_border'  => 'border-green-200 hover:border-green-400',
                'bg_image'     => asset('images/tanaman/rambutan.jpg'),
            ],
            [
                'id'           => 5,
                'nama'         => 'Ulin (Kayu Besi)',
                'nama_latin'   => 'Eusideroxylon zwageri',
                'jenis'        => 'Lauraceae',
                'lokasi'       => __('app.pohon_5_lokasi'),
                'manfaat'      => __('app.pohon_5_manfaat'),
                'tinggi'       => '± 50 meter',
                'status'       => __('app.status_perlu_perhatian'),
                'status_color' => 'bg-orange-100 text-orange-800 border-orange-300',
                'icon'         => '🪵',
                'card_border'  => 'border-orange-200 hover:border-orange-400',
                'bg_image'     => asset('images/tanaman/ulin.jpg'),
            ],
        ] as $pohon)
        <div class="bg-white rounded-2xl border {{ $pohon['card_border'] }} shadow-sm hover:shadow-md transition-all overflow-hidden">
            {{-- Card Header --}}
            <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-5 py-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-3xl">{{ $pohon['icon'] }}</span>
                    <div>
                        <h3 class="text-white font-bold text-lg leading-tight">{{ $pohon['nama'] }}</h3>
                        <p class="text-green-200 text-xs italic">{{ $pohon['nama_latin'] }}</p>
                    </div>
                </div>
                <span class="border text-xs font-semibold px-3 py-0.5 rounded-full {{ $pohon['status_color'] }}">{{ $pohon['status'] }}</span>
            </div>

            {{-- Card Body --}}
            <div class="p-5 space-y-3">
                {{-- Tree Photo Banner --}}
                <div class="relative overflow-hidden rounded-xl" style="height:220px;background:linear-gradient(135deg,#064e3b,#059669);">
                    <img
                        src="{{ $pohon['bg_image'] }}"
                        alt="{{ $pohon['nama'] }}"
                        onerror="this.style.display='none';"
                        style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
                    <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,0.25) 0%, transparent 60%);"></div>
                </div>

                <div class="space-y-2 text-sm">
                    <div class="flex items-start gap-2">
                        <span class="text-gray-400 mt-0.5">🔬</span>
                        <div>
                            <span class="font-medium text-gray-700">{{ __('app.label_famili') }}:</span>
                            <span class="text-gray-600"> {{ $pohon['jenis'] }}</span>
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-gray-400 mt-0.5">📍</span>
                        <div>
                            <span class="font-medium text-gray-700">{{ __('app.label_lokasi') }}:</span>
                            <span class="text-gray-600"> {{ $pohon['lokasi'] }}</span>
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <span class="text-gray-400 mt-0.5">📏</span>
                        <div>
                            <span class="font-medium text-gray-700">{{ __('app.label_tinggi') }}:</span>
                            <span class="text-gray-600"> {{ $pohon['tinggi'] }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 mb-1">💡 {{ __('app.label_manfaat') }}</p>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $pohon['manfaat'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Legend Status --}}
    <div class="mt-8 bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <h3 class="font-semibold text-gray-700 mb-3">📖 {{ __('app.legend_title') }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            @foreach([
                ['color' => 'bg-green-100 text-green-800 border-green-300',   'label' => __('app.status_sangat_baik'),     'desc' => __('app.legend_sangat_baik')],
                ['color' => 'bg-blue-100 text-blue-800 border-blue-300',      'label' => __('app.status_baik'),            'desc' => __('app.legend_baik')],
                ['color' => 'bg-orange-100 text-orange-800 border-orange-300','label' => __('app.status_perlu_perhatian'), 'desc' => __('app.legend_perlu_perhatian')],
            ] as $legend)
            <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50">
                <span class="border rounded-full px-3 py-0.5 text-xs font-semibold {{ $legend['color'] }} whitespace-nowrap">{{ $legend['label'] }}</span>
                <p class="text-xs text-gray-500">{{ $legend['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
