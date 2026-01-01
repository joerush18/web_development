<?php
/**
 * Exercise 7: Login System - Welcome Page
 * ICT726 Tutorial 8
 * 
 * This page displays after successful login
 * It checks both session and cookie for authentication
 */

require 'config.php';

session_start();

// Check if user is logged in (check session first, then cookie)
if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    header('Location: index.php');
    exit();
}

// Prioritize session over cookie
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];

// Get user information
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();
$stmt->close();
$conn->close();

if (!$user_data) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome</title>
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
        .welcome-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 500px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .user-info {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .user-info p {
            margin: 10px 0;
            color: #555;
        }
        .logout-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background-color: #da190b;
        }
        .session-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3ff;
            border-radius: 5px;
            font-size: 12px;
            color: #555;
            text-align: left;
        }
        .session-info strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h2>Welcome, <?php echo htmlspecialchars($user_data['username']); ?>!</h2>
        
        <div class="user-info">
            <p><strong>User ID:</strong> <?php echo $user_data['id']; ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user_data['username']); ?></p>
        </div>
        
        <a href="logout.php" class="logout-btn">Logout</a>
        
        <div class="session-info">
            <strong>Session Information:</strong>
            <?php if (isset($_SESSION['user_id'])): ?>
                <p>✓ Session is active (User ID: <?php echo $_SESSION['user_id']; ?>)</p>
            <?php else: ?>
                <p>✗ No active session</p>
            <?php endif; ?>
            
            <?php if (isset($_COOKIE['user_id'])): ?>
                <p>✓ Cookie is set (User ID: <?php echo $_COOKIE['user_id']; ?>)</p>
            <?php else: ?>
                <p>✗ No cookie found</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

