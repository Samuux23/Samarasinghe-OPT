<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About us</title>

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

    <link rel="stylesheet" href="aboutUs.css" />

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

    <section class="hero2">
      <div class="hero-section">
        <div class="content" id="About">
          <h3 style="color: #8f242d ">
          Humble Beginnings

          </h3>
          <div class="line"></div>

          <p>
          A. A. Samarasinghe Optometrists founder, late Mr. A. A. Samarasinghe started his career in 1943 as a trainee optometrist under 
          D. L.F. Prediris of William Perdiris & Company in Pettah. Consequently in 1968, he opened his own store in Kandy. Following great 
          success in Kandy, Mr. A. A. Samarasinghe created the name as a well-respected and reputed gentlemen with hard work, focusing 
          primarily on delivering the best customer service.After his era, his sons continued in his aspiring work and have dedicated themselves 
          to keep up his moral practices by helping communities and customers to have a better vision while reaching the pinnacle of success.. Presently there are 15 well established outlets in Sri Lanka.
          </p>
          <div class="signature">
            <img src="img/logosign.png" alt="" />
          </div>
        </div>
      </div>
    </section>

 <section class="vision-mission-values">
    <div class="diagram-container">
        <div class="block mission">
            <div class="icon-container">
                <i class="ri-flag-line"></i>
            </div>
            <h3>Mission</h3>
            <p>Our mission is to provide the best eye care services and eyewear solutions with a focus on customer satisfaction and quality.</p>
        </div>
        <div class="block vision">
            <div class="icon-container">
                <i class="ri-eye-line"></i>
            </div>
            <h3>Vision</h3>
            <p>Our vision is to be a global leader in optometry, known for our unwavering commitment to excellence, innovation, and customer care.</p>
        </div>
        <div class="block values">
            <div class="icon-container">
                <i class="ri-heart-line"></i>
            </div>
            <h3>Values</h3>
            <p>Integrity, innovation, and customer focus are at the core of our values. We are dedicated to maintaining the trust of our clients.</p>
        </div>
    </div>
  </section>



 <!-- Company History Section -->
 <section class="company-history">
  <div class="history-container">
    <h3 class="history-title">Our Company History</h3>
    <div class="line"></div>

    <div class="history-timeline">
      <div class="history-item">
        <div class="history-year">1943</div>
        <div class="history-description">
          Founder, A. A. Samarasinghe, begins his career as a trainee optometrist under D. L.F. Prediris of William Perdiris & Company in Pettah.
        </div>
      </div>
      <div class="history-item">
        <div class="history-year">1968</div>
        <div class="history-description">
          Opened the first store in Kandy, establishing the Samarasinghe brand's reputation for excellence in eye care and customer service.
        </div>
      </div>
      <div class="history-item">
        <div class="history-year">2000</div>
        <div class="history-description">
          Expanded to 5 outlets across Sri Lanka, bringing quality eye care to more communities.
        </div>
      </div>
      <div class="history-item">
        <div class="history-year">2023</div>
        <div class="history-description">
          Introduced advanced eye care technology, continuing the tradition of innovation and customer care.
        </div>
      </div>
    </div>
    </div>
  </section>



 <!--  Company Team Section -->
 <!-- <section class="company-team">
  <div class="team-container">
    <h3 class="team-title">Meet the Team</h3>
    <div class="team-grid">
      <div class="team-member-circle">
        <img src="img/1.jpg" alt="Ms. A.B. Samarasinghe" class="team-photo-circle">
        <h4>Ms. A.B. Samarasinghe</h4>
        <p class="team-role">Lead Optometrist</p>
        <p class="team-bio">With over 30 years of experience, Dr. Samarasinghe is dedicated to providing the highest quality eye care to our community.</p>
      </div>
      <div class="team-member-circle">
        <img src="img/3.jpg" alt="Ms. C.D. Fernando" class="team-photo-circle">
        <h4>Ms. C.D. Fernando</h4>
        <p class="team-role">Optical Assistant</p>
        <p class="team-bio">Specializes in customer care and eyewear fitting, ensuring that each patient finds the perfect solution for their needs.</p>
      </div>
    </div>
  </div>
 </section> -->



 <!-- Testimonials/Customer Reviews Section -->

  <section class="testimonials">
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


 <!-- Why Choose Us Section -->
  <section class="why-choose-us">
  <div class="why-container">
    <div class="why-text">
      <h2>WHY <span>CHOOSE US?</span></h2>
      <ul>
        <li>We believe in long-term client relationships.</li>
        <li>We boost your digital presence.</li>
        <li>We provide consultation and have a team of experts.</li>
        <li>We believe in understanding the client.</li>
        <li>We deliver work on time and give our 100%.</li>
      </ul>
    </div>
    <div class="why-image">
      <img src="img/choose.png" alt="Why Choose Us">
    </div>
  </div>
  </section>


  <section class="technology-innovation">
        <div class="container">
            <h2 class="section-title">Technology & Innovation</h2>
            <div class="line"></div>

            <p class="section-subtitle">At Samarasinghe Optometrists, <br> we utilize the latest technological advancements to provide the best possible eye care.</p>
            <div class="tech-grid">
                <div class="tech-card">
                    <a href="eyeExams.php">
                    <img src="img/tech1.png" alt="OCT Device">
                    </a>
                    <h3>OCT (Optical Coherence Tomography)</h3>
                    <p>High-resolution images of the retina  <br> for early detection of conditions like macular degeneration.</p>
                    
                </div>
                <div class="tech-card">
                    <img src="img/tech2.png" alt="Corneal Topography">
                    <h3>Corneal Topography</h3>
                    <p>Detailed mapping of the cornea’s surface<br> for accurate contact lens fitting and diagnosing corneal disorders.</p>
                    
                </div>
                <div class="tech-card">
                    <img src="img/tech3.png" alt="Digital Eye Strain Solutions">
                    <h3>Digital Eye Strain Solutions</h3>
                    <p>Specialized lenses designed to reduce<br> blue light exposure and alleviate discomfort.</p>   
             
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

    <script src="testimonial.js"></script>
</body>
</html>