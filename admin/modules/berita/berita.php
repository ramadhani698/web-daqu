<?php
include __DIR__ . '/../../config/config.php';
$berita = $conn->query("SELECT * FROM berita ORDER BY created_at DESC");
?>

<?php include '../../includes/header.php' ?>
<?php include '../../includes/navbar.php' ?>
<?php include '../../includes/sidebar.php' ?>

<div class="content-wrapper p-3">
    <h1>Kelola Berita</h1>
    <a href="add.php" class="btn btn-primary mb-3">Tambah Berita</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($b = $berita->fetch_assoc()): ?>
        <tr>
          <td><img src="../../../<?= htmlspecialchars($b['gambar']) ?>" width="100"></td>
          <td><?= htmlspecialchars($b['judul']) ?></td>
          <td><?= htmlspecialchars(mb_strimwidth($b['deskripsi'],0,50,"...")) ?></td>
          <td>
            <a href="edit.php?id=<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $b['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
</div>
