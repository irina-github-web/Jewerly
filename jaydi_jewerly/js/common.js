window.onload = function () {
  const nav = document.querySelector(".main-navigation");
  const mobNav = document.querySelector(".mob-navigation");
  const toggle = document.querySelector(".nav-toggle");

  let menuOpen = false;

  toggle.addEventListener("click", (e) => {
    e.preventDefault();
    if (!menuOpen) {
      nav.classList.add("nav-expanded");
      mobNav.style.display = "block";

      menuOpen = true;
    } else {
      nav.classList.remove("nav-expanded");
      mobNav.style.display = "none";
      menuOpen = false;
    }
  });
};