<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daqu Al-Jannah</title>
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
    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/img/logo2.jpg" alt="Logo2" height="40">
        </a>

        <!-- Tombol hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu yang bisa di-collapse -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item dropdown hover-zone">
              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">Profil</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./profil/sejarah.php">Sejarah Pesantren</a></li>
                <li><a class="dropdown-item" href="./profil/visi-misi.php">Visi Misi</a></li>
                <li><a class="dropdown-item" href="./profil/daqu-method.php">Daqu Method</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown hover-zone">
              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">News</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./news/berita.php">Berita Pilihan</a></li>
                <li><a class="dropdown-item" href="./news/info-akademik.php">Info Akademik</a></li>
                <li><a class="dropdown-item" href="./news/info-santri.php">Info Santri</a></li>
                <li><a class="dropdown-item" href="./news/info-alumni.php">Info Alumni</a></li>
              </ul>
            </li>
            <li class="nav-item"><a href="./gallery/gallery.php" class="nav-link">Galeri</a></li>
            <li class="nav-item"><a href="./dec/dec.php" class="nav-link">DEC</a></li>
            <li class="nav-item"><a href="./pendaftaran/pendaftaran.php" class="nav-link">Pendaftaran</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
    require_once __DIR__ . '/admin/config/config.php';

    // Ambil semua carousel urut dari kolom urutan
    $carousels = $conn->query("SELECT * FROM carousel ORDER BY urutan ASC");
    ?>

    <div id="carouselSlider" class="carousel slide hero-slider-main" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php 
        $isActive = true;
        while ($row = $carousels->fetch_assoc()): 
        ?>
          <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
            <div class="position-relative">
              <img src="uploads/<?= $row['image'] ?>" class="d-block w-100" alt="<?= htmlspecialchars($row['alt_text']) ?>" />
              <div class="loading-spinner-wrapper">
                <svg viewBox="25 25 50 50" class="loading-spinner">
                  <circle cx="50" cy="50" r="20" class="loader-circle"></circle>
                </svg>
              </div>
            </div>
          </div>
        <?php 
          $isActive = false; // setelah loop pertama, sisanya tidak aktif
        endwhile; 
        ?>

      </div>

      <!-- Navigasi -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    
    <!-- Home Section -->
    <section class="home-section" id="home-section">
      <div class="container">
        <div class="row justify-content-center mb-3">
          <div class="home-title">
            <h4 data-aos="fade-up">Selamat Datang di</h4>
            <h2 data-aos="fade-up" data-aos-delay="300">
              Daarul Qur'an </br>
              Al-Jannah
            </h2>
            <p data-aos="fade-up" data-aos-delay="600">
              Tempat tumbuhnya generasi Qur'ani yang berakhlak mulia dan cinta
              ilmu. Bergabunglah dalam lingkungan islami yang damai, inspiratif,
              dan penuh keberkahan
            </p>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,288L120,261.3C240,235,480,181,720,149.3C960,117,1200,107,1320,101.3L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
    </section>

    <section class="daqu-benefit-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <?php
          include __DIR__ . '/admin/config/config.php';
          $benefits = $conn->query("SELECT * FROM benefit ORDER BY id ASC");
          ?>

          <div class="col-md-6" data-aos="fade-right">
            <div class="why-section">
              <h3 class="mb-4">Kenapa harus mondok di Daarul Qur'an Al-Jannah?</h3>
            </div>
            <ul class="list-unstyled">
              <?php 
              $delay = 200; 
              while ($row = $benefits->fetch_assoc()): 
              ?>
                <li data-aos="fade-right" data-aos-delay="<?= $delay ?>">
                  <strong><?= htmlspecialchars($row['title']) ?></strong> – 
                  <?= htmlspecialchars($row['description']) ?>
                </li>
              <?php 
                $delay += 200; 
              endwhile; 
              ?>
            </ul>
          </div>


          <div class="col-md-6" data-aos="fade-left">
            <!-- Slider Section -->
            <div class="photo-stack-wrapper">
              <!-- Gambar 1 -->
              <div class="photo photo-right zoom-hover fly-floating">
                <img src="assets/img/Pembinaan-tahfidz.jpg" alt="Suasana pondok" />
              </div>

              <!-- Gambar 2 -->
              <div class="photo photo-left zoom-hover fly-floating">
                <img src="assets/img/lingkungan_asri.jpg" alt="Kegiatan santri" />
              </div>

              <!-- Gambar 3 -->
               <div class="photo photo-center zoom-hover fly-floating">
                <img src="assets/img/pengajar_profesional.jpg" alt="Santri mengaji" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
    include __DIR__ . '/admin/config/config.php';
    $pendidikan = $conn->query("SELECT * FROM pendidikan ORDER BY id ASC");
    ?>

    <section class="pendidikan-daqu" id="pendidikan-daqu">
      <div class="container">
        <h2 class="pendidikan-title">Pendidikan di Daarul Qur'an Al-Jannah</h2>
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="300">
            <p class="pendidikan-intro">
              Di Daarul Qur'an, pendidikan bukan cuma soal duduk di kelas. Di sini, santri dibimbing buat jadi pribadi yang berilmu, berakhlak mulia, dan cinta Al-Qur’an. Gaya belajarnya dikemas modern tapi tetap kental nilai Islam, jadi gak cuma siap hadapi dunia, tapi juga punya bekal dari langit. Programnya dirancang buat bantu mereka tumbuh jadi pemimpin, kreatif, dan berjiwa tangguh—karakter yang pastinya bikin kita semua bangga.
            </p>
          </div>
        </div>
        <div class="row pendidikan-row g-4" data-aos="fade-up">
          <?php while($row = $pendidikan->fetch_assoc()): ?>
          <div class="col-lg-4">
            <div class="pendidikan-card">
              <div class="pendidikan-header">
                <div class="pendidikan-icon-container">
                  <i class="<?= htmlspecialchars($row['icon']) ?>"></i>
                </div>
                <h4><?= htmlspecialchars($row['title']) ?></h4>
              </div>
              <p><?= htmlspecialchars($row['description']) ?></p>
              <div class="pendidikan-cta">
                <a href="<?= htmlspecialchars($row['link']) ?>">Lanjut baca &raquo;</a>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>


    <?php
    include __DIR__ . '/admin/config/config.php';
    $data = mysqli_query($conn, "SELECT * FROM ekstrakurikuler ORDER BY kategori, nama");
    $ekskul = [];
    while ($row = mysqli_fetch_assoc($data)) {
      $ekskul[$row['kategori']][] = $row;
    }
    ?>

    <section class="ekskul-section py-5">
      <div class="container">
        <h2 class="mb-5 text-center">Kegiatan Ekstrakurikuler</h2>

        <!-- Tabs -->
        <ul class="nav nav-pills justify-content-center mb-4" id="ekskulTab" role="tablist">
          <?php $tabs = ['seni','fisik','kesehatan','leadership']; $active='active'; ?>
          <?php foreach($tabs as $tab): ?>
          <li class="nav-item">
            <button class="nav-link <?= $active ?>" data-bs-toggle="pill" data-bs-target="#<?= $tab ?>" type="button">
              <?= ucfirst($tab) ?>
            </button>
          </li>
          <?php $active=''; endforeach; ?>
        </ul>

        <!-- Content -->
        <div class="tab-content">
          <?php $active='show active'; foreach($tabs as $tab): ?>
          <div class="tab-pane fade <?= $active ?>" id="<?= $tab ?>">
            <div class="row g-4">
              <?php if (!empty($ekskul[$tab])): foreach($ekskul[$tab] as $item): ?>
              <div class="col-md-6">
                <div class="ekskul-card" data-bs-toggle="modal" data-bs-target="#modal<?= $item['id'] ?>">
                  <i class="<?= $item['icon'] ?>"></i>
                  <h5><?= $item['nama'] ?></h5>
                  <p><?= $item['deskripsi'] ?></p>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="modal<?= $item['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><?= $item['nama'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <p><?= nl2br(htmlspecialchars($item['detail'])) ?></p>
                      <div class="text-center">
                        <?php if($item['gambar1']): ?><img src="<?= $item['gambar1'] ?>" class="img-fluid rounded shadow m-2" style="max-width:400px"><?php endif; ?>
                        <?php if($item['gambar2']): ?><img src="<?= $item['gambar2'] ?>" class="img-fluid rounded shadow m-2" style="max-width:400px"><?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; endif; ?>
            </div>
          </div>
          <?php $active=''; endforeach; ?>
        </div>
      </div>
    </section>


    <?php
    include __DIR__ . '/admin/config/config.php';

    // ambil data kegiatan karakter
    $karakter = $conn->query("SELECT * FROM karakter ORDER BY id DESC");
    ?>

    <section id="pendidikan-karakter" class="container py-5">
      <div class="row mb-3">
        <div class="col-md-6">
          <h2 class="text-start">Pendidikan Karakter</h2>
        </div>
      </div>

      <?php while ($k = $karakter->fetch_assoc()): ?>
        <?php 
          $gambar = $conn->query("SELECT * FROM karakter_gambar WHERE karakter_id = ".$k['id']);
        ?>
        <div class="row align-items-center mb-5">
          <div class="col-md-6">
            <div id="carouselKarakter<?= $k['id'] ?>" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <?php 
                $active = "active";
                while($g = $gambar->fetch_assoc()): ?>
                  <div class="carousel-item <?= $active ?>">
                    <img src="<?= $g['gambar'] ?>" class="d-block w-100 rounded" alt="<?= htmlspecialchars($g['caption']) ?>">
                    <?php if (!empty($g['caption'])): ?>
                      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                        <p class><?= htmlspecialchars($g['caption']) ?></p>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php 
                  $active = ""; // hanya item pertama yang "active"
                  endwhile; 
                ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselKarakter<?= $k['id'] ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselKarakter<?= $k['id'] ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
              </button>
            </div>
          </div>

          <div class="col-md-6 karakter-text" data-aos="fade-right">
            <h3><?= htmlspecialchars($k['judul']) ?></h3>
            <p><?= nl2br(htmlspecialchars($k['deskripsi'])) ?></p>
            <?php if (!empty($k['link'])): ?>
              <a href="<?= htmlspecialchars($k['link']) ?>" class="btn btn-karakter mt-3">Baca Selengkapnya</a>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    </section>


    <section class="stats">
      <div class="stats-container">
        <?php
        $stats = $conn->query("SELECT * FROM stats");
        while($s = $stats->fetch_assoc()):
        ?>
          <div class="stat-card">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="<?= htmlspecialchars($s['ikon']) ?>"></i>
              </div>
              <div class="stat-number"><?= htmlspecialchars($s['angka']) ?></div>
              <p><?= htmlspecialchars($s['deskripsi']) ?></p>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </section>

    <?php
    include __DIR__ . '/admin/config/config.php';
    $berita = $conn->query("SELECT * FROM berita ORDER BY created_at DESC LIMIT 4");
    ?>

    <section id="berita" class="news-section">
      <div class="container">
        <h2 class="section-title" data-aos="fade-up">Berita Terbaru</h2>
        
        <div class="news-grid mb-5">
          <?php while($b = $berita->fetch_assoc()): ?>
            <div class="news-card" data-aos="fade-up">
              <div class="news-image">
                <img
                  src="<?= htmlspecialchars($b['gambar']) ?>"
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
                <a href="berita/detail.php?id=<?= $b['id'] ?>" class="read-more">
                  Baca Selengkapnya
                </a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>


    <section id="alamat" class="alamat-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mt-5 mb-5">
            <div class="alamat-text">
              <h2>Pesantren Tahfidz Daarul Qur'an Al-Jannah</h2>
              <p>
                Jl. Tegal Salam Rt/Rw 22/08<br />
                Kecamatan Cariu<br />
                Kabupaten Bogor, Jawa Barat, 16840
              </p>
              <a href="#">+62 xxx-xxxx-xxxx</a href="#">
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6 mb-5">
            <div class="footer-brand-section">
              <div class="footer-brand">
                <img src="assets/img/logo2.jpg" alt="Logo 2">
              </div>
              <p class="footer-text">
                Daarul Qur'an Al-Jannah
              </p>
              <div class="footer-socials">
                <a href="https://www.instagram.com/pesantrendaqu_aljannah" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/daqu.a.cariu" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.tiktok.com/@daqualjannah" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://www.youtube.com/@pesantrendaqu_aljannah" target="_blank"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 mb-4">
            <h5 class="footer-title">Profil</h5>
            <ul class="footer-links">
              <li><a href="#">Sejarah Pesantren</a></li>
              <li><a href="#">Visi dan Misi</a></li>
              <li><a href="#">Daqu Method</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 mb-4">
            <h5 class="footer-title">News</h5>
            <ul class="footer-links">
              <li><a href="#">Berita Pilihan</a></li>
              <li><a href="#">Artikel</a></li>
              <li><a href="#">Info Akademik</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 mb-4">
            <h5 class="footer-title">Tentang Santri</h5>
            <ul class="footer-links">
              <li><a href="#">Info Santri</a></li>
              <li><a href="#">Info Alumni</a></li>
            </ul>
          </div>
        </div>

        <div class="row-mt-4">
          <div class="col-12">

            <hr class="footer-divider" />
            
            <div class="row align-items-center">
              <p class="footer-copyright">
                &copy; 2025 Pondok Pesantren Tahfidz Daarul Qur'an Al-Jannah
              </p>
            </div>
          </div>
        </div>


      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Javascript -->
    <script src="assets/js/script.js"></script>
    <!-- <script src="script/stats.js"></script> -->
    <script src="assets/js/carousel.js"></script>
  </body>
</html>
