<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Pegawai - Dark Neon</title>

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
        --shadow: 0 10px 30px rgba(2,6,23,0.6);
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
        max-width:1100px;
        margin:0 auto;
        padding:28px 32px;
        border-radius:var(--radius);
        background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
        border:1px solid var(--card-border);
        box-shadow: var(--shadow);
        overflow-x:auto;
    }

    h2{
        margin:0 0 18px 0;
        color:var(--accent);
        font-size:26px;
        text-align:left;
    }

    .btn, .btn-blue, .btn-gray, .btn-red{
        display:inline-flex;
        align-items:center;
        gap:8px;
        padding:10px 16px;
        border-radius:10px;
        text-decoration:none;
        cursor:pointer;
        font-weight:700;
        font-size:14px;
        transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
    }

    .btn-blue{
        background: linear-gradient(90deg,var(--accent), var(--accent-2));
        color:#021024;
        box-shadow: 0 10px 24px rgba(124,92,255,0.12);
    }

    .btn-blue:hover{ transform: translateY(-3px); }

    .btn-gray{
        background: rgba(255,255,255,0.02);
        color:var(--text);
        border:1px solid var(--card-border);
    }

    .btn-gray:hover{ opacity:0.95; }

    .btn-red{
        color: #f85149;
        background: transparent;
        border: none;
    }

    .btn-red:hover{ text-shadow: 0 0 8px #f85149; }

    .search-container{ margin:18px 0; display:flex; gap:12px; align-items:center; }

    .search-box{
        flex:1;
        padding:12px 14px;
        border-radius:10px;
        border:1px solid var(--card-border);
        background: linear-gradient(180deg, rgba(255,255,255,0.015), rgba(255,255,255,0.005));
        color:var(--text);
        font-size:14px;
    }

    .search-box:focus{
        outline:none;
        border-color:var(--accent);
        box-shadow: 0 8px 30px rgba(124,92,255,0.12);
        transform: translateY(-1px);
    }

    .search-info{
        padding:12px;
        background: linear-gradient(90deg, rgba(87,230,255,0.06), rgba(124,92,255,0.04));
        border-left:4px solid var(--accent);
        border-radius:8px;
        margin-bottom:16px;
        color:var(--text);
    }

    table{ width:100%; border-collapse:collapse; margin-top:14px; min-width:700px; }
    thead th{ padding:14px; background: linear-gradient(90deg,var(--accent), var(--accent-2)); color:#021024; text-align:left; }
    td{ padding:12px; border-bottom:1px solid rgba(255,255,255,0.03); vertical-align:middle; }
    tr:hover{ background: rgba(255,255,255,0.01); }

    .empty-message{ text-align:center; padding:40px; color:var(--muted); }

    @media (max-width:760px){
        .container{ padding:20px; }
        h2{ font-size:20px; }
        table{ min-width:600px; }
    }
</style>
</head>

<body>

<div class="container">
    <h2>Data Pegawai</h2>

    <div class="search-container">
        <form action="<?= base_url('pegawai'); ?>" method="get" style="display:flex; gap:10px; width:100%;">

            <input type="text" 
                   name="keyword"
                   class="search-box"
                   placeholder="Cari nama / email / bidang / alamat..."
                   value="<?= isset($keyword) ? htmlspecialchars($keyword) : ''; ?>">

            <button class="btn btn-blue">🔍 Cari</button>

            <?php if (!empty($keyword)) : ?>
                <a href="<?= base_url('pegawai'); ?>" class="btn btn-gray">Reset</a>
            <?php endif; ?>

        </form>
    </div>

    <?php if (!empty($keyword)) : ?>
        <div class="search-info">
            Hasil pencarian untuk 
            <b>"<?= htmlspecialchars($keyword); ?>"</b>
            (<?= count($pegawai); ?> ditemukan)
        </div>
    <?php endif; ?>

    <a href="<?= base_url('pegawai/tambah'); ?>" class="btn btn-blue">+ Tambah Data</a>

    <?php if (empty($pegawai)) : ?>

        <div class="empty-message">
            Tidak ada data pegawai.
        </div>

    <?php else : ?>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Bidang</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php $no = 1; foreach ($pegawai as $p) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($p->nama); ?></td>
                    <td><?= htmlspecialchars($p->email); ?></td>
                    <td><?= htmlspecialchars($p->bidang); ?></td>
                    <td><?= htmlspecialchars($p->alamat); ?></td>

                    <td>
                        <a href="<?= base_url('pegawai/edit/'.$p->id); ?>" 
                           class="btn-blue" 
                           style="padding:6px 12px;">Edit</a>

                        <a href="<?= base_url('pegawai/hapus/'.$p->id); ?>" 
                           onclick="return confirm('Yakin ingin menghapus?')"
                           class="btn-red"
                           style="margin-left:10px;">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>
</div>

</body>
</html>
