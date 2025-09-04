<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul      = $_POST['judul'];
    $deskripsi  = $_POST['deskripsi'];
    $kategori   = $_POST['kategori'];

    $gambar = null;
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "../../../img/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $gambar = time() . "_" . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetDir . $gambar);
    }

    $stmt = $conn->prepare("INSERT INTO galeri (judul, deskripsi, kategori, gambar, created_at) 
    VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $judul, $deskripsi, $kategori, $gambar);
    $stmt->execute();

    header("Location: galeri.php?success=1");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Tambah Foto Galeri</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea id="editor" name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="kegiatan">Kegiatan</option>
                <option value="pembelajaran">Pembelajaran</option>
                <option value="prestasi">Prestasi</option>
                <option value="fasilitas">Fasilitas</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="galeri.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>
