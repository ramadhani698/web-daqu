<?php
include __DIR__ . "/../../config/config.php";

$id = (int)$_GET['id'];
$data = $conn->query("SELECT * FROM prestasi WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul     = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $kategori  = $_POST['kategori'];
    $nama      = $_POST['nama'];
    $kelas     = $_POST['kelas'];

    // default pakai gambar lama
    $gambar = $data['gambar'];

    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = __DIR__ . '/../../../uploads/'; // folder fisik
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $filename   = time() . "_" . basename($_FILES['gambar']['name']);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            // hapus gambar lama
            if (!empty($data['gambar']) && file_exists($targetDir . $data['gambar'])) {
                unlink($targetDir . $data['gambar']);
            }
            // simpan hanya nama file (biar konsisten)
            $gambar = $filename;
        }
    }

    $stmt = $conn->prepare("UPDATE prestasi 
        SET judul=?, deskripsi=?, kategori=?, nama=?, kelas=?, gambar=? 
        WHERE id=?");
    $stmt->bind_param("ssssssi", $judul, $deskripsi, $kategori, $nama, $kelas, $gambar, $id);
    $stmt->execute();

    header("Location: prestasi.php?updated=1");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="content-wrapper p-3">
    <h1>Edit Prestasi</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea id="editor" name="deskripsi" class="form-control" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" value="<?= htmlspecialchars($data['kategori']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Santri/Tim</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" value="<?= htmlspecialchars($data['kelas']) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            <?php if ($data['gambar']): ?>
                <img src="../../../uploads/<?= htmlspecialchars($data['gambar']) ?>" width="150" class="mb-2"><br>
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
