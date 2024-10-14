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
    <link rel="stylesheet" href="repairing.css" />

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
    <section class="hero2">
      <div class="hero-container"></div>
      <!-- <div class="title"><h1>Contact Us</h1></div> -->
    </section>

    <!-- Hero Section -->
<section class="hero">
  <div class="hero-left">
    <h1>Expert Eyewear Repair Services to Restore Your Vision</h1>
    
    <div class="hero-content">
      <div class="hero-image-left">
        <img src="img/repair1.jpg" alt="Eyewear Repair">
      </div>
      <div class="hero-paragraph">
        <p>
          Don't let broken frames or damaged lenses hinder your day-to-day life. Our expert technicians are here to provide high-quality repairs to ensure your eyewear is back in perfect condition. We handle all types of repairs, from minor adjustments to full replacements, ensuring your vision and comfort are restored.
        </p>
      </div>
    </div>
    
    <div class="hero-stats">
      <div class="stat">
        <span>500+</span>
        <p>Eyewear Repaired</p>
      </div>
      <div class="stat">
        <span>50+</span>
        <p>Certified Technicians</p>
      </div>
      <div class="stat">
        <span>25+</span>
        <p>Years of Experience</p>
      </div>
    </div>
  </div>
  
  <div class="hero-right">
    <div class="hero-right-images">
      <img src="img/repaire.jpg" alt="Eyewear Repair Process">
      <img src="img/repairtools.jpg" alt="Eyewear Repair Tools">
    </div>
    
    <div class="hero-reasons">
      <h3>Why Choose Our Repair Service?</h3>
      <ul>
        <li>Experienced and certified repair professionals.</li>
        <li>Use of advanced tools and original parts.</li>
        <li>Comprehensive repairs under one roof.</li>
        <li>Quick turnaround times and guaranteed satisfaction.</li>
        <li>Dedicated to restoring both function and style to your eyewear.</li>
      </ul>
    </div>
  </div>
</section>


<!-- Repair Services Section -->
<section class="repair-services">
  <h2>Types of Repairs We Offer</h2>
  <div class="line"></div>

  <div class="service-carousel">
    <button class="prev" onclick="prevSlide()">&#10094;</button>
    <div class="service-cards-wrapper">
      <div class="service-cards">
        <div class="card">
          <div class="card-image">
            <img src="img/frameAdjustments.png" alt="Frame Adjustments">
          </div>
          <div class="card-content">
            <h3>Frame Adjustments</h3>
            <p>
              Our frame adjustments ensure that your glasses fit securely and comfortably for everyday use. We take into account the contours of your face to deliver a precise fit, so you won't need to worry about your glasses slipping or causing discomfort throughout the day.
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-image">
            <img src="img/brokenHingeRepair.png" alt="Broken Hinge Repair">
          </div>
          <div class="card-content">
            <h3>Broken Hinge Repair</h3>
            <p>
              Hinges on your glasses can break due to normal wear and tear or an accidental drop. We offer professional hinge repair and replacement services that restore the functionality of your glasses, ensuring they remain as good as new.
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-image">
            <img src="img/nosePadReplacement.png" alt="Nose Pad Replacement">
          </div>
          <div class="card-content">
            <h3>Nose Pad Replacement</h3>
            <p>
              Nose pads are essential for the comfort and stability of your eyewear. We replace worn-out or damaged nose pads with high-quality ones, ensuring that your glasses sit comfortably and securely on your face.
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-image">
            <img src="img/lensReplacement.png" alt="Lens Replacement">
          </div>
          <div class="card-content">
            <h3>Lens Replacement</h3>
            <p>
              Whether your lenses are scratched, cracked, or outdated, we offer quick and professional lens replacement services to keep your vision clear and your glasses in excellent condition. We can even upgrade your lenses with new features, such as anti-glare coatings or transitions.
            </p>
          </div>
        </div>
        <!-- <div class="card">
          <div class="card-image">
            <img src="img/scratchedLensPolishing.png" alt="Scratched Lens Polishing">
          </div>
          <div class="card-content">
            <h3>Scratched Lens Polishing</h3>
            <p>
              Scratches on your lenses can impair your vision and be an eyesore. We offer polishing services that remove surface scratches, restoring the clarity of your lenses and prolonging their life, so you don't have to replace them immediately.
            </p>
          </div>
        </div> -->
        <div class="card">
          <div class="card-image">
            <img src="img/sunglassRepair.png" alt="Sunglass Repair">
          </div>
          <div class="card-content">
            <h3>Sunglass Repair</h3>
            <p>
              Whether it's scratched lenses or broken frames, our sunglass repair services bring your favorite sunglasses back to life. We restore their functionality and look so that you can enjoy wearing them again without any worries.
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-image">
            <img src="img/eyewearReshaping.png" alt="Eyewear Reshaping">
          </div>
          <div class="card-content">
            <h3>Eyewear Reshaping</h3>
            <p>
            Frames can become bent or misshapen from sitting on them, dropping, or normal wear. Reshaping services restore the original form of the glasses for comfort and aesthetics.
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-image">
            <img src="img/lensTinting.png" alt="Lens Tinting & Coating Services">
          </div>
          <div class="card-content">
            <h3>Lens Tinting & Coating Services</h3>
            <p>
            Some customers may want to tint their lenses or add coatings such as anti-reflective or blue light filters. This service is especially common for sunglasses but can also be applied to prescription glasses.
           </p>
          </div>
        </div>
        <div class="card">
          <div class="card-image">
            <img src="img/armReplacement.png" alt="Temple and Arm Replacement">
          </div>
          <div class="card-content">
            <h3>Temple and Arm Replacement</h3>
            <p>
            The temples (arms) of glasses often loosen or break due to stress at the hinges or snapping under pressure. Replacing these parts is crucial for maintaining the overall fit and comfort of the eyewear.
           </p>
          </div>
        </div>
      </div>
    </div>
    <button class="next" onclick="nextSlide()">&#10095;</button>
  </div>
