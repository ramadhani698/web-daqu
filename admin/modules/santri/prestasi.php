<?php
include __DIR__ . '/../../config/config.php';
$prestasi = $conn->query("SELECT * FROM prestasi ORDER BY created_at DESC");
?>

<?php include '../../includes/header.php' ?>
<?php include '../../includes/navbar.php' ?>
<?php include '../../includes/sidebar.php' ?>

<div class="content-wrapper p-3">
    <h1>Kelola Prestasi</h1>
    <div class="mb-3">
        <a href="santri.php" class="btn btn-primary">Lihat Santri</a>
        <a href="prestasi_add.php" class="btn btn-primary">+ Tambah Prestasi Santri</a>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Kategori</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($p = $prestasi->fetch_assoc()): ?>
        <tr>
          <td><img src="../../../uploads/<?= htmlspecialchars($p['gambar']) ?>" width="100"></td>
          <td><?= htmlspecialchars($p['judul']) ?></td>
          <td><?= htmlspecialchars($p['kategori']) ?></td>
          <td><?= htmlspecialchars($p['nama']) ?></td>
          <td><?= htmlspecialchars($p['kelas']) ?></td>
          <td>
            <a href="prestasi_edit.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="prestasi_delete.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
</div>
