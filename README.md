# Nama Proyek Anda

Deskripsi singkat mengenai proyek ini. Apa tujuannya, teknologi apa yang digunakan, dll.

## Panduan Instalasi Lokal

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan pengembangan lokal.

### Prasyarat

Pastikan perangkat Anda sudah terinstal:
- PHP (versi 8.1 atau lebih baru)
- Composer
- Git
- Database Server (contoh: MySQL, MariaDB)

### Langkah-langkah Instalasi

1.  **Clone Repositori**
    Buka terminal atau Git Bash, arahkan ke direktori kerja Anda, dan jalankan perintah berikut:
    ```bash
    git clone [https://github.com/user/nama-proyek.git](https://github.com/user/nama-proyek.git)
    cd nama-proyek
    ```
    *Ganti `https://github.com/user/nama-proyek.git` dengan URL repositori Anda.*

2.  **Install Dependencies**
    Install semua package PHP yang dibutuhkan oleh proyek dengan Composer.
    ```bash
    composer install
    ```

3.  **Buat File Environment**
    Salin file `.env.example` menjadi `.env`. File ini akan berisi semua konfigurasi proyek Anda.
    ```bash
    cp .env.example .env
    ```

4.  **Generate Kunci Aplikasi**
    Buat kunci enkripsi unik untuk aplikasi Laravel Anda.
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan variabel berikut dengan konfigurasi database lokal Anda.
    
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    **Penting:** Jangan lupa untuk membuat database baru (misalnya `nama_database_anda`) di MySQL atau MariaDB Anda terlebih dahulu.

6.  **Jalankan Migrasi Database**
    Perintah ini akan membuat semua tabel yang dibutuhkan oleh aplikasi di dalam database Anda.
    ```bash
    php artisan migrate
    ```

7.  **Buat Storage Link**
    Buat symbolic link agar file yang diunggah ke `storage` bisa diakses secara publik.
    ```bash
    php artisan storage:link
    ```

8.  **Jalankan Aplikasi**
    Terakhir, jalankan server pengembangan lokal Laravel.
    ```bash
    php artisan serve
    ```
    Aplikasi Anda sekarang akan berjalan dan bisa diakses melalui URL: **http://127.0.0.1:8000**
