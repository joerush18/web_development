<?php
/**
 * Exercise 3: Insert and Select data using PDO
 * ICT726 Tutorial 8
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDb";

try {
    // Create connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully using PDO<br><br>";
    
    // Insert data
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES 
        ('Alice', 'Williams', 'alice@example.com'),
        ('Charlie', 'Brown', 'charlie@example.com'),
        ('Diana', 'Prince', 'diana@example.com')";
    
    $conn->exec($sql);
    echo "New records inserted successfully<br><br>";
    
    // Select and display data
    $sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    
    if (count($rows) > 0) {
        echo "<h3>Guest List:</h3>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Registration Date</th></tr>";
        
        foreach($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["reg_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

