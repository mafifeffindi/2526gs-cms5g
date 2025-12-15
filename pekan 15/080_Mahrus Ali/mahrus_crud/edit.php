<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background: linear-gradient(135deg, #4f46e5, #6d28d9, #a21caf);
            background-size: 300% 300%;
            animation: gradientMove 7s ease infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            width: 90%;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.15);
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            font-weight: 500;
            font-size: 15px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-size: 15px;
            margin-top: 5px;
            background: rgba(255, 255, 255, 0.8);
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        .btn-group {
            margin-top: 25px;
            text-align: center;
        }

        .btn-update {
            background: linear-gradient(90deg, #2563eb, #4f46e5);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-update:hover {
            background: linear-gradient(90deg, #1d4ed8, #4338ca);
            transform: scale(1.05);
        }

        .btn-batal {
            background: rgba(255,255,255,0.25);
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            margin-left: 10px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-batal:hover {
            background: rgba(255,255,255,0.4);
            transform: scale(1.05);
        }
    </style>

</head>
<body>
    <div class="container">
        <h2>Edit Data Pegawai</h2>

        <form action="<?= base_url('pegawai/update'); ?>" method="post">
            <input type="hidden" name="id" value="<?= $p->id; ?>">

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($p->nama); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($p->email); ?>" required>
            </div>

            <div class="form-group">
                <label for="bidang">Bidang:</label>
                <input type="text" name="bidang" id="bidang" value="<?= htmlspecialchars($p->bidang); ?>" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" required><?= htmlspecialchars($p->alamat); ?></textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-update">Update</button>
                <a href="<?= base_url('pegawai'); ?>" class="btn-batal">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
