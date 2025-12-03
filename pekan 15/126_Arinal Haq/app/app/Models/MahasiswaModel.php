<?php namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa'; // Nama tabel di phpmyadmin
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'nama', 'jurusan']; // Kolom yang boleh diisi
}