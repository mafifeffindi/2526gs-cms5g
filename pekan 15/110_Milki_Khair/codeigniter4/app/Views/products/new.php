<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php $v = session('validation') ?? $validation ?? null; ?>

<style>
  .page{ padding: 34px 0 64px; }
  .kicker{
    font-size: 12px;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: rgba(11,18,32,.55);
    margin: 6px 0 10px;
  }
  .headline{
    display:flex;
    align-items:flex-end;
    justify-content:space-between;
    gap: 16px;
    margin-bottom: 18px;
  }
  .headline h1{
    margin:0;
    font-size: clamp(28px, 3.8vw, 44px);
    letter-spacing:-0.02em;
    line-height:1.05;
  }
  .sub{
    margin: 10px 0 0;
    color: rgba(11,18,32,.62);
    max-width: 60ch;
  }

  .panel{
    background: rgba(255,255,255,.78);
    border: 1px solid rgba(11,18,32,.07);
    border-radius: 18px;
    box-shadow: 0 22px 70px rgba(2,18,48,.08);
    overflow: hidden;
  }
  .panelHead{
    padding: 16px 18px;
    border-bottom: 1px solid rgba(11,18,32,.06);
    background: rgba(246,251,255,.55);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
  }
  .panelBody{ padding: 18px; }

  .grid{
    display:grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
  }
  @media (max-width: 780px){
    .grid{ grid-template-columns: 1fr; }
  }

  .field label{
    display:block;
    font-size: 13px;
    font-weight: 700;
    color: rgba(11,18,32,.78);
    margin-bottom: 8px;
  }
  .input, .textarea{
    width:100%;
    padding: 12px 14px;
    border-radius: 14px;
    border: 1px solid rgba(11,18,32,.10);
    background: rgba(255,255,255,.85);
    outline:none;
    transition: transform .14s ease, border-color .14s ease, box-shadow .14s ease;
  }
  .textarea{ min-height: 110px; resize: vertical; }

  .input:focus, .textarea:focus{
    border-color: rgba(45,168,255,.45);
    box-shadow: 0 18px 40px rgba(45,168,255,.12);
    transform: translateY(-1px);
  }

  .hint{
    margin-top: 8px;
    font-size: 12px;
    color: rgba(11,18,32,.55);
  }
  .err{
    margin-top: 8px;
    font-size: 12px;
    color: #b42318;
    font-weight: 650;
  }

  .actions{
    margin-top: 16px;
    display:flex;
    gap: 10px;
    align-items:center;
    justify-content:flex-end;
    padding-top: 16px;
    border-top: 1px solid rgba(11,18,32,.06);
  }
</style>

<section class="page">
  <div class="container">
    <div class="kicker">Products</div>

    <div class="headline">
      <div>
        <h1>Tambah Produk</h1>
        <p class="sub">Masukkan data produk dengan format rapi. Setelah disimpan, produk langsung muncul di dashboard.</p>
      </div>
      <a class="btn btn-ghost" href="/products">Kembali</a>
    </div>

    <div class="panel">
      <div class="panelHead">
        <div style="font-weight:750; color: rgba(11,18,32,.85);">Form Produk</div>
        <div style="font-size:12px; color: rgba(11,18,32,.55);">Wajib: SKU, Nama, Harga, Stok</div>
      </div>

      <div class="panelBody">
        <form method="post" action="/products" autocomplete="off">
          <?= csrf_field() ?>

          <div class="grid">
            <div class="field">
              <label>SKU</label>
              <input class="input" name="sku" value="<?= old('sku') ?>" placeholder="SKY-001">
              <?php if ($v?->getError('sku')): ?>
                <div class="err"><?= esc($v->getError('sku')) ?></div>
              <?php else: ?>
                <div class="hint">Kode unik untuk identifikasi cepat.</div>
              <?php endif; ?>
            </div>

            <div class="field">
              <label>Nama Produk</label>
              <input class="input" name="name" value="<?= old('name') ?>" placeholder="Contoh: Buku Fisika Dasar">
              <?php if ($v?->getError('name')): ?>
                <div class="err"><?= esc($v->getError('name')) ?></div>
              <?php else: ?>
                <div class="hint">Nama jelas, jangan kepanjangan.</div>
              <?php endif; ?>
            </div>

            <div class="field">
              <label>Harga</label>
              <input class="input" name="price" value="<?= old('price', '0.00') ?>" placeholder="0.00">
              <?php if ($v?->getError('price')): ?>
                <div class="err"><?= esc($v->getError('price')) ?></div>
              <?php else: ?>
                <div class="hint">Format angka, contoh: 15000 atau 15000.00</div>
              <?php endif; ?>
            </div>

            <div class="field">
              <label>Stok</label>
              <input class="input" name="stock" value="<?= old('stock', '0') ?>" placeholder="0">
              <?php if ($v?->getError('stock')): ?>
                <div class="err"><?= esc($v->getError('stock')) ?></div>
              <?php else: ?>
                <div class="hint">Jumlah stok tersedia.</div>
              <?php endif; ?>
            </div>
          </div>

          <div class="field" style="margin-top:14px">
            <label>Deskripsi</label>
            <textarea class="textarea" name="description" placeholder="Deskripsi singkat, cukup 1–2 kalimat."><?= old('description') ?></textarea>
            <div class="hint">Opsional. Isi kalau memang perlu.</div>
          </div>

          <div class="actions">
            <a class="btn btn-ghost" href="/products">Batal</a>
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
