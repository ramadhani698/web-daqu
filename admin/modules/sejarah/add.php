<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $section = $_POST['section'];

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../../../uploads/";
        $image = time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $image);
    }

    $stmt = $conn->prepare("INSERT INTO sejarah (title, content, image, section) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $image, $section);
    $stmt->execute();

    header("Location: sejarah.php?success=1");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Tambah Sejarah</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" id="editor"></textarea>
        </div>
        <div class="mb-3">
            <label>Section</label>
            <select name="section" class="form-control">
                <option value="pesantren">Pesantren</option>
                <option value="yayasan">Yayasan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
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
