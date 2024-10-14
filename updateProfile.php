<?php
session_start();
include 'connect.php'; // Include the database connection

// Check if the customer is logged in
if (isset($_SESSION['CustomerEmail'])) {
    $customerEmail = $_SESSION['CustomerEmail']; // Retrieve stored customer email

    // Retrieve the form data
    $newName = $_POST['name'];
    $newContact = $_POST['contact'];
    $newPassword = $_POST['password'];
    $newAddress = $_POST['address'];

    // Optional: Hash the password if it's not empty (assuming you want to update password)
    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    } else {
        // If password field is empty, retain the old password
        $hashedPassword = null;
    }

    // Prepare the SQL statement
    if ($hashedPassword) {
        // If the password is updated
        $sql = "UPDATE customer 
                SET CustomerName = ?, CustomerContact = ?, CustomerPassword = ?, Address = ?
                WHERE CustomerEmail = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $newName, $newContact, $hashedPassword, $newAddress, $customerEmail);
    } else {
        // If the password is not updated
        $sql = "UPDATE customer 
                SET CustomerName = ?, CustomerContact = ?, Address = ?
                WHERE CustomerEmail = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $newName, $newContact, $newAddress, $customerEmail);
    }

    // Execute the update query
    if ($stmt->execute()) {
        // Success message and redirect back to profile page
        echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
    } else {
        // Error message
        echo "Error updating profile: " . $conn->error;
    }

    $stmt->close();
} else {
    // Redirect to login page if not logged in
    header("Location: loginUI.php");
    exit();
}

$conn->close();
?>
