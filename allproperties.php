<?php
include('menu.php');
include('config/connect.php');
//$show=$conn->query('select * from maison,category where maison.idcat=category.idcat');
$selectall=$conn->query('select * from maison,category where maison.idcat=category.idcat and statut=1');
$selectallh=$selectall->fetch();

?>

<style>
    .imagesgrid{
        width:500px;
        height:300px;
    }

</style>
<!--/ Intro Single star /-->
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Our Amazing Properties</h1>
            <span class="color-text-a">Grid Properties</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
            
              <li class="breadcrumb-item active" aria-current="page">
                Properties 
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
</section>
  <!--/ Intro Single End /-->
<!--/ Property Grid Star /-->
<section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
            <form>
              <select class="custom-select" id="searchhouse">
                <option  selected value="All">All</option>
                <option value="rent">For Rent</option>
                <option value="sell">For Sale</option>
              </select>
              
            </form>
          </div>
        </div>
      </div>
      <div class="row"id="allprop">


         

      </div>
      
     
    </div>
</section>


  <!--/ Property Grid End /-->

<script>
    $(document).ready(function(){
      
     // listproperties();

     listproperties();

    $(document).on('click','#search',function()
    {
      var rentorsell=$('#Type').val();
      var commune=$('#city').val();
      var cat= $('#categoriehouse').val();
      alert(rentorsell);
      search();

    });
    

    
     

    
  

  

    $('#searchhouse').change(function()
      {
        
        $("#allprop").html('');
            var val=$(this).val();
            if(val=='rent'|| val=='sell')
            {
            $.ajax({
                data:{option:val},
                method:'GET',
                url:'search.php',
                //dataType:"json",
               
                success: function (response)
               {
                  $('#allprop').html(response);
               
            
     
                },
                 error: function(err)
                {
                 console.log(err)
                 alert(err.responseText)
       
                }

            });
          }else if(val=='All')
          {
            listproperties();
          }

      });

     
        });

    function listproperties()
  {
      var property='';

     $.ajax({
      type: "GET",
      url: "saves.php",
      success: function (response)
      {
      
   
          $('#allprop').html(response);
            
          }
     

    });

 
  
  }

  
</script>

<script src="js/favorites.js"></script>
<script src="js/like.js"></script>
<?php include('footer.php'); ?>