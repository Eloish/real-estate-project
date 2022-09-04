<?php

//include('config/connect.php');
include('menu.php');
//$show=$conn->query('select * from maison,category where maison.idcat=category.idcat');

 //$output='';

if(isset($_POST['type'])&& isset($_POST['addressmaison'])&& isset($_POST['cat']))
{


$output=$conn->query("SELECT * from maison,category where maison.idcat=category.idcat and (maison.idcat='".$_POST['cat']."' and statut=1 and  maison.rentorsell='".$_POST['type']."'  and adress1='".$_POST['addressmaison']."')");
$output->execute();
$count=$output->rowcount();

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
          <?php
          if($count==0)
          {
            echo'<p>0results</p>';
          }
          else{

          
         while($showmaison=$output->fetch())
         {
          $id=$showmaison['idmaison'];
          $countlike=$conn->query('SELECT COUNT(*) as totallikes from like_unlike WHERE  idmaison="'.$id.'"');
         $total=$countlike->fetch();
         $totallikes=$total['totallikes']; 
          $countcomments=$conn->query('SELECT COUNT(*) as totalcomments from commentaires WHERE  idmaison="'.$id.'"');
         $total=$countcomments->fetch();
         $totalcoment=$total['totalcomments'];
          
          $images=$showmaison['images'];
          $id=$showmaison['idmaison'];
         $remove_last_comma=substr($images,0,-3);
        $temp = explode(',',$remove_last_comma);
        

           ?>

    <div class="col-md-4">
      <div class="card-box-a card-shadow">
        <div class="img-box-a">
         
    
         <img src="Administrateur/uploadshouse/<?php echo trim($temp[0]) ?>" class=" img-fluid imagesgrid">
    
        </div>
      </div>
      <div class="card-overlay">
        <div class="card-overlay-a-content">
          <div class="card-header-a">
            <h2 class="card-title-a">
               <a href="test.php?idmaison=<?php echo $showmaison['idmaison'] ?>"><?php echo $showmaison['adress3']?>
               <br/><?php echo $showmaison['adress2']?></a>
            </h2>
          </div>
          <div class="card-body-a">
            <div class="price-box d-flex">
              <span class="price-a"><?php echo $showmaison['rentorsell'] ?> | <?php echo $showmaison['prix'] ?> </span>
            </div>
            <a href="test.php?idmaison=<?php echo $showmaison['idmaison'] ?>"class="link-a">Click here to view
              <span class="ion-ios-arrow-forward"></span>
            </a>
          </div>
          <div class="d-flex bg-light"> 
            <div class="like p-2 cursor" id="comment"><button class="btn btn-primary"></i><span class="ml-1">Avis(<?php echo $totalcoment ?>)</span></button></div>
            <div class="p-2 cursor">
             <button class="btn btn-primary"><i class="heart fa fa-heart-o"id="favorites"data_idmaison="<?php echo $showmaison['idmaison'] ?>">favorites</i></button>
            </div>
            <div class="like p-2 cursor"><button class="btn btn-primary"id="likes"data_idm="<?php echo $showmaison['idmaison'] ?>"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">(<?php echo $totallikes ?>)</span></button></div>
       
          </div>
          
         
        </div>
     
     
      </div>
    </div>

      
 
         


     <?php
         }
       }
       ?>
       </div>
    </div>
</section>
<?php
      }
      else{
             echo "<script>window.location.href='index.php';</script>";
           exit;
          }
      ?>
          

          <script src="js/favorites.js"></script>
<script src="js/like.js"></script>
<?php include('footer.php'); ?>
      
  <!--/ Property Grid End /-->

