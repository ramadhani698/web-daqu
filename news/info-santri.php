<?php
include '../admin/config/config.php';
$page = 'info-santri';
$meta = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM seo_meta WHERE page='$page' LIMIT 1"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($meta['title']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta['description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta['keywords']); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($meta['og_title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta['og_description']); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($meta['og_image']); ?>">

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
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">

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

    <!-- My style -->
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <?php include('../includes/navbar.php') ?>

    <!-- Hero Section -->
    <section class="hero-section" style="margin-top: 70px;">
      <div class="hero-content">
        <h1 class="hero-title">Informasi Santri Tahfidz</h1>
        <p class="hero-subtitle">
          Platform informasi digital santri tahfidz Qur'an
        </p>
        <p class="hero-ayat">
          وَلَقَدْ يَسَّرْنَا الْقُرْآنَ لِلذِّكْرِ فَهَلْ مِن مُّدَّكِرٍ
        </p>
      </div>
    </section>

    <!-- Main Content -->
    <main class="main-container">
      <!-- Achievements Section -->
      <section id="prestasi" class="prestasi-section">
        <div class="prestasi-container">
            <div class="prestasi-header">
                <h2 class="prestasi-title">Prestasi Santri</h2>
                <div class="prestasi-divider"></div>
            </div>

            <div class="prestasi-grid">
                <?php
                include __DIR__ . '/../admin/config/config.php';
                $prestasi = $conn->query("SELECT * FROM prestasi ORDER BY created_at DESC");
                ?>

                <?php if ($prestasi->num_rows > 0): ?>
                    <?php while($p = $prestasi->fetch_assoc()): ?>
                        <div class="prestasi-card">
                            <img src="../uploads/<?= htmlspecialchars($p['gambar']) ?>" alt="<?= htmlspecialchars($p['judul']) ?>" class="prestasi-image">
                            <div class="prestasi-content">
                                <div class="prestasi-label"><?= htmlspecialchars($p['kategori']) ?></div>
                                <h3 class="prestasi-heading"><?= htmlspecialchars($p['judul']) ?></h3>
                                <p class="prestasi-desc">
                                    <?= strip_tags($p['deskripsi']) ?>
                                </p>
                                <div class="prestasi-profile">
                                    <p class="prestasi-name"><?= htmlspecialchars($p['nama']) ?></p>
                                    <p class="prestasi-class"><?= htmlspecialchars($p['kelas']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Belum ada data prestasi.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php include('../includes/footer.php') ?>
  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Javascript -->
    <!-- <script src="../script/script.js"></script> -->
  </body>
</html>