Prompt: Pengembangan "Green School Tracker" (Tanpa Database)
Target: SMK Karya Bangsa Sintang

Stack: Laravel 12, Filament 4, PHP Array/Session (No Database)

Tema: Go Green & Sustainability

1. Konsep "No-Database"
Instruksi: Jangan membuat file migrasi (database/migrations). Gunakan Filament Custom Pages dan simpan data secara sementara menggunakan Laravel Session atau Collection Hardcoded untuk keperluan simulasi.

2. Struktur Menu & Modul
Buatlah navigasi di Panel Filament yang mencakup:

Dashboard Go Green: Menampilkan ringkasan status lingkungan sekolah (data diambil dari array).

Manajemen Tanaman (Mock Data):

List tanaman menggunakan Filament Tables yang datanya bersumber dari Static Collection.

Fitur: Lihat detail pohon (Nama, Jenis, Lokasi di SMK Karya Bangsa).

Kalkulator Bank Sampah (Action Only):

Halaman formulir (Custom Page) untuk menghitung poin sampah tanpa menyimpannya ke database.

Input: Jenis Sampah, Berat (kg).

Output: Menampilkan hasil kalkulasi poin secara real-time di layar.

3. Implementasi Teknikal
Custom Page: Gunakan php artisan make:filament-page untuk membuat halaman input.

State Management: Gunakan properti $data di Livewire (komponen utama Filament) untuk menyimpan input user selama session aktif.

UI/UX: Desain tampilan harus bernuansa hijau (Go Green) menggunakan Tailwind CSS yang ada di Filament.

4. Aturan Dokumentasi (WAJIB)
Setiap modul selesai, AI harus membuat file PENJELASAN_LOGIKA.md.

Karena tidak ada database, jelaskan bagaimana data diproses di dalam memori/session agar saya bisa mempelajarinya.

Sertakan cara menjalankan aplikasi tanpa perlu melakukan php artisan migrate.

5. Tugas Pertama
Tolong buatkan struktur dasar proyek Laravel 12. Karena tidak menggunakan database, hapus konfigurasi DB di .env (set ke null) dan buatkan satu Filament Custom Page pertama bernama InformasiTanaman yang menampilkan daftar 5 pohon khas Sintang dalam bentuk tabel statis.