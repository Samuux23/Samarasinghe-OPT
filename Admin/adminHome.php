<?php
include 'connect.php';

// ongoing orders 
$ongoingOrdersQuery = "SELECT COUNT(*) AS total_orders FROM orders WHERE status != 'pending'";
$ongoingOrdersResult = mysqli_query($conn, $ongoingOrdersQuery);
$ongoingOrdersRow = mysqli_fetch_assoc($ongoingOrdersResult);
$ongoingOrdersCount = $ongoingOrdersRow['total_orders'];

// ongoing appointments
$ongoingAppointmentsQuery = "SELECT COUNT(*) AS total_appointments FROM appointment WHERE status != 'pending'";
$ongoingAppointmentsResult = mysqli_query($conn, $ongoingAppointmentsQuery);
$ongoingAppointmentsRow = mysqli_fetch_assoc($ongoingAppointmentsResult);
$ongoingAppointmentsCount = $ongoingAppointmentsRow['total_appointments'];

//  total  sales 
$totalSalesQuery = "SELECT SUM(TotalPrice) AS total_sales FROM orders WHERE status != 'pending'";
$totalSalesResult = mysqli_query($conn, $totalSalesQuery);
$totalSalesRow = mysqli_fetch_assoc($totalSalesResult);
$totalSales = $totalSalesRow['total_sales'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="uploadProduct.css">
     <!-- Box icons link -->
     <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />

    <!-- Remix icon link -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap"
      rel="stylesheet"
    /> 

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
        <a href="../loginUI.php" class="logout-icon"
          ><i class="bx bxs-user-minus"></i
        ></a>
      </p>
</header>
<div class="welcome-container">
    <h2>WELCOME TO ADMIN DASHBOARD</h2>
</div>

<div class="admin-dashboard">
    <div class="dashboard-box">
        <i class="bx bxs-box bx-lg"></i>
        <h3>Orders Ongoing</h3>
        <p><?php echo $ongoingOrdersCount; ?> Orders in Progress</p>
    </div>
    <div class="dashboard-box">
        <i class="bx bxs-calendar-check bx-lg"></i>
        <h3>Appointments Ongoing</h3>
        <p><?php echo $ongoingAppointmentsCount; ?> Appointments Scheduled</p>
    </div>
    <div class="dashboard-box">
        <i class="bx bxs-shopping-bag bx-lg"></i>
        <h3>Accessible Sales</h3>
        <p>Rs <?php echo number_format($totalSales, 2); ?></p>
    </div>
</div>

<style>

.welcome-container {
    text-align: center;
    margin-top: 100px;
}

.welcome-container h2 {
    font-size: 32px;
    color: #962932;
    margin-bottom: 0px;
    font-weight: 800;
}

.admin-dashboard {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 60px;
    margin: 50px auto;
    width: 80%;
}

.dashboard-box {
    background: linear-gradient(135deg, #e63946, #f4a261);
    color: white;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    width: 230px;
    height: 230px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

.dashboard-box h3 {
    font-size: 22px;
    margin-bottom: 10px;
    font-weight: bold;
    text-transform: uppercase;
}

.dashboard-box p {
    margin-top: 30px;
    font-size: 16px;
    font-weight: 700;
}

.dashboard-box i {
    position: absolute;
    top: -30px;
    left: 50%;
    transform: translateX(-50%);
    background-color: white;
    padding: 15px;
    border-radius: 50%;
    color: #e63946;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

.dashboard-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

</style>

</body>
</html>
