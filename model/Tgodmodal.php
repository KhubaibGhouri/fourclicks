<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  
 
</head>
<body>
	<div id="Training" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Competence</h4>
      </div>
      <div class="modal-body">
        <form action="https://fourclicksolutions.com/goldpub.php" id="testing" enctype="multipart/form-data"  method="POST">
				<div class="form-group">
						<label for="name">Training Type</label>
				        <input name="name" class="form-control" type="text"   />
			        </div>
                                 <div class="form-group">
				        <label for="Users">Employee Name</label>
				        <input type="text" class="form-control" name="users" />
			        </div>

			        <div class="form-group">
				        <label for="Startdate">Start Date</label>
				         <input id="datepicker01" class="form-control datepicker" type="text" name="start" required="" /> 
			        </div>
			        <div class="form-group">
				        <label for="Enddate">Expiry Date (If any)</label>
				        <input id="datepicker14" class="form-control datepicker" type="text" name="end" required="" />
			        </div>
			        <div class="form-group">
                                        <label for="business">Business Name</label>
                                        <input class="form-control" name="users" type="text" required="" />
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
 <script>
  $( function() {
    $( "#datepicker01" ).datepicker();
  } );
  </script>
 <script>
  $( function() {
    $( "#datepicker14" ).datepicker();
  } );
  </script>
</html>