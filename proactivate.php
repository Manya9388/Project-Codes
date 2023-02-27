<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql7="UPDATE tbl_products set status='1' where product_id='$id'";
if(mysqli_query($conn,$sql7))
{
    $_SESSION['msg2'] = "Product activated successfully";
}
header("Location: adminhome.php");
?>