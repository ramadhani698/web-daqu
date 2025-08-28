<?php
include __DIR__ . '/../../config/config.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM stats WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ikon = $_POST['ikon'];
    $angka = $_POST['angka'];
    $deskripsi = $_POST['deskripsi'];
    $conn->query("UPDATE stats SET ikon='$ikon', angka='$angka', deskripsi='$deskripsi' WHERE id=$id");
    header("Location: stats.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
    <h1>Edit Statistik</h1>
    <form method="POST">
      <div class="mb-3">
        <label>Ikon</label>
        <input type="text" name="ikon" value="<?= htmlspecialchars($data['ikon']) ?>" class="form-control">
      </div>
      <div class="mb-3">
        <label>Angka</label>
        <input type="text" name="angka" value="<?= htmlspecialchars($data['angka']) ?>" class="form-control">
      </div>
      <div class="mb-3">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="<?= htmlspecialchars($data['deskripsi']) ?>" class="form-control">
      </div>
      <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
