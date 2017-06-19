<body>	    <?php   
//         $SerialNumber= $_POST['SerialNumber'];
// $BusinessName = $_POST['BusinessName1'];

			// $result = "SELECT ID,BusinessName,Startdate,Enddate,File,SerialNumber,Equipmentname FROM coder WHERE BusinessName='$BusinessName' AND SerialNumber='$SerialNumber' AND Equipmentname='$Equipmentname'";
if(isset($_SESSION["user_id"]))
  {
    $user_id = $_SESSION["user_id"];

  }

$date = date("Y-m-d");
			// $result = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName, COUNT( * ) FROM  `coder` GROUP BY EmployeeName";
    $result = "SELECT ID,BusinessName,Startdate,Enddate,File,SerialNumber,Equipmentname FROM  `coder` where Enddate >  '$date' and SerialNumber!= '' and user_id = '$user_id' GROUP BY Equipmentname ";
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
	                while($row = $sql->fetch_assoc()) { 
                        $Equipmentname = $row['Equipmentname '];
$Equipmentname=$row['Equipmentname'];
    $result2 = "SELECT ID,BusinessName,Startdate,Enddate,File,SerialNumber,Equipmentname,doc_status FROM  `coder` where Enddate >  '$date' and SerialNumber!= '' and user_id = '$user_id' and  Equipmentname = '$Equipmentname'";

                $sql2 = $conn->query($result2);?>         
	                   <a class="btn btn-default btn-sm document" role="button" data-toggle="collapse" href="#collapseExample412-<?php echo $row['ID']; ?>" aria-expanded="false" aria-controls="collapseExample"> <?php echo $row['Equipmentname']; ?>  (<?=$sql2->num_rows; ?>)</a><br>
	                 <div  class="collapse" id="collapseExample412-<?php echo $row['ID']; ?>">
                        <?php
echo "<table class='table'><tr>";
echo '<th width="25">File Name</th>';
echo '<th width="25">Serial Number</th>';
echo '<th width="30">Start Date</th>';
echo '<th width="30">End Date</th>';
echo '<th width="30">Status</th>';
echo '<th width="40">Action</th>';
echo "</tr>";

$date = date("Y-m-d");

                    if ($sql2->num_rows > 0) {
                    while($row2 = $sql2->fetch_assoc()) { 
 $row2['Enddate'] = date('d-m-Y', strtotime($row2['Enddate']));
    echo "<tr>";
    echo "<td><a href='uploads/$row2[File]'>$row2[File]</a></td>";
    echo "<td>$row2[SerialNumber]</td>";
     echo "<td>$row2[Startdate]</td>";
   echo "<td>$row2[Enddate]</th>";
   if($row2['doc_status']=="Pass"){
   echo "<td><span class='glyphicon tick'>&#xe013;</span></td>";
   }else if($row2['doc_status']=="Fail")
   {
   echo "<td><span class='glyphicon cross'>&#xe014;</span></td>";
   }else{
   echo "<td>N/A</td>";
   }
      echo "<td><a  href='edit3.php?edit3=$row2[ID]' target='_blank'><span class='glyphicon'>&#xe065;</span></a><a  href='delete/delete.php?del=$row2[ID]' onclick='return confirm(\"Are you sure to delete?\")'><span class='glyphicon'>&#xe020;</span></a></td>";
   
    echo "</tr>"; ?>
               
            <?php }?>

        <?php  }
            echo '</table>';?>

             
                    </div>    
	        <?php
echo "</table>"; }?>
	    <?php  }?>

</body>
</html>