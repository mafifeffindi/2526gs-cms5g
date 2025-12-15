<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px 0;
            background: linear-gradient(135deg, #4f46e5, #6d28d9, #a21caf);
            background-size: 300% 300%;
            animation: gradientMove 8s ease infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: rgba(255,255,255,0.18);
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.25);
            backdrop-filter: blur(12px);
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 26px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border-radius: 10px;
            border: 2px solid rgba(255,255,255,0.4);
            background: rgba(255,255,255,0.25);
            color: white;
            font-size: 15px;
            backdrop-filter: blur(5px);
        }

        input::placeholder,
        textarea::placeholder {
            color: #f1f1f1;
        }

        input:focus,
        textarea:focus {
            outline: none;
            background: rgba(255,255,255,0.35);
            border-color: white;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-group {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn-simpan {
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #22c55e, #16a34a);
            color: white;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-simpan:hover {
            transform: scale(1.07);
            box-shadow: 0 4px 12px rgba(34,197,94,0.4);
        }

        .btn-batal {
            padding: 12px 25px;
            border-radius: 10px;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-batal:hover {
            transform: scale(1.07);
            background: rgba(255,255,255,0.35);
        }

    </style>

</head>

<body>

    <div class="container">
        <h2>Tambah Data Pegawai</h2>

        <form action="<?= base_url('pegawai/simpan'); ?>" method="post">

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama pegawai" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label for="bidang">Bidang:</label>
                <input type="text" name="bidang" id="bidang" placeholder="Contoh: IT, Administrasi, dll." required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-simpan">Simpan</button>
                <a href="<?= base_url('pegawai'); ?>" class="btn-batal">Batal</a>
            </div>

        </form>
    </div>

</body>
</html>

