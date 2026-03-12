<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class GoGreenDashboard extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;
    protected static ?string $navigationLabel = 'Dashboard Go Green';
    protected static ?string $title = 'Dashboard Go Green';
    protected static ?int $navigationSort = 1;
    protected string $view = 'filament.pages.go-green-dashboard';

    /**
     * Data statistik lingkungan sekolah (hardcoded array - tanpa database)
     */
    public function getStats(): array
    {
        return [
            [
                'label' => 'Total Pohon Tercatat',
                'value' => '5',
                'description' => 'Pohon khas Kalimantan Barat di area sekolah',
                'icon' => '🌳',
                'color' => 'bg-green-100 border-green-400',
                'text' => 'text-green-800',
            ],
            [
                'label' => 'Area Penghijauan',
                'value' => '1.200 m²',
                'description' => 'Luas taman dan area hijau sekolah',
                'icon' => '🏫',
                'color' => 'bg-emerald-100 border-emerald-400',
                'text' => 'text-emerald-800',
            ],
            [
                'label' => 'Estimasi CO₂ Tersimpan',
                'value' => '250 kg/thn',
                'description' => 'Perkiraan karbon tersimpan oleh pohon',
                'icon' => '💨',
                'color' => 'bg-teal-100 border-teal-400',
                'text' => 'text-teal-800',
            ],
            [
                'label' => 'Total Poin Bank Sampah',
                'value' => '1.850 Poin',
                'description' => 'Akumulasi poin bank sampah sekolah',
                'icon' => '♻️',
                'color' => 'bg-yellow-100 border-yellow-400',
                'text' => 'text-yellow-800',
            ],
            [
                'label' => 'Kegiatan Go Green',
                'value' => '12 Kegiatan',
                'description' => 'Kegiatan lingkungan hidup tahun ini',
                'icon' => '📋',
                'color' => 'bg-lime-100 border-lime-400',
                'text' => 'text-lime-800',
            ],
            [
                'label' => 'Siswa Aktif',
                'value' => '320 Siswa',
                'description' => 'Siswa yang ikut program Go Green',
                'icon' => '👨‍🎓',
                'color' => 'bg-green-100 border-green-400',
                'text' => 'text-green-800',
            ],
        ];
    }

    /**
     * Agenda kegiatan hardcoded (simulasi, tanpa database)
     */
    public function getAgenda(): array
    {
        return [
            ['tanggal' => '10 Mar 2026', 'kegiatan' => 'Penanaman Pohon Serentak', 'status' => 'Mendatang', 'badge' => 'bg-blue-100 text-blue-800'],
            ['tanggal' => '15 Mar 2026', 'kegiatan' => 'Lomba Daur Ulang Sampah', 'status' => 'Mendatang', 'badge' => 'bg-blue-100 text-blue-800'],
            ['tanggal' => '20 Feb 2026', 'kegiatan' => 'Pembersihan Sungai Kapuas', 'status' => 'Selesai', 'badge' => 'bg-green-100 text-green-800'],
            ['tanggal' => '05 Feb 2026', 'kegiatan' => 'Sosialisasi Bank Sampah', 'status' => 'Selesai', 'badge' => 'bg-green-100 text-green-800'],
        ];
    }
}
