<?php
include('config/connect.php');
session_start();
$error = '';
$message = '';

$maison=$_POST["idmaison"];

if(isset($_SESSION['user']))
{
 
if(!empty($_POST["message"]))
{
 




  $message=$_POST['message'];
  $idmaison=$_POST['idmaison'];
  $sender=$_SESSION['user']['id'];
  $receiver=$_POST['idreceiver'];
  $now = date_create()->format('Y-m-d H:i:s');
 $query1 = "INSERT INTO contacter(
   incomingmessage_id,outgoingmessage_id,message,idmaison,posted)VALUES(:sender,:receiver,:messages,:idmaison,:dateposted)";

 $statement = $conn->prepare($query1);
 $statement->execute(
  array(
    'sender'=>$sender,':receiver'=>$receiver,':messages'=>$message,':idmaison'=>$idmaison,':dateposted'=>$now)
  
 );
 if($statement)
 {
$error .= '<p class="text-danger">message sent</p>';
    
 }

}
else{
  $error .= '<p class="text-danger"> enter message</p>';
}

$data =$error;
 
 echo $data;

}

else{
  header('Content-Type: application/json');
  echo json_encode(['location'=>'connexion.php']);
 exit;
}



?>

