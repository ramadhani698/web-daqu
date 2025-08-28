<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['karakter_id'])) die("ID tidak ditemukan");
$karakter_id = intval($_GET['karakter_id']);

$resultKarakter = $conn->query("SELECT * FROM karakter WHERE id=$karakter_id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $caption = mysqli_real_escape_string($conn, $_POST['caption']);
    $uploadDir = __DIR__ . '/../../../uploads/';
    $gambar = null;

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = 'uploads/' . time() . '_' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . basename($gambar));
        $conn->query("INSERT INTO karakter_gambar (karakter_id,gambar,caption) VALUES ($karakter_id,'$gambar','$caption')");
    }
    header("Location: gambar.php?karakter_id=$karakter_id");
    exit;
}

$list = $conn->query("SELECT * FROM karakter_gambar WHERE karakter_id=$karakter_id");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
  <h2>Kelola Gambar - <?= htmlspecialchars($resultKarakter['judul']) ?></h2>

  <form method="post" enctype="multipart/form-data" class="mb-4">
    <div class="form-group">
      <label>Upload Gambar</label>
      <input type="file" name="gambar" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Caption</label>
      <input type="text" name="caption" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-2">Tambah</button>
  </form>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Caption</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while($row=$list->fetch_assoc()): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><img src="../../<?= $row['gambar'] ?>" width="150"></td>
        <td><?= htmlspecialchars($row['caption']) ?></td>
        <td>
          <a href="edit_gambar.php?id=<?= $row['id'] ?>&karakter_id=<?= $karakter_id ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
          <a href="hapus_gambar.php?id=<?= $row['id'] ?>&karakter_id=<?= $karakter_id ?>" onclick="return confirm('Hapus gambar ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include '../../includes/footer.php'; ?>
