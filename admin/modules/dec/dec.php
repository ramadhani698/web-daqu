<?php
include __DIR__ . '/../../config/config.php';
$produk = $conn->query("SELECT * FROM daqu_produk ORDER BY created_at DESC");
?>

<?php include '../../includes/header.php' ?>
<?php include '../../includes/navbar.php' ?>
<?php include '../../includes/sidebar.php' ?>

<div class="content-wrapper p-3">
    <h1>Kelola Produk DEC</h1>
    <div class="mb-3">
        <a href="add.php" class="btn btn-primary">+ Tambah Produk</a>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Nama Produk</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($p = $produk->fetch_assoc()): ?>
        <tr>
          <td>
            <?php if ($p['gambar']): ?>
              <img src="../../../uploads/<?= htmlspecialchars($p['gambar']) ?>" width="100">
            <?php endif; ?>
          </td>
          <td><?= htmlspecialchars($p['nama']) ?></td>
          <td><?= strip_tags(substr($p['deskripsi'],0,50)) ?>...</td>
          <td><?= htmlspecialchars($p['harga']) ?></td>
          <td>
            <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
</div>

<?php include '../../includes/footer.php'; ?>
