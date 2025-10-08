<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['id'])) die("ID tidak ada");
$id = intval($_GET['id']);

// ambil data utama
$sejarah = $conn->query("SELECT * FROM sejarah WHERE id=$id")->fetch_assoc();
if (!$sejarah) die("Data tidak ditemukan");

// ambil gambar
$gambar = $conn->query("SELECT * FROM sejarah_gambar WHERE sejarah_id=$id ORDER BY urutan ASC");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title   = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);

    // update data utama
    $conn->query("UPDATE sejarah SET title='$title', content='$content', section='$section' WHERE id=$id");

    // update urutan gambar lama
    if(isset($_POST['old_urutan'])){
        foreach($_POST['old_urutan'] as $gid => $urut){
            $urut = intval($urut);
            $conn->query("UPDATE sejarah_gambar SET urutan=$urut WHERE id=$gid AND sejarah_id=$id");
        }
    }

    // hapus gambar lama
    if(isset($_POST['delete_gambar'])){
        foreach($_POST['delete_gambar'] as $gid){
            $g = $conn->query("SELECT * FROM sejarah_gambar WHERE id=$gid")->fetch_assoc();
            if($g && file_exists(__DIR__ . '/../../../' . $g['image'])){
                unlink(__DIR__ . '/../../../' . $g['image']);
            }
            $conn->query("DELETE FROM sejarah_gambar WHERE id=$gid AND sejarah_id=$id");
        }
    }

    // tambah gambar baru
    $uploadDir = __DIR__ . '/../../../uploads/';
    foreach($_FILES['gambar']['name'] as $i => $name){
        if(empty($name)) continue;
        $fileName = time().'_'.$name;
        move_uploaded_file($_FILES['gambar']['tmp_name'][$i], $uploadDir.$fileName);
        $path = "uploads/".$fileName;

        $urut = !empty($_POST['urutan'][$i]) ? intval($_POST['urutan'][$i]) : 0;

        $conn->query("INSERT INTO sejarah_gambar (sejarah_id,image,section,urutan) VALUES ($id,'$path','$section',$urut)");
    }

    header("Location: sejarah.php?status=updated");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<div class="content-wrapper p-3">
  <h2>Edit Sejarah</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label>Judul</label>
      <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($sejarah['title']) ?>" required>
    </div>
    <div class="form-group mb-3">
      <label>Isi Konten</label>
      <textarea name="content" id="editor" class="form-control" rows="6"><?= htmlspecialchars($sejarah['content']) ?></textarea>
    </div>
    <div class="form-group mb-3">
      <label>Section</label>
      <select name="section" class="form-control">
        <option value="pesantren" <?= $sejarah['section']=='pesantren'?'selected':'' ?>>Pesantren</option>
        <option value="yayasan" <?= $sejarah['section']=='yayasan'?'selected':'' ?>>Yayasan</option>
      </select>
    </div>

    <h5>Gambar yang sudah ada</h5>
    <?php while($g = $gambar->fetch_assoc()): ?>
      <div class="border p-2 mb-2">
        <img src="../../../<?= $g['image'] ?>" width="120"><br>
        <input type="number" name="old_urutan[<?= $g['id'] ?>]" value="<?= $g['urutan'] ?>" class="form-control mt-1" placeholder="Urutan">
        <label><input type="checkbox" name="delete_gambar[]" value="<?= $g['id'] ?>"> Hapus gambar ini</label>
      </div>
    <?php endwhile; ?>

    <h5>Tambah Gambar Baru</h5>
    <div id="gambar-wrapper">
      <div class="form-group mb-2">
        <input type="file" name="gambar[]" class="form-control mb-2" accept="image/*">
        <input type="number" name="urutan[]" class="form-control" placeholder="Urutan gambar">
      </div>
    </div>
    <button type="button" class="btn btn-sm btn-success mb-3" onclick="addGambar()">+ Tambah Gambar</button>

    <br>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="sejarah.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<script>
function addGambar(){
  let html = `<div class="form-group mb-2">
      <input type="file" name="gambar[]" class="form-control mb-2" accept="image/*">
      <input type="number" name="urutan[]" class="form-control" placeholder="Urutan gambar">
  </div>`;
  document.getElementById('gambar-wrapper').insertAdjacentHTML('beforeend', html);
}
</script>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
ClassicEditor.create(document.querySelector('#editor')).catch(error => { console.error(error); });
</script>
<?php include '../../includes/footer.php'; ?>
