<?php
include '../../config/config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM info_akademik WHERE id=$id");
header("Location: akademik.php");
exit;
