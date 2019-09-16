<?php

class Book {
    private $title;
    private $pages;

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setPages(int $pages)
    {
        $this->pages = $pages;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPages(): int 
    {
        return $this->pages;
    }


}

$book = new Book();
$book->setTitle('吾輩は猫である');
$book->setPages(100);

echo $book->getTitle(); //「我輩は猫である」と表示される
echo $book->getPages(); //「100」と表示される

$book2 = new Book();
$book2->setTitle('坊ちゃん');
$book2->setPages(200);

echo $book2->getTitle(); //「坊ちゃん」と表示される
echo $book2->getPages(); //「200」と表示される
