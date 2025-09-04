<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tipe = $_POST['tipe'];

    $stmt = $conn->prepare("INSERT INTO pengumuman (judul, isi, tipe) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $judul, $isi, $tipe);
    $stmt->execute();

    header("Location: pengumuman.php?success=1");
    exit;
}

include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/sidebar.php';
?>
<div class="content-wrapper p-3">
  <h2>Tambah Pengumuman</h2>
  <form method="POST">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Isi</label>
      <textarea name="isi" id="editor"></textarea>
    </div>
    <div class="mb-3">
      <label>Tipe</label>
      <select name="tipe" class="form-control">
        <option value="umum">Umum</option>
        <option value="penting">Penting</option>
        <option value="darurat">Darurat</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
<?php include '../../includes/footer.php'; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#editor')).catch(e=>console.error(e));
</script>
