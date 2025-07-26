<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'watch_store';
$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$conn->query("CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    order_text TEXT,
    watch_name VARCHAR(255),
    watch_img VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $phone = $conn->real_escape_string($_POST['phone'] ?? '');
    $order_text = $conn->real_escape_string($_POST['order_text'] ?? '');
    $watch_name = $conn->real_escape_string($_POST['watch_name'] ?? '');
    $watch_img = $conn->real_escape_string($_POST['watch_img'] ?? '');
    if ($username && $email && $order_text&& $phone) {
   $sql = "INSERT INTO orders (watch_name, watch_img, username, email, phone, order_text)
        VALUES ('$watch_name', '$watch_img', '$username', '$email', '$phone', '$order_text')";
        if ($conn->query($sql)) {
           $mail = new PHPMailer(true);
try {
    $mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'khaledabdelwhab59@gmail.com';
    $mail->Password   = 'qlyr krgc zlyo fbix';   
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('khaledabdelwhab59@gmail.com', 'Your Website');
    $mail->addAddress('khaledabdelwhab59@gmail.com');
    $mail->Body = "تم استلام طلب جديد:
اسم العميل: $username
الإيميل: $email
رقم الهاتف: $phone
الساعة المطلوبة: $watch_name
ملاحظات الطلب: $order_text";

    $mail->isHTML(false);
    $mail->Subject = 'تم استلام طلب جديد على موقع الساعات';
    $mail->Body    = "تم استلام طلب جديد:
    اسم العميل: $username
    الإيميل: $email
    الساعة المطلوبة: $watch_name
    ملاحظات الطلب: $order_text
    $phone:رقم الهاتف";
    
    $mail->send();
    echo "<div style='text-align:center; margin-top:50px;'>
            <h2 style='color:green;'>Your order has been received successfully</h2>
            <h4>" . htmlspecialchars($watch_name) . "</h4>
            <img src='" . htmlspecialchars($watch_img) . "' alt='watch' style='max-width:200px;'>
          </div>";
} catch (Exception $e) {
    echo "فشل إرسال رسالة الإشعار. الخطأ: {$mail->ErrorInfo}";
}
        } else {
            echo "حدث خطأ: " . $conn->error;
        }
    } else {
        echo "يرجى ملء كل البيانات.";
    }
} else {
    echo "طريقة الإرسال غير صحيحة.";
}
$conn->close();
?>
