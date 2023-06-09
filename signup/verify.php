<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require('../authentication/connection.php');
require 'vendor/autoload.php';


$email = $_GET['email'];
$enroll = substr($email, 0, 10);

function send_link($email){
  require('../authentication/connection.php');
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->SMTPAuth = true;
  $mail->Username = 'iit2021158@iiita.ac.in';
  $mail->Password = 'Ansh@4321#@#';
  $mail->setFrom('iit2021158@iiita.ac.in', 'Ansh Agrawal');
  $mail->addReplyTo('iit2021158@iiita.ac.in', 'Ansh Agrawal');
  $mail->addAddress($email);
  $mail->isHTML(true);

  $mail->Subject = 'Email verification';

  $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $verification_token = md5($email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $verification_token = $verification_token . $addKey;

  $email_template = "
  <h5>Verify you email to register for Bus Service with the link given below</h5>
  <br>
  <a href='http://localhost/register/signup/signup.php?token=$verification_token&email=$email'>Verify Link</a>
  <h5>DO NOT SHARE THIS LINK WITH ANYONE</h5>
";

  $mail->Body = $email_template;

  if(!$mail->send()){
    echo "Error : 1";
    echo 'Mailer Error: ' . $mail->ErrorInfo;

  }else{

    $add_user = "INSERT INTO registration (`email` , `token`, `expiryDate`) VALUES ('$email', '$verification_token', '$expDate')";
    if($conn->query($add_user)){
      echo "Verification link sent!!";
    }else {
      echo "Error : 2";
    }

  }
}

$check_student = "SELECT * FROM student WHERE Username = '$enroll' ";
$result = $conn->query($check_student);

if($result->num_rows > 0){
  echo "User already exists!!";
}
else{
  send_link($email);

}
?>
