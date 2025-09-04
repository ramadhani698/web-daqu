<?php
include '../../config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $waktu = $_POST['waktu'];
    $kegiatan = $_POST['kegiatan'];

    $stmt = $conn->prepare("INSERT INTO jadwal_akademik (waktu, kegiatan) VALUES (?, ?)");
    $stmt->bind_param("ss", $waktu, $kegiatan);
    $stmt->execute();
    header("Location: jadwal.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Tambah Jadwal</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Waktu</label><br>
            <input type="text" name="waktu" class="form-control" placeholder="04.00 - 05.00" required>
        </div>
        <div class="mb-3">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" required><br><br>
        </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
