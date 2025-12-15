<?php
class M_pegawai extends CI_Model {

    public function get_all() {
        return $this->db->get('pegawai')->result();
    }

    public function insert($data) {
        return $this->db->insert('pegawai', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('pegawai', ['id' => $id])->row();
    }

    public function update($id, $data) {
        return $this->db->update('pegawai', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('pegawai', ['id' => $id]);
    }

    // Fungsi pencarian data pegawai
    public function search($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('bidang', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('pegawai')->result();
    }
}
