<?php
include __DIR__ . '/../../config/config.php';
$result = mysqli_query($conn, "SELECT * FROM ekstrakurikuler ORDER BY kategori, nama");
?>
<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <div class="content-header mt-3">
    <h1>Ekstrakurikuler</h1>
    <a href="add.php" class="btn btn-primary mb-3 mt-3"><i class="fas fa-plus"></i> Tambah Ekskul</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kategori</th>
          <th>Nama</th>
          <th>Icon</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php $no=1; while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= ucfirst($row['kategori']) ?></td>
          <td><?= $row['nama'] ?></td>
          <td><i class="<?= $row['icon'] ?>"></i> <?= $row['icon'] ?></td>
          <td><?= substr($row['deskripsi'],0,80) ?>...</td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>