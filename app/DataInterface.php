<?php
namespace App; // Namespace untuk mengorganisasi kode dalam aplikasi

// Definisi interface untuk menentukan kontrak bagi class yang mengimplementasinya
interface DataInterface {
    // Method untuk menyimpan data
    public function save($data); // Parameter $data berisi data yang akan disimpan

    // Method untuk menghapus data berdasarkan ID
    public function delete($id); // Parameter $id adalah ID dari data yang akan dihapus

    // Method untuk mengambil semua data
    public function findAll(); // Tidak memerlukan parameter, mengembalikan semua data
}
?>
