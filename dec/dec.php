<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info Akademik</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"assets/
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
            <h2 class="section-produk-title">
                Produk Kami
            </h2>
            <p class="section-produk-subtitle">
                Berbagai produk berkualitas dengan nilai ibadah
            </p>
        </div>

        <div class="products-grid">
        <!-- Produk 1 -->
        <div class="product-card">
          <div class="product-image">
            <img
              src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/aded211c-95de-4fc2-aee4-4e4c1b2d19b8.png"
              alt="Galon isi ulang Tahfidz Qur'an Water (TAQWA) dengan desain islami berwarna hijau dan putih, ditempatkan di dapur modern"
            />
          </div>
          <div class="product-info">
            <h3>Tahfidz Qur'an Water (TAQWA)</h3>
            <p>
              Air galon isi ulang berkualitas tinggi dengan proses penyaringan
              modern berstandar tinggi, dikemas dengan desain islami.
            </p>
            <a href="#contact" class="btn-produk">Info Pesan</a>
          </div>
        </div>

        <!-- Produk 2 -->
        <div class="product-card">
          <div class="product-image">
            <img
              src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4341a80e-17e8-4b0e-8ddd-522d8b57d947.png"
              alt="Botol AIQ'30 air mineral dengan label bergaya kaligrafi arab berwarna emas dan hijau, dipajang di meja kayu"
            />
          </div>
          <div class="product-info">
            <h3>AIQ'30 Air Mineral Botol</h3>
            <p>
              Air mineral kemasan botol dengan kandungan mineral alami yang
              bermanfaat untuk kesehatan tubuh dan kecerdasan otak.
            </p>
            <a href="#contact" class="btn-produk">Info Pesan</a>
          </div>
        </div>

        <!-- Produk 3 -->
        <div class="product-card">
          <div class="product-image">
            <img
              src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/5506c9cf-efad-4fa2-89ea-474dd7fda9f2.png"
              alt="Madu kesehatan dalam botol kaca dengan label arab, ditemani sendok madu dan latar belakang kayu alami"
            />
          </div>
          <div class="product-info">
            <h3>Madu Kesehatan</h3>
            <p>
              Madu asli dengan kualitas terbaik yang bermanfaat untuk kesehatan,
              pengobatan, dan daya tahan tubuh sesuai sunnah Nabi.
            </p>
            <a href="#contact" class="btn-produk">Info Pesan</a>
          </div>
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