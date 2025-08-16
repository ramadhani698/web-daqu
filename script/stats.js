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
