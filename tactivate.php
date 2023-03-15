<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql12="UPDATE tbl_tshirt set status='1' where t_id='$id'";
if(mysqli_query($conn,$sql12))
{
    $_SESSION['msg2'] = "Tshirts activated successfully";
}
header("Location: adminhome.php");
?>