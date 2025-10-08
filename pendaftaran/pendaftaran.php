<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Santri - Pesantren Tahfidz Daarul Qur'an Al-Jannah</title>
    <meta name="description" content="Formulir pendaftaran santri baru di Pesantren Tahfidz Daarul Qur'an Al-Jannah">
    <meta name="keywords" content="pendaftaran, santri, pesantren, daqu, tahfidz">
    <meta property="og:title" content="Pendaftaran Santri - Pesantren Tahfidz Daarul Qur'an Al-Jannah">
    <meta property="og:description" content="Formulir pendaftaran santri baru di Pesantren Tahfidz Daarul Qur'an Al-Jannah">
    <meta property="og:image" content="/assets/img/logo.jpg">
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
    <link rel="stylesheet" href="../assets/css/pendaftaran.css" />

  </head>
  <body>
    <?php include('../includes/navbar.php') ?>

    <!-- Hero Section-->
     <section class="hero-section-pendaftaran">
        <div class="hero-content-pendaftaran fade-in">
            <h2 class="hero-pendaftaran-title">Pondok Pesantren Daarul Qu'ran Al-Jannah.</h2>
            <p class="hero-pendaftaran-subtitle">
                Mencetak Generasi Qur'ani yang Berakhlak Mulia
            </p>
            <div class="btn-container">
                <a href="#registrationForm" class="btn-pendaftaran">Lihat Pendaftaran</a>
            </div>
        </div>
     </section>
    
    <section class="container-pendaftaran" id="registrationForm">
      <div class="pendaftaran">
        <header class="header">
          <h1 class="title">Pendaftaran Santri Baru</h1>
          <p class="subtitle">
            Bergabunglah dengan keluarga besar Pondok Pesantren Modern untuk
            membentuk generasi Qur'ani yang unggul.
          </p>
        </header>
  
        <main class="main-content">
          <div class="info-card">
            <h2 class="card-title">Informasi Pendaftaran</h2>
            <ul class="info-list">
              <li>Usia: 10-18 tahun</li>
              <li>Periode: Tahun Ajaran 2024/2025</li>
              <li>Biaya: Gratis untuk santri berprestasi</li>
              <li>Fasilitas: Asrama, Pendidikan Umum & Agama, Olahraga</li>
            </ul>
            <p class="card-desc">
              Daftar sekarang dan rasakan transformasi spiritual serta intelektual
              yang mendalam.
            </p>
          </div>

          <div class="cta-section">
            <a href="https://forms.gle/LotuWbDLJx3pUwhh7" class="cta-button" target="_blank">
              Daftar Sekarang via Google Form
            </a>
          </div>
        </main>
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
