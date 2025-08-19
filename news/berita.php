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
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/style.css" />

  </head>
<?php include('../assets/header.php') ?>
  <body>
    <section class="hero-berita">
        <div class="hero-content-berita">
            <h1 class="hero-berita-title">
                Selamat Datang di Halaman Berita Pilihan
            </h1>
            <p class="hero-berita-subtitle">
                Informasi terbaru seputar kegiatan dan kejadian di Pesantren Tahfidz
                Daarul Qur'an Al-Jannah
            </p>
        </div>
    </section>
    
    <div class="container-berita">
      <h2 class="section-title-berita">Berita Terkini</h2>
      <div class="news-grid">
        <div class="news-card">
          <div class="news-image">
            <img
              src="https://placehold.co/600x400?text=Wisuda+Hafidz"
              alt="Wisuda Tahfidz Al-Qur'an dengan santriwan dan santriwati memakai biah gamis putih"
            />
          </div>
          <div class="news-content">
            <div class="news-date">15 Maret 2024</div>
            <h3 class="news-title">Wisuda Tahfidz Angkatan ke-5 Tahun 2024</h3>
            <p class="news-excerpt">
              Pesantren Daarul Qur'an Al-Jannah melaksanakan wisuda tahfidz
              untuk 25 santri yang telah berhasil menghafal 30 juz Al-Qur'an...
            </p>
            <a href="#" class="read-more">Baca Selengkapnya</a>
          </div>
        </div>

        <div class="news-card">
          <div class="news-image">
            <img
              src="https://placehold.co/600x400?text=Mujahadah+Tahfidz"
              alt="Kegiatan mujahadah malam di pesantren dengan lampion dan karpet merah"
            />
          </div>
          <div class="news-content">
            <div class="news-date">10 Maret 2024</div>
            <h3 class="news-title">Mujahadah Malam Jumat Penuh Berkah</h3>
            <p class="news-excerpt">
              Seluruh santri Pesantren Daarul Qur'an Al-Jannah mengadakan
              kegiatan mujahadah malam Jumat dengan pembacaan ma'tsurat dan...
            </p>
            <a href="#" class="read-more">Baca Selengkapnya</a>
          </div>
        </div>

        <div class="news-card">
          <div class="news-image">
            <img
              src="https://placehold.co/600x400?text=Kunjungan+Tokoh"
              alt="Kunjungan ulama besar bersama pengurus pesantren di aula utama"
            />
          </div>
          <div class="news-content">
            <div class="news-date">5 Maret 2024</div>
            <h3 class="news-title">
              Kunjungan Ulama Besar Syaikh Ahmad bin Muhammad
            </h3>
            <p class="news-excerpt">
              Pesantren Daarul Qur'an Al-Jannah kedatangan tamu istimewa, Syaikh
              Ahmad bin Muhammad dari Madinah untuk memberikan tausyiah dan...
            </p>
            <a href="#" class="read-more">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
<?php include('../assets/footer.php') ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Javascript -->
    <script src="script/script.js"></script>
    <script src="script/stats.js"></script>
  </body>
</html>