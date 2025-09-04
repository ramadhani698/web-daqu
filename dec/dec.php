<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daqu Economic Center</title>
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
    <?php
    include('../admin/config/config.php');
    include('../includes/navbar.php');
    ?>

    <section class="hero-dec">
      <div class="hero-content-dec">
        <h2 class="hero-title-dec">
          Produk Berkualitas dari Pesantren Tahfidz Daarul Qur'an Al-Jannah
        </h2>
        <p class="hero-subtitle-dec">
          Dukung ekonomi umat dengan produk-produk halal dan berkualitas tinggi
          hasil karya santri Daarul Qur'an Al-Jannah
        </p>
        <a href="#produk" class="btn-produk">Lihat Produk</a>
      </div>
    </section>

    <section class="products" id="produk">
      <div class="section-title-produk">
        <h2 class="section-produk-title">Produk Kami</h2>
        <p class="section-produk-subtitle">
          Berbagai produk berkualitas dengan nilai ibadah
        </p>
      </div>
      <div class="products-grid">
        <?php
        $stmt = $conn->prepare("SELECT * FROM daqu_produk ORDER BY created_at DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        $delay = 200;
        while ($row = $result->fetch_assoc()):
          $gambarPath = !empty($row['gambar']) ? "../../../uploads/" . $row['gambar'] : "../assets/img/default.png";
        ?>
        <div class="wrapper" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
          <div class="product-card">
            <div class="product-image">
              <img src="../uploads/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama']) ?>" class="product-image">
            </div>
            <div class="product-info">
              <h3><?= htmlspecialchars($row['nama']) ?></h3>
              <p><?= strip_tags($row['deskripsi']) ?></p>
              <a href="#contact" class="btn-produk">Info Pesan</a>
            </div>
          </div>
        </div>
        <?php
          $delay += 200;
          endwhile; ?>
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