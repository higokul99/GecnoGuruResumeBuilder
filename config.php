<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Error Reporting
if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] === 'production') {
    error_reporting(0);
    ini_set('display_errors', 0);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// PhonePe API Credentials
define('PHONEPE_MERCHANT_ID', $_ENV['PHONEPE_MERCHANT_ID'] ?? 'YOUR_MERCHANT_ID');
define('PHONEPE_CLIENT_ID', $_ENV['PHONEPE_CLIENT_ID'] ?? 'YOUR_CLIENT_ID'); // This is the Salt Key
define('PHONEPE_CLIENT_SECRET', $_ENV['PHONEPE_CLIENT_SECRET'] ?? 'YOUR_CLIENT_SECRET'); // This is the Salt Secret
define('PHONEPE_CLIENT_VERSION', 'v1'); // Or your specific version

// Environment: 'PRODUCTION' or 'UAT'
// The SDK currently only supports 'PRODUCTION'
define('PHONEPE_ENVIRONMENT', 'PRODUCTION');

// Amount for the Pro plan (in paise, so 10 Rs = 1000 paise)
define('PRO_PLAN_AMOUNT', 1000);

// Base URL of your website.
// Please update this to your actual website URL.
// For local development on a WAMP server, it might be something like 'http://localhost/your-project-folder'
define('BASE_URL', 'http://localhost/resume-builder');

?>
