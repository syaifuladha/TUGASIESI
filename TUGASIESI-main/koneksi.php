<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = '127.0.0.1';
$dbname = 'ukm';
$username = 'root';
$password = '';

try {
    // Test if MySQL is running
    $socket = @fsockopen($host, 3306, $errno, $errstr, 5);
    if (!$socket) {
        throw new Exception("MySQL server is not running ($errno: $errstr)");
    }
    fclose($socket);

    // Create DSN with explicit charset and port
    $dsn = "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4";
    
    // PDO options for better error handling
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
    ];

    // Create PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Test connection with a simple query
    $pdo->query("SELECT 1");
    
    error_log("Database connection successful");
    
} catch (Exception $e) {
    error_log("Connection failed: " . $e->getMessage());
    die("Koneksi database gagal: " . $e->getMessage());
}

// Helper functions
function getUserByUsername($pdo, $username) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        $stmt->execute([$username]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Error in getUserByUsername: " . $e->getMessage());
        return false;
    }
}

function validateLogin($pdo, $username, $password) {
    try {
        $user = getUserByUsername($pdo, $username);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    } catch (PDOException $e) {
        error_log("Error in validateLogin: " . $e->getMessage());
        return false;
    }
}

// Test database connection and table existence
try {
    $tables = ['users', 'ukm_categories', 'ukm', 'ukm_memberships', 'payments'];
    foreach ($tables as $table) {
        $result = $pdo->query("SHOW TABLES LIKE '$table'");
        if ($result->rowCount() == 0) {
            error_log("Warning: Table '$table' does not exist");
        }
    }
} catch (PDOException $e) {
    error_log("Error checking tables: " . $e->getMessage());
}
?>
