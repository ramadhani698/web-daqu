<?php
include __DIR__ . "/../../config/config.php";

$id = (int)$_GET['id'];

$result = $conn->query("SELECT gambar FROM program_donasi WHERE id=$id");
if ($result->num_rows == 0) die("Data tidak ditemukan!");

$data = $result->fetch_assoc();
$path = __DIR__ . "/uploads/" . $data['gambar'];

$conn->query("DELETE FROM program_donasi WHERE id=$id");

if (file_exists($path)) unlink($path);

header("Location: donasi.php?pesan=hapus_berhasil");
exit;
?>
