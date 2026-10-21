<?php
session_start();
require_once 'db.php';   // pulls in your database connection

 $message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $message = "Please enter both username and password.";
    } else {
        // ⚠️ Change 'users' if your table has a different name
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Works if register.php used password_hash()
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id']  = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("Location: welcome.php");
                exit;
            }
        }
        $message = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="login-container">
        <h1>Login</h1>
        <?php if ($message): ?>
            <p style="color: red;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <a href="index.html">← Back to login</a>
    </main>
</body>
</html>