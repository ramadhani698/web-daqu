<?php
include __DIR__ . '/../../config/config.php';
$result = $conn->query("SELECT * FROM sejarah ORDER BY id DESC");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
  <h2>Manajemen Sejarah</h2>
  <a href="add.php" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Sejarah
  </a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Section</th>
        <th>Konten</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['section']) ?></td>
        <td><?= substr(strip_tags($row['content']),0,80) ?>...</td>
        <td>
          <?php
          $g = $conn->query("SELECT * FROM sejarah_gambar WHERE sejarah_id={$row['id']} ORDER BY urutan ASC LIMIT 1");
          if($g->num_rows > 0){
            $img = $g->fetch_assoc();
            echo "<img src='../../../{$img['image']}' width='80'>";
          } else {
            echo "<em>-</em>";
          }
          ?>
        </td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
            <i class="fas fa-edit"></i>
          </a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
            <i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include '../../includes/footer.php'; ?>
