<?php
include __DIR__ . '/../../config/config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0) {
    $query = "DELETE FROM ostdaqu WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: organisasi.php?status=deleted");
        exit;
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($conn) . "');window.location.href='organisasi.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak valid');window.location.href='organisasi.php';</script>";
    exit;
}
?>