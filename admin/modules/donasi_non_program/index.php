<?php
include __DIR__ . '/../../config/config.php';
include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/sidebar.php';

$kategoriList = ['sedekah', 'zakat', 'wakaf'];

// ========================= FILTER TANGGAL =========================
$tanggal_awal  = isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : '';
$tanggal_akhir = isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : '';

$filterQuery = "";
if (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
    $filterQuery = " AND DATE(created_at) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ";
}

// ========================= PAGINATION =========================
$limit = 5; 
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;
?>

<div class="content-wrapper p-4">

    <h2 class="mb-4">Dashboard Donasi Non Program</h2>

    <!-- FILTER TANGGAL -->
    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label>Dari Tanggal</label>
            <input type="date" name="tanggal_awal" class="form-control" value="<?= $tanggal_awal ?>">
        </div>

        <div class="col-md-3">
            <label>Sampai Tanggal</label>
            <input type="date" name="tanggal_akhir" class="form-control" value="<?= $tanggal_akhir ?>">
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary me-2">Filter</button>
            <a href="index.php" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- ========================= TAMPILKAN PER KATEGORI ========================= -->
    <?php foreach ($kategoriList as $kategori): ?>

        <h4 class="mt-4 text-capitalize"><?= $kategori ?></h4>

        <?php
            // Hitung total data
            $count = $conn->query("
                SELECT COUNT(*) AS total 
                FROM donasi_non_program 
                WHERE kategori='$kategori' 
                $filterQuery
            ")->fetch_assoc();

            $totalData  = $count['total'];
            $totalPages = ceil($totalData / $limit);

            // Ambil data donasi
            $donasi = $conn->query("
                SELECT * FROM donasi_non_program
                WHERE kategori='$kategori'
                $filterQuery
                ORDER BY id DESC
                LIMIT $start, $limit
            ");
        ?>

        <table class="table table-bordered mt-3 align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Program</th>
                    <th>Nominal</th>
                    <th>Metode</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($donasi->num_rows > 0): $no = $start + 1; ?>

                    <?php while ($row = $donasi->fetch_assoc()): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= ucfirst($row['kategori']) ?></td>
                            <td><?= $row['program_id'] ? "Program #" . $row['program_id'] : '-' ?></td>
                            <td>Rp<?= number_format($row['nominal'], 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars($row['metode']) ?></td>
                            <td><?= $row['email'] ?: '-' ?></td>

                            <td>
                                <?php if ($row['status'] == 'pending'): ?>
                                    <span class="badge bg-warning">Pending</span>
                                <?php elseif ($row['status'] == 'valid'): ?>
                                    <span class="badge bg-success">Valid</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                    <br>
                                    <small>Alasan: <?= $row['alasan_penolakan'] ?></small>
                                <?php endif; ?>
                            </td>

                            <td><?= $row['created_at'] ?></td>

                            <td>
                                <?php if ($row['bukti']): ?>
                                    <a href="bukti/<?= $row['bukti'] ?>" class="btn btn-info btn-sm" target="_blank">Lihat</a>
                                <?php else: ?>
                                    <small class="text-muted">Tidak ada</small>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($row['status'] == 'pending'): ?>
                                    <a href="verifikasi_donasi.php?id=<?= $row['id'] ?>&aksi=verifikasi"
                                       class="btn btn-success btn-sm">Verifikasi</a>

                                    <button class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalTolak"
                                            onclick="setTolakId(<?= $row['id'] ?>)">
                                        Tolak
                                    </button>
                                <?php else: ?>
                                    <a href="delete.php?id=<?= $row['id'] ?>"
                                       onclick="return confirm('Hapus donasi ini?')"
                                       class="btn btn-danger btn-sm">Hapus</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="11" class="text-center text-muted">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- PAGINATION -->
        <?php if ($totalPages > 1): ?>
            <nav>
                <ul class="pagination">

                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="?page=<?= $page - 1 ?>&tanggal_awal=<?= $tanggal_awal ?>&tanggal_akhir=<?= $tanggal_akhir ?>">
                                Prev
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $page ? 'active' : '') ?>">
                            <a class="page-link"
                               href="?page=<?= $i ?>&tanggal_awal=<?= $tanggal_awal ?>&tanggal_akhir=<?= $tanggal_akhir ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="?page=<?= $page + 1 ?>&tanggal_awal=<?= $tanggal_awal ?>&tanggal_akhir=<?= $tanggal_akhir ?>">
                                Next
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </nav>
        <?php endif; ?>

    <?php endforeach; ?>

</div>

<!-- MODAL TOLAK -->
<div class="modal fade" id="modalTolak" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="tolak_donasi.php" method="POST">

                <div class="modal-header">
                    <h5 class="modal-title">Tolak Donasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="tolakId">
                    <textarea name="alasan" class="form-control" rows="4" placeholder="Tuliskan alasan penolakan..." required></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
function setTolakId(id) {
    document.getElementById('tolakId').value = id;
}
</script>

<?php include '../../includes/footer.php'; ?>
