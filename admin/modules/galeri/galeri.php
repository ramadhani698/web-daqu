<?php
include __DIR__ . '/../../config/config.php';
$galeri = $conn->query("SELECT * FROM galeri ORDER BY created_at DESC");
?>

<?php include '../../includes/header.php' ?>
<?php include '../../includes/navbar.php' ?>
<?php include '../../includes/sidebar.php' ?>

<div class="content-wrapper p-3">
    <h1>Kelola Galeri</h1>
    <div class="mb-3">
        <a href="add.php" class="btn btn-primary">+ Tambah Foto</a>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Kategori</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($g = $galeri->fetch_assoc()): ?>
        <tr>
          <td><img src="../../../img/<?= htmlspecialchars($g['gambar']) ?>" width="100"></td>
          <td><?= htmlspecialchars($g['judul']) ?></td>
          <td><?= htmlspecialchars($g['kategori']) ?></td>
          <td><?= strip_tags($g['deskripsi']) ?></td>
          <td>
            <a href="edit.php?id=<?= $g['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $g['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
</div>
