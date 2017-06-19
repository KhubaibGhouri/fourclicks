<?php 
session_start();
if($_SESSION['type'] != 'admin'){
//echo "aja ";
    header("Location:index.php");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php 
@include("../header1.php");
@include("../contractor/db/connect.php");
if(isset($_GET['update_id']))
{ 
$update_id= $_GET['update_id'];
$st= $_GET['s'];
if($st == 0)
{
$status ='1';
}else
{
$status= '0';
}
 $sqlupdate = "UPDATE register SET status='$status'  WHERE u_id='$update_id'";
if (mysqli_query($conn, $sqlupdate)) {


$URL="admin-contractor.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}



if(isset($_GET['delete_id']))
{ 
$delete_id= $_GET['delete_id'];

 $del= "DELETE from register WHERE u_id='$delete_id'";
if (mysqli_query($conn, $del)) {


$URL="admin-contractor.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}
?>

<div class="container-fluid">
<?php @include("admin-sidebar.php"); ?>

    <div class="col-sm-10">
    	<p class="para_adj">Contractor List</p>
     	<table class="table">
		      <tbody>
		      <tr>
		       <thead>
		       <th>Sr.</th>
		        <th>Business Name</th>
		        <th>Service</th>
		        <th>Email</th>
		        <th>Phone</th>
		        <th>Expiry Date</th>
		        <th>Payment</th>
		        <th>status</th>
		        <th>Action</th>
		         <thead>
		      </tr>
		      <?php
		      		
    $result = "SELECT * FROM  `register` where user_type = 'contractor'";
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
					$i='0';
	                while($row = $sql->fetch_assoc()) { $i++;?>   
		      <tr>
		       <td><?= $i; ?></td>
		        <td><?= $row['business_name'] ; ?></td>
		        <td><?= $row['service'] ; ?></td>
		         <td><?= $row['email'] ; ?></td>
		        <td><?= $row['phone'] ; ?></td>
		       
		        <td><?= $row['expiry_date'] ; ?></td>
		        <td><?= $row['payment_status'] ; ?></td>
		        <td><? if( $row['status'] == 1) { echo 'Active'; }else {echo 'Inactive'; } ?></td>
		        <?if( $row['status'] == 1){?>
		        <td><a href="admin-contractor.php?update_id=<?= $row['u_id']; ?>&s=<?= $row['status']; ?>"><button class="btn btn-primary btn-xs" type="submit" value="">Disable</button></a>
		         <a href="update-info.php?edit_id=<?= $row['u_id']; ?>"><span class="glyphicon">&#xe065;</span></a> 
		    <a href="admin-contractor.php?delete_id=<?= $row['u_id']; ?>" onclick='return confirm(\"Are you sure to delete?\")'><span class="glyphicon" style="color:red">&#xe020;</span></button></a>
		        
		   </td>    
		      <?  }else{ ?>
		        
                      <td><a href="admin-contractor.php?update_id=<?= $row['u_id']; ?>&s=<?= $row['status']; ?>"><button class="btn btn-danger btn-xs" type="submit" name="rej" value="<?=  $row['status']; ?>">Enable</button></a>
                        <a href="update-info.php?edit_id=<?= $row['u_id']; ?>"><span class="glyphicon">&#xe065;</span></a> 
		    <a href="admin-contractor.php?delete_id=<?= $row['u_id']; ?>" onclick="return confirm('Are you sure you want to Remove?');"><span class="glyphicon" style="color:red">&#xe020;</span></button></a>
                      
                      </td>
		     <?   } ?>
		      </tr>
		    <?php }}?>
		    </tbody>
		  </table>

      
      
     
    </div>
  </div>
</div>







<?php 
@include("../footer1.php");
?>
   
