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

$books = [];

$book = new Book();
$book->setTitle('吾輩は猫である');
$book->setPages(100);
$books[] = $book;

$book2 = new Book();
$book2->setTitle('坊ちゃん');
$book2->setPages(200);
$books[] = $book2;

$book3 = new Book();
$book3->setTitle('それから');
$book3->setPages(300);
$books[] = $book3;

// タイトルを順番に出力
foreach ($books as $book) {
   echo $book->getTitle()."\n";
}

// $booksの中から、 タイトルが「坊ちゃん」であるものを取り出しましょう。
foreach ($books as $book) {
    if ($book->getTitle() == "坊ちゃん") {
        echo $book->getTitle()."\n";
        echo $book->getPages();
    }
}
