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
    <link rel="stylesheet" href="../assets/css/reset.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <?php include('../includes/navbar.php') ?>

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
                  <th>Kelas</th>
                  <th>Hafalan</th>
                  <th>Asal</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include __DIR__ . '/../admin/config/config.php';
                $no = 1;
                $result = $conn->query("SELECT * FROM santri ORDER BY id DESC LIMIT 10");
                while ($row = $result->fetch_assoc()):
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['kelas']) ?></td>
                    <td><?= htmlspecialchars($row['hafalan']) ?></td>
                    <td><?= htmlspecialchars($row['asal']) ?></td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>

          <!-- Info Jumlah Hasil -->
          <div class="santri-pagination-info">
            <p class="text-sm text-gray-700">
              Menampilkan <span class="font-medium" id="startIndex">1</span>
              sampai <span class="font-medium" id="endIndex"><?= $result->num_rows ?></span>
              dari <span class="font-medium" id="totalResult"><?= $result->num_rows ?></span> hasil
            </p>
          </div>

          <!-- Navigasi Pagination (bisa diatur manual / AJAX nanti) -->
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
                <?php
                include __DIR__ . '/../admin/config/config.php';
                $prestasi = $conn->query("SELECT * FROM prestasi ORDER BY created_at DESC");
                ?>

                <?php if ($prestasi->num_rows > 0): ?>
                    <?php while($p = $prestasi->fetch_assoc()): ?>
                        <div class="prestasi-card">
                            <img src="../uploads/<?= htmlspecialchars($p['gambar']) ?>" alt="<?= htmlspecialchars($p['judul']) ?>" class="prestasi-image">
                            <div class="prestasi-content">
                                <div class="prestasi-label"><?= htmlspecialchars($p['kategori']) ?></div>
                                <h3 class="prestasi-heading"><?= htmlspecialchars($p['judul']) ?></h3>
                                <p class="prestasi-desc">
                                    <?= strip_tags($p['deskripsi']) ?>
                                </p>
                                <div class="prestasi-profile">
                                    <img src="https://placehold.co/40x40" alt="<?= htmlspecialchars($p['nama']) ?>" class="prestasi-avatar">
                                    <p class="prestasi-name"><?= htmlspecialchars($p['nama']) ?></p>
                                    <p class="prestasi-class"><?= htmlspecialchars($p['kelas']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Belum ada data prestasi.</p>
                <?php endif; ?>
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
    <!-- <script src="../script/script.js"></script> -->
  </body>
</html>
