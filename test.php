<?php
include('menu.php');
include("config/connect.php");
//session_start();
$affichage=$conn->query("SELECT * from maison,category where idmaison='".$_GET["idmaison"]."' and maison.idcat=category.idcat ");
$datamessage=$affichage->fetch();

$affichewowner=$conn->query("SELECT * from maison,offreurs where idmaison='".$_GET["idmaison"]."' and maison.id=offreurs.id");
$ower=$affichewowner->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<style>
  .clinic-booking a.view-pro-btn {
		width: 100%;
		margin-bottom: 15px;
	}
	.clinic-booking a.apt-btn {
		width: 100%;
	}
  .clinic-booking a.view-pro-btn {
		width: 100%;
		margin-bottom: 15px;
	}
	.clinic-booking a.apt-btn {
		width: 100%;
	}
  .period{
    
  }

</style>

<body>


   <!--/ Intro Single star /-->
   <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single"><?php echo $datamessage['adress1'] ?></h1>
            <span class="color-text-a"><?php echo $datamessage['adress2'] ?>,<?php echo $datamessage['adress3'] ?></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="property-grid.html">Properties</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
              <?php echo $datamessage['adress3'] ?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

    <!--/ Property Single Star /-->
<section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
       <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              <?php 
                $images=$datamessage['images'];
                //echo $images;
                $remove_last_comma=substr($images,0,-3);
                $temp = explode(',',$remove_last_comma);
                //echo $remove_last_comma;
                for($i=0;$i<count($temp);$i++)
                {
                    if(!empty($images))
                    {
                 echo '<div class="carousel-item-b">
                         <img  src="Administrateur/uploadshouse/'.trim($temp[$i]).'" style="height:650px" class=" img-fluid imagesgrid" >
                       </div>';
                }
    
 
                 }
               
            
              
              ?>     
          </div>
          
          <div class="row justify-content-between">
<?php $output="";

