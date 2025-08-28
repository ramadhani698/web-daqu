<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $desc = $conn->real_escape_string($_POST['description']);
    $icon = $conn->real_escape_string($_POST['icon']);

    $conn->query("INSERT INTO benefit (title, description, icon) VALUES ('$title', '$desc', '$icon')");
    header("Location: benefit.php");
    exit;
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Benefit</h1>
  </section>

  <section class="content">
    <form method="POST">
      <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <label>Icon (FontAwesome Class)</label>
        <input type="text" name="icon" class="form-control" placeholder="misal: fas fa-check-circle">
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="benefit.php" class="btn btn-secondary">Kembali</a>
    </form>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
