<?php
require_once __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alt = $conn->real_escape_string($_POST['alt']);
    $urutan = (int) $_POST['urutan'];

    $filename = time() . "_" . basename($_FILES["image"]["name"]);
    $target = __DIR__ . "/../../../uploads/" . $filename;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);

    $conn->query("INSERT INTO carousel (image, alt_text, urutan) VALUES ('$filename', '$alt', $urutan)");
    header("Location: carousel.php?msg=added");
    exit;
}
?>
<?php include '../../includes/header.php'; ?>
<div class="wrapper">
  <?php include '../../includes/navbar.php'; ?>
  <?php include '../../includes/sidebar.php'; ?>
  <div class="content-wrapper p-3">
    <h1>Tambah Carousel</h1>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Alt Text</label>
        <input type="text" name="alt" class="form-control">
      </div>
      <div class="form-group">
        <label>Urutan</label>
        <input type="number" name="urutan" class="form-control" value="1">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="carousel.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
</body>
</html>
