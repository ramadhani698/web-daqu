<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ketua.php');
    exit;
}

$id = intval($_GET['id']);

// Ambil data lama
$result = mysqli_query($conn, "SELECT * FROM ketua_kelas WHERE id = $id");
if (!$result || mysqli_num_rows($result) == 0) {
    header('Location: ketua.php');
    exit;
}
$data = mysqli_fetch_assoc($result);

// Proses form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $urutan = mysqli_real_escape_string($conn, $_POST['urutan']);
    $query = "UPDATE ketua_kelas SET nama='$nama', kelas='$kelas', urutan='$urutan' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: ketua.php?status=updated");
        exit;
    } else {
        $error = "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="wrapper">
  <div class="content-wrapper p-3">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Edit Ketua Kelas</h1>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <?php if (!empty($error)): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <div class="card">
          <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="1 SMP" <?= $data['kelas'] == '1 SMP' ? 'selected' : '' ?>>1 SMP</option>
                        <option value="2 SMP" <?= $data['kelas'] == '2 SMP' ? 'selected' : '' ?>>2 SMP</option>
                        <option value="3 SMP" <?= $data['kelas'] == '3 SMP' ? 'selected' : '' ?>>3 SMP</option>
                        <option value="1 SMK" <?= $data['kelas'] == '1 SMK' ? 'selected' : '' ?>>1 SMK</option>
                        <option value="2 SMK" <?= $data['kelas'] == '2 SMK' ? 'selected' : '' ?>>2 SMK</option>
                        <option value="3 SMK" <?= $data['kelas'] == '3 SMK' ? 'selected' : '' ?>>3 SMK</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Urutan</label>
                    <input type="number" name="urutan" value="<?= htmlspecialchars($data['urutan']) ?>" class="form-control" required>
                </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="ketua.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include '../../includes/footer.php'; ?>
</div>