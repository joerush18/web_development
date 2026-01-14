<?php
/**
 * Exercise 2: Error Reporting Demonstration
 * ICT726 Tutorial 9
 * 
 * This file demonstrates error reporting with display_errors disabled
 */

error_reporting(E_ALL);
ini_set("display_errors", 0);

// This will cause an error but it won't be displayed
include("file_with_errors.php");

echo "<p>If you see this message, the script continued despite the error.</p>";
echo "<p>Check the error log or enable display_errors to see the actual error.</p>";
?>
