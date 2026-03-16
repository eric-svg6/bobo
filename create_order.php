<?php
 session_start();
include('panel/assets/constant/config.php');


    $keyId = " ";
    $keySecret = " ";

$amount = $_POST['amount']*100;
$currency = 'INR';
$receipt = $_POST['receipt'];
$payment_capture = 1;

$data = [
    'amount' => $amount,
    'currency' => $currency,
    'receipt' => $receipt,
    'payment_capture' => $payment_capture,
];

$ch = curl_init('https://api.razorpay.com/v1/orders');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $keyId . ':' . $keySecret);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

echo $response;
?><!--  Author Name: Mayuri K. 
 for any PHP, Wordpress, Shopify or Laravel website or software development contact me at work@mayurik.com  -->