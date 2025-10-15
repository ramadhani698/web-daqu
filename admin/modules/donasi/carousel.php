<?php
include '../../config/config.php';
// ... existing code ...
$result = mysqli_query($conn, "SELECT * FROM carousel_donasi ORDER BY urutan ASC");
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
    <h2>Data Carousel</h2>
    <a href="add.php" class="btn btn-primary">Tambah Carousel</a>
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Alt</th>
        <th>Urutan</th>
        <th>Aksi</th>
      </tr>
      <?php $no = 1; while($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><img src="../../../donasi/uploads/<?= $row['gambar'] ?>" width="100"></td>
        <td><?= $row['alt'] ?></td>
        <td><?= $row['urutan'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
</div>