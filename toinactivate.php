<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql21="UPDATE tbl_torder set status='0' where to_id='$id'";
if(mysqli_query($conn,$sql21))
{
    $_SESSION['msg'] = "Product Rejected";
}
header("Location: adminhome.php");
?>