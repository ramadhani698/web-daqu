<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $kategori   = strtolower(mysqli_real_escape_string($conn, $_POST['kategori']));
    $judul      = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi  = $_POST['deskripsi'];
    $terkumpul  = (int) preg_replace('/\D/', '', $_POST['terkumpul']);
    $target     = (int) preg_replace('/\D/', '', $_POST['target']);

    // Upload
    $gambar     = $_FILES['gambar']['name'];
    $tmp        = $_FILES['gambar']['tmp_name'];
    $ext        = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    $allowed_ext = ['jpg','jpeg','png','webp'];
    if (!in_array($ext, $allowed_ext)) {
        die("Format gambar tidak diizinkan.");
    }

    $newName   = uniqid() . "." . $ext;
    $uploadDir = __DIR__ . "/uploads/";

    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    move_uploaded_file($tmp, $uploadDir . $newName);

    // Simpan
    $stmt = $conn->prepare("
      INSERT INTO program_donasi (kategori,judul,deskripsi,gambar,terkumpul,target)
      VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssii", $kategori, $judul, $deskripsi, $newName, $terkumpul, $target);
    $stmt->execute();

    header("Location: donasi.php?success=1");
    exit;
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper p-3">
    <h2>Tambah Program Donasi</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-control" name="kategori" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="sedekah">Sedekah</option>
              <option value="zakat">Zakat</option>
              <option value="wakaf">Wakaf</option>
          </select>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="editor" class="form-control" name="deskripsi" rows="5" placeholder="Tuliskan deskripsi program donasi..."></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="terkumpul" class="form-label">Terkumpul (Rp)</label>
            <input type="text" class="form-control rupiah" name="terkumpul" value="0">
        </div>

        <div class="mb-3">
            <label for="target" class="form-label">Target (Rp)</label>
            <input type="text" class="form-control rupiah" name="target" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="donasi.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>

<!-- Format Rupiah -->
<script>
  function formatRupiah(angka, prefix) {
    let number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa  = split[0].length % 3,
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      let separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
  }

  document.querySelectorAll('.rupiah').forEach((input) => {
    input.addEventListener('keyup', function() {
      this.value = formatRupiah(this.value, 'Rp ');
    });
  });

  document.querySelector('form').addEventListener('submit', function() {
    document.querySelectorAll('.rupiah').forEach((input) => {
      input.value = input.value.replace(/[^0-9]/g, '');
    });
  });
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
