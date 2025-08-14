<?php
include('controller.php');
include('navbar.php');
include('dbconnect.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$is_pro = false;
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT subscription_status FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['subscription_status'] === 'pro') {
            $is_pro = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status - GecnoGuru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: Arial, sans-serif;
            padding-top: 60px; /* For fixed navbar */
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .icon-success { font-size: 5em; color: #4CAF50; margin-bottom: 20px; }
        .icon-failure { font-size: 5em; color: #f44336; margin-bottom: 20px; }
        h2 { color: #333; margin-bottom: 20px; }
        p { color: #555; font-size: 1.1em; margin-bottom: 30px; }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #1e4fad;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($is_pro): ?>
            <div class="icon-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2>Payment Successful!</h2>
            <p>Thank you for upgrading to the Pro plan. You now have access to all our premium features.</p>
            <a href="index1.php" class="btn">Go to Dashboard</a>
        <?php else: ?>
            <div class="icon-failure">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <h2>Payment is Processing</h2>
            <p>Your payment is being processed. Your plan will be upgraded shortly. Please check back in a few moments.</p>
            <a href="index1.php" class="btn">Go to Dashboard</a>
        <?php endif; ?>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
