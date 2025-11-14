<?php
include '../admin/config/config.php';

// Ambil kategori dari URL
$kategori = isset($_GET['kategori']) ? strtolower($_GET['kategori']) : '';
$judulHalaman = ucfirst($kategori);

// Ambil data program berdasarkan kategori
$stmt = $conn->prepare("SELECT * FROM program_donasi WHERE kategori = ? ORDER BY id DESC");
$stmt->bind_param("s", $kategori);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Program <?= htmlspecialchars($judulHalaman) ?> - Daarul Quran Al Jannah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }
    .program-container {
      max-width: 680px;
      margin: 40px auto;
    }
    .program-item {
      display: flex;
      flex-wrap: wrap;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      overflow: hidden;
      margin-bottom: 20px;
      transition: transform 0.2s;
    }
    .program-item:hover {
      transform: translateY(-3px);
    }
    .program-item img {
      width: 100%;
      max-width: 280px;
      height: 200px;
      object-fit: cover;
      object-position: top;
    }
    .program-content {
      flex: 1;
      padding: 20px;
    }
    .program-content h5 {
      font-weight: 600;
      margin-bottom: 10px;
    }
    .program-content p {
      font-size: 0.9rem;
      color: #555;
      margin-bottom: 10px;
    }
    .progress {
      height: 8px;
      border-radius: 10px;
    }
    .btn-donasi {
      background-color: #009970;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 8px 16px;
      font-weight: 500;
    }
    .btn-donasi:hover {
      background-color: #007f5a;
    }
  </style>
</head>
<body>
  <div class="container program-container">
    <h2 class="text-center mb-4">Program <?= htmlspecialchars($judulHalaman) ?></h2>

    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="program-item">
          <img src="../admin/modules/donasi/uploads/<?= htmlspecialchars($row['gambar']) ?>" 
               alt="<?= htmlspecialchars($row['judul']) ?>">

          <div class="program-content">
            <h5><?= htmlspecialchars($row['judul']) ?></h5>
            <p><?= nl2br(htmlspecialchars(substr($row['deskripsi'], 0, 180))) ?>...</p>

            <?php
              $persen = $row['target'] > 0 ? ($row['terkumpul'] / $row['target']) * 100 : 0;
            ?>
            <div class="progress mb-2">
              <div class="progress-bar bg-success" style="width: <?= $persen ?>%"></div>
            </div>
            <small class="text-muted d-block mb-2">
              Terkumpul: Rp<?= number_format($row['terkumpul'],0,',','.') ?> /
              Rp<?= number_format($row['target'],0,',','.') ?>
            </small>
            <a href="#" class="btn btn-donasi">Donasi Sekarang</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-center text-muted">Belum ada program <?= htmlspecialchars($judulHalaman) ?>.</p>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
