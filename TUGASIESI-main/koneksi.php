<?php
// Database connection parameters
$host = 'localhost';
$db   = 'ukm';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// DSN string
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options for PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


?>
