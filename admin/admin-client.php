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


$URL="admin-client.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}

if(isset($_GET['delete_id']))
{ 
$delete_id= $_GET['delete_id'];

 $del= "DELETE from register WHERE u_id='$delete_id'";
if (mysqli_query($conn, $del)) {


$URL="admin-client.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}

?>


<div class="container-fluid">
  <?php @include("admin-sidebar.php"); ?>

    <div class="col-sm-10">
    	<p class="para_adj">Client List</p>
     	<table class="table tabl_pad">
		      <tbody>
		      <tr>
		       <th>Sr.</th>
		        <th>Business Name</th>
		        <th>Service</th>
		        <th>Email</th>
		        <th>Phone</th>
		        <th>Expiry Date</th>
		        <th>payment_status</th>
		        <th>status</th>
		        
		         <th>Action</th>
		        
		      </tr>
		      <?php
		      		
    $result = "SELECT * FROM  `register` where user_type = 'client'";
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
		         <td><a href="admin-client.php?update_id=<?= $row['u_id']; ?>&s=<?= $row['status']; ?>"><button class="btn btn-primary btn-xs" type="submit" value="">Disable</button></a>
		       <a href="admin-client.php?delete_id=<?= $row['u_id']; ?>" onclick='return confirm(\"Are you sure to delete?\")'><button class="btn btn-danger btn-xs" type="submit" value="">Delete</button></a>
		        <a href="update-info.php?edit_id=<?= $row['u_id']; ?>"><button class="btn btn-primary btn-xs" type="submit" value="">Edit</button></a>  
		         
		         </td>
		      <?  }else{ ?>
		        
                      <td><a href="admin-client.php?update_id=<?= $row['u_id']; ?>&s=<?= $row['status']; ?>"><button class="btn btn-danger btn-xs" type="submit" name="rej" value="<?=  $row['status']; ?>">Enable</button></a>
                       <a href="admin-client.php?delete_id=<?= $row['u_id']; ?>" onclick='return confirm(\"Are you sure to delete?\")'><button class="btn btn-danger btn-xs" type="submit" value="">Delete</button></a>
		        <a href="update-info.php?edit_id=<?= $row['u_id']; ?>"><button class="btn btn-primary btn-xs" type="submit" value="">Edit</button></a>  
                      
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