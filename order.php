<?php
$watch_name = $_POST['watch_name'] ?? 'Unknown Watch';
$watch_img = $_POST['watch_img'] ?? 'images/default.jpg';
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Order Watch<?= htmlspecialchars($watch_name) ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">You're almost ready to place your order</h2>
    <div class="text-center mb-4">
        <h3><?= htmlspecialchars($watch_name) ?></h3>
        <img src="<?= htmlspecialchars($watch_img) ?>" alt="watch" style="max-width: 200px;">
    </div>

    <form action="submit.php" method="POST" class="w-50 m-auto bg-white p-4 shadow rounded">
        <input type="hidden" name="watch_name" value="<?= htmlspecialchars($watch_name) ?>">
        <input type="hidden" name="watch_img" value="<?= htmlspecialchars($watch_img) ?>">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Your Name" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Gmail" required>
        </div>
        <div class="mb-3">
    <input type="text" name="phone" class="form-control" placeholder="The Phone" required>
</div>
        <div class="mb-3" >
            <textarea name="order_text" class="form-control" placeholder="Number of items" required></textarea>
        </div>
        <button type="submit" class="btn btn-warning btn-lg w-100">Place Order Now</button>
    </form>
</div>
<script src="css/bootstrap.bundle.min.js"></script>
</body>
</html>
?>
