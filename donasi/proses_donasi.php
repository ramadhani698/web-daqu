<?php
include __DIR__ . "/../admin/config/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $program_id = (int)$_POST['program_id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $nominal = (int)$_POST['nominal'];
    $metode = mysqli_real_escape_string($conn, $_POST['metode_pembayaran']);
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan'] ?? '');

    // simpan transaksi dengan status pending
    $conn->query("INSERT INTO transaksi_donasi (program_id, nama, nominal, metode, email, pesan, status)
                  VALUES ($program_id, '$nama', $nominal, '$metode', '$email', '$pesan', 'pending')");

    // ambil ID transaksi terakhir
    $transaksi_id = $conn->insert_id;

    // arahkan ke halaman konfirmasi pembayaran
    header("Location: konfirmasi_pembayaran.php?id=$transaksi_id");
    exit;
}

?>
