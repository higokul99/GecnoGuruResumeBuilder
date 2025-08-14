
<?php
include('dbconnect.php');

// Start session with secure settings
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 86400, // 1 day
        'path' => '/',
        'domain' => '', // Set your domain here if needed
        'secure' => isset($_SERVER['HTTPS']), // Only send over HTTPS
        'httponly' => true, // Prevent JavaScript access
        'samesite' => 'Lax'
    ]);
    session_start();
}

function sanitizeInput($data) {
    global $conn;
    return htmlspecialchars(strip_tags(trim($conn->real_escape_string($data))));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    if ($action === 'register') {
        // Handle registration
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        $confirm_password = sanitizeInput($_POST['confirm_password']);
        
        // Validate inputs
        if (empty($email) || empty($password) || empty($confirm_password)) {
            $_SESSION['error'] = "All fields are required!";
            header("Location: reg.php");
            exit();
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email format!";
            header("Location: reg.php");
            exit();
        }
        
        if ($password !== $confirm_password) {
            $_SESSION['error'] = "Passwords don't match!";
            header("Location: reg.php");
            exit();
        }
        
        if (strlen($password) < 6) {
            $_SESSION['error'] = "Password must be at least 6 characters!";
            header("Location: reg.php");
            exit();
        }
        
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $_SESSION['error'] = "Email already registered!";
            header("Location: reg.php");
            exit();
        }
        
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $hashed_password);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: login.php");
        } else {
            $_SESSION['error'] = "Registration failed: " . $conn->error;
            header("Location: reg.php");
        }
        exit();
        
    } elseif ($action === 'login') {
        // Handle login
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        
        // Validate inputs
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Email and password are required!";
            header("Location: login.php");
            exit();
        }
        
        // Get user from database
        $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Regenerate session ID to prevent session fixation
                session_regenerate_id(true);

                // Login successful
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                header("Location: index1.php");
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password!";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Invalid email or password!";
            header("Location: login.php");
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'forgot_password') {
        $email = trim($_POST['email']);

        // Check if email exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Generate token
            $token = bin2hex(random_bytes(50));
            $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));
            
            // Store token in the database
            $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expiry = ? WHERE email = ?");
            $stmt->bind_param("sss", $token, $expiry, $email);
            $stmt->execute();

            // Send reset email
            $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";
            $subject = "Password Reset Request";
            $message = "Click the link below to reset your password: \n$resetLink \nThis link will expire in 1 hour.";
            $headers = "From: noreply@yourwebsite.com";
            
            if (mail($email, $subject, $message, $headers)) {
                $_SESSION['success'] = "A password reset link has been sent to your email.";
            } else {
                $_SESSION['error'] = "Failed to send email. Please try again later.";
            }
        } else {
            $_SESSION['error'] = "No account found with this email.";
        }
        header("Location: forgot_password.php");
        exit();
    }
}

?>