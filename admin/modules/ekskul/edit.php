<?php
include __DIR__ . '/../../config/config.php';

// Ambil data berdasarkan ID
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}
$id = (int)$_GET['id'];

$result = $conn->query("SELECT * FROM ekstrakurikuler WHERE id = $id");
$ekskul = $result->fetch_assoc();

if (!$ekskul) {
    die("Data tidak ditemukan");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategori = $_POST['kategori'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $icon = $_POST['icon'];
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);

    $uploadDir = __DIR__ . '/../../../uploads/';

    $gambar1 = $ekskul['gambar1'];
    $gambar2 = $ekskul['gambar2'];

    // Jika upload gambar1 baru
    if (!empty($_FILES['gambar1']['name'])) {
        if ($ekskul['gambar1'] && file_exists(__DIR__ . '/../../../' . $ekskul['gambar1'])) {
            unlink(__DIR__ . '/../../../' . $ekskul['gambar1']);
        }
        $gambar1 = 'uploads/' . basename($_FILES['gambar1']['name']);
        move_uploaded_file($_FILES['gambar1']['tmp_name'], $uploadDir . basename($_FILES['gambar1']['name']));
    }

    // Jika upload gambar2 baru
    if (!empty($_FILES['gambar2']['name'])) {
        if ($ekskul['gambar2'] && file_exists(__DIR__ . '/../../../' . $ekskul['gambar2'])) {
            unlink(__DIR__ . '/../../../' . $ekskul['gambar2']);
        }
        $gambar2 = 'uploads/' . basename($_FILES['gambar2']['name']);
        move_uploaded_file($_FILES['gambar2']['tmp_name'], $uploadDir . basename($_FILES['gambar2']['name']));
    }

    $sql = "UPDATE ekstrakurikuler 
            SET kategori='$kategori', nama='$nama', deskripsi='$deskripsi', 
                icon='$icon', detail='$detail', gambar1='$gambar1', gambar2='$gambar2'
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: ekskul.php?status=updated");
        exit;
    } else {
        $error = "Gagal update: " . $conn->error;
    }
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Ekstrakurikuler</h1>
    </section>

    <section class="content">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="seni" <?= $ekskul['kategori']=='seni'?'selected':'' ?>>Seni</option>
                    <option value="fisik" <?= $ekskul['kategori']=='fisik'?'selected':'' ?>>Fisik</option>
                    <option value="kesehatan" <?= $ekskul['kategori']=='kesehatan'?'selected':'' ?>>Kesehatan</option>
                    <option value="leadership" <?= $ekskul['kategori']=='leadership'?'selected':'' ?>>Leadership</option>
                </select>
            </div>

            <div class="form-group">
                <label>Nama Ekskul</label>
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($ekskul['nama']); ?>" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" required><?= htmlspecialchars($ekskul['deskripsi']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Icon (Font Awesome)</label>
                <input type="text" name="icon" class="form-control" value="<?= htmlspecialchars($ekskul['icon']); ?>" required>
            </div>

            <div class="form-group">
                <label>Detail</label>
                <textarea name="detail" class="form-control" rows="5"><?= htmlspecialchars($ekskul['detail']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Gambar 1</label><br>
                <?php if (!empty($ekskul['gambar1'])): ?>
                    <img src="../../../<?= $ekskul['gambar1'] ?>" width="120"><br>
                <?php endif; ?>
                <input type="file" name="gambar1" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label>Gambar 2</label><br>
                <?php if (!empty($ekskul['gambar2'])): ?>
                    <img src="../../../<?= $ekskul['gambar2'] ?>" width="120"><br>
                <?php endif; ?>
                <input type="file" name="gambar2" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="ekskul.php" class="btn btn-secondary">Batal</a>
        </form>
    </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
