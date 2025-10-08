<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Struktur Organisasi Santri - Pesantren Daarul Qur'an Al-Jannah</title>
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
    <link rel="stylesheet" href="../assets/css/organisasi.css" />
  </head>
  <body>
    <?php include('../includes/navbar.php') ?>
    <header class="header" style="margin-top: 80px;">
      <div class="container">
        <h1>Struktur Organisasi Santri</h1>
        <p>Pesantren Daarul Qur'an Al-Jannah</p>
      </div>
    </header>

    <main class="main-content">
      <div class="container">
        <!-- Organizational Structure Overview -->
        <section class="org-structure">
          <h2>Struktur Organisasi OSTDAQU</h2>
          <div class="structure-chart">
            <?php
            include '../admin/config/config.php';
            $ostdaqu = [];
            $sql = "SELECT * FROM ostdaqu ORDER BY urutan ASC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $ostdaqu[] = $row;
            }
            ?>
            <div class="structure-level top-level">
              <?php foreach ($ostdaqu as $item) {
                if ($item['jabatan'] == 'Ketua OSTDAQU') { ?>
                  <div class="position-card" id="ketua-ostdaqu-btn" style="cursor: pointer;">
                    <div class="position-icon">🕌</div>
                    <h3><?= htmlspecialchars($item['jabatan']) ?></h3>
                    <p><?= htmlspecialchars($item['nama']) ?></p>
                  </div>
              <?php }} ?>
            </div>
            <div class="structure-level anggota-ostdaqu animated-section" id="ostdaqu-section" style="display: none;">
              <?php foreach ($ostdaqu as $item) {
                if ($item['jabatan'] != 'Ketua OSTDAQU') { ?>
                  <div class="position-card">
                    <div class="position-icon">
                      <?php
                      // Icon dinamis berdasarkan jabatan
                      $icons = [
                        'Wakil Ketua' => '🤝',
                        'Sekretaris' => '📝',
                        'Bendahara' => '💰',
                        'Bagian Keamanan' => '🛡️',
                        "Bagian Ta'mir Masjid" => '🕌',
                        'Bagian Bahasa' => '🌐',
                        'Bagian Kebersihan' => '🧹',
                        'Bagian Dapur' => '🍳',
                        'Bagian Koperasi' => '🛒',
                        'Bagian Olahraga' => '🏀',
                        'Bagian Maintenance' => '🛠️',
                        'Bagian Basatino' => '🌳',
                        'Bagian Perpustakaan' => '📚'
                      ];
                      echo $icons[$item['jabatan']] ?? '';
                      ?>
                    </div>
                    <h3><?= htmlspecialchars($item['jabatan']) ?></h3>
                    <p><?= htmlspecialchars($item['nama']) ?></p>
                  </div>
              <?php }} ?>
            </div>
            <div class="connector"></div>

            <?php
            // Ambil data mudabbir dari database
            $mudabbir = [];
            $sql_mudabbir = "SELECT * FROM mudabbir ORDER BY group_name ASC, nama ASC";
            $result_mudabbir = mysqli_query($conn, $sql_mudabbir);
            while ($row = mysqli_fetch_assoc($result_mudabbir)) {
                $mudabbir[$row['group_name']][] = $row['nama'];
            }
            ?>
            <div class="structure-level">
              <?php foreach ($mudabbir as $group => $names): ?>
                <div class="position-card">
                  <div class="position-icon">👨‍💼</div>
                  <h3><?= htmlspecialchars($group) ?></h3>
                  <?php foreach ($names as $nama): ?>
                    <p><?= htmlspecialchars($nama) ?></p>
                  <?php endforeach; ?>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="connector branched"></div>

            <div class="structure-level bottom-level">
              <div class="position-card" id="ketua-kelas-btn" style="cursor: pointer;">
                <div class="position-icon">📚</div>
                <h3>Ketua Kelas</h3>
                <p>Per Jenjang</p>
              </div>

              <div class="position-card" id="ketua-asrama-btn" style="cursor: pointer;">
                <div class="position-icon">🏢</div>
                <h3>Ketua Asrama</h3>
                <p>Per Asrama</p>
              </div>
            </div>

            <!-- Daftar Ketua Kelas -->
              <div id="kelas-section" class="class-section animated-section" style="display:none; gap:16px; margin-top:16px;">
                <?php
                include __DIR__ . '/../admin/config/config.php';
                $result = mysqli_query($conn, "SELECT * FROM ketua_kelas ORDER BY urutan ASC");
                if ($result && mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                ?>
                    <div class="position-card">
                        <div class="position-icon">📚</div>
                        <h3>Ketua Kelas <?= htmlspecialchars($row['kelas']) ?></h3>
                        <p><?= htmlspecialchars($row['nama']) ?></p>
                    </div>
                <?php endwhile; else: ?>
                    <div>Tidak ada data ketua kelas.</div>
                <?php endif; ?>
              </div>

            <!-- Daftar Ketua Asrama -->
              <?php
                // Ambil data ketua asrama dari database
                $asrama_data = [];
                $sql_asrama = "SELECT * FROM ketua_asrama ORDER BY urutan ASC";
                $result_asrama = mysqli_query($conn, $sql_asrama);

                while ($row = mysqli_fetch_assoc($result_asrama)) {
                    $asrama_data[$row['asrama']][] = $row['nama'];
                }
                ?>
                <div id="asrama-section" class="asrama-section animated-section" style="display:none; gap:16px; margin-top:16px;">
                  <?php if (!empty($asrama_data)): ?>
                    <?php foreach ($asrama_data as $asrama => $names): ?>
                      <div class="position-card">
                        <div class="position-icon">🏢</div>
                        <h3>Ketua Asrama <br><?= htmlspecialchars($asrama) ?></h3>
                        <?php foreach ($names as $nama): ?>
                          <p><?= htmlspecialchars($nama) ?></p>
                        <?php endforeach; ?>
                      </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <div>Tidak ada data ketua asrama.</div>
                  <?php endif; ?>
                </div>
          </div>
        </section>
      </div>
    </main>
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
    <script>
      document.getElementById("ketua-ostdaqu-btn").onclick = function () {
        toggleAnimatedSection("ostdaqu-section");
      };
      document.getElementById("ketua-kelas-btn").onclick = function () {
        toggleAnimatedSection("kelas-section");
        document.getElementById("asrama-section").classList.remove("show");
        setTimeout(() => {
          document.getElementById("asrama-section").style.display = "none";
        }, 400);
      };
      document.getElementById("ketua-asrama-btn").onclick = function () {
        toggleAnimatedSection("asrama-section");
        document.getElementById("kelas-section").classList.remove("show");
        setTimeout(() => {
          document.getElementById("kelas-section").style.display = "none";
        }, 400);
      };
    </script>
  </body>
</html>
