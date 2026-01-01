<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee CRUD Application</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .btn-danger {
            background-color: #f44336;
            color: white;
        }
        .btn-danger:hover {
            background-color: #da190b;
        }
        .btn-warning {
            background-color: #ff9800;
            color: white;
        }
        .btn-warning:hover {
            background-color: #e68900;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .actions {
            white-space: nowrap;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Employee Management System</h1>
    
    <?php
    /**
     * Exercise 5: CRUD Application for Employees
     * ICT726 Tutorial 8
     * 
     * This application implements Create, Read, Update, and Delete operations
     * for an Employees table using PDO API.
     */
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_db";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
    
    // Handle form submissions
    $message = "";
    $messageType = "";
    
    // Create operation
    if (isset($_POST['create'])) {
        $empName = $_POST['emp_name'];
        $empAddress = $_POST['emp_address'];
        $salary = $_POST['salary'];
        $hiredate = $_POST['hiredate'];
        
        try {
            $stmt = $conn->prepare("INSERT INTO Employees (EmpName, EmpAddress, Salary, Hiredate) VALUES (?, ?, ?, ?)");
            $stmt->execute([$empName, $empAddress, $salary, $hiredate]);
            $message = "Employee added successfully!";
            $messageType = "success";
        } catch(PDOException $e) {
            $message = "Error: " . $e->getMessage();
            $messageType = "error";
        }
    }
    
    // Update operation
    if (isset($_POST['update'])) {
        $empId = $_POST['emp_id'];
        $empName = $_POST['emp_name'];
        $empAddress = $_POST['emp_address'];
        $salary = $_POST['salary'];
        $hiredate = $_POST['hiredate'];
        
        try {
            $stmt = $conn->prepare("UPDATE Employees SET EmpName=?, EmpAddress=?, Salary=?, Hiredate=? WHERE EmpID=?");
            $stmt->execute([$empName, $empAddress, $salary, $hiredate, $empId]);
            $message = "Employee updated successfully!";
            $messageType = "success";
        } catch(PDOException $e) {
            $message = "Error: " . $e->getMessage();
            $messageType = "error";
        }
    }
    
    // Delete operation
    if (isset($_GET['delete'])) {
        $empId = $_GET['delete'];
        try {
            $stmt = $conn->prepare("DELETE FROM Employees WHERE EmpID=?");
            $stmt->execute([$empId]);
            $message = "Employee deleted successfully!";
            $messageType = "success";
        } catch(PDOException $e) {
            $message = "Error: " . $e->getMessage();
            $messageType = "error";
        }
    }
    
    // Get employee for editing
    $editEmployee = null;
    if (isset($_GET['edit'])) {
        $empId = $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM Employees WHERE EmpID=?");
        $stmt->execute([$empId]);
        $editEmployee = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Display message
    if ($message) {
        echo "<div class='message $messageType'>$message</div>";
    }
    ?>
    
    <!-- Form for Create/Update -->
    <div class="form-container">
        <h2><?php echo $editEmployee ? 'Update Employee' : 'Add New Employee'; ?></h2>
        <form method="POST" action="">
            <?php if ($editEmployee): ?>
                <input type="hidden" name="emp_id" value="<?php echo $editEmployee['EmpID']; ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="emp_name">Employee Name:</label>
                <input type="text" id="emp_name" name="emp_name" 
                       value="<?php echo $editEmployee ? htmlspecialchars($editEmployee['EmpName']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="emp_address">Address:</label>
                <input type="text" id="emp_address" name="emp_address" 
                       value="<?php echo $editEmployee ? htmlspecialchars($editEmployee['EmpAddress']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" id="salary" name="salary" step="0.01" 
                       value="<?php echo $editEmployee ? $editEmployee['Salary'] : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="hiredate">Hire Date:</label>
                <input type="date" id="hiredate" name="hiredate" 
                       value="<?php echo $editEmployee ? $editEmployee['Hiredate'] : ''; ?>" required>
            </div>
            
            <?php if ($editEmployee): ?>
                <button type="submit" name="update" class="btn btn-warning">Update Employee</button>
                <a href="exercise5.php" class="btn btn-primary">Cancel</a>
            <?php else: ?>
                <button type="submit" name="create" class="btn btn-primary">Add Employee</button>
            <?php endif; ?>
        </form>
    </div>
    
    <!-- Display Employees Table -->
    <h2>Employee List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Salary</th>
                <th>Hire Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $stmt = $conn->query("SELECT * FROM Employees ORDER BY EmpID");
                $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($employees) > 0) {
                    foreach($employees as $employee) {
                        echo "<tr>";
                        echo "<td>" . $employee['EmpID'] . "</td>";
                        echo "<td>" . htmlspecialchars($employee['EmpName']) . "</td>";
                        echo "<td>" . htmlspecialchars($employee['EmpAddress']) . "</td>";
                        echo "<td>$" . number_format($employee['Salary'], 2) . "</td>";
                        echo "<td>" . $employee['Hiredate'] . "</td>";
                        echo "<td class='actions'>";
                        echo "<a href='?edit=" . $employee['EmpID'] . "' class='btn btn-warning'>Edit</a> ";
                        echo "<a href='?delete=" . $employee['EmpID'] . "' class='btn btn-danger' 
                              onclick='return confirm(\"Are you sure you want to delete this employee?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center;'>No employees found</td></tr>";
                }
            } catch(PDOException $e) {
                echo "<tr><td colspan='6' style='color:red;'>Error: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

