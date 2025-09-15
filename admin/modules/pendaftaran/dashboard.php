<?php
// koneksi ke database
include __DIR__ . '/../../config/config.php';

// ambil semua data pendaftaran santri
$pendaftaran = $conn->query("SELECT id, nama_lengkap, tanggal_lahir, provinsi, kabupaten, created_at 
  FROM pendaftaran_santri 
  ORDER BY id DESC");
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
              <?php $no = 1; while($row = $pendaftaran->fetch_assoc()): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                  <td><?= htmlspecialchars($row['tanggal_lahir']) ?></td>
                  <td><?= htmlspecialchars($row['provinsi']) ?></td>
                  <td><?= htmlspecialchars($row['kabupaten']) ?></td>
                  <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                  <td>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="delete.php?id=<?= $row['id'] ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
