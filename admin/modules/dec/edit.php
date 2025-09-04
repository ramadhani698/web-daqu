<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: dec.php?error=invalid_id");
    exit;
}

// Ambil data lama
$stmt = $conn->prepare("SELECT * FROM daqu_produk WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$produk = $result->fetch_assoc();

if (!$produk) {
    header("Location: dec.php?error=not_found");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama      = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga     = $_POST['harga'];

    $gambar = $produk['gambar'];
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "../../../uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        // Hapus gambar lama kalau ada
        if (!empty($produk['gambar']) && file_exists($targetDir . $produk['gambar'])) {
            unlink($targetDir . $produk['gambar']);
        }

        // Simpan gambar baru
        $gambarBaru = time() . "_" . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetDir . $gambarBaru);
        $gambar = $gambarBaru;
    }

    $stmt = $conn->prepare("UPDATE daqu_produk SET nama = ?, deskripsi = ?, harga = ?, gambar = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nama, $deskripsi, $harga, $gambar, $id);
    $stmt->execute();

    header("Location: dec.php?updated=1");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Edit Produk DEC</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($produk['nama']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea id="editor" name="deskripsi" class="form-control"><?= htmlspecialchars($produk['deskripsi']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="<?= htmlspecialchars($produk['harga']) ?>">
        </div>
        <div class="mb-3">
            <label>Gambar (kosongin kalau nggak mau ganti)</label>
            <input type="file" name="gambar" class="form-control">
            <?php if ($produk['gambar']): ?>
                <small>Gambar saat ini: <?= $produk['gambar'] ?></small>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="dec.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#editor')).catch(error => console.error(error));
</script>