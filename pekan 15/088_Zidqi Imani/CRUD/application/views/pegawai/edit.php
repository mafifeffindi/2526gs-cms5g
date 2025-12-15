<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit Data Pegawai - Dark Neon</title>

<style>
    :root{
        --bg: #f7f5f2;
        --card: #ffffff;
        --text: #1c1b1a;
        --muted: #7a7776;
        --accent: #b58840;
        --accent-2: #986f2a;
        --border: #e6e1dc;
        --radius: 12px;
        --shadow: 0 6px 22px rgba(28,27,26,0.06);
    }

    *, *::before, *::after{ box-sizing: border-box; }

    body{
        margin:0;
        padding:48px 20px;
        font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, Arial;
        color:var(--text);
        background: var(--bg);
        -webkit-font-smoothing:antialiased;
    }

    .container{
        max-width:720px;
        margin:0 auto;
        padding:32px;
        border-radius:var(--radius);
        background:var(--card);
        border:1px solid var(--border);
        box-shadow: var(--shadow);
    }

    h2{
        margin:0 0 18px 0;
        color:var(--text);
        font-family: Georgia, 'Times New Roman', serif;
        font-size:20px;
        text-align:center;
    }

    .form-group{ margin-bottom:16px; }
    label{
        display:block;
        font-weight:600;
        margin-bottom:8px;
        color:var(--muted);
        font-size:13px;
    }

    input[type="text"], input[type="email"], textarea{
        width:100%;
        padding:12px 14px;
        border-radius:8px;
        border:1px solid var(--border);
        background:#faf8f6;
        color:var(--text);
        font-size:14px;
        transition: box-shadow .12s, border-color .12s, transform .08s;
    }

    input::placeholder, textarea::placeholder{ color: rgba(122,119,118,0.45); }

    input:focus, textarea:focus{
        outline:none;
        border-color:var(--accent);
        box-shadow: 0 8px 20px rgba(181,136,64,0.08);
        transform: translateY(-1px);
    }

    textarea{ min-height:110px; }

    .actions{
        display:flex;
        gap:12px;
        justify-content:center;
        margin-top:18px;
    }

    .btn{
        padding:11px 18px;
        border-radius:8px;
        border:1px solid transparent;
        cursor:pointer;
        font-weight:700;
        font-size:14px;
        background:transparent;
    }

    .btn-primary{
        background: linear-gradient(90deg,var(--accent), var(--accent-2));
        color:#fff;
        box-shadow: 0 10px 24px rgba(169,131,63,0.12);
    }

    .btn-primary:hover{ transform: translateY(-3px); }

    .btn-ghost{
        background: transparent;
        color:var(--text);
        border:1px solid var(--border);
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
