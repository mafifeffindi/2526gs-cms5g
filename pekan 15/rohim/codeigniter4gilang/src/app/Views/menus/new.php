<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Menu</title>
  <style>
    /* BACKGROUND SAMA PERSIS KAYAK /menus */
    body{
      margin:0;
      font-family:system-ui;
      color:#f7f4ee;
      background: radial-gradient(circle at 20% 10%, rgba(201,162,39,.08), transparent 45%),
                  radial-gradient(circle at 80% 0%, rgba(255,255,255,.04), transparent 50%),
                  #2a1f1a;
      min-height:100vh;
    }

    a{color:inherit;text-decoration:none}
    *{box-sizing:border-box}

    .wrap{
      max-width:980px;
      margin:0 auto;
      padding:22px 16px;
    }

    /* Header kecil biar rapi dan ga “sendirian” */
    .top{
      display:flex;
      justify-content:space-between;
      align-items:flex-end;
      gap:12px;
      flex-wrap:wrap;
      margin-bottom:14px;
    }
    h1{
      margin:0;
      font-size:24px;
      letter-spacing:.2px;
    }
    .sub{
      margin-top:6px;
      color:#b9b4aa;
      font-size:13px;
    }

    .actions{
      display:flex;
      gap:10px;
      align-items:center;
    }
    .btn{
      padding:10px 14px;
      border-radius:14px;
      border:1px solid #26262a;
      background:transparent;
      color:#f7f4ee;
      cursor:pointer;
      font-size:13px;
      display:inline-block;
    }
    .btn.primary{
      border-color:rgba(201,162,39,.5);
      background:rgba(201,162,39,.10);
    }

    /* Card form rapi, tidak terlalu besar */
    .card{
      max-width:820px;
      margin:0 auto;
      border:1px solid #26262a;
      background:rgba(21,21,23,.68);
      border-radius:18px;
      padding:18px;
      box-shadow: 0 18px 60px rgba(0,0,0,.25);
    }

    .grid{
      display:grid;
      grid-template-columns:1fr 1fr;
      gap:12px;
    }
    @media(max-width:760px){
      .grid{grid-template-columns:1fr}
    }

    label{
      display:block;
      margin-top:12px;
      color:#b9b4aa;
      font-size:13px;
    }

    input, textarea{
      width:100%;
      margin-top:6px;
      padding:12px 12px;
      border-radius:14px;
      border:1px solid #26262a;
      background:rgba(19,19,20,.78);
      color:#f7f4ee;
      outline:none;
    }
    input:focus, textarea:focus{
      border-color: rgba(201,162,39,.45);
      box-shadow: 0 0 0 3px rgba(201,162,39,.08);
    }
    textarea{
      min-height:120px;
      resize:vertical;
    }

    .footer{
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:12px;
      flex-wrap:wrap;
      margin-top:16px;
      padding-top:12px;
      border-top:1px solid rgba(255,255,255,.06);
    }
    .hint{
      color:#b9b4aa;
      font-size:12px;
    }
    .btnRow{display:flex; gap:10px;}
  </style>
</head>
<body>
  <div class="wrap">
    <div class="top">
      <div>
        <h1>Tambah Menu</h1>
        <div class="sub">Input menu baru buat warung kopi kamu. Jangan asal isi “hvhvhvhv” lagi.</div>
      </div>
      <div class="actions">
        <a class="btn" href="/menus">Kembali</a>
        <a class="btn" href="/">Landing</a>
      </div>
    </div>

    <div class="card">
      <form action="/menus" method="post">
        <label>Nama Menu</label>
        <input name="name" required placeholder="Contoh: Cappuccino" />

        <div class="grid">
          <div>
            <label>Kategori</label>
            <input name="category" placeholder="Coffee / Non-Coffee / Snack" value="Coffee" />
          </div>
          <div>
            <label>Harga (angka)</label>
            <input name="price" type="number" min="0" value="0" />
          </div>
        </div>

        <label>Deskripsi</label>
        <textarea name="description" placeholder="Rasa, aroma, aftertaste..."></textarea>

        <div class="footer">
          <div class="hint">Tips: harga isi angka saja. Nanti bisa dibuat format otomatis.</div>
          <div class="btnRow">
            <a class="btn" href="/menus">Batal</a>
            <button class="btn primary" type="submit">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
