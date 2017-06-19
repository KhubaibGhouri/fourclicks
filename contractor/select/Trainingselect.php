<body>	    <?php   
        // $BusinessName = $_POST['BusinessName'];
        // $EmployeeName = $_POST['EmployeeName'];
        // $Trainingname = $_POST['Trainingname1'];


if(isset($_SESSION["user_id"]))
  {
    $user_id = $_SESSION["user_id"];

  }
 $date = date("Y-m-d");
    // $result = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName, COUNT( * ) FROM  `coder` GROUP BY EmployeeName";
    $result = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName FROM  `coder` where Enddate > '$date' and TrainingName != ' ' and user_id = '$user_id' GROUP BY EmployeeName";
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
	                while($rows = $sql->fetch_assoc()) { 
	                
	                $EmployeeName = $rows['EmployeeName'];
   $result2 = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName FROM  `coder` where Enddate > '$date' and TrainingName != '' and user_id = '$user_id' and  EmployeeName = '$EmployeeName' ";
 

                $sql2 = $conn->query($result2);
	                ?>         
	                   <a class="btn btn-default btn-sm document" role="button" data-toggle="collapse" href="#collapseExample41-<?php echo $rows['ID']; ?>" aria-expanded="false" aria-controls="collapseExample"><?php echo $rows['EmployeeName']; ?> (<?=$sql2->num_rows; ?>)</a><br>
	                 <div  class="collapse" id="collapseExample41-<?php echo $rows['ID']; ?>">
                        <?php
echo "<table  class='table'><tr>";
echo '<th width="25">File Name</th>';
echo '<th width="25">Training Type</th>';
echo '<th width="30">Start Date</th>';
echo '<th width="30">End Date</th>';
echo '<th width="40">Action</th>';
echo "</tr>";  
 $date = date("Y-m-d");


                    if ($sql2->num_rows > 0) {
                    while($row2 = $sql2->fetch_assoc()) { 
                   
 $row2['Enddate'] = date('d-m-Y', strtotime($row2['Enddate']));

    echo "<tr>";
    echo "<td><a href='uploads/$row2[File]'>$row2[File]</a></td>";
    echo "<td>$row2[TrainingName]</td>";
    echo "<td>$row2[Startdate]</td>";
    echo "<td>$row2[Enddate]<br></td>";
      echo "<td><a  href='edit2.php?edit2=$row2[ID]' target='_blank'><span class='glyphicon' >&#xe065;</span></a>
    <a  href='delete/delete.php?del=$row2[ID]' onclick='return confirm(\"Are you sure to delete?\")'><span class='glyphicon'>&#xe020;</span></a></td>";
   
    
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