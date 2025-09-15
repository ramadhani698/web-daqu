<?php
include __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
if (!$id) {
    die("ID tidak ditemukan.");
}

// Ambil data file KK dan ijazah dari database
$data = $conn->query("SELECT file_kk, file_ijazah FROM pendaftaran_santri WHERE id=$id")->fetch_assoc();

// Hapus file KK jika ada
if ($data && !empty($data['file_kk'])) {
    $kkPath = __DIR__ . '/uploads/' . basename($data['file_kk']);
    if (file_exists($kkPath)) {
        unlink($kkPath);
    }
}
// Hapus file ijazah jika ada
if ($data && !empty($data['file_ijazah'])) {
    $ijazahPath = __DIR__ . '/uploads/' . basename($data['file_ijazah']);
    if (file_exists($ijazahPath)) {
        unlink($ijazahPath);
    }
}

// Hapus data dari database
$conn->query("DELETE FROM pendaftaran_santri WHERE id=$id");

header("Location: dashboard.php?msg=deleted");
exit;
// ... existing code ...