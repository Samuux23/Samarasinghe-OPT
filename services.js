document.querySelectorAll(".service-card").forEach((card) => {
  card.addEventListener("mouseenter", () => {
    card.style.transform = "scale(1.05)";
  });
  card.addEventListener("mouseleave", () => {
    card.style.transform = "scale(1)";
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
