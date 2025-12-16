<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
  $q = $q ?? '';
  $total = $total ?? (is_array($products ?? null) ? count($products) : 0);
?>

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
    font-size: clamp(30px, 4vw, 48px);
    letter-spacing:-0.03em;
    line-height:1.02;
  }
  .sub{
    margin: 10px 0 0;
    color: rgba(11,18,32,.62);
    max-width: 62ch;
  }

  /* top actions */
  .topbar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 14px;
    margin: 18px 0 14px;
    flex-wrap: wrap;
  }
  .search{
    display:flex;
    gap: 10px;
    align-items:center;
    flex-wrap: wrap;
  }

  .input{
    width: min(420px, 80vw);
    padding: 12px 14px;
    border-radius: 14px;
    border: 1px solid rgba(11,18,32,.10);
    background: rgba(255,255,255,.85);
    outline:none;
    transition: transform .14s ease, border-color .14s ease, box-shadow .14s ease;
  }
  .input:focus{
    border-color: rgba(45,168,255,.45);
    box-shadow: 0 18px 40px rgba(45,168,255,.12);
    transform: translateY(-1px);
  }

  .pill{
    font-size: 12px;
    padding: 8px 12px;
    border-radius: 999px;
    border: 1px solid rgba(11,18,32,.08);
    background: rgba(255,255,255,.70);
    color: rgba(11,18,32,.72);
  }

  /* table container */
  .sheet{
    background: rgba(255,255,255,.70);
    border-radius: 18px;
    box-shadow: 0 26px 80px rgba(2,18,48,.08);
    overflow: hidden;
  }
  .sheetHead{
    padding: 14px 16px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 12px;
    background: rgba(246,251,255,.55);
  }
  .sheetTitle{
    font-weight: 800;
    color: rgba(11,18,32,.85);
  }
  .sheetBody{ padding: 0; }

  table{
    width:100%;
    border-collapse: separate;
    border-spacing: 0;
  }
  thead th{
    text-align:left;
    font-size: 12px;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: rgba(11,18,32,.55);
    padding: 14px 16px;
    background: rgba(255,255,255,.55);
    position: sticky;
    top: 0;
    backdrop-filter: blur(10px);
  }
  tbody td{
    padding: 14px 16px;
    vertical-align: top;
    color: rgba(11,18,32,.82);
  }

  /* minimal lines: only row hover + subtle separators */
  tbody tr{
    transition: transform .14s ease, background .14s ease;
  }
  tbody tr:hover{
    background: rgba(45,168,255,.06);
    transform: translateY(-1px);
  }
  tbody tr + tr td{
    border-top: 1px solid rgba(11,18,32,.05);
  }

  .muted{ color: rgba(11,18,32,.60); font-size: 13px; }
  .money{ font-variant-numeric: tabular-nums; }
  .actions{
    display:flex;
    gap: 10px;
    align-items:center;
    justify-content:flex-end;
    flex-wrap: wrap;
  }
  .btnMini{
    padding: 10px 12px;
    border-radius: 999px;
    border: 1px solid rgba(11,18,32,.10);
    background: rgba(255,255,255,.80);
    text-decoration:none;
    color: rgba(11,18,32,.78);
    font-weight: 700;
    transition: transform .14s ease, box-shadow .14s ease, border-color .14s ease;
    display:inline-flex;
    gap: 8px;
    align-items:center;
  }
  .btnMini:hover{
    transform: translateY(-1px);
    box-shadow: 0 16px 36px rgba(2,18,48,.10);
    border-color: rgba(45,168,255,.30);
  }
  .btnDanger{
    border-color: rgba(180,35,24,.18);
    background: rgba(180,35,24,.07);
    color: rgba(180,35,24,.95);
  }

  .empty{
    padding: 26px 16px;
  }

  /* pager */
  .pagerWrap{
    padding: 16px;
    display:flex;
    justify-content:flex-end;
  }

  @media (max-width: 820px){
    thead{ display:none; }
    table, tbody, tr, td{ display:block; width:100%; }
    tbody tr{ padding: 10px 0; }
    tbody td{
      border-top: none !important;
      padding: 10px 16px;
      display:flex;
      justify-content:space-between;
      gap: 10px;
    }
    tbody td::before{
      content: attr(data-label);
      font-size: 12px;
      letter-spacing:.14em;
      text-transform: uppercase;
      color: rgba(11,18,32,.45);
      font-weight: 800;
    }
    .actions{ justify-content:flex-start; }
  }
</style>

<section class="page">
  <div class="container">
    <div class="kicker">Dashboard</div>

    <div class="headline">
      <div>
        <h1>Produk</h1>
        <p class="sub">Kelola data produk tanpa tampilan “rame tapi kosong”. Cepat, bersih, dan konsisten.</p>
      </div>

      <a class="btn btn-primary" href="/products/new">Tambah Produk</a>
    </div>

    <div class="topbar">
      <form class="search" method="get" action="/products">
        <input class="input" name="q" value="<?= esc($q) ?>" placeholder="Cari SKU atau nama...">
        <button class="btn btn-ghost" type="submit">Cari</button>
      </form>

      <span class="pill">Total: <?= esc((string)$total) ?></span>
    </div>

    <div class="sheet">
      <div class="sheetHead">
        <div class="sheetTitle">Daftar Produk</div>
        <div class="muted">CRUD siap jalan. UI gak rewel.</div>
      </div>

      <div class="sheetBody">
        <table>
          <thead>
            <tr>
              <th>SKU</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Deskripsi</th>
              <th style="text-align:right;">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php if (empty($products)): ?>
              <tr>
                <td colspan="6" class="empty">
                  <div style="font-weight:850; font-size:16px; color:rgba(11,18,32,.85)">Belum ada data.</div>
                  <div class="muted" style="margin-top:6px">Klik “Tambah Produk” biar dashboard ini gak jadi museum.</div>
                </td>
              </tr>
            <?php endif; ?>

            <?php foreach ($products as $p): ?>
              <tr>
                <td data-label="SKU"><strong><?= esc($p['sku']) ?></strong></td>
                <td data-label="Nama"><?= esc($p['name']) ?></td>
                <td data-label="Harga" class="money">Rp <?= esc(number_format((float)$p['price'], 0, ',', '.')) ?></td>
                <td data-label="Stok"><?= esc((string)$p['stock']) ?></td>
                <td data-label="Deskripsi" class="muted"><?= esc($p['description'] ?? '') ?></td>
                <td data-label="Aksi" style="text-align:right;">
                  <div class="actions">
                    <a class="btnMini" href="/products/<?= esc((string)$p['id']) ?>/edit">Edit</a>

                    <form method="post" action="/products/<?= esc((string)$p['id']) ?>/delete" onsubmit="return confirm('Hapus produk ini?')">
                      <?= csrf_field() ?>
                      <button class="btnMini btnDanger" type="submit">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <div class="pagerWrap">
          <?= $pager->links() ?>
        </div>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
