<?php
$conn = new mysqli("localhost", "root", "", "watch_store");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "<script>
                alert('الإيميل مسجل بالفعل. حاول باستخدام إيميل مختلف.');
                window.location.href = 'register.php';
              </script>";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql)) {
            echo "<script>
                    alert('تم إنشاء الحساب بنجاح!');
                    window.location.href = 'index.php';
                  </script>";
            exit;
            
        } else {
            echo "<script>
                    alert('حدث خطأ أثناء التسجيل: " . $conn->error . "');
                  </script>";
        }
    }
    $to = "khaledabdelwhab59@gmail.com";
$subject = "New Registration";
$message = "New user registered with email: $email.";
$headers = "From: watchstore@localhost";

mail($to, $subject, $message, $headers);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="w-50 mx-auto bg-white p-4 shadow rounded">
            <h3 class="text-center mb-4 text-primary">Create Account</h3>
            <form action="register.php" method="POST">
                <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <button class="btn btn-primary w-100">Register</button>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
