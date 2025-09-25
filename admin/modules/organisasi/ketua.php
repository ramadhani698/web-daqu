<?php
include "../../config/config.php";
$query = "SELECT * FROM ketua_kelas ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>
<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Daftar Ketua Kelas</h1>
        <div class="mb-3 mt-3">
            <a href="organisasi.php" class="btn btn-primary">Lihat Organisasi</a>
            <a href="mudabbir.php" class="btn btn-primary">Lihat Mudabbir</a>
            <a href="ketua_add.php" class="btn btn-primary">+ Tambah Ketua</a>
            <a href="asrama.php" class="btn btn-primary">Lihat Asrama</a>
        </div>
    </section>
    <section class="content">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['kelas']); ?></td>
                    <td>
                        <a href="ketua_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="ketua_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="organisasi.php" class="btn btn-secondary">Kembali ke Organisasi</a>
    </section>
</div>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
