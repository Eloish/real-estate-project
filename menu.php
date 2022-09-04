<?php

include('config/connect.php');
session_start();  
$show=$conn->query('SELECT * from category ');
 if(isset($_SESSION['user']))
        {

$user=$_SESSION['user']['id'];

$select=$conn->query('SELECT count(*) as totalfav from favorites where iduser='.$user.'');
$fav=$select->fetch();
$nbfav=$fav['totalfav'];
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>FindHome</title>
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
    <form class="form-a" method="POST" id="formsearch"action="searchmaison.php">
      <div class="row">
       
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="Type">Type</label>
            <select class="form-control form-control-lg form-control-a" name="type" id="Type">
             
              <option value="rent">For Rent</option>
              <option value="sell">For Sale</option>
              
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="city">commune</label>
            <select class="form-control form-control-lg form-control-a" name="addressmaison" id="city" >

              <option value="muha">Muha</option>
              <option value="mukaza">Mukaza</option>
              <option value="ntahangwa">Ntahangwa</option>
              
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="bedrooms">house category</label>
            <select class="form-control form-control-lg form-control-a" name="cat" id="categoriehouse">
              <?php
               while($shw=$show->fetch())
               {
                ?>
                <option  value="<?php echo $shw['idcat'] ?>" ><?php echo $shw['namecat'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>
       
      
        </div>
        <div class="col-md-12">
           <button type="submit" id="search"  class="btn btn-b">Search Property</button>
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
    <a class="navbar-brand text-brand" href="index.php">Find<span class="color-b">Home</span></a>
    <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
      data-target="#navbarTogglerDemo01" aria-expanded="false">
      <span class="fa fa-search" aria-hidden="true"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between" id="navbarDefault">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allproperties.php">Property</a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link" href="index.php.#contact">Contact</a>
        </li>
        <?php
        if(isset($_SESSION['user']))
        {
          
          ?>
          <li class="nav-item">
          <a class="nav-link" href="Administrateur/favorites.php">favorites(<?php echo $nbfav ?>)</a>
        </li>
        <?php
          
        }
        ?>

        
       
        
        
        
       
       
       
       
      </ul>
      <ul class="navbar-nav">
      <?php

        if(!isset($_SESSION['user']))
        {
        ?>
       

          <li class="nav-item border  border-border p-2 rounded-lg "style="background-color:#2eca6a;">
          <a class="nav-link" href="Administrateur/offreurs/addlocation.php">Add new location</a>
         </li>
        
          <li class="nav-item border border-border p-2">
							<a class="nav-link " href="connexion.php">login / Signup </a>
			   </li>
        
         <?php
        }
        else{
          ?>
         
          <li class="nav-item border border-border p-2">
          <a class="nav-link " href="logout.php">Logout </a>
          </li>
          <?php  
        
         if( $_SESSION['user']['profile']=='suppliers')
        {
          ?>
       
          <li class="nav-item border  border-border p-2 rounded-lg "style="background-color:#2eca6a;">
          <a class="nav-link" href="Administrateur/offreurs/addlocation.php">Add new location</a>
          </li>
          <li class="nav-item border border-border p-2">
							<a class="nav-link " href="Administrateur/offreurs/properties.php">My space </a>
			   </li>
          
       
        <?php

        }
        else if($_SESSION['user']['profile']=='Apllicants'){
          ?>
          <li class="nav-item border border-border p-2">
							<a class="nav-link " href="Administrateur/simpleusers/reservation.php">My space </a>
			   </li>
      <?php
        }
      }
        
         ?>
     
      </ul>
      <!--<button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
             data-target="#navbarTogglerDemo01" aria-expanded="false">
      <span class="fa fa-search" aria-hidden="true"></span>
    </button>-->
    </div>
   
  </div>
</nav>
<!--/ Nav End /-->
 <!-- JavaScript Libraries -->

 <script src="lib/jquery/jquery.min.js"></script>


  <script src="lib/jquery/jquery-migrate.min.js"></script>


</script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  
  <script src="js/main.js"></script>  
   
 
 
</body>
</html>