<?php require_once('../db/connect.php');?>

<?php 
if ( isset($_GET['edit2']) ) {
	$id = $_GET['edit2'];
	$result=mysqli_query($conn,"SELECT * FROM coder WHERE id='$id'");
	$row= mysqli_fetch_array($result);
}
if(isset($_POST['submit01']))
{
 $BusinessName2 = $_POST['BusinessName2'];
 //$Filename = $_POST['Filename'];
 $select= $_POST['radio'];
 $start = $_POST['start'];
 $end =  date("Y-m-d", strtotime($_POST['end']));
 //$File= $_POST['file'];


 //$sqlupdate = "UPDATE coder SET BusinessName='$BusinessName2',Filename='$Filename', Documenttype='$select',startdate='$start',enddate='$end',File='$File' WHERE ID='$id'";
 $sqlupdate = "UPDATE coder SET BusinessName='$BusinessName2', Documenttype='$select',startdate='$start',enddate='$end' WHERE ID='$id'";

if (mysqli_query($conn, $sqlupdate)) {
   // if ($conn->query($sqlupdate) === TRUE) {
     header("Location: ../index.php?update=done");
   } 
   else 
   {
      echo "Error updating record: " . mysqli_error($conn);
   }

}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php 
@include("../header1.php");
  ?>

</head>
<body>

    <form action="#" id="testing" enctype="multipart/form-data"  method="POST">
 <div class="form-group">
        <label for="business">Business Name</label>
        <input class="form-control" name="BusinessName2" type="text" required=""  value="<?php echo $row['BusinessName'];?>" readonly/>
    </div>	
<div class="form-group">
		<!-- <label for="name">File Name</label>
        <input name="Filename" class="form-control" type="text"  value="<?php // $row['Name'];?>" />
    </div> -->
   		<label for="">Document Type</label>
		<div class="radio">
			 <label><input type="radio" name="radio" value="Public Laibility Insurance" <?php if($row['Documenttype']=="Public Laibility Insurance"){ echo "checked";}?>>1. Public Liability Insurance </label>
		</div> 
		<div class="radio">
			 <label><input type="radio" name="radio" value="Worker Comp Insurance" <?php if($row['Documenttype']=="Worker Comp Insurance"){ echo "checked";}?>>2. Worker Comp Insurance </label>
		</div>
		<div class="radio">
			 <label><input type="radio" name="radio" value="Indemnity Insurance" <?php if($row['Documenttype']=="Indemnity Insurance"){ echo "checked";}?>>3. Indemnity Insurance </label>
		</div> 
		<div class="radio">
			 <label><input type="radio" name="radio" value="Risk Assesment" <?php if($row['Documenttype']=="Risk Assesment"){ echo "checked";}?>>4. Risk Assessment  </label>
		</div>
		<div class="radio">
		     <label><input type="radio" name="radio" value="Safe Work Method Statement" <?php if($row['Documenttype']=="Safe Work Method Statement"){ echo "checked";}?>>5. Safe Work Method Statement </label>
		</div>
    
    <div class="form-group">
        <label for="Startdate">Start Date</label>
         <input id="datepickers101" class="form-control" class="datepicker" type="text" name="start" required="" value="<?php echo $row['Startdate'];?>" /> 
    </div>
    <div class="form-group">
        <label for="Enddate">Expiry Date (If any)</label>
        <input id="datepickersl" class="form-control"  class="datepicker" type="text" name="end" required="" value="<?php echo date("d-m-Y", strtotime($row['Enddate']));?>"/>
    </div>
   
     
    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="submit01">Update</button>
</form>


</body>
</html>
