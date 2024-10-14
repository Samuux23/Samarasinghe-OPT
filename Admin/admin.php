<?php
include("connect.php");

$success_message = "";

// Check if we're submitting or updating admin data
if (isset($_POST['submit']) || isset($_POST['update'])) {
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];

    if (isset($_POST['admin_id']) && $_POST['admin_id'] != "") {
        // Update admin data
        $admin_id = $_POST['admin_id'];
        $updateQuery = "UPDATE admin SET AdminEmail='$admin_email', AdminPassword='$admin_password' WHERE AdminID=$admin_id";
        if ($conn->query($updateQuery) === TRUE) {
            $success_message = "Admin updated successfully!";
        }
    } else {
        // Insert new admin data
        $insertQuery = "INSERT INTO admin (AdminEmail, AdminPassword) VALUES ('$admin_email', '$admin_password')";
        if ($conn->query($insertQuery) === TRUE) {
            $success_message = "Admin added successfully!";
        }
    }
}

// If we are editing, fetch the admin data to pre-fill the form
$admin_to_edit = null;
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $result = $conn->query("SELECT * FROM admin WHERE AdminID=$edit_id");
    $admin_to_edit = $result->fetch_assoc();
}

// If we are deleting, delete the selected admin
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM admin WHERE AdminID=$delete_id";
    if ($conn->query($deleteQuery) === TRUE) {
        $success_message = "Admin deleted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
    <link rel="stylesheet" href="staff.css">
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
        <h2 style="margin-bottom: 20px;">ADMIN MANAGEMENT</h2>
        <input type="hidden" name="admin_id" value="<?php echo $admin_to_edit['AdminID'] ?? ''; ?>">
   
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Admin Email" required value="<?php echo $admin_to_edit['AdminEmail'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Admin Password" required value="<?php echo $admin_to_edit['AdminPassword'] ?? ''; ?>">
        </div>
        
        <div class="form-group">
            <button type="submit" name="<?php echo isset($admin_to_edit) ? 'update' : 'submit'; ?>">
                <?php echo isset($admin_to_edit) ? 'Update' : 'Upload'; ?>
            </button>
        </div>
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $retrieveQuery = "SELECT * FROM admin";
        $result = $conn->query($retrieveQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['AdminID']}</td>
                        <td>{$row['AdminEmail']}</td>
                        <td>******</td> <!-- Masking the password -->
                        <td><a href='admin.php?edit_id={$row['AdminID']}'>Edit</a></td>
                        <td><a href='admin.php?delete_id={$row['AdminID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No admins found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>