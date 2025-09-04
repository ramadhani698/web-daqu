<?php
include __DIR__ . '/../../config/config.php';
$id = (int)$_GET['id'];
$data = $conn->query("SELECT foto FROM alumni WHERE id=$id")->fetch_assoc();

// hapus file foto
if ($data && !empty($data['foto']) && file_exists(__DIR__ . "/../../../" . $data['foto'])) {
    unlink(__DIR__ . "/../../../" . $data['foto']);
}

$conn->query("DELETE FROM alumni WHERE id=$id");
header("Location: alumni.php");
exit;
