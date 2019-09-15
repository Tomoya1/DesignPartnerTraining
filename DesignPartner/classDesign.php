<?php

class Book {

    private $title;
    private $pages;
    private $author;

    function setBookDetails($book)
    {
        $this->title[] = $book[0];
        $this->pages[] = $book[1];
        $this->author[] = $book[2];
    }

    function getBookDetails()
    {
        // 現在はtitleだけ出力
        return $this->title;
    }

}

class BookShelf extends Book {

    public function addBook($title, $pages, $author)
    {
        $book = array($title, $pages, $author);
        $this->setBookDetails($book);
    }

}

// addBookメソッドでBook情報を追加する
$bookShelf = new BookShelf;
$bookShelf->addBook('君の名は', '200ページ', '新海誠');
$bookShelf->addBook('オブジェクト指向でなぜつくるのか', '365ページ', '平澤章');
$bookShelf->addBook('Head First デザインパターン', '568ページ', 'オライリージャパン');

// Book情報が追加できているか確認する
print_r($bookShelf->getBookDetails());
