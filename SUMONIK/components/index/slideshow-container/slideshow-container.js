'use strict'

let slides = document.querySelectorAll('.slideshow-container__element');
let sliderBox = document.querySelector('.slideshow-container');
let currentSlide = 0;

if (slides && sliderBox) {
  document.querySelector(".slideshow-container__next-slide").addEventListener('click', nextSlide);
  document.querySelector(".slideshow-container__prev-slide").addEventListener('click', prevSlide);

  let avtoSlider = setInterval( () => {nextSlide()}, 5000);

  sliderBox.addEventListener("mouseover", () => {
    clearInterval(avtoSlider);
  })

  sliderBox.addEventListener("focus", () => {
    clearInterval(avtoSlider);
  })

  sliderBox.addEventListener("mouseout", () => {
    avtoSlider = setInterval( () => {nextSlide()}, 3000);
  })
}

function nextSlide() {
  goToSlide(currentSlide+1);
}

function prevSlide() {
  goToSlide(currentSlide-1);
}

function goToSlide(n) {
  slides[currentSlide].classList.remove("slideshow-container__element--active");
  currentSlide = (n+slides.length)%slides.length;
  slides[currentSlide].classList.add("slideshow-container__element--active");
  setTimeout(() => {

  })
}


