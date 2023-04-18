<?php
include("config.php");
session_start();
$email = $_SESSION['email'];

// Get the log_id for the logged-in user
$sqlq = "SELECT log_id FROM tbl_login WHERE email='$email'";
$resu = mysqli_query($conn, $sqlq);
$row = mysqli_fetch_assoc($resu);
$log_id = $row['log_id'];

// Get the custom_id and des_id for the user's design
$sql = "SELECT custom_id, des_id FROM tbl_customize WHERE log_id='$log_id'";
$resul = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($resul);
$custom_id = $row['custom_id'];
$des_id = $row['des_id'];

// Get the payment data from the POST data
$amt = $_POST['amount'];
$payment_status = "completed";

// Insert the payment data into the tbl_advpayment table
$sql3 = "INSERT INTO `tbl_advpayment`(`amount`, `advpay_status`, `log_id`, `custom_id`, `des_id`) 
         VALUES ('$amt', '$payment_status', '$log_id', '$custom_id', '$des_id')";
$result = mysqli_query($conn, $sql3);

if ($result) {
    echo "Payment data inserted successfully";
    
   $sql5= "UPDATE `tbl_sgarments` SET `advpay_status`='paid' WHERE custom_id='$custom_id'";
   $result2 = $conn->query($sql5);
} else {
    echo "Error inserting payment data: " . mysqli_error($conn);
}
?>
