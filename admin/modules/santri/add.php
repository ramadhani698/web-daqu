<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $conn->real_escape_string($_POST['nama']);
    $kelas = $conn->real_escape_string($_POST['kelas']);
    $hafalan = $conn->real_escape_string($_POST['hafalan']);
    $asal = $conn->real_escape_string($_POST['asal']);

    $conn->query("INSERT INTO santri (nama, kelas, hafalan, asal) VALUES ('$nama', '$kelas', '$hafalan', '$asal')");
    header("Location: santri.php");
    exit;
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Santri</h1>
  </section>

  <section class="content">
    <form method="POST">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Hafalan</label>
        <input type="text" name="hafalan" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Asal</label>
        <input type="text" name="asal" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="santri.php" class="btn btn-secondary">Kembali</a>
    </form>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
