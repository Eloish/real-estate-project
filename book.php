<?php
include('config/connect.php');
session_start();
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
}

?>