<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Warung Kopi</title>
  <style>
    :root{
      --bg1:#fbf7f1;
      --bg2:#f3eadf;
      --card:#ffffff;
      --text:#1f1a17;
      --muted:#6c5e56;
      --accent:#7a4e2d;
      --accent2:#caa37a;
      --shadow: 0 24px 80px rgba(31,26,23,.10);
      --radius:24px;
      --max:1180px;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      color:var(--text);
      background:
        radial-gradient(900px 450px at 15% 0%, rgba(122,78,45,.10), transparent 60%),
        radial-gradient(900px 450px at 85% 10%, rgba(202,163,122,.16), transparent 55%),
        linear-gradient(180deg, var(--bg1), var(--bg2));
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto;
    }
    .serif{font-family: ui-serif, "Iowan Old Style", "Palatino", "Times New Roman", serif;}
    a{color:inherit;text-decoration:none}
    .wrap{max-width:var(--max); margin:0 auto; padding:24px 18px}
    header{
      position:sticky; top:0; z-index:10;
      backdrop-filter: blur(12px);
      background: rgba(251,247,241,.65);
    }
    .nav{
      display:flex; align-items:center; justify-content:space-between;
      gap:12px; padding:14px 0;
    }
    .brand{display:flex; align-items:center; gap:12px}
    .mark{
      width:42px; height:42px; border-radius:16px;
      background: linear-gradient(135deg, rgba(122,78,45,.18), rgba(202,163,122,.18));
      display:grid; place-items:center;
      box-shadow: 0 14px 40px rgba(122,78,45,.10);
    }
    .bean{
      width:10px; height:10px; border-radius:50%;
      background: var(--accent);
      box-shadow: 0 0 18px rgba(122,78,45,.35);
    }
    .brand .t1{margin:0; font-size:13px; letter-spacing:.9px; text-transform:uppercase}
    .brand .t2{margin:2px 0 0; font-size:12px; color:var(--muted)}
    .actions{display:flex; gap:10px; align-items:center}
    .btn{
      padding:10px 14px;
      border-radius:999px;
      border:1px solid rgba(31,26,23,.10);
      background: rgba(255,255,255,.65);
      box-shadow: 0 10px 30px rgba(31,26,23,.06);
      font-size:13px;
    }
    .btn.primary{
      border-color: rgba(122,78,45,.18);
      background: rgba(122,78,45,.10);
      color: var(--accent);
      font-weight:600;
    }

    .hero{
      min-height: calc(100vh - 72px);
      display:flex; align-items:center;
    }
    .grid{
      display:grid;
      grid-template-columns: 1.2fr .8fr;
      gap:18px;
      width:100%;
    }
    @media (max-width: 980px){
      .grid{grid-template-columns:1fr}
      .hero{min-height:auto; padding:26px 0 18px}
    }

    .panel{
      background: rgba(255,255,255,.72);
      border: 1px solid rgba(31,26,23,.08);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding:22px;
    }
    /* border minim: kita pakai “glass” + shadow, bukan garis tebal */
    .tag{
      display:inline-flex; align-items:center; gap:10px;
      padding:8px 12px;
      border-radius:999px;
      background: rgba(255,255,255,.70);
      border:1px solid rgba(31,26,23,.08);
      color:var(--muted);
      font-size:12px;
    }
    .dot{width:8px;height:8px;border-radius:50%; background:var(--accent2)}
    h1{
      margin:14px 0 10px;
      font-size:56px;
      line-height:1.02;
      letter-spacing:-.5px;
    }
    @media(max-width:980px){h1{font-size:40px}}
    .lead{
      margin:0 0 16px;
      color:var(--muted);
      font-size:15px;
      max-width:60ch;
    }
    .cta{display:flex; gap:10px; flex-wrap:wrap; margin-top:6px}
    .cta .btn{padding:12px 16px}
    .stats{
      display:grid; grid-template-columns:repeat(3,1fr); gap:10px; margin-top:18px;
    }
    .stat{
      padding:12px 14px;
      border-radius:18px;
      background: rgba(255,255,255,.72);
      border:1px solid rgba(31,26,23,.08);
    }
    .stat .k{font-size:12px; color:var(--muted)}
    .stat .v{margin-top:4px; font-size:16px}

    .listTitle{margin:0 0 12px; color:var(--muted); font-size:12px; letter-spacing:.4px; text-transform:uppercase}
    .menuList{display:grid; gap:10px}
    .item{
      padding:14px;
      border-radius:20px;
      background: rgba(255,255,255,.80);
      border:1px solid rgba(31,26,23,.07);
      transition: transform .12s ease, box-shadow .12s ease;
    }
    .item:hover{
      transform: translateY(-2px);
      box-shadow: 0 18px 60px rgba(31,26,23,.10);
    }
    .item h3{margin:0 0 6px; font-size:16px}
    .item p{margin:0; color:var(--muted); font-size:13px}
    .row{
      margin-top:10px;
      display:flex; justify-content:space-between; align-items:center;
      color:var(--muted); font-size:13px;
    }
    .price{color:var(--accent); font-weight:700}

    footer{
      padding:18px 0 26px;
      color: rgba(108,94,86,.9);
      font-size:13px;
    }
    .foot{
      display:flex; justify-content:space-between; gap:12px; flex-wrap:wrap;
    }
  </style>
