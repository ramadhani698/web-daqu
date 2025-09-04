<?php
include '../../config/config.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM jadwal_akademik WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $waktu = $_POST['waktu'];
    $kegiatan = $_POST['kegiatan'];

    $stmt = $conn->prepare("UPDATE jadwal_akademik SET waktu=?, kegiatan=? WHERE id=?");
    $stmt->bind_param("ssi", $waktu, $kegiatan, $id);
    $stmt->execute();
    header("Location: jadwal.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Edit Jadwal</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Waktu</label>
            <input type="text" name="waktu" class="form-control" value="<?= $data['waktu'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Kegiatan:</label>
            <input type="text" name="kegiatan" class="form-control" value="<?= $data['kegiatan'] ?>" required>
        </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
