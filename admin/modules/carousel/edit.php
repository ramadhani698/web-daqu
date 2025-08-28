<?php
require_once __DIR__ . '/../../config/config.php';

$id = (int) $_GET['id'];
$data = $conn->query("SELECT * FROM carousel WHERE id=$id")->fetch_assoc();

if (!$data) {
    header("Location: carousel.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alt = $conn->real_escape_string($_POST['alt']);
    $urutan = (int) $_POST['urutan'];
    $filename = $data['image']; // default gambar lama

    if (!empty($_FILES['image']['name'])) {
        $newName = time() . "_" . basename($_FILES["image"]["name"]);
        $target = __DIR__ . "/../../../uploads/" . $newName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
            // hapus file lama
            $oldFile = __DIR__ . "/../../../uploads/" . $data['image'];
            if (file_exists($oldFile)) unlink($oldFile);
            $filename = $newName;
        }
    }

    $conn->query("UPDATE carousel SET image='$filename', alt_text='$alt', urutan=$urutan WHERE id=$id");
    header("Location: carousel.php?msg=updated");
    exit;
}
?>
<?php include '../../includes/header.php'; ?>
<div class="wrapper">
  <?php include '../../includes/navbar.php'; ?>
  <?php include '../../includes/sidebar.php'; ?>
  <div class="content-wrapper p-3">
    <h1>Edit Carousel</h1>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Gambar Saat Ini</label><br>
        <img src="../../../uploads/<?= $data['image'] ?>" width="200"><br><br>
        <input type="file" name="image" class="form-control">
      </div>
      <div class="form-group">
        <label>Alt Text</label>
        <input type="text" name="alt" class="form-control" value="<?= htmlspecialchars($data['alt_text']) ?>">
      </div>
      <div class="form-group">
        <label>Urutan</label>
        <input type="number" name="urutan" class="form-control" value="<?= $data['urutan'] ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="carousel.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
</body>
</html>
