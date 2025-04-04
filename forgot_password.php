<?php
include ('controller.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - GecnoGuru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #2563eb;
            font-family: Arial, sans-serif;
            padding-top: 60px;
        }
        
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        
        input:focus {
            border-color: #4285f4;
            outline: none;
            box-shadow: 0 0 0 2px rgba(66, 133, 244, 0.2);
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #555;
        }
        
        .error {
            color: #d32f2f;
            background-color: #fde8e8;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .success {
            color: #388e3c;
            background-color: #e8f5e9;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .footer-links {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        
        .footer-links a {
            color: #4285f4;
            text-decoration: none;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include ('navbar.php'); ?>
    
    <div class="container">
        <h2>Reset Your Password</h2>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="controller.php">
            <input type="hidden" name="action" value="forgot_password">
            
            <div class="form-group">
                <label for="email">Enter Your Email Address</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            
            <button type="submit" class="btn">Submit</button>
        </form>
        
        <div class="footer-links">
            <a href="login.php">Back to Login</a>
        </div>
    </div>
</body>
</html>
