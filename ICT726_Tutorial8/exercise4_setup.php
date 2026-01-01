<?php
/**
 * Exercise 4: Setup Office database and employee table
 * ICT726 Tutorial 8
 * 
 * This script creates the Office database and employee table.
 * Run this once before using exercise4.php
 */

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS Office";
if ($conn->query($sql) === TRUE) {
    echo "Database 'Office' created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db("Office");

// Create employee table
$sql = "CREATE TABLE IF NOT EXISTS employee (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    address VARCHAR(100),
    position VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'employee' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$conn->close();
echo "<br>Setup complete! You can now use exercise4.php";
?>

