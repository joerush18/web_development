<?php
// ICT726 Tutorial 7 - Exercise 6 - Library class

require_once __DIR__ . "/Book.php";

class Library {
    /** @var Book[] */
    private array $books = [];

    public function addBook(Book $book): void {
        $this->books[] = $book;
    }

    public function displayBooks(): void {
        echo "Books in library:" . PHP_EOL;
        foreach ($this->books as $book) {
            echo "- " . $book->getInfo() . PHP_EOL;
        }
        echo PHP_EOL;
    }

    /**
     * Allow external code to access the list of books if needed.
     *
     * @return Book[]
     */
    public function getBooks(): array {
        return $this->books;
    }
}


