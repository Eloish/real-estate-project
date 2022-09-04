
$(document).ready(function(){

  $(document).on('click', '#search', function()
{

    var datasearch=$("#formsearch").serialize();

  $.ajax({
    method:'POST',
    url:'allproperties.php',
    data:datasearch,
    success:function(data)
   {
      //alert(data);

     // location.replace('allproperties.php');

   // $("#allprop").html(data);


      
    } ,
  
           
   
   error: function(err)
   {
      console.log(err)
      alert(err.responseText)
    
  
   }

  });


  });

});