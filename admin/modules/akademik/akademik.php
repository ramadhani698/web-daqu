<?php
include '../../config/config.php';
$info = $conn->query("SELECT * FROM info_akademik ORDER BY section, id DESC");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Kelola Info Akademik</h2>
    <div class="mb-3">
        <a href="add.php" class="btn btn-primary">+ Tambah Info Akademik</a>
        <a href="jadwal.php" class="btn btn-primary">Lihat Jadwal Harian</a>
        <a href="pengumuman.php" class="btn btn-primary">Lihat Pengumuman</a>
    </div>

    <table class="table table-bordered">
      <tr>
        <th>Section</th>
        <th>Judul</th>
        <th>Konten</th>
        <th>Aksi</th>
      </tr>
      <?php while($row = $info->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['section']) ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= substr(strip_tags($row['content']), 0, 100) ?>...</td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
</div>
