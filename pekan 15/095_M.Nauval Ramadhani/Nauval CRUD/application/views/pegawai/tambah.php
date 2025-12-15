<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #f9f9f9);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 650px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-header {
            background: #1e88e5;
            padding: 24px 30px;
            color: #ffffff;
        }

        .card-header h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }

        .card-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #1e88e5;
            box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.15);
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s, transform 0.1s, box-shadow 0.1s;
        }

        .btn-primary {
            background-color: #1e88e5;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #1565c0;
            box-shadow: 0 6px 16px rgba(30, 136, 229, 0.3);
        }

        .btn-secondary {
            background-color: #e0e0e0;
            color: #333333;
        }

        .btn-secondary:hover {
            background-color: #cfcfcf;
        }

        @media (max-width: 480px) {
            .card-body {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <h2>Tambah Data Pegawai</h2>
        </div>

        <div class="card-body">
            <form action="<?= base_url('pegawai/simpan'); ?>" method="post">

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama pegawai" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="contoh@email.com" required>
                </div>

                <div class="form-group">
                    <label for="bidang">Bidang / Divisi</label>
                    <input type="text" name="bidang" id="bidang" placeholder="Contoh: IT, Keuangan" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <div class="form-actions">
                    <a href="<?= base_url('pegawai'); ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
