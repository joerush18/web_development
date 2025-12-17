<?php
// ICT726 Tutorial 7 - Exercise 6 - Book class

class Book {
    private string $title;
    private string $author;

    public function __construct(string $title, string $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getInfo(): string {
        return $this->title . " by " . $this->author;
    }
}


