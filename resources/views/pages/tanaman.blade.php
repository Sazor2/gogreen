@extends('layouts.app')

@section('title', __('app.tanaman_title'))

@section('content')

<style>
    .tanaman-hero {
        background: linear-gradient(135deg, #003527 0%, #064e3b 100%);
    }

    .tanaman-glass-badge {
        background: rgba(108, 248, 187, 0.15);
        border: 1px solid rgba(108, 248, 187, 0.35);
        backdrop-filter: blur(10px);
    }

    .tanaman-card {
        background: #ffffff;
        border: 1px solid #d5e7de;
        box-shadow: 0 14px 30px rgba(25, 28, 30, 0.08);
    }

    .tanaman-card:hover {
        box-shadow: 0 24px 45px rgba(0, 80, 58, 0.18);
    }

    .tanaman-modal-panel {
        border: 1px solid #dbe6e1;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.28);
    }
</style>

<section class="relative overflow-hidden text-white" style="background:linear-gradient(135deg,#003527 0%,#064e3b 100%);">
    <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at 80% 20%, rgba(108,248,187,0.18), transparent 40%);"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="text-left lg:col-span-7">
                <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full tanaman-glass-badge">
                    <span class="material-symbols-outlined" style="font-size:16px;font-variation-settings:'FILL' 1,'wght' 500;">energy_savings_leaf</span>
                    {{ __('app.program_active') }}
                </span>

                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mt-5">Plant Management</h1>
                <p class="text-emerald-100 mt-4 text-lg max-w-2xl">List of 5 West Kalimantan native trees in the SMK Karya Bangsa Sintang environment.</p>
                <p class="text-emerald-200 text-sm mt-3 inline-flex items-center gap-1.5">
                    <span class="material-symbols-outlined" style="font-size:16px;">info</span>
                    {{ __('app.tanaman_catatan') }}
                </p>
            </div>

            <div class="relative lg:col-span-5">
                <div class="rounded-[24px] overflow-hidden border border-white/20 shadow-2xl bg-white/10 backdrop-blur max-w-[290px] sm:max-w-[330px] lg:max-w-[350px] ml-0 lg:ml-auto">
                    <div class="relative" style="height:420px;">
                        <img src="{{ asset('images/background2.jpg') }}" alt="Plant Management" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,0.45) 0%, transparent 60%);"></div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute -bottom-10 left-0 right-0 h-24 pointer-events-none">
        <div class="absolute inset-x-0 top-2 mx-auto h-16 w-[82%] rounded-full bg-emerald-200/35 blur-3xl"></div>
        <div class="absolute inset-0" style="background:linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 75%, #ffffff 100%);"></div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-10">
    {{-- Informasi Status --}}
    <div class="mb-8 bg-white/90 rounded-2xl border border-emerald-100 p-5 shadow-sm reveal-on-scroll">
        <div class="flex items-start gap-3">
            <span class="material-symbols-outlined text-emerald-700" style="font-size:22px;">info</span>
            <div>
                <h3 class="font-semibold text-slate-800">Informasi Status Tanaman</h3>
                <p class="text-sm text-slate-600 mt-1">Status menunjukkan kondisi kesehatan tanaman saat pemantauan terakhir. Klik kartu tanaman untuk melihat detail lengkap.</p>
                <div class="mt-3 flex flex-wrap gap-2">
                    <span class="inline-flex items-center border rounded-full px-3 py-0.5 text-xs font-semibold bg-green-100 text-green-800 border-green-300">{{ __('app.status_sangat_baik') }}</span>
                    <span class="inline-flex items-center border rounded-full px-3 py-0.5 text-xs font-semibold bg-blue-100 text-blue-800 border-blue-300">{{ __('app.status_baik') }}</span>
                    <span class="inline-flex items-center border rounded-full px-3 py-0.5 text-xs font-semibold bg-orange-100 text-orange-800 border-orange-300">{{ __('app.status_perlu_perhatian') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Kartu Tanaman (Foto + Status) --}}
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
        <button type="button"
            class="group tanaman-card rounded-2xl border {{ $pohon['card_border'] }} hover:shadow-lg hover:-translate-y-1 transition-all duration-300 overflow-hidden text-left reveal-on-scroll"
                data-nama="{{ $pohon['nama'] }}"
                data-latin="{{ $pohon['nama_latin'] }}"
                data-famili="{{ $pohon['jenis'] }}"
                data-lokasi="{{ $pohon['lokasi'] }}"
                data-tinggi="{{ $pohon['tinggi'] }}"
                data-manfaat="{{ $pohon['manfaat'] }}"
                data-status="{{ $pohon['status'] }}"
                data-status-color="{{ $pohon['status_color'] }}"
                data-image="{{ $pohon['bg_image'] }}"
                onclick="openTanamanModal(this)">
            <div class="relative overflow-hidden" style="height:240px;background:linear-gradient(135deg,#064e3b,#059669);">
                <img
                    src="{{ $pohon['bg_image'] }}"
                    alt="{{ $pohon['nama'] }}"
                    onerror="this.style.display='none';"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,0.45) 0%, rgba(0,0,0,0.1) 65%, transparent 100%);"></div>

                <span class="absolute top-4 right-4 border text-xs font-semibold px-3 py-1 rounded-full bg-white/90 {{ $pohon['status_color'] }}">{{ $pohon['status'] }}</span>
            </div>

            <div class="p-5">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <h3 class="text-2xl font-bold text-emerald-900 leading-tight">{{ $pohon['nama'] }}</h3>
                        <p class="text-xs italic text-slate-500 mt-0.5">{{ $pohon['nama_latin'] }}</p>
                    </div>
                    <span class="material-symbols-outlined text-emerald-700" style="font-size:18px;font-variation-settings:'FILL' 1,'wght' 500;">eco</span>
                </div>

                <div class="mt-4 flex items-center gap-5">
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Height</p>
                        <p class="text-sm font-bold text-emerald-900">{{ $pohon['tinggi'] }}</p>
                    </div>
                    <div class="w-px h-8 bg-slate-200"></div>
                    <div>
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Family</p>
                        <p class="text-sm font-bold text-emerald-900">{{ $pohon['jenis'] }}</p>
                    </div>
                </div>

                <div class="mt-5 w-full rounded-full bg-slate-100 py-3 text-center text-sm font-bold text-emerald-800 inline-flex items-center justify-center gap-2 group-hover:bg-emerald-800 group-hover:text-white transition-colors">
                    View Details
                    <span class="material-symbols-outlined" style="font-size:16px;">arrow_forward</span>
                </div>
            </div>
        </button>
        @endforeach
    </div>
