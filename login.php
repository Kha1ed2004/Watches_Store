<?php
session_start();
$conn = new mysqli("localhost", "root", "", "watch_store");

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $res->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'name' => $user['name']
        ];
        $to = "khaledabdelwhab59@gmail.com";
        $subject = "New Login to Watch Store";
        $message = "User with email: $email has just logged in.";
        $headers = "From: watchstore@localhost";

        mail($to, $subject, $message, $headers);

        header("Location: index.php");
        exit;
    } else {
        $error = "البريد الإلكتروني أو كلمة المرور غير صحيحة!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="w-50 mx-auto bg-white p-4 shadow rounded">
            <h3 class="text-center mb-4 text-success">Login</h3>

            <?php if ($error): ?>
                <div class="alert alert-danger text-center">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <button class="btn btn-success w-100">Login</button>
            </form>

            <p class="text-center mt-3">
                Don't have an account? <a href="register.php">Register</a>
            </p>
        </div>
    </div>
</body>
</html>
