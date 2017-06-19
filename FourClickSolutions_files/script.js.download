
          $("#datepicker1").datepicker({ 
         dateFormat: "yy-mm-dd",
          onClose: function(dateText) { 
              dateVariable = dateText; 
              
              var good = ($("#datepicker1").val()) 
              var d = new Date();
          var d = Date.parse(d);
          var date2  = Date.parse(good);
              if (d>date2) {
                $(document).ready(function(){
                  $('#testing').click(function(){
                          $.ajax({
                          url:'<?php echo get_template_directory("enlod/inc/update.php"); ?>',
                          method:"post",
                          data: $('form').serialize(),
                          dataType: "text",
                          success:function(strMessage){
                           $('#message').text(strMessage)
                          }
                      })
                  })         
                })
              }else{
                alert("not yes");           
              }
              
          }
      });
        
        
                 jQuery(document).ready(function() {
               $("#datepicker").datepicker({
                  dateFormat: "yy-mm-dd",
                  changeMonth:true,
                  changeYear:true
                });
      })
      jQuery(document).ready(function() {
               $("#datepicker1").datepicker({
                  dateFormat: "yy-mm-dd",
                  changeMonth:true,
                  changeYear:true
                });
      })
    
      $(function() {
          $( "#datepicker1" ).datepicker({ dateForm "dd-mm-yy" });

      $("#datepicker1").on("change",function(){
          var selected = $(this).val();
        var d = new Date();
        var d = Date.parse(d);
        var date2  = Date.parse(selected);
            if (d>date2) {
            document.write('yes');
            }
            else
            {
            document.write('not yes');            
            }
           });
        });
      $(function() {
        $( "#datepicker1" ).datepicker();
      });

        var d = new Date();
      var d = Date.parse(d);
      var date2  = Date.parse("10/26/2016");
          if (d>date2) {
           document.write('yes');          
          }else{
           document.write('yes');         
          }
      $(document).ready(function(){
          $("#button").click(function(){
  $("#myTable").append('</p><p></p><tr></p><td>my data</td><p></p><td>more data</td><p></tr><p></p><p>');
          });
      });
        
       $(document).ready(function(){
          $('#submit').click(function(){
               $.ajax({
                    url: "update1.php",
                    method:"post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success:function(strMessage){
                    $('#message').text(strMessage)
                    }
               })
          })         
     })
  </script><script>
          $(document).ready(function(){
              $('#myModal1').on('show.bs.modal', function (e) {
                  var id = $(e.relatedTarget).data('id');
                  alert(id);
                  $("#person_id").val(id);
               });
          });
  
      $(document).ready(function(){
        $('#delete').click(function(){
          $.ajax({
            url:"delete.php",
            method:"post",
            data: $('form').serialize(),
            dataType:"text",
            success:function(strMessage){
              ('#message1').text(strMessage)
            }
          })
        })
      })
  
    jQuery(document).ready(function($) {
        $("#datepicker").datepicker();
    });
</script><script>
    jQuery(document).ready(function($) {
        $("#datepicker1").datepicker();
    });
</script><script>
    jQuery(document).ready(function($) {
        $("#datepicker").datepicker();
    });
</script><script></script><script>
      
       jQuery(document).ready(function(){
          jQuery('#testing').click(function(){
               alert("yes mani"); 
          });         
     });
     