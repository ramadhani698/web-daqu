// Navbar scroll efect
window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("shrink");
  } else {
    navbar.classList.remove("shrink");
  }
});

document.addEventListener("click", function (event) {
  const navbar = document.getElementById("navbarSupportedContent");
  const toggler = document.querySelector(".navbar-toggler");

  const isClickInsideNavbar = navbar.contains(event.target);
  const isClickOnToggler = toggler.contains(event.target);

  // Kalau klik di luar navbar dan bukan tombol hamburger
  if (!isClickInsideNavbar && !isClickOnToggler) {
    const bsCollapse = bootstrap.Collapse.getInstance(navbar);
    if (bsCollapse && bsCollapse._isShown) {
      bsCollapse.hide();
    }
  }
});
