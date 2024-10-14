<?php
session_start();
include('connect.php');

// Fetch all appointments 
$sql = "SELECT * FROM appointment";
$result = $conn->query($sql);


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $edit_sql = "SELECT * FROM appointment WHERE AppointmentID = '$id'";
    $edit_result = $conn->query($edit_sql);
    $edit_row = $edit_result->fetch_assoc();
} else {
    $edit_row = [
        'Name' => '',
        'Email' => '',
        'Contact' => '',
        'NearTown' => '',
        'Date' => '',
        'Time' => ''
    ];
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $town = $_POST['town'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if (isset($_POST['appointment_id']) && $_POST['appointment_id'] != '') {
        $appointment_id = $_POST['appointment_id'];
        $update_sql = "UPDATE appointment SET Name = '$name', Email = '$email', Contact = '$contact', NearTown = '$town', Date = '$date', Time = '$time' WHERE AppointmentID = '$appointment_id'";
        $conn->query($update_sql);
    } else {
        $insert_sql = "INSERT INTO appointment (Name, Email, NearTown, Date, Time) VALUES ('$name', '$email', '$town', '$date', '$time')";
        $conn->query($insert_sql);
    }

    header("Location: appointmentManage.php");
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM appointment WHERE AppointmentID = '$delete_id'";
    $conn->query($delete_sql);

    header("Location: appointmentManage.php");
}

if (isset($_GET['confirm_id'])) {
    $confirm_id = $_GET['confirm_id'];
    $confirm_sql = "UPDATE appointment SET Status = 'Confirmed' WHERE AppointmentID = '$confirm_id'";
    $conn->query($confirm_sql);

    header("Location: appointmentManage.php");
}

if (isset($_GET['reject_id'])) {
    $reject_id = $_GET['reject_id'];
    $reject_sql = "UPDATE appointment SET Status = 'Rejected' WHERE AppointmentID = '$reject_id'";
    $conn->query($reject_sql);

    header("Location: appointmentManage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Management</title>
    <link rel="stylesheet" href="appointmentManage.css">
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

<div class="center-container">
    <form class="product-form" method="POST" enctype="multipart/form-data">
        <h2 style="margin-bottom: 20px;">Appointment Management</h2>
        <input type="hidden" name="appointment_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" required value="<?php echo $edit_row['Name']; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required value="<?php echo $edit_row['Email']; ?>">
        </div>

        <!-- <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" placeholder="Enter Contact" required value="<?php echo $edit_row['Contact']; ?>">
        </div> -->

        <div class="form-group">
            <label for="town">Town</label>
            <input type="text" id="town" name="town" placeholder="Enter Town" required value="<?php echo $edit_row['NearTown']; ?>">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required value="<?php echo $edit_row['Date']; ?>">
        </div>

        <!-- <div class="form-group">
            <label for="time">Time</label>
            <input type="text" id="time" name="time" required value="<?php echo $edit_row['Time']; ?>">
        </div> -->

        <div class="form-group">
            <label for="time">Time</label> 
            <select id="time" name="time" required value="<?php echo $edit_row['Time']; ?>">
            
            <option value="">Select Time</option>
            <option value="9:00am-11:00am">9:00 AM - 11:00 AM</option>
            <option value="4:00pm-6:00pm">4:00 PM - 6:00 PM</option>
        </select>

        </div>

  
     








        <div class="form-group">
            <button type="submit" value="save" name="submit">Save</button>
        </div>
    </form>
</div>

<!-- Appointment Table -->
<table>
    <thead>
        <tr>
            <th>AppointmentID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Town</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Confirm</th>
            <th>Reject</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['AppointmentID']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Contact']; ?></td>
                    <td><?php echo $row['NearTown']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Time']; ?></td>
                    <td><?php echo $row['Status']; ?></td>
                    <td><a href="appointmentManage.php?confirm_id=<?php echo $row['AppointmentID']; ?>"><button>Confirm</button></a></td>
                    <td><a href="appointmentManage.php?reject_id=<?php echo $row['AppointmentID']; ?>"><button>Reject</button></a></td>
                    <td><a href="appointmentManage.php?id=<?php echo $row['AppointmentID']; ?>">Update</a></td>
                    <td><a href="appointmentManage.php?delete_id=<?php echo $row['AppointmentID']; ?>" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="12">No appointments found</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
