<?php 
/*##########Script Information#########
 
  #####################################*/

//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
$mail->Port = 25; 
//Set gmail username
$mail->Username = "yassineaguedide3@gmail.com";
//Set gmail password
$mail->Password = "casa@CASA789789789";
//Email subject
$mail->Subject = "Nouveau Message d'un client";
//Set sender email
$mail->setFrom('yassineaguedide3@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment


//Add recipient
$mail->addAddress('yassineaguedide@gmail.com');
$nom_erreur='color:red;display:none;';
$telephone_erreur=$nom_erreur;
$adresse_erreur=$nom_erreur;
//set up the message
if(isset($_POST['submit'])){
$first_name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];




    $message="<h5 style='display:inline-block;'>Nom Complet</h5> : ".$first_name."<br>".    
    "<h5 style='display:inline-block;'>Email</h5> : ".$email."<br>".
    "<h5 style='display:inline-block;'>subject</h5> : ".$subject."<br>".
    "<h5 style='display:inline-block;'>message </h5>: ".$message."<br>"
    ;
    //Email body
    $mail->Body = "<h2>Informations du client </h2><br>".$message;
    //Finally send email
    
        if ( $mail->send() ) {
            echo "<script> alert('Merci'); </script>";
            echo("<script>location.href = '/home.html';</script>");
            die();   
        }else{
            echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
        }
        $mail->smtpClose();
          

    
}



//Closing smtp connection

/*##########Script Information#########
 	  
  #####################################*/
  /*
if(isset($_POST['submit'])){
    $to = "yassineaguedide@gmail.com"; // this is your Email address
    $from = "yassineaguedide@gmail.com"; // this is the sender's Email address
    $first_name = $_POST['name'];
    echo "hey " . $first_name ;
    //$last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = "walo";
    $message2 = "walo";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }*/
?>


