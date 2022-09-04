<?php
require('config/connect.php');
session_start();
$error='';
$iduser=$_SESSION['user']['id'];
$idmaison=$_POST['idmaison'];
$dateofentry=$_POST['dateof'];
$nbadvancepaymentM=$_POST['months'];
$type=$_POST['type'];
$numberofoccupant=$_POST['nbpeople'];
$act=$_POST['activity'];
$idowner=$_POST['idowner'];
$now = date_create()->format('Y-m-d H:i:s');
$select=$conn->query('SELECT * from housebook where idmaison="'.$idmaison.'" and iduser="'.$iduser.'"');
$count=$select->rowcount();

if($_SESSION['user']['id']!=$idowner)
{

if($count>0)
{
    $error='you have already sent a request to this house ';
}
else{


    $timestamp = time();
    $insert=$conn->prepare('INSERT into housebook(idmaison,iduser,idowner,numberofoccupant,dateofentry,nbadvancepaymentM,typeofactivity,datesent)VALUES(:idmaison,:userid,:idowner,:nboccupant,:dateof,:nbM,:act,:datesent)');
    $result=$insert->execute(array(':idmaison'=>$idmaison,':userid'=>$iduser,':idowner'=>$idowner,':nboccupant'=>$numberofoccupant,':dateof'=>$dateofentry,':nbM'=>$nbadvancepaymentM,':act'=>$act,':datesent'=>date("Y-m-d")));
    if($result)
    {
        $error='request sent successfully';
    }
    else{
        $error='try again';
    }

}

}
else{
    $error='You can not sent a request because you are the owner of the house';

}


$data = $error;
   
   echo $data;
?>