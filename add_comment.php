<?php
include('config/connect.php');
session_start();
$error = '';
$comment_name = '';
$comment_content = '';
$maison=$_POST["idmaison"];
if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
// $name=$_POST['nom'];

}



if($error == '')
{
 $now = date_create()->format('Y-m-d H:i:s');
 $id=$_POST['nom'];
 $query = "
 INSERT INTO commentaires 
 (parent_comment_id, comment, iduser,date,idmaison) 
 VALUES (:parent_comment_id, :comment, :comment_sender_name,:date,:idmaison)
 ";
 $statement = $conn->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'=> $comment_content,
   ':comment_sender_name' => $id,
   
   ':date'=>$now,
   ':idmaison'=>$maison
  )
 );
 //$error = '<label class="text-success">Comment Added</label>';
}




$data =$error;

echo json_encode($data);





?>