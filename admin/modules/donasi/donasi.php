<?php
include __DIR__ . '/../../config/config.php';
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Kelola Program Donasi</h2>
    <a href="donasi_add.php" class="btn btn-success btn-sm">+ Tambah Program</a>
  </div>

  <?php
  $kategoriList = ['sedekah', 'zakat', 'wakaf'];
  foreach ($kategoriList as $kategori):
    $result = mysqli_query($conn, "SELECT * FROM program_donasi WHERE kategori='$kategori' ORDER BY id DESC");
  ?>
    <h4 class="mt-4 text-capitalize"><?= $kategori ?></h4>
    <table class="table table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th width="5%">#</th>
          <th width="15%">Gambar</th>
          <th width="15%">Judul</th>
          <th width="15%">Terkumpul</th>
          <th width="15%">Target</th>
          <th width="15%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($result) > 0): $no=1; while ($row=mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td>
            <a href="data_donasi.php?id=<?= $row['id'] ?>">
              <img src="uploads/<?= htmlspecialchars($row['gambar']) ?>" width="100" style="border-radius:5px;">
            </a>
          </td>
          <td><?= htmlspecialchars($row['judul']) ?></td>
          <td>Rp<?= number_format($row['terkumpul'],0,',','.') ?></td>
          <td>Rp<?= number_format($row['target'],0,',','.') ?></td>
          <td>
            <a href="donasi_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="donasi_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus program ini?')"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php endwhile; else: ?>
          <tr><td colspan="6" class="text-center text-muted">Belum ada program untuk kategori ini.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  <?php endforeach; ?>
</div>

<?php include '../../includes/footer.php'; ?>
