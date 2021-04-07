<h1 align="center">WarungKita</h1>

## Apa itu WarungKita?

WarungKita adalah sebuah aplikasi order menu pada restoran dengan mudah dan efisien. Sekarang pelanggan tidak perlu repot-repot memanggil waiter untuk menuliskan pesanan, hanya dengan sekali klik pesanan sudah diproses oleh sistem. Cara pembayaran di WarungKita juga mudah, bisa langsung melalui kasir dan bisa melalui transfer bank.

## Siapa saja sih yang memakai aplikasi WarungKita?

-   Administrator
-   Kasir
-   Waiter
-   Owner Restoran
-   Pelanggan

## Dalam pembuatan aplikasi WarungKita, apa saja sih yang dipakai?

Dalam pembuatan aplikasi ini, WarungKita memakai framework PHP yaitu Laravel dan berbagai macam package dan plugin.

| Package                                                                                     | Plugin                                                  | Payment Gateway                                                       | Technology                                                                                                    |
| ------------------------------------------------------------------------------------------- | ------------------------------------------------------- | --------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------- |
| **[realrashid/sweet-alert](https://github.com/realrashid/sweet-alert)**                     | **[michalsnik/aos](https://github.com/michalsnik/aos)** | **[midtrans/midtrans-php](https://github.com/Midtrans/midtrans-php)** | **[Laravel 7](https://laravel.com/https://github.com/Midtrans/midtrans-php)**                                 |
| **[barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)**                   | **[ckeditor/ckeditor4](https://ckeditor.com/)**         |                                                                       | **[HTML](https://github.com/zidanindratama/zidanindratama-1819_rplb_praukk_19_muhamadzidanindratama)**        |
| **[binarytorch/larecipe](https://larecipe.binarytorch.com.my/)**                            | **[tawk.to](https://www.tawk.to/)**                     |                                                                       | **[CSS](https://github.com/zidanindratama/zidanindratama-1819_rplb_praukk_19_muhamadzidanindratama)**         |
| **[darryldecode/laravelshoppingcart](https://github.com/darryldecode/laravelshoppingcart)** | **[disqus](https://disqus.com/)**                       |                                                                       | **[JavaScript](https://github.com/zidanindratama/zidanindratama-1819_rplb_praukk_19_muhamadzidanindratama)**  |
| **[spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog)**             |                                                         |                                                                       | **[Bootstrap 4](https://github.com/zidanindratama/zidanindratama-1819_rplb_praukk_19_muhamadzidanindratama)** |

## Aplikasi WarungKita punya fitur apa saja?

-   Login
-   Register
-   Upload avatar pelanggan
-   Komentar
-   Live chat
-   Notifikasi sweet alert
-   Sistem keranjang
-   Cetak kwitansi
-   Laporan pemasukan
-   Log activity
-   Sistem pembayaran yang terintegrasi dengan Midtrans

## Link demo WarungKita

[WarungKita - Warung Cepat Saji](https://warungkita001.000webhostapp.com/)

## Cara menginstall WarungKita

-   Pastikan komputer atau laptop anda sudah terinstall composer dan gitbash
-   Clone project WarungKita ini (download)
-   Extract file.zip kemudian buka text editor
-   Ketik di terminal atau di command prompt "composer install"
-   Tunggu beberapa saat
-   Nyalakan XAMPP (WAJIB)
-   Buat database dengan nama "rplb_praukk_jidan" di phpmyadmin
-   Extract file databse yang bernama "rplb_praukk_jidan.zip"
-   Import file database yang bernama "rplb_praukk_jidan.sql" ke phpmyadmin
-   Ketik di terminal atau di command prompt "cp .env.example .env"
-   Konfigurasi database di file .env lalu mengganti DB_DATABASE menjadi "rplb_praukk_jidan"
-   Konfigurasi server key midtrans di file .env lalu mengganti MIDTRANS_SERVER_KEY menjadi "server_key_akun_midtrans_anda"
-   Lalu jangan lupa untuk ketik "php artisan key:generate"
-   Untuk jaga-jaga ketik "php artisan cache:clear" dan "php artisan config:clear" di terminal atau di command prompt
-   Kemudian ketik "php artisan serve" di terminal atau di command prompt
-   Lalu buka browser setelah itu ketik "http://127.0.0.1:8000/"
