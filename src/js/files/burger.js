export default function burger() {
  const burgerBtn = document.querySelector("#burger-btn");
  const burger = document.querySelector("#burger");

  if (burger) {
    burgerBtn.addEventListener("click", (e) => {
      e.stopPropagation();

      if (burger.classList.contains("_open")) {
        burgerClose();
      } else {
        burgerBtn.classList.add("_active");
        burger.classList.add("_open");

        document.body.classList.add("body-hidden");
        burger.addEventListener("click", (e) => e.stopPropagation());

        document.body.addEventListener("click", burgerClose);
      }
    });
  }
}
export function burgerClose() {
  const burger = document.querySelector("#burger");
  const burgerBtn = document.querySelector("#burger-btn");

  burgerBtn.classList.remove("_active");
  burger.classList.remove("_open");

  document.body.classList.remove("body-hidden");

  document.body.removeEventListener("click", burgerClose);
}