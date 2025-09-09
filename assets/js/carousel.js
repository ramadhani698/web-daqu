document.addEventListener("DOMContentLoaded", function () {
  const carousel = document.querySelector("#carouselSlider");
  const bsCarousel = new bootstrap.Carousel(carousel, {
    interval: 5000,
    ride: "carousel",
    pause: false,
  });
});
