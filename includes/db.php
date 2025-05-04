<?php
/**
 * Database connection using ODBC
 * 
 * Note: Ensure the ODBC extension is enabled in your PHP configuration.
 * To enable ODBC extension on Windows with XAMPP:
 * 1. Open your php.ini file (e.g., C:\xampp\php\php.ini)
 * 2. Uncomment or add the line: extension=php_odbc.dll
 * 3. Save the file and restart Apache server.
 * 
 * Without enabling the ODBC extension, functions like odbc_connect() will be undefined.
 */

$dsn = 'secure_upload_dsn'; // Your DSN name
$user = 'root';
$pass = ''; // Set this if your root has password

$conn = odbc_connect($dsn, $user, $pass);
if (!$conn) {
    exit("ODBC Connection failed: " . odbc_errormsg());
}
?>
