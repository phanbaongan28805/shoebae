<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once("config.php");

// Use session variables set from vnpay_process.php
$vnp_TxnRef = $_SESSION['order_code_vnpay']; // Unique order code
$vnp_Amount = $_SESSION['amount_vnpay'];   // Total amount
$vnp_Locale = 'vn'; // Language
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
$expire = date('YmdHis', strtotime('+15 minutes'));

// Clean up session variables
unset($_SESSION['order_code_vnpay']);
unset($_SESSION['amount_vnpay']);

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount * 100,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
    "vnp_OrderType" => "other",
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_ExpireDate" => $expire
);

ksort($inputData);
$query = "";
$hashdata = "";

foreach ($inputData as $key => $value) {
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
    $hashdata .= ($hashdata ? '&' : '') . urlencode($key) . "=" . urlencode($value);
}

$vnp_Url = $vnp_Url . "?" . $query;

if (!empty($vnp_HashSecret)) {
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}

header('Location: ' . $vnp_Url);
exit;
