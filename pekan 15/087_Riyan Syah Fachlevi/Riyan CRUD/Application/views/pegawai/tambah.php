<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>
    <style>
        /* Layout dasar */
        body {
            margin: 0;
            min-height: 100vh;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: radial-gradient(circle at top left, #e0f7fa 0, #f3e5f5 40%, #ffffff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
            color: #263238;
        }

        .container {
            width: 100%;
            max-width: 560px;
            background-color: #ffffff;
            border-radius: 18px;
            box-shadow:
                0 18px 35px rgba(0, 0, 0, 0.08),
                0 10px 20px rgba(0, 0, 0, 0.04);
            padding: 26px 26px 28px;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(0, 188, 212, 0.09), transparent 55%);
            pointer-events: none;
        }

        .content-inner {
            position: relative;
            z-index: 1;
        }

        /* Header */
        h2 {
            color: #1f2933;
            margin: 0 0 6px;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        h2::before {
            content: "➕";
            font-size: 18px;
        }

        .subtitle {
            font-size: 13px;
            color: #607d8b;
            margin-bottom: 22px;
        }

        /* Form */
        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #37474f;
            font-weight: 600;
            font-size: 13px;
        }

        .required {
            color: #e53935;
            margin-left: 4px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 9px 11px;
            border: 1px solid #cfd8dc;
            border-radius: 9px;
            font-size: 14px;
            box-sizing: border-box;
            background-color: #f8fafc;
            transition: border-color 0.14s ease, box-shadow 0.14s ease, background-color 0.14s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            outline: none;
            border-color: #00b894;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(0, 184, 148, 0.16);
        }

        textarea {
            min-height: 95px;
            resize: vertical;
        }

        .hint {
            font-size: 11px;
            color: #90a4ae;
            margin-top: 4px;
        }

        /* Tombol */
        .btn-group {
            margin-top: 22px;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        .btn-simpan,
        .btn-batal {
            padding: 9px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            white-space: nowrap;
            transition: background-color 0.15s ease, transform 0.1s ease, box-shadow 0.1s ease, opacity 0.15s ease;
        }

        .btn-simpan {
            background: linear-gradient(135deg, #00b894, #00cec9);
            color: #ffffff;
            box-shadow: 0 8px 18px rgba(0, 184, 148, 0.35);
        }

        .btn-batal {
            background-color: #eceff1;
            color: #455a64;
            border: 1px solid #cfd8dc;
        }

        .btn-simpan:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(0, 184, 148, 0.45);
        }

        .btn-batal:hover {
            background-color: #e0e7ec;
        }

        .btn-simpan:active,
        .btn-batal:active {
            transform: translateY(1px);
            box-shadow: none;
        }

        @media (max-width: 600px) {
            body {
                padding: 18px 10px;
            }

            .container {
                padding: 20px 18px 22px;
                border-radius: 14px;
            }

            h2 {
                font-size: 19px;
            }

            .btn-group {
                justify-content: stretch;
            }

            .btn-simpan,
            .btn-batal {
                flex: 1 1 auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-inner">
            <h2>Tambah Data Pegawai</h2>
            <div class="subtitle">Isi formulir berikut untuk menambahkan pegawai baru.</div>
            
            <form action="<?= base_url('pegawai/simpan'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama Lengkap<span class="required">*</span></label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label for="email">Email<span class="required">*</span></label>
                    <input type="email" name="email" id="email" placeholder="nama@email.com" required>
                    <div class="hint">Pastikan email aktif dan dapat dihubungi.</div>
                </div>

                <div class="form-group">
                    <label for="bidang">Bidang / Divisi<span class="required">*</span></label>
                    <input type="text" name="bidang" id="bidang" placeholder="Contoh: IT, HR, Keuangan" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat<span class="required">*</span></label>
                    <textarea name="alamat" id="alamat" placeholder="Tulis alamat lengkap" required></textarea>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn-simpan">💾 Simpan</button>
                    <a href="<?= base_url('pegawai'); ?>" class="btn-batal">← Kembali</a>
                </div>
            </form>
            </div>
    </div>
</body>
</html>
