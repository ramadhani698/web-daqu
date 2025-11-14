<?php
include __DIR__ . '/../../config/config.php';

$id = (int)$_GET['id'];
$transaksi = $conn->query("SELECT * FROM transaksi_donasi WHERE id=$id")->fetch_assoc();

if (!$transaksi) {
    echo "<script>alert('Data tidak ditemukan.'); history.back();</script>";
    exit;
}

// Update status ke 'paid'
$conn->query("UPDATE transaksi_donasi SET status='paid' WHERE id=$id");

// Tambahkan nominal ke total program
$program_id = $transaksi['program_id'];
$nominal = $transaksi['nominal'];
$conn->query("UPDATE program_donasi SET terkumpul = terkumpul + $nominal WHERE id = $program_id");

echo "<script>alert('Donasi berhasil dikonfirmasi dan total terkumpul telah diperbarui.'); 
      window.location='data_donasi.php?id=$program_id';</script>";
?>
