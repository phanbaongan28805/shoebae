<?php
ob_start();
session_start();

// Include core application files
include('../lib/session.php');
include('../lib/database.php');
include('../classes/cart.php');
$ct = new Cart();

// Include VNPAY config
require_once("config.php");

$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        // Payment successful
        $order_code = $_GET['vnp_TxnRef'];
        $update_status = $ct->confirmOrderVNPAY($order_code);
        
        header("Location: ../success.php");
        exit();

    } else {
        // Payment failed
        header("Location: ../payment_failed.php");
        exit();
    }
} else {
    echo "<h3>Chữ ký không hợp lệ</h3>";
}

ob_end_flush();
?>
