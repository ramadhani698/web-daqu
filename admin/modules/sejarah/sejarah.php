<?php
include __DIR__ . '/../../config/config.php';

// Ambil semua data sejarah
$result = $conn->query("SELECT * FROM sejarah ORDER BY id DESC");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
  <h2>Manajemen Sejarah</h2>
  <a href="add.php" class="btn btn-primary mb-3">+ Tambah Sejarah</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Section</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= htmlspecialchars($row['section']) ?></td>
          <td>
            <?php if ($row['image']): ?>
              <img src="../../../uploads/<?= $row['image'] ?>" width="100">
            <?php endif; ?>
          </td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include '../../includes/footer.php'; ?>
