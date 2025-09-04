<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM pengumuman WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tipe = $_POST['tipe'];

    $stmt = $conn->prepare("UPDATE pengumuman SET judul=?, isi=?, tipe=? WHERE id=?");
    $stmt->bind_param("sssi", $judul, $isi, $tipe, $id);
    $stmt->execute();

    header("Location: pengumuman.php?success=2");
    exit;
}

include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/sidebar.php';
?>
<div class="content-wrapper p-3">
  <h2>Edit Pengumuman</h2>
  <form method="POST">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Isi</label>
      <textarea name="isi" id="editor"><?= htmlspecialchars($data['isi']) ?></textarea>
    </div>
    <div class="mb-3">
      <label>Tipe</label>
      <select name="tipe" class="form-control">
        <option value="umum" <?= $data['tipe']=='umum'?'selected':'' ?>>Umum</option>
        <option value="penting" <?= $data['tipe']=='penting'?'selected':'' ?>>Penting</option>
        <option value="darurat" <?= $data['tipe']=='darurat'?'selected':'' ?>>Darurat</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
<?php include '../../includes/footer.php'; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
ClassicEditor.create(document.querySelector('#editor')).catch(e=>console.error(e));
</script>
