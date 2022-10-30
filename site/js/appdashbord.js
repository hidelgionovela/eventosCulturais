const hamburger_menu = document.querySelector(".hamburger-menu");
const container = document.querySelector(".container");
const menu = document.querySelector(".menu2");

hamburger_menu.addEventListener("click", () => {
  container.classList.toggle("active");
  menu.classList.toggle("active");
});
