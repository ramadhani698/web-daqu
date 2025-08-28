<?php
include __DIR__ . '/../../config/config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM stats WHERE id=$id");
header("Location: stats.php");
exit;
