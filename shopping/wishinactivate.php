<?php
session_start();
include('config.php');
$wish_id=$_REQUEST['wish_id'];

$sql10="UPDATE tbl_wishlist set status='1' where wish_id='$wish_id'";
if(mysqli_query($conn,$sql10))
{
    $_SESSION['msg2'] = "Removed";
}
header("Location: ./viewwish.php");
?>

