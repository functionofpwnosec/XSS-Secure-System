# Proyek Website PHP Aman dari Serangan XSS

Proyek ini merupakan implementasi sederhana dari sebuah website dengan fitur keamanan untuk menangkal serangan **Cross-Site Scripting (XSS)**. Proyek ini dilengkapi dengan berbagai fitur seperti autentikasi pengguna (login, registrasi), manajemen artikel, dan sistem komentar dengan validasi input yang aman.

## Fitur Utama

1. **Autentikasi Pengguna:**
   - Registrasi dan login pengguna.
   - Logout untuk mengakhiri sesi.

2. **Manajemen Artikel:**
   - Tambah, edit, hapus, dan lihat artikel.
   - Upload gambar untuk artikel.
   - Kategori artikel.

3. **Sistem Komentar:**
   - Tambah, edit, hapus, dan lihat komentar di artikel.
   - Sistem komentar menggunakan validasi input untuk menangkal XSS.

4. **Keamanan:**
   - **Escape HTML** menggunakan fungsi `htmlspecialchars()` untuk mencegah XSS.
   - **Password hashing** menggunakan `password_hash()` untuk keamanan kata sandi pengguna.
   - **Prepared Statements** untuk menangkal serangan SQL Injection.

5. **Paginasi Artikel:**
   - Menampilkan daftar artikel dengan paginasi untuk navigasi yang lebih baik.

6. **Upload Gambar:**
   - Dukungan upload gambar untuk artikel yang disimpan di direktori khusus.


## Instalasi

1. **Clone repositori** ini atau download file zip:
```bash
   git clone https://github.com/username/xss-safe-website.git
```
2. Konfigurasi database:
 * Buat database baru menggunakan `phpMyAdmin` atau MySQL client.
 * Import file SQL yang berada di `/db/db.sql` untuk membuat tabel yang dibutuhkan.

3. Sesuaikan konfigurasi di `config.php`: Ubah konfigurasi database sesuai dengan setting lokal Anda.
```php
<?php
$host = 'localhost';
$db = 'xss_safe_website';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start();
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
```
4. Akses Website:
Setelah konfigurasi selesai, akses website melalui browser Anda di alamat `http://localhost/xss-safe-server`.

## Penggunaan
 * **Registrasi** untuk membuat akun pengguna baru.
 * **Login** dengan akun yang telah terdaftar.
 * **Dashboard** akan tampil setelah login, di mana pengguna bisa menambahkan artikel baru.
 * **Artikel** dapat diakses melalui halaman utama dengan fitur paginasi.
 * **Komentar** bisa ditambahkan di halaman artikel dan hanya dapat dilakukan oleh pengguna yang sudah login.

## Keamanan
 * Semua input yang diterima dari pengguna (judul, konten, kategori, komentar) difilter menggunakan `htmlspecialchars()` untuk mencegah serangan XSS.
 * Penggunaan prepared statements untuk semua query database guna menangkal serangan SQL Injection.
 * Kata sandi pengguna di-hash dengan password_hash() untuk memastikan keamanan data login.

## Fitur yang Dapat Dikembangkan
 * **Edit Profil Pengguna:** Pengguna dapat mengedit informasi mereka sendiri.
 * **Notifikasi:** Sistem notifikasi untuk artikel atau komentar baru.
 * **Moderasi Komentar:** Fitur untuk memoderasi komentar yang masuk.
 * **Like atau Rating Artikel:** Pengguna dapat memberikan rating atau like pada artikel.

## Persyaratan
 * PHP 7.4 atau lebih baru
 * MySQL atau MariaDB
 * Apache atau Nginx
 * Composer (opsional, jika ingin menggunakan dependensi pihak ketiga)

# Hak Cipta dan Informasi Penggunaan

Proyek ini dikembangkan dan dimiliki oleh **PT. PwnOsec Technologies Ltd.**. Semua hak cipta, kekayaan intelektual, dan pengembangan perangkat lunak ini sepenuhnya dimiliki oleh perusahaan tersebut.

## Informasi Perusahaan

- **Nama Perusahaan:** PT. PwnOsec Technologies Ltd.
- **Pengembang:** @pwnosec
- **Lisensi:** Semua hak cipta dilindungi oleh undang-undang yang berlaku dan tidak dapat digunakan kembali tanpa izin resmi dari PT. PwnOsec Technologies Ltd.
- **Penggunaan Resmi:** Alat ini dikembangkan secara resmi oleh badan usaha tersebut dan digunakan untuk tujuan penelitian keamanan siber, pengembangan perangkat lunak, dan penyediaan solusi keamanan bagi klien dan mitra.

## Hak Cipta

Hak cipta sepenuhnya dimiliki oleh **PT. PwnOsec Technologies Ltd.** dengan semua hak yang terkait. Tidak ada bagian dari perangkat lunak ini, baik dalam bentuk kode sumber, dokumentasi, maupun komponen lainnya, yang boleh didistribusikan, dimodifikasi, atau digunakan untuk tujuan komersial tanpa persetujuan tertulis dari pemilik hak cipta.

### Tanggal Penerbitan

Hak cipta ini berlaku mulai dari tanggal penerbitan proyek ini, dan akan diperbarui secara berkala oleh **PT. PwnOsec Technologies Ltd.** untuk memastikan perlindungan hukum yang sesuai.

## Lisensi Penggunaan

Proyek ini dilisensikan di bawah model lisensi berikut:

1. **Penggunaan Komersial:**
   Penggunaan komersial perangkat lunak ini hanya diizinkan bagi pihak-pihak yang telah mendapatkan lisensi resmi dari PT. PwnOsec Technologies Ltd.

2. **Penggunaan Pribadi:**
   Anda diizinkan untuk mempelajari dan mengkloning proyek ini hanya untuk penggunaan pribadi dan edukasi. Penggunaan dalam skala komersial, redistribusi, atau penjualan kembali perangkat lunak ini memerlukan izin resmi.

3. **Modifikasi:**
   Modifikasi diperbolehkan hanya untuk penggunaan internal dan pribadi. Setiap modifikasi yang dilakukan tidak boleh didistribusikan atau dijual tanpa persetujuan dari PT. PwnOsec Technologies Ltd.

## Kontak

Jika Anda memiliki pertanyaan terkait penggunaan, lisensi, atau memerlukan izin penggunaan komersial, silakan hubungi kami di:

- **Email:** info@pwnosec.com
- **Situs Web:** [www.pwnosec.com](http://www.pwnosec.com)
- **Alamat Kantor:**
  PT. PwnOsec Technologies Ltd.  
  Jl. Keamanan Siber No. 123, Jakarta, Indonesia

---

Hak cipta © 2024 **PT. PwnOsec Technologies Ltd.**. Semua hak dilindungi undang-undang.
