<?php namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function index()
    {
        // 1. Panggil Model
        $model = new MahasiswaModel();
        
        // 2. Ambil semua data dari database
        $data['mahasiswa'] = $model->findAll();
        
        // 3. Kirim data ke View
        return view('mahasiswa_view', $data);
    }

    public function tambah()
    {
        $model = new MahasiswaModel();
        
        // Simpan data dari Form
        $model->save([
            'nim'     => $this->request->getPost('nim'),
            'nama'    => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
        ]);

        // Setelah simpan, kembali ke halaman awal
        return redirect()->to('/mahasiswa');
    }

    public function hapus($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id);
        return redirect()->to('/mahasiswa');
    }
}