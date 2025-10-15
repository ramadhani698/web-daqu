// === INIT ANIMATIONS ===
document.addEventListener("DOMContentLoaded", () => {
  // Inisialisasi AOS (animate on scroll)
  AOS.init({
    duration: 800,
    once: true,
  });

  // Inisialisasi Swiper (testimoni slider)
  const swiper = new Swiper(".mySwiper", {
    autoplay: { delay: 3000 },
    loop: true,
    speed: 600,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  // Tombol Nominal Donasi
  const nominalButtons = document.querySelectorAll(".nominal button");
  const nominalInput = document.querySelector('input[type="number"]');

  nominalButtons.forEach((button) => {
    button.addEventListener("click", () => {
      // Hapus kelas aktif dari semua tombol
      nominalButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");

      // Ambil angka dari tombol dan masukkan ke input nominal
      const value = button.textContent.replace(/[^\d]/g, "");
      nominalInput.value = value;
    });
  });

  // Efek tombol nominal aktif
  const style = document.createElement("style");
  style.textContent = `
    .nominal button.active {
      background: #009970;
      color: #fff;
      border-color: #009970;
    }
  `;
  document.head.appendChild(style);

  // Validasi Formulir Donasi
  const form = document.querySelector(".form-donasi form");
  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const nama = form.querySelector('input[type="text"]').value.trim();
    const kontak = form
      .querySelector('input[placeholder="Nomor HP / Email"]')
      .value.trim();
    const nominal = nominalInput.value.trim();
    const metode = form.querySelector("select").value;

    if (!nama || !kontak || !nominal || metode === "Pilih Metode Pembayaran") {
      alert("Mohon lengkapi semua data donasi.");
      return;
    }

    alert(
      `Terima kasih, ${nama}! Donasi sebesar Rp${Number(nominal).toLocaleString(
        "id-ID"
      )} telah diterima.`
    );
    form.reset();
    nominalButtons.forEach((btn) => btn.classList.remove("active"));
  });

  // Scroll Smooth untuk semua tautan anchor
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        window.scrollTo({
          top: target.offsetTop - 70,
          behavior: "smooth",
        });
      }
    });
  });
});

// ... existing code ...
document.addEventListener("DOMContentLoaded", function () {
  const texts = [
    "Sedekah",
    "Wakaf",
    "Zakat",
    "Donasi",
    "Infak",
    "Berbagi Kebaikan",
  ];
  let idx = 0;
  const rotatingText = document.querySelector(".rotating-text");
  const cursor = document.createElement("span");
  cursor.className = "typing-cursor";
  cursor.textContent = "|";
  rotatingText.after(cursor);

  function typeText(text, callback) {
    rotatingText.textContent = "";
    let i = 0;
    function type() {
      if (i < text.length) {
        rotatingText.textContent += text.charAt(i);
        i++;
        setTimeout(type, 80);
      } else if (callback) {
        callback();
      }
    }
    type();
  }

  function deleteText(callback) {
    let text = rotatingText.textContent;
    function del() {
      if (text.length > 0) {
        text = text.slice(0, -1);
        rotatingText.textContent = text;
        setTimeout(del, 50);
      } else if (callback) {
        callback();
      }
    }
    del();
  }

  function rotate() {
    typeText(texts[idx], () => {
      setTimeout(() => {
        deleteText(() => {
          idx = (idx + 1) % texts.length;
          setTimeout(rotate, 300); // jeda sebelum mengetik teks baru
        });
      }, 2000); // waktu tampil sebelum dihapus
    });
  }

  rotate();
});
