<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT id, role FROM users WHERE username = ? AND password_hash = ?";
    $stmt = odbc_prepare($conn, $sql);
    if (!$stmt) {
        $error = "Database error: failed to prepare statement.";
    } else {
        $exec = odbc_execute($stmt, [$username, $password]);
        if (!$exec) {
            $error = "Database error: failed to execute statement.";
        } else {
            $row = odbc_fetch_array($stmt);
            if ($row) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid credentials";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h2>Login</h2>
<form method="POST">
    <input name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button>Login</button>
</form>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
