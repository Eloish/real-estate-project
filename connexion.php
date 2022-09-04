<?php 
//include('menu.php');
include("config/connect.php");
session_start();


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
  body {
    background: #f9f9f9 url("img/bg.jpg") no-repeat  center;
    min-height: 650px;
    background-size: 100% auto;
    position: cover;
    
}

.rounded-lg {
  border-radius: 1rem;
}

.nav-pills .nav-link {
  color: #555;
}

.nav-pills .nav-link.active {
  color: #fff;
}

.change-avatar {
	-webkit-box-align: center;
	-ms-flex-align: center;
	align-items: center;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
}
.change-avatar .profile-img {
	margin-right: 15px;
}
.change-avatar .profile-img img {
    border-radius: 4px;
    height: 100px;
    width: 100px;
    object-fit: cover;
}
.change-avatar .change-photo-btn {
    margin: 0 0 10px;
    width: 150px;
}
.widget-profile.pat-widget-profile .profile-info-widget .booking-doc-img {
	padding: 0;
}
.widget-profile.pat-widget-profile .profile-info-widget .booking-doc-img img {
    border-radius: 50%;
    height: 100px;
    width: 100px;
}
    </style>

<head>
<body>

  <!--/ Form Search End /-->

 

  <!--/ Nav Star /-->



<section class="section-services section-t8">
  <div class="container">

  <div class="row">
    <div class="col-lg-9 mx-auto ">
    <div class="alert alert-success alert-dismissible success" style="display: none;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <span id="success"></span>
        </div>
        <div class="alert alert-danger alert-dismissible danger" style="display: none;">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <span id="danger"></span>
        </div>
          
           
      <div class="bg-light rounded-lg shadow-sm p-5">
        <!-- Credit card form tabs -->
        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
            <i class=" fa-arrow-right-to-bracket"></i>
                                SIGN IN
                            </a>
          </li>
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                <i class="fa fa-paypal"></i>
                                SIGN UP
                            </a>
          </li>
          
        </ul>
        <!-- End -->


        <!-- Credit card form content -->
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
          
            <form id="loginform" method="POST">
              <div class="form-group">
                <label for="username">Email</label>
                <input type="mail" name="email"  required="required" class="form-control">
              </div>
              <div class="form-group">
                <label for="cardNumber">Password</label>
                <div class="input-group">
                  <input type="password" name="password" required="required"  class="form-control">
                </div>
              </div>
              
              <button type="submit" name="login" id="login" class=" btn btn-primary btn-block rounded-pill shadow-sm"> Login  </button>
            </form>

            <?php


            ?>
          </div>
          <!-- End -->

          <!-- Paypal info -->
          <div id="nav-tab-paypal" class="tab-pane fade">
							<div class="card  ">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									<form   id="registerform" method="POST" enctype="multipart/form-data">
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img id="imageResult" src="#" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" required='required' id="upload" name="uploadfile" onchange="readURL(this);">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
                      <div class="col-12 col-md-6">
                         <div class="form-group">
                                <label for="inputPassword" class="col-form-label">Profil type</label>
                              <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="profile" id="inlineRadio1" value="Apllicants">
                                        <label class="form-check-label" for="inlineRadio1">demandeurs</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input "  type="radio" name="profile" id="inlineRadio2" value="suppliers">
                                        <label class="form-check-label" for="inlineRadio2">houseowner</label>
                                      </div>       
                               </div>
                              </div>
                      
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Full Name</label>
													<input type="text" required="required" name="fullname" class="form-control">
												</div>
											</div>
  
                      <div class="col-12 col-md-12">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="date" name="datebirth" required='required' class="form-control datetimepicker" value="">
													</div>
												</div>
											</div>
										
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" name="mail" required='required' id="email" class="form-control" >
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text"name="phonenumber"class="form-control">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address</label>
													<input type="text"name="address" required='required' class="form-control" >
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" name="city" required='required' class="form-control" >
												</div>
											</div>
											
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" required='required' name="country" class="form-control" >
												</div>
											</div>
                      <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Password</label>
													<input type="password" required='required' name="motdepasse" class="form-control" >
												</div>
											</div>
                      <div class="col-12 col-md-6">
												<div class="form-group">
													<label>confirm Password</label>
													<input type="password" required='required' name="confirmpassword" class="form-control">
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" name="save" id="submite" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
       

      </div>
    </div>
  </div>
</div>

</div>
</div>


</section>

<script src="lib/jquery/jquery.min.js"></script>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {

 

var email=$("#email");

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
        
    });
});
$("#registerform").on('submit', function(e) {

  e.preventDefault();

  alert('hello');
  
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if(!regex.test(email.val())) {
      email.css('border-color', 'red');
      email.css('text', 'invalid email');
      
    }

    //e.preventDefault();

     $.ajax({
       url: "config/registrer.php",
       type: "POST",
        data:  new FormData(this),
        contentType: false,
         cache: false,
          processData:false, 
            success:function(data){
              
              if(data.success){
                $("#success").text(data).css().slideDown();
                $(".succes").show();

              }
              else{
                $("#danger").text(data).css('color', 'red').slideDown();
                $(".danger").show();

              }
              
              },
              error: function(data){
                //console.log("error");
                console.log(data);
            }
                

           
              
    });

});


$('#loginform').on('submit', function(e) {
  e.preventDefault();

  var data=$('#loginform').serialize();

  $.ajax({
    

    url: "config/login.php",
   type: "POST",
    data:data,
   success:function(data){


    if(data.location){
        window.location.href = data.location;
      }
      else{
      
    
        $("#danger").text(data).css('color', 'red').slideDown();
          $(".danger").show();
      
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

  <script src="js/main.js"></script>
      
</body>
</html>