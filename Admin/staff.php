<?php
include("connect.php");

$success_message = "";

// Check if we're submitting or updating staff data
if (isset($_POST['submit']) || isset($_POST['update'])) {
    $staff_name = $_POST['name'];
    $staff_email = $_POST['email'];
    $staff_password = $_POST['password'];

    if (isset($_POST['staff_id']) && $_POST['staff_id'] != "") {
        // Update staff data
        $staff_id = $_POST['staff_id'];
        $updateQuery = "UPDATE staff SET StaffName='$staff_name', StaffEmail='$staff_email', StaffPassword='$staff_password' WHERE StaffID=$staff_id";
        if ($conn->query($updateQuery) === TRUE) {
            $success_message = "Staff updated successfully!";
        }
    } else {
        // Insert new staff data
        $insertQuery = "INSERT INTO staff (StaffName, StaffEmail, StaffPassword) VALUES ('$staff_name', '$staff_email', '$staff_password')";
        if ($conn->query($insertQuery) === TRUE) {
            $success_message = "Staff added successfully!";
        }
    }
}

// If we are editing, fetch the staff data to pre-fill the form
$staff_to_edit = null;
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $result = $conn->query("SELECT * FROM staff WHERE StaffID=$edit_id");
    $staff_to_edit = $result->fetch_assoc();
}

// If we are deleting, delete the selected staff member
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM staff WHERE StaffID=$delete_id";
    if ($conn->query($deleteQuery) === TRUE) {
        $success_message = "Staff deleted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management</title>
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
        <a href="#" class="cta"><button>Web Content</button></a>
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
    <h2 style="margin-bottom: 20px;">STAFF MANAGEMENT</h2>
        <input type="hidden" name="staff_id" value="<?php echo $staff_to_edit['StaffID'] ?? ''; ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Staff Name" required value="<?php echo $staff_to_edit['StaffName'] ?? ''; ?>">
        </div>
   
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Staff Email" required value="<?php echo $staff_to_edit['StaffEmail'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Staff Password" required value="<?php echo $staff_to_edit['StaffPassword'] ?? ''; ?>">
        </div>
        
        <div class="form-group">
            <button type="submit" name="<?php echo isset($staff_to_edit) ? 'update' : 'submit'; ?>">
                <?php echo isset($staff_to_edit) ? 'Update' : 'Upload'; ?>
            </button>
        </div>
    </form>
</div>

<!-- Display staff table -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $retrieveQuery = "SELECT * FROM staff";
        $result = $conn->query($retrieveQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['StaffID']}</td>
                        <td>{$row['StaffName']}</td>
                        <td>{$row['StaffEmail']}</td>
                        <td>******</td> <!-- Masking the password -->
                        <td><a href='staff.php?edit_id={$row['StaffID']}'>Edit</a></td>
                        <td><a href='staff.php?delete_id={$row['StaffID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No staff members found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>