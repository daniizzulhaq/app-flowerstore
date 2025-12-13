<?php
// Database Configuration
$host = 'localhost';
$dbname = 'company_florist';
$username = 'root';
$password = '';

// Koneksi ke database menggunakan MySQLi
try {
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }
    
    // Set charset ke UTF-8
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    die("Error koneksi: " . $e->getMessage());
}

// Timezone Indonesia
date_default_timezone_set('Asia/Jakarta');

// Base URL (sesuaikan dengan domain Anda)
define('BASE_URL', 'http://localhost/company-florist/');

// Upload directory
define('UPLOAD_DIR', 'uploads/');

// WhatsApp number
define('WHATSAPP_NUMBER', '6281322991131');
?>