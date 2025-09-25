<?php
include __DIR__ . '/../../config/config.php';
if (!isset($_GET['id'])) {
    header('Location: mudabbir.php');
    exit;
}
$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM mudabbir WHERE id = $id");
if ($result->num_rows === 0) {
    header('Location: mudabbir.php');
    exit;
}
$row = $result->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $group_name = mysqli_real_escape_string($conn, $_POST['group_name']);
    $query = "UPDATE mudabbir SET nama='$nama', group_name='$group_name' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: mudabbir.php?status=updated");
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
        <h1 class="m-0">Edit Mudabbir</h1>
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
                    <input type="text" name="nama" class="form-control" required value="<?= htmlspecialchars($row['nama']) ?>">
                </div>
                <div class="form-group">
                    <label for="group_name">Group</label>
                    <select class="form-control" id="group_name" name="group_name" required>
                        <option value="">-- Pilih Group --</option>
                        <option value="Al-Fatih 201">Al-Fatih 201</option>
                        <option value="Al-Fatih 202">Al-Fatih 202</option>
                        <option value="Ar-Rahman 201">Ar-Rahman 201</option>
                        <option value="Ar-Rahman 202">Ar-Rahman 202</option>
                    </select>
                </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="mudabbir.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include '../../includes/footer.php'; ?>
</div>