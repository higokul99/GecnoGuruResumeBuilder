<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'dbconnect.php';
include('navbar.php');

use PhonePe\Standard\StandardCheckoutClient;
use PhonePe\Standard\models\request\StandardRefundRequest;
use PhonePe\Standard\models\request\builders\StandardRefundRequestBuilder;
use PhonePe\common\exceptions\PhonePeException;

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = '';
$result_data = null;

// Handle refund initiation
if (isset($_POST['initiate_refund'])) {
    $merchantOrderId = $_POST['merchant_order_id'];
    $amount = $_POST['amount'] * 100; // Convert to paise
    $merchantRefundId = "MREF" . uniqid();

    $merchantId = PHONEPE_MERCHANT_ID;
    $clientId = PHONEPE_CLIENT_ID;
    $clientSecret = PHONEPE_CLIENT_SECRET;
    $environment = PHONEPE_ENVIRONMENT;

    try {
        $client = new StandardCheckoutClient($merchantId, $clientId, $clientSecret, $environment);
        $refundRequest = (new StandardRefundRequestBuilder())
            ->withMerchantRefundId($merchantRefundId)
            ->withOriginalMerchantOrderId($merchantOrderId)
            ->withAmount($amount)
            ->build();

        $response = $client->refund($refundRequest);
        $message = "Refund initiated successfully!";
        $result_data = $response->getData();

    } catch (PhonePeException $e) {
        $message = "Error initiating refund: " . $e->getMessage();
    } catch (Exception $e) {
        $message = "An unexpected error occurred: " . $e->getMessage();
    }
}

// Handle refund status check
if (isset($_GET['check_refund_status'])) {
    $merchantRefundId = $_GET['merchant_refund_id'];

    $merchantId = PHONEPE_MERCHANT_ID;
    $clientId = PHONEPE_CLIENT_ID;
    $clientSecret = PHONEPE_CLIENT_SECRET;
    $environment = PHONEPE_ENVIRONMENT;

    try {
        $client = new StandardCheckoutClient($merchantId, $clientId, $clientSecret, $environment);
        $response = $client->getRefundStatus($merchantRefundId);
        $message = "Refund status for ID: $merchantRefundId";
        $result_data = $response->getData();

    } catch (PhonePeException $e) {
        $message = "Error fetching refund status: " . $e->getMessage();
    } catch (Exception $e) {
        $message = "An unexpected error occurred: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Refund - GecnoGuru</title>
    <style>
        body { background-color: #f4f7f6; font-family: Arial, sans-serif; padding-top: 80px; }
        .container { max-width: 800px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2, h3 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 15px; background-color: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .result-info { margin-top: 20px; padding: 15px; background: #eef; border-left: 5px solid #2563eb; }
        pre { background: #f0f0f0; padding: 10px; border-radius: 4px; white-space: pre-wrap; word-wrap: break-word; }
        .section { border-top: 1px solid #ccc; padding-top: 20px; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Process Refunds</h2>

        <?php if ($message): ?>
            <div class="result-info">
                <p><?php echo $message; ?></p>
                <?php if ($result_data): ?>
                    <pre><?php echo json_encode($result_data, JSON_PRETTY_PRINT); ?></pre>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="section">
            <h3>Initiate a Refund</h3>
            <form action="refund.php" method="POST">
                <div class="form-group">
                    <label for="merchant_order_id">Original Merchant Order ID:</label>
                    <input type="text" id="merchant_order_id" name="merchant_order_id" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount (in Rupees):</label>
                    <input type="number" id="amount" name="amount" step="0.01" required>
                </div>
                <button type="submit" name="initiate_refund" class="btn">Initiate Refund</button>
            </form>
        </div>

        <div class="section">
            <h3>Check Refund Status</h3>
            <form action="refund.php" method="GET">
                <div class="form-group">
                    <label for="merchant_refund_id">Merchant Refund ID:</label>
                    <input type="text" id="merchant_refund_id" name="merchant_refund_id" required>
                </div>
                <button type="submit" name="check_refund_status" class="btn">Check Refund Status</button>
            </form>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
