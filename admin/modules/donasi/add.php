<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alt     = $_POST['alt'];
    $urutan  = $_POST['urutan'];

    $gambar = null;
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "../../../donasi/uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $gambar = time() . "_" . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetDir . $gambar);
    }

    $stmt = $conn->prepare("INSERT INTO carousel_donasi (gambar, alt, urutan) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $gambar, $alt, $urutan);
    $stmt->execute();

    header("Location: carousel_donasi.php?success=1");
    exit;
}
?>
<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
    <h2>Tambah Carousel Donasi</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" required>
        </div>
        <div class="mb-3">
            <label for="alt" class="form-label">Alt Text</label>
            <input type="text" class="form-control" name="alt">
        </div>
        <div class="mb-3">
            <label for="urutan" class="form-label">Urutan</label>
            <input type="number" class="form-control" name="urutan" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<a href="carousel.php">Kembali</a>