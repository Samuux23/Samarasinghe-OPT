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
    <link rel="stylesheet" href="contact_lenses.css" />

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
     
    </section>

    <!-- Contact Lenses Information Section -->
<section class="contact-lenses-info">
  <div class="container">
    <h1>All About Contact Lenses</h1>
    <div class="line"></div>
    <p>Explore our range of contact lenses designed to suit your lifestyle. <br> Whether you need lenses for vision correction, cosmetic purposes, or special conditions, <br> we have something for everyone.</p>
    
    <div class="contact-lenses-grid">
      <div class="lenses-card">
        <img src="img/daily.png" alt="Daily Contact Lenses" />
        <h3>Daily Contact Lenses</h3>
        <p>Convenient and comfortable lenses for single-day use. Ideal for those who prefer a fresh pair of lenses every day.</p>
        <a href="#">Learn More</a>
      </div>
      
      <div class="lenses-card">
        <img src="img/monthly_lenses.webp" alt="Monthly Contact Lenses" />
        <h3>Monthly Contact Lenses</h3>
        <p>Durable and cost-effective lenses for daily wear, lasting up to a month with proper care and cleaning.</p>
        <a href="#">Learn More</a>
      </div>
      
      <div class="lenses-card">
        <img src="img/color.webp" alt="Colored Contact Lenses" />
        <h3>Colored Contact Lenses</h3>
        <p>Enhance your eye color with our vibrant range of colored lenses, perfect for both fashion and function.</p>
        <a href="#">Learn More</a>
      </div>
    </div>
  </div>
</section>


<section class="contact-lenses-details block">
  <div class="container">
    <h2>Understanding Contact Lenses</h2>
    <div class="line"></div>
    <div class="lenses-details-content">
      <div class="lenses-info block">
        <h3>Types of Contact Lenses</h3>
        <p>Choosing the right contact lens is essential for both comfort and vision. Here are the most popular types:</p>
        <ul>
          <li><strong>Soft Contact Lenses:</strong> Known for their comfort and flexibility, ideal for active lifestyles and various vision corrections.</li>
          <li><strong>Hard Contact Lenses:</strong> Durable and offering sharper vision for complex optical needs, ideal for long-term use.</li>
          <li><strong>Toric Contact Lenses:</strong> Specifically designed for astigmatism to provide clear, stable vision.</li>
          <li><strong>Multifocal Contact Lenses:</strong> Perfect for those who need correction for both near and far vision, offering an alternative to bifocals.</li>
        </ul>
      </div>
      
      <div class="lenses-info">
        <h3>Guidelines for Contact Lens Wear</h3>
        <p>Proper care of your contact lenses is crucial for maintaining eye health. Follow these simple guidelines:</p>
        <div class="guidelines">
          <div class="do-list">
            <h4>Do’s:</h4>
            <ul>
              <li>Always clean and store lenses in fresh solution.</li>
              <li>Replace lenses as recommended by your optometrist.</li>
              <li>Wash your hands before handling lenses.</li>
              <li>Consult your eye care professional if you experience discomfort or irritation.</li>
            </ul>
          </div>
          <div class="dont-list">
            <h4>Don'ts:</h4>
            <ul>
              <li>Do not wear lenses longer than prescribed.</li>
              <li>Never share your lenses with others.</li>
              <li>Avoid swimming while wearing contact lenses.</li>
              <li>Do not sleep in your lenses unless advised by your doctor.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    <div class="lenses-details-content">
      <div class="lenses-info block">
        <h3>Specialized Lenses</h3>
        <p>Whether you need corrective lenses or cosmetic options, our range of specialized lenses includes:</p>
        <ul>
          <li><strong>Prescription Lenses:</strong> Designed to correct refractive errors such as nearsightedness or farsightedness.</li>
          <li><strong>Cosmetic Lenses:</strong> Available in a variety of colors to enhance or change your eye color for a stylish look.</li>
          <li><strong>Scleral Lenses:</strong> Large-diameter lenses for people with irregular corneas or dry eyes, providing clear vision and comfort.</li>
        </ul>
      </div>

      <div class="lenses-info block">
        <h3>Advanced Contact Lens Technologies</h3>
        <p>Our state-of-the-art technology ensures the most accurate fitting and assessment for optimal lens comfort and vision correction:</p>
        <ul>
          <li><strong>Corneal Topography:</strong> Mapping the surface of the cornea to ensure a precise lens fit.</li>
          <li><strong>Optical Coherence Tomography (OCT):</strong> A non-invasive imaging technique to assess your eye health and provide the best care for your lenses.</li>
          <li><strong>Wavefront Technology:</strong> Used for customized contact lenses that offer superior clarity and comfort.</li>
        </ul>
      </div>
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