</section>

<script>
  let currentIndex = 0;

  function showSlide(index) {
    const cardsWrapper = document.querySelector('.service-cards');
    const cardWidth = document.querySelector('.card').offsetWidth;
    const totalWidth = cardWidth + 30; // Including margins
    cardsWrapper.style.transform = `translateX(${-index * totalWidth}px)`;
  }

  function nextSlide() {
    const totalCards = document.querySelectorAll('.card').length;
    const visibleCards = Math.floor(document.querySelector('.service-cards-wrapper').offsetWidth / (document.querySelector('.card').offsetWidth + 30));
    
    if (currentIndex < totalCards - visibleCards) {
      currentIndex++;
    }
    showSlide(currentIndex);
  }

  function prevSlide() {
    if (currentIndex > 0) {
      currentIndex--;
    }
    showSlide(currentIndex);
  }
</script>

<!-- Repair Process Section -->
<section class="repair-process">
  <div class="container">
    <h2>Our Repair Process</h2>
    <div class="process-plan">
      <div class="step">
        <i class="bx bx-user"></i>
        <h3>Consultation</h3>
        <p>Bring in your glasses for a free evaluation.</p>
      </div>
      <div class="step-arrow">
        <i class="bx bx-right-arrow-alt"></i>
      </div>
      <div class="step">
        <i class="bx bx-search"></i>
        <h3>Assessment</h3>
        <p>We inspect the damage and suggest repair options.</p>
      </div>
      <div class="step-arrow">
        <i class="bx bx-right-arrow-alt"></i>
      </div>
      <div class="step">
        <i class="bx bx-cog"></i>
        <h3>Repair</h3>
        <p>Most repairs are completed within 24-48 hours.</p>
      </div>
      <div class="step-arrow">
        <i class="bx bx-right-arrow-alt"></i>
      </div>
      <div class="step">
        <i class="bx bx-check"></i>
        <h3>Quality Check</h3>
        <p>We ensure all repairs meet our high standards.</p>
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
