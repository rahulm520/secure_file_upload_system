<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h2>Welcome, <?= $_SESSION['role']; ?>!</h2>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select file to upload:</label><br>
        <input type="file" name="fileToUpload" required><br><br>
        <button type="submit">Upload</button>
    </form>

    <br><a href="logs.php">View Scan Logs</a> | 
    <a href="logout.php">Logout</a>
</body>
</html>
