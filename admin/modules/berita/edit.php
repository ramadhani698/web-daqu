<?php
include __DIR__ . "/../../config/config.php";
$id = (int)$_GET['id'];
$data = $conn->query("SELECT * FROM berita WHERE id=$id")->fetch_assoc();

// Fungsi untuk membuat slug dari judul
function createSlug($string) {
    $slug = strtolower($string);
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];
    $slug = trim($_POST['slug']);

    // Jika slug kosong, generate dari judul
    if (empty($slug)) {
        $slug = createSlug($judul);
    }

    $gambar = $data['gambar'];
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = __DIR__ . "/../../../uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $filename = time() . "_" . basename($_FILES['gambar']['name']);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            // Hapus file lama jika ada dan bukan kosong
            if (!empty($data['gambar']) && file_exists(__DIR__ . "/../../../" . $data['gambar'])) {
                unlink(__DIR__ . "/../../../" . $data['gambar']);
            }
            $gambar = "uploads/" . $filename;
        }
    }

    $stmt = $conn->prepare("UPDATE berita SET judul=?, deskripsi=?, gambar=?, link=?, slug=? WHERE id=?");
    $stmt->bind_param("sssssi", $judul, $deskripsi, $gambar, $link, $slug, $id);
    $stmt->execute();

    header("Location: berita.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="content-wrapper p-3">
    <h1>Edit Berita</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Deskripsi</label>
          <textarea id="editor" name="deskripsi" class="form-control" required><?= isset($data['deskripsi']) ? htmlspecialchars($data['deskripsi']) : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="text" name="link" value="<?= htmlspecialchars($data['link']) ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            <?php if ($data['gambar']): ?>
                <img src="../../../<?= $data['gambar'] ?>" width="150" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
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