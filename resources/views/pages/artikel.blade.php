@extends('layouts.app')

@section('title', __('app.artikel_title'))

@section('html_class', 'artikel-page')

@section('content')

<style>
    .artikel-hero {
        background: linear-gradient(135deg, rgba(2, 44, 34, 0.85), rgba(6, 78, 59, 0.92)),
            url('{{ asset('images/background.jpg') }}');
        background-size: cover;
        background-position: center;
    }

    .artikel-card {
        background: #ffffff;
        border: 1px solid rgba(6, 78, 59, 0.08);
        box-shadow: 0 18px 38px rgba(16, 33, 25, 0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
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
        min-height: 180px;
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
</style>

<section class="relative mt-8 min-h-[420px] sm:min-h-[500px] max-w-7xl mx-auto rounded-3xl overflow-hidden shadow-[0_32px_64px_rgba(10,47,34,0.15)] group reveal-on-scroll">
    <div class="absolute inset-0 z-0 overflow-hidden">
        <img class="w-full h-full object-cover" src="{{ asset('images/background.jpg') }}" alt="{{ __('app.artikel_hero_title') }}">
    </div>

    <div class="absolute inset-y-0 left-0 w-full md:w-1/2 bg-gradient-to-r from-[#0a2f22]/90 via-[#0a2f22]/50 to-transparent z-10"></div>
    <div class="absolute inset-y-0 right-0 w-full md:w-1/3 bg-gradient-to-l from-[#0a2f22]/90 via-[#0a2f22]/60 to-transparent z-10"></div>
    <div class="absolute top-1/2 -translate-y-1/2 -right-20 w-[500px] h-[500px] bg-[#00ff88]/20 blur-[100px] rounded-full z-10 pointer-events-none"></div>

    <div class="relative z-20 px-8 md:px-12 max-w-2xl py-12 text-white">
        <span class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white text-xs font-bold uppercase tracking-[0.15em] mb-6 shadow-lg transition-colors hover:bg-white/20 hover:border-white/50 cursor-default">
            <span class="w-2.5 h-2.5 rounded-full bg-[#a2f31f] animate-pulse shadow-[0_0_10px_#a2f31f]"></span>
            {{ __('app.badge_environment_platform') }}
        </span>
        <h1 class="text-[2.6rem] sm:text-[3.5rem] md:text-[5rem] font-black leading-[1.05] tracking-tight mb-6 drop-shadow-2xl">
            {{ __('app.artikel_hero_title') }}
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
                <img src="{{ asset('images/begeron.jpeg') }}" alt="{{ __('app.artikel_featured_alt') }}">
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach([
            [
                'id' => 'artikel-plastik',
                'title' => __('app.artikel_item_1_title'),
                'desc' => __('app.artikel_item_1_desc'),
                'tag' => __('app.artikel_item_1_tag'),
                'time' => __('app.artikel_item_1_time'),
                'date' => __('app.artikel_item_1_date'),
                'image' => asset('images/background2.jpg'),
                'icon' => 'recycling',
            ],
            [
                'id' => 'artikel-bank-sampah',
                'title' => __('app.artikel_item_2_title'),
                'desc' => __('app.artikel_item_2_desc'),
                'tag' => __('app.artikel_item_2_tag'),
                'time' => __('app.artikel_item_2_time'),
                'date' => __('app.artikel_item_2_date'),
                'image' => asset('images/tanaman/tengkawang.jpg'),
                'icon' => 'calculate',
            ],
            [
                'id' => 'artikel-pohon-lokal',
                'title' => __('app.artikel_item_3_title'),
                'desc' => __('app.artikel_item_3_desc'),
                'tag' => __('app.artikel_item_3_tag'),
                'time' => __('app.artikel_item_3_time'),
                'date' => __('app.artikel_item_3_date'),
                'image' => asset('images/tanaman/meranti.jpg'),
                'icon' => 'park',
            ],
            [
                'id' => 'artikel-kompos',
                'title' => __('app.artikel_item_4_title'),
                'desc' => __('app.artikel_item_4_desc'),
                'tag' => __('app.artikel_item_4_tag'),
                'time' => __('app.artikel_item_4_time'),
                'date' => __('app.artikel_item_4_date'),
                'image' => asset('images/tanaman/rambutan.jpg'),
                'icon' => 'compost',
            ],
            [
                'id' => 'artikel-eco-challenge',
                'title' => __('app.artikel_item_5_title'),
                'desc' => __('app.artikel_item_5_desc'),
                'tag' => __('app.artikel_item_5_tag'),
                'time' => __('app.artikel_item_5_time'),
                'date' => __('app.artikel_item_5_date'),
                'image' => asset('images/background.jpg'),
                'icon' => 'emoji_events',
            ],
            [
                'id' => 'artikel-hijau',
                'title' => __('app.artikel_item_6_title'),
                'desc' => __('app.artikel_item_6_desc'),
                'tag' => __('app.artikel_item_6_tag'),
                'time' => __('app.artikel_item_6_time'),
                'date' => __('app.artikel_item_6_date'),
                'image' => asset('images/tanaman/jelutung.jpg'),
                'icon' => 'eco',
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
            <div class="mt-4">
                <h4 class="text-lg font-bold text-slate-800 leading-snug">{{ $artikel['title'] }}</h4>
                <p class="text-sm text-slate-600 mt-2">{{ $artikel['desc'] }}</p>
                <div class="mt-4 flex items-center justify-between text-xs text-slate-500 font-semibold">
                    <span>{{ $artikel['date'] }}</span>
                    <span>{{ $artikel['time'] }}</span>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</section>

@endsection
