<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'dbconnect.php';
include('navbar.php');

use PhonePe\Standard\StandardCheckoutClient;
use PhonePe\common\exceptions\PhonePeException;

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$status_message = '';
$payment_details = null;

if (isset($_GET['merchant_order_id'])) {
    $merchantOrderId = $_GET['merchant_order_id'];

    $merchantId = PHONEPE_MERCHANT_ID;
    $clientId = PHONEPE_CLIENT_ID;
    $clientSecret = PHONEPE_CLIENT_SECRET;
    $environment = PHONEPE_ENVIRONMENT;

    try {
        $client = new StandardCheckoutClient($merchantId, $clientId, $clientSecret, $environment);
        $response = $client->getOrderStatus($merchantOrderId);

        $status_message = "Status for Order ID: $merchantOrderId";
        $payment_details = $response->getData();

    } catch (PhonePeException $e) {
        $status_message = "Error fetching status: " . $e->getMessage();
    } catch (Exception $e) {
        $status_message = "An unexpected error occurred: " . $e->getMessage();
    }
} else {
    // Form to get order ID
    $status_message = "Please enter a Merchant Order ID to check the status.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Payment Status - GecnoGuru</title>
    <style>
        body { background-color: #f4f7f6; font-family: Arial, sans-serif; padding-top: 80px; }
        .container { max-width: 800px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2, h3 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 15px; background-color: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .status-info { margin-top: 20px; padding: 15px; background: #eef; border-left: 5px solid #2563eb; }
        pre { background: #f0f0f0; padding: 10px; border-radius: 4px; white-space: pre-wrap; word-wrap: break-word; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Payment Status</h2>
        <p><?php echo $status_message; ?></p>

        <form action="status.php" method="GET">
            <div class="form-group">
                <label for="merchant_order_id">Merchant Order ID:</label>
                <input type="text" id="merchant_order_id" name="merchant_order_id" value="<?php echo htmlspecialchars($_GET['merchant_order_id'] ?? ''); ?>" required>
            </div>
            <button type="submit" class="btn">Check Status</button>
        </form>

        <?php if ($payment_details): ?>
            <div class="status-info">
                <h3>Payment Details</h3>
                <pre><?php echo json_encode($payment_details, JSON_PRETTY_PRINT); ?></pre>
            </div>
        <?php endif; ?>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
