<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
ob_start();
// include
include('lib/session.php');
include('lib/database.php');
include('helpers/format.php');

//spl_autoload_register(function($class){
//	include_once "classes/".$class.".php";
//});
include_once "classes/cart.php";
include_once "classes/user.php";
include_once "classes/category.php";
include_once "classes/product.php";
include_once "classes/brand.php";
include_once "classes/customer.php";


$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cat = new category();
$product = new product();
$brand = new brand();
$cs = new customer();

Session::init();

if (isset($_POST['redirect'])) {
    $customer_id = Session::get('customer_id');
    $order_code = rand(0, 9999);
    $amount = $_POST['amount'];
    
    $insertOrderVNPAY = $ct->insertOrderVNPAY($customer_id, $order_code);

    if ($insertOrderVNPAY) {
        // Clear the cart after inserting the order
        $delCart = $ct->del_all_data_cart();
        
        // Store VNPAY data in session
        $_SESSION['order_code_vnpay'] = $order_code;
        $_SESSION['amount_vnpay'] = $amount;
        
        // Redirect to VNPAY create payment page
        header('Location:vnpay/vnpay_create_payment.php');
        exit();
    }
}
ob_end_flush();
?>