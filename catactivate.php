<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql5="UPDATE tbl_category set status='1' where cat_id='$id'";
if(mysqli_query($conn,$sql5))
{
    $_SESSION['msg2'] = "Category activated successfully";
}
header("Location: adminhome.php");
?>