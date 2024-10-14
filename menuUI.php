<?php
session_start();

// Check if the customer is logged in
if (isset($_SESSION['CustomerEmail'])) {
    $customerEmail = $_SESSION['CustomerEmail']; // Retrieve stored customer email
    // echo "Welcome, " . $customerEmail;
} else {
    // Redirect to login page if not logged in
    // header("Location: loginUI.php");
    // exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <!-- Box icons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

    <!-- Remix icon link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="menuUI.css" />
</head>
<body>
    <header id="top">
      <img src="img/logosign.png" alt="" class="logo" />
      <nav>
        <ul class="nav_links">
          <li><a href="home.php">Home</a></li>
          <li><a href="aboutUs.php">About Us</a></li>
          <li><a href="menuUI.php">Shop</a></li>
          <li><a href="services.php">Services</a></li>
        </ul>
      </nav>
      <p>
        <a href="contact.php" class="cta"><button>Contact</button></a>
        <a href="#"><i class="ri-shopping-cart-2-line SC logout-icon" id="cart-icon">
            <span class="cart-count">0</span></i>
        </a>
      </p>
      <!-- cart -->
      <div class="cart">
        <h2 class="cart-title">Your Cart</h2>
        <!-- cart content -->
        <div class="cart-content"></div>
        <!-- total -->
        <div class="total">
          <div class="total-title">Total</div>
          <div class="total-price">Rs0</div>
        </div>
        <!-- buy button -->
        <button type="button" class="btn-buy">Order Now</button>
        <!-- cart close -->
        <i class="ri-close-line" id="close-cart"></i>
      </div>
    </header>

    <section class="hero">
      <div class="hero-container"></div>
      <div class="search">
        <h1>Menu</h1>
        <div class="filter-container">
          <label for="cuisine_filter">Category</label>
          <select id="cuisine_filter" name="cuisine_filter" onchange="filterMenu()">
              <option value="all">All</option>
              <option value="sunglasses">Sunglasses</option>
              <option value="contact lenses">Contact Lenses</option>
              <option value="spectacles">Spectacles (Frames)</option>
          </select>
        </div>
        <input class="serchdock" type="text" id="productSearch" placeholder="Search for products" onkeyup="filterProductsBySearch()" />
      </div>
    </section>

    <section class="shop container">
      <div class="shop-content" id="menu-items">
        <?php
        include 'connect.php';

        // Fetch product data from the database
        $sql = "SELECT * FROM product";  // Assuming your table is named 'product'
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="product-box" data-category="' . $row['Category'] . '" data-name="' . strtolower($row['ProductName']) . '">
                    <img src="Admin/uploads/' . $row['ProductImage'] . '" alt="' . $row['ProductName'] . '" class="product-img" />
                    <h2 class="product-title">' . $row['ProductName'] . '</h2>
                    <p class="product-description">' . $row['ProductDes'] . '</p>
                    <span class="price">Rs ' . $row['ProductPrice'] . '</span>
                    <i class="ri-shopping-cart-2-line add-cart"></i>
                </div>';
            }
        } else {
            echo '<p>No products available.</p>';
        }
        ?>
      </div>
    </section>

    <footer class="footer-distributed">
      <div class="footer-left">
         <h2>A.A SAMARASINGHE</h2>
         <h3>OPTOMETRISTS</h3>

        <p class="footer-links">
          <a href="home.php">Home</a> |
          <a href="menuUI.php">Shop</a> |
          <a href="services.php">Services</a> |
          <a href="contact.php">Contact</a>
        </p>

        <p class="footer-company-name">
          Copyright © 2024 <strong>A.A SAMARASINGHE</strong> All rights reserved
        </p>
      </div>

      <div class="footer-center">
        <div>
          <i class="ri-map-pin-line"></i>
          <p>Colombo 03, Upper Street, Sri Lanka</p>
        </div>
        <div>
          <i class="ri-phone-line"></i>
          <p>+94-763256609</p>
        </div>
        <div>
          <i class="ri-mail-open-line"></i>
          <p>contact@samarasingheopt.com</p>
        </div>
      </div>

      <div class="footer-right">
        <p class="footer-company-about">
          <span>Eyes for your life</span>
          <strong>SAMARASINGHE OPTIMETRIES</strong>: Offering expert eye care solutions with a wide range of quality eyewear and personalized services to enhance your vision and style.
        </p>
        <div class="footer-icons">
          <a href="https://web.facebook.com/"><i class="ri-facebook-box-fill"></i></a>
          <a href="https://www.instagram.com/"><i class="ri-instagram-fill"></i></a>
          <a href="https://lk.linkedin.com/"><i class="ri-linkedin-box-fill"></i></a>
          <a href="https://x.com/?lang=en"><i class="ri-twitter-x-line"></i></a>
          <a href="https://www.youtube.com/"><i class="ri-youtube-line"></i></a>
        </div>
      </div>
    </footer>

    <script src="menu.js"></script>
</body>
</html>