<?php
include __DIR__ . '/../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak valid.");
}

$id     = (int) $_POST['id'];
$alasan = trim($_POST['alasan']);

if ($id <= 0 || empty($alasan)) {
    die("Data tidak lengkap.");
}

$stmt = $conn->prepare("
    UPDATE donasi_non_program 
    SET status='ditolak', alasan_penolakan=? 
    WHERE id=?
");
$stmt->bind_param("si", $alasan, $id);

if ($stmt->execute()) {
    echo "<script>
            alert('Donasi berhasil ditolak dengan alasan.');
            window.location='index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menolak donasi.');
            history.back();
          </script>";
}
