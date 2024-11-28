<?php
use Controllers\BookController; // Menggunakan class BookController
use App\Book;                   // Menggunakan class Book

// Memasukkan file yang diperlukan untuk menjalankan aplikasi
require_once '../db.php';                 // File untuk koneksi database
require_once '../app/Book.php';           // File class Book
require_once '../app/DataInterface.php';  // File interface DataInterface
require_once '../controllers/BookController.php'; // File class BookController

// Mengecek apakah request yang diterima adalah POST (form dikirimkan)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form input
    $title = $_POST['title'];   // Judul buku
    $author = $_POST['author']; // Penulis buku
    $year = $_POST['year'];     // Tahun terbit
    $genre = $_POST['genre'];   // Genre buku

    // Membuat objek Book dengan data dari form
    $book = new Book($title, $author, $year, $genre);

    // Membuat instance dari BookController
    $controller = new BookController();

    // Menyimpan buku ke database menggunakan controller
    if ($controller->save($book)) {
        // Redirect ke halaman daftar buku jika berhasil
        header("Location: list_books.php");
    } else {
        // Menampilkan pesan kesalahan jika gagal
        echo "Failed to add book.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title> <!-- Judul halaman -->
    <!-- Bisa ditambahkan link CSS untuk Bootstrap jika digunakan -->
</head>
<body>
<div class="container mt-5">
    <h1>Add Book</h1> <!-- Header halaman -->
    <!-- Form untuk menambahkan buku baru -->
    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button> <!-- Tombol submit -->
    </form>
</div>
</body>
</html>
