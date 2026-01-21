<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donasi - Daarul Quran Al Jannah</title>
    <link rel="stylesheet" href="../assets/css/donasi.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <!-- NAVBAR -->
      <header id="navbar">
          <div class="nav-content">
              <div class="donasi-header">
                  <img src="../assets/img/LOGO-DQ-CARIU-scaled.png" alt="Logo" class="donasi-logo">
                  <div class="rotating-text-container">
                      <span class="rotating-text-lead">
                          Wujudkan kepedulian Anda melalui:
                      </span>
                      <span class="rotating-text">
                          Sedekah • Wakaf • Zakat • Donasi • Infak • Berbagi Kebaikan
                      </span>
                  </div>
              </div>
          </div>
      </header>
    
      <!-- HERO CAROUSEL BOOTSTRAP -->
      <section class="hero">
          <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
              <div class="carousel-inner rounded-4 shadow">
                <?php
                include '../admin/config/config.php';
                $result = mysqli_query($conn, "SELECT * FROM carousel_donasi ORDER BY urutan ASC");
                $active = true;
                while ($row = mysqli_fetch_assoc($result)):
                ?>
                <div class="carousel-item<?= $active ? ' active' : '' ?>">
                    <img src="uploads/<?= htmlspecialchars($row['gambar']) ?>" class="d-block w-100" alt="<?= htmlspecialchars($row['alt']) ?>">
                </div>
                <?php
                $active = false;
                endwhile;
                ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
              </button>
          </div>
      </section>
    
      <!-- TENTANG PROGRAM DONASI -->
      <section class="about-program">
          <div class="about-grid">
            <div class="about-text" data-aos="fade-right">
                <h2 class="about-title">Ayo Dukung Anak-anak Penghafal Qur'an</h2>
                <p class="about-desc">
                    Mari berpartisipasi dalam kebaikan melalui infak, zakat, dan sedekah
                    untuk mendukung anak-anak penghafal Al-Qur’an di Pesantren Daarul Quran Al Jannah.
                    Setiap donasi Anda akan membantu mereka mendapatkan fasilitas pendidikan yang layak,
                    beasiswa, serta dukungan penuh agar dapat fokus menghafal Al-Qur’an dan menuntut ilmu.
                    Bersama kita wujudkan generasi Qur’ani yang berakhlak mulia!
                </p>
            </div>
            <div class="about-img" data-aos="fade-left">
                <img
                src="../assets/img/pembinaan-tahfidz.jpg"
                alt="kegiatan santri"
                />
            </div>
          </div>
      </section>

      <section class="donation-categories">
        <a href="form_donasi.php?kategori=sedekah" class="category text-decoration-none text-dark">
          <img src="../assets/img/icondonasi2.png" alt="Sedekah Icon" />
          <p>Sedekah</p>
        </a>

        <a href="form_donasi.php?kategori=zakat" class="category text-decoration-none text-dark">
          <img src="../assets/img/icondonasi1.png" alt="Zakat Icon" />
          <p>Zakat</p>
        </a>

        <a href="form_donasi.php?kategori=wakaf" class="category text-decoration-none text-dark">
          <img src="https://img.icons8.com/color/48/000000/giving.png" alt="Wakaf Icon" />
          <p>Wakaf</p>
        </a>
      </section>

    
      <!-- PROGRAM DONASI -->
      <section class="program" id="program">
        <div data-aos="fade-up">
          <h2>Program Donasi</h2>

          <?php
          $kategoriList = ['sedekah', 'zakat', 'wakaf'];
          foreach ($kategoriList as $kategori):
            $result = mysqli_query($conn, "SELECT * FROM program_donasi WHERE kategori='$kategori' ORDER BY id DESC");
          ?>
            <h3 style="margin-top:2rem; margin-bottom:1rem; font-size:1rem; text-align:left; font-weight:bold; color:#222;">
              <?= ucfirst($kategori) ?>
            </h3>
            <div id="slider-<?= $kategori ?>" class="splide">
              <div class="splide__track">
                <ul class="splide__list">
                  <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <li class="splide__slide">
                      <a href="detail_donasi.php?id=<?= $row['id'] ?>" class="card-link">
                        <div class="card">
                          <img src="../admin/modules/donasi/uploads/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>">
                          <?php
                            $persen = $row['target'] > 0 ? ($row['terkumpul'] / $row['target']) * 100 : 0;
                          ?>
                          <div class="progress"><div class="bar" style="width: <?= $persen ?>%"></div></div>
                          <small>Terkumpul: Rp<?= number_format($row['terkumpul'],0,',','.') ?> dari Rp<?= number_format($row['target'],0,',','.') ?></small>
                        </div>
                      </a>
                    </li>
                  <?php endwhile; ?>
                </ul>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
    
      <!-- STATISTIK -->
      <section class="statistik">
        <div data-aos="fade-up">
          <div class="stats-grid">
            <div>
              <h3>2,530+</h3>
              <p>Total Donatur</p>
            </div>
            <div>
              <h3>12</h3>
              <p>Program Aktif</p>
            </div>
            <div>
              <h3>Rp850 Jt</h3>
              <p>Dana Tersalurkan</p>
            </div>
          </div>
        </div>
      </section>
    
      <!-- TESTIMONI -->
      <section class="testimoni">
        <div data-aos="fade-up">
          <h2>Testimoni Donatur</h2>
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                "Alhamdulillah, sangat mudah berdonasi di sini!" - Aisyah
              </div>
              <div class="swiper-slide">
                "Programnya transparan dan amanah." - Budi
              </div>
              <div class="swiper-slide">
                "Semoga semakin banyak santri terbantu." - Rina
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- FOOTER -->
    <footer>
      <div class="container footer-grid">
        <div>
          <h3>Daarul Quran Al Jannah</h3>
          <p>
            Jl. Raya Pesantren No. 99, Tangerang<br />Telp: 0812-3456-7890<br />Email:
            info@daqujannah.or.id
          </p>
        </div>
        <div>
          <h4>Link Cepat</h4>
          <ul>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Laporan</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Kebijakan Privasi</a></li>
          </ul>
        </div>
        <div>
          <h4>Ikuti Kami</h4>
          <p>Instagram | YouTube | WhatsApp</p>
        </div>
      </div>
      <p class="copy">
        © 2025 Pesantren Daarul Quran Al Jannah. All rights reserved.
      </p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/slider.js"></script>
    <script src="../assets/js/donasi.js"></script>
    <script>
      AOS.init();
      new Swiper(".mySwiper", { autoplay: { delay: 3000 }, loop: true });
    </script>
  </body>
</html>