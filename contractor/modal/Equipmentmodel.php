<head>

  <script>
   $(function() {
    $( "#datepickers020, #datepickers021, #datepickers101, #datepickersl, #datepicker3, #datepicker4" ).datepicker({dateFormat: 'yy-mm-dd',minDate: new Date()});
});
   </script>
<style>
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: -0.5 !important;
position: relative;
}
</style> 
</head>
<body>
<div id="Equipment" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Equipment</h4>
  </div>
  <div class="modal-body">
    <form action="#" id="testing" enctype="multipart/form-data"  method="POST">
 <div class="form-group">
        <label for="business">Business Name</label>
         <input class="form-control" name="BusinessName1" type="text" value=" <?= $_SESSION['business_name']; ?>" readonly />
       
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
        <label for="Startdate">Record Date</label>
         <input id="datepickers020" class="form-control" class="datepicker" type="text" name="start" required="" /> 
    </div>
    <div class="form-group">
        <label for="Enddate">Expiry / Refresher Date</label>
        <input id="datepickers021" class="form-control"  class="datepicker" type="text" name="end" required="" />
    </div>
     <label for="">Status</label>
		<div class="radio">
			 <label><input type="radio" name="doc_status" value="Pass" required>Pass</label>
			 <label><input type="radio" name="doc_status" value="Fail" required>Fail</label>
			 <label><input type="radio" name="doc_status" value="N/A" required>N/A</label>
		</div>
		 	<div class="form-group">
        <label for="sel1">Document shown to </label>
        <select  name="file_status[]" id="dates-field2" class="multiselect-ui form-control" multiple="multiple" >
       
        <?php
        
        $result = "SELECT business_name,u_id, COUNT( * ) 
  FROM  `register` where user_type ='client'
  GROUP BY business_name";

        $sql = $conn->query($result);
        if ($sql->num_rows > 0) {
          while ($row = $sql->fetch_assoc()) {
                     ?>
                <option value='<?php echo $row['u_id']?>'><?php echo $row['business_name']?></option>
            <?php
             }
              }
        ?>
        </select>
  </div>
   
     <div class="form-group">
     
        <label for="Fileupload">File Upload</label>
        <input type="file" class="form-control" name="file" class="file" name="file" >
    </div>
    
    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="submit12">File Upload</button>
</form>
</div>
  </div>

</div>
</div>
<script src="js/multi-select.js"></script>
<link rel="stylesheet" href="css/multi-select.css">
  <script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>
</body>

</html>