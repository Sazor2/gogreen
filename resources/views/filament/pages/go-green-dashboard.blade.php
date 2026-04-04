<x-filament-panels::page>
    {{-- Hero Banner --}}
    <div class="rounded-2xl bg-gradient-to-r from-green-600 to-emerald-500 p-8 text-white mb-6 shadow-lg">
        <div class="flex items-center gap-4">
            <span class="text-5xl">🌿</span>
            <div>
                <h1 class="text-3xl font-bold">{{ __('app.hero_title') }}</h1>
                <p class="text-green-100 mt-1 text-lg">{{ __('app.filament_dashboard_subtitle') }}</p>
                <p class="text-green-200 text-sm mt-1">📍 {{ __('app.profil_lokasi') }} &bull; {{ __('app.filament_date_label') }} {{ now()->translatedFormat('d F Y') }}</p>
            </div>
        </div>
    </div>

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        @foreach($this->getStats() as $stat)
            <div class="rounded-xl border-l-4 p-5 shadow-sm {{ $stat['color'] }}">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium {{ $stat['text'] }} opacity-80">{{ $stat['label'] }}</p>
                        <p class="text-2xl font-bold {{ $stat['text'] }} mt-1">{{ $stat['value'] }}</p>
                        <p class="text-xs {{ $stat['text'] }} opacity-70 mt-1">{{ $stat['description'] }}</p>
                    </div>
                    <span class="text-4xl">{{ $stat['icon'] }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Agenda Kegiatan --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-green-600 px-5 py-3">
                <h2 class="text-white font-semibold text-lg">📋 {{ __('app.agenda_title') }}</h2>
            </div>
            <div class="p-4">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-100 dark:border-gray-700">
                            <th class="text-left py-2 px-2 text-gray-500 dark:text-gray-400 font-medium">{{ __('app.agenda_tanggal') }}</th>
                            <th class="text-left py-2 px-2 text-gray-500 dark:text-gray-400 font-medium">{{ __('app.agenda_kegiatan') }}</th>
                            <th class="text-left py-2 px-2 text-gray-500 dark:text-gray-400 font-medium">{{ __('app.agenda_status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($this->getAgenda() as $item)
                            <tr class="border-b border-gray-50 dark:border-gray-700 hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors">
                                <td class="py-3 px-2 text-gray-600 dark:text-gray-300 whitespace-nowrap">
                                    📅 {{ $item['tanggal'] }}
                                </td>
                                <td class="py-3 px-2 text-gray-800 dark:text-gray-200 font-medium">
                                    {{ $item['kegiatan'] }}
                                </td>
                                <td class="py-3 px-2">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $item['badge'] }}">
                                        {{ $item['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Info Sekolah --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-emerald-600 px-5 py-3">
                <h2 class="text-white font-semibold text-lg">🏫 {{ __('app.profil_title') }}</h2>
            </div>
            <div class="p-5 space-y-3">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">🏫</span>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ __('app.profil_nama') }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('app.profil_jenis') }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl">📍</span>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ __('app.profil_lokasi') }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('app.profil_lokasi_sub') }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl">🌿</span>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ __('app.profil_program') }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('app.profil_program_sub') }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <span class="text-2xl">🎯</span>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-gray-100">{{ __('app.profil_visi') }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('app.profil_visi_sub') }}</p>
                    </div>
                </div>
                <div class="mt-4 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 p-4">
                    <p class="text-green-800 dark:text-green-200 text-sm font-medium text-center">
                        🌱 {{ __('app.motto_line1') }} {{ __('app.motto_line2') }} 🌱
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>

