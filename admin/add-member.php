<?php

include '../contractor/db/connect.php';


$data = array();
$data = $_POST;

   if($_POST['service'] != 'other')
	{
	$data['service'] = $_POST['service'];
	}else{
	$data['service'] = $_POST['otherservicetype'];
	}    
    
 $sql = "INSERT INTO register (business_name,contact_name, phone,mobile,service, password, email, user_type, payment_status,status,country,state,city,zip,expiry_date)
VALUES ('". $data['username']."','". $data['contact_name']."','". $data['PhoneNumber']."','". $data['mobile']."','". $data['service']."','". $data['password']."','". $data['email']."','". $data['type']."','Free Account','1','". $data['country']."','". $data['state']."','". $data['city']."','". $data['zip']."','". $data['expiry_date']."')";

    if ($conn->query($sql) === TRUE) {
        
   header("location:admin-add-member.php?a=done");
   }

?>