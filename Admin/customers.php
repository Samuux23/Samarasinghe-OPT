<?php
include("connect.php");

$success_message = "";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    // Check if we are updating or inserting new data
    if (isset($_POST['customer_id']) && $_POST['customer_id'] != "") {
        $customer_id = $_POST['customer_id'];
        $updateQuery = "UPDATE customer SET CustomerName='$name', CustomerEmail='$email', CustomerContact='$contact', CustomerPassword='$password' WHERE CustomerID=$customer_id";
        if ($conn->query($updateQuery) === TRUE) {
            $success_message = "Customer updated successfully!";
        }
    } else {
        $insertQuery = "INSERT INTO customer (CustomerName, CustomerEmail, CustomerContact, CustomerPassword) VALUES ('$name', '$email', '$contact', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            $success_message = "Customer added successfully!";
        }
    }
}

if (isset($_GET['delete_id'])) {
    // Delete the selected customer
    $delete_id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM customer WHERE CustomerID=$delete_id";
    if ($conn->query($deleteQuery) === TRUE) {
        $success_message = "Customer deleted successfully!";
    }
}

$customer_to_edit = null;
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $result = $conn->query("SELECT * FROM customer WHERE CustomerID=$edit_id");
    $customer_to_edit = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management </title>
    <link rel="stylesheet" href="customers.css">
    <!-- Box icons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <!-- Remix icon link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet" />
</head>
<body>
<header id="top">
    <img src="../img/samarasinghe logo.png" alt="" class="logo" />
    <nav>
        <ul class="nav_links">
        <li><a href="adminHome.php">Home</a></li>
          <li><a href="uploadProduct.php">Products</a></li>
          <li><a href="orders.php">Orders</a></li>
          <li><a href="message.php">Messages</a></li>
          <li><a href="appointmentManage.php">Appointment</a></li>
          <li><a href="staff.php">Staff</a></li>
          <li><a href="customers.php">Customers</a></li>
          <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>
    <p>
    <a href="Addpics.php" class="cta"><button>Web Content</button></a>
        <a href="../loginUI.php" class="logout-icon"><i class="bx bxs-user-minus"></i></a>
      </p>
</header>

<?php if ($success_message != ""): ?>
    <script>
        alert("<?php echo $success_message; ?>");
    </script>
<?php endif; ?>

<div class="center-container">
    <form class="product-form" method="POST" enctype="multipart/form-data">
    <h2 style="margin-bottom: 20px;">CUSTOMER MANAGEMENT</h2>
        <input type="hidden" name="customer_id" value="<?php echo $customer_to_edit['CustomerID'] ?? ''; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Full Name" value="<?php echo $customer_to_edit['CustomerName'] ?? ''; ?>">
        </div>
   
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter Email" value="<?php echo $customer_to_edit['CustomerEmail'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" placeholder="Enter Contact Number" value="<?php echo $customer_to_edit['CustomerContact'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" value="<?php echo $customer_to_edit['CustomerPassword'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="update">
                <?php echo isset($customer_to_edit) ? 'Update' : 'Upload'; ?>
            </button>
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
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $retrieveQuery = "SELECT * FROM customer";
        $result = $conn->query($retrieveQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['CustomerID']}</td>
                        <td>{$row['CustomerName']}</td>
                        <td>{$row['CustomerEmail']}</td>
                        <td>{$row['CustomerContact']}</td>
                        <td>******</td> <!-- Masking the password -->
                        <td><a href='customers.php?edit_id={$row['CustomerID']}'>Edit</a></td>
                        <td><a href='customers.php?delete_id={$row['CustomerID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No customers found</td></tr>";
        }
        
        ?>
    </tbody>
</table>
</body>
</html>