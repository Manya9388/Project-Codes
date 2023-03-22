<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql20="UPDATE tbl_torder set status='1' where to_id='$id'";
if(mysqli_query($conn,$sql20))
{
    $_SESSION['msg2'] = "Product Approved";
}
header("Location: adminhome.php");
?>