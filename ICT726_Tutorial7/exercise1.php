<?php
// ICT726 Tutorial 7 - Exercise 1
// Simple Car class with name and year properties and getters/setters.

class Car {
    private string $name;
    private int $year;

    public function set_name(string $name): void {
        $this->name = $name;
    }

    public function get_name(): string {
        return $this->name;
    }

    public function set_year(int $year): void {
        $this->year = $year;
    }

    public function get_year(): int {
        return $this->year;
    }
}

// Create an instance of Car
$ford = new Car();
$ford->set_name("Ford");
$ford->set_year(2021);

// Print using the format: Name - Year
echo $ford->get_name() . " - " . $ford->get_year();
echo PHP_EOL;


