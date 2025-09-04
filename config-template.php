<?php

// ⚠️ REPLACE THESE VALUES WITH YOUR INFINITYFREE DATABASE DETAILS:
// Get these from: Control Panel → MySQL Databases → View Database Details

define('DB_HOST', 'PUT_YOUR_HOST_HERE');        // Example: 'sql123.infinityfree.com'
define('DB_NAME', 'PUT_YOUR_DATABASE_NAME');    // Example: 'if0_12345678_userauth'  
define('DB_USER', 'PUT_YOUR_USERNAME');         // Example: 'if0_12345678'
define('DB_PASS', 'PUT_YOUR_PASSWORD');         // Your generated password

// ✅ AFTER UPDATING ABOVE, COPY ALL THIS CODE AND REPLACE THE CONTENT OF config.php

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
