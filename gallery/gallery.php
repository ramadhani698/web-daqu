<?php
include '../admin/config/config.php';
$page = 'galeri';
$meta = null;
$result = mysqli_query($conn, "SELECT * FROM seo_meta WHERE page='$page' LIMIT 1");
if ($result && mysqli_num_rows($result) > 0) {
    $meta = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($meta['title']) ? htmlspecialchars($meta['title']) : 'Galeri Daqu Al Jannah'; ?></title>
    <meta name="description" content="<?php echo isset($meta['description']) ? htmlspecialchars($meta['description']) : 'Kumpulan foto kegiatan dan fasilitas Daqu Al Jannah'; ?>">
    <meta name="keywords" content="<?php echo isset($meta['keywords']) ? htmlspecialchars($meta['keywords']) : 'galeri, foto, kegiatan, daqu'; ?>">
    <meta property="og:title" content="<?php echo isset($meta['og_title']) ? htmlspecialchars($meta['og_title']) : 'Galeri Daqu Al Jannah'; ?>">
    <meta property="og:description" content="<?php echo isset($meta['og_description']) ? htmlspecialchars($meta['og_description']) : 'Kumpulan foto kegiatan dan fasilitas Daqu Al Jannah'; ?>">
    <meta property="og:image" content="<?php echo isset($meta['og_image']) ? htmlspecialchars($meta['og_image']) : '/assets/img/logo.jpg'; ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>

    <!-- AOS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <?php include('../includes/navbar.php') ?>
    <section class="hero-gallery">
      <div class="hero-content-gallery">
        <h2 class="hero-title-gallery">Galeri Pesantren Tahfidz Daarul Qur'an Al-Jannah</h2>
        <p class="hero-subtitle-gallery">
          Menyaksikan momen berharga dalam perjalanan menghafal Al-Qur'an bersama para santri
        </p>
      </div>
    </section>
    <section class="gallery-section">
      <div class="section-header-gallery" data-aos="fade-up">
        <h2 class="section-gallery-title">Momen Terindah Kami</h2>
        <p class="section-gallery-subtitle">
          Berikut adalah dokumentasi kegiatan dan keseharian para santri dalam program tahfidz Al-Qur'an
        </p>
      </div>
      <div class="gallery-grid">
        <?php
          // Pagination setup
          $limit = 20; // jumlah gambar per halaman
          $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
          if ($page < 1) $page = 1;
          $offset = ($page - 1) * $limit;

          // Hitung total data galeri
          $result_total = $conn->query("SELECT COUNT(*) as total FROM galeri");
          $total_galeri = $result_total->fetch_assoc()['total'];
          $total_pages = ceil($total_galeri / $limit);

          // Query galeri dengan limit dan offset
          $result = $conn->query("SELECT * FROM galeri ORDER BY id DESC LIMIT $limit OFFSET $offset");
          while ($row = $result->fetch_assoc()):
        ?>
          <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200" style="cursor: pointer;" onclick="openModal('<?= htmlspecialchars($row['gambar']) ?>', '<?= htmlspecialchars($row['judul']) ?>', '<?= strip_tags($row['deskripsi']) ?>')">
            <img src="../img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>" class="gallery-img" />
            <div class="gallery-overlay">
              <div class="gallery-caption">
                <h3><?= htmlspecialchars($row['judul']) ?></h3>
                <p><?= strip_tags($row['deskripsi']) ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <!-- Pagination Navigation -->
      <div class="pagination" style="text-align:center; margin-top:20px;">
        <?php
        if ($total_pages < 1) $total_pages = 1;
        if ($page > 1): ?>
          <a href="?page=<?= $page - 1 ?>" class="page-link">&laquo; Prev</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <a href="?page=<?= $i ?>" class="page-link<?= ($i == $page) ? ' active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
        <?php if ($page < $total_pages): ?>
          <a href="?page=<?= $page + 1 ?>" class="page-link">Next &raquo;</a>
        <?php endif; ?>
      </div>
    </section>
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
        const galleryItems = document.querySelectorAll(".gallery-item");
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>AOS.init();</script>
    <script src="../assets/js/navbar.js"></script>
  </body>
</html>