AOS.init({
  duration: 1200,
  once: true,
  offset: 100,
  easing: "ease-out-cubic",
});

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

document.addEventListener("DOMContentLoaded", function () {
  const carousel = document.querySelector("#carouselSlider");
  const bsCarousel = new bootstrap.Carousel(carousel, {
    interval: 5000,
    ride: "carousel",
    pause: false,
  });

  // Paksa mulai interval setelah 5 detik dari load
  setTimeout(() => {
    bsCarousel.next(); // Loncat ke slide kedua manual
  }, 5000);
});

// Counter Animation for Stats
function animateCounter(element, target) {
  let current = 0;
  const increment = target / 100;
  const timer = setInterval(() => {
    current += increment;
    if (current >= target) {
      current = target;
      clearInterval(timer);
    }
    element.textContent = Math.floor(current) + "+";
  }, 20);
}

// Animate counters when stats section is visible
const statsObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const numbers = entry.target.querySelectorAll(".stat-number");
      numbers.forEach((num) => {
        const target = parseInt(num.textContent);
        animateCounter(num, target);
      });
      statsObserver.unobserve(entry.target);
    }
  });
});

// Start observing the stats section
const statsSection = document.querySelector(".stats");
if (statsSection) {
  statsObserver.observe(statsSection);
}
