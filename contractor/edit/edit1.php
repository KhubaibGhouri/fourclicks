<?php require_once('../db/connect.php');?>

<?php 
if ( isset($_GET['edit1']) ) {
	$id = $_GET['edit1'];
	$result=mysqli_query($conn,"SELECT * FROM coder WHERE id='$id'");
	$row= mysqli_fetch_array($result);
}
if(isset($_POST['update1']))
{
 $BusinessName2 = $_POST['BusinessName'];
 //$Filename = $_POST['Filename'];
 
 $start = $_POST['start'];
 $end =  date("Y-m-d", strtotime($_POST['end']));
 //$File= $_POST['file'];

 
  //$file       = $_POST['file'];
  $Trainingname = $_POST['Trainingname1'];
    $EmployeeName = $_POST['EmployeeName1'];


 

 //$sqlupdate = "UPDATE coder SET BusinessName='$BusinessName2',Filename='$Filename', Documenttype='$select',startdate='$start',enddate='$end',File='$File' WHERE ID='$id'";
 $sqlupdate = "UPDATE coder SET BusinessName='$BusinessName2', Trainingname='$Trainingname',EmployeeName='$EmployeeName',startdate='$start',enddate='$end',File='$file' WHERE ID='$id'";

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
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
</head>
<body>
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-body">
   
</div>
  </div>

</div><form action="#" id="testing" enctype="multipart/form-data"  method="POST">
			
                               <div class="form-group">
                                       <label for="business">Business Name</label>
                                       <input class="form-control" name="BusinessName" type="text" value="<?php echo $row['BusinessName'];?>"" readonly />
                               </div>
                                <div class="form-group">
				        <label for="Users">Employee Name</label>
				        <input type="text" class="form-control" name="EmployeeName1"value="<?php echo $row['EmployeeName'];?>" />
			        </div>
                                <div class="form-group">
					<label for="name">Training Type</label>
				        <input name="Trainingname1" class="form-control" type="text"  value="<?php echo $row['Trainingname'];?>" />
			        </div>                      

			        <div class="form-group">
				        <label for="Startdate">Start Date</label>
				         <input id="datepicker003"  class="form-control" class="datepicker" type="text" name="start" value="<?php echo $row['Startdate'];?>" /> 
			        </div>
			        <div class="form-group">
				        <label for="Enddate">Expiry Date (If any)</label>
				        <input id="datepicker004"  class="form-control" class="datepicker" type="text" name="end" value="<?php echo date("d-m-Y", strtotime($row['Enddate']));?>" />
			        </div>
			       
			       
			        
				    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="update1">Update</button>
		        </form>
</div>
</body>
</html>
