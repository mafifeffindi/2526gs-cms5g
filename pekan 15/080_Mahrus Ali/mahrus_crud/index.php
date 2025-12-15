<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px 0;
            background: linear-gradient(135deg, #4f46e5, #6d28d9, #a21caf);
            background-size: 300% 300%;
            animation: gradientAnimation 8s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.15);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            color: white;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 25px;
            font-weight: 600;
        }

        /* Tombol Tambah */
        .btn-tambah {
            display: inline-block;
            padding: 10px 22px;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-tambah:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.4);
        }

        /* Search Box */
        .search-container {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-box {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid rgba(255,255,255,0.5);
            background: rgba(255,255,255,0.25);
            border-radius: 10px;
            font-size: 15px;
            color: white;
            backdrop-filter: blur(6px);
        }

        .search-box::placeholder {
            color: #f1f1f1;
        }

        .search-box:focus {
            outline: none;
            background: rgba(255,255,255,0.35);
            border-color: white;
        }

        .btn-search {
            padding: 12px 20px;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-search:hover {
            transform: scale(1.05);
        }

        .btn-reset {
            padding: 12px 20px;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-reset:hover {
            transform: scale(1.05);
        }

        /* Info Pencarian */
        .search-info {
            margin-bottom: 15px;
            padding: 10px;
            background-color: rgba(255,255,255,0.2);
            border-left: 4px solid #60a5fa;
            border-radius: 6px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            color: white;
        }

        th {
            background: rgba(255,255,255,0.25);
            padding: 14px;
            text-align: left;
            font-weight: 600;
            backdrop-filter: blur(5px);
        }

        td {
            padding: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        tr:hover {
            background: rgba(255,255,255,0.1);
            transition: 0.3s;
        }

        /* Aksi */
        .btn-edit {
            color: #60a5fa;
            font-weight: 600;
            text-decoration: none;
        }
        .btn-edit:hover {
            text-decoration: underline;
        }

        .btn-hapus {
            color: #f87171;
            font-weight: 600;
            text-decoration: none;
        }
        .btn-hapus:hover {
            text-decoration: underline;
        }

        .empty-message {
            text-align: center;
            padding: 40px 0;
            color: #f1f1f1;
            font-size: 18px;
        }
    </style>

</head>
<body>

    <div class="container">

        <h2>Data Pegawai</h2>

        <div class="search-container">
            <form action="<?= base_url('pegawai'); ?>" method="get" style="display: flex; gap: 10px; width: 100%;">
                <input type="text" 
                    name="keyword" 
                    class="search-box" 
                    placeholder="Masukkan kata kunci pencarian..."
                    value="<?= isset($keyword) ? htmlspecialchars($keyword) : ''; ?>"
                >

                <button type="submit" class="btn-search">🔍 Cari</button>

                <?php if (!empty($keyword)): ?>
                    <a href="<?= base_url('pegawai'); ?>" class="btn-reset">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if (!empty($keyword)): ?>
            <div class="search-info">
                Hasil pencarian untuk: <strong>"<?= htmlspecialchars($keyword); ?>"</strong>
                — <strong><?= count($pegawai); ?> hasil</strong>
            </div>
        <?php endif; ?>

        <a href="<?= base_url('pegawai/tambah'); ?>" class="btn-tambah">+ Tambah Data</a>

        <?php if (empty($pegawai)): ?>
            <div class="empty-message">
                <?= !empty($keyword) 
                    ? "❌ Tidak ada data untuk kata kunci \"<strong>".htmlspecialchars($keyword)."</strong>\"" 
                    : "Belum ada data pegawai. Silakan tambah data terlebih dahulu."; ?>
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
                    <?php $no=1; foreach ($pegawai as $p) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($p->nama); ?></td>
                        <td><?= htmlspecialchars($p->email); ?></td>
                        <td><?= htmlspecialchars($p->bidang); ?></td>
                        <td><?= htmlspecialchars($p->alamat); ?></td>
                        <td>
                            <a href="<?= base_url('pegawai/edit/'.$p->id); ?>" class="btn-edit">Edit</a>
                            |
                            <a href="<?= base_url('pegawai/hapus/'.$p->id); ?>" class="btn-hapus" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php endif; ?>
    </div>

</body>
</html>
