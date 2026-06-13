# PerpusTech - Sistem Informasi Perpustakaan Modern (Modul 7)

PerpusTech adalah aplikasi sistem informasi manajemen perpustakaan berbasis web yang dikembangkan menggunakan arsitektur MVC pada **Laravel**. Aplikasi ini dirancang tidak hanya untuk memenuhi tugas Praktikum Pemrograman Web II, tetapi juga diimplementasikan dengan standar industri tingkat lanjut, termasuk penanganan *concurrency*, *audit trail* otomatis, dan desain UI/UX yang elegan.

---

## Keunggulan Utama (Kelebihan Sistem)
Aplikasi ini melampaui standar aplikasi CRUD dasar dengan menerapkan berbagai fitur kompleks:
1. **Pencegahan *Race Condition***: Menerapkan fitur `lockForUpdate()` pada transaksi database untuk mencegah bentrok data ketika dua pengguna mencoba meminjam buku fisik yang sama di detik yang bersamaan.
2. **Jurnal Audit Otomatis (Audit Trail)**: Pergerakan barang (penambahan stok, buku hilang, rusak) dicatat sepenuhnya oleh sistem secara otomatis tanpa campur tangan CRUD manual, menjaga integritas dan keaslian data laporan.
3. **Role-Based Access Control (RBAC)**: Pemisahan hak akses yang sangat ketat menggunakan *Middleware* antara **Administrator** (kontrol penuh) dan **Anggota** (hanya melihat katalog dan riwayat pinjaman).
4. **Perhitungan Denda Otomatis**: Sistem secara cerdas menghitung denda keterlambatan (Rp 1.000/hari) secara *real-time* saat buku dikembalikan.
5. **Relasi Database yang Kompleks**: Menggunakan 7 tabel berelasi (*Kategori, Buku, Eksemplar, User, Peminjaman, Detail Peminjaman, Riwayat Stok*) yang mencerminkan sistem perpustakaan di dunia nyata.

---

## Tema Warna & UI/UX
PerpusTech dirancang dengan pendekatan *Spring Aesthetic* yang modern, bersih, dan memanjakan mata, menggunakan palet warna pastel yang dikustomisasi secara khusus pada **Tailwind CSS**:
* **Soft Periwinkle** (`#9381FF`) - Warna utama untuk tombol aksi utama, ikon, dan sorotan antarmuka.
* **Periwinkle** (`#B8B8FF`) - Warna sekunder untuk elemen pendukung dan *hover state*.
* **Peach Fuzz** (`#FFD8BE`) - Warna aksen untuk inisial profil dan elemen peringatan ringan.
* **Antique White** (`#FFEEDD`) & **Ghost White** (`#F8F7FF`) - Warna latar belakang (*background*) yang memberikan kesan luas, bersih, dan elegan.

---

## Fitur Lengkap

### Autentikasi & Keamanan
* **Login & Logout**: Sistem sesi (*session*) yang aman.
* **Route Protection**: Pengalihan paksa pengguna yang belum login dan pemblokiran anggota biasa dari halaman khusus Admin.

### Modul Administrator
* **Dashboard Analitik**: Ringkasan *real-time* jumlah judul buku, eksemplar fisik, transaksi berjalan, dan riwayat aktivitas terbaru.
* **Manajemen Anggota**: Fitur pendaftaran pengguna baru dengan penentuan hak akses (Admin/Anggota).
* **Manajemen Kategori**: Pengelompokan buku dengan proteksi *Foreign Key Constraint* (mencegah penghapusan kategori yang masih memiliki buku).
* **Katalog Buku (Master Data)**: Pengelolaan judul buku, penulis, penerbit, dan tahun terbit.
* **Manajemen Eksemplar Fisik**: Registrasi kode *barcode* unik untuk setiap fisik buku. Pengaturan kondisi fisik secara spesifik (Baik, Rusak Ringan, Rusak Berat, Hilang).
* **Sirkulasi Admin**: Pembuatan transaksi peminjaman baru, konfirmasi pengembalian buku, dan pelunasan pembayaran denda.
* **Laporan Riwayat Stok**: *Dashboard read-only* yang mencatat kronologi keluar-masuknya fisik buku beserta waktunya.

### Modul Anggota (User)
* **Katalog Interaktif**: Melihat ketersediaan buku yang difilter berdasarkan kategori dan status stok fisik saat ini.
* **Buku Pinjamanku**: Pemantauan tanggungan peminjaman buku yang sedang berjalan, batas waktu pengembalian, dan riwayat pelunasan denda.

---

## Roadmap & Rencana Pengembangan (Future Updates V2.0)
Proyek ini direncanakan untuk terus berkembang. Beberapa fitur yang masuk dalam *pipeline* pengembangan selanjutnya:
1. **Registrasi Mandiri (Sign Up)**: Memungkinkan mahasiswa/pengguna luar mendaftar keanggotaan secara mandiri tanpa harus di-input oleh Admin.
2. **Halaman Profil Pengguna**: Manajemen profil untuk mengganti kata sandi dan mengunggah foto profil (*avatar*).
3. **Data Pagination**: Optimalisasi pemuatan data besar dengan membagi tabel menjadi beberapa halaman (*pages*) menggunakan sistem *paginate* bawaan Laravel.
4. **Pencarian Lanjutan (Smart Search)**: Penambahan *Search Bar* untuk mencari buku berdasarkan kemiripan judul atau nama penulis.
5. **Ekspor Laporan (PDF/Excel)**: Fitur untuk mencetak laporan stok dan transaksi bagi kebutuhan administrasi fisik menggunakan *library* DomPDF/Laravel Excel.
6. **Sistem Reservasi (*Booking*)**: Pengguna dapat memesan buku dari rumah dan menahannya selama 24 jam sebelum diambil secara fisik di perpustakaan.
7. **Notifikasi Email Terjadwal (Cron Job)**: Pengingat otomatis via email untuk buku yang masa pinjamnya akan habis keesokan harinya menggunakan Laravel Task Scheduling.
8. **Sistem Ulasan (Rating & Review)**: Anggota dapat memberikan rating 1-5 bintang setelah selesai meminjam sebuah judul buku.

---

## Teknologi yang Digunakan
* **Framework**: Laravel13 (PHP)
* **Styling**: Tailwind CSS (melalui Laravel Vite)
* **Icons**: Boxicons (CDN)
* **Database**: SQLite (Default, mendukung MySQL/PostgreSQL)
* **Architecture**: Model-View-Controller (MVC)

---

