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

function searchBooks($title, $books)
{
    $titleList = array_column($books, 'title');
    $expectTitleNum = array_search($title, $titleList);
    return $books[$expectTitleNum];
}

$books = [];

$book = new Book();
$book->setTitle('吾輩は猫である');
$book->setPages(100);
$books[] = ['title' => $book->getTitle(), 'pages' => $book->getPages()];


$book2 = new Book();
$book2->setTitle('坊ちゃん');
$book2->setPages(200);
$books[] = ['title' => $book2->getTitle(), 'pages' => $book2->getPages()];

$book3 = new Book();
$book3->setTitle('それから');
$book3->setPages(300);
$books[] = ['title' => $book3->getTitle(), 'pages' => $book3->getPages()];

foreach ($books as $book)
{
    echo $book['title']."\n";
}

// $booksの中から、 タイトルが「坊ちゃん」であるものを取り出しましょう。 多次元配列から取得する
$bookDetails = searchBooks('坊ちゃん', $books);
echo $bookDetails['title'];
echo $bookDetails['pages'];
