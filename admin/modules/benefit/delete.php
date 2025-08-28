<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$conn->query("DELETE FROM benefit WHERE id=$id");

header("Location: benefit.php");
exit;
