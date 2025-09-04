<?php
require_once 'config.php';

$logged_out = isset($_GET['logged_out']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="home-card">
            <h1>🔐 User Auth System</h1>
            <p>A secure and simple user registration and login system built with PHP and MySQL.</p>
            
            <?php if ($logged_out): ?>
                <div class="alert alert-info">You have been successfully logged out.</div>
            <?php endif; ?>
            
            <?php if (isLoggedIn()): ?>
                <div class="welcome-section">
                    <h3>Welcome back, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h3>
                    <p>You are currently logged in to your account.</p>
                    
                    <div class="button-group">
                        <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                        <a href="logout.php" class="btn btn-secondary">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="welcome-section">
                    <p>Get started by creating an account or logging into your existing account.</p>
                    
                    <div class="button-group">
                        <a href="register.php" class="btn btn-primary">Create Account</a>
                        <a href="login.php" class="btn btn-outline">Login</a>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <h4>🛡️ Secure</h4>
                    <p>Password hashing with bcrypt, secure session management, and SQL injection protection.</p>
                </div>
                
                <div class="feature-card">
                    <h4>📱 Responsive</h4>
                    <p>Mobile-first design that works perfectly on all devices and screen sizes.</p>
                </div>
                
                <div class="feature-card">
                    <h4>⚡ Fast</h4>
                    <p>Lightweight and optimized for performance with clean, efficient code.</p>
                </div>
                
                <div class="feature-card">
                    <h4>✅ Simple</h4>
                    <p>Clean, intuitive interface that's easy to use and understand.</p>
                </div>
            </div>
            
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                <p style="font-size: 0.9rem; color: #888;">
                    Built with PHP & MySQL | Secure • Responsive • Modern
                </p>
            </div>
        </div>
    </div>
</body>
</html>
