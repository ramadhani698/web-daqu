<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ketua.php');
    exit;
}

$id = intval($_GET['id']);
$query = "DELETE FROM ketua_kelas WHERE id = $id";
if (mysqli_query($conn, $query)) {
    header('Location: ketua.php?status=deleted');
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>