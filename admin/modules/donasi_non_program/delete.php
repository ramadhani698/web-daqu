<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['id'])) {
    die("ID tidak valid.");
}

$id = (int)$_GET['id'];

// Ambil nama file bukti dulu
$get = $conn->query("SELECT bukti FROM donasi_non_program WHERE id=$id");
$data = $get->fetch_assoc();

// Hapus data dari database
$delete = $conn->query("DELETE FROM donasi_non_program WHERE id=$id");

if ($delete) {

    // Hapus file bukti jika ada
    if (!empty($data['bukti']) && file_exists("bukti/" . $data['bukti'])) {
        unlink("bukti/" . $data['bukti']);
    }

    echo "<script>
            alert('Donasi berhasil dihapus.');
            window.location='index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus donasi.');
            history.back();
          </script>";
}
