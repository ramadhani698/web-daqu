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
    
    <style>
      main {
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        padding: 25px 30px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      }

      h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #2c3e50;
      }

      form fieldset {
        border: 2px solid #2980b9;
        border-radius: 6px;
        padding: 20px 25px;
        margin-bottom: 30px;
      }

      form legend {
        font-weight: 700;
        font-size: 1.2rem;
        color: #2980b9;
        padding: 0 10px;
      }

      label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        color: #34495e;
      }

      input[type="text"],
      input[type="number"],
      input[type="date"],
      input[type="tel"],
      select,
      textarea,
      input[type="file"] {
        width: 100%;
        padding: 8px 10px;
        margin-top: 6px;
        border: 1.5px solid #bdc3c7;
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
      }

      input[type="text"]:focus,
      input[type="number"]:focus,
      input[type="date"]:focus,
      input[type="tel"]:focus,
      select:focus,
      textarea:focus,
      input[type="file"]:focus {
        border-color: #2980b9;
        outline: none;
      }

      textarea {
        resize: vertical;
      }

      .required {
        color: #e74c3c;
        margin-left: 4px;
      }

      button[type="submit"] {
        background-color: #2980b9;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        padding: 12px 25px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        display: block;
        margin: 0 auto 10px auto;
        transition: background-color 0.3s ease;
      }

      button[type="submit"]:hover {
        background-color: #1c5980;
      }

      /* Responsive */
      @media (max-width: 600px) {
        main {
          padding: 15px 20px;
        }

        form fieldset {
          padding: 15px 20px;
        }
      }
    </style>

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

    <main>
      <h1 id="registrationForm">Form Pendaftaran Santri</h1>
      <form action="proses_pendaftaran.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend>A. Pendataan Santri</legend>

          <label for="nama_lengkap"
            >1. Nama Lengkap (Sesuai Akte/KK)
            <span class="required">*</span></label
          >
          <input type="text" id="nama_lengkap" name="nama_lengkap" required />

          <label for="nik"
            >2. NIK (Sesuai Akte/KK) <span class="required">*</span></label
          >
          <input
            type="text"
            id="nik"
            name="nik"
            required
            pattern="\d{16}"
            title="NIK harus 16 digit angka"
          />

          <label for="nisn"
            >3. NISN (diambil dari raport/ijazah sekolah sebelumnya) Jika belum
            punya NISN diisi angka "0" <span class="required">*</span></label
          >
          <input type="number" id="nisn" name="nisn" min="0" required />

          <label for="kip"
            >4. KIP (Kartu Indonesia Pintar) Jika belum punya diisi angka
            "0"</label
          >
          <input type="number" id="kip" name="kip" min="0" />

          <label for="tempat_lahir"
            >5. Tempat Lahir <span class="required">*</span></label
          >
          <input type="text" id="tempat_lahir" name="tempat_lahir" required />

          <label for="tanggal_lahir"
            >6. Tanggal Lahir (Bulan, Hari, Tahun)
            <span class="required">*</span></label
          >
          <input type="date" id="tanggal_lahir" name="tanggal_lahir" required />

          <label for="anak_ke"
            >7. Anak Ke.. <span class="required">*</span></label
          >
          <input type="number" id="anak_ke" name="anak_ke" min="1" required />

          <label for="jumlah_saudara"
            >8. Jumlah Saudara Kakak dan Adek
            <span class="required">*</span></label
          >
          <input
            type="number"
            id="jumlah_saudara"
            name="jumlah_saudara"
            min="0"
            required
          />

          <label for="cita_cita">9. Cita-cita</label>
          <input type="text" id="cita_cita" name="cita_cita" />

          <label for="hobi">10. Hobi</label>
          <input type="text" id="hobi" name="hobi" />

          <label for="pembiaya_sekolah">11. Yang Membiayai Sekolah</label>
          <select id="pembiaya_sekolah" name="pembiaya_sekolah">
            <option value="" disabled selected>Pilih</option>
            <option value="orangtua">Orang Tua</option>
            <option value="wali">Wali/Orang Tua Asuh</option>
            <option value="sendiri">Tanggungan Sendiri</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </fieldset>

        <fieldset>
          <legend>B. Pendataan Orang Tua</legend>

          <label for="no_kk"
            >1. No Kartu Keluarga (dilihat di KK paling atas)
            <span class="required">*</span></label
          >
          <input
            type="text"
            id="no_kk"
            name="no_kk"
            required
            pattern="\d{16}"
            title="No KK harus 16 digit angka"
          />

          <label for="nama_kepala_keluarga"
            >2. Nama Kepala Keluarga (dilihat di KK)
            <span class="required">*</span></label
          >
          <input
            type="text"
            id="nama_kepala_keluarga"
            name="nama_kepala_keluarga"
            required
          />

          <label for="nama_ayah"
            >3. Nama Lengkap Ayah Kandung (dilihat di KK)
            <span class="required">*</span></label
          >
          <input type="text" id="nama_ayah" name="nama_ayah" required />

          <label for="status_ayah"
            >4. Status Ayah Kandung <span class="required">*</span></label
          >
          <select id="status_ayah" name="status_ayah" required>
            <option value="" disabled selected>Pilih status</option>
            <option value="hidup">Hidup</option>
            <option value="meninggal">Meninggal</option>
            <option value="lainnya">Lainnya</option>
          </select>

          <label for="nik_ayah">5. NIK Ayah Kandung (dilihat di KK) <span class="required">*</span></label>
          <input
            type="text"
            id="nik_ayah"
            name="nik_ayah"
            pattern="\d{16}"
            title="NIK Ayah harus 16 digit angka"
          />

          <label for="tempat_lahir_ayah"
            >6. Tempat Lahir Ayah <span class="required">*</span></label
          >
          <input
            type="text"
            id="tempat_lahir_ayah"
            name="tempat_lahir_ayah"
            required
          />

          <label for="tanggal_lahir_ayah"
            >7. Tanggal Lahir Ayah <span class="required">*</span></label
          >
          <input
            type="date"
            id="tanggal_lahir_ayah"
            name="tanggal_lahir_ayah"
            required
          />

          <label for="pendidikan_ayah"
            >8. Pendidikan Terakhir Ayah <span class="required">*</span></label
          >
          <input
            type="text"
            id="pendidikan_ayah"
            name="pendidikan_ayah"
            required
          />

          <label for="pekerjaan_ayah"
            >9. Pekerjaan Ayah (Jika sudah meninggal isi dengan angka "0")
            <span class="required">*</span></label
          >
          <input
            type="text"
            id="pekerjaan_ayah"
            name="pekerjaan_ayah"
            required
          />

          <label for="penghasilan_ayah"
            >10. Penghasilan Rata-rata per bulan</label
          >
          <input type="text" id="penghasilan_ayah" name="penghasilan_ayah" />

          <label for="hp_ayah">11. Nomer Handphone Ayah</label>
          <input
            type="tel"
            id="hp_ayah"
            name="hp_ayah"
            pattern="^\+?\d{9,15}$"
            title="Masukkan nomor telepon yang valid"
          />

          <label for="nama_ibu"
            >12. Nama Lengkap Ibu Kandung <span class="required">*</span></label
          >
          <input type="text" id="nama_ibu" name="nama_ibu" required />

          <label for="status_ibu"
            >13. Status Ibu Kandung <span class="required">*</span></label
          >
          <select id="status_ibu" name="status_ibu" required>
            <option value="" disabled selected>Pilih status</option>
            <option value="hidup">Hidup</option>
            <option value="meninggal">Meninggal</option>
            <option value="lainnya">Lainnya</option>
          </select>

          <label for="nik_ibu">14. NIK Ibu Kandung (dilihat di KK) <span class="required">*</span></label>
          <input
            type="text"
            id="nik_ibu"
            name="nik_ibu"
            pattern="\d{16}"
            title="NIK Ibu harus 16 digit angka"
          />

          <label for="tempat_lahir_ibu"
            >15. Tempat Lahir Ibu <span class="required">*</span></label
          >
          <input
            type="text"
            id="tempat_lahir_ibu"
            name="tempat_lahir_ibu"
            required
          />

          <label for="tanggal_lahir_ibu"
            >16. Tanggal Lahir Ibu <span class="required">*</span></label
          >
          <input
            type="date"
            id="tanggal_lahir_ibu"
            name="tanggal_lahir_ibu"
            required
          />

          <label for="pendidikan_ibu"
            >17. Pendidikan Terakhir Ibu <span class="required">*</span></label
          >
          <input
            type="text"
            id="pendidikan_ibu"
            name="pendidikan_ibu"
            required
          />

          <label for="pekerjaan_ibu"
            >18. Pekerjaan Ibu (Jika sudah meninggal isi dengan angka "0")
            <span class="required">*</span></label
          >
          <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" required />

          <label for="penghasilan_ibu"
            >19. Penghasilan Rata-rata per bulan</label
          >
          <input type="text" id="penghasilan_ibu" name="penghasilan_ibu" />

          <label for="hp_ibu">20. Nomer Handphone Ibu</label>
          <input
            type="tel"
            id="hp_ibu"
            name="hp_ibu"
            pattern="^\+?\d{9,15}$"
            title="Masukkan nomor telepon yang valid"
          />
        </fieldset>

        <fieldset>
          <legend>C. Alamat Orang Tua (dilihat dari KK)</legend>

          <label for="provinsi"
            >1. Provinsi <span class="required">*</span></label
          >
          <input type="text" id="provinsi" name="provinsi" required />

          <label for="kabupaten"
            >2. Kabupaten/Kota <span class="required">*</span></label
          >
          <input type="text" id="kabupaten" name="kabupaten" required />

          <label for="kecamatan"
            >3. Kecamatan <span class="required">*</span></label
          >
          <input type="text" id="kecamatan" name="kecamatan" required />

          <label for="kelurahan"
            >4. Kelurahan/Desa <span class="required">*</span></label
          >
          <input type="text" id="kelurahan" name="kelurahan" required />

          <label for="rt_rw">5. RT/RW <span class="required">*</span></label>
          <input
            type="text"
            id="rt_rw"
            name="rt_rw"
            required
            pattern="^\d{1,3}/\d{1,3}$"
            title="Format RT/RW: 001/002"
          />

          <label for="alamat">6. Alamat <span class="required">*</span></label>
          <textarea id="alamat" name="alamat" rows="3" required></textarea>

          <label for="upload_kk"
            >Upload KK (File Pdf/poto KK) <span class="required">*</span></label
          >
          <input
            type="file"
            id="upload_kk"
            name="upload_kk"
            accept=".pdf,image/*,.doc,.docx,.ppt,.pptx,.dwg"
            required
          />

          <label for="upload_ijazah"
            >Upload Ijazah Terakhir Santri (File Pdf/poto Ijazah) Kosongkan
            apabila belum keluar ijazahnya</label
          >
          <input
            type="file"
            id="upload_ijazah"
            name="upload_ijazah"
            accept=".pdf,image/*,.doc,.docx,.ppt,.pptx,.dwg"
          />
        </fieldset>

        <button type="submit">Daftar</button>
      </form>
    </main>

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
