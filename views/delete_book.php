<?php
use Controllers\BookController; // Menggunakan class BookController

// Memasukkan file yang diperlukan untuk koneksi database dan class terkait
require_once '../db.php';                 // File untuk koneksi database
require_once '../app/DataInterface.php';  // File interface DataInterface
require_once '../app/Book.php';           // File class Book
require_once '../controllers/BookController.php'; // File class BookController

// Mengecek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $bookId = $_GET['id']; // Mendapatkan ID buku dari URL
    
    // Membuat instance dari BookController
    $controller = new BookController();
    $success = $controller->delete($bookId); // Memanggil method delete untuk menghapus buku
    
    if ($success) {
        // Redirect ke halaman daftar buku jika penghapusan berhasil
        header("Location: list_books.php");
    } else {
        // Menampilkan pesan jika penghapusan gagal
        echo "Gagal menghapus buku.";
    }
} else {
    // Menampilkan pesan jika parameter 'id' tidak ditemukan
    echo "ID buku tidak ditemukan.";
}
?>

