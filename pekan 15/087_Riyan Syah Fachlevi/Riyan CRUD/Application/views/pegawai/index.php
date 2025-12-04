<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <style>
        /* Layout dasar */
        body {
            margin: 0;
            min-height: 100vh;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #e0f2f1, #e3f2fd);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 30px 15px;
            color: #263238;
        }

        .container {
            width: 100%;
            max-width: 1100px;
            background-color: #ffffff;
            border-radius: 14px;
            box-shadow:
                0 14px 28px rgba(0, 0, 0, 0.08),
                0 10px 10px rgba(0, 0, 0, 0.06);
            padding: 24px 26px 28px;
            box-sizing: border-box;
        }

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #1f2933;
        }

        h2 span.badge {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 4px 10px;
            border-radius: 999px;
            background: #e3f2fd;
            color: #1565c0;
        }

        .page-subtitle {
            font-size: 13px;
            color: #607d8b;
            margin-top: 4px;
        }

        /* Tombol utama */
        .btn-tambah {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            background: linear-gradient(135deg, #00b894, #00cec9);
            color: #ffffff;
            text-decoration: none;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 16px rgba(0, 184, 148, 0.35);
            transition: transform 0.15s ease, box-shadow 0.15s ease, opacity 0.15s ease;
            white-space: nowrap;
        }

        .btn-tambah::before {
            content: "+";
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border-radius: 999px;
            background-color: rgba(255, 255, 255, 0.16);
            font-size: 14px;
        }

        .btn-tambah:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            box-shadow: 0 12px 20px rgba(0, 184, 148, 0.45);
        }

        .btn-tambah:active {
            transform: translateY(0);
            box-shadow: 0 6px 12px rgba(0, 184, 148, 0.35);
        }

        /* Pencarian */
        .search-container {
            margin-bottom: 16px;
            display: flex;
            align-items: stretch;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-container form {
            display: flex;
            gap: 10px;
            width: 100%;
            align-items: stretch;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1 1 220px;
            padding: 10px 14px;
            border-radius: 999px;
            border: 1px solid #cfd8dc;
            font-size: 14px;
            box-sizing: border-box;
            background-color: #f8fbff;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
        }

        .search-box:focus {
            outline: none;
            border-color: #2196f3;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.18);
            background-color: #ffffff;
        }

        .btn-search,
        .btn-reset {
            padding: 9px 16px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            text-decoration: none;
            white-space: nowrap;
            transition: background-color 0.15s ease, transform 0.1s ease, box-shadow 0.1s ease, opacity 0.15s ease;
        }

        .btn-search {
            background: linear-gradient(135deg, #2196f3, #1e88e5);
            color: #ffffff;
            box-shadow: 0 6px 14px rgba(33, 150, 243, 0.35);
        }

        .btn-reset {
            background: #eceff1;
            color: #455a64;
            border: 1px solid #cfd8dc;
        }

        .btn-search:hover {
            background: linear-gradient(135deg, #1e88e5, #1976d2);
            box-shadow: 0 8px 16px rgba(25, 118, 210, 0.45);
        }

        .btn-reset:hover {
            background: #e0e7ec;
        }

        .btn-search:active,
        .btn-reset:active {
            transform: translateY(1px);
            box-shadow: none;
        }

        /* Info pencarian */
        .search-info {
            margin-bottom: 14px;
            padding: 10px 12px;
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            border-radius: 10px;
            border: 1px solid #bbdefb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 13px;
        }

        .search-info strong {
            color: #1565c0;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
            font-size: 14px;
            overflow: hidden;
            border-radius: 10px;
            background-color: #fafafa;
        }

        thead {
            background: linear-gradient(135deg, #00b894, #00cec9);
            color: #ffffff;
        }

        th,
        td {
            padding: 11px 14px;
            text-align: left;
            border-bottom: 1px solid #eceff1;
        }

        th {
            font-weight: 600;
            letter-spacing: 0.03em;
            font-size: 12px;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background-color: #f5f8fa;
        }

        tbody tr:hover {
            background-color: #e3f2fd;
        }

        /* Aksi */
        .aksi {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-edit,
        .btn-hapus {
            font-size: 13px;
            border-radius: 999px;
            padding: 6px 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background-color 0.15s ease, color 0.15s ease, transform 0.1s ease, box-shadow 0.1s ease;
            border: 1px solid transparent;
        }

        .btn-edit {
            background-color: #e3f2fd;
            color: #1565c0;
            border-color: #bbdefb;
        }

        .btn-hapus {
            background-color: #ffebee;
            color: #c62828;
            border-color: #ffcdd2;
        }

        .btn-edit:hover {
            background-color: #bbdefb;
            box-shadow: 0 4px 10px rgba(21, 101, 192, 0.25);
            transform: translateY(-1px);
        }

        .btn-hapus:hover {
            background-color: #ffcdd2;
            box-shadow: 0 4px 10px rgba(198, 40, 40, 0.25);
            transform: translateY(-1px);
        }

        /* Empty state */
        .empty-message {
            text-align: center;
            padding: 40px 20px;
            color: #78909c;
            font-size: 14px;
        }

        .empty-message a {
            color: #1976d2;
            text-decoration: none;
            font-weight: 500;
        }

        .empty-message a:hover {
            text-decoration: underline;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                font-size: 12px;
            }

            th,
            td {
                padding: 8px 10px;
            }

            body {
                padding: 20px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <div>
                <h2>Data Pegawai <span class="badge">Master</span></h2>
                <div class="page-subtitle">Kelola data pegawai dengan mudah dan cepat.</div>
            </div>
            <a href="<?= base_url('pegawai/tambah'); ?>" class="btn-tambah">Tambah Pegawai</a>
        </div>
        
        <div class="search-container">
            <form action="<?= base_url('pegawai'); ?>" method="get">
                <input type="text" 
                       name="keyword" 
                       class="search-box" 
                       placeholder="Masukkan kata kunci (nama, email, bidang, atau alamat)..." 
                       value="<?= isset($keyword) ? htmlspecialchars($keyword) : ''; ?>"
                       autofocus>
                <button type="submit" class="btn-search">🔍 Cari</button>
                <?php if (isset($keyword) && !empty($keyword)): ?>
                    <a href="<?= base_url('pegawai'); ?>" class="btn-reset">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if (isset($keyword) && !empty($keyword)): ?>
            <div class="search-info">
                <div>
                    <strong>Hasil pencarian:</strong>
                    "<?= htmlspecialchars($keyword); ?>"
                </div>
                <div>
                    <strong><?= count($pegawai); ?> data ditemukan</strong>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if (empty($pegawai)): ?>
            <div class="empty-message">
                <?php if (isset($keyword) && !empty($keyword)): ?>
                    <p>❌ Tidak ada data yang ditemukan untuk kata kunci "<strong><?= htmlspecialchars($keyword); ?></strong>"</p>
                    <p><a href="<?= base_url('pegawai'); ?>">Klik di sini untuk melihat semua data</a></p>
                <?php else: ?>
                    <p>Belum ada data pegawai. Silakan tambah data terlebih dahulu.</p>
                <?php endif; ?>
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
                            <div class="aksi">
                                <a href="<?= base_url('pegawai/edit/'.$p->id); ?>" class="btn-edit">✏️ Edit</a>
                                <a href="<?= base_url('pegawai/hapus/'.$p->id); ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑 Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
