<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "web_daqu";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
    die("Koneksi gagal: " . $con->connect_error);
}