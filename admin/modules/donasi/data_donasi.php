<?php
include __DIR__ . '/../../config/config.php';
include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/sidebar.php';

$program_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil nama program
$program = $conn->query("SELECT judul FROM program_donasi WHERE id = $program_id")->fetch_assoc();
?>

<div class="content-wrapper p-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Donasi Masuk - <?= htmlspecialchars($program['judul'] ?? 'Semua Program') ?></h2>
  </div>

  <?php
  $query = "
    SELECT d.*, p.judul 
    FROM transaksi_donasi d 
    JOIN program_donasi p ON d.program_id = p.id
  ";

  if ($program_id > 0) {
    $query .= " WHERE d.program_id = $program_id";
  }

  $query .= " ORDER BY d.id DESC";
  $result = $conn->query($query);
  ?>

  <table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
      <tr>
        <th width="5%">#</th>
        <th width="15%">Program</th>
        <th width="12%">Nama</th>
        <th width="13%">Email</th>
        <th width="10%">Nominal</th>
        <th width="10%">Metode</th>
        <th width="15%">Pesan</th>
        <th width="10%">Tanggal</th>
        <th width="10%">Bukti Transfer</th>
        <th width="10%">Status</th>
        <th width="10%">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): $no=1; while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['judul']) ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['email'] ?: '-') ?></td>
          <td>Rp<?= number_format($row['nominal'], 0, ',', '.') ?></td>
          <td><?= htmlspecialchars($row['metode']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['pesan'] ?: '-')) ?></td>
          <td><?= date('d M Y H:i', strtotime($row['created_at'])) ?></td>

          <td class="text-center">
            <?php if (!empty($row['bukti_transfer'])): ?>
              <a href="../../modules/donasi/uploads/bukti/<?= htmlspecialchars($row['bukti_transfer']) ?>" target="_blank">
                <img src="../../modules/donasi/uploads/bukti/<?= htmlspecialchars($row['bukti_transfer']) ?>" 
                     alt="Bukti Transfer" width="80" style="border-radius:5px;">
              </a>
            <?php else: ?>
              <span class="text-muted">Belum ada</span>
            <?php endif; ?>
          </td>

          <td>
            <?php if ($row['status'] == 'paid'): ?>
              <span class="badge bg-success">Sudah Diverifikasi</span>
            <?php elseif ($row['status'] == 'menunggu_verifikasi'): ?>
              <span class="badge bg-warning text-dark">Menunggu</span>
            <?php else: ?>
              <span class="badge bg-secondary">Belum Bayar</span>
            <?php endif; ?>
          </td>

          <td>
            <?php if ($row['status'] != 'paid' && !empty($row['bukti_transfer'])): ?>
              <a href="konfirmasi_donasi.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success" 
                 onclick="return confirm('Konfirmasi pembayaran ini?')">Konfirmasi</a>
            <?php else: ?>
              <button class="btn btn-sm btn-secondary" disabled>-</button>
            <?php endif; ?>
          </td>
        </tr>
      <?php endwhile; else: ?>
        <tr>
          <td colspan="11" class="text-center text-muted">Belum ada data donasi masuk.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php include '../../includes/footer.php'; ?>
