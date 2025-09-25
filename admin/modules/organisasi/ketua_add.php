<?php
include __DIR__ . '/../../config/config.php';

// Proses form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $urutan = mysqli_real_escape_string($conn, $_POST['urutan']);
    $query = "INSERT INTO ketua_kelas (nama, kelas, urutan) VALUES ('$nama', '$kelas', '$urutan')";
    if (mysqli_query($conn, $query)) {
        header("Location: ketua.php?status=success");
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
        <h1 class="m-0">Tambah Ketua Kelas</h1>
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
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="1 smp">1 SMP</option>
                        <option value="2 smp">2 SMP</option>
                        <option value="3 smp">3 SMP</option>
                        <option value="1 smk">1 SMk</option>
                        <option value="2 smk">2 SMk</option>
                        <option value="3 smk">3 SMk</option>
                    </select>
                </div>
                <div class="form-group">
                <label>Urutan</label>
                    <input type="number" name="urutan" class="form-control" required>
                </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="ketua.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include '../../includes/footer.php'; ?>
</div>