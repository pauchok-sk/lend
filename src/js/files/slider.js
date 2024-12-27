import Swiper from "swiper";
import { Autoplay, Navigation } from "swiper/modules";
import "swiper/css";

export default function slider() {
  const introSlider = document.querySelector(".intro__slider");

  if (introSlider) {
    const numbersSlider = document.querySelectorAll(".intro .slider-nav span");
    const swiper = new Swiper(introSlider, {
      speed: 1000,
      modules: [Autoplay, Navigation],
      grabCursor: true,
      autoplay: {
        delay: 5000,
      },
      navigation: {
        prevEl: ".intro .slider-nav__btn._prev",
        nextEl: ".intro .slider-nav__btn._next",
      },
      on: {
        init: (slider) => {
          numbersSlider[0].textContent = 1;
          numbersSlider[1].textContent = document.querySelectorAll(
            ".intro .swiper-slide"
          ).length;
        },
        slideChange: ({ activeIndex }) => {
          numbersSlider[0].textContent = activeIndex + 1;
        },
      },
    });
  }

  const skillsSlider = document.querySelector(".skills__slider");

  if (skillsSlider) {
    const numbersSlider = document.querySelectorAll(".skills .slider-nav span");
    const swiper = new Swiper(skillsSlider, {
      speed: 1000,
      modules: [Autoplay, Navigation],
      grabCursor: true,
      spaceBetween: 15,
      autoplay: {
        delay: 5000,
      },
      navigation: {
        prevEl: ".skills .slider-nav__btn._prev",
        nextEl: ".skills .slider-nav__btn._next",
      },
      on: {
        init: (slider) => {
          numbersSlider[0].textContent = 1;
          numbersSlider[1].textContent = document.querySelectorAll(
            ".intro .swiper-slide"
          ).length;
        },
        slideChange: ({ activeIndex }) => {
          numbersSlider[0].textContent = activeIndex + 1;
        },
      },
    });
  }
}
