<?php
require_once 'config.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: dashboard.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = sanitizeInput($_POST['login']); // Can be username or email
    $password = $_POST['password'];
    
    if (empty($login) || empty($password)) {
        $error = "Please enter both username/email and password.";
    } else {
        try {
            $pdo = getDBConnection();
            
            // Check if login is email or username
            $stmt = $pdo->prepare("SELECT id, username, email, password, full_name FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$login, $login]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                // Login successful
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['full_name'] = $user['full_name'];
                
                header('Location: dashboard.php');
                exit();
            } else {
                $error = "Invalid username/email or password.";
            }
        } catch (PDOException $e) {
            $error = "Login failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - User Auth System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="auth-card">
            <h2>Login</h2>
            
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="login">Username or Email</label>
                    <input type="text" id="login" name="login" 
                           value="<?php echo isset($_POST['login']) ? htmlspecialchars($_POST['login']) : ''; ?>" 
                           required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            
            <p class="text-center">
                Don't have an account? <a href="register.php" class="link">Register here</a>
            </p>
            
            <p class="text-center">
                <a href="index.php" class="link">← Back to Home</a>
            </p>
        </div>
    </div>
</body>
</html>
