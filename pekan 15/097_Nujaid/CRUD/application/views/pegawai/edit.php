<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit Data Pegawai - Dark Neon</title>

<style>
    :root{
        --bg-start: #05060a;
        --bg-end: #0b1220;
        --accent: #7c5cff;
        --accent-2: #57e6ff;
        --text: #e6eef8;
        --muted: #9aa5b1;
        --card-border: rgba(255,255,255,0.04);
        --radius: 12px;
    }

    *, *::before, *::after{ box-sizing: border-box; }

    body{
        margin:0;
        padding:48px 20px;
        font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, Arial;
        -webkit-font-smoothing:antialiased;
        background: linear-gradient(180deg, var(--bg-start), var(--bg-end));
        color:var(--text);
    }

    .container{
        max-width:720px;
        margin:0 auto;
        padding:32px;
        border-radius:var(--radius);
        background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
        border:1px solid var(--card-border);
        box-shadow: 0 10px 30px rgba(2,6,23,0.6);
        backdrop-filter: blur(6px);
    }

    h2{
        margin:0 0 18px 0;
        color:var(--accent);
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
        border-radius:10px;
        border:1px solid var(--card-border);
        background: linear-gradient(180deg, rgba(255,255,255,0.015), rgba(255,255,255,0.005));
        color:var(--text);
        font-size:14px;
        transition: box-shadow .18s, transform .12s, border-color .12s;
    }

    input::placeholder, textarea::placeholder{ color: rgba(154,165,177,0.5); }

    input:focus, textarea:focus{
        outline:none;
        border-color:var(--accent);
        box-shadow: 0 8px 30px rgba(124,92,255,0.12);
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
        border-radius:10px;
        border:0;
        cursor:pointer;
        font-weight:700;
        font-size:14px;
    }

    .btn-primary{
        background: linear-gradient(90deg, var(--accent), var(--accent-2));
        color:#021024;
        box-shadow: 0 12px 30px rgba(124,92,255,0.12);
    }

    .btn-primary:hover{ transform: translateY(-3px); }

    .btn-ghost{
        background: transparent;
        color:var(--text);
        border:1px solid var(--card-border);
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
