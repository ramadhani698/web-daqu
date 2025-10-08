<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    require_once __DIR__.'/../admin/config/config.php';
    $page = 'daqu-method';
    $result = mysqli_query($conn, "SELECT * FROM seo_meta WHERE page='$page' LIMIT 1");
    $meta = mysqli_fetch_assoc($result);

    echo '<title>' . htmlspecialchars($meta['title']) . '</title>';
    echo '<meta name="description" content="' . htmlspecialchars($meta['description']) . '">';
    echo '<meta name="keywords" content="' . htmlspecialchars($meta['keywords']) . '">';
    echo '<meta property="og:title" content="' . htmlspecialchars($meta['og_title']) . '">';
    echo '<meta property="og:description" content="' . htmlspecialchars($meta['og_description']) . '">';
    echo '<meta property="og:image" content="' . htmlspecialchars($meta['og_image']) . '">';
    ?>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />

    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


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
    <link rel="stylesheet" href="../assets/css/daqu_method.css" />
    
<?php include('../includes/navbar.php') ?>
  </head>
  <body>
    <section class="hero-akademik" style="margin-top: 70px;">
      <div class="hero-content-akademik">
        <h2 class="hero-title-akademik">Metode Daqu</h2>
        <p class="hero-subtitle-akademik">
          Sistem Pembelajaran Terintegrasi Al-Qur'an dan Pengembangan Karakter Santri
        </p>
        <div class="hero-divider-akademik"></div>
        <p class="hero-arabic">
          رَّبِّ زِدۡنِي عِلۡمٗا
        </p>
      </div>
    </section>
    <main>
      <section id="daqu-method" class="content-section">
        <div class="section-header">
          <h2>Daqu Method</h2>
          <div class="underline"></div>
        </div>
        <div class="content-grid">
          <div class="card-nilai" data-aos="fade-up" data-aos-delay="0">
            <div class="number">1</div>
            <h3>Shalat Berjamaah & Jaga Hati, Jaga Sikap</h3>
            <p>
              Menjaga konsistensi ibadah shalat berjamaah dan selalu memperbaiki
              hati serta sikap dalam kehidupan sehari-hari.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="100">
            <div class="number">2</div>
            <h3>Tahajjud, Dhuha & Qabliyah Ba'diyah</h3>
            <p>
              Melaksanakan shalat sunnah untuk mendekatkan diri kepada Allah dan
              memohon berkah-Nya.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="200">
            <div class="number">3</div>
            <h3>Menghafal & Tadabbur Al-Qur'an</h3>
            <p>
              Menghafal ayat-ayat suci Al-Qur'an dan merenungkan maknanya untuk
              pedoman hidup.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="300">
            <div class="number">4</div>
            <h3>Sedekah & Puasa Sunnah</h3>
            <p>
              Membiasakan bersedekah dan berpuasa sunnah untuk membersihkan hati
              dan harta.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="400">
            <div class="number">5</div>
            <h3>Belajar & Mengajar</h3>
            <p>
              Terus mengembangkan ilmu dan berbagi pengetahuan untuk
              kemaslahatan umat.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="500">
            <div class="number">6</div>
            <h3>Doa, Mendoakan & Minta Didoakan</h3>
            <p>
              Membangun budaya saling mendoakan dan memohon pertolongan kepada
              Allah.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="600">
            <div class="number">7</div>
            <h3>Ikhlas, Sabar, Syukur & Ridho</h3>
            <p>
              Menanamkan sifat ikhlas, sabar, syukur, dan ridho dalam setiap
              aktivitas.
            </p>
          </div>
        </div>
      </section>

      <section id="panca-jiwa" class="content-section">
        <div class="section-header">
          <h2>Panca Jiwa Pondok</h2>
          <div class="underline"></div>
        </div>
        <div class="content-grid">
          <div class="card-nilai" data-aos="fade-up" data-aos-delay="0">
            <div class="number">1</div>
            <h3>Keikhlasan</h3>
            <p>
              Melakukan segala sesuatu dengan tulus hanya karena Allah semata.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="100">
            <div class="number">2</div>
            <h3>Kesederhanaan</h3>
            <p>Hidup sederhana dan tidak berlebih-lebihan dalam segala hal.</p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="200">
            <div class="number">3</div>
            <h3>Berdikari</h3>
            <p>
              Mandiri dalam memenuhi kebutuhan dan tidak bergantung pada orang
              lain.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="300">
            <div class="number">4</div>
            <h3>Ukhuwah Islamiyah</h3>
            <p>
              Menjalin persaudaraan yang kuat sesama muslim berdasarkan iman.
            </p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="400">
            <div class="number">5</div>
            <h3>Kebebasan</h3>
            <p>
              Bebas berpikir dan berkreasi selama berada dalam koridor syariat
              Islam.
            </p>
          </div>
        </div>
      </section>

      <section id="motto" class="content-section">
        <div class="section-header">
          <h2>Motto Pendidikan</h2>
          <div class="underline"></div>
        </div>
        <div class="content-grid">
          <div class="card-nilai" data-aos="fade-up" data-aos-delay="0">
            <div class="number">1</div>
            <h3>Berbudi Luhur</h3>
            <p>Menjunjung tinggi akhlak mulia dalam setiap aspek kehidupan.</p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="100">
            <div class="number">2</div>
            <h3>Berbadan Sehat</h3>
            <p>Menjaga kesehatan jasmani dan rohani agar dapat beraktivitas dengan optimal setiap hari.</p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="200">
            <div class="number">3</div>
            <h3>Berpengetahuan Luas</h3>
            <p>Menguasai berbagai ilmu pengetahuan untuk kemaslahatan umat.</p>
          </div>

          <div class="card-nilai" data-aos="fade-up" data-aos-delay="300">
            <div class="number">4</div>
            <h3>Berpikiran Kritis</h3>
            <p>Mengembangkan kemampuan analitis dan pemikiran yang mendalam.</p>
          </div>
        </div>
      </section>
    </main>
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