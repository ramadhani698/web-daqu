<?php
include __DIR__ . '/../../config/config.php';
include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/sidebar.php';

$kategoriList = ['sedekah', 'zakat', 'wakaf'];

// -------------------------------------------------------------------------
// FILTER TANGGAL
// -------------------------------------------------------------------------
$tanggal_awal  = isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : '';
$tanggal_akhir = isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : '';

$filterQuery = "";
if (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
    $filterQuery = " AND DATE(d.created_at) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ";
}

// -------------------------------------------------------------------------
// PAGINATION
// -------------------------------------------------------------------------
$limit = 5;  // Jumlah data per halaman
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;
?>

<div class="content-wrapper p-4">
  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Donasi Masuk</h2>
  </div>

  <!-- ========================== FILTER FORM ============================== -->
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
      <a href="data_donasi.php" class="btn btn-secondary">Reset</a>
    </div>
  </form>

  <!-- ========================== TABLE BY KATEGORI ======================== -->
  <?php foreach ($kategoriList as $kategori): ?>

    <h4 class="mt-4 text-capitalize"><?= $kategori ?></h4>

    <?php
      // hitung total data untuk pagination
      $countQuery = "
        SELECT COUNT(*) AS total
        FROM transaksi_donasi d
        JOIN program_donasi p ON d.program_id = p.id
        WHERE p.kategori = '$kategori'
        $filterQuery
      ";
      $countResult = $conn->query($countQuery);
      $totalData   = $countResult->fetch_assoc()['total'];
      $totalPages  = ceil($totalData / $limit);

      // query data dengan LIMIT
      $query = "
        SELECT d.*, p.judul
        FROM transaksi_donasi d
        JOIN program_donasi p ON d.program_id = p.id
        WHERE p.kategori = '$kategori'
        $filterQuery
        ORDER BY d.id DESC
        LIMIT $start, $limit
      ";
      $result = $conn->query($query);
    ?>

    <table class="table table-bordered table-striped align-middle mt-3">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Program</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Nominal</th>
          <th>Metode</th>
          <th>Pesan</th>
          <th>Tanggal</th>
          <th>Bukti</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php if ($result->num_rows > 0): $no = $start + 1; while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars(stripslashes($row['judul'])) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['email'] ?: '-') ?></td>
            <td>Rp<?= number_format($row['nominal'], 0, ',', '.') ?></td>
            <td><?= htmlspecialchars($row['metode']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['pesan'] ?: '-')) ?></td>
            <td><?= date('d M Y H:i', strtotime($row['created_at'])) ?></td>

            <td>
              <?php if (!empty($row['bukti_transfer'])): ?>
                <a href="uploads/bukti/<?= $row['bukti_transfer'] ?>" target="_blank" class="btn btn-sm btn-primary">Lihat
                </a>
              <?php else: ?>
                <span class="text-muted">Belum ada</span>
              <?php endif; ?>
            </td>

            <td>
              <?php if ($row['status'] == 'paid'): ?>
                <span class="badge bg-success">Terverifikasi</span>
              <?php elseif ($row['status'] == 'menunggu_verifikasi'): ?>
                <span class="badge bg-warning text-dark">Pending</span>
              <?php else: ?>
                <span class="badge bg-danger">Ditolak</span>
                <br>
                <small class="text-muted">Alasan: <?= htmlspecialchars($row['alasan_penolakan'] ?: '-') ?></small>
              <?php endif; ?>
            </td>

            <td>
              <?php if ($row['status'] == 'menunggu_verifikasi' && !empty($row['bukti_transfer'])): ?>
                <a href="konfirmasi_donasi.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Konfirmasi</a>

                <button class="btn btn-sm btn-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTolak"
                        onclick="setTolakId(<?= $row['id'] ?>)">
                  Tolak
                </button>

              <?php else: ?>
                <a href="delete_data_donasi.php?id=<?= $row['id'] ?>"
                   onclick="return confirm('Yakin ingin menghapus donasi ini?')"
                   class="btn btn-sm btn-danger">Hapus</a>
              <?php endif; ?>
            </td>

          </tr>
        <?php endwhile; else: ?>
          <tr>
            <td colspan="11" class="text-center text-muted">Tidak ada data.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <!-- ==================== PAGINATION NAV ============================= -->
    <?php if ($totalPages > 1): ?>
      <nav>
        <ul class="pagination">

          <!-- Prev -->
          <?php if ($page > 1): ?>
            <li class="page-item">
              <a class="page-link"
                href="?page=<?= $page - 1 ?>&tanggal_awal=<?= $tanggal_awal ?>&tanggal_akhir=<?= $tanggal_akhir ?>">
                Prev
              </a>
            </li>
          <?php endif; ?>

          <!-- Page numbers -->
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page ? 'active' : '') ?>">
              <a class="page-link"
                href="?page=<?= $i ?>&tanggal_awal=<?= $tanggal_awal ?>&tanggal_akhir=<?= $tanggal_akhir ?>">
                <?= $i ?>
              </a>
            </li>
          <?php endfor; ?>

          <!-- Next -->
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
          <div class="mb-3">
            <label>Alasan Penolakan:</label>
            <textarea name="alasan" class="form-control" rows="4" required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Tolak Donasi</button>
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
