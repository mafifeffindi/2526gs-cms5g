<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Students') ?></title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root{
      --bg: #f6f8fc;
      --card: #ffffff;
      --text: #0f172a;
      --muted:#64748b;
      --border: rgba(15,23,42,.10);
      --shadow: 0 18px 60px rgba(15,23,42,.10);
      --radius: 18px;
      --blue: #1d9bf0;
      --blue2:#7dd3fc;
    }

    body{
      background:
        radial-gradient(900px 380px at 15% 0%, rgba(125,211,252,.35), transparent 55%),
        radial-gradient(900px 380px at 85% 0%, rgba(29,155,240,.18), transparent 55%),
        var(--bg);
      color: var(--text);
      -webkit-font-smoothing: antialiased;
      text-rendering: optimizeLegibility;
    }

    .container-narrow{ max-width: 1080px; }

    .nav-glass{
      background: rgba(255,255,255,.75);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border);
    }

    .brand-mark{
      width: 12px; height: 12px; border-radius: 999px;
      background: linear-gradient(135deg, var(--blue2), var(--blue));
      box-shadow: 0 0 0 6px rgba(125,211,252,.25);
      display:inline-block;
    }

    .panel{
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }

    .muted{ color: var(--muted) !important; }

    /* Buttons */
    .btn-primary{
      background: linear-gradient(135deg, var(--blue2), var(--blue));
      border: 0;
      color: #05223a;
      font-weight: 800;
      border-radius: 14px;
      padding: .7rem 1rem;
      box-shadow: 0 12px 28px rgba(29,155,240,.18);
    }
    .btn-primary:hover{ filter: brightness(1.02); color:#05223a; }

    .btn-ghost{
      background: rgba(15,23,42,.04);
      border: 1px solid rgba(15,23,42,.08);
      color: var(--text);
      border-radius: 14px;
      padding: .7rem 1rem;
    }
    .btn-ghost:hover{ background: rgba(15,23,42,.06); }

    .chip{
      display:inline-flex; align-items:center; gap:.5rem;
      padding:.55rem .8rem;
      border-radius:999px;
      background: rgba(29,155,240,.10);
      border: 1px solid rgba(29,155,240,.18);
      color: #075985;
      font-weight: 800;
    }

    /* Inputs */
    .form-control{
      background: #fff;
      border: 1px solid rgba(15,23,42,.12);
      border-radius: 16px;
      padding: .85rem 1rem;
    }
    .form-control:focus{
      border-color: rgba(29,155,240,.45);
      box-shadow: 0 0 0 .25rem rgba(125,211,252,.25);
    }

    /* Table */
    .table{
      --bs-table-bg: transparent;
      margin-bottom: 0;
    }
    .table thead th{
      color: #334155;
      font-weight: 900;
      border-bottom: 1px solid rgba(15,23,42,.10) !important;
      padding-top: 16px;
      padding-bottom: 16px;
    }
    .table tbody td{
      border-top: 1px solid rgba(15,23,42,.06) !important;
      padding-top: 16px;
      padding-bottom: 16px;
    }
    .table-hover tbody tr:hover{
      background: rgba(125,211,252,.15) !important;
    }

    /* Action buttons (IMPORTANT: clickable) */
    .icon-btn{
      width: 40px; height: 40px;
      display:inline-grid;
      place-items:center;
      border-radius: 14px;
      background: rgba(15,23,42,.04);
      border: 1px solid rgba(15,23,42,.10);
      color: #0f172a;
      cursor: pointer;
      position: relative;
      z-index: 5; /* biar gak ketutup hover layer */
    }
    .icon-btn:hover{ background: rgba(125,211,252,.20); border-color: rgba(29,155,240,.22); }

    .icon-btn.danger{
      background: rgba(239,68,68,.08);
      border-color: rgba(239,68,68,.18);
      color: #b91c1c;
    }
    .icon-btn.danger:hover{ background: rgba(239,68,68,.12); }

    .avatar{
      width: 42px; height: 42px;
      border-radius: 16px;
      display:grid;
      place-items:center;
      font-weight: 900;
      color: #05223a;
      background: linear-gradient(135deg, rgba(125,211,252,.9), rgba(29,155,240,.35));
      border: 1px solid rgba(29,155,240,.22);
    }

    /* Modal */
    .modal-content{
      border-radius: 18px;
      border: 1px solid rgba(15,23,42,.10);
      box-shadow: 0 18px 60px rgba(15,23,42,.20);
    }
  </style>
</head>

<body>
  <nav class="navbar nav-glass">
    <div class="container container-narrow py-2">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="/students" style="letter-spacing:.2px;">
        <span class="brand-mark"></span>
        <span>Students</span>
      </a>

      <div class="ms-auto d-flex align-items-center gap-2">
        <span class="small muted d-none d-md-inline">CI4 • Docker • UI</span>
      </div>
    </div>
  </nav>

  <main class="container container-narrow my-4">

    <?php if (session()->getFlashdata('success')): ?>
      <div class="panel p-3 mb-3">
        <div class="d-flex align-items-start gap-2">
          <i class="bi bi-check-circle-fill" style="color: var(--blue)"></i>
          <div>
            <div class="fw-bold">Berhasil</div>
            <div class="small muted"><?= esc(session()->getFlashdata('success')) ?></div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="panel p-3 mb-3" style="border-color: rgba(239,68,68,.20);">
        <div class="d-flex align-items-start gap-2">
          <i class="bi bi-exclamation-triangle-fill" style="color: rgba(239,68,68,.95)"></i>
          <div>
            <div class="fw-bold">Gagal</div>
            <div class="small muted"><?= esc(session()->getFlashdata('error')) ?></div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
