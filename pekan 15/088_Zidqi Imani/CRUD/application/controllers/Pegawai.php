<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_pegawai');
    }

    // Menampilkan semua data pegawai
    public function index() {
        $keyword = $this->input->get('keyword');
        
        if ($keyword) {
            // Jika ada kata kunci, lakukan pencarian
            $data['pegawai'] = $this->M_pegawai->search($keyword);
            $data['keyword'] = $keyword; // Simpan keyword untuk ditampilkan di view
        } else {
            // Jika tidak ada kata kunci, tampilkan semua data
            $data['pegawai'] = $this->M_pegawai->get_all();
            $data['keyword'] = ''; // Kosongkan keyword
        }
        
        $this->load->view('pegawai/index', $data);
    }

    // Menampilkan form tambah data
    public function tambah() {
        $this->load->view('pegawai/tambah');
    }

    // Menyimpan data baru
    public function simpan() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'bidang' => $this->input->post('bidang'),
            'alamat' => $this->input->post('alamat')
        );

        if ($this->M_pegawai->insert($data)) {
            redirect('pegawai');
        } else {
            echo "Gagal menyimpan data";
        }
    }

    // Menampilkan form edit data
    public function edit($id) {
        $data['p'] = $this->M_pegawai->get_by_id($id);
        if (!$data['p']) {
            redirect('pegawai');
        }
        $this->load->view('pegawai/edit', $data);
    }

    // Update data
    public function update() {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'bidang' => $this->input->post('bidang'),
            'alamat' => $this->input->post('alamat')
        );

        if ($this->M_pegawai->update($id, $data)) {
            redirect('pegawai');
        } else {
            echo "Gagal mengupdate data";
        }
    }

    // Hapus data
    public function hapus($id) {
        if ($this->M_pegawai->delete($id)) {
            redirect('pegawai');
        } else {
            echo "Gagal menghapus data";
        }
    }
}

