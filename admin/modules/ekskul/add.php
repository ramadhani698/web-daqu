<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategori = $_POST['kategori'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $icon = $_POST['icon'];
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);

    // Upload gambar
    $uploadDir = __DIR__ . '/../../../uploads/';
    $gambar1 = null;
    $gambar2 = null;

    if (!empty($_FILES['gambar1']['name'])) {
        $gambar1 = 'uploads/' . basename($_FILES['gambar1']['name']);
        move_uploaded_file($_FILES['gambar1']['tmp_name'], $uploadDir . basename($_FILES['gambar1']['name']));
    }

    if (!empty($_FILES['gambar2']['name'])) {
        $gambar2 = 'uploads/' . basename($_FILES['gambar2']['name']);
        move_uploaded_file($_FILES['gambar2']['tmp_name'], $uploadDir . basename($_FILES['gambar2']['name']));
    }

    $sql = "INSERT INTO ekstrakurikuler (kategori,nama,deskripsi,icon,detail,gambar1,gambar2) 
            VALUES ('$kategori','$nama','$deskripsi','$icon','$detail','$gambar1','$gambar2')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ekskul.php?status=success");
        exit;
    } else {
        $error = "Gagal menambahkan data: " . mysqli_error($conn);
    }
}

?>
<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
  <h2>Tambah Ekskul</h2>
  <?php if (!empty($error)): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Kategori</label>
      <select name="kategori" class="form-control" required>
        <option value="seni">Seni</option>
        <option value="fisik">Fisik</option>
        <option value="kesehatan">Kesehatan</option>
        <option value="leadership">Leadership</option>
      </select>
    </div>
    <div class="form-group">
      <label>Nama Ekskul</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Deskripsi Singkat</label>
      <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label>Icon (FontAwesome)</label>
      <input type="text" name="icon" class="form-control" placeholder="fas fa-drum">
    </div>
    <div class="form-group">
      <label>Detail (untuk modal popup)</label>
      <textarea name="detail" class="form-control" rows="5"></textarea>
    </div>
    <div class="form-group">
      <label>Gambar 1</label>
      <input type="file" name="gambar1" class="form-control" accept="image/*">
    </div>
    <div class="form-group">
      <label>Gambar 2</label>
      <input type="file" name="gambar2" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="ekskul.php" class="btn btn-secondary">Batal</a>
  </form>
</div>
