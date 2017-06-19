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
<div id="myModal1" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Documentation</h4>
  </div>
  <div class="modal-body">
    <form action="https://fourclicksolutions.com/bronze.php" id="testing" enctype="multipart/form-data"  method="POST">
	<div class="form-group">
		<label for="name">File Name</label>
        <input name="name" class="form-control" type="text"   />
    </div>

		<label for="">Document Type</label>
		<div class="radio">
			 <label><input type="radio" name="radio" value="Public Laibility Insurance">1. Public Liability Insurance </label>
		</div> 
		<div class="radio">
			 <label><input type="radio" name="radio" value="Worker Comp Insurance">2. Worker Comp Insurance </label>
		</div>
		<div class="radio">
			 <label><input type="radio" name="radio" value="Indemnity Insurance">3. Indemnity Insurance </label>
		</div> 
		<div class="radio">
			 <label><input type="radio" name="radio" value="Risk Assesment">4. Risk Assessment  </label>
		</div>
		<div class="radio">
		     <label><input type="radio" name="radio" value="Safe Work Method Statement">5. Safe Work Method Statement </label>
		</div>
    
    <div class="form-group">
        <label for="Startdate">Start Date</label>
         <input id="datepicker" class="form-control" class="datepicker" type="text" name="start" required="" /> 
    </div>
    <div class="form-group">
        <label for="Enddate">Expiry Date (If any)</label>
        <input id="datepicker1" class="form-control"  class="datepicker" type="text" name="end" required="" />
    </div>
    <div class="form-group">
        <label for="business">Business Name</label>
        <input class="form-control" name="users" type="text" required="" />
    </div>
     <div class="form-group">
        <label for="Fileupload">File Upload</label>
        <input type="file" class="form-control" name="file" class="file" name="file" >
    </div>
    
    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="submit">File Upload</button>
</form>
</div>
  </div>

</div>
</div>
</body>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<script>
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  </script>
</html>