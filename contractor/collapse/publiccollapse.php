<div class="collapse" id="collapseExample">
<?php  // $url = site_url( '/uploads/', 'https' );
?>
<?php
// $BusinessName = $_POST['BusinessName2'];
echo "<table class='table'><tr>";
echo '<th width="25">File Name</th>';
echo '<th width="30">Start Date</th>';
echo '<th width="30">End Date</th>';
echo '<th width="20">Action</th>';
echo "</tr>";
//$result = "SELECT * FROM coder WHERE Documenttype='Public Laibility Insurance' AND BusinessName='$BusinessName'";
if(isset($_SESSION["user_id"]))
  {
   $user_id = $_SESSION["user_id"];

  }

							if ($sql1->num_rows > 0) {
                                            while($row = $sql1->fetch_assoc()) {
                                                 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate']));
                                            
    echo "<tr>";
    echo "<td><a TARGET='_blank' href='uploads/$row[File]'>$row[File]</a></td>";
    echo "<td>$row[Startdate]</td>";
    echo "<td>$row[Enddate]<br></td>";
     echo "<td><a  href='edit1.php?edit1=$row[ID]' target='_blank'><span class='glyphicon'>&#xe065;</span></a><a  href='delete/delete.php?del=$row[ID]' onclick='return confirm(\"Are you sure to delete?\")'><span class='glyphicon'>&#xe020;</span></a></td>";
    echo "</tr>";
}}
echo "</table>"; ?>

</div>

 