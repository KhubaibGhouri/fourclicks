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

	 $result1 = "SELECT * FROM  `misc`";
	$sql1 = $conn->query($result1);
				if ($sql1->num_rows > 0) {
					
	                while($rows = $sql1->fetch_assoc()){
			
	            $contractor_fee= $rows['contractor_fee'];
	                $client_fee= $rows['client_fee'];
	                  $id= $rows['id'];
	            
}};
                     
if(isset($_GET['update_id']))
{ 
 $contractor_fee= $_POST['contractor_price'];
	                $client_fee= $_POST['client_price'];
$update_id= $_GET['update_id'];

 $sqlupdate = "UPDATE misc SET contractor_fee='$contractor_fee', client_fee='$client_fee' WHERE id='$update_id'";
if (mysqli_query($conn, $sqlupdate)) {


$URL="admin-prices.php?u=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}

	
	    


   ?>
 
   <div class="col-sm-10">
    
    
<div class="add-service text-center">
	<div class="sign_main_con_adj">
	<h2> Membership Prices</h2>
		<form class="form-horizontal"  action="admin-prices.php?update_id=<?php echo $id;  ?> " method="post" id="signup-form">
		
		 <div class="form-group">
		    <label class="control-label col-sm-4" for="email">Contractor Membershisp Price $:</label>
		    <div class="col-sm-6">
		    <input type="text" class="form-control"   name="contractor_price" required="" id ="service_name" value="<? echo $contractor_fee; ?>">
		       
		    </div>
		  </div>
		
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="email">Client Membershisp Price $:</label>
		    <div class="col-sm-6">
		    <input type="text" class="form-control"   name="client_price" required="" id ="service_name" value="<?php echo $client_fee; ?>">
		       
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