# 📝 PENJELASAN LOGIKA — Green School Tracker
### SMK Karya Bangsa Sintang | Laravel 12 + Filament v5 (Tanpa Database)

---

## 🔍 Konsep Utama: Aplikasi Tanpa Database

Aplikasi ini sengaja **tidak menggunakan database (MySQL/SQLite/dll)**. Semua data diproses di dalam **memori PHP** — didefinisikan langsung sebagai array di dalam controller. Pendekatan ini cocok untuk:
- Prototype / simulasi cepat
- Presentasi tanpa perlu setup database
- Belajar arsitektur MVC Laravel tanpa ketergantungan infrastruktur

---

## 🏗️ Struktur Modul

Seluruh halaman web diakses melalui **route publik** (`routes/web.php`), dikontrol oleh `GreenController`. File-file di `app/Filament/Pages/` adalah kode pendukung logika data yang dipanggil oleh controller — **bukan** panel admin tersendiri yang aktif.

| Modul | Controller/File | Cara Data Disimpan |
|---|---|---|
| Beranda / Dashboard | `GreenController@dashboard` | PHP Array (hardcoded) |
| Informasi Tanaman | `GreenController@tanaman` | Static Collection (PHP Arra|
| Kalkulator Bank Sampah | `GreenController@kalkulator` + `@hitungSampah` | PHP y) Array + session |
| Profil Sekolah | `GreenController@profilSekolah` | File bahasa (`lang/`) |
| Tentang & Latar Belakang | `GreenController@about` + `@latarBelakang` | Blade view statis |

---

## 📂 Modul 1: Beranda / Dashboard

### File:
- `app/Http/Controllers/GreenController.php` → method `dashboard()`
- `resources/views/pages/dashboard.blade.php`

### Logika Data:
```php
// Data statistik disimpan sebagai PHP Array biasa
public function getStats(): array
{
    return [
        ['label' => 'Total Pohon', 'value' => '5', ...],
        ['label' => 'Area Penghijauan', 'value' => '1.200 m²', ...],
        // dst...
    ];
}
```
Data ini **tidak diambil dari database**. Setiap kali halaman diload, PHP langsung mengembalikan array yang sudah didefinisikan di dalam method. Di Blade view, array ini di-loop dengan `@foreach`.

---

## 📂 Modul 2: Informasi Tanaman

### File:
- `app/Http/Controllers/GreenController.php` → method `tanaman()`
- `resources/views/pages/tanaman.blade.php`

### Logika Data (Static Collection):
```php
public function getTanaman(): array
{
    return [
        [
            'id'         => 1,
            'nama'       => 'Tengkawang',
            'nama_latin' => 'Shorea stenoptera',
            'jenis'      => 'Dipterocarpaceae',
            'lokasi'     => 'Taman Depan Sekolah',
            'manfaat'    => 'Biji menghasilkan minyak nabati...',
            'tinggi'     => '± 30 meter',
            'status'     => 'Sangat Baik',
        ],
        // 4 pohon lainnya...
    ];
}
```

### Cara Kerja:
1. **GreenController** mengirim data dari array ke view via `compact()`
2. Blade template menerima data dan me-render **tabel HTML** menggunakan `@foreach`
3. **Tidak ada query SQL** — data langsung dari PHP memory
4. Setiap request, PHP mengembalikan array yang sama (data konsisten)

### 5 Pohon Khas Sintang yang Dipilih:
| Nama | Nama Latin | Keunikan |
|---|---|---|
| Tengkawang | Shorea stenoptera | Pohon penghasil minyak nabati |
| Jelutung | Dyera costulata | Penyerap karbon tertinggi |
| Meranti Merah | Shorea lepidota | Kayu konstruksi premium |
| Rambutan Hutan | Nephelium lappaceum | Buah & habitat satwa |
| Ulin (Kayu Besi) | Eusideroxylon zwageri | Pohon paling langka di Kalimantan |

---

