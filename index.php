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
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/stats.css" />

  </head>

  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="img/logo2.jpg" alt="Logo2" height="40">
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
                <li><a class="dropdown-item" href="#">Berita Pilihan</a></li>
                <li><a class="dropdown-item" href="./news/info-akademik.php">Info Akademik</a></li>
                <li><a class="dropdown-item" href="./news/info-santri.php">Info Santri</a></li>
                <li><a class="dropdown-item" href="#">Info Alumni</a></li>
              </ul>
            </li>
            <li class="nav-item"><a href="#" class="nav-link">Galeri</a></li>
            <li class="nav-item"><a href="#" class="nav-link">DEC</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Pendaftaran</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="carouselSlider" class="carousel slide hero-slider-main" data-bs-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <div class="position-relative">
            <img src="img/1.jpg" class="d-block w-100" alt="Image 1" />
            <div class="tagline-container">
              <span class="tagline">Menebar Cahaya Ilmu dan Al-Qur’an</span>
            </div>
            <div class="loading-spinner-wrapper">
              <svg viewBox="25 25 50 50" class="loading-spinner">
                <circle cx="50" cy="50" r="20" class="loader-circle"></circle>
              </svg>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="position-relative">
            <img src="img/sujud.jpg" class="d-block w-100" alt="Image 2" />
            <div class="tagline-container">
              <span class="tagline">Membentuk Generasi Hafidz Berakhlak Qur’ani</span>
            </div>
            <div class="loading-spinner-wrapper">
              <svg viewBox="25 25 50 50" class="loading-spinner">
                <circle cx="50" cy="50" r="20" class="loader-circle"></circle>
              </svg>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="position-relative">
            <img src="img/4.jpg" class="d-block w-100" alt="Image 3" />
            <div class="tagline-container">
              <span class="tagline">16 Tahun Menyalakan Lentera Qur’an di Hati Bangsa</span>
            </div>
            <div class="loading-spinner-wrapper">
              <svg viewBox="25 25 50 50" class="loading-spinner">
                <circle cx="50" cy="50" r="20" class="loader-circle"></circle>
              </svg>
            </div>
          </div>
        </div>

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
          <div class="col-md-6" data-aos="fade-right">
            <div class="why-section">
              <h3 class="mb-4">
                Kenapa harus mondok di Daarul Qur'an Al-Jannah?
              </h3>
            </div>
            <ul class="list-unstyled">
              <li data-aos="fade-right" data-aos-delay="200">
                <strong>Lingkungan Asri & Islami</strong> – Menenangkan jiwa dan
                mendukung pembinaan.
              </li>
              <li data-aos="fade-right" data-aos-delay="400">
                <strong>Pembinaan Tahfidz & Akhlak</strong> – Fokus pada
                karakter dan ilmu.
              </li>
              <li data-aos="fade-right" data-aos-delay="600">
                <strong>Pengajar Profesional</strong> – Dibimbing langsung oleh
                asatidz berpengalaman.
              </li>
              <li data-aos="fade-right" data-aos-delay="800">
                <strong>Fasilitas Nyaman</strong> – Asrama, masjid, dan sarana
                belajar yang menunjang.
              </li>
            </ul>
          </div>

          <div class="col-md-6" data-aos="fade-left">
            <!-- Slider Section -->
            <div class="photo-stack-wrapper">
              <!-- Gambar 1 -->
              <div class="photo photo-right zoom-hover fly-floating">
                <img src="img/Pembinaan-tahfidz.jpg" alt="Suasana pondok" />
              </div>

              <!-- Gambar 2 -->
              <div class="photo photo-left zoom-hover fly-floating">
                <img src="img/lingkungan_asri.jpg" alt="Kegiatan santri" />
              </div>

              <!-- Gambar 3 -->
               <div class="photo photo-center zoom-hover fly-floating">
                <img src="img/pengajar_profesional.jpg" alt="Santri mengaji" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pendidikan-daqu" id="pendidikan-daqu">
      <div class="container">
        <h2 class="pendidikan-title">Pendidikan di Daarul Qur'an Al-Jannah</h2>
        <div class="row justify-content-center">
          <div
            class="col-lg-12 text-center"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <p class="pendidikan-intro">
              Di Daarul Qur'an, pendidikan bukan cuma soal duduk di kelas. Di
              sini, santri dibimbing buat jadi pribadi yang berilmu, berakhlak
              mulia, dan cinta Al-Qur’an. Gaya belajarnya dikemas modern tapi
              tetap kental nilai Islam, jadi gak cuma siap hadapi dunia, tapi
              juga punya bekal dari langit. Programnya dirancang buat bantu
              mereka tumbuh jadi pemimpin, kreatif, dan berjiwa tangguh—karakter
              yang pastinya bikin kita semua bangga.
            </p>
          </div>
        </div>
        <div class="row pendidikan-row g-4" data-aos="fade-up">
          <div class="col-lg-4">
            <div class="pendidikan-card">
              <div class="pendidikan-header">
                <div class="pendidikan-icon-container">
                  <i class="fas fa-mosque"></i>
                </div>
                <h4>Tahfidz Al-Qur'an</h4>
              </div>
              <p>
                Program unggulan untuk membentuk santri penghafal Qur’an dengan
                metode bertahap, muroja’ah harian, dan pendampingan dari ustadz
                berpengalaman. Di sini, hafalan bukan sekadar target, tapi jadi
                bagian dari karakter santri.
              </p>
              <div class="pendidikan-cta">
                <a href="#">Lanjut baca &raquo; </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="pendidikan-card">
              <div class="pendidikan-header">
                <div class="pendidikan-icon-container">
                  <i class="fas fa-language"></i>
                </div>
                <h4>Bahasa Arab & Inggris</h4>
              </div>
              <p>
                Pembelajaran dua bahasa dunia untuk memperkuat literasi Islam
                dan komunikasi global. Santri dibekali kemampuan bicara,
                menulis, dan memahami literatur asli dengan metode interaktif
                dan menyenangkan.
              </p>
              <div class="pendidikan-cta">
                <a href="#">Lanjut baca &raquo; </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="pendidikan-card">
              <div class="pendidikan-header">
                <div class="pendidikan-icon-container">
                  <i class="fas fa-book-open"></i>
                </div>
                <h4>Kurikulum Lengkap</h4>
              </div>
              <p>
                Kombinasi pelajaran sekolah dan kajian pesantren—dari
                Matematika, IPA, hingga fiqih dan sejarah Islam. Semua dirancang
                harmonis agar santri tumbuh dengan ilmu yang seimbang dan akhlak
                yang kokoh.
              </p>
              <div class="pendidikan-cta">
                <a href="#">Lanjut baca &raquo; </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ekskul-section py-5">
      <div class="container">
        <h2 class="mb-5 text-center" data-aos="fade-up">
          Kegiatan Ekstrakurikuler
        </h2>

        <!-- Tabs Nav -->
        <ul
          class="nav nav-pills justify-content-center mb-4"
          id="ekskulTab"
          role="tablist"
          data-aos="fade-up"
          data-aos-delay="300"
        >
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="seni-tab"
              data-bs-toggle="pill"
              data-bs-target="#seni"
              type="button"
              role="tab"
            >
              Seni
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="fisik-tab"
              data-bs-toggle="pill"
              data-bs-target="#fisik"
              type="button"
              role="tab"
            >
              Fisik
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="kesehatan-tab"
              data-bs-toggle="pill"
              data-bs-target="#kesehatan"
              type="button"
              role="tab"
            >
              Kesehatan
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="leadership-tab"
              data-bs-toggle="pill"
              data-bs-target="#leadership"
              type="button"
              role="tab"
            >
              Leadership
            </button>
          </li>
        </ul>

        <!-- Tabs Content -->
        <div
          class="tab-content"
          id="ekskulTabContent"
        >
          <!-- Seni -->
          <div class="tab-pane fade show active" id="seni" role="tabpanel">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="ekskul-card" data-bs-toggle="modal" data-bs-target="#modalHadroh">
                  <i class="fas fa-drum"></i>
                  <h5>Hadroh / Marawis</h5>
                  <p>
                    Mengenalkan seni musik Islami dan memperkuat ekspresi
                    spiritual lewat irama.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="ekskul-card" data-bs-toggle="modal" data-bs-target="#modalKaligrafi">
                  <i class="fas fa-pen-nib"></i>
                  <h5>Kaligrafi</h5>
                  <p>
                    Mengembangkan seni tulis Al-Qur’an dan memperindah estetika
                    Islami.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Fisik -->
          <div class="tab-pane fade" id="fisik" role="tabpanel">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="ekskul-card" data-bs-toggle="modal" data-bs-target="#modalBeladiri">
                  <i class="fas fa-hand-rock"></i>
                  <h5>Beladiri</h5>
                  <p>
                    Membina ketahanan fisik dan rasa percaya diri melalui
                    latihan rutin.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="ekskul-card" data-bs-toggle="modal" data-bs-target="#modalOlahraga">
                  <i class="fas fa-running"></i>
                  <h5>Olahraga</h5>
                  <p>
                    Menjaga kebugaran jasmani dan semangat sportif dalam
                    berbagai cabang olahraga.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Kesehatan -->
          <div class="tab-pane fade" id="kesehatan" role="tabpanel">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="ekskul-card" data-bs-toggle="modal" data-bs-target="#modalBekam">
                  <i class="fas fa-heartbeat"></i>
                  <h5>Bekam</h5>
                  <p>
                    Mengajarkan teknik pengobatan sunnah yang bermanfaat untuk
                    kesehatan tubuh.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Leadership -->
          <div class="tab-pane fade" id="leadership" role="tabpanel">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="ekskul-card" data-bs-toggle="modal" data-bs-target="#modalMuhadhoroh">
                  <i class="fas fa-microphone-alt"></i>
                  <h5>Muhadhoroh</h5>
                  <p>
                    Melatih kemampuan public speaking dan keberanian tampil di
                    depan umum.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="ekskul-card" data-bs-toggle="modal" data-bs-target="#modalPramuka">
                  <i class="fas fa-campground"></i>
                  <h5>Pramuka</h5>
                  <p>
                    Membentuk jiwa kepemimpinan, kedisiplinan, dan semangat
                    kerja sama.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal Hadroh -->
     <div class="modal fade" id="modalHadroh" tabindex="-1" aria-labelledby="modalHadrohLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalHadrohLabel">Hadroh / Marawis</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>
              Hadroh adalah seni musik Islami yang menggunakan alat pukul seperti rebana dan marawis. Ekskul ini bertujuan memperkuat ekspresi spiritual, kekompakan tim, dan semangat dakwah melalui irama.
            </p>
            <img src="img/hadroh.jpg" alt="Hadroh" class="img-fluid rounded shadow">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Kaligrafi -->
    <div class="modal fade" id="modalKaligrafi" tabindex="-1" aria-labelledby="modalKaligrafiLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalKaligrafiLabel">Kaligrafi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <p>
              Ekskul Kaligrafi bertujuan mengembangkan seni tulis Al-Qur’an dengan teknik yang indah dan penuh makna. Peserta akan belajar berbagai gaya kaligrafi seperti Naskhi, Tsulutsi, dan Diwani, serta memperkuat estetika Islami dalam karya mereka.
            </p>
            <ul>
              <li>Belajar teknik dasar dan lanjutan kaligrafi Arab</li>
              <li>Latihan membuat karya kaligrafi untuk lomba atau dekorasi</li>
              <li>Menumbuhkan rasa cinta terhadap Al-Qur’an melalui seni</li>
            </ul>
            <img src="img/kaligrafi.jpg" alt="Kaligrafi" class="img-fluid rounded shadow mt-3">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Beladiri -->
    <div class="modal fade" id="modalBeladiri" tabindex="-1" aria-labelledby="modalBeladiriLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalBeladiriLabel">Beladiri</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <p>
              Ekskul Beladiri bertujuan membina ketahanan fisik, mental, dan rasa percaya diri melalui latihan teknik dasar dan lanjutan. Santri akan dilatih disiplin, fokus, dan keberanian dalam menghadapi tantangan.
            </p>
            <ul>
              <li>Latihan teknik dasar beladiri (pukulan, tangkisan, kuda-kuda)</li>
              <li>Simulasi pertahanan diri dalam situasi nyata</li>
              <li>Menanamkan nilai sportivitas dan kontrol diri</li>
            </ul>
            <img src="img/beladiri.jpg" alt="Beladiri" class="img-fluid rounded shadow mt-3">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Olahraga -->
    <div class="modal fade" id="modalOlahraga" tabindex="-1" aria-labelledby="modalOlahragaLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalOlahragaLabel">Olahraga</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <p>
              Ekskul Olahraga bertujuan menjaga kebugaran jasmani dan menumbuhkan semangat sportif. Santri akan dilatih dalam berbagai cabang olahraga seperti futsal, voli, dan atletik, serta diajarkan nilai kerja sama dan disiplin.
            </p>
            <ul>
              <li>Latihan rutin untuk kebugaran dan stamina</li>
              <li>Kompetisi internal dan antar sekolah</li>
              <li>Menanamkan semangat fair play dan kerja tim</li>
            </ul>
            <img src="img/olahraga.jpg" alt="Olahraga" class="img-fluid rounded shadow mt-3">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Bekam -->
    <div class="modal fade" id="modalBekam" tabindex="-1" aria-labelledby="modalBekamLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalBekamLabel">Bekam</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <p>
              Ekskul Bekam mengajarkan teknik pengobatan sunnah yang telah dikenal sejak zaman Nabi ﷺ. Santri dibimbing untuk memahami teori dasar bekam, manfaatnya bagi kesehatan, serta praktik bekam yang aman dan sesuai syariat.
            </p>
            <ul>
              <li>Teori dasar dan sejarah pengobatan bekam</li>
              <li>Praktik bekam dengan alat steril dan prosedur aman</li>
              <li>Menumbuhkan kepedulian terhadap kesehatan dan sunnah</li>
            </ul>
            <img src="img/bekam.jpg" alt="Bekam" class="img-fluid rounded shadow mt-3">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Muhadhoroh -->
    <div class="modal fade" id="modalMuhadhoroh" tabindex="-1" aria-labelledby="modalMuhadhorohLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalMuhadhorohLabel">Muhadhoroh</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <p>
              Ekskul Muhadhoroh melatih santri dalam seni berbicara di depan umum, baik dalam bahasa Arab, Indonesia, maupun Inggris. Kegiatan ini bertujuan membentuk kepercayaan diri, kemampuan retorika, dan penguasaan materi dakwah.
            </p>
            <ul>
              <li>Latihan pidato rutin dengan berbagai tema</li>
              <li>Penguatan bahasa dan gaya komunikasi</li>
              <li>Simulasi tampil di depan publik dan lomba pidato</li>
            </ul>
            <img src="img/muhadhoroh.jpg" alt="Muhadhoroh" class="img-fluid rounded shadow mt-3">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Pramuka -->
    <div class="modal fade" id="modalPramuka" tabindex="-1" aria-labelledby="modalPramukaLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalPramukaLabel">Pramuka</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <p>
              Ekskul Pramuka membentuk karakter santri yang mandiri, disiplin, dan cinta alam. Kegiatan meliputi latihan baris-berbaris, survival, tali-temali, dan kegiatan lapangan yang menumbuhkan jiwa kepemimpinan dan kerja sama.
            </p>
            <ul>
              <li>Latihan rutin baris-berbaris dan teknik kepramukaan</li>
              <li>Kegiatan alam terbuka dan simulasi survival</li>
              <li>Penguatan karakter, tanggung jawab, dan kepemimpinan</li>
            </ul>
            <img src="img/pramuka.jpg" alt="Pramuka" class="img-fluid rounded shadow mt-3">
          </div>
        </div>
      </div>
    </div>

    <section id="pendidikan-karakter" class="container py-5">
      <div class="row mb-3">
        <div class="col-md-6">
          <h2 class="text-start">Pendidikan Karakter</h2>
        </div>
      </div>

      <div class="row align-items-center mb-5">
        <div class="col-md-6">
          <div
            id="carouselKarakter"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <!-- Slide Panggung Gembira -->
              <div class="carousel-item active">
                <img
                  src="img/PG-3.jpg"
                  class="d-block w-100 rounded"
                  alt="Panggung Gembira"
                />
                <div
                  class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2"
                >
                  <h5>Panggung Gembira</h5>
                  <p>
                    Ekspresi seni dan bakat santri dalam bentuk pertunjukan yang
                    membangun karakter positif.
                  </p>
                </div>
              </div>
              <!-- Slide OSTDA -->
              <div class="carousel-item">
                <img
                  src="img/masjid.jpg"
                  class="d-block w-100 rounded"
                  alt="Organisasi Pesantren"
                />
                <div
                  class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2"
                >
                  <h5>OSTDA</h5>
                  <p>
                    Struktur organisasi yang mengasah kepemimpinan, tanggung
                    jawab, dan komunikasi santri.
                  </p>
                </div>
              </div>
            </div>

            <!-- Tombol navigasi -->
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselKarakter"
              data-bs-slide="prev"
            >
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselKarakter"
              data-bs-slide="next"
            >
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </div>

        <div class="col-md-6 karakter-text" data-aos="fade-right">
          <h3>Kegiatan Pembentukan Karakter</h3>
          <p>
            Melalui program seperti Panggung Gembira dan OSTDA, santri dilatih
            mengembangkan kreativitas, kepemimpinan, serta nilai-nilai moral,
            membentuk pribadi yang tangguh dan berintegritas tinggi.
          </p>
          <a href="#detail-karakter" class="btn btn-karakter mt-3">
            Baca Selengkapnya
          </a>
        </div>
      </div>
    </section>

    <section class="stats">
      <div class="stats-container">
        <div class="stat-card">
          <div class="stat-item">
            <div class="stat-icon">
              <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="stat-number">500+</div>
            <p>Santri Aktif</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-item">
            <div class="stat-icon">
              <i class="fas fa-quran"></i>
            </div>
            <div class="stat-number">200+</div>
            <p>Hafidz Alumni</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-item">
            <div class="stat-icon">
              <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-number">25+</div>
            <p>Ustadz Berpengalaman</p>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-item">
            <div class="stat-icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-number">15+</div>
            <p>Tahun Berdiri</p>
          </div>
        </div>
      </div>
    </section>

    <section id="berita" class="news-section">
      <h2 class="section-title" data-aos="fade-up">Berita Terbaru</h2>
      <div class="card-row mb-5">
        <a href="#" class="card-link">
          <div class="card-container">
            <div class="card">
              <div class="front-content">
                <img src="img/PG-3.jpg" alt="Gambar 1" class="card-img" />
                <div class="card-caption">Panggung Gembira</div>
              </div>
              <div class="content">
                <p class="heading">Judul 1</p>
                <p>Deskripsi singkat berita atau acara</p>
              </div>
            </div>
          </div>
        </a>
        <a href="#" class="card-link">
          <div class="card-container">
            <div class="card">
              <div class="front-content">
                <img src="img/masjid.jpg" alt="Gambar 2" class="card-img" />
                <div class="card-caption">Panggung Gembira</div>
              </div>
              <div class="content">
                <p class="heading">Judul 2</p>
                <p>Deskripsi singkat berita atau acara</p>
              </div>
            </div>
          </div>
        </a>
        <a href="#" class="card-link">
          <div class="card-container">
            <div class="card">
              <div class="front-content">
                <img src="img/PG-3.jpg" alt="Gambar 3" class="card-img" />
                <div class="card-caption">Panggung Gembira</div>
              </div>
              <div class="content">
                <p class="heading">Judul 3</p>
                <p>Deskripsi singkat berita atau acara</p>
              </div>
            </div>
          </div>
        </a>
        <a href="#" class="card-link">
          <div class="card-container">
            <div class="card">
              <div class="front-content">
                <img src="img/masjid.jpg" alt="Gambar 4" class="card-img" />
                <div class="card-caption">Panggung Gembira</div>
              </div>
              <div class="content">
                <p class="heading">Judul 4</p>
                <p>Deskripsi singkat berita atau acara</p>
              </div>
            </div>
          </div>
        </a>

        <!-- Tambahin card lain kalau perlu -->
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

    <?php include('assets/footer.php') ?>

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
