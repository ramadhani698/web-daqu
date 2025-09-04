<?php
include __DIR__ . '/../admin/config/config.php';
$alumni = $conn->query("SELECT * FROM alumni ORDER BY tahun_lulus ASC");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info Alumni</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />

    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- AOS -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
<body>
    <?php include('../includes/navbar.php') ?>

    <!-- Hero Section-->
    <section class="hero-section-alumni" id="beranda">
        <div class="hero-content-alumni">
            <h2 class="hero-alumni-title">Bergabung Dengan Komunitas Alumni Tahfidz</h2>
            <p class="hero-alumni-subtitle">
                Menjadi bagian dari jaringan alumni Pondok Pesantren Daarul Qu'ran Al-Jannah.
            </p>
            <div class="btn-container">
                <a href="#alumni" class="btn-alumni">Lihat Alumni</a>
            </div>
        </div>
    </section>

    <!-- Alumni Prestasi Section -->
    <section class="alumni-prestasi" id="alumni">
        <div class="container">
            <h2 class="section-alumni-title">Daftar Alumni</h2>
            <p class="section-alumni-subtitle">
                Para alumni yang telah berhasil menghafal Al-Qur'an dan memberikan kontribusi positif bagi masyarakat.
            </p>

            <div class="alumni-container">
              <?php while($row = $alumni->fetch_assoc()): ?>
                <div class="wrapper"  data-aos="fade-up">
                    <div class="alumni-card">
                        <div class="alumni-img">
                            <img 
                              src="../<?= htmlspecialchars($row['foto']) ?>" 
                              alt="<?= htmlspecialchars($row['nama']) ?>, alumni tahun <?= htmlspecialchars($row['tahun_lulus']) ?>, profesi <?= htmlspecialchars($row['profesi']) ?>"
                            />
                            <?php if (!empty($row['badge'])): ?>
                              <span class="alumni-badge"><?= htmlspecialchars($row['badge']) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="alumni-info">
                            <h3><?= htmlspecialchars($row['nama']) ?></h3>
                            <p>Tahun Lulus: <?= htmlspecialchars($row['tahun_lulus']) ?></p>
                            <p><?= strip_tags($row['deskripsi']) ?></p>
                            <?php if (!empty($row['juz_hafalan'])): ?>
                              <span class="alumni-juz">Hafal <?= htmlspecialchars($row['juz_hafalan']) ?> Juz</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
              <?php endwhile; ?>
            </div>

            <div class="lihat-lebih">
                <a href="#" class="btn-alumni">Lihat Selengkapnya →</a>
            </div>
        </div>
    </section>

    <?php include('../includes/footer.php') ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>AOS.init();</script>
  </body>
</html>
