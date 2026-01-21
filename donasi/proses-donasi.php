<?php
include '../admin/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama      = trim($_POST['nama']);
    $nominal   = $_POST['nominal'];
    $metode    = $_POST['metode'];
    $email     = $_POST['email'] ?? null;
    $pesan     = $_POST['pesan'] ?? null;
    $kategori  = $_POST['kategori'] ?? null;
    $program_id = !empty($_POST['program_id']) ? $_POST['program_id'] : null;

    // Validasi dasar
    if (empty($nama) || empty($nominal) || empty($metode) || empty($kategori)) {
        die("Data tidak lengkap.");
    }

    // Insert donasi
    $stmt = $conn->prepare("
        INSERT INTO donasi_non_program (nama, nominal, metode, email, pesan, kategori, program_id, status, created_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW())
    ");

    $stmt->bind_param("sdssssi", $nama, $nominal, $metode, $email, $pesan, $kategori, $program_id);


    if ($stmt->execute()) {
        $donasi_id = $stmt->insert_id;

        header("Location: konfirmasi.php?id=" . $donasi_id);
        exit;
    } else {
        echo "Gagal menyimpan data donasi: " . $conn->error;
    }
}
?>
