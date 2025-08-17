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
    <link rel="stylesheet" href="../css/akademik.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/style.css" />
    
    
<?php include('../assets/header.php') ?>
  </head>
  <body>
    <!-- Hero Section -->
    <section class="hero" style="margin-top: 70px;">
      <div class="hero-content">
        <h2 class="hero-title">Informasi Akademik</h2>
        <p class="hero-subtitle">
          Program Pendidikan dan Kurikulum Tahfidz Qur'an di Pesantren Daarul
          Qur'an Al-Jannah
        </p>
        <div class="hero-divider"></div>
        <p class="hero-arabic">
          وَمَا كَانَ الْمُؤْمِنُونَ لِيَنفِرُوا كَآفَّةً ۚ فَلَوْلَا نَفَرَ
          مِن كُلِّ فِرْقَةٍ مِّنْهُمْ طَآئِفَةٌ لِّيَتَفَقَّهُوا۟ فِى ٱلدِّينِ
        </p>
      </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
      <div class="content-grid">
        <!-- Sidebar Menu -->
        <aside class="sidebar fixed-sidebar">
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
              <div class="announcement-item warning">
                <p class="announcement-text">
                  Pengumuman Hasil Ujian Tengah Semester
                </p>
                <p class="announcement-date">12 Juni 2023</p>
              </div>
              <div class="announcement-item success">
                <p class="announcement-text">
                  Pendaftaran Program Tahfidz Gelombang 2
                </p>
                <p class="announcement-date">1 Juli 2023</p>
              </div>
            </div>
          </div>
        </aside>

        <!-- Content -->
        <div class="content-main">
          <!-- Kurikulum Section -->
          <section class="content-section" id="kurikulum">
            <div class="section-header">
              <div class="section-bullet"></div>
              <h2 class="section-title">Kurikulum Pendidikan</h2>
            </div>
            <div class="two-column-grid">
              <div>
                <h3 class="subsection-title primary">Program Inti</h3>
                <ul class="feature-list">
                  <li class="feature-item">
                    <div class="feature-icon primary">✓</div>
                    <div>Tahfidz Qur'an dengan target 30 juz</div>
                  </li>
                  <li class="feature-item">
                    <div class="feature-icon primary">✓</div>
                    <div>Pemahaman Tafsir Al-Qur'an</div>
                  </li>
                  <li class="feature-item">
                    <div class="feature-icon primary">✓</div>
                    <div>Bahasa Arab untuk Pemahaman Qur'an</div>
                  </li>
                </ul>
              </div>
              <div>
                <h3 class="subsection-title secondary">Program Pendukung</h3>
                <ul class="feature-list">
                  <li class="feature-item">
                    <div class="feature-icon secondary">✓</div>
                    <div>Pendidikan Diniyah (Aqidah, Fiqh, Sirah)</div>
                  </li>
                  <li class="feature-item">
                    <div class="feature-icon secondary">✓</div>
                    <div>Keterampilan Hidup dan Kepemimpinan</div>
                  </li>
                  <li class="feature-item">
                    <div class="feature-icon secondary">✓</div>
                    <div>Ekstrakurikuler Seni Islami</div>
                  </li>
                </ul>
              </div>
            </div>
          </section>

          <!-- Jadwal Pembelajaran -->
          <section class="content-section" id="jadwal">
            <div class="section-header">
              <div class="section-bullet"></div>
              <h2 class="section-title">Jadwal Harian Santri</h2>
            </div>
            <div class="table-wrapper">
              <table class="schedule-table">
                <thead>
                  <tr>
                    <th>Waktu</th>
                    <th>Kegiatan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>03:30 - 04:30</td>
                    <td>Qiyamullail & Tahajjud</td>
                  </tr>
                  <tr class="alt">
                    <td>04:30 - 05:30</td>
                    <td>Shalat Subuh & Muroja'ah</td>
                  </tr>
                  <tr>
                    <td>05:30 - 07:00</td>
                    <td>Tahfidz Pagi</td>
                  </tr>
                  <tr class="alt">
                    <td>07:00 - 08:00</td>
                    <td>Sarapan & Persiapan Belajar</td>
                  </tr>
                  <tr>
                    <td>08:00 - 12:00</td>
                    <td>Pelajaran Diniyah</td>
                  </tr>
                  <tr class="highlight">
                    <td>12:00 - 14:00</td>
                    <td>Istirahat & Shalat Dzuhur</td>
                  </tr>
                  <tr>
                    <td>14:00 - 17:00</td>
                    <td>Tahfidz Sore</td>
                  </tr>
                  <tr class="alt">
                    <td>17:00 - 18:30</td>
                    <td>Shalat Maghrib & Makan Malam</td>
                  </tr>
                  <tr>
                    <td>18:30 - 20:30</td>
                    <td>Belajar Malam & Setoran Hafalan</td>
                  </tr>
                  <tr class="alt">
                    <td>20:30 - 21:30</td>
                    <td>Shalat Isya & Persiapan Tidur</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <!-- Sistem Evaluasi -->
          <section class="content-section" id="evaluasi">
            <div class="section-header">
              <div class="section-bullet"></div>
              <h2 class="section-title">Sistem Evaluasi</h2>
            </div>
            <div class="two-column-grid">
              <div>
                <h3 class="subsection-title secondary">Evaluasi Tahfidz</h3>
                <div class="evaluation-list">
                  <div class="evaluation-item">
                    <h4 class="evaluation-title">Setoran Harian</h4>
                    <p class="evaluation-desc">
                      Setiap santri wajib menyetor hafalan minimal 1 halaman
                      kepada musyrif setiap hari.
                    </p>
                  </div>
                  <div class="evaluation-item">
                    <h4 class="evaluation-title">Munaqosyah Bulanan</h4>
                    <p class="evaluation-desc">
                      Ujian hafalan di depan tim penguji untuk mengevaluasi
                      kemajuan hafalan.
                    </p>
                  </div>
                </div>
              </div>
              <div>
                <h3 class="subsection-title secondary">Evaluasi Akademik</h3>
                <div class="evaluation-list">
                  <div class="evaluation-item">
                    <h4 class="evaluation-title">Ujian Tengah Semester</h4>
                    <p class="evaluation-desc">
                      Test pemahaman materi diniyah di pertengahan semester.
                    </p>
                  </div>
                  <div class="evaluation-item">
                    <h4 class="evaluation-title">Ujian Akhir Semester</h4>
                    <p class="evaluation-desc">
                      Evaluasi komprehensif untuk seluruh mata pelajaran di
                      akhir semester.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Prestasi Santri -->
          <section class="content-section" id="prestasi">
            <div class="section-header">
              <div class="section-bullet"></div>
              <h2 class="section-title">Prestasi Santri</h2>
            </div>
            <div class="achievement-list">
              <div class="achievement-item">
                <div class="achievement-badge">1</div>
                <div>
                  <h3 class="achievement-title">Khatam 30 Juz</h3>
                  <p class="achievement-desc">
                    45 santri telah berhasil menyelesaikan hafalan 30 juz dengan
                    mutqin pada tahun 2023.
                  </p>
                  <div class="tag-group">
                    <span class="tag primary">Tahfidz</span>
                    <span class="tag secondary">Prestasi</span>
                  </div>
                </div>
              </div>
              <div class="achievement-item">
                <div class="achievement-badge">2</div>
                <div>
                  <h3 class="achievement-title">Juara MTQ Nasional</h3>
                  <p class="achievement-desc">
                    2 santri meraih juara 1 dan 3 pada Musabaqah Tilawatil
                    Qur'an Tingkat Nasional 2023.
                  </p>
                  <div class="tag-group">
                    <span class="tag primary">MTQ</span>
                    <span class="tag secondary">Nasional</span>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </main>
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