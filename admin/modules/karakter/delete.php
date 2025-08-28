<?php
include __DIR__ . '/../../config/config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // ambil gambar
    $res = $conn->query("SELECT * FROM karakter_gambar WHERE karakter_id=$id");
    while($g = $res->fetch_assoc()){
        if($g['gambar'] && file_exists(__DIR__ . '/../../../' . $g['gambar'])){
            unlink(__DIR__ . '/../../../' . $g['gambar']);
        }
    }

    $conn->query("DELETE FROM karakter WHERE id=$id");
    header("Location: karakter.php?status=deleted");
    exit;
}
?>
