p
<?php
//session_start();
include ('contractor/db/connect.php');



$paypal_email = 'zartash.tahir042-facilitator@gmail.com';
$return_url = 'http://localhost/fourclick/signup.php?status=success';
$cancel_url = 'http://localhost/fourclick/.php?status=cancel';
$notify_url = 'http://localhost/fourclick/signup.php';

$data = array();
$data = $_POST;

if($_POST['username']){
$_SESSION['sessiondata']= $data;
}

 $_SESSION['sessiondata']['PhoneNumber']; 




if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
 echo $sql = "INSERT INTO register (business_name,contact_name, phone,mobile,service, password, email, user_type, payment_status,status)
VALUES ('". $data['username']."','". $data['contact_name']."','". $data['PhoneNumber']."','". $data['mobile']."','". $data['service']."','". $data['password']."',
			 '". $data['email']."','". $data['type']."','Pending','0')";
    //if ($conn->query($sql) === TRUE) {
    	//echo "ho gya";

   // }

if($data['type'] =='client') 

{
 echo $item_amount = '10';
echo  $item_name = 'Membership';

}elseif ($data['type'] =='contractor')  {
echo $item_amount = '5';
echo $item_name = 'Membership';

}


echo $cmd ='_xclick';
$quantity ='1';
$currency_code ='USD';
echo $custom = $data['username'];
echo $email = $data['email'];

	$querystring = '';
	
$querystring .= "?cmd=".urlencode($cmd)."&";
	$querystring .= "business=".urlencode($paypal_email)."&";
	
	
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	$querystring .= "email=".urlencode($email)."&";
	//$querystring .= "cmd=".urlencode($cmd)."&";
	$querystring .= "quantity=".urlencode($quantity)."&";
	$querystring .= "currency_code=".urlencode($currency_code)."&";
	//$querystring .= "custom=".urlencode($custom)."&";

	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	echo $querystring;
header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	exit();
} 

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
	$quantity= $_POST['custom'];
	$receiver_email	= $_POST['receiver_email'];
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

	
		 
		 $sqlupdate = "UPDATE register SET amount='$payment_amount', payment_status='$payment_status',payment_date='$createdtime',txn_id='$txn_id',expiry_date='$expiry_date' WHERE business_name='$business'";


if (mysqli_query($conn, $sqlupdate)) {



   // if ($conn->query($sqlupdate) === TRUE) {
    // header("Location: index.php?update=done");
   } 		
	
				
	
}









?>



