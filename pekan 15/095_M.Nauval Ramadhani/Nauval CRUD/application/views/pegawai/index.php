<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #f9f9f9);
            margin: 0;
            padding: 30px;
        }

        .card {
            max-width: 1200px;
            margin: auto;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 12px 32px rgba(0,0,0,0.08);
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
        }

        .btn-primary {
            background: #1e88e5;
            color: #fff;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-primary:hover { background: #1565c0; }

        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box input {
            flex: 1;
            padding: 12px 14px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            font-size: 14px;
        }

        .search-box input:focus {
            outline: none;
            border-color: #1e88e5;
            box-shadow: 0 0 0 3px rgba(30,136,229,.15);
        }

        .btn-search {
            background: #1e88e5;
            border: none;
            color: #fff;
            padding: 12px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-reset {
            background: #e5e7eb;
            color: #333;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .info {
            background: #e3f2fd;
            border-left: 5px solid #1e88e5;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead {
            background: #1e88e5;
            color: #fff;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .aksi a {
            margin-right: 10px;
            font-weight: 600;
            text-decoration: none;
        }

        .edit { color: #1e88e5; }
        .hapus { color: #e53935; }

        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            body { padding: 15px; }
            .header { flex-direction: column; align-items: flex-start; gap: 10px; }
            table { font-size: 13px; }
        }
    </style>
</head>
<body>

<div class="card">
    <div class="header">
        <h2>Data Pegawai</h2>
        <a href="<?= base_url('pegawai/tambah'); ?>" class="btn-primary">+ Tambah Pegawai</a>
    </div>

    <form action="<?= base_url('pegawai'); ?>" method="get" class="search-box">
        <input type="text" name="keyword" placeholder="Cari nama, email, bidang, atau alamat..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : ''; ?>">
        <button class="btn-search">Cari</button>
        <?php if (!empty($keyword)): ?>
            <a href="<?= base_url('pegawai'); ?>" class="btn-reset">Reset</a>
        <?php endif; ?>
    </form>

    <?php if (!empty($keyword)): ?>
        <div class="info">Hasil pencarian <strong>"<?= htmlspecialchars($keyword); ?>"</strong> — <?= count($pegawai); ?> data ditemukan</div>
    <?php endif; ?>

    <?php if (empty($pegawai)): ?>
        <div class="empty">
            <p>📂 Data pegawai belum tersedia atau tidak ditemukan.</p>
        </div>
    <?php else: ?>
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
                <?php $no=1; foreach($pegawai as $p): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($p->nama); ?></td>
                    <td><?= htmlspecialchars($p->email); ?></td>
                    <td><?= htmlspecialchars($p->bidang); ?></td>
                    <td><?= htmlspecialchars($p->alamat); ?></td>
                    <td class="aksi">
                        <a href="<?= base_url('pegawai/edit/'.$p->id); ?>" class="edit">Edit</a>
                        <a href="<?= base_url('pegawai/hapus/'.$p->id); ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>