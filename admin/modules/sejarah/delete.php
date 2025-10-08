<?php
include __DIR__ . '/../../config/config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // ambil semua gambar terkait sejarah ini
    $res = $conn->query("SELECT * FROM sejarah_gambar WHERE sejarah_id=$id");
    while ($g = $res->fetch_assoc()) {
        if ($g['image'] && file_exists(__DIR__ . '/../../../' . $g['image'])) {
            unlink(__DIR__ . '/../../../' . $g['image']);
        }
    }

    // hapus data gambar di DB
    $conn->query("DELETE FROM sejarah_gambar WHERE sejarah_id=$id");

    // hapus data utama
    $conn->query("DELETE FROM sejarah WHERE id=$id");

    header("Location: sejarah.php?status=deleted");
    exit;
}
?>
