# Aplikasi Persewaan Mobil

Aplikasi Persewaan Mobil adalah aplikasi untuk mengelola peminjaman dan pengembalian mobil. Aplikasi ini memungkinkan pengguna untuk mendaftar, menambahkan mobil ke dalam sistem, melakukan peminjaman, mengembalikan mobil, dan melihat daftar peminjaman.

## Teknologi yang Digunakan

Aplikasi ini dibangun dengan menggunakan teknologi sebagai berikut:

-   Laravel 10 : Framework PHP yang digunakan untuk mengembangkan aplikasi web.
-   PostgreSQL: Basis data relasional
-   Blade: Sintaks template engine Laravel yang digunakan untuk membuat tampilan aplikasi.

## Instalasi

Berikut adalah langkah-langkah untuk menjalankan aplikasi ini secara lokal:

1. Pastikan Anda memiliki PHP, Composer, dan MySQL diinstal pada sistem Anda.

2. Clone repositori ini ke dalam direktori lokal Anda:

    ```
    git clone https://github.com/icip1998/aplikasi_penyewaan_mobil.git
    ```

3. Masuk ke direktori proyek:

    ```
    cd aplikasi_penyewaan_mobil
    ```

4. Salin file `.env.example` menjadi `.env`:

    ```
    cp .env.example .env
    ```

5. Buat basis data baru di MySQL untuk proyek ini.

6. Buka file `.env` dan konfigurasikan koneksi basis data sesuai dengan pengaturan MySQL lokal Anda:

    ```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=aplikasi_penyewaan_mobil
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. Jalankan perintah berikut untuk menginstal dependensi proyek:

    ```
    composer install
    ```

8. Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

    ```
    php artisan key:generate
    ```

9. Jalankan perintah berikut untuk menjalankan migrasi dan membuat tabel dalam basis data:

    ```
    php artisan migrate
    ```

10. Jalankan perintah berikut untuk menjalankan aplikasi pada server lokal:

```
php artisan serve
```

11. Buka browser dan akses URL `http://localhost:8000` untuk melihat aplikasi .

## Kontribusi

Kontribusi dipersilakan! Jika Anda menemukan masalah atau memiliki saran, silakan buat _issue_ atau ajukan _pull request_.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---
