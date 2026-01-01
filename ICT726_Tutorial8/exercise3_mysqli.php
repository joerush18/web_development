<?php
/**
 * Exercise 3: Insert and Select data using MySQLi
 * ICT726 Tutorial 8
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br><br>";

// Insert data
$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES 
    ('John', 'Doe', 'john@example.com'),
    ('Jane', 'Smith', 'jane@example.com'),
    ('Bob', 'Johnson', 'bob@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New records inserted successfully<br><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br><br>";
}

// Select and display data
$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Guest List:</h3>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Registration Date</th></tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
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

$conn->close();
?>

