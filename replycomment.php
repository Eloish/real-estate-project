<?php
include('config/connect.php');
session_start();
$error = '';

$comment_name = '';
$comment_content = '';
$maison=$_POST["idmaison"];
$idcomment=$_POST['id'];
    $id=$_POST['nom'];
if(empty($_POST["content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["content"];
}

if($error == '')
{
 $now = date_create()->format('Y-m-d H:i:s');
  
 $query = "
 INSERT INTO commentaires 
 (parent_comment_id, comment, iduser,date,idmaison) 
 VALUES (:parent_comment_id, :comment, :comment_sender_name,:date,:idmaison)
 ";
 $statement = $conn->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' =>$idcomment,
   ':comment'=> $comment_content,
   ':comment_sender_name' => $id,
   ':date'=>$now,
   ':idmaison'=>$maison
  )
 );
 $error = '<label class="text-success">Comment Added</label>';


$data = array(
 'error'  => $error
);

echo json_encode($data);
}
?>
