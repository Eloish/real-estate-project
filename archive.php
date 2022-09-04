<?php
include('config/connect.php');
session_start();
include('function.php');
$error = '';
$message = '';

$maison=$_POST["idmaison"];

if(!isset($_SESSION['user']))
{
  header('Content-Type: application/json');
  echo json_encode(['location'=>'connexion.php']);
 exit;
}


else{



if(empty($_POST["message"]))
{
 $error .= 'message is required';
}
else
{
 $message = $_POST["message"];
}



if($error == '')
{
  $message=$_POST['message'];
  $idmaison=$_POST['idmaison'];
  $sender=$_SESSION['user']['id'];
  $receiver=$_POST['idreceiver'];
  $now = date_create()->format('Y-m-d H:i:s');



  $query="SELECT * from conversetion where idsender=:sender and idreceiver=:receiver";
  $convers=$conn->prepare($query);
  $convers->execute(array(':sender'=>$sender,':receiver'=>$receiver));
  $count=$convers->rowcount();
  if($count==0)
  { 
 $query1 = "INSERT INTO conversetion(
   idsender,idreceiver,datecreated)VALUES(:sender,:receiver,:dateposted)";

 $statement = $conn->prepare($query1);
 $statement->execute(
  array(
    'sender'=>$sender,':receiver'=>$receiver,':dateposted'=>$now)
  
 );
 if($statement)
 {
  $idconversation=getidconver($sender);
insertmessage($idconversation,$idmaison,$message,$now);
  
   
 }



}
else{
  
  $idconversation=getidconver($sender);
 
//  $idconversation=getidconver($sender);
  insertmessage($idconversation,$idmaison,$message,$now);

  $error .= '<p class="text-danger">message sent</p>';

}
$data = array(
  'error'  => $error
 );
 
 echo json_encode($data);

}









}


?>

