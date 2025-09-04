<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$santri = $conn->query("SELECT * FROM santri WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $conn->real_escape_string($_POST['nama']);
    $kelas = $conn->real_escape_string($_POST['kelas']);
    $hafalan = $conn->real_escape_string($_POST['hafalan']);
    $asal = $conn->real_escape_string($_POST['asal']);

    $conn->query("UPDATE santri SET nama='$nama', kelas='$kelas', hafalan='$hafalan', asal='$asal' WHERE id=$id");
    header("Location: santri.php");
    exit;
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Santri</h1>
  </section>

  <section class="content">
    <form method="POST">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $santri['nama'] ?>" required>
      </div>
      <div class="form-group">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" value="<?= $santri['kelas'] ?>" required>
      </div>
      <div class="form-group">
        <label>Hafalan</label>
        <input type="text" name="hafalan" class="form-control" value="<?= $santri['hafalan'] ?>" required>
      </div>
      <div class="form-group">
        <label>Asal</label>
        <input type="text" name="asal" class="form-control" value="<?= $santri['asal'] ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
      <a href="santri.php" class="btn btn-secondary">Kembali</a>
    </form>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
