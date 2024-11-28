<?php
namespace App; // Namespace untuk mengorganisasi class

class Database {
    // Properti statis untuk menyimpan koneksi database
    private static $connection;

    // Method untuk menghubungkan ke database
    public static function connect() {
        // Mengecek apakah koneksi sudah ada
        if (!self::$connection) {
            // Membuat koneksi baru menggunakan mysqli
            self::$connection = new \mysqli('localhost', 'root', '', 'LibrarySystem');

            // Mengecek apakah koneksi berhasil
            if (self::$connection->connect_error) {
                // Jika gagal, hentikan eksekusi dan tampilkan pesan error
                die("Connection failed: " . self::$connection->connect_error);
            }
        }
        // Mengembalikan koneksi database
        return self::$connection;
    }
}
?>

