<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
    die("غير مصرح لك بالدخول");
}
$conn = new mysqli("localhost", "root", "", "watch_store");

// لعرض الطلبات
$res = $conn->query("SELECT * FROM orders");
echo "<h2>الطلبات</h2>";
while ($row = $res->fetch_assoc()) {
    echo "
    <div>
        <p><strong>{$row['username']}</strong> طلب الساعة: {$row['watch_name']}</p>
        <form method='POST' action='delete_order.php'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <button type='submit'>حذف</button>
        </form>
    </div><hr>";
}
?>
