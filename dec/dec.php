<?php
include('../admin/config/config.php');
$page = 'dec';
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
    <title><?php echo isset($meta['title']) ? htmlspecialchars($meta['title']) : 'Daqu Economic Center'; ?></title>
    <meta name="description" content="<?php echo isset($meta['description']) ? htmlspecialchars($meta['description']) : 'Produk berkualitas dari pesantren tahfidz Daarul Qur\'an Al-Jannah'; ?>">
    <meta name="keywords" content="<?php echo isset($meta['keywords']) ? htmlspecialchars($meta['keywords']) : 'dec, produk, ekonomi, daqu'; ?>">
    <meta property="og:title" content="<?php echo isset($meta['og_title']) ? htmlspecialchars($meta['og_title']) : 'Daqu Economic Center'; ?>">
    <meta property="og:description" content="<?php echo isset($meta['og_description']) ? htmlspecialchars($meta['og_description']) : 'Produk berkualitas dari pesantren tahfidz Daarul Qur\'an Al-Jannah'; ?>">
    <meta property="og:image" content="<?php echo isset($meta['og_image']) ? htmlspecialchars($meta['og_image']) : '/assets/img/logo.jpg'; ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <!-- AOS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet"/>
    <!-- My style -->
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <?php include('../includes/navbar.php'); ?>
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
              <p class="product-price">Harga: Rp <?= htmlspecialchars($row['harga']) ?></p>
              <?php
                $nama_produk = ($row['nama'] == 'air mineral') ? "aiq'30" : $row['nama'];
                $pesan = "halo, saya ingin memesan " . $nama_produk . " ini";
              ?>
              <a href="https://wa.me/6285885428128?text=<?= urlencode($pesan) ?>" class="btn-produk" target="_blank">Info Pesan</a>
            </div>
          </div>
        </div>
        <?php
          $delay += 200;
          endwhile; ?>
      </div>
    </section>
    <?php include('../includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- Javascript -->
    <script src="../assets/js/script.js"></script>
  </body>
</html>