## 📂 Modul 3: Kalkulator Bank Sampah

### File:
- `app/Http/Controllers/GreenController.php` → method `kalkulator()` dan `hitungSampah()`
- `resources/views/pages/kalkulator.blade.php`

### State Management (Form POST):
```php
// GreenController — menerima data dari form HTML
public function hitungSampah(Request $request)
{
    $jenis = $request->input('jenis');
    $berat = $request->input('berat');
    // ...
}
```

### Logika Kalkulasi:
```php
public function hitung(): void
{
    $validated = $this->form->getState(); // ambil data dari form

    // Tabel poin/kg — hardcoded array, BUKAN query database
    $poinPerKg = [
        'plastik'    => 50,
        'kertas'     => 30,
        'logam'      => 80,
        'kaca'       => 40,
        'organik'    => 20,
        'elektronik' => 100,
    ];

    $poin = $poinPerKg[$jenis] * $berat;

    // Hasil dikembalikan ke view via compact()
    // Tidak ada INSERT INTO database
    return view('pages.kalkulator', compact('hasilPoin', 'pesanHasil', ...));
}
```

### Alur Data:
```
User Input (Browser Form)
    → POST /kalkulator
        → GreenController@hitungSampah()
            → Kalkulasi dengan PHP Array
                → Return view dengan hasil
                    → Tampilkan hasil di browser
```

**Data TIDAK persisten** — jika halaman di-refresh, hasil kalkulasi hilang. Ini sesuai dengan requirement "Action Only" (tidak menyimpan ke database).

---

## ⚙️ Konfigurasi Tanpa Database

### .env yang diubah:
```env
# DB dinonaktifkan
# DB_CONNECTION=null

# Session menggunakan file system (bukan database)
SESSION_DRIVER=file

# Cache menggunakan file system
CACHE_STORE=file

# Queue menggunakan sync (tidak perlu workers)
QUEUE_CONNECTION=sync
```

---

## 🚀 Cara Menjalankan Aplikasi

### Tanpa `php artisan migrate`!

```bash
# 1. Install dependencies (sudah dilakukan)
composer install
npm install

# 2. Build frontend assets
npm run build

# 3. Jalankan server
php artisan serve
```

### Atau gunakan Laravel Herd:
Jika menggunakan Laravel Herd, akses langsung via:
```
http://gogreen.test
```

### URL Halaman:
| Halaman | URL |
|---|---|
| Beranda | `/` |
| Informasi Tanaman | `/tanaman` |
| Kalkulator Bank Sampah | `/kalkulator` |
| Tentang | `/tentang` |
| Latar Belakang | `/latar-belakang` |
| Profil Sekolah | `/profil-sekolah` |

---

## 🎨 Tema Go Green

Tema hijau diterapkan langsung menggunakan **Tailwind CSS** di seluruh halaman publik. Warna utama yang dipakai adalah palet `emerald` dan `green` dari Tailwind:

```html
<!-- Contoh di layout / navbar -->
<nav class="bg-emerald-900/90 ...">
<span class="text-primary">...</span>
```

Aset visual lokal yang digunakan:
| Aset | File | Keterangan |
|---|---|---|
| Logo brand | `public/images/logo-removebg-preview.png` | Header (75px) & Footer (70px) |
| Background hero | `public/images/begeron.jpeg` | Banner utama halaman beranda |

---

## 📊 Perbandingan Arsitektur

| Aspek | Aplikasi Normal (dengan DB) | Green School Tracker (tanpa DB) |
|---|---|---|
| Data Source | MySQL / SQLite | PHP Array |
| Persistence | Permanent (DB) | Temporary (Memory) |
| Query | Eloquent ORM | Tidak ada |
| Session | DB / Redis | File system |
| Auth | DB users table | Tidak ada |
| Migration | Wajib | **Tidak diperlukan** |

---

*Dibuat untuk simulasi pembelajaran — SMK Karya Bangsa Sintang 🌿*
