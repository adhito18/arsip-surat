# Aplikasi Web Arsip Surat PDF

## Tujuan
Membantu dalam menyimpan, mengelola, dan mencari surat resmi dalam format PDF, sehingga lebih efisien dan mudah diakses.

## Fitur
- Upload surat resmi dalam format PDF.
- Pencarian surat berdasarkan judul.
- Unduh surat yang telah diarsipkan.
- Manajemen kategori surat.

## Cara Menjalankan
- lakukan `php artisan migrate` untuk membuat tabel bawaan laravel
- lakukan `php artisan storage:link` untuk membuat link dari folder public dan storage
- download dan pasang `arsip_surat.sql` dari repo GitHub
- lakukan `php artisan serve` untuk menjalankan laravel

## Screenshot
### Arsip
![Arsip](screenshot/arsip-index.png)
![Tambah Arsip](screenshot/arsip-tambah.png)
![Hapus Arsip](screenshot/arsip-hapus.png)
![Lihat Detail Arsip](screenshot/arsip-lihat.png)
![Edit Arsip](screenshot/arsip-edit.png)
### Kategori
![Kategori](screenshot/kategori-index.png)
![Tambah Kategori](screenshot/kategori-tambah.png)
![Edit Kategori](screenshot/kategori-edit.png)
### About
![About](screenshot/about.png)