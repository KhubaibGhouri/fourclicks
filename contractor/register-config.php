Please wait we are redirecting you...
<?php
// print_r($data);
// die;

// header("location:register.php?msg=Your data has been saved for approval.");
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="frm1" style="padding: 0; margin: 0;">
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="zartash.tahir042@gmail.com" />
<input type="hidden" name="quantity" value="1" />
<input type="hidden" name="item_name" value="Membership" />
<input type="hidden" name="item_number" value="1" />
<input type="hidden" name="amount" value="25" />
<input type="hidden" name="shipping" value="0" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="notify_url" value="http://localhost/silver-stone/pricing/register.php">
<input type="hidden" name="currency_code" value="GBP" />
<input type="hidden" name="rm" value="2" >
<input type="hidden" name="email" value="<?php echo $email ?>" >
<input type="hidden" name="return" value="http://localhost/silver-stone/pricing/register.php">

</form>
 <script type="text/javascript">
	$(document).ready(function(){
         $("#frm1").submit();
    });
</script>
<?php
//  $query ="INSERT INTO `register`(`business_name`, `mobile`, `phone`, `service`, `password`, `email`, `user_type`, `payment_status`, `amount`, `status`) VALUES ('". $data['username']."','". $data['contact']."','". $data['PhoneNumber']."','". $data['service']."','". $data['password']."','". $data['bemail']."','". $data['type']."','Paid','100','Approved')";
// $ex = mysqli_query($con, $query);

//  header("location:register.php?msg=ok");
?>