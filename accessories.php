<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eyeglass Accessories | Samarasinghe OPT</title>

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

    <link rel="stylesheet" href="accessories.css" />
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


 <section class="hero">
      <div class="hero-container"></div>
  
    </section>

   

<section class="eyeglass-accessories">
  <div class="container">

    <h2 class="page-title">Eyeglass Accessories</h2>
    <div class="line"></div>

    <p class="intro-description">
      Elevate your eyewear experience with our curated selection of accessories. From protective cases to anti-fog sprays, our products are designed to preserve and enhance your eyeglasses.
    </p>


    <div class="accessory-grid">



       <div class="card">
        <div class="card-image">
          <img src="img/eyeglassCases.jpg" alt="Eyeglass Cases">
        </div>
        <div class="card-content">
          <h3>Eyeglass Cases</h3>
          <p>Stylish, durable cases made from leather and plastic to protect your eyewear.</p>
          <ul class="features-list">
            <li><i class="ri-check-double-line"></i> Durable materials</li>
            <li><i class="ri-check-double-line"></i> Fits a variety of frames</li>
            <li><i class="ri-check-double-line"></i> Scratch protection</li>
          </ul>
        </div>
      </div>


      <div class="card">
        <div class="card-image">
          <img src="img/cleaningKits.jpg" alt="Cleaning Kits">
        </div>
        <div class="card-content">
          <h3>Cleaning Kits</h3>
          <p>Keep your lenses clear and scratch-free with our high-quality cleaning kits.</p>
          <ul class="features-list">
            <li><i class="ri-check-double-line"></i> Microfiber cloths</li>
            <li><i class="ri-check-double-line"></i> Lens cleaning solution</li>
            <li><i class="ri-check-double-line"></i> Convenient carrying cases</li>
          </ul>
        </div>
      </div>

     

      <div class="card">
        <div class="card-image">
          <img src="img/straps.jpg" alt="Straps">
        </div>
        <div class="card-content">
          <h3>Straps</h3>
          <p>Secure your glasses with adjustable, stylish straps for daily activities.</p>
          <ul class="features-list">
            <li><i class="ri-check-double-line"></i> Adjustable elastic bands</li>
            <li><i class="ri-check-double-line"></i> Durable and comfortable</li>
            <li><i class="ri-check-double-line"></i> Various color options</li>
          </ul>
        </div>
      </div>

    
      <div class="card">
        <div class="card-image">
          <img src="img/spray.jpg" alt="Anti-Fog Spray">
        </div>
        <div class="card-content">
          <h3>Anti-Fog Spray</h3>
          <p>Keep your lenses fog-free in humid conditions with our easy-to-apply spray.</p>
          <ul class="features-list">
            <li><i class="ri-check-double-line"></i> Long-lasting effect</li>
            <li><i class="ri-check-double-line"></i> Easy to apply</li>
            <li><i class="ri-check-double-line"></i> Indoor and outdoor use</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>




<section class="detailed-description">
  <div class="container">
    <div class="description-grid">
      <div class="description-left">
        <h2>Enhance and Protect Your Eyewear</h2>
        <p>Our eyeglass accessories are designed with a perfect balance of durability and style to keep your eyewear in pristine condition. Whether you need protective cases, cleaning kits, or adjustable straps, we offer products tailored for daily use and long-lasting performance.</p>
        <p>Explore the benefits of our carefully curated selection of eyewear accessories:</p>
        
      </div>

      <div class="description-image">
        <img src="img/description.png" alt="Eyeglass Accessories Image" />
      </div>

      <div class="description-right">
        <div class="step">
          <h3>Choose Your Accessory</h3>
          <p>Explore our wide range of eyeglass accessories, including cleaning kits, protective cases, anti-fog sprays, and more. Choose the ones that fit your needs and preferences.</p>
        </div>

        <div class="step">
          <h3> High-Quality Materials</h3>
          <p>Each product is crafted from premium materials like high-grade leather, plastic, and metal finishes to provide you with a combination of durability and sophistication.</p>
        </div>
 
        <div class="step">
          <h3> Convenience and Compatibility</h3>
          <p>Our accessories are compatible with a wide range of eyewear styles and brands, ensuring seamless integration and ease of use for your glasses.</p>
        </div>
      </div>
    </div>
  </div>
</section>




<section class="features-benefits">
  <h2>Features & Benefits</h2>
  <div class="features-grid">
    <div class="feature">
      <i class="bx bx-shield"></i>
      <h3>Protection</h3>
      <p>Our accessories are designed to protect your eyewear from damage, ensuring they last longer. Durable materials keep your glasses safe from scratches and impacts.</p>
    </div>
    <div class="feature">
      <i class="bx bx-cog"></i>
      <h3>Convenience</h3>
      <p>Accessories like straps, anti-fog sprays, and cleaning kits provide daily convenience, making sure your glasses stay clean and fit perfectly.</p>
    </div>
    <div class="feature">
      <i class="bx bx-palette"></i>
      <h3>Customization</h3>
      <p>Choose from a variety of case designs, strap colors, and more to personalize your eyewear and create a unique look that matches your style.</p>
    </div>
    <div class="feature">
      <i class="bx bx-leaf"></i>
      <h3>Sustainability</h3>
      <p>We use eco-friendly materials to produce accessories that are good for your glasses and the planet, helping reduce environmental impact.</p>
    </div>
  </div>
</section>

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



<footer class="footer-distributed">
      <div class="footer-left">
         <h2>A.A SAMARASINGHE</h2>
         <h3>OPTOMETRISTS</h3>


        <p class="footer-links">
          <a href="home.php">Home</a>
          |
          <a href="home.php">About</a>
          |
          <a href="offer.php">Offers</a>
          |
          <a href="offer.php">Shop</a>
          |
          <a href="offer.php">Services</a>
          |
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

  </body>
</html>
