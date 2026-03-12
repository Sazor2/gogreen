@extends('layouts.app')

@section('title', __('app.about_title'))

@section('content')

{{-- Hero --}}
<div class="bg-gradient-to-br from-green-700 via-green-600 to-emerald-500 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-20">
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-green-500/40 rounded-full px-4 py-1 text-sm mb-4">
                <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>
                Go Green School
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                👤 {{ __('app.about_title') }}
            </h1>
            <p class="mt-3 text-green-100 text-lg max-w-2xl mx-auto">
                {{ __('app.about_subtitle') }}
            </p>
        </div>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">

    {{-- Profil Pengembang --}}
    <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-green-100">
            <h2 class="text-xl font-bold text-green-800">👨‍💻 {{ __('app.about_developer') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                {{-- Avatar --}}
                <div class="flex-shrink-0">
                    <div class="w-36 h-36 rounded-full bg-gradient-to-br from-green-400 to-emerald-500 flex items-center justify-center shadow-lg">
                        <span class="text-6xl">🌿</span>
                    </div>
                </div>
                {{-- Info --}}
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-2xl font-bold text-gray-800">{{ __('app.about_name') }}</h3>
                    <p class="text-green-600 font-medium mt-1">{{ __('app.about_role') }}</p>
                    <p class="text-sm text-gray-500 mt-1">🏫 {{ __('app.about_school') }} &nbsp;|&nbsp; 📅 {{ __('app.about_year') }}</p>
                    <p class="mt-4 text-gray-600 leading-relaxed max-w-2xl">
                        {{ __('app.about_desc') }}
                    </p>
                    {{-- Badges --}}
                    <div class="mt-5 flex flex-wrap gap-2 justify-center md:justify-start">
                        @foreach(['Laravel 11', 'Livewire', 'Filament', 'TailwindCSS', 'Vite', 'PHP 8'] as $tech)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 border border-green-200">
                            ✅ {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tim Pengembang --}}
    <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-green-100">
            <h2 class="text-xl font-bold text-green-800">👥 {{ __('app.about_team_title') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                @foreach([
                    ['name' => 'Nabil Aqbar Kurnia Wijaya Putra',     'role' => 'Lead Developer',        'emoji' => '💻'],
                    ['name' => 'Fiersia Vinderly',     'role' => 'UI / UX Designer',      'emoji' => '🎨'],
                    ['name' => 'yosua',    'role' => 'Backend Developer',     'emoji' => '⚙️'],
                    ['name' => 'Fiersia Vinderly',    'role' => 'Environmental Analyst', 'emoji' => '🌱'],
                    ['name' => 'Nabil Aqbar Kurnia Wijaya Putra',    'role' => 'Database & Testing',    'emoji' => '🔍'],
                    ['name' => 'Giovinco', 'role' => __('app.about_role_content'), 'emoji' => '📝'],
                ] as $member)
                <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-green-200 hover:bg-green-50/50 transition-colors">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center text-2xl flex-shrink-0">
                        {{ $member['emoji'] }}
                    </div>
                    <div>
                        <div class="font-semibold text-gray-800 text-sm">{{ $member['name'] }}</div>
                        <div class="text-xs text-green-600 mt-0.5">{{ $member['role'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Teknologi --}}
    <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-green-100">
            <h2 class="text-xl font-bold text-green-800">🛠️ {{ __('app.about_tech_title') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([
                    ['name' => 'Laravel 11',    'desc' => __('app.tech_laravel_desc'),  'icon' => '🔴', 'color' => 'border-red-100   bg-red-50   text-red-700'],
                    ['name' => 'Blade',         'desc' => __('app.tech_blade_desc'),    'icon' => '⚡', 'color' => 'border-orange-100 bg-orange-50 text-orange-700'],
                    ['name' => 'TailwindCSS',   'desc' => __('app.tech_tailwind_desc'), 'icon' => '💙', 'color' => 'border-blue-100  bg-blue-50  text-blue-700'],
                    ['name' => 'Vite',          'desc' => __('app.tech_vite_desc'),     'icon' => '⚡', 'color' => 'border-purple-100 bg-purple-50 text-purple-700'],
                    ['name' => 'Filament',      'desc' => __('app.tech_filament_desc'), 'icon' => '🟡', 'color' => 'border-yellow-100 bg-yellow-50 text-yellow-700'],
                    ['name' => 'Livewire',      'desc' => __('app.tech_livewire_desc'), 'icon' => '🌊', 'color' => 'border-cyan-100   bg-cyan-50   text-cyan-700'],
                    ['name' => 'PHP 8.2+',      'desc' => __('app.tech_php_desc'),      'icon' => '🐘', 'color' => 'border-indigo-100 bg-indigo-50 text-indigo-700'],
                    ['name' => 'Pest PHP',      'desc' => __('app.tech_pest_desc'),     'icon' => '🧪', 'color' => 'border-green-100  bg-green-50  text-green-700'],
                    ['name' => 'MySQL',         'desc' => __('app.tech_mysql_desc'),    'icon' => '🗄️', 'color' => 'border-teal-100   bg-teal-50   text-teal-700'],
                ] as $tech)
                <div class="flex items-start gap-4 p-4 rounded-xl border {{ $tech['color'] }} transition-colors">
                    <span class="text-2xl flex-shrink-0">{{ $tech['icon'] }}</span>
                    <div>
                        <div class="font-semibold text-sm">{{ $tech['name'] }}</div>
                        <div class="text-xs mt-0.5 opacity-80">{{ $tech['desc'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Kontak --}}
    <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-green-100">
            <h2 class="text-xl font-bold text-green-800">📬 {{ __('app.about_contact_title') }}</h2>
        </div>
        <div class="p-6 md:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="flex items-center gap-4 p-4 rounded-xl border border-green-100 bg-green-50">
                    <span class="text-3xl">📧</span>
                    <div>
                        <div class="text-xs text-gray-500 uppercase tracking-wide font-medium">Email</div>
                        <div class="font-semibold text-gray-800 text-sm">{{ __('app.about_email') }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 rounded-xl border border-pink-100 bg-pink-50">
                    <span class="text-3xl">📸</span>
                    <div>
                        <div class="text-xs text-gray-500 uppercase tracking-wide font-medium">Instagram</div>
                        <div class="font-semibold text-gray-800 text-sm">{{ __('app.about_instagram') }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 rounded-xl border border-blue-100 bg-blue-50">
                    <span class="text-3xl">🌐</span>
                    <div>
                        <div class="text-xs text-gray-500 uppercase tracking-wide font-medium">Website</div>
                        <div class="font-semibold text-gray-800 text-sm">{{ __('app.about_website') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
