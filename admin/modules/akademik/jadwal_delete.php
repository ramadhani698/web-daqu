<?php
include '../../config/config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM jadwal_akademik WHERE id=$id");
header("Location: jadwal.php");
exit;
