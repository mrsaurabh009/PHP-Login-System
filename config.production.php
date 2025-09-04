<?php
// Production Database configuration
// Copy this file to config.php and update with your production database details

// For free hosting services like InfinityFree, 000webhost, etc.
define('DB_HOST', 'your-production-host');     // e.g., 'sql123.infinityfree.com'
define('DB_NAME', 'your-production-database'); // e.g., 'if0_12345678_userauth'
define('DB_USER', 'your-production-username'); // e.g., 'if0_12345678'
define('DB_PASS', 'your-production-password');

// For Railway, Heroku, or other cloud services, use environment variables:
/*
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'user_auth_system');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');
*/

// Create PDO connection with error handling
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
        // In production, log the error instead of displaying it
        error_log("Database connection failed: " . $e->getMessage());
        die("Database connection failed. Please try again later.");
    }
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start([
        'cookie_httponly' => true,
        'cookie_secure' => isset($_SERVER['HTTPS']), // Use secure cookies on HTTPS
        'cookie_samesite' => 'Strict'
    ]);
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
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// CSRF protection function
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>
