-- Script SQL untuk membuat database dan tabel pegawai
-- Jalankan script ini di phpMyAdmin atau MySQL command line

-- Membuat database (jika belum ada)
CREATE DATABASE IF NOT EXISTS db_pegawai CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Menggunakan database
USE db_pegawai;

-- Membuat tabel pegawai
CREATE TABLE IF NOT EXISTS pegawai (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    bidang VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Menambahkan beberapa data contoh (opsional)
INSERT INTO pegawai (nama, email, bidang, alamat) VALUES
('Budi Santoso', 'budi@example.com', 'IT', 'Jl. Merdeka No. 123, Jakarta'),
('Siti Nurhaliza', 'siti@example.com', 'HR', 'Jl. Sudirman No. 456, Jakarta'),
('Ahmad Fauzi', 'ahmad@example.com', 'Marketing', 'Jl. Thamrin No. 789, Jakarta');

