@extends('layouts.app')

@section('title', __('app.tanaman_title'))

@section('content')
<style>
    /* Sinkronisasi dengan ECO-VIBE Design System */
    :root {
        --primary: #006948;
        --tertiary-container: #a2f31f;
        --on-tertiary-container: #365700;
        --background: #f3f7fb;
        --surface-variant: #d7dee3;
    }

    html.dark {
        --primary: #7ff3be;
        --tertiary-container: #a2f31f;
        --on-tertiary-container: #0a0f12;
        --background: #0a0f12;
        --surface-variant: #2a3640;
    }

    .font-headline { font-family: 'DM Sans', sans-serif; }
    .font-body { font-family: 'Roboto', sans-serif; }

    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .tanaman-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 32px rgba(42, 47, 50, 0.04);
    }

    .tanaman-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 48px rgba(0, 105, 72, 0.1);
    }

    html.dark .tanaman-page {
        background-color: #0a0f12;
        color: #dbe3ea;
    }

    html.dark .tanaman-page .glass-card {
        background: rgba(16, 24, 30, 0.7);
        border-color: rgba(127, 243, 190, 0.2);
    }

    html.dark .tanaman-page .tanaman-card {
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4);
    }

    html.dark .tanaman-page .tanaman-card:hover {
        box-shadow: 0 18px 48px rgba(0, 0, 0, 0.55);
    }

    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    /* Animasi Reveal on Scroll */
    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.5, 0, 0, 1), transform 0.8s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal-on-scroll.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Floating Plant Growth Elements */
    @keyframes float-growth {
        0%, 100% {
            transform: translateY(0px) rotate(0deg) rotateY(0deg) scale(1);
            opacity: 0.62;
        }
        25% {
            transform: translateY(-14px) rotate(6deg) rotateY(12deg) scale(1.04);
            opacity: 0.88;
        }
        50% {
            transform: translateY(-26px) rotate(-8deg) rotateY(-10deg) scale(0.96);
            opacity: 0.72;
        }
        75% {
            transform: translateY(-12px) rotate(4deg) rotateY(8deg) scale(1.02);
            opacity: 0.84;
        }
    }

    .floating-growth {
        position: absolute;
        color: #11d473;
        font-variation-settings: 'FILL' 1, 'wght' 600, 'GRAD' 0, 'opsz' 20;
        filter: drop-shadow(0 0 8px rgba(17, 212, 115, 0.45));
        animation: float-growth 8.5s ease-in-out infinite;
        will-change: transform, opacity;
    }

    .growth-1 { animation-delay: 0s; }
    .growth-2 { animation-delay: 1.7s; }
    .growth-3 { animation-delay: 3.4s; }

    html.dark .tanaman-page .floating-growth {
        color: #7ff3be;
        filter: drop-shadow(0 0 10px rgba(127, 243, 190, 0.58));
    }

    .status-pill {
        border: 1px solid transparent;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 999px;
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
    }

    .status-pill-baik { background: linear-gradient(145deg, #1faa63, #0f8d4f); border-color: #43d38a; }
    .status-pill-cukup_baik { background: linear-gradient(145deg, #2f8dff, #276be0); border-color: #73b4ff; }
    .status-pill-rentan { background: linear-gradient(145deg, #fb8c2a, #e06410); border-color: #ffb16c; }
    .status-pill-terancam_punah { background: linear-gradient(145deg, #ff3b30, #d00000); border-color: #ff6b5f; }
    .status-dot-baik { background: #9cfac6; }
    .status-dot-cukup_baik { background: #cde5ff; }
    .status-dot-rentan { background: #ffe0b8; }
    .status-dot-terancam_punah { background: #ffb2ad; }
    .status-pill-excellent { background: linear-gradient(145deg, #1faa63, #0f8d4f); border-color: #43d38a; }
    .status-pill-good { background: linear-gradient(145deg, #2f8dff, #276be0); border-color: #73b4ff; }
    .status-pill-watch { background: linear-gradient(145deg, #fb8c2a, #e06410); border-color: #ffb16c; }
    .status-dot-excellent { background: #9cfac6; }
    .status-dot-good { background: #cde5ff; }
    .status-dot-watch { background: #ffe0b8; }

    html.dark .tanaman-page .status-pill {
        box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.06), 0 10px 20px rgba(0, 0, 0, 0.45);
    }

    html.dark .tanaman-page .status-dot {
        box-shadow: 0 0 10px currentColor;
    }

    html.dark .tanaman-page #modal-status {
        background: #11181e;
        border-color: #24313a;
        color: #dbe3ea;
    }
</style>

<div class="tanaman-page bg-[#f3f7fb] font-body text-[#2a2f32]">
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden" aria-hidden="true">
        <span class="material-symbols-outlined floating-growth growth-1" style="top:16%; left:11%; font-size:30px;">grass</span>
        <span class="material-symbols-outlined floating-growth growth-2" style="top:34%; right:12%; font-size:24px;">grass</span>
        <span class="material-symbols-outlined floating-growth growth-3" style="top:63%; left:18%; font-size:27px;">grass</span>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-8">
        <section class="relative mt-8 min-h-[420px] sm:min-h-[500px] flex items-center rounded-3xl overflow-hidden reveal-on-scroll shadow-[0_32px_64px_rgba(10,47,34,0.15)] group">
            <div class="absolute inset-0 z-0 overflow-hidden">
                <img class="w-full h-full object-cover" src="{{ asset('images/pohon.jpg') }}" alt="{{ __('app.tanaman_hero_alt') }}">
            </div>

            <div class="absolute inset-y-0 left-0 w-full md:w-1/2 bg-gradient-to-r from-[#0a2f22]/90 via-[#0a2f22]/50 to-transparent z-10"></div>
            <div class="absolute inset-y-0 right-0 w-full md:w-1/3 bg-gradient-to-l from-[#0a2f22]/90 via-[#0a2f22]/60 to-transparent z-10"></div>
            <div class="absolute top-1/2 -translate-y-1/2 -right-20 w-[500px] h-[500px] bg-[#00ff88]/20 blur-[100px] rounded-full z-10 pointer-events-none"></div>

            <div class="relative z-20 px-8 md:px-12 max-w-2xl py-12">
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white text-xs font-bold font-headline uppercase tracking-[0.15em] mb-6 shadow-lg transition-colors hover:bg-white/20 hover:border-white/50 cursor-default">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#a2f31f] animate-pulse shadow-[0_0_10px_#a2f31f]"></span>
                    {{ __('app.badge_environment_platform') }}
                </div>

                <h1 class="font-headline text-[2.6rem] sm:text-[3.5rem] md:text-[5rem] font-extrabold leading-[1.05] tracking-tight mb-6 drop-shadow-2xl text-white">
                    {!! __('app.tanaman_hero_title') !!}
                </h1>

                <p class="text-white/90 text-base sm:text-lg md:text-xl font-medium mb-8 leading-relaxed drop-shadow-md max-w-xl">
                    {{ __('app.tanaman_hero_desc') }}
                </p>
            </div>

        </section>
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-8 pt-16 pb-20">
        
        <div class="mb-12 glass-card rounded-2xl border border-[#006948]/10 p-8 shadow-[0_8px_32px_rgba(42,47,50,0.04)] reveal-on-scroll">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="flex items-start gap-4">
                    <div class="bg-[#006948]/10 w-12 h-12 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-[#006948] text-3xl">analytics</span>
                    </div>
                    <div>
                        <h3 class="font-headline font-extrabold text-xl text-[#006948]">{{ __('app.tanaman_status_title') }}</h3>
                        <p class="text-[#575c60] text-sm font-medium">{{ __('app.tanaman_status_desc') }}</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest status-pill status-pill-baik text-white">{{ __('app.status_baik') }}</span>
                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest status-pill status-pill-cukup_baik text-white">{{ __('app.status_cukup_baik') }}</span>
                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest status-pill status-pill-rentan text-white">{{ __('app.status_rentan') }}</span>
                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest status-pill status-pill-terancam_punah text-white">{{ __('app.status_terancam_punah') }}</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach([
                ['id' => 1, 'nama' => 'Rafflesia Arnoldii', 'latin' => 'Rafflesia arnoldii', 'jenis' => 'Rafflesiaceae', 'lokasi' => __('app.pohon_1_lokasi'), 'manfaat' => __('app.pohon_1_manfaat'), 'tinggi' => __('app.pohon_1_tinggi'), 'status' => __('app.status_terancam_punah'), 'tone' => 'terancam_punah', 'bg' => 'images/tanaman/raflesia.jpg'],
                ['id' => 2, 'nama' => 'Kantong Semar', 'latin' => 'Nepenthes spp.', 'jenis' => 'Nepenthaceae', 'lokasi' => __('app.pohon_2_lokasi'), 'manfaat' => __('app.pohon_2_manfaat'), 'tinggi' => __('app.pohon_2_tinggi'), 'status' => __('app.status_rentan'), 'tone' => 'rentan', 'bg' => 'images/tanaman/kantongsemar.jpg'],
                ['id' => 3, 'nama' => 'Anggrek Hitam Kalimantan', 'latin' => 'Coelogyne pandurata', 'jenis' => 'Orchidaceae', 'lokasi' => __('app.pohon_3_lokasi'), 'manfaat' => __('app.pohon_3_manfaat'), 'tinggi' => __('app.pohon_3_tinggi'), 'status' => __('app.status_terancam_punah'), 'tone' => 'terancam_punah', 'bg' => 'images/tanaman/anggrekhitam.jpg'],
                ['id' => 4, 'nama' => 'Cendana', 'latin' => 'Santalum album', 'jenis' => 'Santalaceae', 'lokasi' => __('app.pohon_4_lokasi'), 'manfaat' => __('app.pohon_4_manfaat'), 'tinggi' => __('app.pohon_4_tinggi'), 'status' => __('app.status_rentan'), 'tone' => 'rentan', 'bg' => 'images/tanaman/cendana.jpg'],
                ['id' => 5, 'nama' => 'Tengkawang', 'latin' => 'Shorea macrophylla', 'jenis' => 'Dipterocarpaceae', 'lokasi' => __('app.pohon_5_lokasi'), 'manfaat' => __('app.pohon_5_manfaat'), 'tinggi' => __('app.pohon_5_tinggi'), 'status' => __('app.status_rentan'), 'tone' => 'rentan', 'bg' => 'images/tanaman/Tengkawang.jpg'],
            ] as $pohon)
            
            <article class="flex flex-col gap-5 group cursor-pointer hover:-translate-y-2 transition-all duration-300" 
                data-nama="{{ $pohon['nama'] }}"
                data-latin="{{ $pohon['latin'] }}"
                data-famili="{{ $pohon['jenis'] }}"
                data-lokasi="{{ $pohon['lokasi'] }}"
                data-tinggi="{{ $pohon['tinggi'] }}"
                data-manfaat="{{ $pohon['manfaat'] }}"
                data-status="{{ $pohon['status'] }}"
                data-status-tone="{{ $pohon['tone'] }}"
                data-image="{{ asset($pohon['bg']) }}"
                onclick="openTanamanModal(this)">
                
                <div class="aspect-[4/5] rounded-2xl overflow-hidden relative shadow-lg tanaman-card">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ asset($pohon['bg']) }}" alt="{{ $pohon['nama'] }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#006948]/80 via-transparent to-transparent opacity-60"></div>
                    
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-md text-[#006948] px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm">
                            {{ $pohon['jenis'] }}
                        </span>
                    </div>

                    <div class="absolute bottom-6 left-6 right-6">
                        <span class="status-pill status-pill-{{ $pohon['tone'] }} flex items-center gap-1.5 text-white text-[9px] font-black px-2.5 py-1 rounded-full w-fit">
                            <span class="status-dot status-dot-{{ $pohon['tone'] }} animate-pulse"></span>
                            {{ $pohon['status'] }}
                        </span>
                    </div>
                </div>

                <div class="px-2">
                    <h4 class="font-headline text-2xl font-extrabold text-[#006948] leading-tight mb-1 group-hover:text-[#a2f31f] transition-colors">
                        {{ $pohon['nama'] }}
                    </h4>
                    <p class="text-[#575c60] text-sm italic font-medium mb-4">{{ $pohon['latin'] }}</p>
                    
                    <div class="flex items-center gap-6 border-t border-[#d7dee3] pt-4">
                        <div class="flex flex-col">
                            <span class="text-[10px] font-black text-[#999da1] tracking-tighter">{{ __('app.tanaman_card_height_label') }}</span>
                            <span class="font-headline font-bold text-[#2a2f32]">{{ $pohon['tinggi'] }}</span>
                        </div>
                        <div class="h-8 w-px bg-[#d7dee3]"></div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-black text-[#999da1] tracking-tighter">{{ __('app.tanaman_card_action_label') }}</span>
                            <span class="text-[#006948] font-bold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">
                                {{ __('app.tanaman_card_action_cta') }} <span class="material-symbols-outlined !text-sm">arrow_forward</span>
                            </span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </main>

    <div id="tanaman-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-[#0a0f12]/60 backdrop-blur-md" onclick="closeTanamanModal()"></div>
        
        <div class="relative w-full max-w-lg bg-white rounded-[2rem] overflow-hidden shadow-2xl transform transition-all">
            <button onclick="closeTanamanModal()" class="absolute top-6 right-6 z-20 w-10 h-10 bg-white/20 backdrop-blur-lg hover:bg-white text-[#2a2f32] rounded-full flex items-center justify-center transition-all group">
                <span class="material-symbols-outlined group-hover:rotate-90 transition-transform">close</span>
            </button>

            <div class="relative h-56 sm:h-64">
                <img id="modal-image" class="w-full h-full object-cover" src="">
                <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent opacity-80"></div>
            </div>

            <div class="px-6 pb-6 -mt-16 relative z-10">
                <div class="mb-4 bg-white rounded-2xl p-4 shadow-lg">
                    <span id="modal-status" class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest shadow-sm bg-white border border-[#d7dee3]"></span>
                    <h2 id="modal-nama" class="text-2xl md:text-3xl font-extrabold text-[#006948] mt-2 mb-1 font-headline tracking-tight"></h2>
                    <p id="modal-latin" class="text-sm italic text-[#575c60] mb-3 font-medium"></p>
                </div>

                <div class="grid grid-cols-3 gap-2 mb-4">
                    <div class="bg-[#f3f7fb] p-3 rounded-xl border border-[#d7dee3]">
                        <p class="text-[8px] font-black uppercase text-[#999da1] mb-0.5">{{ __('app.label_famili') }}</p>
                        <p id="modal-famili" class="font-bold text-[#2a2f32] text-xs"></p>
                    </div>
                    <div class="bg-[#f3f7fb] p-3 rounded-xl border border-[#d7dee3]">
                        <p class="text-[8px] font-black uppercase text-[#999da1] mb-0.5">{{ __('app.label_lokasi') }}</p>
                        <p id="modal-lokasi" class="font-bold text-[#2a2f32] text-xs"></p>
                    </div>
                    <div class="bg-[#f3f7fb] p-3 rounded-xl border border-[#d7dee3]">
                        <p class="text-[8px] font-black uppercase text-[#999da1] mb-0.5">{{ __('app.label_tinggi') }}</p>
                        <p id="modal-tinggi" class="font-bold text-[#2a2f32] text-xs"></p>
                    </div>
                </div>

                <div class="space-y-2 bg-[#f9fafb] p-4 rounded-xl border border-[#e5e7eb]">
                    <h4 class="font-headline font-extrabold text-[#006948] flex items-center gap-2 text-base">
                        <span class="w-1.5 h-1.5 bg-[#a2f31f] rounded-full"></span>
                        {{ __('app.tanaman_benefits_title') }}
                    </h4>
                    <p id="modal-manfaat" class="text-[#575c60] leading-relaxed text-xs font-medium"></p>
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

        document.getElementById('modal-image').src = element.dataset.image;
        document.getElementById('modal-nama').textContent = element.dataset.nama;
        document.getElementById('modal-latin').textContent = element.dataset.latin;
        document.getElementById('modal-famili').textContent = element.dataset.famili;
        document.getElementById('modal-lokasi').textContent = element.dataset.lokasi;
        document.getElementById('modal-tinggi').textContent = element.dataset.tinggi;
        document.getElementById('modal-manfaat').textContent = element.dataset.manfaat;

        statusEl.textContent = element.dataset.status;
        statusEl.classList.remove('status-pill-excellent', 'status-pill-good', 'status-pill-watch', 'status-pill-baik', 'status-pill-cukup_baik', 'status-pill-rentan', 'status-pill-terancam_punah', 'text-white');
        if (element.dataset.statusTone) {
            statusEl.classList.add('status-pill-' + element.dataset.statusTone, 'text-white');
        }

        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeTanamanModal() {
        const modal = document.getElementById('tanaman-modal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeTanamanModal();
    });

    // Reveal on Scroll Animation
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal-on-scroll').forEach(el => observer.observe(el));
</script>
@endpush