<?php
// Database configuration
// For InfinityFree hosting, update these with your database details from the control panel
define('DB_HOST', 'localhost');  // Change to your InfinityFree MySQL host (e.g., 'sql123.infinityfree.com')
define('DB_NAME', 'user_auth_system');  // Change to your InfinityFree database name (e.g., 'if0_12345678_userauth')
define('DB_USER', 'root');  // Change to your InfinityFree database username (e.g., 'if0_12345678')
define('DB_PASS', '');  // Add your InfinityFree database password

// Create PDO connection
function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Function to redirect to login if not authenticated
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}
?>
