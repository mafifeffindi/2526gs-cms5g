<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Menu</title>
  <style>
    :root{
      --bg1:#fbf7f1;
      --bg2:#f3eadf;
      --card:#ffffff;
      --text:#1f1a17;
      --muted:#6c5e56;
      --line:rgba(31,26,23,.10);
      --accent:#7a4e2d;
      --shadow: 0 24px 80px rgba(31,26,23,.10);
      --radius:24px;
      --max:820px;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto;
      color:var(--text);
      background:
        radial-gradient(900px 450px at 15% 0%, rgba(122,78,45,.10), transparent 60%),
        radial-gradient(900px 450px at 85% 10%, rgba(202,163,122,.16), transparent 55%),
        linear-gradient(180deg, var(--bg1), var(--bg2));
    }
    .serif{font-family: ui-serif, "Iowan Old Style", "Palatino", "Times New Roman", serif;}
    a{color:inherit;text-decoration:none}
    .wrap{max-width:var(--max); margin:0 auto; padding:26px 16px}
    .top{display:flex; justify-content:space-between; align-items:center; gap:10px; flex-wrap:wrap}
    h1{margin:0; font-size:26px}
    .sub{margin-top:6px; color:var(--muted); font-size:13px}
    .btn{
      padding:10px 14px; border-radius:999px;
      border:1px solid var(--line);
      background: rgba(255,255,255,.70);
      box-shadow: 0 10px 30px rgba(31,26,23,.06);
      font-size:13px; cursor:pointer;
    }
    .btn.primary{
      border-color: rgba(122,78,45,.18);
      background: rgba(122,78,45,.10);
      color: var(--accent);
      font-weight:600;
    }
    .card{
      margin-top:14px;
      background: rgba(255,255,255,.78);
      border:1px solid rgba(31,26,23,.08);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding:18px;
    }
    label{display:block; margin-top:12px; color:var(--muted); font-size:13px}
    input,textarea{
      width:100%;
      margin-top:8px;
      padding:12px 14px;
      border-radius:18px;
      border:1px solid rgba(31,26,23,.10);
      background: rgba(255,255,255,.85);
      color:var(--text);
      outline:none;
    }
    input:focus,textarea:focus{border-color: rgba(122,78,45,.35)}
    textarea{min-height:120px; resize:vertical}
    .row{display:grid; grid-template-columns:1fr 1fr; gap:12px}
    @media(max-width:700px){.row{grid-template-columns:1fr}}
    .actions{display:flex; gap:10px; margin-top:16px; flex-wrap:wrap}
  </style>
</head>
<body>
  <div class="wrap">
    <div class="top">
      <div>
        <h1 class="serif">Edit Menu</h1>
        <div class="sub">Perbaiki detail kecil. Itu yang bikin tampak mahal.</div>
      </div>
      <div style="display:flex; gap:10px;">
        <a class="btn" href="/menus">Kembali</a>
        <a class="btn" href="/">Landing</a>
      </div>
    </div>

    <div class="card">
      <form action="/menus/<?= $menu['id'] ?>" method="post">
        <label>Nama Menu</label>
        <input name="name" required value="<?= esc($menu['name']) ?>" />

        <div class="row">
          <div>
            <label>Kategori</label>
            <input name="category" value="<?= esc($menu['category']) ?>" />
          </div>
          <div>
            <label>Harga (angka)</label>
            <input name="price" type="number" min="0" value="<?= (int)$menu['price'] ?>" />
          </div>
        </div>

        <label>Deskripsi</label>
        <textarea name="description"><?= esc($menu['description'] ?? '') ?></textarea>

        <div class="actions">
          <button class="btn primary" type="submit">Update</button>
          <a class="btn" href="/menus">Bata
