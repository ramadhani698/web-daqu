<?php
include __DIR__ . '/../admin/config/config.php';

$id = (int)$_GET['id'];
$transaksi = $conn->query("SELECT * FROM transaksi_donasi WHERE id=$id")->fetch_assoc();

if (!$transaksi) {
    echo "Transaksi tidak ditemukan.";
    exit;
}
?>

<h2>Konfirmasi Pembayaran</h2>
<p>Terima kasih, <?= htmlspecialchars($transaksi['nama']) ?>.</p>
<p>Silakan transfer sebesar <strong>Rp<?= number_format($transaksi['nominal'],0,',','.') ?></strong> ke rekening berikut:</p>
<ul>
  <li>Bank BSI - 7001234567</li>
  <li>a.n. Yayasan Daarul Quran Al Jannah</li>
</ul>

<form action="verifikasi_pembayaran.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $transaksi['id'] ?>">

  <label for="bukti">Upload Bukti Pembayaran (jpg, png, jpeg):</label><br>
  <input type="file" name="bukti" id="bukti" accept=".jpg,.jpeg,.png" required><br><br>

  <button type="submit">Kirim Bukti Pembayaran</button>
</form>
