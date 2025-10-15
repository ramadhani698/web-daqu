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
          <!-- <a href="#donasi" class="btn-primary">Donasi Sekarang</a> -->
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
                <!-- <a href="#program" class="about-link">Lihat Program</a> -->
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
        <div class="category">
          <img
            src="../assets/img/icondonasi1.png"
            alt="Zakat Icon"
          />
          <p>Zakat</p>
        </div>
        <div class="category">
          <img
            src="../assets/img/icondonasi2.png"
            alt="Sedekah Icon"
          />
          <p>Sedekah</p>
        </div>
        <div class="category">
          <img
            src="https://img.icons8.com/color/48/000000/giving.png"
            alt="Wakaf Icon"
          />
          <p>Wakaf</p>
        </div>
        <div class="category">
          <img
            src="https://img.icons8.com/color/48/000000/heart-with-pulse.png"
            alt="Donasi Otomatis Icon"
          />
          <p>Donasi Otomatis</p>
        </div>
      </section>
    
      <!-- PROGRAM DONASI -->
      <section class="program" id="program">
        <div data-aos="fade-up">
          <h2>Program Donasi</h2>

          <!-- Bagian Sedekah -->
          <h3 style="margin-top:1rem; margin-bottom:1rem; font-size:1rem; text-align:left; font-weight:bold; color:#222;">Sedekah</h3>
          <div id="slider-sedekah" class="splide">
            <div class="splide__track">
              <ul class="splide__list">
                <li class="splide__slide">
                  <div class="card">
                    <img src="../assets/img/donasi1.jpeg" alt="">
                    <div class="progress"><div class="bar" style="width: 60%"></div></div>
                    <small>Terkumpul: Rp60.000.000 dari Rp100.000.000</small>
                  </div>
                </li>
                <li class="splide__slide">
                  <div class="card">
                    <img src="../assets/img/donasi2.jpeg" alt="">
                    <div class="progress"><div class="bar" style="width: 45%"></div></div>
                    <small>Terkumpul: Rp45.000.000 dari Rp100.000.000</small>
                  </div>
                </li>
                <li class="splide__slide">
                  <div class="card">
                    <img src="../assets/img/donasi3.jpeg" alt="">
                    <div class="progress"><div class="bar" style="width: 75%"></div></div>
                    <small>Terkumpul: Rp75.000.000 dari Rp100.000.000</small>
                  </div>
                </li>
                <li class="splide__slide">
                  <div class="card">
                    <img src="../assets/img/donasi2.jpeg" alt="">
                    <div class="progress"><div class="bar" style="width: 45%"></div></div>
                    <small>Terkumpul: Rp45.000.000 dari Rp100.000.000</small>
                  </div>
                </li>
                <li class="splide__slide">
                  <div class="card">
                    <img src="../assets/img/donasi1.jpeg" alt="">
                    <div class="progress"><div class="bar" style="width: 60%"></div></div>
                    <small>Terkumpul: Rp60.000.000 dari Rp100.000.000</small>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <!-- Bagian Zakat -->
          <h3 style="margin-top:2rem; margin-bottom:1rem; font-size:1rem; text-align:left; font-weight:bold; color:#222;">Zakat</h3>
          <div id="slider-zakat" class="splide">
            <div class="splide__track">
              <ul class="splide__list">
                <li class="splide__slide">
                  <div class="card">
                    <img src="../assets/img/donasi1.jpeg" alt="">
                    <div class="progress"><div class="bar" style="width: 60%"></div></div>
                    <small>Terkumpul: Rp60.000.000 dari Rp100.000.000</small>
                  </div>
                </li>
                <li class="splide__slide">
                  <div class="card">
                    <img src="../assets/img/donasi2.jpeg" alt="">
                    <div class="progress"><div class="bar" style="width: 45%"></div></div>
                    <small>Terkumpul: Rp45.000.000 dari Rp100.000.000</small>
                  </div>
                </li>
                <li class="splide__slide">
                  <div class="card">
                    <img src="../assets/img/donasi3.jpeg" alt="">
                    <div class="progress"><div class="bar" style="width: 75%"></div></div>
                    <small>Terkumpul: Rp75.000.000 dari Rp100.000.000</small>
                  </div>
                </li>
              </ul>
            </div>
          </div>
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
    
      <!-- FORM DONASI -->
      <section class="form-donasi" id="donasi">
        <div data-aos="fade-up">
          <h2>Formulir Donasi</h2>
          <form>
            <input type="text" placeholder="Nama Lengkap" required />
            <input type="text" placeholder="Nomor HP / Email" required />
            <div class="nominal">
              <button type="button">Rp50.000</button>
              <button type="button">Rp100.000</button>
              <button type="button">Rp250.000</button>
              <button type="button">Rp500.000</button>
            </div>
            <input type="number" placeholder="Nominal Lainnya" />
            <select>
              <option>Pilih Metode Pembayaran</option>
              <option>Transfer Bank</option>
              <option>QRIS</option>
              <option>E-Wallet</option>
            </select>
            <button type="submit" class="btn-primary">Kirim Donasi</button>
          </form>
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