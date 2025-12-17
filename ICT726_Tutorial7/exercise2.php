<?php
// ICT726 Tutorial 7 - Exercise 2
// Car class with constructor and destructor.

class Car {
    private string $name;
    private int $year;

    public function __construct(string $name, int $year) {
        $this->name = $name;
        $this->year = $year;
    }

    public function __destruct() {
        // Print properties in the format: Name - Year
        echo $this->name . " - " . $this->year . PHP_EOL;
    }
}

// Create an instance of Car
$ford = new Car("Ford", 2021);


