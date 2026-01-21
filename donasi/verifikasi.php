<?php
include __DIR__ . '/../admin/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = (int)$_POST['id'];
    $donasi = $conn->query("SELECT * FROM donasi_non_program WHERE id=$id")->fetch_assoc();

    if (!$donasi) {
        echo "<script>alert('Donasi tidak ditemukan.'); history.back();</script>";
        exit;
    }

    // Pastikan folder upload ada
    $uploadDir = __DIR__ . '/../admin/modules/donasi_non_program/bukti/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Upload bukti
    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {

        $tmpName = $_FILES['bukti']['tmp_name'];
        $fileName = time() . '_' . basename($_FILES['bukti']['name']);
        $targetFile = $uploadDir . $fileName;

        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];

        if (!in_array($ext, $allowed)) {
            echo "<script>alert('Format file harus JPG, JPEG atau PNG'); history.back();</script>";
            exit;
        }

        if (move_uploaded_file($tmpName, $targetFile)) {

            $stmt = $conn->prepare("UPDATE donasi_non_program SET bukti=?, status='pending' WHERE id=?");
            $stmt->bind_param("si", $fileName, $id);
            $stmt->execute();

            echo "<script>alert('Bukti berhasil dikirim! Tunggu verifikasi dari admin.'); window.location='donasi.php';</script>";
        } else {
            echo "<script>alert('Upload gagal. Silakan coba lagi.'); history.back();</script>";
        }

    } else {
        echo "<script>alert('Harap upload bukti pembayaran.'); history.back();</script>";
    }
}
?>
