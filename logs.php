<?php
require 'includes/db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "Access denied.";
    exit();
}

$sql = "SELECT f.id, u.username, f.filename, f.result, f.uploaded_at FROM uploaded_files f JOIN users u ON f.uploaded_by = u.id ORDER BY f.uploaded_at DESC";
$result = odbc_exec($conn, $sql);
if (!$result) {
    exit("Database query failed: " . odbc_errormsg($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Scan Logs</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h2>File Scan Logs</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Username</th><th>Filename</th><th>Result</th><th>Timestamp</th>
    </tr>
    <?php while ($row = odbc_fetch_array($result)) : ?>
    <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= htmlspecialchars($row['filename']) ?></td>
        <td style="color:<?= $row['result'] === 'suspicious' ? 'red' : 'green' ?>"><?= htmlspecialchars($row['result']) ?></td>
        <td><?= htmlspecialchars($row['uploaded_at']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>
<br><a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
