<?php
include "config/config.php";

$username = "admin";
$password = password_hash("daqualjannah", PASSWORD_DEFAULT);
$nama = "Administrator";

$stmt = $conn->prepare("INSERT INTO admin (username, password, nama_lengkap) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $nama);
$stmt->execute();

echo "User admin berhasil dibuat!";
