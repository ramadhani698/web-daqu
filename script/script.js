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

function animateCounter(id, start, end, duration) {
  let obj = document.getElementById(id);
  let range = end - start;
  let current = start;
  let increment = Math.ceil(range / (duration / 50));
  let timer = setInterval(function () {
    current += increment;
    if (current >= end) {
      current = end;
      clearInterval(timer);
    }
    obj.textContent = "+" + current.toLocaleString("id-ID");
  }, 50);
}

// Observer setup
const observer = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter("donor-count", 0, 120000, 5000);
        observer.unobserve(entry.target); // Stop observing after trigger
      }
    });
  },
  {
    threshold: 0.5, // Trigger when 50% of section is visible
  }
);

// Start observing the section
document.addEventListener("DOMContentLoaded", function () {
  const target = document.querySelector(".donation-impact");
  if (target) observer.observe(target);
});
