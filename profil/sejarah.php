<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sejarah Pesantren</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />

    <?php
    require_once __DIR__.'/../admin/config/config.php';
    $page = 'sejarah';
    $result = mysqli_query($conn, "SELECT * FROM seo_meta WHERE page='$page' LIMIT 1");
    $meta = mysqli_fetch_assoc($result);
    ?>
    <title><?php echo $meta['title']; ?></title>
    <meta name="description" content="<?php echo $meta['description']; ?>">
    <meta name="keywords" content="<?php echo $meta['keywords']; ?>">
    <meta property="og:title" content="<?php echo $meta['og_title']; ?>">
    <meta property="og:description" content="<?php echo $meta['og_description']; ?>">
    <meta property="og:image" content="<?php echo $meta['og_image']; ?>">

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

    <!-- My style -->
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>

  
  <body>
    <?php include('../includes/navbar.php') ?>

    <?php
    include __DIR__ . '/../admin/config/config.php';

    // Ambil data sejarah pesantren
    $pesantren = $conn->query("SELECT * FROM sejarah WHERE section='pesantren' ORDER BY id DESC LIMIT 1")->fetch_assoc();

    // Ambil data sejarah yayasan
    $yayasan = $conn->query("SELECT * FROM sejarah WHERE section='yayasan' ORDER BY id DESC LIMIT 1")->fetch_assoc();
    ?>

    <section class="container py-5 sejarah-section" style="margin-top: 70px;">
      <div class="row align-items-center">
        <?php if ($pesantren): ?>
          <div class="col-md-6 mb-4 mb-md-0 sejarah-image" data-aos="fade-right">
            <img src="../uploads/<?= htmlspecialchars($pesantren['image']) ?>" 
                alt="<?= htmlspecialchars($pesantren['title']) ?>" 
                class="img-fluid rounded" />
          </div>
          <div class="col-md-6 sejarah-content" data-aos="fade-left">
            <h2 class="mb-3"><?= htmlspecialchars($pesantren['title']) ?></h2>
            <p><?= nl2br($pesantren['content']) ?></p>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="container py-5 sejarah-section" style="top: 80px;">
      <div class="row align-items-center">
        <?php if ($yayasan): ?>
          <div class="col-md-6 sejarah-content" data-aos="fade-left">
            <h2 class="mb-3"><?= htmlspecialchars($yayasan['title']) ?></h2>
            <p><?= nl2br($yayasan['content']) ?></p>
          </div>
          <div class="col-md-6 mb-4 mb-md-0 sejarah-image" data-aos="fade-right">
            <img src="../uploads/<?= htmlspecialchars($yayasan['image']) ?>" 
                alt="<?= htmlspecialchars($yayasan['title']) ?>" 
                class="img-fluid rounded" />
          </div>
        <?php endif; ?>
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
    <script src="../assets/js/script.js"></script>
  </body>
</html>