</head>
<body>

<header>
  <div class="wrap">
    <div class="nav">
      <div class="brand">
        <div class="mark"><div class="bean"></div></div>
        <div>
          <p class="t1 serif">Warung Kopi</p>
          <p class="t2">clean, hangat, dan rapi (akhirnya)</p>
        </div>
      </div>
      <div class="actions">
        <a class="btn" href="/menus">Kelola Menu</a>
        <a class="btn primary" href="/menus/new">Tambah Menu</a>
      </div>
    </div>
  </div>
</header>

<section class="hero">
  <div class="wrap">
    <div class="grid">
      <div class="panel">
        <div class="tag"><span class="dot"></span> Open daily • 08:00–23:00 • Brewed with taste</div>
        <h1 class="serif">Kopi terasa <span style="color:var(--accent)">mewah</span>, tampilannya tetap <span style="color:var(--accent)">tenang</span>.</h1>
        <p class="lead">
          Landing page ini menampilkan menu unggulan. CRUD dipakai untuk tambah, edit, dan hapus menu.
          Semua serba simpel, tapi tetap berkelas.
        </p>

        <div class="cta">
          <a class="btn primary" href="/menus">Lihat Menu</a>
          <a class="btn" href="/menus/new">Tambah Menu Baru</a>
        </div>

        <div class="stats">
          <div class="stat"><div class="k">Signature</div><div class="v serif">Espresso</div></div>
          <div class="stat"><div class="k">Beans</div><div class="v serif">Arabica</div></div>
          <div class="stat"><div class="k">Mood</div><div class="v serif">Cozy</div></div>
        </div>
      </div>

      <div class="panel">
        <p class="listTitle">Menu Unggulan</p>

        <div class="menuList">
          <?php if (empty($featured)): ?>
            <div class="item">
              <h3 class="serif">Belum ada menu</h3>
              <p>Tambah dulu lewat CRUD biar halaman ini punya isi dan tujuan.</p>
              <div class="row">
                <span>Mulai dari</span>
                <span class="price">Rp 0</span>
              </div>
            </div>
          <?php else: ?>
            <?php foreach ($featured as $m): ?>
              <div class="item">
                <h3 class="serif"><?= esc($m['name']) ?></h3>
                <p><?= esc($m['category']) ?> • <?= esc($m['description'] ?? 'Tanpa deskripsi') ?></p>
                <div class="row">
                  <span>Harga</span>
                  <span class="price">Rp <?= number_format((int)$m['price'], 0, ',', '.') ?></span>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <footer>
      <div class="foot">
        <div>© <?= date('Y') ?> Warung Kopi. Minimalis tapi niat.</div>
        <div>Built with CodeIgniter 4 + Docker</div>
      </div>
    </footer>
  </div>
</section>

</body>
</html>
