<?php
include __DIR__ . '/../admin/config/config.php';

$id = (int)$_GET['id'];
$donasi = $conn->query("SELECT * FROM donasi_non_program WHERE id=$id")->fetch_assoc();

if (!$donasi) {
    echo "Donasi tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Konfirmasi Pembayaran</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">

    <div class="card shadow p-4">
        <h3 class="text-center mb-3">Konfirmasi Pembayaran Donasi</h3>
        <p class="text-center">Terima kasih, <strong><?= htmlspecialchars($donasi['nama']) ?></strong></p>

        <p>Silakan transfer sebesar:</p>
        <h4 class="text-success fw-bold mb-4">
            Rp<?= number_format($donasi['nominal'], 0, ',', '.') ?>
        </h4>

        <p>Ke rekening berikut:</p>
        <ul class="mb-4">
            <li>Bank BSI - <strong>7001234567</strong></li>
            <li>A.n. <strong>Yayasan Daarul Quran Al Jannah</strong></li>
        </ul>

        <form action="verifikasi.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $donasi['id'] ?>">

            <label class="form-label">Upload Bukti Pembayaran (jpg, jpeg, png):</label>
            <input type="file" name="bukti" class="form-control" accept=".jpg,.jpeg,.png" required>

            <button type="submit" class="btn btn-primary w-100 mt-3">
                Kirim Bukti Pembayaran
            </button>
        </form>
    </div>

</div>
</body>
</html>
