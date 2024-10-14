<?php
// Start a session
session_start();

// Include the database connection file
include("connect.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $town = $_POST['town'];
    $contact = $_POST['contact'];
    $date = $_POST['appointment-date'];
    $time = $_POST['appointment-time'];

    // Prepare an SQL query to check if the same date and time exist in the "Appointment" table
    $check_sql = "SELECT * FROM Appointment WHERE Date = ? AND Time = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ss", $date, $time);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the result has any rows (i.e., appointment already exists for this date and time)
    if ($result->num_rows > 0) {
        // Show an error message if appointment already exists
        echo "<script>alert('The selected date and time is already booked. Please try another date and time.');</script>";
    } else {
        // If no conflict, insert the new appointment into the database
        $sql = "INSERT INTO Appointment (Name, Email, NearTown, Contact, Date, Time, Status) 
                VALUES (?, ?, ?, ?, ?, ?, 'Pending..')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $email, $town, $contact, $date, $time);

        // Execute the query
        if ($stmt->execute()) {
            // Success message and redirection
            echo "<script>alert('Appointment booked successfully! We will be in touch.');</script>";
            echo "<script>window.location.href = 'eyeExams.php';</script>";
        } else {
            // Display an error message if the query fails
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eye Exams</title>
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="eyeExams.css" />

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

    <script src="https://unpkg.com/scrollreveal"></script>
  </head>
  <body>
    <!-- Header section -->
    <header id="top">
    <a href="home.php">
        <img src="img/samarasinghe logo.png" alt="" class="logo" />
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

    <!-- Reveal Elements on scroll -->
    <section class="sec1">
    <div class="container">
        <h1 class="main-title">Our Eye Exams</h1>
        <div class="line"></div>

        <div class="content">
            <div class="image">
                <img src="img/OPTICAL COHERENCE TOMOGRAPHY.png" alt="">
            </div>
            <div class="text-box">
                <h3>Optical Coherence Tomography</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quas, quisquam iste deserunt vel repudiandae fugit quia neque cupiditate dignissimos voluptate ipsa eveniet consequuntur mollitia error magni explicabo repellendus et.</p>
            </div>
        </div>

        <div class="content reverse">
            <div class="text-box">
                <h3>Humphrey Field Analyzer (HFA)/Visual Fields</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quas, quisquam iste deserunt vel repudiandae fugit quia neque cupiditate dignissimos voluptate ipsa eveniet consequuntur mollitia error magni explicabo repellendus et.</p>
            </div>
            <div class="image">
                <img src="img/HUMPHREY.png" alt="">
            </div>
        </div>

        <div class="content">
            <div class="image">
                <img src="img/tonometer.png" alt="">
            </div>
            <div class="text-box">
                <h3>Tonometry</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quas, quisquam iste deserunt vel repudiandae fugit quia neque cupiditate dignissimos voluptate ipsa eveniet consequuntur mollitia error magni explicabo repellendus et.</p>
            </div>
        </div>

        <div class="content reverse">
            <div class="text-box">
                <h3>Fundus Photography</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quas, quisquam iste deserunt vel repudiandae fugit quia neque cupiditate dignissimos voluptate ipsa eveniet consequuntur mollitia error magni explicabo repellendus et.</p>
            </div>
            <div class="image">
                <img src="img/fundus.png" alt="">
            </div>
        </div>

        <div class="content">
            <div class="image">
                <img src="img/Topography.png" alt="">
            </div>
            <div class="text-box">
                <h3>Topography</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quas, quisquam iste deserunt vel repudiandae fugit quia neque cupiditate dignissimos voluptate ipsa eveniet consequuntur mollitia error magni explicabo repellendus et.</p>
            </div>
        </div>

        <div class="content reverse">
            <div class="text-box">
                <h3>GDX Nerve Fiber Analyser</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi quas, quisquam iste deserunt vel repudiandae fugit quia neque cupiditate dignissimos voluptate ipsa eveniet consequuntur mollitia error magni explicabo repellendus et.</p>
            </div>
            <div class="image">
                <img src="img/GDX.png" alt="">
            </div>
        </div>

    </div>
</section>

<!-- Appointment Form Section -->
<section class="appoint-form">
<div class="contact-container">
    <h2>Book an Appointment</h2>
    <form action="" method="post">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="town">Nearest Town</label>
        <input type="text" id="town" name="town" required>

        <label for="contact">Contact Number</label>
        <input type="tel" id="contact" name="contact" required>

        <label for="appointment-date">Appointment Date</label>
        <input type="date" id="appointment-date" name="appointment-date" required>

        <label for="appointment-time">Appointment Time</label>
        <select id="appointment-time" name="appointment-time" required>
            <option value="" disabled selected>Select Time</option>
            <option value="9:00am-11:00am">9:00 AM - 11:00 AM</option>
            <option value="4:00pm-6:00pm">4:00 PM - 6:00 PM</option>
        </select>

        <button type="submit">Book</button>
    </form>
</div>
</section>

<!-- Review Section -->
<section class="testimonials block">
  <h1>What Our Customers Says</h1>
  <div class="line"></div>
  <div class="testimonial-container">
    <div class="testimonial-slide">
      <div class="testimonial">
        <div class="testimonial-content">
          <img src="img/1.jpg" alt="Avinash Kr" />
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis dolores ratione exercitationem laborum, aliquid aspernatur, sint, officia deleniti quam voluptate iste itaque blanditiis! Voluptates sint eveniet repudiandae qui aut quis.</p>
          <h3>Avinash Kr</h3>
        </div>
      </div>
      <div class="testimonial">
        <div class="testimonial-content">
          <img src="img/2.jpg" alt="Bharat Kunal" />
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis dolores ratione exercitationem laborum, aliquid aspernatur, sint, officia deleniti quam voluptate iste itaque blanditiis! Voluptates sint eveniet repudiandae qui aut quis.</p>
          <h3>Bharat Kunal</h3>
        </div>
      </div>
      <div class="testimonial">
        <div class="testimonial-content">
          <img src="img/3.jpg" alt="Prabhakar D" />
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis dolores ratione exercitationem laborum, aliquid aspernatur, sint, officia deleniti quam voluptate iste itaque blanditiis! Voluptates sint eveniet repudiandae qui aut quis.</p>
          <h3>Prabhakar D</h3>
        </div>
      </div>
    </div>
  </div>
</section>

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
      <strong>SAMARASINGHE OPTIMETRIES: Offering expert eye care solutions with a wide range of quality eyewear and personalized services to enhance your vision and style.
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

<script src="eyeExams.js"></script>

<script>
    ScrollReveal({ 
        reset: true,
        distance:'60px',
        duration:2500,
        delay: 400
    });
    ScrollReveal().reveal('.sec1 .image', { delay: 300, origin:'bottom' });
    ScrollReveal().reveal('.text-box', { delay: 400, origin:'right' });
</script>

</body>
</html>
