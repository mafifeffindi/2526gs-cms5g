<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Warung Kopi Gilang') ?></title>

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=playfair-display:400,600,700|inter:400,500,600&display=swap" rel="stylesheet">

  <style>
    :root{
      /* Bright cafe palette */
      --bg1:#fbf7f0;   /* milk foam */
      --bg2:#f6eadb;   /* latte */
      --bg3:#efdac2;   /* caramel */
      --text:#231a14;  /* espresso */
      --muted:#6a5a52;
      --coffee:#7a4e2d;

      --panel: rgba(255,255,255,.72);
      --panel2: rgba(255,255,255,.88);

      --shadow: 0 24px 90px rgba(35,26,20,.10);
      --shadow2: 0 10px 42px rgba(35,26,20,.08);

      --radius: 28px;
      --max: 1120px;
    }

    *{box-sizing:border-box}

    body{
      margin:0;
      color:var(--text);
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto;
      min-height:100vh;

      /* Bright realistic background (no image) */
      background:
        radial-gradient(1200px 520px at 12% 8%, rgba(122,78,45,.08), transparent 62%),
        radial-gradient(900px 420px at 86% 0%, rgba(160,106,58,.07), transparent 58%),
        radial-gradient(720px 460px at 72% 85%, rgba(35,26,20,.05), transparent 60%),
        radial-gradient(520px 320px at 30% 70%, rgba(255,255,255,.60), transparent 65%),
        linear-gradient(180deg, var(--bg1) 0%, var(--bg2) 55%, var(--bg3) 100%);
    }

    a{color:inherit; text-decoration:none}

    .wrap{
      max-width:var(--max);
      margin:0 auto;
      padding:26px 16px 56px;
    }

    /* Topbar */
    .topbar{
      position:sticky;
      top:0;
      z-index:50;
      padding:14px 0;
      backdrop-filter: blur(12px);
      background: linear-gradient(180deg, rgba(251,247,240,.88), rgba(251,247,240,.55));
    }

    /* 3 columns: left (space), center brand, right actions */
    .nav{
      max-width:var(--max);
      margin:0 auto;
      padding:0 16px;
      display:grid;
      grid-template-columns: 1fr auto 1fr;
      align-items:center;
      gap:12px;
    }

    .leftSpace{height:1px;} /* biar grid kiri ada “slot” */

    .brandCenter{
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      text-align:center;
      gap:4px;
      padding:4px 10px;
    }

    .brandCenter .name{
      margin:0;
      font-family: "Playfair Display", ui-serif, Georgia, serif;
      font-weight:800;
      letter-spacing:1.2px;
      font-size:22px;        /* lebih besar */
      line-height:1.05;
      text-transform:uppercase;
    }

    .brandCenter .tag{
      margin:0;
      color:var(--muted);
      font-size:12px;
    }

    .actions{
      display:flex;
      justify-content:flex-end;
      gap:10px;
      align-items:center;
      flex-wrap:wrap;
    }

    .btn{
      padding:10px 14px;
      border-radius:999px;
      border:0;
      background: rgba(35,26,20,.06);
      color: var(--text);
      font-size:13px;
      font-weight:600;
      cursor:pointer;
      box-shadow: 0 8px 26px rgba(35,26,20,.10);
      transition: transform .12s ease, background .12s ease;
    }
    .btn:hover{ transform: translateY(-1px); background: rgba(35,26,20,.08); }

    .btn.primary{
      background: rgba(122,78,45,.12);
      color: var(--coffee);
      font-weight:700;
    }

    /* Panels */
    .panel{
      background: var(--panel);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
    }

    .panelInner{ padding:22px; }

    .h1{
      margin:0;
      font-family: "Playfair Display", ui-serif, Georgia, serif;
      font-size: 46px;
      line-height:1.05;
      letter-spacing:.2px;
    }

    .lead{
      margin:10px 0 0;
      max-width: 62ch;
      color: var(--muted);
      font-size:14px;
      line-height:1.6;
    }

    .grid2{display:grid; grid-template-columns: 1.2fr .8fr; gap:16px}
    @media(max-width:900px){
      .grid2{grid-template-columns:1fr}
      .nav{grid-template-columns: 1fr; gap:10px}
      .actions{justify-content:center}
    }

    .card{
      background: var(--panel2);
      border-radius: 22px;
      box-shadow: 0 10px 40px rgba(35,26,20,.08);
      padding:16px;
    }

    .small{color:var(--muted); font-size:12px}
    .sep{height:1px; background: rgba(35,26,20,.10); margin:14px 0}

    input, textarea{
      width:100%;
      border:0;
      outline:none;
      padding:12px 14px;
      border-radius: 16px;
      background: rgba(255,255,255,.85);
      box-shadow: inset 0 1px 0 rgba(255,255,255,.85);
      font-family: inherit;
      font-size: 14px;
      color: var(--text);
    }
    textarea{min-height:120px; resize:vertical}
    label{display:block; margin:10px 0 6px; color:var(--muted); font-size:12px}

    .row2{display:grid; grid-template-columns:1fr 1fr; gap:12px}
    @media(max-width:720px){.row2{grid-template-columns:1fr}}

    footer{
      margin-top:18px;
      color: rgba(106,90,82,.95);
      font-size:12px;
      text-align:center;
      text-shadow: 0 2px 12px rgba(255,255,255,.70);
    }
  </style>
</head>

<body>
  <div class="topbar">
    <div class="nav">
      <div class="leftSpace"></div>

      <div class="brandCenter">
        <p class="name">WARUNG KOPI GILANG</p>
        <p class="tag">kopi, obrolan, dan keputusan hidup yang meragukan</p>
      </div>

      <div class="actions">
        <a class="btn" href="/">Landing</a>
        <a class="btn primary" href="/menus">Kelola Menu</a>
        <a class="btn primary" href="/menus/new">Tambah Menu</a>
      </div>
    </div>
  </div>

  <main class="wrap">
    <?= $this->renderSection('content') ?>

    <footer>
      © <?= date('Y') ?> Warung Kopi Gilang · CodeIgniter 4 · Docker
    </footer>
  </main>
</body>
</html>
