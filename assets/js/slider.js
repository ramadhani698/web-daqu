document.addEventListener("DOMContentLoaded", function () {
  function setupSlider(selector) {
    const splide = new Splide(selector, {
      type: "slide",
      perPage: 2,
      gap: "20px",
      autoplay: true,
      interval: 4000,
      arrows: false,
      pagination: false,
      drag: true,
      rewind: true,
      speed: 800,
      pauseOnHover: false,
      pauseOnFocus: false,
      breakpoints: {
        768: { perPage: 1 },
      },
    });

    splide.on("drag", () => {
      splide.Components.Autoplay.pause();
    });

    splide.on("dragged", () => {
      splide.Components.Autoplay.play();
    });

    splide.mount();
  }

  setupSlider("#slider-sedekah");
  setupSlider("#slider-zakat");
  setupSlider("#slider-wakaf");
});
