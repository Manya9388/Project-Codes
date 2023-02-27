<?php
session_start();
include('config.php');
$cart_id=$_REQUEST['cart_id'];

$sql10="UPDATE tbl_cart set status='1' where cart_id='$cart_id'";
if(mysqli_query($conn,$sql10))
{
    $_SESSION['msg2'] = "Removed";
}
header("Location: ./shopping-cart.php");
?>