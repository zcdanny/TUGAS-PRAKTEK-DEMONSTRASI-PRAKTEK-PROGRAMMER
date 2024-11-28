<?php
namespace App; // Namespace untuk mengorganisasi kode dalam aplikasi

// Class EBook merupakan turunan dari class Book
class EBook extends Book {
    // Properti privat khusus untuk EBook
    private $fileSize; // Ukuran file eBook dalam MB

    // Konstruktor untuk menginisialisasi properti EBook
    public function __construct($title, $author, $year, $genre, $fileSize, $id = null) {
        // Memanggil konstruktor parent class (Book) untuk mengatur properti dasar
        parent::__construct($title, $author, $year, $genre, $id);
        $this->fileSize = $fileSize; // Mengatur ukuran file eBook
    }

    // Method untuk mendapatkan detail lengkap eBook
    public function getDetails() {
        // Mengembalikan string dengan informasi tentang eBook
        return "{$this->title} by {$this->author}, Genre: {$this->genre}, Size: {$this->fileSize}MB";
    }
}
