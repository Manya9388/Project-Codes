<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql3="UPDATE tbl_subcategory set status='0' where sub_id='$id'";
if(mysqli_query($conn,$sql3))
{
    $_SESSION['msg'] = "Subcategory deactivated successfully";
}
header("Location: adminhome.php");
?>