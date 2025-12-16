<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Pegawai</title>

<style>
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        margin: 0;
        background: #120707;
        color: #fff1f2;
    }

    .container {
        max-width: 1100px;
        margin: 40px auto;
        background: #1a0b0b;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 0 25px rgba(255,77,77,0.25);
        border: 1px solid #dc2626;
    }

    h2 {
        margin-bottom: 20px;
        color: #ff4d4d;
        font-size: 28px;
        font-weight: 600;
        text-shadow: 0 0 12px #ff4d4d;
    }

    .btn {
        padding: 12px 20px;
        border-radius: 8px;
        border: none;
        font-size: 15px;
        cursor: pointer;
        transition: .3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-blue {
        background: #dc2626;
        color: white;
        box-shadow: 0 0 10px rgba(220,38,38,0.7);
    }

    .btn-blue:hover {
        background: #ef4444;
        box-shadow: 0 0 18px rgba(239,68,68,0.9);
    }

    .btn-gray {
        background: #3a1d1d;
        color: white;
    }

    .btn-gray:hover {
        background: #4a2323;
    }

    .btn-red {
        color: #ff6b6b;
    }

    .btn-red:hover {
        text-shadow: 0 0 10px #ff4d4d;
    }

    .search-container {
        margin-bottom: 20px;
        display: flex;
        gap: 10px;
    }

    .search-box {
        flex: 1;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #3a1d1d;
        background: #120707;
        color: white;
        font-size: 15px;
        transition: .3s;
    }

    .search-box:focus {
        border-color: #ff4d4d;
        box-shadow: 0 0 10px rgba(255,77,77,0.7);
        outline: none;
    }

    .search-info {
        padding: 12px;
        background: #3b0a0a;
        border-left: 4px solid #dc2626;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        border-radius: 8px;
        overflow: hidden;
    }

    th {
        padding: 14px;
        background: #dc2626;
        color: white;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #3a1d1d;
    }

    tr:hover {
        background: #2a1212;
    }

    .empty-message {
        text-align: center;
        padding: 40px;
        color: #ff9b9b;
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