# KampuskuAja: Sistem Pendaftaran Beasiswa Online

## KampuskuAja
    KampuskuAja adalah sebuah aplikasi web yang dibangun menggunakan framework Laravel dan dilengkapi dengan scaffolding Laravel Breeze. Aplikasi ini dirancang untuk memfasilitasi proses pendaftaran beasiswa secara online bagi mahasiswa. 

**Tujuan Utama:**

* **Pemudahan Proses Pendaftaran:** Memudahkan mahasiswa untuk mendaftar beasiswa secara online tanpa harus melalui proses yang rumit.
* **Evaluasi Berbasis IPK:** Sistem secara otomatis mengevaluasi kelayakan mahasiswa berdasarkan nilai Indeks Prestasi Kumulatif (IPK) yang telah ditentukan.
* **Kelengkapan Data:** Mengumpulkan data mahasiswa yang lengkap dan akurat untuk keperluan verifikasi dan administrasi.

## Cara Penggunaan

1. **Konfigurasi**
   ```bash
    * cp .env.example .env
    * composer install
    * npm install
    * php artisan key:generate
    * php artisan migrate --seed
    * php artisan storage:link
   
1. **Localhost**
   ```bash
   * php artisan serve
   * npm run dev/build
   
## Teknologi yang Digunakan

* **Framework:** Laravel
* **Scaffolding:** Laravel Breeze
* **Database:** MySQL
* **Frontend:** Blade, CSS
* **Backend:** PHP
* **Lainnya:** Bootstrap, Tailwind

## Fitur Utama

* **Halaman Utama:**
    * Login menggunakan NIM
* **Formulir Pendaftaran:**
    * Pengisian data pribadi (nama, email, nomor HP, semester)
    * Validasi data input
    * Unggah berkas persyaratan
    * Sistem evaluasi IPK otomatis
    * Disabilitas fitur tertentu berdasarkan nilai IPK
* **Halaman Hasil Pengajuan:**
    * Tampilan detail data pendaftaran
    * Informasi status pengajuan
