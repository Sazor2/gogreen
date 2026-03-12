<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class InformasiTanaman extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;
    protected static ?string $navigationLabel = 'Manajemen Tanaman';
    protected static ?string $title = 'Daftar Tanaman SMK Karya Bangsa Sintang';
    protected static ?int $navigationSort = 2;
    protected string $view = 'filament.pages.informasi-tanaman';

    /**
     * Static Collection: 5 pohon khas Sintang / Kalimantan Barat
     * Data disimpan sebagai PHP Array (tanpa database)
     */
    public function getTanaman(): array
    {
        return [
            [
                'id'        => 1,
                'nama'      => 'Tengkawang',
                'nama_latin'=> 'Shorea stenoptera',
                'jenis'     => 'Dipterocarpaceae',
                'lokasi'    => 'Taman Depan Sekolah',
                'manfaat'   => 'Biji menghasilkan minyak nabati ("green butter"), kayu keras untuk konstruksi',
                'tinggi'    => '± 30 meter',
                'status'    => 'Sangat Baik',
                'status_color' => 'bg-green-100 text-green-800',
            ],
            [
                'id'        => 2,
                'nama'      => 'Jelutung',
                'nama_latin'=> 'Dyera costulata',
                'jenis'     => 'Apocynaceae',
                'lokasi'    => 'Samping Gedung Utama',
                'manfaat'   => 'Getah untuk industri, kayu ringan, penyerap karbon sangat tinggi',
                'tinggi'    => '± 40 meter',
                'status'    => 'Baik',
                'status_color' => 'bg-blue-100 text-blue-800',
            ],
            [
                'id'        => 3,
                'nama'      => 'Meranti Merah',
                'nama_latin'=> 'Shorea lepidota',
                'jenis'     => 'Dipterocarpaceae',
                'lokasi'    => 'Kebun Sekolah Timur',
                'manfaat'   => 'Kayu konstruksi premium, habitat satwa, ikon hutan Kalimantan',
                'tinggi'    => '± 35 meter',
                'status'    => 'Baik',
                'status_color' => 'bg-blue-100 text-blue-800',
            ],
            [
                'id'        => 4,
                'nama'      => 'Rambutan Hutan',
                'nama_latin'=> 'Nephelium lappaceum',
                'jenis'     => 'Sapindaceae',
                'lokasi'    => 'Area Parkir Siswa',
                'manfaat'   => 'Buah dapat dimakan, peneduh alami, menarik keanekaragaman satwa liar',
                'tinggi'    => '± 15 meter',
                'status'    => 'Sangat Baik',
                'status_color' => 'bg-green-100 text-green-800',
            ],
            [
                'id'        => 5,
                'nama'      => 'Ulin (Kayu Besi)',
                'nama_latin'=> 'Eusideroxylon zwageri',
                'jenis'     => 'Lauraceae',
                'lokasi'    => 'Halaman Belakang Sekolah',
                'manfaat'   => 'Kayu paling keras di Kalimantan, tahan air dan rayap, SANGAT LANGKA',
                'tinggi'    => '± 50 meter',
                'status'    => 'Perlu Perhatian',
                'status_color' => 'bg-orange-100 text-orange-800',
            ],
        ];
    }
}
