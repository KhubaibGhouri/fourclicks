<?php
    @include("header.php");
?>

<?php 
if(isset($_POST['msg']))
{
$Name= $_POST['fname'];
 $Email= $_POST['email'];
$Message= $_POST['msg'];


    $to="info@fourclicksolutions.com";
    
    $subject = 'Contact Us Query';
    
    $headers = "From: Four Solutions <info@fourclicksolutions.com >\r\n" . "Reply-To: info@fourclicksolutions.com \r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message='<html><body>
        <table style="border-collapse: collapse; width:100%; border: 50px solid #eee;">
        
         <tr>
            <td colspan="2" style="text-align:center; color:#34b3f6; border-bottom: 1px solid #ddd; padding-bottom:10px;padding-top:10px;">
                <a href="" target="_blank">
                <img height="80" alt="Four Solutions" src="https://fourclicksolutions.com/images/logo-construction.png" class="CToWUd"></a>
                <h3 style="padding-top:0px;"></h3>
            </td>
          </tr>
          <tr>
            <th colspan="2" style="text-align: center;  background-color:#333; color:#fff; padding:10px 10px;">
                <h1> Contact Us Query</h1>
            </th>
          </tr>
          <tr><td style="border: 50px solid #eee; border-bottom-style: none; border-top-style: none;">
        <table style="border-collapse: collapse; width:90%; margin-left:40px;">
         
          <tr>
            <th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">Name</th>
            <td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($Name) . '</td>
          </tr>
          <tr>
            <th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">Email</th>
            <td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($Email) . '</td>
          </tr>
          <tr>
            <th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">Contact Number</th>
            <td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($Message) . '</td>
          </tr>
         
        </table>
        </td></tr>
          <tr>
            <td colspan="2" style="padding: 10px; text-align:center; background-color:#333; color:#fff;">
              <p>Powered by www.fourclicksolutions.com</p></td>
          </tr>
        </table>
        
        </body>
        </html>';

    mail($to, $subject, $message, $headers, '-finfo@fourclicksolutions.com ');
    
    $to1=$Email;
       $subject1 = 'Query Recieved at Four Solutions';
 $message1='<html><body>
  <table style="border-collapse: collapse; width:100%; border: 50px solid #eee;">
   <tr>
            <td colspan="2" style="text-align:center; color:#34b3f6; border-bottom: 1px solid #ddd; padding-bottom:10px;padding-top:10px;">
                <a href="" target="_blank">
                <img height="80" alt="Four Solutions" src="https://fourclicksolutions.com/images/logo-construction.png" class="CToWUd"></a>
                <h3 style="padding-top:0px;"></h3>
            </td>
          </tr>
          <tr>
            <th colspan="2" style="text-align: center;  background-color:#333; color:#fff; padding:10px 10px;">
                <h1>Query at Four Solutions</h1>
            </th>

    </tr>
    <tr><td colspan="2" style="border: 50px solid #eee; border-bottom-style: none; border-top-style: none; text-align:center; padding: 20px 20px;">

<img height="50" width="50" alt="registration successful" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Commons-emblem-success.svg/1024px-Commons-emblem-success.svg.png" class="CToWUd"> 
<h2>Query Submission Successful </h2>
<h4>Thank You for Contacting us.Your Query has been recieved we will contact you soon.</h4>

  </td></tr>
    <tr>
   <td colspan="2" style="padding: 10px; text-align:center; background-color:#333; color: #ffffff">
     <p>Powered by www.fourclicksolutions.com</p></td>
    </tr>
  </table>
  
  </body>
  </html>';
  mail($to1, $subject1, $message1, $headers, '-finfo@fourclicksolutions.com ');

echo '<div  class="alert alert-success alert-dismissable" style="text-align: center" fade in>
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong></strong>Your Query has been sent.We will contact you shortly.
</div>';



}

  ?> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Contact form -->
        <section id="contact_form">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Do you have any questions?</h2>
                        <h2 class="second_heading">Feel free to contact us!</h2>
                    </div>
                    <form role="form" class="form-inline text-right col-md-6" action="contact.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="fname" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="msg" placeholder="Message" name="msg" required></textarea>
                        </div>
                        <button type="submit" class="btn submit_btn">Submit</button>
                    </form>				
                </div>
            </div>
        </section><!-- Contact form end -->


        



        <!-- Footer -->
       <?php
            @include("footer1.php");
       ?>}
<script>
$(".alert").delay(6000).slideUp(200, function() {
    $(this).alert('close');
});
</script>