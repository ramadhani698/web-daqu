<?php
include __DIR__ . "/../../config/config.php";
$id = (int)$_GET['id'];
$data = $conn->query("SELECT * FROM alumni WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $profesi = $_POST['profesi'];
    $deskripsi = $_POST['deskripsi'];
    $badge = $_POST['badge'];
    $juz_hafalan = $_POST['juz_hafalan'];

    $foto = $data['foto'];
    if (!empty($_FILES['foto']['name'])) {
        $targetDir = __DIR__ . "/../../../uploads/alumni/"; 
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $filename = time() . "_" . basename($_FILES['foto']['name']);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
            // Hapus foto lama (jika ada dan file memang ada di server)
            if (!empty($data['foto']) && file_exists(__DIR__ . "/../../../" . $data['foto'])) {
                unlink(__DIR__ . "/../../../" . $data['foto']);
            }
            $foto = "uploads/alumni/" . $filename;
        }
    }

    $stmt = $conn->prepare("UPDATE alumni SET nama=?, tahun_lulus=?, profesi=?, deskripsi=?, foto=?, badge=?, juz_hafalan=? WHERE id=?");
    $stmt->bind_param("sissssii", $nama, $tahun_lulus, $profesi, $deskripsi, $foto, $badge, $juz_hafalan, $id);
    $stmt->execute();

    header("Location: alumni.php");
    exit;
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/sidebar.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="content-wrapper p-3">
    <h1>Edit Alumni</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3"><label>Nama</label><input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>Tahun Lulus</label><input type="number" name="tahun_lulus" value="<?= htmlspecialchars($data['tahun_lulus']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>Profesi</label><input type="text" name="profesi" value="<?= htmlspecialchars($data['profesi']) ?>" class="form-control"></div>
        <div class="mb-3"><label>Deskripsi</label><textarea id="editor" name="deskripsi" class="form-control"><?= htmlspecialchars($data['deskripsi']) ?></textarea></div>
        <div class="mb-3"><label>Badge</label><input type="text" name="badge" value="<?= htmlspecialchars($data['badge']) ?>" class="form-control"></div>
        <div class="mb-3"><label>Juz Hafalan</label><input type="number" name="juz_hafalan" value="<?= htmlspecialchars($data['juz_hafalan']) ?>" class="form-control"></div>
        <div class="mb-3">
            <label>Foto</label><br>
            <?php if ($data['foto']): ?><img src="../../../<?= $data['foto'] ?>" width="120" class="mb-2"><br><?php endif; ?>
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>ClassicEditor.create(document.querySelector('#editor')).catch(console.error);</script>
