
<?php 
if ( isset($_GET['edit']) ) {
	$id = $_GET['edit'];
	$result=mysqli_query($conn,"SELECT * FROM coder WHERE id='$id'");
	$row= mysqli_fetch_array($result);
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
</head>
<body>
<div id="Training1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Competence</h4>
      </div>
      <div class="modal-body">
        <form action="#" id="testing" enctype="multipart/form-data"  method="POST">
			
                               <div class="form-group">
                                       <label for="business">Business Name</label>
                                       <input class="form-control" name="BusinessName" value="<?php echo $row['BusinessName']?>" type="text" required="" />
                               </div>
                                <div class="form-group">
				        <label for="Users">Employee Name</label>
				        <input type="text" class="form-control"  value="<?php echo $row['EmployeeName']?>" name="EmployeeName1" />
			        </div>
                                <div class="form-group">
					<label for="name">Training Type</label>
				        <input name="Trainingname1" class="form-control" type="text"   />
			        </div>                      

			        <div class="form-group">
				        <label for="Startdate">Start Date</label>
				         <input id="datepicker3"  class="form-control" class="datepicker" type="text" name="start"  /> 
			        </div>
			        <div class="form-group">
				        <label for="Enddate">Expiry Date (If any)</label>
				        <input id="datepicker4"  class="form-control" class="datepicker" type="text" name="end"  />
			        </div>
			       
			        <div class="form-group">
				        <label for="Fileupload">File Upload</label>
				        <input type="file" class="form-control" name="file" class="file" name="file" >
			        </div>
			        
				    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="submit">Upload</button>
		        </form>
      </div>
      </div>

  </div>
</div>
</body>

</html>