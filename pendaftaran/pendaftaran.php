<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Santri - Pesantren Tahfidz Daarul Qur'an Al-Jannah</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />

    <!-- Fonts google -->assets/
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

    <!-- Hero Section-->
     <section class="hero-section-pendaftaran">
        <div class="hero-content-pendaftaran fade-in">
            <h2 class="hero-pendaftaran-title">Pondok Pesantren Daarul Qu'ran Al-Jannah.</h2>
            <p class="hero-pendaftaran-subtitle">
                Mencetak Generasi Qur'ani yang Berakhlak Mulia
            </p>
            <div class="btn-container">
                <a href="#registrationForm" class="btn-pendaftaran">Lihat Pendaftaran</a>
            </div>
        </div>
     </section>

    <div class="container">
      <form id="registrationForm" class="registration-form" action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data">
        <h2 class="form-title">FORMULIR PENDAFTARAN SANTRI BARU</h2>

        <div class="form-group">
          <h3>DATA PRIBADI</h3>
        </div>

        <div class="form-row">
          <div class="form-col">
            <label for="nama_lengkap"
              >Nama Lengkap (Sesuai Akta Kelahiran)</label
            >
            <input type="text" id="nama_lengkap" name="nama_lengkap" required />
            <span class="error-message" id="nama_error"
              >Nama lengkap harus diisi</span
            >
          </div>

          <div class="form-col">
            <label for="nama_panggilan">Nama Panggilan</label>
            <input type="text" id="nama_panggilan" name="nama_panggilan" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-col">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" required />
          </div>

          <div class="form-col">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input
              type="date"
              id="tanggal_lahir"
              name="tanggal_lahir"
              required
            />
          </div>

          <div class="form-col">
            <label>Jenis Kelamin</label>
            <div class="radio-group">
              <div class="radio-option">
                <input
                  type="radio"
                  id="laki"
                  name="jenis_kelamin"
                  value="Laki-laki"
                  required
                />
                <label for="laki">Laki-laki</label>
              </div>
              <div class="radio-option">
                <input
                  type="radio"
                  id="perempuan"
                  name="jenis_kelamin"
                  value="Perempuan"
                />
                <label for="perempuan">Perempuan</label>
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-col">
            <label for="alamat">Alamat Lengkap</label>
            <textarea id="alamat" name="alamat" required></textarea>
          </div>

          <div class="form-col">
            <label for="no_hp">Nomor HP/WhatsApp</label>
            <input type="tel" id="no_hp" name="no_hp" required />

            <label for="nama_ortu" style="margin-top: 15px"
              >Nama Orang Tua/Wali</label
            >
            <input type="text" id="nama_ortu" name="nama_ortu" required />
          </div>
        </div>

        <div class="form-group">
          <h3>DATA PENDIDIKAN</h3>
        </div>

        <div class="form-row">
          <div class="form-col">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <select
              id="pendidikan_terakhir"
              name="pendidikan_terakhir"
              required
            >
              <option value="">Pilih Pendidikan</option>
              <option value="SD">SD/MI</option>
              <option value="SMP">SMP/MTs</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <div class="form-col">
            <label for="nama_sekolah">Nama Sekolah/Institusi Terakhir</label>
            <input type="text" id="nama_sekolah" name="nama_sekolah" required />
          </div>
        </div>

        <div class="form-row">
          <div class="form-col">
            <label for="tahun_lulus">Tahun Lulus</label>
            <input
              type="number"
              id="tahun_lulus"
              name="tahun_lulus"
              min="1990"
              max="2023"
              required
            />
          </div>

          <div class="form-col">
            <label for="hafalan">Hafalan Al-Qur'an Saat Ini (Juz)</label>
            <select id="hafalan" name="hafalan" required>
              <option value="">Pilih Juz</option>
              <option value="0">Belum Mulai</option>
              <option value="1-5">1-5 Juz</option>
              <option value="6-10">6-10 Juz</option>
              <option value="11-15">11-15 Juz</option>
              <option value="16-20">16-20 Juz</option>
              <option value="21-30">21-30 Juz</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <h3>INFORMASI TAMBAHAN</h3>
        </div>

        <div class="form-row">
          <div class="form-col">
            <label for="motivasi">Motivasi Bergabung dengan Pesantren</label>
            <textarea id="motivasi" name="motivasi" required></textarea>
          </div>

          <div class="form-col">
            <label for="harapan">Harapan Selama Menjadi Santri</label>
            <textarea id="harapan" name="harapan" required></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="form-col">
            <label for="sumber_info"
              >Bagaimana Anda Mengetahui Tentang Pesantren Kami?</label
            >
            <select id="sumber_info" name="sumber_info" required>
              <option value="">Pilih Sumber</option>
              <option value="Keluarga/Teman">Keluarga/Teman</option>
              <option value="Media Sosial">Media Sosial</option>
              <option value="Website">Website</option>
              <option value="Event/Seminar">Event/Seminar</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <div class="form-col">
            <label for="foto">Upload Foto Terbaru (Max 2MB)</label>
            <input
              type="file"
              id="foto"
              name="foto"
              accept="image/*"
              required
            />
          </div>
        </div>

        <button type="submit" class="btn-submit-daftar">DAFTAR SEKARANG</button>
      </form>

      <div class="requirements-daftar">
        <h3 class="daftar-title"><i class="fas fa-clipboard-check"></i> PERSYARATAN PENDAFTARAN</h3>
        <ul>
          <li>Usia minimal 12 tahun dan maksimal 25 tahun</li>
          <li>Mampu membaca Al-Qur'an dengan lancar</li>
          <li>Bersedia mengikuti seluruh aturan dan program pesantren</li>
          <li>Melampirkan fotokopi akta kelahiran dan KTP/Kartu Pelajar</li>
          <li>Melampirkan surat keterangan sehat dari dokter</li>
          <li>
            Melampirkan surat rekomendasi dari tokoh agama/masyarakat (jika ada)
          </li>
          <li>Sanggup membayar biaya pendaftaran dan uang pangkal</li>
        </ul>
      </div>
    </div>
    <?php include('../includes/footer.php') ?>
  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"
    ></script>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Javascript -->
    <!-- <script src="../script/script.js"></script> -->
  </body>
</html>
