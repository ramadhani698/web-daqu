<?php
include __DIR__ . '/../../config/config.php';

$id = $_GET['id'];
$conn->query("DELETE FROM santri WHERE id=$id");

header("Location: santri.php");
exit;
