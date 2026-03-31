<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreenController extends Controller
{
    /**
     * Dashboard — data dari PHP Array hardcoded (tanpa database)
     */
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    /**
     * Halaman Informasi Tanaman — Static Collection 5 pohon khas Sintang
     */
    public function tanaman()
    {
        return view('pages.tanaman');
    }

    /**
     * Halaman Kalkulator Bank Sampah — menampilkan form
     */
    public function kalkulator()
    {
        return view('pages.kalkulator');
    }

    /**
     * Halaman Tentang / About
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Halaman Latar Belakang Masalah
     */
    public function latarBelakang()
    {
        return view('pages.latar-belakang');
    }

    /**
     * Halaman Profil Sekolah
     */
    public function profilSekolah()
    {
        return view('pages.profil-sekolah');
    }

    /**
     * Halaman Contact Us
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Proses kirim pesan kontak — tidak disimpan ke DB, hanya flash pesan sukses
     */
    public function contactSend(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        session()->flash('contact_success', true);
        return redirect()->route('contact');
    }

    /**
     * Language Switcher — simpan locale ke Session
     */
    public function setLanguage(string $locale)
    {
        if (in_array($locale, ['id', 'en'])) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    }

    /**
     * Proses Kalkulator — kalkulasi poin multi-jenis di server memory, tidak disimpan ke DB
     */
    public function hitungSampah(Request $request)
    {
        $normalizeWeight = function ($value) {
            if ($value === null) {
                return $value;
            }

            $clean = str_replace(',', '.', (string) $value);
            $clean = preg_replace('/[^0-9.]/', '', $clean);

            if ($clean === '') {
                return $clean;
            }

            $parts = explode('.', $clean, 3);
            if (count($parts) > 2) {
                $clean = $parts[0] . '.' . $parts[1];
            }

            return $clean;
        };

        $itemsInput = $request->input('items', []);
        if (is_array($itemsInput)) {
            foreach ($itemsInput as $jenis => $berat) {
                if (is_string($berat) || is_numeric($berat)) {
                    $itemsInput[$jenis] = $normalizeWeight($berat);
                }
            }
            $request->merge(['items' => $itemsInput]);
        }

        $request->validate([
            'kelas'   => 'required|string|max:100',
            'items'   => 'required|array',
            'items.*' => 'nullable|numeric|min:0|max:10000',
        ], [
            'kelas.required' => __('app.val_kelas_required'),
        ]);

        // Tabel poin per kg (hardcoded array — tanpa database)
        $poinPerKg = [
            'plastik'    => 50,
            'kertas'     => 30,
            'logam'      => 80,
            'kaca'       => 40,
            'organik'    => 20,
            'elektronik' => 100,
        ];

        $namaJenis = [
            'plastik'    => __('app.jenis_plastik'),
            'kertas'     => __('app.jenis_kertas'),
            'logam'      => __('app.jenis_logam'),
            'kaca'       => __('app.jenis_kaca'),
            'organik'    => __('app.jenis_organik'),
            'elektronik' => __('app.jenis_elektronik'),
        ];

        // Filter hanya item dengan berat > 0 dan jenis valid
        $items = [];
        foreach ($request->input('items', []) as $jenis => $berat) {
            if (array_key_exists($jenis, $poinPerKg) && (float) $berat > 0) {
                $items[$jenis] = (float) $berat;
            }
        }

        if (empty($items)) {
            return back()
                ->withInput()
                ->withErrors(['items' => __('app.val_items_required')]);
        }

        // Hitung poin per jenis
        $detail    = [];
        $totalPoin = 0;
        foreach ($items as $jenis => $berat) {
            $poin       = $poinPerKg[$jenis] * $berat;
            $totalPoin += $poin;
            $detail[]   = [
                'jenis' => $jenis,
                'nama'  => $namaJenis[$jenis],
                'berat' => $berat,
                'poin'  => $poin,
            ];
        }

        // Hitung persentase kontribusi tiap jenis
        foreach ($detail as &$item) {
            $item['persen'] = round(($item['poin'] / $totalPoin) * 100, 1);
        }
        unset($item);

        $kategori = match (true) {
            $totalPoin >= 500 => '🥇 Green Champion!',
            $totalPoin >= 200 => '🥈 Eco Warrior',
            $totalPoin >= 100 => '🥉 Green Starter',
            default           => '🌱 Keep Going!',
        };

        $hasil = [
            'detail'      => $detail,
            'total_poin'  => $totalPoin,
            'total_berat' => array_sum($items),
            'kategori'    => $kategori,
        ];

        return view('pages.kalkulator', compact('hasil'));
    }
}
