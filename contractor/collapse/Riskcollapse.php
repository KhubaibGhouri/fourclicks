<div class="collapse" id="collapseExample102">
<?php $url = "uploads/";
;?>
<?php
//$BusinessName = $_POST['BusinessName2'];
echo "<table class='table'><tr>";
echo '<th width="25">File Name</th>';
echo '<th width="30">Start Date</th>';
echo '<th width="30">End Date</th>';
echo '<th width="20">Action</th>';
echo "</tr>";
if(isset($_SESSION["user_id"]))
  {
    $user_id = $_SESSION["user_id"];

  }

   
// $result = "SELECT * FROM coder WHERE Documenttype='Risk Assesment' WHERE BusinessName='$BusinessName'";
$date = date("Y-m-d");
 $result = "SELECT * FROM coder WHERE Enddate >  '$date' and Documenttype='Risk Assesment' and user_id = '$user_id'";
$sql = $conn->query($result);
							if ($sql->num_rows > 0) {
                                            while($row = $sql->fetch_assoc()) {
                                               $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate']));
    echo "<tr>";
    echo "<td><a href='uploads/$row[File]'>$row[File]</a></td>";
    echo "<td>$row[Startdate]</td>";
    echo "<td>$row[Enddate]<br></td>";
   echo "<td><a  href='edit1.php?edit1=$row[ID]' target='_blank'><span class='glyphicon'>&#xe065;</span></a><a  href='delete/delete.php?del=$row[ID]' onclick='return confirm(\"Are you sure to delete?\")'><span class='glyphicon'>&#xe020;</span></a></td>";
    echo "</tr>";
}}
echo "</table>"; ?>
</div>






