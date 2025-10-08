<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: asrama.php');
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM ketua_asrama WHERE id = $id");
if (!$result || mysqli_num_rows($result) == 0) {
    header('Location: asrama.php');
    exit;
}
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $asrama = mysqli_real_escape_string($conn, $_POST['asrama']);
    $urutan = mysqli_real_escape_string($conn, $_POST['urutan']);

    $query = "UPDATE ketua_asrama SET nama='$nama', asrama='$asrama', urutan='$urutan' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: asrama.php?status=updated");
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
        <h1 class="m-0">Edit Ketua Asrama</h1>
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
                    <label>Nama Ketua</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Asrama</label>
                    <select class="form-control" name="asrama" required>
                        <option value="">-- Pilih Asrama --</option>
                        <option value="Al-Fatih 201" <?= $data['asrama'] == 'Al-Fatih 201' ? 'selected' : '' ?>>Al-Fatih 201</option>
                        <option value="Al-Fatih 202" <?= $data['asrama'] == 'Al-Fatih 202' ? 'selected' : '' ?>>Al-Fatih 202</option>
                        <option value="Ar-Rahman 201" <?= $data['asrama'] == 'Ar-Rahman 201' ? 'selected' : '' ?>>Ar-Rahman 201</option>
                        <option value="Ar-Rahman 202" <?= $data['asrama'] == 'Ar-Rahman 202' ? 'selected' : '' ?>>Ar-Rahman 202</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Urutan</label>
                    <input type="number" name="urutan" value="<?= htmlspecialchars($data['urutan']) ?>" class="form-control" required>
                </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="asrama.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include '../../includes/footer.php'; ?>
</div>
