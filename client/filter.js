$(document).ready(function(){
    $('#service').on('change',function(){
        var service_name = $(this).val();
        if(service_name){
          $('#contratcor')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'service='+service_name,
                success:function(html){
                    $('#contratcor').html(html);
                   
                }
            }); 
        }else{
            $('#contractor').html('<option value="">Select Contractor first</option>');
            $('#city').html('<option value="">Select State first</option>'); 
        }
    });
    
      $('#city').on('change',function(){
        var city_name = $(this).val();
        if(city_name){
          $('#contratcor')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'city_id='+city_name,
                success:function(html){
                    $('#contratcor').html(html);
                   
                }
            }); 
        }else{
            $('#contractor').html('<option value="">Select Contractor first</option>');
            $('#city').html('<option value="">Select State first</option>'); 
        }
    });
    
    
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
         $('#state')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
              $('#contratcor')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                 dataType: 'json',
                data:'country_id='+countryID,
                  success:function(data){
        
if(data['states']){
var len = data['states'].length;
                $("#state").empty();
                 $("#state").append("<option value=''>Select State</option>");
                for( var i = 0; i<len; i++){
                    var id = data['states'][i]['id'];
                    var name = data['states'][i]['state_name'];
                    
                    $("#state").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
           
if(data['contractor']){
 var lenth = data['contractor'].length;
                $("#contratcor").empty();
                 $("#contratcor").append("<option value=''>Select Contractor</option>");
                for( var i = 0; i<lenth; i++){
                    var id = data['contractor'][i]['con_id'];
                    var name = data['contractor'][i]['business_name'];
                   
                    $("#contratcor").append("<option value='"+id+"'>"+name+"</option>");

                }
            }else{
           
             $("#contratcor").empty();
                 $("#contratcor").append("<option value=''>No Record Found</option>");
            }
            
            }
                
            }); 
        }else{
            $('#state').html('<option value="">Select Country first</option>');
            $('#city').html('<option value="">Select State first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
        $('#city')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
             $('#contratcor')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                   dataType: 'json',
                data:'state_id='+stateID,
                  success:function(data){
        
if(data['city']){
var len = data['city'].length;
                $("#city").empty();
                 $("#city").append("<option value=''>Select City</option>");
                for( var i = 0; i<len; i++){
                    var id = data['city'][i]['id'];
                    var name = data['city'][i]['city_name'];
                    
                    $("#city").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
           
if(data['contractor']){
 var lenth = data['contractor'].length;
                $("#contratcor").empty();
                 $("#contratcor").append("<option value=''>Select Contractor</option>");
                for( var i = 0; i<lenth; i++){
                    var id = data['contractor'][i]['con_id'];
                    var name = data['contractor'][i]['business_name'];
                   
                    $("#contratcor").append("<option value='"+id+"'>"+name+"</option>");

                }
            }else{
           
             $("#contratcor").empty();
                 $("#contratcor").append("<option value=''>No Record Found</option>");
            }
            
            }
            }); 
        }else{
            $('#city').html('<option value="">Select State first</option>'); 
        }
    });
  
  
});