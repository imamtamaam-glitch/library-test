<?php
require_once 'Book.php';

class DigitalBook extends Book {
    
    public $ukuranFile;

    public function __construct($judul, $penulis, $ukuranFile) {
        parent::__construct($judul, $penulis);
        
        $this->ukuranFile = $ukuranFile;
    }
}
?>