<?php
include __DIR__ . '/../../config/config.php';

// Pastikan request valid
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak valid.");
}

$id     = (int) $_POST['id'];
$alasan = trim($_POST['alasan']);

if ($id <= 0 || empty($alasan)) {
    die("Data tidak lengkap.");
}

// Ambil data donatur
$stmt = $conn->prepare("
    SELECT t.email, t.nama, p.judul AS program
    FROM transaksi_donasi t
    JOIN program_donasi p ON t.program_id = p.id
    WHERE t.id = ?
");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data donasi tidak ditemukan.");
}

$email   = $data['email'];
$nama    = $data['nama'];
$program = $data['program'];

// Update status + alasan penolakan
$stmt2 = $conn->prepare("
    UPDATE transaksi_donasi
    SET status = 'ditolak', alasan_penolakan = ?
    WHERE id = ?
");
$stmt2->bind_param("si", $alasan, $id);

if ($stmt2->execute()) {
    // Kirim email notifikasi
    $subject = "Donasi Anda Ditolak - $program";
    $message = "Halo $nama,

Kami mohon maaf, donasi Anda untuk program \"$program\" telah DITOLAK.

Alasan Penolakan:
$alasan

Silakan upload ulang bukti transfer atau hubungi admin untuk bantuan.

Terima kasih.";
    $headers  = "From: admin@domainmu.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    @mail($email, $subject, $message, $headers);

    echo "<script>
            alert('Donasi berhasil ditolak dengan alasan.');
            window.location='data_donasi.php?ditolak=1';
          </script>";
} else {
    echo "<script>
            alert('Gagal menolak donasi.');
            history.back();
          </script>";
}
?>