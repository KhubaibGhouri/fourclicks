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

     $admin_id = $_SESSION['admin_id'];           
if(isset($_GET['update_id']))
{ 
$errors = array();
   $old_password= $_POST['old_password'];
    $new_password= $_POST['new_password'];
   $confirm_password= $_POST['confirm_password'];
$admin_id = $_SESSION['admin_id'];
	 $result1 = "SELECT * FROM  `admin_user` where admin_id = '$admin_id'";
	$sql1 = $conn->query($result1);
				if ($sql1->num_rows > 0) {
					
	                while($rows = $sql1->fetch_assoc()){
			
	            $admin_password= $rows['password'];	               
	            
}};
     

if( $old_password != $admin_password) 
   {
   
    $errors[]= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sorry, Old password does not match.</div>";
    
}else if($new_password != $confirm_password)
{

   $errors[]= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sorry, Password and confirm Password does not match.</div>";
}else
{
 $sqlupdate = "UPDATE admin_user SET password='$new_password' WHERE admin_id = '$admin_id'";
		
if (mysqli_query($conn, $sqlupdate)) {


$URL="change-password.php?u=done";
//echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
  $errors[]="<div class='alert alert-success fade in'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Admin Password has been updated</div>";
   } 	    
}

}	
	    


   ?>
   		<div   class="col-sm-6 center col-sm-offset-2" style ="padding-top: 10px;text-align:center"><?php foreach($errors as $error){ echo $error ; } ?></div>
		
	
 
   <div class="col-sm-10">
    
 

  
<div class="add-service text-center">
	<div class="sign_main_con_adj">
	<h2> Change Admin Password</h2>
		<form class="form-horizontal"  action="change-password.php?update_id=<?php echo $admin_id ;  ?> " method="post" id="signup-form">
		
			 <div class="form-group">
		    <label class="control-label col-sm-4" for="email">Old Password :</label>
		    <div class="col-sm-6">
		    <input type="password" class="form-control"   name="old_password" required="" id ="" ">
		       
		    </div>
		  </div>
		 <div class="form-group">
		    <label class="control-label col-sm-4" for="email">New Password :</label>
		    <div class="col-sm-6">
		    <input type="password" class="form-control"   name="new_password" required="" id ="" ">
		       
		    </div>
		  </div>
		  
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="email">Confirm Password :</label>
		    <div class="col-sm-6">
		    <input type="password" class="form-control"   name="confirm_password" required="" id ="" ">
		       
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
<script>
$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});
</script>