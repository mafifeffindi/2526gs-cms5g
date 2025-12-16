<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card-header">
  <div>
    <h1>SkyStore</h1>
    <p>Website katalog produk yang clean, elegant, dan siap dipakai. CRUD-nya ada, tapi gak norak.</p>
  </div>
  <div class="row">
    <a class="btn btn-primary" href="/products">Masuk Dashboard</a>
    <a class="btn btn-ghost" href="#fitur">Lihat Fitur</a>
  </div>
</div>

<div class="card-body">
  <div style="display:grid; grid-template-columns: 1.2fr .8fr; gap:18px; align-items:stretch;">
    <div class="card" style="box-shadow: var(--shadow-soft); border-radius: var(--radius); padding:18px;">
      <h2 style="margin:0 0 8px 0;">Kelola produk tanpa drama</h2>
      <p style="margin:0; color:var(--muted); line-height:1.6;">
        Tambah, edit, hapus, dan cari produk dengan cepat. Tampilan sky-blue premium, fokus ke isi, bukan ribut dekorasi.
      </p>

      <div class="row" style="margin-top:14px;">
        <span class="badge">CRUD Produk</span>
        <span class="badge">Search</span>
        <span class="badge">UI Premium</span>
      </div>

      <div class="row" style="margin-top:16px;">
        <a class="btn btn-primary" href="/products/new">Tambah Produk</a>
        <a class="btn btn-ghost" href="/products">Lihat Data</a>
      </div>
    </div>

    <div class="card" style="box-shadow: var(--shadow-soft); border-radius: var(--radius); padding:18px;">
      <h3 style="margin:0 0 10px 0;">Quick Actions</h3>
      <div style="display:grid; gap:10px;">
        <a class="btn btn-ghost" href="/products">📦 Dashboard Produk</a>
        <a class="btn btn-ghost" href="/products/new">➕ Tambah Produk</a>
        <a class="btn btn-ghost" href="/products?q=">🔎 Cari Produk</a>
      </div>
      <p style="margin:14px 0 0 0; color:var(--muted); font-size:12px;">
        Kamu bisa kembangin jadi toko beneran: kategori, gambar, user login, dll.
      </p>
    </div>
  </div>

  <div id="fitur" style="margin-top:18px; display:grid; grid-template-columns: repeat(3, 1fr); gap:12px;">
    <div class="card" style="box-shadow: var(--shadow-soft); border-radius: var(--radius); padding:16px;">
      <strong>Elegan</strong>
      <p style="margin:8px 0 0 0; color:var(--muted); font-size:13px;">Sky-blue + white, shadow halus, spacing lega.</p>
    </div>
    <div class="card" style="box-shadow: var(--shadow-soft); border-radius: var(--radius); padding:16px;">
      <strong>Produktif</strong>
      <p style="margin:8px 0 0 0; color:var(--muted); font-size:13px;">CRUD lengkap, validasi, search, pagination.</p>
    </div>
    <div class="card" style="box-shadow: var(--shadow-soft); border-radius: var(--radius); padding:16px;">
      <strong>Siap Scale</strong>
      <p style="margin:8px 0 0 0; color:var(--muted); font-size:13px;">Tinggal tambah kategori, upload gambar, auth.</p>
    </div>
  </div>

  <div style="margin-top:16px; padding:16px; border-radius: var(--radius); border:1px solid var(--border); background: rgba(45,168,255,.06);">
    <strong>Next upgrade:</strong>
    <span style="color:var(--muted)">kategori produk, upload gambar, dan login admin.</span>
  </div>
</div>

<?= $this->endSection() ?>
