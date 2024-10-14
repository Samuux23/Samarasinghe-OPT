<?php
session_start();
include 'connect.php'; // Include the database connection

// Check if the customer is logged in
if (isset($_SESSION['CustomerEmail'])) {
    $customerEmail = $_SESSION['CustomerEmail']; // Retrieve stored customer email
    
    // Fetch user details from the database based on the session email
    $sql = "SELECT * FROM customer WHERE CustomerEmail = '$customerEmail'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch associative array of the result
        $row = $result->fetch_assoc();
        $customerName = $row['CustomerName'];
        $customerContact = $row['CustomerContact'];
        $customerPassword = $row['CustomerPassword'];
        $customerAddress = $row['Address'];
    } else {
        echo "No customer found with this email.";
        exit();
    }

    // Fetch order details based on the logged-in customer's email
    $orderSql = "SELECT OrderID, Name, TotalPrice, Status FROM orders WHERE Email = '$customerEmail'";
    $orderResult = $conn->query($orderSql);
    
    // Fetch appointment details based on the logged-in customer's email
    $appointmentSql = "SELECT Email, NearTown, Contact, Date, Time, Status FROM appointment WHERE Email = '$customerEmail'";
    $appointmentResult = $conn->query($appointmentSql);

} else {
    // Redirect to login page if not logged in
    header("Location: loginUI.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link rel="stylesheet" href="profile.css" />
    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  
    <div class="container">
    <a href="home.php" class="back-buttton"><button>Back</button></a>
  
      <main>
        <div class="profile-container">
          <!-- Current Info Section -->
          <div class="current-info">
            <h2>Current Details</h2>
            <p><strong>Name:</strong> <?php echo $customerName; ?></p>
            <p><strong>Contact:</strong> <?php echo $customerContact; ?></p>
            <p><strong>Password:</strong> **********</p> <!-- You can hide the actual password for security -->
            <p><strong>Address:</strong> <?php echo $customerAddress; ?></p>
          </div>

          <!-- Update Form Section -->
          <div class="update-form">
            <form id="profileForm" method="POST" action="updateProfile.php">
              <div class="form-group">
                <label for="name">Name:</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  value="<?php echo $customerName; ?>"
                  placeholder="Enter your name"
                />
              </div>

              <div class="form-group">
                <label for="contact">Contact:</label>
                <input
                  type="text"
                  id="contact"
                  name="contact"
                  value="<?php echo $customerContact; ?>"
                  placeholder="Enter your contact"
                />
              </div>

              <div class="form-group">
                <label for="password">Password:</label>
                <input
                  type="password"
                  id="password"
                  name="password"
                  placeholder="Enter new password"
                />
              </div>

              <div class="form-group">
                <label for="address">Address:</label>
                <textarea
                  id="address"
                  name="address"
                  placeholder="Enter your address"
                ><?php echo $customerAddress; ?></textarea>
              </div>

              <div class="form-group">
                <button type="submit">Update Profile</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Order History Section -->
        <div class="order-history">
          <h2>Previous Orders</h2>
          <table id="ordersTable">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Item Name</th>
                <th>Total Price</th>
                <th>Tracking ID</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if ($orderResult->num_rows > 0) {
                  while ($orderRow = $orderResult->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $orderRow['OrderID'] . "</td>";
                      echo "<td>" . $orderRow['Name'] . "</td>";
                      echo "<td>" . $orderRow['TotalPrice'] . "</td>";
                      echo "<td>" . "" . "</td>"; // Keep tracking ID empty
                      echo "<td>" . $orderRow['Status'] . "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='5'>No orders found.</td></tr>";
              }
              ?>
            </tbody>
          </table>

          <!-- Appointment History Section -->
          <div class="appoinment-history">
              <h2>Appointments</h2>
                <table id="appointmentsTable">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>Town</th>
                      <th>Contact</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if ($appointmentResult->num_rows > 0) {
                        while ($appointmentRow = $appointmentResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $appointmentRow['Email'] . "</td>";
                            echo "<td>" . $appointmentRow['NearTown'] . "</td>";
                            echo "<td>" . $appointmentRow['Contact'] . "</td>";
                            echo "<td>" . $appointmentRow['Date'] . "</td>";
                            echo "<td>" . $appointmentRow['Time'] . "</td>";
                            echo "<td>" . $appointmentRow['Status'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No appointments found.</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
          </div>
        </div>
      </main>
    </div>

    <script src="profile.js"></script>
  </body>
</html>
