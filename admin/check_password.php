<?php
include '../config.php';

echo "<h2>Debug Password System</h2>";
echo "<hr>";

// Cek data admin di database
$result = $conn->query("SELECT * FROM admin");

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h3>Data Admin di Database:</h3>";
        echo "Username: <strong>" . $row['username'] . "</strong><br>";
        echo "Password Hash: <code>" . $row['password'] . "</code><br>";
        echo "<hr>";
        
        // Test password
        $test_password = 'admin123';
        $verify_result = password_verify($test_password, $row['password']);
        
        echo "<h3>Test Password Verification:</h3>";
        echo "Password yang di-test: <strong>$test_password</strong><br>";
        echo "Hasil verify: <strong style='color:" . ($verify_result ? 'green' : 'red') . "'>" . ($verify_result ? 'BERHASIL ✓' : 'GAGAL ✗') . "</strong><br>";
        
        if(!$verify_result) {
            echo "<hr>";
            echo "<h3 style='color:red'>⚠️ PASSWORD HASH SALAH!</h3>";
            echo "<p>Jalankan SQL ini di phpMyAdmin:</p>";
            
            $correct_hash = password_hash('admin123', PASSWORD_DEFAULT);
            echo "<pre style='background:#f5f5f5; padding:15px; border-radius:5px;'>";
            echo "UPDATE admin SET password = '$correct_hash' WHERE username = 'admin';";
            echo "</pre>";
            
            echo "<p>Atau klik tombol di bawah untuk auto fix:</p>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='fix_password' value='1'>";
            echo "<button type='submit' style='padding:10px 20px; background:green; color:white; border:none; border-radius:5px; cursor:pointer;'>🔧 AUTO FIX PASSWORD</button>";
            echo "</form>";
        } else {
            echo "<hr>";
            echo "<h3 style='color:green'>✓ PASSWORD SUDAH BENAR!</h3>";
            echo "<p>Silakan login dengan:</p>";
            echo "<ul>";
            echo "<li>Username: <strong>admin</strong></li>";
            echo "<li>Password: <strong>admin123</strong></li>";
            echo "</ul>";
        }
    }
} else {
    echo "<h3 style='color:red'>⚠️ TIDAK ADA DATA ADMIN!</h3>";
    echo "<p>Jalankan SQL ini di phpMyAdmin:</p>";
    
    $correct_hash = password_hash('admin123', PASSWORD_DEFAULT);
    echo "<pre style='background:#f5f5f5; padding:15px; border-radius:5px;'>";
    echo "INSERT INTO admin (username, password, email) VALUES ('admin', '$correct_hash', 'admin@companyflorist.com');";
    echo "</pre>";
}

// Auto fix jika tombol diklik
if(isset($_POST['fix_password'])) {
    $new_hash = password_hash('admin123', PASSWORD_DEFAULT);
    $update = $conn->query("UPDATE admin SET password = '$new_hash' WHERE username = 'admin'");
    
    if($update) {
        echo "<hr>";
        echo "<div style='background:green; color:white; padding:15px; border-radius:5px; margin-top:20px;'>";
        echo "<h3>✓ PASSWORD BERHASIL DIPERBAIKI!</h3>";
        echo "<p>Sekarang coba login lagi dengan:</p>";
        echo "<ul>";
        echo "<li>Username: <strong>admin</strong></li>";
        echo "<li>Password: <strong>admin123</strong></li>";
        echo "</ul>";
        echo "<a href='login.php' style='color:white; text-decoration:underline;'>➜ Klik di sini untuk login</a>";
        echo "</div>";
    }
}
?>
