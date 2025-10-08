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
                    <option value="Ketua OSTDAQU" <?php if($data['jabatan'] == "Ketua OSTDAQU") echo "selected"; ?>>Ketua OSTDAQU</option>
                    <option value="Wakil Ketua" <?php if($data['jabatan'] == "Wakil Ketua") echo "selected"; ?>>Wakil Ketua</option>
                    <option value="Sekretaris" <?php if($data['jabatan'] == "Sekretaris") echo "selected"; ?>>Sekretaris</option>
                    <option value="Bendahara" <?php if($data['jabatan'] == "Bendahara") echo "selected"; ?>>Bendahara</option>
                    <option value="Bagian Keamanan" <?php if($data['jabatan'] == "Bagian Keamanan") echo "selected"; ?>>Bagian Keamanan</option>
                    <option value="Bagian Ta'mir Masjid" <?php if($data['jabatan'] == "Bagian Ta'mir Masjid") echo "selected"; ?>>Bagian Ta'mir Masjid</option>
                    <option value="Bagian Bahasa" <?php if($data['jabatan'] == "Bagian Bahasa") echo "selected"; ?>>Bagian Bahasa</option>
                    <option value="Bagian Kebersihan" <?php if($data['jabatan'] == "Bagian Kebersihan") echo "selected"; ?>>Bagian Kebersihan</option>
                    <option value="Bagian Dapur" <?php if($data['jabatan'] == "Bagian Dapur") echo "selected"; ?>>Bagian Dapur</option>
                    <option value="Bagian Koperasi" <?php if($data['jabatan'] == "Bagian Koperasi") echo "selected"; ?>>Bagian Koperasi</option>
                    <option value="Bagian Olahraga" <?php if($data['jabatan'] == "Bagian Olahraga") echo "selected"; ?>>Bagian Olahraga</option>
                    <option value="Bagian Maintenance" <?php if($data['jabatan'] == "Bagian Maintenance") echo "selected"; ?>>Bagian Maintenance</option>
                    <option value="Bagian Basatino" <?php if($data['jabatan'] == "Bagian Basatino") echo "selected"; ?>>Bagian Basatino</option>
                    <option value="Bagian Perpustakaan" <?php if($data['jabatan'] == "Bagian Perpustakaan") echo "selected"; ?>>Bagian Perpustakaan</option>
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