<?php
include __DIR__ . '/../../config/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: asrama.php');
    exit;
}

$id = intval($_GET['id']);
$query = "DELETE FROM ketua_asrama WHERE id = $id";
if (mysqli_query($conn, $query)) {
    header('Location: asrama.php?status=deleted');
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
