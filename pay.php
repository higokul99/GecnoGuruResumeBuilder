<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'dbconnect.php';

use PhonePe\Standard\StandardCheckoutClient;
use PhonePe\Standard\models\request\StandardPayRequest;
use PhonePe\Standard\models\request\builders\StandardPayRequestBuilder;

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$merchantId = PHONEPE_MERCHANT_ID;
$clientId = PHONEPE_CLIENT_ID; // Salt Key
$clientSecret = PHONEPE_CLIENT_SECRET; // Salt Secret
$environment = PHONEPE_ENVIRONMENT;

try {
    $client = new StandardCheckoutClient($merchantId, $clientId, $clientSecret, $environment);

    $merchantOrderId = "MUID" . uniqid();
    $amount = PRO_PLAN_AMOUNT; // in paise
    $email = $_SESSION['email'];
    $userId = $_SESSION['user_id'];

    $callbackUrl = BASE_URL . '/webhook.php';
    $redirectUrl = BASE_URL . '/payment-success.php';

    $payRequest = (new StandardPayRequestBuilder())
        ->withMerchantOrderId($merchantOrderId)
        ->withAmount($amount)
        ->withMerchantUserId((string)$userId)
        ->withCallbackUrl($callbackUrl)
        ->withRedirectUrl($redirectUrl)
        ->build();

    $response = $client->pay($payRequest);

    // Save the merchantOrderId to the user's record for future reference
    $stmt = $conn->prepare("UPDATE users SET phonepe_order_id = ? WHERE id = ?");
    $stmt->bind_param("si", $merchantOrderId, $userId);
    $stmt->execute();

    // Create a new payment record with pending status
    $stmt = $conn->prepare("INSERT INTO payments (user_email, merchant_order_id, amount, status) VALUES (?, ?, ?, 'PENDING')");
    $dbAmount = $amount / 100; // Convert paise to rupees for storing in db
    $stmt->bind_param("ssd", $email, $merchantOrderId, $dbAmount);
    $stmt->execute();


    $redirect = $response->getRedirectUrl();
    header("Location: " . $redirect);
    exit();

} catch (\PhonePe\common\exceptions\PhonePeException $e) {
    // Handle exception
    $_SESSION['error'] = 'PhonePe Error: ' . $e->getMessage();
    header("Location: payment-failure.php");
    exit();
} catch (Exception $e) {
    // Handle other exceptions
    $_SESSION['error'] = 'Error: ' . $e->getMessage();
    header("Location: payment-failure.php");
    exit();
}

?>
