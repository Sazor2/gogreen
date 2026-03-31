@extends('layouts.app')

@section('title', __('app.profil_sek_title'))

@section('content')

<style>
    @media (min-width: 768px) {
        .md-grid-2col { grid-template-columns: 1fr 1fr !important; }
        .md-grid-3col { grid-template-columns: repeat(3, 1fr) !important; }
        .md-grid-4col { grid-template-columns: repeat(4, 1fr) !important; }
    }
    @media (min-width: 1024px) {
        .lg-grid-2col { grid-template-columns: 1fr 1fr !important; }
        .lg-grid-3col { grid-template-columns: repeat(3, 1fr) !important; }
        .lg-grid-bento-top { grid-template-columns: 2fr 1fr !important; }
        .lg-grid-bento-bot { grid-template-columns: 1fr 2fr !important; }
    }
    .stat-card { cursor: pointer; transition: all 0.3s; }
    .stat-card:hover { background-color: #064e3b !important; }
    .stat-card:hover .stat-icon,
    .stat-card:hover .stat-value { color: white !important; }
    .stat-card:hover .stat-label { color: rgba(255,255,255,0.8) !important; }
    .program-card { transition: all 0.3s; }
    .program-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(16,33,25,0.12) !important; }
    .facility-card { transition: all 0.3s; }
    .facility-card:hover { border-color: #059669 !important; background-color: rgba(236,253,245,0.5) !important; }
</style>

{{-- Hero Section --}}
<section class="relative overflow-hidden flex items-center justify-center text-center text-white" style="min-height:520px;background-image:linear-gradient(to bottom, rgba(6,76,57,0.4), rgba(6,76,57,0.85)), url('https://lh3.googleusercontent.com/aida-public/AB6AXuDQtgIcghTWlgSYIlJXFz45mZOTRYmk7o5qw2kxvft-ez6VTDCBphsQrqFH97scw7aPmmxynDkog0Zup2D0kT5mjIoiG9pcheBpWqQzFCiuenvi4KPKY5yYOw027tPMs7fJrKxcjHycRzsOpIKqfdViF0vsxHEvF-sCuF56_QW84W2EP5CfVMggDBvhUrE6aMv9jQBebUlxxyb2_aUuHgKDzIquvowoRGVTxNmhhI95gsEEJ9vZT1nJojMDym5v5fvgrODs8JIzK-qn');background-size:cover;background-position:center;">
    <div class="absolute inset-0" style="background:linear-gradient(135deg, rgba(2,44,34,0.3) 0%, rgba(6,37,28,0.2) 40%, rgba(1,20,15,0.1) 100%);"></div>
    <div class="absolute inset-0" style="background:linear-gradient(to bottom, transparent 60%, #f6f8f7 100%);"></div>
    <div class="relative z-10 max-w-3xl mx-auto px-6">
        <span class="inline-flex items-center gap-2 text-white text-xs font-bold uppercase tracking-wider mb-6" style="background:rgba(255,255,255,0.15);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.25);padding:6px 16px;border-radius:9999px;">
            <span class="material-symbols-outlined" style="font-size:16px;font-variation-settings:'FILL' 1,'wght' 400;">verified</span>
            {{ __('app.profil_resmi') }}
        </span>
        <h1 class="text-5xl md:text-7xl font-black leading-tight mb-6">{{ __('app.profil_sek_val_nama') }}</h1>
        <p class="text-lg md:text-xl font-medium" style="color:rgba(255,255,255,0.9);">{{ __('app.profil_sek_hero_tagline') }}</p>
    </div>
</section>

{{-- Floating Statistics --}}
<section class="px-4 sm:px-6 lg:px-8" style="position:relative;margin-top:-3.5rem;z-index:20;">
    <div class="max-w-7xl mx-auto md-grid-4col" style="display:grid;grid-template-columns:repeat(2, 1fr);gap:1rem;">
        @foreach([
            ['icon' => 'groups',       'value' => '320+', 'label' => __('app.profil_sek_stat_siswa')],
            ['icon' => 'school',       'value' => '28',   'label' => __('app.profil_sek_stat_guru')],
            ['icon' => 'meeting_room', 'value' => '10',   'label' => __('app.profil_sek_stat_kelas')],
            ['icon' => 'history',      'value' => '2003', 'label' => __('app.profil_sek_stat_tahun')],
        ] as $stat)
        <div class="stat-card bg-white flex flex-col items-center text-center reveal-on-scroll" style="padding:24px 16px;border-radius:12px;box-shadow:0 20px 40px rgba(16,33,25,0.1);border:1px solid rgba(6,78,59,0.05);">
            <span class="stat-icon material-symbols-outlined" style="font-size:2.5rem;color:#064e3b;margin-bottom:8px;font-variation-settings:'FILL' 1,'wght' 400;">{{ $stat['icon'] }}</span>
            <h3 class="stat-value text-3xl font-black" style="color:#1e293b;">{{ $stat['value'] }}</h3>
            <p class="stat-label text-sm font-bold uppercase" style="color:#64748b;">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Identity Bento Grid --}}
