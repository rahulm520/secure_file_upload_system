# Secure File Upload System with Scan Logs

A simple file upload system that scans files based on their extensions and logs the results in a MySQL database. The backend connects to MySQL using ODBC and the frontend features a modern, light-themed design with smooth animations.

## Features

- **User Login**: Login for users to upload files.
- **File Scan**: Files are scanned for suspicious extensions (e.g., `.exe`, `.bat`, `.zip`).
- **Admin Dashboard**: View file upload logs and scan results.
- **Responsive UI**: Light theme with smooth animations.

## Tech Stack

- **Frontend**: HTML, CSS (Light theme, Animations)
- **Backend**: PHP (ODBC for MySQL)
- **Database**: MySQL
- **File Scanning**: Extension-based scanning

## Installation

1. Clone the repo:
   ```bash
   git clone https://github.com/your-username/secure-file-upload-system.git
   cd secure-file-upload-system
Place the project in the htdocs folder of XAMPP.

Create a MySQL database:

CREATE DATABASE secure_upload_db;
Run the provided SQL commands to set up the tables.

Configure the database connection in includes/db.php.

Run Apache and MySQL on XAMPP, then visit http://localhost/secure-file-upload-system/dashboard.php.

Usage
Users: Upload files via the dashboard. Files are scanned and logged.

Admins: View logs of uploaded files in the admin dashboard.
