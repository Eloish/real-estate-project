<?php
include('config/connect.php');
session_start();
if(count($_POST)>0)
{
  if(!isset($_SESSION['user']))
  {
    header('Content-Type: application/json');
    echo json_encode(['location'=>'connexion.php']);
   exit;
  }
else
 {
  $di=$_POST['id'];
  
  $id= $_SESSION['user']['id'];

  $countlike=$conn->query('SELECT COUNT(*) AS totallikes from like_unlike WHERE id="'.$id.'"  AND idmaison="'.$di.'" ');
  $countl=$countlike->fetch();
  $total=$countl['totallikes'];
  if($total==0)
  {
    $sql="INSERT  into like_unlike (idmaison, id) VALUES (?,?)";
      $insert=$conn->prepare($sql);
      $insert->execute(array($di,$id));
      if ($insert) {
          //$_SESSION['statut']="sucess";
       ///   header("location: category.php");
       
      }
      else{
        //echo'<script>alert("helo")</script>';
      }
  }else if($total>0){
     
    $query=$conn->query('delete from like_unlike where id="'.$id.'"  AND idmaison="'.$di.'" ');

   // header('location:index.php');
   }
 }
 

}



?>