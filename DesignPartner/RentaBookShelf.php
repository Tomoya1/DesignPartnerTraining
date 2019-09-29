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

class BookShelf
{
    private $books;
    private $maxBookCount;

    public function __construct($maxNumber)
    {
        $this->maxBookCount = $maxNumber;
    }

    public function addBook($book)
    {
        if (count($this->books) >= $this->maxBookCount) {
            throw new Exception("最大値を超えています");
        }
        $this->books[] = $book;
    }

    public function getBook()
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

    public function removeBook($book)
    {
        $array_num = array_search($book, $this->books, true);
        if ($array_num === false) {return false;}

            unset($this->books[$array_num]);
            return true;
    }
}

class RentaBookShelf extends BookShelf
{
    private $rentalBook;

    public function __construct()
    {
    }

    public function rentBook($book)
    {
        $this->rentalBook[] = $book;
    }

    public function returnBook($book)
    {
        $array_num = array_search($book, $this->rentalBook, true);
        if ($array_num === false) {return false;}

        unset($this->rentalBook[$array_num]);
        return true;
    }

    public function listRentedBooks()
    {
        return $this->rentalBook;
    }

    public function isRented($book)
    {
        $rented = in_array($book, $this->rentalBook);
        return $rented;
    }
}

$bookShelf = new BookShelf(3);

try {

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
    $book3->setTitle('こころ');
    $book3->setPages(300);
    $book3->setAuthor('夏目漱石');
    $bookShelf->addBook($book3);

    $rentaBooks = new RentaBookShelf();
    // 指定の本を借りる
    $rentaBooks->rentBook($book);
    $rentaBooks->rentBook($book2);

    // 指定の本を返す
    $rentaBooks->returnBook($book);

    // 貸し出されている本の一覧を取得する
    print_r($rentaBooks->listRentedBooks());

    // 貸出中か調べる
    $rentaBooks->isRented($book3);

} catch (Exception $e) {
    echo $e->getMessage();
}