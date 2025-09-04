<?php
require_once 'config.php';

// Check if user is logged in
requireLogin();

// Get user information from database
try {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    
    if (!$user) {
        // User not found in database, destroy session
        session_destroy();
        header('Location: login.php');
        exit();
    }
} catch (PDOException $e) {
    $error = "Unable to fetch user data.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - User Auth System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="dashboard-card">
            <div class="dashboard-header">
                <h1>Welcome, <?php echo htmlspecialchars($user['full_name']); ?>!</h1>
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            </div>
            
            <div class="user-info">
                <h3>Your Profile Information</h3>
                
                <div class="info-grid">
                    <div class="info-item">
                        <label>Full Name:</label>
                        <span><?php echo htmlspecialchars($user['full_name']); ?></span>
                    </div>
                    
                    <div class="info-item">
                        <label>Username:</label>
                        <span><?php echo htmlspecialchars($user['username']); ?></span>
                    </div>
                    
                    <div class="info-item">
                        <label>Email:</label>
                        <span><?php echo htmlspecialchars($user['email']); ?></span>
                    </div>
                    
                    <div class="info-item">
                        <label>Member Since:</label>
                        <span><?php echo date('F j, Y', strtotime($user['created_at'])); ?></span>
                    </div>
                    
                    <div class="info-item">
                        <label>Last Updated:</label>
                        <span><?php echo date('F j, Y g:i A', strtotime($user['updated_at'])); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-actions">
                <h3>Quick Actions</h3>
                <div class="action-buttons">
                    <button class="btn btn-outline" onclick="window.location.reload()">Refresh Profile</button>
                    <a href="index.php" class="btn btn-outline">Back to Home</a>
                </div>
            </div>
            
            <div class="dashboard-stats">
                <h3>Account Status</h3>
                <div class="status-grid">
                    <div class="status-item">
                        <span class="status-label">Account Status:</span>
                        <span class="status-value status-active">Active</span>
                    </div>
                    <div class="status-item">
                        <span class="status-label">Session ID:</span>
                        <span class="status-value"><?php echo substr(session_id(), 0, 8) . '...'; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
