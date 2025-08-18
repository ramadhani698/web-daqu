<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info Santri</title>
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
    <link rel="stylesheet" href="../css/santri.css" />
    
<?php include('../assets/header.php') ?>
  </head>
  <body>
    <!-- Hero Section -->
    <section class="hero-section" style="margin-top: 70px;">
      <div class="hero-content">
        <h1 class="hero-title">Informasi Santri Tahfidz</h1>
        <p class="hero-subtitle">
          Platform informasi digital santri tahfidz Qur'an
        </p>
        <p class="hero-ayat">
          وَلَقَدْ يَسَّرْنَا الْقُرْآنَ لِلذِّكْرِ فَهَلْ مِن مُّدَّكِرٍ
        </p>
      </div>
    </section>

    <section class="stat-section">
      <div class="stat-container">
        <div class="stat-grid">
          <div class="stat-card">
            <div class="stat-number">545</div>
            <div class="stat-label">Total Santri</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">32</div>
            <div class="stat-label">Asrama</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">45</div>
            <div class="stat-label">Pengajar</div>
          </div>
          <div class="stat-card">
            <div class="stat-number">17</div>
            <div class="stat-label">Program Tahfiz</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Content -->
    <main class="main-container">
      <!-- Profile Section -->
      <section id="profile" class="profil-section">
        <div class="profil-container">
          <h2 class="profil-title">Profil Santri</h2>
          <div class="profil-divider"></div>

          <!-- Pencarian -->
          <div class="santri-search-wrapper">
            <input
              type="text"
              id="searchSantri"
              placeholder="Cari nama santri..."
              class="santri-search-input"
            />
          </div>

          <!-- Tabel Santri -->
          <div class="santri-wrapper">
            <table class="santri-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>NIS</th>
                  <th>TTL</th>
                  <th>Kelas</th>
                  <th>Asrama</th>
                  <th>Program</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Ahmad Zulfikar</td>
                  <td>2023001</td>
                  <td>Jakarta, 12 Mei 2007</td>
                  <td>X IPA 1</td>
                  <td>Al-Farabi</td>
                  <td>Tahfidz Reguler</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Siti Aminah</td>
                  <td>2023002</td>
                  <td>Bandung, 3 Maret 2008</td>
                  <td>XI IPS 2</td>
                  <td>Aisyah</td>
                  <td>Tahfidz Intensif</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Muhammad Rizki</td>
                  <td>2023003</td>
                  <td>Bekasi, 25 Januari 2006</td>
                  <td>XII IPA 2</td>
                  <td>Umar</td>
                  <td>Tahfidz Reguler</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Fatimah Azzahra</td>
                  <td>2023004</td>
                  <td>Semarang, 9 Juli 2007</td>
                  <td>X IPA 3</td>
                  <td>Khadijah</td>
                  <td>Tahfidz Khusus</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Tim Al-Amin</td>
                  <td>2023005</td>
                  <td>Surabaya, 17 Agustus 2008</td>
                  <td>XI IPA & IPS</td>
                  <td>Ibnu Sina</td>
                  <td>LKTI & Tahfidz</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Info Jumlah Hasil -->
          <div class="santri-pagination-info">
            <p class="text-sm text-gray-700">
              Menampilkan <span class="font-medium" id="startIndex">1</span>
              sampai <span class="font-medium" id="endIndex">5</span>
              dari <span class="font-medium" id="totalResult">5</span> hasil
            </p>
          </div>

          <!-- Navigasi Pagination -->
          <div class="santri-pagination-nav">
            <nav
              class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
              aria-label="Pagination"
            >
              <a href="#" class="pagination-btn prev-page">
                <span class="sr-only">Sebelumnya</span>
                <i class="fas fa-chevron-left"></i>
              </a>
              <a href="#" class="pagination-btn active">1</a>
              <a href="#" class="pagination-btn">2</a>
              <a href="#" class="pagination-btn next-page">
                <span class="sr-only">Berikutnya</span>
                <i class="fas fa-chevron-right"></i>
              </a>
            </nav>
          </div>
        </div>
      </section>
     

      <!-- Achievements Section -->
      <section id="prestasi" class="prestasi-section">
        <div class="prestasi-container">
            <div class="prestasi-header">
                <h2 class="prestasi-title">Prestasi Santri</h2>
                <div class="prestasi-divider"></div>
            </div>
            <div class="prestasi-grid">
                <!-- Card Prestasi -->
                 <div class="prestasi-card">
                    <img src="https://placehold.co/600x400" alt="Santri MTQ" class="prestasi-image">
                    <div class="prestasi-content">
                        <div class="prestasi-label">Lomba Tilawah</div>
                        <h3 class="prestasi-heading">Juara 1 MTQ Nasional 2024</h3>
                        <p class="prestasi-desc">
                            Muhammad Rizki berhasil meraih juara 1 Musabaqah Tilawatil Quran tingkat nasional mewakili Provinsi Jawa Barat.
                        </p>
                        <div class="prestasi-profile">
                            <img src="https://placehold.co/40x40" alt="Profil Rizki" class="prestasi-avatar">
                            <p class="prestasi-name">Muhammad Rizki</p>
                            <p class="prestasi-class">XII IPA 2</p>
                        </div>
                    </div>
                 </div>
                 <div class="prestasi-card">
                    <img src="https://placehold.co/600x400" alt="Santri LKTI" class="prestasi-image">
                    <div class="prestasi-content">
                        <div class="prestasi-label">Karya Tulis</div>
                        <h3 class="prestasi-heading">Inovasi Teknologi Ramah Lingkungan</h3>
                        <p class="prestasi-desc">
                            Tim santri Daqu Al-Jannah berhasil meraih juara 2 LKTI tingkat provinsi dengan karya inovasi pengelolaan sampah berbasis digital.
                        </p>
                        <div class="prestasi-profile">
                            <img src="https://placehold.co/40x40" alt="Profil Tim Al-Jannah" class="prestasi-avatar">
                            <p class="prestasi-name">Tim Al-Jannah</p>
                            <p class="prestasi-class">XI IPA & IPS</p>
                        </div>
                    </div>
                 </div>
                 <div class="prestasi-card">
                    <img src="https://placehold.co/600x400" alt="Santri OSN" class="prestasi-image">
                    <div class="prestasi-content">
                        <div class="prestasi-label">Olimpiade</div>
                        <h3 class="prestasi-heading">Medali Perak OSN Matematika</h3>
                        <p class="prestasi-desc">
                            Fatimah Azzahra berhasil meraih medali perak Olimpiade Sains Nasional bidang Matematika mewakili Jawa Barat.
                        </p>
                        <div class="prestasi-profile">
                            <img src="https://placehold.co/40x40" alt="Profil Fatimah" class="prestasi-avatar">
                            <p class="prestasi-name">Fatimah Azzahra</p>
                            <p class="prestasi-class">XII IPA 2</p>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
      </section>

      <!-- Quran Memorization Section -->
      <section id="quran-memorization" class="hafalan-section">
        <div class="hafalan-container">
          <h2 class="hafalan-title">Hafalan Qur'an</h2>
          <div class="hafalan-divider"></div>

          <!-- Pencarian -->
          <div class="hafalan-search-wrapper">
            <input
              type="text"
              id="searchHafalan"
              placeholder="Cari nama santri..."
              class="hafalan-search-input"
            />
          </div>

          <!-- Tabel Hafalan -->
          <div class="hafalan-wrapper">
            <table class="hafalan-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Santri</th>
                  <th>Juz</th>
                  <th>Surah Terakhir</th>
                  <th>Ayat Terakhir</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="profile-cell">
                      <img src="https://placehold.co/40x40" alt="Foto Ahmad Zulfikar" />
                      <div>
                        <p class="profile-name">Ahmad Zulfikar</p>
                        <p class="profile-location">X IPA 1</p>
                      </div>
                    </div>
                  </td>
                  <td>15</td>
                  <td>Al-Kahfi</td>
                  <td>Ayat 10</td>
                  <td><span class="status-badge">Aktif</span></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <div class="profile-cell">
                      <img src="https://placehold.co/40x40" alt="Foto Siti Aminah" />
                      <div>
                        <p class="profile-name">Siti Aminah</p>
                        <p class="profile-location">XI IPS 2</p>
                      </div>
                    </div>
                  </td>
                  <td>22</td>
                  <td>Al-Ahzab</td>
                  <td>Ayat 45</td>
                  <td><span class="status-badge">Aktif</span></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <div class="profile-cell">
                      <img src="https://placehold.co/40x40" alt="Foto Muhammad Rizki" />
                      <div>
                        <p class="profile-name">Muhammad Rizki</p>
                        <p class="profile-location">XII IPA 2</p>
                      </div>
                    </div>
                  </td>
                  <td>30</td>
                  <td>An-Nas</td>
                  <td>Ayat 6</td>
                  <td><span class="status-badge khatam">Khatam</span></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <div class="profile-cell">
                      <img src="https://placehold.co/40x40" alt="Foto Fatimah Azzahra" />
                      <div>
                        <p class="profile-name">Fatimah Azzahra</p>
                        <p class="profile-location">X IPA 3</p>
                      </div>
                    </div>
                  </td>
                  <td>18</td>
                  <td>Al-Mu’minun</td>
                  <td>Ayat 20</td>
                  <td><span class="status-badge">Aktif</span></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>
                    <div class="profile-cell">
                      <img src="https://placehold.co/40x40" alt="Foto Tim Al-Amin" />
                      <div>
                        <p class="profile-name">Tim Al-Amin</p>
                        <p class="profile-location">XI IPA & IPS</p>
                      </div>
                    </div>
                  </td>
                  <td>25</td>
                  <td>Fussilat</td>
                  <td>Ayat 12</td>
                  <td><span class="status-badge">Aktif</span></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Info Jumlah Hasil -->
          <div class="hafalan-pagination-info">
            <p class="text-sm text-gray-700">
              Menampilkan <span class="font-medium" id="hafalanStart">1</span>
              sampai <span class="font-medium" id="hafalanEnd">5</span>
              dari <span class="font-medium" id="hafalanTotal">5</span> hasil
            </p>
          </div>

          <!-- Navigasi Pagination -->
          <div class="hafalan-pagination-nav">
            <nav
              class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
              aria-label="Pagination"
            >
              <a href="#" class="pagination-btn prev-page">
                <span class="sr-only">Sebelumnya</span>
                <i class="fas fa-chevron-left"></i>
              </a>
              <a href="#" class="pagination-btn active">1</a>
              <a href="#" class="pagination-btn">2</a>
              <a href="#" class="pagination-btn next-page">
                <span class="sr-only">Berikutnya</span>
                <i class="fas fa-chevron-right"></i>
              </a>
            </nav>
          </div>
        </div>
      </section>
    </main>
    <?php include('../assets/footer.php') ?>
  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        // Fungsi animasi angka naik
        function animateCounter(element, target) {
          let current = 0;
          const duration = 2000; // total durasi animasi (ms)
          const frameRate = 20; // interval update (ms)
          const steps = duration / frameRate;
          const increment = target / steps;

          const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
              current = target;
              clearInterval(timer);
            }
            element.textContent = Math.floor(current) + "+";
          }, frameRate);
        }

        // Observer untuk trigger animasi saat section terlihat
        const statObserver = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              const numbers = entry.target.querySelectorAll(".stat-number");
              numbers.forEach((num) => {
                const raw = num.textContent.replace(/[^\d]/g, ""); // buang koma dan +
                const target = parseInt(raw);
                if (!isNaN(target)) {
                  animateCounter(num, target);
                }
              });
              statObserver.unobserve(entry.target); // animasi sekali aja
            }
          });
        });

        // Mulai observe section
        const statSection = document.querySelector(".stat-section");
        if (statSection) {
          statObserver.observe(statSection);
        }
      });

      document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.getElementById("searchSantri");
        const tableRows = document.querySelectorAll(".santri-table tbody tr");
        const totalResult = document.getElementById("totalResult");

        searchInput.addEventListener("input", () => {
          const keyword = searchInput.value.toLowerCase();
          let visibleCount = 0;

          tableRows.forEach((row) => {
            const nama = row.cells[1].textContent.toLowerCase();
            if (nama.includes(keyword)) {
              row.style.display = "";
              visibleCount++;
            } else {
              row.style.display = "none";
            }
          });

          totalResult.textContent = visibleCount;
          document.getElementById("startIndex").textContent = visibleCount > 0 ? 1 : 0;
          document.getElementById("endIndex").textContent = visibleCount;
        });
      });

       document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.getElementById("searchHafalan");
        const rows = document.querySelectorAll(".hafalan-table tbody tr");
        const totalDisplay = document.getElementById("hafalanTotal");
        const startDisplay = document.getElementById("hafalanStart");
        const endDisplay = document.getElementById("hafalanEnd");

        searchInput.addEventListener("input", () => {
          const keyword = searchInput.value.toLowerCase();
          let visibleCount = 0;

          rows.forEach((row) => {
            const nama = row.querySelector(".profile-name").textContent.toLowerCase();
            if (nama.includes(keyword)) {
              row.style.display = "";
              visibleCount++;
            } else {
              row.style.display = "none";
            }
          });

          totalDisplay.textContent = visibleCount;
          startDisplay.textContent = visibleCount > 0 ? 1 : 0;
          endDisplay.textContent = visibleCount;
        });
      });
    </script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Javascript -->
    <script src="../script/script.js"></script>
  </body>
</html>
