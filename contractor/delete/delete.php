<?php require_once('../db/connect.php');?>
<?php
if (isset($_GET['del'])) {
      $id=$_GET['del'];

      $sql="DELETE FROM coder WHERE ID='$id'";
      $q="SELECT File from coder where ID='$id'";
                         $sql1 = $conn->query($q);
                          $sql1->num_rows;
							if ($sql1->num_rows > 0) {
                                            while($row = $sql1->fetch_assoc()) {

                                       						 $Path="../uploads/".$row['File'];
		                                                     if (file_exists($Path)){
		                                                     if (unlink($Path)) {   
		                                                                        if ($conn->query($sql) === TRUE) {
		    //echo "del record created successfully";
    																						 header("Location: ../index.php?delete=done");
    
} 
}
                                                                        }
     
   
    
}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}}

 ?>