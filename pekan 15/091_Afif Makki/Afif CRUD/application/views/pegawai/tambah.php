<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Tambah Data Pegawai</title>

<style>
    :root{
        --bg:#120707;
        --card:#1a0b0b;
        --neon:#ff4d4d;
        --muted:#9ca3af;
        --danger:#dc2626;
        --glass: rgba(255,77,77,0.06);
    }

    body{
        margin:0;
        font-family: "Segoe UI", Roboto, Arial, sans-serif;
        background: radial-gradient(circle at top, #3b0a0a, #020617 70%);
        color:#fff1f2;
        padding:40px 20px;
    }

    .container{
        max-width:700px;
        margin:0 auto;
        background:var(--card);
        padding:32px;
        border-radius:12px;
        box-shadow: 0 10px 35px rgba(255,77,77,0.25);
        border:1px solid rgba(220,38,38,0.5);
    }

    h2{
        margin:0 0 18px 0;
        color: var(--neon);
        font-size:22px;
        text-align:center;
        text-shadow: 0 0 10px rgba(255,77,77,0.6);
    }

    .form-group{ margin-bottom:16px; }
    label{
        display:block;
        font-weight:600;
        margin-bottom:8px;
        color:#fecaca;
        font-size:14px;
    }

    input[type="text"], input[type="email"], textarea{
        width:100%;
        padding:12px 14px;
        border-radius:10px;
        border:1px solid #3a1d1d;
        background:#120707;
        color:#fff1f2;
        font-size:14px;
        transition: box-shadow .18s, border-color .18s;
        resize:vertical;
    }

    input::placeholder,
    textarea::placeholder{
        color:#9ca3af;
    }

    input:focus, textarea:focus{
        outline:none;
        border-color: var(--neon);
        box-shadow: 0 0 12px rgba(255,77,77,0.45);
    }

    textarea{ min-height:110px; }

    .actions{
        display:flex;
        gap:12px;
        justify-content:center;
        margin-top:18px;
    }

    .btn{
        padding:12px 20px;
        border-radius:10px;
        border:0;
        cursor:pointer;
        font-weight:600;
        font-size:15px;
    }

    .btn-primary{
        background: linear-gradient(90deg,var(--neon), #dc2626);
        color:#450a0a;
        box-shadow: 0 10px 25px rgba(255,77,77,0.4);
        transition: transform .2s, box-shadow .2s;
    }

    .btn-primary:hover{
        transform: translateY(-2px);
        box-shadow: 0 14px 35px rgba(220,38,38,0.6);
    }

    .btn-ghost{
        background: transparent;
        color:#fff1f2;
        border:1px solid #3a1d1d;
    }

    .btn-ghost:hover{
        background: rgba(255,77,77,0.08);
    }

    .hint{
        text-align:center;
        margin-top:12px;
        color:var(--muted);
        font-size:13px;
    }

    @media (max-width:640px){
        .container{ padding:20px; }
        .actions{ flex-direction:column; }
        .btn{ width:100%; }
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Pegawai</h2>

        <form action="<?= base_url('pegawai/simpan'); ?>" method="post" autocomplete="off">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="contoh@domain.com" required>
            </div>

            <div class="form-group">
                <label for="bidang">Bidang</label>
                <input id="bidang" name="bidang" type="text" placeholder="Contoh: Keuangan / IT / Admin" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" placeholder="Alamat lengkap..." required></textarea>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('pegawai'); ?>" class="btn btn-ghost" role="button">Batal</a>
            </div>

            <p class="hint">Pastikan data sudah benar sebelum menekan Simpan.</p>
        </form>
    </div>
</body>
</html>