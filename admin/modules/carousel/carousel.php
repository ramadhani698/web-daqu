<?php
require_once __DIR__ . '/../../config/config.php';

// Hapus data
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    $data = $conn->query("SELECT * FROM carousel WHERE id=$id")->fetch_assoc();
    if ($data) {
        $filePath = __DIR__ . "/../../../uploads/" . $data['image'];
        if (file_exists($filePath)) unlink($filePath);
        $conn->query("DELETE FROM carousel WHERE id=$id");
    }

    header("Location: carousel.php?msg=deleted");
    exit;
}

$carousels = $conn->query("SELECT * FROM carousel ORDER BY urutan ASC");
?>
<?php include '../../includes/header.php'; ?>
<div class="wrapper">
  <?php include '../../includes/navbar.php'; ?>
  <?php include '../../includes/sidebar.php'; ?>

  <div class="content-wrapper p-3">
    <div class="content-header">
      <h1 class="m-0">Carousel</h1>
      <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success mt-2">
          <?= $_GET['msg'] == 'added' ? "Berhasil menambah data!" : ($_GET['msg'] == 'updated' ? "Berhasil mengupdate data!" : "Berhasil menghapus data!"); ?>
        </div>
      <?php endif; ?>
    </div>

    <section class="content">
      <a href="add.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Carousel</a>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-list"></i> Daftar Carousel</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Alt Text</th>
              <th>Urutan</th>
              <th>Aksi</th>
            </tr>
            <?php $no=1; while ($row = $carousels->fetch_assoc()): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><img src="../../../uploads/<?= $row['image'] ?>" width="120"></td>
                <td><?= htmlspecialchars($row['alt_text']) ?></td>
                <td><?= $row['urutan'] ?></td>
                <td>
                  <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endwhile; ?>
          </table>
        </div>
      </div>
    </section>
  </div>
</div>
</body>
</html>
