<?php
include __DIR__ . '/../../config/config.php';
$id = (int)$_GET['id'];
$data = $conn->query("SELECT gambar FROM prestasi WHERE id=$id")->fetch_assoc();

// hapus file fisik
if ($data && !empty($data['gambar']) && file_exists(__DIR__ . "/../../../" . $data['gambar'])) {
    unlink(__DIR__ . "/../../../" . $data['gambar']);
}

// hapus data database
$conn->query("DELETE FROM prestasi WHERE id=$id");

header("Location: prestasi.php");
exit;
