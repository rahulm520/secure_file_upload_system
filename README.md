🛡️ Secure File Upload System with Scan Logs
A simple file upload system that scans files based on their extensions and logs the results in a MySQL database. The backend connects to MySQL using ODBC, and the frontend features a modern light-themed design with smooth animations.

🚀 Features
🔐 User Login: Login for users to upload files.

🔍 File Scan: Files are scanned for suspicious extensions (e.g., .exe, .bat, .zip).

📊 Admin Dashboard: View file upload logs and scan results.

📱 Responsive UI: Light theme with smooth animations.

🛠️ Tech Stack
Frontend: HTML, CSS (Light theme, Animations)

Backend: PHP (ODBC for MySQL)

Database: MySQL

File Scanning: Extension-based scanning

📦 Installation
1. Clone the repository:
bash
Copy
Edit
git clone https://github.com/your-username/secure-file-upload-system.git
cd secure-file-upload-system
2. Place the project in the htdocs folder of XAMPP.
3. Create a MySQL database:
bash
Copy
Edit
CREATE DATABASE secure_upload_db;
4. Run the provided SQL commands to set up the necessary tables:
bash
Copy
Edit
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE uploaded_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_by INT,
    result ENUM('clean', 'suspicious') NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(id)
);
5. Configure the database connection in the includes/db.php file.
6. Run Apache and MySQL on XAMPP, then visit the app at:
http://localhost/secure-file-upload-system/dashboard.php

📝 Usage
👥 Users: Upload files via the dashboard. Files are scanned and logged with the scan result.

🛠️ Admins: View logs of uploaded files, including the scan results, in the admin dashboard.
