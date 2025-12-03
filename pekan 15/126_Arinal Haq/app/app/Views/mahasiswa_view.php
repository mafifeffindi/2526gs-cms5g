<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Pro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1); /* Efek bayangan */
        }
        .card-header {
            background: linear-gradient(45deg, #4e73df, #224abe); /* Warna gradasi biru */
            color: white;
            border-radius: 15px 15px 0 0 !important;
            font-weight: bold;
            padding: 15px 20px;
        }
        .btn-circle {
            border-radius: 50px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#"><i class="fas fa-university me-2"></i>Sistem Akademik</a>
        </div>
    </nav>

    <div class="container">
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus-circle me-2"></i>Tambah Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="/tugas-crud/public/mahasiswa/tambah" method="post">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" placeholder="Contoh: 2023001" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Jurusan</label>
                            <select name="jurusan" class="form-select" required>
                                <option value="">Pilih Jurusan...</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Manajemen">Manajemen</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-success text-white" style="background: linear-gradient(45deg, #1cc88a, #13855c);">
                <i class="fas fa-table me-2"></i>Daftar Mahasiswa
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabelMahasiswa" class="table table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($mahasiswa as $m): ?>
                            <tr>
                                <td><span class="badge bg-secondary"><?= $m['nim']; ?></span></td>
                                <td><?= $m['nama']; ?></td>
                                <td><?= $m['jurusan']; ?></td>
                                <td class="text-center">
                                    <a href="#" onclick="konfirmasiHapus('<?= $m['id']; ?>')" class="btn btn-danger btn-sm btn-circle" title="Hapus Data">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Inisialisasi DataTables (Otomatis muncul Search & Pagination)
        $(document).ready(function () {
            $('#tabelMahasiswa').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json" // Ubah bahasa jadi Indonesia
                }
            });
        });

        // Fungsi SweetAlert untuk Konfirmasi Hapus
        function konfirmasiHapus(id) {
            Swal.fire({
                title: 'Yakin mau hapus?',
                text: "Data yang dihapus tidak bisa kembali!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kalau user klik Ya, arahkan ke link hapus
                    window.location.href = "/tugas-crud/public/mahasiswa/hapus/" + id;
                }
            })
        }
    </script>
</body>
</html>