<?php
include __DIR__ . '/../../config/config.php';
if (!isset($_GET['id'])) {
    header('Location: mudabbir.php');
    exit;
}
$id = intval($_GET['id']);
$query = "DELETE FROM mudabbir WHERE id = $id";
if (mysqli_query($conn, $query)) {
    header("Location: mudabbir.php?status=deleted");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>