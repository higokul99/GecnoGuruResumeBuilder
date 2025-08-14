<?php
include('controller.php');
include('navbar.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade to Pro - GecnoGuru</title>
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
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            font-size: 1.1em;
            margin-bottom: 30px;
        }
        .price {
            font-size: 2.5em;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 30px;
        }
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
        <h2>Upgrade to Pro Plan</h2>
        <p>Unlock premium features and build your career with our Pro plan.</p>
        <div class="price">₹10</div>
        <form action="pay.php" method="POST">
            <button type="submit" class="btn">Upgrade Now</button>
        </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
