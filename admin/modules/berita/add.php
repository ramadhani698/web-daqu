<?php
include __DIR__ . "/../../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];

    $gambar = null;
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = __DIR__ . "/../../../uploads/"; 
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $filename = time() . "_" . basename($_FILES['gambar']['name']);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            $gambar = "uploads/" . $filename;
        }
    }

    $stmt = $conn->prepare("INSERT INTO berita (judul, deskripsi, gambar, link, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $judul, $deskripsi, $gambar, $link);
    $stmt->execute();

    header("Location: berita.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="content-wrapper p-3">
    <h1>Tambah Berita</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Deskripsi</label>
          <textarea id="editor" name="deskripsi" class="form-control"><?= isset($data['deskripsi']) ? htmlspecialchars($data['deskripsi']) : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="text" name="link" class="form-control">
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>
