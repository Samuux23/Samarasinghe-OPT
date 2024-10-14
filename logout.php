<?php
session_start();
session_destroy(); // End all sessions
header("Location: loginUI.php"); // Redirect to login page
exit();
?>