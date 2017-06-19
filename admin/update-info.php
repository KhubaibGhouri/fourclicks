<?php 
session_start();
if( $_SESSION['type']!='admin' and !$_SESSION['Login']){
    header("location:index.php");
}
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 <?php
@include("../header1.php");
@include("../contractor/db/connect.php");
?>

<div class="container-fluid">
  <?php @include("admin-sidebar.php"); ?>

    <?php
if(isset($_GET['edit_id']))
{
$edit_id=$_GET['edit_id'];
	 $result1 = "SELECT * FROM register where u_id ='$edit_id'";
	$sql1 = $conn->query($result1);
				if ($sql1->num_rows > 0) {
					
	                while($row = $sql1->fetch_assoc()){
			$business_name = $row['business_name'];
			$contact_name= $row['contact_name'];
			$mobile= $row['mobile'];
			$phone= $row['phone'];
			 $service= $row['service'];
			$country= $row['country'];
		         $state_id= $row['state'];
			$city= $row['city'];
			$zip= $row['zip'];
			$email= $row['email'];
			$password= $row['password'];
			$payment_status= $row['payment_status'];
			$amount= $row['amount'];
			$expiry_date= $row['expiry_date'];
			$payment_date= $row['payment_date'];
			$txn_id= $row['txn_id'];
			$payer_email= $row['payer_email'];
			
	           
	              $id= $row['u_id'];
	            
}}};

                     
if(isset($_GET['update_id']))
{ 

$update_id= $_GET['update_id'];
$business_name = $_POST['username'];
			$contact_name= $_POST['contact_name'];
			$mobile= $_POST['mobile'];
			$phone= $_POST['PhoneNumber'];
			 if($_POST['service'] != 'other')
	{
	$service= $_POST['service'];
	}else{
	$service = $_POST['otherservicetype'];
	}
			
			$email= $_POST['email'];
			$password= $_POST['password'];
			$country= $_POST['country'];
			 $state= $_POST['state'];
			$city= $_POST['city'];
			$zip= $_POST['zip'];
  $sqlupdate = "UPDATE register SET business_name ='$business_name',contact_name='$contact_name',mobile='$mobile',phone='$phone',service='$service', email='$email',password='$password',country='$country',state='$state',city='$city',zip='$zip' WHERE u_id='$update_id'";

if (mysqli_query($conn, $sqlupdate)) {


 $URL="update-info.php?edit_id=".$update_id;
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}

	
	    


   ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
         $('#state')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
        $('#city')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#service").change(function() {
        var selVal = $(this).val();
        $("#textboxDiv").html('');
        if(selVal == 'other') {
            
                $("#textboxDiv").append('<label class="control-label col-sm-4" for="pwd">Enter Service Type:</label><div class="col-sm-6"><input type="text" class="form-control" id="otherservice"  name="otherservicetype">');
            
        }
    });
});
</script>

   <div class="col-sm-10">
    
    
