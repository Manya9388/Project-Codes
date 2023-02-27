<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql6="UPDATE tbl_category set status='0' where cat_id='$id'";
if(mysqli_query($conn,$sql6))
{
    $_SESSION['msg'] = "Category deactivated successfully";
}
header("Location: adminhome.php");
?>