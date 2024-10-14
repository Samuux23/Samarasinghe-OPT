<?php
include 'connect.php';
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    $customerEmail = $_POST['customerEmail'];
    $customerPass = $_POST['customerPass'];

    // Check if the login credentials are for the admin
    $adminSql = "SELECT * FROM admin WHERE AdminEmail = ?";
    $adminStmt = $conn->prepare($adminSql);
    $adminStmt->bind_param("s", $customerEmail);
    $adminStmt->execute();
    $adminResult = $adminStmt->get_result();

    if ($adminResult->num_rows > 0) {
        $row = $adminResult->fetch_assoc();
        if (password_verify($customerPass, $row['AdminPassword']) || $customerPass == $row['AdminPassword']) {
            // Verify either using hashed password or plain text
            $_SESSION['AdminEmail'] = $row['AdminEmail']; // Store admin email in session
            header("Location: Admin/adminHome.php"); // Redirect to admin page
            exit();
        }
    }

    // Check if the login credentials are for the staff
    $staffSql = "SELECT * FROM staff WHERE StaffEmail = ?";
    $staffStmt = $conn->prepare($staffSql);
    $staffStmt->bind_param("s", $customerEmail);
    $staffStmt->execute();
    $staffResult = $staffStmt->get_result();

    if ($staffResult->num_rows > 0) {
        $row = $staffResult->fetch_assoc();
        if (password_verify($customerPass, $row['StaffPassword']) || $customerPass == $row['StaffPassword']) {
            // Verify either using hashed password or plain text
            $_SESSION['StaffEmail'] = $row['StaffEmail']; // Store staff email in session
            header("Location: staff/staffHome.php"); // Redirect to staff home page
            exit();
        }
    }

    // Check if the login credentials are for the customer
    $customerSql = "SELECT * FROM customer WHERE CustomerEmail = ?";
    $customerStmt = $conn->prepare($customerSql);
    $customerStmt->bind_param("s", $customerEmail);
    $customerStmt->execute();
    $customerResult = $customerStmt->get_result();

    if ($customerResult->num_rows > 0) {
        $row = $customerResult->fetch_assoc();
        // Check for hashed or plain password
        if (password_verify($customerPass, $row['CustomerPassword']) || $customerPass == $row['CustomerPassword']) {
            $_SESSION['CustomerEmail'] = $row['CustomerEmail']; // Store customer email in session
            header("Location: home.php"); // Redirect to customer home page
            exit();
        }
    }

    // Invalid credentials for all types of users
    header("Location: loginUI.php?error=Incorrect Email or Password!");
    exit();
}
?>
