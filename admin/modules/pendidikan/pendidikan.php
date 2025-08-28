<?php
include __DIR__ . '/../../config/config.php';
$result = $conn->query("SELECT * FROM pendidikan ORDER BY id DESC");
?>
<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Pendidikan</h1>
    <a href="add.php" class="btn btn-primary mt-3">+ Tambah Pendidikan</a>
  </section>

  <section class="content">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Icon</th>
          <th>Deskripsi</th>
          <th>Link</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><i class="<?= htmlspecialchars($row['icon']) ?>"></i></td>
          <td><?= htmlspecialchars(substr($row['description'], 0, 100)) ?>...</td>
          <td><?= htmlspecialchars($row['link']) ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
