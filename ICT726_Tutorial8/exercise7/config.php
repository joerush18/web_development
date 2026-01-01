<?php
/**
 * Exercise 7: Login System - Configuration File
 * ICT726 Tutorial 8
 * 
 * Database configuration and users table setup
 */

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Database created or already exists
}

// Select the database
$conn->select_db($dbname);

// Create users table if not exists
$create_users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($create_users_table) === TRUE) {
    // Table created or already exists
    // Insert a default user for testing (password: password123)
    $check_user = $conn->query("SELECT * FROM users WHERE username = 'admin'");
    if ($check_user->num_rows == 0) {
        $hashed_password = password_hash('password123', PASSWORD_DEFAULT);
        $insert_user = "INSERT INTO users (username, password) VALUES ('admin', '$hashed_password')";
        $conn->query($insert_user);
    }
}
?>

