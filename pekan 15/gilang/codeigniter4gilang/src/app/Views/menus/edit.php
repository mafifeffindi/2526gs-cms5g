<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Menu</title>
  <style>
    body{margin:0;font-family:system-ui;background:#0f0f10;color:#f7f4ee}
    .wrap{max-width:760px;margin:0 auto;padding:18px}
    .card{border:1px solid #26262a;background:#151517;border-radius:18px;padding:16px}
    label{display:block;margin-top:12px;color:#b9b4aa;font-size:13px}
    input,textarea{width:100%;margin-top:6px;padding:12px;border-radius:14px;border:1px solid #26262a;background:#131314;color:#f7f4ee}
    textarea{min-height:110px;resize:vertical}
    .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    .btn{padding:10px 14px;border-radius:14px;border:1px solid #26262a;background:transparent;color:#f7f4ee}
    .btn.primary{border-color:rgba(201,162,39,.5);background:rgba(201,162,39,.10)}
    .actions{display:flex;gap:10px;margin-top:14px}
    a{color:inherit;text-decoration:none}
    button{cursor:pointer}
  </style>
</head>
<body>
  <div class="wrap">
    <h2 style="margin:0 0 10px">Edit Menu</h2>
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
          <a class="btn" href="/menus">Batal</a>
          <button class="btn primary" type="submit">Update</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
