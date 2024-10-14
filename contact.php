<?php
// Include the database connection file
require 'connect.php';  // Ensure this points to the correct path of your connect.php file

// Check if the request method is POST for the contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare an SQL statement to insert the message into the database
    $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        // If successful, display a success message
        echo "<script>alert('Message sent successfully');</script>";
    } else {
        // If there is an error, display the error message
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Close the statement and connection
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="contact.css" />

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
    <!-- Header section -->
    <header id="top">
      <a href="home.php">
        <img src="../img/samarasinghe logo.png" alt="" class="logo" />
      </a>
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
        <a href="loginUI.php" class="logout-icon"><i class="ri-user-add-line"></i></a>
      </p>
    </header>

    <!-- Hero section with title -->
    <section class="hero">
      <div class="hero-container"></div>
    </section>

    <!-- Contact form section -->
    <div class="contact-form">
      <div class="contact-info">
        <h2>Get In Touch</h2>
        <p>Feel free to contact us for any questions and doubts.</p>
        <div class="info">
          <div class="info-item">
            <i class="ri-phone-fill"></i>
            <span>+94-763256609</span>
          </div>
          <div class="info-item">
            <i class="ri-mail-fill"></i>
            <span>contact@samarasingheopt.com</span>
          </div>
          <div class="info-item">
            <i class="ri-map-pin-fill"></i>
            <span>Colombo 03, Upper Street, Sri Lanka</span>
          </div>
        </div>
        <div class="social-media">
          <a href="#"><i class="ri-facebook-box-fill"></i></a>
          <a href="#"><i class="ri-twitter-fill"></i></a>
          <a href="#"><i class="ri-instagram-fill"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

      <div class="contact-form-inner">
        <!-- Contact form -->
        <form action="contact.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="text" name="subject" placeholder="Subject" required />
            <textarea name="message" placeholder="Say Something" required></textarea>
            
            <!-- Button Wrapper -->
            <div class="form-buttons">
                <button type="submit">Send Message</button>
                <a href="https://wa.me/94763256609" target="_blank" class="whatsapp-button-link">
                    <button type="button" class="whatsapp-btn">Chat with us on WhatsApp</button>
                </a>
            </div>
        </form>
      </div>
    </div>

    <!-- Locations Section with Slideshow -->
    <section class="locations">
      <h2>Our Locations</h2>
      <p>Select Your Nearest Branch To Get Our Services</p>
      <div class="slider-container">
        <div class="location-cards slider">
          <?php
          // Fetch all locations from the database
          $fetchLocationsQuery = "SELECT * FROM locations";
          $result = mysqli_query($conn, $fetchLocationsQuery);

          // Check if there are any locations to display
          if (mysqli_num_rows($result) > 0) {
              while ($location = mysqli_fetch_assoc($result)) {
                  ?>
                  <div class="location-card">
                      <div class="location-info">
                          <h3><?php echo strtoupper($location['branch']); ?></h3>
                          <p><?php echo nl2br($location['address']); ?></p> <!-- nl2br to preserve line breaks -->
                          <p><i class="ri-phone-fill"></i> <?php echo $location['phone']; ?></p>
                      </div>
                  </div>
                  <?php
              }
          } else {
              echo "<p>No locations found.</p>";
          }
          ?>
        </div>
        <button class="prev-slide">&#10094;</button>
        <button class="next-slide">&#10095;</button>
      </div>
    </section>

    <!-- Footer section -->
    <footer class="footer-distributed">
      <div class="footer-left">
        <h2>A.A SAMARASINGHE</h2>
        <h3>OPTOMETRISTS</h3>

        <p class="footer-links">
          <a href="home.php">Home</a> |
          <a href="home.php">About</a> |
          <a href="offer.php">Offers</a> |
          <a href="offer.php">Shop</a> |
          <a href="offer.php">Services</a> |
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
          <p>contact@thecafegallery.com</p>
        </div>
      </div>

      <div class="footer-right">
        <p class="footer-company-about">
          <span>A taste you’ll remember</span>
          <strong>SAMARASINGHE OPTOMETRISTS: Offering expert eye care solutions with a wide range of quality eyewear and personalized services to enhance your vision and style.</strong>
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

    <script src="contact.js"></script>
  </body>
</html>
