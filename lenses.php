<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Lenses</title>
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="lenses.css" />

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

    <!-- <style>
      @keyframes appear{
        from {
          opacity: 0;
          scale: 0.5;
        }
        to {
          opacity: 1;
          scale: 1;

        }
      }
      .block {
        animation: appear linear;
        animation-timeline: view();
        animation-range: entry 20%;


      }

    </style> -->

    <script src="https://unpkg.com/scrollreveal"></script>

    <style>
      @keyframes appear{
        from {
          opacity: 0;
          scale: 0.5;
        }
        to {
          opacity: 1;
          scale: 1;

        }
      }
      .block {
        animation: appear linear;
        animation-timeline: view();
        animation-range: entry 20%;


      }

    </style>

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
          <!-- <li><a href="offer.php">Offers</a></li> -->
          <li>
            <a href="menuUI.php">Shop</a>
          </li>
          <li><a href="services.php">Services</a></li>
        </ul>
      </nav>
      <p>
        <a href="contact.php" class="cta"><button>Contact</button></a>
        <a href="loginUI.php" class="logout-icon"
          ><i class="ri-user-add-line"></i
        ></a>
      </p>
    </header>

    <!-- Hero section with title -->
    <section class="hero">
      <div class="hero-container"></div>
      <!-- <div class="title"><h1>Contact Us</h1></div> -->
    </section>

 <!-- Lenses Section -->
<section class="lenses-section">
  <div class="container">
    <h1>Our Range of Lenses</h1>
    <div class="line"></div>
    <p>Discover the perfect lenses to suit your needs, <br> from stylish sunglasses to advanced blue light filtering lenses designed for screen time comfort.</p>

    <div class="lenses-grid">
      <div class="lens-card">
        <img src="img/sunglass.png" alt="Sunglasses" />
        <h3>Sunglasses</h3>
        <p>Protect your eyes from harmful UV rays while staying stylish with our collection of designer and everyday sunglasses.</p>
        <a href="#">Learn More</a>
      </div>

      <div class="lens-card">
        <img src="img/reading.jpeg" alt="Reading Glasses" />
        <h3>Reading Glasses</h3>
        <p>Find the perfect pair of reading glasses with enhanced clarity and comfort for your daily reading needs.</p>
        <a href="#">Learn More</a>
      </div>

      <div class="lens-card">
        <img src="img/blue light.png" alt="Blue Light Glasses" />
        <h3>Blue Light Filtering Glasses</h3>
        <p>Designed to reduce eye strain, our blue light filtering lenses are perfect for extended screen time and digital device use.</p>
        <a href="#">Learn More</a>
      </div>

      <div class="lens-card">
        <img src="img/baifocal.png" alt="Bifocal Glasses" />
        <h3>Bifocal Glasses</h3>
        <p>Enjoy the convenience of two prescriptions in one pair of glasses, ideal for those with both near and far vision needs.</p>
        <a href="#">Learn More</a>
      </div>
    </div>
  </div>
</section>

<!-- Lens Care Tips Section -->
<section class="lens-care-tips modern-look block">
  <div class="container">
    <h2>Lens Care Tips</h2>
    <div class="line"></div>
    <p>Ensure the longevity of your lenses by following these simple care tips.</p>

    <div class="tips-grid">
      <div class="tip-card">
        <i class="ri-eye-line"></i>
        <h3>Clean Regularly</h3>
        <p>Always clean your lenses with a microfiber cloth to avoid scratches and smudges.</p>
      </div>

      <div class="tip-card">
        <i class="ri-temp-hot-line"></i>
        <h3>Avoid Extreme Heat</h3>
        <p>Avoid exposing your lenses to extreme temperatures to prevent damage to the lens coating.</p>
      </div>

      <div class="tip-card">
      <i class='bx bxs-spray-can'></i>
              <h3>Use Proper Cleaners</h3>
        <p>Use a proper lens cleaning solution to avoid scratches and maintain clarity.</p>
      </div>
    </div>
  </div>
</section>


    <!-- this is the review section from customers -->
    <section class="testimonials block">
      <h1>What Our Customers Says</h1>
      <div class="line"></div>
      <div class="testimonial-container">
        <div class="testimonial-slide">
          <div class="testimonial">
            <div class="testimonial-content">
              <img src="img/1.jpg" alt="Avinash Kr" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Perferendis dolores ratione exercitationem laborum, aliquid
                aspernatur, sint, officia deleniti quam voluptate iste itaque
                blanditiis! Voluptates sint eveniet repudiandae qui aut quis.
              </p>
              <h3>Avinash Kr</h3>
            </div>
          </div>
          <div class="testimonial">
            <div class="testimonial-content">
              <img src="img/2.jpg" alt="Bharat Kunal" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Perferendis dolores ratione exercitationem laborum, aliquid
                aspernatur, sint, officia deleniti quam voluptate iste itaque
                blanditiis! Voluptates sint eveniet repudiandae qui aut quis.
              </p>
              <h3>Bharat Kunal</h3>
            </div>
          </div>
          <div class="testimonial">
            <div class="testimonial-content">
              <img src="img/3.jpg" alt="Prabhakar D" />
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Perferendis dolores ratione exercitationem laborum, aliquid
                aspernatur, sint, officia deleniti quam voluptate iste itaque
                blanditiis! Voluptates sint eveniet repudiandae qui aut quis.
              </p>
              <h3>Prabhakar D</h3>
            </div>
          </div>
        </div>
      </div>
    </section>


  <!-- footer section -->
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
