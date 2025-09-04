<?php
include __DIR__ . "/../../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $profesi = $_POST['profesi'];
    $deskripsi = $_POST['deskripsi'];
    $badge = $_POST['badge'];
    $juz_hafalan = $_POST['juz_hafalan'];

    $foto = null;
    if (!empty($_FILES['foto']['name'])) {
        $targetDir = __DIR__ . "/../../../uploads/alumni/"; 
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $filename = time() . "_" . basename($_FILES['foto']['name']);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
            $foto = "uploads/alumni/" . $filename;
        }
    }

    $stmt = $conn->prepare("INSERT INTO alumni (nama, tahun_lulus, profesi, deskripsi, foto, badge, juz_hafalan, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sissssi", $nama, $tahun_lulus, $profesi, $deskripsi, $foto, $badge, $juz_hafalan);
    $stmt->execute();

    header("Location: alumni.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="content-wrapper p-3">
    <h1>Tambah Alumni</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
        <div class="mb-3"><label>Tahun Lulus</label><input type="number" name="tahun_lulus" class="form-control" required></div>
        <div class="mb-3"><label>Profesi</label><input type="text" name="profesi" class="form-control"></div>
        <div class="mb-3"><label>Deskripsi</label><textarea id="editor" name="deskripsi" class="form-control"></textarea></div>
        <div class="mb-3"><label>Badge</label><input type="text" name="badge" class="form-control"></div>
        <div class="mb-3"><label>Juz Hafalan</label><input type="number" name="juz_hafalan" class="form-control"></div>
        <div class="mb-3"><label>Foto</label><input type="file" name="foto" class="form-control"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>ClassicEditor.create(document.querySelector('#editor')).catch(console.error);</script>
