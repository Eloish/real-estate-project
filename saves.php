<style>
    .heart {

	color:white;}

    .star {
  font-size: 25px;
	color:gold;

}
</style>

<?php
require_once('config/connect.php');
$show=$conn->query('select * from maison,category where maison.idcat=category.idcat and statut=1');
//$shw=$show->fetch();
$result='';
while ($showmaison = $show->fetch()){
    $id=$showmaison['idmaison'];
    $countlike=$conn->query('SELECT COUNT(*) as totallikes from like_unlike WHERE  idmaison="'.$id.'"');
   $total=$countlike->fetch();
   $totallikes=$total['totallikes']; 
    $countcomments=$conn->query('SELECT COUNT(*) as totalcomments from commentaires WHERE  idmaison="'.$id.'"');
   $total=$countcomments->fetch();
   $totalcoment=$total['totalcomments'];
    $images=$showmaison['images'];
    // $id=$showmaison['idmaison'];
    $remove_last_comma=substr($images,0,-3);
   $temp = explode(',',$remove_last_comma);
   
    $result='  
    
    <div class="col-md-4">
      <div class="card-box-a card-shadow">
        <div class="img-box-a">
         
    
         <img src="Administrateur/uploadshouse/'.trim($temp[0]).'" class=" img-fluid imagesgrid">
    
        </div>
      </div>
      <div class="card-overlay">
        <div class="card-overlay-a-content">
          <div class="card-header-a">
            <h2 class="card-title-a">
               <a href="test.php?idmaison='.$showmaison['idmaison'].'">'.$showmaison['adress3'].'
               <br/>'.$showmaison['adress2'].'</a>
            </h2>
          </div>
          <div class="card-body-a">
            <div class="price-box d-flex">
              <span class="price-a">'.$showmaison['rentorsell'].' | '.$showmaison['prix'].'</span>
            </div>
            <a href="test.php?idmaison='.$showmaison['idmaison'].'"class="link-a">Click here to view
              <span class="ion-ios-arrow-forward"></span>
            </a>
          </div>
          <div class="d-flex bg-light"> 
            <div class="like p-2 cursor" id="comment"><button class="btn btn-primary"></i><span class="ml-1">Avis('.$totalcoment.')</span></button></div>
            <div class="p-2 cursor">
             <button class="btn btn-primary"><i class="heart fa fa-heart-o"id="favorites"data_idmaison="'.$showmaison['idmaison'].'">favorites</i></button>
            </div>
            <div class="like p-2 cursor"><button class="btn btn-primary"id="likes"data_idm="'.$showmaison['idmaison'].'"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">('.$totallikes.')</span></button></div>
       
          </div>
          
         
        </div>
     
     
      </div>
    </div>
   
  
  ';
  echo $result;  

   // array_push($record_set, $showmaison);
}
//$show->free_result();
//$conn->close();
//header('Content-type: application/json');


?>