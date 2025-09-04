<?php
include __DIR__ . '/../../config/config.php';

$id = (int)$_GET['id'];
$data = $conn->query("SELECT gambar FROM daqu_produk WHERE id=$id")->fetch_assoc();

if ($data && !empty($data['gambar'])) {
    $filePath = __DIR__ . "/../../../uploads/" . $data['gambar'];
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

$conn->query("DELETE FROM dec WHERE id=$id");

header("Location: dec.php?deleted=1");
exit;
