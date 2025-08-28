<?php
// Koneksi ke database
$host = "localhost";
$user = "root"; // ganti kalau ada user lain
$pass = "";
$db   = "pesantren_daqu";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama_lengkap       = $_POST['nama_lengkap'];
$nama_panggilan     = $_POST['nama_panggilan'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$alamat             = $_POST['alamat'];
$no_hp              = $_POST['no_hp'];
$nama_ortu          = $_POST['nama_ortu'];
$pendidikan_terakhir= $_POST['pendidikan_terakhir'];
$nama_sekolah       = $_POST['nama_sekolah'];
$tahun_lulus        = $_POST['tahun_lulus'];
$hafalan            = $_POST['hafalan'];
$motivasi           = $_POST['motivasi'];
$harapan            = $_POST['harapan'];
$sumber_info        = $_POST['sumber_info'];

// Upload foto
$foto = "";
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $targetDir = "uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $foto = $targetDir . time() . "_" . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
}

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO pendaftaran 
    (nama_lengkap, nama_panggilan, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, no_hp, nama_ortu, pendidikan_terakhir, nama_sekolah, tahun_lulus, hafalan, motivasi, harapan, sumber_info, foto) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssisssss",
    $nama_lengkap, $nama_panggilan, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $alamat, $no_hp, $nama_ortu, $pendidikan_terakhir, $nama_sekolah, $tahun_lulus, $hafalan, $motivasi, $harapan, $sumber_info, $foto);

if ($stmt->execute()) {
    echo "<script>alert('Pendaftaran berhasil!'); window.location.href='pendaftaran.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
