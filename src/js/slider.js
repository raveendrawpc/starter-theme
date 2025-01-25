// src/js/slider.js

const slider = () => {
  const slides = document.querySelectorAll(".slide");
  let currentSlide = 0;

  const showSlide = (index) => {
    slides.forEach((slide, i) => {
      slide.style.display = i === index ? "block" : "none";
    });
  };

  const nextSlide = () => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  };

  setInterval(nextSlide, 3000); // Auto-advance every 3 seconds
};

export default slider;
