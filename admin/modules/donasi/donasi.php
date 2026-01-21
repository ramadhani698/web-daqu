<?php
include __DIR__ . '/../../config/config.php';

include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/sidebar.php';

// Kategori konsisten lowercase
$kategoriList = ['sedekah', 'zakat', 'wakaf'];
?>

<div class="content-wrapper p-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Kelola Program Donasi</h2>
    <a href="donasi_add.php" class="btn btn-success btn-sm">+ Tambah Program</a>
  </div>

  <?php foreach ($kategoriList as $kategori): 
      $result = $conn->query("SELECT * FROM program_donasi WHERE kategori='$kategori' ORDER BY id DESC");
  ?>
    <h4 class="mt-4"><?= ucfirst($kategori) ?></h4>
    
    <table class="table table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th width="5%">#</th>
          <th width="15%">Gambar</th>
          <th>Judul</th>
          <th>Terkumpul</th>
          <th>Target</th>
          <th width="15%">Aksi</th>
        </tr>
      </thead>

      <tbody>
      <?php if ($result->num_rows > 0): $no=1; while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $no++ ?></td>

          <td>
            <a href="data_donasi.php?id=<?= $row['id'] ?>">
              <img src="uploads/<?= htmlspecialchars($row['gambar']) ?>" width="100" style="border-radius:5px;">
            </a>
          </td>

          <td><?= htmlspecialchars(stripslashes($row['judul'])) ?></td>
          <td>Rp<?= number_format($row['terkumpul'], 0, ',', '.') ?></td>
          <td>Rp<?= number_format($row['target'], 0, ',', '.') ?></td>

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
