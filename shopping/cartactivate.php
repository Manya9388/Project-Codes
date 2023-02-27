<?php
session_start();
include('config.php');
$cart_id=$_REQUEST['cart_id'];

$sql7="UPDATE tbl_cart set status='0' where cart_id='$cart_id'";
if(mysqli_query($conn,$sql7))
{
    $_SESSION['msg2'] = "Added";
}
header("Location: ./shopping-cart.php");
?>