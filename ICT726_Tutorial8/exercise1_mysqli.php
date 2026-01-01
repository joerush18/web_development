<?php
/**
 * Exercise 1: Connect to database using MySQLi
 * ICT726 Tutorial 8
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
echo "Connected successfully using MySQLi";
?>

