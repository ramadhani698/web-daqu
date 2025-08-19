<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tahfizh Al-Qur'an</title>
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
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/style.css" />
    
<?php include('../assets/header.php') ?>
  </head>
  <body>
    <!-- Hero Section -->
     <section class="hero-tahfizh" id="home">
        <div class="hero-overlay-tahfizh"></div>
        <div class="container">
            <div class="hero-content-tahfizh">
                <h1 class="hero-title-tahfizh"></h1>
                <p class="hero-subtitle-tahfizh">
                    Mencetak Generasi Penghafal Al-Qur'an yang Berakhlak Mulia
                </p>
                <a href="#program-tahfizh" class="btn-tahfizh">Lihat Program</a>
            </div>
        </div>
     </section>

    <!-- Program Section -->
     <section class="program-tahfizh" id="program-tahfizh">
        <div class="container">
            <h2 class="section-title-tahfizh">Program Unggulan Kami</h2>
            <div class="section-divider-tahfizh"></div>

            <div class="program-grid">
                <div class="program-card">
                    <div class="program-icon">
                        <i class="fas fa-book-quran"></i>
                    </div>
                    <h3 class="card-tahfizh-title">Tahfizh 30 Juz</h3>
                    <p class="card-tahfizh-subtitle">
                        Program intensif menghafal seluruh Al-Qur'an dengan metode khusus
                        dan bimbingan ustadz/ustadzah profesional.
                    </p>
                </div>

                <div class="program-card">
                    <div class="program-icon">
                        <i class="fas fa-mosque"></i>
                    </div>
                    <h3 class="card-tahfizh-title">Tahfizh 10 Juz</h3>
                    <p class="card-tahfizh-subtitle">
                        Program menengah untuk menghafal 10 juz Al-Qur'an dengan fokus
                        pada juz-juz yang sering digunakan dalam ibadah.
                    </p>
                </div>

                <div class="program-card">
                    <div class="program-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="card-tahfizh-title">Tahfizh 10 Juz</h3>
                    <p class="card-tahfizh-subtitle">
                        Program menengah untuk menghafal 10 juz Al-Qur'an dengan fokus
                        pada juz-juz yang sering digunakan dalam ibadah.
                    </p>
                </div>
            </div>
        </div>
     </section>

     <!-- Metode Section -->
      <section class="metode bg-light" id="metode">
        <div class="container">
            <h2 class="section-title-tahfizh">Metode Pembelajaran</h2>
            <div class="section-divider-tahfizh"></div>

            <div class="metode-content">
                <div class="metode-img">
                    <img
                        src="https://placehold.co/500x350"
                        alt="Santri sedang belajar menghafal Al-Qur'an bersama ustadz di ruangan pesantren"
                    />
                </div>
                <div class="metode-text">
                    <h3 class="metode-title">Sistem Talqin dan Muraja'ah</h3>
                    <p class="metode-subtitle">
                        Kami menggunakan metode talqin (pengajaran langsung) dengan sistem
                        satu guru satu murid untuk memastikan hafalan yang benar dan baik.
                    </p>

                    <div class="metode-list">
                        <div class="metode-item">
                            <i class="fas fa-check"></i>
                            <span class="metode-sp">Sesi Hafalan Harian</span>
                        </div>
                        <div class="metode-item">
                            <i class="fas fa-check"></i>
                            <span class="metode-sp">Setoran Mingguan ke Asaatidz</span>
                        </div>
                        <div class="metode-item">
                            <i class="fas fa-check"></i>
                            <span class="metode-sp">Murojaah Bersama</span>
                        </div>
                        <div class="metode-item">
                            <i class="fas fa-check"></i>
                            <span class="metode-sp">Evaluasi Bulanan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

    <?php include('../assets/footer.php') ?>
  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Javascript -->
    <script src="../script/script.js"></script>
  </body>
</html>
