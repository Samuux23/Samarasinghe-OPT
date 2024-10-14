const slider = document.querySelector(".slider");
const slides = document.querySelectorAll(".location-card");
const prevButton = document.querySelector(".prev-slide");
const nextButton = document.querySelector(".next-slide");

let currentSlide = 0;
const totalSlides = slides.length;
const visibleSlides = 3; // Number of slides visible at a time

function showSlide(index) {
  if (index >= totalSlides / visibleSlides) {
    currentSlide = 0;
  } else if (index < 0) {
    currentSlide = totalSlides / visibleSlides - 1;
  } else {
    currentSlide = index;
  }
  slider.style.transform = `translateX(-${currentSlide * 100}%)`;
}

nextButton.addEventListener("click", () => {
  showSlide(currentSlide + 1);
});

prevButton.addEventListener("click", () => {
  showSlide(currentSlide - 1);
});

// Optional: Auto-slide functionality
setInterval(() => {
  showSlide(currentSlide + 1);
}, 5000);
