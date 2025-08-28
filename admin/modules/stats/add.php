<?php
include __DIR__ . '/../../config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ikon = $_POST['ikon'];
    $angka = $_POST['angka'];
    $deskripsi = $_POST['deskripsi'];
    $conn->query("INSERT INTO stats (ikon, angka, deskripsi) VALUES ('$ikon','$angka','$deskripsi')");
    header("Location: stats.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
    <h1>Tambah Statistik</h1>
    <form method="POST">
      <div class="mb-3">
        <label>Ikon (FontAwesome class)</label>
        <input type="text" name="ikon" class="form-control" placeholder="fas fa-graduation-cap">
      </div>
      <div class="mb-3">
        <label>Angka</label>
        <input type="text" name="angka" class="form-control" placeholder="500+">
      </div>
      <div class="mb-3">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control" placeholder="Santri Aktif">
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
