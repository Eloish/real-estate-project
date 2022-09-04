<?php
include("config/connect.php");
session_start();
$affichage=$conn->query("SELECT * from maison,category where idmaison='".$_GET["idmaison"]."' and maison.idcat=category.idcat  ");
$datamessage=$affichage->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>EstateAgency</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
<body>

<div class="click-closed"></div>

  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
         
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Type</label>
              <select class="form-control form-control-lg form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">commune</label>
              <select class="form-control form-control-lg form-control-a" id="city">
                <option>All commune</option>
                <option>Muha</option>
                <option>Mukaza</option>
                <option>Ntahangwa</option>
                
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bedrooms">house category</label>
              <select class="form-control form-control-lg form-control-a" id="bedrooms">
                
                <option>appartement</option>
                <option>villa</option>
                <option>simple house</option>
                <option>office & studio</option>
              </select>
            </div>
          </div>
         
          
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Min Price</label>
              <select class="form-control form-control-lg form-control-a" id="price">
                <option>Unlimite</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--/ Form Search End /-->

 

  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php">Estate<span class="color-b">Agency</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#property">Property</a>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <?php

          if(!isset($_SESSION['user']))
            {
              echo'
             <li class="nav-item">
             <a class="nav-link" href="connexion.php">SignIn</a>
             </li>';
            
            }
           
          else
          {
          ?>
           <li class="nav-item">
            <a class="nav-link" href="logout.php">SignUp</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><?php echo $_SESSION['user']['nameoffreur'] ?></a>
          </li>
          <?php
           
           }
           
          
           ?>
         
         
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
  </nav>
  <!--/ Nav End /-->

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

                $remove_last_comma=substr($images,0,-3 );
                $temp = explode(',',$remove_last_comma);
                 for($i=0;$i<count($temp);$i++)
                 {
                if(!empty($images))
                 {
                 echo '<div class="carousel-item-b">
            <img src="offreur/uploadshouse/'.trim($temp[$i]).'">
              </div>';
                }
    
 
                 }
               
            
              
              ?>     
          </div>
          <div class="row justify-content-between">

            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">FBU</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c"><?php echo $datamessage['prix'] ?></h5>
                  </div>
                </div>
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
                      <strong>Property ID:</strong>
                      <span>1134</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Location:</strong>
                      <span><?php echo $datamessage['adress3'] ?></span>
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
                      <span>340m
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
            <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">
            <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                
                <div class="d-flex flex-column ml-3">
                    <div class="d-flex flex-row post-title ">
                         <center><h5>commentaires</span></center>
                    </div>
                    
                </div>
            </div>
            <div class="container">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    
    <div class="form-group">
      <input type="hidden"name="idmaison"id="idmaison" value="<?php echo $_GET["idmaison"]?>">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="add" class="btn btn-info" value="Submit" />
    </div>
   </form>
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
    ORDER BY idcomment DESC
    ";
	}
	
	else 
	{
    $sql="SELECT * FROM commentaires 
    WHERE parent_comment_id = $parentid  and  idmaison='".$_GET["idmaison"]."' 
    ORDER BY idcomment DESC
    ";
	
	}
  $result=$GLOBALS['conn']->query($sql);
  
  while($showresult=$result->fetch())
  {
    if($showresult['parent_comment_id']==0)
		{
      $comments=
      '<div class="d-flex flex-start mt-4">
      <a class="me-3" href="#">
   
      </a>  
          <div class="flex-grow-1 flex-shrink-1">
            <div>
              <div class="d-flex justify-content-between align-items-center">
                <p class="mb-1">
                 <span class="text-danger">By- '.$showresult['iduser'].' </span><span class="small"> on  '.$showresult['date'].'</span>
                </p>
                <button type="button" class="btn btn-primary reply" idcom= '.$showresult["idcomment"].'>Reply</button>
              </div>
              <p class="small mb-0">
              '.$showresult['comment'].'
              </p>
   <div class="col-lg-6 mt-3" id="reply" style="display:none;">
    <form method="POST" id="reply_form">
   
    <div class="form-group">
     <textarea name="content" id="comment_content" class="form-control" placeholder="Enter Comment"></textarea>
    </div>
    
    <div class="form-group">
     
     <input type="submit" name="submit"  class="btn btn-info replycomment"value="Submit" />
    </div>
   </form>
   <input type="hidden" name="idhouse" id="idhouse" idm=" '.$_GET["idmaison"].'">
   <input type="hidden" name="idcomment" id="idcomment"> 
    </div>
    </div>';
    }else{
      $comment='
      <div class="d-flex flex-start">
      <div class="flex-grow-1 flex-shrink-1">
            <div>
              <div class="d-flex justify-content-between align-items-center">
                <p class="mb-1">
                 <span class="text-danger">By- '.$showresult['iduser'].' </span><span class="small"> on  '.$showresult['date'].'</span>
                </p>
                <button type="button" class="btn btn-primary reply" idcom= '.$showresult["idcomment"].'>Reply</button>
              </div>
              <p class="small mb-0">
              '.$showresult['comment'].'
              </p>
              <div class="col-lg-6 mt-3" id="reply" style="display:none;">
    <form method="POST" id="reply_form">
   
    <div class="form-group">
     <textarea name="content" id="comment_content" class="form-control" placeholder="Enter Comment"></textarea>
    </div>
    
    <div class="form-group">
     
     <input type="submit" name="submit"  class="btn btn-info replycomment"value="Submit" />
    </div>
   </form>
   <input type="hidden" name="idhouse" id="idhouse" idm=" '.$_GET["idmaison"].'">
   <input type="hidden" name="idcomment" id="idcomment"> 
    </div>
            </div>
            </div>';
      

    }
    $comments.='<div class="media  parent  p-3">
    <div class="media-body">'.commenttree($showresult['idcomment']).'</div></div>';

		


		}

    

    return $comments;


}
 
$allcomments="SELECT * FROM commentaires where idmaison='".$_GET["idmaison"]."' 
ORDER BY idcomment DESC
";
$allcommentstat=$conn->prepare($allcomments);
$allcommentstat->execute();

if($allcommentstat->rowcount()==0)
{
    echo'<P>no comment yet</p>';
}

else{
  ?>
  <section class="gradient-custom">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-start">
      <div class="col-md-12 col-lg-12 col-xl-8">
        <div class="card">
          <div class="card-body p-4">
            <h4 class="text-center mb-4 pb-2"> comments section</h4>
            <div class="row">
              <div class="col-lg-12">
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
      if(data.location){
        window.location.href = data.location;
      } 
    },
             
     
     error: function(err)
     {
        console.log(err)
        alert(err.responseText)
        //
    // alert("ajax error, json: " + data);
     }
    
 });
 });
 
 $(document).on('click', '.reply', function()
 {
   var idpost=$('#idhouse').attr("idm");
   $('#idhouse').val(idpost);
   var idcomment = $(this).attr("idcom");
   $('#idcomment').val(idcomment);
   $('#reply').css("display", "block");
   var comment=  $('#comment_id').val();
   var post=$('#idhouse').val();
   
  $(document).on('click','.replycomment', function()
 {
 
   var datauser = $("#reply_form").serialize();
   alert(post);
   $.ajax({

    data:datauser+"&id="+idcomment+"&idm="+post,
    
     method:"POST",
     url:"replycomment.php",
   
     success:function(data)
     {
      
       alert(data)       
     },
     error: function(err)
     {
        console.log(err)
        alert(err.responseText)
        //
    // alert("ajax error, json: " + data);
     }
   });
   

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
  <script src="js/main.js"></script>
  <script src="js/like_unlike.js"></script>    
</body>
</html>