<x-filament-panels::page>
    {{-- Header Info --}}
    <div class="rounded-xl bg-gradient-to-r from-green-700 to-teal-600 p-6 text-white mb-6 shadow">
        <div class="flex items-center gap-4">
            <span class="text-4xl">🌳</span>
            <div>
                <h2 class="text-2xl font-bold">Daftar Pohon Khas Kalimantan Barat</h2>
                <p class="text-green-100 mt-1">5 spesies pohon yang dirawat di lingkungan SMK Karya Bangsa Sintang</p>
                <p class="text-green-200 text-xs mt-1">📌 Data statis — disimpan sebagai PHP Array (tanpa database)</p>
            </div>
        </div>
    </div>

    {{-- Tabel Tanaman dari Static Collection --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="bg-green-600 px-5 py-3 flex items-center justify-between">
            <h3 class="text-white font-semibold text-lg">🌿 Static Collection — 5 Pohon Khas Sintang</h3>
            <span class="bg-white/20 text-white text-sm px-3 py-1 rounded-full">
                {{ count($this->getTanaman()) }} Pohon
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-green-50 dark:bg-green-900/30">
                    <tr>
                        <th class="text-left py-3 px-4 text-green-800 dark:text-green-300 font-semibold">No.</th>
                        <th class="text-left py-3 px-4 text-green-800 dark:text-green-300 font-semibold">Nama Pohon</th>
                        <th class="text-left py-3 px-4 text-green-800 dark:text-green-300 font-semibold">Nama Latin / Jenis</th>
                        <th class="text-left py-3 px-4 text-green-800 dark:text-green-300 font-semibold">Lokasi di Sekolah</th>
                        <th class="text-left py-3 px-4 text-green-800 dark:text-green-300 font-semibold">Tinggi</th>
                        <th class="text-left py-3 px-4 text-green-800 dark:text-green-300 font-semibold">Manfaat</th>
                        <th class="text-left py-3 px-4 text-green-800 dark:text-green-300 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($this->getTanaman() as $tanaman)
                        <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors">
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/50 text-green-800 dark:text-green-300 font-bold text-sm">
                                    {{ $tanaman['id'] }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl">🌳</span>
                                    <div>
                                        <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $tanaman['nama'] }}</p>
                                        <p class="text-xs text-gray-400">{{ $tanaman['jenis'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <p class="text-gray-700 dark:text-gray-300 italic text-xs">{{ $tanaman['nama_latin'] }}</p>
                                <p class="text-gray-500 dark:text-gray-400 text-xs font-medium mt-1">{{ $tanaman['jenis'] }}</p>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-1">
                                    <span>📍</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $tanaman['lokasi'] }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-gray-600 dark:text-gray-400">{{ $tanaman['tinggi'] }}</span>
                            </td>
                            <td class="py-4 px-4 max-w-xs">
                                <p class="text-gray-700 dark:text-gray-300 text-xs leading-relaxed">{{ $tanaman['manfaat'] }}</p>
                            </td>
                            <td class="py-4 px-4">
                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $tanaman['status_color'] }}">
                                    {{ $tanaman['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-gray-50 dark:bg-gray-800/50 px-5 py-3 border-t border-gray-100 dark:border-gray-700">
            <p class="text-xs text-gray-500 dark:text-gray-400">
                💡 <strong>Catatan Teknis:</strong> Data pohon di atas disimpan sebagai <code class="bg-gray-100 dark:bg-gray-700 px-1 rounded">PHP Array</code> 
                di dalam class <code class="bg-gray-100 dark:bg-gray-700 px-1 rounded">InformasiTanaman.php</code>. 
                Tidak ada query ke database — data dirender langsung dari memori ke tampilan Blade.
            </p>
        </div>
    </div>

    {{-- Legend Status --}}
    <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-3">
        <div class="rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 p-3 flex items-center gap-2">
            <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-green-100 text-green-800">Sangat Baik</span>
            <p class="text-xs text-green-700 dark:text-green-300">Tumbuhan sehat, pertumbuhan optimal</p>
        </div>
        <div class="rounded-lg bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 p-3 flex items-center gap-2">
            <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-blue-100 text-blue-800">Baik</span>
            <p class="text-xs text-blue-700 dark:text-blue-300">Tumbuhan sehat, perlu monitoring rutin</p>
        </div>
        <div class="rounded-lg bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 p-3 flex items-center gap-2">
            <span class="rounded-full px-2 py-0.5 text-xs font-semibold bg-orange-100 text-orange-800">Perlu Perhatian</span>
            <p class="text-xs text-orange-700 dark:text-orange-300">Butuh perawatan ekstra dan perlindungan</p>
        </div>
    </div>
</x-filament-panels::page>

