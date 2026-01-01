<?php
/**
 * Exercise 7: Login System - Logout Page
 * ICT726 Tutorial 8
 * 
 * This page handles user logout by destroying session and cookies
 */

session_start();

// Unset all session variables
$_SESSION = array();

// Delete the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Delete the user ID cookie
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, '/');
}

// Redirect to login page
header('Location: index.php');
exit();
?>

