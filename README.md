# Secure File Upload System with Scan Logs 🔒

A simple file upload system that scans files based on their extensions and logs the results in a MySQL database. The backend connects to MySQL using ODBC, and the frontend features a modern, light-themed design with smooth animations.

---

## Features

- User Login: Login for users to upload files.
- File Scan: Files are scanned for suspicious extensions (e.g., .exe, .bat, .zip).
- Admin Dashboard: View file upload logs and scan results.
- Responsive UI: Light theme with smooth animations for a great user experience.

---

## Tech Stack

- Frontend: HTML, CSS (Light theme, Animations)
- Backend: PHP (ODBC for MySQL)
- Database: MySQL
- File Scanning: Extension-based scanning

---

## Installation

1. Clone the Repository

```
git clone https://github.com/your-username/secure-file-upload-system.git
cd secure-file-upload-system
```

2. Set Up the Project in XAMPP

Place the project in the `htdocs` folder of your XAMPP installation.

3. Create the MySQL Database

Run the following SQL command in phpMyAdmin:

```
CREATE DATABASE secure_upload_db;
```

4. Create the Necessary Tables

Run the following SQL commands to set up the tables:

```
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

```
CREATE TABLE uploaded_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_by INT,
    result ENUM('clean', 'suspicious') NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(id)
);
```

5. Configure Database Connection

Update the `includes/db.php` file with your database connection details.

6. Run the Project

Start Apache and MySQL in the XAMPP control panel.

Open your browser and visit:

```
http://localhost/secure-file-upload-system/dashboard.php
```

---

## Usage

- Users: Log in and upload files via the dashboard. Files are scanned and logged as either clean or suspicious.
- Admins: View the logs of uploaded files and their scan results on the admin dashboard.
