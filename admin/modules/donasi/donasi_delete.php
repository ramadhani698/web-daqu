<?php
include __DIR__ . "/../../config/config.php";

$id = (int)$_GET['id'];

// Ambil nama file gambar
$result = $conn->query("SELECT gambar FROM program_donasi WHERE id = $id");
if ($result->num_rows > 0) {
  $data = $result->fetch_assoc();
  $path = __DIR__ . "/uploads/" . $data['gambar'];

  // Hapus data di database
  if ($conn->query("DELETE FROM program_donasi WHERE id = $id")) {
    // Hapus file fisik jika ada
    if (file_exists($path)) {
      unlink($path);
    }
    header("Location: donasi.php?pesan=hapus_berhasil");
    exit;
  } else {
    echo "Gagal menghapus data: " . $conn->error;
  }
} else {
  echo "Data tidak ditemukan!";
}
?>
