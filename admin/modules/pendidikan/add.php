<?php
include __DIR__ . '/../../config/config.php';

// Proses form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $icon = mysqli_real_escape_string($conn, $_POST['icon']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);

    $query = "INSERT INTO pendidikan (title, description, icon, link) 
              VALUES ('$title', '$description', '$icon', '$link')";
    if (mysqli_query($conn, $query)) {
        header("Location: pendidikan.php?status=success");
        exit;
    } else {
        $error = "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="wrapper">


  <!-- Content Wrapper -->
  <div class="content-wrapper p-3">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Tambah Pendidikan</h1>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <?php if (!empty($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <div class="card">
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
              </div>
              <div class="form-group">
                <label>Icon (FontAwesome class)</label>
                <input type="text" name="icon" class="form-control" placeholder="misal: fas fa-mosque" required>
              </div>
              <div class="form-group">
                <label>Link (opsional)</label>
                <input type="text" name="link" class="form-control" placeholder="misal: ./components/tahfizh.php">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="pendidikan.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <?php include '../../includes/footer.php'; ?>

</div>