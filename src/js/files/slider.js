import Swiper from "swiper";
import { Autoplay, Navigation } from "swiper/modules";
import "swiper/css";

export default function slider() {
  const introSlider = document.querySelector(".intro__slider");

  if (introSlider) {
    const swiper = new Swiper(introSlider, {
      speed: 1000,
      modules: [Autoplay],
      grabCursor: true,
      autoplay: {
        delay: 5000,
      },

    })
  }
}