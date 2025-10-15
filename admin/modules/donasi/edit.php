<?php
include __DIR__ . '/../../config/config.php';

$id = (int)$_GET['id'];
$data = $conn->query("SELECT * FROM carousel_donasi WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alt     = $_POST['alt'];
    $urutan  = $_POST['urutan'];

    $gambar = $data['gambar']; // default pakai gambar lama
    $targetDir = "../../../donasi/uploads/";

    if (!empty($_FILES['gambar']['name'])) {
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $filename   = time() . "_" . basename($_FILES['gambar']['name']);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            // Hapus gambar lama jika ada
            if (!empty($data['gambar']) && file_exists($targetDir . $data['gambar'])) {
                unlink($targetDir . $data['gambar']);
            }
            $gambar = $filename;
        }
    }

    $stmt = $conn->prepare("UPDATE carousel_donasi SET gambar=?, alt=?, urutan=? WHERE id=?");
    $stmt->bind_param("ssii", $gambar, $alt, $urutan, $id);
    $stmt->execute();

    header("Location: carousel.php?updated=1");
    exit;
}
?>
<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
    <h2>Edit Carousel</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label><br>
            <?php if ($data['gambar']): ?>
                <img src="../../../donasi/uploads/<?= htmlspecialchars($data['gambar']) ?>" width="150" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" class="form-control" name="gambar">
        </div>
        <div class="mb-3">
            <label for="alt" class="form-label">Alt Text</label>
            <input type="text" class="form-control" name="alt" value="<?= htmlspecialchars($data['alt']) ?>">
        </div>
        <div class="mb-3">
            <label for="urutan" class="form-label">Urutan</label>
            <input type="number" class="form-control" name="urutan" value="<?= htmlspecialchars($data['urutan']) ?>" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
<a href="carousel.php">Kembali</a>