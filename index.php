<?php

include('config/connect.php');
include('menu.php');

//session_start();
$show=$conn->query('SELECT * from maison,category where maison.idcat=category.idcat and statut=1  ORDER BY datetimeadded ');
$shw=$show->fetch();
$id=$shw['id'];
$showcat=$conn->query('SELECT * from category ');

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
<style>
  .imagesgrid{
        width:500px;
        height:400px;
  }
    .section-search { 
	background: #f9f9f9 url("img/SHRS.png") no-repeat  center;
    min-height: 600px;
    background-size: 100% auto;
    position: cover;
    
    padding-top: 200px;


}
.banner-wrapper {
    margin: 0 auto;
    max-width: 800px;
    width: 100%;
}
.banner-wrapper .banner-header {
	margin-bottom: 30px;
  padding:20px;
}
.banner-wrapper .banner-header h1 {
    margin-bottom: 10px;
	font-size: 40px;
	font-weight: 600;
}
.banner-wrapper .banner-header p {
	color: #757575;
	font-size: 20px;
	margin-bottom: 0;
}
.search-box form {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
}	
.search-box .form-control {
    border: 1px solid #ccc;
    box-shadow: inset 0 0px 0px rgba(0,0,0,.075);
    border-radius: 5px;
    padding-left: 35px;
}
.search-box .search-location {
    -ms-flex: 0 0 240px;
    flex: 0 0 240px;
    margin-right: 12px;
    position: relative;
    width: 240px;
}
.search-location .form-control {
	background: #fff url(img/location.png) no-repeat 10px center;
}
.search-box .search-info {
    -ms-flex: 0 0 490px;
    flex: 0 0 490px;
    margin-right: 12px;
    position: relative;
    width: 590px;
}
#search-loc .form-control {
	background: #fff url(img/search.png) no-repeat 10px center;
}
.search-box .search-btn {
    width: 46px;
    -ms-flex: 0 0 46px;
    flex: 0 0 46px;
    height: 46px;
    background-color:green;
}
.search-box .search-btn span {
	display: none;
	font-weight: 500;
}
.search-box .form-text {
    color: whitesmoke;
    font-size: 16px;
}
@media only screen and (max-width: 767.98px) {
  .search-box {
		max-width: 535px;
		margin: 0 auto;
	}
	.search-box form {
		-ms-flex-direction: column;
		flex-direction: column;
		word-wrap: break-word;
		background-clip: border-box;
	}
	.search-box .search-location {
		-ms-flex: 0 0 100%;
		flex: 0 0 100%;
		width: 100%;
	}
	.search-box .search-info {
		-ms-flex: 0 0 100%;
		flex: 0 0 100%;
		width: 100%;
	}
	.search-box .search-btn {
		-ms-flex: 0 0 100%;
		flex: 0 0 100%;
		min-height: 46px;
		width: 100%;
	}
	.search-box .search-btn span {
		display: inline-block;
		margin-left: 5px;
		text-transform: uppercase;
	}
	.section-search {
		background: #f9f9f9;
	}
}

@media only screen and (max-width: 575.98px) {
  .search-box form {
		display: block;
	}
	.search-box .search-location {
		width: 100%;
		-ms-flex: none;
		flex: none;
	}
	.search-box .search-info {
		width: 100%;
		-ms-flex: none;
		flex: none;
  }
}
@media only screen and (max-width:479px) {
	.section-search {
		min-height: 410px;
		padding: 30px 15px;
	}
}






</style>
</head>
<body>


<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search for your dream house</h1>
							<p></p>
						</div>
                         
						<!-- Search -->
						<div class="search-box">
							<form method="POST" id="formsearch"action="searchmaison.php">
								<div class="form-group search-location"id="search-loc">
                 
                  <select class="form-control form-control-lg form-control-a" name="type" id="Type">
             
                    <option value="rent">For Rent</option>
                    <option value="sell">For Sale</option>
      
                 </select>
                 <span class="form-text">Type</span>
                 
								</div>
								<div class="form-group search-location">
                   
                   <select class="form-control form-control-lg form-control-a" name="addressmaison" id="city" >

                      <option value="muha">Muha</option>
                      <option value="mukaza">Mukaza</option>
                       <option value="ntahangwa">Ntahangwa</option>
              
                  </select>
                  <span class="form-text">commune</span>
									
								</div>
                <div class="form-group search-location"id="search-loc">
                
                  <select class="form-control form-control-lg form-control-a" name="cat" id="categoriehouse">
                      <?php
                        while($shw=$showcat->fetch())
                     {
                   ?>
                   <option  value="<?php echo $shw['idcat'] ?>" ><?php echo $shw['namecat'] ?></option>
                   <?php
                    }
                    ?>
                  </select>
                  <span class="form-text">House category</span>
                  
									
								</div>
                
								<button type="submit" class="btn btn-primary search-btn "><i class="fa fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->
						
					</div>
				</div>
			</section>
<!--/ Services Star /-->
<section class="section-services section-t8"id="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">How it works </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-gamepad"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">search </h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c ">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                convallis a pellentesque
                nec, egestas non nisi.
              </p>
            </div>
            
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-usd"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">choose</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a.
              </p>
            </div>
           
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Buy/rent</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                convallis a pellentesque
                nec, egestas non nisi.
              </p>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Services End /-->
    
