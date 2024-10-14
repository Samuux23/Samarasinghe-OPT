<?php
session_start();

// Include the database connection
include 'connect.php';

// Check if the customer is logged in
if (isset($_SESSION['CustomerEmail'])) {
    $customerEmail = $_SESSION['CustomerEmail']; // Retrieve stored customer email
} else {
    // Redirect to login page if not logged in
    header("Location: loginUI.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    $totalPrice = $_POST['total_price'];
    $productTitles = $_POST['product_titles']; // Retrieve product titles
    $proof = $_FILES['proof']['name']; // Get the file name of the proof of payment

    // Check if email exists in the customer table
    $emailCheckQuery = "SELECT * FROM customer WHERE CustomerEmail = '$email'";
    $result = $conn->query($emailCheckQuery);

    if ($result->num_rows > 0) {
        // Email exists, proceed with the order placement

        // Upload the proof of payment
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($proof);
        move_uploaded_file($_FILES['proof']['tmp_name'], $targetFile);

        // Insert data into the orders table
        $sql = "INSERT INTO orders (Email, Name, Contact, `Delivery address`, Postal, TotalPrice, Proof, Status)
                VALUES ('$email', '$productTitles', '$contact', '$address', '$postal', '$totalPrice', '$proof', 'Pending')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Order placed successfully!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Email does not exist, show alert
        echo "<script>alert('Please enter registered email or log in');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Checkout Page</title>
  <link rel="stylesheet" href="checkout.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
  <div class="details">
    <h1>018180120371</h1>
    <h2>Hatton National Bank</h2>
    <h2>Kandy</h2>
    <h2>Samarasinghe Optimetries</h2>
  </div>
  <div class="checkout-interface">
    <form action="checkout.php" method="POST" id="checkout-form" enctype="multipart/form-data">
      <p class="back-icon"><a href="home.php">X</a></p>
      <h1>Checkout</h1>

      <div class="input-form">
        <input type="email" placeholder="Enter your registered email" name="email" id="email" required />
      </div>

      <div class="input-form">
        <input type="text" placeholder="Name" name="name" id="name" required />
      </div>

      <div class="input-form">
        <input type="text" placeholder="Contact Number" name="contact" id="contact" required />
      </div>

      <div class="input-form">
        <input type="text" placeholder="Delivery address" name="address" id="address" required />
      </div>

      <div class="input-form">
        <input type="text" placeholder="Postal Code" name="postal" id="postal" required />
      </div>

      <label for="proof">Please enter proof of the payment</label>
      <div class="input-form">
        <input type="file" name="proof" id="proof" required />
      </div>

      <input type="hidden" name="product_titles" id="product_titles" />
      <input type="hidden" name="total_price" id="total_price" />

      <h2 class="total-price-display" id="total-price-display"></h2>
      <h2 class="cart-product-title" id="total-title-display"></h2>

      <button class="checkout-btn" name="checkout">Confirm Purchase</button>
    </form>
  </div>

  <script src="checkout.js"></script>
</body>
</html>
