<?php
session_start();
session_destroy();

session_start();
$_SESSION['logout_msg'] = "تم تسجيل الخروج بنجاح ";

header("Location: index.php");
exit;
?>
