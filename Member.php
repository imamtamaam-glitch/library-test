<?php
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
?>