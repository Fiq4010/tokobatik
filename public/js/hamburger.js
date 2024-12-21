const hamburger = document.getElementsByClassName("hamburger");
const overlay = document.getElementsByClassName("overlay");
const menu = document.getElementsByClassName("menu");
const header = document.querySelector("header");

hamburger[0].addEventListener("click", () => {
  overlay[0].classList.toggle("active");
  menu[0].classList.toggle("active");
  hamburger[0].classList.toggle("active");
  menu[0].classList.add("container");
});
