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

<section class="artikel-hero text-white py-20 md:py-24 max-w-7xl mx-auto mt-8 rounded-2xl editorial-shadow overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full" style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);">
            <span class="material-symbols-outlined" style="font-size:16px;">article</span>
            {{ __('app.artikel_badge') }}
        </span>
        <h1 class="text-4xl md:text-6xl font-black mt-5">{{ __('app.artikel_hero_title') }}</h1>
        <p class="text-white/80 mt-4 text-lg max-w-3xl mx-auto">{{ __('app.artikel_hero_desc') }}</p>
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
