<?php 
session_start();
if( $_SESSION['type']!='admin' and !$_SESSION['Login']){
    header("location:index.php");
}

@include("../header1.php");
@include("../contractor/db/connect.php");
?>

<div class="container-fluid">
  <?php @include("admin-sidebar.php"); ?>

<?php
if(isset($_GET['delete_id']))
{ 
$delete_id= $_GET['delete_id'];

 $sqlupdate = "DELETE from cupon WHERE id='$delete_id'";
if (mysqli_query($conn, $sqlupdate)) {


$URL="coupon.php?d=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}	
if (isset($_POST['no_of_coupons'])) {
		
		$no_of_coupons = $_POST['no_of_coupons'];
		
     for ($i=0; $i < $no_of_coupons; $i++) { 
 	$days = $_POST['valid_days'];
	$expiry_date = Date('Y-m-d', strtotime(+ $days.'days'));
		$status ='0';
    $id= strtoupper(uniqid('fC'));

 $sql = "INSERT INTO cupon (number,valid_date,status) VALUES ('" .$id."','" .$expiry_date ."','" .$status."')";
    if ($conn->query($sql) === TRUE) {
    	
$URL="coupon.php?a=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    		
	    
}
   
	}}

?>

    <link href="../FourClickSolutions_files/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h3>Membership - Coupon Code Generator</h3>
				<hr>
				<form action="coupon.php" method="POST" >
					<table class="table table-striped">
						<tr>
							<th>Parameter</th>
							
							<th>Custom value</th>
						</tr>
						<tr>
							<th>Number of coupons</th>
							
							<td><input class="form-control" type="number" name="no_of_coupons" value="1" min="1"/></td>
						</tr>
						<tr>
							<th>Cupon Vaild (days)</th>
							
							
							<td><input class="form-control" type="number" name="valid_days" value="10" min="1" /></td>
						</tr>
							</table>
					<div class="col-md-offset-8 col-md-4">
						<button type="submit" class="btn btn-success pull-right">Generate</button>
						<br/><br/>
					</div>
					</form>
					
						
					<hr />
					<p class="para_adj">Coupon Generated</p>
     	<table class="table table-striped">
     	<form action="" Method="POST">
		      <tbody>
		      <tr>
		       <th>Sr.</th>
		        <th>Coupon Number</th>
		         <th>Valid till</th>
		          <th>Status</th>
		         <th>Action</th>
		        
		      </tr>
		      <?php
		      		
    $result = "SELECT * FROM  `cupon` ";
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
					$i='0';
					   $date= date("Y-m-d");
	                while($row = $sql->fetch_assoc()) { $i++;?>   
		      <tr>
		       <td><?= $i; ?></td>
		    
		        <td><?= $row['number'] ; ?></td>
		         <td><?= $row['valid_date'] ; ?></td>
		          <td><? if( $row['valid_date'] < $date){echo '<p  class="btn btn-warning btn-xs"> Expired </p>';} elseif ($row['status'] == '0' ) {echo '<p  class="btn btn-success btn-xs" >Unused</p>';}elseif($row['status'] == '1'){echo '<p  class="btn btn-danger btn-xs"> Used </p>';}; ?></td>
		       
		         	<td>
              
              
               <a onclick="javascript:confirmationDelete($(this));return false;" href="coupon.php?delete_id=<?php echo $row['id']; ?> " class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
     
                        	</td> 
		       
		        
		      </tr>
		    <?php }}?>
		    </tbody>
		  </table>
			</div>
		</div>
	</div>
	
	
	<script>
function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this Coupon?');
   if(conf)
      window.location=anchor.attr("href");
}
  </script>