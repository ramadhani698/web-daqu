<?php
include __DIR__ . '/../../config/config.php';

$id = (int)$_GET['id'];
$data = $conn->query("SELECT gambar FROM galeri WHERE id=$id")->fetch_assoc();

if ($data && !empty($data['gambar'])) {
    $file = __DIR__ . "/../../../img/" . $data['gambar'];
    if (file_exists($file)) unlink($file);
}

$conn->query("DELETE FROM galeri WHERE id=$id");

header("Location: galeri.php?deleted=1");
exit;
