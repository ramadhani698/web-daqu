<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM sejarah WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $section = $_POST['section'];

    $image = $data['image'];
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../../uploads/";
        $newImage = time() . "_" . basename($_FILES['image']['name']);

        // Upload file baru
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $newImage)) {
            // Hapus file lama kalau ada
            if ($image && file_exists($targetDir . $image)) {
                unlink($targetDir . $image);
            }
            $image = $newImage;
        }
    }

    $stmt = $conn->prepare("UPDATE sejarah SET title=?, content=?, image=?, section=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $content, $image, $section, $id);
    $stmt->execute();

    header("Location: sejarah.php?success=1");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
    <h2>Edit Sejarah</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" id="editor"><?= htmlspecialchars($data['content']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Section</label>
            <select name="section" class="form-control">
                <option value="pesantren" <?= $data['section']=='pesantren'?'selected':'' ?>>Pesantren</option>
                <option value="yayasan" <?= $data['section']=='yayasan'?'selected':'' ?>>Yayasan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Gambar</label><br>
            <?php if ($data['image']): ?>
                <img src="../../../uploads/<?= $data['image'] ?>" width="120"><br><br>
            <?php endif; ?>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
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
