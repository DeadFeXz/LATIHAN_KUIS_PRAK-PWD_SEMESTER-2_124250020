# Cara Membuat Database Komunitas Kucing dengan XAMPP

## Persiapan

1. **Install XAMPP** (jika belum punya)
   - Download dari: https://www.apachefriends.org/
   - Install sesuai sistem operasi (Windows/Mac/Linux)

2. **Jalankan XAMPP Control Panel**
   - Buka XAMPP Control Panel
   - Klik **Start** pada **Apache** dan **MySQL**
   - Pastikan kedua service berwarna hijau (running)

## Cara 1: Menggunakan phpMyAdmin (Mudah)

### Langkah 1: Buka phpMyAdmin
- Buka browser (Chrome/Firefox)
- Ketik: `http://localhost/phpmyadmin`
- Akan tampil halaman phpMyAdmin

### Langkah 2: Buat Database
- Klik menu **New** di sidebar kiri
- Isi **Database name**: `komunitas_kucing`
- Pilih **Collation**: `utf8mb4_general_ci`
- Klik tombol **Create**

### Langkah 3: Buat Tabel
- Klik database `komunitas_kucing` di sidebar kiri
- Klik tab **SQL**
- Copy dan paste query berikut:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    kelompok_umur ENUM('Anak-anak', 'Remaja', 'Dewasa') NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    hobi VARCHAR(255) NOT NULL,
    asal_daerah VARCHAR(100) NOT NULL,
    alasan TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
