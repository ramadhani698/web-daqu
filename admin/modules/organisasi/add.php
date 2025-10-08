<?php
include __DIR__ . '/../../config/config.php';

// Proses form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $sub_kategori = mysqli_real_escape_string($conn, $_POST['sub_kategori']);
    $urutan = mysqli_real_escape_string($conn, $_POST['urutan']);

    $query = "INSERT INTO ostdaqu (nama, jabatan, urutan) VALUES ('$nama', '$jabatan', '$urutan')";
    if (mysqli_query($conn, $query)) {
        header("Location: organisasi.php?status=success");
        exit;
    } else {
        $error = "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="wrapper">
  <div class="content-wrapper p-3">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Tambah Struktur Organisasi</h1>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <?php if (!empty($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <div class="card">
          <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" id="kategori-select" required>
                        <option value="ostdaqu">OSTDAQU</option>
                        <option value="kelas">Ketua Kelas</option>
                        <option value="asrama">Ketua Asrama</option>
                        <option value="mudabbir">Mudabbir</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control" id="jabatan-dropdown">
                        <option value="Ketua OSTDAQU">Ketua OSTDAQU</option>
                        <option value="Wakil Ketua">Wakil Ketua</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Bagian Keamanan">Bagian Keamanan</option>
                        <option value="Bagian Ta'mir Masjid">Bagian Ta'mir Masjid</option>
                        <option value="Bagian Bahasa">Bagian Bahasa</option>
                        <option value="Bagian Kebersihan">Bagian Kebersihan</option>
                        <option value="Bagian Dapur">Bagian Dapur</option>
                        <option value="Bagian Koperasi">Bagian Koperasi</option>
                        <option value="Bagian Olahraga">Bagian Olahraga</option>
                        <option value="Bagian Maintenance">Bagian Maintenance</option>
                        <option value="Bagian Basatino">Bagian Basatino</option>
                        <option value="Bagian Perpustakaan">Bagian Perpustakaan</option>
                    </select>
                </div>

              <div class="form-group">
                <label>Urutan</label>
                <input type="number" name="urutan" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="organisasi.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
        var kategoriSelect = document.getElementById('kategori-select');
        var jabatanDropdown = document.getElementById('jabatan-dropdown').parentNode;
        function toggleJabatanDropdown() {
            if (kategoriSelect.value === 'ostdaqu') {
            jabatanDropdown.style.display = 'block';
            } else {
            jabatanDropdown.style.display = 'none';
            }
        }
        kategoriSelect.addEventListener('change', toggleJabatanDropdown);
        toggleJabatanDropdown(); // initial state
        });
    </script>
  <?php include '../../includes/footer.php'; ?>
</div>