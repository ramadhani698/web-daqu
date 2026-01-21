<?php
include __DIR__ . '/../../config/config.php';
include '../../includes/header.php';
include '../../includes/navbar.php';
include '../../includes/sidebar.php';
?>

<div class="content-wrapper p-4">
  <h2 class="mb-4">Dashboard Analitik Donasi</h2>

  <?php
  // ============================================
  // 1. TOTAL DONASI KESELURUHAN
  // ============================================
  $totalDonasi = $conn->query("
    SELECT SUM(nominal) AS total 
    FROM transaksi_donasi 
    WHERE status = 'paid'
  ")->fetch_assoc()['total'] ?? 0;

  // ============================================
  // 2. TOTAL TRANSAKSI DONASI
  // ============================================
  $totalTransaksi = $conn->query("
    SELECT COUNT(*) AS total
    FROM transaksi_donasi
  ")->fetch_assoc()['total'] ?? 0;

  // ============================================
  // 3. DONASI PER KATEGORI
  // ============================================
  $kategoriQuery = $conn->query("
    SELECT 
        p.kategori,
        COUNT(d.id) AS total_transaksi,
        SUM(d.nominal) AS total_donasi
    FROM program_donasi p
    LEFT JOIN transaksi_donasi d 
        ON d.program_id = p.id AND d.status = 'paid'
    GROUP BY p.kategori
    ORDER BY p.kategori ASC
  ");

  $kategoriLabels = [];
  $kategoriValues = [];
  $kategoriRows = [];

  while ($row = $kategoriQuery->fetch_assoc()) {
    $kategoriLabels[] = $row['kategori'];
    $kategoriValues[] = $row['total_donasi'] ?? 0;
    $kategoriRows[] = $row;
  }

  // ============================================
  // 4. GRAFIK DONASI BULANAN (AMANN)
  // ============================================
  // Group berdasarkan bulan (YEAR-MONTH)
  // ... existing code ...
  $bulanan = $conn->query("
      SELECT 
          DATE_FORMAT(created_at, '%Y-%m') AS urutan,
          DATE_FORMAT(created_at, '%M %Y') AS bulan,
          SUM(nominal) AS total
      FROM transaksi_donasi
      WHERE status = 'paid'
      GROUP BY DATE_FORMAT(created_at, '%Y-%m'), DATE_FORMAT(created_at, '%M %Y')
      ORDER BY urutan ASC
  ");
// ... existing code ...

  $bulanLabels = [];
  $bulanValues = [];

  while ($b = $bulanan->fetch_assoc()) {
    $bulanLabels[] = $b['bulan'];
    $bulanValues[] = $b['total'];
  }
  ?>

  <!-- CARDS -->
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card shadow-sm p-3">
        <h5>Total Donasi</h5>
        <h3 class="text-success">Rp<?= number_format($totalDonasi, 0, ',', '.') ?></h3>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm p-3">
        <h5>Total Transaksi</h5>
        <h3><?= number_format($totalTransaksi) ?></h3>
      </div>
    </div>
  </div>

  <!-- GRAFIK DONASI PER KATEGORI -->
  <div class="card shadow-sm mb-4 p-3">
    <h5 class="mb-3">Grafik Donasi per Kategori</h5>
    <canvas id="chartKategori" height="100"></canvas>
  </div>

  <!-- GRAFIK DONASI PER BULAN -->
  <div class="card shadow-sm mb-4 p-3">
    <h5 class="mb-3">Grafik Donasi Bulanan</h5>
    <canvas id="chartBulanan" height="100"></canvas>
  </div>

  <!-- TABEL ANALITIK KATEGORI -->
  <div class="card shadow-sm mb-4 p-3">
    <h5>Rekap Donasi per Kategori</h5>
    <table class="table table-bordered table-striped mt-3">
      <thead class="table-light">
        <tr>
          <th>Kategori</th>
          <th>Total Transaksi</th>
          <th>Total Donasi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kategoriRows as $k): ?>
          <tr>
            <td><?= htmlspecialchars($k['kategori']) ?></td>
            <td><?= $k['total_transaksi'] ?></td>
            <td>Rp<?= number_format(is_null($k['total_donasi']) ? 0 : $k['total_donasi'], 0, ',', '.') ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  new Chart(document.getElementById('chartKategori'), {
    type: 'bar',
    data: {
      labels: <?= json_encode($kategoriLabels) ?>,
      datasets: [{
        label: "Total Donasi",
        data: <?= json_encode($kategoriValues) ?>,
      }]
    }
  });

  new Chart(document.getElementById('chartBulanan'), {
    type: 'line',
    data: {
      labels: <?= json_encode($bulanLabels) ?>,
      datasets: [{
        label: "Total Donasi Bulanan",
        data: <?= json_encode($bulanValues) ?>,
      }]
    }
  });
</script>

<?php include '../../includes/footer.php'; ?>
