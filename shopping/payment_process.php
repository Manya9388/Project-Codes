<?php 
include('config.php');
$n=$_SESSION['email'];
echo $email;
if(isset($_POST['payment_id']) && isset($_POST['amount'])){
    $pymnt_id=$_POST['payment_id'];
    $amt=$_POST['amount'];
    $payment_status="completed";
    
   // mysqli_query($conn,"DELETE FROM `tbl_cart` where username='$nme'");
    mysqli_query($conn,"INSERT INTO `tbl_payment`( `amount`,`payment_id`,`payment_status`)
     VALUES ('$amt','$pymnt_id', '$payment_status')");
    
}?>