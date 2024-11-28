<?php
use Controllers\BookController; // Menggunakan class BookController

// Memasukkan file yang diperlukan
require_once '../db.php';                 // File untuk koneksi database
require_once '../app/DataInterface.php';  // File interface DataInterface
require_once '../app/Book.php';           // File class Book
require_once '../controllers/BookController.php'; // File class BookController

// Membuat instance BookController untuk mendapatkan daftar buku
$controller = new BookController();
$books = $controller->findAll(); // Mendapatkan semua data buku
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title> <!-- Judul halaman -->
    <!-- Menggunakan Bootstrap CDN untuk styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Daftar Buku</h1> <!-- Header halaman -->
    <!-- Tabel untuk menampilkan daftar buku -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th> <!-- Kolom untuk judul buku -->
                <th>Penulis</th> <!-- Kolom untuk penulis buku -->
                <th>Tahun</th> <!-- Kolom untuk tahun terbit -->
                <th>Genre</th> <!-- Kolom untuk genre -->
                <th>Aksi</th> <!-- Kolom untuk tombol aksi (hapus) -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?> <!-- Looping data buku -->
            <tr>
                <td><?= $book->title ?></td> <!-- Menampilkan judul buku -->
                <td><?= $book->author ?></td> <!-- Menampilkan penulis buku -->
                <td><?= $book->year ?></td> <!-- Menampilkan tahun terbit -->
                <td><?= $book->genre ?></td> <!-- Menampilkan genre buku -->
                <td>
                    <!-- Tombol untuk menghapus buku, diarahkan ke delete_book.php -->
                    <a href="delete_book.php?id=<?= $book->id ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?> <!-- Akhir looping -->
        </tbody>
    </table>
    <!-- Tombol untuk kembali ke halaman utama -->
    <a href="../index.php" class="btn btn-primary">Kembali</a>
</div>
</body>
</html>
