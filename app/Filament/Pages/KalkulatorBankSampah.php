<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class KalkulatorBankSampah extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCalculator;
    protected static ?string $navigationLabel = 'Kalkulator Bank Sampah';
    protected static ?string $title = 'Kalkulator Bank Sampah';
    protected static ?int $navigationSort = 3;
    protected string $view = 'filament.pages.kalkulator-bank-sampah';

    /**
     * Properti Livewire untuk menyimpan input form di memory (state management)
     * Data TIDAK disimpan ke database, hanya hidup selama sesi Livewire aktif
     */
    public ?array $data = [];
    public ?float $hasilPoin = null;
    public ?string $pesanHasil = null;
    public string $kategoriHasil = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('jenis_sampah')
                    ->label('Jenis Sampah')
                    ->options([
                        'plastik'    => '🧴 Plastik',
                        'kertas'     => '📄 Kertas / Kardus',
                        'logam'      => '🔩 Logam / Besi / Kaleng',
                        'kaca'       => '🥛 Kaca / Botol',
                        'organik'    => '🌿 Sampah Organik',
                        'elektronik' => '💻 Elektronik (E-Waste)',
                    ])
                    ->required()
                    ->live()
                    ->placeholder('Pilih jenis sampah...'),

                TextInput::make('berat')
                    ->label('Berat Sampah')
                    ->numeric()
                    ->minValue(0.1)
                    ->step(0.1)
                    ->required()
                    ->suffix('kg')
                    ->placeholder('Masukkan berat dalam kg'),
            ])
            ->statePath('data');
    }

    /**
     * Method hitung: memproses kalkulasi poin di Livewire memory
     * Tidak ada INSERT ke database, hasil hanya ditampilkan di UI
     */
    public function hitung(): void
    {
        $validated = $this->form->getState();

        // Tabel poin per kg berdasarkan jenis sampah (hardcoded array)
        $poinPerKg = [
            'plastik'    => 50,
            'kertas'     => 30,
            'logam'      => 80,
            'kaca'       => 40,
            'organik'    => 20,
            'elektronik' => 100,
        ];

        $namaJenis = [
            'plastik'    => 'Plastik',
            'kertas'     => 'Kertas / Kardus',
            'logam'      => 'Logam / Kaleng',
            'kaca'       => 'Kaca / Botol',
            'organik'    => 'Organik',
            'elektronik' => 'Elektronik',
        ];

        $jenis = $validated['jenis_sampah'];
        $berat = (float) $validated['berat'];
        $poin  = $poinPerKg[$jenis] * $berat;

        $this->hasilPoin     = $poin;
        $this->pesanHasil   = sprintf(
            'Kamu mendapatkan %s poin dari %.1f kg sampah %s!',
            number_format($poin, 0, ',', '.'),
            $berat,
            $namaJenis[$jenis]
        );

        // Kategori reward berdasarkan total poin
        $this->kategoriHasil = match (true) {
            $poin >= 500  => '🥇 Green Champion!',
            $poin >= 200  => '🥈 Eco Warrior',
            $poin >= 100  => '🥉 Green Starter',
            default       => '🌱 Keep Going!',
        };
    }

    public function resetForm(): void
    {
        $this->form->fill();
        $this->hasilPoin    = null;
        $this->pesanHasil   = null;
        $this->kategoriHasil = '';
    }

    /**
     * Tabel referensi poin (hardcoded, tanpa database)
     */
    public function getTabelPoin(): array
    {
        return [
            ['jenis' => 'Plastik',           'poin' => 50,  'icon' => '🧴', 'keterangan' => 'Botol, kantong, dll'],
            ['jenis' => 'Kertas / Kardus',   'poin' => 30,  'icon' => '📄', 'keterangan' => 'Buku bekas, kardus'],
            ['jenis' => 'Logam / Kaleng',    'poin' => 80,  'icon' => '🔩', 'keterangan' => 'Besi, aluminium, kaleng'],
            ['jenis' => 'Kaca / Botol',      'poin' => 40,  'icon' => '🥛', 'keterangan' => 'Botol kaca, pecahan kaca'],
            ['jenis' => 'Organik',           'poin' => 20,  'icon' => '🌿', 'keterangan' => 'Sisa makanan, daun'],
            ['jenis' => 'Elektronik',        'poin' => 100, 'icon' => '💻', 'keterangan' => 'HP bekas, baterai, kabel'],
        ];
    }
}
