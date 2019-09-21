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

    public function addBook($book)
    {
        $this->books[] = $book;
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function searchBooks($title)
    {
        $searchBooks = [];
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title) {
                $searchBooks[] = $book;
            }
        }
        return $searchBooks;
    }

    public function removeBook($removeBook)
    {
        $deleteAction = false;
        foreach ($this->books as $key => $book) {
            if (in_array($book, $removeBook)) {
                unset($this->books[$key]);
                $deleteAction = true;
            }
        }
        if ($deleteAction) {
            return true;
        } else {
            return false;
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
$getBook = $bookShelf->searchBooks('坊ちゃん');

// 取り出したインスタンスの本を削除
$bookShelf->removeBook($getBook);

// 現在の配列を取得
print_r($bookShelf->getBooks());
