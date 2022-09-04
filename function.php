<?php
function getidconver($usersession)
{
    include('config/connect.php');
  $getidconversetion=$conn->query('SELECT * from conversetion where idsender="'.$usersession.'" or idreceiver="'.$usersession.'"');
  $idconverse=$getidconversetion->fetch();
  $id=$idconverse['idconversetion'];

  return $id;

}
function insertmessage($idconver,$idmaison,$message,$date)
{
 include('config/connect.php');
  $sender=$_SESSION['user']['id'];
  $idconver=getidconver($sender);
  $query2=$conn->prepare('INSERT into messages (idconversetion,idmaison,message,datecreatedm)VALUES(?,?,?,?)');
  $query2->execute(array($idconver,$idmaison,$message,$date));
}

?>