<!--/ Property Star /-->
<section class="section-property section-t8">
    <div class="container">
      <div class="row ">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Latest Properties</h2>
            </div>
            <div class="title-link">
              <a href="Allproperties.php">All Property
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="" class="row ">
         <?php
        
       
          while($showmaison=$show->fetch())
          {       
                    $images=$showmaison['images'];
                  // $id=$showmaison['idmaison'];
                  $remove_last_comma=substr($images,0,-3);
                 $temp = explode(',',$remove_last_comma);
       
          ?>

        <div class="carousel-item-b p-2">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <?php    
    
	             echo '<img  src="Administrateur/uploadshouse/'.trim($temp[0]).'" class=" img-fluid imagesgrid"> ';
               ?>
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="test.php?idmaison=<?php echo $showmaison['idmaison']?>"><?php echo $showmaison['adress3'];?>
                      <br/><?php echo $showmaison['adress2'];?></a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a"><?php echo $showmaison['rentorsell'];?> | Fbu <?php echo $showmaison['prix'];?></span>
                  </div>
                  <a href="test.php?idmaison=<?php echo $showmaison['idmaison']?>" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="bg-white">
            <?php 

            $im=$showmaison['idmaison'];
            
            $countlike=$conn->query('SELECT COUNT(*) as totallikes from like_unlike WHERE  idmaison="'.$im.'"');
            $total=$countlike->fetch();
            $totalikes=$total['totallikes']; 
             $countcomments=$conn->query('SELECT COUNT(*) as totalcomments from commentaires WHERE  idmaison="'.$im.'"');
            $total=$countcomments->fetch();
            $totalcoment=$total['totalcomments'];
             $images=$showmaison['images'];

               ?>


             <div class="d-flex bg-light"> 
                 <div class="like p-2 cursor" id="comment"><button class="btn btn-primary"></i><span class="ml-1">Avis(<?php echo $totalcoment ;?>)</span></button></div>
               <div class="p-2 cursor">
                <button class="btn btn-primary"><i class="heart fa fa-heart-o"id="favorites"data_idmaison="<?php echo $showmaison['idmaison']; ?>">favorites</i></button>
               </div>
               <div class="like p-2 cursor"><button class="btn btn-primary"id="likes"data_idm="<?php echo $showmaison['idmaison']; ?>"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">(<?php echo $totalikes ;?>)</span></button></div>
       
             </div>
             </div>
              
              </div>
            </div>
          </div>
        </div>
        
       
        <?php
          }
        ?>
      </div>
    </div>
  </section>
  <!--/ Property End /-->

   <!--/ contact Star /-->
     
       <!--/ Contact Star /-->
   <section class="section-testimonials section-t8 nav-arrow-a contact"id="contact">
    <div class="container">
       <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">contact us </h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
   
        
        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-7">
              <form class="form-a contactForm" id="contactForm">
        <div class="alert alert-success alert-dismissible success" style="display: none;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <span id="success"></span>
        </div>
        <div class="alert alert-danger alert-dismissible danger" style="display: none;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <span id="danger"></span>
        </div>
        
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="name" id="name" class="form-control form-control-lg form-control-a" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                      <div class="validationname"></div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="email" type="email" id="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                      <div class="validationmail"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" name="subject" id="subject" class="form-control form-control-lg form-control-a" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                      <div class="validationobject"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <textarea name="message" class="form-control" name="message" id="message" cols="45" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-a" id="">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-paper-plane"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Say Hello</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">Email.
                      <a href="mailto"></a><span class="color-a">isel@biu.bi</span>
                    </p>
                    <p class="mb-1">Phone.
                      <span class="color-a">+257 62360785</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-pin"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Find us in</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">
                      Bubumbura, kinindo avenue nzero 36,
                      
                    </p>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->


  <!-- JavaScript Libraries -->


  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>


  <script type="text/javascript">
  $(document).ready(function(){
  

  
    $("#contactForm").on("submit",function(e){
      e.preventDefault();
      var name = $("#name").val();
      var email = $("#email").val();
      var subject = $("#subject").val();
      var message = $("#message").val();

      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if(name == "") {
          $(".validationname").text("Name is required");
          $(".validationname").show();
          
      }else if (email == "" ) {
          $(".validationmail").text("Email is required");
          $(".validationmail").show();
      }
      else if(!regex.test(email)) {
        $(".validationmail").text("Email not valid");
      email.css('border-color', 'red');
      
       }
      
      else if (subject == "") {
          $(".validationobject").text("Subject is required");
          $(".validationobject").show();
      }else if (message == "") {
          $(".validation").text("Message is required");
        //  $(".validation").show();
      }else{
        $.ajax({
          url  : "mailer.php",
          type : "POST",
          cache:false,
          data :{name:name,email:email,subject:subject,message:message},
    success:function(data)
     {

      // alert("helo")
      if(data.success){
        $("#success").text("your message has been sent");
        $(".success").show();
        $("#contactForm").reset();
        
      }
      else{
        $("#danger").text('Could not send mail! Sorry!').css('color', 'red').slideDown();
          $(".danger").show();
      }
      
     
      //alert("mail sent successfully")
    },
             
     
     error: function(err)
     {
        console.log(err)
        alert(err.responseText)
     }
         
       
        });
      }
    });
  });
  
</script>

<?php include('footer.php') ?>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="js/main2.js"></script>
  <script src="js/like.js"></script>
  <script src="js/favorites.js"></script>

  <!-- Template Main Javascript File -->

</body>
</html>