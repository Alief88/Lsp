# To-Do List with PHP
 logika aplikasi berada dalam satu file "index.php"
## Deskripsi

Aplikasi To-Do List sederhana berbasis PHP yang menyimpan data dalam bentuk array di sisi server menggunakan $_SESSION:

php
    $_SESSION['tugas'] = [
        ["judul" => "Belajar PHP", "selesai" => false],
        ["judul" => "Kerjakan tugas UX", "selesai" => true],
];


## Fitur

- Tambah tugas
- Tandai tugas sebagai selesai atau belum
- Hapus tugas
- Edit tugas
- Data disimpan di $_SESSION (tanpa database)

## Struktur Folder


todolist/
├── index.php       #



## Cara Menjalankan

1. Pastikan Anda memiliki server lokal seperti  XAMPP, atau PHP built-in server.
2. Clone atau salin folder todolist/ ke direktori www atau htdocs.
3. Jalankan dengan:
   http://localhost/todolist/

## Instruksi yang Dilakukan (Poin-poin Panduan Pengguna)

1. *Tambah Tugas*
   - Isi nama tugas pada input teks.
   - Klik tombol tambah untuk menambahkan

2. *Tandai Tugas Selesai / Belum*
   - Klik checkbox di sebelah tugas untuk menandai selesai atau belum.

4. *Hapus Tugas*
   - Klik tombol Hapus untuk menghapus tugas secara permanen.


## Kontributor
- Alief Dachlan Nashrulloh https://github.com/alief88