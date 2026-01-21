<?php
include __DIR__ . '/../../config/config.php';

$id   = (int) $_GET['id'];
$aksi = $_GET['aksi'];

if ($aksi !== 'verifikasi') {
    die("Aksi verifikasi tidak valid.");
}

$status = 'valid';

$stmt = $conn->prepare("UPDATE donasi_non_program SET status=? WHERE id=?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    echo "<script>
            alert('Donasi berhasil diverifikasi.');
            window.location='index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal memverifikasi donasi.');
            history.back();
          </script>";
}
