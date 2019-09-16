<?php

class Book {
    private $books;
    private $title;
    private $pages;
    private $author;

    function setBookDetails($title, $pages, $author)
    {
        $book = array($title, $pages, $author);
        $this->books[] = $book;
        $this->title[] = $title;
        $this->pages[] = $pages;
        $this->author[] = $author;
    }

    function getBookDetails()
    {
        return $this->books;
    }

}

$book = new Book();
$book->setBookDetails('君の名は', '200ページ', '新海誠');

$book2 = new Book();
$book->setBookDetails('オブジェクト指向でなぜつくるのか', '365ページ', '平澤章');

$book2 = new Book();
$book->setBookDetails('Head First デザインパターン', '568ページ', 'オライリージャパン');

$bookDetails = $book->getBookDetails();

foreach ($bookDetails as $book){
    echo $book[0]."\n";
    echo $book[1]."\n";
    echo $book[2]."\n";
}
