<?php
include('config/connect.php');




$rentorsell=$_POST['rentorsell'];
$commune=$_POST['addressmaison'];
$type=$_POST['categoriemaison'];
$output='';
$maison='';
if(isset($rentorsell)&&isset($commune)&&isset($type))
{


if(!empty($rentorsell)&&!empty($commune)&&!empty($type))
{

$output=$conn->query('SELECT * from maison where rentorsell='.$rentorsell.'and idcat='.$type.'and 	adress1='.$commune.'');
}
else if(empty($rentorsell))
{
  $output=$conn->query('SELECT * from maison where  idcat='.$type.'and 	adress1='.$commune.'');

}
else if(empty($commune))
{
  $output=$conn->query('SELECT * from maison where rentorsell='.$rentorsell.' and  idcat='.$type.'');

}
else if(empty($type))
{
  $output=$conn->query('SELECT * from maison where rentorsell='.$rentorsell.'and 	adress1='.$commune.'');
}
else if(empty($type)&&empty($commune))
{
  $output=$conn->query('SELECT * from maison where rentorsell='.$rentorsell.'');
}
else if(empty($type)&&empty($rentorsell))
{
  
  $output=$conn->query('SELECT * from maison where 	adress1='.$commune.'');
}
else if(empty($commune)&&empty($rentorsell))
{
  $output=$conn->query('SELECT * from maison where   idcat='.$type.'');

}

}


         while($search=$output->fetch())
         {
          $images=$search['images'];
          $id=$search['idmaison'];
         $remove_last_comma=substr($images,0,-3);
        $temp = explode(',',$remove_last_comma);

           $maison='
            <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="<img  src="Administrateur/uploadshouse/'.trim($temp[0]).'"">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">204 Mount
                      <br /> Olive Road Two</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>';
          

         }
         echo $maison;

         ?>