<div class="add-service text-center">
	<div class="sign_main_con_adj">
	<h2>Update Info</h2>
		<form class="form-horizontal"  action="update-info.php?update_id=<?php echo $id;  ?> " method="post" id="signup-form">
		
		 <div class="form-group">
		    <label class="control-label col-sm-4" for="email">Business Name:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control"  placeholder="" name="username" required="" id ="username" value="<?= $business_name;?>">
		       
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Contact Person:</label>
		    <div class="col-sm-6"> 
		      <input class="form-control"  placeholder=""  name="contact_name" type="text" required="" id="contact_name" value="<?= $contact_name;?>">
		    
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Mobile Number:</label>
		    <div class="col-sm-6"> 
		      <input name="mobile" type="text" class="form-control"  placeholder="" required="" id="mobile" value="<?= $mobile;?>">
		       
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Phone Number:</label>
		    <div class="col-sm-6"> 
		      <input name="PhoneNumber" type="text" class="form-control"  placeholder="" required="" id="PhoneNumber" value="<?= $phone;?>">
		       
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Country:</label>
		    <div class="col-sm-6"> 
		      <select  name="country" class="form-control"  id="country" >
			
			<?php
			$result12 = "SELECT * FROM countries where id ='$country'";

			$sql12 = $conn->query($result12);
			if ($sql12->num_rows > 0) {
				while ($cntry = $sql12->fetch_assoc()) {
				
				    echo  '<option value="'.$cntry["id"].'" selected>'.$cntry["country_name"].'</option>';
				}}else{
				echo  "<option value=''>Select Country</option>";
				}
			$result = "SELECT * FROM countries ORDER BY country_name ASC";

			$sql = $conn->query($result);
			if ($sql->num_rows > 0) {
				while ($row = $sql->fetch_assoc()) {
									 ?>
					    <option value="<?php echo $row['id']?>"><?php echo $row['country_name']?></option>
					<?php
					 }
			      }
			?>
			</select>
		    </div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">State:</label>
		    <div class="col-sm-6"> 
		       <select  name="state" class="form-control"  id="state" >
			<?php
			$result13 = "SELECT * FROM states where id ='$state_id'";

			$sql13 = $conn->query($result13);
			if ($sql13->num_rows > 0) {
				while ($state= $sql13->fetch_assoc()) {
				
				    echo  '<option value="'.$state["id"].'" selected>'.$state["state_name"].'</option>';
				}}else{
				echo  "<option value=''>Select country first</option>";
				}
				
				
				$result1 = "SELECT * FROM states where country_id = '$country'";

			$sql = $conn->query($result1);
			if ($sql->num_rows > 0) {
				while ($row1 = $sql->fetch_assoc()) {
									 ?>
					    <option value="<?php echo $row1['id']?>"><?php echo $row1['state_name']?></option>
					<?php
					 }
			      }
				?>
    
</select>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">City:</label>
		    <div class="col-sm-6"> 
		      <select name="city" id="city"  class="form-control">
    <?php
			$result14 = "SELECT * FROM cities where id ='$city'";

			$sql14 = $conn->query($result14);
			if ($sql14->num_rows > 0) {
				while ($city= $sql14->fetch_assoc()) {
				
				    echo  '<option value="'.$city["id"].'" selected>'.$city["city_name"].'</option>';
				}}else{
				echo  "<option value=''>Select State first</option>";
				}
				echo $state= $row['state'];
			echo  $result67 = "SELECT * FROM cities where state_id = '$state_id'";

			$sql = $conn->query($result67);
			if ($sql->num_rows > 0) {
				while ($row2 = $sql->fetch_assoc()) {
									 ?>
					    <option value="<?php echo $row2['id']?>"><?php echo $row2['city_name']?></option>
					<?php
					 }
			      }
				
				?>
</select> 
		    </div>
		  </div>
		    <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Post Code:</label>
		    <div class="col-sm-6"> 
		      <input type="number" class="form-control" id="zip" placeholder="" name="zip"  value="<?= $zip;?>">
		    </div>
		  </div>
		  
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Contractor Service Types:</label>
		    <div class="col-sm-6"> 
		       <select name="service"  class="form-control" required="" id="service" >
		       
		        <option value="">Select Service Types</option>
                                                                      
     <?php
       echo  '<option value="'.$service.'" selected>'.$service.'</option>';
		       $result21 = "SELECT * FROM services_type ORDER BY serv_name";
				$sql21= $conn->query($result21);
					
					
	                while($rowss = $sql21->fetch_assoc()) { 
	                 
                                          echo  '<option value="'.$rowss['serv_name'].'">'.$rowss['serv_name'] .'</option>';
                                                                        }?>
                                                                  <option value="other">Other</option>
                                                                    </select>
		    </div>
		  </div>
		    <div class="form-group" id="textboxDiv">
		    
		  </div>
		    <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Email Address:</label>
		    <div class="col-sm-6"> 
		      <input type="email" class="form-control" id="email" placeholder="" name="email" type="email" required="" value="<?= $email;?>">
		    </div>
		  </div>
		    
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Password:</label>
		    <div class="col-sm-6"> 
		      <input type="password" name="password"  class="form-control" id="password" placeholder="" required="" value="<?= $password;?>">
		    </div>
		  </div>
		 
		
		  <button id="btn-update" type="submit" value="btn-update" class="btn btn-success" name="btn-update">Update</button>
							
							
		
 </div>
  </div>
</form>
    
    
    
    

      
      
     
   
</div>

</div>

</div>



<?php 
@include("../footer1.php");
?>