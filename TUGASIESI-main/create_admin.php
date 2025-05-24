<?php
require_once 'koneksi.php';

try {
    // Check if admin user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = 'admin'");
    $stmt->execute();
    $admin = $stmt->fetch();

    if (!$admin) {
        // Create admin user with password 'admin123'
        $password = password_hash('admin123', PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        $stmt->execute(['admin', $password, 'admin@example.com', 'admin']);
        echo "Admin user created successfully!<br>";
        echo "Username: admin<br>";
        echo "Password: admin123";
    } else {
        echo "Admin user already exists!<br>";
        echo "Username: admin<br>";
        echo "Password: admin123";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
