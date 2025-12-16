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

  .meta{
    display:flex;
    gap: 10px;
    flex-wrap: wrap;
    align-items:center;
    justify-content:flex-end;
  }
  .pill{
    font-size: 12px;
    padding: 8px 10px;
    border-radius: 999px;
    border: 1px solid rgba(11,18,32,.08);
    background: rgba(255,255,255,.75);
    color: rgba(11,18,32,.70);
  }

  .grid{
    display:grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
  }
  @media (max-width: 780px){
    .grid{ grid-template-columns: 1fr; }
    .meta{ justify-content:flex-start; }
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
    justify-content:space-between;
    padding-top: 16px;
    border-top: 1px solid rgba(11,18,32,.06);
  }
  .danger{
    border: 1px solid rgba(180,35,24,.20);
    background: rgba(180,35,24,.08);
    color: rgba(180,35,24,.95);
  }
</style>

<section class="page">
  <div class="container">
    <div class="kicker">Products</div>

    <div class="headline">
      <div>
        <h1>Edit Produk</h1>
        <p class="sub">Perbarui data tanpa merusak ritme hidup. Simpan perubahan kalau sudah yakin.</p>
      </div>
      <a class="btn btn-ghost" href="/products">Kembali</a>
    </div>

    <div class="panel">
      <div class="panelHead">
        <div style="font-weight:750; color: rgba(11,18,32,.85);">Form Edit</div>

        <div class="meta">
          <span class="pill">ID: <?= esc((string)$product['id']) ?></span>
          <span class="pill">SKU: <?= esc((string)$product['sku']) ?></span>
        </div>
      </div>

      <div class="panelBody">
        <form method="post" action="/products/<?= esc((string)$product['id']) ?>" autocomplete="off">
          <?= csrf_field() ?>

          <div class="grid">
            <div class="field">
              <label>SKU</label>
              <input class="input" name="sku" value="<?= old('sku', $product['sku']) ?>" placeholder="SKY-001">
              <?php if ($v?->getError('sku')): ?>
                <div class="err"><?= esc($v->getError('sku')) ?></div>
              <?php else: ?>
                <div class="hint">Boleh diubah, tapi pastikan tetap unik.</div>
              <?php endif; ?>
            </div>

            <div class="field">
              <label>Nama Produk</label>
              <input class="input" name="name" value="<?= old('name', $product['name']) ?>" placeholder="Contoh: Buku Fisika Dasar">
              <?php if ($v?->getError('name')): ?>
                <div class="err"><?= esc($v->getError('name')) ?></div>
              <?php else: ?>
                <div class="hint">Nama yang rapi bikin data gampang dicari.</div>
              <?php endif; ?>
            </div>

            <div class="field">
              <label>Harga</label>
              <input class="input" name="price" value="<?= old('price', (string)$product['price']) ?>" placeholder="0.00">
              <?php if ($v?->getError('price')): ?>
                <div class="err"><?= esc($v->getError('price')) ?></div>
              <?php else: ?>
                <div class="hint">Format angka. CI bakal validasi juga.</div>
              <?php endif; ?>
            </div>

            <div class="field">
              <label>Stok</label>
              <input class="input" name="stock" value="<?= old('stock', (string)$product['stock']) ?>" placeholder="0">
              <?php if ($v?->getError('stock')): ?>
                <div class="err"><?= esc($v->getError('stock')) ?></div>
              <?php else: ?>
                <div class="hint">Jangan lupa update stok biar gak halu.</div>
              <?php endif; ?>
            </div>
          </div>

          <div class="field" style="margin-top:14px">
            <label>Deskripsi</label>
            <textarea class="textarea" name="description" placeholder="Deskripsi singkat, cukup 1–2 kalimat."><?= old('description', $product['description'] ?? '') ?></textarea>
            <div class="hint">Opsional. Kalau kosong juga oke.</div>
          </div>

          <div class="actions">
            <form method="post" action="/products/<?= esc((string)$product['id']) ?>/delete" onsubmit="return confirm('Hapus produk ini?')">
              <?= csrf_field() ?>
              <button class="btn danger" type="submit">Hapus</button>
            </form>

            <div style="display:flex; gap:10px; align-items:center;">
              <a class="btn btn-ghost" href="/products">Batal</a>
              <button class="btn btn-primary" type="submit">Update</button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
