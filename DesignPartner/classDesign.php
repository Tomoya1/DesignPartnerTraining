<?php

class Book
{
    private $title;
    private $pages;
    private $author;

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setPages(int $pages)
    {
        $this->pages = $pages;
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPages(): int 
    {
        return $this->pages;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }


}

class BookShelf extends Book
{
    private $books;
    private $maxBookCount;

    public function __construct()
    {
        $this->maxBookCount = 3;
    }

    public function addBook($book)
    {
        try {

            if (count($this->books) >= $this->maxBookCount) {
                throw new Exception("最大値を超えています");
            }

            $this->books[] = $book;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function searchBook($title)
    {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title) {

                return $book;
            }
        }
    }

    public function removeBook($removeBook)
    {
        foreach ($this->books as $key => $book) {
            if ($book == $removeBook) {
                unset($this->books[$key]);
                return true;
            } elseif ($book != $removeBook) {
                return false;
            }
        }
    }
}

$bookShelf = new BookShelf();
$book = new Book();
$book->setTitle('吾輩は猫である');
$book->setPages(100);
$book->setAuthor('夏目漱石');
$bookShelf->addBook($book);


$book2 = new Book();
$book2->setTitle('坊ちゃん');
$book2->setPages(200);
$book2->setAuthor('夏目漱石');
$bookShelf->addBook($book2);


$book3 = new Book();
$book3->setTitle('それから');
$book3->setPages(300);
$book3->setAuthor('夏目漱石');
$bookShelf->addBook($book3);

// titleから本の情報を取得
$getBook = $bookShelf->searchBook('坊ちゃん');

// 取り出したインスタンスの本を削除
$bookShelf->removeBook($getBook);