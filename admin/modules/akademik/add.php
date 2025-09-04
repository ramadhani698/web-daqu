<?php
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section = $_POST['section'];
    $title   = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO info_akademik (section, title, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $section, $title, $content);
    $stmt->execute();
    header("Location: akademik.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Tambah Info Akademik</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Kategori</label>
            <select name="section" class="form-control">
              <option value="kurikulum">Kurikulum</option>
              <option value="evaluasi">Evaluasi</option>
              <option value="prestasi">Prestasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Judul</label><br>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Konten</label>
            <textarea name="content" id="editor"></textarea>
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
