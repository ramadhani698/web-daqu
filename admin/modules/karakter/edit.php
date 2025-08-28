<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['id'])) die("ID tidak ada");
$id = intval($_GET['id']);

// ambil data
$karakter = $conn->query("SELECT * FROM karakter WHERE id=$id")->fetch_assoc();
if (!$karakter) die("Data tidak ditemukan");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);

    $conn->query("UPDATE karakter SET judul='$judul', deskripsi='$deskripsi', link='$link' WHERE id=$id");

    // update caption gambar lama
    if(isset($_POST['old_caption'])){
        foreach($_POST['old_caption'] as $gid => $caption){
            $caption = mysqli_real_escape_string($conn, $caption);
            $conn->query("UPDATE karakter_gambar SET caption='$caption' WHERE id=$gid AND karakter_id=$id");
        }
    }

    // hapus gambar
    if(isset($_POST['delete_gambar'])){
        foreach($_POST['delete_gambar'] as $gid){
            $g = $conn->query("SELECT * FROM karakter_gambar WHERE id=$gid")->fetch_assoc();
            if($g && file_exists(__DIR__ . '/../../../' . $g['gambar'])){
                unlink(__DIR__ . '/../../../' . $g['gambar']);
            }
            $conn->query("DELETE FROM karakter_gambar WHERE id=$gid AND karakter_id=$id");
        }
    }

    // tambah gambar baru
    $uploadDir = __DIR__ . '/../../../uploads/';
    foreach($_FILES['gambar']['name'] as $i => $name){
        if(empty($name)) continue;
        $fileName = time().'_'.$name;
        move_uploaded_file($_FILES['gambar']['tmp_name'][$i], $uploadDir.$fileName);
        $path = "uploads/".$fileName;
        $caption = mysqli_real_escape_string($conn, $_POST['caption'][$i]);
        $conn->query("INSERT INTO karakter_gambar (karakter_id,gambar,caption) VALUES ($id,'$path','$caption')");
    }

    header("Location: karakter.php?status=updated");
    exit;
}

$gambar = $conn->query("SELECT * FROM karakter_gambar WHERE karakter_id=$id");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
  <h2>Edit Kegiatan</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($karakter['judul']) ?>" required>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4"><?= htmlspecialchars($karakter['deskripsi']) ?></textarea>
    </div>
    <div class="form-group">
      <label>Link</label>
      <input type="text" name="link" class="form-control" value="<?= htmlspecialchars($karakter['link']) ?>">
    </div>

    <h5>Gambar yang sudah ada</h5>
    <?php while($g = $gambar->fetch_assoc()): ?>
      <div class="border p-2 mb-2">
        <img src="../../../<?= $g['gambar'] ?>" width="120"><br>
        <input type="text" name="old_caption[<?= $g['id'] ?>]" value="<?= htmlspecialchars($g['caption']) ?>" class="form-control mt-1">
        <label><input type="checkbox" name="delete_gambar[]" value="<?= $g['id'] ?>"> Hapus gambar ini</label>
      </div>
    <?php endwhile; ?>

    <h5>Tambah Gambar Baru</h5>
    <div id="gambar-wrapper">
      <div class="form-group">
        <input type="file" name="gambar[]" class="form-control mb-2" accept="image/*">
        <input type="text" name="caption[]" class="form-control" placeholder="Caption gambar">
      </div>
    </div>
    <button type="button" class="btn btn-sm btn-success mb-3" onclick="addGambar()">+ Tambah Gambar</button>

    <br>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="karakter.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<script>
function addGambar(){
  let html = `<div class="form-group">
      <input type="file" name="gambar[]" class="form-control mb-2" accept="image/*">
      <input type="text" name="caption[]" class="form-control" placeholder="Caption gambar">
  </div>`;
  document.getElementById('gambar-wrapper').insertAdjacentHTML('beforeend', html);
}
</script>
<?php include '../../includes/footer.php'; ?>
