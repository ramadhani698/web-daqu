<?php
include __DIR__ . '/../../config/config.php';
$stats = $conn->query("SELECT * FROM stats");
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
  <h1>Kelola Statistik</h1>
  <a href="add.php" class="btn btn-primary mb-3">Tambah Statistik</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Ikon</th>
        <th>Angka</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while($s = $stats->fetch_assoc()): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><i class="<?= $s['ikon'] ?>"></i> <?= $s['ikon'] ?></td>
        <td><?= htmlspecialchars($s['angka']) ?></td>
        <td><?= htmlspecialchars($s['deskripsi']) ?></td>
        <td>
          <a href="edit.php?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?id=<?= $s['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
