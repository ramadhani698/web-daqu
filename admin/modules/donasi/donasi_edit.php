<?php
include __DIR__ . "/../../config/config.php";

$id = (int)$_GET['id'];
$data = $conn->query("SELECT * FROM program_donasi WHERE id = $id")->fetch_assoc();

if (!$data) {
  die("Data tidak ditemukan!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
  $judul      = mysqli_real_escape_string($conn, $_POST['judul']);
  $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);
  $target     = (int) preg_replace('/\D/', '', $_POST['target']);
  $terkumpul  = (int) preg_replace('/\D/', '', $_POST['terkumpul']);
  $gambar_lama = $data['gambar'];

  // Cek gambar baru
  if (!empty($_FILES['gambar']['name'])) {
    $namaFile = $_FILES['gambar']['name'];
    $tmpFile  = $_FILES['gambar']['tmp_name'];
    $ext      = pathinfo($namaFile, PATHINFO_EXTENSION);

    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array(strtolower($ext), $allowed_ext)) {
      die("Format gambar tidak diizinkan. Gunakan JPG, PNG, atau WEBP.");
    }

    $namaBaru = uniqid() . '.' . $ext;
    $folderTujuan = __DIR__ . "/uploads/";

    if (!is_dir($folderTujuan)) {
      mkdir($folderTujuan, 0777, true);
    }

    if (move_uploaded_file($tmpFile, $folderTujuan . $namaBaru)) {
      // Hapus gambar lama jika ada
      $pathLama = $folderTujuan . $gambar_lama;
      if (file_exists($pathLama)) {
        unlink($pathLama);
      }
      $gambar = $namaBaru;
    } else {
      die("Gagal mengupload gambar baru!");
    }
  } else {
    $gambar = $gambar_lama;
  }

  // Update ke database
  $stmt = $conn->prepare("UPDATE program_donasi 
                          SET kategori=?, judul=?, deskripsi=?, target=?, terkumpul=?, gambar=? 
                          WHERE id=?");
  $stmt->bind_param("sssddsi", $kategori, $judul, $deskripsi, $target, $terkumpul, $gambar, $id);

  if ($stmt->execute()) {
    header("Location: donasi.php?pesan=update_berhasil");
    exit;
  } else {
    echo "Gagal memperbarui data: " . $conn->error;
  }
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../includes/sidebar.php'; ?>

<div class="content-wrapper p-4">
  <h3>Edit Program Donasi</h3>
  <form method="POST" enctype="multipart/form-data">
    
    <div class="form-group mb-3">
      <label for="kategori" class="form-label">Kategori</label>
      <select name="kategori" class="form-control" required>
        <option value="sedekah" <?= $data['kategori'] == 'sedekah' ? 'selected' : '' ?>>Sedekah</option>
        <option value="zakat" <?= $data['kategori'] == 'zakat' ? 'selected' : '' ?>>Zakat</option>
        <option value="wakaf" <?= $data['kategori'] == 'wakaf' ? 'selected' : '' ?>>Wakaf</option>
      </select>
    </div>

    <div class="form-group mb-3">
      <label for="judul" class="form-label">Judul</label>
      <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars(stripslashes($data['judul'])) ?>" required>
    </div>

    <div class="form-group mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea id="editor" name="deskripsi" class="form-control" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
    </div>

    <div class="form-group mb-3">
      <label for="target" class="form-label">Target Donasi (Rp)</label>
      <input type="text" class="form-control rupiah" name="target" 
             value="Rp<?= number_format($data['target'], 0, ',', '.') ?>" required>
    </div>

    <div class="form-group mb-3">
      <label for="terkumpul" class="form-label">Terkumpul (Rp)</label>
      <input type="text" class="form-control rupiah" name="terkumpul" 
             value="Rp<?= number_format($data['terkumpul'], 0, ',', '.') ?>" required>
    </div>

    <div class="form-group mb-3">
      <label for="gambar" class="form-label">Gambar Saat Ini</label><br>
      <img src="uploads/<?= $data['gambar'] ?>" width="150" class="mb-2"><br>
      <input type="file" name="gambar" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="donasi.php" class="btn btn-secondary">Kembali</a>
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

<script>
  // Fungsi format rupiah
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

  // Terapkan format rupiah ke input
  document.querySelectorAll('.rupiah').forEach((input) => {
    input.addEventListener('keyup', function(e) {
      this.value = formatRupiah(this.value, 'Rp ');
    });
  });

  // Hapus "Rp" dan titik sebelum dikirim ke server
  document.querySelector('form').addEventListener('submit', function() {
    document.querySelectorAll('.rupiah').forEach((input) => {
      input.value = input.value.replace(/[^0-9]/g, '');
    });
  });
</script>

<?php include '../../includes/footer.php'; ?>
