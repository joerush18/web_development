<?php
// ICT726 Tutorial 7 - Exercise 6 - Member class

require_once __DIR__ . "/Book.php";

class Member {
    private string $name;
    private string $membershipType;

    /** @var Book[] */
    private array $borrowedBooks = [];

    public function __construct(string $name, string $membershipType) {
        $this->name = $name;
        $this->membershipType = $membershipType;
    }

    public function borrowBook(Book $book): void {
        $this->borrowedBooks[] = $book;
    }

    public function displayBorrowedBooks(): void {
        echo "Borrowed books for {$this->name} ({$this->membershipType}):" . PHP_EOL;
        if (empty($this->borrowedBooks)) {
            echo "- None" . PHP_EOL;
        } else {
            foreach ($this->borrowedBooks as $book) {
                echo "- " . $book->getInfo() . PHP_EOL;
            }
        }
        echo PHP_EOL;
    }
}


