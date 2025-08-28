<?php
include __DIR__ . '/../../config/config.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

// Ambil data lama
$stmt = $conn->prepare("SELECT * FROM pendidikan WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan.");
}

// Update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $icon = $_POST['icon'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    $stmt = $conn->prepare("UPDATE pendidikan SET title=?, icon=?, description=?, link=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $icon, $description, $link, $id);

    if ($stmt->execute()) {
        header("Location: pendidikan.php?msg=updated");
        exit;
    } else {
        echo "Gagal update data!";
    }
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Pendidikan</h1>
  </section>
  <section class="content">
    <form method="POST">
      <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Icon (Font Awesome)</label>
        <input type="text" name="icon" value="<?= htmlspecialchars($data['icon']) ?>" class="form-control" required>
        <small>Contoh: fas fa-mosque</small>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" required><?= htmlspecialchars($data['description']) ?></textarea>
      </div>
      <div class="form-group">
        <label>Link Detail</label>
        <input type="text" name="link" value="<?= htmlspecialchars($data['link']) ?>" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="pendidikan.php" class="btn btn-secondary">Kembali</a>
    </form>
  </section>
</div>

<?php include '../../includes/footer.php'; ?>
