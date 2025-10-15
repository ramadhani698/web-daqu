<?php
// Konfigurasi Google Sheets
$apiKey = 'AIzaSyBxMgWn7xnMrSN7b1AzBgMFoNQZFluQBu4';
$spreadsheetId = '1258lKgaYjBPn5V-tYqpXgjSKgoudcUsN5loMlfwSfhA';
$range = 'Form Responses 1';
$rangeEncoded = urlencode($range);

$url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheetId/values/$rangeEncoded?key=$apiKey";

$response = file_get_contents($url);
$data = json_decode($response, true);

// Export semua data Google Sheets ke CSV (termasuk header)
if (isset($_GET['export']) && $_GET['export'] == 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="pendaftaran_full.csv"');
    $output = fopen('php://output', 'w');
    if (isset($data['values']) && count($data['values']) > 0) {
        foreach ($data['values'] as $row) {
            fputcsv($output, $row);
        }
    }
    fclose($output);
    exit;
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard Pendaftaran Santri</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <!-- Tombol Export CSV -->
        <a href="?export=csv" class="btn btn-success btn-sm mb-2">Export Semua Data CSV</a>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($data['values']) && count($data['values']) > 1) {
                  $no = 1;
                  $rowIndex = 2; // Mulai dari 2 karena baris 1 adalah header
                  // Lewati baris header (baris pertama)
                  for ($i = 1; $i < count($data['values']); $i++) {
                      $row = $data['values'][$i];
                      // Sesuaikan index kolom sesuai urutan di Google Form
                      $nama_lengkap   = isset($row[1]) ? $row[1] : '';
                      $tanggal_lahir  = isset($row[6]) ? $row[6] : '';
                      $provinsi       = isset($row[32]) ? $row[32] : '';
                      $kabupaten      = isset($row[33]) ? $row[33] : '';
                      $tanggal_daftar = isset($row[0]) ? $row[0] : ''; // Biasanya timestamp di kolom pertama
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($nama_lengkap) ?></td>
                  <td><?= htmlspecialchars($tanggal_lahir) ?></td>
                  <td><?= htmlspecialchars($provinsi) ?></td>
                  <td><?= htmlspecialchars($kabupaten) ?></td>
                  <td><?= htmlspecialchars($tanggal_daftar) ?></td>
                  <td>
                    <a href="https://docs.google.com/spreadsheets/d/<?= $spreadsheetId ?>/edit#gid=0&range=A<?= $rowIndex ?>" target="_blank" title="Lihat detail di Google Sheets">
                      <i class="fa fa-eye"></i>
                    </a>
                  </td>
                </tr>
              <?php
                      $rowIndex++;
                  }
              } else {
                  echo "<tr><td colspan='7' class='text-center'>Data belum tersedia atau sheet belum di-share publik.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>