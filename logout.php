<?php
require_once 'config.php';

// Check if user is logged in
if (isLoggedIn()) {
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session cookie if it exists
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    
    // Destroy the session
    session_destroy();
}

// Redirect to home page
header('Location: index.php?logged_out=1');
exit();
?>
