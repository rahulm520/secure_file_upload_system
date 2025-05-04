<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$target_dir = "uploads/";
$original_name = basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . time() . "_" . $original_name;
$file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Simulated scanning logic
$suspicious_ext = ['exe', 'bat', 'js', 'vbs', 'zip'];
$scan_result = in_array($file_ext, $suspicious_ext) ? 'suspicious' : 'clean';

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // Save to DB
    $sql = "INSERT INTO uploaded_files (filename, filepath, uploaded_by, result) VALUES (?, ?, ?, ?)";
    $stmt = odbc_prepare($conn, $sql);
    if (!$stmt) {
        echo "<p>Database error: failed to prepare statement.</p>";
    } else {
        $exec = odbc_execute($stmt, [$original_name, $target_file, $_SESSION['user_id'], $scan_result]);
        if (!$exec) {
            echo "<p>Database error: failed to execute statement.</p>";
        } else {
            echo "<p>File uploaded and scanned as: <strong>$scan_result</strong></p>";
            echo '<a href="dashboard.php">Go Back</a>';
        }
    }
} else {
    echo "<p>Upload failed.</p>";
}
?>
