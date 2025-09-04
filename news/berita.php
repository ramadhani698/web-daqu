<?php
include('../admin/config/config.php');

// Ambil semua berita dari DB, urutkan terbaru
$berita = $conn->query("SELECT * FROM berita ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Berita Terkini</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <!-- font awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- AOS -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
      rel="stylesheet"
    />

    <!-- My style -->
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>

  <body>
    <?php include('../includes/navbar.php') ?>

    <section class="hero-berita"></section>
    
    <div class="container-berita">
      <h2 class="section-title-berita">Berita Terkini</h2>
      <div class="news-grid">
        <?php
          $delay = 200;
          while($b = $berita->fetch_assoc()): ?>
          <div class="news-card" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
            <div class="news-image">
              <img 
                src="../<?= htmlspecialchars($b['gambar']) ?>" 
                alt="<?= htmlspecialchars($b['judul']) ?>" 
              />
            </div>
            <div class="news-content">
              <div class="news-date">
                <?= date("d M Y", strtotime($b['created_at'])) ?>
              </div>
              <h3 class="news-title"><?= htmlspecialchars($b['judul']) ?></h3>
              <p class="news-excerpt">
                <?= substr(strip_tags($b['deskripsi']), 0, 120) ?>...
              </p>
              <a href="../berita/detaill.php?id=<?= $b['id'] ?>" class="read-more">Baca Selengkapnya</a>
            </div>
          </div>
        <?php
          $delay += 200;
          endwhile; ?>
      </div>
    </div>

    <?php include('../includes/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>AOS.init();</script>
    <script src="../assets/js/navbar.js"></script>
  </body>
</html>
