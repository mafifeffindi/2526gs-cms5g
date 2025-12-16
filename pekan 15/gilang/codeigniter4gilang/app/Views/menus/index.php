<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu Warung Kopi</title>
  <style>
    :root{
      --bg:#f3eadf;        /* latte */
      --card:#fffaf3;      /* cream */
      --text:#2b1f1a;      /* coffee dark */
      --muted:#6a5a52;     /* coffee grey */
      --line:#e6d6c7;      /* soft line */
      --accent:#7a4e2d;    /* coffee */
      --radius:18px;
      --max:980px;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto;
      color:var(--text);
      background:
        radial-gradient(900px 420px at 18% 10%, rgba(122,78,45,.10), transparent 60%),
        radial-gradient(900px 420px at 82% 0%, rgba(160,106,58,.10), transparent 55%),
        var(--bg);
    }
    a{color:inherit; text-decoration:none}
    .wrap{max-width:var(--max); margin:0 auto; padding:22px 16px}
    .card{
      background:var(--card);
      border:1px solid var(--line);
      border-radius:var(--radius);
      box-shadow: 0 18px 60px rgba(43,31,26,.08);
      overflow:hidden;
    }
    .top{
      padding:18px 18px 10px;
      display:flex; align-items:flex-start; justify-content:space-between;
      gap:12px; flex-wrap:wrap;
    }
    h1{margin:0; font-size:22px; letter-spacing:.2px}
    .sub{margin-top:4px; color:var(--muted); font-size:13px}
    .actions{display:flex; gap:10px; align-items:center}
    .btn{
      padding:10px 14px;
      border-radius:999px;
      border:1px solid var(--line);
      background:transparent;
      color:var(--text);
      font-size:13px;
      cursor:pointer;
    }
    .btn.primary{
      border-color: rgba(122,78,45,.35);
      background: rgba(122,78,45,.10);
      color: var(--accent);
      font-weight:600;
    }

    table{width:100%; border-collapse:collapse}
    thead th{
      text-align:left;
      padding:12px 18px;
      font-size:12px;
      color:var(--muted);
      border-top:1px solid var(--line);
      border-bottom:1px solid var(--line);
      background: rgba(122,78,45,.03);
      letter-spacing:.3px;
    }
    tbody td{
      padding:14px 18px;
      border-bottom:1px solid var(--line);
      font-size:14px;
      vertical-align:top;
    }
    tbody tr:hover td{background: rgba(122,78,45,.04)}
    .pill{
      display:inline-block;
      padding:6px 10px;
      border-radius:999px;
      border:1px solid var(--line);
      color:var(--muted);
      font-size:12px;
      background:#fff;
    }
    .price{font-weight:600; color:var(--accent)}
    form{display:inline}

    .empty{
      padding:18px;
      color:var(--muted);
      font-size:14px;
    }
    .right{white-space:nowrap}
  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <div class="top">
        <div>
          <h1>Menu Warung Kopi</h1>
          <div class="sub">Simpel. Hangat. CRUD tetap jalan.</div>
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
            <th class="right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($menus)): ?>
            <tr>
              <td colspan="4" class="empty">Belum ada data. Tambah menu dulu.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($menus as $m): ?>
              <tr>
                <td><?= esc($m['name']) ?></td>
                <td><span class="pill"><?= esc($m['category']) ?></span></td>
                <td class="price">Rp <?= number_format((int)$m['price'], 0, ',', '.') ?></td>
                <td class="right">
                  <a class="btn" href="/menus/<?= $m['id'] ?>/edit">Edit</a>
                  <form action="/menus/<?= $m['id'] ?>/delete" method="post" onsubmit="return confirm('Hapus menu ini?');">
                    <button class="btn" type="submit">Hapus</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
