<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['id'])) {
    die("ID tidak valid.");
}

$id = (int)$_GET['id'];

// Ambil nama file bukti dulu
$get = $conn->query("SELECT bukti_transfer FROM transaksi_donasi WHERE id=$id");
$data = $get->fetch_assoc();

// Hapus data dari database
$delete = $conn->query("DELETE FROM transaksi_donasi WHERE id=$id");

if ($delete) {

    // Hapus file bukti jika ada
    if (!empty($data['bukti']) && file_exists("uploads/" . $data['bukti'])) {
        unlink("uploads/" . $data['bukti']);
    }

    echo "<script>
            alert('Donasi berhasil dihapus.');
            window.location='data_donasi.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data.');
            history.back();
          </script>";
}
?>