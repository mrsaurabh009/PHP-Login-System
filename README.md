# 🔐 PHP User Authentication System

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

A professional, secure, and responsive user authentication system built with PHP and MySQL. This project demonstrates modern web development practices including secure authentication, responsive design, and clean code architecture.

## 🌟 [Live Demo](https://your-demo-link.com) | [Portfolio](https://github.com/mrsaurabh009)

*Professional project showcasing full-stack PHP development skills*

## 🚀 Features

- **User Registration** with form validation
- **User Login** with username or email
- **Secure Password Hashing** using PHP's `password_hash()`
- **Session Management** for authenticated users
- **Responsive Design** that works on all devices
- **Clean Dashboard** for logged-in users
- **SQL Injection Protection** using prepared statements
- **Input Sanitization** and validation

## 📁 Project Structure

```
├── database.sql      # Database schema
├── config.php        # Database configuration and utilities
├── index.php         # Landing page
├── register.php      # User registration page
├── login.php         # User login page
├── dashboard.php     # User dashboard (requires login)
├── logout.php        # Logout functionality
├── styles.css        # Responsive CSS styles
└── README.md         # This file
```

## 🛠️ Setup Instructions

### 1. Prerequisites
- **XAMPP**, **WAMP**, or any local server with PHP 7.4+ and MySQL
- Web browser

### 2. Database Setup
1. Start your MySQL server (via XAMPP/WAMP control panel)
2. Open phpMyAdmin or MySQL command line
3. Import the `database.sql` file or run the SQL commands manually:
   ```sql
   CREATE DATABASE IF NOT EXISTS user_auth_system;
   USE user_auth_system;
   -- (copy and run the rest from database.sql)
   ```

### 3. Configuration
1. Open `config.php`
2. Update database credentials if needed:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'user_auth_system');
   define('DB_USER', 'root');        // Your MySQL username
   define('DB_PASS', '');            // Your MySQL password
   ```

### 4. Launch Application
1. Place all files in your web server directory (e.g., `htdocs` for XAMPP)
2. Start Apache server
3. Open browser and navigate to `http://localhost/your-folder-name/`

## 🎯 Usage

### Registration Process
1. Visit `register.php` or click "Create Account" from home
2. Fill in all required fields:
   - Full Name
   - Username (must be unique)
   - Email (must be unique and valid)
   - Password (minimum 6 characters)
   - Confirm Password
3. Submit form to create account

### Login Process
1. Visit `login.php` or click "Login" from home
2. Enter username or email and password
3. Successfully authenticated users are redirected to dashboard

### Dashboard
- View profile information
- See account creation and last update dates
- Access quick actions and account status
- Logout securely

## 🔒 Security Features

- **Password Hashing**: Uses PHP's `PASSWORD_DEFAULT` algorithm
- **Prepared Statements**: Prevents SQL injection attacks
- **Input Sanitization**: All user inputs are sanitized
- **Session Security**: Proper session management and destruction
- **Duplicate Prevention**: Checks for existing usernames and emails
- **Authentication Checks**: Protected pages require valid login

## 📱 Responsive Design

The application features a mobile-first responsive design with:
- Flexible grid layouts
- Touch-friendly buttons and forms
- Optimized typography for readability
- Smooth animations and transitions
- Modern gradient backgrounds

## 🎨 Design Features

- **Modern UI**: Clean, professional interface
- **Gradient Backgrounds**: Beautiful color schemes
- **Card-based Layout**: Organized content presentation
- **Interactive Elements**: Hover effects and animations
- **Status Indicators**: Visual feedback for user actions

## 🧪 Testing the System

1. Register a new user account
2. Attempt login with invalid credentials (should fail)
3. Login with valid credentials (should succeed)
4. Visit dashboard to view profile
5. Logout and verify session is destroyed
6. Try accessing dashboard without login (should redirect)

## 🔧 Customization

### Database Configuration
Update `config.php` with your database settings.

### Styling
Modify `styles.css` to match your brand colors and preferences.

### Validation Rules
Update validation logic in `register.php` and `login.php` as needed.

## 📋 Database Schema

The system uses a simple `users` table with the following structure:

```sql
users (
    id (Primary Key, Auto Increment)
    username (Unique, VARCHAR(50))
    email (Unique, VARCHAR(100))
    password (VARCHAR(255) - Hashed)
    full_name (VARCHAR(100))
    created_at (TIMESTAMP)
    updated_at (TIMESTAMP)
)
```

## 🚨 Important Notes

- Change default database credentials before production use
- Enable HTTPS in production for secure data transmission
- Consider adding password reset functionality for production
- Implement rate limiting for login attempts in production
- Add CSRF protection for enhanced security

## 💡 Future Enhancements

- Password reset via email
- Email verification for new accounts
- User profile editing
- Remember me functionality
- Two-factor authentication
- Admin panel for user management

## 🚀 Quick Start

### Local Development
```bash
# Clone the repository
git clone https://github.com/mrsaurabh009/PHP-Login-System.git

# Navigate to project directory
cd PHP-Login-System

# Set up your database using database.sql
# Configure your database settings in config.php
# Start your local server (XAMPP/WAMP)

# Open in browser
http://localhost/PHP-Login-System
```

### Deployment Options

#### Option 1: Free Hosting (InfinityFree, 000webhost)
1. Upload all files to your hosting directory
2. Create MySQL database and import `database.sql`
3. Update `config.php` with your database credentials
4. Access your live site

#### Option 2: Cloud Deployment (Railway, Heroku)
1. Connect your GitHub repository
2. Set up environment variables
3. Deploy with one click

## 📊 Technical Highlights

- **Security First**: Implements industry-standard security practices
- **Modern PHP**: Clean, object-oriented approach
- **Responsive Design**: Mobile-first CSS architecture
- **Database Security**: Prepared statements prevent SQL injection
- **Session Management**: Secure user session handling
- **Input Validation**: Comprehensive form validation

## 👨‍💻 About the Developer

This project was developed by **Saurabh Kumar** as a demonstration of full-stack PHP development capabilities. It showcases:

- Backend development with PHP
- Database design and management
- Frontend development with responsive CSS
- Security best practices implementation
- Clean code architecture and documentation

### Connect with me:
- 💼 [LinkedIn](https://linkedin.com/in/mrsaurabh009)
- 🐱 [GitHub](https://github.com/mrsaurabh009)
- 📧 Email: mrsaurabh009@gmail.com

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

⭐ **Star this repository if you found it helpful!**

**Built with ❤️ by Saurabh Kumar**
