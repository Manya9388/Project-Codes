<?php
session_start();
include('config.php');
$wish_id=$_REQUEST['wish_id'];

$sql7="UPDATE tbl_wishlist set status='0' where wish_id='$wish_id'";
if(mysqli_query($conn,$sql7))
{
    $_SESSION['msg2'] = "Added";
}
header("Location: ./viewwish.php");
?>