<?php
include '../../config/config.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM info_akademik WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $section = $_POST['section'];
    $title   = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE info_akademik SET section=?, title=?, content=? WHERE id=?");
    $stmt->bind_param("sssi", $section, $title, $content, $id);
    $stmt->execute();
    header("Location: akademik.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Edit Info Akademik</h2>
    <form method="POST" enctype="multipart/form-data">
      <label>Section</label>
      <select name="section" class="form-control">
        <option value="kurikulum" <?= $data['section']=='kurikulum'?'selected':'' ?>>Kurikulum</option>
        <option value="evaluasi" <?= $data['section']=='evaluasi'?'selected':'' ?>>Evaluasi</option>
        <option value="prestasi" <?= $data['section']=='prestasi'?'selected':'' ?>>Prestasi</option>
      </select>
    
      <label>Judul</label><br>
      <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($data['title']) ?>">
    
      <label>Konten:</label><br>
      <textarea id="editor" name="content" class="form-control"><?= htmlspecialchars($data['content']) ?></textarea>
    
      <button type="submit" class="btn btn-primary">Update</button>
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