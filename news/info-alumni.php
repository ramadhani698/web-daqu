<?php
include __DIR__ . '/../admin/config/config.php';
$page = 'info-alumni';
$meta = null;
$result = $conn->query("SELECT * FROM seo_meta WHERE page='$page' LIMIT 1");
if ($result && $result->num_rows > 0) {
  $meta = $result->fetch_assoc();
}
// Query untuk semua alumni
$alumni = $conn->query("SELECT * FROM alumni ORDER BY tahun_lulus ASC");

// Query untuk sebaran alumni (alumni yang sudah tersebar di masyarakat dan sukses)
$sebaran_alumni_query = "SELECT * FROM alumni WHERE kategori = 'sebaran' ORDER BY tahun_lulus ASC";
$sebaran_alumni = $conn->query($sebaran_alumni_query);

// Query untuk kiprah alumni (alumni yang sedang melanjutkan pendidikan di universitas)
$kiprah_alumni_query = "SELECT * FROM alumni WHERE kategori = 'kiprah' ORDER BY tahun_lulus ASC";
$kiprah_alumni = $conn->query($kiprah_alumni_query);
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($meta['title']) ? htmlspecialchars($meta['title']) : 'Info Alumni'; ?></title>
    <meta name="description" content="<?php echo isset($meta['description']) ? htmlspecialchars($meta['description']) : ''; ?>">
    <meta name="keywords" content="<?php echo isset($meta['keywords']) ? htmlspecialchars($meta['keywords']) : ''; ?>">
    <meta property="og:title" content="<?php echo isset($meta['og_title']) ? htmlspecialchars($meta['og_title']) : ''; ?>">
    <meta property="og:description" content="<?php echo isset($meta['og_description']) ? htmlspecialchars($meta['og_description']) : ''; ?>">
    <meta property="og:image" content="<?php echo isset($meta['og_image']) ? htmlspecialchars($meta['og_image']) : ''; ?>">

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
                <a href="#sebaran-alumni" class="btn-alumni">Sebaran Alumni</a>
                <a href="#kiprah-alumni" class="btn-alumni">Kiprah Alumni</a>
            </div>
        </div>
    </section>



    <!-- Sebaran Alumni Section -->
    <section class="alumni-prestasi" id="sebaran-alumni">
        <div class="container">
            <h2 class="section-alumni-title">Sebaran Alumni</h2>
            <p class="section-alumni-subtitle">
                Para alumni yang telah tersebar di masyarakat dan sukses dalam berbagai bidang.
            </p>

            <div class="alumni-container">
              <?php 
              $sebaran_alumni = $conn->query("SELECT * FROM alumni WHERE kategori = 'sebaran' ORDER BY tahun_lulus ASC");
              $delay = 200; 
              while($row = $sebaran_alumni->fetch_assoc()): 
              ?>
                  <div class="wrapper" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
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
                            <p>Profesi: <?= htmlspecialchars($row['profesi']) ?></p>
                            <p><?= strip_tags($row['deskripsi']) ?></p>
                            <?php if (!empty($row['juz_hafalan']) && $row['juz_hafalan'] != '0'): ?>
                              <span class="alumni-juz">Hafal <?= htmlspecialchars($row['juz_hafalan']) ?> Juz</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
              <?php $delay += 200; endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Kiprah Alumni Section -->
    <section class="alumni-prestasi" id="kiprah-alumni">
        <div class="container">
            <h2 class="section-alumni-title">Kiprah Alumni</h2>
            <p class="section-alumni-subtitle">
                Para alumni yang sedang melanjutkan pendidikan di universitas.
            </p>

            <div class="alumni-container">
              <?php 
              $kiprah_alumni = $conn->query("SELECT * FROM alumni WHERE kategori = 'kiprah' ORDER BY tahun_lulus ASC");
              $delay = 200; 
              while($row = $kiprah_alumni->fetch_assoc()): 
              ?>
                  <div class="wrapper" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
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
                            <p>Universitas: <?= htmlspecialchars($row['profesi']) ?></p>
                            <p><?= strip_tags($row['deskripsi']) ?></p>
                            <?php if (!empty($row['juz_hafalan'])): ?>
                              <span class="alumni-juz">Hafal <?= htmlspecialchars($row['juz_hafalan']) ?> Juz</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
              <?php $delay += 200; endwhile; ?>
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