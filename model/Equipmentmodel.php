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
  <script>
   $(function() {
    $( "#datepickers020, #datepickers021, #datepickers101, #datepickersl, #datepicker3, #datepicker4" ).datepicker({dateFormat: 'dd-mm-yy',minDate: new Date()});
});
   </script>
</head>
<body>
<div id="Equipment" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Documentation</h4>
  </div>
  <div class="modal-body">
    <form action="https://fourclicksolutions.com/equipment.php" id="testing" enctype="multipart/form-data"  method="POST">
 <div class="form-group">
        <label for="business">Business Name</label>
        <input class="form-control" name="BusinessName" type="text" required="" />
    </div>	
   <div class="form-group">
	<label for="EquipmentName">Equipment Name</label>
        <input name="EquipmentName" class="form-control" type="text"  />
    </div>
   <div class="form-group">
	<label for="title">Serial Number</label>
        <input name="SerialNumber" class="form-control" type="text"  />
   </div>		
    <div class="form-group">
        <label for="Startdate">Service Date</label>
         <input id="datepickers020" class="form-control" class="datepicker" type="text" name="start" required="" /> 
    </div>
    <div class="form-group">
        <label for="Enddate">Expiry Date (If any)</label>
        <input id="datepickers021" class="form-control"  class="datepicker" type="text" name="end" required="" />
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
</html>