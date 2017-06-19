<?php
include 'contractor/db/connect.php';
if (isset($_POST["txn_id"]) && isset($_POST["txn_type"])){
	
	//Database Connection
	
	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		$req .= "&$key=$value";
	}
	
	
	
	$txn_type= $_POST['item_name'];
   $payment_status= $_POST['payment_status'];
	$payment_amount= $_POST['mc_gross'];
	$txn_id	= $_POST['txn_id'];
	$status='1';
	
	$payer_email= $_POST['payer_email'];
     $payment_status= $_POST['payment_status'];
         
	 $createdtime = date("Y-m-d");
	 $expiry_date= date("Y-m-d", strtotime(date("Y-m-d", strtotime($createdtime)) . " + 1 year"));
	 	
	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	
	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
$business =$_SESSION['sessiondata']['username']; 

$bemail =$_SESSION['sessiondata']['email']; 	
	$coupon =$_SESSION['sessiondata']['coupon']; 	 
		 $sqlupdate = "UPDATE register SET amount='$payment_amount', payment_status='$payment_status',payment_date='$createdtime',txn_id='$txn_id',expiry_date='$expiry_date'
		,payer_email='$payer_email',status='$status',coupon_code='$coupon' WHERE business_name='$business' and email='$bemail'";

 $sqlupdate1= "UPDATE cupon SET status='1' WHERE number='$coupon'";
 mysqli_query($conn, $sqlupdate1);
if (mysqli_query($conn, $sqlupdate)) {

header("Location:thanks.php");
   } 		
	
				
	
}