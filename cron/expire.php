<?php require_once('../contractor/db/connect.php');
 
 
 echo  $date=date('Y-m-d', strtotime("-1 days"));

 
  $result= "SELECT distinct user_id FROM coder WHERE enddate = '$date'";
    $sql = $conn->query($result);
    if ($sql->num_rows > 0) {
	                while($rows = $sql->fetch_assoc()) 
{
  $user_id=$rows['user_id'];
$result234= "SELECT * FROM register WHERE u_id = '$user_id'";
    $sql5 = $conn->query($result234);
 while($user = $sql5->fetch_assoc()) {
   $users[] = $user;
 };
 foreach($users as $user);
echo $email=$user['email'];
$contact_name=$user['contact_name'];
  
 $message='<html><body>
        <table style="border-collapse: collapse; width:100%; border: 25px;">
        
         <tr>
            <td colspan="2" style="text-align:center; color:#34b3f6; border-bottom: 1px solid #ddd; padding-bottom:10px;padding-top:10px;">
                <a href="" target="_blank">
                <img height="80" alt="Four Solutions" src="https://fourclicksolutions.com/images/logo-construction.png" class="CToWUd"></a>
                <h3 style="padding-top:0px;"></h3>
            </td>
          </tr>
          <tr>
            <th colspan="2" style="text-align: center;  background-color:#333; color:#fff; padding:10px 10px;">
                <h1> File Expired Alert</h1>
            </th>
          </tr>
          <tr><td style="border: 25px; border-bottom-style: none; border-top-style: none;">
         <h3 style="text-align:center;padding:10px 10px;"> Dear '.$contact_name.' ,
          Your Following files has been expired.
          </h3>
          ';
       $result1 = "SELECT * FROM  `coder` where Documenttype !='' and user_id='$user_id' and Enddate =  '$date'";
$sql1 = $conn->query($result1); 
    if ($sql1->num_rows > 0) {
      $message.= '   <h3 style ="margin-top: 10px;">Insuance & Risk</h3>
            <table style="border-collapse: collapse; width:100%;padding:10px 10px;"><tr>
            
<th  style="padding: 5px; text-align: center; border: 1px solid #ddd;">File Name</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">Document Type</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">Start Date</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">End Date</th>
</tr>';
                    while($row2 = $sql1->fetch_assoc()) { 




    $message.= "  <tr>
   <td style='padding: 5px; text-align: center; border: 1px solid #ddd;'>$row2[File]</td>
     <td style='padding: 5px; text-align: center; border: 1px solid #ddd;'>$row2[Documenttype]</td>
    <td style='padding: 10px; text-align: center; border: 1px solid #ddd;'>$row2[Startdate]</td>
  <td style='padding: 10px; text-align: center; border: 1px solid #ddd;'>$row2[Enddate]</td>";
    
               
     
        

}
 $message.= "</table>";
 
}


         $result2 = "SELECT * FROM  `coder` where user_id='$user_id' and  Enddate = '$date' and Trainingname != '' and EmployeeName !='' ";

$sql2 = $conn->query($result2);    
    if ($sql2->num_rows > 0) {
    
    $message.= '       <h3 >Training</h3>
            <table style="padding:10px 10px;border-collapse: collapse; width:100%;"><tr>
        
<th  style="padding: 5px; text-align: center; border: 1px solid #ddd;">File Name</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">Employe Name</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">Training Type</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">Start Date</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">End Date</th>
</tr>';
                    while($row2 = $sql2->fetch_assoc()) { 



    $message.= "<tr>
   <td style='padding: 5px; text-align: center; border: 1px solid #ddd;'>$row2[File]</td>
     <td style='padding: 5px; text-align: center; border: 1px solid #ddd;'>$row2[EmployeeName]</td>
   <td style='padding: 5px; text-align: center; border: 1px solid #ddd;'>$row2[Trainingname]</td>
    <td style='padding: 10px; text-align: center; border: 1px solid #ddd;'>$row2[Startdate]</td>
  <td style='padding: 10px; text-align: center; border: 1px solid #ddd;'>$row2[Enddate]</td>";
    
               
     
          



}
 $message.= "</table>"; 
}



$result3= "SELECT ID,BusinessName,Startdate,Enddate,File,SerialNumber,Equipmentname FROM  `coder` where SerialNumber!= '' and user_id='$user_id'  and `Equipmentname` != '' and  Enddate = '$date' GROUP BY Equipmentname";


$sql3 = $conn->query($result3);    
    if ($sql3->num_rows > 0) {

    $message.= '<h3 >Equipment</h3>
    <table style="border-collapse:collapse; width:100%;padding:10px 10px;"><tr>
             
<th  style="padding: 5px; text-align: center; border: 1px solid #ddd;">File Name</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">Equipment Name</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">Serial Number</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">Start Date</th>
<th style="padding: 5px; text-align: center; border: 1px solid #ddd;">End Date</th>
</tr>';
                    while($row2 = $sql3->fetch_assoc()) { 




    $message.= "  <tr>
   <td style='padding: 5px; text-align: center; border: 1px solid #ddd;'>$row2[File]</td>
     <td style='padding: 5px; text-align: center; border: 1px solid #ddd;'>$row2[Equipmentname]</td>
   <td style='padding: 5px; text-align: center; border: 1px solid #ddd;'>$row2[SerialNumber]</td>
    <td style='padding: 10px; text-align: center; border: 1px solid #ddd;'>$row2[Startdate]</td>
  <td style='padding: 10px; text-align: center; border: 1px solid #ddd;'>$row2[Enddate]</td>";
    




}
$message.= "</table>";
  

}     
         
       $message.=' <br><br></td></tr>
          <tr>
            <td colspan="2" style="padding: 10px; text-align:center; background-color:#333; color:#fff;">
              <p>Powered by www.fourclicksolutions.com</p></td>
          </tr>
        </table>
        
        </body>
        </html>';
echo   $message;

$to=$email;
    
    
    $subject = 'File Expired Alert';
    
    $headers = "From: Four Solutions <info@fourclicksolutions.com >\r\n" . "Reply-To: info@fourclicksolutions.com \r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";

  mail($to, $subject, $message, $headers, '-finfo@fourclicksolutions.com ');

}}
?>












