<?php
include "../admin/config/config.php";

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil data berita dari database
$stmt = $conn->prepare("SELECT * FROM berita WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$berita = $result->fetch_assoc();

// Jika berita tidak ditemukan
if (!$berita) {
    echo "<h2>Berita tidak ditemukan</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($berita['judul']) ?> - Detail Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <!-- font awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- My Style -->
  <link rel="stylesheet" href="../assets/css/reset.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
  <?php include('../includes/navbar.php') ?>
  <div class="container py-5 mt-5 detail-section">
    <h1><?= htmlspecialchars($berita['judul']) ?></h1>
    <p class="text-muted"><?= date("d M Y", strtotime($berita['created_at'])) ?></p>
    <img src="../<?= htmlspecialchars($berita['gambar']) ?>" alt="<?= htmlspecialchars($berita['judul']) ?>" class="img-fluid mb-4">
    <div>
      <?= nl2br($berita['deskripsi']) ?>
    </div>

    <a href="../news/berita.php#berita" class="btn btn-secondary mt-4">← Kembali</a>
  </div>
  <?php include('../includes/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/script.js"></script>
</body>
</html>
