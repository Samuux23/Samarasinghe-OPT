<?php
// Database connection details
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "samarasinghe"; 


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Failed to connect Database: " . $conn->connect_error);
}
?>
