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

class Member {
    public $nama;
    public $memberId;
    public $pinjaman = [];

    public function __construct($nama, $memberId) {
        $this->nama = $nama;
        $this->memberId = $memberId;
    }

    public function getInfo() {
        $info = "Member: {$this->nama} (ID: {$this->memberId})\n";
        $info .= "Buku yang dipinjam: ";
        
        if (empty($this->pinjaman)) {
            $info .= "Tidak ada\n";
        } else {
            $info .= "\n";
            foreach ($this->pinjaman as $book) {
                $info .= "- " . $book->judul . "\n";
            }
        }
        return $info;
    }

    public function borrow(Book $book) {
        if ($book->borrowBook()) {
            $this->pinjaman[] = $book;
            echo "{$this->nama} berhasil meminjam buku '{$book->judul}'.\n";
        } else {
            echo "Maaf, buku '{$book->judul}' sedang tidak tersedia.\n";
        }
    }
}

$book1 = new Book("Cara cepat sukses", "Mas Cahyadi");
$book2 = new Book("Naruto", "Masashi Kishimoto");

$member1 = new Member("Zarif", "M001");


echo "# Informasi Awal #\n";
echo $book1->getInfo() . "\n";
echo $book2->getInfo() . "\n\n";

echo $member1->getInfo() . "\n";


echo "# Simulasi Peminjaman #\n";
$member1->borrow($book1);
echo "\n";


echo "# Informasi Setelah Peminjaman #\n";
echo $book1->getInfo() . "\n";
echo $book2->getInfo() . "\n\n";
echo $member1->getInfo() . "\n";

?>