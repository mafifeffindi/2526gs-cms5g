<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    private $table = 'students';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Read - mengambil semua data
    public function get_all() {
        return $this->db->order_by('id', 'DESC')->get($this->table)->result();
    }

    // Read - mengambil data berdasarkan ID
    public function get($id) {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    // Create - insert data
    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    // Update data
    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Delete data
    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
