<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$benefit = $conn->query("SELECT * FROM benefit WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $desc = $conn->real_escape_string($_POST['description']);
    $icon = $conn->real_escape_string($_POST['icon']);

    $conn->query("UPDATE benefit SET title='$title', description='$desc', icon='$icon' WHERE id=$id");
    header("Location: benefit.php");
    exit;
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Benefit</h1>
  </section>

  <section class="content">
    <form method="POST">
      <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="<?= $benefit['title'] ?>" required>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" required><?= $benefit['description'] ?></textarea>
      </div>
      <div class="form-group">
        <label>Icon</label>
        <input type="text" name="icon" class="form-control" value="<?= $benefit['icon'] ?>">
      </div>
      <button type="submit" class="btn btn-success">Update</button>
      <a href="benefit.php" class="btn btn-secondary">Kembali</a>
    </form>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
