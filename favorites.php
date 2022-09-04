<?php
include('config/connect.php');
session_start();
if(count($_POST)>0)
{

  if(!isset($_SESSION['user']))
  {
    header('Content-Type: application/json');
    echo json_encode(['you have to login first']);
   exit;
  }
else
 {
  $di= $_POST['id'];
  echo $di;
  $id= $_SESSION['user']['id'];
echo $id;
  $countlike=$conn->query('SELECT COUNT(*) AS favorites from favorites WHERE iduser="'.$id.'"  AND idmaison="'.$di.'" ');
  $countl=$countlike->fetch();
  $total=$countl['favorites'];
  
  $now=date_create()->format('Y-m-d H:i:s');
  if($total==0)
  {
    $sql="INSERT  into favorites (idmaison, iduser,dateadded) VALUES (?,?,?)";
      $insert=$conn->prepare($sql);
      $insert->execute(array($di,$id,$now));
      if ($insert) {
          //$_SESSION['statut']="sucess";
       ///   header("location: category.php");
       
      }
      else{
        //echo'<script>alert("helo")</script>';
      }
  }else{
     
    $query=$conn->query('delete from favorites where iduser="'.$id.'"  AND idmaison="'.$di.'" ');

   // header('location:index.php');
   }
 }
 

}



?>