<?php
include __DIR__ . '/../admin/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];

    // Pastikan transaksi ada
    $transaksi = $conn->query("SELECT * FROM transaksi_donasi WHERE id=$id")->fetch_assoc();
    if (!$transaksi) {
        echo "<script>alert('Transaksi tidak ditemukan.'); history.back();</script>";
        exit;
    }

    // Pastikan folder upload tersedia
    $uploadDir = __DIR__ . '/../admin/modules/donasi/uploads/bukti/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Proses upload bukti
    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['bukti']['tmp_name'];
        $fileName = time() . '_' . basename($_FILES['bukti']['name']);
        $targetFile = $uploadDir . $fileName;
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];

        if (!in_array($ext, $allowed)) {
            echo "<script>alert('Format file tidak diizinkan. Harap upload JPG, JPEG, atau PNG.'); history.back();</script>";
            exit;
        }

        if (move_uploaded_file($tmpName, $targetFile)) {
            // Simpan nama file ke database & ubah status jadi "menunggu verifikasi"
            $stmt = $conn->prepare("UPDATE transaksi_donasi SET bukti_transfer=?, status='menunggu_verifikasi' WHERE id=?");
            $stmt->bind_param("si", $fileName, $id);
            $stmt->execute();

            echo "<script>alert('Bukti pembayaran berhasil dikirim. Tunggu verifikasi dari admin.'); window.location='donasi.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupload bukti pembayaran.'); history.back();</script>";
        }
    } else {
        echo "<script>alert('Harap upload bukti pembayaran terlebih dahulu.'); history.back();</script>";
    }
}
?>
