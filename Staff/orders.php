<?php
include 'connect.php'; // Include the database connection

// Initialize a variable to store the alert message
$alertMessage = "";

// Handle status change requests
if (isset($_GET['action']) && isset($_GET['id'])) {
    $orderID = $_GET['id'];
    $action = $_GET['action'];

    // Set the status based on the action
    if ($action == 'paid') {
        $status = 'Paid';
    } elseif ($action == 'rejected') {
        $status = 'Rejected';
    } elseif ($action == 'shipped') {
        $status = 'Shipped';
    }

    // Update the order status
    $sql = "UPDATE orders SET Status = ? WHERE OrderID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $orderID);
    
    if ($stmt->execute()) {
        $alertMessage = "Order status updated to " . $status . "!";
    } else {
        $alertMessage = "Error updating order status: " . $stmt->error;
    }

    $stmt->close();
}

// Check if the form is for updating an existing order
if (isset($_GET['id']) && !isset($_GET['action'])) {
    // Get the order ID
    $orderID = $_GET['id'];
    
    // Fetch the data for the specific order
    $sql = "SELECT * FROM orders WHERE OrderID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderID);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();
    $stmt->close();
}

// Handle the form submission for both new and existing orders
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    $price = $_POST['Price'];
    $orderID = $_POST['orderID'];

    // Check if updating an existing order
    if (!empty($orderID)) {
        $sql = "UPDATE orders SET Email = ?, Name = ?, Contact = ?, `Delivery address` = ?, Postal = ?, TotalPrice = ? WHERE OrderID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $email, $name, $contact, $address, $postal, $price, $orderID);
        
        if ($stmt->execute()) {
            $alertMessage = "Order updated successfully!";
        } else {
            $alertMessage = "Error updating order: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Insert new order if no ID is set
        $sql = "INSERT INTO orders (Email, Name, Contact, `Delivery address`, Postal, TotalPrice, Status) VALUES (?, ?, ?, ?, ?, ?, 'Pending..')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $email, $name, $contact, $address, $postal, $price);

        if ($stmt->execute()) {
            $alertMessage = "New order added successfully!";
        } else {
            $alertMessage = "Error adding new order: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Fetch the data from the 'orders' table
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="customers.css">
    <!-- Box icons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <!-- Remix icon link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet" />
    <script>
        // JavaScript function to display alert if there's a message
        function showAlert(message) {
            if (message) {
                alert(message);
            }
        }
    </script>
</head>
<body onload="showAlert('<?php echo $alertMessage; ?>')">
<header id="top">
    <img src="../img/samarasinghe logo.png" alt="" class="logo" />
    <nav>
        <ul class="nav_links">
        <li><a href="staffHome.php">Home</a></li>
          
          <li><a href="orders.php">Orders</a></li>
          <li><a href="message.php">Messages</a></li>
          <li><a href="appointmentManage.php">Appointment</a></li>
        </ul>
    </nav>
    <p>
        
        <a href="../loginUI.php" class="logout-icon"><i class="bx bxs-user-minus"></i></a>
    </p>
</header>

<div class="center-container">
    <form class="product-form" method="POST" enctype="multipart/form-data">
        <h2 style="margin-bottom: 20px;">ORDER MANAGEMENT</h2>
        <input type="hidden" name="orderID" value="<?php echo isset($order['OrderID']) ? $order['OrderID'] : ''; ?>">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter Email" value="<?php echo isset($order['Email']) ? $order['Email'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Full Name" value="<?php echo isset($order['Name']) ? $order['Name'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" placeholder="Enter Contact Number" value="<?php echo isset($order['Contact']) ? $order['Contact'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter Address" value="<?php echo isset($order['Delivery address']) ? $order['Delivery address'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="postal">Postal:</label>
            <input type="text" id="postal" name="postal" placeholder="Enter Postal Code" value="<?php echo isset($order['Postal']) ? $order['Postal'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="Price">Price:</label>
            <input type="text" id="Price" name="Price" placeholder="Enter Price" value="<?php echo isset($order['TotalPrice']) ? $order['TotalPrice'] : ''; ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="update"><?php echo isset($order) ? 'Update Order' : 'Add Order'; ?></button>
        </div>
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Postal</th>
            <th>Price</th>
            <th>Proof</th>
            <th>Status</th>
            <th>Paid</th>
            <th>Rejected</th>
            <th>Shipped</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Loop through the data and display each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['OrderID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Contact'] . "</td>";
                echo "<td>" . $row['Delivery address'] . "</td>";
                echo "<td>" . $row['Postal'] . "</td>";
                echo "<td>" . $row['TotalPrice'] . "</td>";
                echo "<td><img src='../uploads/" . $row['Proof'] . "' width='100' /></td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "<td><a href='orders.php?action=paid&id=" . $row['OrderID'] . "'>Paid</a></td>";
                echo "<td><a href='orders.php?action=rejected&id=" . $row['OrderID'] . "'>Rejected</a></td>";
                echo "<td><a href='orders.php?action=shipped&id=" . $row['OrderID'] . "'>Shipped</a></td>";
                echo "<td><a href='orders.php?id=" . $row['OrderID'] . "'>Edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='13'>No orders found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
