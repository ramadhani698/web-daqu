<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);

    // simpan data utama ke tabel sejarah
    $stmt = $conn->prepare("INSERT INTO sejarah (title, content, section) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $section);
    $stmt->execute();
    $sejarah_id = $conn->insert_id; // ambil id

    // handle banyak gambar
    $uploadDir = __DIR__ . '/../../../uploads/';
    foreach($_FILES['gambar']['name'] as $i => $name){
        if(empty($name)) continue;
        $fileName = time().'_'.$name;
        move_uploaded_file($_FILES['gambar']['tmp_name'][$i], $uploadDir.$fileName);
        $path = "uploads/".$fileName;

        $urutan = !empty($_POST['urutan'][$i]) ? (int)$_POST['urutan'][$i] : 0;

        $stmt2 = $conn->prepare("INSERT INTO sejarah_gambar (sejarah_id, image, section, urutan) VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("issi", $sejarah_id, $path, $section, $urutan);
        $stmt2->execute();
    }

    header("Location: sejarah.php?success=1");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Tambah Sejarah</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi Konten</label>
            <textarea name="content" id="editor"></textarea>
        </div>
        <div class="mb-3">
            <label>Section</label>
            <select name="section" class="form-control">
                <option value="pesantren">Pesantren</option>
                <option value="yayasan">Yayasan</option>
            </select>
        </div>

        <div id="gambar-wrapper">
            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="gambar[]" class="form-control mb-2" accept="image/*">
                <input type="number" name="urutan[]" class="form-control mb-2" placeholder="Urutan (opsional)">
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-success mb-3" onclick="addGambar()">+ Tambah Gambar</button>

        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="sejarah.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?php include '../../includes/footer.php'; ?>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector('#editor')).catch(error => {
      console.error(error);
  });

  function addGambar(){
      let html = `<div class="mb-3">
          <input type="file" name="gambar[]" class="form-control mb-2" accept="image/*">
          <input type="number" name="urutan[]" class="form-control mb-2" placeholder="Urutan (opsional)">
      </div>`;
      document.getElementById('gambar-wrapper').insertAdjacentHTML('beforeend', html);
  }
</script>
