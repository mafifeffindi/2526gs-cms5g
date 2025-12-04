<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
    <style>
        /* Layout dasar */
        body {
            margin: 0;
            min-height: 100vh;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: radial-gradient(circle at top left, #fff3e0 0, #e3f2fd 40%, #ffffff 100%);
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
            background: radial-gradient(circle at top right, rgba(33, 150, 243, 0.09), transparent 55%);
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
            content: "✏️";
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
            border-color: #2196f3;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.16);
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
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn-wrapper-right {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-update,
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

        .btn-update {
            background: linear-gradient(135deg, #2196f3, #1e88e5);
            color: #ffffff;
            box-shadow: 0 8px 18px rgba(33, 150, 243, 0.35);
        }

        .btn-batal {
            background-color: #eceff1;
            color: #455a64;
            border: 1px solid #cfd8dc;
        }

        .btn-update:hover {
            opacity: 0.96;
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(25, 118, 210, 0.45);
        }

        .btn-batal:hover {
            background-color: #e0e7ec;
        }

        .btn-update:active,
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
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn-wrapper-right {
                width: 100%;
                justify-content: stretch;
            }

            .btn-update,
            .btn-batal {
                flex: 1 1 auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-inner">
            <h2>Edit Data Pegawai</h2>
            <div class="subtitle">Perbarui informasi pegawai kemudian simpan perubahan.</div>
            
            <form action="<?= base_url('pegawai/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $p->id; ?>">

                <div class="form-group">
                    <label for="nama">Nama Lengkap<span class="required">*</span></label>
                    <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($p->nama); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email<span class="required">*</span></label>
                    <input type="email" name="email" id="email" value="<?= htmlspecialchars($p->email); ?>" required>
                    <div class="hint">Pastikan email masih aktif dan benar.</div>
                </div>

                <div class="form-group">
                    <label for="bidang">Bidang / Divisi<span class="required">*</span></label>
                    <input type="text" name="bidang" id="bidang" value="<?= htmlspecialchars($p->bidang); ?>" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat<span class="required">*</span></label>
                    <textarea name="alamat" id="alamat" required><?= htmlspecialchars($p->alamat); ?></textarea>
                </div>

                <div class="btn-group">
                    <a href="<?= base_url('pegawai'); ?>" class="btn-batal">← Kembali</a>
                    <div class="btn-wrapper-right">
                        <button type="submit" class="btn-update">💾 Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
