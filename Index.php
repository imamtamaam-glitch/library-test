<?php

require_once 'Book.php';
require_once 'Member.php';

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