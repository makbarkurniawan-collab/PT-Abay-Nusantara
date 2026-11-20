# PT Abay Kopi Nusantara

Website katalog kopi nusantara dengan Laravel 11, PHP 8.2+, Bootstrap 5, dan SQLite bawaan (MySQL juga dapat digunakan).

## Instalasi di Windows

PHP 8.2.30 tersedia di `%LOCALAPPDATA%\Programs\PHP\8.2.30`. Pada VS Code, pengaturan workspace otomatis menambahkan PHP ini ke depan `PATH` terminal Windows. **Tutup terminal VS Code yang sudah terbuka, lalu buka terminal baru** dari folder project. Verifikasi sebelum menjalankan perintah:

```powershell
php -v
where.exe php
```

Versi pertama yang ditampilkan harus PHP 8.2 atau lebih baru, dengan lokasi PHP lokal project di urutan pertama. Jika menjalankan di terminal luar VS Code, aktifkan PHP secara manual:

```powershell
$env:PATH = "$env:LOCALAPPDATA\Programs\PHP\8.2.30;$env:PATH"
```

PHP memerlukan ekstensi `fileinfo`, `mbstring`, `openssl`, `pdo_sqlite` (atau `pdo_mysql`), serta Composer.

Jalankan dari folder project:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
New-Item -ItemType File -Path database\database.sqlite -Force
php artisan migrate --seed
php artisan storage:link
npm install
npm run build
php artisan serve
```

Buka `http://127.0.0.1:8000`. Untuk pengembangan frontend dengan hot reload, jalankan `npm run dev` di terminal kedua sebagai pengganti `npm run build`. SQLite menggunakan `database/database.sqlite`; jika file belum ada, buat file kosong tersebut sebelum migrasi. Untuk MySQL, buat database `laravel` lewat phpMyAdmin (collation `utf8mb4_unicode_ci`), lalu sesuaikan `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env`. Setelah mengubah `.env`, jalankan `php artisan config:clear` kemudian `php artisan migrate --seed`. Jangan jalankan `migrate:fresh` pada database yang berisi data penting.

## Admin

- URL: `http://127.0.0.1:8000/admin/login`
- Email: `admin@umkm.test`
- Kata sandi: `password`

Ubah kredensial bawaan sebelum aplikasi dipublikasikan. Admin dapat mengelola produk dan kategori pada panel `/admin`.

## Akun pelanggan

Pelanggan dapat membuat akun di `/register`, masuk melalui `/login`, dan keluar melalui tombol Logout (`POST /logout`). Akun hasil registrasi tidak mendapatkan akses admin.

## Gambar dan pengujian

Seeder membuat enam placeholder SVG di `storage/app/public/products`. `storage:link` memublikasikannya melalui `/storage`. Letakkan aset asli di `public/images/logo.svg` dan `public/images/favicon.svg`. Logo akan tampil jika tersedia, sementara favicon baru ditautkan saat file-nya ada.

Jalankan pengujian dengan `php artisan test`.
