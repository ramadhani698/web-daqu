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
</head>
<body>
  <div class="container py-5">
    <h1><?= htmlspecialchars($berita['judul']) ?></h1>
    <p class="text-muted"><?= date("d M Y", strtotime($berita['created_at'])) ?></p>
    <img src="../<?= htmlspecialchars($berita['gambar']) ?>" alt="<?= htmlspecialchars($berita['judul']) ?>" class="img-fluid mb-4">
    <div>
      <?= nl2br($berita['deskripsi']) ?>
    </div>

    <a href="../news/berita.php#berita" class="btn btn-secondary mt-4">← Kembali</a>
  </div>
</body>
</html>
