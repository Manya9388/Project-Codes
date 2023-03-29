<?php
session_start();
include('config.php');

$id=$_REQUEST['id'];

$sql9="UPDATE tbl_torder SET status='2' where to_id='$id'";
if(mysqli_query($conn,$sql9))
{
    $_SESSION['msg'] = "Approved";
}
header("Location: adminhome.php");

$sqlq="select email from tbl_login where log_id in(select log_id from tbl_torder where to_id='$id')";
if(mysqli_query($conn,$sqlq))
 {
 echo "<script> alert ('Approved Order !!! '); window.location='#'</script>";

 require "../Mail/phpmailer/PHPMailerAutoload.php";
 $mail = new PHPMailer;

 $mail->isSMTP();
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = 587;
 $mail->SMTPAuth = true;
 $mail->SMTPSecure = 'tls';

 // h-hotel account
 $mail->Username = 'manyamadhu2023b@mca.ajce.in';
 $mail->Password = '@@@@@@@';

 // send by h-hotel email
 $mail->setFrom('manyamadhu2023b@mca.ajce.in', 'Product Available');
 // get email from input
 $mail->addAddress($_POST["email"]);
 //$mail->addReplyTo('lamkaizhe16@gmail.com');

 // HTML body
 $mail->isHTML(true);
 $mail->Subject = "Customized order is Available Now !!! ";
 $mail->Body = "<b>Dear $fname $lName</b>
       <h3>Your requested customized t-shirt is now Available</h3>
      Now you can simply purchase it from the products list and happy shopping.
       <br><br>
       <p>With regrads,</p>
       <b> Estore</b>";

 if (!$mail->send()) {
    
   echo "<script> alert ('Email Send UnSuccessfull !!! '); window.location='#'</script>";

 } 
 else {

  
   echo "<script> alert ('Email Send Successfully !!! '); window.location='index.php'</script>";
 }
}
?>