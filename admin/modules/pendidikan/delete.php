<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$stmt = $conn->prepare("DELETE FROM pendidikan WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: pendidikan.php?msg=deleted");
    exit;
} else {
    echo "Gagal menghapus data!";
}
