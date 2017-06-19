<?php
include ('contractor/db/connect.php');


	 $result1 = "SELECT * FROM  `misc`";
	$sql1 = $conn->query($result1);
				if ($sql1->num_rows > 0) {
					
	                while($rows = $sql1->fetch_assoc()){
			
	           $contractor_fee= $rows['contractor_fee'];
	                $client_fee= $rows['client_fee'];
	                
	            
}};

$data = array();
$data = $_POST;

if($_POST['username']){
$_SESSION['sessiondata']= $data;
}

 $_SESSION['sessiondata']['PhoneNumber']; 


   $email = $data['email'] ;
   $data['city'];
   $data['country'];
   if($_POST['service'] != 'other')
	{
	$data['service'] = $_POST['service'];
	}else{
	$data['service'] = $_POST['otherservicetype'];
	}

if (!isset($_POST["txn_id"]) && isset($_POST["username"])){
 $sql = "INSERT INTO register (business_name,contact_name, phone,mobile,service, password, email, user_type, payment_status,status,country,state,city,zip)
VALUES ('". $data['username']."','". $data['contact_name']."','". $data['PhoneNumber']."','". $data['mobile']."','". $data['service']."','". $data['password']."','". $data['email']."','". $data['type']."','Pending','0','". $data['country']."','". $data['state']."','". $data['city']."','". $data['zip']."')";

    if ($conn->query($sql) === TRUE) {
    	
   }

if($data['type'] =='client') 

{
     $item_amount = $client_fee;
$item_name = 'Client Membership';

}elseif ($data['type'] =='contractor')  {
 $item_amount = $contractor_fee;
 $item_name = 'Contractor Membership';

}

}

/*
$paypal_email = 'zartash.tahir042-facilitator@gmail.com';
$return_url = 'https://fourclicksolutions.com/signup.php';
$cancel_url = 'https://fourclicksolutions.com/pakages.php';
$notify_url = 'https://fourclicksolutions.com/signup.php';

 $cmd ='_xclick';
$quantity ='1';
$currency_code ='USD';
$item_number='1';
$custom = $data['username'];
 $email = $data['email'];

	$querystring = '';
	
$querystring .= "?cmd=".urlencode($cmd)."&";
	$querystring .= "business=".urlencode($paypal_email)."&";
	
	
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	$querystring .= "email=".urlencode($email)."&";
	//$querystring .= "cmd=".urlencode($cmd)."&";
	$querystring .= "quantity=".urlencode($quantity)."&";
	$querystring .= "item_number=".urlencode($item_number)."&";
	$querystring .= "currency_code=".urlencode($currency_code)."&";
	//$querystring .= "custom=".urlencode($custom)."&";

	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
// $querystring;
header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	sandie@fourclicksolutions.com"

*/
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
 
<form  action="https://www.paypal.com/cgi-bin/webscr" id="frm1" Method="POST">
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="sandie@fourclicksolutions.com" />
<input type="hidden" name="quantity" value="1" />
<input type="hidden" name="item_name" value="<?php echo $item_name; ?>" />
<input type="hidden" name="item_number" value="1" />
<input type="hidden" name="amount" value="<?php echo $item_amount; ?>" />
<input type="hidden" name="shipping" value="0" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="email" value="<?php echo $email ?>" >
<input type="hidden" name="notify_url" value="http://fourclicksolutions.com/payment-response.php">
<input type="hidden" name="cancel_url" value="http://fourclicksolutions.com/pakages.php">
<input type="hidden" name="currency_code" value="AUD" />
<input type="hidden" name="rm" value="2" >
<?php if (isset($_POST["coupon"]) && $_POST["coupon"] != ""){ 

echo '<input type="hidden" name="discount_rate" value="99.99" >';
echo '<input type="hidden" name="discount_rate2" value="100" >';
}else{
  echo '<input type="hidden" name="tax_rate" value="10" >';
}


?>
<input type="hidden" name="return" value="http://fourclicksolutions.com/payment-response.php">

</form>
 <script type="text/javascript">
	$(document).ready(function(){
         $("#frm1").submit();
    });
    
   
</script>


<!DOCTYPE html>
<html>
<head>
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  text-align: center;
   position:absolute;
    height: X px;
    width: Y px;
    left:33%;
    top:65%;
    margin-top:- X/2 px;
  
}
</style>
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>
<div id="myDiv">
<h2>Plseae wait while we redirect you to Paypal....</h2>
</div>
<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>







