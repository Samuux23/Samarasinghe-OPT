<?php
session_start();
include("connect.php");

// Check if the customer is logged in
$loggedIn = false; 
if (isset($_SESSION['CustomerEmail'])) {
    $loggedIn = true; // If session exists, user is logged in
    $customerEmail = $_SESSION['CustomerEmail']; 
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Samarasinghe OPT</title>

   
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />

    
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />

   
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="style1.css" />

  </head>
  <body>
    <header id="top">
      <img src="img/samarasinghe logo.png" alt="" class="logo" />
      <nav>
        <ul class="nav_links">
          <li><a href="#top">Home</a></li>
          <li><a href="aboutUs.php">About Us</a></li>
          <li>
            <a href="menuUI.php">Shop</a>
          </li>
          <li><a href="services.php">Services</a></li>
        </ul>
      </nav>
      <p>
        <a href="contact.php" class="cta"><button>Contact</button></a>

        <?php if ($loggedIn): ?>
            
            <a href="profile.php" class="logout-icon"><i class='bx bx-user'></i></a>
           
            <a href="logout.php" class="logout-icon"><i class="bx bx-user-minus"></i></a>
        <?php else: ?>
           
            <a href="loginUI.php" class="logout-icon"><i class="ri-user-add-line"></i></a>
        <?php endif; ?>

      </p>
    </header>

    
    <section class="hero">
      <div class="slideshow-container">
      
        <div class="mySlides fade">
          <img src="img/hero1.png" style="width:100%">
        </div>
        
        <div class="mySlides fade">
          <img src="img/hero2.png" style="width:100%">
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
    </section>

    </section>
    
    <section class="hero2">
      <div class="hero-section">
        <div class="content" id="About">
          <h1 style="color:white">MILESTONE</h1>
          <p>
          We are celebrating our 50th anniversary
          </p>
          <p style="font-size: 1rem; color:white;">
          We are celebrating our 50th anniversary of providing professional eye care services since 1968. <br> Our promise is to continue pioneering eye care services for generations to come.
          Stay updated with our website for special events planed to commemorate this special year!
          </p>
          <div class="signature">
            <img src="img/logosign.png" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section class="services">
  <h2>OUR EYE CARE SERVICES</h2>
  <div class="line"></div>

  <div class="services-container">
    <div class="service">
      <img src="img/eye exams.webp" alt="Eye Exam">
      <h3>Comprehensive Eye Exams</h3>
      <p>We provide thorough eye exams to ensure your vision is at its best.</p>
      <a href="services.php">Learn More</a>
    </div>
    <div class="service">
      <img src="img/contact lens.webp" alt="Contact Lenses">
      <h3>Contact Lenses</h3>
      <p>Get the perfect contact lenses for your eyes, customized just for you.</p>
      <a href="services.php">Learn More</a>
    </div>
    <div class="service">
      <img src="img/designer glasses.webp" alt="Glasses">
      <h3>Designer Eyeglasses</h3>
      <p>Choose from a wide range of designer eyeglasses to suit your style.</p>
      <a href="services.php">Learn More</a>
    </div>
  </div>
</section>
 
<section class="intro block">
  <div class="container">
    <div class="intro-content">
      <div class="intro-left">
        <h1>We Preserve Enhance And Protect Your <span>Vision.</span></h1>
        <p>
          You are nothing without your set eyes care set injury magna consectetur elit, do 
          <a href="#">eiusmod tempor</a> incididunt ut labore et dolore magna aliqua.
        </p>
        <button>Discover More!</button>
      </div>
      <div class="intro-right">
        <h2>Top 5 Reasons</h2>
        <h3>Pre-Plan Your Checking</h3>
        <ul>
          <li><i class="ri-shield-check-line"></i>You’re in some of the best hands in the world.</li>
          <li><i class="ri-star-line"></i>Strive to improve our techniques and knowledge.</li>
          <li><i class="ri-hospital-line"></i>Each treatment is available under the one roof.</li>
          <li><i class="ri-heart-line"></i>We take extra time to really listen, explain & care.</li>
          <li><i class="ri-eye-line"></i>Love helping to improve the way you see the world.</li>
        </ul>
      </div>
    </div>
    <div class="stats">
      <div>
        <i class="ri-file-list-3-line"></i>
        <h3>350+</h3>
        <p>Projects Completed</p>
      </div>
      <div>
        <i class="ri-user-line"></i>
        <h3>120+</h3>
        <p>Work Employed</p>
      </div>
      <div>
        <i class="ri-calendar-line"></i>
        <h3>50+</h3>
        <p>Years Experience</p>
      </div>
    </div>
  </div>
</section>

  <!-- <section class="card">
      <div id="card-area">
        <div class="wrapper">
          <div class="box-area">
            <div class="box">
              <img src="img/sunglasses.png" alt="" />
              <div class="overlay">
                <h3>Sunglasses</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Fugiat voluptas quod sed quis pariatur placeat!
                </p>
                <a href="menuUI.php">View Menu</a>
              </div>
            </div>
            <div class="box">
              <img src="img/sri lanka2.jpg" alt="" />
              <div class="overlay">
                <h3>Sri Lankan</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Fugiat voluptas quod sed quis pariatur placeat!
                </p>
                <a href="menuUI.php">View Menu</a>
              </div>
            </div>
            <div class="box">
              <img src="img/italianfood.jpg" alt="" />
              <div class="overlay">
                <h3>Italian</h3>
                <p>
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Fugiat voluptas quod sed quis pariatur placeat!
                </p>
                <a href="menuUI.php">View Menu</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    
    <!-- this is the review section from customers -->
    <section class="testimonials block">
      <h1>WHAT OUR CUSTOMERS SAYS</h1>
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

    <section class="contact block">
   <h2>GET IN TOUCH</h2>
   <div class="line"></div>
   <form action="contact_form.php" method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <input type="location" name="location" placeholder="Your Town" required>
      <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      <button type="submit">Send Message</button>
   </form>
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

    <script src="home.js"></script>
    
  </body>
</html>
