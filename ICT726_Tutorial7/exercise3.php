<?php
// ICT726 Tutorial 7 - Exercise 3
// Inheritance and method overriding.

class Car {
    protected string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function printDetails(): void {
        echo "Car Name: " . $this->name . PHP_EOL;
    }
}

class Ford extends Car {
    protected string $country;

    public function __construct(string $name, string $country) {
        parent::__construct($name);
        $this->country = $country;
    }

    // Override printDetails to include country
    public function printDetails(): void {
        echo "Car Name: " . $this->name . " - Country: " . $this->country . PHP_EOL;
    }
}

// Create an instance of the child class
$myFord = new Ford("Ford", "USA");
$myFord->printDetails();


