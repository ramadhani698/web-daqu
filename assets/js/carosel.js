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
