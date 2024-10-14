<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<header id="top">
    <img src="../img/samarasinghe logo.png" alt="" class="logo" />
    <nav>
        <ul class="nav_links">
        <li><a href="adminHome.php">Home</a></li>
          <li><a href="uploadProduct.php">Products</a></li>
          <li><a href="">Orders</a></li>
          <li><a href="">Messages</a></li>
          <li><a href="appointmentManage.php">Appointment</a></li>
          <li><a href="staff.php">Staff</a></li>
          <li><a href="customers.php">Customers</a></li>
          <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>
    <p>
        <a href="#" class="cta"><button>Web Content</button></a>
        <a href="../loginUI.php" class="logout-icon"><i class="ri-user-add-line"></i></a>
      </p>
</header>

<style>
    
:root {
    --bg--color: #ffffff;
    --text-color: #111111;
    --main-color: #333333;
    --other-color: #8e8e8e;
    --second-color: #1d1d1d;
    --brown-color: #bfa57d;
    --darkred-color: #4d060c;
    --lightred-color: #8f242d;
}

li, a, button {
    font-weight: 500;
    font-size: 18px;
    color: #802a2a;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 10%;
    background-color: var(--bg--color);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.logo {
    width: 100px;
    cursor: pointer;
}

.nav_links {
    list-style: none;
}

.nav_links li {
    display: inline-block;
    padding: 0px 20px;
}

.nav_links li a {
    transition: all 0.3s ease;
}

.nav_links li a:hover {
    color: var(--text-color);
}

button {
    padding: 9px 25px;
    background-color: #8f242d;
    border: none;
    border-radius: 15px;
    color: var(--bg--color);
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background-color: #4d060c;
    color: var(--bg--color);
}

.logout-icon {
    margin-left: 15px;
    color: #8f242d;
    border: 1px solid #8f242d;
    padding: 7px 10px;
    border-radius: 10px;
    transition: all 0.5s ease;
}

.logout-icon:hover {
    color: white;
    border: 1px solid white;
    background-color: #8f242d;
    transition: all 0.5s ease;
}

</style>

</body>
</html>