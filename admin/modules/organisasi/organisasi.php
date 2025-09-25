<?php
include __DIR__ . '/../../config/config.php';
$result = $conn->query("SELECT * FROM ostdaqu ORDER BY urutan ASC");
?>
<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Struktur Organisasi</h1>
    <div class="mb-3 mt-3">
        <a href="add.php" class="btn btn-primary">+ Tambah Organisasi</a>
        <a href="mudabbir.php" class="btn btn-primary">Lihat Mudabbir</a>
        <a href="ketua.php" class="btn btn-primary">Lihat Ketua</a>
        <a href="asrama.php" class="btn btn-primary">Lihat Asrama</a>
    </div>
  </section>

  <section class="content">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['jabatan']) ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>