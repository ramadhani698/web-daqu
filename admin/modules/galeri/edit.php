<?php
include __DIR__ . "/../../config/config.php";

$id = (int)$_GET['id'];
$data = $conn->query("SELECT * FROM galeri WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul     = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $kategori  = $_POST['kategori'];

    $gambar = $data['gambar']; // default pakai gambar lama

    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = __DIR__ . '/../../../img/';
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $filename   = time() . "_" . basename($_FILES['gambar']['name']);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            if (!empty($data['gambar']) && file_exists($targetDir . $data['gambar'])) {
                unlink($targetDir . $data['gambar']); // hapus lama
            }
            $gambar = $filename;
        }
    }

    $stmt = $conn->prepare("UPDATE galeri SET judul=?, deskripsi=?, kategori=?, gambar=? WHERE id=?");
    $stmt->bind_param("ssssi", $judul, $deskripsi, $kategori, $gambar, $id);
    $stmt->execute();

    header("Location: galeri.php?updated=1");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="content-wrapper p-3">
    <h1>Edit Galeri</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea id="editor" name="deskripsi" class="form-control"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="kegiatan" <?= $data['kategori']=='kegiatan'?'selected':'' ?>>Kegiatan</option>
                <option value="pembelajaran" <?= $data['kategori']=='pembelajaran'?'selected':'' ?>>Pembelajaran</option>
                <option value="prestasi" <?= $data['kategori']=='prestasi'?'selected':'' ?>>Prestasi</option>
                <option value="fasilitas" <?= $data['kategori']=='fasilitas'?'selected':'' ?>>Fasilitas</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            <?php if ($data['gambar']): ?>
                <img src="../../../img/<?= htmlspecialchars($data['gambar']) ?>" width="150" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#editor')).catch(error => console.error(error));
</script>
