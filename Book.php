<?php
class Book {
    public $judul;
    public $penulis;
    public $tersedia;

    public function __construct($judul, $penulis) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tersedia = true; 
    }

    public function getInfo() {
        $status = $this->tersedia ? "Tersedia" : "Dipinjam";
        return "Buku: {$this->judul} oleh {$this->penulis} | Status: {$status}";
    }

    public function borrowBook() {
        if ($this->tersedia) {
            $this->tersedia = false;
            return true;
        }
        return false;
    }
}
?>