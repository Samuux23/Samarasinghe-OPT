// smooth scrolling effect in home page
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    const targetElement = document.querySelector(this.getAttribute("href"));
    if (targetElement) {
      window.scroll({
        top: targetElement.offsetTop,
        behavior: "smooth",
      });
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const homeLink = document.querySelector('a[href="#top"]');

  homeLink.addEventListener("click", function (event) {
    event.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});

// testimonial slide changing effect
document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".testimonial");
  let currentIndex = 0;

  function showNextTestimonial() {
    slides[currentIndex].classList.remove("active");
    currentIndex = (currentIndex + 1) % slides.length;
    slides[currentIndex].classList.add("active");
    document.querySelector(
      ".testimonial-slide"
    ).style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  setInterval(showNextTestimonial, 6000);

  // Initialize the first slide
  slides[currentIndex].classList.add("active");
});

// hero section image slideshow
let slideIndex = 0;
function showSlides() {
  let slides = document.getElementsByClassName("mySlides");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 6000); // Change image every 6 seconds
}

showSlides();

//service section animation

document.addEventListener("DOMContentLoaded", function () {
  const services = document.querySelectorAll(".service");

  function onScroll() {
    services.forEach((service) => {
      const servicePosition = service.getBoundingClientRect().top;
      const screenPosition = window.innerHeight / 1.3;

      if (servicePosition < screenPosition) {
        service.classList.add("visible");
      }
    });
  }

  window.addEventListener("scroll", onScroll);

  // Trigger scroll event on load to handle cases where elements are already in view
  onScroll();
});
