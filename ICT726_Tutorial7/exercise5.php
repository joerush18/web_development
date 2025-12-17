<?php
// ICT726 Tutorial 7 - Exercise 5
// Abstract class Fruit and concrete child classes.

abstract class Fruit {
    protected string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    abstract public function color(): void;
}

class Apple extends Fruit {
    public function color(): void {
        echo "Apple is red" . PHP_EOL;
    }
}

class Orange extends Fruit {
    public function color(): void {
        echo "Orange is orange" . PHP_EOL;
    }
}

class Grape extends Fruit {
    public function color(): void {
        echo "Grape is purple" . PHP_EOL;
    }
}

// Simple test run (optional)
$apple = new Apple("Apple");
$orange = new Orange("Orange");
$grape = new Grape("Grape");

$apple->color();
$orange->color();
$grape->color();


