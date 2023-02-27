<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql8="UPDATE tbl_products set status='0' where product_id='$id'";
if(mysqli_query($conn,$sql8))
{
    $_SESSION['msg'] = "Product deactivated successfully";
}
header("Location: adminhome.php");
?>