<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit Data Pegawai - Dark Neon</title>

<style>
    :root{
        --bg:#0d1117;
        --card:#161b22;
        --neon:#1f6feb;
        --muted:#8b949e;
        --danger:#f85149;
    }

    body{
        margin:0;
        font-family:"Segoe UI", Roboto, Arial, sans-serif;
        background:var(--bg);
        color:#e6edf3;
        padding:40px 20px;
    }

    .container{
        max-width:700px;
        margin:0 auto;
        background:var(--card);
        padding:32px;
        border-radius:12px;
        box-shadow: 0 8px 30px rgba(31,111,235,0.08);
        border:1px solid rgba(31,111,235,0.12);
    }

    h2{
        margin:0 0 18px 0;
        color:#58a6ff;
        font-size:22px;
        text-align:center;
        text-shadow: 0 0 6px rgba(88,166,255,0.12);
    }

    .form-group{ margin-bottom:16px; }
    label{
        display:block;
        font-weight:600;
        margin-bottom:8px;
        color:#dbe7ff;
        font-size:14px;
    }

    input[type="text"], input[type="email"], textarea{
        width:100%;
        padding:12px 14px;
        border-radius:10px;
        border:1px solid rgba(255,255,255,0.04);
        background: linear-gradient(180deg, rgba(255,255,255,0.01), rgba(255,255,255,0.00));
        color:#e6eef8;
        font-size:14px;
        transition: box-shadow .18s, border-color .18s;
    }

    input:focus, textarea:focus{
        outline:none;
        border-color: var(--neon);
        box-shadow: 0 0 12px rgba(31,111,235,0.12);
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
        background: linear-gradient(90deg,var(--neon), #58a6ff);
        color:#021024;
        box-shadow: 0 8px 22px rgba(31,111,235,0.14), inset 0 -6px 18px rgba(255,255,255,0.02);
    }

    .btn-primary:hover{
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(31,111,235,0.18);
    }

    .btn-ghost{
        background: transparent;
        color: #cbd7ff;
        border:1px solid rgba(255,255,255,0.04);
    }

    .btn-ghost:hover{
        background: rgba(255,255,255,0.02);
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
        <h2>Edit Data Pegawai</h2>

        <form action="<?= base_url('pegawai/update'); ?>" method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?= $p->id; ?>">

            <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" value="<?= htmlspecialchars($p->nama); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?= htmlspecialchars($p->email); ?>" required>
            </div>

            <div class="form-group">
                <label for="bidang">Bidang</label>
                <input id="bidang" name="bidang" type="text" value="<?= htmlspecialchars($p->bidang); ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" required><?= htmlspecialchars($p->alamat); ?></textarea>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('pegawai'); ?>" class="btn btn-ghost" role="button">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
