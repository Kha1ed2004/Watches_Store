<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
    die("غير مصرح لك");
}

$conn = new mysqli("localhost", "root", "", "watch_store");
$id = $_POST['id'];
$conn->query("DELETE FROM orders WHERE id=$id");
header("Location: admin_dashboard.php");
?>
