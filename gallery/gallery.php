<?php
include __DIR__ . '/../admin/config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeri Pesantren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>

    <!-- AOS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet"/>

    <!-- My style -->
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <?php include('../includes/navbar.php') ?>

    <!-- HERO -->
    <section class="hero-gallery">
      <div class="hero-content-gallery">
        <h2 class="hero-title-gallery">Galeri Pesantren Tahfidz Daarul Qur'an Al-Jannah</h2>
        <p class="hero-subtitle-gallery">
          Menyaksikan momen berharga dalam perjalanan menghafal Al-Qur'an bersama para santri
        </p>
      </div>
    </section>
    
    <!-- GALLERY -->
    <section class="gallery-section">
      <div class="section-header-gallery" data-aos="fade-up">
        <h2 class="section-gallery-title">Momen Terindah Kami</h2>
        <p class="section-gallery-subtitle">
          Berikut adalah dokumentasi kegiatan dan keseharian para santri dalam program tahfidz Al-Qur'an
        </p>
      </div>

      <!-- FILTER BUTTONS -->
      <div class="gallery-filter" data-aos="fade-up" data-aos-delay="100">
        <button class="filter-button active" data-filter="all">Semua</button>
        <button class="filter-button" data-filter="kegiatan">Kegiatan</button>
        <button class="filter-button" data-filter="pembelajaran">Pembelajaran</button>
        <button class="filter-button" data-filter="prestasi">Prestasi</button>
        <button class="filter-button" data-filter="fasilitas">Fasilitas</button>
      </div>

      <!-- GRID -->
      <div class="gallery-grid">
        <?php
          $result = $conn->query("SELECT * FROM galeri ORDER BY id DESC");
          while ($row = $result->fetch_assoc()):
        ?>
          <div class="gallery-item" data-category="<?= $row['kategori'] ?>" data-aos="zoom-in" data-aos-delay="200">
            <img
              src="../img/<?= htmlspecialchars($row['gambar']) ?>"
              alt="<?= htmlspecialchars($row['judul']) ?>"
              class="gallery-img"
            />
            <div class="gallery-overlay">
              <div class="gallery-caption">
                <h3><?= htmlspecialchars($row['judul']) ?></h3>
                <p><?= strip_tags($row['deskripsi']) ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </section>

    <!-- MODAL -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body text-center">
            <img id="modalImage" src="" alt="" class="img-fluid mb-3" />
            <h5 id="modalTitle"></h5>
            <p id="modalDesc"></p>
          </div>
        </div>
      </div>
    </div>

    <?php include('../includes/footer.php') ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const filterButtons = document.querySelectorAll(".filter-button");
        const galleryItems = document.querySelectorAll(".gallery-item");

        // FILTER
        filterButtons.forEach((button) => {
          button.addEventListener("click", () => {
            filterButtons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");

            const filter = button.dataset.filter;
            galleryItems.forEach((item) => {
              const category = item.dataset.category;
              if (filter === "all" || category === filter) {
                item.style.display = ""; // pakai default grid/flex
              } else {
                item.style.display = "none";
              }
            });
          });
        });

        // MODAL POPUP
        const modal = new bootstrap.Modal(document.getElementById("galleryModal"));
        const modalImage = document.getElementById("modalImage");
        const modalTitle = document.getElementById("modalTitle");
        const modalDesc = document.getElementById("modalDesc");

        galleryItems.forEach((item) => {
          item.addEventListener("click", () => {
            const img = item.querySelector("img");
            const title = item.querySelector(".gallery-caption h3").innerText;
            const desc = item.querySelector(".gallery-caption p").innerText;

            modalImage.src = img.src;
            modalImage.alt = img.alt;
            modalTitle.innerText = title;
            modalDesc.innerText = desc;
            modal.show();
          });
        });
      });
    </script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>AOS.init();</script>
    <script src="../assets/js/navbar.js"></script>
  </body>
</html>
