<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Menu Kopi</title>
  <style>
    body{margin:0;font-family:system-ui;background:#0f0f10;color:#f7f4ee}
    a{color:inherit;text-decoration:none}
    .wrap{max-width:1100px;margin:0 auto;padding:18px}
    .top{display:flex;justify-content:space-between;align-items:center;gap:10px;flex-wrap:wrap}
    .btn{padding:10px 14px;border-radius:14px;border:1px solid #26262a;background:transparent}
    .btn.primary{border-color:rgba(201,162,39,.5);background:rgba(201,162,39,.10)}
    table{width:100%;border-collapse:collapse;margin-top:14px;border:1px solid #26262a;border-radius:16px;overflow:hidden}
    th,td{padding:12px;border-bottom:1px solid #26262a;text-align:left;font-size:14px}
    th{color:#b9b4aa;font-weight:600;background:#131314}
    tr:hover td{background:#141416}
    .actions{display:flex;gap:8px}
    .pill{padding:6px 10px;border:1px solid #26262a;border-radius:999px;color:#b9b4aa;font-size:12px}
    form{display:inline}
    button{cursor:pointer}
  </style>
</head>
<body>
  <div class="wrap">
    <div class="top">
      <div>
        <h2 style="margin:0">Menu Warung Kopi</h2>
        <div style="color:#b9b4aa;font-size:13px;margin-top:4px">Tambah, edit, hapus menu. Karena hidup butuh kontrol.</div>
      </div>
      <div class="actions">
        <a class="btn" href="/">Landing</a>
        <a class="btn primary" href="/menus/new">Tambah Menu</a>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th style="width:200px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php if (empty($menus)): ?>
        <tr><td colspan="4" style="color:#b9b4aa">Belum ada data. Tambah menu dulu.</td></tr>
      <?php else: ?>
        <?php foreach ($menus as $m): ?>
        <tr>
          <td><?= esc($m['name']) ?></td>
          <td><span class="pill"><?= esc($m['category']) ?></span></td>
          <td>Rp <?= number_format((int)$m['price'], 0, ',', '.') ?></td>
          <td>
            <div class="actions">
              <a class="btn" href="/menus/<?= $m['id'] ?>/edit">Edit</a>
              <form action="/menus/<?= $m['id'] ?>/delete" method="post" onsubmit="return confirm('Hapus menu ini?');">
                <button class="btn" type="submit">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
