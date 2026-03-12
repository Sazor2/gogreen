<x-filament-panels::page>
    {{-- Hero Header --}}
    <div class="rounded-xl bg-gradient-to-r from-emerald-600 to-green-500 p-6 text-white mb-6 shadow">
        <div class="flex items-center gap-4">
            <span class="text-4xl">♻️</span>
            <div>
                <h2 class="text-2xl font-bold">Kalkulator Bank Sampah</h2>
                <p class="text-green-100 mt-1">Hitung poin dari sampah yang kamu kumpulkan — real-time, tanpa menyimpan ke database</p>
                <p class="text-green-200 text-xs mt-1">⚡ Hasil kalkulasi diproses di Livewire memory (session state)</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Form Kalkulator --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-green-600 px-5 py-3">
                <h3 class="text-white font-semibold text-lg">📝 Input Data Sampah</h3>
            </div>
            <div class="p-6">
                <form wire:submit="hitung">
                    {{ $this->form }}

                    <div class="mt-6 flex gap-3">
                        <button
                            type="submit"
                            class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 shadow-sm"
                        >
                            ♻️ Hitung Poin!
                        </button>
                        <button
                            type="button"
                            wire:click="resetForm"
                            class="px-4 py-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium rounded-lg transition-colors duration-200"
                        >
                            🔄 Reset
                        </button>
                    </div>
                </form>

                {{-- Hasil Kalkulasi (tampil real-time via Livewire) --}}
                @if($this->hasilPoin !== null)
                    <div class="mt-6 rounded-xl bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/30 dark:to-emerald-900/30 border-2 border-green-400 dark:border-green-600 p-5">
                        <div class="text-center">
                            <p class="text-5xl font-black text-green-700 dark:text-green-300">
                                {{ number_format($this->hasilPoin, 0, ',', '.') }}
                            </p>
                            <p class="text-green-600 dark:text-green-400 font-bold text-lg mt-1">POIN</p>
                            <p class="text-gray-700 dark:text-gray-300 mt-3 text-sm">{{ $this->pesanHasil }}</p>
                            <div class="mt-4 inline-block bg-green-600 text-white rounded-full px-6 py-2 font-bold text-lg">
                                {{ $this->kategoriHasil }}
                            </div>
                        </div>

                        <div class="mt-4 bg-white/60 dark:bg-gray-800/60 rounded-lg p-3 text-center">
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                💡 <strong>Catatan:</strong> Hasil ini hanya ditampilkan di layar.
                                Data <strong>tidak disimpan</strong> ke database — hanya ada di Livewire session memory.
                            </p>
                        </div>
                    </div>
                @else
                    <div class="mt-6 rounded-xl bg-gray-50 dark:bg-gray-700/50 border border-dashed border-gray-300 dark:border-gray-600 p-8 text-center">
                        <p class="text-4xl mb-3">♻️</p>
                        <p class="text-gray-500 dark:text-gray-400 font-medium">Isi form dan klik "Hitung Poin!"</p>
                        <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Hasil akan muncul di sini secara real-time</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Tabel Referensi Poin --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-emerald-600 px-5 py-3">
                <h3 class="text-white font-semibold text-lg">📊 Tabel Poin per Kg Sampah</h3>
            </div>
            <div class="p-4">
                <table class="w-full text-sm">
                    <thead class="bg-emerald-50 dark:bg-emerald-900/30">
                        <tr>
                            <th class="text-left py-2 px-3 text-emerald-800 dark:text-emerald-300 font-semibold">Jenis Sampah</th>
                            <th class="text-center py-2 px-3 text-emerald-800 dark:text-emerald-300 font-semibold">Poin/kg</th>
                            <th class="text-left py-2 px-3 text-emerald-800 dark:text-emerald-300 font-semibold">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($this->getTabelPoin() as $row)
                            <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-colors">
                                <td class="py-3 px-3">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl">{{ $row['icon'] }}</span>
                                        <span class="font-medium text-gray-800 dark:text-gray-200">{{ $row['jenis'] }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-3 text-center">
                                    <span class="inline-block bg-green-100 dark:bg-green-900/50 text-green-800 dark:text-green-300 font-bold px-3 py-1 rounded-full">
                                        {{ $row['poin'] }} poin
                                    </span>
                                </td>
                                <td class="py-3 px-3 text-gray-500 dark:text-gray-400 text-xs">
                                    {{ $row['keterangan'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Reward System --}}
            <div class="border-t border-gray-100 dark:border-gray-700 p-4">
                <h4 class="font-semibold text-gray-700 dark:text-gray-300 mb-3">🏆 Sistem Reward</h4>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm">
                        <span>🥇</span>
                        <span class="text-gray-700 dark:text-gray-300"><strong>Green Champion!</strong> — ≥ 500 poin</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <span>🥈</span>
                        <span class="text-gray-700 dark:text-gray-300"><strong>Eco Warrior</strong> — 200–499 poin</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <span>🥉</span>
                        <span class="text-gray-700 dark:text-gray-300"><strong>Green Starter</strong> — 100–199 poin</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <span>🌱</span>
                        <span class="text-gray-700 dark:text-gray-300"><strong>Keep Going!</strong> — < 100 poin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>

