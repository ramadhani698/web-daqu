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

    echo '<title>' . htmlspecialchars($meta['title']) . '</title>';
    echo '<meta name="description" content="' . htmlspecialchars($meta['description']) . '">';
    echo '<meta name="keywords" content="' . htmlspecialchars($meta['keywords']) . '">';
    echo '<meta property="og:title" content="' . htmlspecialchars($meta['og_title']) . '">';
    echo '<meta property="og:description" content="' . htmlspecialchars($meta['og_description']) . '">';
    echo '<meta property="og:image" content="' . htmlspecialchars($meta['og_image']) . '">';
    ?>

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
$pesantren_id = $pesantren ? $pesantren['id'] : 0;
$pesantren_gambar = $conn->query("SELECT * FROM sejarah_gambar WHERE sejarah_id=$pesantren_id ORDER BY urutan ASC")->fetch_all(MYSQLI_ASSOC);

// Ambil data sejarah yayasan
$yayasan = $conn->query("SELECT * FROM sejarah WHERE section='yayasan' ORDER BY id DESC LIMIT 1")->fetch_assoc();
$yayasan_id = $yayasan ? $yayasan['id'] : 0;
$yayasan_gambar = $conn->query("SELECT * FROM sejarah_gambar WHERE sejarah_id=$yayasan_id ORDER BY urutan ASC")->fetch_all(MYSQLI_ASSOC);
?>

<!-- Sejarah Pesantren -->
<section class="container py-5 sejarah-section" style="margin-top: 70px;">
  <div class="row align-items-center">
    <?php if ($pesantren): ?>
      <div class="col-md-6 mb-4 mb-md-0 sejarah-image" data-aos="fade-right">
        <?php if ($pesantren_gambar): ?>
          <div id="carouselPesantren" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php foreach ($pesantren_gambar as $i => $g): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                  <img src="../<?= htmlspecialchars($g['image']) ?>" 
                       class="d-block w-100 rounded" 
                       alt="Sejarah Pesantren <?= $i+1 ?>">
                </div>
              <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPesantren" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselPesantren" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-md-6 sejarah-content" data-aos="fade-left">
        <h2 class="mb-3"><?= htmlspecialchars($pesantren['title']) ?></h2>
        <p><?= nl2br($pesantren['content']) ?></p>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- Sejarah Yayasan -->
<section class="container py-5 sejarah-section" style="margin-top: 80px;">
  <div class="row align-items-center">
    <?php if ($yayasan): ?>
      <div class="col-md-6 sejarah-content" data-aos="fade-left">
        <h2 class="mb-3"><?= htmlspecialchars($yayasan['title']) ?></h2>
        <p><?= nl2br($yayasan['content']) ?></p>
      </div>
      <div class="col-md-6 mb-4 mb-md-0 sejarah-image" data-aos="fade-right">
        <?php if ($yayasan_gambar): ?>
          <div id="carouselYayasan" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php foreach ($yayasan_gambar as $i => $g): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                  <img src="../<?= htmlspecialchars($g['image']) ?>" 
                       class="d-block w-100 rounded" 
                       alt="Sejarah Yayasan <?= $i+1 ?>">
                </div>
              <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselYayasan" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselYayasan" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        <?php endif; ?>
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