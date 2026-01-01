<?php
/**
 * Exercise 5: Setup database and table for CRUD application
 * ICT726 Tutorial 8
 * 
 * This script creates the database and Employees table for the CRUD application.
 * Run this once before using exercise5.php
 */

$servername = "localhost";
$username = "root";
$password = "";

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS crud_db";
    $conn->exec($sql);
    echo "Database 'crud_db' created successfully<br>";
    
    // Select the database
    $conn->exec("USE crud_db");
    
    // Create Employees table
    $sql = "CREATE TABLE IF NOT EXISTS Employees (
        EmpID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        EmpName VARCHAR(100) NOT NULL,
        EmpAddress VARCHAR(200),
        Salary DECIMAL(10, 2),
        Hiredate DATE
    )";
    
    $conn->exec($sql);
    echo "Table 'Employees' created successfully<br>";
    
    // Insert some sample data
    $sql = "INSERT INTO Employees (EmpName, EmpAddress, Salary, Hiredate) VALUES 
        ('John Doe', '123 Main St, City', 50000.00, '2020-01-15'),
        ('Jane Smith', '456 Oak Ave, Town', 60000.00, '2019-03-20'),
        ('Bob Johnson', '789 Pine Rd, Village', 55000.00, '2021-06-10')";
    
    $conn->exec($sql);
    echo "Sample data inserted successfully<br>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
echo "<br>Setup complete! You can now use exercise5.php";
?>

