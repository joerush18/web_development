<?php
// ICT726 Tutorial 7 - Exercise 4
// CircleArea class that prints area automatically via constructor/destructor.

define("PI", 3.14);

class CircleArea {
    private float $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
        // Alternatively, you could compute in destructor; here we choose constructor.
    }

    public function __destruct() {
        $area = PI * $this->radius * $this->radius;
        echo "Radius: " . $this->radius . " - Area: " . $area . PHP_EOL;
    }
}

// Test with r = 5
$r = 5;
$circle = new CircleArea($r);


