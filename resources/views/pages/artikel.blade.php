@extends('layouts.app')

@section('title', 'Artikel Go Green')

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
</style>

<section class="artikel-hero text-white py-20 md:py-24 max-w-7xl mx-auto mt-8 rounded-2xl editorial-shadow overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full" style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);">
            <span class="material-symbols-outlined" style="font-size:16px;">article</span>
            Artikel Go Green
        </span>
        <h1 class="text-4xl md:text-6xl font-black mt-5">Inspirasi Aksi Hijau di Sekolah</h1>
        <p class="text-white/80 mt-4 text-lg max-w-3xl mx-auto">Kumpulan artikel edukatif seputar pengelolaan sampah, bank sampah, dan program lingkungan yang bisa langsung diterapkan di sekolah.</p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10 pb-16">
    <div class="bg-white rounded-2xl border border-emerald-50 p-6 md:p-8 shadow-sm reveal-on-scroll">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
            <div class="lg:col-span-2">
                <p class="text-sm font-bold uppercase tracking-widest text-emerald-700">Artikel Pilihan</p>
                <h2 class="text-2xl md:text-3xl font-black text-slate-800 mt-2">Gerakan Sederhana yang Memberi Dampak Besar</h2>
                <p class="text-slate-600 mt-3">Mulai dari pembiasaan kecil di kelas hingga program bank sampah sekolah. Artikel pilihan ini merangkum langkah praktis agar semua siswa bisa berkontribusi.</p>
                <div class="mt-5 flex flex-wrap gap-3">
                    <a href="{{ url('/kalkulator') }}" class="px-4 py-2 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700 transition-colors">Hitung Poin</a>
                    <a href="{{ url('/tanaman') }}" class="px-4 py-2 rounded-xl bg-emerald-50 text-emerald-800 font-semibold border border-emerald-100 hover:bg-emerald-100 transition-colors">Lihat Tanaman</a>
                </div>
            </div>
            <div class="artikel-cover">
                <img src="{{ asset('images/begeron.jpeg') }}" alt="Artikel pilihan Go Green">
                <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(2,44,34,0.45) 0%, transparent 70%);"></div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
    <div class="flex items-center justify-between mb-6 reveal-on-scroll">
        <h3 class="text-2xl font-black text-slate-800">Artikel Terbaru</h3>
        <span class="text-sm font-semibold text-emerald-700">Update mingguan</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach([
            [
                'id' => 'artikel-plastik',
                'title' => '3 Langkah Kurangi Sampah Plastik di Kelas',
                'desc' => 'Botol isi ulang, kotak makan pribadi, dan aturan tanpa plastik sekali pakai bisa memangkas sampah hingga 40%.',
                'tag' => 'Edukasi',
                'time' => '4 menit',
                'date' => 'Maret 2026',
                'image' => asset('images/background2.jpg'),
                'icon' => 'recycling',
            ],
            [
                'id' => 'artikel-bank-sampah',
                'title' => 'Bank Sampah Sekolah: Cara Mengumpulkan Poin',
                'desc' => 'Kenali jenis sampah bernilai, jadwal setoran, dan cara mencatat kontribusi tiap kelas.',
                'tag' => 'Program',
                'time' => '6 menit',
                'date' => 'Maret 2026',
                'image' => asset('images/tanaman/tengkawang.jpg'),
                'icon' => 'calculate',
            ],
            [
                'id' => 'artikel-pohon-lokal',
                'title' => 'Pohon Lokal yang Cocok untuk Halaman Sekolah',
                'desc' => 'Tengkawang, jelutung, dan meranti mampu menyejukkan area sekolah sekaligus menjaga biodiversitas.',
                'tag' => 'Tanaman',
                'time' => '5 menit',
                'date' => 'Februari 2026',
                'image' => asset('images/tanaman/meranti.jpg'),
                'icon' => 'park',
            ],
            [
                'id' => 'artikel-kompos',
                'title' => 'Kompos Kelas: Ubah Sampah Organik Jadi Pupuk',
                'desc' => 'Mulai dari sisa makanan dan daun kering, kompos sederhana bisa dibuat dalam 30 hari.',
                'tag' => 'Praktik',
                'time' => '7 menit',
                'date' => 'Februari 2026',
                'image' => asset('images/tanaman/rambutan.jpg'),
                'icon' => 'compost',
            ],
            [
                'id' => 'artikel-eco-challenge',
                'title' => 'Eco Challenge 7 Hari untuk Siswa',
                'desc' => 'Tantangan sederhana: bawa tumbler, pilih transportasi ramah lingkungan, dan catat dampaknya.',
                'tag' => 'Challenge',
                'time' => '3 menit',
                'date' => 'Januari 2026',
                'image' => asset('images/background.jpg'),
                'icon' => 'emoji_events',
            ],
            [
                'id' => 'artikel-hijau',
                'title' => 'Membangun Sudut Hijau di Setiap Kelas',
                'desc' => 'Pojok hijau bisa menjadi area belajar dan meningkatkan kualitas udara di ruang kelas.',
                'tag' => 'Inspirasi',
                'time' => '4 menit',
                'date' => 'Januari 2026',
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
