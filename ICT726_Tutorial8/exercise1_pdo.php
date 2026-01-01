<?php
/**
 * Exercise 1: Connect to database using PDO
 * ICT726 Tutorial 8
 */

$servername = "localhost";
$username = "root";
$password = "";

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully using PDO";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

