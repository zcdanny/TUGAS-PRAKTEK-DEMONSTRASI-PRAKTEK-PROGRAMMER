<?php
namespace App; // Mendefinisikan namespace untuk organisasi kode dalam aplikasi

class Book {
    // Properti yang dilindungi untuk menyimpan atribut buku
    protected $id;     // ID unik buku
    protected $title;  // Judul buku
    protected $author; // Penulis buku
    protected $year;   // Tahun penerbitan buku
    protected $genre;  // Genre atau kategori buku

    // Konstruktor untuk menginisialisasi properti saat membuat objek Book
    public function __construct($title, $author, $year, $genre, $id = null) {
        $this->id = $id;           // ID buku (opsional)
        $this->title = $title;     // Mengatur judul buku
        $this->author = $author;   // Mengatur penulis buku
        $this->year = $year;       // Mengatur tahun penerbitan
        $this->genre = $genre;     // Mengatur genre buku
    }

    // Magic method untuk mendapatkan nilai properti secara dinamis
    public function __get($name) {
        if (property_exists($this, $name)) { // Mengecek apakah properti ada
            return $this->$name; // Mengembalikan nilai properti
        }
        throw new \Exception("Property $name does not exist"); // Lempar exception jika properti tidak ada
    }

    // Magic method untuk mengatur nilai properti secara dinamis
    public function __set($name, $value) {
        if (property_exists($this, $name)) { // Mengecek apakah properti ada
            $this->$name = $value; // Mengatur nilai properti
        } else {
            throw new \Exception("Property $name does not exist"); // Lempar exception jika properti tidak ada
        }
    }
}
