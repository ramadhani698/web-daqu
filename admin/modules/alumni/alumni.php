<?php
include __DIR__ . '/../../config/config.php';
$alumni = $conn->query("SELECT * FROM alumni ORDER BY created_at DESC");
?>

<?php include '../../includes/header.php' ?>
<?php include '../../includes/navbar.php' ?>
<?php include '../../includes/sidebar.php' ?>

<div class="content-wrapper p-3">
    <h1>Kelola Alumni</h1>
    <a href="add.php" class="btn btn-primary mb-3">Tambah Alumni</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Foto</th>
          <th>Nama</th>
          <th>Tahun Lulus</th>
          <th>Profesi</th>
          <th>Badge</th>
          <th>Juz Hafalan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($a = $alumni->fetch_assoc()): ?>
        <tr>
          <td>
            <?php if($a['foto']): ?>
              <img src="../../../<?= htmlspecialchars($a['foto']) ?>" width="80">
            <?php endif; ?>
          </td>
          <td><?= htmlspecialchars($a['nama']) ?></td>
          <td><?= htmlspecialchars($a['tahun_lulus']) ?></td>
          <td><?= htmlspecialchars($a['profesi']) ?></td>
          <td><?= htmlspecialchars($a['badge']) ?></td>
          <td><?= htmlspecialchars($a['juz_hafalan']) ?> Juz</td>
          <td>
            <a href="edit.php?id=<?= $a['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $a['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
</div>
