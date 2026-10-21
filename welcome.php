<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="login-container" style="text-align: center;">
        <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>! 🎉</h1>

        <p style="color: #666; font-size: 14px; margin-bottom: 25px;">
            You are now logged in to your account.
        </p>

        <a href="logout.php" class="btn-link">Logout</a>
    </main>
</body>
</html>