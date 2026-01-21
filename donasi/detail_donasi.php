<?php
include __DIR__ . '/../admin/config/config.php';

// ID program dari URL
$id = (int)$_GET['id'];

// data program dari tabel program_donasi
$program = $conn->query("SELECT * FROM program_donasi WHERE id=$id")->fetch_assoc();
if (!$program) {
  echo "<h2>Program donasi tidak ditemukan.</h2>";
  exit;
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $nominal = (int)$_POST['nominal'];
  $metode = mysqli_real_escape_string($conn, $_POST['metode']);

  // Simpan transaksi ke database
  $conn->query("INSERT INTO transaksi_donasi (program_id, nama, nominal, metode)
  VALUES ($id, '$nama', $nominal, '$metode')");

  // Update kolom di tabel program_donasi
  $conn->query("UPDATE program_donasi SET terkumpul = terkumpul + $nominal WHERE id = $id");

  echo "<script>alert('Terima kasih atas donasinya!'); window.location='detail_donasi.php?id=$id';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars(stripslashes($program['judul'])) ?> - Detail Donasi</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
        font-family: Poppins, sans-serif;
        background:#f8f9fa;
        padding:20px;
    }
    .container {
        max-width:680px;
        margin:auto;
        background:#fff;
        padding:20px;
        border-radius:10px;
        box-shadow:0 4px 10px rgba(0,0,0,0.1);
    }
    img {
        width:100%;
        border-radius:10px;
        margin-bottom:15px;
    }
    h2 {
        color:#009970;
    }
    .progress {
        background:#e0e0e0;
        border-radius:5px;
        height:10px;
        margin-bottom:10px;
    }
    .bar {
        background:#009970;
        height:10px;
        border-radius:5px;
    }
    form {
        margin-top:20px;
    }
    input, select {
        width:100%;
        padding:8px;
        margin:10px 0;
        border:1px solid #ccc;
        border-radius:5px;
    }
    button {
        background:#009970;
        color:white;
        border:none;
        padding:10px 20px;
        border-radius:5px;
        cursor:pointer;
    }
    button:hover {
        background:#007b5c;
    }
  </style>
</head>
<body>

<div class="container">
  <img src="../admin/modules/donasi/uploads/<?= htmlspecialchars($program['gambar']) ?>" alt="<?= htmlspecialchars($program['judul']) ?>">
  <h2><?= htmlspecialchars($program['judul']) ?></h2>
   <?= $program['deskripsi'] ?>

  <?php
    $persen = $program['target'] > 0 ? ($program['terkumpul'] / $program['target']) * 100 : 0;
  ?>
  <div class="progress"><div class="bar" style="width: <?= $persen ?>%"></div></div>
  <p><strong>Terkumpul:</strong> Rp<?= number_format($program['terkumpul'],0,',','.') ?> dari Rp<?= number_format($program['target'],0,',','.') ?></p>

  <hr>
  <h3>Donasi Sekarang</h3>
    <form action="proses_donasi.php" method="POST">
    <input type="hidden" name="program_id" value="<?= $program['id'] ?>">

    <label>Nama Lengkap</label>
    <input type="text" name="nama_lengkap" required>

    <label>Email (opsional)</label>
    <input type="email" name="email">

    <label>Nominal Donasi</label>
    <input type="number" name="nominal" required min="1000">

    <label>Metode Pembayaran</label>
    <select name="metode_pembayaran" required>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="QRIS">QRIS</option>
        <option value="Tunai">Tunai</option>
    </select>

    <label>Pesan / Doa (opsional)</label>
    <textarea name="pesan"></textarea>

    <button type="submit" name="donasi">Kirim Donasi</button>
    </form>

</div>

</body>
</html>
