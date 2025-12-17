<?php
// ICT726 Tutorial 7 - Exercise 6
// Simple Library System demonstration.

require_once __DIR__ . "/Book.php";
require_once __DIR__ . "/Library.php";
require_once __DIR__ . "/Member.php";

// Create some books
$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald");
$book2 = new Book("To Kill a Mockingbird", "Harper Lee");
$book3 = new Book("1984", "George Orwell");

// Create a library and add books
$library = new Library();
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

// Display all books in the library
$library->displayBooks();

// Create some members
$member1 = new Member("Alice", "Gold");
$member2 = new Member("Bob", "Silver");

// Members borrow some books
$member1->borrowBook($book1);
$member1->borrowBook($book3);

$member2->borrowBook($book2);

// Display borrowed books for each member
$member1->displayBorrowedBooks();
$member2->displayBorrowedBooks();


