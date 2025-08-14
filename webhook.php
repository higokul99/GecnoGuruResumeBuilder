<?php
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'dbconnect.php';

use PhonePe\Standard\StandardCheckoutClient;
use PhonePe\common\exceptions\PhonePeException;

// Set header to indicate JSON response, though we may not send a body for success.
header('Content-Type: application/json');

// Get the raw POST body and the verification header
$requestBody = file_get_contents('php://input');
$x_verify = $_SERVER['HTTP_X_VERIFY'] ?? '';

// Basic validation
if (empty($requestBody) || empty($x_verify)) {
    http_response_code(400); // Bad Request
    error_log("Webhook Error: Missing body or x-verify header.");
    exit;
}

$merchantId = PHONEPE_MERCHANT_ID;
$clientId = PHONEPE_CLIENT_ID;
$clientSecret = PHONEPE_CLIENT_SECRET;
$environment = PHONEPE_ENVIRONMENT;

try {
    $client = new StandardCheckoutClient($merchantId, $clientId, $clientSecret, $environment);

    // The verifyCallbackResponse method is used for both redirect callback and S2S webhooks
    $response = $client->verifyCallbackResponse($requestBody, $x_verify);

    $eventType = $response->getEventType();
    $merchantOrderId = $response->getMerchantOrderId();
    $transactionId = $response->getTransactionId();
    $status = $response->getState();

    // Log the received webhook for debugging
    error_log("Webhook received for Order ID: $merchantOrderId, Event: $eventType, Status: $status");

    // Process based on event type
    if ($eventType === 'PAYMENT') {
        // Update the payment status in the payments table
        $stmt_payments = $conn->prepare("UPDATE payments SET phonepe_transaction_id = ?, status = ? WHERE merchant_order_id = ?");
        $stmt_payments->bind_param("sss", $transactionId, $status, $merchantOrderId);
        $stmt_payments->execute();

        // If payment is successful, ensure the user's subscription is marked as 'pro'
        if ($status === 'SUCCESS' || $status === 'COMPLETED') {
            $stmt_users = $conn->prepare("UPDATE users SET subscription_status = 'pro' WHERE phonepe_order_id = ?");
            $stmt_users->bind_param("s", $merchantOrderId);
            $stmt_users->execute();
        }
    } elseif ($eventType === 'REFUND') {
        // Here you would handle refund logic, e.g., updating the payment record or a separate refunds table
        // For this example, we'll just log it.
        error_log("Refund webhook processed for Order ID: $merchantOrderId, Status: $status");
        // Example: Update payment status to 'REFUNDED'
        $stmt = $conn->prepare("UPDATE payments SET status = ? WHERE merchant_order_id = ?");
        $refund_status = "REFUND_" . $status;
        $stmt->bind_param("ss", $refund_status, $merchantOrderId);
        $stmt->execute();
    }

    // Acknowledge receipt to PhonePe
    http_response_code(200);

} catch (PhonePeException $e) {
    // Verification failed
    error_log("Webhook Verification Failed: " . $e->getMessage());
    http_response_code(400); // Bad Request, as the signature was invalid
    echo json_encode(['error' => 'Verification failed']);
    exit;

} catch (Exception $e) {
    // Other processing errors
    error_log("Webhook Processing Error: " . $e->getMessage());
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Internal server error']);
    exit;
}
?>
