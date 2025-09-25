<?php
include('../admin/config/config.php');
$page = 'info-akademik';
$result = mysqli_query($conn, "SELECT * FROM seo_meta WHERE page='$page' LIMIT 1");
$meta = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $meta['title']; ?></title>
  <meta name="description" content="<?php echo $meta['description']; ?>">
  <meta name="keywords" content="<?php echo $meta['keywords']; ?>">
  <meta property="og:title" content="<?php echo $meta['og_title']; ?>">
  <meta property="og:description" content="<?php echo $meta['og_description']; ?>">
  <meta property="og:image" content="<?php echo $meta['og_image']; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <!-- Fonts google -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

  <!-- font awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <!-- AOS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet"/>

  <link rel="stylesheet" href="../assets/css/akademik.css" />
  <link rel="stylesheet" href="../assets/css/reset.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
<?php include('../includes/navbar.php') ?>

<!-- Hero -->
<section class="hero-akademik" style="margin-top: 70px;">
  <div class="hero-content-akademik">
    <h2 class="hero-title-akademik">Informasi Akademik</h2>
    <p class="hero-subtitle-akademik">
      Program Pendidikan dan Kurikulum Tahfidz Qur'an di Pesantren Daarul Qur'an Al-Jannah
    </p>
    <div class="hero-divider-akademik"></div>
    <p class="hero-arabic">
      وَمَا كَانَ الْمُؤْمِنُونَ لِيَنفِرُوا كَآفَّةً ۚ فَلَوْلَا نَفَرَ
      مِن كُلِّ فِرْقَةٍ مِّنْهُمْ طَآئِفَةٌ لِّيَتَفَقَّهُوا۟ فِى ٱلدِّينِ
    </p>
  </div>
</section>

<main class="main-content">
  <!-- Tombol toggle untuk mobile -->
  <button class="sidebar-toggle d-md-none" onclick="toggleSidebar()" aria-expanded="false" aria-controls="sidebar">
    ☰ Menu Akademik
  </button>

  <div class="content-grid">
    <!-- Sidebar -->
    <aside class="sidebar fixed-sidebar" id="sidebar">
      <h3 class="sidebar-title">Menu Akademik</h3>
      <ul class="sidebar-menu">
        <li><a href="#kurikulum" class="sidebar-menu-item">Kurikulum Pendidikan</a></li>
        <li><a href="#jadwal" class="sidebar-menu-item">Jadwal Harian Santri</a></li>
        <li><a href="#evaluasi" class="sidebar-menu-item">Sistem Evaluasi</a></li>
        <li><a href="#prestasi" class="sidebar-menu-item">Prestasi Santri</a></li>
      </ul>

      <div class="sidebar-announcement">
        <h3 class="sidebar-title">Pengumuman</h3>
        <div class="announcement-list">
          <?php
          $pengumuman = $conn->query("SELECT * FROM pengumuman ORDER BY created_at DESC LIMIT 5");
          while($row = $pengumuman->fetch_assoc()):
          ?>
          <div class="announcement-item <?= htmlspecialchars($row['tipe']) ?>">
            <p class="announcement-text"><strong><?= htmlspecialchars($row['judul']) ?></strong></p>
            <p><?= strip_tags(($row['isi'])) ?></p>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="content-main">
      <!-- Kurikulum -->
      <section id="kurikulum" class="content-section">
        <div class="section-header">
          <div class="section-bullet"></div>
          <h2 class="section-title">Kurikulum Pendidikan</h2>
        </div>
        <div class="two-column-grid">
          <?php
          $kurikulum = $conn->query("SELECT * FROM info_akademik WHERE section='kurikulum'");
          while($row = $kurikulum->fetch_assoc()):
          ?>
          <div>
            <h3 class="subsection-title primary"><?= htmlspecialchars($row['title']) ?></h3>
            <div><?= $row['content'] ?></div>
          </div>
          <?php endwhile; ?>
        </div>
      </section>

      <!-- Jadwal -->
      <section id="jadwal" class="content-section">
        <div class="section-header">
          <div class="section-bullet"></div>
          <h2 class="section-title">Jadwal Harian Santri</h2>
        </div>
        <div class="table-wrapper">
          <table class="schedule-table">
            <thead><tr><th>Waktu</th><th>Kegiatan</th></tr></thead>
            <tbody>
              <?php
              $jadwal = $conn->query("SELECT * FROM jadwal_akademik ORDER BY waktu ASC");
              while($row = $jadwal->fetch_assoc()):
              ?>
              <tr>
                <td><?= htmlspecialchars($row['waktu']) ?></td>
                <td><?= htmlspecialchars($row['kegiatan']) ?></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Evaluasi -->
      <section id="evaluasi" class="content-section">
        <div class="section-header">
          <div class="section-bullet"></div>
          <h2 class="section-title">Sistem Evaluasi</h2>
        </div>
        <div class="two-column-grid">
          <?php
          $evaluasi = $conn->query("SELECT * FROM info_akademik WHERE section='evaluasi' ORDER BY created_at ASC");
          while($row = $evaluasi->fetch_assoc()):
          ?>
          <div class="evaluation-item">
            <h3 class="subsection-title secondary"><?= htmlspecialchars($row['title']) ?></h3>
            <p class="evaluation-desc"><?= nl2br($row['content']) ?></p>
          </div>
          <?php endwhile; ?>
        </div>
      </section>

      <!-- Prestasi -->
      <section id="prestasi" class="content-section">
        <div class="section-header">
          <div class="section-bullet"></div>
          <h2 class="section-title">Prestasi Santri</h2>
        </div>
        <div class="achievement-list">
          <?php
          $prestasi = $conn->query("SELECT * FROM info_akademik WHERE section='prestasi' ORDER BY created_at DESC");
          $i = 1;
          while($row = $prestasi->fetch_assoc()):
          ?>
          <div class="achievement-item">
            <div class="achievement-badge"><?= $i++ ?></div>
            <div>
              <h3 class="achievement-title"><?= htmlspecialchars((string)$row['title']) ?></h3>
              <p class="achievement-desc"><?= nl2br((string)$row['content']) ?></p>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </section>
    </div>
  </div>

  <!-- Overlay untuk sidebar -->
  <div id="sidebar-overlay" class="sidebar-overlay" onclick="closeSidebar()"></div>
</main>

<?php include('../includes/footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function toggleSidebar() {
    const sb = document.getElementById('sidebar');
    const ov = document.getElementById('sidebar-overlay');
    const btn = document.querySelector('.sidebar-toggle');

    sb.classList.toggle('show');
    ov.classList.toggle('show');
    if (btn) btn.setAttribute('aria-expanded', sb.classList.contains('show') ? 'true' : 'false');
  }

  function closeSidebar() {
    const sb = document.getElementById('sidebar');
    const ov = document.getElementById('sidebar-overlay');
    const btn = document.querySelector('.sidebar-toggle');

    sb.classList.remove('show');
    ov.classList.remove('show');
    if (btn) btn.setAttribute('aria-expanded', 'false');
  }

  // Tutup dengan Esc
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape') closeSidebar();
  });

  // Tutup sidebar saat klik link menu (mobile)
  document.addEventListener('click', function(e){
    const link = e.target.closest('.sidebar-menu-item');
    if (link && window.innerWidth <= 767) closeSidebar();
  });
</script>

<!-- AOS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="../assets/js/script.js"></script>
</body>
</html>