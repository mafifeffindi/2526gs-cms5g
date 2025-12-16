<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit Data Pegawai</title>

<style>
:root{
    --bg:#120707;
    --card:rgba(255,255,255,0.07);
    --accent:#ff4d4d;
    --accent2:#dc2626;
    --text:#fff1f2;
    --muted:#9ca3af;
    --border:rgba(255,255,255,0.14);
}

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:"Inter","Segoe UI",sans-serif;
    background:
        radial-gradient(circle at top, #3b0a0a, #020617 70%);
    color:var(--text);
    padding:40px 16px;
}

.container{
    max-width:720px;
    margin:auto;
    padding:32px;
    background:var(--card);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius:18px;
    border:1px solid var(--border);
    box-shadow:
        0 20px 40px rgba(0,0,0,0.45),
        inset 0 0 0 1px rgba(255,255,255,0.04);
}

h2{
    text-align:center;
    margin-bottom:26px;
    font-size:24px;
    font-weight:700;
    letter-spacing:.4px;
    background:linear-gradient(90deg,var(--accent),var(--accent2));
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:6px;
    font-size:13px;
    font-weight:600;
    color:var(--muted);
}

input[type="text"],
input[type="email"],
textarea{
    width:100%;
    padding:14px 16px;
    border-radius:12px;
    background:rgba(0,0,0,0.35);
    border:1px solid var(--border);
    color:var(--text);
    font-size:14px;
    transition:all .25s ease;
}

input::placeholder,
textarea::placeholder{
    color:#6b7280;
}

input:focus,
textarea:focus{
    outline:none;
    border-color:var(--accent);
    box-shadow:0 0 0 3px rgba(255,77,77,0.25);
    background:rgba(0,0,0,0.45);
}

textarea{
    min-height:120px;
    resize:vertical;
}

.actions{
    display:flex;
    gap:14px;
    justify-content:center;
    margin-top:26px;
}

.btn{
    padding:12px 26px;
    border-radius:14px;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
    border:none;
    transition:all .25s ease;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    justify-content:center;
}

.btn-primary{
    background:linear-gradient(135deg,var(--accent),var(--accent2));
    color:#450a0a;
    box-shadow:0 12px 26px rgba(255,77,77,0.3);
}

.btn-primary:hover{
    transform:translateY(-2px) scale(1.02);
    box-shadow:0 18px 40px rgba(220,38,38,0.4);
}

.btn-ghost{
    background:transparent;
    color:var(--text);
    border:1px solid var(--border);
}

.btn-ghost:hover{
    background:rgba(255,255,255,0.06);
}

@media (max-width:640px){
    .container{
        padding:22px;
    }
    .actions{
        flex-direction:column;
    }
    .btn{
        width:100%;
    }
}
</style>
</head>

<body>

<div class="container">
    <h2>Edit Data Pegawai</h2>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" placeholder="Nama Pegawai">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" placeholder="Email Pegawai">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea placeholder="Alamat Pegawai"></textarea>
    </div>

    <div class="actions">
        <button class="btn btn-primary">Simpan</button>
        <button class="btn btn-ghost">Batal</button>
    </div>
</div>

</body>
</html>