<section class="px-4 sm:px-6 lg:px-8" style="padding-top:5rem;padding-bottom:5rem;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center" style="margin-bottom:3rem;">
            <h2 class="font-black text-3xl" style="color:#064e3b;">{{ __('app.profil_sek_identitas') }}</h2>
            <div style="width:5rem;height:6px;background-color:#064e3b;border-radius:9999px;margin:8px auto 0;"></div>
        </div>

        {{-- Top row: Location (wide) + Accreditation --}}
        <div class="lg-grid-bento-top" style="display:grid;grid-template-columns:1fr;gap:1.5rem;margin-bottom:1.5rem;">
            <div class="bg-white reveal-on-scroll" style="padding:2rem;border-radius:12px;border:1px solid rgba(6,78,59,0.1);box-shadow:0 10px 25px rgba(16,33,25,0.05);">
                <div style="display:flex;align-items:flex-start;gap:1.5rem;margin-bottom:1.25rem;">
                    <div style="background-color:rgba(6,78,59,0.1);padding:16px;border-radius:12px;flex-shrink:0;">
                        <span class="material-symbols-outlined" style="font-size:2rem;color:#064e3b;font-variation-settings:'FILL' 1,'wght' 400;">location_on</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold" style="margin-bottom:8px;">{{ __('app.profil_sek_lokasi_title') }}</h3>
                        <p style="color:#64748b;">{{ __('app.profil_sek_val_alamat') }}, {{ __('app.profil_sek_val_kota') }}, {{ __('app.profil_sek_val_prov') }}</p>
                    </div>
                </div>
                {{-- Embedded Map --}}
                <div style="border-radius:10px;overflow:hidden;border:1px solid rgba(6,78,59,0.1);height:280px;">
                    <iframe
                        src="https://maps.google.com/maps?q=SMK+Karya+Bangsa+Sintang,+Jl.+MT.+Haryono,+Sintang,+Kalimantan+Barat&output=embed&z=17&hl=id"
                        width="100%"
                        height="100%"
                        style="border:0;display:block;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi SMK Karya Bangsa Sintang">
                    </iframe>
                </div>
            </div>
            <div class="text-white reveal-on-scroll" style="background-color:#064e3b;padding:2rem;border-radius:12px;position:relative;overflow:hidden;">
                <span class="material-symbols-outlined" style="position:absolute;right:-16px;bottom:-16px;font-size:8rem;color:rgba(255,255,255,0.06);font-variation-settings:'FILL' 1,'wght' 400;">verified_user</span>
                <div style="position:relative;z-index:10;">
                    <h3 class="text-xl font-bold" style="margin-bottom:16px;">{{ __('app.profil_sek_akreditasi') }}</h3>
                    <div class="font-black" style="font-size:4rem;margin-bottom:8px;">{{ __('app.profil_sek_val_akred') }}</div>
                    <p style="color:rgba(255,255,255,0.8);">{{ __('app.profil_sek_akred_label') }}</p>
                </div>
            </div>
        </div>

        {{-- Bottom row: NPSN/Details + Status (wide) --}}
        <div class="lg-grid-bento-bot" style="display:grid;grid-template-columns:1fr;gap:1.5rem;">
            <div class="bg-white reveal-on-scroll" style="padding:2rem;border-radius:12px;border:1px solid rgba(6,78,59,0.1);box-shadow:0 10px 25px rgba(16,33,25,0.05);">
                <div style="display:flex;flex-direction:column;gap:1rem;">
                    <div style="display:flex;align-items:center;gap:12px;">
                        <span class="material-symbols-outlined" style="color:#064e3b;font-variation-settings:'FILL' 1,'wght' 400;">tag</span>
                        <div>
                            <p class="text-xs font-bold uppercase" style="color:#94a3b8;">{{ __('app.profil_sek_npsn') }}</p>
                            <p class="font-bold">{{ __('app.profil_sek_val_npsn') }}</p>
                        </div>
                    </div>
                    <div style="height:1px;background-color:#f1f5f9;width:100%;"></div>
                    <div style="display:flex;align-items:center;gap:12px;">
                        <span class="material-symbols-outlined" style="color:#064e3b;font-variation-settings:'FILL' 1,'wght' 400;">school</span>
                        <div>
                            <p class="text-xs font-bold uppercase" style="color:#94a3b8;">{{ __('app.profil_sek_jenjang') }}</p>
                            <p class="font-bold">{{ __('app.profil_sek_val_jenjang') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reveal-on-scroll" style="background-color:#ecfdf5;padding:2rem;border-radius:12px;border:1px solid #a7f3d0;display:flex;align-items:center;gap:1.5rem;flex-wrap:wrap;">
                <div style="background-color:#059669;color:white;padding:16px;border-radius:12px;flex-shrink:0;">
                    <span class="material-symbols-outlined" style="font-size:2rem;font-variation-settings:'FILL' 1,'wght' 400;">account_balance</span>
                </div>
                <div>
                    <h3 class="text-xl font-bold" style="margin-bottom:4px;">{{ __('app.profil_sek_status') }}</h3>
                    <p class="font-medium italic" style="color:#047857;">{{ __('app.profil_sek_status_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Vision & Mission --}}
<section class="px-4 sm:px-6 lg:px-8" style="padding-top:5rem;padding-bottom:5rem;background-color:rgba(6,78,59,0.03);">
    <div class="max-w-7xl mx-auto lg-grid-2col" style="display:grid;grid-template-columns:1fr;gap:3rem;align-items:center;">
        {{-- Vision --}}
        <div class="reveal-on-scroll" style="position:relative;">
            <span class="material-symbols-outlined" style="position:absolute;top:-40px;left:-40px;font-size:12rem;color:rgba(6,78,59,0.06);font-variation-settings:'FILL' 1,'wght' 400;">format_quote</span>
            <div style="position:relative;z-index:10;">
                <h2 class="font-black text-4xl" style="color:#064e3b;margin-bottom:2rem;">{{ __('app.profil_sek_visi_title') }}</h2>
                <blockquote class="text-3xl md:text-4xl font-extrabold leading-tight italic" style="color:#1e293b;">
                    "{{ __('app.profil_sek_visi') }}"
                </blockquote>
            </div>
        </div>
        {{-- Mission --}}
        <div class="bg-white reveal-on-scroll" style="padding:2.5rem;border-radius:16px;box-shadow:0 25px 50px rgba(6,78,59,0.08);border:1px solid rgba(6,78,59,0.05);">
            <h2 class="font-black text-3xl flex items-center gap-3" style="color:#064e3b;margin-bottom:2rem;">
                <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1,'wght' 400;">assignment</span>
                {{ __('app.profil_sek_misi_title') }}
            </h2>
            <ul style="display:flex;flex-direction:column;gap:1.5rem;">
                @foreach([
                    __('app.profil_sek_m1'),
                    __('app.profil_sek_m2'),
                    __('app.profil_sek_m3'),
                    __('app.profil_sek_m4'),
                    __('app.profil_sek_m5'),
                ] as $i => $m)
                <li style="display:flex;gap:16px;">
                    <div style="flex-shrink:0;width:32px;height:32px;background-color:#064e3b;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:14px;">{{ $i + 1 }}</div>
                    <p class="font-medium leading-relaxed" style="color:#64748b;">{{ $m }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- Program Keahlian --}}
<section class="px-4 sm:px-6 lg:px-8" style="padding-top:6rem;padding-bottom:6rem;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center" style="margin-bottom:4rem;">
            <p class="font-bold uppercase tracking-widest text-sm" style="color:#064e3b;margin-bottom:16px;">{{ __('app.profil_sek_jurusan_sub') }}</p>
            <h2 class="font-black text-4xl" style="color:#1e293b;">{{ __('app.profil_sek_jurusan') }}</h2>
        </div>
        <div class="md-grid-3col" style="display:grid;grid-template-columns:1fr;gap:2rem;">
            @foreach([
                ['name' => __('app.jurusan_tkj'), 'icon' => 'lan',           'desc' => __('app.jurusan_tkj_desc'), 'rombel' => 3],
                ['name' => __('app.jurusan_mm'),  'icon' => 'movie',         'desc' => __('app.jurusan_mm_desc'),  'rombel' => 2],
                ['name' => __('app.jurusan_ak'),  'icon' => 'payments',      'desc' => __('app.jurusan_ak_desc'),  'rombel' => 2],
                ['name' => __('app.jurusan_ap'),  'icon' => 'folder_shared', 'desc' => __('app.jurusan_ap_desc'),  'rombel' => 1],
                ['name' => __('app.jurusan_bdp'), 'icon' => 'storefront',    'desc' => __('app.jurusan_bdp_desc'), 'rombel' => 1],
                ['name' => __('app.jurusan_at'),  'icon' => 'potted_plant',  'desc' => __('app.jurusan_at_desc'),  'rombel' => 1],
            ] as $j)
            <div class="program-card bg-white reveal-on-scroll" style="padding:2rem;border-radius:16px;border-bottom:4px solid #064e3b;box-shadow:0 10px 30px rgba(16,33,25,0.07);">
                <div style="width:64px;height:64px;background-color:rgba(6,78,59,0.1);border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:1.5rem;">
                    <span class="material-symbols-outlined" style="font-size:2rem;color:#064e3b;font-variation-settings:'FILL' 1,'wght' 400;">{{ $j['icon'] }}</span>
                </div>
                <h3 class="text-xl font-black" style="margin-bottom:8px;">{{ $j['name'] }}</h3>
                <p class="text-sm" style="color:#64748b;margin-bottom:16px;">{{ $j['desc'] }}</p>
                <span class="text-xs font-bold" style="color:#059669;">{{ $j['rombel'] }} {{ __('app.jurusan_rombel_label') }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Go Green Program --}}
<section class="px-4 sm:px-6 lg:px-8" style="padding-top:6rem;padding-bottom:6rem;background-color:#064e3b;position:relative;overflow:hidden;">
    <div style="position:absolute;inset:0;opacity:0.04;pointer-events:none;">
        <span class="material-symbols-outlined" style="font-size:8rem;position:absolute;top:10%;left:5%;">eco</span>
        <span class="material-symbols-outlined" style="font-size:8rem;position:absolute;top:30%;right:10%;">forest</span>
        <span class="material-symbols-outlined" style="font-size:8rem;position:absolute;bottom:10%;left:20%;">recycling</span>
    </div>
    <div class="max-w-7xl mx-auto lg-grid-2col" style="position:relative;z-index:10;display:grid;grid-template-columns:1fr;gap:4rem;align-items:center;">
        <div class="reveal-on-scroll">
            <span class="font-black uppercase tracking-widest text-sm" style="color:#6ee7b7;margin-bottom:16px;display:block;">{{ __('app.profil_sek_green_sub') }}</span>
            <h2 class="text-white font-black text-5xl" style="margin-bottom:2rem;">{{ __('app.profil_sek_green_title') }}</h2>
            <p class="text-xl leading-relaxed" style="color:#ecfdf5;margin-bottom:2.5rem;">{{ __('app.profil_sek_green_desc') }}</p>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                @foreach([
                    ['icon' => 'park',      'title' => __('app.profil_sek_gp1'), 'desc' => __('app.profil_sek_gp1_desc')],
                    ['icon' => 'recycling', 'title' => __('app.profil_sek_gp2'), 'desc' => __('app.profil_sek_gp2_desc')],
                    ['icon' => 'grass',     'title' => __('app.profil_sek_gp3'), 'desc' => __('app.profil_sek_gp3_desc')],
                    ['icon' => 'compost',   'title' => __('app.profil_sek_gp5'), 'desc' => __('app.profil_sek_gp5_desc')],
                ] as $gp)
                <div style="display:flex;align-items:flex-start;gap:16px;">
                    <div style="background-color:rgba(110,231,183,0.2);padding:10px;border-radius:8px;flex-shrink:0;">
                        <span class="material-symbols-outlined" style="color:#6ee7b7;font-variation-settings:'FILL' 1,'wght' 400;">{{ $gp['icon'] }}</span>
                    </div>
                    <div>
                        <h4 class="text-white font-bold" style="font-size:14px;">{{ $gp['title'] }}</h4>
                        <p style="color:rgba(236,253,245,0.6);font-size:12px;">{{ $gp['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="reveal-on-scroll" style="position:relative;">
            <div style="border-radius:16px;overflow:hidden;box-shadow:0 25px 50px rgba(0,0,0,0.3);transform:rotate(2deg);transition:transform 0.5s;" onmouseout="this.style.transform='rotate(2deg)'" onmouseover="this.style.transform='rotate(0deg)'">
                <img alt="School environmental garden" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpUteCe7oq-_NWPXFTGa3wBSlRTtMqR9VK_SgQ9y9FuIiZ_K1B50ZwO_kX6Y0XOdaEsR-7d8tTF_tvnbldu473VuptNqIPxygU0cmwfrl2JQeC4X8lbdIDQWmSiDtajZZ-hugynYKdF9fHeLlQkTAqSSvE4aLRY1O0VSrKQWpFuqHPccz793ejScHWpeLWGoUTry_3GflHCGY1boyV_W-km8DbVLWKi9RVneH1PuTWCLxrDrfplFubNyUMD3pjQoI5An51F_tn9Ydb" style="width:100%;height:500px;object-fit:cover;">
            </div>
        </div>
    </div>
</section>

{{-- Facilities --}}
<section class="px-4 sm:px-6 lg:px-8" style="padding-top:6rem;padding-bottom:6rem;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center" style="margin-bottom:4rem;">
            <h2 class="font-black text-4xl" style="color:#1e293b;margin-bottom:16px;">{{ __('app.profil_sek_fasilitas_title') }}</h2>
            <p style="color:#64748b;max-width:36rem;margin:0 auto;">{{ __('app.profil_sek_fasilitas_sub') }}</p>
        </div>
        <div class="md-grid-4col" style="display:grid;grid-template-columns:repeat(2, 1fr);gap:1rem;">
            @foreach([
                ['name' => __('app.fasilitas_lab'),      'icon' => 'computer'],
                ['name' => __('app.fasilitas_perpus'),   'icon' => 'menu_book'],
                ['name' => __('app.fasilitas_lapangan'), 'icon' => 'sports_soccer'],
                ['name' => __('app.fasilitas_kelas'),    'icon' => 'meeting_room'],
                ['name' => __('app.fasilitas_taman'),    'icon' => 'park'],
                ['name' => __('app.fasilitas_kantin'),   'icon' => 'restaurant'],
                ['name' => __('app.fasilitas_parkir'),   'icon' => 'two_wheeler'],
            ] as $f)
            <div class="facility-card bg-white text-center reveal-on-scroll" style="padding:24px 16px;border-radius:12px;border:1px solid rgba(6,78,59,0.05);">
                <span class="material-symbols-outlined" style="font-size:2.5rem;color:#064e3b;margin-bottom:16px;display:block;font-variation-settings:'FILL' 1,'wght' 400;">{{ $f['icon'] }}</span>
                <h4 class="font-bold text-sm">{{ $f['name'] }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Organizational Structure --}}
<section class="px-4 sm:px-6 lg:px-8" style="padding-top:6rem;padding-bottom:6rem;background-color:#f8fafc;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center" style="margin-bottom:4rem;">
            <h2 class="font-black text-4xl" style="color:#1e293b;margin-bottom:16px;">{{ __('app.profil_sek_struktur') }}</h2>
            <p style="color:#64748b;">{{ __('app.profil_sek_struktur_sub') }}</p>
        </div>

        {{-- Kepala Sekolah --}}
        <div class="text-center" style="margin-bottom:4rem;">
            <div class="bg-white reveal-on-scroll" style="display:inline-block;padding:2rem;border-radius:16px;box-shadow:0 20px 40px rgba(16,33,25,0.1);border-top:8px solid #064e3b;min-width:280px;">
                <div style="width:96px;height:96px;background-color:rgba(6,78,59,0.1);border-radius:50%;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;">
                    <span class="material-symbols-outlined" style="font-size:3rem;color:#064e3b;font-variation-settings:'FILL' 1,'wght' 400;">person</span>
                </div>
                <h4 class="font-black text-lg">Bill Yosua, S.Pd.,M.Pd.,Gr</h4>
                <p class="font-bold text-sm" style="color:#064e3b;">{{ __('app.profil_sek_kepsek') }}</p>
            </div>
        </div>

        {{-- Wakasek & Pembina --}}
        <div class="md-grid-2col" style="display:grid;grid-template-columns:1fr;gap:2rem;max-width:56rem;margin:0 auto;">
            @foreach([
                ['jabatan' => __('app.profil_sek_wakasek'), 'nama' => 'Yandora Elisda, S.Psi'],
                ['jabatan' => __('app.profil_sek_pembina'), 'nama' => 'Fiersia Vinderly'],
            ] as $org)
            <div class="bg-white text-center reveal-on-scroll" style="padding:2rem;border-radius:16px;box-shadow:0 10px 25px rgba(16,33,25,0.05);border-top:4px solid rgba(6,78,59,0.3);">
                <div style="width:80px;height:80px;background-color:rgba(6,78,59,0.05);border-radius:50%;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;">
                    <span class="material-symbols-outlined" style="font-size:2.5rem;color:rgba(6,78,59,0.5);font-variation-settings:'FILL' 1,'wght' 400;">person</span>
                </div>
                <p class="text-xs font-bold uppercase" style="color:#94a3b8;letter-spacing:0.1em;margin-bottom:4px;">{{ $org['jabatan'] }}</p>
                <h4 class="font-bold">{{ $org['nama'] }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
