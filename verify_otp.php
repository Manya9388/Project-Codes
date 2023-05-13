<?php
session_start();
include('config.php');
if(isset($_POST['otp'])) {
    $entered_otp = $_POST['otp'];
    $correct_otp = $_SESSION['otp'];
    $order_id = $_POST['order_id'];

    if($entered_otp == $correct_otp) {
        $query=mysqli_query($conn,"UPDATE `tbl_order` SET `order_status`='Delivered' WHERE  order_id='$order_id'");
        echo "<script>alert('OTP verification successful. Product delivery confirmed!');window.location='dbhome.php'</script>";
        // Add your code here for confirming the product delivery
       
    } else {
        echo "<script>alert('OTP verification failed. Please try again.');window.location='dbhome.php'</script>";
    }
}
?>
