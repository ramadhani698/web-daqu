<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'];

// Ambil data lama
$data = $conn->query("SELECT image FROM sejarah WHERE id=$id")->fetch_assoc();

$targetDir = "../../../uploads/";

// Hapus file fisik kalau ada
if ($data && $data['image'] && file_exists($targetDir . $data['image'])) {
    unlink($targetDir . $data['image']);
}

// Hapus dari database
$conn->query("DELETE FROM sejarah WHERE id=$id");

header("Location: sejarah.php?success=1");
exit;
