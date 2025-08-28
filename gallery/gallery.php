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
    <?php include('../includes/navbar.php') ?>

    <section class="hero-gallery">
      <div class="hero-content-gallery">
        <h2 class="hero-title-gallery">Galeri Pesantren Tahfidz Daarul Qur'an Al-Jannah</h2>
        <p class="hero-subtitle-gallery">
          Menyaksikan momen berharga dalam perjalanan menghafal Al-Qur'an
          bersama para santri
        </p>
      </div>
    </section>
    
    <section class="gallery-section">
      <div class="section-header-gallery">
        <h2 class="section-gallery-title">
          Momen Terindah Kami
        </h2>
        <p class="section-gallery-subtitle">
          Berikut adalah dokumentasi kegiatan dan keseharian para santri dalam
          program tahfidz Al-Qur'an
        </p>
      </div>

      <div class="gallery-filter">
        <button class="filter-button active" data-filter="all">Semua</button>
        <button class="filter-button" data-filter="kegiatan">Kegiatan</button>
        <button class="filter-button" data-filter="pembelajaran">Pembelajaran</button>
        <button class="filter-button" data-filter="prestasi">Prestasi</button>
        <button class="filter-button" data-filter="fasilitas">Fasilitas</button>
      </div>

      <div class="gallery-grid">
        <div class="gallery-item" data-category="pembelajaran">
          <img
            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/cd87b00c-b17e-4f08-bca1-52543f050bb1.png"
            alt="Santri sedang menghafal Al-Qur'an di ruang kelas dengan Mushaf terbuka"
            class="gallery-img"
          />
          <div class="gallery-overlay">
            <div class="gallery-caption">
              <h3>Sesi Tahfidz Harian</h3>
              <p>
                Santri sedang menghafal ayat-ayat Al-Qur'an dengan bimbingan
                ustadz
              </p>
            </div>
          </div>
        </div>

        <div class="gallery-item" data-category="kegiatan">
          <img
            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/ea2e4e53-4463-4147-b12e-04276e59ebd7.png"
            alt="Para santri melakukan shalat berjamaah di mushola pesantren dengan saf rapi"
            class="gallery-img"
          />
          <div class="gallery-overlay">
            <div class="gallery-caption">
              <h3>Shalat Berjamaah</h3>
              <p>Kegiatan rutin shalat berjamaah di musholla pesantren</p>
            </div>
          </div>
        </div>

        <div class="gallery-item" data-category="fasilitas">
          <img
            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/89ecd8eb-f187-42c9-bf58-a9a5147c7c92.png"
            alt="Asrama santri yang bersih dan rapi dengan tempat tidur berjejer dan lemari pakaian"
            class="gallery-img"
          />
          <div class="gallery-overlay">
            <div class="gallery-caption">
              <h3>Asrama Santri</h3>
              <p>Fasilitas asrama yang nyaman untuk para santri</p>
            </div>
          </div>
        </div>

        <div class="gallery-item" data-category="kegiatan">
          <img
            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/2b7055f9-0c79-4fd9-b547-0b2cf5ecc9c8.png"
            alt="Santri melakukan olahraga pagi di lapangan dengan latar masjid pesantren"
            class="gallery-img"
          />
          <div class="gallery-overlay">
            <div class="gallery-caption">
              <h3>Olahraga Pagi</h3>
              <p>Kegiatan olahraga rutin untuk menjaga kesehatan santri</p>
            </div>
          </div>
        </div>

        <div class="gallery-item" data-category="prestasi">
          <img
            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/f07255a6-02cb-4b45-be1a-182b823d2158.png"
            alt="Upacara wisuda santri dengan jubah dan peci menghadap panggung kehormatan"
            class="gallery-img"
          />
          <div class="gallery-overlay">
            <div class="gallery-caption">
              <h3>Wisuda Tahfidz</h3>
              <p>
                Momen wisuda bagi santri yang telah menyelesaikan hafalan
                Al-Qur'an
              </p>
            </div>
          </div>
        </div>

        <div class="gallery-item" data-category="pembelajaran">
          <img
            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/1daec45a-2b5a-4f2f-ab8e-1ece14edd28a.png"
            alt="Sesi murojaah hafalan bersama di bawah pohon rindang dengan buku terbuka"
            class="gallery-img"
          />
          <div class="gallery-overlay">
            <div class="gallery-caption">
              <h3>Murojaah Bersama</h3>
              <p>Kegiatan mengulang hafalan bersama di alam terbuka</p>
            </div>
          </div>
        </div>

        <div class="gallery-item" data-category="fasilitas">
          <img
            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/d059aa5c-1130-4a3d-bd8e-61653ed7ed82.png"
            alt="Perpustakaan pesantren dengan rak buku tinggi dan meja baca yang tertata rapi"
            class="gallery-img"
          />
          <div class="gallery-overlay">
            <div class="gallery-caption">
              <h3>Perpustakaan</h3>
              <p>Koleksi buku referensi untuk menunjang pembelajaran</p>
            </div>
          </div>
        </div>

        <div class="gallery-item" data-category="kegiatan">
          <img
            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/ec674c8f-1fd0-4878-b3e2-c86f6b58c451.png"
            alt="Kegiatan outbound santri di alam terbuka dengan aktivitas team building"
            class="gallery-img"
          />
          <div class="gallery-overlay">
            <div class="gallery-caption">
              <h3>Kegiatan Outbound</h3>
              <p>Program pengembangan karakter dan kerja sama tim</p>
            </div>
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

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const filterButtons = document.querySelectorAll(".filter-button");
        const galleryItems = document.querySelectorAll(".gallery-item");

        filterButtons.forEach((button) => {
          button.addEventListener("click", () => {
            // 1. Hapus class active dari semua tombol
            filterButtons.forEach((btn) => btn.classList.remove("active"));
            // 2. Tambahkan class active ke tombol yang diklik
            button.classList.add("active");

            const filter = button.dataset.filter;

            // 3. Tampilkan/hidden item sesuai kategori
            galleryItems.forEach((item) => {
              const category = item.dataset.category;

              if (filter === "all" || category === filter) {
                item.style.display = "block";
              } else {
                item.style.display = "none";
              }
            });
          });
        });
      });
    </script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Javascript -->
    <!-- <script src="../assets/js/script.js"></script> -->
  </body>
</html>