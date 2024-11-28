<?php
namespace Controllers; // Namespace untuk mengorganisasi kode dan menghindari konflik

use App\Database;       // Menggunakan class Database untuk koneksi database
use App\DataInterface;  // Menggunakan interface DataInterface sebagai kontrak
use App\Book;           // Menggunakan class Book untuk manipulasi objek buku

// BookController mengimplementasikan DataInterface
class BookController implements DataInterface {

    // Method untuk menyimpan data buku ke dalam database
    public function save($book) {
        $conn = Database::connect(); // Mendapatkan koneksi ke database
        // Menyiapkan statement SQL untuk memasukkan data ke tabel 'books'
        $stmt = $conn->prepare("INSERT INTO books (title, author, year, genre) VALUES (?, ?, ?, ?)");
        // Mengikat parameter untuk menghindari SQL injection
        $stmt->bind_param("ssis", $book->title, $book->author, $book->year, $book->genre);
        return $stmt->execute(); // Menjalankan perintah SQL dan mengembalikan hasilnya
    }

    // Method untuk menghapus data buku berdasarkan ID
    public function delete($id) {
        $conn = Database::connect(); // Mendapatkan koneksi ke database
        // Menyiapkan statement SQL untuk menghapus data dari tabel 'books'
        $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
        // Mengikat parameter ID buku
        $stmt->bind_param("i", $id);
        return $stmt->execute(); // Menjalankan perintah SQL dan mengembalikan hasilnya
    }

    // Method untuk mengambil semua data buku dari database
    public function findAll() {
        $conn = Database::connect(); // Mendapatkan koneksi ke database
        // Menjalankan query untuk mendapatkan semua data dari tabel 'books'
        $result = $conn->query("SELECT * FROM books");
        $books = []; // Array untuk menyimpan objek Book
        // Iterasi hasil query untuk membuat objek Book
        while ($row = $result->fetch_assoc()) {
            $books[] = new Book($row['title'], $row['author'], $row['year'], $row['genre'], $row['id']);
        }
        return $books; // Mengembalikan array berisi objek Book
    }
}
?>

