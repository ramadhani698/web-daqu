<?php
include __DIR__ . '/../../config/config.php';

// pastikan ada parameter id
if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit;
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM pendaftaran_santri WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<p>Data tidak ditemukan.</p>";
    exit;
}
?>

<?php include __DIR__ . '/../../includes/header.php'; ?>
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Detail Pendaftaran Santri</h1>
    <a href="dashboard.php" class="btn btn-secondary mb-3">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <h5 class="mb-3">Data Santri</h5>
        <table class="table table-bordered">
          <tr><th>Nama Lengkap</th><td><?= htmlspecialchars($data['nama_lengkap']) ?></td></tr>
          <tr><th>NIK</th><td><?= htmlspecialchars($data['nik']) ?></td></tr>
          <tr><th>NISN</th><td><?= htmlspecialchars($data['nisn']) ?></td></tr>
          <tr><th>KIP</th><td><?= htmlspecialchars($data['kip']) ?></td></tr>
          <tr><th>Tempat Lahir</th><td><?= htmlspecialchars($data['tempat_lahir']) ?></td></tr>
          <tr><th>Tanggal Lahir</th><td><?= htmlspecialchars($data['tanggal_lahir']) ?></td></tr>
          <tr><th>Anak Ke</th><td><?= htmlspecialchars($data['anak_ke']) ?></td></tr>
          <tr><th>Jumlah Saudara</th><td><?= htmlspecialchars($data['jumlah_saudara']) ?></td></tr>
          <tr><th>Cita-cita</th><td><?= htmlspecialchars($data['cita_cita']) ?></td></tr>
          <tr><th>Hobi</th><td><?= htmlspecialchars($data['hobi']) ?></td></tr>
          <tr><th>Pembiaya Sekolah</th><td><?= htmlspecialchars($data['pembiaya_sekolah']) ?></td></tr>
        </table>

        <h5 class="mt-4 mb-3">Data Orang Tua</h5>
        <table class="table table-bordered">
          <tr><th>No KK</th><td><?= htmlspecialchars($data['no_kk']) ?></td></tr>
          <tr><th>Nama Kepala Keluarga</th><td><?= htmlspecialchars($data['nama_kepala_keluarga']) ?></td></tr>
          <tr><th>Nama Ayah</th><td><?= htmlspecialchars($data['nama_ayah']) ?></td></tr>
          <tr><th>Status Ayah</th><td><?= htmlspecialchars($data['status_ayah']) ?></td></tr>
          <tr><th>NIK Ayah</th><td><?= htmlspecialchars($data['nik_ayah']) ?></td></tr>
          <tr><th>Tempat/Tanggal Lahir Ayah</th><td><?= htmlspecialchars($data['tempat_lahir_ayah']) ?> / <?= htmlspecialchars($data['tanggal_lahir_ayah']) ?></td></tr>
          <tr><th>Pendidikan Ayah</th><td><?= htmlspecialchars($data['pendidikan_ayah']) ?></td></tr>
          <tr><th>Pekerjaan Ayah</th><td><?= htmlspecialchars($data['pekerjaan_ayah']) ?></td></tr>
          <tr><th>Penghasilan Ayah</th><td><?= htmlspecialchars($data['penghasilan_ayah']) ?></td></tr>
          <tr><th>No HP Ayah</th><td><?= htmlspecialchars($data['hp_ayah']) ?></td></tr>

          <tr><th>Nama Ibu</th><td><?= htmlspecialchars($data['nama_ibu']) ?></td></tr>
          <tr><th>Status Ibu</th><td><?= htmlspecialchars($data['status_ibu']) ?></td></tr>
          <tr><th>NIK Ibu</th><td><?= htmlspecialchars($data['nik_ibu']) ?></td></tr>
          <tr><th>Tempat/Tanggal Lahir Ibu</th><td><?= htmlspecialchars($data['tempat_lahir_ibu']) ?> / <?= htmlspecialchars($data['tanggal_lahir_ibu']) ?></td></tr>
          <tr><th>Pendidikan Ibu</th><td><?= htmlspecialchars($data['pendidikan_ibu']) ?></td></tr>
          <tr><th>Pekerjaan Ibu</th><td><?= htmlspecialchars($data['pekerjaan_ibu']) ?></td></tr>
          <tr><th>Penghasilan Ibu</th><td><?= htmlspecialchars($data['penghasilan_ibu']) ?></td></tr>
          <tr><th>No HP Ibu</th><td><?= htmlspecialchars($data['hp_ibu']) ?></td></tr>
        </table>

        <h5 class="mt-4 mb-3">Alamat Orang Tua</h5>
        <table class="table table-bordered">
          <tr><th>Provinsi</th><td><?= htmlspecialchars($data['provinsi']) ?></td></tr>
          <tr><th>Kabupaten</th><td><?= htmlspecialchars($data['kabupaten']) ?></td></tr>
          <tr><th>Kecamatan</th><td><?= htmlspecialchars($data['kecamatan']) ?></td></tr>
          <tr><th>Kelurahan</th><td><?= htmlspecialchars($data['kelurahan']) ?></td></tr>
          <tr><th>RT/RW</th><td><?= htmlspecialchars($data['rt_rw']) ?></td></tr>
          <tr><th>Alamat Lengkap</th><td><?= nl2br(htmlspecialchars($data['alamat'])) ?></td></tr>
        </table>

        <h5 class="mt-4 mb-3">Berkas</h5>
        <p>
          KK:
          <?php if(!empty($data['file_kk'])): ?>
            <a href="uploads/<?= htmlspecialchars($data['file_kk']) ?>" target="_blank">
              Lihat
            </a>
          <?php else: ?>
            <em>Belum ada file KK</em>
          <?php endif; ?>
        </p>
        <p>
          Ijazah:
          <?php if(!empty($data['file_ijazah'])): ?>
            <a href="uploads/<?= htmlspecialchars($data['file_ijazah']) ?>" target="_blank">
              Lihat
            </a>
          <?php else: ?>
            <em>Belum ada file ijazah</em>
          <?php endif; ?>
        </p>
        <p class="mt-4">
          <strong>Tanggal Daftar:</strong> <?= date('d-m-Y H:i', strtotime($data['created_at'])) ?>
        </p>
      </div>
    </div>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
