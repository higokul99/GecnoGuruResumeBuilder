<?php
include 'dbconnect.php';

// Add subscription_status and phonepe_order_id to users table
$sql_users = "
ALTER TABLE `users`
ADD COLUMN `subscription_status` VARCHAR(20) NOT NULL DEFAULT 'free' AFTER `password`,
ADD COLUMN `phonepe_order_id` VARCHAR(255) DEFAULT NULL AFTER `subscription_status`;
";

if ($conn->query($sql_users) === TRUE) {
    echo "Table 'users' altered successfully.\n";
} else {
    echo "Error altering table 'users': " . $conn->error . "\n";
}

// Create payments table
$sql_payments = "
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `merchant_order_id` varchar(255) NOT NULL,
  `phonepe_transaction_id` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";

if ($conn->query($sql_payments) === TRUE) {
    echo "Table 'payments' created successfully.\n";
} else {
    echo "Error creating table 'payments': " . $conn->error . "\n";
}

$conn->close();
?>
