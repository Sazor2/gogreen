@extends('layouts.app')

@section('title', __('app.artikel_title'))

@section('html_class', 'artikel-page')

@section('content')

<style>
    .artikel-hero {
        background: linear-gradient(135deg, rgba(2, 44, 34, 0.85), rgba(6, 78, 59, 0.92)),
            url('{{ asset('images/artikel.jpg') }}');
        background-size: cover;
        background-position: center;
    }

    .artikel-card {
        background: #ffffff;
        border: 1px solid rgba(6, 78, 59, 0.08);
        box-shadow: 0 18px 38px rgba(16, 33, 25, 0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .artikel-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 26px 55px rgba(16, 33, 25, 0.15);
    }

    .artikel-tag {
        background: rgba(16, 185, 129, 0.12);
        color: #047857;
        border: 1px solid rgba(16, 185, 129, 0.25);
    }

    .artikel-cover {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        height: 190px;
        flex-shrink: 0;
    }

    .artikel-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .artikel-card:hover .artikel-cover img {
        transform: scale(1.05);
    }

    .editorial-shadow {
        box-shadow: 0 24px 48px rgba(1, 45, 29, 0.06);
    }

    .go-green-card {
        position: relative;
        overflow: hidden;
        background: linear-gradient(140deg, #f2fff7 0%, #ffffff 45%, #f3fbf7 100%);
        border: 1px solid rgba(16, 185, 129, 0.16);
    }

    .go-green-card::before {
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: radial-gradient(circle at center, rgba(16, 185, 129, 0.13) 0%, rgba(16, 185, 129, 0) 70%);
        top: -70px;
        right: -60px;
        z-index: 0;
    }

    .go-green-text {
        font-size: 0.95rem;
        line-height: 1.85;
        color: #334155;
    }

    .go-green-text strong {
        color: #065f46;
    }

    .go-green-panel {
        background: #ffffff;
        border: 1px solid rgba(16, 185, 129, 0.18);
    }

    html.dark.artikel-page .artikel-card {
        background: #11181e;
        border-color: #24313a;
        box-shadow: 0 18px 38px rgba(0, 0, 0, 0.35);
    }

    html.dark.artikel-page .artikel-card:hover {
        box-shadow: 0 26px 55px rgba(0, 0, 0, 0.55);
    }

    html.dark.artikel-page .artikel-tag {
        background: rgba(127, 243, 190, 0.16);
        color: #7ff3be;
        border-color: rgba(127, 243, 190, 0.35);
    }

    html.dark.artikel-page h3,
    html.dark.artikel-page h4 {
        color: #e6edf3;
    }

    html.dark.artikel-page .text-slate-600 {
        color: #a6b0ba;
    }

    html.dark.artikel-page .text-slate-500 {
        color: #9aa7b2;
    }

    html.dark.artikel-page .text-emerald-700 {
        color: #7ff3be;
    }

    html.dark.artikel-page .go-green-card {
        background: linear-gradient(to bottom right, #123126, #11181e, #11281f) !important;
        border-color: #2f5b48 !important;
        box-shadow: 0 18px 42px rgba(0, 0, 0, 0.4);
    }

    html.dark.artikel-page .go-green-card h3 {
        color: #e6edf3 !important;
    }

    html.dark.artikel-page .go-green-text {
        color: #c5d0da;
    }

    html.dark.artikel-page .go-green-text strong {
        color: #a7f3d0;
    }

    html.dark.artikel-page .go-green-panel {
        background-color: #141b21 !important;
        border-color: #24313a !important;
    }

    html.dark.artikel-page .go-green-card .bg-emerald-50 {
        background-color: #123126 !important;
        border-color: #2f5b48 !important;
        color: #bff7de !important;
    }

    html.dark.artikel-page .go-green-card .bg-slate-50 {
        background-color: #141b21 !important;
        border-color: #24313a !important;
    }

    html.dark.artikel-page .go-green-card .text-slate-800,
    html.dark.artikel-page .go-green-card .text-slate-900 {
        color: #e6edf3 !important;
    }
</style>

<section class="relative mt-8 min-h-[420px] sm:min-h-[500px] max-w-7xl mx-auto rounded-3xl overflow-hidden shadow-[0_32px_64px_rgba(10,47,34,0.15)] group reveal-on-scroll">
    <div class="absolute inset-0 z-0 overflow-hidden">
        <img class="w-full h-full object-cover" src="{{ asset('images/artikel.jpg') }}" alt="{{ __('app.artikel_hero_title') }}">
    </div>

    <div class="absolute inset-y-0 left-0 w-full md:w-1/2 bg-gradient-to-r from-[#0a2f22]/90 via-[#0a2f22]/50 to-transparent z-10"></div>
    <div class="absolute inset-y-0 right-0 w-full md:w-1/3 bg-gradient-to-l from-[#0a2f22]/90 via-[#0a2f22]/60 to-transparent z-10"></div>
    <div class="absolute top-1/2 -translate-y-1/2 -right-20 w-[500px] h-[500px] bg-[#00ff88]/20 blur-[100px] rounded-full z-10 pointer-events-none"></div>

    <div class="relative z-20 px-8 md:px-12 max-w-2xl py-12 text-white">
        <span class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white text-xs font-bold uppercase tracking-[0.15em] mb-6 shadow-lg transition-colors hover:bg-white/20 hover:border-white/50 cursor-default">
            <span class="w-2.5 h-2.5 rounded-full bg-[#a2f31f] animate-pulse shadow-[0_0_10px_#a2f31f]"></span>
            {{ __('app.badge_environment_platform') }}
        </span>
        <h1 class="text-[2.2rem] sm:text-[3.1rem] md:text-[4.4rem] font-black leading-[1.05] tracking-tight mb-6 drop-shadow-2xl">
            <span class="block">{{ __('app.artikel_hero_title_line_1') }}</span>
            <span class="block">{{ __('app.artikel_hero_title_line_2') }}</span>
        </h1>
        <p class="text-white/90 text-base sm:text-lg md:text-xl font-medium leading-relaxed drop-shadow-md max-w-xl">
            {{ __('app.artikel_hero_desc') }}
        </p>
    </div>

</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10 pb-16">
    <div class="bg-white rounded-2xl border border-emerald-50 p-6 md:p-8 shadow-sm reveal-on-scroll">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
            <div class="lg:col-span-2">
                <p class="text-sm font-bold uppercase tracking-widest text-emerald-700">{{ __('app.artikel_featured_label') }}</p>
                <h2 class="text-2xl md:text-3xl font-black text-slate-800 mt-2">{{ __('app.artikel_featured_title') }}</h2>
                <p class="text-slate-600 mt-3">{{ __('app.artikel_featured_desc') }}</p>
                <div class="mt-5 flex flex-wrap gap-3">
                    <a href="{{ url('/kalkulator') }}" class="px-4 py-2 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition-colors">{{ __('app.artikel_featured_btn_calculate') }}</a>
                    <a href="{{ url('/tanaman') }}" class="px-4 py-2 rounded-xl bg-emerald-50 text-emerald-800 font-semibold border border-emerald-100 hover:bg-emerald-100 transition-colors">{{ __('app.artikel_featured_btn_plants') }}</a>
                </div>
            </div>
            <div class="artikel-cover">
                <img src="{{ asset('images/artikel-2.jpg') }}" alt="{{ __('app.artikel_featured_alt') }}">
                <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(2,44,34,0.45) 0%, transparent 70%);"></div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
    <div class="flex items-center justify-between mb-6 reveal-on-scroll">
        <h3 class="text-2xl font-black text-slate-800">{{ __('app.artikel_latest_title') }}</h3>
        <span class="text-sm font-semibold text-emerald-700">{{ __('app.artikel_latest_update') }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
        @foreach([
            [
                'id' => 'artikel-plastik',
                'title' => __('app.dashboard_article_1_title'),
                'desc' => __('app.dashboard_article_1_desc'),
                'tag' => __('app.dashboard_article_1_tag'),
                'time' => '6 menit baca',
                'date' => __('app.dashboard_article_1_date'),
                'image' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?q=80&w=1200&auto=format&fit=crop',
                'icon' => 'recycling',
                'link' => '#artikel-plastik',
            ],
            [
                'id' => 'artikel-bank-sampah',
                'title' => __('app.dashboard_article_2_title'),
                'desc' => __('app.dashboard_article_2_desc'),
                'tag' => __('app.dashboard_article_2_tag'),
                'time' => '7 menit baca',
                'date' => __('app.dashboard_article_2_date'),
                'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?q=80&w=1200&auto=format&fit=crop',
                'icon' => 'calculate',
                'link' => '#artikel-bank-sampah',
            ],
            [
                'id' => 'artikel-pohon',
                'title' => __('app.dashboard_article_3_title'),
                'desc' => __('app.dashboard_article_3_desc'),
                'tag' => __('app.dashboard_article_3_tag'),
                'time' => '5 menit baca',
                'date' => __('app.dashboard_article_3_date'),
                'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=1200&auto=format&fit=crop',
                'icon' => 'park',
                'link' => 'https://www.halodoc.com/artikel/ini-5-manfaat-menanam-pohon-di-sekitar-rumah',
            ],
            [
                'id' => 'artikel-kompos-rumah',
                'title' => 'Panduan Membuat Kompos Sederhana di Rumah',
                'desc' => 'Pelajari langkah praktis mengolah sampah organik menjadi kompos untuk kebun sekolah dan tanaman rumah.',
                'tag' => 'Daur Ulang',
                'time' => '6 menit baca',
                'date' => '19 Okt 2020',
                'image' => asset('images/artikel/kompos.jpg'),
                'icon' => 'compost',
                'link' => 'https://waste4change.com/blog/membuat-kompos-menggunakan-composting-bag/',
            ],
            [
                'id' => 'artikel-3r-sekolah',
                'title' => 'Gerakan 3R untuk Kelas yang Lebih Bersih',
                'desc' => 'Strategi reduce, reuse, dan recycle yang bisa langsung diterapkan oleh siswa di lingkungan sekolah.',
                'tag' => 'Edukasi',
                'time' => '4 menit baca',
                'date' => '16 Feb 2023',
                'image' => asset('images/artikel/3r.jpg'),
                'icon' => 'auto_fix_high',
                'link' => 'https://dlh.ponorogo.go.id/tips-knowledge/menerapkan-prinsip-3r-reduce-reuse-recycle-dalam-mengelola-sampah/',
            ],
            [
                'id' => 'artikel-b3',
                'title' => 'Cara Aman Menangani Sampah B3 di Sekolah',
                'desc' => 'Kenali jenis limbah berbahaya seperti baterai dan lampu, serta cara penyimpanan dan penanganannya.',
                'tag' => 'Keselamatan',
                'time' => '5 menit baca',
                'date' => '28 Jul 2024',
                'image' => asset('images/artikel/b3.jpg'),
                'icon' => 'health_and_safety',
                'link' => 'https://kumparan.com/ragam-info/9-contoh-sampah-b3-di-sekolah-dan-cara-pengelolaan-yang-tepat-23DRYtyLM7N',
            ],
            [
                'id' => 'artikel-biopori',
                'title' => 'Membuat Lubang Biopori untuk Resapan Air',
                'desc' => 'Biopori membantu mengurangi genangan dan mempercepat penguraian sampah organik secara alami.',
                'tag' => 'Konservasi',
                'time' => '6 menit baca',
                'date' => '26 Jun 2024',
                'image' => asset('images/artikel/biopori.jpg'),
                'icon' => 'water_drop',
                'link' => 'https://perkim.id/tips/lubang-resapan-biopori-lrb-cara-sederhana-cegah-banjir-di-perkotaan/',
            ],
            [
                'id' => 'artikel-hemat-energi',
                'title' => 'Hemat Energi di Sekolah, Dampaknya Besar',
                'desc' => 'Kebiasaan sederhana seperti mematikan lampu dan perangkat dapat menurunkan jejak karbon harian.',
                'tag' => 'Energi',
                'time' => '4 menit baca',
                'date' => '20 Feb 2026',
                'image' => asset('images/artikel/hematenergi.jpg'),
                'icon' => 'bolt',
                'link' => 'https://s2dikdas.fip.unesa.ac.id/post/hemat-energi-di-sekolah-langkah-kecil-dampak-besar-untuk-lingkungan',
            ],
            [
                'id' => 'artikel-kebun-mini',
                'title' => 'Kebun Mini Sekolah untuk Belajar Ekologi',
                'desc' => 'Bangun kebun mini dari lahan kecil untuk media belajar siswa tentang tanaman, tanah, dan air.',
                'tag' => 'Pertanian',
                'time' => '5 menit baca',
                'date' => '18 Jan 2026',
                'image' => asset('images/artikel/kebunmini.jpg'),
                'icon' => 'yard',
                'link' => 'https://www.liputan6.com/hot/read/6256368/7-model-kebun-sayur-mini-di-sekolah-sebagai-media-edukasi-gizi-dan-lingkungan',
            ],
        ] as $artikel)
        <article id="{{ $artikel['id'] }}" class="artikel-card rounded-2xl p-5 reveal-on-scroll">
            <div class="artikel-cover">
                <img src="{{ $artikel['image'] }}" alt="{{ $artikel['title'] }}">
                <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(2,44,34,0.35) 0%, transparent 70%);"></div>
                <div class="absolute top-3 left-3 inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider artikel-tag px-3 py-1 rounded-full">
                    <span class="material-symbols-outlined" style="font-size:14px;">{{ $artikel['icon'] }}</span>
                    {{ $artikel['tag'] }}
                </div>
            </div>
            <div class="mt-4 flex flex-col flex-1">
                <h4 class="text-lg font-bold text-slate-800 leading-snug line-clamp-2">{{ $artikel['title'] }}</h4>
                <p class="text-sm text-slate-600 mt-2 line-clamp-3">{{ $artikel['desc'] }}</p>
                <div class="mt-4 flex items-center justify-between text-xs text-slate-500 font-semibold">
                    <span>{{ $artikel['date'] }}</span>
                    <span>{{ $artikel['time'] }}</span>
                </div>
                <div class="mt-4 pt-3 border-t border-emerald-50/80">
                    @php $isExternal = \Illuminate\Support\Str::startsWith($artikel['link'], ['http://', 'https://']); @endphp
                    <a href="{{ $artikel['link'] }}"
                       @if($isExternal) target="_blank" rel="noopener noreferrer" @endif
                       class="inline-flex items-center gap-1.5 text-sm font-bold text-emerald-700 hover:text-emerald-800 transition-colors">
                        {{ __('app.artikel_read_more') }}
                        <span class="material-symbols-outlined" style="font-size:16px;">open_in_new</span>
                    </a>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 pt-10">
    <div class="go-green-card rounded-3xl p-5 md:p-8 reveal-on-scroll shadow-[0_24px_48px_rgba(6,78,59,0.08)]">
        <div class="relative z-10 max-w-5xl mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-6 pb-5 border-b border-emerald-100/80">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700">
                    <span class="material-symbols-outlined" style="font-size:24px;">eco</span>
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.2em] text-emerald-700 font-bold">{{ __('app.artikel_explainer_label') }}</p>
                    <h3 class="text-2xl md:text-3xl font-extrabold text-slate-900 leading-tight tracking-tight mt-1">
                        {{ __('app.artikel_explainer_title_main') }} <span class="text-emerald-600">{{ __('app.artikel_explainer_title_accent') }}</span>
                    </h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                <div class="go-green-panel rounded-2xl p-5 md:p-6">
                    <p class="go-green-text">
                        {!! __('app.artikel_explainer_p1') !!}
                    </p>
                </div>

                <div class="go-green-panel rounded-2xl p-5 md:p-6">
                    <p class="go-green-text">
                        {!! __('app.artikel_explainer_p2') !!}
                    </p>
                </div>

                <div class="go-green-panel rounded-2xl p-5 md:p-6 lg:col-span-2">
                    <p class="go-green-text">
                        {!! __('app.artikel_explainer_p3') !!}
                    </p>
                </div>
            </div>

            <div class="mt-5 go-green-panel rounded-2xl p-5 md:p-6 border-l-4 border-emerald-500">
                <p class="go-green-text font-semibold text-slate-800">
                    {!! __('app.artikel_explainer_summary') !!}
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
