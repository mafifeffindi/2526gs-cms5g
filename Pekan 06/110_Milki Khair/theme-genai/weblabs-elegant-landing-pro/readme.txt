=== WebLabs Elegant Landing Pro (Versi Tugas) ===
Kontributor: Milki Khair Al Firdaus (110)
Sumber dasar: WebLabs Elegant Landing Pro (dibuat dengan bantuan GenAI)
WordPress: 6.x
Lisensi: GPLv2 atau yang lebih baru

== Deskripsi ==
Tema landing page elegan dengan tipografi iPhone-like dan skema warna tenang.
Tema ini saya gunakan untuk pemenuhan tugas: 1) membuat tema dengan GenAI, 
2) menulis struktur dan penjelasan singkat kode, serta 3) upload hasil & tangkapan layar.

== Fitur Utama ==
- Header, hero section, dan blok konten siap pakai
- Kustomisasi warna dan teks via Customizer
- Siap gambar aset di folder /assets/ (bisa ganti sesuai branding)
- Kompatibel WooCommerce (opsional, untuk tombol add-to-cart)

== Struktur Folder (ringkas) ==
/weblabs-elegant-landing-pro
|-- index.php           : Beranda/loop konten utama
|-- style.css           : Metadata tema + gaya global
|-- header.php          : Bagian <head> & navigasi
|-- footer.php          : Bagian bawah situs + wp_footer()
|-- functions.php       : Daftar dukungan fitur & enqueue script/style
|-- front-page.php      : Template landing (jika dijadikan halaman depan statis)
|-- assets/             : Gambar/ikon/ilustrasi tema

== Cara Pakai (lokal Docker) ==
1. Salin tema ke container:
   - Sudah dilakukan pada tugas: `docker cp ... /var/www/html/wp-content/themes/...`
2. Aktifkan di WP Admin → Appearance → Themes → “WebLabs Elegant Landing Pro”.
3. (Opsional) Jadikan halaman statis:
   - Settings → Reading → Your homepage displays → A static page → pilih “Home”.
4. Ganti teks/gambar:
   - Ubah gambar di /assets/ dan sesuaikan copy di front-page.php / Customizer.

== Catatan ==
- Jika WooCommerce tidak terpasang, tombol add-to-cart tidak aktif (placeholder saja).
- Ganti placeholder gambar dengan foto/ikon milik sendiri di /assets/.
- Tema ini basisnya hasil GenAI lalu disesuaikan seperlunya untuk tugas.

== Kredit ==
- Basis desain & copy awal: WebLabs (AI-assisted)
- Adaptasi & dokumentasi tugas: Milki Khair Al Firdaus (110)
