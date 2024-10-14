<?php
// Database connection details
$host = "localhost"; // Host name
$user = "root"; // Username
$pass = ""; // Password
$db = "samarasinghe"; // Database name

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $pass, $db);

// Check for connection errors
if ($conn->connect_error) {
    die("Failed to connect Database: " . $conn->connect_error);
}
?>
