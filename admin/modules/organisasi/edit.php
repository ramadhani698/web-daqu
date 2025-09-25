<?php
include __DIR__ . '/../../config/config.php';

// Ambil data berdasarkan ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM ostdaqu WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan');window.location.href='organisasi.php';</script>";
    exit;
}

// Proses form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $sub_kategori = mysqli_real_escape_string($conn, $_POST['sub_kategori']);
    $urutan = mysqli_real_escape_string($conn, $_POST['urutan']);

    $query_update = "UPDATE ostdaqu SET nama='$nama', jabatan='$jabatan', urutan='$urutan' WHERE id=$id";
    if (mysqli_query($conn, $query_update)) {
        header("Location: organisasi.php?status=updated");
        exit;
    } else {
        $error = "Gagal mengupdate data: " . mysqli_error($conn);
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
        <h1 class="m-0">Edit Struktur Organisasi</h1>
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
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
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
                <input type="number" name="urutan" class="form-control" value="<?= htmlspecialchars($data['urutan']) ?>" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              <a href="organisasi.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include '../../includes/footer.php'; ?>
</div>