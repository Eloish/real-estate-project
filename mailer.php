<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
include_once('config/connect.php');


    if(isset($_POST['name']) && isset($_POST['email'])){

        $name = strip_tags(trim($_POST["name"]));
    
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

       
        $query = "INSERT INTO contact (name, email, subject, message) 
        VALUES('$name','$email','$subject','$message')";

        $result=$conn->prepare($query);
        $result->execute();

        if($result)
        {

       
    
        require_once "PHPMailer/src/PHPMailer.php";
        require_once "PHPMailer/src/SMTP.php";
        require_once "PHPMailer/src/Exception.php";
    
        $mail = new PHPMailer();
        //$mail->SMTPDebug = 2;
    
        //smtp settings
        $mail->isSMTP();
        $smtp_debug = true;
         
        
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "isel@biu.bi";
        $mail->Password = 'mugishamunezero';
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
    
        //email settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("isel@biu.bi");
        $mail->Subject = ("$email ($subject)");
        $mail->Body = $message;
    
        if($mail->send()){
            $status = "success";
            $response = "Email is sent!";
        }
        else
        {
            $status = "failed";
            $response = "Something is wrong: <br>" . $mail->ErrorInfo;
        }
    
        exit(json_encode(array("status" => $status, "response" => $response)));
    }
}
    
 	


?>