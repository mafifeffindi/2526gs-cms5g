# Tutorial Menjalankan CRUD Pegawai dengan CodeIgniter 3

## 📋 Daftar Isi
1. [Persiapan](#persiapan)
2. [Setup Database](#setup-database)
3. [Konfigurasi Aplikasi](#konfigurasi-aplikasi)
4. [Menjalankan Aplikasi](#menjalankan-aplikasi)
5. [Cara Menggunakan CRUD](#cara-menggunakan-crud)
6. [Troubleshooting](#troubleshooting)

---

## 🔧 Persiapan

### Yang Dibutuhkan:
- XAMPP (sudah terinstall di `C:\xampp\htdocs\beritacoding1`)
- Web Browser (Chrome, Firefox, dll)
- Text Editor (untuk edit file jika diperlukan)

### Struktur File yang Sudah Dibuat:
```
beritacoding1/
├── application/
│   ├── controllers/
│   │   └── Pegawai.php          ✅ Controller CRUD
│   ├── models/
│   │   └── M_pegawai.php        ✅ Model database
│   └── views/
│       └── pegawai/
│           ├── index.php        ✅ Halaman daftar data
│           ├── tambah.php       ✅ Halaman tambah data
│           └── edit.php         ✅ Halaman edit data
├── database.sql                 ✅ Script SQL
└── TUTORIAL.md                  ✅ File ini
```

---

## 🗄️ Setup Database

### Langkah 1: Buka phpMyAdmin
1. Pastikan XAMPP sudah berjalan (Apache dan MySQL harus aktif)
2. Buka browser dan kunjungi: `http://localhost/phpmyadmin`
3. Login dengan:
   - Username: `root`
   - Password: (kosongkan jika default)

### Langkah 2: Import Database
**Opsi A: Menggunakan phpMyAdmin (Paling Mudah)**
1. Klik tab "SQL" di phpMyAdmin
2. Buka file `database.sql` dengan text editor
3. Copy semua isi file `database.sql`
4. Paste ke textarea SQL di phpMyAdmin
5. Klik tombol "Go" atau "Jalankan"
6. Pastikan muncul pesan sukses

**Opsi B: Membuat Database Manual**
1. Klik "New" di sidebar kiri untuk membuat database baru
2. Nama database: `db_pegawai`
3. Collation: `utf8_general_ci`
4. Klik "Create"
5. Pilih database `db_pegawai`
6. Klik tab "SQL"
7. Copy-paste isi file `database.sql` (hanya bagian CREATE TABLE dan INSERT)
8. Klik "Go"

### Langkah 3: Verifikasi Database
1. Pastikan database `db_pegawai` sudah dibuat
2. Pastikan tabel `pegawai` sudah ada
3. Cek apakah ada 3 data contoh (opsional)

---

## ⚙️ Konfigurasi Aplikasi

### Langkah 1: Konfigurasi Database
1. Buka file: `application/config/database.php`
2. Cari bagian `$db['default']` (sekitar baris 76)
3. Ubah konfigurasi berikut:

```php
$db['default'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',
    'username' => 'root',        // Username MySQL Anda
    'password' => '',            // Password MySQL Anda (kosongkan jika default)
    'database' => 'db_pegawai',  // Nama database yang dibuat
    'dbdriver' => 'mysqli',
    // ... sisanya biarkan default
);
```

### Langkah 2: Konfigurasi Base URL
1. Buka file: `application/config/config.php`
2. Cari baris: `$config['base_url'] = '';` (sekitar baris 26)
3. Ubah menjadi:

```php
$config['base_url'] = 'http://localhost/beritacoding1/';
```

**Catatan:** 
- Jika folder Anda berbeda, sesuaikan path-nya
- Pastikan ada tanda `/` di akhir URL

### Langkah 3: Verifikasi Routes (Opsional)
1. Buka file: `application/config/routes.php`
2. Pastikan default controller sudah benar:
   ```php
   $route['default_controller'] = 'welcome';
   ```
   (Ini sudah benar, tidak perlu diubah)

---

## 🚀 Menjalankan Aplikasi

### Langkah 1: Pastikan XAMPP Berjalan
1. Buka **XAMPP Control Panel**
2. Pastikan **Apache** dan **MySQL** berstatus "Running" (hijau)
3. Jika belum running, klik tombol "Start" pada masing-masing service

### Langkah 2: Akses Aplikasi
1. Buka web browser (Chrome, Firefox, dll)
2. Ketik URL berikut di address bar:
   ```
   http://localhost/beritacoding1/pegawai
   ```
3. Atau bisa juga:
   ```
   http://localhost/beritacoding1/index.php/pegawai
   ```

### Langkah 3: Verifikasi Halaman
Jika berhasil, Anda akan melihat:
- Halaman "Data Pegawai" dengan tabel
- Tombol "+ Tambah Data" di bagian atas
- Jika database sudah ada data, akan muncul tabel data
- Jika database kosong, akan muncul pesan "Belum ada data pegawai"

---

## 📝 Cara Menggunakan CRUD

### 1. **CREATE (Tambah Data)**
1. Klik tombol **"+ Tambah Data"** di halaman utama
2. Isi form dengan data:
   - **Nama**: Nama lengkap pegawai
   - **Email**: Email pegawai (format email valid)
   - **Bidang**: Bidang kerja pegawai
   - **Alamat**: Alamat lengkap pegawai
3. Klik tombol **"Simpan"**
4. Data akan tersimpan dan kembali ke halaman utama

### 2. **READ (Lihat Data)**
- Data otomatis ditampilkan di halaman utama (`/pegawai`)
- Tabel menampilkan: No, Nama, Email, Bidang, Alamat, dan Aksi

### 3. **UPDATE (Edit Data)**
1. Di halaman utama, klik tombol **"Edit"** pada baris data yang ingin diubah
2. Form akan terisi dengan data yang sudah ada
3. Ubah data yang diperlukan
4. Klik tombol **"Update"**
5. Data akan terupdate dan kembali ke halaman utama

### 4. **DELETE (Hapus Data)**
1. Di halaman utama, klik tombol **"Hapus"** pada baris data yang ingin dihapus
2. Akan muncul konfirmasi "Yakin ingin menghapus data ini?"
3. Klik **"OK"** untuk menghapus atau **"Cancel"** untuk membatalkan
4. Data akan terhapus dan kembali ke halaman utama

---

## 🔍 URL yang Tersedia

Berikut adalah URL yang bisa diakses:

| URL | Fungsi |
|-----|--------|
| `http://localhost/beritacoding1/pegawai` | Menampilkan semua data pegawai |
| `http://localhost/beritacoding1/pegawai/tambah` | Form tambah data baru |
| `http://localhost/beritacoding1/pegawai/edit/[id]` | Form edit data (ganti [id] dengan ID pegawai) |
| `http://localhost/beritacoding1/pegawai/hapus/[id]` | Hapus data (ganti [id] dengan ID pegawai) |

**Contoh:**
- Edit data dengan ID 1: `http://localhost/beritacoding1/pegawai/edit/1`
- Hapus data dengan ID 2: `http://localhost/beritacoding1/pegawai/hapus/2`

---

## 🛠️ Troubleshooting

### Masalah 0: Error "Forbidden - You don't have permission to access this resource"
**Penyebab:** Anda mencoba mengakses folder `application` atau `views` secara langsung.

**Contoh URL yang SALAH:**
```
http://localhost/beritacoding1/application/views/pegawai
http://localhost/beritacoding1/application/controllers/Pegawai.php
```

**Solusi:**
- ❌ **JANGAN** akses folder `application`, `views`, atau `controllers` langsung
- ✅ **GUNAKAN** URL melalui controller: `http://localhost/beritacoding1/pegawai`
- CodeIgniter melindungi folder `application` dari akses langsung untuk keamanan
- Selalu akses melalui **controller** (`Pegawai`), bukan langsung ke file view

**URL yang BENAR:**
```
http://localhost/beritacoding1/pegawai              ← Halaman utama
http://localhost/beritacoding1/pegawai/tambah       ← Form tambah
http://localhost/beritacoding1/index.php/pegawai     ← Alternatif (jika perlu)
```

### Masalah 1: Halaman Blank Putih
**Solusi:**
- Cek apakah Apache sudah running di XAMPP
- Cek file `application/config/config.php`, pastikan `base_url` sudah diisi
- Aktifkan error reporting di `index.php` (tambahkan di baris awal):
  ```php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ```

### Masalah 2: Error Database Connection
**Solusi:**
- Pastikan MySQL sudah running di XAMPP
- Cek konfigurasi di `application/config/database.php`:
  - Username dan password sesuai dengan MySQL Anda
  - Nama database sudah benar (`db_pegawai`)
- Pastikan database dan tabel sudah dibuat (jalankan `database.sql`)

### Masalah 3: 404 Page Not Found
**Solusi:**
- Pastikan URL benar: `http://localhost/beritacoding1/pegawai`
- Cek apakah file `Pegawai.php` ada di folder `application/controllers/`
- Pastikan nama file controller menggunakan huruf kapital: `Pegawai.php` (bukan `pegawai.php`)

### Masalah 4: CSS Tidak Tampil / Tampilan Jelek
**Solusi:**
- CSS sudah di-inline di setiap file view, jadi tidak perlu file CSS terpisah
- Pastikan browser support HTML5 dan CSS3
- Clear cache browser (Ctrl + F5)

### Masalah 5: Form Tidak Bisa Submit
**Solusi:**
- Pastikan semua field required sudah diisi
- Cek apakah ada error di browser console (F12)
- Pastikan `base_url` sudah dikonfigurasi dengan benar

### Masalah 6: Data Tidak Tersimpan
**Solusi:**
- Cek koneksi database
- Pastikan tabel `pegawai` sudah dibuat dengan struktur yang benar
- Cek apakah ada error di log: `application/logs/`

---

## 📚 Penjelasan Kode

### Controller (`Pegawai.php`)
- `index()`: Menampilkan semua data pegawai
- `tambah()`: Menampilkan form tambah data
- `simpan()`: Menyimpan data baru ke database
- `edit($id)`: Menampilkan form edit dengan data yang sudah ada
- `update()`: Mengupdate data yang sudah ada
- `hapus($id)`: Menghapus data berdasarkan ID

### Model (`M_pegawai.php`)
- `get_all()`: Mengambil semua data dari tabel pegawai
- `insert($data)`: Menyimpan data baru
- `get_by_id($id)`: Mengambil data berdasarkan ID
- `update($id, $data)`: Mengupdate data berdasarkan ID
- `delete($id)`: Menghapus data berdasarkan ID

### Views
- `index.php`: Halaman utama menampilkan tabel data
- `tambah.php`: Form untuk menambah data baru
- `edit.php`: Form untuk mengedit data yang sudah ada

---

## ✅ Checklist Sebelum Menjalankan

- [ ] XAMPP sudah terinstall dan berjalan
- [ ] Apache dan MySQL sudah running
- [ ] Database `db_pegawai` sudah dibuat
- [ ] Tabel `pegawai` sudah dibuat
- [ ] File `database.php` sudah dikonfigurasi
- [ ] File `config.php` sudah dikonfigurasi (base_url)
- [ ] Semua file controller, model, dan view sudah ada

---

## 🎉 Selamat!

Jika semua langkah sudah diikuti dengan benar, aplikasi CRUD Anda sudah siap digunakan!

**Tips:**
- Selalu backup database sebelum melakukan perubahan besar
- Gunakan validasi form untuk keamanan yang lebih baik
- Tambahkan autentikasi jika aplikasi akan digunakan banyak user

---

**Pertanyaan atau Masalah?**
- Cek log error di: `application/logs/`
- Pastikan semua konfigurasi sudah benar
- Verifikasi struktur database sesuai dengan yang diharapkan

