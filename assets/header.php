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
                <li><a class="dropdown-item" href="#">Visi Misi</a></li>
                <li><a class="dropdown-item" href="#">Daqu Method</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown hover-zone">
              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">News</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Berita Pilihan</a></li>
                <li><a class="dropdown-item" href="#">Artikel</a></li>
                <li><a class="dropdown-item" href="#">Info Akademik</a></li>
                <li><a class="dropdown-item" href="#">Info Santri</a></li>
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
