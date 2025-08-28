<?php
include __DIR__ . '/../../config/config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil nama file gambar
    $result = $conn->query("SELECT gambar1, gambar2 FROM ekstrakurikuler WHERE id=$id");
    $row = $result->fetch_assoc();

    if ($row) {
        // Hapus file gambar1
        if ($row['gambar1'] && file_exists(__DIR__ . '/../../../' . $row['gambar1'])) {
            unlink(__DIR__ . '/../../../' . $row['gambar1']);
        }

        // Hapus file gambar2
        if ($row['gambar2'] && file_exists(__DIR__ . '/../../../' . $row['gambar2'])) {
            unlink(__DIR__ . '/../../../' . $row['gambar2']);
        }

        // Hapus data dari DB
        $conn->query("DELETE FROM ekstrakurikuler WHERE id=$id");
    }

    header("Location: ekskul.php?status=deleted");
    exit;
}
?>