if($datamessage['rentorsell']=='rent')
{
  $output='<div class="col-md-5 col-lg-4">
  <div class="property-price">
    <div class="card-header-c d-flex">
      <div class="card-title-c align-self-center">
        <h5 class="title-c txt-primary">'.$datamessage["rentorsell"].'</h5>
      </div>
      <div class="card-box-ico">
        <span class="ion-money">FBU/</span><small class="period">months</small>
      </div>

    
      <div class="card-title-c align-self-center">
        <h5 class="title-c">'. $datamessage['prix'].'</h5>
      </div>
      
    </div>
    <div class="card align-self-center mt-4">
    <a href="booking.php?idmaison='.$datamessage['idmaison'].'" class="btn btn-danger p-4" >BOOK NOW</a>
  </div>
     
  </div>
  

<div>';

}
else{
  $output=' <div class="col-md-4 col-lg-5">
  <div class="property-price">
    <div class="card-header-c d-flex">
      <div class="card-title-c align-self-center">
        <h5 class="title-c">'. $datamessage['rentorsell'].'</h5>
      </div>
      <div class="card-box-ico">
        <span class="ion-money">FBU</span>
      </div>

    
      <div class="card-title-c align-self-center">
        <h5 class="title-c">'. $datamessage['prix'].'</h5>
      </div>
      
    </div>
    <div class="card align-self-center mt-4">
      <a href="#" class="btn btn-danger p-4" >BUY NOW</a>
    </div>
     
  </div>
  

<div>';

}
echo $output;
 ?>
           

             </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Quick Summary</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    
                    <li class="d-flex justify-content-between">
                      <strong>Location:</strong>
                      <span><?php echo $datamessage['adress2'] ?>,<?php echo $datamessage['adress3'] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Property Type:</strong>
                      <span><?php echo $datamessage['namecat'] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Status:</strong>
                      <span><?php echo $datamessage['rentorsell']?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Area:</strong>
                      <span><?php echo $datamessage['Area'] ?>m
                        <sup>2</sup>
                      </span>
                    </li>
                   
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Property Description</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                 <?php echo $datamessage['descriptionm'] ?>
                </p>
              </div>
             
             
            </div>
        <div class="col-md-12">
          <div class="row section-t3">
            <div class="col-sm-6">
              <div class="title-box-d">
                <h3 class="title-d">Contact Owner</h3>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-6 col-lg-4">
            <?php
            $profile=$ower['pp'];
             ?>
              <img src="profileimage/<?php echo $profile ?>" alt="" width="600" class="img-fluid">
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="property-agent">
                <h4 class="title-agent"><?php echo $ower['nameoffreur'] ?></h4>
               
                <ul class="list-unstyled">
                  
                  <li class="d-flex justify-content-between">
                    <strong>Mobile:</strong>
                    <span class="color-text-a"><?php echo $ower['phonenumber'] ?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Email:</strong>
                    <span class="color-text-a"><?php echo $ower['emailoff'] ?></span>
                  </li>
                  
                </ul>
                
              </div>
            </div>
            

            <div class="col-md-12 col-lg-4">
              <div class="property-contact">
              <div class="alert alert-success alert-dismissible success" style="display: none;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <span id="success"></span>
        </div>
       
             
                <form class="form-a" method="POST" id="message">

      
                  <div class="row">
                   
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <textarea id="textMessage" class="form-control" placeholder="Message *" required='required' name="message" cols="45"
                          rows="8" ></textarea>
                        <input type="hidden"name="idmaison"id="idmaison" value="<?php echo $_GET["idmaison"]?>">
                        <input type="hidden"name="idreceiver"id="idreceiver" value="<?php echo $ower["id"]?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" name="submitmessage" id="submitmessage" class="btn btn-a">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
         <div class="container mt-5 mb-5">
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Donner votre avis sur la maison</h3>
                  </div>
                </div>
              </div>
          
              <form method="POST" id="comment_form">
                   <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <input type="text" name="nom" class="form-control " id="inputName"
                          placeholder="Name *" required>
                      </div>
                    </div>
                 <div class="col-md-12 mb-1">
                    <div class="form-group">
                    <textarea name="comment_content" id="comment_content" class="form-control form-control-lg form-control-a" placeholder="Enter Comment" rows="5"></textarea>
                   </div>
                </div>
    
                <div class="form-group">
                  <input type="hidden"name="idmaison"id="idmaison" value="<?php echo $_GET["idmaison"]?>">
                  <input type="hidden" name="comment_id" id="commentid" value="0" />
                  <input type="submit" name="submit" id="add" class="btn btn-info" value="Submit" />
               </div>
             </form>
            </div>
          </div>
 
         <?php 

         function showComments()
      {
          $comment="";
  
          $comment.=commenttree();
  
        echo $comment;
      }

        function commenttree($parentid=NULL)
      {
  
         $comments='';
         $sql='';
          if($parentid==0)
        {
           $sql="SELECT * FROM commentaires 
           WHERE parent_comment_id =0 and  idmaison='".$_GET["idmaison"]."' 
           ORDER BY idcomment DESC";
        }
  
       else 
       {
          $sql="SELECT * FROM commentaires 
         WHERE parent_comment_id = $parentid  and  idmaison='".$_GET["idmaison"]."' ";
  
      }
      $result=$GLOBALS['conn']->query($sql);
      
      while($data=$result->fetch())
     {
    // echo $data['comment_id'];
    
    // echo '<pre>';
    // print_r($data);
   
    
    if($data['parent_comment_id']=='0')
    {
     $comments.='
     <div class="media  comment0 p-3">
    <div class="media-body">
    <div class="d-flex justify-content-between align-items-center">

    <p class="mb-1">'.$data['iduser'].'<small><i>  on '.$data['date'].' </i></small></p>
      <button type="button" class="btn btn-primary reply" idcom= '.$data["idcomment"].'>Reply</button>
      </div>
      <p>
   '.$data['comment'].'
      </p>
     
     </div>
   </div>
    ';
    }
    else 
    {
      
            $comments.='<div class="media  reply mx-3">
            <div class="media-body">
            <div class="d-flex justify-content-between align-items-center">
            <p class="mb-1">'.$data['iduser'].'<small><i> Posted on '.$data['date'].'</i></small></p>

             </div>
             <p>
             '.$data['comment'].'
              </p>
              
              </div>
              </div>
              ';
    }
    

        $comments.='<div class="media  parent  p-3">
    <div class="media-body">'.commenttree($data['idcomment']).'</div></div>';
    

    }
    

    return $comments;


    }
 
        $allcomments="SELECT * FROM commentaires where idmaison='".$_GET["idmaison"]."' 
        ORDER BY idcomment DESC";
         $allcommentstat=$conn->prepare($allcomments);
        $allcommentstat->execute();

      if($allcommentstat->rowcount()==0)
       {
         echo'<P>no comment yet</p>';
        }

       else{
       ?>
     <div class="container mt-5 mb-5 comment">
      <div class="col-md-10 col-lg-10">
        <div class="card">
          <div class="card-body p-4">
            <h4 class="text-center mb-4 pb-2"> comments</h4>
            <div class="row">
              <div class="col-lg-10">
    <?php
        showComments();
     ?>

    
  </div>
  </div>
  </div>
  </div>
  </div>
   </div>
   </div>
   </section>
   <?php
   }

    ?>
   </div>
  </div>
        </div>
    </div>
   </div>

            
   </div>
        
</section>
  <!--/ Property Single End /-->



<!-- JavaScript Libraries -->


  <script src="lib/jquery/jquery.min.js"></script>

  <script>
    /*commentaires*/
$(document).ready(function(){
 
  $(document).on('click','#add',function(e) 
{
  var data = $("#comment_form").serialize();
  $.ajax({
    data:data,
     method:"POST",
     dataType:"json",
     url:"add_comment.php",
   //  data:$(this).serialize(),
     success:function(data)
     {
      $('#comment_form')[0].reset();
			//$('#commentId').val('0');
      location.reload(); 
    },
             
     
     error: function(err)
     {
        console.log(err)
       // alert(err.responseText)
        //
    // alert("ajax error, json: " + data);
     }
    
 });
 });
 
 $(document).on('click', '.reply', function()
 {
  var idcomment= $(this).attr("idcom");
 // $('#commentId').val(idcomment);
  $('#commentid').val(idcomment);
 // alert($('#commentid').val());

//  var datauser = $("#comment_form").serialize();
  $('#inputName').focus();


});

/* message */

$(document).on('submit','#message',function()
{
  //alert("hello");

  var data=$('#message').serialize();
  $.ajax({
     data:data,
     method:"POST",
     cache:false,
    // dataType:"json",
     url:"message.php",
    
   //  data:$(this).serialize(),
  success:function(data)
     {
      // alert("helo")
      if(data.location){
        window.location.href = data.location;
      }
      else{
        setInterval(() =>{
          $("#success").text(""+data);
        $(".success").show();
    
  }, 1000);

       

       }
    },
             
     
     error: function(err)
     {
        console.log(err)
        alert(err.responseText)
        
    // alert("ajax error, json: " + data);
     }
     
    
  
             
     
    

   });

 
});

});


</script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <script src="js/main2.js"></script>
  <script src="js/like_unlike.js"></script>    
</body>
</html>