</div>

{{-- Modal Informasi Tanaman --}}
<div id="tanaman-modal" class="fixed inset-0 z-[70] hidden">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-md" onclick="closeTanamanModal()"></div>

    <div class="relative z-10 min-h-screen flex items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-2xl bg-white rounded-2xl tanaman-modal-panel overflow-hidden">
            <div class="relative" style="height:240px;background:linear-gradient(135deg,#064e3b,#059669);">
                <img id="modal-image" src="" alt="Tanaman" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 70%);"></div>

                <button type="button" class="absolute top-3 right-3 bg-white/85 backdrop-blur rounded-full w-9 h-9 flex items-center justify-center text-slate-700 hover:bg-white" onclick="closeTanamanModal()">
                    <span class="material-symbols-outlined" style="font-size:20px;">close</span>
                </button>

                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span id="modal-status" class="inline-flex border text-xs font-semibold px-3 py-1 rounded-full bg-white/90"></span>
                    <h3 id="modal-nama" class="text-white font-bold text-2xl mt-3"></h3>
                    <p id="modal-latin" class="text-emerald-100 text-sm italic"></p>
                </div>
            </div>

            <div class="p-5 sm:p-6 space-y-3 text-sm">
                <div><span class="font-semibold text-gray-700">{{ __('app.label_famili') }}:</span> <span id="modal-famili" class="text-gray-600"></span></div>
                <div><span class="font-semibold text-gray-700">{{ __('app.label_lokasi') }}:</span> <span id="modal-lokasi" class="text-gray-600"></span></div>
                <div><span class="font-semibold text-gray-700">{{ __('app.label_tinggi') }}:</span> <span id="modal-tinggi" class="text-gray-600"></span></div>

                <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 mt-2">
                    <p class="text-xs font-semibold text-gray-500 mb-1">{{ __('app.label_manfaat') }}</p>
                    <p id="modal-manfaat" class="text-sm text-gray-700 leading-relaxed"></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function openTanamanModal(element) {
        const modal = document.getElementById('tanaman-modal');
        const statusEl = document.getElementById('modal-status');

        document.getElementById('modal-image').src = element.dataset.image || '';
        document.getElementById('modal-nama').textContent = element.dataset.nama || '';
        document.getElementById('modal-latin').textContent = element.dataset.latin || '';
        document.getElementById('modal-famili').textContent = element.dataset.famili || '';
        document.getElementById('modal-lokasi').textContent = element.dataset.lokasi || '';
        document.getElementById('modal-tinggi').textContent = element.dataset.tinggi || '';
        document.getElementById('modal-manfaat').textContent = element.dataset.manfaat || '';

        statusEl.className = 'inline-flex border text-xs font-semibold px-3 py-1 rounded-full bg-white/90 ' + (element.dataset.statusColor || '');
        statusEl.textContent = element.dataset.status || '';

        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeTanamanModal() {
        const modal = document.getElementById('tanaman-modal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeTanamanModal();
        }
    });
</script>
@endpush
