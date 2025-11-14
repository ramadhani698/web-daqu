<?php
include __DIR__ . '/../../config/config.php';

$id = (int)$_GET['id'];
$data = $conn->query("SELECT gambar FROM carousel_donasi WHERE id=$id")->fetch_assoc();

if ($data && !empty($data['gambar'])) {
    $file = __DIR__ . "/../../../donasi/uploads/" . $data['gambar'];
    if (file_exists($file)) unlink($file);
}

$conn->query("DELETE FROM carousel_donasi WHERE id=$id");

header("Location: carousel_donasi.php?deleted=1");
exit;
?>