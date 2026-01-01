<!DOCTYPE html>
<html>
<head>
    <title>Employee Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        form {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php
/**
 * Exercise 4: Employee Information Form
 * ICT726 Tutorial 8
 * 
 * This code demonstrates:
 * 1. Form handling using POST method
 * 2. Database connection using MySQLi (modernized from deprecated mysql_*)
 * 3. Inserting form data into database
 * 4. Displaying success/error messages
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Office";

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $first = $_POST['first'];
    $last = $_POST['last'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute insert query (using prepared statement for security)
    $stmt = $conn->prepare("INSERT INTO employee (firstname, lastname, address, position) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first, $last, $address, $position);
    
    if ($stmt->execute()) {
        echo "<p class='success'>Thank you! Information entered successfully.</p>";
    } else {
        echo "<p class='error'>Error: " . $stmt->error . "</p>";
    }
    
    $stmt->close();
    $conn->close();
} else {
    // Display form
    ?>
    <h2>Employee Information Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="first">First name:</label>
        <input type="text" id="first" name="first" required><br>
        
        <label for="last">Last name:</label>
        <input type="text" id="last" name="last" required><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br>
        
        <input type="submit" name="submit" value="Enter information">
    </form>
    <?php
}
?>
</body>
</html>

