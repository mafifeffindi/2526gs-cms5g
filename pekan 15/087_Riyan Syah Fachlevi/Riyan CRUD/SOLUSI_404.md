# 🔧 Solusi Error 404 Not Found

## ⚠️ Masalah: Halaman Tidak Ditemukan (404 Not Found)

Jika Anda mendapat error **404 Not Found** saat mengakses aplikasi, ikuti langkah-langkah berikut:

---

## ✅ Solusi 1: Gunakan URL dengan index.php

Jika mod_rewrite tidak aktif di Apache, gunakan URL dengan `index.php`:

### URL yang BENAR:
```
http://localhost/beritacoding1/index.php/pegawai
```

### URL yang SALAH:
```
http://localhost/beritacoding1/pegawai
```

**Coba akses:** `http://localhost/beritacoding1/index.php/pegawai`

---

## ✅ Solusi 2: Aktifkan mod_rewrite di Apache

### Langkah-langkah:

1. **Buka file httpd.conf di XAMPP:**
   - Lokasi: `C:\xampp\apache\conf\httpd.conf`
   - Buka dengan text editor (Notepad++ atau Notepad)

2. **Cari baris berikut (hapus tanda # jika ada):**
   ```apache
   #LoadModule rewrite_module modules/mod_rewrite.so
   ```
   
   Ubah menjadi:
   ```apache
   LoadModule rewrite_module modules/mod_rewrite.so
   ```

3. **Cari bagian `<Directory "C:/xampp/htdocs">`**
   - Cari baris: `AllowOverride None`
   - Ubah menjadi: `AllowOverride All`

4. **Restart Apache di XAMPP Control Panel**

5. **Setelah restart, coba akses:**
   ```
   http://localhost/beritacoding1/pegawai
   ```

---

## ✅ Solusi 3: Pastikan File Controller Ada

1. **Cek apakah file ini ada:**
   ```
   application/controllers/Pegawai.php
   ```

2. **Pastikan nama file menggunakan huruf KAPITAL:**
   - ✅ Benar: `Pegawai.php`
   - ❌ Salah: `pegawai.php`

3. **Pastikan isi file controller benar:**
   ```php
   <?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   
   class Pegawai extends CI_Controller {
       // ... kode controller
   }
   ```

---

## ✅ Solusi 4: Cek Konfigurasi Base URL

1. **Buka file:** `application/config/config.php`

2. **Pastikan base_url sudah dikonfigurasi:**
   ```php
   $config['base_url'] = 'http://localhost/beritacoding1/';
   ```
   
   Atau biarkan auto-detect (sudah dikonfigurasi):
   ```php
   $config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
   ```

---

## ✅ Solusi 5: Cek Folder dan File

Pastikan struktur folder seperti ini:
```
beritacoding1/
├── application/
│   ├── controllers/
│   │   └── Pegawai.php    ← HARUS ADA
│   ├── models/
│   │   └── M_pegawai.php
│   └── views/
│       └── pegawai/
│           ├── index.php
│           ├── tambah.php
│           └── edit.php
├── system/
├── index.php              ← HARUS ADA
└── .htaccess              ← SUDAH DIBUAT
```

---

## 🧪 Test URL yang Berbeda

Coba akses URL berikut secara berurutan:

1. **Test halaman default CodeIgniter:**
   ```
   http://localhost/beritacoding1/
   ```
   Harusnya muncul halaman Welcome CodeIgniter

2. **Test dengan index.php:**
   ```
   http://localhost/beritacoding1/index.php/pegawai
   ```

3. **Test tanpa index.php (jika mod_rewrite aktif):**
   ```
   http://localhost/beritacoding1/pegawai
   ```

---

## 🔍 Debugging

### Aktifkan Error Reporting

1. **Buka file:** `index.php`

2. **Tambahkan di baris awal (setelah `<?php`):**
   ```php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ```

3. **Refresh browser** - sekarang akan muncul error yang lebih detail

### Cek Log Error

1. **Buka file:** `application/logs/log-[tanggal].php`
2. Lihat error terakhir yang tercatat

---

## 📋 Checklist

Sebelum mencoba solusi di atas, pastikan:

- [ ] XAMPP sudah running (Apache & MySQL)
- [ ] File `Pegawai.php` ada di `application/controllers/`
- [ ] Nama file menggunakan huruf kapital: `Pegawai.php`
- [ ] File `.htaccess` sudah ada di root folder
- [ ] Database sudah dibuat (jalankan `database.sql`)
- [ ] Konfigurasi database sudah benar di `database.php`

---

## 🎯 URL yang Harus Digunakan

**Jika mod_rewrite TIDAK aktif:**
```
http://localhost/beritacoding1/index.php/pegawai
http://localhost/beritacoding1/index.php/pegawai/tambah
http://localhost/beritacoding1/index.php/pegawai/edit/1
```

**Jika mod_rewrite AKTIF:**
```
http://localhost/beritacoding1/pegawai
http://localhost/beritacoding1/pegawai/tambah
http://localhost/beritacoding1/pegawai/edit/1
```

---

## 💡 Tips

1. **Selalu gunakan URL dengan `index.php`** jika tidak yakin mod_rewrite aktif atau tidak
2. **Jangan akses folder `application` langsung** - akan muncul error Forbidden
3. **Pastikan nama controller menggunakan huruf kapital** sesuai dengan nama file

---

**Masih error?** Coba solusi 1 terlebih dahulu (gunakan URL dengan `index.php`)

