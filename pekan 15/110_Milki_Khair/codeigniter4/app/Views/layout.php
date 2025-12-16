<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'SkyStore') ?></title>

  <style>
    :root{
      --sky: #2DA8FF;
      --sky-2: #7CCBFF;
      --ink: #0B1220;
      --muted: rgba(11,18,32,.62);
      --line: rgba(11,18,32,.10);
      --glass: rgba(255,255,255,.72);
      --glass-2: rgba(255,255,255,.55);
      --shadow: 0 26px 80px rgba(2,18,48,.10);
      --radius: 18px;
    }

    *{ box-sizing: border-box; }
    html,body{ height:100%; }
    body{
      margin:0;
      color: var(--ink);
      background: #F6FBFF;
      font-family: ui-sans-serif, system-ui, -apple-system, "SF Pro Display", "SF Pro Text", "Inter", Arial, sans-serif;
      -webkit-font-smoothing: antialiased;
      text-rendering: optimizeLegibility;
      overflow-x:hidden;
    }

    /* subtle sky shapes (NOT gradient, cuma layer warna solid transparan) */
    .bg{
      position: fixed;
      inset: 0;
      pointer-events:none;
      z-index: -1;
    }
    .blob{
      position:absolute;
      width: 620px;
      height: 620px;
      border-radius: 999px;
      background: rgba(45,168,255,.14);
      filter: blur(28px);
      transform: translateZ(0);
      animation: floaty 12s ease-in-out infinite;
    }
    .blob.b1{ top:-260px; left:-220px; }
    .blob.b2{ bottom:-260px; right:-220px; background: rgba(124,203,255,.18); animation-delay: -4s; }
    @keyframes floaty{
      0%,100%{ transform: translate3d(0,0,0); }
      50%{ transform: translate3d(0,18px,0); }
    }

    .container{
      width: min(1100px, calc(100% - 48px));
      margin: 0 auto;
    }

    /* Header */
    .header{
      position: sticky;
      top: 0;
      z-index: 50;
      background: rgba(246,251,255,.72);
      backdrop-filter: blur(14px);
      border-bottom: 1px solid rgba(11,18,32,.06);
    }
    .headerInner{
      height: 78px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 18px;
    }

    .brand{
      display:flex;
      align-items:center;
      gap: 14px;
      text-decoration:none;
      color: inherit;
      transform: translateZ(0);
    }
    .mark{
      width: 42px;
      height: 42px;
      border-radius: 14px;
      background: var(--sky);
      box-shadow: 0 18px 45px rgba(45,168,255,.28);
      position: relative;
      overflow:hidden;
      transition: transform .18s ease;
    }
    .mark::after{
      content:"";
      position:absolute;
      inset:-40%;
      background: rgba(255,255,255,.18);
      transform: rotate(18deg);
    }
    .brand:hover .mark{ transform: translateY(-1px); }

    .brandText{
      display:flex;
      flex-direction:column;
      line-height:1.05;
    }
    .brandText strong{
      font-size: 16px;
      letter-spacing:-0.02em;
    }
    .brandText span{
      font-size: 13px;
      color: var(--muted);
      margin-top: 4px;
    }

    .nav{
      display:flex;
      align-items:center;
      gap: 10px;
    }

    .nav a{
      text-decoration:none;
      color: rgba(11,18,32,.70);
      font-weight: 700;
      font-size: 14px;
      padding: 10px 12px;
      border-radius: 999px;
      transition: background .16s ease, transform .16s ease, color .16s ease;
    }
    .nav a:hover{
      background: rgba(45,168,255,.10);
      color: rgba(11,18,32,.90);
      transform: translateY(-1px);
    }

    /* Active state */
    .nav a.is-active{
      background: rgba(45,168,255,.16);
      color: rgba(11,18,32,.92);
    }

    /* Buttons */
    .btn{
      appearance:none;
      border:1px solid rgba(11,18,32,.10);
      background: rgba(255,255,255,.85);
      color: rgba(11,18,32,.85);
      font-weight: 800;
      padding: 11px 14px;
      border-radius: 999px;
      text-decoration:none;
      display:inline-flex;
      align-items:center;
      gap:10px;
      transition: transform .16s ease, box-shadow .16s ease, border-color .16s ease, background .16s ease;
      cursor:pointer;
    }
    .btn:hover{
      transform: translateY(-1px);
      box-shadow: 0 16px 40px rgba(2,18,48,.10);
      border-color: rgba(45,168,255,.30);
    }
    .btn:active{ transform: translateY(0); }

    .btn-primary{
      background: var(--sky);
      border-color: rgba(45,168,255,.45);
      color: #07111d;
      box-shadow: 0 16px 40px rgba(45,168,255,.22);
    }
    .btn-primary:hover{
      box-shadow: 0 22px 60px rgba(45,168,255,.30);
    }
    .btn-ghost{
      background: rgba(255,255,255,.65);
    }

    /* Page wrapper */
    main{ padding-top: 10px; }

    /* Footer */
    footer{
      padding: 28px 0 40px;
      color: rgba(11,18,32,.55);
      font-size: 13px;
    }
    .foot{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 12px;
      border-top: 1px solid rgba(11,18,32,.06);
      padding-top: 18px;
    }

    @media (max-width: 720px){
      .brandText span{ display:none; }
      .headerInner{ height: 72px; }
      .nav{ gap: 6px; }
      .nav a{ padding: 9px 10px; }
    }
  </style>
</head>

<body>
  <div class="bg">
    <div class="blob b1"></div>
    <div class="blob b2"></div>
  </div>

  <?php
    $path = trim(parse_url(current_url(), PHP_URL_PATH) ?? '', '/');
    $isHome = ($path === '' || $path === 'index.php');
    $isProducts = (str_starts_with($path, 'products'));
  ?>

  <header class="header">
    <div class="container">
      <div class="headerInner">
        <a class="brand" href="/">
          <div class="mark" aria-hidden="true"></div>
          <div class="brandText">
            <strong>SkyStore</strong>
            <span>Simple catalog · CRUD dashboard</span>
          </div>
        </a>

        <nav class="nav" aria-label="Primary">
          <a href="/" class="<?= $isHome ? 'is-active' : '' ?>">Home</a>
          <a href="/products" class="<?= $isProducts ? 'is-active' : '' ?>">Produk</a>
          <a class="btn btn-primary" href="/products">Dashboard</a>
        </nav>
      </div>
    </div>
  </header>

  <main>
    <?= $this->renderSection('content') ?>
  </main>

  <footer>
    <div class="container">
      <div class="foot">
        <div>© <?= date('Y') ?> SkyStore</div>
        <div>Sky blue · White · Clean UI</div>
      </div>
    </div>
  </footer>
</body>
</html>
