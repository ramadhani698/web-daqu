<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);

    // simpan karakter
    $conn->query("INSERT INTO karakter (judul, deskripsi, link) VALUES ('$judul','$deskripsi','$link')");
    $karakter_id = $conn->insert_id;

    // handle gambar
    $uploadDir = __DIR__ . '/../../../uploads/';
    foreach($_FILES['gambar']['name'] as $i => $name){
        if(empty($name)) continue;
        $fileName = time().'_'.$name;
        move_uploaded_file($_FILES['gambar']['tmp_name'][$i], $uploadDir.$fileName);
        $path = "uploads/".$fileName;

        $caption = mysqli_real_escape_string($conn, $_POST['caption'][$i]);
        $conn->query("INSERT INTO karakter_gambar (karakter_id, gambar, caption) VALUES ($karakter_id,'$path','$caption')");
    }

    header("Location: karakter.php?status=success");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
  <h2>Tambah Kegiatan</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4"></textarea>
    </div>
    <div class="form-group">
      <label>Link</label>
      <input type="text" name="link" class="form-control">
    </div>

    <div id="gambar-wrapper">
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="gambar[]" class="form-control mb-2" accept="image/*">
        <input type="text" name="caption[]" class="form-control" placeholder="Caption gambar">
      </div>
    </div>
    <button type="button" class="btn btn-sm btn-success mb-3" onclick="addGambar()">+ Tambah Gambar</button>

    <br>
    <button type="submit" class="btn btn-primary">Simpan</button>
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
