<?php
include '../../config/config.php';
$jadwal = $conn->query("SELECT * FROM jadwal_akademik ORDER BY id ASC");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Kelola Jadwal Harian</h2>
    <div class="mb-3">
        <a href="akademik.php" class="btn btn-primary">Tambah Info Akademik</a>
        <a href="jadwal_add.php" class="btn btn-primary">+ Tambah Jadwal Harian</a>
        <a href="pengumuman.php" class="btn btn-primary">Lihat Pengumuman</a>
    </div>
    <table class="table table-bordered">
      <tr>
        <th>Waktu</th>
        <th>Kegiatan</th>
        <th>Aksi</th>
      </tr>
      <?php while($row = $jadwal->fetch_assoc()): ?>
      <tr>
        <td><?= $row['waktu'] ?></td>
        <td><?= $row['kegiatan'] ?></td>
        <td>
          <a href="jadwal_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
          <a href="jadwal_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus jadwal?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
</div>
