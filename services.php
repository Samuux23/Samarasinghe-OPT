<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Services</title>
    <!-- Custom CSS link -->
    <link rel="stylesheet" href="services.css" />

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
          <li><a href="#">Services</a></li>
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

    <section class="services-section">
        <div class="container">
            <h2 class="section-title">What Service We Offer</h2>
            <div class="line"></div>

            <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            <div class="services-grid">
                <div class="service-card">
                    <a href="eyeExams.php">
                    <img src="img/eye care.png" alt="Eye Care">
                    </a>
                    <h3>Eye Exams</h3>
                    <p>Comprehensive eye exams to assess your vision <br> and detect any eye conditions early.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="service-card">
                    <a href="contact_lenses.php">
                    <img src="img/Prescription Contacts.jpeg" alt="Retina Repair">
                    </a>
                    <h3>Contact Lenses</h3>
                    <p>Fitting and prescribing the perfect contact <br> lenses tailored to your needs.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="service-card">
                    <a href="lenses.php">
                    <img src="img//lenses.jpeg" alt="Vision Check">
                    </a>
                    <h3>Lenses</h3>
                    <p>A variety of lenses options to correct vision, including single,<br> and progressive lenses.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="service-card">
                <a href="eyeglass_frames.php">
                    <img src="img/frames.jpeg" alt="Cornea Transplant">
                    <h3>Eyegalss Frames</h3>
                    <p>Explore our wide selection of stylish <br>and durable eyeglass frames.</p>
                    <a href="" class="read-more">Read More</a>
                </div>
                <div class="service-card">
                    <a href="Repairing.php">
                    <img src="img/repair.jpeg" alt="Laser Surgery">
                    </a>
                    <h3>Repairing</h3>
                    <p>Professional eyeglass repair services to restore <br>your glasses to perfect condition.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="service-card">
                    <a href="accessories.php">
                    <img src="img/accessories.png" alt="Dry Eye Surgery">
                    </a>
                    <h3>Eyegalss Accessories</h3>
                    <p>A range of accessories including cases, cleaning solutions,<br> and straps to complement your glasses.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="equipment-section block">
    <div class="container">
        <div class="equipment-content">
            <div class="equipment-text">
                <h3>Best Of The Best</h3>
                <h2>High End Equipments</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <div class="progress-bars">
                    <div class="progress-bar">
                        <span>Ophthalmoscopes</span>
                        <div class="progress">
                            <div class="progress-value" style="width: 86%;"></div>
                        </div>
                        <span class="percentage">86%</span>
                    </div>
                    <div class="progress-bar">
                        <span>Statim Sterilizers</span>
                        <div class="progress">
                            <div class="progress-value" style="width: 90%;"></div>
                        </div>
                        <span class="percentage">90%</span>
                    </div>
                    <div class="progress-bar">
                        <span>Surgical Microscopes</span>
                        <div class="progress">
                            <div class="progress-value" style="width: 87%;"></div>
                        </div>
                        <span class="percentage">87%</span>
                    </div>
                    <div class="progress-bar">
                        <span>Eye Operatory Lights</span>
                        <div class="progress">
                            <div class="progress-value" style="width: 90%;"></div>
                        </div>
                        <span class="percentage">90%</span>
                    </div>
                </div>

                <!-- <a href="#" class="learn-more-btn">Learn More</a> -->
            </div>
            <div class="equipment-image">
                <img src="img/high end.jpg" alt="High End Equipments">
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

    <script src="services.js"></script>

  </body>
</html>
