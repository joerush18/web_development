<?php
/**
 * Exercise 7: Login System - Login Page
 * ICT726 Tutorial 8
 * 
 * This page handles user login with session and cookie management
 */

require 'config.php';

session_start();

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();
        
        // Verify the password using password_verify
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['user_id'] = $user_data['id'];
            // Set a cookie to remember the user
            setcookie('user_id', $user_data['id'], time() + (86400 * 30), "/"); // 86400 seconds = 1 day
            header('Location: welcome.php');
            exit();
        } else {
            $login_error = "Invalid password.";
        }
    } else {
        $login_error = "Invalid username.";
    }
    
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #5568d3;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            background-color: #ffe6e6;
            border-radius: 5px;
        }
        .info {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3ff;
            border-radius: 5px;
            font-size: 12px;
            color: #555;
        }
        .info strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        
        <?php
        if (isset($login_error)) {
            echo "<div class='error'>$login_error</div>";
        }
        ?>
        
        <div class="info">
            <strong>Test Credentials:</strong>
            Username: admin<br>
            Password: password123
        </div>
    </div>
</body>
</html>

