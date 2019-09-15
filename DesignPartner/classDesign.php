<?php

class Book {

    private $title;
    private $pages;
    private $author;

    function setBookDetails($title, $pages, $author)
    {
        $this->title = $title;
        $this->pages = $pages;
        $this->author = $author;
    }

    function getBookDetails()
    {
        $bookDetail = array($this->title, $this->pages, $this->author);

        return
            $bookDetail[0]. "\n".
            $bookDetail[1]."\n".
            $bookDetail[2]."\n";
    }

}

$book = new Book();
$book->setBookDetails('君の名は', '200ページ', '新海誠');
echo $book->getBookDetails();