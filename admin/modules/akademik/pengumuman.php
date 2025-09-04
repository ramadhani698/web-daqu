<?php
include __DIR__ . '/../../config/config.php';
$result = $conn->query("SELECT * FROM pengumuman ORDER BY created_at DESC");
?>

<?php
include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/sidebar.php';
?>

<div class="content-wrapper p-3">
    <h2>Data Pengumuman</h2>
    <div class="mb-3">
        <a href="akademik.php" class="btn btn-primary">Lihat Info Akademik</a>
        <a href="jadwal.php" class="btn btn-primary">Lihat Jadwal Harian</a>
        <a href="pengumuman_add.php" class="btn btn-primary">+ Tambah Pengumuman</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tipe</th>
            <th>Isi</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; while($row=$result->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['judul']) ?></td>
            <td><?= ucfirst($row['tipe']) ?></td>
            <td><?= substr(strip_tags($row['isi']), 0, 100) ?>...</td>
            <td>
            <a href="pengumuman_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="pengumuman_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include '../../includes/footer.php'; ?>
