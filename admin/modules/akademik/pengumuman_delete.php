<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$conn->query("DELETE FROM pengumuman WHERE id=$id");

header("Location: pengumuman.php?success=3");
exit;
