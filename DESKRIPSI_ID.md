# 🌿 Green School Tracker
### Aplikasi Web Pelacak Program Penghijauan Sekolah
**SMK Karya Bangsa Sintang** | Dibangun dengan Laravel 12 + Filament v5

---

## 📌 Tentang Aplikasi

**Green School Tracker** adalah aplikasi web yang dirancang untuk mendukung program penghijauan dan pengelolaan lingkungan di SMK Karya Bangsa Sintang, Kalimantan Barat. Aplikasi ini membantu sekolah dalam memantau perkembangan tanaman, mengelola informasi pohon khas daerah, serta mengedukasi siswa tentang daur ulang sampah melalui fitur kalkulator bank sampah.

Aplikasi ini dibangun tanpa ketergantungan database, sehingga sangat ringan, mudah dijalankan, dan cocok digunakan sebagai media pembelajaran maupun presentasi langsung.

---

## 🎯 Tujuan

- Mendukung program **Go Green** di lingkungan sekolah
- Mendata dan melestarikan **pohon-pohon khas Kalimantan** di area sekolah
- Mengedukasi siswa tentang **pengelolaan sampah** dan sistem poin bank sampah
- Menjadi contoh aplikasi web modern yang sederhana namun fungsional

---

## 🚀 Fitur Utama

### 1. 📊 Dashboard Go Green
Halaman utama yang menampilkan statistik program penghijauan sekolah secara ringkas, meliputi:
- Total pohon yang telah ditanam
- Luas area penghijauan
- Jumlah spesies tanaman
- Status kesehatan tanaman secara keseluruhan

### 2. 🌳 Manajemen Tanaman
Menampilkan daftar lengkap pohon khas Kalimantan yang ada di area sekolah, dengan informasi:
- Nama lokal dan nama latin
- Jenis / famili tanaman
- Lokasi penanaman di sekolah
- Manfaat ekologis dan ekonomis
- Perkiraan tinggi pohon
- Status kesehatan tanaman

**5 Pohon Khas Sintang yang Terdaftar:**
| Nama | Nama Latin | Keunikan |
|---|---|---|
| Tengkawang | *Shorea stenoptera* | Penghasil minyak nabati |
| Jelutung | *Dyera costulata* | Penyerap karbon tertinggi |
| Meranti Merah | *Shorea lepidota* | Kayu konstruksi premium |
| Rambutan Hutan | *Nephelium lappaceum* | Buah & habitat satwa liar |
| Ulin (Kayu Besi) | *Eusideroxylon zwageri* | Pohon paling langka di Kalimantan |

### 3. ♻️ Kalkulator Bank Sampah
Alat bantu kalkulasi poin untuk program bank sampah sekolah. Pengguna memasukkan jenis dan berat sampah, kemudian sistem menghitung poin yang diperoleh berdasarkan tabel nilai berikut:

| Jenis Sampah | Poin per Kg |
|---|---|
| Plastik | 50 poin |
| Kertas | 30 poin |
| Logam | 80 poin |
| Kaca | 40 poin |
| Organik | 20 poin |
| Elektronik | 100 poin |

---

## 🛠️ Teknologi yang Digunakan

| Komponen | Teknologi |
|---|---|
| Backend Framework | Laravel 12 |
| Admin Panel | Filament v5 |
| Frontend Reaktif | Livewire 3 |
| Styling | Tailwind CSS |
| Bahasa Pemrograman | PHP 8.2+ |
| Penyimpanan Data | PHP Array (tanpa database) |
| Session & Cache | File System |

---

## ⚙️ Cara Menjalankan

```bash
# 1. Install dependensi
composer install
npm install

# 2. Build aset frontend
npm run build

# 3. Jalankan server
php artisan serve
```

> **Catatan:** Tidak perlu menjalankan `php artisan migrate` karena aplikasi ini tidak menggunakan database.

Jika menggunakan **Laravel Herd**, akses langsung via:
```
http://gogreen.test
```

### URL Halaman:
| Halaman | URL |
|---|---|
| Beranda / Landing Page | `/` |
| Dashboard Go Green | `/admin` |
| Manajemen Tanaman | `/admin/informasi-tanaman` |
| Kalkulator Bank Sampah | `/admin/kalkulator-bank-sampah` |

---

## 🏫 Tentang Sekolah

Aplikasi ini dikembangkan untuk **SMK Karya Bangsa Sintang**, sebuah sekolah menengah kejuruan yang berkomitmen terhadap kelestarian lingkungan dan pendidikan berbasis ekologi di Sintang, Kalimantan Barat.

---

*🌿 Bersama menjaga lingkungan, bersama membangun masa depan.*
