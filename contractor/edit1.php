<?php require_once('db/connect.php');
 
if ( isset($_GET['edit1']) ) {
    $id = $_GET['edit1'];
    $result=mysqli_query($conn,"SELECT * FROM coder WHERE id='$id'");
    $row= mysqli_fetch_array($result);
}
if(isset($_POST['submit01']))
{
 $BusinessName2 = $_POST['BusinessName'];
 //$Filename = $_POST['Filename'];
 $select= $_POST['radio'];
 $start = $_POST['start'];
$end =  date("Y-m-d", strtotime($_POST['end'])); //$File= $_POST['file'];
//$doc_status= $_POST['doc_status'];
if(!empty($_POST['file_status'])) {
    foreach($_POST['file_status'] as $check) {
     $array[] = $check;
      
           //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
      $file_status=implode($array, ",");
}

 //$sqlupdate = "UPDATE coder SET BusinessName='$BusinessName2',Filename='$Filename', Documenttype='$select',startdate='$start',enddate='$end',File='$File' WHERE ID='$id'";
  $sqlupdate = "UPDATE coder SET BusinessName='$BusinessName2', Documenttype='$select',startdate='$start',enddate='$end',file_status = '$file_status' WHERE ID='$id'";


if (mysqli_query($conn, $sqlupdate)) {
    if ($conn->query($sqlupdate) === TRUE) {
    header("Location: index.php?update=done");
   } 
   else 
   {
      echo "Error updating record: " . mysqli_error($conn);
   }

}
}
 ?>

<?php
    @include('../header1.php');
?> 
<div class="container form_pad_adj">
    <h2>Edit File</h2>
    <hr>
 <form action="#" id="testing" enctype="multipart/form-data" method="POST">
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
             <label><input type="radio" name="radio" value="Indemnity Insurance" <?php if($row['Documenttype']=="Indemnity Insurance"){ echo "checked";}?>>2. Indemnity Insurance </label>
        </div>  
        <div class="radio">
             <label><input type="radio" name="radio" value="Worker Comp Insurance" <?php if($row['Documenttype']=="Worker Comp Insurance"){ echo "checked";}?>>3. Worker Comp Insurance </label>
        </div>
        
        <div class="radio">
             <label><input type="radio" name="radio" value="Risk Assesment" <?php if($row['Documenttype']=="Risk Assesment"){ echo "checked";}?>>4. General Risk Assessments  </label>
        </div>
        <div class="radio">
             <label><input type="radio" name="radio" value="Fire Risk Assessments" <?php if($row['Documenttype']=="Fire Risk Assessments"){ echo "checked";}?>>5. Fire Risk Assessments </label>
        </div>
         <div class="radio">
             <label><input type="radio" name="radio" value="Chemical Risk Assessments" <?php if($row['Documenttype']=="Chemical Risk Assessments"){ echo "checked";}?>>5. Chemical Risk Assessments </label>
        </div>
          <div class="radio">
             <label><input type="radio" name="radio" value="Safe Work Method Statement" <?php if($row['Documenttype']=="Safe Work Method Statement"){ echo "checked";}?>>6. Safe Work Method Statement </label>
        </div>
    <div class="form-group">
        <label for="Startdate">Start Date</label>
         <input id="datepicker006" class="form-control" class="datepicker" type="text" name="start" required="" value="<?php echo $row['Startdate'];?>" /> 
    </div>
    <div class="form-group">
        <label for="Enddate">Expiry Date (If any)</label>
        <input id="datepicker007" class="form-control"  class="datepicker" type="text" name="end" required="" value=" <?php echo date('d-m-Y', strtotime($row['Enddate']));;?>"/>
    </div>
     	<div class="form-group">
        <label for="sel1">Document Visible to </label>
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
   
    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="submit01">Update</button>
    </div>
</form>
</div>

<?php
    @include('../footer1.php');
?>
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 <script>
   $(function() {
    $( "#datepicker007, #datepicker006, #datepickers101, #datepickersl" ).datepicker({dateFormat: 'dd-mm-yy'});
});
   </script> 
   <script src="js/multi-select.js"></script>
<link rel="stylesheet" href="css/multi-select.css">
  <script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>